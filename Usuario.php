<?php
            
/**
 * Classe feita para manipulação do objeto Usuario
 * feita automaticamente com programa gerador de software inventado por
 * @author Jefferson Uchôa Ponte <j.pontee@gmail.com>
 */

namespace SisReq\model;

class Usuario {
	private $id;
	private $login;
	private $senha;
	private $tipo;
    public function __construct(){

        $this->tipo = new TipoUsuario();
    }
	public function setId($id) {
		$this->id = $id;
	}
		    
	public function getId() {
		return $this->id;
	}
	public function setLogin($login) {
		$this->login = $login;
	}
		    
	public function getLogin() {
		return $this->login;
	}
	public function setSenha($senha) {
		$this->senha = $senha;
	}
		    
	public function getSenha() {
		return $this->senha;
	}
	public function setTipo(TipoUsuario $tipoUsuario) {
		$this->tipo = $tipoUsuario;
	}
		    
	public function getTipo() {
		return $this->tipo;
	}
	public function __toString(){
	    return $this->id.' - '.$this->login.' - '.$this->senha.' - '.$this->tipo;
	}
                

}
?>