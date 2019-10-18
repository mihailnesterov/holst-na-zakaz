<?php
namespace app\modules\admin\components\category;
use Yii;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
use app\models\Catalog;

class CategoryWidget extends Widget {
    
    public $id = null;
    
    public function run() {
        
        parent::run();
        // получаем запись из Catalog по id или создаем новую запись
        $model = $this->id ? Catalog::findOne($this->id) : new Catalog();
        
        // выбираем все категории, чтобы сформировать выпадающий список
        // список нужен, чтобы можно было выбрать родительскую категорию
        $catalog = Catalog::find()->all();
        // map - преобразует объект в массив из элементов id и name
        $items = ArrayHelper::map($catalog,'id','name');
        // задаем параметры для дефолтного пункта списка
        $params = [
            'prompt' => [
                'text' => 'без родительской',
                'options' => [
                    'value' => 0,
                    'class' => 'uk-background-muted',
                    /*'selected' => 'selected'*/
                ]
            ]
        ];

        // формируем заголовок страницы
        $this->view->title = $this->id ? 'Категория: '.$model->name : 'Добавить категорию ...';        
        
        // обрабатываем post на сохранение записи
        if( $model->load(Yii::$app->request->post()) && $model->validate()) {
            if($model->save()) {
                return;
            }
        }

        // выполняем рендер виджета (views/category.php)
        // в рендер передаем данные для вывода в view
        return $this->render('category', [
            'model' => $model,
            'items' => $items,
            'params' => $params,
        ]);
        
    }
}
?>