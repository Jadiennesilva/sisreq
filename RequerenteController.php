<?php
            
/**
 * Classe feita para manipulação do objeto RequerenteController
 * feita automaticamente com programa gerador de software inventado por
 * @author Jefferson Uchôa Ponte <j.pontee@gmail.com>
 */

namespace SisReq\controller;
use SisReq\dao\RequerenteDAO;
use SisReq\dao\CursoDAO;
use SisReq\model\Requerente;
use SisReq\view\RequerenteView;


class RequerenteController {

	protected  $view;
    protected $dao;

	public function __construct(){
		$this->dao = new RequerenteDAO();
		$this->view = new RequerenteView();
	}


    public function delete(){
	    if(!isset($_GET['delete'])){
	        return;
	    }
        $selected = new Requerente();
	    $selected->setId($_GET['delete']);
        if(!isset($_POST['delete_requerente'])){
            $this->view->confirmDelete($selected);
            return;
        }
        if($this->dao->delete($selected))
        {
			echo '

<div class="alert alert-success" role="alert">
  Sucesso ao excluir Requerente
</div>

';
		} else {
			echo '

<div class="alert alert-danger" role="alert">
  Falha ao tentar excluir Requerente
</div>

';
		}
    	echo '<META HTTP-EQUIV="REFRESH" CONTENT="2; URL=index.php?page=requerente">';
    }



	public function fetch() 
    {
		$list = $this->dao->fetch();
		$this->view->showList($list);
	}


	public function add() {
            
        if(!isset($_POST['enviar_requerente'])){
            $cursoDao = new CursoDAO($this->dao->getConnection());
            $listCurso = $cursoDao->fetch();

            $this->view->showInsertForm($listCurso);
		    return;
		}
		if (! ( isset ( $_POST ['nome'] ) && isset ( $_POST ['email'] ) && isset ( $_POST ['telefone'] ) && isset ( $_POST ['naturalidade'] ) && isset ( $_POST ['data_de_nascimento'] ) && isset ( $_POST ['numero_de_matricula'] ) && isset ( $_POST ['filiacao'] ) &&  isset($_POST ['curso_id']))) {
			echo '
                <div class="alert alert-danger" role="alert">
                    Failed to register. Some field must be missing. 
                </div>

                ';
			return;
		}
		$requerente = new Requerente ();
		$requerente->setNome ( $_POST ['nome'] );
		$requerente->setEmail ( $_POST ['email'] );
		$requerente->setTelefone ( $_POST ['telefone'] );
		$requerente->setNaturalidade ( $_POST ['naturalidade'] );
		$requerente->setData_de_nascimento ( $_POST ['data_de_nascimento'] );
		$requerente->setNumero_de_matricula ( $_POST ['numero_de_matricula'] );
		$requerente->setFiliacao ( $_POST ['filiacao'] );
		$requerente->getCurso_id()->setId ( $_POST ['curso_id'] );
            
		if ($this->dao->insert ($requerente ))
        {
			echo '

<div class="alert alert-success" role="alert">
  Sucesso ao inserir Requerente
</div>

';
		} else {
			echo '

<div class="alert alert-danger" role="alert">
  Falha ao tentar Inserir Requerente
</div>

';
		}
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="3; URL=index.php?page=requerente">';
	}



            
	public function addAjax() {
            
        if(!isset($_POST['enviar_requerente'])){
            return;    
        }
        
		    
		
		if (! ( isset ( $_POST ['nome'] ) && isset ( $_POST ['email'] ) && isset ( $_POST ['telefone'] ) && isset ( $_POST ['naturalidade'] ) && isset ( $_POST ['data_de_nascimento'] ) && isset ( $_POST ['numero_de_matricula'] ) && isset ( $_POST ['filiacao'] ) &&  isset($_POST ['curso_id']))) {
			echo ':incompleto';
			return;
		}
            
		$requerente = new Requerente ();
		$requerente->setNome ( $_POST ['nome'] );
		$requerente->setEmail ( $_POST ['email'] );
		$requerente->setTelefone ( $_POST ['telefone'] );
		$requerente->setNaturalidade ( $_POST ['naturalidade'] );
		$requerente->setData_de_nascimento ( $_POST ['data_de_nascimento'] );
		$requerente->setNumero_de_matricula ( $_POST ['numero_de_matricula'] );
		$requerente->setFiliacao ( $_POST ['filiacao'] );
		$requerente->getCurso_id()->setId ( $_POST ['curso_id'] );
            
		if ($this->dao->insert ( $requerente ))
        {
			$id = $this->dao->getConnection()->lastInsertId();
            echo ':sucesso:'.$id;
            
		} else {
			 echo ':falha';
		}
	}
            
            

            
    public function edit(){
	    if(!isset($_GET['edit'])){
	        return;
	    }
        $selected = new Requerente();
	    $selected->setId($_GET['edit']);
	    $this->dao->fillById($selected);
	        
        if(!isset($_POST['edit_requerente'])){
            $cursoDao = new CursoDAO($this->dao->getConnection());
            $listCurso = $cursoDao->fetch();

            $this->view->showEditForm($listCurso, $selected);
            return;
        }
            
		if (! ( isset ( $_POST ['nome'] ) && isset ( $_POST ['email'] ) && isset ( $_POST ['telefone'] ) && isset ( $_POST ['naturalidade'] ) && isset ( $_POST ['data_de_nascimento'] ) && isset ( $_POST ['numero_de_matricula'] ) && isset ( $_POST ['filiacao'] ) &&  isset($_POST ['curso_id']))) {
			echo "Incompleto";
			return;
		}

		$selected->setNome ( $_POST ['nome'] );
		$selected->setEmail ( $_POST ['email'] );
		$selected->setTelefone ( $_POST ['telefone'] );
		$selected->setNaturalidade ( $_POST ['naturalidade'] );
		$selected->setData_de_nascimento ( $_POST ['data_de_nascimento'] );
		$selected->setNumero_de_matricula ( $_POST ['numero_de_matricula'] );
		$selected->setFiliacao ( $_POST ['filiacao'] );
            
		if ($this->dao->update ($selected ))
        {
			echo '

<div class="alert alert-success" role="alert">
  Sucesso 
</div>

';
		} else {
			echo '

<div class="alert alert-danger" role="alert">
  Falha 
</div>

';
		}
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="3; URL=index.php?page=requerente">';
            
    }
        

    public function main(){
        
        if (isset($_GET['select'])){
            echo '<div class="row">';
                $this->select();
            echo '</div>';
            return;
        }
        echo '
		<div class="row">';
        echo '<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">';
        
        if(isset($_GET['edit'])){
            $this->edit();
        }else if(isset($_GET['delete'])){
            $this->delete();
	    }else{
            $this->add();
        }
        $this->fetch();
        
        echo '</div>';
        echo '</div>';
            
    }
    public function mainAjax(){

        $this->addAjax();
        
            
    }


            
    public function select(){
	    if(!isset($_GET['select'])){
	        return;
	    }
        $selected = new Requerente();
	    $selected->setId($_GET['select']);
	        
        $this->dao->fillById($selected);

        echo '<div class="col-xl-7 col-lg-7 col-md-12 col-sm-12">';
	    $this->view->showSelected($selected);
        echo '</div>';
            

            
    }
}
?>