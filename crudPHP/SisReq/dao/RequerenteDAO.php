<?php
            
/**
 * Classe feita para manipulação do objeto Requerente
 * feita automaticamente com programa gerador de software inventado por
 * @author Jefferson Uchôa Ponte
 */
     
namespace SisReq\dao;
use PDO;
use PDOException;
use SisReq\model\Requerente;

class RequerenteDAO extends DAO {
    
    

            
            
    public function update(Requerente $requerente)
    {
        $id = $requerente->getId();
            
            
        $sql = "UPDATE requerente
                SET
                nome = :nome,
                email = :email,
                telefone = :telefone,
                naturalidade = :naturalidade,
                data_de_nascimento = :data_de_nascimento,
                numero_de_matricula = :numero_de_matricula,
                filiacao = :filiacao
                WHERE requerente.id = :id;";
			$nome = $requerente->getNome();
			$email = $requerente->getEmail();
			$telefone = $requerente->getTelefone();
			$naturalidade = $requerente->getNaturalidade();
			$data_de_nascimento = $requerente->getData_de_nascimento();
			$numero_de_matricula = $requerente->getNumero_de_matricula();
			$filiacao = $requerente->getFiliacao();
            
        try {
            
            $stmt = $this->getConnection()->prepare($sql);
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);
			$stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->bindParam(":telefone", $telefone, PDO::PARAM_STR);
			$stmt->bindParam(":naturalidade", $naturalidade, PDO::PARAM_STR);
			$stmt->bindParam(":data_de_nascimento", $data_de_nascimento, PDO::PARAM_STR);
			$stmt->bindParam(":numero_de_matricula", $numero_de_matricula, PDO::PARAM_INT);
			$stmt->bindParam(":filiacao", $filiacao, PDO::PARAM_STR);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
            
    }
            
            

