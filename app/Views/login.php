<?php $js = ['login.js'] ?>

<?php require_once 'comum/cabecalho.php' ?>

<div class="container">
  <div class="col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-4 offset-lg-4" style="margin-top:50px;">
    <div class="card">
      <div class="card-header text-center">
        Login
      </div>
      <div class="card-body">
        <form action="/autenticacao/logar" method="post" id="formLogin">
        <div class="form-group">
          <input type="text" class="form-control" id="email" name="email" placeholder="E-mail" value="<?php echo $email ?>">
        </div>
        <div class="form-group">
          <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
        </div>
        <div class="form-group text-center">
            <input type="submit" value="Entrar" class="btn btn-primary">
          </div>
        </form>
      </div>
    </div>
  </div>    
</div>

<?php require_once 'comum/rodape.php' ?>
