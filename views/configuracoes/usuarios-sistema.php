<?php require("../../includes/topo.php"); ?>
<div class="col-12">

    <div class="btn-toolbar" role="toolbar">
        <div class="btn-group ml-1">
            <a href="novo-usuario" style="margin-left: -3px;"><button type="button" class="btn btn-dark waves-light waves-effect"><i class="mdi mdi-plus"></i> Novo usuário</button></a>
        </div>

        <div class="btn-group ml-1">
            <button type="button" class="btn btn-ugo waves-light waves-effect dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                Ações
            </button>
            <div class="dropdown-menu">

                <a class="dropdown-item apaga-elemento" href="javascript:void(0);" data-return="usuarios-sistema" data-title="Deseja excluir os cadastros?" data-text="A ação não poderá ser desfeita." data-id="0" data-post="controlers/configuracoes/apaga_usuario.php">
                    <i class="mdi mdi-delete"></i>&nbsp;Excluir Cadastro(s)
                </a>

                <a class="dropdown-item" href="#"><i class="mdi mdi-table-large"></i>&nbsp;Exportar Excel</a>
            </div>
        </div>
    </div>

    <div class="ajusta"></div>
    <div class="row">
        <?php
        $sel = $db->select("SELECT usuarios.*, funcoes.funcao AS cargo FROM usuarios LEFT JOIN funcoes ON usuarios.id_funcao=funcoes.id_funcao ORDER BY usuarios.nome");
        if ($db->rows($sel)) {
            while ($line = $db->expand($sel)) {
        ?>
                <div class="col-lg-4">
                    <div class="card m-b-20">
                        <div class="card-body">

                            <div class="media">
                                <img class="d-flex mr-3 rounded-circle thumb-lg" src="uploads/images/usuarios/<?php echo empty($line['img_funcionario']) ?  'avatar-1.jpg' : $line['img_funcionario']; ?>" alt="Generic placeholder image">
                                <div class="media-body">

                                    <a href="edita-usuario/<?php echo $line['id_usuario']; ?>/<?php echo normaliza($line['nome']); ?>" class="tirarLink">
                                        <h5 class="m-t-10 font-18 mb-1"><?php echo $line['nome']; ?></h5>
                                    </a>
                                    <p class="text-muted font-14 font-500 font-secondary"><?php echo $line['cargo']; ?></p>
                                </div>
                            </div>

                            <div class="row text-center m-t-20">
                                <div class="col-md-12 text-center">
                                    <h5 class="mb-0"><?php echo $line['id_usuario']; ?></h5>
                                    <p class="text-muted font-14">Código</p>
                                </div>
                            </div>
                            <div class=" col-md-12 text-center">
                                <p class="text-muted font-10 m-b-5"><?php echo $line['email']; ?></p>
                            </div>
                            
                            <ul class="social-links text-center list-inline mb-0 mt-3">
                                <li class="list-inline-item">
                                    <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="<?php echo $line['whats']; ?>"><i class="fa fa-whatsapp"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="<?php echo $line['telefone']; ?>"><i class="fa fa-phone"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="<?php echo $line['skype']; ?>"><i class="fa fa-skype"></i></a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div> <!-- end col -->

            <?php
            }
        } else {
            ?>
            <spam>Nenhum cadastro encontrado!</spam>
        <?php
        }
        ?>

    </div> <!-- end row -->


</div>


<?php require("../../includes/rodape.php"); ?>