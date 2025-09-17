
-- Tabela: Utilizadores
CREATE TABLE Utilizadores (
    id_utilizador INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    senha VARCHAR(255),
    tipo ENUM('admin', 'inspetor', 'operador')
);

-- Tabela: Locais
CREATE TABLE Locais (
    id_local INT AUTO_INCREMENT PRIMARY KEY,
    nome_local VARCHAR(100),
    descricao TEXT,
    gps_latitude DECIMAL(10, 6),
    gps_longitude DECIMAL(10, 6)
);

-- Tabela: Extintores
CREATE TABLE Extintores (
    id_extintor INT AUTO_INCREMENT PRIMARY KEY,
    codigo_qr VARCHAR(100) UNIQUE,
    tipo_extintor VARCHAR(50),
    data_validade DATE,
    localizacao VARCHAR(255),
    status ENUM('ativo', 'vencido', 'em manutencao'),
    id_local INT,
    FOREIGN KEY (id_local) REFERENCES Locais(id_local)
);

-- Tabela: Inspecoes
CREATE TABLE Inspecoes (
    id_inspecao INT AUTO_INCREMENT PRIMARY KEY,
    id_extintor INT,
    id_utilizador INT,
    data_inspecao DATE,
    observacoes TEXT,
    foto VARCHAR(255),
    assinatura_digital TEXT,
    gps_latitude DECIMAL(10, 6),
    gps_longitude DECIMAL(10, 6),
    FOREIGN KEY (id_extintor) REFERENCES Extintores(id_extintor),
    FOREIGN KEY (id_utilizador) REFERENCES Utilizadores(id_utilizador)
);

-- Tabela: Materiais
CREATE TABLE Materiais (
    id_material INT AUTO_INCREMENT PRIMARY KEY,
    nome_material VARCHAR(100),
    quantidade INT,
    unidade VARCHAR(20),
    local_armazenamento VARCHAR(100),
    data_entrada DATE,
    data_saida DATE
);

-- Tabela: Movimentacoes
CREATE TABLE Movimentacoes (
    id_movimentacao INT AUTO_INCREMENT PRIMARY KEY,
    id_material INT,
    tipo_movimentacao ENUM('entrada', 'saida'),
    quantidade INT,
    data_movimentacao DATE,
    id_utilizador INT,
    FOREIGN KEY (id_material) REFERENCES Materiais(id_material),
    FOREIGN KEY (id_utilizador) REFERENCES Utilizadores(id_utilizador)
);
