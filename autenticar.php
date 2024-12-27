<?php 
	require_once('conexao.php');
	@session_start();
	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];

	$query = $PDO->prepare("SELECT * FROM usuarios WHERE (nomeusuario = :usuario or email = :usuario) and senha = :senha");
	$query->bindValue(":usuario", "$usuario");
	$query->bindValue(":senha", "$senha");
	$query->execute();

	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	$total_reg = @count($res);
	if($total_reg > 0){
		$_SESSION['nomeusuario'] = $res[0]['nomeusuario'];
        $_SESSION['datanascimento'] = $res[0]['datanascimento'];
        $_SESSION['cpf'] = $res['cpf'];
        $_SESSION['rg'] = $res['rg'];
		$_SESSION['logradouro'] = $res[0]['logradouro'];
        $_SESSION['numero'] = $res[0]['numero'];
        $_SESSION['bairro'] = $res[0]['bairro'];
        $_SESSION['cidade'] = $res[0]['cidade'];
        $_SESSION['cep'] = $res[0]['cep'];
        $_SESSION['estado'] = $res[0]['estado'];
        $_SESSION['celular'] = $res[0]['celular'];
		$_SESSION['telefone'] = $res[0]['telefone'];
        $_SESSION['email'] = $res[0]['email'];
		$_SESSION['idnivel'] = $res[0]['idnivel'];
		$_SESSION['id'] = $res[0]['id'];
		if($res[0]['idnivel'] == '4'){
			echo "<script language='javascript'> window.location='sistema/administrativo/' </script>";
		} else if($res[0]['idnivel'] == '3'){
			echo "<script language='javascript'> window.location='sistema/bibliotecario/' </script>";
		} else if($res[0]['idnivel'] == '2'){
			echo "<script language='javascript'> window.location='sistema/biblioteca/' </script>";
		} else if($res[0]['idnivel'] == '1'){
			echo "<script language='javascript'> window.location='sistema/sysbiblio/' </script>";
		} 
	}

	if($total_reg == 0){
    	echo "<script language='javascript'>alert('Login e/ou Senha incorreto[s]! Verifique...')</script>";
    	echo "<script language='javascript'> window.location='logout.php' </script>";
	}
 ?>