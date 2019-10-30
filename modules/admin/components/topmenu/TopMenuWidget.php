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
                'url' => '/admin/posters',
                'action' => 'posters'
            ],
            [
                'title' => 'Категории',
                'url' => '/admin/category',
                'action' => 'category'
            ],
            [
                'title' => 'Настройки',
                [
                    'title' => 'Типы картин',
                    'url' => '/admin/types',
                    'action' => 'types'
                ],
                [
                    'title' => 'Доп. услуги',
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
                    'title' => 'Размеры картин',
                    'url' => '/admin/sizes',
                    'action' => 'sizes'
                ]
            ],
            [
                'title' => 'Заказы',
                'url' => '/admin/orders',
                'action' => 'orders'
            ],
            [
                'title' => 'Пользователи',
                'url' => '/admin/users',
                'action' => 'users'
            ]
        ];
        return $this->render('topmenu',[
            'action' => $this->action ? $this->action : 'index',
            'items' => $items
        ]);
    }
}
?>