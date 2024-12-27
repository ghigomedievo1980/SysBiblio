<?php 
    require_once("../../../conexao.php");

    $nomeusuario = $_POST['nomeusuario'];
    $datanascimento = $_POST['datanascimento'];
    $celular = $_POST['celular'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $logradouro = $_POST['logradouro'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $cep = $_POST['cep'];
    $idnivel = $_POST['idnivel'];
    $id = $_POST['id'];

    //BUSCAR O REGISTRO JÁ CADASTRADO NO BANCO
    $query = $PDO->query("SELECT * FROM usuarios WHERE  id = '$id'");
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    $email_banco = @$res[0]['email'];
    $celular_banco = @$res[0]['celular'];
    $cpf_banco = @$res[0]['cpf'];

    if($email != $email_banco){
	    $query = $PDO->prepare("SELECT * FROM usuarios WHERE email = :email");
        $query->bindValue(":email", "$email");
	    $query->execute();
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
	    $total_reg = @count($res);
	    if($total_reg > 0){
		    echo 'E-mail já Cadastrado!';
		    exit();
        }
    }
    
    if($celular != $celular_banco){
	    $query = $PDO->prepare("SELECT * FROM usuarios WHERE celular = :celular");
        $query->bindValue(":celular", "$celular");
	    $query->execute();
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
	    $total_reg = @count($res);
	    if($total_reg > 0){
		    echo 'Celular já Cadastrado!';
		    exit();
        }
    }

    if($cpf != $cpf_banco){
	    $query = $PDO->prepare("SELECT * FROM usuarios WHERE cpf = :cpf");
        $query->bindValue(":cpf", "$cpf");
	    $query->execute();
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
	    $total_reg = @count($res);
	    if($total_reg > 0){
		    echo 'C.P.F. já Cadastrado!';
		    exit();
        }
    }

    if($id == ""){
	    $query = $PDO->prepare("INSERT INTO usuarios SET nomeusuario = :nomeusuario, datanascimento = :datanascimento, celular = :celular, telefone = :telefone, email = :email, cpf = :cpf, rg = :rg, logradouro = :logradouro, numero = :numero, bairro = :bairro, cidade = :cidade, cep = :cep, estado = :estado, senha = :email, idnivel = :idnivel");
    }else{
	    $query = $PDO->prepare("UPDATE usuarios SET nomeusuario = :nomeusuario, datanascimento = :datanascimento, celular = :celular, telefone = :telefone, email = :email, cpf = :cpf, rg = :rg, logradouro = :logradouro, numero = :numero, bairro = :bairro, cidade = :cidade, cep = :cep, estado = :estado, idnivel = :idnivel WHERE id = '$id'");
    }

    $query->bindValue(":nomeusuario", "$nomeusuario");
    $query->bindValue(":datanascimento", "$datanascimento");
    $query->bindValue(":celular", "$celular");
    $query->bindValue(":telefone", "$telefone");
    $query->bindValue(":email", "$email");
    $query->bindValue(":cpf", "$cpf");
    $query->bindValue(":rg", "$rg");
    $query->bindValue(":logradouro", "$logradouro");
    $query->bindValue(":numero", "$numero");
    $query->bindValue(":bairro", "$bairro");
    $query->bindValue(":cidade", "$cidade");
    $query->bindValue(":cep", "$cep");
    $query->bindValue(":estado", "$estado");
    $query->bindValue(":idnivel", "$idnivel");
    $query->execute();
    echo 'Salvo com Sucesso!';
?>