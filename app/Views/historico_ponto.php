<?php $js = ['historico_ponto.js'] ?>
<?php $css = ['historico_ponto.css'] ?>

<?php require_once 'comum/cabecalho.php' ?>

<div class="container">
  <div class="card">
    <div class="card-body">
      <div>
        <label>Filtrar por período</label>
        <input type="text" id="dataHistorico" value="<?php echo $periodo ?>">
        <input type="hidden" id="dataMinima" value="<?php echo $dataMinima ?>">
      </div>
      <div class="table-responsive table-striped">
        <table id="historico" class="table">
          <thead>
            <tr>
              <th>Dia</th>
              <th>Registros</th>
              <th>Saldo</th>   
            </tr>
          </thead>
          <tbody>
            <?php foreach ($detalhamentoPorDia as $detalhamento) { ?>
              <tr>
                <td class="d-flex d-md-table-cell">
                    <?php echo $detalhamento['dia'] ?>
                </td>
                <td class="d-flex d-md-table-cell registros">
                  <?php if (empty($detalhamento['registros'])) { ?>
                    Nenhum ponto registrado  
                  <?php } else { ?>
                    <?php echo implode(' - ', $detalhamento['registros']) ?>
                  <?php } ?>
                </td>
                <td class="d-flex d-md-table-cell">
                  <strong class="<?php echo getClassText($detalhamento['saldo']) ?>">
                    <?php echo $detalhamento['saldo'] ?>
                  </strong>
                </td>    
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>    

<?php require_once 'comum/rodape.php' ?>
