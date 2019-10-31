<?php
namespace app\modules\admin\components\size;
use Yii;
use yii\base\Widget;
use app\models\Sizes;

class SizeWidget extends Widget {
    
    public $id = null;
    
    public function run() {   
        parent::run();
        $model = $this->id ? Sizes::findOne($this->id) : new Sizes();
        $this->view->title = $this->id ? 'Размер: '.$model->width.'x'.$model->height : 'Добавить размер ...';
        if( $model->load(Yii::$app->request->post()) && $model->validate()) {
            if($model->save()) {
                return;
            }
        }
        return $this->render('size', [
            'model' => $model,
        ]);
        
    }
}
?>