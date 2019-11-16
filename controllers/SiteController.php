<?php

namespace app\controllers;

use Yii;
use yii\helpers\Html;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use yii\base\Event;
use yii\web\View;
use yii\data\Pagination;

use app\models\Catalog;
use app\models\Posters;
use app\models\Images;
use app\models\AddServices;
use app\models\PostersAddServices;
use app\models\Bagets;
use app\models\CatalogPosters;
use app\models\Clocks;
use app\models\Materials;
use app\models\PostersMaterials;
use app\models\PostersSizes;
use app\models\PostersTypes;
use app\models\Sizes;
use app\models\Types;
use app\models\Orders;
use app\models\OrderItems;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

	// экшн главной страницы (см. виджет PosterListWidget)
    public function actionIndex()
    {
        return $this->render('index');
    }

    // экшн страницы каталога
    public function actionCategory($id)
    {
        $category = Yii::$app->cache->getOrSet('action_category_one', function () use($id) {
            return Catalog::find()->where(['id' => $id])->one();
        }, 3600);
        //$category = Catalog::find()->where(['id' => $id])->one();
        $cat_id = $category->id;
        $postsCount = Yii::$app->cache->getOrSet('action_category_count', function () use($cat_id) {
            return CatalogPosters::find()->distinct()->where(['catalog_id' => $cat_id])->count();
        }, 3600);
        //$postsCount = CatalogPosters::find()->distinct()->where(['catalog_id' => $category->id])->count();
        
        return $this->render('category',[
            'category' => $category,
            'id' => $id,
            'postsCount' => $postsCount
        ]);
    }

    // экшн страницы вывода результатов поиска (см. виджет PosterListWidget)
    public function actionSearch()
    {
        return $this->render('search');
    }

    // экшн страницы постера
    public function actionPoster($id)
    {
        // все запросы к БД кэшируем на 1 час
        $poster = Yii::$app->cache->getOrSet('poster', function () use($id) {
            return Posters::findOne(['id' => $id ]);
        }, 3600);
        //$poster = Posters::findOne(['id' => $id ]);
        $images = Yii::$app->cache->getOrSet('images', function () use($id) {
            return Images::find()->where(['poster_id' => $id])->limit(1,);
        }, 3600);
        //$images = Images::find()->where(['poster_id' => $id]);// получили картинки постера
        $postersAddServices = Yii::$app->cache->getOrSet('postersAddServices', function () {
            return AddServices::find()->all();
        }, 3600);
        //$postersAddServices = AddServices::find()->all(); // доп услуги
        //$postersAddServices = PostersAddServices::find()->where(['poster_id' => $id])->all();
        $types = Yii::$app->cache->getOrSet('types', function () {
            return Types::find()->all();
        }, 3600);
        //$types = Types::find()->all();  // все типы изделий
        $posterSizes = Yii::$app->cache->getOrSet('posterSizes', function () {
            return Sizes::find()->all();
        }, 3600);
        //$posterSizes = Sizes::find()->all(); // размеры постера
        //$posterSizes = PostersSizes::find()->where(['poster_id' => $id])->all(); // размеры постера
        $bagetsWidth = Yii::$app->cache->getOrSet('bagetsWidth', function () {
            return Bagets::find()->select('width')->distinct()->all();
        }, 3600);
        //$bagetsWidth = Bagets::find()->select('width')->distinct()->all();    // подрамники
        $bagets = Yii::$app->cache->getOrSet('bagets', function () {
            return Bagets::find()->all();
        }, 3600);
        //$bagets = Bagets::find()->all();
        $posterMaterials = Yii::$app->cache->getOrSet('posterMaterials', function () {
            return Materials::find()->all();
        }, 3600);
        //$posterMaterials = Materials::find()->all(); // материалы
        //$posterMaterials = PostersMaterials::find()->where(['poster_id' => $id])->all(); // материалы постера
        $clocks = Yii::$app->cache->getOrSet('clocks', function () {
            return Clocks::find()->all();
        }, 3600);

        return $this->render('poster',[
            'poster' => $poster,
            'images' => $images->all(),
            //'firstImage' => $images->one(),
            'interierImages' => $images,
            'postersAddServices' => $postersAddServices,
            'types' => $types,
            'posterSizes' => $posterSizes,
            'bagetsWidth' => $bagetsWidth,
            'bagets' => $bagets,
            'posterMaterials' => $posterMaterials,
            'clocks' => $clocks,
        ]);
    }

    // экшн корзины
    public function actionShowCart()
    {
        $session = Yii::$app->session;
        $session->open();
        $this->layout = false;
        // render modal
        return $this->render('add-to-cart', compact('session'));
    }
    // экшн добавления заказа в корзину
    public function actionAddToCart()
    {
        /**
         * cookie:
         * Yii::$app->request->cookies->has('cname')
         * Yii::$app->getRequest()->getCookies()->getValue('cname');
         * $jsonItems = json_decode($cookie, true);
        */
         /* 
            $cookie = new \yii\web\Cookie([
                'name' => 'cname',
                'value' => $id,
                'expire' => time() + 60 * 60 * 24 * 365,
            ]);
            Yii::$app->getResponse()->getCookies()->add($cookie);
         */
        $id = Yii::$app->request->get('id');
        $poster = Posters::findOne($id);
        if (empty($poster)) return false;
        $session = Yii::$app->session;
        $session->open(); 
        $order = new Orders();
        $order->addToCart($poster);
        $session->close();
        $this->layout = false;
        // render modal
        return $this->render('add-to-cart', compact('session','id'));
    }
    // экшн очистки корзины
    public function actionClearCart()
    {
        $session = Yii::$app->session;
        $session->open();
        $session->remove('cart'); // clear session
        $this->layout = false;
        // render modal
        return $this->render('add-to-cart', compact('session'));
    }
    // экшн удаления картины из корзины
    public function actionDeleteItemFromCart()
    {
        $id = Yii::$app->request->get('id');
        $session = Yii::$app->session;
        $session->open();
        $order = new Orders();
        $order->deleteItemFromCart($id);
        $session->close();
        $this->layout = false;
        // render modal
        return $this->render('add-to-cart', compact('session','id'));
    }

    // экшн страницы заказа
    public function actionOrder()
    {
        
        return $this->render('order');
    }

    /*
     * Error page (404...)
     */
    public function actionError()
    {
        $exception = Yii::$app->errorHandler->exception;
        if ($exception != null) {
            if ($exception instanceof HttpException) {
                return $this->redirect(['404/'])->send();
            }
        }
        return $this->render('error',['exception' => $exception]);
    }
}
