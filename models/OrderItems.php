<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_items".
 *
 * @property int $id id пункта заказа
 * @property int $order_id id заказа
 * @property int $poster_id id постера
 * @property int $width ширина, см
 * @property int $height высота, см
 * @property string $type тип постера
 * @property string $material материал
 * @property int $podramnik толщина подрамника, см.
 * @property string $add_services дополнительные услуги
 * @property int $baget_id id багета
 * @property int $clock_id id часов
 * @property double $price цена, руб.
 * @property int $qty количество, шт.
 * @property string $created дата создания
 *
 * @property Orders $order
 */
class OrderItems extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'poster_id', 'width', 'height', 'podramnik', 'baget_id', 'clock_id', 'qty'], 'integer'],
            [['add_services'], 'string'],
            [['price'], 'number'],
            [['created'], 'safe'],
            [['type', 'material'], 'string', 'max' => 255],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::className(), 'targetAttribute' => ['order_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'poster_id' => 'Poster ID',
            'width' => 'Width',
            'height' => 'Height',
            'type' => 'Type',
            'material' => 'Material',
            'podramnik' => 'Podramnik',
            'add_services' => 'Add Services',
            'baget_id' => 'Baget ID',
            'clock_id' => 'Clock ID',
            'price' => 'Price',
            'qty' => 'Qty',
            'created' => 'Created',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Orders::className(), ['id' => 'order_id']);
    }
}
