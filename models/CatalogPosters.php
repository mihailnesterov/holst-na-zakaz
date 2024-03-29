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
        $result = null;
        if (!$catalog_id) {
            $key = 'catalog_posters_count_all';
            $result = Yii::$app->cache->getOrSet($key, function () {
                return CatalogPosters::find()->select('poster_id')->distinct()->count();
            }, 3600);
        } else {
            $key = 'catalog_posters_count_'.$catalog_id;
            $result = Yii::$app->cache->getOrSet($key, function () use($catalog_id) {
                return CatalogPosters::find()->where(['catalog_id' => $catalog_id])->count();
            }, 3600);
        }
        return $result;
    }
}
