<?php
    $pagina='cad-usuarios';
?>
<div>
	<img src="<?= $base; ?>/assets/imagens/usuarios-64x64.png" alt="Cadastrar Usuários" /><br />
	<h4>Cadastrar Usuários do Sistema</h4>
</div>
<a href="index.php?pag=<?php echo $pagina ?>&funcao=novo" type="button" class="btn btn-primary mt-2 mb-4">Novo Usuário</a>
<small>
<table id="example" class="table table-hover table-sm my-4" style="width:98%;">
		<thead>
			<tr>
			    <th></th>
				<th>Nome do Usuário</th>
				<th>Email</th>
				<th>Celular</th>
				<th>Endereço</th>
                <th>Bairro</th>
				<th>Município</th>
				<th>Nível de Acesso</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$query = $PDO->query("SELECT * FROM usuarios ORDER BY idnivel DESC, nomeusuario ASC");
				$res = $query->fetchAll(PDO::FETCH_ASSOC);
				for($i=0; $i < @count($res); $i++){
					foreach ($res[$i] as $key => $value){	}
					$id_reg = $res[$i]['id'];
					$id_nivel = $res[$i]['idnivel'];
					$datanascimento = implode('/', array_reverse(explode('-', $res[$i]['datanascimento'])));
					
					//BUSCAR O NOME RELACIONADO
					$query2 = $PDO->query("SELECT * FROM niveis WHERE id = '$id_nivel'");
					$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
					$nome_nivel = $res2[0]['nivel'];
			?>
			<tr>
				<td><img src="<?= $base; ?>/assets/imagens/usuarios-16x16.png" alt="Usuários" /></td>
				<td><?php echo $res[$i]['nomeusuario'] ?></td>
				<td><?php echo $res[$i]['email'] ?></td>
				<td><?php echo $res[$i]['celular'] ?></td>
				<td><?php echo $res[$i]['logradouro'].", ".$res[$i]['numero'] ?></td>
				<td><?php echo $res[$i]['bairro'] ?></td>
                <td><?php echo $res[$i]['cidade'] ?></td>
				<td><?php echo $nome_nivel ?></td>
				<td>
					<a href="index.php?pag=<?php echo $pagina ?>&funcao=editar&id=<?php echo $id_reg ?>" title="Editar Usuário">
					<i class="bi bi-pencil-square mr-1 text-primary"></i></a>

					<a href="index.php?pag=<?php echo $pagina ?>&funcao=excluir&id=<?php echo $id_reg ?>" title="Excluir Usuário">
					<i class="bi bi-trash text-danger"></i></a>

					<a href="" onclick="dados('<?php echo $res[$i]["nomeusuario"] ?>', '<?php echo $datanascimento ?>', '<?php echo $res[$i]["cpf"] ?>', '<?php echo $res[$i]["rg"] ?>', '<?php echo $res[$i]["logradouro"] ?>', '<?php echo $res[$i]["numero"] ?>', '<?php echo $res[$i]["bairro"] ?>', '<?php echo $res[$i]["cidade"] ?>', '<?php echo $res[$i]["cep"] ?>', '<?php echo $res[$i]["estado"] ?>', '<?php echo $res[$i]["celular"] ?>', '<?php echo $res[$i]["telefone"] ?>', '<?php echo $res[$i]["email"] ?>', '<?php echo $nome_nivel ?>')" title="Ver Dados">
                    <i class="bi bi-info-circle-fill text-info"></i></a>
				</td>
			</tr>

			<?php } ?>

		</tbody>
	</table>
