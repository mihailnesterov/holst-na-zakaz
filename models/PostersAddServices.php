<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "posters_add_services".
 *
 * @property int $id id услуги для постера
 * @property int $poster_id id постера
 * @property int $add_service_id id доп. услуги
 * @property double $price цена, руб.
 *
 * @property Posters $poster
 * @property AddServices $addService
 */
class PostersAddServices extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'posters_add_services';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['poster_id', 'add_service_id', 'price'], 'required'],
            [['poster_id', 'add_service_id'], 'integer'],
            [['price'], 'number'],
            [['poster_id'], 'exist', 'skipOnError' => true, 'targetClass' => Posters::className(), 'targetAttribute' => ['poster_id' => 'id']],
            [['add_service_id'], 'exist', 'skipOnError' => true, 'targetClass' => AddServices::className(), 'targetAttribute' => ['add_service_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'poster_id' => 'Poster ID',
            'add_service_id' => 'Add Service ID',
            'price' => 'Price',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPoster()
    {
        return $this->hasOne(Posters::className(), ['id' => 'poster_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddService()
    {
        return $this->hasOne(AddServices::className(), ['id' => 'add_service_id']);
    }
}
