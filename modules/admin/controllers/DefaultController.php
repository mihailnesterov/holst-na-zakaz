<?php
namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use app\modules\admin\models\Users;
use app\modules\admin\models\Login;
use app\modules\admin\models\Signup;

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
            $model = $this->findUserModel(Yii::$app->user->identity->id);
            $this->view->title = 'Личный кабинет';
            return $this->render('index',[
                'model' => $model
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
}
