<?php

namespace app\models;

use Yii;

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
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'address' => 'Address',
            'date' => 'Date',
            'time' => 'Time',
            'promo' => 'Promo',
            'comment' => 'Comment',
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
    public function addToCart($poster)
    {
        if(isset($_SESSION['cart'][$poster->id])) {
            //$_SESSION['cart'][$poster->id]['qty'] += $qty;
            print_r($_SESSION['cart'][$poster->id]);
        } else {
            $_SESSION['cart'][$poster->id] = [
                'id' => $poster->id,
                'articul' => $poster->articul,
                'image' => $poster->image,
                'name' => $poster->name,
                'autor' => $poster->autor,
                'price' => $poster->price,
                'text' => $poster->text,
            ];

        }
    }
}
