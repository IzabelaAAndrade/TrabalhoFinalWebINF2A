<?php
// relatorio placeholder
// cria uma tabela legal

$nome = $_GET['nome'];
$min = $_GET['min'];
$quant = $_GET['quant'];

if(!isset($min))
    $min = 0;

?>

<table>
    <tr>
        <th>número</th>
        <th>nome</th>
        <th>maximo</th>
    </tr>

<?php

for($i = $min; $i<$quant; $i++)
    echo "<tr><td>$i</td><td>$nome</td><td>$quant</td></tr>"

?>

</table>