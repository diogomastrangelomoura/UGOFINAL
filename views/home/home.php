<?php require ("../../includes/topo.php"); ?>
						

						
                                    <div class="col-12 mb-4 pt-5 hide">
                                        <div id="morris-bar-example" class="dash-chart"></div>
                
                                        <div class="mt-4 text-center">
                                            <button type="button" class="btn btn-outline-primary ml-1 waves-effect waves-light">Year 2017</button>
                                            <button type="button" class="btn btn-outline-info ml-1 waves-effect waves-light">Year 2018</button>
                                            <button type="button" class="btn btn-outline-primary ml-1 waves-effect waves-light">Year 2019</button>
                                        </div>
                                    </div>
                             

                                <div class="col-md-6 col-xl-3">
                                    <div class="card text-center m-b-30">
                                        <div class="mb-2 card-body text-muted">
                                            <h3 class="text-info color-hugo">15</h3>
                                            <span class="font-18">Formulários</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="card text-center m-b-30">
                                        <div class="mb-2 card-body text-muted">
                                            <h3 class="text-purple color-black">132</h3>
                                            <span class="font-18">Cadastros</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="card text-center m-b-30">
                                        <div class="mb-2 card-body text-muted">
                                            <h3 class="text-primary color-hugo">289</h3>
                                            <span class="font-18">Ocorrências</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="card text-center m-b-30">
                                        <div class="mb-2 card-body text-muted">
                                            <h3 class="text-danger color-black">522</h3>
                                            <span class="font-18">Checklists</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
            
                            <div class="row">
            
                                <div class="col-xl-4 hide">
                                    <div class="card m-b-30">
                                        <div class="card-body">
                                            
                                            <div class="row text-center m-t-20">
                                                <div class="col-6">
                                                    <h5 class="">541</h5>
                                                    <p class="text-muted font-14">Conformidades</p>
                                                </div>
                                                <div class="col-6">
                                                    <h5 class="">651</h5>
                                                    <p class="text-muted font-14">Não Conformidades</p>
                                                </div>
                                            </div>
            
                                            <div id="morris-donut-example" class="dash-chart"></div>
                                        </div>
                                    </div>
                                </div>
            
                                <div class="col-xl-12">
                                    <div class="card m-b-30">
                                        <div class="card-body">
                                           
                                            <div class="row text-center m-t-20">
                                                <div class="col-4">
                                                    <h5 class="">56241</h5>
                                                    <p class="text-muted font-14">Conformidades</p>
                                                </div>
                                                <div class="col-4">
                                                    <h5 class="">23651</h5>
                                                    <p class="text-muted font-14">Não Conformidades</p>
                                                </div>
                                                <div class="col-4">
                                                    <h5 class="">23651</h5>
                                                    <p class="text-muted font-14">Não se aplicam</p>
                                                </div>
                                            </div>
            
                                            <div id="morris-area-example" class="dash-chart"></div>
                                        </div>
                                    </div>
                                </div>
            
                            </div>
                            <!-- end row -->
            
                            <div class="row">
                               
                                <div class="col-xl-12">
                                    <div class="card m-b-30">
                                        <div class="card-body">
                                            <h4 class="mt-0 m-b-15 header-title">Últimos Cadastros Realizados</h4>
            
                                            <div class="table-rep-plugin mtop-20">
                                                <div class="table-responsive b-0" data-pattern="priority-columns">
                                                    <table id="tech-companies-1" class="table  table-striped">
                                                        <thead>
                                                        <tr>
                                                            
                                                            <th data-priority="1" width="30">ID</th>
                                                            <th data-priority="3" width="120">Data</th>
                                                            <th data-priority="1">Campo 1</th>
                                                            <th data-priority="3">Campo 2</th>
                                                            <th data-priority="3">Campo 3</th>
                                                            <th data-priority="3">Campo 4</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        <?php
                                                            $x=0;
                                                            while($x<7){
                                                        ?>  
                                                        <tr>
                                                            
                                                            
                                                            <td><?php echo $x; ?></td>
                                                            <td><?php echo date("d/m/Y"); ?></td>
                                                            <td>Informação 0<?php echo $x; ?></td>
                                                            <td>Informação 0<?php echo $x; ?></td>
                                                            <td>Informação 0<?php echo $x; ?></td>
                                                            <td>Informação 0<?php echo $x; ?></td>
                                                        </tr>
                                                        <?php
                                                            $x++;
                                                            }
                                                        ?>
                                                        
                                                        </tbody>
                                                    </table>
                                                </div>
            
                                            </div>

                                        </div>
                                    </div>
                                </div>
            
            
	


<?php require ("../../includes/rodape.php"); ?>