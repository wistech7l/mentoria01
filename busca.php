<?php
$msgErr = '';
$result = '';
if (isset($_GET) && isset($_GET['error'])) {
    $msgErr = $_GET['error'];
}
if (isset($_GET) && isset($_GET['id']) && isset($_GET['nome']) && isset($_GET['uf'])) {
    $result = $_GET['id'] . ': ' . $_GET['nome'] . ' - ' . $_GET['uf'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/reset.css">
    <link rel="stylesheet" href="./assets/css/stilo.css">
    <script src="./assests/js/script.js" defer></script>
    <title>Login</title>
</head>

<body>
    <header>
        <figure>
            <img src="" alt="logo">
        </figure>
        <ul>
            <li> <a href="./">Home</a></li>
        </ul>
    </header>
    <main>
        <form action="./lib/valida.php" method="post" enctype="multipart/form-data">
            <p>
                <label> Estado </label>
                <input name="estado" type="text" id="box_login">
            </p>

            <p>
                <label> uf </label>
                <input name="uf" type="text" id="box_ano">
            </p>

            <?php

            if ($msgErr !== '') {
                echo '<p>';
                echo '<label> Erro busca ' . $msgErr . '</label>';
                echo '</p>';
            }
            ?>
            <p>
                <input type="submit" value="buscar">
                <input type="button" value="Cancelar" onclick="bt_cancelar()">
            </p>

        </form>
        <textarea id="w3review" name="w3review" rows="4" cols="50">
            <?php
                echo $result
            ?>
        </textarea>

    </main>
    <footer>

    </footer>
</body>

</html>