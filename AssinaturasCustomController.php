<?php
            
/**
 * Customize o controller do objeto Assinaturas aqui 
 * @author Jefferson Uchôa Ponte <jefponte@gmail.com>
 */

namespace SisReq\custom\controller;
use SisReq\controller\AssinaturasController;
use SisReq\custom\dao\AssinaturasCustomDAO;
use SisReq\custom\view\AssinaturasCustomView;

class AssinaturasCustomController  extends AssinaturasController {
    

	public function __construct(){
		$this->dao = new AssinaturasCustomDAO();
		$this->view = new AssinaturasCustomView();
	}


	        
}
?>