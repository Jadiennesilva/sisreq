<?php
            
/**
 * Classe feita para manipulação do objeto Servico
 * feita automaticamente com programa gerador de software inventado por
 * @author Jefferson Uchôa Ponte
 */
     
namespace SisReq\dao;
use PDO;
use PDOException;
use SisReq\model\Servico;

class ServicoDAO extends DAO {
    
    

            
            
    public function update(Servico $servico)
    {
        $id = $servico->getId();
            
            
        $sql = "UPDATE servico
                SET
                numero = :numero,
                descricao = :descricao,
                justificativa = :justificativa,
                especificacao = :especificacao,
                obrigatorio_especificar = :obrigatorio_especificar,
                obrigatorio_justificar = :obrigatorio_justificar
                WHERE servico.id = :id;";
			$numero = $servico->getNumero();
			$descricao = $servico->getDescricao();
			$justificativa = $servico->getJustificativa();
			$especificacao = $servico->getEspecificacao();
			$obrigatorio_especificar = $servico->getObrigatorio_especificar();
			$obrigatorio_justificar = $servico->getObrigatorio_justificar();
            
        try {
            
            $stmt = $this->getConnection()->prepare($sql);
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);
			$stmt->bindParam(":numero", $numero, PDO::PARAM_INT);
			$stmt->bindParam(":descricao", $descricao, PDO::PARAM_STR);
			$stmt->bindParam(":justificativa", $justificativa, PDO::PARAM_STR);
			$stmt->bindParam(":especificacao", $especificacao, PDO::PARAM_STR);
			$stmt->bindParam(":obrigatorio_especificar", $obrigatorio_especificar, PDO::PARAM_STR);
			$stmt->bindParam(":obrigatorio_justificar", $obrigatorio_justificar, PDO::PARAM_STR);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
            
    }
            
            

