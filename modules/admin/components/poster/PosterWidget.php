<?php
namespace app\modules\admin\components\poster;
use Yii;
use yii\base\Widget;
use yii\web\UploadedFile;
use app\models\Posters;

class PosterWidget extends Widget {
    
    public $id = null;
    
    public function run() {   
        parent::run();
        $model = $this->id ? Posters::findOne($this->id) : new Posters();
        $this->view->title = $this->id ? 'Картина: '.$model->articul : 'Добавить картину ...';
        if( $model->load(Yii::$app->request->post()) && $model->validate()) { 
            if($model->save()) {   
                $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
                if ($model->imageFile) {
                    $model->upload($model->imageFile, $model->image);
                }
                return;
            }
        }
        return $this->render('poster', [
            'model' => $model,
        ]);
        
    }
}
?>