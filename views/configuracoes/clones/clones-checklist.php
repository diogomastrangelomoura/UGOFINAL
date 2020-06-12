		
				<div class="card mtop-10 card-body copy-create hide">
						<div class="row">
							
								<div class="col-md-6">
									<div class="form-group">
						            	<label>Nome do Indicador</label>
						                <input type="text" class="form-control" name="campo[]" required>
						            </div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
						            	<label>Tipo do Indicador</label>
						                <select class="form-control tipos_campos" name="tipo[]" data-type="checklist" required>
						                	<option value="">-- escolha --</option>
						                	<option value="text">Texto</option>
						                	<option value="date">Data</option>
						                	<option value="select">Múltipla Escolha</option>
						                	<option value="file">Foto</option>
						                	<option value="number">Numérico</option>
						                	<option value="assinatura">Assinatura</option>
						                </select>	
						            </div>
								</div>	

								<div class="col-md-2">					
						            <button type="button" class="btn btn-dark waves-effect waves-light mtop-30 apaga-clone "><i class="mdi mdi-delete"></i></button>			            
								</div>	


								<div class="col-md-12 create-clone-options">

								</div>	

						</div>

				</div>



				<div class="CloneOptions row hide">

					<div class="col-md-1">
						<i class="mdi mdi-subdirectory-arrow-right font-30 mtop-10 pull-right"></i>						
					</div>

					<div class="col-md-8">						
						<div class="form-group">			            	
			                <input type="text" class="form-control" name="opcoes[]"  placeholder="Opção de resposta" required>
			            </div>
					</div>

					<div class="col-md-3">					
		            	<button type="button" class="btn btn-dark waves-effect waves-light apaga-clone-option"><i class="mdi mdi-delete"></i></button>			
		            				           
					</div>					

				</div>	


				<div class="col-md-12 hide CloneAdicionaOptionBotao">
					<a href="javascript:void(0)" class="btn_nova_option color-hugo"><i class="mdi mdi-plus"></i> adicionar opção</a>
				</div>	