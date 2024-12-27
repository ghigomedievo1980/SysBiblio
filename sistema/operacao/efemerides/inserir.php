<?php 
	require_once("../../../conexao.php");

	$efemeride = $_POST['efemeride'];
    $dataefemeride = $_POST['dataefemeride'];
	$id = $_POST['id'];

	//BUSCAR O REGISTRO JÁ CADASTRADO NO BANCO
	$query = $PDO->query("SELECT * FROM efemerides WHERE  id = '$id'");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	$nome_efemeride = @$res[0]['efemeride'];

	if($efemeride != $nome_efemeride){
		$query = $PDO->prepare("SELECT * FROM efemerides WHERE efemeride = :efemeride");
		$query->bindValue(":efemeride", "$efemeride");
		$query->execute();
		$res = $query->fetchAll(PDO::FETCH_ASSOC);
		$total_reg = @count($res);
		if($total_reg > 0){
			echo 'Efeméride já Cadastrada!';
			exit();
		}
	}

	if($id == ""){
		$query = $PDO->prepare("INSERT INTO efemerides SET efemeride = :efemeride, dataefemeride = :dataefemeride");
	}
	else {
		$query = $PDO->prepare("UPDATE efemerides SET efemeride = :efemeride, dataefemeride = :dataefemeride WHERE id = '$id'");
	}

	$query->bindValue(":efemeride", "$efemeride");
    $query->bindValue(":dataefemeride", "$dataefemeride");
	$query->execute();
	echo 'Salvo com Sucesso!';
?>