<?php
            
/**
 * Classe feita para manipulação do objeto Curso
 * feita automaticamente com programa gerador de software inventado por
 * @author Jefferson Uchôa Ponte <j.pontee@gmail.com>
 */

namespace SisReq\model;

class Curso {
	private $id;
	private $nome;
	private $turno;
	private $período;
    public function __construct(){

    }
	public function setId($id) {
		$this->id = $id;
	}
		    
	public function getId() {
		return $this->id;
	}
	public function setNome($nome) {
		$this->nome = $nome;
	}
		    
	public function getNome() {
		return $this->nome;
	}
	public function setTurno($turno) {
		$this->turno = $turno;
	}
		    
	public function getTurno() {
		return $this->turno;
	}
	public function setPeríodo($período) {
		$this->período = $período;
	}
		    
	public function getPeríodo() {
		return $this->período;
	}
	public function __toString(){
	    return $this->id.' - '.$this->nome.' - '.$this->turno.' - '.$this->período;
	}
                

}
?>