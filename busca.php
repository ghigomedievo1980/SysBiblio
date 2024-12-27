<?php
    require_once('configuracao.php');

    // Configurações do banco de dados
    $host = 'localhost'; // Endereço do servidor
    $dbname = 'sysbiblio'; // Nome do banco de dados
    $username = 'root'; // Usuário do banco
    $password = ''; // Senha do banco

    try {
        // Conexão com o banco de dados
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Conexão para contagem do acervo
        $conn = new mysqli($host, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Falha na conexão com o banco de dados: " . $conn->connect_error);
        }

        // Verifica se foi enviada uma palavra para pesquisa
        $searchTerm = isset($_GET['search']) ? trim($_GET['search']) : '';
        $results = [];

        if ($searchTerm) {
            // Consulta ao banco de dados
            $stmt = $pdo->prepare("
                SELECT acervo.titulo, acervo.autor, acervo.descricao, assuntos.assunto AS assunto
                FROM acervo
                INNER JOIN assuntos ON acervo.idassunto = assuntos.id
                WHERE acervo.titulo LIKE :search 
                    OR acervo.autor LIKE :search 
                    OR acervo.descricao LIKE :search
                    OR assuntos.assunto LIKE :search
            ");
            $stmt->execute([':search' => '%' . $searchTerm . '%']);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        die("Erro de conexão: " . $e->getMessage());
    }
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
        <style>
            body { font-family: Arial, sans-serif; margin: 10px; }
            h1 { color: #333; }
            .book { margin-bottom: 20px; padding: 10px; border: 1px solid #ddd; border-radius: 5px; }
            .book h2 { margin: 0; color: #007BFF; }
            .book p { margin: 5px 0; }
        </style>
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
                </nav>
            </div>
        </header>
        <main>
            <hr>
            <div class="caixa-pesquisa">
                <div class="container-fluid">
                    <h4>Nova Pesquisa</h4>
                    <form class="d-flex" role="search" action="busca.php" method="GET">
                        <input class="form-control me-2" type="search" placeholder="Busque por Autor, Título ou palavra-chave..." aria-label="Search" size="30" name="search">
                        <button class="btn btn-outline-success" type="submit">Pequisar</button>
                    </form>
                </div>
            </div>
            <hr>
            <?php if ($searchTerm): ?>
                <h2>Resultados para: "<?= htmlspecialchars($searchTerm) ?>"</h2>
                <?php echo '<strong><span style="color: #0431B4;">Total: </span></strong>'?><?= count($results) ?> <?php echo 'livros encontrados.'; ?>
                <?php echo '<br><br>'; ?>
                <?php if ($results): ?>
                    <?php foreach ($results as $book): ?>
                        <div class="book">
                            <h2><?= htmlspecialchars($book['titulo']) ?></h2>
                            <p><strong>Autor:</strong> <?= htmlspecialchars($book['autor']) ?> <strong>Área:</strong> <?= htmlspecialchars($book['assunto']) ?></p>
                            <p><strong><span style="text-align: justify">Descrição:</strong> <?= htmlspecialchars($book['descricao']) ?></span></p>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Nenhum resultado encontrado.</p>
                <?php endif; ?>
            <?php endif; ?>
        </main>
        <hr>
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
