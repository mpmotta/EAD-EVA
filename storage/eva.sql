-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02-Out-2024 às 20:55
-- Versão do servidor: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eva`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `id_aluno` int(11) NOT NULL,
  `nome` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(90) COLLATE utf8_unicode_ci DEFAULT 'avatar.png',
  `ra` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `cpf` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `fone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `curso` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `turno` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `data_criado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_editado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id_aluno`, `nome`, `avatar`, `ra`, `cpf`, `email`, `fone`, `curso`, `turno`, `data_criado`, `data_editado`) VALUES
(13, 'Jose da Silva', 'avatar.png', '564564', '56456454', 'jsilva@gmail.com', '(51) 847-47985', 'TÃ©cnico em ADM', 'Noite', '2024-09-29 21:54:34', '2024-10-01 19:24:25'),
(14, 'Rhian Silva', 'avatar.png', '84132351', '534.654.745-54', 'rihan@gmail.com', '(51) 3456-8974', 'TÃ©cnico em InformÃ¡tica', 'Tarde', '2024-09-29 21:56:29', '2024-10-01 19:24:30'),
(17, 'JoÃ£o Silva', 'avatar.png', '1234567-89', '123.456.789-00', 'joao.silva@example.com', '(11) 91234-5678', 'TÃ©cnico em InformÃ¡tica', 'ManhÃ£', '2024-10-01 19:21:34', '2024-10-01 19:21:34'),
(18, 'Maria Oliveira', 'avatar.png', '98-7654321', '987.654.321-00', 'maria.oliveira@example.com', '(21) 99876-5432', 'TÃ©cnico em ADM', 'ManhÃ£', '2024-10-01 19:21:34', '2024-10-01 19:21:34'),
(19, 'Carlos Santos', 'avatar.png', '4567891-23', '456.789.123-00', 'carlos.santos@example.com', '(31) 93456-7890', 'TÃ©cnico em InformÃ¡tica', 'Tarde', '2024-10-01 19:21:34', '2024-10-01 19:24:01'),
(20, 'Ana Costa', 'avatar.png', '3216-54987', '321.654.987-00', 'ana.costa@example.com', '(41) 94567-8901', 'TÃ©cnico em ADM', 'Noite', '2024-10-01 19:21:34', '2024-10-01 19:21:34'),
(21, 'Fernando Lima', 'avatar.png', '159753-486', '159.753.486-00', 'fernanda.lima@example.com', '(51) 95678-9012', 'TÃ©cnico em InformÃ¡tica', 'Noite', '2024-10-01 19:21:34', '2024-10-01 19:21:34'),
(24, 'Juliana Almeida', 'avatar.png', '789012-07', '852.369.741-00', 'juliana.almeida@example.com', '(71) 97890-1234', 'Jovem Profissional', 'ManhÃ£', '2024-10-01 19:33:22', '2024-10-01 19:33:22'),
(25, 'Ricardo Gomes', 'avatar.png', '890123-08', '951.753.852-00', 'ricardo.gomes@example.com', '(81) 98901-2345', 'Pacote Office', 'Tarde', '2024-10-01 19:33:22', '2024-10-01 19:33:22'),
(26, 'PatrÃ­cia Rocha', 'avatar.png', '901234-09', '147.258.369-00', 'p.patricia.rocha@example.com', '(91) 99012-3456', 'TÃ©cnico em InformÃ¡tica', 'Noite', '2024-10-01 19:33:22', '2024-10-01 19:33:22'),
(27, 'Lucas Pereira', 'avatar.png', '678901-06', '753.759.486-00', 'lucas.pereira@example.com', '(51) 96789-0123', 'TÃ©cnico em ADM', 'Noite', '2024-10-01 19:35:51', '2024-10-01 19:35:51'),
(28, 'Gabriel Martins', 'avatar.png', '012345-10', '258.969.147-00', ' gabriel.martins@example.com', '(51) 90123-4567', 'TÃ©cnico em ADM', 'ManhÃ£', '2024-10-01 19:36:37', '2024-10-01 19:36:37'),
(29, 'Thiago Mendes', 'avatar.png', '123456-11', '111.222.333-44', 'thiago.mendes@example.com', '(11) 91234-5678', 'TÃ©cnico em InformÃ¡tica', 'ManhÃ£', '2024-10-01 19:39:46', '2024-10-01 19:39:46'),
(30, 'Sofia Lima', 'avatar.png', '234567-12', '222.333.444-55', 'sofia.lima@example.com', '(21) 99876-5432', 'TÃ©cnico em ADM', 'Tarde', '2024-10-01 19:39:46', '2024-10-01 19:39:46'),
(31, 'Felipe Costa', 'avatar.png', '345678-13', '333.444.555-66', 'felipe.costa@example.com', '(31) 93456-7890', 'Jovem Profissional', 'Noite', '2024-10-01 19:39:47', '2024-10-01 19:39:47'),
(32, 'Mariana Silva', 'avatar.png', '456789-14', '444.555.666-77', 'mariana.silva@example.com', '(41) 94567-8901', 'Pacote Office', 'ManhÃ£', '2024-10-01 19:39:47', '2024-10-01 19:39:47'),
(33, 'Eduardo Rocha', 'avatar.png', '567890-15', '555.666.777-88', 'eduardo.rocha@example.com', '(51) 95678-9012', 'TÃ©cnico em InformÃ¡tica', 'Tarde', '2024-10-01 19:39:47', '2024-10-01 19:39:47');

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
-- Estrutura da tabela `disciplinas`
--

