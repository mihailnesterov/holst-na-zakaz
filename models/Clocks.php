<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clocks".
 *
 * @property int $id id часов
 * @property string $src картинка
 * @property string $name название
 */
class Clocks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clocks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['src', 'name'], 'required'],
            [['src', 'name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'src' => 'Src',
            'name' => 'Name',
        ];
    }
}