</small>
<!-- Modal Inserir / Editar Usuário -->
<div class="modal fade" id="cadastro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
	    <div class="modal-content">
		    <div class="modal-header">
			    <?php 
			        if(@$_GET['funcao'] == 'novo'){
			            echo '<img src="../assets/imagens/add_user-32x32.png" alt="Inserir Usuário" />&nbsp;';
				        $titulo_modal = 'Inserir Usuário';
					} else {
					    echo '<img src="../assets/imagens/edit_user-32x32.png" alt="Inserir Usuário" />&nbsp;';
					    $titulo_modal = 'Editar Usuário';
						$id = @$_GET['id'];
						$query = $PDO->query("SELECT * FROM usuarios WHERE  id = '$id'");
						$res = $query->fetchAll(PDO::FETCH_ASSOC);
						$nomeusuario = @$res[0]['nomeusuario'];
						$datanascimento = @$res[0]['datanascimento'];
						$cpf = @$res[0]['cpf'];
						$rg = @$res[0]['rg'];
						$logradouro = @$res[0]['logradouro'];
						$numero = @$res[0]['numero'];
						$bairro = @$res[0]['bairro'];
						$cidade = @$res[0]['cidade'];
						$cep = @$res[0]['cep'];
						$estado = @$res[0]['estado'];
						$celular = @$res[0]['celular'];
						$telefone = @$res[0]['telefone'];
						$email = @$res[0]['email'];						
						$id_nivel = @$res[0]['idnivel'];
					}
				?>
				<h5 class="modal-title" id="exampleModalLabel"><?php echo $titulo_modal ?></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form method="post" id="form">
			    <div class="modal-body">
					<h6>DADOS GERAIS</h6>
					<hr />
				    <div class="row">
					    <div class="col-6">
						    <div class="mb-3">
							    <label for="exampleFormControlInput1" class="form-label">Nome Completo do Usuário </label>
								<input type="text" class="form-control" id="nomeusuario" name="nomeusuario" placeholder="Ex.: João Francisco de Oliveira" value="<?php echo @$nomeusuario ?>" required>
							</div>	
						</div>

						<div class="col-6">
						    <div class="mb-3">
							    <label for="exampleFormControlInput1" class="form-label">Data de Nascimento </label>
								<input type="date" class="form-control" id="datanascimento" name="datanascimento" placeholder="" value="<?php echo @$datanascimento ?>" required>
							</div>	
						</div>

						<div class="col-6">
						    <div class="mb-3">
							    <label for="exampleFormControlInput1" class="form-label">C.P.F. </label>
								<input type="text" class="form-control" id="cpf" name="cpf" placeholder="Ex.: 123.456.789-01" value="<?php echo @$cpf ?>" required>
							</div>	
						</div>

						<div class="col-6">
						    <div class="mb-3">
							    <label for="exampleFormControlInput1" class="form-label">R.G. </label>
								<input type="text" class="form-control" id="rg" name="rg" placeholder="Ex.: 98.654.321-A" value="<?php echo @$rg ?>">
							</div>	
						</div>
					</div>

					<div class="row">
						<h6>LOCALIZAÇÃO</h6>
						<hr />
						<div class="col-6">
						    <div class="mb-3">
							    <label for="exampleFormControlInput1" class="form-label">Endereço </label>
								<input type="text" class="form-control" id="logradouro" name="logradouro" placeholder="Ex.: Alameda da Saudade" value="<?php echo @$logradouro ?>">
							</div>	
						</div>

						<div class="col-4">
						    <div class="mb-3">
							    <label for="exampleFormControlInput1" class="form-label">Número </label>
								<input type="text" class="form-control" id="numero" name="numero" placeholder="" value="<?php echo @$numero ?>">
							</div>	
						</div>

						<div class="col-6">
						    <div class="mb-3">
							    <label for="exampleFormControlInput1" class="form-label">Bairro </label>
								<input type="text" class="form-control" id="bairro" name="bairro" placeholder="Ex.: Jardim Primavera" value="<?php echo @$bairro ?>">
							</div>	
						</div>

						<div class="col-6">
						    <div class="mb-3">
							    <label for="exampleFormControlInput1" class="form-label">Cidade </label>
								<input type="text" class="form-control" id="cidade" name="cidade" placeholder="Ex.: São Paulo" value="<?php echo @$cidade ?>">
							</div>	
						</div>

						<div class="col-6">
						    <div class="mb-3">
							    <label for="exampleFormControlInput1" class="form-label">C.E.P. </label>
								<input type="text" class="form-control" id="cep" name="cep" placeholder="" value="<?php echo @$cep ?>">
							</div>	
						</div>

						<div class="col-4">
						    <div class="mb-3">
							    <label for="exampleFormControlInput1" class="form-label">Estado </label>
								<input type="text" class="form-control" id="estado" name="estado" placeholder="Ex.: SP" value="<?php echo @$estado ?>">
							</div>	
						</div>
					</div>

					<div class="row">
						<h6>CONTATOS</h6>
						<hr />
						<div class="col-4">
						    <div class="mb-3">
							    <label for="exampleFormControlInput1" class="form-label">Celular </label>
								<input type="text" class="form-control" id="celular" name="celular" placeholder="Ex.: (11) 99999-9999" value="<?php echo @$celular ?>" required>
							</div>	
						</div>

						<div class="col-4">
						    <div class="mb-3">
							    <label for="exampleFormControlInput1" class="form-label">Telefone Fixo </label>
								<input type="text" class="form-control" id="telefone" name="telefone" placeholder="Ex.: (11) 3456-7890" value="<?php echo @$telefone ?>">
							</div>	
						</div>

						<div class="col-6">
						    <div class="mb-3">
							    <label for="exampleFormControlInput1" class="form-label">E-Mail </label>
								<input type="email" class="form-control" id="email" name="email" placeholder="nome@exemplo.com" required value="<?php echo @$email ?>">
							</div>	
						</div>
					</div>

				    <div class="row">									
						<div class="col-4">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Nível de Acesso </label>
								<select class="form-select" aria-label="Default select example" name="idnivel">
									<?php 
										$query = $PDO->query("SELECT * FROM niveis ORDER BY id DESC");
										$res = $query->fetchAll(PDO::FETCH_ASSOC);
										for($i=0; $i < @count($res); $i++){
											foreach ($res[$i] as $key => $value){	}
											$idnivel = $res[$i]['id'];
											$nome_nivel = $res[$i]['nivel'];
									?>
									<option <?php if(@$idnivel == @$id_nivel){ ?> selected <?php } ?> value="<?php echo $idnivel ?>"><?php echo $nome_nivel ?></option>
											
									<?php } ?>
								</select>
							</div>	
						</div>
					</div>

					<input type="hidden" name="id"  value="<?php echo @$id ?>">
					<input type="hidden" name="id_user" value="<?php echo $id_usuario ?>">

					<small>
						<div align="center" id="mensagem"></div>
					</small>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-fechar">Fechar</button>
					<button type="submit" class="btn btn-primary">Salvar</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Modal Excluir Usuário -->
