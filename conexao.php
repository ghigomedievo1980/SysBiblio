<?php 
    require_once('configuracao.php');

    date_default_timezone_set('America/Sao_Paulo');

    try {
	    $PDO = new PDO("mysql:dbname=$banco;host=$servidor;charset=utf8", "$usuario", "$senha");
    } catch (Exception $e) {
	    echo 'Sem conexao com o Banco de Dados! <br><br>' .$e;
    }
?>