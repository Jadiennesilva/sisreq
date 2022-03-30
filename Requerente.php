<?php
            
/**
 * Classe feita para manipulação do objeto Requerente
 * feita automaticamente com programa gerador de software inventado por
 * @author Jefferson Uchôa Ponte <j.pontee@gmail.com>
 */

namespace SisReq\model;

class Requerente {
	private $id;
	private $nome;
	private $email;
	private $telefone;
	private $naturalidade;
	private $data_de_nascimento;
	private $numero_de_matricula;
	private $filiacao;
	private $curso_id;
    public function __construct(){

        $this->curso_id = new Curso();
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
	public function setEmail($email) {
		$this->email = $email;
	}
		    
	public function getEmail() {
		return $this->email;
	}
	public function setTelefone($telefone) {
		$this->telefone = $telefone;
	}
		    
	public function getTelefone() {
		return $this->telefone;
	}
	public function setNaturalidade($naturalidade) {
		$this->naturalidade = $naturalidade;
	}
		    
	public function getNaturalidade() {
		return $this->naturalidade;
	}
	public function setData_de_nascimento($data_de_nascimento) {
		$this->data_de_nascimento = $data_de_nascimento;
	}
		    
	public function getData_de_nascimento() {
		return $this->data_de_nascimento;
	}
	public function setNumero_de_matricula($numero_de_matricula) {
		$this->numero_de_matricula = $numero_de_matricula;
	}
		    
	public function getNumero_de_matricula() {
		return $this->numero_de_matricula;
	}
	public function setFiliacao($filiacao) {
		$this->filiacao = $filiacao;
	}
		    
	public function getFiliacao() {
		return $this->filiacao;
	}
	public function setCurso_id(Curso $curso) {
		$this->curso_id = $curso;
	}
		    
	public function getCurso_id() {
		return $this->curso_id;
	}
	public function __toString(){
	    return $this->id.' - '.$this->nome.' - '.$this->email.' - '.$this->telefone.' - '.$this->naturalidade.' - '.$this->data_de_nascimento.' - '.$this->numero_de_matricula.' - '.$this->filiacao.' - '.$this->curso_id;
	}
                

}
?>