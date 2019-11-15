<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "add_services".
 *
 * @property int $id id доп. услуги
 * @property string $name название доп. услуги
 * @property double $price цена, руб.
 * @property string $description описание доп. услуги
 *
 * @property PostersAddServices[] $postersAddServices
 */
class AddServices extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'add_services';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'price'], 'required'],
            [['price'], 'number'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 512],
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
            'price' => 'Price',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostersAddServices()
    {
        return $this->hasMany(PostersAddServices::className(), ['add_service_id' => 'id']);
    }
}