<div class="modal fade" id="excluir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	    <div class="modal-content">
		    <div class="modal-header">
		        <img src="../assets/imagens/delete_user-32x32.png" alt="Excluir Usuário" /> &nbsp;
			    <h5 class="modal-title" id="exampleModalLabel">Excluir Usuário</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
		    <form method="post" id="form-excluir">
		        <div class="modal-body">Deseja Mesmo Excluir este Usuário?
                    <input type="hidden" name="id"  value="<?php echo @$id ?>">
                    <small>
                        <div align="center" id="mensagem-excluir"></div>
				    </small>
                </div>
			    <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-fechar-excluir">Fechar</button>
				    <button type="submit" class="btn btn-danger">Excluir</button>
			    </div>
				<small>
					<input type="hidden" name="id_user" value="<?php echo $id_usuario ?>">
				</small>
		    </form>
	    </div>
	</div>
</div>
<!-- Modal Informações -->
<div class="modal fade" id="modal-dados" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	    <div class="modal-content">
			<div class="modal-header">
			    <img src="../assets/imagens/info_user-32x32.png" alt="Info User" />&nbsp;
			    <h5 class="modal-title" id="nome_registro"></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="mb-2">
                    <span><b>Data de Nascimento : </b></span><span id="datanascimento_registro"></span>
				</div>
				<div class="mb-2">
                    <span><b>C.P.F. : </b></span><span id="cpf_registro"></span> <span><b>R.G. : </b></span><span id="rg_registro"></span>
				</div>
				<hr />
				<div class="mb-2">
                    <span><b>Endereço : </b></span><span id="logradouro_registro"></span> <span><b>Nr. : </b></span><span id="numero_registro"></span>
				</div>
				<div class="mb-2">
				    <span><b>Bairro : </b></span><span id="bairro_registro"></span> <span><b>Município : </b></span><span id="cidade_registro"></span>
				</div>
                <div class="mb-2">
					<span><b>C.E.P. : </b></span><span id="cep_registro"></span> <span><b>Estado : </b></span><span id="estado_registro"></span>
				</div>
				<hr />
				<div class="mb-2">
			        <span><b>Celular : </b></span><span id="celular_registro"></span>
				</div>
				<div class="mb-2">
			        <span><b>Telefone Fixo : </b></span><span id="telefone_registro"></span>
				</div>
                <div class="mb-2">
                    <span><b>E-mail : </b></span><span id="email_registro"></span>
				</div>
				<hr />
                <div class="mb-2">
				    <span><b>Nível de Acesso : </b></span><span id="nivel_registro"></span>
				</div>
			</div>
	    </div>
	</div>
