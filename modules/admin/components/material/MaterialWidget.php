<?php
namespace app\modules\admin\components\material;
use Yii;
use yii\base\Widget;
use app\models\Materials;

class MaterialWidget extends Widget {
    
    public $id = null;
    
    public function run() {   
        parent::run();
        $model = $this->id ? Materials::findOne($this->id) : new Materials();
        $this->view->title = $this->id ? 'Материал: '.$model->name : 'Добавить материал ...';
        if( $model->load(Yii::$app->request->post()) && $model->validate()) {
            if($model->save()) {
                return;
            }
        }
        return $this->render('material', [
            'model' => $model,
        ]);
        
    }
}
?>