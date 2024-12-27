<?php 
    require_once("../../../conexao.php");

    $id = $_POST['id'];

    //BUSCAR O REGISTRO JÁ CADASTRADO NO BANCO
    $query = $PDO->query("SELECT * FROM eventos WHERE  id = '$id'");

    $PDO->query("DELETE FROM eventos WHERE id = '$id'");

    echo 'Excluído com Sucesso!';
?>