<?php
            
/**
 * Classe feita para manipulação do objeto Servico
 * feita automaticamente com programa gerador de software inventado por
 * @author Jefferson Uchôa Ponte <j.pontee@gmail.com>
 */

namespace SisReq\model;

class Servico {
	private $id;
	private $numero;
	private $descricao;
	private $justificativa;
	private $especificacao;
	private $obrigatorio_especificar;
	private $obrigatorio_justificar;
    public function __construct(){

    }
	public function setId($id) {
		$this->id = $id;
	}
		    
	public function getId() {
		return $this->id;
	}
	public function setNumero($numero) {
		$this->numero = $numero;
	}
		    
	public function getNumero() {
		return $this->numero;
	}
	public function setDescricao($descricao) {
		$this->descricao = $descricao;
	}
		    
	public function getDescricao() {
		return $this->descricao;
	}
	public function setJustificativa($justificativa) {
		$this->justificativa = $justificativa;
	}
		    
	public function getJustificativa() {
		return $this->justificativa;
	}
	public function setEspecificacao($especificacao) {
		$this->especificacao = $especificacao;
	}
		    
	public function getEspecificacao() {
		return $this->especificacao;
	}
	public function setObrigatorio_especificar($obrigatorio_especificar) {
		$this->obrigatorio_especificar = $obrigatorio_especificar;
	}
		    
	public function getObrigatorio_especificar() {
		return $this->obrigatorio_especificar;
	}
	public function setObrigatorio_justificar($obrigatorio_justificar) {
		$this->obrigatorio_justificar = $obrigatorio_justificar;
	}
		    
	public function getObrigatorio_justificar() {
		return $this->obrigatorio_justificar;
	}
	public function __toString(){
	    return $this->id.' - '.$this->numero.' - '.$this->descricao.' - '.$this->justificativa.' - '.$this->especificacao.' - '.$this->obrigatorio_especificar.' - '.$this->obrigatorio_justificar;
	}
                

}
?>