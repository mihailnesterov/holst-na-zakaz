<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "posters".
 *
 * @property int $id id постера
 * @property int $articul актикул
 * @property string $name название постера
 * @property string $image картинка
 * @property string $autor автор постера
 * @property int $price цена, руб.
 * @property string $text описание
 * @property int $size_width ширина постера
 * @property int $size_height высота постера
 * @property int $thikness толщина подрамника
 * @property string $color цвет
 * @property string $type тип изделия
 *
 * @property CatalogPosters[] $catalogPosters
 * @property Images[] $images
 * @property PostersAddServices[] $postersAddServices
 * @property PostersMaterials[] $postersMaterials
 * @property PostersSizes[] $postersSizes
 * @property PostersTypes[] $postersTypes
 */
class Posters extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'posters';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['articul', 'name', 'image', 'autor', 'price', 'text', 'size_width', 'size_height', 'thikness', 'color', 'type'], 'required'],
            [['articul', 'price', 'size_width', 'size_height', 'thikness'], 'integer'],
            [['text'], 'string'],
            [['name'], 'string', 'max' => 512],
            [['autor', 'color', 'type', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'articul' => 'Articul',
            'name' => 'Name',
            'image' => 'Image',
            'autor' => 'Autor',
            'price' => 'Price',
            'text' => 'Text',
            'size_width' => 'Size Width',
            'size_height' => 'Size Height',
            'thikness' => 'Thikness',
            'color' => 'Color',
            'type' => 'Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogPosters()
    {
        return $this->hasMany(CatalogPosters::className(), ['poster_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Images::className(), ['poster_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostersAddServices()
    {
        return $this->hasMany(PostersAddServices::className(), ['poster_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostersMaterials()
    {
        return $this->hasMany(PostersMaterials::className(), ['poster_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostersSizes()
    {
        return $this->hasMany(PostersSizes::className(), ['poster_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostersTypes()
    {
        return $this->hasMany(PostersTypes::className(), ['poster_id' => 'id']);
    }
}
