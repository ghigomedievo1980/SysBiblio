<?php 
	require_once("../../../conexao.php");

	$id = $_POST['id'];
	$query = $PDO->query("SELECT * FROM livros WHERE ideditora = '$id'");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);

	if(@count($res) == 0){
	$PDO->query("DELETE FROM editoras WHERE id = '$id'");
	}
	else {
		echo 'Existe[m] '.@count($res).' livros[s] associado[s] a esta Editora! Por favor, exclua primeiro o[s] livros[s] para depois excluir a Editora!';
		exit();
	}

	echo 'Excluído com Sucesso!';
?>