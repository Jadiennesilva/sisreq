<?php
            
/**
 * Classe feita para manipulação do objeto SolicitacoesController
 * feita automaticamente com programa gerador de software inventado por
 * @author Jefferson Uchôa Ponte <j.pontee@gmail.com>
 */

namespace SisReq\controller;
use SisReq\dao\SolicitacoesDAO;
use SisReq\dao\RequerenteDAO;
use SisReq\dao\ServicoDAO;
use SisReq\dao\AssinaturasDAO;
use SisReq\model\Solicitacoes;
use SisReq\view\SolicitacoesView;


class SolicitacoesController {

	protected  $view;
    protected $dao;

	public function __construct(){
		$this->dao = new SolicitacoesDAO();
		$this->view = new SolicitacoesView();
	}


    public function delete(){
	    if(!isset($_GET['delete'])){
	        return;
	    }
        $selected = new Solicitacoes();
	    $selected->setId($_GET['delete']);
        if(!isset($_POST['delete_solicitacoes'])){
            $this->view->confirmDelete($selected);
            return;
        }
        if($this->dao->delete($selected))
        {
			echo '

<div class="alert alert-success" role="alert">
  Sucesso ao excluir Solicitacoes
</div>

';
		} else {
			echo '

<div class="alert alert-danger" role="alert">
  Falha ao tentar excluir Solicitacoes
</div>

';
		}
    	echo '<META HTTP-EQUIV="REFRESH" CONTENT="2; URL=index.php?page=solicitacoes">';
    }



	public function fetch() 
    {
		$list = $this->dao->fetch();
		$this->view->showList($list);
	}


	public function add() {
            
        if(!isset($_POST['enviar_solicitacoes'])){
            $requerenteDao = new RequerenteDAO($this->dao->getConnection());
            $listRequerente = $requerenteDao->fetch();

            $servicoDao = new ServicoDAO($this->dao->getConnection());
            $listServico = $servicoDao->fetch();

            $assinaturasDao = new AssinaturasDAO($this->dao->getConnection());
            $listAssinaturas = $assinaturasDao->fetch();

            $this->view->showInsertForm($listRequerente, $listServico, $listAssinaturas);
		    return;
		}
		if (! (  isset($_POST ['requerente_id']) &&  isset($_POST ['servico_id']) &&  isset($_POST ['assinatura_id']))) {
			echo '
                <div class="alert alert-danger" role="alert">
                    Failed to register. Some field must be missing. 
                </div>

                ';
			return;
		}
		$solicitacoes = new Solicitacoes ();
		$solicitacoes->getRequerente_id()->setId ( $_POST ['requerente_id'] );
		$solicitacoes->getServico_id()->setId ( $_POST ['servico_id'] );
		$solicitacoes->getAssinatura_id()->setId ( $_POST ['assinatura_id'] );
            
		if ($this->dao->insert ($solicitacoes ))
        {
			echo '

<div class="alert alert-success" role="alert">
  Sucesso ao inserir Solicitacoes
</div>

';
		} else {
			echo '

<div class="alert alert-danger" role="alert">
  Falha ao tentar Inserir Solicitacoes
</div>

';
		}
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="3; URL=index.php?page=solicitacoes">';
	}



            
	public function addAjax() {
            
        if(!isset($_POST['enviar_solicitacoes'])){
            return;    
        }
        
		    
		
		if (! (  isset($_POST ['requerente_id']) &&  isset($_POST ['servico_id']) &&  isset($_POST ['assinatura_id']))) {
			echo ':incompleto';
			return;
		}
            
		$solicitacoes = new Solicitacoes ();
		$solicitacoes->getRequerente_id()->setId ( $_POST ['requerente_id'] );
		$solicitacoes->getServico_id()->setId ( $_POST ['servico_id'] );
		$solicitacoes->getAssinatura_id()->setId ( $_POST ['assinatura_id'] );
            
		if ($this->dao->insert ( $solicitacoes ))
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
        $selected = new Solicitacoes();
	    $selected->setId($_GET['edit']);
	    $this->dao->fillById($selected);
	        
        if(!isset($_POST['edit_solicitacoes'])){
            $requerenteDao = new RequerenteDAO($this->dao->getConnection());
            $listRequerente = $requerenteDao->fetch();

            $servicoDao = new ServicoDAO($this->dao->getConnection());
            $listServico = $servicoDao->fetch();

            $assinaturasDao = new AssinaturasDAO($this->dao->getConnection());
            $listAssinaturas = $assinaturasDao->fetch();

            $this->view->showEditForm($listRequerente, $listServico, $listAssinaturas, $selected);
            return;
        }
            
		if (! (  isset($_POST ['requerente_id']) &&  isset($_POST ['servico_id']) &&  isset($_POST ['assinatura_id']))) {
			echo "Incompleto";
			return;
		}

            
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
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="3; URL=index.php?page=solicitacoes">';
            
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
        $selected = new Solicitacoes();
	    $selected->setId($_GET['select']);
	        
        $this->dao->fillById($selected);

        echo '<div class="col-xl-7 col-lg-7 col-md-12 col-sm-12">';
	    $this->view->showSelected($selected);
        echo '</div>';
            

            
    }
}
?>