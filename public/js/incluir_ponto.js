$(document).ready(() => {
  let segundosAtual = horaParaSegundos($('#horaAtual').text().trim());
  atualizaHora(segundosAtual)
})

function atualizaHora(segundosAtual) {
  $('#horaAtual').text(segundosParaHora(segundosAtual))
  setTimeout(() => {
    segundosAtual++;
    atualizaHora(segundosAtual);
  }, 1000);
}

function horaParaSegundos(hora) {
  const partesHora = hora.split(':');
  let segundos = parseInt(partesHora[2]);
  segundos += parseInt(partesHora[1]) * 60;
  segundos += parseInt(partesHora[0]) * 3600;

  return segundos;
}

function segundosParaHora(segundos) {
  let hora = Math.floor(segundos / 3600);
  segundos -= hora * 3600;
  hora = String(hora).padStart(2, '0');

  let minuto = Math.floor(segundos / 60);
  segundos -= minuto * 60;
  minuto = String(minuto).padStart(2, '0');

  segundos = String(segundos).padStart(2, '0');

  return `${hora}:${minuto}:${segundos}`;
}