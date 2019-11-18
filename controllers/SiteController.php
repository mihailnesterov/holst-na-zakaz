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
        $cat_key = 'action_category_'.$id;
        $category = Yii::$app->cache->getOrSet($cat_key, function () use($id) {
            return Catalog::find()->where(['id' => $id])->one();
        }, 3600);
        $cat_id = $category->id;
        $cat_count_key = 'action_category_count_'.$cat_id;
        $postsCount = Yii::$app->cache->getOrSet($cat_count_key, function () use($cat_id) {
            return CatalogPosters::find()->distinct()->where(['catalog_id' => $cat_id])->count();
        }, 3600);  
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
        $poster = Yii::$app->cache->getOrSet('poster_'.$id, function () use($id) {
            return Posters::findOne(['id' => $id ]);
        }, 3600);
        $images = Yii::$app->cache->getOrSet('images_'.$id, function () use($id) {
            //return Images::find()->where(['poster_id' => $id])->limit(1,);
            return Images::find()->where(['poster_id' => $id]);
        }, 3600);
        $postersAddServices = Yii::$app->cache->getOrSet('postersAddServices', function () {
            return AddServices::find()->all();
        }, 3600);
        $types = Yii::$app->cache->getOrSet('posterTypes', function () {
            return Types::find()->all();
        }, 3600);
        $posterSizes = Yii::$app->cache->getOrSet('posterSizes', function () {
            return Sizes::find()->all();
        }, 3600);
        $bagetsWidth = Yii::$app->cache->getOrSet('bagetsWidth', function () {
            return Bagets::find()->select('width')->distinct()->all();
        }, 3600);
         $bagets = Yii::$app->cache->getOrSet('bagets', function () {
            return Bagets::find()->all();
        }, 3600);
        $posterMaterials = Yii::$app->cache->getOrSet('posterMaterials', function () {
            return Materials::find()->all();
        }, 3600);
        $clocks = Yii::$app->cache->getOrSet('clocks', function () {
            return Clocks::find()->all();
        }, 3600);

        return $this->render('poster',[
            'poster' => $poster,
            'images' => $images->all(),
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
        if( !Yii::$app->request->isAjax ) {
            return $this->redirect( Yii::$app->request->referrer);
        }
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
    // экшн уменьшения (-1) кол-ва картин в корзине
    public function actionMinusItemFromCart()
    {
        $id = Yii::$app->request->get('id');
        $session = Yii::$app->session;
        $session->open();
        $order = new Orders();
        $order->minusItemFromCart($id);
        $session->close();
        $this->layout = false;
        // render modal
        return $this->render('add-to-cart', compact('session','id'));
    }

    // экшн страницы заказа
    public function actionOrder()
    {
        $session = Yii::$app->session;
        $session->open();
        $order = new Orders();
        $session->close();
        $this->view->title = "Оформление заказа:";
        return $this->render('order', compact('session', 'order'));
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
