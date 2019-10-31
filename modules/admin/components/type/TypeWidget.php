<?php
namespace app\modules\admin\components\type;
use Yii;
use yii\base\Widget;
use app\models\Types;

class TypeWidget extends Widget {
    
    public $id = null;
    
    public function run() {   
        parent::run();
        $model = $this->id ? Types::findOne($this->id) : new Types();
        $this->view->title = $this->id ? 'Тип: '.$model->name : 'Добавить тип ...';
        if( $model->load(Yii::$app->request->post()) && $model->validate()) {
            if($model->save()) {
                return;
            }
        }
        return $this->render('type', [
            'model' => $model,
        ]);
        
    }
}
?>