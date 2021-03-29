<?php
$conn = mysqli_connect('localhost', 'root', '', 'academico');
$sql = 'SELECT * FROM etapas ORDER BY id';

$status = true;

if($result = mysqli_query($conn, $sql)) {
    if(mysqli_num_rows($result) == 0) {
        echo '<div class="error-msg">Não há etapas cadastradas :(</div>';
        $status = false;
    }
    if($status) {
        echo '<table>';
        echo '<thead>
            <tr>
                <th>Ordem</th>
                <th>Valor</th>
                <th>Atalhos</th>
            </tr>
            </thead>
            <tbody>';
        while($row = mysqli_fetch_row($result)) {
            echo '<tr>
                    <td>'. $row[0] . '</td>
                    <td>' . $row[1] . '</td>
                    <td title="Excluir" class="icon-container">
                        <button class="btn delete-btn" data-id="'.$row[0].'" data-valor="'.$row[1].'">
                            Excluir
                        </button>
                    </td>
                </tr>';
        }
        echo '</tbody></table>';
    }
}
