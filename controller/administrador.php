<?php
require 'banco.php';
class Administrador
{
	public static function cadastrarItem($post_var)
	{
		$nomeErro = null;
		$dataErro = null;
		$localErro = null;
		$descricaoErro = null;
		$categoriaErro = null;
		$contidoErro = null;

		if (!empty($post_var)) {
			$array = self::validarItem($post_var);

			if ($array['validacao']) {
				$pdo = Banco::conectar();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO item (nome, data, local, descricao, categoria, contido) VALUES(?,?,?,?,?,?)";
				$q = $pdo->prepare($sql);
				$q->execute(array($post_var['nome'], $post_var['data'], $post_var['local'], $post_var['descricao'], $post_var['categoria'], $post_var['contido']));
				Banco::desconectar();
				header("Location: index.php");
			}
			return $array;
		}
	}

	public static function deletarItem($post_var)
	{
		$id = $post_var['id'];

		//Delete do banco:
		$pdo = Banco::conectar();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "DELETE FROM item where id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		Banco::desconectar();
		header("Location: index.php");
	}

	public static function getInfoItem($id)
	{
		$pdo = Banco::conectar();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM item where id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		Banco::desconectar();
		return $data;
	}

	public static function validarItem($post_var)
	{
		$array = [
			"validacao" => True,
			"nomeErro" => '',
			"dataErro" => '',
			"localErro" => '',
			'descricaoErro' => '',
			'categoriaErro' => '',
			'contidoErro' => ''
		];

		if (empty($post_var['nome'])) {
			$array["nomeErro"] = '*Campo de preenchimento obrigatório';
			$array["validacao"] = False;
		}

		if (empty($post_var['data'])) {
			$array["dataErro"] = '*Campo de preenchimento obrigatório';
			$array["validacao"] = False;
		}


		if (empty($post_var['local'])) {
			$array["localErro"] = '*Campo de preenchimento obrigatório';
			$array["validacao"] = False;
		}

		if (empty($post_var['descricao'])) {
			$array["descricaoErro"] = '*Campo de preenchimento obrigatório';
			$array["validacao"] = False;
		}

		if (empty($post_var['categoria'])) {
			$array["categoriaErro"] = '*Campo de preenchimento obrigatório';
			$array["validacao"] = False;
		}

		if (empty($post_var['contido'])) {
			$array["contidoErro"] = '*Campo de preenchimento obrigatório';
			$array["validacao"] = False;
		}
		return $array;
	}

	public static function editItem($post_var, $id)
	{
		$array = self::validarItem($post_var);
		// update data
		if ($array['validacao']) {
			$pdo = Banco::conectar();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE item  set nome = ?, data = ?, local = ?, descricao = ?, categoria = ?, contido = ? WHERE id = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($post_var['nome'], $post_var['data'], $post_var['local'], $post_var['descricao'], $post_var['categoria'], $post_var['contido']));
			Banco::desconectar();
			header("Location: index.php");
		}
		return $array;
	}
}
