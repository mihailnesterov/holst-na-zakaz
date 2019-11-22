<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "types_modules".
 *
 * @property int $id id модуля
 * @property int $type_id id типа
 * @property string $src картинка модуля
 * @property double $price цена, руб.
 *
 * @property Types $type
 */
class TypesModules extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'types_modules';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_id', 'src'], 'required'],
            [['type_id'], 'integer'],
            [['price'], 'number'],
            [['src'], 'string', 'max' => 255],
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
            'type_id' => 'Type ID',
            'src' => 'Src',
            'price' => 'Price',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(Types::className(), ['id' => 'type_id']);
    }
}
