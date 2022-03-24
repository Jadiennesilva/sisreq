
CREATE TABLE requerente (
    id INTEGER     PRIMARY KEY AUTOINCREMENT,
    nome TEXT ,
    email TEXT ,
    telefone TEXT ,
    naturalidade TEXT ,
    data_de_nascimento TEXT ,
    numero_de_matricula INTEGER ,
    filiacao TEXT ,
    id_curso_id INTEGER NOT NULL
);

CREATE TABLE curso (
    id INTEGER     PRIMARY KEY AUTOINCREMENT,
    nome TEXT ,
    turno TEXT ,
    período TEXT 
);

CREATE TABLE solicitacoes (
    id INTEGER     PRIMARY KEY AUTOINCREMENT,
    id_requerente_id INTEGER NOT NULL,
    id_servico_id INTEGER NOT NULL,
    id_assinatura_id INTEGER NOT NULL
);

CREATE TABLE servico (
    id INTEGER     PRIMARY KEY AUTOINCREMENT,
    numero INTEGER ,
    descricao TEXT ,
    justificativa TEXT ,
    especificacao TEXT ,
    obrigatorio_especificar TEXT ,
    obrigatorio_justificar TEXT ,
    id_setor_id INTEGER NOT NULL
);

CREATE TABLE usuario (
    id INTEGER     PRIMARY KEY AUTOINCREMENT,
    login TEXT ,
    senha TEXT ,
    id_tipo INTEGER NOT NULL
);

CREATE TABLE assinaturas (
    id INTEGER     PRIMARY KEY AUTOINCREMENT,
    assinatura_funcionario TEXT ,
    assinatura_requerente TEXT ,
    visto_cae TEXT ,
    visto_biblioteca TEXT 
);

CREATE TABLE setor (
    id INTEGER     PRIMARY KEY AUTOINCREMENT,
    nome TEXT ,
    email TEXT 
);

CREATE TABLE tipo_usuario (
    id INTEGER     PRIMARY KEY AUTOINCREMENT,
    nome TEXT 
);
