<?php
session_start();
?>
<?php
include_once "conexao.inc.php";

$totpizza = isset($_SESSION['pizzas']) ? $_SESSION['pizzas'] : null;
$numped = isset($_SESSION['pedido']) ? $_SESSION['pedido'] : null;

if (!isset($totpizza)) {
    $sql = "select * from pizzas";

    $resultado = mysqli_query($conexao, $sql);

    if (!$resultado) {
        echo "Não foi possivel executar a consulta ($sql) no banco. Erro: " . mysqli_connect_errno() . ". " . mysqli_connect_error() . ".";

        exit;
    }
    $totpizza = mysqli_num_rows($resultado);

    $_SESSION['pizzas'] = $totpizza;

    mysqli_free_result($resultado);
    mysqli_close($conexao);
}
?>
<html>
<head>
<title>Pizzaria do IFSC</title>
<link href="./lib/bootstrap/css/bootstrap.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body bgcolor="#FFFFFF" text="#000000" class="container">
	<?php
include_once "cabecalho.php";
?>
	<table width="100%" border="0" cellspacing="0">
		<tr>
			<td width="49%">
				<table width="99%" border="0" cellspacing="0">
					<tr>
						<td width="9%">&nbsp;</td>
						<td width="91%">&nbsp;</td>
					</tr>
					<tr>
						<td width="9%"><a href="cardapio.php"><img
								src="imagens/bullet.gif" width="12" height="11" border="0"></a>
						</td>
						<td width="91%"><b><font size="2"
								face="Verdana, Arial, Helvetica, sans-serif">Consulte nosso
									cardápio</font></b></td>
					</tr>
					<tr>
						<td width="9%">&nbsp;</td>
						<td width="91%"><b><font size="2"
								face="Verdana, Arial, Helvetica, sans-serif"></font></b></td>
					</tr>
					<tr>
						<td width="9%"><a href="efetuapedido01.php"><img
								src="imagens/bullet.gif" width="12" height="11" border="0"></a></td>
						<td width="91%"><b><font size="2"
								face="Verdana, Arial, Helvetica, sans-serif">Pedidos on-line</font></b></td>
					</tr>
					<tr>
						<td width="9%">&nbsp;</td>
						<td width="91%"><b><font size="2"
								face="Verdana, Arial, Helvetica, sans-serif"></font></b></td>
					</tr>
					<tr>
						<td width="9%"><a href="formpizzas.php"><img
								src="imagens/bullet.gif" width="12" height="11" border="0"></a></td>
						<td width="91%"><b><font size="2"
								face="Verdana, Arial, Helvetica, sans-serif">Adicionar Pizza</font></b></td>
					</tr>
					<tr>
						<td width="9%">&nbsp;</td>
						<td width="91">&nbsp;</td>
					</tr>
					<tr>
						<td width="9%" height="21">&nbsp;</td>
						<td width="91%" height="21"><font
							face="Arial, Helvetica, sans-serif" size="2">Existem <?php  echo $totpizza; ?> sabores de pizzas em nossa loja. Confira!</font></td>
					</tr>
				</table>
			</td>
			<td width="26%">&nbsp; </td>
			<td width="25%">
					<?php
    if (isset($numped)) {
        include "tabpedidos.php";
    }
    ?>
				</td>
		</tr>
	</table>
		<?php
include_once "rodape.php";
?>
</body>
</html>