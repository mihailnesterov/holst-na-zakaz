<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "materials".
 *
 * @property int $id id материала
 * @property string $name название материала
 * @property double $price цена, руб.
 * @property string $description описание материала
 *
 * @property PostersMaterials[] $postersMaterials
 */
class Materials extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'materials';
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
            [['name'], 'string', 'max' => 255],
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
    public function getPostersMaterials()
    {
        return $this->hasMany(PostersMaterials::className(), ['material_id' => 'id']);
    }
}
