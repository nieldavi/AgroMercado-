<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property integer $usuario_id
 * @property string $nome
 * @property string $sobrenome
 * @property string $data_de_nasc
 * @property integer $endereco_id
 * @property string $email
 * @property string $login
 * @property string $senha
 * @property string $cpf
 * @property integer $produtor
 *
 * @property Mensagem[] $mensagems
 * @property Endereco $endereco
 * @property UsuarioProduto[] $usuarioProdutos
 */
/**
* 
*/
class Usuario extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $tipo;
    const SCENARIO_CLIENTE = 'cliente';
    const SCENARIO_PRODUTOR = 'produtor';
    const SCENARIO_LOGIN = 'login';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario';
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_LOGIN] = ['login', 'senha'];
        $scenarios[self::SCENARIO_CLIENTE] = ['nome', 'sobrenome',  'email', 'login', 'senha'];
        $scenarios[self::SCENARIO_PRODUTOR] = ['nome', 'sobrenome',  'email', 'login', 'senha', 'endereco', 'bairro', 'cidade', 'cep', 'numero', 'estado', 'pais', 'latitude', 'longitude'];
        return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {

        if(isset($this->dirtyAttributes['senha'])){
            $this->senha=sha1($this->senha);
        }

        if ($insert) {
            $this->produtor = ($this->tipo == 'produtor');
        }


        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->authkey = \Yii::$app->security->generateRandomString(45);
                $this->authtoken = \Yii::$app->security->generateRandomString(90);
            }
            return true;
        }
        return false;
    }

    public function rules()
    {
        return [
            [['nome', 'sobrenome', 'email', 'login', 'senha','tipo'], 'required','on'=>'default'],
            [['nome', 'sobrenome', 'login', 'senha'], 'required','on'=>self::SCENARIO_CLIENTE],
            [['nome', 'sobrenome', 'email', 'login', 'senha'], 'required','on'=>self::SCENARIO_PRODUTOR],
            [[ 'login', 'senha'], 'required','on'=>self::SCENARIO_LOGIN],
            [['nome', 'sobrenome', 'email'], 'string'],
            ['email','email'],
            // [['data_de_nasc'], 'safe'],


            [['endereco_id', 'produtor'], 'integer'],
            [['login', 'telefone'], 'string', 'max' => 15],
            [['authtoken'], 'string', 'max' => 90],
            [['cpf', 'authkey', 'senha'], 'string', 'max' => 45],
            [['cpf', 'login', 'authtoken', 'email'], 'unique'],
            [['cpf'], 'number', 'integerOnly'=>true],
            [['endereco_id',], 'exist', 'skipOnError' => true, 'targetClass' => Endereco::className(), 'targetAttribute' => ['endereco_id' => 'endereco_id']],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'usuario_id' => Yii::t('app', 'Usuario ID'),
            'nome' => Yii::t('app', 'Nome'),
            'sobrenome' => Yii::t('app', 'Sobrenome'),
            //'data_de_nasc' => Yii::t('app', 'Data De Nasc'),
            'endereco_id' => Yii::t('app', 'Endereco ID'),
            'email' => Yii::t('app', 'Email'),
            'login' => Yii::t('app', 'Login'),
            'senha' => Yii::t('app', 'Senha'),
            'cpf' => Yii::t('app', 'Cpf'),
            'produtor' => Yii::t('app', 'Produtor'),
            'authtoken' => Yii::t('app', 'Authtoken'),
            'authkey' => Yii::t('app', 'Authkey'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMensagems()
    {
        return $this->hasMany(Mensagem::className(), ['idRemetente' => 'usuario_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEndereco()
    {
        return $this->hasOne(Endereco::className(), ['endereco_id' => 'endereco_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioProdutos()
    {
        return $this->hasMany(UsuarioProduto::className(), ['usuario_usuario_id' => 'usuario_id']);
    }


    public static function findIdentity($id)
    {
        return self::findOne(['usuario_id'=>$id]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return self::findOne(['authtoken'=>$token]);

    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return self::findOne(['login'=>$username]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->usuario_id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authkey;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authkey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->senha === sha1($password);
    }
}
