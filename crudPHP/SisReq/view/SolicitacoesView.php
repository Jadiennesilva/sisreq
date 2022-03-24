<?php
            
/**
 * Classe de visao para Solicitacoes
 * @author Jefferson Uchôa Ponte <j.pontee@gmail.com>
 *
 */

namespace SisReq\view;
use SisReq\model\Solicitacoes;


class SolicitacoesView {
    public function showInsertForm($listaRequerente_id, $listaServico_id, $listaAssinatura_id) {
		echo '
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary m-3" data-toggle="modal" data-target="#modalAddSolicitacoes">
  Adicionar informações de solicitações
</button>

<!-- Modal -->
<div class="modal fade" id="modalAddSolicitacoes" tabindex="-1" role="dialog" aria-labelledby="labelAddSolicitacoes" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="labelAddSolicitacoes">Adicionar Solicitacoes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form id="insert_form_solicitacoes" class="user" method="post">
            <input type="hidden" name="enviar_solicitacoes" value="1">                


                                        <div class="form-group">
                                          <label for="requerente_id">Requerente_id</label>
                						  <select class="form-control" id="requerente_id" name="requerente_id">
                                            <option value="">Selecione o Requerente_id</option>';
                                                
        foreach( $listaRequerente_id as $element){
            echo '<option value="'.$element->getId().'">'.$element.'</option>';
        }
            
        echo '
                                          </select>
                						</div>
                                        <div class="form-group">
                                          <label for="servico_id">Servico_id</label>
                						  <select class="form-control" id="servico_id" name="servico_id">
                                            <option value="">Selecione o Servico_id</option>';
                                                
        foreach( $listaServico_id as $element){
            echo '<option value="'.$element->getId().'">'.$element.'</option>';
        }
            
        echo '
                                          </select>
                						</div>
                                        <div class="form-group">
                                          <label for="assinatura_id">Assinatura_id</label>
                						  <select class="form-control" id="assinatura_id" name="assinatura_id">
                                            <option value="">Selecione o Assinatura_id</option>';
                                                
        foreach( $listaAssinatura_id as $element){
            echo '<option value="'.$element->getId().'">'.$element.'</option>';
        }
            
        echo '
                                          </select>
                						</div>

						              </form>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button form="insert_form_solicitacoes" type="submit" class="btn btn-primary">Cadastrar</button>
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
                  Lista Solicitacoes
                </div>
                <div class="card-body">
                                            
                                            
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%"
				cellspacing="0">
				<thead>
					<tr>
						<th>Id</th>
						<th>Requerente_id</th>
						<th>Servico_id</th>
						<th>Assinatura_id</th>
                        <th>Actions</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
                        <th>Id</th>
						<th>Requerente_id</th>
						<th>Servico_id</th>
						<th>Assinatura_id</th>
                        <th>Actions</th>
					</tr>
				</tfoot>
				<tbody>';
            
            foreach($lista as $element){
                echo '<tr>';
                echo '<td>'.$element->getId().'</td>';
                echo '<td>'.$element->getRequerente_id().'</td>';
                echo '<td>'.$element->getServico_id().'</td>';
                echo '<td>'.$element->getAssinatura_id().'</td>';
                echo '<td>
                        <a href="?page=solicitacoes&select='.$element->getId().'" class="btn btn-info text-white">Select</a>
                        <a href="?page=solicitacoes&edit='.$element->getId().'" class="btn btn-success text-white">Edit</a>
                        <a href="?page=solicitacoes&delete='.$element->getId().'" class="btn btn-danger text-white">Delete</a>
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
            

            
	public function showEditForm($listaRequerente_id, $listaServico_id, $listaAssinatura_id, Solicitacoes $selecionado) {
		echo '
	    
	    

<div class="card o-hidden border-0 shadow-lg mb-4">
    <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Edit Solicitacoes</h6>
        </div>
        <div class="card-body">
            <form class="user" method="post" id="edit_form_solicitacoes">
                                        <div class="form-group">
                                          <label for="requerente_id">Requerente_id</label>
                						  <select class="form-control" id="requerente_id" name="requerente_id">
                                            <option value="">Selecione o Requerente_id</option>';
                                                
        foreach( $listaRequerente_id as $element){
            echo '<option value="'.$element->getId().'">'.$element.'</option>';
        }
            
        echo '
                                          </select>
                						</div>
                                        <div class="form-group">
                                          <label for="servico_id">Servico_id</label>
                						  <select class="form-control" id="servico_id" name="servico_id">
                                            <option value="">Selecione o Servico_id</option>';
                                                
        foreach( $listaServico_id as $element){
            echo '<option value="'.$element->getId().'">'.$element.'</option>';
        }
            
        echo '
                                          </select>
                						</div>
                                        <div class="form-group">
                                          <label for="assinatura_id">Assinatura_id</label>
                						  <select class="form-control" id="assinatura_id" name="assinatura_id">
                                            <option value="">Selecione o Assinatura_id</option>';
                                                
        foreach( $listaAssinatura_id as $element){
            echo '<option value="'.$element->getId().'">'.$element.'</option>';
        }
            
        echo '
                                          </select>
                						</div>
                <input type="hidden" value="1" name="edit_solicitacoes">
                </form>

        </div>
        <div class="modal-footer">
            <button form="edit_form_solicitacoes" type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </div>
</div>

	    

										
						              ';
	}




            
        public function showSelected(Solicitacoes $solicitacoes){
            echo '
            
	<div class="card o-hidden border-0 shadow-lg">
        <div class="card">
            <div class="card-header">
                  Solicitacoes selecionado
            </div>
            <div class="card-body">
                Id: '.$solicitacoes->getId().'<br>
                Requerente_id: '.$solicitacoes->getRequerente_id().'<br>
                Servico_id: '.$solicitacoes->getServico_id().'<br>
                Assinatura_id: '.$solicitacoes->getAssinatura_id().'<br>
            
            </div>
        </div>
    </div>
            
            
';
    }


                                            
    public function confirmDelete(Solicitacoes $solicitacoes) {
		echo '
        
        
        
				<div class="card o-hidden border-0 shadow-lg">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">
        
							<div class="col-lg-12">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4"> Delete Solicitacoes</h1>
									</div>
						              <form class="user" method="post">                    Are you sure you want to delete this object?

                                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Delete" name="delete_solicitacoes">
                                        <hr>
                                            
						              </form>
                                            
								</div>
							</div>
						</div>
					</div>
                                            
                                            
                                            
                                            
	</div>';
	}
                      


}