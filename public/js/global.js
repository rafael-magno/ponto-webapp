$(document).ready(() => {
  if ($('#modalErros ul li').length) {
    $('#modalErros').modal('show');
  }

  if ($('#modalSucesso .modal-body').text().trim()) {
    $('#modalSucesso').modal('show');
  }
});