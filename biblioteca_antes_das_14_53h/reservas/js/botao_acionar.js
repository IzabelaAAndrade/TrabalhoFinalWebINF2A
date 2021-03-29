let btns_editar = document.getElementsByName('btn');
for(let cont = 0; cont<btns_editar.length; cont++){
    btns_editar[cont].addEventListener('click', clicar);
}

function clicar(e){
    let clicado = e.currentTarget;
    if(clicado.className == 'btnAlterar'){
        $.get("alterar_reservas.php", "selecionado=" + clicado.value, function(resposta){
            document.getElementById('altera_modal').innerHTML = resposta;
        });
        $('#modal_editar').modal({
            show: true
        });
    }else if(clicado.className == 'btnDeletar'){
        $.get("deleta_reservas.php", "selecionado=" + clicado.value, function(resposta){
            document.getElementById('deleta_modal').innerHTML = resposta;
        });
        $('#modal_deletar').modal({
            show: true
        });
    }
}
