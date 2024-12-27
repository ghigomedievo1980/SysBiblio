<?php 
	require_once("../../../conexao.php");

	$id = $_POST['id'];
	$query = $PDO->query("SELECT * FROM usuarios WHERE idnivel = '$id'");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);

	if(@count($res) == 0){
	$PDO->query("DELETE FROM niveis WHERE id = '$id'");
	}
	else {
		echo 'Existe[m] '.@count($res).' usuário[s] associado[s] a este nível! Por favor, exclua primeiro o[s] usuário[s] para depois excluir o nível!';
		exit();
	}

	echo 'Excluído com Sucesso!';
?>