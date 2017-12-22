<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "endereco".
 *
 * @property integer $endereco_id
 * @property string $endereco
 * @property string $endereco2
 * @property string $bairro
 * @property integer $cidade_id
 * @property string $cep
 * @property string $telefone
 * @property double $latitude
 * @property double $longitude
 *
 * @property Cidade $cidade
 * @property Usuario[] $usuarios
 */
class Endereco extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'endereco';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['endereco', 'bairro', 'cep', 'numero', 'cidade', 'numero', 'estado', 'pais'], 'required'],
            [['endereco', 'bairro', 'cidade'], 'string', 'max' => 200],
            [['latitude', 'longitude'], 'number'],
            [['cep'], 'string', 'max' => 9],
            [['numero'], 'string', 'max' => 15],
            [['estado', 'pais'], 'string', 'max' => 45],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'endereco_id' => Yii::t('app', 'Endereco ID'),
            'endereco' => Yii::t('app', 'Endereco'),
            'bairro' => Yii::t('app', 'Bairro'),
            'cep' => Yii::t('app', 'Cep'),
            'telefone' => Yii::t('app', 'Telefone'),
            'latitude' => Yii::t('app', 'Latitude'),
            'longitude' => Yii::t('app', 'Longitude'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCidade()
    {
        return $this->hasOne(Cidade::className(), ['cidade_id' => 'cidade_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuario::className(), ['endereco_id' => 'endereco_id']);
    }
}
