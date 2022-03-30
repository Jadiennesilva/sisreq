<?php
            
/**
 * Customize o controller do objeto Requerente aqui 
 * @author Jefferson Uchôa Ponte <jefponte@gmail.com>
 */

namespace SisReq\custom\controller;
use SisReq\controller\RequerenteController;
use SisReq\custom\dao\RequerenteCustomDAO;
use SisReq\custom\view\RequerenteCustomView;

class RequerenteCustomController  extends RequerenteController {
    

	public function __construct(){
		$this->dao = new RequerenteCustomDAO();
		$this->view = new RequerenteCustomView();
	}


	        
}
?>