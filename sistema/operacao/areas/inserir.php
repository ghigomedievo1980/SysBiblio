<?php 
    require_once("../../../conexao.php");

    $assunto = $_POST['assunto'];
    $codcatalogo = $_POST['codcatalogo'];
    $id = $_POST['id'];

    //BUSCAR O REGISTRO JÁ CADASTRADO NO BANCO
    $query = $PDO->query("SELECT * FROM assuntos WHERE  id = '$id'");
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    $nome_assunto = @$res[0]['assunto'];

    if($assunto != $nome_assunto){
	    $query = $PDO->prepare("SELECT * FROM assuntos WHERE assunto = :assunto");
	    $query->bindValue(":assunto", "$assunto");
	    $query->execute();
	    $res = $query->fetchAll(PDO::FETCH_ASSOC);
	    $total_reg = @count($res);
	    if($total_reg > 0){
		    echo 'Área já Cadastrada!';
		    exit();
	    }
    }

    if($id == ""){
	    $query = $PDO->prepare("INSERT INTO assuntos SET assunto = :assunto, codcatalogo = :codcatalogo");
    }
    else {
	    $query = $PDO->prepare("UPDATE assuntos SET assunto = :assunto, codcatalogo = :codcatalogo WHERE id = '$id'");
    }

    $query->bindValue(":assunto", "$assunto");
    $query->bindValue(":codcatalogo", "$codcatalogo");
    $query->execute();
    echo 'Salvo com Sucesso!';
?>