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
 * @property int $type_id id типа постера
 * @property int $material_id id материала
 * @property double $service_1 сумма услуги №1
 * @property double $service_2 сумма услуги №2
 * @property double $service_3 сумма услуги №3
 * @property double $service_4 сумма услуги №4
 * @property double $service_5 сумма услуги №5
 * @property int $baget_id id багета
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
            [['order_id', 'poster_id', 'width', 'height', 'type_id', 'material_id', 'baget_id'], 'integer'],
            [['service_1', 'service_2', 'service_3', 'service_4', 'service_5'], 'number'],
            [['created'], 'safe'],
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
            'type_id' => 'Type ID',
            'material_id' => 'Material ID',
            'service_1' => 'Service 1',
            'service_2' => 'Service 2',
            'service_3' => 'Service 3',
            'service_4' => 'Service 4',
            'service_5' => 'Service 5',
            'baget_id' => 'Baget ID',
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
