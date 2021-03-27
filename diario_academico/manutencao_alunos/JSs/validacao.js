// Script adaptado do sites:
// https://gist.github.com/joaohcrangel/8bd48bcc40b9db63bef7201143303937
// https://www.w3resource.com/javascript/form/email-validation.php
// https://viacep.com.br/exemplo/jquery/

let inputs = document.querySelectorAll('.entrada');

// $('#enviar').click(function() {
//   let dados = $('#formulario').serialize();
//   alert("dados");
//
//   if(verificaCEP(dados) != null)
//     alert("CEP válido!");
//     // $.ajax({
//     //   type: 'POST',
//     //   url: '../PHPs/inclui_alunos_bd.php',
//     //   data: dados,
//     //   error: function() { alert('Erro ao tentar ação!'); },
//     //   success: function(response) {
//     //     alert(response);
//     //   }
//     // });
//
//   else
//     alert("CEP inválido!");
// });
// verificaCPF("11208794698");

$('#cpf').keyup(function() {
  let dados = $('#cpf').val();
  if(verificaCPF(dados))
  {
    $('#cpf').css(
      {
        background: "#457b9d49 url(../CSSs/img/certo.png) no-repeat 98% center",
        backgroundSize: "13px",
        boxShadow: "0 4px 2px -2px  #5cd053",
    });
  }
  else
  {
    $('#cpf').css(
      {
        background: "#457b9d49 url(../CSSs/img/errado.png) no-repeat 98% center",
        backgroundSize: "13px",
        boxShadow: "0 4px 2px -2px #d45252",
    });
  }

});

$('#cep').keyup(function() {
  let dados = $("#cep").val();

  verificaCEP(dados);
});

$('#email').keyup(function() {
  let dados = $("#email").val();

  if(verificaEMAIL(dados))
  {
    $('#email').css(
      {
        background: "#457b9d49 url(../CSSs/img/certo.png) no-repeat 98% center",
        backgroundSize: "13px",
        boxShadow: "0 4px 2px -2px  #5cd053",
    });
  }
  else
  {
    $('#email').css(
      {
        background: "#457b9d49 url(../CSSs/img/errado.png) no-repeat 98% center",
        backgroundSize: "13px",
        boxShadow: "0 4px 2px -2px #d45252",
    });
  }
});

function verificaEMAIL(email)
{
  let formato = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

  if(email.value.match(formato))
    return true;
  else
    return false;
}

function verificaCPF(cpf) {
  // alert(cpf);
  // let indice = cpf.indexOf("cpf");
  // cpf = cpf.substring(indice+4, indice+18);
  cpf = cpf.replace(/\./g, "").replace(/-/g, "");

    if (
        cpf == "00000000000" ||
        cpf == "11111111111" ||
        cpf == "22222222222" ||
        cpf == "33333333333" ||
        cpf == "44444444444" ||
        cpf == "55555555555" ||
        cpf == "66666666666" ||
        cpf == "77777777777" ||
        cpf == "88888888888" ||
        cpf == "99999999999"
    )
        return false;

    let soma = 0, resto, i;

    for (i = 1; i <= 9; i++)
        soma = soma + parseInt(cpf.substring(i-1, i)) * (11 - i);

    resto = (soma * 10) % 11;

    if ((resto == 10) || (resto == 11))
      resto = 0;

    if (resto != parseInt(cpf.substring(9, 10)) )
      return false;

    soma = 0
    for (i = 1; i <= 10; i++)
        soma = soma + parseInt(cpf.substring(i-1, i)) * (12 - i);

    resto = (soma * 10) % 11;

    if ((resto == 10) || (resto == 11))
      resto = 0;

    if (resto != parseInt(cpf.substring(10, 11) ) )
      return false;

    return true;
}

function verificaCEP(valor) {
  // let indice = valor.indexOf("cep");
  // valor = valor.substring(indice+4, indice+13);
  cep = valor.replace(/-/g, "");
  // alert(cep);

  //Verifica se campo cep possui valor informado.
    //Preenche os campos com "..." enquanto consulta webservice.
    $('#logradouro').html("...");
    $('#bairro').html("...");
    $('#cidade').html("...");
    $('#uf').html("...");

    $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
    if (!("erro" in dados))
    {
      //Atualiza os campos com os valores da consulta.
      $('#logradouro').val(dados.logradouro);
      $('#bairro').val(dados.bairro);
      $('#cidade').val(dados.localidade);
      $('#uf').val(dados.uf);

      alteraPraCerto();

      return true;
    }
    else
    {
      $('#logradouro').val("");
      $('#bairro').val("");
      $('#cidade').val("");
      $('#uf').val("");

      alteraPraErrado();

      return false;
    }
  });
}

function alteraPraCerto() {
  $('#logradouro').css(
    {
      background: "#457b9d49 url(../CSSs/img/certo.png) no-repeat 98% center",
      backgroundSize: "13px",
      boxShadow: "0 4px 2px -2px  #5cd053",
  });
  $('#bairro').css(
    {
      background: "#457b9d49 url(../CSSs/img/certo.png) no-repeat 98% center",
      backgroundSize: "13px",
      boxShadow: "0 4px 2px -2px  #5cd053",
  });
  $('#cidade').css(
    {
      background: "#457b9d49 url(../CSSs/img/certo.png) no-repeat 98% center",
      backgroundSize: "13px",
      boxShadow: "0 4px 2px -2px  #5cd053",
  });
  $('#uf').css(
    {
      background: "#457b9d49 url(../CSSs/img/certo.png) no-repeat 98% center",
      backgroundSize: "13px",
      boxShadow: "0 4px 2px -2px  #5cd053",
  });
  $('#cep').css(
    {
      background: "#457b9d49 url(../CSSs/img/certo.png) no-repeat 98% center",
      backgroundSize: "13px",
      boxShadow: "0 4px 2px -2px  #5cd053",
  });
}

function alteraPraErrado() {
  $('#logradouro').css(
    {
      background: "#457b9d49 url(../CSSs/img/errado.png) no-repeat 98% center",
      backgroundSize: "13px",
      boxShadow: "0 4px 2px -2px #d45252",
  });
  $('#bairro').css(
    {
      background: "#457b9d49 url(../CSSs/img/errado.png) no-repeat 98% center",
      backgroundSize: "13px",
      boxShadow: "0 4px 2px -2px #d45252",
  });
  $('#cidade').css(
    {
      background: "#457b9d49 url(../CSSs/img/errado.png) no-repeat 98% center",
      backgroundSize: "13px",
      boxShadow: "0 4px 2px -2px #d45252",
  });
  $('#uf').css(
    {
      background: "#457b9d49 url(../CSSs/img/errado.png) no-repeat 98% center",
      backgroundSize: "13px",
      boxShadow: "0 4px 2px -2px #d45252",
  });
  $('#cep').css(
    {
      background: "#457b9d49 url(../CSSs/img/errado.png) no-repeat 98% center",
      backgroundSize: "13px",
      boxShadow: "0 4px 2px -2px #d45252",
  });
}
