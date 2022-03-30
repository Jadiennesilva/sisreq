<?php
            
/**
 * Classe feita para manipulação do objeto Assinaturas
 * feita automaticamente com programa gerador de software inventado por
 * @author Jefferson Uchôa Ponte
 */
     
namespace SisReq\dao;
use PDO;
use PDOException;
use SisReq\model\Assinaturas;

class AssinaturasDAO extends DAO {
    
    

            
            
    public function update(Assinaturas $assinaturas)
    {
        $id = $assinaturas->getId();
            
            
        $sql = "UPDATE assinaturas
                SET
                assinatura_funcionario = :assinatura_funcionario,
                assinatura_requerente = :assinatura_requerente,
                visto_cae = :visto_CAE,
                visto_biblioteca = :visto_biblioteca
                WHERE assinaturas.id = :id;";
			$assinatura_funcionario = $assinaturas->getAssinatura_funcionario();
			$assinatura_requerente = $assinaturas->getAssinatura_requerente();
			$visto_CAE = $assinaturas->getVisto_CAE();
			$visto_biblioteca = $assinaturas->getVisto_biblioteca();
            
        try {
            
            $stmt = $this->getConnection()->prepare($sql);
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);
			$stmt->bindParam(":assinatura_funcionario", $assinatura_funcionario, PDO::PARAM_STR);
			$stmt->bindParam(":assinatura_requerente", $assinatura_requerente, PDO::PARAM_STR);
			$stmt->bindParam(":visto_CAE", $visto_CAE, PDO::PARAM_STR);
			$stmt->bindParam(":visto_biblioteca", $visto_biblioteca, PDO::PARAM_STR);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
            
    }
            
            

