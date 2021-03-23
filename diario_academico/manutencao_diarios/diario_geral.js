const inpPaginaEl = document.querySelector("#caixa-seleção");
const submitBotao = document.querySelector("input.botao");

const paginas = {
  conteudos: "conteudos/inseriConteudo.html",
  atividades: "atividades/inseriAtividade.html",
  presencas: "presencas/index.html",
};

function definePagina() {
  const paginaSelecionada = inpPaginaEl.value;
  const localizacao = paginas[paginaSelecionada];
  location.href = localizacao;
}

submitBotao.addEventListener("click", definePagina);
