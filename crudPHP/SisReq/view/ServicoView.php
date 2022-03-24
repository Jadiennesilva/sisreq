<?php
            
/**
 * Classe de visao para Servico
 * @author Jefferson Uchôa Ponte <j.pontee@gmail.com>
 *
 */

namespace SisReq\view;
use SisReq\model\Servico;


class ServicoView {
    public function showInsertForm($listaSetor_id) {
		echo '
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary m-3" data-toggle="modal" data-target="#modalAddServico">
    Adicionar informações de serviço
</button>

<!-- Modal -->
<div class="modal fade" id="modalAddServico" tabindex="-1" role="dialog" aria-labelledby="labelAddServico" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="labelAddServico">Adicionar Servico</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form id="insert_form_servico" class="user" method="post">
            <input type="hidden" name="enviar_servico" value="1">                



                                        <div class="form-group">
                                            <label for="numero">Numero</label>
                                            <input type="number" class="form-control"  name="numero" id="numero" placeholder="Numero">
                                        </div>

                                        <div class="form-group">
                                            <label for="descricao">Descricao</label>
                                            <input type="text" class="form-control"  name="descricao" id="descricao" placeholder="Descricao">
                                        </div>

                                        <div class="form-group">
                                            <label for="justificativa">Justificativa</label>
                                            <input type="text" class="form-control"  name="justificativa" id="justificativa" placeholder="Justificativa">
                                        </div>

                                        <div class="form-group">
                                            <label for="especificacao">Especificacao</label>
                                            <input type="text" class="form-control"  name="especificacao" id="especificacao" placeholder="Especificacao">
                                        </div>

                                        <div class="form-group">
                                            <label for="obrigatorio_especificar">Obrigatorio_especificar</label><br />
                                            <div class="btn-group">
                                                <input type="radio" class="btn-check" name="obrigatorio_especificar"  id="obrigatorio_especificar_v" autocomplete="off" checked />
                                                <label class="btn btn-secondary" for="obrigatorio_especificar_v">Sim</label>

                                                <input type="radio" class="btn-check" name="obrigatorio_especificar" id="obrigatorio_especificar_f" autocomplete="off" />
                                                <label class="btn btn-secondary" for="obrigatorio_especificar_f">Não</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="obrigatorio_especificar">Obrigatorio_justificar</label><br />
                                            <div class="btn-group">
                                                <input type="radio" class="btn-check" name="obrigatorio_justificar"  id="obrigatorio_justificar_v" autocomplete="off" checked />
                                                <label class="btn btn-secondary" for="obrigatorio_justificar_v">Sim</label>

                                                <input type="radio" class="btn-check" name="obrigatorio_justificar" id="obrigatorio_justificar_f" autocomplete="off" />
                                                <label class="btn btn-secondary" for="obrigatorio_justificar_f">Não</label>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                          <label for="setor_id">Setor_id</label>
                						  <select class="form-control" id="setor_id" name="setor_id">
                                            <option value="">Selecione o Setor_id</option>';
                                                
        foreach( $listaSetor_id as $element){
            echo '<option value="'.$element->getId().'">'.$element.'</option>';
        }
            
        echo '
                                          </select>
                						</div>

						              </form>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button form="insert_form_servico" type="submit" class="btn btn-primary">Cadastrar</button>
      </div>
    </div>
  </div>
</div>
            
            
			
';
	}



                                            
                                            
