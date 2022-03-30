<?php
            
/**
 * Classe feita para manipulação do objeto Solicitacoes
 * feita automaticamente com programa gerador de software inventado por
 * @author Jefferson Uchôa Ponte <j.pontee@gmail.com>
 */

namespace SisReq\model;

class Solicitacoes {
	private $id;
	private $requerente_id;
	private $servico_id;
	private $assinatura_id;
    public function __construct(){

        $this->requerente_id = new Requerente();
        $this->servico_id = new Servico();
        $this->assinatura_id = new Assinaturas();
    }
	public function setId($id) {
		$this->id = $id;
	}
		    
	public function getId() {
		return $this->id;
	}
	public function setRequerente_id(Requerente $requerente) {
		$this->requerente_id = $requerente;
	}
		    
	public function getRequerente_id() {
		return $this->requerente_id;
	}
	public function setServico_id(Servico $servico) {
		$this->servico_id = $servico;
	}
		    
	public function getServico_id() {
		return $this->servico_id;
	}
	public function setAssinatura_id(Assinaturas $assinaturas) {
		$this->assinatura_id = $assinaturas;
	}
		    
	public function getAssinatura_id() {
		return $this->assinatura_id;
	}
	public function __toString(){
	    return $this->id.' - '.$this->requerente_id.' - '.$this->servico_id.' - '.$this->assinatura_id;
	}
                

}
?>