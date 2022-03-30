<?php
            
/**
 * Customize o controller do objeto Curso aqui 
 * @author Jefferson Uchôa Ponte <jefponte@gmail.com>
 */

namespace SisReq\custom\controller;
use SisReq\controller\CursoController;
use SisReq\custom\dao\CursoCustomDAO;
use SisReq\custom\view\CursoCustomView;

class CursoCustomController  extends CursoController {
    

	public function __construct(){
		$this->dao = new CursoCustomDAO();
		$this->view = new CursoCustomView();
	}


	        
}
?>