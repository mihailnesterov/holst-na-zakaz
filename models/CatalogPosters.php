<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "catalog_posters".
 *
 * @property int $id id записи
 * @property int $catalog_id id каталога
 * @property int $poster_id id постера
 *
 * @property Catalog $catalog
 * @property Posters $poster
 */
class CatalogPosters extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'catalog_posters';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['catalog_id', 'poster_id'], 'required'],
            [['catalog_id', 'poster_id'], 'integer'],
            [['catalog_id'], 'exist', 'skipOnError' => true, 'targetClass' => Catalog::className(), 'targetAttribute' => ['catalog_id' => 'id']],
            [['poster_id'], 'exist', 'skipOnError' => true, 'targetClass' => Posters::className(), 'targetAttribute' => ['poster_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'catalog_id' => 'Catalog ID',
            'poster_id' => 'Poster ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalog()
    {
        return $this->hasOne(Catalog::className(), ['id' => 'catalog_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPoster()
    {
        return $this->hasOne(Posters::className(), ['id' => 'poster_id']);
    }

    /** + метод для подсчета кол-ва постеров в категории
     * @return \yii\db\ActiveQuery
     */
    public static function getCategoryCount($catalog_id=null)
    {
        if (!$catalog_id) {
            Yii::$app->cache->getOrSet('catalog_posters_1', function () {
                return CatalogPosters::find()->select('poster_id')->distinct()->count();
            }, 3600);
        } else {
            Yii::$app->cache->getOrSet('catalog_posters_2', function () use($catalog_id) {
                return CatalogPosters::find()->where(['catalog_id' => $catalog_id])->count();
            }, 3600);
        }
    }
}
