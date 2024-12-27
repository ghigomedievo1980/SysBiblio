<?php 
    require_once("../../../conexao.php");

    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $ideditora = $_POST['ideditora'];
    $idassunto = $_POST['idassunto'];
    $idioma = $_POST['idioma'];
    $nrpaginas = $_POST['nrpaginas'];
    $isbn = $_POST['isbn'];
    $datapublicacao = $_POST['datapublicacao'];
    $traducao = $_POST['traducao'];
    $idtipopublicacao = $_POST['idtipopublicacao'];
    $edicao = $_POST['edicao'];
    $descricao = $_POST['descricao'];
    $id = $_POST['id'];

    //BUSCAR O REGISTRO JÁ CADASTRADO NO BANCO
    $query = $PDO->query("SELECT * FROM acervo WHERE  id = '$id'");
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    $titulo_banco = @$res[0]['titulo'];

    if($titulo != $titulo_banco){
	    $query = $PDO->prepare("SELECT * FROM acervo WHERE titulo = :titulo");
        $query->bindValue(":titulo", "$titulo");
	    $query->execute();
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
	    $total_reg = @count($res);
	    if($total_reg > 0){
		    echo 'Título já Cadastrado!';
		    exit();
        }
    }

    if($id == ""){
	    $query = $PDO->prepare("INSERT INTO acervo SET titulo = :titulo, autor = :autor, ideditora = :ideditora, idassunto = :idassunto, idioma = :idioma, nrpaginas = :nrpaginas, isbn = :isbn, datapublicacao = :datapublicacao, traducao = :traducao, edicao = :edicao, idtipopublicacao = :idtipopublicacao, descricao = :descricao, datacadastro = curDate()");
    }else{
	    $query = $PDO->prepare("UPDATE acervo SET titulo = :titulo, autor = :autor, ideditora = :ideditora, idassunto = :idassunto, idioma = :idioma, nrpaginas = :nrpaginas, isbn = :isbn, datapublicacao = :datapublicacao, traducao = :traducao, edicao = :edicao, idtipopublicacao = :idtipopublicacao, descricao = :descricao WHERE id = '$id'");
    }

    $query->bindValue(":titulo", "$titulo");
    $query->bindValue(":autor", "$autor");
    $query->bindValue(":ideditora", "$ideditora");
    $query->bindValue(":idassunto", "$idassunto");
    $query->bindValue(":idioma", "$idioma");
    $query->bindValue(":nrpaginas", "$nrpaginas");
    $query->bindValue(":isbn", "$isbn");
    $query->bindValue(":datapublicacao", "$datapublicacao");
    $query->bindValue(":traducao", "$traducao");
    $query->bindValue(":idtipopublicacao","$idtipopublicacao");
    $query->bindValue(":edicao", "$edicao");
    $query->bindValue(":descricao", "$descricao");
    $query->execute();
    echo 'Salvo com Sucesso!';
?>