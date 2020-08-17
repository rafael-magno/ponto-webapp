<?php $js = ['incluir_ponto.js'] ?>
<?php require_once 'comum/cabecalho.php' ?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6 text-center">
      <div class="card">
        <div class="card-header text-center">
          <h3>
            <?php echo $entradaSaida ?>
          </h3>
        </div>
        <div class="card-body">
          <h1 id="horaAtual">
            <?php echo $horaAtual ?>
          </h1>
          <form action="/ponto/salvar" method="post">
            <input type="submit" name="incluir" value="Incluir" class="btn btn-primary btn-lg btn-block mt-3">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>    

<?php require_once 'comum/rodape.php' ?>
