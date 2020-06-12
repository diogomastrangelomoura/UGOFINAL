<?php require("../../includes/topo.php"); ?>




<div class="col-12">
  <div class="btn-toolbar" role="toolbar">
    <div class="btn-group ml-1">
      <a href="nova-funcao"><button type="button" class="btn btn-dark waves-light waves-effect"><i class="mdi mdi-plus"></i> Nova Função</button></a>
    </div>

    <div class="btn-group ml-1">
      <button type="button" class="btn btn-ugo waves-light waves-effect dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        Ações
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item apaga-elemento" href="javascript:void(0);" data-return="lista-funcoes/<?php echo $id; ?>" data-title="Deseja excluir os cadastros?" data-text="A ação não poderá ser desfeita." data-id="0" data-post="controlers/configuracoes/apaga_funcao.php">
          <i class="mdi mdi-delete"></i>&nbsp;Excluir Ficha(s)
        </a>

        <a class="dropdown-item" href="#"><i class="mdi mdi-table-large"></i>&nbsp;Exportar Excel</a>
      </div>
    </div>
  </div>


  <div class="card m-b-20 mtop-20">
    <div class="card-body">

      <h4 class="mt-0 header-title">Funções e cargos</h4>


      <div class="table-rep-plugin mtop-20">
        <div class="table-responsive b-0" data-pattern="priority-columns">
          <table id="tech-companies-1" class="table  table-striped">
            <thead>
              <tr>
                <th width="35">
                  <label class="container_checkbox">
                    <input type="checkbox" class="select-checkbox-all" name="">
                    <span class="checkmark"></span>
                  </label>
                </th>
                <th>ID</th>
                <th data-priority="3">Função/Cargo</th>
                <th data-priority="3" width="10"></th>
              </tr>
            </thead>
            <tbody>

              <?php
              $sel = $db->select("SELECT * FROM funcoes ORDER BY funcao");
              if ($db->rows($sel)) {
                while ($line = $db->expand($sel)) {
              ?>
                  <tr>
                    <th>
                      <label class="container_checkbox">
                        <input type="checkbox" class="select-checkbox" name="ids" value="<?php echo $line['id_objeto']; ?>">
                        <span class="checkmark"></span>
                      </label>
                    </th>
                    <th><?php echo $line['id_funcao']; ?></th>
                    <th><?php echo $line['funcao']; ?></th>
                    <th>

                      <div class="btn-group">
                        <a href="edita-funcao/<?php echo $line['id_funcao']; ?>/<?php echo normaliza($line['funcao']); ?>" class="btn btn-ugo btn-sm waves-effect" data-toggle="tooltip" data-placement="bottom" title="Editar Objeto">
                          <i class="mdi mdi-border-color"></i>
                        </a>
                      </div>

                    </th>

                  </tr>
                <?php
                }
              } else {
                ?>

                <tr>
                  <th colspan="20">
                    <center>Nenhum cadastro encontrado.</center>
                  </th>
                </tr>


              <?php
              }
              ?>

            </tbody>
          </table>
        </div>

      </div>

    </div>
  </div>


</div>


<?php require("../../includes/rodape.php"); ?>