<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Usuario;
use app\models\Produto;
use app\models\Endereco;
use app\models\UsuarioSearch;
use yii\bootstrap\Alert;


class SiteController extends Controller
{

    public $layout='agroMercado';
   
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            /*'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],*/
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('indexAgro');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionCadastro1()
    {

        $model = new Usuario();
        if ($model->load(Yii::$app->request->post())) {
            $model->save();
        }

        return $this->render('cadastroAgro',[
            'model'=>$model
            ]);
    }
    public function actionMapa()
    {
        return $this->render('mapaAgro');
    }
    public function actionMapaa()
    {
        return $this->render('testeMapaAgro');
    }
    public function actionProdutos()
    {
        return $this->render('produtosAgro');
    }
    public function actionCadastro()
    {
        $model = new Usuario();
        $endereco = new Endereco();
        if ($model->load(Yii::$app->request->post()) && $endereco->load(Yii::$app->request->post())) {
            
            if ($endereco->save()) {
                $model->endereco_id = $endereco->endereco_id;

                if ($model->tipo == 'cliente') $model->scenario = Usuario::SCENARIO_CLIENTE;
                else if ($model->tipo == 'produtor') $model->scenario = Usuario::SCENARIO_PRODUTOR;

                if ($model->save()) {
                    Yii::$app->user->login($model, 60*10);
                        echo Alert::widget([
                            'options' => [
                                'class' => 'alert-info',
                            ],
                            'body' => 'Say hello...',
                        ]);
                    return $this->redirect(['site/index']);
                }
            }
        }
        return $this->render('cadastroAgroOficial',[
            'model'=>$model,
            'endereco'=>$endereco
        ]);
    }

    /**/

    //public function actionCadastroBemSucedido() {
        //return $this->render('bemVindo');
    //}
    public function actionCadastroProduto()
    {
        $model = new Produto();
        if ($model->load(Yii::$app->request->post())) {
            $model->save();
        }

        return $this->render('cadastroProdutoAgro',[
            'model'=>$model
            ]);
    }

    public function actionCriar()
    {
        $model = new Usuario();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->usuario_id]);
        } else {
            return $this->render('criar', [
                'model' => $model,
            ]);
        }
    }
     
    public function actionConta()
    {
        $usuario = Yii::$app->user->identity;
        return $this->render('minhaConta', [
            'usuario' => $usuario,
        ]);
    }
    protected function findModel($id)
    {
        if (($model = Usuario::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionContaEx()
    {
        $searchModel = new UsuarioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('minhaConta', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

     public function actionVisao($id)
    {
        return $this->render('visao', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['minhaConta', 'id' => $model->usuario_id]);
        } else {
            return $this->render('..\usuario\update', [
                'model' => $model,
            ]);
        }
    }

      public function actionQuemSomos()
    {
        return $this->render('quemSomos');
    }

    public function actionDelete()
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionJsonProdutores($produto=null, $produtor = null, $cidade=null, $estado = null) {
        $query = Usuario::find()->where(['usuario.produtor'=>1])->andWhere(['not',['usuario.endereco_id'=>null]]);
        if (!empty($produto)) {
            $subConsulta = Produto::find()->select('usuario_produto.usuario_usuario_id')->innerJoin('usuario_produto','usuario_produto.produto_id = produto.produto_id');
            $subConsulta->where(['like','produto.nome',$produto]);

            $query->andWhere(['in','usuario.usuario_id',$subConsulta]);
        }
        if (!empty($produtor)) {
            $query->andWhere(['like','usuario.nome',$produtor]);
        }
        if (!empty($cidade) || !empty($estado)) {
            $query->innerJoin('endereco','endereco.endereco_id = usuario.endereco_id');
            if (!empty($cidade)) {
                $query->andWhere(['like','endereco.cidade',$cidade]);
            }

            if (!empty($estado)) {
                $query->andWhere(['like','endereco.estado',$estado]);
            }
        }
        $data = $query->all();
        //$data = Usuario::find()->where(['not',['endereco_id'=>null]])->all();
        //$data = Usuario::find()->where(['produtor'=>1])->all();
        $resultado = [];
        foreach ($data as $produtor) {
            $resultado[] = [
                'id'=>$produtor->usuario_id,
                'nome'=>$produtor->nome,
                'sobrenome'=>$produtor->sobrenome,
                'telefone'=>$produtor->telefone,
                'latitude'=>$produtor->endereco->latitude,
                'longitude'=>$produtor->endereco->longitude,
                'cidade'=>$produtor->endereco->cidade,
                'estado'=>$produtor->endereco->estado,
            ];
        }

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        //\Yii::$app->response->format = \yii\web\Response::FORMAT_XML;
        
        return $resultado;
    }

      public function actionMapa3()
    {
        return $this->render('testeMapa');
    }
}
