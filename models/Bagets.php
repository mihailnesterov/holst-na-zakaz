<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bagets".
 *
 * @property int $id id багета
 * @property string $articul артикул
 * @property string $material материал
 * @property int $width ширина
 * @property string $color цвет
 * @property string $image картинка
 * @property double $price цена, руб.
 */
class Bagets extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bagets';
    }

    /**
     * @var UploadedImage
     */
    public $imageFile;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['articul', 'material', 'width', 'color', 'image', 'price'], 'required'],
            [['width'], 'integer'],
            [['price'], 'number'],
            [['articul'], 'string', 'max' => 10],
            [['material', 'color', 'image'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'extensions' => 'png, jpg, jpeg', 'skipOnEmpty' => true, 'maxSize' => 2048 * 1024, 'tooBig' => 'Размер файла не должен превышать 2 MB'],
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
            'material' => 'Material',
            'width' => 'Width',
            'color' => 'Color',
            'image' => 'Image',
            'price' => 'Price',
        ];
    }

    /**
     * @return uploaded image file
     */
    
    public function upload($imageFile, $image){
        if($this->validate()){            
            $filename = 'images/baguettes/'.$image;
            $imageFile->saveAs($filename);
            //$this->imageFile->saveAs('images/baguettes/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }

    /*public function upload1()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('images/baguettes/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }*/
}
