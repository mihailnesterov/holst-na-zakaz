<?php
namespace app\modules\admin\components\service;
use Yii;
use yii\base\Widget;
use app\models\AddServices;

class ServiceWidget extends Widget {
    
    public $id = null;
    
    public function run() {   
        parent::run();
        $model = $this->id ? AddServices::findOne($this->id) : new AddServices();
        $this->view->title = $this->id ? 'Услуга: '.$model->name : 'Добавить услугу ...';
        if( $model->load(Yii::$app->request->post()) && $model->validate()) {
            if($model->save()) {
                return;
            }
        }
        return $this->render('service', [
            'model' => $model,
        ]);
        
    }
}
?>