    public function insert(Requerente $requerente){
        $sql = "INSERT INTO requerente(nome, email, telefone, naturalidade, data_de_nascimento, numero_de_matricula, filiacao, id_curso_id) VALUES (:nome, :email, :telefone, :naturalidade, :data_de_nascimento, :numero_de_matricula, :filiacao, :curso_id);";
		$nome = $requerente->getNome();
		$email = $requerente->getEmail();
		$telefone = $requerente->getTelefone();
		$naturalidade = $requerente->getNaturalidade();
		$data_de_nascimento = $requerente->getData_de_nascimento();
		$numero_de_matricula = $requerente->getNumero_de_matricula();
		$filiacao = $requerente->getFiliacao();
		$curso_id = $requerente->getCurso_id()->getId();
		try {
			$db = $this->getConnection();
			$stmt = $db->prepare($sql);
			$stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->bindParam(":telefone", $telefone, PDO::PARAM_STR);
			$stmt->bindParam(":naturalidade", $naturalidade, PDO::PARAM_STR);
			$stmt->bindParam(":data_de_nascimento", $data_de_nascimento, PDO::PARAM_STR);
			$stmt->bindParam(":numero_de_matricula", $numero_de_matricula, PDO::PARAM_INT);
			$stmt->bindParam(":filiacao", $filiacao, PDO::PARAM_STR);
			$stmt->bindParam(":curso_id", $curso_id, PDO::PARAM_INT);
			return $stmt->execute();
		} catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
            
    }
    public function insertWithPK(Requerente $requerente){
        $sql = "INSERT INTO requerente(id, nome, email, telefone, naturalidade, data_de_nascimento, numero_de_matricula, filiacao, id_curso_id) VALUES (:id, :nome, :email, :telefone, :naturalidade, :data_de_nascimento, :numero_de_matricula, :filiacao, :curso_id);";
		$id = $requerente->getId();
		$nome = $requerente->getNome();
		$email = $requerente->getEmail();
		$telefone = $requerente->getTelefone();
		$naturalidade = $requerente->getNaturalidade();
		$data_de_nascimento = $requerente->getData_de_nascimento();
		$numero_de_matricula = $requerente->getNumero_de_matricula();
		$filiacao = $requerente->getFiliacao();
		$curso_id = $requerente->getCurso_id()->getId();
		try {
			$db = $this->getConnection();
			$stmt = $db->prepare($sql);
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);
			$stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->bindParam(":telefone", $telefone, PDO::PARAM_STR);
			$stmt->bindParam(":naturalidade", $naturalidade, PDO::PARAM_STR);
			$stmt->bindParam(":data_de_nascimento", $data_de_nascimento, PDO::PARAM_STR);
			$stmt->bindParam(":numero_de_matricula", $numero_de_matricula, PDO::PARAM_INT);
			$stmt->bindParam(":filiacao", $filiacao, PDO::PARAM_STR);
			$stmt->bindParam(":curso_id", $curso_id, PDO::PARAM_INT);
			return $stmt->execute();
		} catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
            
    }

	public function delete(Requerente $requerente){
		$id = $requerente->getId();
		$sql = "DELETE FROM requerente WHERE id = :id";
		    
		try {
			$db = $this->getConnection();
			$stmt = $db->prepare($sql);
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);
			return $stmt->execute();
			    
		} catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
	}


	public function fetch() {
		$list = array ();
		$sql = "SELECT requerente.id, requerente.nome, requerente.email, requerente.telefone, requerente.naturalidade, requerente.data_de_nascimento, requerente.numero_de_matricula, requerente.filiacao, curso_id.id as id_curso_curso_id, curso_id.nome as nome_curso_curso_id, curso_id.turno as turno_curso_curso_id, curso_id.período as período_curso_curso_id FROM requerente INNER JOIN curso as curso_id ON curso_id.id = requerente.id_curso_id LIMIT 1000";

        try {
            $stmt = $this->connection->prepare($sql);
            
		    if(!$stmt){   
                echo "<br>Mensagem de erro retornada: ".$this->connection->errorInfo()[2]."<br>";
		        return $list;
		    }
            $stmt->execute();
		    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    foreach ( $result as $row) 
            {
		        $requerente = new Requerente();
                $requerente->setId( $row ['id'] );
                $requerente->setNome( $row ['nome'] );
                $requerente->setEmail( $row ['email'] );
                $requerente->setTelefone( $row ['telefone'] );
                $requerente->setNaturalidade( $row ['naturalidade'] );
                $requerente->setData_de_nascimento( $row ['data_de_nascimento'] );
                $requerente->setNumero_de_matricula( $row ['numero_de_matricula'] );
                $requerente->setFiliacao( $row ['filiacao'] );
                $requerente->getCurso_id()->setId( $row ['id_curso_curso_id'] );
                $requerente->getCurso_id()->setNome( $row ['nome_curso_curso_id'] );
                $requerente->getCurso_id()->setTurno( $row ['turno_curso_curso_id'] );
                $requerente->getCurso_id()->setPeríodo( $row ['período_curso_curso_id'] );
                $list [] = $requerente;

	
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
        return $list;	
    }
        
                
    public function fetchById(Requerente $requerente) {
        $lista = array();
	    $id = $requerente->getId();
                
        $sql = "SELECT requerente.id, requerente.nome, requerente.email, requerente.telefone, requerente.naturalidade, requerente.data_de_nascimento, requerente.numero_de_matricula, requerente.filiacao, curso_id.id as id_curso_curso_id, curso_id.nome as nome_curso_curso_id, curso_id.turno as turno_curso_curso_id, curso_id.período as período_curso_curso_id FROM requerente INNER JOIN curso as curso_id ON curso_id.id = requerente.id_curso_id
            WHERE requerente.id = :id";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ( $result as $row ){
		        $requerente = new Requerente();
                $requerente->setId( $row ['id'] );
                $requerente->setNome( $row ['nome'] );
                $requerente->setEmail( $row ['email'] );
                $requerente->setTelefone( $row ['telefone'] );
                $requerente->setNaturalidade( $row ['naturalidade'] );
                $requerente->setData_de_nascimento( $row ['data_de_nascimento'] );
                $requerente->setNumero_de_matricula( $row ['numero_de_matricula'] );
                $requerente->setFiliacao( $row ['filiacao'] );
                $requerente->getCurso_id()->setId( $row ['id_curso_curso_id'] );
                $requerente->getCurso_id()->setNome( $row ['nome_curso_curso_id'] );
                $requerente->getCurso_id()->setTurno( $row ['turno_curso_curso_id'] );
                $requerente->getCurso_id()->setPeríodo( $row ['período_curso_curso_id'] );
                $lista [] = $requerente;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fetchByNome(Requerente $requerente) {
        $lista = array();
	    $nome = $requerente->getNome();
                
        $sql = "SELECT requerente.id, requerente.nome, requerente.email, requerente.telefone, requerente.naturalidade, requerente.data_de_nascimento, requerente.numero_de_matricula, requerente.filiacao, curso_id.id as id_curso_curso_id, curso_id.nome as nome_curso_curso_id, curso_id.turno as turno_curso_curso_id, curso_id.período as período_curso_curso_id FROM requerente INNER JOIN curso as curso_id ON curso_id.id = requerente.id_curso_id
            WHERE requerente.nome like :nome";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ( $result as $row ){
		        $requerente = new Requerente();
                $requerente->setId( $row ['id'] );
                $requerente->setNome( $row ['nome'] );
                $requerente->setEmail( $row ['email'] );
                $requerente->setTelefone( $row ['telefone'] );
                $requerente->setNaturalidade( $row ['naturalidade'] );
                $requerente->setData_de_nascimento( $row ['data_de_nascimento'] );
                $requerente->setNumero_de_matricula( $row ['numero_de_matricula'] );
                $requerente->setFiliacao( $row ['filiacao'] );
                $requerente->getCurso_id()->setId( $row ['id_curso_curso_id'] );
                $requerente->getCurso_id()->setNome( $row ['nome_curso_curso_id'] );
                $requerente->getCurso_id()->setTurno( $row ['turno_curso_curso_id'] );
                $requerente->getCurso_id()->setPeríodo( $row ['período_curso_curso_id'] );
                $lista [] = $requerente;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fetchByEmail(Requerente $requerente) {
        $lista = array();
	    $email = $requerente->getEmail();
                
        $sql = "SELECT requerente.id, requerente.nome, requerente.email, requerente.telefone, requerente.naturalidade, requerente.data_de_nascimento, requerente.numero_de_matricula, requerente.filiacao, curso_id.id as id_curso_curso_id, curso_id.nome as nome_curso_curso_id, curso_id.turno as turno_curso_curso_id, curso_id.período as período_curso_curso_id FROM requerente INNER JOIN curso as curso_id ON curso_id.id = requerente.id_curso_id
            WHERE requerente.email like :email";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ( $result as $row ){
		        $requerente = new Requerente();
                $requerente->setId( $row ['id'] );
                $requerente->setNome( $row ['nome'] );
                $requerente->setEmail( $row ['email'] );
                $requerente->setTelefone( $row ['telefone'] );
                $requerente->setNaturalidade( $row ['naturalidade'] );
                $requerente->setData_de_nascimento( $row ['data_de_nascimento'] );
                $requerente->setNumero_de_matricula( $row ['numero_de_matricula'] );
                $requerente->setFiliacao( $row ['filiacao'] );
                $requerente->getCurso_id()->setId( $row ['id_curso_curso_id'] );
                $requerente->getCurso_id()->setNome( $row ['nome_curso_curso_id'] );
                $requerente->getCurso_id()->setTurno( $row ['turno_curso_curso_id'] );
                $requerente->getCurso_id()->setPeríodo( $row ['período_curso_curso_id'] );
                $lista [] = $requerente;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fetchByTelefone(Requerente $requerente) {
        $lista = array();
	    $telefone = $requerente->getTelefone();
                
        $sql = "SELECT requerente.id, requerente.nome, requerente.email, requerente.telefone, requerente.naturalidade, requerente.data_de_nascimento, requerente.numero_de_matricula, requerente.filiacao, curso_id.id as id_curso_curso_id, curso_id.nome as nome_curso_curso_id, curso_id.turno as turno_curso_curso_id, curso_id.período as período_curso_curso_id FROM requerente INNER JOIN curso as curso_id ON curso_id.id = requerente.id_curso_id
            WHERE requerente.telefone like :telefone";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":telefone", $telefone, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ( $result as $row ){
		        $requerente = new Requerente();
                $requerente->setId( $row ['id'] );
                $requerente->setNome( $row ['nome'] );
                $requerente->setEmail( $row ['email'] );
                $requerente->setTelefone( $row ['telefone'] );
                $requerente->setNaturalidade( $row ['naturalidade'] );
                $requerente->setData_de_nascimento( $row ['data_de_nascimento'] );
                $requerente->setNumero_de_matricula( $row ['numero_de_matricula'] );
                $requerente->setFiliacao( $row ['filiacao'] );
                $requerente->getCurso_id()->setId( $row ['id_curso_curso_id'] );
                $requerente->getCurso_id()->setNome( $row ['nome_curso_curso_id'] );
                $requerente->getCurso_id()->setTurno( $row ['turno_curso_curso_id'] );
                $requerente->getCurso_id()->setPeríodo( $row ['período_curso_curso_id'] );
                $lista [] = $requerente;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fetchByNaturalidade(Requerente $requerente) {
        $lista = array();
	    $naturalidade = $requerente->getNaturalidade();
                
        $sql = "SELECT requerente.id, requerente.nome, requerente.email, requerente.telefone, requerente.naturalidade, requerente.data_de_nascimento, requerente.numero_de_matricula, requerente.filiacao, curso_id.id as id_curso_curso_id, curso_id.nome as nome_curso_curso_id, curso_id.turno as turno_curso_curso_id, curso_id.período as período_curso_curso_id FROM requerente INNER JOIN curso as curso_id ON curso_id.id = requerente.id_curso_id
            WHERE requerente.naturalidade like :naturalidade";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":naturalidade", $naturalidade, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ( $result as $row ){
		        $requerente = new Requerente();
                $requerente->setId( $row ['id'] );
                $requerente->setNome( $row ['nome'] );
                $requerente->setEmail( $row ['email'] );
                $requerente->setTelefone( $row ['telefone'] );
                $requerente->setNaturalidade( $row ['naturalidade'] );
                $requerente->setData_de_nascimento( $row ['data_de_nascimento'] );
                $requerente->setNumero_de_matricula( $row ['numero_de_matricula'] );
                $requerente->setFiliacao( $row ['filiacao'] );
                $requerente->getCurso_id()->setId( $row ['id_curso_curso_id'] );
                $requerente->getCurso_id()->setNome( $row ['nome_curso_curso_id'] );
                $requerente->getCurso_id()->setTurno( $row ['turno_curso_curso_id'] );
                $requerente->getCurso_id()->setPeríodo( $row ['período_curso_curso_id'] );
                $lista [] = $requerente;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fetchByData_de_nascimento(Requerente $requerente) {
        $lista = array();
	    $data_de_nascimento = $requerente->getData_de_nascimento();
                
        $sql = "SELECT requerente.id, requerente.nome, requerente.email, requerente.telefone, requerente.naturalidade, requerente.data_de_nascimento, requerente.numero_de_matricula, requerente.filiacao, curso_id.id as id_curso_curso_id, curso_id.nome as nome_curso_curso_id, curso_id.turno as turno_curso_curso_id, curso_id.período as período_curso_curso_id FROM requerente INNER JOIN curso as curso_id ON curso_id.id = requerente.id_curso_id
            WHERE requerente.data_de_nascimento like :data_de_nascimento";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":data_de_nascimento", $data_de_nascimento, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ( $result as $row ){
		        $requerente = new Requerente();
                $requerente->setId( $row ['id'] );
                $requerente->setNome( $row ['nome'] );
                $requerente->setEmail( $row ['email'] );
                $requerente->setTelefone( $row ['telefone'] );
                $requerente->setNaturalidade( $row ['naturalidade'] );
                $requerente->setData_de_nascimento( $row ['data_de_nascimento'] );
                $requerente->setNumero_de_matricula( $row ['numero_de_matricula'] );
                $requerente->setFiliacao( $row ['filiacao'] );
                $requerente->getCurso_id()->setId( $row ['id_curso_curso_id'] );
                $requerente->getCurso_id()->setNome( $row ['nome_curso_curso_id'] );
                $requerente->getCurso_id()->setTurno( $row ['turno_curso_curso_id'] );
                $requerente->getCurso_id()->setPeríodo( $row ['período_curso_curso_id'] );
                $lista [] = $requerente;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fetchByNumero_de_matricula(Requerente $requerente) {
        $lista = array();
	    $numero_de_matricula = $requerente->getNumero_de_matricula();
                
        $sql = "SELECT requerente.id, requerente.nome, requerente.email, requerente.telefone, requerente.naturalidade, requerente.data_de_nascimento, requerente.numero_de_matricula, requerente.filiacao, curso_id.id as id_curso_curso_id, curso_id.nome as nome_curso_curso_id, curso_id.turno as turno_curso_curso_id, curso_id.período as período_curso_curso_id FROM requerente INNER JOIN curso as curso_id ON curso_id.id = requerente.id_curso_id
            WHERE requerente.numero_de_matricula = :numero_de_matricula";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":numero_de_matricula", $numero_de_matricula, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ( $result as $row ){
		        $requerente = new Requerente();
                $requerente->setId( $row ['id'] );
                $requerente->setNome( $row ['nome'] );
                $requerente->setEmail( $row ['email'] );
                $requerente->setTelefone( $row ['telefone'] );
                $requerente->setNaturalidade( $row ['naturalidade'] );
                $requerente->setData_de_nascimento( $row ['data_de_nascimento'] );
                $requerente->setNumero_de_matricula( $row ['numero_de_matricula'] );
                $requerente->setFiliacao( $row ['filiacao'] );
                $requerente->getCurso_id()->setId( $row ['id_curso_curso_id'] );
                $requerente->getCurso_id()->setNome( $row ['nome_curso_curso_id'] );
                $requerente->getCurso_id()->setTurno( $row ['turno_curso_curso_id'] );
                $requerente->getCurso_id()->setPeríodo( $row ['período_curso_curso_id'] );
                $lista [] = $requerente;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fetchByFiliacao(Requerente $requerente) {
        $lista = array();
	    $filiacao = $requerente->getFiliacao();
                
        $sql = "SELECT requerente.id, requerente.nome, requerente.email, requerente.telefone, requerente.naturalidade, requerente.data_de_nascimento, requerente.numero_de_matricula, requerente.filiacao, curso_id.id as id_curso_curso_id, curso_id.nome as nome_curso_curso_id, curso_id.turno as turno_curso_curso_id, curso_id.período as período_curso_curso_id FROM requerente INNER JOIN curso as curso_id ON curso_id.id = requerente.id_curso_id
            WHERE requerente.filiacao like :filiacao";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":filiacao", $filiacao, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ( $result as $row ){
		        $requerente = new Requerente();
                $requerente->setId( $row ['id'] );
                $requerente->setNome( $row ['nome'] );
                $requerente->setEmail( $row ['email'] );
                $requerente->setTelefone( $row ['telefone'] );
                $requerente->setNaturalidade( $row ['naturalidade'] );
                $requerente->setData_de_nascimento( $row ['data_de_nascimento'] );
                $requerente->setNumero_de_matricula( $row ['numero_de_matricula'] );
                $requerente->setFiliacao( $row ['filiacao'] );
                $requerente->getCurso_id()->setId( $row ['id_curso_curso_id'] );
                $requerente->getCurso_id()->setNome( $row ['nome_curso_curso_id'] );
                $requerente->getCurso_id()->setTurno( $row ['turno_curso_curso_id'] );
                $requerente->getCurso_id()->setPeríodo( $row ['período_curso_curso_id'] );
                $lista [] = $requerente;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fetchByCurso_id(Requerente $requerente) {
        $lista = array();
	    $curso_id = $requerente->getCurso_id()->getId();
                
        $sql = "SELECT requerente.id, requerente.nome, requerente.email, requerente.telefone, requerente.naturalidade, requerente.data_de_nascimento, requerente.numero_de_matricula, requerente.filiacao, curso_id.id as id_curso_curso_id, curso_id.nome as nome_curso_curso_id, curso_id.turno as turno_curso_curso_id, curso_id.período as período_curso_curso_id FROM requerente INNER JOIN curso as curso_id ON curso_id.id = requerente.id_curso_id
            WHERE requerente.id_curso_id = :curso_id";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":curso_id", $curso_id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ( $result as $row ){
		        $requerente = new Requerente();
                $requerente->setId( $row ['id'] );
                $requerente->setNome( $row ['nome'] );
                $requerente->setEmail( $row ['email'] );
                $requerente->setTelefone( $row ['telefone'] );
                $requerente->setNaturalidade( $row ['naturalidade'] );
                $requerente->setData_de_nascimento( $row ['data_de_nascimento'] );
                $requerente->setNumero_de_matricula( $row ['numero_de_matricula'] );
                $requerente->setFiliacao( $row ['filiacao'] );
                $requerente->getCurso_id()->setId( $row ['id_curso_curso_id'] );
                $requerente->getCurso_id()->setNome( $row ['nome_curso_curso_id'] );
                $requerente->getCurso_id()->setTurno( $row ['turno_curso_curso_id'] );
                $requerente->getCurso_id()->setPeríodo( $row ['período_curso_curso_id'] );
                $lista [] = $requerente;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fillById(Requerente $requerente) {
        
	    $id = $requerente->getId();
	    $sql = "SELECT requerente.id, requerente.nome, requerente.email, requerente.telefone, requerente.naturalidade, requerente.data_de_nascimento, requerente.numero_de_matricula, requerente.filiacao, curso_id.id as id_curso_curso_id, curso_id.nome as nome_curso_curso_id, curso_id.turno as turno_curso_curso_id, curso_id.período as período_curso_curso_id FROM requerente INNER JOIN curso as curso_id ON curso_id.id = requerente.id_curso_id
                WHERE requerente.id = :id
                 LIMIT 1000";
                
        try {
            $stmt = $this->connection->prepare($sql);
                
		    if(!$stmt){
                echo "<br>Mensagem de erro retornada: ".$this->connection->errorInfo()[2]."<br>";
		    }
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
		    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    foreach ( $result as $row )
            {
                $requerente->setId( $row ['id'] );
                $requerente->setNome( $row ['nome'] );
                $requerente->setEmail( $row ['email'] );
                $requerente->setTelefone( $row ['telefone'] );
                $requerente->setNaturalidade( $row ['naturalidade'] );
                $requerente->setData_de_nascimento( $row ['data_de_nascimento'] );
                $requerente->setNumero_de_matricula( $row ['numero_de_matricula'] );
                $requerente->setFiliacao( $row ['filiacao'] );
                $requerente->getCurso_id()->setId( $row ['id_curso_curso_id'] );
                $requerente->getCurso_id()->setNome( $row ['nome_curso_curso_id'] );
                $requerente->getCurso_id()->setTurno( $row ['turno_curso_curso_id'] );
                $requerente->getCurso_id()->setPeríodo( $row ['período_curso_curso_id'] );
                
                
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
		return $requerente;
    }
                
    public function fillByNome(Requerente $requerente) {
        
	    $nome = $requerente->getNome();
	    $sql = "SELECT requerente.id, requerente.nome, requerente.email, requerente.telefone, requerente.naturalidade, requerente.data_de_nascimento, requerente.numero_de_matricula, requerente.filiacao, curso_id.id as id_curso_curso_id, curso_id.nome as nome_curso_curso_id, curso_id.turno as turno_curso_curso_id, curso_id.período as período_curso_curso_id FROM requerente INNER JOIN curso as curso_id ON curso_id.id = requerente.id_curso_id
                WHERE requerente.nome = :nome
                 LIMIT 1000";
                
        try {
            $stmt = $this->connection->prepare($sql);
                
		    if(!$stmt){
                echo "<br>Mensagem de erro retornada: ".$this->connection->errorInfo()[2]."<br>";
		    }
            $stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
            $stmt->execute();
		    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    foreach ( $result as $row )
            {
                $requerente->setId( $row ['id'] );
                $requerente->setNome( $row ['nome'] );
                $requerente->setEmail( $row ['email'] );
                $requerente->setTelefone( $row ['telefone'] );
                $requerente->setNaturalidade( $row ['naturalidade'] );
                $requerente->setData_de_nascimento( $row ['data_de_nascimento'] );
                $requerente->setNumero_de_matricula( $row ['numero_de_matricula'] );
                $requerente->setFiliacao( $row ['filiacao'] );
                $requerente->getCurso_id()->setId( $row ['id_curso_curso_id'] );
                $requerente->getCurso_id()->setNome( $row ['nome_curso_curso_id'] );
                $requerente->getCurso_id()->setTurno( $row ['turno_curso_curso_id'] );
                $requerente->getCurso_id()->setPeríodo( $row ['período_curso_curso_id'] );
                
                
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
		return $requerente;
    }
                
    public function fillByEmail(Requerente $requerente) {
        
	    $email = $requerente->getEmail();
	    $sql = "SELECT requerente.id, requerente.nome, requerente.email, requerente.telefone, requerente.naturalidade, requerente.data_de_nascimento, requerente.numero_de_matricula, requerente.filiacao, curso_id.id as id_curso_curso_id, curso_id.nome as nome_curso_curso_id, curso_id.turno as turno_curso_curso_id, curso_id.período as período_curso_curso_id FROM requerente INNER JOIN curso as curso_id ON curso_id.id = requerente.id_curso_id
                WHERE requerente.email = :email
                 LIMIT 1000";
                
        try {
            $stmt = $this->connection->prepare($sql);
                
		    if(!$stmt){
                echo "<br>Mensagem de erro retornada: ".$this->connection->errorInfo()[2]."<br>";
		    }
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->execute();
		    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    foreach ( $result as $row )
            {
                $requerente->setId( $row ['id'] );
                $requerente->setNome( $row ['nome'] );
                $requerente->setEmail( $row ['email'] );
                $requerente->setTelefone( $row ['telefone'] );
                $requerente->setNaturalidade( $row ['naturalidade'] );
                $requerente->setData_de_nascimento( $row ['data_de_nascimento'] );
                $requerente->setNumero_de_matricula( $row ['numero_de_matricula'] );
                $requerente->setFiliacao( $row ['filiacao'] );
                $requerente->getCurso_id()->setId( $row ['id_curso_curso_id'] );
                $requerente->getCurso_id()->setNome( $row ['nome_curso_curso_id'] );
                $requerente->getCurso_id()->setTurno( $row ['turno_curso_curso_id'] );
                $requerente->getCurso_id()->setPeríodo( $row ['período_curso_curso_id'] );
                
                
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
		return $requerente;
    }
                
    public function fillByTelefone(Requerente $requerente) {
        
	    $telefone = $requerente->getTelefone();
	    $sql = "SELECT requerente.id, requerente.nome, requerente.email, requerente.telefone, requerente.naturalidade, requerente.data_de_nascimento, requerente.numero_de_matricula, requerente.filiacao, curso_id.id as id_curso_curso_id, curso_id.nome as nome_curso_curso_id, curso_id.turno as turno_curso_curso_id, curso_id.período as período_curso_curso_id FROM requerente INNER JOIN curso as curso_id ON curso_id.id = requerente.id_curso_id
                WHERE requerente.telefone = :telefone
                 LIMIT 1000";
                
        try {
            $stmt = $this->connection->prepare($sql);
                
		    if(!$stmt){
                echo "<br>Mensagem de erro retornada: ".$this->connection->errorInfo()[2]."<br>";
		    }
            $stmt->bindParam(":telefone", $telefone, PDO::PARAM_STR);
            $stmt->execute();
		    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    foreach ( $result as $row )
            {
                $requerente->setId( $row ['id'] );
                $requerente->setNome( $row ['nome'] );
                $requerente->setEmail( $row ['email'] );
                $requerente->setTelefone( $row ['telefone'] );
                $requerente->setNaturalidade( $row ['naturalidade'] );
                $requerente->setData_de_nascimento( $row ['data_de_nascimento'] );
                $requerente->setNumero_de_matricula( $row ['numero_de_matricula'] );
                $requerente->setFiliacao( $row ['filiacao'] );
                $requerente->getCurso_id()->setId( $row ['id_curso_curso_id'] );
                $requerente->getCurso_id()->setNome( $row ['nome_curso_curso_id'] );
                $requerente->getCurso_id()->setTurno( $row ['turno_curso_curso_id'] );
                $requerente->getCurso_id()->setPeríodo( $row ['período_curso_curso_id'] );
                
                
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
		return $requerente;
    }
                
    public function fillByNaturalidade(Requerente $requerente) {
        
	    $naturalidade = $requerente->getNaturalidade();
	    $sql = "SELECT requerente.id, requerente.nome, requerente.email, requerente.telefone, requerente.naturalidade, requerente.data_de_nascimento, requerente.numero_de_matricula, requerente.filiacao, curso_id.id as id_curso_curso_id, curso_id.nome as nome_curso_curso_id, curso_id.turno as turno_curso_curso_id, curso_id.período as período_curso_curso_id FROM requerente INNER JOIN curso as curso_id ON curso_id.id = requerente.id_curso_id
                WHERE requerente.naturalidade = :naturalidade
                 LIMIT 1000";
                
        try {
            $stmt = $this->connection->prepare($sql);
                
		    if(!$stmt){
                echo "<br>Mensagem de erro retornada: ".$this->connection->errorInfo()[2]."<br>";
		    }
            $stmt->bindParam(":naturalidade", $naturalidade, PDO::PARAM_STR);
            $stmt->execute();
		    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    foreach ( $result as $row )
            {
                $requerente->setId( $row ['id'] );
                $requerente->setNome( $row ['nome'] );
                $requerente->setEmail( $row ['email'] );
                $requerente->setTelefone( $row ['telefone'] );
                $requerente->setNaturalidade( $row ['naturalidade'] );
                $requerente->setData_de_nascimento( $row ['data_de_nascimento'] );
                $requerente->setNumero_de_matricula( $row ['numero_de_matricula'] );
                $requerente->setFiliacao( $row ['filiacao'] );
                $requerente->getCurso_id()->setId( $row ['id_curso_curso_id'] );
                $requerente->getCurso_id()->setNome( $row ['nome_curso_curso_id'] );
                $requerente->getCurso_id()->setTurno( $row ['turno_curso_curso_id'] );
                $requerente->getCurso_id()->setPeríodo( $row ['período_curso_curso_id'] );
                
                
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
		return $requerente;
    }
                
    public function fillByData_de_nascimento(Requerente $requerente) {
        
	    $data_de_nascimento = $requerente->getData_de_nascimento();
	    $sql = "SELECT requerente.id, requerente.nome, requerente.email, requerente.telefone, requerente.naturalidade, requerente.data_de_nascimento, requerente.numero_de_matricula, requerente.filiacao, curso_id.id as id_curso_curso_id, curso_id.nome as nome_curso_curso_id, curso_id.turno as turno_curso_curso_id, curso_id.período as período_curso_curso_id FROM requerente INNER JOIN curso as curso_id ON curso_id.id = requerente.id_curso_id
                WHERE requerente.data_de_nascimento = :data_de_nascimento
                 LIMIT 1000";
                
        try {
            $stmt = $this->connection->prepare($sql);
                
		    if(!$stmt){
                echo "<br>Mensagem de erro retornada: ".$this->connection->errorInfo()[2]."<br>";
		    }
            $stmt->bindParam(":data_de_nascimento", $data_de_nascimento, PDO::PARAM_STR);
            $stmt->execute();
		    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    foreach ( $result as $row )
            {
                $requerente->setId( $row ['id'] );
                $requerente->setNome( $row ['nome'] );
                $requerente->setEmail( $row ['email'] );
                $requerente->setTelefone( $row ['telefone'] );
                $requerente->setNaturalidade( $row ['naturalidade'] );
                $requerente->setData_de_nascimento( $row ['data_de_nascimento'] );
                $requerente->setNumero_de_matricula( $row ['numero_de_matricula'] );
                $requerente->setFiliacao( $row ['filiacao'] );
                $requerente->getCurso_id()->setId( $row ['id_curso_curso_id'] );
                $requerente->getCurso_id()->setNome( $row ['nome_curso_curso_id'] );
                $requerente->getCurso_id()->setTurno( $row ['turno_curso_curso_id'] );
                $requerente->getCurso_id()->setPeríodo( $row ['período_curso_curso_id'] );
                
                
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
		return $requerente;
    }
                
    public function fillByNumero_de_matricula(Requerente $requerente) {
        
	    $numero_de_matricula = $requerente->getNumero_de_matricula();
	    $sql = "SELECT requerente.id, requerente.nome, requerente.email, requerente.telefone, requerente.naturalidade, requerente.data_de_nascimento, requerente.numero_de_matricula, requerente.filiacao, curso_id.id as id_curso_curso_id, curso_id.nome as nome_curso_curso_id, curso_id.turno as turno_curso_curso_id, curso_id.período as período_curso_curso_id FROM requerente INNER JOIN curso as curso_id ON curso_id.id = requerente.id_curso_id
                WHERE requerente.numero_de_matricula = :numero_de_matricula
                 LIMIT 1000";
                
        try {
            $stmt = $this->connection->prepare($sql);
                
		    if(!$stmt){
                echo "<br>Mensagem de erro retornada: ".$this->connection->errorInfo()[2]."<br>";
		    }
            $stmt->bindParam(":numero_de_matricula", $numero_de_matricula, PDO::PARAM_INT);
            $stmt->execute();
		    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    foreach ( $result as $row )
            {
                $requerente->setId( $row ['id'] );
                $requerente->setNome( $row ['nome'] );
                $requerente->setEmail( $row ['email'] );
                $requerente->setTelefone( $row ['telefone'] );
                $requerente->setNaturalidade( $row ['naturalidade'] );
                $requerente->setData_de_nascimento( $row ['data_de_nascimento'] );
                $requerente->setNumero_de_matricula( $row ['numero_de_matricula'] );
                $requerente->setFiliacao( $row ['filiacao'] );
                $requerente->getCurso_id()->setId( $row ['id_curso_curso_id'] );
                $requerente->getCurso_id()->setNome( $row ['nome_curso_curso_id'] );
                $requerente->getCurso_id()->setTurno( $row ['turno_curso_curso_id'] );
                $requerente->getCurso_id()->setPeríodo( $row ['período_curso_curso_id'] );
                
                
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
		return $requerente;
    }
                
    public function fillByFiliacao(Requerente $requerente) {
        
	    $filiacao = $requerente->getFiliacao();
	    $sql = "SELECT requerente.id, requerente.nome, requerente.email, requerente.telefone, requerente.naturalidade, requerente.data_de_nascimento, requerente.numero_de_matricula, requerente.filiacao, curso_id.id as id_curso_curso_id, curso_id.nome as nome_curso_curso_id, curso_id.turno as turno_curso_curso_id, curso_id.período as período_curso_curso_id FROM requerente INNER JOIN curso as curso_id ON curso_id.id = requerente.id_curso_id
                WHERE requerente.filiacao = :filiacao
                 LIMIT 1000";
                
        try {
            $stmt = $this->connection->prepare($sql);
                
		    if(!$stmt){
                echo "<br>Mensagem de erro retornada: ".$this->connection->errorInfo()[2]."<br>";
		    }
            $stmt->bindParam(":filiacao", $filiacao, PDO::PARAM_STR);
            $stmt->execute();
		    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    foreach ( $result as $row )
            {
                $requerente->setId( $row ['id'] );
                $requerente->setNome( $row ['nome'] );
                $requerente->setEmail( $row ['email'] );
                $requerente->setTelefone( $row ['telefone'] );
                $requerente->setNaturalidade( $row ['naturalidade'] );
                $requerente->setData_de_nascimento( $row ['data_de_nascimento'] );
                $requerente->setNumero_de_matricula( $row ['numero_de_matricula'] );
                $requerente->setFiliacao( $row ['filiacao'] );
                $requerente->getCurso_id()->setId( $row ['id_curso_curso_id'] );
                $requerente->getCurso_id()->setNome( $row ['nome_curso_curso_id'] );
                $requerente->getCurso_id()->setTurno( $row ['turno_curso_curso_id'] );
                $requerente->getCurso_id()->setPeríodo( $row ['período_curso_curso_id'] );
                
                
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
		return $requerente;
    }
}