<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;
use yii\Helpers\ArrayHelper;

/**
 * This is the model class for table "buku".
 *
 * @property integer $id
 * @property string $nama
 * @property integer $id_jenis
 * @property integer $id_penulis
 * @property string $cover
 *
 * @property Jenis $idJenis
 * @property Penulis $idPenulis
 * @property Peminjaman[] $peminjamen
 */
class Buku extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;
    public static function tableName()
    {
        return 'buku';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_jenis', 'id_penulis'], 'integer'],
            [['id_penulis', 'cover'], 'required'],
            [['file'],'file'],
            [['nama', 'cover'], 'string', 'max' => 255],
            /*[['cover'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],*/
            [['id_jenis'], 'exist', 'skipOnError' => true, 'targetClass' => Jenis::className(), 'targetAttribute' => ['id_jenis' => 'id']],
            [['id_penulis'], 'exist', 'skipOnError' => true, 'targetClass' => Penulis::className(), 'targetAttribute' => ['id_penulis' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'id_jenis' => 'Jenis',
            'id_penulis' => 'Penulis',
            'file' => 'Cover',
        ];
    }

    /*public function upload()
    {
        if ($this->validate()) {
            $this->cover->saveAs('uploads/' . $this->cover->baseName . '.' . $this->cover->extension);
            return true;
        } else {
            return false;
        }
    }*/


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdJenis()
    {
        return $this->hasOne(Jenis::className(), ['id' => 'id_jenis']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPenulis()
    {
        return $this->hasOne(Penulis::className(), ['id' => 'id_penulis']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeminjamen()
    {
        return $this->hasMany(Peminjaman::className(), ['id_buku' => 'id']);
    }

    /*cara pertama menggunakan function getrelationfield*/
    public function getrelationfield($relation,$field)
    {
        if (!empty($this->$relation->$field)) {
            return $this->$relation->$field;
        }
        else
        {
            return null;
        }
    }
    public static function getList()
    {
        return ArrayHelper::map(Buku::find()->all(),'id','nama');
    }

   
}