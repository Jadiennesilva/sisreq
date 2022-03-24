<?php
            
/**
 * Classe feita para manipulação do objeto Curso
 * feita automaticamente com programa gerador de software inventado por
 * @author Jefferson Uchôa Ponte
 */
     
namespace SisReq\dao;
use PDO;
use PDOException;
use SisReq\model\Curso;

class CursoDAO extends DAO {
    
    

            
            
    public function update(Curso $curso)
    {
        $id = $curso->getId();
            
            
        $sql = "UPDATE curso
                SET
                nome = :nome,
                turno = :turno,
                período = :período
                WHERE curso.id = :id;";
			$nome = $curso->getNome();
			$turno = $curso->getTurno();
			$período = $curso->getPeríodo();
            
        try {
            
            $stmt = $this->getConnection()->prepare($sql);
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);
			$stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
			$stmt->bindParam(":turno", $turno, PDO::PARAM_STR);
			$stmt->bindParam(":período", $período, PDO::PARAM_STR);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
            
    }
            
            

    public function insert(Curso $curso){
        $sql = "INSERT INTO curso(nome, turno, período) VALUES (:nome, :turno, :período);";
		$nome = $curso->getNome();
		$turno = $curso->getTurno();
		$período = $curso->getPeríodo();
		try {
			$db = $this->getConnection();
			$stmt = $db->prepare($sql);
			$stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
			$stmt->bindParam(":turno", $turno, PDO::PARAM_STR);
			$stmt->bindParam(":período", $período, PDO::PARAM_STR);
			return $stmt->execute();
		} catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
            
    }
    public function insertWithPK(Curso $curso){
        $sql = "INSERT INTO curso(id, nome, turno, período) VALUES (:id, :nome, :turno, :período);";
		$id = $curso->getId();
		$nome = $curso->getNome();
		$turno = $curso->getTurno();
		$período = $curso->getPeríodo();
		try {
			$db = $this->getConnection();
			$stmt = $db->prepare($sql);
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);
			$stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
			$stmt->bindParam(":turno", $turno, PDO::PARAM_STR);
			$stmt->bindParam(":período", $período, PDO::PARAM_STR);
			return $stmt->execute();
		} catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
            
    }

	public function delete(Curso $curso){
		$id = $curso->getId();
		$sql = "DELETE FROM curso WHERE id = :id";
		    
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
		$sql = "SELECT curso.id, curso.nome, curso.turno, curso.período FROM curso LIMIT 1000";

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
		        $curso = new Curso();
                $curso->setId( $row ['id'] );
                $curso->setNome( $row ['nome'] );
                $curso->setTurno( $row ['turno'] );
                $curso->setPeríodo( $row ['período'] );
                $list [] = $curso;

	
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
        return $list;	
    }
        
                
    public function fetchById(Curso $curso) {
        $lista = array();
	    $id = $curso->getId();
                
        $sql = "SELECT curso.id, curso.nome, curso.turno, curso.período FROM curso
            WHERE curso.id = :id";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ( $result as $row ){
		        $curso = new Curso();
                $curso->setId( $row ['id'] );
                $curso->setNome( $row ['nome'] );
                $curso->setTurno( $row ['turno'] );
                $curso->setPeríodo( $row ['período'] );
                $lista [] = $curso;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fetchByNome(Curso $curso) {
        $lista = array();
	    $nome = $curso->getNome();
                
        $sql = "SELECT curso.id, curso.nome, curso.turno, curso.período FROM curso
            WHERE curso.nome like :nome";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ( $result as $row ){
		        $curso = new Curso();
                $curso->setId( $row ['id'] );
                $curso->setNome( $row ['nome'] );
                $curso->setTurno( $row ['turno'] );
                $curso->setPeríodo( $row ['período'] );
                $lista [] = $curso;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fetchByTurno(Curso $curso) {
        $lista = array();
	    $turno = $curso->getTurno();
                
        $sql = "SELECT curso.id, curso.nome, curso.turno, curso.período FROM curso
            WHERE curso.turno like :turno";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":turno", $turno, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ( $result as $row ){
		        $curso = new Curso();
                $curso->setId( $row ['id'] );
                $curso->setNome( $row ['nome'] );
                $curso->setTurno( $row ['turno'] );
                $curso->setPeríodo( $row ['período'] );
                $lista [] = $curso;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fetchByPeríodo(Curso $curso) {
        $lista = array();
	    $período = $curso->getPeríodo();
                
        $sql = "SELECT curso.id, curso.nome, curso.turno, curso.período FROM curso
            WHERE curso.período like :período";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":período", $período, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ( $result as $row ){
		        $curso = new Curso();
                $curso->setId( $row ['id'] );
                $curso->setNome( $row ['nome'] );
                $curso->setTurno( $row ['turno'] );
                $curso->setPeríodo( $row ['período'] );
                $lista [] = $curso;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fillById(Curso $curso) {
        
	    $id = $curso->getId();
	    $sql = "SELECT curso.id, curso.nome, curso.turno, curso.período FROM curso
                WHERE curso.id = :id
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
                $curso->setId( $row ['id'] );
                $curso->setNome( $row ['nome'] );
                $curso->setTurno( $row ['turno'] );
                $curso->setPeríodo( $row ['período'] );
                
                
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
		return $curso;
    }
                
    public function fillByNome(Curso $curso) {
        
	    $nome = $curso->getNome();
	    $sql = "SELECT curso.id, curso.nome, curso.turno, curso.período FROM curso
                WHERE curso.nome = :nome
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
                $curso->setId( $row ['id'] );
                $curso->setNome( $row ['nome'] );
                $curso->setTurno( $row ['turno'] );
                $curso->setPeríodo( $row ['período'] );
                
                
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
		return $curso;
    }
                
    public function fillByTurno(Curso $curso) {
        
	    $turno = $curso->getTurno();
	    $sql = "SELECT curso.id, curso.nome, curso.turno, curso.período FROM curso
                WHERE curso.turno = :turno
                 LIMIT 1000";
                
        try {
            $stmt = $this->connection->prepare($sql);
                
		    if(!$stmt){
                echo "<br>Mensagem de erro retornada: ".$this->connection->errorInfo()[2]."<br>";
		    }
            $stmt->bindParam(":turno", $turno, PDO::PARAM_STR);
            $stmt->execute();
		    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    foreach ( $result as $row )
            {
                $curso->setId( $row ['id'] );
                $curso->setNome( $row ['nome'] );
                $curso->setTurno( $row ['turno'] );
                $curso->setPeríodo( $row ['período'] );
                
                
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
		return $curso;
    }
                
    public function fillByPeríodo(Curso $curso) {
        
	    $período = $curso->getPeríodo();
	    $sql = "SELECT curso.id, curso.nome, curso.turno, curso.período FROM curso
                WHERE curso.período = :período
                 LIMIT 1000";
                
        try {
            $stmt = $this->connection->prepare($sql);
                
		    if(!$stmt){
                echo "<br>Mensagem de erro retornada: ".$this->connection->errorInfo()[2]."<br>";
		    }
            $stmt->bindParam(":período", $período, PDO::PARAM_STR);
            $stmt->execute();
		    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    foreach ( $result as $row )
            {
                $curso->setId( $row ['id'] );
                $curso->setNome( $row ['nome'] );
                $curso->setTurno( $row ['turno'] );
                $curso->setPeríodo( $row ['período'] );
                
                
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
		return $curso;
    }
}