<?php
            
/**
 * Customize o controller do objeto Solicitacoes aqui 
 * @author Jefferson Uchôa Ponte <jefponte@gmail.com>
 */

namespace SisReq\custom\controller;
use SisReq\controller\SolicitacoesController;
use SisReq\custom\dao\SolicitacoesCustomDAO;
use SisReq\custom\view\SolicitacoesCustomView;

class SolicitacoesCustomController  extends SolicitacoesController {
    

	public function __construct(){
		$this->dao = new SolicitacoesCustomDAO();
		$this->view = new SolicitacoesCustomView();
	}


	        
}
?>