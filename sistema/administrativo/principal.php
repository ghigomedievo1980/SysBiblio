<?php
    $pagina = 'principal';
?>
<small>
    <img src="<?= $base ?>/assets/imagens/dashboard/painel-administrativo.png" alt="Painel Administrativo">
    <p></p>
    <div style="float:left">
        <table class="tabela" border="2pt solid #1A374D;">
            <tbody>
                <tr style="border: 2pt solid #1A374D; text-align: center;">
                    <td colspan="2" style="border: 2pt solid #1A374D;">
                        <span style="font-family: Verdana, Geneva, Tahoma, sans-serif; font-size: 14pt; color: #05A315;">
                            <strong>ACERVO</strong>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="button" class="btn btn-light">
                            <a href="#"><img src="<?= $base; ?>/assets/imagens/dashboard/livros_consultar.png" alt="Livros no Acervo"></a>
                        </button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-light">
                            <a href="#"><img src="<?= $base; ?>/assets/imagens/dashboard/periodicos_consultar.png" alt="Periódicos no Acervo">
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="button" class="btn btn-light">
                            <a href="#"><img src="<?= $base; ?>/assets/imagens/dashboard/acervo_cds.png" alt="CDs no Acervo">
                        </button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-light">
                            <a href="#"><img src="<?= $base; ?>/assets/imagens/dashboard/acervo_dvds.png" alt="DVDs no Acervo">
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <p></p>
    <div style="float:left">
        <table class="tabela">
            <tbody>
                <tr style="border: 2pt solid #1A374D; text-align: center;">
                    <td colspan="3" style="border: 2pt solid #1A374D;">
                        <span style="font-family: Verdana, Geneva, Tahoma, sans-serif; font-size: 14pt; color: #CBCF0C;">
                            <strong>CADASTROS</strong>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="button" class="btn btn-light">
                            <a href="#"><img src="<?= $base; ?>/assets/imagens/dashboard/livros_cadastrar.png" alt="Cadastrar Livros"></a>
                        </button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-light">
                            <a href="#"><img src="<?= $base; ?>/assets/imagens/dashboard/periodicos_cadastrar.png" alt="Cadastrar Periódicos">
                        </button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-light">
                            <a href="#"><img src="<?= $base; ?>/assets/imagens/dashboard/usuarios_cadastro.png" alt="Cadastrar Usuários">
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="button" class="btn btn-light">
                            <a href="#"><img src="<?= $base; ?>/assets/imagens/dashboard/editoras_cadastrar.png" alt="Cadastrar Editoras">
                        </button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-light">
                            <a href="#"><img src="<?= $base; ?>/assets/imagens/dashboard/assuntos_cadastrar.png" alt="Cadastrar Áreas">
                        </button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-light">
                            <a href="#"><img src="<?= $base; ?>/assets/imagens/dashboard/niveis_cadastrar.png" alt="Cadastrar Níveis">
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <p></p>
    <div style="float:left;">
        <table class="tabela">
            <tbody>
                <tr>
                    <td colspan="2" style="border: 2px solid #1A374D; text-align: center;">
                        <span style="font-family: Tahoma; font-size: 14pt; color: #DB0F46"><strong>CONSULTAS</stong></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="button" class="btn btn-light">
                            <a href="#"><img src="<?= $base; ?>/assets/imagens/dashboard/editoras_consultar.png" alt="Consultar Editoras"></a>
                        </button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-light">
                            <a href="#"><img src="<?= $base; ?>/assets/imagens/dashboard/assuntos_consultar.png" alt="Consultar Assuntos"></a>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="button" class="btn btn-light">
                            <a href="#"><img src="<?= $base; ?>/assets/imagens/dashboard/usuarios_consultar.png" alt="Consultar Usuários"></a>
                        </button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-light">
                            <a href="#"><img src="<?= $base; ?>/assets/imagens/dashboard/niveis_consultar.png" alt="Consultar Paróquias"></a>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
        <p></p>
        <div style="float:left;">
            <table class="tabela">
                <tbody>
                    <tr>
                        <td colspan="2" style="border: 2px solid #1A374D; text-align: center;">
                            <span style="font-family: Tahoma; font-size: 14pt; color: #DB0F46"><strong>SISTEMA</stong></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button type="button" class="btn btn-light">
                                <i class="bi bi-question-square-fill">Sobre</i>
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-light">
                                <i class="bi bi-x-square-fill">Sair</i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    <div class="data-local">
        <?php echo date('d/m/Y'); ?>
    </div>
</small>