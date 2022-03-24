<?php
            
/**
 * Classe feita para manipulação do objeto Solicitacoes
 * feita automaticamente com programa gerador de software inventado por
 * @author Jefferson Uchôa Ponte
 */
     
namespace SisReq\dao;
use PDO;
use PDOException;
use SisReq\model\Solicitacoes;

class SolicitacoesDAO extends DAO {
    
    

            
            
    public function update(Solicitacoes $solicitacoes)
    {
        $id = $solicitacoes->getId();
            
            
        $sql = "UPDATE solicitacoes
                SET
                
                WHERE solicitacoes.id = :id;";
            
        try {
            
            $stmt = $this->getConnection()->prepare($sql);
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
            
    }
            
            

    public function insert(Solicitacoes $solicitacoes){
        $sql = "INSERT INTO solicitacoes(id_requerente_id, id_servico_id, id_assinatura_id) VALUES (:requerente_id, :servico_id, :assinatura_id);";
		$requerente_id = $solicitacoes->getRequerente_id()->getId();
		$servico_id = $solicitacoes->getServico_id()->getId();
		$assinatura_id = $solicitacoes->getAssinatura_id()->getId();
		try {
			$db = $this->getConnection();
			$stmt = $db->prepare($sql);
			$stmt->bindParam(":requerente_id", $requerente_id, PDO::PARAM_INT);
			$stmt->bindParam(":servico_id", $servico_id, PDO::PARAM_INT);
			$stmt->bindParam(":assinatura_id", $assinatura_id, PDO::PARAM_INT);
			return $stmt->execute();
		} catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
            
    }
    public function insertWithPK(Solicitacoes $solicitacoes){
        $sql = "INSERT INTO solicitacoes(id, id_requerente_id, id_servico_id, id_assinatura_id) VALUES (:id, :requerente_id, :servico_id, :assinatura_id);";
		$id = $solicitacoes->getId();
		$requerente_id = $solicitacoes->getRequerente_id()->getId();
		$servico_id = $solicitacoes->getServico_id()->getId();
		$assinatura_id = $solicitacoes->getAssinatura_id()->getId();
		try {
			$db = $this->getConnection();
			$stmt = $db->prepare($sql);
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);
			$stmt->bindParam(":requerente_id", $requerente_id, PDO::PARAM_INT);
			$stmt->bindParam(":servico_id", $servico_id, PDO::PARAM_INT);
			$stmt->bindParam(":assinatura_id", $assinatura_id, PDO::PARAM_INT);
			return $stmt->execute();
		} catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
            
    }

