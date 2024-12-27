<?php 
    require_once("../../../conexao.php");

    $id = $_POST['id'];

    //BUSCAR O REGISTRO JÁ CADASTRADO NO BANCO
    $query = $PDO->query("SELECT * FROM santos WHERE  id = '$id'");

    $PDO->query("DELETE FROM santos WHERE id = '$id'");

    echo 'Excluído com Sucesso!';
?>