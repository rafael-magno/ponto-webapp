$(document).ready(() => {
  $('.hora').mask('00:00');
  $('.data').mask('00/00/0000');

  $( "#formUsuario" ).validate({
    rules: {
      nome: {
        required: true,
      },
      email: {
        required: true,
        email: true,
      },
      senha: {
        required: true,
        minlength: 8,
      },
      confirmacao_senha: {
        required: true,
        equalTo: '#senha',
      },
      semana: {
        required: true,
      },
      data_inicio: {
        required: true,
      },
    },
    messages: {
      nome: {
        required: 'Campo obrigatório.',
      },
      email: {
        required: 'Campo obrigatório.',
        email: 'Deve ser um e-mail válido.',
      },
      senha: {
        required: 'Campo obrigatório.',
        minlength: 'Deve possuir no minimo 8 caracteres.',
      },
      confirmacao_senha: {
        required: 'Campo obrigatório.',
        equalTo: 'Deve ser igual a senha.',
      },
      semana: {
        required: 'Campo obrigatório.',
      },
      data_inicio: {
        required: 'Campo obrigatório.',
      },
    },
  });
});