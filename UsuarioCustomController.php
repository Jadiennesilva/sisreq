<?php
            
/**
 * Customize o controller do objeto Usuario aqui 
 * @author Jefferson Uchôa Ponte <jefponte@gmail.com>
 */

namespace SisReq\custom\controller;
use SisReq\controller\UsuarioController;
use SisReq\custom\dao\UsuarioCustomDAO;
use SisReq\custom\view\UsuarioCustomView;

class UsuarioCustomController  extends UsuarioController {
    

	public function __construct(){
		$this->dao = new UsuarioCustomDAO();
		$this->view = new UsuarioCustomView();
	}


	        
}
?>