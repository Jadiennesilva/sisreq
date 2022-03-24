<?php
            
/**
 * Customize o controller do objeto Setor aqui 
 * @author Jefferson Uchôa Ponte <jefponte@gmail.com>
 */

namespace SisReq\custom\controller;
use SisReq\controller\SetorController;
use SisReq\custom\dao\SetorCustomDAO;
use SisReq\custom\view\SetorCustomView;

class SetorCustomController  extends SetorController {
    

	public function __construct(){
		$this->dao = new SetorCustomDAO();
		$this->view = new SetorCustomView();
	}


	        
}
?>