<?php
            
/**
 * Classe feita para manipulação do objeto AssinaturasController
 * feita automaticamente com programa gerador de software inventado por
 * @author Jefferson Uchôa Ponte <j.pontee@gmail.com>
 */

namespace SisReq\controller;
use SisReq\dao\AssinaturasDAO;
use SisReq\model\Assinaturas;
use SisReq\view\AssinaturasView;


class AssinaturasController {

	protected  $view;
    protected $dao;

	public function __construct(){
		$this->dao = new AssinaturasDAO();
		$this->view = new AssinaturasView();
	}


    public function delete(){
	    if(!isset($_GET['delete'])){
	        return;
	    }
        $selected = new Assinaturas();
	    $selected->setId($_GET['delete']);
        if(!isset($_POST['delete_assinaturas'])){
            $this->view->confirmDelete($selected);
            return;
        }
        if($this->dao->delete($selected))
        {
			echo '

<div class="alert alert-success" role="alert">
  Sucesso ao excluir Assinaturas
</div>

';
		} else {
			echo '

<div class="alert alert-danger" role="alert">
  Falha ao tentar excluir Assinaturas
</div>

';
		}
    	echo '<META HTTP-EQUIV="REFRESH" CONTENT="2; URL=index.php?page=assinaturas">';
    }



	public function fetch() 
    {
		$list = $this->dao->fetch();
		$this->view->showList($list);
	}


	public function add() {
            
        if(!isset($_POST['enviar_assinaturas'])){
            $this->view->showInsertForm();
		    return;
		}
		if (! ( isset ( $_POST ['assinatura_funcionario'] ) && isset ( $_POST ['assinatura_requerente'] ) && isset ( $_POST ['visto_cae'] ) && isset ( $_POST ['visto_biblioteca'] ))) {
			echo '
                <div class="alert alert-danger" role="alert">
                    Failed to register. Some field must be missing. 
                </div>

                ';
			return;
		}
		$assinaturas = new Assinaturas ();
		$assinaturas->setAssinatura_funcionario ( $_POST ['assinatura_funcionario'] );
		$assinaturas->setAssinatura_requerente ( $_POST ['assinatura_requerente'] );
		$assinaturas->setVisto_CAE ( $_POST ['visto_cae'] );
		$assinaturas->setVisto_biblioteca ( $_POST ['visto_biblioteca'] );
            
		if ($this->dao->insert ($assinaturas ))
        {
			echo '

<div class="alert alert-success" role="alert">
  Sucesso ao inserir Assinaturas
</div>

';
		} else {
			echo '

<div class="alert alert-danger" role="alert">
  Falha ao tentar Inserir Assinaturas
</div>

';
		}
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="3; URL=index.php?page=assinaturas">';
	}



            
	public function addAjax() {
            
        if(!isset($_POST['enviar_assinaturas'])){
            return;    
        }
        
		    
		
		if (! ( isset ( $_POST ['assinatura_funcionario'] ) && isset ( $_POST ['assinatura_requerente'] ) && isset ( $_POST ['visto_cae'] ) && isset ( $_POST ['visto_biblioteca'] ))) {
			echo ':incompleto';
			return;
		}
            
		$assinaturas = new Assinaturas ();
		$assinaturas->setAssinatura_funcionario ( $_POST ['assinatura_funcionario'] );
		$assinaturas->setAssinatura_requerente ( $_POST ['assinatura_requerente'] );
		$assinaturas->setVisto_CAE ( $_POST ['visto_cae'] );
		$assinaturas->setVisto_biblioteca ( $_POST ['visto_biblioteca'] );
            
		if ($this->dao->insert ( $assinaturas ))
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
        $selected = new Assinaturas();
	    $selected->setId($_GET['edit']);
	    $this->dao->fillById($selected);
	        
        if(!isset($_POST['edit_assinaturas'])){
            $this->view->showEditForm($selected);
            return;
        }
            
		if (! ( isset ( $_POST ['assinatura_funcionario'] ) && isset ( $_POST ['assinatura_requerente'] ) && isset ( $_POST ['visto_cae'] ) && isset ( $_POST ['visto_biblioteca'] ))) {
			echo "Incompleto";
			return;
		}

		$selected->setAssinatura_funcionario ( $_POST ['assinatura_funcionario'] );
		$selected->setAssinatura_requerente ( $_POST ['assinatura_requerente'] );
		$selected->setVisto_CAE ( $_POST ['visto_cae'] );
		$selected->setVisto_biblioteca ( $_POST ['visto_biblioteca'] );
            
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
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="3; URL=index.php?page=assinaturas">';
            
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
        $selected = new Assinaturas();
	    $selected->setId($_GET['select']);
	        
        $this->dao->fillById($selected);

        echo '<div class="col-xl-7 col-lg-7 col-md-12 col-sm-12">';
	    $this->view->showSelected($selected);
        echo '</div>';
            

            
    }
}
?>