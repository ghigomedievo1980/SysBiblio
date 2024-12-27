<?php 
	require_once("../../../conexao.php");

	$nivel = $_POST['nivel'];
	$id = $_POST['id'];

	//BUSCAR O REGISTRO JÁ CADASTRADO NO BANCO
	$query = $PDO->query("SELECT * FROM niveis WHERE  id = '$id'");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	$nome_nivel = @$res[0]['nivel'];

	if($nivel != $nome_nivel){
		$query = $PDO->prepare("SELECT * FROM niveis WHERE nivel = :nivel");
		$query->bindValue(":nivel", "$nivel");
		$query->execute();
		$res = $query->fetchAll(PDO::FETCH_ASSOC);
		$total_reg = @count($res);
		if($total_reg > 0){
			echo 'Nivel já Cadastrado!';
			exit();
		}
	}

	if($id == ""){
		$query = $PDO->prepare("INSERT INTO niveis SET nivel = :nivel");
	}
	else {
		$query = $PDO->prepare("UPDATE niveis SET nivel = :nivel WHERE id = '$id'");
	}

	$query->bindValue(":nivel", "$nivel");
	$query->execute();
	echo 'Salvo com Sucesso!';
?>