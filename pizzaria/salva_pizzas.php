<?php
include_once('conexao.inc.php');
$codigo = $_POST['codigo'];
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$valor = $_POST['valor'];

$result_msg_pizza = "INSERT INTO pizzas(codigo, nome, descricao, valor) VALUES ('$codigo', '$nome', '$descricao', '$valor')";
$resultado_msg_pizza = mysqli_query($conexao, $result_msg_pizza);
?>
<?php include_once 'cardapio.php';?>