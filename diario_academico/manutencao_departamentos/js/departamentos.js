let formEl = document.querySelector("#formAltera");
let tbodyEl = document.querySelector("tbody.teste");

atualizaTabela(criaEventos);

function atualizaTabela(callback) {
  let xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      let deptos = JSON.parse(this.responseText);

      for (let depto of deptos) {
        tbodyEl.innerHTML += formataDepto(
          depto.id,
          depto.id_campi,
          depto.nome,
          "",
          "row"
        );
      }

      callback();
    }
  };

  xhr.open("GET", "php/busca_deptos.php");
  xhr.send();
}

function criaEventos() {
  let botoesAlterar = document.querySelectorAll(".botaoAlterar");
  let botoesDeletar = document.querySelectorAll(".botaoDeletar");

  botoesAlterar.forEach((botao, indice) => {
    botao.addEventListener("click", (e) => {
      alteracaoListener(botao, indice, e);
    });
  });

  botoesDeletar.forEach((botao, indice) => {
    botao.addEventListener("click", (e) => {
      exclusaoListener(botao, indice, e);
    });
  });
}

/**
 * Processa cliques no botão de alteração da tabela.
 * @param {Element} botao - O botao clicado.
 * @param {Number} indice - O indice do botão.
 * @param {Event} e - O evento.
 */
function alteracaoListener(botao, indice, e) {
  if (!formEl.classList.contains("alterando")) {
    formEl.classList.add("alterando");

    let trEl = botao.closest("tr");

    let valoresOg = {
      id: trEl.cells[0].innerHTML,
      id_campi: trEl.cells[1].innerHTML,
      nome: trEl.cells[2].innerHTML,
    };

    trEl.innerHTML = formataDepto(
      valoresOg.id,
      valoresOg.id_campi,
      valoresOg.nome,
      "Alterar",
      "form"
    );

    let submitAlterarEl = trEl.querySelector(".submitAlterar");
    submitAlterarEl.addEventListener("click", (e) => {
      e.preventDefault();

      let xhr = new XMLHttpRequest();

      xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          tbodyEl.innerHTML = "";
          atualizaTabela(criaEventos);
        } else if (
          this.readyState == 4 &&
          (this.status == 500 || this.status == 409)
        ) {
          tbodyEl.innerHTML = "";
          atualizaTabela(criaEventos);
          mostraMsgErro(`ERRO AO FAZER ALTERAÇÃO: "${this.responseText}"`);
        }
        formEl.classList.remove("alterando");
      };

      xhr.open("POST", "php/alterar.php");

      let inpId = trEl.querySelector("input[name='id']");
      inpId.disabled = false;
      xhr.send(new FormData(formEl));
      inpId.disabled = true;
    });

    let cancelaAlterarEl = trEl.querySelector(".cancelaAlterar");
    cancelaAlterarEl.addEventListener("click", (e) => {
      trEl.innerHTML = formataDepto(
        valoresOg.id,
        valoresOg.id_campi,
        valoresOg.nome,
        "",
        "row"
      );

      formEl.classList.remove("alterando");
      criaEventos();
    });
  }
}

/**
 * Processa cliques no botão de deletar da tabela.
 * @param {Element} botao - O botao clicado.
 * @param {Number} indice - O indice do botão.
 * @param {Event} e - O evento.
 */
function exclusaoListener(botao, indice, e) {
  if (!formEl.classList.contains("alterando")) {
    formEl.classList.add("alterando");

    let trEl = botao.closest("tr");
    let valoresOg = {
      id: trEl.cells[0].innerHTML,
      id_campi: trEl.cells[1].innerHTML,
      nome: trEl.cells[2].innerHTML,
    };

    trEl.innerHTML = `
    <td colspan="3">Tem certeza que deseja apagar esse departamento?</td>

    <td>
      <button type="submit" class="submitDeletar">Deletar</button>
      <button type="button" class="cancelaDeletar">X</button>
      </td>`;

    let submitDeletarEl = trEl.querySelector(".submitDeletar");
    submitDeletarEl.addEventListener("click", (e) => {
      e.preventDefault();

      trEl.innerHTML = formataDepto(
        valoresOg.id,
        valoresOg.id_campi,
        valoresOg.nome,
        "Deletar",
        "form"
      );

      let xhr = new XMLHttpRequest();

      xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          tbodyEl.innerHTML = "";
          atualizaTabela(criaEventos);
        } else if (
          this.readyState == 4 &&
          (this.status == 500 || this.status == 400 || this.status == 404)
        ) {
          tbodyEl.innerHTML = "";
          atualizaTabela(criaEventos);
          mostraMsgErro(`ERRO AO FAZER ALTERAÇÃO: "${this.responseText}"`);
        }

        formEl.classList.remove("alterando");
      };

      xhr.open("POST", "php/deletar.php");

      let inpId = trEl.querySelector("input[name='id']");
      let inpIdCampi = trEl.querySelector("input[name='id_campi']");
      let inpNome = trEl.querySelector("input[name='nome']");

      inpId.disabled = false;
      inpIdCampi.disabled = false;
      inpNome.disabled = false;

      xhr.send(new FormData(formEl));

      inpId.disabled = true;
      inpIdCampi.disabled = true;
      inpNome.disabled = true;
    });

    let cancelaDeletarEl = trEl.querySelector(".cancelaDeletar");
    cancelaDeletarEl.addEventListener("click", (e) => {
      trEl.innerHTML = formataDepto(
        valoresOg.id,
        valoresOg.id_campi,
        valoresOg.nome,
        "",
        "row"
      );

      formEl.classList.remove("alterando");
      criaEventos();
    });
  }
}

/**
 * Processa cliques no botão de deletar da tabela.
 * @param {!number} id - Id do departamento
 * @param {!number} id_campi - Id do campus do departamento
 * @param {!string} nome - Nome do departamento
 * @param {('Alterar' | 'Deletar' | '')} acao - O evento.
 * @param {('row' | 'form')} estilo - O estilo da formatação
 */
function formataDepto(id, id_campi, nome, acao, estilo) {
  let fmt = "";
  const disable = acao === "Deletar" ? "disabled" : "";

  if (estilo === "row") {
    fmt = `
    <tr>
      <td>${id}</td>
      <td>${id_campi}</td>
      <td>${nome}</td>
      <td>
        <button type="button" class="botoes botaoAlterar"><img src="img/alterar.png" alt=""></button>
        <button type="button" class="botoes botaoDeletar"><img src="img/deletar.png" alt=""></button>
      </td>
    </tr>`;
  } else if (estilo === "form") {
    fmt = `
    <td><input name="id" type="number" value="${id}"required disabled /></td>
    <td><input name="id_campi" type="number" value="${id_campi}"required ${disable}/></td>
    <td><input name="nome" type="text" value="${nome}"required ${disable}/></td>
    <td>
      <button type="submit" class="submit${acao}">${acao}</button>
      <button type="button" class="cancela${acao}">X</button>
    </td>`;
  }

  return fmt;
}

function mostraMsgErro(msg) {
  tbodyEl.innerHTML = `
  <tr><td colspan="4" class="msgErro">${msg}</td></tr>
  ${tbodyEl.innerHTML}
  `;
}
