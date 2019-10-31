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
     * @var UploadedImage
     */
    public $imageFile;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['src', 'name'], 'required'],
            [['src', 'name'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'extensions' => 'gif, png, jpg, jpeg', 'skipOnEmpty' => true, 'maxSize' => 2048 * 1024, 'tooBig' => 'Размер файла не должен превышать 2 MB'],
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

    /**
     * @return uploaded image file
     */
    public function upload($imageFile, $image){
        if($this->validate()){            
            $filename = 'images/clocks/'.$image;
            $imageFile->saveAs($filename);
            //$this->imageFile->saveAs('images/clocks/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
}
