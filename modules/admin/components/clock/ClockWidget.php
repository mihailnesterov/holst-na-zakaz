<?php
namespace app\modules\admin\components\clock;
use Yii;
use yii\base\Widget;
use yii\web\UploadedFile;
use app\models\Clocks;

class ClockWidget extends Widget {
    
    public $id = null;
    
    public function run() {   
        parent::run();
        $model = $this->id ? Clocks::findOne($this->id) : new Clocks();
        
        $this->view->title = $this->id ? 'Часы: '.$model->name : 'Добавить часы ...';
        if( $model->load(Yii::$app->request->post()) && $model->validate()) { 
            if($model->save()) {   
                $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
                if ($model->imageFile) {
                    $model->upload($model->imageFile, $model->src);
                }
                return;
            }
        }
        return $this->render('clock', [
            'model' => $model,
        ]);
        
    }
}
?>