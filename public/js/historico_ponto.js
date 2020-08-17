$(document).ready(() => {
  const intervaloData = $('#dataHistorico').val().split(' - ');

  $('#dataHistorico').daterangepicker({
    "locale": {
      "format": "DD/MM/YYYY",
      "separator": " - ",
      "applyLabel": "Buscar",
      "cancelLabel": "Cancelar",
      "fromLabel": "De",
      "toLabel": "Até",
      "weekLabel": "W",
      "daysOfWeek": [
        "Dom",
        "Seg",
        "Ter",
        "Qua",
        "Qui",
        "Sex",
        "Sab"
      ],
      "monthNames": [
        "Janeiro",
        "Fevereiro",
        "Março",
        "Abril",
        "Maio",
        "Junho",
        "Julho",
        "Agosto",
        "Setembro",
        "Outubro",
        "Novembro",
        "Dezembro"
      ],
      "firstDay": 1
    },
    "startDate": intervaloData[0],
    "endDate": intervaloData[1],
    "minDate": $('#dataMinima').val(),
    "maxDate": moment(),
  }, (start, end) => {
    window.location = '/ponto/historico/' + start.format('YYYY-MM-DD') + '/' + end.format('YYYY-MM-DD')
  });
})