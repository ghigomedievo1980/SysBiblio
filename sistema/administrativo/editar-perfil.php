<?php 
    require_once("../../conexao.php");

    $nomeusuario = $_POST['nome_perfil'];
    $datanascimento = $_POST['datanascimento_perfil'];
    $email = $_POST['email_perfil'];
    $cpf = $_POST['cpf_perfil'];
    $rg = $_POST['rg_perfil'];
    $celular =$_POST['celular_perfil'];
    $telefone = $_POST['telefone_perfil'];
    $logradouro = $_POST['logradouro_perfil'];
    $numero = $_POST['numero_perfil'];
    $bairro = $_POST['bairro_perfil'];
    $cidade = $_POST['cidade_perfil'];
    $cep = $_POST['cep_perfil'];
    $estado = $_POST['estado_perfil'];
    $senha = $_POST['senha_perfil'];
    $id = $_POST['id_perfil'];

    //BUSCAR CPF, TELEFONE OU EMAIL JÁ CADASTRADOS NO BANCO
    $query = $PDO->query("SELECT * FROM usuarios WHERE  id = '$id'");
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    $cpf_banco = $res[0]['cpf'];
    $celular_banco = $res[0]['celular'];
    $email_banco = $res[0]['email'];

    if($cpf != $cpf_banco){
	    $query = $PDO->prepare("SELECT * FROM usuarios WHERE  cpf = :cpf");
	    $query-> bindValue(":cpf","$cpf");
	    $query->execute();
	    $res = $query->fetchAll(PDO::FETCH_ASSOC);
	    $total_reg = @count($res);
	    if($total_reg > 0){
		    echo 'C.P.F. já Cadastrado!';
		    exit();
	    }
    }

    if($celular != $celular_banco){
	    $query = $PDO->prepare("SELECT * FROM usuario WHERE  celular = :celular");
	    $query-> bindValue(":celular","$celular");
	    $query->execute();
	    $res = $query->fetchAll(PDO::FETCH_ASSOC);
	    $total_reg = @count($res);
	    if($total_reg > 0){
		    echo 'Celular já Cadastrado!';
		    exit();
	    }
    }

    if($email != $email_banco){
	    $query = $PDO->prepare("SELECT * FROM usuarios WHERE  email = :email");
	    $query->bindValue(":email", "$email");
	    $query->execute();
	    $res = $query->fetchAll(PDO::FETCH_ASSOC);
	    $total_reg = @count($res);
	    if($total_reg > 0){
		    echo 'Email já Cadastrado!';
		    exit();
	    }
    }

    $query = $PDO->prepare("UPDATE usuarios SET nomeusuario = :nomeusuario, datanascimento = :datanascimento, cpf = :cpf, rg = :rg, celular = :celular, telefone = :telefone, email = :email, logradouro = :logradouro, numero = :numero, bairro = :bairro, cidade = :cidade, cep = :cep, estado = :estado, senha = :senha WHERE id = :id");
    $query->bindValue(":nomeusuario", "$nomeusuario");
    $query->bindvalue(":datanascimento", "$datanascimento");
    $query->bindvalue(":cpf", "$cpf");
    $query->bindvalue(":rg", "$rg");
    $query->bindValue(":celular", "$celular");
    $query->bindValue(":telefone", "$telefone");
    $query->bindValue(":email", "$email");
    $query->bindvalue(":logradouro", "$logradouro");
    $query->bindValue(":numero", "$numero");
    $query->bindvalue(":bairro", "$bairro");
    $query->bindvalue(":cidade", "$cidade");
    $query->bindValue(":cep", "$cep");
    $query->bindvalue(":estado", "$estado");
    $query->bindValue(":senha", "$senha");
    $query->bindValue(":id", "$id");
    $query->execute();

    echo 'Salvo com Sucesso!';
?>