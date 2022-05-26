<?php
    include './banco.php';

    if(isset($_POST) && isset($_POST['estado'])  && isset($_POST['uf'])){
        $estado = $_POST['estado'];
        $uf = $_POST['uf'];
        $resposta = buscarEstado($estado, $uf);
        if($resposta === NULL){
            header('Location: ../busca.php?error=busca'); 
        } else {
            header('Location: ../busca.php?id=' . $resposta['id'] . '&nome='.$resposta['nome'] . '&uf='.$resposta['uf']); 
        }
    }
?>