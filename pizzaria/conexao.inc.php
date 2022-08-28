<?php
define('DB_HOST', 'localhost');
define('DB_LOGIN', 'root');
define('DB_PASSWORD', 'gu19032002');
define('DB_SCHEMA', 'pizzaria3');

$conexao = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_SCHEMA);

if (!$conexao){
    echo "Erro ao conectar com o banco! Erro: " . mysqli_connect_errno() . ". " . mysqli_connect_error() . ".";
    exit();
}
?>