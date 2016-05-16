<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Pagos".
 *
 * @property integer $id
 * @property integer $idTiposPagos
 * @property string $FechaReciboPago
 * @property string $FechaRealizadoPago
 * @property integer $idDocumentosPago
 * @property string $Descripcion
 *
 * @property Tipospagos $idTiposPagos0
 * @property Documentospagos $idDocumentosPago0
 */
class Pagos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    
    public $image, $filename;
    
    public static function tableName()
    {
        return 'Pagos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idTiposPagos', 'FechaReciboPago', 'FechaRealizadoPago'], 'required'],
            [['idTiposPagos', 'idDocumentosPago'], 'integer'],
            [['FechaReciboPago', 'FechaRealizadoPago', 'Cantidad'], 'safe'],
            [['Descripcion'], 'string'],
            [['image'], 'safe'],
            [['image'], 'file', 'extensions'=>'jpg, gif, png'],
            [['idTiposPagos'], 'exist', 'skipOnError' => true, 'targetClass' => TiposPagos::className(), 'targetAttribute' => ['idTiposPagos' => 'id']],
            [['idDocumentosPago'], 'exist', 'skipOnError' => true, 'targetClass' => DocumentosPagos::className(), 'targetAttribute' => ['idDocumentosPago' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            //'id' => 'ID',
            'idTiposPagos' => 'Tipo de pagos',
            'FechaReciboPago' => 'Fecha Recibo Pago',
            'FechaRealizadoPago' => 'Fecha Realizado Pago',
            'idDocumentosPago' => 'Documentos Pago',
            'Descripcion' => 'Descripción',
            'file' => 'Imagen Recibo',
            'Anio' => 'Año'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTiposPagos0()
    {
        return $this->hasOne(TiposPagos::className(), ['id' => 'idTiposPagos']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDocumentosPago0()
    {
        return $this->hasOne(DocumentosPagos::className(), ['id' => 'idDocumentosPago']);
    }
    
    /**
     * Función para obtener el nombre del Mes
     * @return [type]     [description]
     * @author Fabián Muñoz
     * @date   2016-05-06
     */
    /*public function getMes(){
        switch($this->Mes){
            case 1: return "Enero"; break;
            case 2: return "Febrero"; break;
            case 3: return "Marzo"; break;
            case 4: return "Abril"; break;
            case 5: return "Mayo"; break;
            case 6: return "Junio"; break;
            case 7: return "Julio"; break;
            case 8: return "Agosto"; break;
            case 9: return "Septiembre"; break;
            case 10: return "Octubre"; break;
            case 11: return "Noviembre"; break;
            case 12: return "Diciembre"; break;
            default: return "";break;
        }
    }*/
}
