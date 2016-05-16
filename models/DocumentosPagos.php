<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "DocumentosPagos".
 *
 * @property integer $id
 * @property string $Nombre
 * @property integer $TipoDocumento
 */
class DocumentosPagos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'DocumentosPagos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'TipoDocumento'], 'integer'],
            [['Nombre'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Nombre' => 'Nombre',
            'TipoDocumento' => 'Tipo Documento',
        ];
    }
}