    public function showList($lista){
           echo '
                                            
                                            
                                            

          <div class="card">
                <div class="card-header">
                  Lista Servico
                </div>
                <div class="card-body">
                                            
                                            
		<div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Numero</th>
                        <th>Descricao</th>
                        <th>Justificativa</th>
                        <th>Setor_id</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Numero</th>
                        <th>Descricao</th>
                        <th>Justificativa</th>
                        <th>Setor_id</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
            <tbody>';
            
            foreach($lista as $element){
                echo '<tr>';
                echo '  <td>'.$element->getNumero().'</td>';
                echo '  <td>'.$element->getDescricao().'</td>';
                echo '  <td></td>';
                echo '  <td>
                            <a href="?page=servico&select='.$element->getId().'" class="btn btn-info text-white">Select</a>
                            <a href="?page=servico&edit='.$element->getId().'" class="btn btn-success text-white">Edit</a>
                            <a href="?page=servico&delete='.$element->getId().'" class="btn btn-danger text-white">Delete</a>
                        </td>';
                echo '</tr>';
            }
            
        echo '
				</tbody>
			</table>
		</div>
            
            
            
            
  </div>
</div>
            
';
    }
            

            
	public function showEditForm($listaSetor_id, Servico $selecionado) {
		echo '
	    
	    

<div class="card o-hidden border-0 shadow-lg mb-4">
    <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Edit Servico</h6>
        </div>
        <div class="card-body">
            <form class="user" method="post" id="edit_form_servico">
                                        <div class="form-group">
                                            <label for="numero">Numero</label>
                                            <input type="number" class="form-control" value="'.$selecionado->getNumero().'"  name="numero" id="numero" placeholder="Numero">
                						</div>
                                        <div class="form-group">
                                            <label for="descricao">Descricao</label>
                                            <input type="text" class="form-control" value="'.$selecionado->getDescricao().'"  name="descricao" id="descricao" placeholder="Descricao">
                						</div>
                                        <div class="form-group">
                                            <label for="justificativa">Justificativa</label>
                                            <input type="text" class="form-control" value="'.$selecionado->getJustificativa().'"  name="justificativa" id="justificativa" placeholder="Justificativa">
                						</div>
                                        <div class="form-group">
                                            <label for="especificacao">Especificacao</label>
                                            <input type="text" class="form-control" value="'.$selecionado->getEspecificacao().'"  name="especificacao" id="especificacao" placeholder="Especificacao">
                						</div>
                                        <div class="form-group">
                                            <label for="obrigatorio_especificar">Obrigatorio_especificar</label>
                                            <input type="text" class="form-control" value="'.$selecionado->getObrigatorio_especificar().'"  name="obrigatorio_especificar" id="obrigatorio_especificar" placeholder="Obrigatorio_especificar">
                						</div>
                                        <div class="form-group">
                                        Teste
                                            <label for="obrigatorio_justificar">Obrigatorio justificar?</label>
                                            <input type="radio" class="form-control" value="'.$selecionado->getObrigatorio_justificar().'"  name="obrigatorio_justificar" id="obrigatorio_justificar_v"> Sim
                                            <input type="radio" class="form-control" value="'.$selecionado->getObrigatorio_justificar().'"  name="obrigatorio_justificar" id="obrigatorio_justificar_f"> Não
                						</div>
                                        <div class="form-group">
                                          <label for="setor_id">Setor_id</label>
                						  <select class="form-control" id="setor_id" name="setor_id">
                                            <option value="">Selecione o Setor_id</option>';
                                                
        foreach( $listaSetor_id as $element){
            echo '<option value="'.$element->getId().'">'.$element.'</option>';
        }
            
        echo '
                                          </select>
                						</div>
                <input type="hidden" value="1" name="edit_servico">
                </form>

        </div>
        <div class="modal-footer">
            <button form="edit_form_servico" type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </div>
</div>

	    

										
						              ';
	}




            
        public function showSelected(Servico $servico){
            echo '
            
	<div class="card o-hidden border-0 shadow-lg">
        <div class="card">
            <div class="card-header">
                  Servico selecionado
            </div>
            <div class="card-body">
                Id: '.$servico->getId().'<br>
                Numero: '.$servico->getNumero().'<br>
                Descricao: '.$servico->getDescricao().'<br>
                Justificativa: '.$servico->getJustificativa().'<br>
                Especificacao: '.$servico->getEspecificacao().'<br>
                Obrigatorio_especificar: '.$servico->getObrigatorio_especificar().'<br>
                Obrigatorio_justificar: '.$servico->getObrigatorio_justificar().'<br>
                Setor_id: '.$servico->getSetor_id().'<br>
            
            </div>
        </div>
    </div>
            
            
';
    }


                                            
    public function confirmDelete(Servico $servico) {
		echo '
        
        
        
				<div class="card o-hidden border-0 shadow-lg">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">
        
							<div class="col-lg-12">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4"> Delete Servico</h1>
									</div>
						              <form class="user" method="post">                    Are you sure you want to delete this object?

                                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Delete" name="delete_servico">
                                        <hr>
                                            
						              </form>
                                            
								</div>
							</div>
						</div>
					</div>
                                            
                                            
                                            
                                            
	</div>';
	}
                      


}