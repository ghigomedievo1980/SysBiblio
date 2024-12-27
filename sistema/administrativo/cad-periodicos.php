<?php
    $pagina = 'cad-periodicos';
?>
<div>
    <img src="<?= $base; ?>/assets/imagens/livros-64x64.png" alt="Cadastrar Livros" /><br />
    <h4>Cadastrar Livros</h4>
</div>
<a href="index.php?pag=<?php echo $pagina ?>&funcao=novo" type="button" class="btn btn-primary mt-2 mb-4">Novo Livro</a>

<small>
	<table id="example" class="table table-hover table-sm my-4" style="width:98%;">
		<thead>
			<tr>
                <th></th>
				<th>Título</th>
				<th>Autor</th>
				<th>Editora</th>
				<th>Área</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			    $query = $PDO->query("SELECT * FROM acervo WHERE idtipopublicacao = 2 ORDER BY titulo ASC");
			    $res = $query->fetchAll(PDO::FETCH_ASSOC);
			    for($i=0; $i < @count($res); $i++){
				    foreach ($res[$i] as $key => $value){	}
				    $id_reg = $res[$i]['id'];
				    $id_editora = $res[$i]['ideditora'];
                    $id_assunto = $res[$i]['idassunto'];
                
                    //BUSCAR EDITORA RELACIONADA
                    $query2 = $PDO->query("SELECT * FROM editoras WHERE id = '$id_editora'");
                    $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
                    $nome_editora = $res2[0]['nomeeditora'];

                    //BUSCAR ÁREA RELACIONADA
                    $query3 = $PDO->query("SELECT * FROM assuntos WHERE id = '$id_assunto'");
                    $res3 = $query3->fetchAll(PDO::FETCH_ASSOC);
                    $nome_assunto = $res3[0]['assunto'];
                
                    $datapublicacao = implode('/', array_reverse(explode('-', $res[$i]['datapublicacao'])));
                    $datacadastro = implode('/', array_reverse(explode('-', $res[$i]['datacadastro'])));
				
			?>
			<tr>
                <td><img src="<?= $base; ?>/assets/imagens/livros-16x16.png" alt="Livros" title="Livros"></td>
				<td><?php echo $res[$i]['titulo'] ?></td>
				<td><?php echo $res[$i]['autor'] ?></td>
				<td><?php echo $nome_editora ?></td>
				<td><?php echo $nome_assunto ?></td>
				<td>
					<a href="index.php?pag=<?php echo $pagina ?>&funcao=editar&id=<?php echo $id_reg ?>" title="Editar Livro">
                    <i class="bi bi-pencil-square mr-1 text-primary"></i></a>
					<a href="index.php?pag=<?php echo $pagina ?>&funcao=excluir&id=<?php echo $id_reg ?>" title="Excluir Livro">
                    <i class="bi bi-trash text-danger"></i></a>
					<a href="" onclick="dados('<?php echo $res[$i]["titulo"] ?>', '<?php echo $res[$i]["autor"] ?>', '<?php echo $nome_editora ?>', '<?php echo $nome_assunto ?>', '<?php echo $res[$i]["idioma"] ?>', '<?php echo $res[$i]["nrpaginas"] ?>', '<?php echo $res[$i]["isbn"] ?>', '<?php echo $datapublicacao ?>', '<?php echo $datacadastro ?>', '<?php echo $res[$i]["traducao"] ?>', '<?php echo $res[$i]["edicao"] ?>', '<?php echo $res[$i]["descricao"] ?>')" title="Ver Dados">
					<i class="bi bi-info-circle-fill text-info"></i>
                    </a>
				</td>
			</tr>

			<?php } ?>

		</tbody>
	</table>
</small>

