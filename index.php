<?php
include  './lib/banco.php';
$estados = getEstados();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <h1>Olá Mundo</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>UF</th>
        </tr>
        <?php
        for ($i = 0; $i < count($estados); $i++) {
            echo '<tr>';
            echo '<td>' . $estados[$i]['id'] . '</td>';
            echo '<td>' . $estados[$i]['nome'] . '</td>';
            echo '<td>' . $estados[$i]['uf'] . '</td>';
            echo '</tr>';
        }
        ?>
    </table>

    <select>
        <?php
        for ($i = 0; $i < count($estados); $i++) {
            echo '<option value="'. $estados[$i]['id']. '">' .  $estados[$i]['nome'] .' - ' .  $estados[$i]['uf'];
            echo '</option>';
        }
        ?>
    </select>
</body>

</html>