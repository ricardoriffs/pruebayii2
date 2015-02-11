<?php

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "usuario".
 *
 * @property integer $id
 * @property string $usuario
 * @property string $clave
 *
 * @property Album[] $albums
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['usuario', 'clave'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'usuario' => 'Usuario',
            'clave' => 'Clave',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlbums()
    {
        return $this->hasMany(\app\models\Album::className(), ['usuario_id' => 'id']);
    }
}
