<div class="modal fade" id="modalErros" tabindex="-1" role="dialog" aria-labelledby="modalErrosLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalErrosLabel">Erro(s)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body alert alert-danger">
        <?php if (session('erros')) { ?>
          <ul>
            <?php foreach (session('erros') as $erro) { ?>
              <li><?php echo $erro ?></li>
            <?php } ?>
          </ul>
        <?php } ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>