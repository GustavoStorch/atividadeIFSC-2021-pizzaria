<html>
<head>
<title>Efetua Pedidos</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="./lib/bootstrap/css/bootstrap.css" rel="stylesheet">
</head>
<body class="container" bgcolor="#FFFFFF" text="#000000">
	<?php 
	   include_once "cabecalho.php";
	   include_once "conexao.inc.php";
	   $sql = "select * from pizzas";
	   
	   $resultado = mysqli_query($conexao, $sql);
	   
	   if (!$resultado) {
	       echo "Não foi possivel executar a consulta ($sql) no banco. Erro: " . mysqli_connect_errno() . ". " . mysqli_connect_error() . ".";
	       exit;
	   }
	   if ($resultado) {
	       include_once "formpedidos.php";
	       include_once "rodape.php";
	   }
	   mysqli_free_result($resultado);
	   mysqli_close($conexao);
	?>
</body>
</html>