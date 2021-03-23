const actionInput = document.querySelector("#caixa-seleção");

// Objeto com as funções de cada operação (a função deve ter o mesmo nome do value da option)
const operation = {
  inserir() {
    const botaoEnviar = document.querySelector("#ins_envia");
    const formEl = document.querySelector("#inserir form");

    botaoEnviar.addEventListener("click", (e) => {
      e.preventDefault();

      const xhr = new XMLHttpRequest();

      xhr.onreadystatechange = function () {
        if (this.readyState == 4) {
          if (this.status == 200) {
            const { id, id_campi, nome } = JSON.parse(this.responseText);

            alert(
              `Departamento inserido com sucesso.\nId: ${id}\nCampus ${id_campi} - ${nome}`
            );
          } else {
            alert(this.responseText);
          }
        }
      };

      xhr.open("POST", "php/inserir.php");
      xhr.send(new FormData(formEl));
    });
  },

  alterar() {
    fazRequisicao("GET", "php/busca_deptos.php", false, function () {
      if (this.readyState == 4 && this.status == 200) {
        const deptos = JSON.parse(this.responseText);
        const tbodyEl = document.querySelector("#alterar tbody");

        tbodyEl.innerHTML = "";

        for (const { id, id_campi, nome } of deptos) {
          tbodyEl.innerHTML += formataDepto(id, id_campi, nome, "Alterar");
        }

        const botoesAlterar = document.querySelectorAll(
          "#alterar #tabela button"
        );

        for (const botaoAlterar of botoesAlterar) {
          botaoAlterar.addEventListener("click", (e) => {
            const trTabela = botaoAlterar.closest("tr");

            const inpIdEl = document.querySelector("#alt_id");
            const inpIdCampiEl = document.querySelector("#alt_id_campi");
            const inpNomeEl = document.querySelector("#alt_nome");

            inpIdEl.value = trTabela.cells[0].innerHTML;
            inpIdCampiEl.value = trTabela.cells[1].innerHTML;
            inpNomeEl.value = trTabela.cells[2].innerHTML;

            const formEl = document.querySelector("#formulario");
            const tabelaEl = document.querySelector("#alterar #tabela");
            formEl.classList.remove("escondido");
            tabelaEl.classList.add("escondido");
          });
        }
      }
    });

    const enviaAlterarEl = document.querySelector("#alt_envia");
    enviaAlterarEl.addEventListener("click", (e) => {
      e.preventDefault();

      const formEl = document.querySelector("#alterar form");

      fazRequisicao(
        "POST",
        "php/alterar.php",
        new FormData(formEl),
        function () {
          if (this.readyState == 4) {
            if (this.status == 200) {
              alert(`Departamento alterado com sucesso.`);
            } else {
              alert(this.responseText);
            }

            fazRequisicao("GET", "php/busca_deptos.php", false, function () {
              if (this.readyState == 4 && this.status == 200) {
                const deptos = JSON.parse(this.responseText);
                const tbodyEl = document.querySelector("#alterar tbody");

                tbodyEl.innerHTML = "";

                for (const { id, id_campi, nome } of deptos) {
                  tbodyEl.innerHTML += formataDepto(
                    id,
                    id_campi,
                    nome,
                    "Alterar"
                  );
                }

                const botoesAlterar = document.querySelectorAll(
                  "#alterar #tabela button"
                );

                for (const botaoAlterar of botoesAlterar) {
                  botaoAlterar.addEventListener("click", (e) => {
                    const trTabela = botaoAlterar.closest("tr");

                    const inpIdEl = document.querySelector("#alt_id");
                    const inpIdCampiEl = document.querySelector(
                      "#alt_id_campi"
                    );
                    const inpNomeEl = document.querySelector("#alt_nome");

                    inpIdEl.value = trTabela.cells[0].innerHTML;
                    inpIdCampiEl.value = trTabela.cells[1].innerHTML;
                    inpNomeEl.value = trTabela.cells[2].innerHTML;

                    const formEl = document.querySelector("#formulario");
                    const tabelaEl = document.querySelector("#alterar #tabela");
                    formEl.classList.remove("escondido");
                    tabelaEl.classList.add("escondido");
                  });
                }
              }
            });

            const formEl = document.querySelector("#formulario");
            const tabelaEl = document.querySelector("#alterar #tabela");
            formEl.classList.add("escondido");
            tabelaEl.classList.remove("escondido");
          }
        }
      );
    });
  },

  deletar() {
    const botaoExcluir = document.querySelector("#deletar button");
    const formEl = document.querySelector("#deletar form");

    fazRequisicao("GET", "php/busca_deptos.php", false, function () {
      if (this.readyState == 4 && this.status == 200) {
        const deptos = JSON.parse(this.responseText);
        const tbodyEl = document.querySelector("#deletar tbody");

        tbodyEl.innerHTML = "";

        for (const { id, id_campi, nome } of deptos) {
          tbodyEl.innerHTML += formataDepto(id, id_campi, nome, "Deletar");
        }
      }
    });

    botaoExcluir.addEventListener("click", (e) => {
      e.preventDefault();

      const prosseguir = confirm("Deseja excluir este departamento?");

      if (prosseguir) {
        const inpIdEl = document.querySelector("#del_id");
        const inpIdCampiEl = document.querySelector("#del_id_campi");
        const inpNomeEl = document.querySelector("#del_nome");

        const trTabela = document
          .querySelector("input[name='dpto']:checked")
          .closest("tr");

        inpIdEl.value = trTabela.cells[1].innerHTML;
        inpIdCampiEl.value = trTabela.cells[2].innerHTML;
        inpNomeEl.value = trTabela.cells[3].innerHTML;

        fazRequisicao(
          "POST",
          "php/deletar.php",
          new FormData(formEl),
          function () {
            if (this.readyState == 4) {
              if (this.status == 200) {
                const { id, id_campi, nome } = JSON.parse(this.responseText);

                alert(
                  `Departamento apagado com sucesso.\nId: ${id}\nCampus ${id_campi} - ${nome}`
                );
              } else {
                alert(this.responseText);
              }

              fazRequisicao("GET", "php/busca_deptos.php", false, function () {
                if (this.readyState == 4 && this.status == 200) {
                  const deptos = JSON.parse(this.responseText);
                  const tbodyEl = document.querySelector("#deletar tbody");

                  tbodyEl.innerHTML = "";

                  for (const { id, id_campi, nome } of deptos) {
                    tbodyEl.innerHTML += formataDepto(
                      id,
                      id_campi,
                      nome,
                      "Deletar"
                    );
                  }
                }
              });
            }
          }
        );
      }
    });
  },
};

function setupOperation() {
  //Seleciona as divs que contém o HTML de cada grupo, para alterar a classe ".escondido"
  let removeClass = document.querySelectorAll(".mudar");
  let fieldset = document.querySelector("#fieldset");

  for (let div of removeClass) {
    div.classList.add("escondido");
    fieldset.classList.add("tamanho");
  }

  for (let div of removeClass) {
    if (div.id === actionInput.value.toLowerCase()) {
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
 * @param {('Alterar' | 'Deletar' | '')} acao - O evento.
 */
function formataDepto(id, id_campi, nome, acao) {
  let fmt = "";

  if (acao === "Alterar") {
    fmt = `
      <tr>
        <td>${id}</td>
        <td>${id_campi}</td>
        <td>${nome}</td>
        <td>
          <button type="button">Alterar</button>
        </td>
      </tr>
    `;
  } else if (acao === "Deletar") {
    fmt = `
      <tr>
        <td>
          <input type="radio" name="dpto" class="exclui_dpto" />
        </td>
        <td>${id}</td>
        <td>${id_campi}</td>
        <td>${nome}</td>
      </tr>
    `;
  }

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
