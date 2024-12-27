<?php
    $pagina = 'principal';
?>
<div class="caixa-pesquisa">
    <div class="container-fluid">
        <form class="d-flex" role="search" action="busca.php" method="GET">
            <input class="form-control me-2" type="search" placeholder="Busque por Autor, Título ou palavra-chave..." aria-label="Search" size="30" name="search">
            <button class="btn btn-outline-success" type="submit">Pequisar</button>
        </form>
    </div>
</div>
<small>
    <div class="cabecalho-pag--principal">
        <a href="#"><button class="btn-cabecalho">Renovação de Livros</button></a>
        <a href="index.php?pag=<?php echo $catalogolivros; ?>"><button class="btn-cabecalho">Catálogo de Livros</button></a>
        <a href="index.php?pag=<?php echo $catalogoperiodicos; ?>"><button class="btn-cabecalho">Catálogo de Periódicos</button></a>
        <a href="#"><button class="btn-cabecalho">Acervo Completo</button></a>
    </div>
    <div class="apresentacao">
        <div class="apresentacao--titulo">
            <h1>SysBiblio - Sistema Bibliotecário</h1>
            <hr />
        </div>
        <div class="apresentacao--texto">
            O <strong>SysBiblio - Sistema de Biblioteca -</strong> é um projeto pessoal que visa alguns aspectos: <br />
            <ol>
                <li>Cadastrar meu acervo bibliotecário pessoal;</li>
                <li>Poder consultar de maneira mais rápida os conteúdos presentes neste acervo.</li>
            </ol>    
            O projeto também acaba sendo um modelo de diversos outros sistemas que, pessoalmente, quero desenvolver.
            Para além de ajudar em apenas fazer uma pequena consulta acerca do acervo que possuo, o projeto SysBiblio é um desafio 
            para colocar em prática todas as ferramentas e aprendizagem que, desde algum tempo, venho procurado adquirir. 
            Neste aspecto, o projeto <strong>SysBiblio</strong> é também uma maneira de trabalhar com mais eficácia com algumas linguagens 
            de marcação, bem como linguagens de programação e com a modelagem de dados, elementos que, pessoalmente, gosto muito de trabalhar e 
            conhecer, desenvolver, entre tantas outras possibilidades.<br />
            Na seção <strong>Sobre</strong>, disponível no menu de navegação desta página, conto um pouco mais sobre o <strong>SysBiblio</strong> e 
            conto um pouco da minha trajetória.<br />
            Seja bem vindo ao <strong>SysBiblio!</strong><br />
        </div>
    </div>
    <div class="datas-diversas">
        <div class="efemerides">
            <h3>Efemérides</h3>
            <?php include('efemerides.php'); ?>
        </div>
        <div class="eventos">
            <h3>Eventos Históricos</h3>
            <?php include('eventos.php'); ?>
        </div>
        <div class="santos">
            <h3>Santo do Dia</h3>
            <?php include('santo.php'); ?>
        </div>
    </div>
</small>