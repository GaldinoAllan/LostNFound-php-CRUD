<?php

require '../controller/administrador.php';

$id = null;
if (!empty($_GET['id'])) {
	$id = $_REQUEST['id'];
}

if (null == $id) {
	header("Location: index.php");
}

if (!empty($_POST)) {
	$array = Administrador::editItem($_POST, $id);
	$nome = $_POST['nome'];
	$local = $_POST['local'];
	$data = $_POST['data'];
	$descricao = $_POST['descricao'];
	$categoria = $_POST['categoria'];
	$contido = $_POST['contido'];
} else {
	$data = Administrador::getInfoItem($id);
	$nome = $data['nome'];
	$local = $data['local'];
	$descricao = $data['descricao'];
	$categoria = $data['categoria'];
	$contido = $data['contido'];
	$data = $data['data'];
	Banco::desconectar();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="shortcut icon" href="../img/lnf.ico">
	<!-- using new bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<title>Atualizar Item</title>
</head>

<body>
	<div class="container">

		<div class="span10 offset1">
			<div class="card">
				<div class="card-header">
					<h3 class="well"> Atualizar Item </h3>
				</div>
				<div class="card-body">
					<form class="form-horizontal" action="editarItem.php?id=<?php echo $id ?>" method="post">

						<div class="control-group <?php echo !empty($array['nomeErro']) ? 'error' : ''; ?>">
							<label class="control-label">Nome</label>
							<div class="controls">
								<input name="nome" class="form-control" size="50" type="text" placeholder="Nome" value="<?php echo !empty($nome) ? $nome : ''; ?>">
								<?php if (!empty($array['nomeErro'])) : ?>
									<span class="text-danger"><?php echo $array['nomeErro']; ?></span>
								<?php endif; ?>
							</div>
						</div>
						<br>
						<div class="control-group <?php echo !empty($array['dataErro']) ? 'error ' : ''; ?>">
							<label class="control-label">Data</label>
							<div class="controls">
								<input size="80" class="form-control" name="data" type="date" placeholder="Data" value="<?php echo !empty($data) ? $data : ''; ?>">
								<?php if (!empty($array['dataErro'])) : ?>
									<span class="text-danger"><?php echo $array['dataErro']; ?></span>
								<?php endif; ?>
							</div>
						</div>
						<br>
						<div class="control-group <?php echo !empty($array['localErro']) ? 'error ' : ''; ?>">
							<label class="control-label">Local</label>
							<div class="controls">
								<input size="35" class="form-control" name="local" type="text" placeholder="Local" value="<?php echo !empty($local) ? $local : ''; ?>">
								<?php if (!empty($array['localErro'])) : ?>
									<span class="text-danger"><?php echo $array['localErro']; ?></span>
								<?php endif; ?>
							</div>
						</div>
						<br>
						<div class="control-group <?php !empty($array['descricaoErro']) ? '$array["descricaoErro"] ' : ''; ?>">
							<label class="control-label">Descricao: </label>
							<div class="controls">
								<input size="40" class="form-control" name="descricao" type="textbox" placeholder="Descricao" value="<?php echo !empty($descricao) ? $descricao : ''; ?>">
								<?php if (!empty($array['descricaoErro'])) : ?>
									<span class="text-danger"><?php echo $array['descricaoErro']; ?></span>
								<?php endif; ?>
							</div>
						</div>
						<br>
						<div class="control-group <?php !empty($array['categoriaErro']) ? '$array["categoriaErro"] ' : ''; ?>">
							<label class="control-label">Categoria: </label>
							<div class="controls">
								<input size="40" class="form-control" name="categoria" type="textbox" placeholder="Categoria" value="<?php echo !empty($categoria) ? $categoria : ''; ?>">
								<?php if (!empty($array['categoriaErro'])) : ?>
									<span class="text-danger"><?php echo $array['categoriaErro']; ?></span>
								<?php endif; ?>
							</div>
						</div>
						<br>
						<div class="control-group <?php echo !empty($array['contidoErro']) ? 'error' : ''; ?>">
							<label class="control-label">Situação</label>
							<div class="controls">
								<div class="form-check">
									<p class="form-check-label">
										<input class="form-check-input" type="radio" name="contido" id="contido" value="Achado" <?php echo ($contido == "Achado") ? "checked" : null; ?> /> Achado
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="contido" id="contido" value="Perdido" <?php echo ($contido == "Perdido") ? "checked" : null; ?> /> Perdido
								</div>
								</p>
								<?php if (!empty($array['contidoErro'])) : ?>
									<span class="text-danger"><?php echo $array['contidoErro']; ?></span>
								<?php endif; ?>
							</div>
						</div>

						<br />
						<div class="form-actions">
							<button type="submit" class="btn btn-warning">Atualizar</button>
							<a href="index.php" type="btn" class="btn btn-default">Voltar</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="../assets/js/bootstrap.min.js"></script>
</body>

</html>