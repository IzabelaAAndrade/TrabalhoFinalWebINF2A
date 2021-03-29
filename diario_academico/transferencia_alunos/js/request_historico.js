const cpfInput = document.getElementById('cpf');
const submitBtn = document.getElementById('enviar');

function request_historico() {
    if(cpfInput.value == '') return;
    const xhrSituacao = new XMLHttpRequest();
    xhrSituacao.onreadystatechange = function() {
        if(this.status == 200 && this.readyState == 4) {
            const xhrHistorico = new XMLHttpRequest();
            xhrHistorico.onreadystatechange = function() {
                if(this.status == 200 && this.readyState == 4) {
                    location.reload();
                }
            }
            xhrHistorico.open('POST', 'back-end/historico.php', true);
            xhrHistorico.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhrHistorico.send('cpf=' + cpfInput.value);
        }
        else if(this.readyState == 4) location.reload();
    }
    xhrSituacao.open('POST', 'back-end/situacao.php', true);
    xhrSituacao.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhrSituacao.send('cpf=' + cpfInput.value);
}

if(submitBtn != null && cpfInput != null) {
    submitBtn.addEventListener('click', request_historico);
    cpfInput.addEventListener('keyup', function(e) {
        if(e.key == 'Enter') request_historico();
    });
}
