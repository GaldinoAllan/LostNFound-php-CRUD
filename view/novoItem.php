<?php
require '../controller/administrador.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$array = Administrador::cadastrarItem($_POST);
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<script src="../assets/js/activeStyles/activeStyles.js"></script>
	<link rel="shortcut icon" href="../img/lnf.ico">
	<link rel="stylesheet" href="../assets/css/styles/darkmode.css">
	<title>CADASTRAR ITEM PERDIDO</title>
</head>

<body class="light-theme">
	<div class="container">
		<div clas="span10 offset1">
			<div class="card">
				<div class="card-header">
					<h3 class="well"><img src="../img/lnf.png" width="50px"> Cadastro de Item Perdido</h3>
					<br>
					<!-- <button type="button" class="btn-toggle">
						<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-moon" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" d="M14.53 10.53a7 7 0 0 1-9.058-9.058A7.003 7.003 0 0 0 8 15a7.002 7.002 0 0 0 6.53-4.47z"></path>
						</svg> |
						<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-sun" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path d="M3.5 8a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0z"></path>
							<path fill-rule="evenodd" d="M8.202.28a.25.25 0 0 0-.404 0l-.91 1.255a.25.25 0 0 1-.334.067L5.232.79a.25.25 0 0 0-.374.155l-.36 1.508a.25.25 0 0 1-.282.19l-1.532-.245a.25.25 0 0 0-.286.286l.244 1.532a.25.25 0 0 1-.189.282l-1.509.36a.25.25 0 0 0-.154.374l.812 1.322a.25.25 0 0 1-.067.333l-1.256.91a.25.25 0 0 0 0 .405l1.256.91a.25.25 0 0 1 .067.334L.79 10.768a.25.25 0 0 0 .154.374l1.51.36a.25.25 0 0 1 .188.282l-.244 1.532a.25.25 0 0 0 .286.286l1.532-.244a.25.25 0 0 1 .282.189l.36 1.508a.25.25 0 0 0 .374.155l1.322-.812a.25.25 0 0 1 .333.067l.91 1.256a.25.25 0 0 0 .405 0l.91-1.256a.25.25 0 0 1 .334-.067l1.322.812a.25.25 0 0 0 .374-.155l.36-1.508a.25.25 0 0 1 .282-.19l1.532.245a.25.25 0 0 0 .286-.286l-.244-1.532a.25.25 0 0 1 .189-.282l1.508-.36a.25.25 0 0 0 .155-.374l-.812-1.322a.25.25 0 0 1 .067-.333l1.256-.91a.25.25 0 0 0 0-.405l-1.256-.91a.25.25 0 0 1-.067-.334l.812-1.322a.25.25 0 0 0-.155-.374l-1.508-.36a.25.25 0 0 1-.19-.282l.245-1.532a.25.25 0 0 0-.286-.286l-1.532.244a.25.25 0 0 1-.282-.189l-.36-1.508a.25.25 0 0 0-.374-.155l-1.322.812a.25.25 0 0 1-.333-.067L8.203.28zM8 2.5a5.5 5.5 0 1 0 0 11 5.5 5.5 0 0 0 0-11z"></path>
						</svg>
					</button> -->
				</div>
				<div class="card-body">
					<form class="form-horizontal" action="novoItem.php" method="post">
						<div class="control-group  <?php echo !empty($array['nomeErro']) ? 'error ' : ''; ?>">
							<label class="control-label">Nome: </label>
							<div class="controls">
								<input size="50" class="form-control" name="nome" type="text" placeholder="Nome" value="<?php echo !empty($nome) ? $nome : ''; ?>">
								<?php if (!empty($array['nomeErro'])) : ?>
									<span class="text-danger"><?php echo $array['nomeErro']; ?></span>
								<?php endif; ?>
							</div>
						</div>
						<br>
						<div class="control-group <?php echo !empty($array['dataErro']) ? 'error ' : ''; ?>">
							<label class="control-label">Data: </label>
							<div class="controls">
								<input size="80" class="form-control" name="data" type="date" placeholder="Data" value="<?php echo !empty($data) ? $data : ''; ?>">
								<?php if (!empty($array['dataErro'])) : ?>
									<span class="text-danger"><?php echo $array['dataErro']; ?></span>
								<?php endif; ?>
							</div>
						</div>
						<br>
						<div class="control-group <?php echo !empty($array['localErro']) ? 'error ' : ''; ?>">
							<label class="control-label">Local: </label>
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
								<!-- 
									<div class="controls">
										<select class="form-control" name="categoria" value="<?php echo !empty($categoria) ? $categoria : ''; ?>">
											<option value=""></option>
											<option value="estojo">Estojo</option>
											<option value="folhas">Folhas</option>
											<?php if (!empty($array['categoriaErro'])) : ?>
												<span class="text-danger"><?php echo $array['categoriaErro']; ?></span>
											<?php endif; ?>
									</div>
								-->
							</div>
						</div>
						<br>
						<div class="control-group <?php !empty($array['contidoErro']) ? '$array["contidoErro"]' : ''; ?>">
							<div class="controls">
								<label class="control-label">Situação: </label>
								<div class="form-check">
									<p class="form-check-label">
										<input class="form-check-input" type="radio" name="contido" id="contido" value="Achado" <?php isset($_POST["contido"]) && $_POST["contido"] == "Achado" ? "checked" : null; ?> />
										Achado</p>
								</div>
								<div class="form-check">
									<p class="form-check-label">
										<input class="form-check-input" id="contido" name="contido" type="radio" value="Perdido" <?php isset($_POST["contido"]) && $_POST["contido"] == "Perdido" ? "checked" : null; ?> />
										Perdido</p>
								</div>
								<?php if (!empty($array['contidoErro'])) : ?>
									<span class="help-inline text-danger"><?php echo $array['contidoErro']; ?></span>
								<?php endif; ?>
							</div>
						</div>
						<div class="form-actions">
							<br />
							<button type="submit" class="btn btn-success">Adicionar</button>
							<a href="index.php" type="btn" class="btn btn-default">Voltar</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
</body>

</html>