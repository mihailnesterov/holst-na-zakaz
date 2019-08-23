<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "catalog".
 *
 * @property int $id id категории
 * @property string $name название категории
 * @property int $parent id родительской категории
 * @property string $description описание категории
 * @property string $keywords ключевые слова
 *
 * @property CatalogPosters[] $catalogPosters
 */
class Catalog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'catalog';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'keywords'], 'required'],
            [['parent'], 'integer'],
            [['description'], 'string'],
            [['name', 'keywords'], 'string', 'max' => 255],
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
            'parent' => 'Parent',
            'description' => 'Description',
            'keywords' => 'Keywords',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogPosters()
    {
        return $this->hasMany(CatalogPosters::className(), ['catalog_id' => 'id']);
    }
}
