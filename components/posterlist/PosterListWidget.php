<?php
namespace app\components\posterlist;
use yii\base\Widget;
use app\models\Posters;
use app\models\CatalogPosters;

class PosterListWidget extends Widget 
{
    /**
     * проблема - нужно выводить Posters если главная, а если catalog/id,
     * то выводить из CatalogPosters все с catalog_id == id (distinct)
     */
    public $id = null;
    public function run() {
        parent::run();
        $view = 'posterlist';
        if($this->id){  // если виджет вызван во view с аргументом id
            $view = 'categorylist';
            $posters = CatalogPosters::find()->distinct()->where(['catalog_id' => $this->id])->orderby(['catalog_id' => SORT_ASC]);
        } else {    // если виджет вызван во view без аргумента (главная страница)
            $posters = Posters::find()->orderby(['id' => SORT_ASC]);
            $this->view->title = 'Картины ('.count($posters->all()).')';
        }
        
        if($posters){
            // пагинация
            $countPosters = clone $posters; // счетчик
            $pages = new \yii\data\Pagination([ // создаем объект пагинации
                'totalCount' => $countPosters->count(),
                'pageSize' => 3, // кол-во эл-в на странице
                'forcePageParam' => false, 
                'pageSizeParam' => false
                ]);
            // получаем данные с настройками $pages
            $_posters = $posters->offset($pages->offset)
                ->limit($pages->limit)
                ->all();
            return $this->render($view,[
                'posters' => $_posters, //!
                'pages' => $pages,
            ]);
        } else {
            echo '<h4 class="uk-padding uk-text-center">Нет товаров в данной категории...</h4>';
        }
        
    }
}
?>