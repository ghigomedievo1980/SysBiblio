<?php
    @session_start();
	require_once('../../conexao.php');
	require_once('verificar.php');
    require_once('../assets/variaveis.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>SysBiblio - Sistema Biblioteca Virtual - Área Administrativa</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="<?= $base; ?>/assets/imagens/sysbiblio.ico" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="<?= $base; ?>/assets/css/formatacao.css" />
		<link rel="stylesheet" type="text/css" href="<?= $base; ?>/vendor/css/datatables.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript" src="<?= $base; ?>/vendor/js/datatables.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg" style="background-color: #1A374D;">
			<div class="container-fluid">
				<a class="navbar-brand" href="<?= $base; ?>/administrativo/index.php"><img class="logo" src="<?= $base; ?>/assets/imagens/logo_sysbiblio_fundo_azul-233x199.png" alt="SysBiblio Logo" width="100"></a>
				<button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-1 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link active text-light" aria-current="page" href="index.php?pag=<?php echo $principal ?>"><i class="bi bi-house"></i> Principal</a>
						</li>
					
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<i class="bi bi-collection"></i> Acervo
							</a>
							<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
								<li><a class="dropdown-item" href="#"><i class="bi bi-book"></i> Livros</a></li>
								<li><a class="dropdown-item" href="#"><i class="bi bi-newspaper"></i> Periódicos</a></li>
								<li><hr class="dropdown-divider"></li>
								<li><a class="dropdown-item" href="#"><i class="bi bi-disc"></i> CDs</a></li>
								<li><a class="dropdown-item" href="#"><i class="bi bi-disc-fill"></i> DVDs</a></li>
			            	</ul>
			             
			            	<li class="nav-item dropdown">
			            		<a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
			                    <i class="bi bi-folder-plus"></i> Cadastros
			                	</a>
			                	<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
			                    	<li><a class="dropdown-item" href="index.php?pag=<?php echo $cadlivros ?>"><i class="bi bi-book"></i> Livros</a></li>
			                    	<li><a class="dropdown-item" href="index.php?pag=<?php echo $cadperiodicos ?>"><i class="bi bi-newspaper"></i> Periódicos</a></li>
			                    	<li><hr class="dropdown-divider"></li>
									<li><a class="dropdown-item" href="#"><i class="bi bi-disc"></i> CDs</a></li>
									<li><a class="dropdown-item" href="#"><i class="bi bi-disc-fill"></i> DVDs</a></li>
									<li><a class="dropdown-item" href="#"><i class="bi bi-file-earmark-music"></i> Faixas CD</a></li>
									<li><hr class="dropdown-divider"></li>
			                    	<li><a class="dropdown-item" href="index.php?pag=<?php echo $cadeditoras ?>"><i class="bi bi-printer"></i> Editoras</a></li>
			                   		<li><a class="dropdown-item" href="index.php?pag=<?php echo $cadareas ?>"><i class="bi bi-chat-square-dots"></i> Áreas</a></li>
									<li><hr class="dropdown-divider"></li>
									<li><a class="dropdown-item" href="index.php?pag=<?php echo $cadefemerides ?>"><i class="bi bi-clock-history"></i> Efemérides</a></li>
									<li><a class="dropdown-item" href="index.php?pag=<?php echo $cadeventos ?>"><i class="bi bi-calendar-event"></i> Eventos Históricos</a></li>
									<li><a class="dropdown-item" href="index.php?pag=<?php echo $cadsantos ?>"><i class="bi bi-person"></i> Santo do Dia</a></li>
									<li><hr class="dropdown-divider"></li>
									<li><a class="dropdown-item" href="index.php?pag=<?php echo $cadusuarios ?>"><i class="bi bi-person-plus"></i> Usuários</a></li>
			                		<li><a class="dropdown-item" href="index.php?pag=<?php echo $cadniveis ?>"><i class="bi bi-diagram-3"></i> Níveis</a></li>
								</ul>
			           	 	</li>

							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								<i class="bi bi-binoculars"></i> Consultas
								</a>
								<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
									<li><a class="dropdown-item" href="#">Editoras</a></li>
									<li><a class="dropdown-item" href="#">Áreas</a></li>
									<li><hr class="dropdown-divider"></li>
									<li><a class="dropdown-item" href="#">Usuários</a></li>
									<li><a class="dropdown-item" href="#">Níveis</a></li>
									<li><hr class="dropdown-divider"></li>
									<li><a class="dropdown-item" href="#">Estatisticas</a></li>
								</ul>
							</li>
				
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								<i class="bi bi-patch-question"></i> Sobre
								</a>
								<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
									<li><a class="dropdown-item" href="#">SysBiblio</a></li>
									<li><a class="dropdown-item" href="#">Suporte</a></li>
								</ul>
							</li>
						</li>
						<ul></ul>
						<ul class="navbar-nav me-auto mb-1 mb-lg-0">
							<li class="nav-item"><a class="nav-link drowndown-toggle text-light" href="http://localhost/sysbiblio" target="_blank">Visualizar Site <i class="bi bi-box-arrow-up-right"></i></a></li>
						</ul>
						<ul></ul>
						<form class="d-flex mr-4">
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle text-light" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-circle"></i> <?php echo $nome_usuario; ?></a>
								<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
									<li><a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#perfil"><i class="bi bi-pencil-square"></i> Editar Perfil</a></li>
									<li><hr class="dropdown-divider"></li>
									<li><a class="dropdown-item" href="../../logout.php"><i class="bi bi-x-octagon-fill"></i> Sair</a></li>
								</ul>
							</li>
						</form>
					</div>
				</div>
			</div>
		</nav>
        <hr />
        <div class="container-fluid mt-4 mx-4 px-4">
     		<?php 
     			if(@$_GET['pag'] == $principal) {
     				require_once($principal.'.php');
				
				} else if(@$_GET['pag'] == $cadlivros) {
					require_once($cadlivros.'.php');

				} else if(@$_GET['pag'] == $cadperiodicos) {
					require_once($cadperiodicos.'.php');

				} else if(@$_GET['pag'] == $cadeditoras) {
					require_once($cadeditoras.'.php');

				} else if(@$_GET['pag'] == $cadareas) {
					require_once($cadareas.'.php');

				} else if(@$_GET['pag'] == $cadefemerides) {
					require_once($cadefemerides.'.php');

				} else if(@$_GET['pag'] == $cadeventos) {
					require_once($cadeventos.'.php');
				
				} else if(@$_GET['pag'] == $cadsantos) {
					require_once($cadsantos.'.php');

				} else if(@$_GET['pag'] == $cadusuarios) {
					require_once($cadusuarios.'.php');

				} else if(@$_GET['pag'] == $cadniveis) {
					require_once($cadniveis.'.php');

				} else if(@$_GET['pag'] == $sistema) {
     		    	require_once($sistema.'.php');
     		    
     			} else if(@$_GET['pag'] == $suporte) {
     		    	require_once($suporte.'.php');
     		    
     			} else {
     				require_once($principal.'.php');
     			}
     		?>
		</div>
		<p></p>
        <footer>
			<div class="rodape">
				<div class="logado">
					<img src="../assets/imagens/logado.png" alt="Logado Como">
					Logado como: <?php echo $nome_usuario; ?> - <?php echo $nivel_usuario; ?>.
				</div>
				<div class="copyright">
					&copy; <?php echo date('Y') ?> - <?php echo $nomesite; ?>
				</div>
				<div class="versao">
					Versão: <?php echo $versao; ?>.
				</div>
			</div>
		</footer>
    </body>
</html>
<!-- Modal Editar Perfil-->
<div class="modal fade" id="perfil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<img src="<?= $base; ?>/assets/imagens/edit_user-32x32.png" alt="Editar Usuário" />&nbsp;
				<h5 class="modal-title" id="exampleModalLabel">Editar Perfil</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form method="post" id="form-perfil">
				<div class="modal-body">
					<div class="row">
						<h6>DADOS GERAIS</h6>
						<hr />
						<div class="col-6">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Nome do Usuário </label>
								<input type="text" class="form-control" id="nome_perfil" name="nome_perfil" placeholder="João da Silva" value="<?php echo $nome_usuario ?>" required>
							</div>
						</div>

						<div class="col-6">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Data de Nascimento </label>
								<input type="date" class="form-control" id="datanascimento_perfil" name="datanascimento_perfil" value="<?php echo $datanasc_usuario ?>" required>
							</div>
						</div>
					</div>

					<div class="row">
						<h6>DOCUMENTOS</h6>
						<hr />
						<div class="col-6">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">C.P.F. </label>
								<input type="text" class="form-control" id="cpf" name="cpf_perfil" placeholder="303.030.030-12" value="<?php echo $cpf_usuario ?>">
							</div>
						</div>

						<div class="col-6">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">R.G. </label>
								<input type="text" class="form-control" id="rg" name="rg_perfil" placeholder="12.121.212-3" value="<?php echo $rg_usuario ?>">
							</div>
						</div>
					</div>
					
					<div class="row">
						<h6>CONTATOS</h6>
						<hr />
						<div class="col-6">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Telefone Celular </label>
								<input type="text" class="form-control" id="celular" name="celular_perfil" placeholder="(11) 98765-4321" required value="<?php echo $celular_usuario ?>">
							</div>
						</div>

						<div class="col-6">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Telefone Fixo </label>
								<input type="text" class="form-control" id="telefone" name="telefone_perfil" placeholder="(11) 98765-4321" required value="<?php echo $telefone_usuario ?>">
							</div>
						</div>

						<div class="col-8">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">E-mail </label>
								<input type="email" class="form-control" id="email_perfil" name="email_perfil" placeholder="nome@exemplo.com" value="<?php echo $email_usuario ?>" required>
							</div>
						</div>
					</div>

					<div class="row">
						<h6>LOCALIZAÇÃO</h6>
						<hr />
						<div class="col-6">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Endereço </label>
								<input type="text" class="form-control" id="logradouro_perfil" name="logradouro_perfil" placeholder="Rua Tal, 110" value="<?php echo $logradouro_usuario ?>">
							</div>
						</div>

						<div class="col-4">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Número </label>
								<input type="text" class="form-control" id="numero_perfil" name="numero_perfil" placeholder="" value="<?php echo $numero_usuario ?>">
							</div>
						</div>

						<div class="col-6">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Bairro </label>
								<input type="text" class="form-control" id="bairro_perfil" name="bairro_perfil" placeholder="Jardim Primavera" value="<?php echo $bairro_usuario ?>">
							</div>
						</div>
								
						<div class="col-6">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Município </label>
								<input type="text" class="form-control" id="cidade_perfil" name="cidade_perfil" placeholder="São Paulo" value="<?php echo $cidade_usuario ?>">
							</div>
						</div>

						<div class="col-6">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">C.E.P. </label>
								<input type="text" class="form-control" id="cep" name="cep_perfil" placeholder="" value="<?php echo $cep_usuario ?>">
							</div>
						</div>

						<div class="col-6">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Estado </label>
								<input type="text" class="form-control" id="estado_perfil" name="estado_perfil" placeholder="SP" value="<?php echo $estado_usuario ?>">
							</div>
						</div>
							
						<div class="col-6">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Senha </label>
								<input type="text" class="form-control" id="senha_perfil" name="senha_perfil" placeholder="" required value="<?php echo $senha_usuario?>">
							</div>
						</div>
                	</div>

					<input type="hidden" name="id_perfil"  value="<?php echo $id_usuario ?>">
			
					<small>
						<div align="center" id="mensagem-perfil"></div>
					</small>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-fechar-perfil">Fechar</button>
					<button type="submit" class="btn btn-primary">Editar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Mascaras JS -->
<script type="text/javascript" src="<?= $base; ?>/vendor/js/mascaras.js"></script>

 <!-- Ajax para funcionar Mascaras JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script> 

 <!-- Ajax para inserir ou editar dados -->
<script type="text/javascript">
	$("#form-perfil").submit(function () {
		event.preventDefault();
		var formData = new FormData(this);

		$.ajax({
			url: "editar-perfil.php",
			type: 'POST',
			data: formData,

			success: function (mensagem) {

				$('#mensagem-perfil').removeClass()

				if (mensagem.trim() == "Salvo com Sucesso!") {

                    //$('#nome').val('');
                    //$('#telefone').val('');
                    $('#btn-fechar-perfil').click();
                    //window.location = "index.php?pagina="+pag;

                } else {

                	$('#mensagem-perfil').addClass('text-danger')
                }

                $('#mensagem-perfil').text(mensagem)

            },

            cache: false,
            contentType: false,
            processData: false,
            
        });

	});
</script>