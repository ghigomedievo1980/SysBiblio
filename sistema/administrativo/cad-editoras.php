<?php
    $pagina = 'cad-editoras';
?>
<div>
    <img src="<?= $base; ?>/assets/imagens/editoras-64x64.png" alt="Cadastrar Editoras" /><br />
    <h4>Cadastrar Editoras</h4>
</div>
<a href="index.php?pag=<?php echo $pagina ?>&funcao=novo" type="button" class="btn btn-primary mt-2 mb-4">Nova Editora</a>

<small>
	<table id="example" class="table table-hover table-sm my-4" style="width:98%;">
		<thead>
			<tr>
				<th></th>
				<th>Editora</th>
                <th>Município</th>
				<th>Estado</th>
                <th>País</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
			
			<?php 
			    $query = $PDO->query("SELECT * FROM editoras ORDER BY nomeeditora ASC");
			    $res = $query->fetchAll(PDO::FETCH_ASSOC);
			    for($i=0; $i < @count($res); $i++){
				    foreach ($res[$i] as $key => $value){	}
				    $id_reg = $res[$i]['id'];
			?>
			<tr>
				<td><img src="<?= $base; ?>/assets/imagens/editoras-16x16.png" alt="Editoras" /></td>	
				<td><?php echo $res[$i]['nomeeditora'] ?></td>
                <td><?php echo $res[$i]['cidade'] ?></td>
				<td><?php echo $res[$i]['estado'] ?></td>
                <td><?php echo $res[$i]['pais'] ?></td>
				<td>
					<a href="index.php?pag=<?php echo $pagina ?>&funcao=editar&id=<?php echo $id_reg ?>" title="Editar Dados da Editora">
					<i class="bi bi-pencil-square mr-1 text-primary"></i></a>

					<a href="index.php?pag=<?php echo $pagina ?>&funcao=excluir&id=<?php echo $id_reg ?>" title="Excluir Editora">
					<i class="bi bi-trash text-danger"></i></a>

					<a href="" onclick="dados('<?php echo $res[$i]["nomeeditora"] ?>', '<?php echo $res[$i]["cidade"] ?>', '<?php echo $res[$i]["estado"] ?>', '<?php echo $res[$i]["pais"] ?>')" title="Ver Dados">
					<i class="bi bi-info-circle-fill text-info"></i></a>
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
                        echo '<img src="../assets/imagens/editoras-32x32.png" alt="Inserir Editora" />&nbsp;';
				        $titulo_modal = 'Inserir Nova Editora';
					} else {
                        echo '<img src="../assets/imagens/editoras-32x32.png" alt="Editar Editora" />&nbsp;';
					    $titulo_modal = 'Editar Dados da Editora';
						$id = @$_GET['id'];
						$query = $PDO->query("SELECT * FROM editoras WHERE  id = '$id'");
						$res = $query->fetchAll(PDO::FETCH_ASSOC);
						$nomeeditora = @$res[0]['nomeeditora'];
                        $cidade = @$res[0]['cidade'];
                        $estado = @$res[0]['estado'];
                        $pais = @$res[0]['pais'];
					}
				?>
				<h5 class="modal-title" id="exampleModalLabel"><?php echo $titulo_modal ?></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form method="post" id="form">
			    <div class="modal-body">
				    <div class="row">
					    <div class="col-8">
						    <div class="mb-3">
							    <label for="exampleFormControlInput1" class="form-label">Nome da Editora </label>
								<input type="text" class="form-control" id="nomeeditora" name="nomeeditora" placeholder="Ex.: Editora Alínea" value="<?php echo @$nomeeditora ?>" required>
							</div>	
						</div>
						
                       <div class="col-6">
						    <div class="mb-3">
							    <label for="exampleFormControlInput1" class="form-label">Município </label>
								<input type="text" class="form-control" id="cidade" name="cidade" placeholder="Ex.: São Paulo" required value="<?php echo @$cidade ?>">	
							</div>
						</div>

                        <div class="col-2">
						    <div class="mb-3">
							    <label for="exampleFormControlInput1" class="form-label">Estado </label>
								<input type="text" class="form-control" id="estado" name="estado" placeholder="Ex.: SP" value="<?php echo @$estado ?>">	
							</div>
						</div>

						<div class="col-6">
						    <div class="mb-3">
							    <label for="exampleFormControlInput1" class="form-label">País </label>
								<input type="text" class="form-control" id="pais" name="pais" placeholder="Ex.: Brasil" value="<?php echo @$estado ?>">	
							</div>
						</div>
					</div>			
					<input type="hidden" name="id"  value="<?php echo @$id ?>">
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
			    <h5 class="modal-title" id="exampleModalLabel">Excluir Editora</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
		    <form method="post" id="form-excluir">
		        <div class="modal-body">Deseja Mesmo Excluir esta Editora?
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
			    <h5 class="modal-title" id="nomeeditora_registro"></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="mb-2">
				    <span><b>Município : </b></span><span id="cidade_registro"></span>
				</div>
				<div class="mb-2">
				    <span><b>Estado : </b></span><span id="estado_registro"></span>
				</div>
                <div class="mb-2">
			        <span><b>País : </b></span><span id="pais_registro"></span>
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
	    url: "<?= $base; ?>/operacao/editoras/inserir.php",
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
	url: "<?= $base; ?>/operacao/editoras/excluir.php",
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
	function dados(nomeeditora, cidade, estado, pais){
		event.preventDefault();
		var myModal = new bootstrap.Modal(document.getElementById('modal-dados'), {
						
	});

	    myModal.show();
	    $('#nomeeditora_registro').text(nomeeditora);
		$('#cidade_registro').text(cidade);
        $('#estado_registro').text(estado);
		$('#pais_registro').text(pais);
	}
</script>