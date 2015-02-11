<?php

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "seccion".
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $orden
 * @property integer $num_hojas
 * @property integer $album_id
 *
 * @property Album $album
 */
class Seccion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'seccion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['orden', 'num_hojas', 'album_id'], 'integer'],
            [['album_id'], 'required'],
            [['nombre'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '',
            'nombre' => 'Nombre',
            'orden' => 'Orden',
            'num_hojas' => 'Numero de Hojas',
            'album_id' => 'Album',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlbum()
    {
        return $this->hasOne(\app\models\Album::className(), ['id' => 'album_id']);
    }
}
