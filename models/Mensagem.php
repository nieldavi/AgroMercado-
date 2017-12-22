<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mensagem".
 *
 * @property integer $mensagem_id
 * @property string $texto
 * @property integer $idRemetente
 * @property integer $lido
 * @property integer $idDestinatario
 *
 * @property Usuario $idRemetente0
 */
class Mensagem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mensagem';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mensagem_id', 'texto', 'idRemetente', 'idDestinatario'], 'required'],
            [['mensagem_id', 'idRemetente', 'lido', 'idDestinatario'], 'integer'],
            [['texto'], 'string'],
            [['idRemetente'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['idRemetente' => 'usuario_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mensagem_id' => Yii::t('app', 'Mensagem ID'),
            'texto' => Yii::t('app', 'Texto'),
            'idRemetente' => Yii::t('app', 'Id Remetente'),
            'lido' => Yii::t('app', 'Lido'),
            'idDestinatario' => Yii::t('app', 'Id Destinatario'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdRemetente0()
    {
        return $this->hasOne(Usuario::className(), ['usuario_id' => 'idRemetente']);
    }
}
