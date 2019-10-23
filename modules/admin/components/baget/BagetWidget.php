<?php
namespace app\modules\admin\components\baget;
use Yii;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;
use app\models\Bagets;

class BagetWidget extends Widget {
    
    public $id = null;
    
    public function run() {   
        parent::run();
        $model = $this->id ? Bagets::findOne($this->id) : new Bagets();
        $materials = [  // выбор материала в выпадающем списке
            'Пластик' => 'Пластик',
            'Дерево' => 'Дерево',
        ];
        $width = [  // выбор толщины в выпадающем списке
            '2' => '2',
            '4' => '4',
        ];
        $colors = [   // выбор цвета в выпадающем списке
            'Золотой' => 'Золотой',
            'Серебряный' => 'Серебряный',
            'Бронза' => 'Бронза',
            'Темное золото' => 'Темное золото',
        ];
        $this->view->title = $this->id ? 'Багет: '.$model->articul : 'Добавить багет ...';
        if( $model->load(Yii::$app->request->post()) && $model->validate()) { 
            if($model->save()) {   
                $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
                if ($model->imageFile != null) {
                    $model->upload($model->imageFile, $model->image);
                }
                return;
            }
        }
        return $this->render('baget', [
            'model' => $model,
            'materials' => $materials,
            'width' => $width,
            'colors' => $colors,
        ]);
        
    }
}
?>