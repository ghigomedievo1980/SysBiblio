<?php 
    require_once("../../../conexao.php");

    $id = $_POST['id'];

    //BUSCAR O REGISTRO JÁ CADASTRADO NO BANCO
    $query = $PDO->query("SELECT * FROM usuarios WHERE  id = '$id'");
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    $email_banco = @$res[0]['email'];
    $cpf_banco = @$res[0]['cpf'];
    $celular_banco = @$res[0]['celular'];

    $PDO->query("DELETE FROM usuarios WHERE id = '$id'");
    $PDO->query("DELETE FROM usuarios WHERE email = '$email_banco'");
    $PDO->query("DELETE FROM usuarios WHERE cpf = '$cpf_banco'");
    $PDO->query("DELETE FROM usuarios WHERE celular = '$celular_banco");

    echo 'Excluído com Sucesso!';
?>