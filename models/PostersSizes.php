<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "posters_sizes".
 *
 * @property int $id id размера постера
 * @property int $poster_id id постера
 * @property int $size_id id размера
 * @property double $price цена, руб.
 *
 * @property Posters $poster
 * @property Sizes $size
 */
class PostersSizes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'posters_sizes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['poster_id', 'size_id', 'price'], 'required'],
            [['poster_id', 'size_id'], 'integer'],
            [['price'], 'number'],
            [['poster_id'], 'exist', 'skipOnError' => true, 'targetClass' => Posters::className(), 'targetAttribute' => ['poster_id' => 'id']],
            [['size_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sizes::className(), 'targetAttribute' => ['size_id' => 'id']],
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
            'size_id' => 'Size ID',
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
    public function getSize()
    {
        return $this->hasOne(Sizes::className(), ['id' => 'size_id']);
    }
}
