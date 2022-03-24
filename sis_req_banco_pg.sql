
CREATE TABLE requerente (
        id serial NOT NULL, 
        CONSTRAINT pk_requerente PRIMARY KEY (id), 
        nome character varying(400), 
        email character varying(400), 
        telefone character varying(400), 
        naturalidade character varying(400), 
        data_de_nascimento date, 
        numero_de_matricula integer, 
        filiacao character varying(400), 
        id_curso_id integer NOT NULL
);

CREATE TABLE curso (
        id serial NOT NULL, 
        CONSTRAINT pk_curso PRIMARY KEY (id), 
        nome character varying(400), 
        turno character varying(400), 
        período character varying(400)
);

CREATE TABLE solicitacoes (
        id serial NOT NULL, 
        CONSTRAINT pk_solicitacoes PRIMARY KEY (id), 
        id_requerente_id integer NOT NULL, 
        id_servico_id integer NOT NULL, 
        id_assinatura_id integer NOT NULL
);

CREATE TABLE servico (
        id serial NOT NULL, 
        CONSTRAINT pk_servico PRIMARY KEY (id), 
        numero integer, 
        descricao character varying(400), 
        justificativa character varying(400), 
        especificacao character varying(400), 
        obrigatorio_especificar character varying(400), 
        obrigatorio_justificar character varying(400), 
        id_setor_id integer NOT NULL
);

CREATE TABLE usuario (
        id serial NOT NULL, 
        CONSTRAINT pk_usuario PRIMARY KEY (id), 
        login character varying(400), 
        senha character varying(400), 
        id_tipo integer NOT NULL
);

CREATE TABLE assinaturas (
        id serial NOT NULL, 
        CONSTRAINT pk_assinaturas PRIMARY KEY (id), 
        assinatura_funcionario character varying(400), 
        assinatura_requerente character varying(400), 
        visto_cae character varying(400), 
        visto_biblioteca character varying(400)
);

CREATE TABLE setor (
        id serial NOT NULL, 
        CONSTRAINT pk_setor PRIMARY KEY (id), 
        nome character varying(400), 
        email character varying(400)
);

CREATE TABLE tipo_usuario (
        id serial NOT NULL, 
        CONSTRAINT pk_tipo_usuario PRIMARY KEY (id), 
        nome character varying(400)
);


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
