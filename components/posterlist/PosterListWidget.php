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
     * если задана поисковая строка $search - выводим найденные элементы
     */
    public $id = null;
    public $search = null;
    public function run() {
        parent::run();
        $view = 'posterlist';
        $_id = $this->id;
        if($this->id){  // если виджет вызван во view с аргументом id
            $view = 'categorylist';
            // кэширование не работает - выдает ошибки!!!
            /*$posters = \Yii::$app->cache->getOrSet('posters_poster_list_1', function () use($_id) {
                return CatalogPosters::find()->distinct()->where(['catalog_id' => $_id])->orderby(['catalog_id' => SORT_ASC]);
            }, 3600);*/
            $posters = CatalogPosters::find()->distinct()->where(['catalog_id' => $this->id])->orderby(['catalog_id' => SORT_ASC]);

        } elseif (!$this->id && $this->search) {    // если виджет вызван во view с поисковым запросом (страница поиска)
            
            mb_internal_encoding('UTF-8');
            $search = str_replace(
                ' ', 
                '', 
                mb_substr(mb_strtoupper($this->search, 'utf-8'), 0, 1, 'utf-8') . mb_substr($this->search, 1, mb_strlen($this->search)-1, 'utf-8')
            );
            $posters = Posters::find()
                ->where(['like', 'replace(articul, " ", "")', $search])
                ->orWhere(['like', 'replace(name, " ", "")', $search])
                ->orWhere(['like', 'replace(autor, " ", "")', $search])
                ->orWhere(['like', 'replace(text, " ", "")', $search]);
            $this->view->title = 'Найдено ('.count($posters->all()).') по запросу "'.$this->search.'"';

        } else {    // если виджет вызван во view без аргумента (главная страница)
            /*$posters = \Yii::$app->cache->getOrSet('posters_poster_list_1', function () {
                return Posters::find()->orderby(['id' => SORT_ASC]);
            }, 3600);*/
            $posters = Posters::find()->orderby(['id' => SORT_ASC]);
            $this->view->title = 'Картины ('.count($posters->all()).')';

        }
        
        if($posters){
            // пагинация
            $countPosters = clone $posters; // счетчик
            $pages = new \yii\data\Pagination([ // создаем объект пагинации
                'totalCount' => $countPosters->count(),
                'pageSize' => 3, // кол-во элементов на странице
                'forcePageParam' => false, 
                'pageSizeParam' => false
                ]);
            // получаем данные с настройками $pages
            $_posters = $posters->offset($pages->offset)
                ->limit($pages->limit)
                ->all();
            return $this->render($view,[
                'posters' => $_posters, // вывод кол-ва элементов = pageSize
                'pages' => $pages,
            ]);
        } else {
            echo '<h4 class="uk-padding uk-text-center">Нет товаров в данной категории...</h4>';
        }
        
    }
}
?>