    public function insert(Assinaturas $assinaturas){
        $sql = "INSERT INTO assinaturas(assinatura_funcionario, assinatura_requerente, visto_cae, visto_biblioteca) VALUES (:assinatura_funcionario, :assinatura_requerente, :visto_CAE, :visto_biblioteca);";
		$assinatura_funcionario = $assinaturas->getAssinatura_funcionario();
		$assinatura_requerente = $assinaturas->getAssinatura_requerente();
		$visto_CAE = $assinaturas->getVisto_CAE();
		$visto_biblioteca = $assinaturas->getVisto_biblioteca();
		try {
			$db = $this->getConnection();
			$stmt = $db->prepare($sql);
			$stmt->bindParam(":assinatura_funcionario", $assinatura_funcionario, PDO::PARAM_STR);
			$stmt->bindParam(":assinatura_requerente", $assinatura_requerente, PDO::PARAM_STR);
			$stmt->bindParam(":visto_CAE", $visto_CAE, PDO::PARAM_STR);
			$stmt->bindParam(":visto_biblioteca", $visto_biblioteca, PDO::PARAM_STR);
			return $stmt->execute();
		} catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
            
    }
    public function insertWithPK(Assinaturas $assinaturas){
        $sql = "INSERT INTO assinaturas(id, assinatura_funcionario, assinatura_requerente, visto_cae, visto_biblioteca) VALUES (:id, :assinatura_funcionario, :assinatura_requerente, :visto_CAE, :visto_biblioteca);";
		$id = $assinaturas->getId();
		$assinatura_funcionario = $assinaturas->getAssinatura_funcionario();
		$assinatura_requerente = $assinaturas->getAssinatura_requerente();
		$visto_CAE = $assinaturas->getVisto_CAE();
		$visto_biblioteca = $assinaturas->getVisto_biblioteca();
		try {
			$db = $this->getConnection();
			$stmt = $db->prepare($sql);
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);
			$stmt->bindParam(":assinatura_funcionario", $assinatura_funcionario, PDO::PARAM_STR);
			$stmt->bindParam(":assinatura_requerente", $assinatura_requerente, PDO::PARAM_STR);
			$stmt->bindParam(":visto_CAE", $visto_CAE, PDO::PARAM_STR);
			$stmt->bindParam(":visto_biblioteca", $visto_biblioteca, PDO::PARAM_STR);
			return $stmt->execute();
		} catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
            
    }

	public function delete(Assinaturas $assinaturas){
		$id = $assinaturas->getId();
		$sql = "DELETE FROM assinaturas WHERE id = :id";
		    
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
		$sql = "SELECT assinaturas.id, assinaturas.assinatura_funcionario, assinaturas.assinatura_requerente, assinaturas.visto_cae, assinaturas.visto_biblioteca FROM assinaturas LIMIT 1000";

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
		        $assinaturas = new Assinaturas();
                $assinaturas->setId( $row ['id'] );
                $assinaturas->setAssinatura_funcionario( $row ['assinatura_funcionario'] );
                $assinaturas->setAssinatura_requerente( $row ['assinatura_requerente'] );
                $assinaturas->setVisto_CAE( $row ['visto_cae'] );
                $assinaturas->setVisto_biblioteca( $row ['visto_biblioteca'] );
                $list [] = $assinaturas;

	
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
        return $list;	
    }
        
                
    public function fetchById(Assinaturas $assinaturas) {
        $lista = array();
	    $id = $assinaturas->getId();
                
        $sql = "SELECT assinaturas.id, assinaturas.assinatura_funcionario, assinaturas.assinatura_requerente, assinaturas.visto_cae, assinaturas.visto_biblioteca FROM assinaturas
            WHERE assinaturas.id = :id";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ( $result as $row ){
		        $assinaturas = new Assinaturas();
                $assinaturas->setId( $row ['id'] );
                $assinaturas->setAssinatura_funcionario( $row ['assinatura_funcionario'] );
                $assinaturas->setAssinatura_requerente( $row ['assinatura_requerente'] );
                $assinaturas->setVisto_CAE( $row ['visto_cae'] );
                $assinaturas->setVisto_biblioteca( $row ['visto_biblioteca'] );
                $lista [] = $assinaturas;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fetchByAssinatura_funcionario(Assinaturas $assinaturas) {
        $lista = array();
	    $assinatura_funcionario = $assinaturas->getAssinatura_funcionario();
                
        $sql = "SELECT assinaturas.id, assinaturas.assinatura_funcionario, assinaturas.assinatura_requerente, assinaturas.visto_cae, assinaturas.visto_biblioteca FROM assinaturas
            WHERE assinaturas.assinatura_funcionario like :assinatura_funcionario";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":assinatura_funcionario", $assinatura_funcionario, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ( $result as $row ){
		        $assinaturas = new Assinaturas();
                $assinaturas->setId( $row ['id'] );
                $assinaturas->setAssinatura_funcionario( $row ['assinatura_funcionario'] );
                $assinaturas->setAssinatura_requerente( $row ['assinatura_requerente'] );
                $assinaturas->setVisto_CAE( $row ['visto_cae'] );
                $assinaturas->setVisto_biblioteca( $row ['visto_biblioteca'] );
                $lista [] = $assinaturas;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fetchByAssinatura_requerente(Assinaturas $assinaturas) {
        $lista = array();
	    $assinatura_requerente = $assinaturas->getAssinatura_requerente();
                
        $sql = "SELECT assinaturas.id, assinaturas.assinatura_funcionario, assinaturas.assinatura_requerente, assinaturas.visto_cae, assinaturas.visto_biblioteca FROM assinaturas
            WHERE assinaturas.assinatura_requerente like :assinatura_requerente";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":assinatura_requerente", $assinatura_requerente, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ( $result as $row ){
		        $assinaturas = new Assinaturas();
                $assinaturas->setId( $row ['id'] );
                $assinaturas->setAssinatura_funcionario( $row ['assinatura_funcionario'] );
                $assinaturas->setAssinatura_requerente( $row ['assinatura_requerente'] );
                $assinaturas->setVisto_CAE( $row ['visto_cae'] );
                $assinaturas->setVisto_biblioteca( $row ['visto_biblioteca'] );
                $lista [] = $assinaturas;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fetchByVisto_CAE(Assinaturas $assinaturas) {
        $lista = array();
	    $visto_CAE = $assinaturas->getVisto_CAE();
                
        $sql = "SELECT assinaturas.id, assinaturas.assinatura_funcionario, assinaturas.assinatura_requerente, assinaturas.visto_cae, assinaturas.visto_biblioteca FROM assinaturas
            WHERE assinaturas.visto_cae like :visto_CAE";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":visto_CAE", $visto_CAE, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ( $result as $row ){
		        $assinaturas = new Assinaturas();
                $assinaturas->setId( $row ['id'] );
                $assinaturas->setAssinatura_funcionario( $row ['assinatura_funcionario'] );
                $assinaturas->setAssinatura_requerente( $row ['assinatura_requerente'] );
                $assinaturas->setVisto_CAE( $row ['visto_cae'] );
                $assinaturas->setVisto_biblioteca( $row ['visto_biblioteca'] );
                $lista [] = $assinaturas;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fetchByVisto_biblioteca(Assinaturas $assinaturas) {
        $lista = array();
	    $visto_biblioteca = $assinaturas->getVisto_biblioteca();
                
        $sql = "SELECT assinaturas.id, assinaturas.assinatura_funcionario, assinaturas.assinatura_requerente, assinaturas.visto_cae, assinaturas.visto_biblioteca FROM assinaturas
            WHERE assinaturas.visto_biblioteca like :visto_biblioteca";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":visto_biblioteca", $visto_biblioteca, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ( $result as $row ){
		        $assinaturas = new Assinaturas();
                $assinaturas->setId( $row ['id'] );
                $assinaturas->setAssinatura_funcionario( $row ['assinatura_funcionario'] );
                $assinaturas->setAssinatura_requerente( $row ['assinatura_requerente'] );
                $assinaturas->setVisto_CAE( $row ['visto_cae'] );
                $assinaturas->setVisto_biblioteca( $row ['visto_biblioteca'] );
                $lista [] = $assinaturas;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fillById(Assinaturas $assinaturas) {
        
	    $id = $assinaturas->getId();
	    $sql = "SELECT assinaturas.id, assinaturas.assinatura_funcionario, assinaturas.assinatura_requerente, assinaturas.visto_cae, assinaturas.visto_biblioteca FROM assinaturas
                WHERE assinaturas.id = :id
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
                $assinaturas->setId( $row ['id'] );
                $assinaturas->setAssinatura_funcionario( $row ['assinatura_funcionario'] );
                $assinaturas->setAssinatura_requerente( $row ['assinatura_requerente'] );
                $assinaturas->setVisto_CAE( $row ['visto_cae'] );
                $assinaturas->setVisto_biblioteca( $row ['visto_biblioteca'] );
                
                
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
		return $assinaturas;
    }
                
    public function fillByAssinatura_funcionario(Assinaturas $assinaturas) {
        
	    $assinatura_funcionario = $assinaturas->getAssinatura_funcionario();
	    $sql = "SELECT assinaturas.id, assinaturas.assinatura_funcionario, assinaturas.assinatura_requerente, assinaturas.visto_cae, assinaturas.visto_biblioteca FROM assinaturas
                WHERE assinaturas.assinatura_funcionario = :assinatura_funcionario
                 LIMIT 1000";
                
        try {
            $stmt = $this->connection->prepare($sql);
                
		    if(!$stmt){
                echo "<br>Mensagem de erro retornada: ".$this->connection->errorInfo()[2]."<br>";
		    }
            $stmt->bindParam(":assinatura_funcionario", $assinatura_funcionario, PDO::PARAM_STR);
            $stmt->execute();
		    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    foreach ( $result as $row )
            {
                $assinaturas->setId( $row ['id'] );
                $assinaturas->setAssinatura_funcionario( $row ['assinatura_funcionario'] );
                $assinaturas->setAssinatura_requerente( $row ['assinatura_requerente'] );
                $assinaturas->setVisto_CAE( $row ['visto_cae'] );
                $assinaturas->setVisto_biblioteca( $row ['visto_biblioteca'] );
                
                
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
		return $assinaturas;
    }
                
    public function fillByAssinatura_requerente(Assinaturas $assinaturas) {
        
	    $assinatura_requerente = $assinaturas->getAssinatura_requerente();
	    $sql = "SELECT assinaturas.id, assinaturas.assinatura_funcionario, assinaturas.assinatura_requerente, assinaturas.visto_cae, assinaturas.visto_biblioteca FROM assinaturas
                WHERE assinaturas.assinatura_requerente = :assinatura_requerente
                 LIMIT 1000";
                
        try {
            $stmt = $this->connection->prepare($sql);
                
		    if(!$stmt){
                echo "<br>Mensagem de erro retornada: ".$this->connection->errorInfo()[2]."<br>";
		    }
            $stmt->bindParam(":assinatura_requerente", $assinatura_requerente, PDO::PARAM_STR);
            $stmt->execute();
		    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    foreach ( $result as $row )
            {
                $assinaturas->setId( $row ['id'] );
                $assinaturas->setAssinatura_funcionario( $row ['assinatura_funcionario'] );
                $assinaturas->setAssinatura_requerente( $row ['assinatura_requerente'] );
                $assinaturas->setVisto_CAE( $row ['visto_cae'] );
                $assinaturas->setVisto_biblioteca( $row ['visto_biblioteca'] );
                
                
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
		return $assinaturas;
    }
                
    public function fillByVisto_CAE(Assinaturas $assinaturas) {
        
	    $visto_CAE = $assinaturas->getVisto_CAE();
	    $sql = "SELECT assinaturas.id, assinaturas.assinatura_funcionario, assinaturas.assinatura_requerente, assinaturas.visto_cae, assinaturas.visto_biblioteca FROM assinaturas
                WHERE assinaturas.visto_cae = :visto_CAE
                 LIMIT 1000";
                
        try {
            $stmt = $this->connection->prepare($sql);
                
		    if(!$stmt){
                echo "<br>Mensagem de erro retornada: ".$this->connection->errorInfo()[2]."<br>";
		    }
            $stmt->bindParam(":visto_CAE", $visto_CAE, PDO::PARAM_STR);
            $stmt->execute();
		    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    foreach ( $result as $row )
            {
                $assinaturas->setId( $row ['id'] );
                $assinaturas->setAssinatura_funcionario( $row ['assinatura_funcionario'] );
                $assinaturas->setAssinatura_requerente( $row ['assinatura_requerente'] );
                $assinaturas->setVisto_CAE( $row ['visto_cae'] );
                $assinaturas->setVisto_biblioteca( $row ['visto_biblioteca'] );
                
                
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
		return $assinaturas;
    }
                
    public function fillByVisto_biblioteca(Assinaturas $assinaturas) {
        
	    $visto_biblioteca = $assinaturas->getVisto_biblioteca();
	    $sql = "SELECT assinaturas.id, assinaturas.assinatura_funcionario, assinaturas.assinatura_requerente, assinaturas.visto_cae, assinaturas.visto_biblioteca FROM assinaturas
                WHERE assinaturas.visto_biblioteca = :visto_biblioteca
                 LIMIT 1000";
                
        try {
            $stmt = $this->connection->prepare($sql);
                
		    if(!$stmt){
                echo "<br>Mensagem de erro retornada: ".$this->connection->errorInfo()[2]."<br>";
		    }
            $stmt->bindParam(":visto_biblioteca", $visto_biblioteca, PDO::PARAM_STR);
            $stmt->execute();
		    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    foreach ( $result as $row )
            {
                $assinaturas->setId( $row ['id'] );
                $assinaturas->setAssinatura_funcionario( $row ['assinatura_funcionario'] );
                $assinaturas->setAssinatura_requerente( $row ['assinatura_requerente'] );
                $assinaturas->setVisto_CAE( $row ['visto_cae'] );
                $assinaturas->setVisto_biblioteca( $row ['visto_biblioteca'] );
                
                
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
		return $assinaturas;
    }
}