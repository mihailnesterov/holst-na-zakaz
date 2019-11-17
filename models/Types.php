<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "types".
 *
 * @property int $id id типа постеров
 * @property string $name название типа
 * @property string $src путь к картинке
 * @property double $price цена, руб.
 * @property string $description описание типа постеров
 *
 * @property PostersTypes[] $postersTypes
 */
class Types extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'src', 'price'], 'required'],
            [['description'], 'string'],
            [['price'], 'number'],
            [['name', 'src'], 'string', 'max' => 255],
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
            'src' => 'Src',
            'price' => 'Price',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostersTypes()
    {
        return $this->hasMany(PostersTypes::className(), ['type_id' => 'id']);
    }
}
