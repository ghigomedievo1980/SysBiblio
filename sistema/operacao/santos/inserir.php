<?php 
	require_once("../../../conexao.php");

	$nomesanto = $_POST['nomesanto'];
    $datasanto = $_POST['datasanto'];
	$id = $_POST['id'];

	//BUSCAR O REGISTRO JÁ CADASTRADO NO BANCO
	$query = $PDO->query("SELECT * FROM santos WHERE  id = '$id'");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	$nome_santo = @$res[0]['nomesanto'];

	if($nomesanto != $nome_santo){
		$query = $PDO->prepare("SELECT * FROM santos WHERE nomesanto = :nomesanto");
		$query->bindValue(":nomesanto", "$nomesanto");
		$query->execute();
		$res = $query->fetchAll(PDO::FETCH_ASSOC);
		$total_reg = @count($res);
		if($total_reg > 0){
			echo 'Nome de Santo já Cadastrado!';
			exit();
		}
	}

	if($id == ""){
		$query = $PDO->prepare("INSERT INTO santos SET nomesanto = :nomesanto, datasanto = :datasanto");
	}
	else {
		$query = $PDO->prepare("UPDATE santos SET nomesanto = :nomesanto, datasanto = :datasanto WHERE id = '$id'");
	}

	$query->bindValue(":nomesanto", "$nomesanto");
    $query->bindValue(":datasanto", "$datasanto");
	$query->execute();
	echo 'Salvo com Sucesso!';
?>