<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "posters_materials".
 *
 * @property int $id id материала постера
 * @property int $poster_id id постера
 * @property int $material_id id материала
 * @property double $price цена, руб.
 *
 * @property Posters $poster
 * @property Materials $material
 */
class PostersMaterials extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'posters_materials';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['poster_id', 'material_id', 'price'], 'required'],
            [['poster_id', 'material_id'], 'integer'],
            [['price'], 'number'],
            [['poster_id'], 'exist', 'skipOnError' => true, 'targetClass' => Posters::className(), 'targetAttribute' => ['poster_id' => 'id']],
            [['material_id'], 'exist', 'skipOnError' => true, 'targetClass' => Materials::className(), 'targetAttribute' => ['material_id' => 'id']],
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
            'material_id' => 'Material ID',
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
    public function getMaterial()
    {
        return $this->hasOne(Materials::className(), ['id' => 'material_id']);
    }
}