</div>

<?php 
    if(@$_GET['funcao'] == 'novo'){ ?>
	    <script type="text/javascript">
		    var myModal = new bootstrap.Modal(document.getElementById('cadastro'), {
				backdrop: 'static'
			})

			myModal.show();
		</script>
			
		<?php } ?>

<?php 
	if(@$_GET['funcao'] == 'editar'){ ?>
		<script type="text/javascript">
		    var myModal = new bootstrap.Modal(document.getElementById('cadastro'), {
				backdrop: 'static'
			})

			myModal.show();
		</script>
		
		<?php } ?>

<?php 
	if(@$_GET['funcao'] == 'excluir'){ ?>
		<script type="text/javascript">
		    var myModal = new bootstrap.Modal(document.getElementById('excluir'), {

			})

		    myModal.show();
		</script>
			
		<?php } ?>

<script type="text/javascript">
	$(document).ready(function() {
		$('#example').DataTable({
	    	"ordering": false
		});
	} );
</script>

<!-- Ajax para inserir ou editar dados -->
<script type="text/javascript">
    $("#form").submit(function () {
	    event.preventDefault();
		var formData = new FormData(this);
		var pag = "<?=$pagina?>";

		$.ajax({
	    url: "../operacao/usuarios/inserir.php",
		type: 'POST',
		data: formData,

	    success: function (mensagem) {

	        $('#mensagem').removeClass()

		    if (mensagem.trim() == "Salvo com Sucesso!") {
                $('#btn-fechar').click();
                window.location = "index.php?pag="+pag;
            }else{
                $('#mensagem').addClass('text-danger')
            }

            $('#mensagem').text(mensagem)

            },

            cache: false,
            contentType: false,
            processData: false,
            
        });

	});
</script>

<!-- Ajax para excluir dados -->
<script type="text/javascript">
	$("#form-excluir").submit(function () {
	event.preventDefault();
	var formData = new FormData(this);
	var pag = "<?=$pagina?>";

	$.ajax({
	url: "../operacao/usuarios/excluir.php",
	type: 'POST',
	data: formData,

	success: function (mensagem) {

	    $('#mensagem-excluir').removeClass()

	    if (mensagem.trim() == "Excluído com Sucesso!") {
            $('#btn-fechar-excluir').click();
            window.location = "index.php?pag="+pag;

        }else{
            $('#mensagem-excluir').addClass('text-danger')
        }
            $('#mensagem-excluir').text(mensagem)

        },

        cache: false,
        contentType: false,
        processData: false,
            
        });

	});
</script>
			
<script type="text/javascript">
	function dados(nomeusuario, datanascimento, cpf, rg, logradouro, numero, bairro, cidade, cep, estado, celular, telefone, email, nivel){
		event.preventDefault();
		var myModal = new bootstrap.Modal(document.getElementById('modal-dados'), {
						
	});

	    myModal.show();
	    $('#nome_registro').text(nomeusuario);
		$('#datanascimento_registro').text(datanascimento);
		$('#cpf_registro').text(cpf);
		$('#rg_registro').text(rg);
		$('#logradouro_registro').text(logradouro);
		$('#numero_registro').text(numero);
		$('#bairro_registro').text(bairro);
		$('#cidade_registro').text(cidade);
		$('#cep_registro').text(cep);
		$('#estado_registro').text(estado);
		$('#celular_registro').text(celular);
		$('#telefone_registro').text(telefone);
	    $('#email_registro').text(email);
		$('#nivel_registro').text(nivel);
	}
</script>