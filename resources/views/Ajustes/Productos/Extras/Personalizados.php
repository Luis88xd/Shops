	<!-- <form id="formulario_config"> -->
					  		<div class="content_float">
					  			<div class="float_left w48">
					  				<h3 align="center" class="top30px pink bold center">Campos Agregados</h3>
					  				<!-- <button class="btn btn-success">Actualizar Campos</button><br><br> -->

					  				<div class="panel-group">
									  <div class="panel panel-default">
									    <div class="panel-heading relative">
									      <h4 class="panel-title">
									        <a data-toggle="collapse" href="#collapse1">Campos de Encabezado</a>
									        <span class="absolute r10px guardar_encabezado"><i class="fa fa-save pointer"></i></span>
									      </h4>
									    </div>
									    <div id="collapse1" class="panel-collapse collapse">
									      <div class="panel-body">
									      	<div class="scroll_y">
						  						<div class="w90 margin">
						  							<ul class="sortable_encabezado" id="ul_encabezado">

						  							<?php $contador_encabezado = 1; ?>
											  			<?php foreach($ceproducto as $record){ ?>
						  									<li class="li_encabezado_<?php echo $contador_encabezado; ?>" value="<?php echo $contador_encabezado;?>">

						  										<input type="hidden" id="id_<?php echo $contador_encabezado; ?>" value="<?php echo $record->idCEProducto; ?>">
											  					<br>
											  				<?php if($record->cepEstado == "Activo"){?>
											  					<div class="content_float content_target relative p20 bg_success">
											  				<?php  }else{?>
											  					<div class="content_float content_target relative p20 bg_danger">
											  				<?php } ?>
											  						<div class="float_left w48">
											  							<br><br>
											  							<h5 class="b20">Nombre: </h5>
											  							<h5 class="b20">Tipo de campo: </h5>
											  							<p>&#160;</p>
											  							<span class="mas_detalles">
											  								<h5>Valor por defecto: </h5>
											  							</span>
											  						</div>
											  						<div class="float_left w4">&#160;</div>
											  						<div class="float_left w48">
											  							<div class="w100 right">
											  								<?php if($record->cepCategoria == "Adicional"){?>
												  								<button value="<?php echo $record->idCEProducto; ?>" class="trash_encabezado icon_trash">
												  									<i class="fa fa-trash white fa-2x"></i>
												  								</button>
											  								<?php }?>
																			<label class="switch">
																			<?php if($record->cepEstado == "Activo"){ ?>
																			  	<input type="checkbox" checked class="input_check ch_<?php echo $contador_encabezado; ?>">
																			<?php }else{ ?>
																				<input type="checkbox" class="input_check ch_<?php echo $contador_encabezado; ?>">
																			<?php } ?>

																			<span class="slider round"></span>
																			</label>
																		</div>
											  							<input type="text" value="<?php echo $record->cepNombre; ?>" class="form-control b6" id="nombre_<?php echo $contador_encabezado; ?>">
											  							<input class="form-control select_campo b6" id="tipoCampo_<?php echo $contador_encabezado; ?>" value="<?php echo $record->cepTipoCampo; ?>" disabled>
											  							<p class="white right pointer mostrar_detalles">Más detalles</p>
											  							<span class="mas_detalles">
											  								<?php if($record->cepTipoCampo == "numerico"){ ?>
											  								<input type="number" class="form-control select_campo b6" value="<?php echo $record->cepValue; ?>" id="valor_<?php echo $contador_encabezado; ?>">
											  								<?php }else if($record->cepTipoCampo == "select"){ ?>
											  								<textarea rows="7" style="resize: none;" id="valor_<?php echo $contador_encabezado; ?>" placeholder="Separe las opciones con |                             Ejemplo: UNO | DOS" class="select_campo form-control"><?php echo $record->cepValue; ?></textarea>
											  								<?php }else{?>
											  								<input type="text" class="form-control select_campo b6" value="<?php echo $record->cepValue; ?>" id="valor_<?php echo $contador_encabezado; ?>">
											  								<?php } ?>
											  							</span>
											  						</div>
											  					</div>
											  					<?php $contador_encabezado++; ?>
											  				</li>
											  			<?php } ?>
									  				</ul>
									  				<br><br>
								  				</div>
							  				</div>
									      </div>
									    </div><!--Fin de collapse 1-->

									    <div class="panel-heading relative">
									      <h4 class="panel-title">
									        <a data-toggle="collapse" href="#collapse2">Campos de Detalle</a>
									        <span class="absolute r10px guardar_detalle"><i class="fa fa-save pointer"></i></span>
									      </h4>
									    </div>
									    <div id="collapse2" class="panel-collapse collapse">
									      <div class="panel-body">
									      	<div class="scroll_y">
						  						<div class="w90 margin">
						  							<ul class="sortable_detalle" id="ul_detalle">
						  							<?php $contador_detalle = 0; ?>
									  				<?php foreach($cdproducto as $record){ ?>
									  					<?php $contador_detalle++; ?>

									  					<li class="li_detalle_<?php echo $contador_detalle; ?>" value="<?php echo $contador_detalle;?>">
										  					<input type="hidden" id="d_id_<?php echo $contador_detalle; ?>" value="<?php echo $record->idCDProducto; ?>">
										  					<br>
										  					<?php if($record->cdpEstado == "Activo"){?>
											  					<div class="content_float content_target relative p20 bg_success">
											  				<?php  }else{?>
											  					<div class="content_float content_target relative p20 bg_danger">
											  				<?php } ?>
										  						<div class="float_left w48">
										  							<br><br>
										  							<h5 class="b20">Nombre: </h5>
										  							<h5>Tipo de campo: </h5>
										  							<p>&#160;</p>
										  							<span class="mas_detalles">
										  								<h5>Valor por defecto: </h5>
										  							</span>
										  						</div>
										  						<div class="float_left w4">&#160;</div>
										  						<div class="float_left w48">
										  							<div class="w100 right">
										  								<?php if($record->cdpCategoria == "Adicional"){?>
										  								<button value="<?php echo $record->idCDProducto; ?>" class="trash_detalle icon_trash">
										  									<i class="fa fa-trash white fa-2x"></i>
										  								</button>
										  								<?php } ?>
																		<label class="switch">
																			<?php if($record->cdpEstado == "Activo"){ ?>
																			  	<input type="checkbox" checked class="input_check cd_<?php echo $contador_detalle; ?>">
																			<?php }else{ ?>
																				<input type="checkbox" class="input_check cd_<?php echo $contador_detalle; ?>">
																			<?php } ?>
																			<span class="slider round"></span>
																		</label>
																	</div>
										  							<input type="text" value="<?php echo $record->cdpNombre; ?>" id="d_nombre_<?php echo $contador_detalle; ?>" class="form-control b6">
										  							<input class="form-control select_campo b6" id="d_tipoCampo_<?php echo $contador_detalle; ?>" value="<?php echo $record->cdpTipoCampo; ?>" disabled>
										  							<p class="white right pointer mostrar_detalles">Más detalles</p>
										  							<span class="mas_detalles">
										  								<?php if($record->cdpTipoCampo == "numerico"){ ?>
										  								<input type="number" class="form-control select_campo b6" value="<?php echo $record->cdpValue; ?>" id="d_valor_<?php echo $contador_detalle; ?>">
										  								<?php }else if($record->cdpTipoCampo == "select"){ ?>
										  								<textarea rows="7" style="resize: none;" id="d_valor_<?php echo $contador_detalle; ?>" placeholder="Separe las opciones con |                             Ejemplo: UNO | DOS" class="select_campo form-control"><?php echo $record->cdpValue; ?></textarea>
										  								<?php }else{?>
										  								<input type="text" class="form-control select_campo b6" value="<?php echo $record->cdpValue; ?>" id="d_valor_<?php echo $contador_detalle; ?>">
										  								<?php } ?>
										  							</span>
										  						</div>
										  					</div>
									  					</li>
									  				<?php } ?><br><br>

									  				<input type="hidden" value="<?php echo $contador_detalle?>" id="det_contador">
									  				</ul>
								  				</div>
							  				</div>	
									      </div>
									    </div>

									  </div>
									</div>
					  			</div> <!--Fin de Campos agregados-->

					  			<div class="float_left w4">&#160;</div>
					  			<div class="w48 float_left">
					  				<!-- <br><br> -->
					  				<br>

					  				<form id="agregarCampo">
					  				<!-- Encabezado -->
					  					<h3 class="pink bold center">Agregar Nuevo Campo</h3>
						  				<div class="content_float bg_primary p20">
						  					<div class="float_left w48">
						  						<h5 class="b20">Ubicación: </h5>
						  						<h5 class="b20">Nombre: </h5>
						  						<h5 class="b20">Tipo de Campo: </h5>
						  						<h5 class="b20 por_defecto">Valor por defecto: </h5>
						  						<h5 class="inputs_selects">Escriba las opciones: </h5>
						  					</div>
						  					<div class="float_left w4">&#160;</div>
						  					<div class="float_left w48">
						  						<input type="hidden" name="_token" id="token" value="<?php echo csrf_token() ?>">
						  						<!-- Ubicación si es encabezado o detalle -->
						  						<select class="form-control b6" id="ubicacion">
						  							<optgroup label="Eliga en donde aparecerá el campo">
						  								<option value="1">Encabezado</option>
						  								<option value="2">Detalle</option>
						  							</optgroup>
						  						</select>
						  						<input type="text" id="nombre" class="form-control" style="margin-bottom:6px;" required="true">
						  						<select class="form-control b6" id="agregar_tipoCampo" required="true">
								  					<optgroup label="Eliga un tipo de dato">
								  						<option value="texto">Texto</option>
								  						<option value="numerico">Numérico</option>
								  						<option value="select">Selección</option>
								  						<option value="fecha">Fecha</option>
								  						<option value="hora">Hora</option>
								  					</optgroup>
								  				</select>
								  				<input type="text" id="valor" class="por_defecto form-control b6" placeholder="Valor por defecto">
								  				<textarea rows="7" style="resize: none;" placeholder="Separe las opciones con |                             Ejemplo: UNO | DOS" id="opciones" class="inputs_selects form-control"></textarea>
								  				<div class="right top5">
						  							<input type="submit" class="btn btn-success" value="Agregar" id="agregar_nuevo_campo">
						  						</div>
						  					</div>
						  				</div>
						  			</form>						  				
					  			</div>
					  		</div>
					  	<!-- </form> -->