    public function insert(Servico $servico){
        $sql = "INSERT INTO servico(numero, descricao, justificativa, especificacao, obrigatorio_especificar, obrigatorio_justificar, id_setor_id) VALUES (:numero, :descricao, :justificativa, :especificacao, :obrigatorio_especificar, :obrigatorio_justificar, :setor_id);";
		$numero = $servico->getNumero();
		$descricao = $servico->getDescricao();
		$justificativa = $servico->getJustificativa();
		$especificacao = $servico->getEspecificacao();
		$obrigatorio_especificar = $servico->getObrigatorio_especificar();
		$obrigatorio_justificar = $servico->getObrigatorio_justificar();
		$setor_id = $servico->getSetor_id()->getId();
		try {
			$db = $this->getConnection();
			$stmt = $db->prepare($sql);
			$stmt->bindParam(":numero", $numero, PDO::PARAM_INT);
			$stmt->bindParam(":descricao", $descricao, PDO::PARAM_STR);
			$stmt->bindParam(":justificativa", $justificativa, PDO::PARAM_STR);
			$stmt->bindParam(":especificacao", $especificacao, PDO::PARAM_STR);
			$stmt->bindParam(":obrigatorio_especificar", $obrigatorio_especificar, PDO::PARAM_STR);
			$stmt->bindParam(":obrigatorio_justificar", $obrigatorio_justificar, PDO::PARAM_STR);
			$stmt->bindParam(":setor_id", $setor_id, PDO::PARAM_INT);
			return $stmt->execute();
		} catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
            
    }
    public function insertWithPK(Servico $servico){
        $sql = "INSERT INTO servico(id, numero, descricao, justificativa, especificacao, obrigatorio_especificar, obrigatorio_justificar, id_setor_id) VALUES (:id, :numero, :descricao, :justificativa, :especificacao, :obrigatorio_especificar, :obrigatorio_justificar, :setor_id);";
		$id = $servico->getId();
		$numero = $servico->getNumero();
		$descricao = $servico->getDescricao();
		$justificativa = $servico->getJustificativa();
		$especificacao = $servico->getEspecificacao();
		$obrigatorio_especificar = $servico->getObrigatorio_especificar();
		$obrigatorio_justificar = $servico->getObrigatorio_justificar();
		$setor_id = $servico->getSetor_id()->getId();
		try {
			$db = $this->getConnection();
			$stmt = $db->prepare($sql);
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);
			$stmt->bindParam(":numero", $numero, PDO::PARAM_INT);
			$stmt->bindParam(":descricao", $descricao, PDO::PARAM_STR);
			$stmt->bindParam(":justificativa", $justificativa, PDO::PARAM_STR);
			$stmt->bindParam(":especificacao", $especificacao, PDO::PARAM_STR);
			$stmt->bindParam(":obrigatorio_especificar", $obrigatorio_especificar, PDO::PARAM_STR);
			$stmt->bindParam(":obrigatorio_justificar", $obrigatorio_justificar, PDO::PARAM_STR);
			$stmt->bindParam(":setor_id", $setor_id, PDO::PARAM_INT);
			return $stmt->execute();
		} catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
            
    }

	public function delete(Servico $servico){
		$id = $servico->getId();
		$sql = "DELETE FROM servico WHERE id = :id";
		    
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
		$sql = "SELECT servico.id, servico.numero, servico.descricao, servico.justificativa, servico.especificacao, servico.obrigatorio_especificar, servico.obrigatorio_justificar, setor_id.id as id_setor_setor_id, setor_id.nome as nome_setor_setor_id, setor_id.email as email_setor_setor_id FROM servico INNER JOIN setor as setor_id ON setor_id.id = servico.id_setor_id LIMIT 1000";

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
		        $servico = new Servico();
                $servico->setId( $row ['id'] );
                $servico->setNumero( $row ['numero'] );
                $servico->setDescricao( $row ['descricao'] );
                $servico->setJustificativa( $row ['justificativa'] );
                $servico->setEspecificacao( $row ['especificacao'] );
                $servico->setObrigatorio_especificar( $row ['obrigatorio_especificar'] );
                $servico->setObrigatorio_justificar( $row ['obrigatorio_justificar'] );
                $servico->getSetor_id()->setId( $row ['id_setor_setor_id'] );
                $servico->getSetor_id()->setNome( $row ['nome_setor_setor_id'] );
                $servico->getSetor_id()->setEmail( $row ['email_setor_setor_id'] );
                $list [] = $servico;

	
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
        return $list;	
    }
        
                
    public function fetchById(Servico $servico) {
        $lista = array();
	    $id = $servico->getId();
                
        $sql = "SELECT servico.id, servico.numero, servico.descricao, servico.justificativa, servico.especificacao, servico.obrigatorio_especificar, servico.obrigatorio_justificar, setor_id.id as id_setor_setor_id, setor_id.nome as nome_setor_setor_id, setor_id.email as email_setor_setor_id FROM servico INNER JOIN setor as setor_id ON setor_id.id = servico.id_setor_id
            WHERE servico.id = :id";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ( $result as $row ){
		        $servico = new Servico();
                $servico->setId( $row ['id'] );
                $servico->setNumero( $row ['numero'] );
                $servico->setDescricao( $row ['descricao'] );
                $servico->setJustificativa( $row ['justificativa'] );
                $servico->setEspecificacao( $row ['especificacao'] );
                $servico->setObrigatorio_especificar( $row ['obrigatorio_especificar'] );
                $servico->setObrigatorio_justificar( $row ['obrigatorio_justificar'] );
                $servico->getSetor_id()->setId( $row ['id_setor_setor_id'] );
                $servico->getSetor_id()->setNome( $row ['nome_setor_setor_id'] );
                $servico->getSetor_id()->setEmail( $row ['email_setor_setor_id'] );
                $lista [] = $servico;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fetchByNumero(Servico $servico) {
        $lista = array();
	    $numero = $servico->getNumero();
                
        $sql = "SELECT servico.id, servico.numero, servico.descricao, servico.justificativa, servico.especificacao, servico.obrigatorio_especificar, servico.obrigatorio_justificar, setor_id.id as id_setor_setor_id, setor_id.nome as nome_setor_setor_id, setor_id.email as email_setor_setor_id FROM servico INNER JOIN setor as setor_id ON setor_id.id = servico.id_setor_id
            WHERE servico.numero = :numero";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":numero", $numero, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ( $result as $row ){
		        $servico = new Servico();
                $servico->setId( $row ['id'] );
                $servico->setNumero( $row ['numero'] );
                $servico->setDescricao( $row ['descricao'] );
                $servico->setJustificativa( $row ['justificativa'] );
                $servico->setEspecificacao( $row ['especificacao'] );
                $servico->setObrigatorio_especificar( $row ['obrigatorio_especificar'] );
                $servico->setObrigatorio_justificar( $row ['obrigatorio_justificar'] );
                $servico->getSetor_id()->setId( $row ['id_setor_setor_id'] );
                $servico->getSetor_id()->setNome( $row ['nome_setor_setor_id'] );
                $servico->getSetor_id()->setEmail( $row ['email_setor_setor_id'] );
                $lista [] = $servico;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fetchByDescricao(Servico $servico) {
        $lista = array();
	    $descricao = $servico->getDescricao();
                
        $sql = "SELECT servico.id, servico.numero, servico.descricao, servico.justificativa, servico.especificacao, servico.obrigatorio_especificar, servico.obrigatorio_justificar, setor_id.id as id_setor_setor_id, setor_id.nome as nome_setor_setor_id, setor_id.email as email_setor_setor_id FROM servico INNER JOIN setor as setor_id ON setor_id.id = servico.id_setor_id
            WHERE servico.descricao like :descricao";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":descricao", $descricao, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ( $result as $row ){
		        $servico = new Servico();
                $servico->setId( $row ['id'] );
                $servico->setNumero( $row ['numero'] );
                $servico->setDescricao( $row ['descricao'] );
                $servico->setJustificativa( $row ['justificativa'] );
                $servico->setEspecificacao( $row ['especificacao'] );
                $servico->setObrigatorio_especificar( $row ['obrigatorio_especificar'] );
                $servico->setObrigatorio_justificar( $row ['obrigatorio_justificar'] );
                $servico->getSetor_id()->setId( $row ['id_setor_setor_id'] );
                $servico->getSetor_id()->setNome( $row ['nome_setor_setor_id'] );
                $servico->getSetor_id()->setEmail( $row ['email_setor_setor_id'] );
                $lista [] = $servico;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fetchByJustificativa(Servico $servico) {
        $lista = array();
	    $justificativa = $servico->getJustificativa();
                
        $sql = "SELECT servico.id, servico.numero, servico.descricao, servico.justificativa, servico.especificacao, servico.obrigatorio_especificar, servico.obrigatorio_justificar, setor_id.id as id_setor_setor_id, setor_id.nome as nome_setor_setor_id, setor_id.email as email_setor_setor_id FROM servico INNER JOIN setor as setor_id ON setor_id.id = servico.id_setor_id
            WHERE servico.justificativa like :justificativa";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":justificativa", $justificativa, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ( $result as $row ){
		        $servico = new Servico();
                $servico->setId( $row ['id'] );
                $servico->setNumero( $row ['numero'] );
                $servico->setDescricao( $row ['descricao'] );
                $servico->setJustificativa( $row ['justificativa'] );
                $servico->setEspecificacao( $row ['especificacao'] );
                $servico->setObrigatorio_especificar( $row ['obrigatorio_especificar'] );
                $servico->setObrigatorio_justificar( $row ['obrigatorio_justificar'] );
                $servico->getSetor_id()->setId( $row ['id_setor_setor_id'] );
                $servico->getSetor_id()->setNome( $row ['nome_setor_setor_id'] );
                $servico->getSetor_id()->setEmail( $row ['email_setor_setor_id'] );
                $lista [] = $servico;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fetchByEspecificacao(Servico $servico) {
        $lista = array();
	    $especificacao = $servico->getEspecificacao();
                
        $sql = "SELECT servico.id, servico.numero, servico.descricao, servico.justificativa, servico.especificacao, servico.obrigatorio_especificar, servico.obrigatorio_justificar, setor_id.id as id_setor_setor_id, setor_id.nome as nome_setor_setor_id, setor_id.email as email_setor_setor_id FROM servico INNER JOIN setor as setor_id ON setor_id.id = servico.id_setor_id
            WHERE servico.especificacao like :especificacao";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":especificacao", $especificacao, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ( $result as $row ){
		        $servico = new Servico();
                $servico->setId( $row ['id'] );
                $servico->setNumero( $row ['numero'] );
                $servico->setDescricao( $row ['descricao'] );
                $servico->setJustificativa( $row ['justificativa'] );
                $servico->setEspecificacao( $row ['especificacao'] );
                $servico->setObrigatorio_especificar( $row ['obrigatorio_especificar'] );
                $servico->setObrigatorio_justificar( $row ['obrigatorio_justificar'] );
                $servico->getSetor_id()->setId( $row ['id_setor_setor_id'] );
                $servico->getSetor_id()->setNome( $row ['nome_setor_setor_id'] );
                $servico->getSetor_id()->setEmail( $row ['email_setor_setor_id'] );
                $lista [] = $servico;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fetchByObrigatorio_especificar(Servico $servico) {
        $lista = array();
	    $obrigatorio_especificar = $servico->getObrigatorio_especificar();
                
        $sql = "SELECT servico.id, servico.numero, servico.descricao, servico.justificativa, servico.especificacao, servico.obrigatorio_especificar, servico.obrigatorio_justificar, setor_id.id as id_setor_setor_id, setor_id.nome as nome_setor_setor_id, setor_id.email as email_setor_setor_id FROM servico INNER JOIN setor as setor_id ON setor_id.id = servico.id_setor_id
            WHERE servico.obrigatorio_especificar like :obrigatorio_especificar";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":obrigatorio_especificar", $obrigatorio_especificar, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ( $result as $row ){
		        $servico = new Servico();
                $servico->setId( $row ['id'] );
                $servico->setNumero( $row ['numero'] );
                $servico->setDescricao( $row ['descricao'] );
                $servico->setJustificativa( $row ['justificativa'] );
                $servico->setEspecificacao( $row ['especificacao'] );
                $servico->setObrigatorio_especificar( $row ['obrigatorio_especificar'] );
                $servico->setObrigatorio_justificar( $row ['obrigatorio_justificar'] );
                $servico->getSetor_id()->setId( $row ['id_setor_setor_id'] );
                $servico->getSetor_id()->setNome( $row ['nome_setor_setor_id'] );
                $servico->getSetor_id()->setEmail( $row ['email_setor_setor_id'] );
                $lista [] = $servico;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fetchByObrigatorio_justificar(Servico $servico) {
        $lista = array();
	    $obrigatorio_justificar = $servico->getObrigatorio_justificar();
                
        $sql = "SELECT servico.id, servico.numero, servico.descricao, servico.justificativa, servico.especificacao, servico.obrigatorio_especificar, servico.obrigatorio_justificar, setor_id.id as id_setor_setor_id, setor_id.nome as nome_setor_setor_id, setor_id.email as email_setor_setor_id FROM servico INNER JOIN setor as setor_id ON setor_id.id = servico.id_setor_id
            WHERE servico.obrigatorio_justificar like :obrigatorio_justificar";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":obrigatorio_justificar", $obrigatorio_justificar, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ( $result as $row ){
		        $servico = new Servico();
                $servico->setId( $row ['id'] );
                $servico->setNumero( $row ['numero'] );
                $servico->setDescricao( $row ['descricao'] );
                $servico->setJustificativa( $row ['justificativa'] );
                $servico->setEspecificacao( $row ['especificacao'] );
                $servico->setObrigatorio_especificar( $row ['obrigatorio_especificar'] );
                $servico->setObrigatorio_justificar( $row ['obrigatorio_justificar'] );
                $servico->getSetor_id()->setId( $row ['id_setor_setor_id'] );
                $servico->getSetor_id()->setNome( $row ['nome_setor_setor_id'] );
                $servico->getSetor_id()->setEmail( $row ['email_setor_setor_id'] );
                $lista [] = $servico;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fetchBySetor_id(Servico $servico) {
        $lista = array();
	    $setor_id = $servico->getSetor_id()->getId();
                
        $sql = "SELECT servico.id, servico.numero, servico.descricao, servico.justificativa, servico.especificacao, servico.obrigatorio_especificar, servico.obrigatorio_justificar, setor_id.id as id_setor_setor_id, setor_id.nome as nome_setor_setor_id, setor_id.email as email_setor_setor_id FROM servico INNER JOIN setor as setor_id ON setor_id.id = servico.id_setor_id
            WHERE servico.id_setor_id = :setor_id";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":setor_id", $setor_id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ( $result as $row ){
		        $servico = new Servico();
                $servico->setId( $row ['id'] );
                $servico->setNumero( $row ['numero'] );
                $servico->setDescricao( $row ['descricao'] );
                $servico->setJustificativa( $row ['justificativa'] );
                $servico->setEspecificacao( $row ['especificacao'] );
                $servico->setObrigatorio_especificar( $row ['obrigatorio_especificar'] );
                $servico->setObrigatorio_justificar( $row ['obrigatorio_justificar'] );
                $servico->getSetor_id()->setId( $row ['id_setor_setor_id'] );
                $servico->getSetor_id()->setNome( $row ['nome_setor_setor_id'] );
                $servico->getSetor_id()->setEmail( $row ['email_setor_setor_id'] );
                $lista [] = $servico;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fillById(Servico $servico) {
        
	    $id = $servico->getId();
	    $sql = "SELECT servico.id, servico.numero, servico.descricao, servico.justificativa, servico.especificacao, servico.obrigatorio_especificar, servico.obrigatorio_justificar, setor_id.id as id_setor_setor_id, setor_id.nome as nome_setor_setor_id, setor_id.email as email_setor_setor_id FROM servico INNER JOIN setor as setor_id ON setor_id.id = servico.id_setor_id
                WHERE servico.id = :id
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
                $servico->setId( $row ['id'] );
                $servico->setNumero( $row ['numero'] );
                $servico->setDescricao( $row ['descricao'] );
                $servico->setJustificativa( $row ['justificativa'] );
                $servico->setEspecificacao( $row ['especificacao'] );
                $servico->setObrigatorio_especificar( $row ['obrigatorio_especificar'] );
                $servico->setObrigatorio_justificar( $row ['obrigatorio_justificar'] );
                $servico->getSetor_id()->setId( $row ['id_setor_setor_id'] );
                $servico->getSetor_id()->setNome( $row ['nome_setor_setor_id'] );
                $servico->getSetor_id()->setEmail( $row ['email_setor_setor_id'] );
                
                
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
		return $servico;
    }
                
    public function fillByNumero(Servico $servico) {
        
	    $numero = $servico->getNumero();
	    $sql = "SELECT servico.id, servico.numero, servico.descricao, servico.justificativa, servico.especificacao, servico.obrigatorio_especificar, servico.obrigatorio_justificar, setor_id.id as id_setor_setor_id, setor_id.nome as nome_setor_setor_id, setor_id.email as email_setor_setor_id FROM servico INNER JOIN setor as setor_id ON setor_id.id = servico.id_setor_id
                WHERE servico.numero = :numero
                 LIMIT 1000";
                
        try {
            $stmt = $this->connection->prepare($sql);
                
		    if(!$stmt){
                echo "<br>Mensagem de erro retornada: ".$this->connection->errorInfo()[2]."<br>";
		    }
            $stmt->bindParam(":numero", $numero, PDO::PARAM_INT);
            $stmt->execute();
		    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    foreach ( $result as $row )
            {
                $servico->setId( $row ['id'] );
                $servico->setNumero( $row ['numero'] );
                $servico->setDescricao( $row ['descricao'] );
                $servico->setJustificativa( $row ['justificativa'] );
                $servico->setEspecificacao( $row ['especificacao'] );
                $servico->setObrigatorio_especificar( $row ['obrigatorio_especificar'] );
                $servico->setObrigatorio_justificar( $row ['obrigatorio_justificar'] );
                $servico->getSetor_id()->setId( $row ['id_setor_setor_id'] );
                $servico->getSetor_id()->setNome( $row ['nome_setor_setor_id'] );
                $servico->getSetor_id()->setEmail( $row ['email_setor_setor_id'] );
                
                
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
		return $servico;
    }
                
    public function fillByDescricao(Servico $servico) {
        
	    $descricao = $servico->getDescricao();
	    $sql = "SELECT servico.id, servico.numero, servico.descricao, servico.justificativa, servico.especificacao, servico.obrigatorio_especificar, servico.obrigatorio_justificar, setor_id.id as id_setor_setor_id, setor_id.nome as nome_setor_setor_id, setor_id.email as email_setor_setor_id FROM servico INNER JOIN setor as setor_id ON setor_id.id = servico.id_setor_id
                WHERE servico.descricao = :descricao
                 LIMIT 1000";
                
        try {
            $stmt = $this->connection->prepare($sql);
                
		    if(!$stmt){
                echo "<br>Mensagem de erro retornada: ".$this->connection->errorInfo()[2]."<br>";
		    }
            $stmt->bindParam(":descricao", $descricao, PDO::PARAM_STR);
            $stmt->execute();
		    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    foreach ( $result as $row )
            {
                $servico->setId( $row ['id'] );
                $servico->setNumero( $row ['numero'] );
                $servico->setDescricao( $row ['descricao'] );
                $servico->setJustificativa( $row ['justificativa'] );
                $servico->setEspecificacao( $row ['especificacao'] );
                $servico->setObrigatorio_especificar( $row ['obrigatorio_especificar'] );
                $servico->setObrigatorio_justificar( $row ['obrigatorio_justificar'] );
                $servico->getSetor_id()->setId( $row ['id_setor_setor_id'] );
                $servico->getSetor_id()->setNome( $row ['nome_setor_setor_id'] );
                $servico->getSetor_id()->setEmail( $row ['email_setor_setor_id'] );
                
                
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
		return $servico;
    }
                
    public function fillByJustificativa(Servico $servico) {
        
	    $justificativa = $servico->getJustificativa();
	    $sql = "SELECT servico.id, servico.numero, servico.descricao, servico.justificativa, servico.especificacao, servico.obrigatorio_especificar, servico.obrigatorio_justificar, setor_id.id as id_setor_setor_id, setor_id.nome as nome_setor_setor_id, setor_id.email as email_setor_setor_id FROM servico INNER JOIN setor as setor_id ON setor_id.id = servico.id_setor_id
                WHERE servico.justificativa = :justificativa
                 LIMIT 1000";
                
        try {
            $stmt = $this->connection->prepare($sql);
                
		    if(!$stmt){
                echo "<br>Mensagem de erro retornada: ".$this->connection->errorInfo()[2]."<br>";
		    }
            $stmt->bindParam(":justificativa", $justificativa, PDO::PARAM_STR);
            $stmt->execute();
		    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    foreach ( $result as $row )
            {
                $servico->setId( $row ['id'] );
                $servico->setNumero( $row ['numero'] );
                $servico->setDescricao( $row ['descricao'] );
                $servico->setJustificativa( $row ['justificativa'] );
                $servico->setEspecificacao( $row ['especificacao'] );
                $servico->setObrigatorio_especificar( $row ['obrigatorio_especificar'] );
                $servico->setObrigatorio_justificar( $row ['obrigatorio_justificar'] );
                $servico->getSetor_id()->setId( $row ['id_setor_setor_id'] );
                $servico->getSetor_id()->setNome( $row ['nome_setor_setor_id'] );
                $servico->getSetor_id()->setEmail( $row ['email_setor_setor_id'] );
                
                
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
		return $servico;
    }
                
    public function fillByEspecificacao(Servico $servico) {
        
	    $especificacao = $servico->getEspecificacao();
	    $sql = "SELECT servico.id, servico.numero, servico.descricao, servico.justificativa, servico.especificacao, servico.obrigatorio_especificar, servico.obrigatorio_justificar, setor_id.id as id_setor_setor_id, setor_id.nome as nome_setor_setor_id, setor_id.email as email_setor_setor_id FROM servico INNER JOIN setor as setor_id ON setor_id.id = servico.id_setor_id
                WHERE servico.especificacao = :especificacao
                 LIMIT 1000";
                
        try {
            $stmt = $this->connection->prepare($sql);
                
		    if(!$stmt){
                echo "<br>Mensagem de erro retornada: ".$this->connection->errorInfo()[2]."<br>";
		    }
            $stmt->bindParam(":especificacao", $especificacao, PDO::PARAM_STR);
            $stmt->execute();
		    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    foreach ( $result as $row )
            {
                $servico->setId( $row ['id'] );
                $servico->setNumero( $row ['numero'] );
                $servico->setDescricao( $row ['descricao'] );
                $servico->setJustificativa( $row ['justificativa'] );
                $servico->setEspecificacao( $row ['especificacao'] );
                $servico->setObrigatorio_especificar( $row ['obrigatorio_especificar'] );
                $servico->setObrigatorio_justificar( $row ['obrigatorio_justificar'] );
                $servico->getSetor_id()->setId( $row ['id_setor_setor_id'] );
                $servico->getSetor_id()->setNome( $row ['nome_setor_setor_id'] );
                $servico->getSetor_id()->setEmail( $row ['email_setor_setor_id'] );
                
                
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
		return $servico;
    }
                
    public function fillByObrigatorio_especificar(Servico $servico) {
        
	    $obrigatorio_especificar = $servico->getObrigatorio_especificar();
	    $sql = "SELECT servico.id, servico.numero, servico.descricao, servico.justificativa, servico.especificacao, servico.obrigatorio_especificar, servico.obrigatorio_justificar, setor_id.id as id_setor_setor_id, setor_id.nome as nome_setor_setor_id, setor_id.email as email_setor_setor_id FROM servico INNER JOIN setor as setor_id ON setor_id.id = servico.id_setor_id
                WHERE servico.obrigatorio_especificar = :obrigatorio_especificar
                 LIMIT 1000";
                
        try {
            $stmt = $this->connection->prepare($sql);
                
		    if(!$stmt){
                echo "<br>Mensagem de erro retornada: ".$this->connection->errorInfo()[2]."<br>";
		    }
            $stmt->bindParam(":obrigatorio_especificar", $obrigatorio_especificar, PDO::PARAM_STR);
            $stmt->execute();
		    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    foreach ( $result as $row )
            {
                $servico->setId( $row ['id'] );
                $servico->setNumero( $row ['numero'] );
                $servico->setDescricao( $row ['descricao'] );
                $servico->setJustificativa( $row ['justificativa'] );
                $servico->setEspecificacao( $row ['especificacao'] );
                $servico->setObrigatorio_especificar( $row ['obrigatorio_especificar'] );
                $servico->setObrigatorio_justificar( $row ['obrigatorio_justificar'] );
                $servico->getSetor_id()->setId( $row ['id_setor_setor_id'] );
                $servico->getSetor_id()->setNome( $row ['nome_setor_setor_id'] );
                $servico->getSetor_id()->setEmail( $row ['email_setor_setor_id'] );
                
                
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
		return $servico;
    }
                
    public function fillByObrigatorio_justificar(Servico $servico) {
        
	    $obrigatorio_justificar = $servico->getObrigatorio_justificar();
	    $sql = "SELECT servico.id, servico.numero, servico.descricao, servico.justificativa, servico.especificacao, servico.obrigatorio_especificar, servico.obrigatorio_justificar, setor_id.id as id_setor_setor_id, setor_id.nome as nome_setor_setor_id, setor_id.email as email_setor_setor_id FROM servico INNER JOIN setor as setor_id ON setor_id.id = servico.id_setor_id
                WHERE servico.obrigatorio_justificar = :obrigatorio_justificar
                 LIMIT 1000";
                
        try {
            $stmt = $this->connection->prepare($sql);
                
		    if(!$stmt){
                echo "<br>Mensagem de erro retornada: ".$this->connection->errorInfo()[2]."<br>";
		    }
            $stmt->bindParam(":obrigatorio_justificar", $obrigatorio_justificar, PDO::PARAM_STR);
            $stmt->execute();
		    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    foreach ( $result as $row )
            {
                $servico->setId( $row ['id'] );
                $servico->setNumero( $row ['numero'] );
                $servico->setDescricao( $row ['descricao'] );
                $servico->setJustificativa( $row ['justificativa'] );
                $servico->setEspecificacao( $row ['especificacao'] );
                $servico->setObrigatorio_especificar( $row ['obrigatorio_especificar'] );
                $servico->setObrigatorio_justificar( $row ['obrigatorio_justificar'] );
                $servico->getSetor_id()->setId( $row ['id_setor_setor_id'] );
                $servico->getSetor_id()->setNome( $row ['nome_setor_setor_id'] );
                $servico->getSetor_id()->setEmail( $row ['email_setor_setor_id'] );
                
                
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
		return $servico;
    }
}