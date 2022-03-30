<?php
            
/**
 * Classe feita para manipulação do objeto Usuario
 * feita automaticamente com programa gerador de software inventado por
 * @author Jefferson Uchôa Ponte
 */
     
namespace SisReq\dao;
use PDO;
use PDOException;
use SisReq\model\Usuario;

class UsuarioDAO extends DAO {
    
    

            
            
    public function update(Usuario $usuario)
    {
        $id = $usuario->getId();
            
            
        $sql = "UPDATE usuario
                SET
                login = :login,
                senha = :senha
                WHERE usuario.id = :id;";
			$login = $usuario->getLogin();
			$senha = $usuario->getSenha();
            
        try {
            
            $stmt = $this->getConnection()->prepare($sql);
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);
			$stmt->bindParam(":login", $login, PDO::PARAM_STR);
			$stmt->bindParam(":senha", $senha, PDO::PARAM_STR);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
            
    }
            
            

    public function insert(Usuario $usuario){
        $sql = "INSERT INTO usuario(login, senha, id_tipo) VALUES (:login, :senha, :tipo);";
		$login = $usuario->getLogin();
		$senha = $usuario->getSenha();
		$tipo = $usuario->getTipo()->getId();
		try {
			$db = $this->getConnection();
			$stmt = $db->prepare($sql);
			$stmt->bindParam(":login", $login, PDO::PARAM_STR);
			$stmt->bindParam(":senha", $senha, PDO::PARAM_STR);
			$stmt->bindParam(":tipo", $tipo, PDO::PARAM_INT);
			return $stmt->execute();
		} catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
            
    }
    public function insertWithPK(Usuario $usuario){
        $sql = "INSERT INTO usuario(id, login, senha, id_tipo) VALUES (:id, :login, :senha, :tipo);";
		$id = $usuario->getId();
		$login = $usuario->getLogin();
		$senha = $usuario->getSenha();
		$tipo = $usuario->getTipo()->getId();
		try {
			$db = $this->getConnection();
			$stmt = $db->prepare($sql);
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);
			$stmt->bindParam(":login", $login, PDO::PARAM_STR);
			$stmt->bindParam(":senha", $senha, PDO::PARAM_STR);
			$stmt->bindParam(":tipo", $tipo, PDO::PARAM_INT);
			return $stmt->execute();
		} catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
            
    }

	public function delete(Usuario $usuario){
		$id = $usuario->getId();
		$sql = "DELETE FROM usuario WHERE id = :id";
		    
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
		$sql = "SELECT usuario.id, usuario.login, usuario.senha, tipo.id as id_tipo_usuario_tipo, tipo.nome as nome_tipo_usuario_tipo FROM usuario INNER JOIN tipo_usuario as tipo ON tipo.id = usuario.id_tipo LIMIT 1000";

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
		        $usuario = new Usuario();
                $usuario->setId( $row ['id'] );
                $usuario->setLogin( $row ['login'] );
                $usuario->setSenha( $row ['senha'] );
                $usuario->getTipo()->setId( $row ['id_tipo_usuario_tipo'] );
                $usuario->getTipo()->setNome( $row ['nome_tipo_usuario_tipo'] );
                $list [] = $usuario;

	
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
        return $list;	
    }
        
                
    public function fetchById(Usuario $usuario) {
        $lista = array();
	    $id = $usuario->getId();
                
        $sql = "SELECT usuario.id, usuario.login, usuario.senha, tipo.id as id_tipo_usuario_tipo, tipo.nome as nome_tipo_usuario_tipo FROM usuario INNER JOIN tipo_usuario as tipo ON tipo.id = usuario.id_tipo
            WHERE usuario.id = :id";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ( $result as $row ){
		        $usuario = new Usuario();
                $usuario->setId( $row ['id'] );
                $usuario->setLogin( $row ['login'] );
                $usuario->setSenha( $row ['senha'] );
                $usuario->getTipo()->setId( $row ['id_tipo_usuario_tipo'] );
                $usuario->getTipo()->setNome( $row ['nome_tipo_usuario_tipo'] );
                $lista [] = $usuario;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fetchByLogin(Usuario $usuario) {
        $lista = array();
	    $login = $usuario->getLogin();
                
        $sql = "SELECT usuario.id, usuario.login, usuario.senha, tipo.id as id_tipo_usuario_tipo, tipo.nome as nome_tipo_usuario_tipo FROM usuario INNER JOIN tipo_usuario as tipo ON tipo.id = usuario.id_tipo
            WHERE usuario.login like :login";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":login", $login, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ( $result as $row ){
		        $usuario = new Usuario();
                $usuario->setId( $row ['id'] );
                $usuario->setLogin( $row ['login'] );
                $usuario->setSenha( $row ['senha'] );
                $usuario->getTipo()->setId( $row ['id_tipo_usuario_tipo'] );
                $usuario->getTipo()->setNome( $row ['nome_tipo_usuario_tipo'] );
                $lista [] = $usuario;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fetchBySenha(Usuario $usuario) {
        $lista = array();
	    $senha = $usuario->getSenha();
                
        $sql = "SELECT usuario.id, usuario.login, usuario.senha, tipo.id as id_tipo_usuario_tipo, tipo.nome as nome_tipo_usuario_tipo FROM usuario INNER JOIN tipo_usuario as tipo ON tipo.id = usuario.id_tipo
            WHERE usuario.senha like :senha";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":senha", $senha, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ( $result as $row ){
		        $usuario = new Usuario();
                $usuario->setId( $row ['id'] );
                $usuario->setLogin( $row ['login'] );
                $usuario->setSenha( $row ['senha'] );
                $usuario->getTipo()->setId( $row ['id_tipo_usuario_tipo'] );
                $usuario->getTipo()->setNome( $row ['nome_tipo_usuario_tipo'] );
                $lista [] = $usuario;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fetchByTipo(Usuario $usuario) {
        $lista = array();
	    $tipo = $usuario->getTipo()->getId();
                
        $sql = "SELECT usuario.id, usuario.login, usuario.senha, tipo.id as id_tipo_usuario_tipo, tipo.nome as nome_tipo_usuario_tipo FROM usuario INNER JOIN tipo_usuario as tipo ON tipo.id = usuario.id_tipo
            WHERE usuario.id_tipo = :tipo";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":tipo", $tipo, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ( $result as $row ){
		        $usuario = new Usuario();
                $usuario->setId( $row ['id'] );
                $usuario->setLogin( $row ['login'] );
                $usuario->setSenha( $row ['senha'] );
                $usuario->getTipo()->setId( $row ['id_tipo_usuario_tipo'] );
                $usuario->getTipo()->setNome( $row ['nome_tipo_usuario_tipo'] );
                $lista [] = $usuario;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fillById(Usuario $usuario) {
        
	    $id = $usuario->getId();
	    $sql = "SELECT usuario.id, usuario.login, usuario.senha, tipo.id as id_tipo_usuario_tipo, tipo.nome as nome_tipo_usuario_tipo FROM usuario INNER JOIN tipo_usuario as tipo ON tipo.id = usuario.id_tipo
                WHERE usuario.id = :id
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
                $usuario->setId( $row ['id'] );
                $usuario->setLogin( $row ['login'] );
                $usuario->setSenha( $row ['senha'] );
                $usuario->getTipo()->setId( $row ['id_tipo_usuario_tipo'] );
                $usuario->getTipo()->setNome( $row ['nome_tipo_usuario_tipo'] );
                
                
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
		return $usuario;
    }
                
    public function fillByLogin(Usuario $usuario) {
        
	    $login = $usuario->getLogin();
	    $sql = "SELECT usuario.id, usuario.login, usuario.senha, tipo.id as id_tipo_usuario_tipo, tipo.nome as nome_tipo_usuario_tipo FROM usuario INNER JOIN tipo_usuario as tipo ON tipo.id = usuario.id_tipo
                WHERE usuario.login = :login
                 LIMIT 1000";
                
        try {
            $stmt = $this->connection->prepare($sql);
                
		    if(!$stmt){
                echo "<br>Mensagem de erro retornada: ".$this->connection->errorInfo()[2]."<br>";
		    }
            $stmt->bindParam(":login", $login, PDO::PARAM_STR);
            $stmt->execute();
		    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    foreach ( $result as $row )
            {
                $usuario->setId( $row ['id'] );
                $usuario->setLogin( $row ['login'] );
                $usuario->setSenha( $row ['senha'] );
                $usuario->getTipo()->setId( $row ['id_tipo_usuario_tipo'] );
                $usuario->getTipo()->setNome( $row ['nome_tipo_usuario_tipo'] );
                
                
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
		return $usuario;
    }
                
    public function fillBySenha(Usuario $usuario) {
        
	    $senha = $usuario->getSenha();
	    $sql = "SELECT usuario.id, usuario.login, usuario.senha, tipo.id as id_tipo_usuario_tipo, tipo.nome as nome_tipo_usuario_tipo FROM usuario INNER JOIN tipo_usuario as tipo ON tipo.id = usuario.id_tipo
                WHERE usuario.senha = :senha
                 LIMIT 1000";
                
        try {
            $stmt = $this->connection->prepare($sql);
                
		    if(!$stmt){
                echo "<br>Mensagem de erro retornada: ".$this->connection->errorInfo()[2]."<br>";
		    }
            $stmt->bindParam(":senha", $senha, PDO::PARAM_STR);
            $stmt->execute();
		    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    foreach ( $result as $row )
            {
                $usuario->setId( $row ['id'] );
                $usuario->setLogin( $row ['login'] );
                $usuario->setSenha( $row ['senha'] );
                $usuario->getTipo()->setId( $row ['id_tipo_usuario_tipo'] );
                $usuario->getTipo()->setNome( $row ['nome_tipo_usuario_tipo'] );
                
                
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
		return $usuario;
    }
}