<?php
            
/**
 * Classe feita para manipulação do objeto ServicoController
 * feita automaticamente com programa gerador de software inventado por
 * @author Jefferson Uchôa Ponte <j.pontee@gmail.com>
 */

namespace SisReq\controller;
use SisReq\dao\ServicoDAO;
use SisReq\dao\SetorDAO;
use SisReq\model\Servico;
use SisReq\view\ServicoView;


class ServicoController {

	protected  $view;
    protected $dao;

	public function __construct(){
		$this->dao = new ServicoDAO();
		$this->view = new ServicoView();
	}


    public function delete(){
	    if(!isset($_GET['delete'])){
	        return;
	    }
        $selected = new Servico();
	    $selected->setId($_GET['delete']);
        if(!isset($_POST['delete_servico'])){
            $this->view->confirmDelete($selected);
            return;
        }
        if($this->dao->delete($selected))
        {
			echo '

<div class="alert alert-success" role="alert">
  Sucesso ao excluir Servico
</div>

';
		} else {
			echo '

<div class="alert alert-danger" role="alert">
  Falha ao tentar excluir Servico
</div>

';
		}
    	echo '<META HTTP-EQUIV="REFRESH" CONTENT="2; URL=index.php?page=servico">';
    }



	public function fetch() 
    {
		$list = $this->dao->fetch();
		$this->view->showList($list);
	}


	public function add() {
            
        if(!isset($_POST['enviar_servico'])){
            $setorDao = new SetorDAO($this->dao->getConnection());
            $listSetor = $setorDao->fetch();

            $this->view->showInsertForm($listSetor);
		    return;
		}
		if (! ( isset ( $_POST ['numero'] ) && isset ( $_POST ['descricao'] ) && isset ( $_POST ['justificativa'] ) && isset ( $_POST ['especificacao'] ) && isset ( $_POST ['obrigatorio_especificar'] ) && isset ( $_POST ['obrigatorio_justificar'] ) &&  isset($_POST ['setor_id']))) {
			echo '
                <div class="alert alert-danger" role="alert">
                    Failed to register. Some field must be missing. 
                </div>

                ';
			return;
		}
		$servico = new Servico ();
		$servico->setNumero ( $_POST ['numero'] );
		$servico->setDescricao ( $_POST ['descricao'] );
		$servico->setJustificativa ( $_POST ['justificativa'] );
		$servico->setEspecificacao ( $_POST ['especificacao'] );
		$servico->setObrigatorio_especificar ( $_POST ['obrigatorio_especificar'] );
		$servico->setObrigatorio_justificar ( $_POST ['obrigatorio_justificar'] );
		$servico->getSetor_id()->setId ( $_POST ['setor_id'] );
            
		if ($this->dao->insert ($servico ))
        {
			echo '

<div class="alert alert-success" role="alert">
  Sucesso ao inserir Servico
</div>

';
		} else {
			echo '

<div class="alert alert-danger" role="alert">
  Falha ao tentar Inserir Servico
</div>

';
		}
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="3; URL=index.php?page=servico">';
	}



            
	public function addAjax() {
            
        if(!isset($_POST['enviar_servico'])){
            return;    
        }
        
		    
		
		if (! ( isset ( $_POST ['numero'] ) && isset ( $_POST ['descricao'] ) && isset ( $_POST ['justificativa'] ) && isset ( $_POST ['especificacao'] ) && isset ( $_POST ['obrigatorio_especificar'] ) && isset ( $_POST ['obrigatorio_justificar'] ) &&  isset($_POST ['setor_id']))) {
			echo ':incompleto';
			return;
		}
            
		$servico = new Servico ();
		$servico->setNumero ( $_POST ['numero'] );
		$servico->setDescricao ( $_POST ['descricao'] );
		$servico->setJustificativa ( $_POST ['justificativa'] );
		$servico->setEspecificacao ( $_POST ['especificacao'] );
		$servico->setObrigatorio_especificar ( $_POST ['obrigatorio_especificar'] );
		$servico->setObrigatorio_justificar ( $_POST ['obrigatorio_justificar'] );
		$servico->getSetor_id()->setId ( $_POST ['setor_id'] );
            
		if ($this->dao->insert ( $servico ))
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
        $selected = new Servico();
	    $selected->setId($_GET['edit']);
	    $this->dao->fillById($selected);
	        
        if(!isset($_POST['edit_servico'])){
            $setorDao = new SetorDAO($this->dao->getConnection());
            $listSetor = $setorDao->fetch();

            $this->view->showEditForm($listSetor, $selected);
            return;
        }
            
		if (! ( isset ( $_POST ['numero'] ) && isset ( $_POST ['descricao'] ) && isset ( $_POST ['justificativa'] ) && isset ( $_POST ['especificacao'] ) && isset ( $_POST ['obrigatorio_especificar'] ) && isset ( $_POST ['obrigatorio_justificar'] ) &&  isset($_POST ['setor_id']))) {
			echo "Incompleto";
			return;
		}

		$selected->setNumero ( $_POST ['numero'] );
		$selected->setDescricao ( $_POST ['descricao'] );
		$selected->setJustificativa ( $_POST ['justificativa'] );
		$selected->setEspecificacao ( $_POST ['especificacao'] );
		$selected->setObrigatorio_especificar ( $_POST ['obrigatorio_especificar'] );
		$selected->setObrigatorio_justificar ( $_POST ['obrigatorio_justificar'] );
            
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
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="3; URL=index.php?page=servico">';
            
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
        $selected = new Servico();
	    $selected->setId($_GET['select']);
	        
        $this->dao->fillById($selected);

        echo '<div class="col-xl-7 col-lg-7 col-md-12 col-sm-12">';
	    $this->view->showSelected($selected);
        echo '</div>';
            

            
    }
}
?>