<?php
namespace app\modules\admin\components\topmenu;
use Yii;
use yii\base\Widget;
// http://fkn.ktu10.com/?q=node/3118
class TopMenuWidget extends Widget {
    public $action = null;
    public function run() {
        parent::run();
        $items = [
            [
                'title' => 'Картины',
                'url' => '/admin',
                'action' => 'index'
            ],
            [
                'title' => 'Категории',
                'url' => '/admin/category',
                'action' => 'category'
            ],
            [
                'title' => 'Типы',
                'url' => '/admin/types',
                'action' => 'types'
            ],
            [
                'title' => 'Доп.услуги',
                'url' => '/admin/services',
                'action' => 'services'
            ],
            [
                'title' => 'Багеты',
                'url' => '/admin/bagets',
                'action' => 'bagets'
            ],
            [
                'title' => 'Материалы',
                'url' => '/admin/materials',
                'action' => 'materials'
            ],
            [
                'title' => 'Часы',
                'url' => '/admin/clocks',
                'action' => 'clocks'
            ],
            [
                'title' => 'Размеры',
                'url' => '/admin/sizes',
                'action' => 'sizes'
            ]
        ];
        return $this->render('topmenu',[
            'action' => $this->action ? $this->action : 'index',
            'items' => $items
        ]);
    }
}
?>