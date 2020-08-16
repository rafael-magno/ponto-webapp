$(document).ready(() => {
  $( "#formLogin" ).validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      senha: {
        required: true,
        minlength: 8,
      },
    },
    messages: {
      email: {
        required: 'Campo obrigatório.',
        email: 'Deve ser um e-mail válido.',
      },
      senha: {
        required: 'Campo obrigatório.',
        minlength: 'Deve possuir no minimo 8 caracteres.',
      },
    },
  });
});