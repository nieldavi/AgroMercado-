<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Minha conta';
$this->params['breadcrumbs'][] = $this->title;
?>
<section id="about" style="background-image:url(../web/startbootstrap-creative-gh-pages/img/agroecologia.jpg); background-position:center; background-size:cover;color: black; height: 100%">
    <div class="row" style="padding: 80px 0px 0px 0px">
        <div class="col-xs-12 col-sm-4 col-sm-offset-4" style="background-color: white; padding: 36px; margin-top: auto;">
            <div class="usuario-index">

                <h1><?= Html::encode($this->title) ?></h1>
                
                <p><strong>Nome</strong>: <span><?=$usuario->nome?> <?=$usuario->sobrenome?></span></p>
                <p><strong>Email</strong>: <span><?=$usuario->email?></span></p>
            </div>
        
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $usuario->usuario_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $usuario->usuario_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>
        </div>
    </div>
</section>
   
