<?php
            
/**
 * Classe feita para manipulação do objeto Setor
 * feita automaticamente com programa gerador de software inventado por
 * @author Jefferson Uchôa Ponte
 */
     
namespace SisReq\dao;
use PDO;
use PDOException;
use SisReq\model\Setor;

class SetorDAO extends DAO {
    
    

            
            
    public function update(Setor $setor)
    {
        $id = $setor->getId();
            
            
        $sql = "UPDATE setor
                SET
                nome = :nome,
                email = :email
                WHERE setor.id = :id;";
			$nome = $setor->getNome();
			$email = $setor->getEmail();
            
        try {
            
            $stmt = $this->getConnection()->prepare($sql);
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);
			$stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
            
    }
            
            

    public function insert(Setor $setor){
        $sql = "INSERT INTO setor(nome, email) VALUES (:nome, :email);";
		$nome = $setor->getNome();
		$email = $setor->getEmail();
		try {
			$db = $this->getConnection();
			$stmt = $db->prepare($sql);
			$stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			return $stmt->execute();
		} catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
            
    }
    public function insertWithPK(Setor $setor){
        $sql = "INSERT INTO setor(id, nome, email) VALUES (:id, :nome, :email);";
		$id = $setor->getId();
		$nome = $setor->getNome();
		$email = $setor->getEmail();
		try {
			$db = $this->getConnection();
			$stmt = $db->prepare($sql);
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);
			$stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			return $stmt->execute();
		} catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
            
    }

	public function delete(Setor $setor){
		$id = $setor->getId();
		$sql = "DELETE FROM setor WHERE id = :id";
		    
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
		$sql = "SELECT setor.id, setor.nome, setor.email FROM setor LIMIT 1000";

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
		        $setor = new Setor();
                $setor->setId( $row ['id'] );
                $setor->setNome( $row ['nome'] );
                $setor->setEmail( $row ['email'] );
                $list [] = $setor;

	
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
        return $list;	
    }
        
                
    public function fetchById(Setor $setor) {
        $lista = array();
	    $id = $setor->getId();
                
        $sql = "SELECT setor.id, setor.nome, setor.email FROM setor
            WHERE setor.id = :id";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ( $result as $row ){
		        $setor = new Setor();
                $setor->setId( $row ['id'] );
                $setor->setNome( $row ['nome'] );
                $setor->setEmail( $row ['email'] );
                $lista [] = $setor;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fetchByNome(Setor $setor) {
        $lista = array();
	    $nome = $setor->getNome();
                
        $sql = "SELECT setor.id, setor.nome, setor.email FROM setor
            WHERE setor.nome like :nome";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ( $result as $row ){
		        $setor = new Setor();
                $setor->setId( $row ['id'] );
                $setor->setNome( $row ['nome'] );
                $setor->setEmail( $row ['email'] );
                $lista [] = $setor;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fetchByEmail(Setor $setor) {
        $lista = array();
	    $email = $setor->getEmail();
                
        $sql = "SELECT setor.id, setor.nome, setor.email FROM setor
            WHERE setor.email like :email";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ( $result as $row ){
		        $setor = new Setor();
                $setor->setId( $row ['id'] );
                $setor->setNome( $row ['nome'] );
                $setor->setEmail( $row ['email'] );
                $lista [] = $setor;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fillById(Setor $setor) {
        
	    $id = $setor->getId();
	    $sql = "SELECT setor.id, setor.nome, setor.email FROM setor
                WHERE setor.id = :id
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
                $setor->setId( $row ['id'] );
                $setor->setNome( $row ['nome'] );
                $setor->setEmail( $row ['email'] );
                
                
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
		return $setor;
    }
                
    public function fillByNome(Setor $setor) {
        
	    $nome = $setor->getNome();
	    $sql = "SELECT setor.id, setor.nome, setor.email FROM setor
                WHERE setor.nome = :nome
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
                $setor->setId( $row ['id'] );
                $setor->setNome( $row ['nome'] );
                $setor->setEmail( $row ['email'] );
                
                
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
		return $setor;
    }
                
    public function fillByEmail(Setor $setor) {
        
	    $email = $setor->getEmail();
	    $sql = "SELECT setor.id, setor.nome, setor.email FROM setor
                WHERE setor.email = :email
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
                $setor->setId( $row ['id'] );
                $setor->setNome( $row ['nome'] );
                $setor->setEmail( $row ['email'] );
                
                
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
		return $setor;
    }
}