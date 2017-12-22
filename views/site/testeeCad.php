<?php
  use yii\helpers\Url; //ALTERAD

  $this->title = 'AgroMercado | Login';
 ?>
<section id="about" style="background-image:url(../web/startbootstrap-creative-gh-pages/img/agroecologia.jpg); background-position:center; background-size:cover;color: black; height: 100%">
    <div class="row" style="padding: 80px 0px 0px 0px">
      <div class="col-xs-12 col-sm-4 col-sm-offset-4" style="background-color: white; padding: 36px; margin-top: auto;">
        <form action="Script_do_Formulario.php" method="post" >
            <div class="form-group">
              <label for="email">Login:</label>
              <input type="text" name="email" class="form-control" placeholder="E-mail">
            </div>
            <div class="form-group">
              <label for="pass">Senha:</label>
              <input type="password" name="pass" class="form-control" placeholder="Senha">
            </div>
          <br/>
          <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Login', ['class' => 'btn btn-default', 'name' => 'login-button']) ?>
            </div>
            <input type="submit" class="btn btn-default" value="Entrar" style="background-color: #8dbf41;">
            <input type="reset" value="Limpar" class="btn btn-default" style="background-color: #8dbf41;">
          </div>
          <div>
            <label for="text">Não possui conta?</label><a href="<?=Url::to('?r=site/cadastro')?>"> Cadastre-se</a>
          </div>
        </form>
      </div>
    </div>
  </section>