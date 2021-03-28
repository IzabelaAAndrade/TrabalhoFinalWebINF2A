<?php 

function professorExiste($link, $id) {
    $sql = "SELECT EXISTS(SELECT * FROM professores WHERE id=$id) as 'existe'";
    $result = mysqli_query($link, $sql);
    return ($result && mysqli_fetch_assoc($result)['existe'] == 1);
}

function deptoExiste($link, $id) {
    $sql = "SELECT EXISTS(SELECT * FROM depto WHERE id=$id) as 'existe'";
    $result = mysqli_query($link, $sql);
    return ($result && mysqli_fetch_assoc($result)['existe'] == 1);
}

?>