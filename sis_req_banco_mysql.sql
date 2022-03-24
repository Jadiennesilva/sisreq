
CREATE TABLE IF NOT EXISTS requerente (
        id  INT NOT NULL AUTO_INCREMENT , 
        PRIMARY KEY (id), 
        nome VARCHAR(400), 
        email VARCHAR(400), 
        telefone VARCHAR(400), 
        naturalidade VARCHAR(400), 
        data_de_nascimento  DATE , 
        numero_de_matricula INT, 
        filiacao VARCHAR(400), 
        id_curso_id INT NOT NULL
)ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS curso (
        id  INT NOT NULL AUTO_INCREMENT , 
        PRIMARY KEY (id), 
        nome VARCHAR(400), 
        turno VARCHAR(400), 
        período VARCHAR(400)
)ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS solicitacoes (
        id  INT NOT NULL AUTO_INCREMENT , 
        PRIMARY KEY (id), 
        id_requerente_id INT NOT NULL, 
        id_servico_id INT NOT NULL, 
        id_assinatura_id INT NOT NULL
)ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS servico (
        id  INT NOT NULL AUTO_INCREMENT , 
        PRIMARY KEY (id), 
        numero INT, 
        descricao VARCHAR(400), 
        justificativa VARCHAR(400), 
        especificacao VARCHAR(400), 
        obrigatorio_especificar VARCHAR(400), 
        obrigatorio_justificar VARCHAR(400), 
        id_setor_id INT NOT NULL
)ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS usuario (
        id  INT NOT NULL AUTO_INCREMENT , 
        PRIMARY KEY (id), 
        login VARCHAR(400), 
        senha VARCHAR(400), 
        id_tipo INT NOT NULL
)ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS assinaturas (
        id  INT NOT NULL AUTO_INCREMENT , 
        PRIMARY KEY (id), 
        assinatura_funcionario VARCHAR(400), 
        assinatura_requerente VARCHAR(400), 
        visto_cae VARCHAR(400), 
        visto_biblioteca VARCHAR(400)
)ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS setor (
        id  INT NOT NULL AUTO_INCREMENT , 
        PRIMARY KEY (id), 
        nome VARCHAR(400), 
        email VARCHAR(400)
)ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS tipo_usuario (
        id  INT NOT NULL AUTO_INCREMENT , 
        PRIMARY KEY (id), 
        nome VARCHAR(400)
)ENGINE = InnoDB;

ALTER TABLE requerente
    ADD CONSTRAINT fk_requerente_curso_id FOREIGN KEY (id_curso)
    REFERENCES curso (id);

ALTER TABLE solicitacoes
    ADD CONSTRAINT fk_solicitacoes_requerente_id FOREIGN KEY (id_requerente)
    REFERENCES requerente (id);

ALTER TABLE solicitacoes
    ADD CONSTRAINT fk_solicitacoes_servico_id FOREIGN KEY (id_servico)
    REFERENCES servico (id);

ALTER TABLE solicitacoes
    ADD CONSTRAINT fk_solicitacoes_assinatura_id FOREIGN KEY (id_assinaturas)
    REFERENCES assinaturas (id);

ALTER TABLE servico
    ADD CONSTRAINT fk_servico_setor_id FOREIGN KEY (id_setor)
    REFERENCES setor (id);

ALTER TABLE usuario
    ADD CONSTRAINT fk_usuario_tipo FOREIGN KEY (id_tipo_usuario)
    REFERENCES tipo_usuario (id);
