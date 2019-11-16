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

    /** + метод для подсчета кол-ва постеров в категории
     * @return \yii\db\ActiveQuery
     */
    public static function getPostersInCategoryCount($catalog_id)
    {
        Yii::$app->cache->getOrSet('posters_in_category_count', function () use($catalog_id) {
            return \app\models\CatalogPosters::find()->where(['catalog_id' => $catalog_id])->count();
        }, 3600);
        //return \app\models\CatalogPosters::find()->where(['catalog_id' => $catalog_id])->count();
    }

    /** + метод для подсчета кол-ва подкатегорий в категории
     * @return \yii\db\ActiveQuery
     */
    public static function getSubCategoryCount($catalog_id)
    {
        $count = Yii::$app->cache->getOrSet('sub_category_count', function () use($catalog_id) {
            return \app\models\Catalog::find()->where(['parent' => $catalog_id])->count();
        }, 3600);
        //return \app\models\Catalog::find()->where(['parent' => $catalog_id])->count();
    }
    
    /** + метод для вывода подкатегорий в категории
     * @return \yii\db\ActiveQuery
     */
    public static function getSubCategories($catalog_id)
    {
        Yii::$app->cache->getOrSet('sub_categories', function () use($catalog_id) {
            return \app\models\Catalog::find()->where(['parent' => $catalog_id])->all();
        }, 3600);
        //return \app\models\Catalog::find()->where(['parent' => $catalog_id])->all();
    }
}
