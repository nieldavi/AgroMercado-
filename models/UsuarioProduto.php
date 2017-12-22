<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario_produto".
 *
 * @property integer $produto_id
 * @property string $preco
 * @property integer $usuario_usuario_id
 *
 * @property Produto $produto
 * @property Usuario $usuarioUsuario
 */
class UsuarioProduto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario_produto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['produto_id', 'usuario_usuario_id'], 'required'],
            [['produto_id', 'usuario_usuario_id'], 'integer'],
            [['preco'], 'decimal'],
            [['produto_id'], 'exist', 'skipOnError' => true, 'targetClass' => Produto::className(), 'targetAttribute' => ['produto_id' => 'produto_id']],
            [['usuario_usuario_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['usuario_usuario_id' => 'usuario_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'produto_id' => Yii::t('app', 'Produto ID'),
            'preco' => Yii::t('app', 'Preco'),
            'usuario_usuario_id' => Yii::t('app', 'Usuario Usuario ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduto()
    {
        return $this->hasOne(Produto::className(), ['produto_id' => 'produto_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioUsuario()
    {
        return $this->hasOne(Usuario::className(), ['usuario_id' => 'usuario_usuario_id']);
    }
}
