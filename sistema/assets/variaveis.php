<?php
    // RECUPERANDO OS DADOS DO USUÁRIO LOGADO
    $id_usuario = $_SESSION['id'];
	$query = $PDO->query("SELECT * FROM usuarios WHERE id = '$id_usuario'");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	$total_reg = @count($res);
	if($total_reg > 0){
		$nome_usuario = $res[0]['nomeusuario'];
		$datanasc_usuario = $res[0]['datanascimento'];
		$email_usuario = $res[0]['email'];
		$cpf_usuario = $res[0]['cpf'];
		$rg_usuario = $res[0]['rg'];
        $logradouro_usuario = $res[0]['logradouro'];
        $numero_usuario = $res[0]['numero'];
        $bairro_usuario = $res[0]['bairro'];
		$cidade_usuario = $res[0]['cidade'];
        $cep_usuario = $res[0]['cep'];
		$estado_usuario = $res[0]['estado'];
        $celular_usuario = $res[0]['celular'];
		$telefone_usuario = $res[0]['telefone'];
		$senha_usuario = $res[0]['senha'];
		$idnivel_usuario = $res[0]['idnivel'];

        $query2 = $PDO->query("SELECT * FROM niveis WHERE id = '$idnivel_usuario'");
        $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
        $total_reg2 = @count($res2);
        $nivel_usuario = $res2[0]['nivel'];
	}

    

    // VARIÁVEIS GLOBAIS DO SISTEMA
    $base ='http://localhost/sysbiblio/sistema';
    $principal = 'principal';
    $cadlivros = 'cad-livros';
    $cadperiodicos = 'cad-periodicos';
    $cadeditoras = 'cad-editoras';
    $cadareas = 'cad-areas';
    $cadefemerides = 'cad-efemerides';
    $cadeventos = 'cad-eventos';
    $cadsantos = 'cad-santos';
    $cadusuarios = 'cad-usuarios';
    $cadniveis = 'cad-niveis';
    $sistema = 'sistema';
    $suporte = 'suporte';
    $versao = '1.0.0';

?>