<?php require_once 'comum/cabecalho.php' ?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6 text-center">
      <div class="card">
        <div class="card-header text-center">
          Saldo consolidado
        </div>
        <div class="card-body">
          <h1 class="<?php echo getClassText($saldo) ?>">
            <?php echo $saldo ?>
          </h1>
        </div>
        <div class="card-footer text-muted">
          Saldo consolidado até <?php echo $dataAte ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once 'comum/rodape.php' ?>
