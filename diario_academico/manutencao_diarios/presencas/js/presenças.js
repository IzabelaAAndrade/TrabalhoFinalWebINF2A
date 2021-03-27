const actionInput = document.querySelector("#caixa-seleção");

// Objeto com as funções de cada operação (a função deve ter o mesmo nome do value da option)
const operation = {
  inserir() {
    const botaoBuscarIns = document.querySelector("#ins_botoes1 button");
    const botaoEnviarIns = document.querySelector("#ins_botoes2 button");

    botaoBuscarIns.addEventListener("click", (e) => {
      const formEl = document.querySelector("#inserir form");

      e.preventDefault();

      fazRequisicao(
        "POST",
        "php/busca_matriculas.php",
        new FormData(formEl),
        function () {
          if (this.readyState == 4) {
            if (this.status == 200) {
              const alunos = JSON.parse(this.responseText);
              const tbodyEl = document.querySelector("#inserir tbody");

              tbodyEl.innerHTML = "";

              for (const matricula of alunos) {
                tbodyEl.innerHTML += formataPresenca(matricula, "", "");
              }
            } else {
              alert(this.responseText);
            }
          }
        }
      );
    });

    botaoEnviarIns.addEventListener("click", (e) => {
      e.preventDefault();
      const formEl = document.querySelector("#inserir form");

      fazRequisicao(
        "POST",
        "php/inserir.php",
        new FormData(formEl),
        function () {
          if (this.readyState == 4) {
            const tbodyEl = document.querySelector("#inserir tbody");
            const insConteudoEl = document.querySelector("#ins_conteudo");
            const insAtividadeEl = document.querySelector("#ins_atividade");
            alert(this.responseText);
            tbodyEl.innerHTML = "";
            insConteudoEl.value = "";
            insAtividadeEl.value = "";
          }
        }
      );
    });
  },

  alterar() {
    const botaoBuscarAlt = document.querySelector("#alt_botoes1 button");
    const botaoEnviarAlt = document.querySelector("#alt_botoes2 button");

    botaoBuscarAlt.addEventListener("click", (e) => {
      const formEl = document.querySelector("#alterar form");

      e.preventDefault();

      fazRequisicao(
        "POST",
        "php/busca_presencas.php",
        new FormData(formEl),
        function () {
          if (this.readyState == 4) {
            if (this.status == 200) {
              const alunos = JSON.parse(this.responseText);
              const tbodyEl = document.querySelector("#alterar tbody");

              tbodyEl.innerHTML = "";

              for (const { id_matriculas, faltas, nota } of alunos) {
                tbodyEl.innerHTML += formataPresenca(
                  id_matriculas,
                  faltas,
                  nota
                );
              }
            } else {
              alert(this.responseText);
            }
          }
        }
      );
    });

    botaoEnviarAlt.addEventListener("click", (e) => {
      e.preventDefault();

      const formEl = document.querySelector("#alterar form");

      fazRequisicao(
        "POST",
        "php/alterar.php",
        new FormData(formEl),
        function () {
          if (this.readyState == 4) {
            const tbodyEl = document.querySelector("#alterar tbody");
            const altConteudoEl = document.querySelector("#alt_conteudo");
            const altAtividadeEl = document.querySelector("#alt_atividade");

            alert(this.responseText);

            tbodyEl.innerHTML = "";
            altConteudoEl.value = "";
            altAtividadeEl.value = "";
          }
        }
      );
    });
  },

  deletar() {
    const botaoDeletar = document.querySelector("#del_botoes button");

    botaoDeletar.addEventListener("click", (e) => {
      e.preventDefault();

      const prosseguir = confirm(
        "Deseja apagar todos os registros de presença para esse conteúdo e atividade?"
      );

      if (prosseguir) {
        const formEl = document.querySelector("#deletar form");
        fazRequisicao(
          "POST",
          "php/deletar.php",
          new FormData(formEl),
          function () {
            if (this.readyState == 4) {
              alert(this.responseText);
            }
          }
        );
      }
    });
  },
};

function setupOperation() {
  //Seleciona as divs que contém o HTML de cada parte, para alterar a classe ".escondido"
  let removeClass = document.querySelectorAll(".mudar");
  let fieldset = document.querySelector("#fieldset");

  for (let div of removeClass) {
    div.classList.add("escondido");
    fieldset.classList.add("tamanho");
  }

  for (let div of removeClass) {
    if (div.id === this.value.toLowerCase()) {
      div.classList.remove("escondido");
      fieldset.classList.remove("tamanho");
    }
  }

  const selectedOperation = actionInput.value;
  const setupFunction = operation[selectedOperation];
  setupFunction();
}

actionInput.addEventListener("change", setupOperation);

/**
 * Processa cliques no botão de deletar da tabela.
 * @param {!number} id - Id do departamento
 * @param {!number} id_campi - Id do campus do departamento
 * @param {!string} nome - Nome do departamento
 * @param {('Alterar' | 'Inserir' | '')} acao - O evento.
 */
function formataPresenca(matricula, faltas, nota) {
  let fmt = `
    <tr>
      <td>
        <input
          class="input_text"
          type="text"
          name="id_matriculas[]"
          value="${matricula}"
          readonly
        />
      </td>
      <td>
        <input
          class="input_num"
          type="number"
          name="faltas[]"
          value="${faltas}"
          min="0"
        />
      </td>
      <td>
        <input
          class="input_num"
          type="number"
          name="nota[]"
          value="${nota}"
          min="0"
        />
      </td>
    </tr>
  `;

  return fmt;
}

function fazRequisicao(metodo, endereco, conteudo, handler) {
  const xhr = new XMLHttpRequest();

  xhr.onreadystatechange = handler;
  xhr.open(metodo, endereco);

  if (conteudo) {
    xhr.send(conteudo);
  } else {
    xhr.send();
  }
}
