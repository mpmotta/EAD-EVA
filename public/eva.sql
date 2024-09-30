-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 30/09/2024 às 04:08
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `eva`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `alunos`
--

CREATE TABLE `alunos` (
  `id_aluno` int(11) NOT NULL,
  `nome` varchar(90) NOT NULL,
  `avatar` varchar(90) DEFAULT 'avatar.png',
  `ra` int(11) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `email` varchar(90) NOT NULL,
  `fone` varchar(15) DEFAULT NULL,
  `curso` varchar(90) DEFAULT NULL,
  `turno` varchar(10) DEFAULT NULL,
  `data_criado` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_editado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `alunos`
--

INSERT INTO `alunos` (`id_aluno`, `nome`, `avatar`, `ra`, `cpf`, `email`, `fone`, `curso`, `turno`, `data_criado`, `data_editado`) VALUES
(13, 'Jose da Silva', 'avatar.png', 564564, '56456454', 'jsilva@gmail.com', '(51) 847-47985', 'Administração', 'noite', '2024-09-29 21:54:34', '2024-09-29 21:54:34'),
(14, 'Rhian Silva', 'avatar.png', 84132351, '534.654.745-54', 'rihan@gmail.com', '(51) 3456-8974', 'Técnico em Informática', 'tarde', '2024-09-29 21:56:29', '2024-09-29 21:56:29');

--
-- Acionadores `alunos`
--
DELIMITER $$
CREATE TRIGGER `trg_after_insert` AFTER INSERT ON `alunos` FOR EACH ROW BEGIN
    INSERT INTO usuarios (username, email)
    VALUES (NEW.ra, NEW.email);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `professores`
--

CREATE TABLE `professores` (
  `id_prof` int(11) NOT NULL,
  `nome` varchar(90) NOT NULL,
  `email` varchar(90) NOT NULL,
  `fone` varchar(15) NOT NULL,
  `data_criado` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_editado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `professores`
--

INSERT INTO `professores` (`id_prof`, `nome`, `email`, `fone`, `data_criado`, `data_editado`) VALUES
(2, 'Elias Almeida Ramos', 'elias_ramos@gmail.com', '(51) 98407-4070', '2024-09-29 16:44:26', '2024-09-29 16:44:26'),
(3, 'Alexandre Bonnamin', 'bonnamin@gmail.com', '(51) 99887-6655', '2024-09-29 16:44:57', '2024-09-29 16:44:57'),
(4, 'Carla Souto', 'carla.souto@gmail.com', '(51) 98844-5577', '2024-09-29 16:45:23', '2024-09-29 16:45:23'),
(5, 'Jose Mendes', 'mendes@gmail.com', '(51) 33669-6669', '2024-09-29 17:25:08', '2024-09-29 17:25:08'),
(6, 'Antonio Reis', 'Areis@gmail.com', '(51) 3857-4456', '2024-09-29 19:39:47', '2024-09-29 19:39:47'),
(7, 'Rubens Albuquerque', 'rubens@up.com.br', '(91) 98754-4321', '2024-09-29 21:20:25', '2024-09-29 21:20:25'),
(8, 'Marcio Paiva da Motta', 'mpmotta@gmail.com', '(51) 98317-9233', '2024-09-30 02:06:28', '2024-09-30 02:06:28');

--
-- Acionadores `professores`
--
DELIMITER $$
CREATE TRIGGER `trg_after_insert_professores` AFTER INSERT ON `professores` FOR EACH ROW BEGIN
    DECLARE username VARCHAR(100);
    DECLARE nomeMinusculo VARCHAR(100);
    DECLARE primeiroNome VARCHAR(50);
    DECLARE ultimoNome VARCHAR(50);

    SET nomeMinusculo = LOWER(NEW.nome);
    SET primeiroNome = SUBSTRING_INDEX(nomeMinusculo, ' ', 1);
    SET ultimoNome = SUBSTRING_INDEX(nomeMinusculo, ' ', -1);
    SET username = CONCAT(primeiroNome, '_', ultimoNome);

    INSERT INTO usuarios (username, nivel, email)
    VALUES (username, 2, NEW.email);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `senha` varchar(128) DEFAULT 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855',
  `nivel` tinyint(1) DEFAULT 1,
  `email` varchar(90) NOT NULL,
  `ultimo_login` timestamp NULL DEFAULT NULL,
  `data_criado` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_editado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `username`, `senha`, `nivel`, `email`, `ultimo_login`, `data_criado`, `data_editado`) VALUES
(1, 'Admin', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 9, 'admin@eva-alcidesmaya.com.br', '2024-09-30 01:52:39', '2024-09-28 20:31:27', '2024-09-30 01:52:39'),
(2, 'NADD', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 3, 'nadd@alcidesmaya.com.br', NULL, '2024-09-28 21:03:32', '2024-09-28 21:03:59'),
(3, '123456789', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 1, 'aluno@alcides.com', NULL, '2024-09-28 21:03:52', '2024-09-28 21:03:52'),
(16, '564564', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 1, 'jsilva@gmail.com', NULL, '2024-09-29 21:54:34', '2024-09-29 21:54:34'),
(17, '84132351', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 1, 'rihan@gmail.com', NULL, '2024-09-29 21:56:29', '2024-09-29 21:56:29'),
(18, 'marcio_motta', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 2, 'mpmotta@gmail.com', NULL, '2024-09-30 02:06:28', '2024-09-30 02:06:28');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id_aluno`),
  ADD UNIQUE KEY `ra` (`ra`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices de tabela `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`id_prof`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `professores`
--
ALTER TABLE `professores`
  MODIFY `id_prof` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
