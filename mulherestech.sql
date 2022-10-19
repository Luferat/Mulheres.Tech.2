-- Apagar o banco de dados caso ele exista:
DROP DATABASE IF EXISTS mulherestech;

-- Recria o banco de dados usando UTF-8 e buscas case-insensitive:
CREATE DATABASE mulherestech CHARACTER SET utf8 COLLATE utf8_general_ci;

-- Seleciona banco de dados:
USE mulherestech;

-- Cria tabela users:
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Preenche a data com agora.
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    photo VARCHAR(255),
    birth DATE,
    bio TEXT,
    type ENUM('admin', 'author', 'moderator', 'user') DEFAULT 'user',
    last_login DATETIME,
    status ENUM('online', 'offline', 'deleted') DEFAULT 'online'
);

-- Cadastra alguns usuários para testes:
INSERT INTO users (
    name,
    email,
    password,
    photo,
    birth,
    bio,
    type
) VALUES (
    'Joca da Silva',
    'joca@silva.com',
    SHA1('senha123'), -- Criptografa a senha usando chaves SHA1.
    'https://randomuser.me/api/portraits/men/14.jpg',
    '1990-12-14',
    'Pintor, programador, escultor e enrolador.',
    'author'
), (
    'Marineuza Siriliano',
    'mari@neuza.com',
    SHA1('senha123'), -- Criptografa a senha usando chaves SHA1.
    'https://randomuser.me/api/portraits/women/72.jpg',
    '2002-03-21',
    'Escritora, montadora, organizadora e professora.',
    'author'
);

-- Cria tabela articles:
CREATE TABLE articles (
    id INT PRIMARY KEY AUTO_INCREMENT,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Preenche a data com agora.
    author INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    content LONGTEXT NOT NULL,
    thumbnail VARCHAR(255) NOT NULL,
    resume VARCHAR(255) NOT NULL,
    status ENUM('online', 'offline', 'deleted') DEFAULT 'online',
    views INT DEFAULT 0,
    -- Define author como chave estrangeira.
    FOREIGN KEY (author) REFERENCES users (id)
);

-- Insere alguns artigos para testes:
INSERT INTO articles (
    author,
    title,
    content,
    thumbnail,
    resume
) VALUES (
    '1',
    'Por que as folhas são verdes',
    '<h2>Título de teste</h2><p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo quia provident reiciendis earum, tenetur reprehenderit iure ipsum fugit praesentium alias deserunt sed maiores id rerum odio delectus perferendis voluptatum totam!</p><p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero hic, modi pariatur culpa animi cum! Consequatur, odit! Repudiandae, dolorem temporibus, quaerat, unde enim error eum minus praesentium libero quibusdam consequuntur.</p><img src="https://picsum.photos/200/200" alt="Imagem aleatória." /><p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia recusandae illum aliquam aperiam, laborum fugiat quos sunt expedita culpa! Minima harum mollitia aperiam nihil dolorem animi accusantium quia maxime expedita.</p><h3>Lista de links:</h3><ul><li><a href="https://github.com/Luferat">GitHub do Fessô</a></li><li><a href="https://catabits.com.br">Blog do Fessô</a></li><li><a href="https://facebook.com/Luferat">Facebook do Fessô</a></li></ul><p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquam commodi inventore nemo doloribus asperiores provident, recusandae maxime quam molestiae sapiente autem, suscipit perspiciatis. Numquam labore minima, accusamus vitae exercitationem quod!</p>',
    'https://picsum.photos/200',
    'Saiba a origem da cor verde nas folhas das arvores que tem folhas verdes.'
), (
    '2',
    'Por que os peixes nadam',
    '<h2>Título de teste</h2><p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo quia provident reiciendis earum, tenetur reprehenderit iure ipsum fugit praesentium alias deserunt sed maiores id rerum odio delectus perferendis voluptatum totam!</p><p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero hic, modi pariatur culpa animi cum! Consequatur, odit! Repudiandae, dolorem temporibus, quaerat, unde enim error eum minus praesentium libero quibusdam consequuntur.</p><img src="https://picsum.photos/200/200" alt="Imagem aleatória." /><p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia recusandae illum aliquam aperiam, laborum fugiat quos sunt expedita culpa! Minima harum mollitia aperiam nihil dolorem animi accusantium quia maxime expedita.</p><h3>Lista de links:</h3><ul><li><a href="https://github.com/Luferat">GitHub do Fessô</a></li><li><a href="https://catabits.com.br">Blog do Fessô</a></li><li><a href="https://facebook.com/Luferat">Facebook do Fessô</a></li></ul><p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquam commodi inventore nemo doloribus asperiores provident, recusandae maxime quam molestiae sapiente autem, suscipit perspiciatis. Numquam labore minima, accusamus vitae exercitationem quod!</p>',
    'https://picsum.photos/199',
    'Alguns peixes nadam melhor que outros. Sabe por que?'
);
