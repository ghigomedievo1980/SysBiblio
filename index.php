<?php 
    require_once('conexao.php');
    require_once('configuracao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>SysBiblio - Sistema Biblioteca</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="<?= $url; ?>/assets/imagens/sysbiblio.ico" type="image/x-icon" />
        <link rel="stylesheet" type="text/css" href="<?= $url; ?>/assets/css/estilo.css"  />
        <link rel="stylesheet" type="text/css" href="<?= $url; ?>/assets/css/datatables.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <script type="text/javascript" src="<?= $url; ?>/assets/js/datatables.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
        <header>
            <div class="logo">
                <div class="logo-img">
                    <a href="index.php?pag=<?php echo $principal; ?>">
                        <img src="<?= $url; ?>/assets/imagens/logo_sysbiblio_fundo_azul-233x199.png" alt="Logo" width="50%"/>
                    </a>
                </div>
            </div>
            <div class="menu">
                <nav class="navegacao">
                    <ul>
                        <li><a href="index.php?pag=<?php echo $sobre; ?>">Sobre</a></li>
                        <li><a href="index.php?pag=<?php echo $pesquisas; ?>">Pesquisas</a></li>
                        <li><a href="index.php?pag=<?php echo $servicos; ?>">Serviços</a></li>
                    </ul>
                    <ul>
                        <div class="login">
                            <a href="<?= $url; ?>/login.php"><input type="submit" name="submit" class="btn-login" value="Área Administrativa" /></a>
                        </div>
                    </ul>
                </nav> 
            </div>
        </header>
        <main>
            <div class="container-fluid mt-4 mx-4 px-4">
                <?php
                    if(@$_GET['pag'] == $principal) {
                        require_once($principal.'.php');
                    
                    } else if(@$_GET['pag'] == $catalogolivros) {
                        require_once($catalogolivros.'.php');

                    } else if(@$_GET['pag'] == $catalogoperiodicos) {
                        require_once($catalogoperiodicos.'.php');

                    } else if(@$_GET['pag'] == $busca) {
                        require_once($busca.'.php');

                    } else if(@$_GET['pag'] == $sobre) {
                        require_once($sobre.'.php');

                    } else if(@$_GET['pag'] == $pesquisas) {
                        require_once($pesquisas.'.php');

                    } else if(@$_GET['pag'] == $servicos) {
                        require_once($servicos.'.php');

                    } else {
                        require_once($principal.'.php');
                    }
                ?>
            </div>
        </main>
        <footer>
            <div class="rodape">
                <div class="menu-rodape">
                    <ul>
                        <li class="menu-rodape--cabecalho"><strong>Institucional</strong></li>
                        <li><a href="#">Quem Somos?</a></li>
                        <li><a href="#">Proteção de Dados Pessoais</a></li>
                    </ul>
                    <ul>
                        <li class="menu-rodape--cabecalho"><strong>Pesquisas</strong></li>
                        <li><a href="#">Catálogo de Livros</a></li>
                        <li><a href="#">Catálogo de Periódicos</a></li>
                    </ul>
                    <ul>
                        <li class="menu-rodape--cabecalho"><strong>Contato</strong></li>
                        <li><a href="#">Fale Conosco</a></li>
                        <li><a href="#">Dúvidas Frequentes</a></li>
                    </ul>
                    <ul>
                        <li class="menu-rodape--cabecalho"><strong>Sobre</strong></li>
                        <li><a href="#">SysBiblio</a></li>
                        <li><a href="#">Desenvolvedor</a></li>
                    </ul>
                </div>   
            </div>
            <div class="midias">
                <a href="https://www.facebook.com/sysbiblio"><img src="assets/imagens/facebook.png" alt="Facebook" /></a>
                <a href="https://www.instagram.com/sysbiblio"><img src="assets/imagens/instagram.png" alt="Instagram" /></a>
                <a href="https://www.twitter.com/sysbiblio"><img src="assets/imagens/twitter.png" alt="Twitter" /></a>
                <a href="https://www.linkedin.com/sysbiblio"><img src="assets/imagens/linkedin.png" alt="LinkedIn" /></a>
                <a href="https://www.whatsapp.com/sysbiblio"><img src="assets/imagens/whatsapp.png" alt="WhatsApp" /></a>
            </div>
            <div class="copyright">
                &copy; <?php echo date('Y') ?> - <?php echo $nomesite; ?> : Todos os direitos reservados.
            </div>
            <div class="desenvolvedor">
                Desenvolvido por <?php echo $autor_site; ?>.
            </div>
        </footer>
    </body>
</html>