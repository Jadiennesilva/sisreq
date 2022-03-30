<?php
            
/**
 * Customize o controller do objeto TipoUsuario aqui 
 * @author Jefferson Uchôa Ponte <jefponte@gmail.com>
 */

namespace SisReq\custom\controller;
use SisReq\controller\TipoUsuarioController;
use SisReq\custom\dao\TipoUsuarioCustomDAO;
use SisReq\custom\view\TipoUsuarioCustomView;

class TipoUsuarioCustomController  extends TipoUsuarioController {
    

	public function __construct(){
		$this->dao = new TipoUsuarioCustomDAO();
		$this->view = new TipoUsuarioCustomView();
	}


	        
}
?>