<!-- Modal -->
<div class="modal fade" id="cadastro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
	    <div class="modal-content">
		    <div class="modal-header">
			    <?php 
			        if(@$_GET['funcao'] == 'novo'){
                        echo '<img src="../assets/imagens/livros-32x32.png" alt="Inserir Livro" />&nbsp;';
				        $titulo_modal = 'Inserir Novo Livro';
					} else {
                        echo '<img src="../assets/imagens/livros-32x32.png" alt="Editar Livro" />&nbsp;';
					    $titulo_modal = 'Editar Dados do Livro';
						$id = @$_GET['id'];
						$query = $PDO->query("SELECT * FROM acervo WHERE  id = '$id'");
						$res = $query->fetchAll(PDO::FETCH_ASSOC);
						$titulo = @$res[0]['titulo'];
                        $autor = @$res[0]['autor'];
                        $id_editora = @$res[0]['ideditora'];
                        $id_assunto = @$res[0]['idassunto'];
                        $idioma = @$res[0]['idioma'];
                        $nrpaginas = @$res[0]['nrpaginas'];
                        $isbn = @$res[0]['isbn'];
						$datapublicacao = @$res[0]['datapublicacao'];
                        $traducao = @$res[0]['traducao'];
                        $idtipopublicacao = @$res[0]['idtipopublicacao'];
                        $edicao = @$res[0]['edicao'];
                        $descricao = @$res[0]['descricao'];
					}
				?>
				<h5 class="modal-title" id="exampleModalLabel"><?php echo $titulo_modal ?></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form method="post" id="form">
			    <div class="modal-body">
				    <div class="row">
					    <div class="col-6">
						    <div class="mb-3">
							    <label for="exampleFormControlInput1" class="form-label">Titulo do Livro </label>
								<input type="text" class="form-control" id="titulo" name="titulo" placeholder="Ex.: Romeu e Julieta" value="<?php echo @$titulo ?>" required>
							</div>	
						</div>
						
                        <div class="col-6">
						    <div class="mb-3">
							    <label for="exampleFormControlInput1" class="form-label">Autor </label>
								<input type="text" class="form-control" id="autor" name="autor" placeholder="Ex.: José Mauro de Vasconcelos" required value="<?php echo @$autor ?>">	
							</div>
						</div>

                        <div class="col-6">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Editora </label>
								<select class="form-select" aria-label="Default select example" name="ideditora">
									<?php 
										$query = $PDO->query("SELECT * FROM editoras ORDER BY nomeeditora");
										$res = $query->fetchAll(PDO::FETCH_ASSOC);
										for($i=0; $i < @count($res); $i++){
											foreach ($res[$i] as $key => $value){	}
											$ideditora = $res[$i]['id'];
											$nome_editora = $res[$i]['nomeeditora'];
									?>
									<option <?php if(@$ideditora == @$id_editora) { ?> selected <?php } ?> value="<?php echo $ideditora ?>"><?php echo $nome_editora ?></option>
												
									<?php } ?>
								</select>
							</div>
						</div>

                        <div class="col-6">
							<div class="mb-3">
								<label for="exampleFormControlInput1" class="form-label">Área </label>
								<select class="form-select" aria-label="Default select example" name="idassunto">
									<?php 
										$query = $PDO->query("SELECT * FROM assuntos ORDER BY assunto");
										$res = $query->fetchAll(PDO::FETCH_ASSOC);
										for($i=0; $i < @count($res); $i++){
												foreach ($res[$i] as $key => $value){	}
												$idassunto = $res[$i]['id'];
												$nome_assunto = $res[$i]['assunto'];
									?>
									<option <?php if(@$idassunto == @$id_assunto) { ?> selected <?php } ?> value="<?php echo $idassunto ?>"><?php echo $nome_assunto ?></option>
												
									<?php } ?>
								</select>
							</div>
						</div>

                        <div class="col-4">
						    <div class="mb-3">
							    <label for="exampleFormControlInput1" class="form-label">Idioma </label>
								<input type="text" class="form-control" id="idioma" name="idioma" placeholder="Português" value="<?php echo @$idioma ?>">	
							</div>
						</div>

                        <div class="col-2">
						    <div class="mb-3">
							    <label for="exampleFormControlInput1" class="form-label">Nr. Páginas </label>
								<input type="text" class="form-control" id="nrpaginas" name="nrpaginas" placeholder="Ex.: 180" value="<?php echo @$nrpaginas ?>">	
							</div>
						</div>

                        <div class="col-4">
						    <div class="mb-3">
							    <label for="exampleFormControlInput1" class="form-label">ISSN </label>
								<input type="text" class="form-control" id="issn" name="isbn" placeholder="Ex.: 5950-8678" value="<?php echo @$isbn ?>">	
							</div>
						</div>

						<div class="col-4">
						    <div class="mb-3">
							    <label for="exampleFormControlInput1" class="form-label">Data de Publicação </label>
							    <input type="date" class="form-control" id="datapublicacao" name="datapublicacao" value="<?php echo @$datapublicacao ?>">
						    </div>	
					    </div>
                        
                        <div class="col-4">
						    <div class="mb-3">
							    <label for="exampleFormControlInput1" class="form-label">Tradução </label>
							    <input type="text" class="form-control" id="traducao" name="traducao" placeholder="Tradução" value="<?php echo @$traducao ?>">
						    </div>	
					    </div>

					    <div class="col-2">
						    <div class="mb-3">
							    <label for="exampleFormControlInput1" class="form-label">Edição </label>
							    <input type="text" class="form-control" id="edicao" name="edicao" placeholder="32" value="<?php echo @$edicao ?>">	
						    </div>
					    </div>

					    <div class="col-8">
						    <div class="mb-3">
							    <label for="exampleFormControlInput1" class="form-label">Descrição </label>
								<textarea class="form-control" id="descricao" name="descricao"><?php echo @$descricao ?></textarea>
						    </div>	
					    </div>			
                    </div>
					<input type="hidden" name="id"  value="<?php echo @$id ?>">
                    <input type="hidden" name="idtipopublicacao" value="2">
					<small>
						<div align="center" id="mensagem"></div>
					</small>
					<div class="modal-footer">
					    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-fechar">Fechar</button>
						<button type="submit" class="btn btn-primary">Salvar</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="excluir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	    <div class="modal-content">
		    <div class="modal-header">
			    <h5 class="modal-title" id="exampleModalLabel">Excluir Livro</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
		    <form method="post" id="form-excluir">
		        <div class="modal-body">Deseja Mesmo Excluir este Livro?
                    <input type="hidden" name="id"  value="<?php echo @$id ?>">
                    <small>
                        <div align="center" id="mensagem-excluir"></div>
				    </small>
                </div>
			    <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-fechar-excluir">Fechar</button>
				    <button type="submit" class="btn btn-danger">Excluir</button>
			    </div>
		    </form>
	    </div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-dados" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	    <div class="modal-content">
			<div class="modal-header">
			    <h5 class="modal-title" id="titulo_registro"></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="mb-2">
                    <span><b>Autor : </b></span><span id="autor_registro"></span>
				</div>
                <div class="mb-2">
                    <span><b>Editora : </b></span><span id="editora_registro"></span>
				</div>
				<div class="mb-2">
				    <span><b>Área : </b></span><span id="area_registro"></span>
				</div>
				<div class="mb-2">
				    <span><b>Idioma : </b></span><span id="idioma_registro"></span>
				</div>
                <div class="mb-2">
			        <span><b>Nr. Páginas : </b></span><span id="paginas_registro"></span>
				</div>
                <div class="mb-2">
				    <span><b>ISSN : </b></span><span id="isbn_registro"></span>
				</div>
                <div class="mb-2">
				    <span><b>Data da Publicação : </b></span><span id="datapublicacao_registro"></span>
				</div>
                <div class="mb-2">
				    <span><b>Data do Cadastro : </b></span><span id="datacadastro_registro"></span>
				</div>
				<div class="mb-2">
				    <span><b>Edição : </b></span><span id="edicao_registro"></span>
				</div>
                <div class="mb-2">
				    <span><b>Descrição : </b></span><span id="descricao_registro"></span>
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
	    url: "<?= $base; ?>/operacao/acervo/inserir.php",
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
	url: "<?= $base; ?>/operacao/acervo/excluir.php",
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
	function dados(titulo, autor, editora, assunto, idioma, nrpaginas, isbn, datapublicacao, datacadastro, traducao, edicao, descricao){
		event.preventDefault();
		var myModal = new bootstrap.Modal(document.getElementById('modal-dados'), {
						
	});

	    myModal.show();
	    $('#titulo_registro').text(titulo);
		$('#autor_registro').text(autor);
	    $('#editora_registro').text(editora);
		$('#area_registro').text(assunto);
		$('#idioma_registro').text(idioma);
		$('#paginas_registro').text(nrpaginas);
		$('#isbn_registro').text(isbn);
		$('#datapublicacao_registro').text(datapublicacao);
        $('#datacadastro_registro').text(datacadastro);
		$('#traducao_registro').text(traducao);
		$('#edicao_registro').text(edicao);
        $('#descricao_registro').text(descricao);
	}
</script>