	public function delete(Solicitacoes $solicitacoes){
		$id = $solicitacoes->getId();
		$sql = "DELETE FROM solicitacoes WHERE id = :id";
		    
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
		$sql = "SELECT solicitacoes.id, requerente_id.id as id_requerente_requerente_id, requerente_id.nome as nome_requerente_requerente_id, requerente_id.email as email_requerente_requerente_id, requerente_id.telefone as telefone_requerente_requerente_id, requerente_id.naturalidade as naturalidade_requerente_requerente_id, requerente_id.data_de_nascimento as data_de_nascimento_requerente_requerente_id, requerente_id.numero_de_matricula as numero_de_matricula_requerente_requerente_id, requerente_id.filiacao as filiacao_requerente_requerente_id, servico_id.id as id_servico_servico_id, servico_id.numero as numero_servico_servico_id, servico_id.descricao as descricao_servico_servico_id, servico_id.justificativa as justificativa_servico_servico_id, servico_id.especificacao as especificacao_servico_servico_id, servico_id.obrigatorio_especificar as obrigatorio_especificar_servico_servico_id, servico_id.obrigatorio_justificar as obrigatorio_justificar_servico_servico_id, assinatura_id.id as id_assinaturas_assinatura_id, assinatura_id.assinatura_funcionario as assinatura_funcionario_assinaturas_assinatura_id, assinatura_id.assinatura_requerente as assinatura_requerente_assinaturas_assinatura_id, assinatura_id.visto_cae as visto_cae_assinaturas_assinatura_id, assinatura_id.visto_biblioteca as visto_biblioteca_assinaturas_assinatura_id FROM solicitacoes INNER JOIN requerente as requerente_id ON requerente_id.id = solicitacoes.id_requerente_id INNER JOIN servico as servico_id ON servico_id.id = solicitacoes.id_servico_id INNER JOIN assinaturas as assinatura_id ON assinatura_id.id = solicitacoes.id_assinatura_id LIMIT 1000";

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
		        $solicitacoes = new Solicitacoes();
                $solicitacoes->setId( $row ['id'] );
                $solicitacoes->getRequerente_id()->setId( $row ['id_requerente_requerente_id'] );
                $solicitacoes->getRequerente_id()->setNome( $row ['nome_requerente_requerente_id'] );
                $solicitacoes->getRequerente_id()->setEmail( $row ['email_requerente_requerente_id'] );
                $solicitacoes->getRequerente_id()->setTelefone( $row ['telefone_requerente_requerente_id'] );
                $solicitacoes->getRequerente_id()->setNaturalidade( $row ['naturalidade_requerente_requerente_id'] );
                $solicitacoes->getRequerente_id()->setData_de_nascimento( $row ['data_de_nascimento_requerente_requerente_id'] );
                $solicitacoes->getRequerente_id()->setNumero_de_matricula( $row ['numero_de_matricula_requerente_requerente_id'] );
                $solicitacoes->getRequerente_id()->setFiliacao( $row ['filiacao_requerente_requerente_id'] );
                $solicitacoes->getServico_id()->setId( $row ['id_servico_servico_id'] );
                $solicitacoes->getServico_id()->setNumero( $row ['numero_servico_servico_id'] );
                $solicitacoes->getServico_id()->setDescricao( $row ['descricao_servico_servico_id'] );
                $solicitacoes->getServico_id()->setJustificativa( $row ['justificativa_servico_servico_id'] );
                $solicitacoes->getServico_id()->setEspecificacao( $row ['especificacao_servico_servico_id'] );
                $solicitacoes->getServico_id()->setObrigatorio_especificar( $row ['obrigatorio_especificar_servico_servico_id'] );
                $solicitacoes->getServico_id()->setObrigatorio_justificar( $row ['obrigatorio_justificar_servico_servico_id'] );
                $solicitacoes->getAssinatura_id()->setId( $row ['id_assinaturas_assinatura_id'] );
                $solicitacoes->getAssinatura_id()->setAssinatura_funcionario( $row ['assinatura_funcionario_assinaturas_assinatura_id'] );
                $solicitacoes->getAssinatura_id()->setAssinatura_requerente( $row ['assinatura_requerente_assinaturas_assinatura_id'] );
                $solicitacoes->getAssinatura_id()->setVisto_CAE( $row ['visto_cae_assinaturas_assinatura_id'] );
                $solicitacoes->getAssinatura_id()->setVisto_biblioteca( $row ['visto_biblioteca_assinaturas_assinatura_id'] );
                $list [] = $solicitacoes;

	
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
        return $list;	
    }
        
                
    public function fetchById(Solicitacoes $solicitacoes) {
        $lista = array();
	    $id = $solicitacoes->getId();
                
        $sql = "SELECT solicitacoes.id, requerente_id.id as id_requerente_requerente_id, requerente_id.nome as nome_requerente_requerente_id, requerente_id.email as email_requerente_requerente_id, requerente_id.telefone as telefone_requerente_requerente_id, requerente_id.naturalidade as naturalidade_requerente_requerente_id, requerente_id.data_de_nascimento as data_de_nascimento_requerente_requerente_id, requerente_id.numero_de_matricula as numero_de_matricula_requerente_requerente_id, requerente_id.filiacao as filiacao_requerente_requerente_id, servico_id.id as id_servico_servico_id, servico_id.numero as numero_servico_servico_id, servico_id.descricao as descricao_servico_servico_id, servico_id.justificativa as justificativa_servico_servico_id, servico_id.especificacao as especificacao_servico_servico_id, servico_id.obrigatorio_especificar as obrigatorio_especificar_servico_servico_id, servico_id.obrigatorio_justificar as obrigatorio_justificar_servico_servico_id, assinatura_id.id as id_assinaturas_assinatura_id, assinatura_id.assinatura_funcionario as assinatura_funcionario_assinaturas_assinatura_id, assinatura_id.assinatura_requerente as assinatura_requerente_assinaturas_assinatura_id, assinatura_id.visto_cae as visto_cae_assinaturas_assinatura_id, assinatura_id.visto_biblioteca as visto_biblioteca_assinaturas_assinatura_id FROM solicitacoes INNER JOIN requerente as requerente_id ON requerente_id.id = solicitacoes.id_requerente_id INNER JOIN servico as servico_id ON servico_id.id = solicitacoes.id_servico_id INNER JOIN assinaturas as assinatura_id ON assinatura_id.id = solicitacoes.id_assinatura_id
            WHERE solicitacoes.id = :id";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ( $result as $row ){
		        $solicitacoes = new Solicitacoes();
                $solicitacoes->setId( $row ['id'] );
                $solicitacoes->getRequerente_id()->setId( $row ['id_requerente_requerente_id'] );
                $solicitacoes->getRequerente_id()->setNome( $row ['nome_requerente_requerente_id'] );
                $solicitacoes->getRequerente_id()->setEmail( $row ['email_requerente_requerente_id'] );
                $solicitacoes->getRequerente_id()->setTelefone( $row ['telefone_requerente_requerente_id'] );
                $solicitacoes->getRequerente_id()->setNaturalidade( $row ['naturalidade_requerente_requerente_id'] );
                $solicitacoes->getRequerente_id()->setData_de_nascimento( $row ['data_de_nascimento_requerente_requerente_id'] );
                $solicitacoes->getRequerente_id()->setNumero_de_matricula( $row ['numero_de_matricula_requerente_requerente_id'] );
                $solicitacoes->getRequerente_id()->setFiliacao( $row ['filiacao_requerente_requerente_id'] );
                $solicitacoes->getServico_id()->setId( $row ['id_servico_servico_id'] );
                $solicitacoes->getServico_id()->setNumero( $row ['numero_servico_servico_id'] );
                $solicitacoes->getServico_id()->setDescricao( $row ['descricao_servico_servico_id'] );
                $solicitacoes->getServico_id()->setJustificativa( $row ['justificativa_servico_servico_id'] );
                $solicitacoes->getServico_id()->setEspecificacao( $row ['especificacao_servico_servico_id'] );
                $solicitacoes->getServico_id()->setObrigatorio_especificar( $row ['obrigatorio_especificar_servico_servico_id'] );
                $solicitacoes->getServico_id()->setObrigatorio_justificar( $row ['obrigatorio_justificar_servico_servico_id'] );
                $solicitacoes->getAssinatura_id()->setId( $row ['id_assinaturas_assinatura_id'] );
                $solicitacoes->getAssinatura_id()->setAssinatura_funcionario( $row ['assinatura_funcionario_assinaturas_assinatura_id'] );
                $solicitacoes->getAssinatura_id()->setAssinatura_requerente( $row ['assinatura_requerente_assinaturas_assinatura_id'] );
                $solicitacoes->getAssinatura_id()->setVisto_CAE( $row ['visto_cae_assinaturas_assinatura_id'] );
                $solicitacoes->getAssinatura_id()->setVisto_biblioteca( $row ['visto_biblioteca_assinaturas_assinatura_id'] );
                $lista [] = $solicitacoes;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fetchByRequerente_id(Solicitacoes $solicitacoes) {
        $lista = array();
	    $requerente_id = $solicitacoes->getRequerente_id()->getId();
                
        $sql = "SELECT solicitacoes.id, requerente_id.id as id_requerente_requerente_id, requerente_id.nome as nome_requerente_requerente_id, requerente_id.email as email_requerente_requerente_id, requerente_id.telefone as telefone_requerente_requerente_id, requerente_id.naturalidade as naturalidade_requerente_requerente_id, requerente_id.data_de_nascimento as data_de_nascimento_requerente_requerente_id, requerente_id.numero_de_matricula as numero_de_matricula_requerente_requerente_id, requerente_id.filiacao as filiacao_requerente_requerente_id, servico_id.id as id_servico_servico_id, servico_id.numero as numero_servico_servico_id, servico_id.descricao as descricao_servico_servico_id, servico_id.justificativa as justificativa_servico_servico_id, servico_id.especificacao as especificacao_servico_servico_id, servico_id.obrigatorio_especificar as obrigatorio_especificar_servico_servico_id, servico_id.obrigatorio_justificar as obrigatorio_justificar_servico_servico_id, assinatura_id.id as id_assinaturas_assinatura_id, assinatura_id.assinatura_funcionario as assinatura_funcionario_assinaturas_assinatura_id, assinatura_id.assinatura_requerente as assinatura_requerente_assinaturas_assinatura_id, assinatura_id.visto_cae as visto_cae_assinaturas_assinatura_id, assinatura_id.visto_biblioteca as visto_biblioteca_assinaturas_assinatura_id FROM solicitacoes INNER JOIN requerente as requerente_id ON requerente_id.id = solicitacoes.id_requerente_id INNER JOIN servico as servico_id ON servico_id.id = solicitacoes.id_servico_id INNER JOIN assinaturas as assinatura_id ON assinatura_id.id = solicitacoes.id_assinatura_id
            WHERE solicitacoes.id_requerente_id = :requerente_id";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":requerente_id", $requerente_id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ( $result as $row ){
		        $solicitacoes = new Solicitacoes();
                $solicitacoes->setId( $row ['id'] );
                $solicitacoes->getRequerente_id()->setId( $row ['id_requerente_requerente_id'] );
                $solicitacoes->getRequerente_id()->setNome( $row ['nome_requerente_requerente_id'] );
                $solicitacoes->getRequerente_id()->setEmail( $row ['email_requerente_requerente_id'] );
                $solicitacoes->getRequerente_id()->setTelefone( $row ['telefone_requerente_requerente_id'] );
                $solicitacoes->getRequerente_id()->setNaturalidade( $row ['naturalidade_requerente_requerente_id'] );
                $solicitacoes->getRequerente_id()->setData_de_nascimento( $row ['data_de_nascimento_requerente_requerente_id'] );
                $solicitacoes->getRequerente_id()->setNumero_de_matricula( $row ['numero_de_matricula_requerente_requerente_id'] );
                $solicitacoes->getRequerente_id()->setFiliacao( $row ['filiacao_requerente_requerente_id'] );
                $solicitacoes->getServico_id()->setId( $row ['id_servico_servico_id'] );
                $solicitacoes->getServico_id()->setNumero( $row ['numero_servico_servico_id'] );
                $solicitacoes->getServico_id()->setDescricao( $row ['descricao_servico_servico_id'] );
                $solicitacoes->getServico_id()->setJustificativa( $row ['justificativa_servico_servico_id'] );
                $solicitacoes->getServico_id()->setEspecificacao( $row ['especificacao_servico_servico_id'] );
                $solicitacoes->getServico_id()->setObrigatorio_especificar( $row ['obrigatorio_especificar_servico_servico_id'] );
                $solicitacoes->getServico_id()->setObrigatorio_justificar( $row ['obrigatorio_justificar_servico_servico_id'] );
                $solicitacoes->getAssinatura_id()->setId( $row ['id_assinaturas_assinatura_id'] );
                $solicitacoes->getAssinatura_id()->setAssinatura_funcionario( $row ['assinatura_funcionario_assinaturas_assinatura_id'] );
                $solicitacoes->getAssinatura_id()->setAssinatura_requerente( $row ['assinatura_requerente_assinaturas_assinatura_id'] );
                $solicitacoes->getAssinatura_id()->setVisto_CAE( $row ['visto_cae_assinaturas_assinatura_id'] );
                $solicitacoes->getAssinatura_id()->setVisto_biblioteca( $row ['visto_biblioteca_assinaturas_assinatura_id'] );
                $lista [] = $solicitacoes;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fetchByServico_id(Solicitacoes $solicitacoes) {
        $lista = array();
	    $servico_id = $solicitacoes->getServico_id()->getId();
                
        $sql = "SELECT solicitacoes.id, requerente_id.id as id_requerente_requerente_id, requerente_id.nome as nome_requerente_requerente_id, requerente_id.email as email_requerente_requerente_id, requerente_id.telefone as telefone_requerente_requerente_id, requerente_id.naturalidade as naturalidade_requerente_requerente_id, requerente_id.data_de_nascimento as data_de_nascimento_requerente_requerente_id, requerente_id.numero_de_matricula as numero_de_matricula_requerente_requerente_id, requerente_id.filiacao as filiacao_requerente_requerente_id, servico_id.id as id_servico_servico_id, servico_id.numero as numero_servico_servico_id, servico_id.descricao as descricao_servico_servico_id, servico_id.justificativa as justificativa_servico_servico_id, servico_id.especificacao as especificacao_servico_servico_id, servico_id.obrigatorio_especificar as obrigatorio_especificar_servico_servico_id, servico_id.obrigatorio_justificar as obrigatorio_justificar_servico_servico_id, assinatura_id.id as id_assinaturas_assinatura_id, assinatura_id.assinatura_funcionario as assinatura_funcionario_assinaturas_assinatura_id, assinatura_id.assinatura_requerente as assinatura_requerente_assinaturas_assinatura_id, assinatura_id.visto_cae as visto_cae_assinaturas_assinatura_id, assinatura_id.visto_biblioteca as visto_biblioteca_assinaturas_assinatura_id FROM solicitacoes INNER JOIN requerente as requerente_id ON requerente_id.id = solicitacoes.id_requerente_id INNER JOIN servico as servico_id ON servico_id.id = solicitacoes.id_servico_id INNER JOIN assinaturas as assinatura_id ON assinatura_id.id = solicitacoes.id_assinatura_id
            WHERE solicitacoes.id_servico_id = :servico_id";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":servico_id", $servico_id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ( $result as $row ){
		        $solicitacoes = new Solicitacoes();
                $solicitacoes->setId( $row ['id'] );
                $solicitacoes->getRequerente_id()->setId( $row ['id_requerente_requerente_id'] );
                $solicitacoes->getRequerente_id()->setNome( $row ['nome_requerente_requerente_id'] );
                $solicitacoes->getRequerente_id()->setEmail( $row ['email_requerente_requerente_id'] );
                $solicitacoes->getRequerente_id()->setTelefone( $row ['telefone_requerente_requerente_id'] );
                $solicitacoes->getRequerente_id()->setNaturalidade( $row ['naturalidade_requerente_requerente_id'] );
                $solicitacoes->getRequerente_id()->setData_de_nascimento( $row ['data_de_nascimento_requerente_requerente_id'] );
                $solicitacoes->getRequerente_id()->setNumero_de_matricula( $row ['numero_de_matricula_requerente_requerente_id'] );
                $solicitacoes->getRequerente_id()->setFiliacao( $row ['filiacao_requerente_requerente_id'] );
                $solicitacoes->getServico_id()->setId( $row ['id_servico_servico_id'] );
                $solicitacoes->getServico_id()->setNumero( $row ['numero_servico_servico_id'] );
                $solicitacoes->getServico_id()->setDescricao( $row ['descricao_servico_servico_id'] );
                $solicitacoes->getServico_id()->setJustificativa( $row ['justificativa_servico_servico_id'] );
                $solicitacoes->getServico_id()->setEspecificacao( $row ['especificacao_servico_servico_id'] );
                $solicitacoes->getServico_id()->setObrigatorio_especificar( $row ['obrigatorio_especificar_servico_servico_id'] );
                $solicitacoes->getServico_id()->setObrigatorio_justificar( $row ['obrigatorio_justificar_servico_servico_id'] );
                $solicitacoes->getAssinatura_id()->setId( $row ['id_assinaturas_assinatura_id'] );
                $solicitacoes->getAssinatura_id()->setAssinatura_funcionario( $row ['assinatura_funcionario_assinaturas_assinatura_id'] );
                $solicitacoes->getAssinatura_id()->setAssinatura_requerente( $row ['assinatura_requerente_assinaturas_assinatura_id'] );
                $solicitacoes->getAssinatura_id()->setVisto_CAE( $row ['visto_cae_assinaturas_assinatura_id'] );
                $solicitacoes->getAssinatura_id()->setVisto_biblioteca( $row ['visto_biblioteca_assinaturas_assinatura_id'] );
                $lista [] = $solicitacoes;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fetchByAssinatura_id(Solicitacoes $solicitacoes) {
        $lista = array();
	    $assinatura_id = $solicitacoes->getAssinatura_id()->getId();
                
        $sql = "SELECT solicitacoes.id, requerente_id.id as id_requerente_requerente_id, requerente_id.nome as nome_requerente_requerente_id, requerente_id.email as email_requerente_requerente_id, requerente_id.telefone as telefone_requerente_requerente_id, requerente_id.naturalidade as naturalidade_requerente_requerente_id, requerente_id.data_de_nascimento as data_de_nascimento_requerente_requerente_id, requerente_id.numero_de_matricula as numero_de_matricula_requerente_requerente_id, requerente_id.filiacao as filiacao_requerente_requerente_id, servico_id.id as id_servico_servico_id, servico_id.numero as numero_servico_servico_id, servico_id.descricao as descricao_servico_servico_id, servico_id.justificativa as justificativa_servico_servico_id, servico_id.especificacao as especificacao_servico_servico_id, servico_id.obrigatorio_especificar as obrigatorio_especificar_servico_servico_id, servico_id.obrigatorio_justificar as obrigatorio_justificar_servico_servico_id, assinatura_id.id as id_assinaturas_assinatura_id, assinatura_id.assinatura_funcionario as assinatura_funcionario_assinaturas_assinatura_id, assinatura_id.assinatura_requerente as assinatura_requerente_assinaturas_assinatura_id, assinatura_id.visto_cae as visto_cae_assinaturas_assinatura_id, assinatura_id.visto_biblioteca as visto_biblioteca_assinaturas_assinatura_id FROM solicitacoes INNER JOIN requerente as requerente_id ON requerente_id.id = solicitacoes.id_requerente_id INNER JOIN servico as servico_id ON servico_id.id = solicitacoes.id_servico_id INNER JOIN assinaturas as assinatura_id ON assinatura_id.id = solicitacoes.id_assinatura_id
            WHERE solicitacoes.id_assinatura_id = :assinatura_id";
                
        try {
                
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(":assinatura_id", $assinatura_id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ( $result as $row ){
		        $solicitacoes = new Solicitacoes();
                $solicitacoes->setId( $row ['id'] );
                $solicitacoes->getRequerente_id()->setId( $row ['id_requerente_requerente_id'] );
                $solicitacoes->getRequerente_id()->setNome( $row ['nome_requerente_requerente_id'] );
                $solicitacoes->getRequerente_id()->setEmail( $row ['email_requerente_requerente_id'] );
                $solicitacoes->getRequerente_id()->setTelefone( $row ['telefone_requerente_requerente_id'] );
                $solicitacoes->getRequerente_id()->setNaturalidade( $row ['naturalidade_requerente_requerente_id'] );
                $solicitacoes->getRequerente_id()->setData_de_nascimento( $row ['data_de_nascimento_requerente_requerente_id'] );
                $solicitacoes->getRequerente_id()->setNumero_de_matricula( $row ['numero_de_matricula_requerente_requerente_id'] );
                $solicitacoes->getRequerente_id()->setFiliacao( $row ['filiacao_requerente_requerente_id'] );
                $solicitacoes->getServico_id()->setId( $row ['id_servico_servico_id'] );
                $solicitacoes->getServico_id()->setNumero( $row ['numero_servico_servico_id'] );
                $solicitacoes->getServico_id()->setDescricao( $row ['descricao_servico_servico_id'] );
                $solicitacoes->getServico_id()->setJustificativa( $row ['justificativa_servico_servico_id'] );
                $solicitacoes->getServico_id()->setEspecificacao( $row ['especificacao_servico_servico_id'] );
                $solicitacoes->getServico_id()->setObrigatorio_especificar( $row ['obrigatorio_especificar_servico_servico_id'] );
                $solicitacoes->getServico_id()->setObrigatorio_justificar( $row ['obrigatorio_justificar_servico_servico_id'] );
                $solicitacoes->getAssinatura_id()->setId( $row ['id_assinaturas_assinatura_id'] );
                $solicitacoes->getAssinatura_id()->setAssinatura_funcionario( $row ['assinatura_funcionario_assinaturas_assinatura_id'] );
                $solicitacoes->getAssinatura_id()->setAssinatura_requerente( $row ['assinatura_requerente_assinaturas_assinatura_id'] );
                $solicitacoes->getAssinatura_id()->setVisto_CAE( $row ['visto_cae_assinaturas_assinatura_id'] );
                $solicitacoes->getAssinatura_id()->setVisto_biblioteca( $row ['visto_biblioteca_assinaturas_assinatura_id'] );
                $lista [] = $solicitacoes;

	
		    }
    			    
        } catch(PDOException $e) {
            echo $e->getMessage();
    			    
        }
		return $lista;
    }
                
    public function fillById(Solicitacoes $solicitacoes) {
        
	    $id = $solicitacoes->getId();
	    $sql = "SELECT solicitacoes.id, requerente_id.id as id_requerente_requerente_id, requerente_id.nome as nome_requerente_requerente_id, requerente_id.email as email_requerente_requerente_id, requerente_id.telefone as telefone_requerente_requerente_id, requerente_id.naturalidade as naturalidade_requerente_requerente_id, requerente_id.data_de_nascimento as data_de_nascimento_requerente_requerente_id, requerente_id.numero_de_matricula as numero_de_matricula_requerente_requerente_id, requerente_id.filiacao as filiacao_requerente_requerente_id, servico_id.id as id_servico_servico_id, servico_id.numero as numero_servico_servico_id, servico_id.descricao as descricao_servico_servico_id, servico_id.justificativa as justificativa_servico_servico_id, servico_id.especificacao as especificacao_servico_servico_id, servico_id.obrigatorio_especificar as obrigatorio_especificar_servico_servico_id, servico_id.obrigatorio_justificar as obrigatorio_justificar_servico_servico_id, assinatura_id.id as id_assinaturas_assinatura_id, assinatura_id.assinatura_funcionario as assinatura_funcionario_assinaturas_assinatura_id, assinatura_id.assinatura_requerente as assinatura_requerente_assinaturas_assinatura_id, assinatura_id.visto_cae as visto_cae_assinaturas_assinatura_id, assinatura_id.visto_biblioteca as visto_biblioteca_assinaturas_assinatura_id FROM solicitacoes INNER JOIN requerente as requerente_id ON requerente_id.id = solicitacoes.id_requerente_id INNER JOIN servico as servico_id ON servico_id.id = solicitacoes.id_servico_id INNER JOIN assinaturas as assinatura_id ON assinatura_id.id = solicitacoes.id_assinatura_id
                WHERE solicitacoes.id = :id
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
                $solicitacoes->setId( $row ['id'] );
                $solicitacoes->getRequerente_id()->setId( $row ['id_requerente_requerente_id'] );
                $solicitacoes->getRequerente_id()->setNome( $row ['nome_requerente_requerente_id'] );
                $solicitacoes->getRequerente_id()->setEmail( $row ['email_requerente_requerente_id'] );
                $solicitacoes->getRequerente_id()->setTelefone( $row ['telefone_requerente_requerente_id'] );
                $solicitacoes->getRequerente_id()->setNaturalidade( $row ['naturalidade_requerente_requerente_id'] );
                $solicitacoes->getRequerente_id()->setData_de_nascimento( $row ['data_de_nascimento_requerente_requerente_id'] );
                $solicitacoes->getRequerente_id()->setNumero_de_matricula( $row ['numero_de_matricula_requerente_requerente_id'] );
                $solicitacoes->getRequerente_id()->setFiliacao( $row ['filiacao_requerente_requerente_id'] );
                $solicitacoes->getServico_id()->setId( $row ['id_servico_servico_id'] );
                $solicitacoes->getServico_id()->setNumero( $row ['numero_servico_servico_id'] );
                $solicitacoes->getServico_id()->setDescricao( $row ['descricao_servico_servico_id'] );
                $solicitacoes->getServico_id()->setJustificativa( $row ['justificativa_servico_servico_id'] );
                $solicitacoes->getServico_id()->setEspecificacao( $row ['especificacao_servico_servico_id'] );
                $solicitacoes->getServico_id()->setObrigatorio_especificar( $row ['obrigatorio_especificar_servico_servico_id'] );
                $solicitacoes->getServico_id()->setObrigatorio_justificar( $row ['obrigatorio_justificar_servico_servico_id'] );
                $solicitacoes->getAssinatura_id()->setId( $row ['id_assinaturas_assinatura_id'] );
                $solicitacoes->getAssinatura_id()->setAssinatura_funcionario( $row ['assinatura_funcionario_assinaturas_assinatura_id'] );
                $solicitacoes->getAssinatura_id()->setAssinatura_requerente( $row ['assinatura_requerente_assinaturas_assinatura_id'] );
                $solicitacoes->getAssinatura_id()->setVisto_CAE( $row ['visto_cae_assinaturas_assinatura_id'] );
                $solicitacoes->getAssinatura_id()->setVisto_biblioteca( $row ['visto_biblioteca_assinaturas_assinatura_id'] );
                
                
		    }
		} catch(PDOException $e) {
		    echo $e->getMessage();
 		}
		return $solicitacoes;
    }
}