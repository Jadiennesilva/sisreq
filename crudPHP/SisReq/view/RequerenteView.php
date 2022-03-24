<?php
            
/**
 * Classe de visao para Requerente
 * @author Jefferson Uchôa Ponte <j.pontee@gmail.com>
 *
 */

namespace SisReq\view;
use SisReq\model\Requerente;


class RequerenteView {
    public function showInsertForm($listaCurso_id) {
		echo '
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary m-3" data-toggle="modal" data-target="#modalAddRequerente">
  Adicionar
</button>

<!-- Modal -->
<div class="modal fade" id="modalAddRequerente" tabindex="-1" role="dialog" aria-labelledby="labelAddRequerente" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="labelAddRequerente">Adicionar Requerente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form id="insert_form_requerente" class="user" method="post">
            <input type="hidden" name="enviar_requerente" value="1">                



                                        <div class="form-group">
                                            <label for="nome">Nome</label>
                                            <input type="text" class="form-control"  name="nome" id="nome" placeholder="Nome">
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control"  name="email" id="email" placeholder="Email">
                                        </div>

                                        <div class="form-group">
                                            <label for="telefone">Telefone</label>
                                            <input type="text" class="form-control"  name="telefone" id="telefone" placeholder="Telefone">
                                        </div>

                                        <div class="form-group">
                                            <label for="naturalidade">Naturalidade</label>
                                            <input type="text" class="form-control"  name="naturalidade" id="naturalidade" placeholder="Naturalidade">
                                        </div>

                                        <div class="form-group">
                                            <label for="data_de_nascimento">Data_de_nascimento</label>
                                            <input type="date" class="form-control"  name="data_de_nascimento" id="data_de_nascimento" placeholder="Data_de_nascimento">
                                        </div>

                                        <div class="form-group">
                                            <label for="numero_de_matricula">Numero_de_matricula</label>
                                            <input type="number" class="form-control"  name="numero_de_matricula" id="numero_de_matricula" placeholder="Numero_de_matricula">
                                        </div>

                                        <div class="form-group">
                                            <label for="filiacao">Filiacao</label>
                                            <input type="text" class="form-control"  name="filiacao" id="filiacao" placeholder="Filiacao">
                                        </div>
                                        <div class="form-group">
                                          <label for="curso_id">Curso_id</label>
                						  <select class="form-control" id="curso_id" name="curso_id">
                                            <option value="">Selecione o Curso_id</option>';
                                                
        foreach( $listaCurso_id as $element){
            echo '<option value="'.$element->getId().'">'.$element.'</option>';
        }
            
        echo '
                                          </select>
                						</div>

						              </form>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button form="insert_form_requerente" type="submit" class="btn btn-primary">Cadastrar</button>
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
                  Lista Requerente
                </div>
                <div class="card-body">
                                            
                                            
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%"
				cellspacing="0">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nome</th>
						<th>Email</th>
						<th>Telefone</th>
						<th>Curso_id</th>
                        <th>Actions</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
						<th>Curso_id</th>
                        <th>Actions</th>
					</tr>
				</tfoot>
				<tbody>';
            
            foreach($lista as $element){
                echo '<tr>';
                echo '<td>'.$element->getId().'</td>';
                echo '<td>'.$element->getNome().'</td>';
                echo '<td>'.$element->getEmail().'</td>';
                echo '<td>'.$element->getTelefone().'</td>';
                echo '<td>'.$element->getCurso_id().'</td>';
                echo '<td>
                        <a href="?page=requerente&select='.$element->getId().'" class="btn btn-info text-white">Select</a>
                        <a href="?page=requerente&edit='.$element->getId().'" class="btn btn-success text-white">Edit</a>
                        <a href="?page=requerente&delete='.$element->getId().'" class="btn btn-danger text-white">Delete</a>
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
            

            
	public function showEditForm($listaCurso_id, Requerente $selecionado) {
		echo '
	    
	    

<div class="card o-hidden border-0 shadow-lg mb-4">
    <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Edit Requerente</h6>
        </div>
        <div class="card-body">
            <form class="user" method="post" id="edit_form_requerente">
                                        <div class="form-group">
                                            <label for="nome">Nome</label>
                                            <input type="text" class="form-control" value="'.$selecionado->getNome().'"  name="nome" id="nome" placeholder="Nome">
                						</div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" value="'.$selecionado->getEmail().'"  name="email" id="email" placeholder="Email">
                						</div>
                                        <div class="form-group">
                                            <label for="telefone">Telefone</label>
                                            <input type="text" class="form-control" value="'.$selecionado->getTelefone().'"  name="telefone" id="telefone" placeholder="Telefone">
                						</div>
                                        <div class="form-group">
                                            <label for="naturalidade">Naturalidade</label>
                                            <input type="text" class="form-control" value="'.$selecionado->getNaturalidade().'"  name="naturalidade" id="naturalidade" placeholder="Naturalidade">
                						</div>
                                        <div class="form-group">
                                            <label for="data_de_nascimento">Data_de_nascimento</label>
                                            <input type="date" class="form-control" value="'.$selecionado->getData_de_nascimento().'"  name="data_de_nascimento" id="data_de_nascimento" placeholder="Data_de_nascimento">
                						</div>
                                        <div class="form-group">
                                            <label for="numero_de_matricula">Numero_de_matricula</label>
                                            <input type="number" class="form-control" value="'.$selecionado->getNumero_de_matricula().'"  name="numero_de_matricula" id="numero_de_matricula" placeholder="Numero_de_matricula">
                						</div>
                                        <div class="form-group">
                                            <label for="filiacao">Filiacao</label>
                                            <input type="text" class="form-control" value="'.$selecionado->getFiliacao().'"  name="filiacao" id="filiacao" placeholder="Filiacao">
                						</div>
                                        <div class="form-group">
                                          <label for="curso_id">Curso_id</label>
                						  <select class="form-control" id="curso_id" name="curso_id">
                                            <option value="">Selecione o Curso_id</option>';
                                                
        foreach( $listaCurso_id as $element){
            echo '<option value="'.$element->getId().'">'.$element.'</option>';
        }
            
        echo '
                                          </select>
                						</div>
                <input type="hidden" value="1" name="edit_requerente">
                </form>

        </div>
        <div class="modal-footer">
            <button form="edit_form_requerente" type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </div>
</div>

	    

										
						              ';
	}




            
        public function showSelected(Requerente $requerente){
            echo '
            
	<div class="card o-hidden border-0 shadow-lg">
        <div class="card">
            <div class="card-header">
                  Requerente selecionado
            </div>
            <div class="card-body">
                Id: '.$requerente->getId().'<br>
                Nome: '.$requerente->getNome().'<br>
                Email: '.$requerente->getEmail().'<br>
                Telefone: '.$requerente->getTelefone().'<br>
                Naturalidade: '.$requerente->getNaturalidade().'<br>
                Data_de_nascimento: '.$requerente->getData_de_nascimento().'<br>
                Numero_de_matricula: '.$requerente->getNumero_de_matricula().'<br>
                Filiacao: '.$requerente->getFiliacao().'<br>
                Curso_id: '.$requerente->getCurso_id().'<br>
            
            </div>
        </div>
    </div>
            
            
';
    }


                                            
    public function confirmDelete(Requerente $requerente) {
		echo '
        
        
        
				<div class="card o-hidden border-0 shadow-lg">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">
        
							<div class="col-lg-12">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4"> Delete Requerente</h1>
									</div>
						              <form class="user" method="post">                    Are you sure you want to delete this object?

                                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Delete" name="delete_requerente">
                                        <hr>
                                            
						              </form>
                                            
								</div>
							</div>
						</div>
					</div>
                                            
                                            
                                            
                                            
	</div>';
	}
                      


}