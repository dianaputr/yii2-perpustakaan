<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "penerbit".
 *
 * @property integer $id
 * @property string $nama
 * @property string $alamat
 * @property string $lat
 * @property string $lng
 * @property integer $tahun_terbit
 */
class Penerbit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'penerbit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lng', 'tahun_terbit'], 'required'],
            [['tahun_terbit'], 'integer'],
            [['nama'], 'string', 'max' => 255],
            [['alamat', 'lat', 'lng'], 'string', 'max' => 100],
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
            'alamat' => 'Alamat',
            'lat' => 'Lat',
            'lng' => 'Lng',
            'tahun_terbit' => 'Tahun Terbit',
        ];
    }

     public static function getCount()
    {
        return self::find()->count();
    }
}
