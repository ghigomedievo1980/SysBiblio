<?php 
   require_once('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
    <title>SysBiblio - Acesso ao Sistema</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <link rel="shortcut icon" href="<?= $url; ?>/assets/imagens/sysbiblio.ico" type="image/x-icon">
        <link href="<?= $url; ?>/assets/css/login.css" rel="stylesheet">     
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body background="<?= $url; ?>/assets/imagens/fundo_azul.png">
        <div id="login">
            <div class="container">
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6">
                        <div id="login-box" class="col-md-12">
                            <form id="login-form" class="form" action="autenticar.php" method="post">
                                <h3 class="text-center text-info"><img src="<?= $url; ?>/assets/imagens/logo1_fundo_cinza-107x12.png" width="80px" height="80px"></h3>
                                <div class="form-group">
                                    <label for="username" class=""><img src="<?= $url; ?>/assets/imagens/user_icon.png" alt="Usuário" /> Nome de Usuário ou E-mail:</label><br>
                                    <input type="text" name="usuario" id="usuario" class="form-control" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="senha" class=""><img src="<?= $url; ?>/assets/imagens/user_senha.png" alt="Senha Usuário" /> Senha:</label><br>
                                    <input type="password" name="senha" id="senha" class="form-control" required>
                                </div>
                                <div class="form-group mt-4">
                                    <input type="submit" name="submit" class="btn btn-info btn-md" value="Acessar">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p></p>
        <p></p>
        <br />
        <div style="font-family: Tahoma; color: #FAFAFA; font-size: 10pt;">
            <footer>
                <div class="rodape">
                    <p align="center">&copy <?php echo date('Y'); ?> - <?php echo $nomesite; ?></p>
                </div>
	        </footer>
        </div>
    </body>
</html>