<?php

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "album".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $descripcion
 * @property integer $ano
 * @property string $estado
 * @property integer $usuario_id
 *
 * @property Usuario $usuario
 * @property Seccion[] $seccions
 */
class Album extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'album';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usuario_id'], 'required'],
            [['id', 'usuario_id'], 'integer'],
            [['estado'], 'boolean'],
            [['ano'], 'safe'],
            [['descripcion'], 'string'],
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
            'descripcion' => 'Descripción',
            'ano' => 'Año',
            'estado' => 'Estado',
            'usuario_id' => 'Usuario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(\app\models\Usuario::className(), ['id' => 'usuario_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeccions()
    {
        return $this->hasMany(\app\models\Seccion::className(), ['album_id' => 'id']);
    }
}
