<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="shortcut icon" href="../img/lnf.ico">
	<link rel="stylesheet" href="../assets/css/styles/darkmode.css">
	<title>Lost N Found</title>
</head>

<body class="light-theme">
	<div class="container">
		<div class="">
			<div class="container">
				<center>
					<h1 class="display-4"><img src="../img/ifLogo.png" width="120px">
						Lost N' Found
						<img src="../img/lnf.png" width="100px"></h1>
				</center>
				<hr class="my-4">
				<center>
					<p class="lead">PAINEL DE CONTROLE</p>
				</center>
			</div>
		</div>
		</br>
		<!-- <button type="button" class="btn-toggle">
			<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-moon" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" d="M14.53 10.53a7 7 0 0 1-9.058-9.058A7.003 7.003 0 0 0 8 15a7.002 7.002 0 0 0 6.53-4.47z"></path>
			</svg> |
			<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-sun" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
				<path d="M3.5 8a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0z"></path>
				<path fill-rule="evenodd" d="M8.202.28a.25.25 0 0 0-.404 0l-.91 1.255a.25.25 0 0 1-.334.067L5.232.79a.25.25 0 0 0-.374.155l-.36 1.508a.25.25 0 0 1-.282.19l-1.532-.245a.25.25 0 0 0-.286.286l.244 1.532a.25.25 0 0 1-.189.282l-1.509.36a.25.25 0 0 0-.154.374l.812 1.322a.25.25 0 0 1-.067.333l-1.256.91a.25.25 0 0 0 0 .405l1.256.91a.25.25 0 0 1 .067.334L.79 10.768a.25.25 0 0 0 .154.374l1.51.36a.25.25 0 0 1 .188.282l-.244 1.532a.25.25 0 0 0 .286.286l1.532-.244a.25.25 0 0 1 .282.189l.36 1.508a.25.25 0 0 0 .374.155l1.322-.812a.25.25 0 0 1 .333.067l.91 1.256a.25.25 0 0 0 .405 0l.91-1.256a.25.25 0 0 1 .334-.067l1.322.812a.25.25 0 0 0 .374-.155l.36-1.508a.25.25 0 0 1 .282-.19l1.532.245a.25.25 0 0 0 .286-.286l-.244-1.532a.25.25 0 0 1 .189-.282l1.508-.36a.25.25 0 0 0 .155-.374l-.812-1.322a.25.25 0 0 1 .067-.333l1.256-.91a.25.25 0 0 0 0-.405l-1.256-.91a.25.25 0 0 1-.067-.334l.812-1.322a.25.25 0 0 0-.155-.374l-1.508-.36a.25.25 0 0 1-.19-.282l.245-1.532a.25.25 0 0 0-.286-.286l-1.532.244a.25.25 0 0 1-.282-.189l-.36-1.508a.25.25 0 0 0-.374-.155l-1.322.812a.25.25 0 0 1-.333-.067L8.203.28zM8 2.5a5.5 5.5 0 1 0 0 11 5.5 5.5 0 0 0 0-11z"></path>
			</svg>
		</button> -->
		<h3 align="center">LISTA DE ITENS PERDIDOS</h3>
		<div class="row">
			<p>
				<a href="novoItem.php" class="btn btn-success">Adicionar</a>
			</p>
			<table class="table table-striped">
				<thead>
					<tr>
						<th scope="col">Id</th>
						<th scope="col">Nome</th>
						<th scope="col">Data</th>
						<th scope="col">Local</th>
						<th scope="col">Descrição</th>
						<th scope="col">Categoria</th>
						<th scope="col">Contido</th>
						<th scope="col">Ação</th>
					</tr>
				</thead>
				<tbody>
					<?php
					include '../controller/banco.php';
					$pdo = Banco::conectar();
					$sql = 'SELECT * FROM item ORDER BY id DESC';

					foreach ($pdo->query($sql) as $row) {
						echo '<tr>';
						echo '<th scope="row">' . $row['id'] . '</th>';
						echo '<td>' . $row['nome'] . '</td>';
						echo '<td>' . $row['data'] . '</td>';
						echo '<td>' . $row['local'] . '</td>';
						echo '<td>' . $row['descricao'] . '</td>';
						echo '<td>' . $row['categoria'] . '</td>';
						echo '<td>' . $row['contido'] . '</td>';
						echo '<td width=250>';
						echo '<a class="btn btn-primary" href="infoItem.php?id=' . $row['id'] . '">Info</a>';
						echo ' ';
						echo '<a class="btn btn-warning" href="editarItem.php?id=' . $row['id'] . '">Atualizar</a>';
						echo ' ';
						echo '<a class="btn btn-danger" href="removerItem.php?id=' . $row['id'] . '">Excluir</a>';
						echo '</td>';
						echo '</tr>';
					}
					Banco::desconectar();
					?>
				</tbody>
			</table>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	<script src="../assets/js/activeStyles/activeStyles.js"></script>
</body>

</html>