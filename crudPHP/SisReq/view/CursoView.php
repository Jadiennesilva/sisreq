<?php
            
/**
 * Classe de visao para Curso
 * @author Jefferson Uchôa Ponte <j.pontee@gmail.com>
 *
 */

namespace SisReq\view;
use SisReq\model\Curso;


class CursoView {
    public function showInsertForm() {
		echo '
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary m-3" data-toggle="modal" data-target="#modalAddCurso">
  Adicionar informações de curso
</button>

<!-- Modal -->
<div class="modal fade" id="modalAddCurso" tabindex="-1" role="dialog" aria-labelledby="labelAddCurso" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="labelAddCurso">Adicionar Curso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form id="insert_form_curso" class="user" method="post">
            <input type="hidden" name="enviar_curso" value="1">                



                                        <div class="form-group">
                                            <label for="nome">Nome</label>
                                            <input type="text" class="form-control"  name="nome" id="nome" placeholder="Nome">
                                        </div>

                                        <div class="form-group">
                                            <label for="turno">Turno</label>
                                            <input type="text" class="form-control"  name="turno" id="turno" placeholder="Turno">
                                        </div>

                                        <div class="form-group">
                                            <label for="período">Período</label>
                                            <input type="text" class="form-control"  name="período" id="período" placeholder="Período">
                                        </div>

						              </form>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button form="insert_form_curso" type="submit" class="btn btn-primary">Cadastrar</button>
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
                  Lista Curso
                </div>
                <div class="card-body">
                                            
                                            
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%"
				cellspacing="0">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nome</th>
						<th>Turno</th>
						<th>Período</th>
                        <th>Actions</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Turno</th>
                        <th>Período</th>
                        <th>Actions</th>
					</tr>
				</tfoot>
				<tbody>';
            
            foreach($lista as $element){
                echo '<tr>';
                echo '<td>'.$element->getId().'</td>';
                echo '<td>'.$element->getNome().'</td>';
                echo '<td>'.$element->getTurno().'</td>';
                echo '<td>'.$element->getPeríodo().'</td>';
                echo '<td>
                        <a href="?page=curso&select='.$element->getId().'" class="btn btn-info text-white">Select</a>
                        <a href="?page=curso&edit='.$element->getId().'" class="btn btn-success text-white">Edit</a>
                        <a href="?page=curso&delete='.$element->getId().'" class="btn btn-danger text-white">Delete</a>
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
            

            
	public function showEditForm(Curso $selecionado) {
		echo '
	    
	    

<div class="card o-hidden border-0 shadow-lg mb-4">
    <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Edit Curso</h6>
        </div>
        <div class="card-body">
            <form class="user" method="post" id="edit_form_curso">
                                        <div class="form-group">
                                            <label for="nome">Nome</label>
                                            <input type="text" class="form-control" value="'.$selecionado->getNome().'"  name="nome" id="nome" placeholder="Nome">
                						</div>
                                        <div class="form-group">
                                            <label for="turno">Turno</label>
                                            <input type="text" class="form-control" value="'.$selecionado->getTurno().'"  name="turno" id="turno" placeholder="Turno">
                						</div>
                                        <div class="form-group">
                                            <label for="período">Período</label>
                                            <input type="text" class="form-control" value="'.$selecionado->getPeríodo().'"  name="período" id="período" placeholder="Período">
                						</div>
                <input type="hidden" value="1" name="edit_curso">
                </form>

        </div>
        <div class="modal-footer">
            <button form="edit_form_curso" type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </div>
</div>

	    

										
						              ';
	}




            
        public function showSelected(Curso $curso){
            echo '
            
	<div class="card o-hidden border-0 shadow-lg">
        <div class="card">
            <div class="card-header">
                  Curso selecionado
            </div>
            <div class="card-body">
                Id: '.$curso->getId().'<br>
                Nome: '.$curso->getNome().'<br>
                Turno: '.$curso->getTurno().'<br>
                Período: '.$curso->getPeríodo().'<br>
            
            </div>
        </div>
    </div>
            
            
';
    }


                                            
    public function confirmDelete(Curso $curso) {
		echo '
        
        
        
				<div class="card o-hidden border-0 shadow-lg">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">
        
							<div class="col-lg-12">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4"> Delete Curso</h1>
									</div>
						              <form class="user" method="post">                    Are you sure you want to delete this object?

                                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Delete" name="delete_curso">
                                        <hr>
                                            
						              </form>
                                            
								</div>
							</div>
						</div>
					</div>
                                            
                                            
                                            
                                            
	</div>';
	}
                      


}