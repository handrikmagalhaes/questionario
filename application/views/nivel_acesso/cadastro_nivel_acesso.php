<div class="content-wrapper" style="min-height: 1244.06px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mt-1">
				<div class="col-sm-6">
	                <?php if (isset($dados['nivel_acesso'])): ?>
						<h1>Edição de {titulo}</h1>
	                <?php else: ?>
						<h1>Cadastro de {titulo}</h1>
	                <?php endif; ?>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">{titulo}</a></li>
						<li class="breadcrumb-item active">Cadastro de {titulo}</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card card-warning">
						<div class="card-body">
							<form role="form">
								<div class="row">
									<div class="col-sm-8">
										<!-- text input -->
										<div class="form-group">
											<label>Título <span class="text-danger">*</span></label>
											<input type="text" class="form-control form-control-sm" id="titulo_nivel_acesso" value="<?php if(isset($dados['nivel_acesso'])){echo $dados['nivel_acesso'][0]->TITULO_NIVEL_ACESSO;} ?>">
											<input type="hidden" class="form-control form-control-sm" id="id_nivel_acesso" value="<?php if(isset($dados['nivel_acesso'])){echo $dados['nivel_acesso'][0]->ID_NIVEL_ACESSO;} ?>">
										</div>
									</div>
									<div class="col-sm-4">
										<!-- select -->
										<div class="form-group">
											<label>Situação <span class="text-danger">*</span></label>
											<select class="form-control form-control-sm" id="situacao_nivel_acesso">
												<option <?php if(isset($dados['nivel_acesso']) && $dados['nivel_acesso'][0]->IND_SITUACAO_NIVEL_ACESSO == 'A'){echo 'selected';} ?> value="A">Ativo</option>
												<option <?php if(isset($dados['nivel_acesso']) && $dados['nivel_acesso'][0]->IND_SITUACAO_NIVEL_ACESSO == 'I'){echo 'selected';} ?> value="I">Inativo</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<!-- textarea -->
										<div class="form-group">
											<label>Descrição <span class="text-danger">*</span></label>
											<textarea class="textarea" rows="5" id="descricao_nivel_acesso"><?php if(isset($dados['nivel_acesso'])){echo $dados['nivel_acesso'][0]->DESCRICAO_NIVEL_ACESSO;} ?></textarea>
										</div>
									</div>
								</div>
								<label>Permissões </label>
								<div class="row" id="permissoes">
							        <!-- PERMISSÕES PARA CARGOS -->
							        <div class="col-xs-12 col-sm-4 grupo-permissoes">
							          <div class="form-check mb-0 mt-4">
							            <label class="form-check-label">
							              <input class="form-check-input check-todas-permissoes" type="checkbox" id="todas_permissoes_cargo" data-toggle="tooltip" title="Marcar/Desmarcar todas!"> <i class="fa fa-id-badge"></i> Cargos
							            </label>
							          </div>
							          <hr class="mt-2">
							          <div class="form-check">
							            <label class="form-check-label">
							              <input class="form-check-input check-visualizar" type="checkbox" id="visualizar_cargo" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->VISUALIZAR_CARGO){ echo 'checked'; } ?> value="visualizar_cargo"> Visualizar
							            </label>
							          </div>
							          <div class="form-check">
							            <label class="form-check-label">
							              <input class="form-check-input acao acao-cargo" type="checkbox" id="inserir_cargo" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->INSERIR_CARGO){ echo 'checked'; } ?> value="inserir_cargo"> Inserir
							            </label>
							          </div>
							          <div class="form-check">
							            <label class="form-check-label">
							              <input class="form-check-input acao acao-cargo" type="checkbox" id="editar_cargo" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->EDITAR_CARGO){ echo 'checked'; } ?> value="editar_cargo"> Editar
							            </label>
							          </div>
							          <div class="form-check">
							            <label class="form-check-label">
							              <input class="form-check-input acao acao-cargo" type="checkbox" id="excluir_cargo" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->EXCLUIR_CARGO){ echo 'checked'; } ?> value="excluir_cargo"> Excluir
							            </label>
							          </div>
							        </div>
							        <!-- PERMISSÕES PARA DEPARTAMENTOS -->
							        <div class="col-xs-12 col-sm-4 grupo-permissoes">
							          <div class="form-check mb-0 mt-4">
							            <label class="form-check-label">
							              <input class="form-check-input check-todas-permissoes" type="checkbox" id="todas_permissoes_departamento" data-toggle="tooltip" title="Marcar/Desmarcar todas!"> <i class="fa fa-sitemap"></i> Departamentos
							            </label>
							          </div>
							          <hr class="mt-2">
							          <div class="form-check">
							            <label class="form-check-label">
							              <input class="form-check-input check-visualizar" type="checkbox" id="visualizar_departamento" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->VISUALIZAR_DEPARTAMENTO){ echo 'checked'; } ?> value="visualizar_departamento"> Visualizar
							            </label>
							          </div>
							          <div class="form-check">
							            <label class="form-check-label">
							              <input class="form-check-input acao acao-departamento" type="checkbox" id="inserir_departamento" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->INSERIR_DEPARTAMENTO){ echo 'checked'; } ?> value="inserir_departamento"> Inserir
							            </label>
							          </div>
							          <div class="form-check">
							            <label class="form-check-label">
							              <input class="form-check-input acao acao-departamento" type="checkbox" id="editar_departamento" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->EDITAR_DEPARTAMENTO){ echo 'checked'; } ?> value="editar_departamento"> Editar
							            </label>
							          </div>
							          <div class="form-check">
							            <label class="form-check-label">
							              <input class="form-check-input acao acao-departamento" type="checkbox" id="excluir_departamento" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->EXCLUIR_DEPARTAMENTO){ echo 'checked'; } ?> value="excluir_departamento"> Excluir
							            </label>
							          </div>
							        </div>
							        <!-- PERMISSÕES PARA USUÁRIOS -->
							        <div class="col-xs-12 col-sm-4 grupo-permissoes">
							          <div class="form-check mb-0 mt-4">
							            <label class="form-check-label">
							              <input class="form-check-input check-todas-permissoes" type="checkbox" id="todas_permissoes_usuario" data-toggle="tooltip" title="Marcar/Desmarcar todas!"> <i class="fa fa-user"></i> Usuários
							            </label>
							          </div>
							          <hr class="mt-2">
							          <div class="form-check">
							            <label class="form-check-label">
							              <input class="form-check-input check-visualizar" type="checkbox" id="visualizar_usuario" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->VISUALIZAR_USUARIO){ echo 'checked'; } ?> value="visualizar_usuario"> Visualizar
							            </label>
							          </div>
							          <div class="form-check">
							            <label class="form-check-label">
							              <input class="form-check-input acao acao-usuario" type="checkbox" id="inserir_usuario" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->INSERIR_USUARIO){ echo 'checked'; } ?> value="inserir_usuario"> Inserir
							            </label>
							          </div>
							          <div class="form-check">
							            <label class="form-check-label">
							              <input class="form-check-input acao acao-usuario" type="checkbox" id="editar_usuario" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->EDITAR_USUARIO){ echo 'checked'; } ?> value="editar_usuario"> Editar
							            </label>
							          </div>
							          <div class="form-check">
							            <label class="form-check-label">
							              <input class="form-check-input acao acao-usuario" type="checkbox" id="excluir_usuario" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->EXCLUIR_USUARIO){ echo 'checked'; } ?> value="excluir_usuario"> Excluir
							            </label>
							          </div>
							        </div>
							        <!-- PERMISSÕES PARA AVISOS -->
							        <div class="col-xs-12 col-sm-4 grupo-permissoes">
							          <div class="form-check mb-0 mt-4">
							            <label class="form-check-label">
							              <input class="form-check-input check-todas-permissoes" type="checkbox" id="todas_permissoes_aviso" data-toggle="tooltip" title="Marcar/Desmarcar todas!"> <i class="fa fa-exclamation-triangle"></i> Avisos
							            </label>
							          </div>
							          <hr class="mt-2">
							          <div class="form-check">
							            <label class="form-check-label">
							              <input class="form-check-input check-visualizar" type="checkbox" id="visualizar_aviso" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->VISUALIZAR_AVISO){ echo 'checked'; } ?> value="visualizar_aviso"> Visualizar
							            </label>
							          </div>
							          <div class="form-check">
							            <label class="form-check-label">
							              <input class="form-check-input acao acao-aviso" type="checkbox" id="inserir_aviso" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->INSERIR_AVISO){ echo 'checked'; } ?> value="inserir_aviso"> Inserir
							            </label>
							          </div>
							          <div class="form-check">
							            <label class="form-check-label">
							              <input class="form-check-input acao acao-aviso" type="checkbox" id="editar_aviso" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->EDITAR_AVISO){ echo 'checked'; } ?> value="editar_aviso"> Editar
							            </label>
							          </div>
							          <div class="form-check">
							            <label class="form-check-label">
							              <input class="form-check-input acao acao-aviso" type="checkbox" id="excluir_aviso" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->EXCLUIR_AVISO){ echo 'checked'; } ?> value="excluir_aviso"> Excluir
							            </label>
							          </div>
							        </div>
							        <!-- PERMISSÕES PARA COMUNICADOS INTERNOS -->
							        <div class="col-xs-12 col-sm-4 grupo-permissoes">
							          <div class="form-check mb-0 mt-4">
							            <label class="form-check-label">
							              <input class="form-check-input check-todas-permissoes" type="checkbox" id="todas_permissoes_comunicado_interno" data-toggle="tooltip" title="Marcar/Desmarcar todas!"> <i class="fa fa-envelope-open-text"></i> Comunicados Internos
							            </label>
							          </div>
							          <hr class="mt-2">
							          <div class="form-check">
							            <label class="form-check-label">
							              <input class="form-check-input check-visualizar" type="checkbox" id="visualizar_comunicado_interno" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->VISUALIZAR_COMUNICADO_INTERNO){ echo 'checked'; } ?> value="visualizar_comunicado_interno"> Visualizar
							            </label>
							          </div>
							          <div class="form-check">
							            <label class="form-check-label">
							              <input class="form-check-input acao acao-comunicado-interno" type="checkbox" id="inserir_comunicado_interno" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->INSERIR_COMUNICADO_INTERNO){ echo 'checked'; } ?> value="inserir_comunicado_interno"> Inserir
							            </label>
							          </div>
							          <div class="form-check">
							            <label class="form-check-label">
							              <input class="form-check-input acao acao-comunicado-interno" type="checkbox" id="editar_comunicado_interno" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->EDITAR_COMUNICADO_INTERNO){ echo 'checked'; } ?> value="editar_comunicado_interno"> Editar
							            </label>
							          </div>
							          <div class="form-check">
							            <label class="form-check-label">
							              <input class="form-check-input acao acao-comunicado-interno" type="checkbox" id="excluir_comunicado_interno" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->EXCLUIR_COMUNICADO_INTERNO){ echo 'checked'; } ?> value="excluir_comunicado_interno"> Excluir
							            </label>
							          </div>
							        </div>
							        <!-- PERMISSÕES PARA DICAS DE SAÚDE -->
							        <div class="col-xs-12 col-sm-4 grupo-permissoes">
							          <div class="form-check mb-0 mt-4">
							            <label class="form-check-label">
							              <input class="form-check-input check-todas-permissoes" type="checkbox" id="todas_permissoes_dica_saude" data-toggle="tooltip" title="Marcar/Desmarcar todas!"> <i class="fa fa-heartbeat"></i> Dicas de Saúde e Mensagens
							            </label>
							          </div>
							          <hr class="mt-2">
							          <div class="form-check">
							            <label class="form-check-label">
							              <input class="form-check-input check-visualizar" type="checkbox" id="visualizar_dica_saude" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->VISUALIZAR_DICA_SAUDE){ echo 'checked'; } ?> value="visualizar_dica_saude"> Visualizar
							            </label>
							          </div>
							          <div class="form-check">
							            <label class="form-check-label">
							              <input class="form-check-input acao acao-dica-saude" type="checkbox" id="inserir_dica_saude" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->INSERIR_DICA_SAUDE){ echo 'checked'; } ?> value="inserir_dica_saude"> Inserir
							            </label>
							          </div>
							          <div class="form-check">
							            <label class="form-check-label">
							              <input class="form-check-input acao acao-dica-saude" type="checkbox" id="editar_dica_saude" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->EDITAR_DICA_SAUDE){ echo 'checked'; } ?> value="editar_dica_saude"> Editar
							            </label>
							          </div>
							          <div class="form-check">
							            <label class="form-check-label">
							              <input class="form-check-input acao acao-dica-saude" type="checkbox" id="excluir_dica_saude" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->EXCLUIR_DICA_SAUDE){ echo 'checked'; } ?> value="excluir_dica_saude"> Excluir
							            </label>
							          </div>
							        </div>
									<!-- PERMISSÕES PARA TIPOS DE ARQUIVO -->
									<div class="col-xs-12 col-sm-4 grupo-permissoes">
										<div class="form-check mb-0 mt-4">
											<label class="form-check-label">
												<input class="form-check-input check-todas-permissoes" type="checkbox" id="todas_permissoes_tipo_arquivo" data-toggle="tooltip" title="Marcar/Desmarcar todas!"> <i class="fa fa-file-alt"></i> Tipos de Arquivo
											</label>
										</div>
										<hr class="mt-2">
										<div class="form-check">
											<label class="form-check-label">
												<input class="form-check-input check-visualizar" type="checkbox" id="visualizar_tipo_arquivo" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->VISUALIZAR_TIPO_ARQUIVO){ echo 'checked'; } ?> value="visualizar_tipo_arquivo"> Visualizar
											</label>
										</div>
										<div class="form-check">
											<label class="form-check-label">
												<input class="form-check-input acao acao-tipo_arquivo" type="checkbox" id="inserir_tipo_arquivo" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->INSERIR_TIPO_ARQUIVO){ echo 'checked'; } ?> value="inserir_tipo_arquivo"> Inserir
											</label>
										</div>
										<div class="form-check">
											<label class="form-check-label">
												<input class="form-check-input acao acao-tipo_arquivo" type="checkbox" id="editar_tipo_arquivo" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->EDITAR_TIPO_ARQUIVO){ echo 'checked'; } ?> value="editar_tipo_arquivo"> Editar
											</label>
										</div>
										<div class="form-check">
											<label class="form-check-label">
												<input class="form-check-input acao acao-tipo_arquivo" type="checkbox" id="excluir_tipo_arquivo" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->EXCLUIR_TIPO_ARQUIVO){ echo 'checked'; } ?> value="excluir_tipo_arquivo"> Excluir
											</label>
										</div>
									</div>
									<!-- PERMISSÕES PARA ARQUIVOS -->
									<div class="col-xs-12 col-sm-4 grupo-permissoes">
										<div class="form-check mb-0 mt-4">
											<label class="form-check-label">
												<input class="form-check-input check-todas-permissoes" type="checkbox" id="todas_permissoes_arquivo" data-toggle="tooltip" title="Marcar/Desmarcar todas!"> <i class="fa fa-file"></i> Normas Internas e Manuais
											</label>
										</div>
										<hr class="mt-2">
										<div class="form-check">
											<label class="form-check-label">
												<input class="form-check-input check-visualizar" type="checkbox" id="visualizar_arquivo" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->VISUALIZAR_ARQUIVO){ echo 'checked'; } ?> value="visualizar_arquivo"> Visualizar
											</label>
										</div>
										<div class="form-check">
											<label class="form-check-label">
												<input class="form-check-input acao acao-arquivo" type="checkbox" id="inserir_arquivo" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->INSERIR_ARQUIVO){ echo 'checked'; } ?> value="inserir_arquivo"> Inserir
											</label>
										</div>
										<div class="form-check">
											<label class="form-check-label">
												<input class="form-check-input acao acao-arquivo" type="checkbox" id="editar_arquivo" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->EDITAR_ARQUIVO){ echo 'checked'; } ?> value="editar_arquivo"> Editar
											</label>
										</div>
										<div class="form-check">
											<label class="form-check-label">
												<input class="form-check-input acao acao-arquivo" type="checkbox" id="excluir_arquivo" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->EXCLUIR_ARQUIVO){ echo 'checked'; } ?> value="excluir_arquivo"> Excluir
											</label>
										</div>
									</div>
									<!-- PERMISSÕES PARA LINKS -->
									<div class="col-xs-12 col-sm-4 grupo-permissoes">
										<div class="form-check mb-0 mt-4">
											<label class="form-check-label">
												<input class="form-check-input check-todas-permissoes" type="checkbox" id="todas_permissoes_link" data-toggle="tooltip" title="Marcar/Desmarcar todas!"> <i class="fa fa-link"></i> Links
											</label>
										</div>
										<hr class="mt-2">
										<div class="form-check">
											<label class="form-check-label">
												<input class="form-check-input check-visualizar" type="checkbox" id="visualizar_link" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->VISUALIZAR_LINK){ echo 'checked'; } ?> value="visualizar_link"> Visualizar
											</label>
										</div>
										<div class="form-check">
											<label class="form-check-label">
												<input class="form-check-input acao acao-link" type="checkbox" id="inserir_link" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->INSERIR_LINK){ echo 'checked'; } ?> value="inserir_link"> Inserir
											</label>
										</div>
										<div class="form-check">
											<label class="form-check-label">
												<input class="form-check-input acao acao-link" type="checkbox" id="editar_link" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->EDITAR_LINK){ echo 'checked'; } ?> value="editar_link"> Editar
											</label>
										</div>
										<div class="form-check">
											<label class="form-check-label">
												<input class="form-check-input acao acao-link" type="checkbox" id="excluir_link" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->EXCLUIR_LINK){ echo 'checked'; } ?> value="excluir_link"> Excluir
											</label>
										</div>
									</div>
									<!-- PERMISSÕES PARA MÍDIAS -->
									<div class="col-xs-12 col-sm-4 grupo-permissoes">
										<div class="form-check mb-0 mt-4">
											<label class="form-check-label">
												<input class="form-check-input check-todas-permissoes" type="checkbox" id="todas_permissoes_midia" data-toggle="tooltip" title="Marcar/Desmarcar todas!"> <i class="fa fa-image"></i> Mídias
											</label>
										</div>
										<hr class="mt-2">
										<div class="form-check">
											<label class="form-check-label">
												<input class="form-check-input check-visualizar" type="checkbox" id="visualizar_midia" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->VISUALIZAR_MIDIA){ echo 'checked'; } ?> value="visualizar_midia"> Visualizar
											</label>
										</div>
										<div class="form-check">
											<label class="form-check-label">
												<input class="form-check-input acao acao-midia" type="checkbox" id="inserir_midia" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->INSERIR_MIDIA){ echo 'checked'; } ?> value="inserir_midia"> Inserir
											</label>
										</div>
										<div class="form-check">
											<label class="form-check-label">
												<input class="form-check-input acao acao-midia" type="checkbox" id="editar_midia" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->EDITAR_MIDIA){ echo 'checked'; } ?> value="editar_midia"> Editar
											</label>
										</div>
										<div class="form-check">
											<label class="form-check-label">
												<input class="form-check-input acao acao-midia" type="checkbox" id="excluir_midia" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->EXCLUIR_MIDIA){ echo 'checked'; } ?> value="excluir_midia"> Excluir
											</label>
										</div>
									</div>
									<!-- PERMISSÕES PARA EVENTOS -->
									<div class="col-xs-12 col-sm-4 grupo-permissoes">
										<div class="form-check mb-0 mt-4">
											<label class="form-check-label">
												<input class="form-check-input check-todas-permissoes" type="checkbox" id="todas_permissoes_evento" data-toggle="tooltip" title="Marcar/Desmarcar todas!"> <i class="fa fa-calendar-check"></i> Eventos
											</label>
										</div>
										<hr class="mt-2">
										<div class="form-check">
											<label class="form-check-label">
												<input class="form-check-input check-visualizar" type="checkbox" id="visualizar_evento" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->VISUALIZAR_EVENTO){ echo 'checked'; } ?> value="visualizar_evento"> Visualizar
											</label>
										</div>
										<div class="form-check">
											<label class="form-check-label">
												<input class="form-check-input acao acao-evento" type="checkbox" id="inserir_evento" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->INSERIR_EVENTO){ echo 'checked'; } ?> value="inserir_evento"> Inserir
											</label>
										</div>
										<div class="form-check">
											<label class="form-check-label">
												<input class="form-check-input acao acao-evento" type="checkbox" id="editar_evento" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->EDITAR_EVENTO){ echo 'checked'; } ?> value="editar_evento"> Editar
											</label>
										</div>
										<div class="form-check">
											<label class="form-check-label">
												<input class="form-check-input acao acao-evento" type="checkbox" id="excluir_evento" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->EXCLUIR_EVENTO){ echo 'checked'; } ?> value="excluir_evento"> Excluir
											</label>
										</div>
									</div>
									<!-- PERMISSÕES PARA FEEDBACK -->
									<div class="col-xs-12 col-sm-4 grupo-permissoes">
										<div class="form-check mb-0 mt-4">
											<label class="form-check-label">
												<input class="form-check-input check-todas-permissoes" type="checkbox" id="todas_permissoes_feedback" data-toggle="tooltip" title="Marcar/Desmarcar todas!"> <i class="fa fa-calendar-comments"></i> Feedback
											</label>
										</div>
										<hr class="mt-2">
										<div class="form-check">
											<label class="form-check-label">
												<input class="form-check-input check-visualizar" type="checkbox" id="visualizar_feedback" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->VISUALIZAR_FEEDBACK){ echo 'checked'; } ?> value="visualizar_feedback"> Visualizar
											</label>
										</div>
										<div class="form-check">
											<label class="form-check-label">
												<input class="form-check-input acao acao-feedback" type="checkbox" id="inserir_feedback" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->INSERIR_FEEDBACK){ echo 'checked'; } ?> value="inserir_feedback"> Inserir
											</label>
										</div>
										<div class="form-check">
											<label class="form-check-label">
												<input class="form-check-input acao acao-feedback" type="checkbox" id="editar_feedback" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->EDITAR_FEEDBACK){ echo 'checked'; } ?> value="editar_feedback"> Editar
											</label>
										</div>
										<div class="form-check">
											<label class="form-check-label">
												<input class="form-check-input acao acao-feedback" type="checkbox" id="excluir_feedback" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->EXCLUIR_FEEDBACK){ echo 'checked'; } ?> value="excluir_feedback"> Excluir
											</label>
										</div>
									</div>
									<!-- PERMISSÕES PARA RESULTADOS -->
									<div class="col-xs-12 col-sm-4 grupo-permissoes">
										<div class="form-check mb-0 mt-4">
											<label class="form-check-label">
												<input class="form-check-input check-todas-permissoes" type="checkbox" id="todas_permissoes_resultado" data-toggle="tooltip" title="Marcar/Desmarcar todas!"> <i class="fa fa-calendar-comments"></i> Resultados
											</label>
										</div>
										<hr class="mt-2">
										<div class="form-check">
											<label class="form-check-label">
												<input class="form-check-input check-visualizar" type="checkbox" id="visualizar_resultado" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->VISUALIZAR_RESULTADO){ echo 'checked'; } ?> value="visualizar_resultado"> Visualizar
											</label>
										</div>
										<div class="form-check">
											<label class="form-check-label">
												<input class="form-check-input acao acao-resultado" type="checkbox" id="inserir_resultado" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->INSERIR_RESULTADO){ echo 'checked'; } ?> value="inserir_resultado"> Inserir
											</label>
										</div>
										<div class="form-check">
											<label class="form-check-label">
												<input class="form-check-input acao acao-resultado" type="checkbox" id="editar_resultado" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->EDITAR_RESULTADO){ echo 'checked'; } ?> value="editar_resultado"> Editar
											</label>
										</div>
										<div class="form-check">
											<label class="form-check-label">
												<input class="form-check-input acao acao-resultado" type="checkbox" id="excluir_resultado" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->EXCLUIR_RESULTADO){ echo 'checked'; } ?> value="excluir_resultado"> Excluir
											</label>
										</div>
									</div>
							        <!-- PERMISSÕES PARA NÍVEIS DE ACESSO -->
							        <div class="col-xs-12 col-sm-4 grupo-permissoes">
							          <div class="form-check mb-0 mt-4">
							            <label class="form-check-label">
							              <input class="form-check-input check-todas-permissoes" type="checkbox" id="todas_permissoes_nivel_acesso" data-toggle="tooltip" title="Marcar/Desmarcar todas!"> <i class="fa fa-user-lock"></i> Níveis de Acesso
							            </label>
							          </div>
							          <hr class="mt-2">
							          <div class="form-check">
							            <label class="form-check-label">
							              <input class="form-check-input check-visualizar" type="checkbox" id="visualizar_nivel_acesso" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->VISUALIZAR_NIVEL_ACESSO){ echo 'checked'; } ?> value="visualizar_nivel_acesso"> Visualizar
							            </label>
							          </div>
							          <div class="form-check">
							            <label class="form-check-label">
							              <input class="form-check-input acao acao-nivel-acesso" type="checkbox" id="inserir_nivel_acesso" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->INSERIR_NIVEL_ACESSO){ echo 'checked'; } ?> value="inserir_nivel_acesso"> Inserir
							            </label>
							          </div>
							          <div class="form-check">
							            <label class="form-check-label">
							              <input class="form-check-input acao acao-nivel-acesso" type="checkbox" id="editar_nivel_acesso" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->EDITAR_NIVEL_ACESSO){ echo 'checked'; } ?> value="editar_nivel_acesso"> Editar
							            </label>
							          </div>
							          <div class="form-check">
							            <label class="form-check-label">
							              <input class="form-check-input acao acao-nivel-acesso" type="checkbox" id="excluir_nivel_acesso" <?php if(isset($dados['nivel_acesso'][0]) && $dados['nivel_acesso'][0]->EXCLUIR_NIVEL_ACESSO){ echo 'checked'; } ?> value="excluir_nivel_acesso"> Excluir
							            </label>
							          </div>
							        </div>
							      </div>
							</form>
						</div>
						<div class="card-footer">
				        	<a href="#" class="btn btn-default float-left" id="btn_cancelar"onclick="history.go(-1)">Voltar</a>
	                        <?php if (isset($dados['nivel_acesso'])): ?>
								<button type="button" class="btn btn-primary float-right mr-2" id="btn_editar_continuar">Alterar e Continuar</button>
				        		<button type="button" class="btn btn-primary float-right mr-2" id="btn_editar_voltar">Alterar</button>
								
	                        <?php else: ?>
				        		<button type="button" class="btn btn-primary float-right mr-2" id="btn_salvar_continuar">Inserir e Continuar</button>
								<button type="button" class="btn btn-primary float-right mr-2" id="btn_salvar_voltar">Inserir</button>
                            <?php endif; ?>
				        </div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
