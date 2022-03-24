<?php
            
/**
 * Customize o controller do objeto Servico aqui 
 * @author Jefferson Uchôa Ponte <jefponte@gmail.com>
 */

namespace SisReq\custom\controller;
use SisReq\controller\ServicoController;
use SisReq\custom\dao\ServicoCustomDAO;
use SisReq\custom\view\ServicoCustomView;

class ServicoCustomController  extends ServicoController {
    

	public function __construct(){
		$this->dao = new ServicoCustomDAO();
		$this->view = new ServicoCustomView();
	}


	        
}
?>