CREATE TABLE `disciplinas` (
  `id_disciplina` int(11) NOT NULL,
  `nome` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(90) COLLATE utf8_unicode_ci DEFAULT 'logo.png',
  `pre_requisito` varchar(90) COLLATE utf8_unicode_ci DEFAULT 'Nenhum',
  `quem_editou` varchar(60) COLLATE utf8_unicode_ci DEFAULT 'Admin',
  `data_criado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_editado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `disciplinas`
--

INSERT INTO `disciplinas` (`id_disciplina`, `nome`, `logo`, `pre_requisito`, `quem_editou`, `data_criado`, `data_editado`) VALUES
(1, 'Sistemas Operacionais I', 'so1.png', 'Nenhum', 'Admin', '2024-10-02 17:39:37', '2024-10-02 17:56:32'),
(2, 'Sistemas Operacionais II', 'so2.png', 'Nenhum', 'Admin', '2024-10-02 18:28:13', '2024-10-02 18:34:04'),
(3, 'IntroduÃ§Ã£o a Redes', 'logo.png', 'Nenhum', 'Admin', '2024-10-02 18:31:21', '2024-10-02 18:31:21'),
(4, 'IntroduÃ§Ã£o Ã  InformÃ¡tica', 'logo.png', 'Nenhum', 'Admin', '2024-10-02 18:32:45', '2024-10-02 18:32:45'),
(5, 'Tecnologia Wireless', 'wir.png', 'IntroduÃ§Ã£o a Redes', 'Admin', '2024-10-02 18:52:27', '2024-10-02 18:53:25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores`
--

CREATE TABLE `professores` (
  `id_prof` int(11) NOT NULL,
  `nome` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `fone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `data_criado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_editado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `professores`
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
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(128) COLLATE utf8_unicode_ci DEFAULT 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855',
  `nivel` tinyint(1) DEFAULT '1',
  `email` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `ultimo_login` timestamp NULL DEFAULT NULL,
  `data_criado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_editado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `username`, `senha`, `nivel`, `email`, `ultimo_login`, `data_criado`, `data_editado`) VALUES
(1, 'Admin', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 9, 'admin@eva-alcidesmaya.com.br', '2024-10-02 17:33:06', '2024-09-28 20:31:27', '2024-10-02 17:33:06'),
(2, 'NADD', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 3, 'nadd@alcidesmaya.com.br', NULL, '2024-09-28 21:03:32', '2024-09-28 21:03:59'),
(3, '123456789', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 1, 'aluno@alcides.com', NULL, '2024-09-28 21:03:52', '2024-09-28 21:03:52'),
(16, '564564', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 1, 'jsilva@gmail.com', NULL, '2024-09-29 21:54:34', '2024-09-29 21:54:34'),
(17, '84132351', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 1, 'rihan@gmail.com', NULL, '2024-09-29 21:56:29', '2024-09-29 21:56:29'),
(18, 'marcio_motta', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 2, 'mpmotta@gmail.com', NULL, '2024-09-30 02:06:28', '2024-09-30 02:06:28'),
(21, '1234567-89', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 1, 'joao.silva@example.com', NULL, '2024-10-01 19:21:34', '2024-10-01 19:21:34'),
(22, '98-7654321', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 1, 'maria.oliveira@example.com', NULL, '2024-10-01 19:21:34', '2024-10-01 19:21:34'),
(23, '4567891-23', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 1, 'carlos.santos@example.com', NULL, '2024-10-01 19:21:34', '2024-10-01 19:21:34'),
(24, '3216-54987', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 1, 'ana.costa@example.com', NULL, '2024-10-01 19:21:34', '2024-10-01 19:21:34'),
(25, '159753-486', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 1, 'fernanda.lima@example.com', '2024-10-01 19:26:34', '2024-10-01 19:21:34', '2024-10-01 19:26:34'),
(26, '789012-07', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 1, 'juliana.almeida@example.com', NULL, '2024-10-01 19:33:22', '2024-10-01 19:33:22'),
(27, '890123-08', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 1, 'ricardo.gomes@example.com', NULL, '2024-10-01 19:33:22', '2024-10-01 19:33:22'),
(28, '901234-09', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 1, 'p.patricia.rocha@example.com', NULL, '2024-10-01 19:33:22', '2024-10-01 19:33:22'),
(29, '678901-06', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 1, 'lucas.pereira@example.com', NULL, '2024-10-01 19:35:51', '2024-10-01 19:35:51'),
(30, '012345-10', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 1, ' gabriel.martins@example.com', NULL, '2024-10-01 19:36:37', '2024-10-01 19:36:37'),
(31, '123456-11', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 1, 'thiago.mendes@example.com', NULL, '2024-10-01 19:39:46', '2024-10-01 19:39:46'),
(32, '234567-12', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 1, 'sofia.lima@example.com', NULL, '2024-10-01 19:39:46', '2024-10-01 19:39:46'),
(33, '345678-13', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 1, 'felipe.costa@example.com', NULL, '2024-10-01 19:39:47', '2024-10-01 19:39:47'),
(34, '456789-14', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 1, 'mariana.silva@example.com', NULL, '2024-10-01 19:39:47', '2024-10-01 19:39:47'),
(35, '567890-15', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 1, 'eduardo.rocha@example.com', NULL, '2024-10-01 19:39:47', '2024-10-01 19:39:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id_aluno`),
  ADD UNIQUE KEY `ra` (`ra`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD PRIMARY KEY (`id_disciplina`);

--
-- Indexes for table `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`id_prof`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `disciplinas`
--
ALTER TABLE `disciplinas`
  MODIFY `id_disciplina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `professores`
--
ALTER TABLE `professores`
  MODIFY `id_prof` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
