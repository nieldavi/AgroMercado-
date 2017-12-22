<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produto".
 *
 * @property integer $produto_id
 * @property string $nome
 * @property string $descrição
 *
 * @property UsuarioProduto $usuarioProduto
 */
class Produto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'produto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['nome'], 'string', 'max'=>150],
            [['descricao'], 'string', 'max'=>500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'produto_id' => Yii::t('app', 'Produto ID'),
            'nome' => Yii::t('app', 'Nome'),
            'descrição' => Yii::t('app', 'Descrição'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioProduto()
    {
        return $this->hasOne(UsuarioProduto::className(), ['produto_id' => 'produto_id']);
    }
}
