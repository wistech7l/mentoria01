<?php
    require __DIR__ . '/../vendor/autoload.php';

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
    $dotenv->load();

    $host = $_ENV['HOST'];
    $user = $_ENV['USER'];
    $password = $_ENV['PASSWORD'];
    $database = $_ENV['DATABASE'];

    function conecta() {
        $host = $GLOBALS['host'];
        $user = $GLOBALS['user'];
        $password = $GLOBALS['password'] ;
        $database = $GLOBALS['database'];
        $mysqli = mysqli_connect($host, $user, $password, $database);

        if (mysqli_connect_errno()) {
            return NULL;
        }else {
            return $mysqli;
        }
    }

    function getEstados(){
        $link = conecta();
        $lista = [];
        if($link !== NULL){
            $query = 'SELECT id, nome, uf FROM estados;';
            $result = mysqli_query($link, $query);
            if($result){
                while ($row = mysqli_fetch_row($result)) {
                   $estado = array(
                       'id' => (INT) $row[0],
                        'nome' => $row[1], 
                        'uf' => $row[2]
                    );
                    array_push($lista, $estado);
                }
            }
            return $lista;
        }
    }

    function buscarEstado($nome, $uf){
        $link = conecta();
        if($link !== NULL){
            $query = "SELECT id, nome, uf FROM estados WHERE nome ='" . $nome . "' and uf='" . $uf . "' LIMIT 1;";
            $result = mysqli_query($link, $query);
            if($result){
                while ($row = mysqli_fetch_row($result)) {
                    $estado = array(
                        'id' => (INT) $row[0],
                         'nome' => $row[1], 
                         'uf' => $row[2]
                     );
                     return $estado;
                }
            }
        }
    }
?>