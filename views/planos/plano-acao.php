<?php require("../../includes/topo.php"); ?>


<div class="col-12">

    <div class="btn-toolbar" role="toolbar">

        <div class="btn-group ml-1">

            <a href="javascript:void(0)"><button type="button" class="btn btn-dark waves-light waves-effect"><i class="mdi mdi-plus"></i> Novo Plano de Ação</button></a>
        </div>

        <div class="btn-group ml-1">
            <button type="button" class="btn btn-ugo waves-light waves-effect dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                Ações
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#"><i class="mdi mdi-printer"></i>&nbsp;Imprimir Ficha(s)</a>

                <a class="dropdown-item apaga-elemento" href="javascript:void(0);" data-return="lista-cadastros/<?php echo $id; ?>/<?php echo normaliza($info['nome']); ?>" data-title="Deseja excluir os cadastros?" data-text="A ação não poderá ser desfeita." data-id="0" data-post="controlers/cadastros/apaga_cadastro.php">
                    <i class="mdi mdi-delete"></i>&nbsp;Excluir Ficha(s)
                </a>

                <a class="dropdown-item" href="#"><i class="mdi mdi-table-large"></i>&nbsp;Exportar Excel</a>
            </div>
        </div>
    </div>

    <div class="ajusta"></div>

    <div class="row">
        <?php
        $sel = $db->select("SELECT plano_de_acao.status, plano_de_acao.id_plano, respostas_checklists.indicador, realizados.id_usuario, usuarios.nome, tipo_status.nome_status, tipo_status.color FROM plano_de_acao INNER JOIN respostas_checklists ON plano_de_acao.id_plano = respostas_checklists.id_plano INNER JOIN realizados ON respostas_checklists.id_realizado = realizados.id_realizado INNER JOIN usuarios ON realizados.id_usuario = usuarios.id_usuario INNER JOIN tipo_status ON tipo_status.id_status=plano_de_acao.status WHERE realizados.id_unidade = 3");
        if ($db->rows($sel)) {
            while ($line = $db->expand($sel)) {
        ?>

                <div class="col-md-4">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <spam class="sub-titulo">#<?php echo $line['id_plano']; ?></spam>
                                </div>
                                <div class="col-md-6 text-right">
                                    <span class="badge <?php echo $line['color']; ?>"><?php echo $line['nome_status']; ?></span>
                                </div>
                            </div>
                            <p class="card-text ajusta-topo"><?php echo $line['indicador']; ?></p>
                        </div>
                        <div class="linha-card"></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <spam class="sub-titulo">Técnico:</spam> <?php echo $line['nome']; ?>
                                </div>

                                <div class="col-md-6 text-right">
                                    <div class="btn-group">
                                        <a href="detalhe-plano-acao/<?php echo $line['id_plano']; ?>/<?php echo normaliza('plano'); ?>" class="btn btn-dark waves-light waves-effect btn-sm" data-toggle="tooltip" data-placement="bottom" title="Ver Ficha">
                                            <i class="mdi mdi-file-document"></i>
                                        </a>
                                        &nbsp;
                                        <a href="edita-plano-acao/<?php echo $line['id_plano']; ?>/<?php echo normaliza('plano'); ?>" class="btn btn-ugo btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="Editar Objeto">
                                            <i class="mdi mdi-border-color"></i>
                                        </a>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            <?php
            }
        } else {
            ?>
            <p>Nenhum cadastro encontrado.</p>
        <?php
        }
        ?>

    </div>





    <?php require("../../includes/rodape.php"); ?>