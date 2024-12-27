<?php 
    $pagina = 'catalogo-livros';
?>
<small>
    <h1 class="cabecalho-catalogo-livro">Catálogo dos Livros</h1>
    <ul>
        <div class="caixa-pesquisa--catalogo">
            <nav class="navbar bg-body-tertiary">
                <div class="container-fluid">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Busque por Autor, Título ou palavra-chave..." aria-label="Search" size="50">
                        <button class="btn btn-outline-success" type="submit">Pequisar</button>
                    </form>
                </div>
            </nav>
        </div>
    </ul>
    <hr>
    <?php
        $query = $PDO->query("SELECT * FROM acervo WHERE idtipopublicacao = 1 ORDER BY titulo");
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        for($i=0; $i < @count($res); $i++){
            foreach ($res[$i] as $key => $value){	}
            $id_reg = $res[$i]['id'];
            $id_editora = $res[$i]['ideditora'];
            $id_assunto = $res[$i]['idassunto'];
        
            //BUSCAR O NÍVEL RELACIONADO
            $query2 = $PDO->query("SELECT * FROM editoras WHERE id = '$id_editora'");
            $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
            $nome_editora = $res2[0]['nomeeditora'];
        
            $query3 = $PDO->query("SELECT * FROM assuntos WHERE id = '$id_assunto'");
            $res3 = $query3->fetchAll(PDO::FETCH_ASSOC);
            $nome_assunto = $res3[0]['assunto'];
    ?>
<small>
    <table id="example" class="table table-hover table-sm my-4" style="width:98%;">
        <tbody>
            <tr>
                <td colspan="3" class="titulo"><?php echo '<h4>'.$res[$i]['titulo'].'</h4> <strong>Edição: </strong>'.$res[$i]['edicao'].'ª | <strong>Autor: </strong>'.$res[$i]['autor'] ?></td>
            </tr>
            <tr>
                <td class="titulo-celula"><?php echo '<strong>Páginas: </strong>' ?></td>
                <td class="conteudo-celula"><?php echo $res[$i]['nrpaginas'] ?></td>
            </tr>
            <tr>
                <td class="titulo-celula"><?php echo '<strong>Editora: </strong>'?></td>
                <td class="conteudo-celula"><?php echo $nome_editora; ?></td>
            </tr>
            <tr>
                <td class="titulo-celula"><?php echo '<strong>Idioma: </strong>' ?></td>
                <td class="conteudo-celula"><?php echo $res[$i]['idioma'] ?></td>
            </tr>
            <tr>
                <td class="titulo-celula"><?php echo '<strong>ISBN:</strong>' ?></td>
                <td class="conteudo-celula"><?php echo $res[$i]['isbn'] ?></td>
            </tr>
            <tr>
                <td class="titulo-celula"><?php echo '<strong>Área</strong>' ?></td>
                <td class="conteudo-celula"><?php echo $nome_assunto ?></td>
            </tr>
            <tr>
                <td class="titulo-descricao" colspan="2"><?php echo '<strong><span style="color: #0101DF;">Descrição:</span></strong> '.$res[$i]['descricao'] ?></td>
            </tr>
            <?php }
                if(@count($res) == 0) {
                    echo '<h2>Nenhum Livro foi registrado no acervo!</h2>';
                }
            ?>
            <hr />
        </tbody>
    </table>
</small>
<script type="text/javascript">
	$(document).ready(function() {
		$('#example').DataTable({
			"ordering": false
		});
	} );
</script>