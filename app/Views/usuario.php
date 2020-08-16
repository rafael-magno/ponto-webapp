<?php $js = ['usuario.js'] ?>

<?php require_once 'comum/cabecalho.php' ?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header text-center">
          <h5 class="text-center">Cadastro de usuário</h5>
        </div>
        <div class="card-body">
        <form action="/usuario/salvar" method="post" id="formUsuario">
          <div class="form-group row">
            <label for="nome" class="col-3 col-form-label">Nome</label>
            <div class="col-9">
              <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $nome ?? '' ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-3 col-form-label">E-mail</label>
            <div class="col-9">
              <input type="email" class="form-control" id="email" name="email" value="<?php echo $email ?? '' ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="senha" class="col-3 col-form-label">Senha</label>
            <div class="col-9">
              <input type="password" class="form-control" id="senha" name="senha" value="<?php echo $senha ?? '' ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="confirmacao_senha" class="col-3 col-form-label">Repita a senha</label>
            <div class="col-9">
              <input type="password" class="form-control" id="confirmacao_senha" name="confirmacao_senha" value="<?php echo $confirmacao_senha ?? '' ?>">
            </div>
          </div>
          <h5 class="text-center">Carga horária</h5>
          <div class="form-group row">
            <label for="semana" class="col-6 col-sm-4 col-form-label">Segunda a sexta</label>
            <div class="col-6">
              <input type="text" class="hora form-control" id="semana" name="semana" value="<?php echo $semana ?? '' ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="sabado" class="col-6 col-sm-4 col-form-label">Sábado</label>
            <div class="col-6">
              <input type="text" class="hora form-control" id="sabado" name="sabado" value="<?php echo $sabado ?? '' ?>" placeholder="00:00">
            </div>
          </div>
          <div class="form-group row">
            <label for="domingo" class="col-6 col-sm-4 col-form-label">Domingo</label>
            <div class="col-6">
              <input type="text" class="hora form-control" id="domingo" name="domingo" value="<?php echo $domingo ?? '' ?>" placeholder="00:00">
            </div>
          </div>
          <div class="form-group row">
            <label for="domingo" class="col-6 col-sm-4 col-form-label">Saldo inicial</label>
            <div class="col-6">
              <div class="input-group">
                <div class="input-group-prepend">
                  <select name="sinal_saldo_inicio" class="form-control">
                    <option value="+">+</option>
                    <option value="-" <?php echo isset($sinal_saldo_inicio) && $sinal_saldo_inicio == '-' ? 'selected' : '' ?>>-</option>
                  </select>
                </div>
                <input type="text" class="hora form-control" id="saldo_inicio" name="saldo_inicio" value="<?php echo $saldo_inicio ?? '' ?>" placeholder="00:00">
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="domingo" class="col-6 col-sm-4 col-form-label">Data início</label>
            <div class="col-6">
              <input type="text" class="data form-control" id="data_inicio" name="data_inicio" value="<?php echo $data_inicio ?? '' ?>">
            </div>
          </div>
          <div class="form-group text-center">
            <input type="submit" value="Salvar" class="btn btn-primary">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php require_once 'comum/rodape.php' ?>
