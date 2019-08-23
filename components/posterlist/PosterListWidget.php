<?php
namespace app\components\posterlist;
use yii\base\Widget;
use app\models\Posters;

class PosterListWidget extends Widget 
{
    public $id = null;
    public function run() {
        parent::run();
        $posters = Posters::find()->orderby(['id' => SORT_ASC]);
        if($posters){
            $this->view->title = 'Каталог постеров ('.count($posters->all()).')';
            $this->view->registerMetaTag([
                'name' => 'keywords',
                'content' => 'каталог постеров'
            ]);
            $this->getView()->registerMetaTag([
                'name' => 'description',
                'content' => 'описание каталога постеров'
            ]);
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
            return $this->render('posterlist',[
                'posters' => $_posters, //!
                'pages' => $pages,
            ]);
        } else {
            echo '<h4 class="uk-padding uk-text-center">Нет товаров в данной категории...</h4>';
        }
        
    }
}
?>