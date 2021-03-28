<?php 

function mensagem($titulo, $corpo) {
    echo "
        <div class=\"pannel\">
            <h1>$titulo</h1><br>
            <p>$corpo</p>
            <div class=\"actions\">
                <div class=\"btn\" onclick=\"window.open('../index.html','_self');\">Voltar</div>
            </div>
        </div>
    ";
}

?>