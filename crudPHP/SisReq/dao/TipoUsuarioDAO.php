<?php
            
/**
 * Classe feita para manipulação do objeto TipoUsuario
 * feita automaticamente com programa gerador de software inventado por
 * @author Jefferson Uchôa Ponte
 */
     
namespace SisReq\dao;
use PDO;
use PDOException;
use SisReq\model\TipoUsuario;

class TipoUsuarioDAO extends DAO {
    
    

            
            
    public function update(TipoUsuario $tipoUsuario)
    {
        $id = $tipoUsuario->getId();
            
            
        $sql = "UPDATE tipo_usuario
                SET
                nome = :nome
                WHERE tipo_usuario.id = :id;";
			$nome = $tipoUsuario->getNome();
            
        try {
            
            $stmt = $this->getConnection()->prepare($sql);
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);
			$stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
            
    }
            
            

    public function insert(TipoUsuario $tipoUsuario){
        $sql = "INSERT INTO tipo_usuario(nome) VALUES (:nome);";
		$nome = $tipoUsuario->getNome();
		try {
			$db = $this->getConnection();
			$stmt = $db->prepare($sql);
			$stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
			return $stmt->execute();
		} catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
            
    }
    public function insertWithPK(TipoUsuario $tipoUsuario){
        $sql = "INSERT INTO tipo_usuario(id, nome) VALUES (:id, :nome);";
		$id = $tipoUsuario->getId();
		$nome = $tipoUsuario->getNome();
		try {
			$db = $this->getConnection();
			$stmt = $db->prepare($sql);
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);
			$stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
			return $stmt->execute();
		} catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
            
    }

	public function delete(TipoUsuario $tipoUsuario){
		$id = $tipoUsuario->getId();
		$sql = "DELETE FROM tipo_usuario WHERE id = :id";
		    
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
		$sql = "SELECT tipo_usuario.id, tipo_usuario.nome FROM tipo_usuario LIMIT 1000";

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
		        $tipoUsuario = new TipoUsuario();
                $tipoUsuario->setId( $row ['id'] );
                $tipoUsuario->setNome( $row ['nome'] );
                $list [] = $tipoUsuario;

	
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
        return $list;	
    }
        
                
    public function fetchById(TipoUsuario $tipoUsuario) {
        $lista = array();
	    $id = $tipoUsuario->getId();
                
        $sql = "SELECT tipo_usuario.id, tipo_usuario.nome FROM tipo_usuario
            WHERE tipo_usuario.id = :id";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ( $result as $row ){
		        $tipoUsuario = new TipoUsuario();
                $tipoUsuario->setId( $row ['id'] );
                $tipoUsuario->setNome( $row ['nome'] );
                $lista [] = $tipoUsuario;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fetchByNome(TipoUsuario $tipoUsuario) {
        $lista = array();
	    $nome = $tipoUsuario->getNome();
                
        $sql = "SELECT tipo_usuario.id, tipo_usuario.nome FROM tipo_usuario
            WHERE tipo_usuario.nome like :nome";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ( $result as $row ){
		        $tipoUsuario = new TipoUsuario();
                $tipoUsuario->setId( $row ['id'] );
                $tipoUsuario->setNome( $row ['nome'] );
                $lista [] = $tipoUsuario;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fillById(TipoUsuario $tipoUsuario) {
        
	    $id = $tipoUsuario->getId();
	    $sql = "SELECT tipo_usuario.id, tipo_usuario.nome FROM tipo_usuario
                WHERE tipo_usuario.id = :id
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
                $tipoUsuario->setId( $row ['id'] );
                $tipoUsuario->setNome( $row ['nome'] );
                
                
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
		return $tipoUsuario;
    }
                
    public function fillByNome(TipoUsuario $tipoUsuario) {
        
	    $nome = $tipoUsuario->getNome();
	    $sql = "SELECT tipo_usuario.id, tipo_usuario.nome FROM tipo_usuario
                WHERE tipo_usuario.nome = :nome
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
                $tipoUsuario->setId( $row ['id'] );
                $tipoUsuario->setNome( $row ['nome'] );
                
                
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
		return $tipoUsuario;
    }
}