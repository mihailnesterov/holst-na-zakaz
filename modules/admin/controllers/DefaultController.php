<?php
namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\ArrayHelper;
// admin/models
use app\modules\admin\models\Users;
use app\modules\admin\models\Login;
use app\modules\admin\models\Signup;
// models
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

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex() {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(Yii::$app->urlManager->createUrl('/admin/login'));
        } else {
            $user = $this->findUserModel(Yii::$app->user->identity->id);
            $posters = Posters::find()->orderby(['id'=>SORT_DESC])->all();
            $this->view->title = 'Картины';
            return $this->render('index',[
                'user' => $user,
                'posters' => $posters
            ]);
        }
        
    }
    
    /**
     * Renders the login view for the module
     * @return string
     */
    public function actionLogin() {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(Yii::$app->urlManager->createUrl('/admin'));
        }

        $this->view->title = 'Войти в кабинет';
        
        $model = new Login();

        if ($model->load(Yii::$app->request->post()) 
            && $model->login()) {            
            return $this->redirect(Yii::$app->urlManager->createUrl('/admin'));
        }
        
        $this->layout = 'login';

        return $this->render('login', [
            'model' => $model,
        ]);
    }
    
    
    /**
     * Signup user.
     * @return mixed
     */
    public function actionSignup() {

        $model = new Signup();
        
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $user = new Users();
            $user->login = $model->login;
            $user->email = $model->email;
            $user->setPassword($model->password);
            //$user->auth_key = \Yii::$app->security->generateRandomKey($lenght = 255);
            $user->auth_key = \Yii::$app->security->generateRandomString($lenght = 255);

            //echo '<pre>'; print_r($user); die;
            if ($user->save()) {

                // send registration info on user email
                /*Yii::$app->mailer->compose([
                'html' => 'test',
                'text' => 'test',
                ])
                ->setFrom(['mail@mail.ru' => ''])
                ->setTo($user->email)
                ->setSubject('')
                ->setTextBody('')
                ->setHtmlBody('')
                ->send();*/
                
                $user->login();
                
                return $this->redirect(['/admin']);
               
            } 
        }
        
        $this->layout = 'login';
        
        return $this->render('signup', [
            'model' => $model,
        ]);
    }
    
    /*
     * Logout user method
     */
    public function actionLogout() {
        Yii::$app->user->logout();
        return $this->redirect(Yii::$app->urlManager->createUrl('/admin/login'));
    }

    /**
     * find User model
     */
    protected function findUserModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('User not found...');
    }

    /**
     * find Poster model
     */
    protected function findPosterModel($id)
    {
        if (($model = Posters::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('Poster not found...');
    }

    /**
     * find Category model
     */
    protected function findCategoryModel($id)
    {
        if (($model = Catalog::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('Category not found...');
    }
    /**
     * find Service model
     */
    protected function findServiceModel($id)
    {
        if (($model = AddServices::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('Service not found...');
    }


    /**
     * Renders the add category view for the module
     * @return string
     */
    public function actionCategoryAdd() {
        if( Yii::$app->request->post()) {
            $this->redirect(Yii::$app->urlManager->createUrl('/admin'));
        }
        return $this->render('category-add');
    }

    /**
     * Renders the edit category view for the module
     * @return string
     */
    public function actionCategoryEdit($id) {       
        if( Yii::$app->request->post()) {
            $this->redirect(Yii::$app->urlManager->createUrl('/admin'));
        }
        return $this->render('category-edit',[
            'id' => $id
        ]);
    }
    /**
     * Deletes an existing category model.
     * If deletion is successful, the browser will be redirected to the '/admin' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionCategoryDelete($id) {
        $this->findCategoryModel($id)->delete();
        return $this->redirect(Yii::$app->urlManager->createUrl('/admin'));
    }

    /**
     * Renders the add service view for the module
     * @return string
     */
    public function actionServiceAdd() {        
        if( Yii::$app->request->post()) {
            $this->redirect(Yii::$app->urlManager->createUrl('/admin'));
        }
        return $this->render('service-add');
    }
    /**
     * Renders the edit service view for the module
     * @return string
     */
    public function actionServiceEdit($id) {       
        if( Yii::$app->request->post()) {
            $this->redirect(Yii::$app->urlManager->createUrl('/admin'));
        }
        return $this->render('service-edit',[
            'id' => $id
        ]);
    }
    /**
     * Deletes an existing service model.
     * If deletion is successful, the browser will be redirected to the '/admin' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionServiceDelete($id) {
        $this->findServiceModel($id)->delete();
        return $this->redirect(Yii::$app->urlManager->createUrl('/admin'));
    }

    /**
     * Deletes an existing poster model.
     * If deletion is successful, the browser will be redirected to the '/admin' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionPosterDelete($id) {
        $this->findPosterModel($id)->delete();
        return $this->redirect(Yii::$app->urlManager->createUrl('/admin'));
    }   

}
