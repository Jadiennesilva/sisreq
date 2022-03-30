<?php
            
/**
 * Classe feita para manipulação do objeto Assinaturas
 * feita automaticamente com programa gerador de software inventado por
 * @author Jefferson Uchôa Ponte <j.pontee@gmail.com>
 */

namespace SisReq\model;

class Assinaturas {
	private $id;
	private $assinatura_funcionario;
	private $assinatura_requerente;
	private $visto_CAE;
	private $visto_biblioteca;
    public function __construct(){

    }
	public function setId($id) {
		$this->id = $id;
	}
		    
	public function getId() {
		return $this->id;
	}
	public function setAssinatura_funcionario($assinatura_funcionario) {
		$this->assinatura_funcionario = $assinatura_funcionario;
	}
		    
	public function getAssinatura_funcionario() {
		return $this->assinatura_funcionario;
	}
	public function setAssinatura_requerente($assinatura_requerente) {
		$this->assinatura_requerente = $assinatura_requerente;
	}
		    
	public function getAssinatura_requerente() {
		return $this->assinatura_requerente;
	}
	public function setVisto_CAE($visto_CAE) {
		$this->visto_CAE = $visto_CAE;
	}
		    
	public function getVisto_CAE() {
		return $this->visto_CAE;
	}
	public function setVisto_biblioteca($visto_biblioteca) {
		$this->visto_biblioteca = $visto_biblioteca;
	}
		    
	public function getVisto_biblioteca() {
		return $this->visto_biblioteca;
	}
	public function __toString(){
	    return $this->id.' - '.$this->assinatura_funcionario.' - '.$this->assinatura_requerente.' - '.$this->visto_CAE.' - '.$this->visto_biblioteca;
	}
                

}
?>