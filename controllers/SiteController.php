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
        $category = Catalog::find()->where(['id' => $id])->one();
        $postsCount = CatalogPosters::find()->distinct()->where(['catalog_id' => $category->id])->count();
        
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
        $poster = Posters::findOne(['id' => $id ]);
        $images = Images::find()->where(['poster_id' => $id]);// получили картинки постера
        $postersAddServices = PostersAddServices::find()->where(['poster_id' => $id])->all();
        $types = Types::find()->all();  // все типы изделий
        $posterSizes = PostersSizes::find()->where(['poster_id' => $id])->all(); // размеры постера
        $bagetsWidth = Bagets::find()->select('width')->distinct()->all();    // подрамники
        $bagets = Bagets::find()->all();
        $posterMaterials = PostersMaterials::find()->where(['poster_id' => $id])->all(); // материалы постера

        return $this->render('poster',[
            'poster' => $poster,
            'images' => $images->all(),
            'firstImage' => $images->one(),
            'interierImages' => $images->limit(1,),
            'postersAddServices' => $postersAddServices,
            'types' => $types,
            'posterSizes' => $posterSizes,
            'bagetsWidth' => $bagetsWidth,
            'bagets' => $bagets,
            'posterMaterials' => $posterMaterials,
        ]);
    }

    // экшн страницы корзины
    public function actionCart()
    {

        return $this->render('cart');
    }

    // экшн добавления заказа
    public function actionAddToCart()
    {
        
        return $this->render('add-to-cart');
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
