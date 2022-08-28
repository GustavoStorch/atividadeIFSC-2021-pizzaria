<html>
<head>
<title>Adicionar pizzas</title>
<link href="./lib/bootstrap/css/bootstrap.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=iso=8859-1">
</head>
<body class="container">
<?php include_once 'cabecalho.php';?>

<form class="container form-horizontal" method="POST" action="salva_pizzas.php">
		<div class="form-group">
			<label class="col-sm-2 control-label">Código da Pizza:</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="codigo"
					placeholder="Código da Pizza*" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Nome da Pizza:</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="nome"
					placeholder="Nome da Pizza*" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Descrição da Pizza:</label>
			<div class="col-sm-8">
				<textarea class="form-control" name="descricao"
					placeholder="Descrição da Pizza*" required></textarea>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Valor da Pizza:</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" name="valor"
					placeholder="Valor da Pizza*" required>
			</div>
		</div>
		<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
		<input class="btn btn-primary" type="submit" value="Salvar">
		<td width="32%"><b><font size="2"
				face="Verdana, Arial, Helvetica, sans-serif"><a href="index.php">Retornar</a></font></b></td>
	</div></div>
	</form>

<?php include_once 'rodape.php';?>
</body>
</html>