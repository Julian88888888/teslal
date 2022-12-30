<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use yii\helpers\Url;
use yii\web\UploadedFile;

class UploadForm extends Model
{
	public $image;

    /**
     * @var UploadedFile[]
     */

	public function rules()
    {
        return [
            [['image'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, svg, webp, ico, jpeg, jfif, pjpeg, pjp, bmp', 'maxFiles' => 15],
        ];
    }

    public function attributeLabels()
    {
        return [
            'image' => Yii::t('app', 'Image'),
        ];
    }

    public function upload() {
    	
        if($this->image) {
            $filepath =  '/uploads/' . sha1_file($this->image->tempName) . '.' . $this->image->extension;

            $this->image->saveAs(str_replace('backend', 'frontend', \Yii::getAlias('@webroot')).$filepath);
            return str_replace('/admin', '', Url::base(true)).$filepath;
        }

        return '';
    }

}