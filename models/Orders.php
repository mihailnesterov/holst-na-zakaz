<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "orders".
 *
 * @property int $id id заказа
 * @property string $name имя клиента
 * @property string $email email клиента
 * @property string $phone телефон клиента
 * @property string $address адрес доставки
 * @property string $date дата доставки
 * @property string $time время доставки
 * @property string $promo промо-код
 * @property string $comment комментарий к заказу
 * @property boolean $status статус заказа
 * @property string $created дата создания заказа
 *
 * @property OrderItems[] $orderItems
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'phone'], 'required'],
            [['comment'], 'string'],
            [['created'], 'safe'],
            [['status'], 'boolean'],
            [['name', 'address'], 'string', 'max' => 255],
            [['email', 'phone', 'promo'], 'string', 'max' => 50],
            [['date', 'time'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'email' => 'Email',
            'phone' => 'Телефон',
            'address' => 'Адрес доставки',
            'date' => 'Дата доставки',
            'time' => 'Время доставки',
            'promo' => 'Промо-код',
            'comment' => 'Комментарий',
            'status' => 'Статус',
            'created' => 'Created',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItems::className(), ['order_id' => 'id']);
    }

    /**
     * add to cart public method
     */
    public function addToCart($poster, $qty=1)
    {
        if(isset($_SESSION['cart'][$poster->id])) {
            $_SESSION['cart'][$poster->id]['qty'] += $qty;
        } else {
            $_SESSION['cart'][$poster->id] = [
                'id' => $poster->id,
                'articul' => $poster->articul,
                'image' => $poster->image,
                'name' => $poster->name,
                'autor' => $poster->autor,
                'price' => $poster->price,
                'qty' => isset($_SESSION['cart'][$poster->id]['qty']) ? $_SESSION['cart'][$poster->id]['qty'] : $qty,
                'text' => $poster->text,
            ];
        }
    }

    /**
     * delete item from cart public method
     */
    public function deleteItemFromCart($id)
    {
        if( !isset($_SESSION['cart'][$id]) ) return false;
        $qty = $_SESSION['cart'][$id]['qty'];
        $_SESSION['cart'][$id]['qty'] -= $qty; // qty minus
        unset($_SESSION['cart'][$id]); // delete item from session
    }

    /**
     * minus 1 item from cart public method
     */
    public function minusItemFromCart($id)
    {
        if( !isset($_SESSION['cart'][$id]) ) return false;
        $_SESSION['cart'][$id]['qty'] -= 1; // minus 1
    }
}
