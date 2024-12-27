<?php
    $pagina = 'cad-areas';
?>
<div>
    <img src="<?= $base; ?>/assets/imagens/assuntos-64x64.png" alt="Cadastro de Áreas" /><br />
    <h4>Cadastrar Área</h4>
</div>
<a href="index.php?pag=<?php echo $pagina ?>&funcao=novo" type="button" class="btn btn-primary mt-2 mb-4">Nova Área</a>
<small>
    <table id="example" class="table table-hover table-sm my-4" style="width:98%;">
		<thead>
			<tr>
				<th></th>
				<th>Área do Conhecimento</th>
                <th>Cód. Catálogo</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			    $query = $PDO->query("SELECT * FROM assuntos ORDER BY assunto ASC");
			    $res = $query->fetchAll(PDO::FETCH_ASSOC);
			    for($i=0; $i < @count($res); $i++){
				    foreach ($res[$i] as $key => $value){	}
					    $id_reg = $res[$i]['id'];
			?>
			<tr>
				<td><img src="<?= $base; ?>/assets/imagens/assuntos-16x16.png" alt="Áreas" /></td>
				<td><?php echo $res[$i]['assunto'] ?></td>
				<td><?php echo $res[$i]['codcatalogo'] ?></td>
					
				<td>
					<a href="index.php?pag=<?php echo $pagina ?>&funcao=editar&id=<?php echo $id_reg ?>" title="Editar Área">
					<i class="bi bi-pencil-square mr-1 text-primary"></i></a>
					<a href="index.php?pag=<?php echo $pagina ?>&funcao=excluir&id=<?php echo $id_reg ?>" title="Excluir Área">
					<i class="bi bi-trash text-danger"></i></a>
				</td>
			</tr>

			<?php } ?>

		</tbody>
	</table>
</small>
<!-- Modal -->
<div class="modal fade" id="cadastro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
	    <div class="modal-content">
			<div class="modal-header">
                <?php 
				    if(@$_GET['funcao'] == 'novo'){
						echo '<img src="../assets/imagens/add_assunto-32x32.png" />  ';
						$titulo_modal = 'Inserir Nova Área';
					} else {
						echo '<img src="../assets/imagens/editar_assunto-32x32.png" />  ';
					    $titulo_modal = 'Editar Área';
						$idassunto = @$_GET['id'];
						$query = $PDO->query("SELECT * FROM assuntos WHERE  id = '$idassunto'");
						$res = $query->fetchAll(PDO::FETCH_ASSOC);
						$assunto = @$res[0]['assunto'];
                        $codcatalogo = @$res[0]['codcatalogo'];
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
						        <label for="exampleFormControlInput1" class="form-label">Área do Conhecimento </label>
						        <input type="text" class="form-control" id="assunto" name="assunto" placeholder="Ex.: Literatura Brasileira" value="<?php echo @$assunto ?>" required>
					        </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
						        <label for="exampleFormControlInput1" class="form-label">Cód. Catálogo </label>
						        <input type="text" class="form-control" id="codcatalogo" name="codcatalogo" placeholder="Ex.: B896.8" value="<?php echo @$codcatalogo ?>" required>
					        </div>
                        </div>
                    </div>
                </div>

				<input type="hidden" name="id"  value="<?php echo @$idassunto ?>">

				<small>
                    <div align="center" id="mensagem"></div>
                </small>
			    <div class="modal-footer">
				    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-fechar">Fechar</button>
				    <button type="submit" class="btn btn-primary">Salvar</button>
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
				<img src="<?= $base; ?>/assets/imagens/delete_assunto-32x32.png" />&nbsp;
				<h5 class="modal-title" id="exampleModalLabel">Excluir Área</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
		    <form method="post" id="form-excluir">
				<div class="modal-body">
				    <input type="hidden" name="id"  value="<?php echo @$idassunto ?>">
                    <span class="mb-2">Deseja Realmente Excluir esta Área?</span>
					<br><br>
					<small>
                        <div align="center" id="mensagem-excluir" ></div>
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
			    url: "<?= $base; ?>/operacao/areas/inserir.php",
				type: 'POST',
				data: formData,

				success: function (mensagem) {

					$('#mensagem').removeClass()

					if (mensagem.trim() == "Salvo com Sucesso!") {

                        //$('#nome').val('');
                        //$('#cpf').val('');
                        $('#btn-fechar').click();
                        window.location = "index.php?pag="+pag;

                    } else {

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
        url: "<?= $base; ?>/operacao/areas/excluir.php",
        type: 'POST',
        data: formData,

		    success: function (mensagem) {

		     $('#mensagem-excluir').removeClass()

                if (mensagem.trim() == "Excluído com Sucesso!") {

                    //$('#nome').val('');
                    //$('#cpf').val('');
                    $('#btn-fechar-excluir').click();
                    window.location = "index.php?pag="+pag;

                } else {

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