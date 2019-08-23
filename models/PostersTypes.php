<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "posters_types".
 *
 * @property int $id id типа постера
 * @property int $poster_id id постера
 * @property int $type_id id типа
 * @property double $price цена, руб.
 *
 * @property Posters $poster
 * @property Types $type
 */
class PostersTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'posters_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['poster_id', 'type_id', 'price'], 'required'],
            [['poster_id', 'type_id'], 'integer'],
            [['price'], 'number'],
            [['poster_id'], 'exist', 'skipOnError' => true, 'targetClass' => Posters::className(), 'targetAttribute' => ['poster_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => Types::className(), 'targetAttribute' => ['type_id' => 'id']],
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
            'type_id' => 'Type ID',
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
    public function getType()
    {
        return $this->hasOne(Types::className(), ['id' => 'type_id']);
    }
}
