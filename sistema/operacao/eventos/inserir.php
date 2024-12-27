<?php 
	require_once("../../../conexao.php");

	$evento = $_POST['evento'];
    $dataevento = $_POST['dataevento'];
	$id = $_POST['id'];

	//BUSCAR O REGISTRO JÁ CADASTRADO NO BANCO
	$query = $PDO->query("SELECT * FROM santos WHERE  id = '$id'");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	$nome_evento = @$res[0]['evento'];

	if($evento != $nome_evento){
		$query = $PDO->prepare("SELECT * FROM eventos WHERE evento = :evento");
		$query->bindValue(":evento", "$evento");
		$query->execute();
		$res = $query->fetchAll(PDO::FETCH_ASSOC);
		$total_reg = @count($res);
		if($total_reg > 0){
			echo 'Evento Histórico já Cadastrado!';
			exit();
		}
	}

	if($id == ""){
		$query = $PDO->prepare("INSERT INTO eventos SET evento = :evento, dataevento = :dataevento");
	}
	else {
		$query = $PDO->prepare("UPDATE eventos SET evento = :evento, dataevento = :dataevento WHERE id = '$id'");
	}

	$query->bindValue(":evento", "$evento");
    $query->bindValue(":dataevento", "$dataevento");
	$query->execute();
	echo 'Salvo com Sucesso!';
?>