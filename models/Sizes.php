<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sizes".
 *
 * @property int $id id размера
 * @property int $width ширина
 * @property int $height высота
 *
 * @property PostersSizes[] $postersSizes
 */
class Sizes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sizes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['width', 'height'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'width' => 'Width',
            'height' => 'Height',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostersSizes()
    {
        return $this->hasMany(PostersSizes::className(), ['size_id' => 'id']);
    }
}
