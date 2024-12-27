<?php 
    require_once("../../../conexao.php");

    $nomeeditora = $_POST['nomeeditora'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $pais = $_POST['pais'];

    $id = $_POST['id'];

    //BUSCAR O REGISTRO JÁ CADASTRADO NO BANCO
    $query = $PDO->query("SELECT * FROM editoras WHERE  id = '$id'");
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    $editora_banco = @$res[0]['nomeeditora'];

    if($nomeeditora != $editora_banco){
	    $query = $PDO->prepare("SELECT * FROM editoras WHERE nomeeditora = :nomeeditora");
        $query->bindValue(":nomeeditora", "$nomeeditora");
	    $query->execute();
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
	    $total_reg = @count($res);
	    if($total_reg > 0){
		    echo 'Editora já Cadastrada!';
		    exit();
        }
    }

    if($id == ""){
	    $query = $PDO->prepare("INSERT INTO editoras SET nomeeditora = :nomeeditora, cidade = :cidade, estado = :estado, pais = :pais");
    } 
    else {
	    $query = $PDO->prepare("UPDATE editoras SET nomeeditora = :nomeeditora, cidade = :cidade, estado = :estado, pais = :pais WHERE id = '$id'");
    }

    $query->bindValue(":nomeeditora", "$nomeeditora");
    $query->bindValue(":cidade", "$cidade");
    $query->bindValue(":estado", "$estado");
    $query->bindValue(":pais", "$pais");
    $query->execute();
    echo 'Salvo com Sucesso!';
?>