-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Out-2024 às 17:01
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.1.12

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
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `id_aluno` int(11) NOT NULL,
  `nome_aluno` varchar(90) NOT NULL,
  `status_aluno` varchar(10) NOT NULL DEFAULT 'ativo',
  `avatar` varchar(90) DEFAULT 'avatar.png',
  `ra` varchar(15) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `email` varchar(90) NOT NULL,
  `fone` varchar(15) NOT NULL,
  `curso` varchar(90) NOT NULL,
  `turma_id` int(11) NOT NULL,
  `data_criado` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_editado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id_aluno`, `nome_aluno`, `status_aluno`, `avatar`, `ra`, `cpf`, `email`, `fone`, `curso`, `turma_id`, `data_criado`, `data_editado`) VALUES
(13, 'Jose da Silva', 'ativo', 'avatar.png', '564564', '56456454', 'jsilva@gmail.com', '(51) 847-47985', '2', 1, '2024-09-29 21:54:34', '2024-10-16 13:26:16'),
(14, 'Rhian Silva', 'ativo', 'avatar.png', '84132351', '534.654.745-54', 'rihan@gmail.com', '(51) 3456-8974', '1', 1, '2024-09-29 21:56:29', '2024-10-16 13:26:16'),
(17, 'João Silva', 'ativo', 'avatar.png', '1234567-89', '123.456.789-00', 'joao.silva@example.com', '(11) 91234-5678', '1', 1, '2024-10-01 19:21:34', '2024-10-16 13:26:16'),
(18, 'Maria Oliveira', 'ativo', 'avatar.png', '98-7654321', '987.654.321-00', 'maria.oliveira@example.com', '(21) 99876-5432', '2', 1, '2024-10-01 19:21:34', '2024-10-16 13:26:16'),
(19, 'Carlos Santos', 'ativo', 'avatar.png', '4567891-23', '456.789.123-00', 'carlos.santos@example.com', '(31) 93456-7890', '1', 1, '2024-10-01 19:21:34', '2024-10-16 13:26:16'),
(20, 'Ana Costa', 'ativo', 'avatar.png', '3216-54987', '321.654.987-00', 'ana.costa@example.com', '(41) 94567-8901', '2', 1, '2024-10-01 19:21:34', '2024-10-16 13:26:16'),
(21, 'Fernando Lima', 'ativo', 'avatar.png', '159753-486', '159.753.486-00', 'fernanda.lima@example.com', '(51) 95678-9012', '1', 1, '2024-10-01 19:21:34', '2024-10-16 13:26:16'),
(24, 'Juliana Almeida', 'ativo', 'avatar.png', '789012-07', '852.369.741-00', 'juliana.almeida@example.com', '(71) 97890-1234', '3', 1, '2024-10-01 19:33:22', '2024-10-16 13:26:16'),
(25, 'Ricardo Gomes', 'ativo', 'avatar.png', '890123-08', '951.753.852-00', 'ricardo.gomes@example.com', '(81) 98901-2345', '4', 1, '2024-10-01 19:33:22', '2024-10-16 13:26:16'),
(26, 'Patrí­cia Rocha', 'inativo', 'avatar.png', '901234-09', '147.258.369-00', 'p.patricia.rocha@example.com', '(91) 99012-3456', '1', 1, '2024-10-01 19:33:22', '2024-10-16 13:26:16'),
(27, 'Lucas Pereira', 'ativo', 'avatar.png', '678901-06', '753.759.486-00', 'lucas.pereira@example.com', '(51) 96789-0123', '2', 1, '2024-10-01 19:35:51', '2024-10-16 13:26:16'),
(28, 'Gabriel Martins', 'ativo', 'avatar.png', '012345-10', '258.969.147-00', ' gabriel.martins@example.com', '(51) 90123-4567', '2', 1, '2024-10-01 19:36:37', '2024-10-16 13:26:16'),
(29, 'Thiago Mendes', 'ativo', 'avatar.png', '123456-11', '111.222.333-44', 'thiago.mendes@example.com', '(11) 91234-5678', '1', 1, '2024-10-01 19:39:46', '2024-10-16 13:26:16'),
(30, 'Sofia Lima', 'ativo', 'avatar.png', '234567-12', '222.333.444-55', 'sofia.lima@example.com', '(21) 99876-5432', '2', 1, '2024-10-01 19:39:46', '2024-10-16 13:26:16'),
(31, 'Felipe Costa', 'ativo', 'avatar.png', '345678-13', '333.444.555-66', 'felipe.costa@example.com', '(31) 93456-7890', '3', 1, '2024-10-01 19:39:47', '2024-10-16 13:26:16'),
(32, 'Mariana Silva', 'ativo', 'avatar.png', '456789-14', '444.555.666-77', 'mariana.silva@example.com', '(41) 94567-8901', '4', 1, '2024-10-01 19:39:47', '2024-10-16 13:26:16'),
(33, 'Eduardo Rocha', 'ativo', 'avatar.png', '567890-15', '555.666.777-88', 'eduardo.rocha@example.com', '(51) 95678-9012', '1', 1, '2024-10-01 19:39:47', '2024-10-16 13:26:16'),
(34, 'Billy da Bahia', 'ativo', 'avatar.png', '987655-88', '91353645599', 'elias@fariseu.com', '(61) 84074070', '1', 1, '2024-10-09 19:02:30', '2024-10-16 13:26:16');

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
-- Estrutura da tabela `conteudos`
--

CREATE TABLE `conteudos` (
  `id_conteudo` int(11) NOT NULL,
  `disciplina` int(11) NOT NULL,
  `curso` int(11) NOT NULL,
  `num_aula` int(11) NOT NULL,
  `conteudo` text NOT NULL,
  `tipo` varchar(60) NOT NULL,
  `quem_editou` varchar(60) NOT NULL,
  `data_criado` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_editado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `conteudos`
--

INSERT INTO `conteudos` (`id_conteudo`, `disciplina`, `curso`, `num_aula`, `conteudo`, `tipo`, `quem_editou`, `data_criado`, `data_editado`) VALUES
(1, 12, 1, 1, 'Ingles Instrumental - Aula 1', 'Titulo', 'Admin', '2024-10-07 18:52:35', '2024-10-09 18:32:21'),
(2, 12, 1, 1, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/IOU6qyF9u3s?si=ikpkE6eY9S2B_w95\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', 'Video', 'Admin', '2024-10-07 18:55:05', '2024-10-09 18:32:25'),
(3, 12, 1, 1, 'APRESENTAÇÃO\r\nO Inglês Instrumental, English for Specific Purposes (ESP), é uma abordagem que surgiu nas\r\nuniversidades brasileiras, nos anos 70, apresentando técnicas de leitura que possibilitavam, ao\r\nleitor, compreender e interpretar textos em inglês. A demanda principal do mundo globalizado é\r\nque estejamos sempre atualizados; o mercado de trabalho exige que sejamos profissionais\r\narrojados e o inglês aparece como o idioma oficial do mercado internacional.\r\nJuntando todas essas constatações, entendemos a necessidade de se obter uma certa proficiência\r\nem técnicas de leitura para cumprirmos tais exigências, através da utilização de bibliografias\r\ntécnicas ou não, produzidas mundialmente. Por isso, o nosso objetivo nesta Unidade de\r\nAprendizagem é focarmos na importância do Inglês Instrumental, aplicando-o, eficientemente,\r\npara obtermos a essência dos textos em inglês que lermos.\r\nBons estudos.\r\nAo final desta Unidade de Aprendizagem, você deve apresentar os seguintes aprendizados:\r\n• Explicar a importância do Inglês Instrumental na leitura de textos em inglês.\r\n• Reconhecer a importância do inglês como o idioma oficial do mercado internacional.\r\n• Realizar a tradução e interpretação de pequenos textos, a partir de técnicas bem simples.', 'texto', 'Admin', '2024-10-07 19:22:12', '2024-10-09 18:32:28');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE `cursos` (
  `id_curso` int(11) NOT NULL,
  `nome_curso` varchar(100) NOT NULL,
  `quem_editou` varchar(60) NOT NULL,
  `data_criado` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_editado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`id_curso`, `nome_curso`, `quem_editou`, `data_criado`, `data_editado`) VALUES
(1, 'Técnico em Informática', 'Admin', '2024-10-09 18:31:14', '2024-10-16 12:53:36'),
(2, 'Técnico em ADM', 'Admin', '2024-10-09 18:31:27', '2024-10-16 12:53:18'),
(3, 'Jovem Profissional', 'Admin', '2024-10-09 18:31:46', '2024-10-09 18:31:46'),
(4, 'Pacote Office', 'Admin', '2024-10-09 18:31:56', '2024-10-09 18:31:56');

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplinas`
--

CREATE TABLE `disciplinas` (
  `id_disciplina` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `logo` varchar(90) DEFAULT 'logo.png',
  `curso` int(11) NOT NULL,
  `pre_requisito` varchar(90) NOT NULL DEFAULT 'Nenhum',
  `quem_editou` varchar(60) NOT NULL DEFAULT 'Admin',
  `data_criado` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_editado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `disciplinas`
--

INSERT INTO `disciplinas` (`id_disciplina`, `nome`, `logo`, `curso`, `pre_requisito`, `quem_editou`, `data_criado`, `data_editado`) VALUES
(1, 'Sistemas Operacionais I', 'so1.png', 1, 'Nenhum', 'Admin', '2024-10-02 17:39:37', '2024-10-09 18:34:15'),
(2, 'Sistemas Operacionais II', 'so2.png', 1, 'Nenhum', 'Admin', '2024-10-02 18:28:13', '2024-10-09 18:34:15'),
(3, 'Introdução a Redes', 'rede.png', 1, 'Nenhum', 'Admin', '2024-10-02 18:31:21', '2024-10-16 12:56:02'),
(4, 'Introdução à  Informática', 'info.png', 1, 'Nenhum', 'Admin', '2024-10-02 18:32:45', '2024-10-16 12:56:13'),
(5, 'Tecnologia Wireless', 'wir.png', 1, 'Introdução a Redes', 'Admin', '2024-10-02 18:52:27', '2024-10-16 12:58:21'),
(6, 'Linguagem de Programação Web I', 'php.png', 1, 'Lógica de Programação', 'Admin', '2024-10-07 17:32:37', '2024-10-16 12:58:31'),
(7, 'Linguagem de Programação Web II ', 'php.png', 1, 'Banco de Dados', 'Admin', '2024-10-07 17:33:01', '2024-10-16 12:56:28'),
(8, 'Banco de Dados', 'bd.png', 1, 'Análise de Sistemas', 'Admin', '2024-10-07 17:33:32', '2024-10-16 12:58:38'),
(9, 'Linguagem de Programação Desktop I', 'java.png', 1, 'Lógica de Programação', 'Admin', '2024-10-07 17:37:04', '2024-10-16 12:58:48'),
(10, 'Linguagem de Programação Desktop II', 'java.png', 1, 'Banco de Dados', 'Admin', '2024-10-07 17:37:23', '2024-10-16 12:56:46'),
(11, 'Arquitetura de Computadores', 'hd.png', 1, 'Nenhum', 'Admin', '2024-10-07 18:00:22', '2024-10-09 18:34:15'),
(12, 'Inglês Instrumental', 'flag.png', 1, 'Nenhum', 'Admin', '2024-10-07 18:00:35', '2024-10-16 12:56:53'),
(13, 'Mercado de Trabalho', 'mercado.png', 1, 'Nenhum', 'Admin', '2024-10-07 18:00:51', '2024-10-09 18:34:15'),
(14, 'Organização de Empresas', 'empresa.png', 1, 'Nenhum', 'Admin', '2024-10-07 18:01:02', '2024-10-16 12:57:01'),
(15, 'Redes de Computadores', 'rede.png', 1, 'Nenhum', 'Admin', '2024-10-07 18:01:24', '2024-10-09 18:34:15'),
(16, 'Design e Animação', 'design.png', 1, 'Nenhum', 'Admin', '2024-10-07 18:01:36', '2024-10-16 12:57:08'),
(17, 'Internet', 'internet.png', 1, 'Nenhum', 'Admin', '2024-10-07 18:01:47', '2024-10-09 18:34:15'),
(18, 'Metodologia Para Elaboração de Projetos', 'project.png', 1, 'Nenhum', 'Admin', '2024-10-07 18:01:59', '2024-10-16 12:57:23'),
(19, 'Lógica de Programação', 'logic.png', 1, 'Nenhum', 'Admin', '2024-10-07 18:02:15', '2024-10-16 12:57:33'),
(20, 'Análise de Sistemas', 'flux.png', 1, 'Nenhum', 'Admin', '2024-10-07 18:02:26', '2024-10-16 12:57:43'),
(21, 'Fundamentos de Sistemas Operacionais', 'os.png', 1, 'Nenhum', 'Admin', '2024-10-07 18:02:39', '2024-10-09 18:34:15'),
(22, 'HTML', 'html.png', 1, 'Nenhum', 'Admin', '2024-10-07 18:02:48', '2024-10-09 18:34:15'),
(23, 'Computação em Nuvem', 'cloud.png', 1, 'Nenhum', 'Admin', '2024-10-07 18:02:59', '2024-10-16 12:57:49');

-- --------------------------------------------------------

--
-- Estrutura da tabela `periodos`
--

CREATE TABLE `periodos` (
  `id_periodo` int(11) NOT NULL,
  `periodo` varchar(50) NOT NULL,
  `data_criado` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_editado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `periodos`
--

INSERT INTO `periodos` (`id_periodo`, `periodo`, `data_criado`, `data_editado`) VALUES
(1, '05-2024', '2024-10-08 18:38:57', '2024-10-08 18:38:57');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores`
--

CREATE TABLE `professores` (
  `id_prof` int(11) NOT NULL,
  `nome_prof` varchar(90) NOT NULL,
  `email` varchar(90) NOT NULL,
  `fone` varchar(15) NOT NULL,
  `data_criado` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_editado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `professores`
--

INSERT INTO `professores` (`id_prof`, `nome_prof`, `email`, `fone`, `data_criado`, `data_editado`) VALUES
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

    SET nomeMinusculo = LOWER(NEW.nome_prof);
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
-- Estrutura da tabela `turmas`
--

CREATE TABLE `turmas` (
  `id_turma` int(11) NOT NULL,
  `nome_turma` varchar(50) NOT NULL,
  `aluno_ra` varchar(20) NOT NULL,
  `disciplina_id` int(11) NOT NULL,
  `professor_id` int(11) NOT NULL,
  `periodo_id` int(11) NOT NULL,
  `curso` int(11) NOT NULL,
  `turno_id` int(11) NOT NULL,
  `alterado_por` varchar(30) DEFAULT NULL,
  `data_criado` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_editado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `turmas`
--

INSERT INTO `turmas` (`id_turma`, `nome_turma`, `aluno_ra`, `disciplina_id`, `professor_id`, `periodo_id`, `curso`, `turno_id`, `alterado_por`, `data_criado`, `data_editado`) VALUES
(1, 'TPRE.INF-3T1A ', '84132351', 7, 8, 1, 1, 2, 'Admin', '2024-10-08 18:39:37', '2024-10-16 13:16:58'),
(2, 'TPRE.INF-3T1A ', '234567-12', 7, 8, 1, 1, 2, 'Admin', '2024-10-08 18:39:37', '2024-10-16 13:17:03'),
(3, 'TPRE.INF-3T1A ', '345678-13', 7, 8, 1, 1, 2, 'Admin', '2024-10-08 18:39:37', '2024-10-16 13:17:08'),
(4, 'TPRE.INF-3T1A ', '123456-11', 7, 8, 1, 1, 2, 'Admin', '2024-10-08 18:39:37', '2024-10-16 13:17:11'),
(5, 'TPRE.INF-3T1A ', '98-7654321', 7, 8, 1, 1, 2, 'Admin', '2024-10-08 18:39:37', '2024-10-16 13:17:14');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turnos`
--

CREATE TABLE `turnos` (
  `id_turno` int(11) NOT NULL,
  `turno` varchar(10) NOT NULL,
  `editado_por` varchar(50) NOT NULL,
  `data_criado` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_editado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `turnos`
--

INSERT INTO `turnos` (`id_turno`, `turno`, `editado_por`, `data_criado`, `data_editado`) VALUES
(1, 'Manhã', 'Admin', '2024-10-16 13:08:05', '2024-10-16 13:08:05'),
(2, 'Tarde', 'Admin', '2024-10-16 13:08:15', '2024-10-16 13:08:15'),
(3, 'Noite', 'Admin', '2024-10-16 13:08:22', '2024-10-16 13:08:22'),
(4, 'EAD', 'Admin', '2024-10-16 13:08:29', '2024-10-16 13:08:29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `senha` varchar(128) DEFAULT 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855',
  `nivel` tinyint(1) DEFAULT 1,
  `email` varchar(90) NOT NULL,
  `avatar` varchar(128) DEFAULT 'avatar.png',
  `ultimo_login` timestamp NULL DEFAULT NULL,
  `data_criado` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_editado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `username`, `senha`, `nivel`, `email`, `avatar`, `ultimo_login`, `data_criado`, `data_editado`) VALUES
(1, 'Admin', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 9, 'admin@eva-alcidesmaya.com.br', 'avatar.png', '2024-10-16 14:11:52', '2024-09-28 20:31:27', '2024-10-16 14:11:52'),
(2, 'NADD', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 3, 'nadd@alcidesmaya.com.br', 'avatar.png', NULL, '2024-09-28 21:03:32', '2024-09-28 21:03:59'),
(3, '123456789', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 1, 'aluno@alcides.com', 'avatar.png', NULL, '2024-09-28 21:03:52', '2024-09-28 21:03:52'),
(16, '564564', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 1, 'jsilva@gmail.com', 'avatar.png', NULL, '2024-09-29 21:54:34', '2024-09-29 21:54:34'),
(17, '84132351', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 1, 'rihan@gmail.com', 'avatar.png', NULL, '2024-09-29 21:56:29', '2024-09-29 21:56:29'),
(18, 'marcio_motta', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 2, 'mpmotta@gmail.com', 'batman.webp', '2024-10-16 14:11:39', '2024-09-30 02:06:28', '2024-10-16 14:37:10'),
(21, '1234567-89', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 1, 'joao.silva@example.com', 'avatar.png', NULL, '2024-10-01 19:21:34', '2024-10-01 19:21:34'),
(22, '98-7654321', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 1, 'maria.oliveira@example.com', 'avatar.png', NULL, '2024-10-01 19:21:34', '2024-10-01 19:21:34'),
(23, '4567891-23', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 1, 'carlos.santos@example.com', 'avatar.png', NULL, '2024-10-01 19:21:34', '2024-10-01 19:21:34'),
(24, '3216-54987', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 1, 'ana.costa@example.com', 'avatar.png', NULL, '2024-10-01 19:21:34', '2024-10-01 19:21:34'),
(25, '159753-486', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 1, 'fernanda.lima@example.com', 'avatar.png', '2024-10-01 19:26:34', '2024-10-01 19:21:34', '2024-10-01 19:26:34'),
(26, '789012-07', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 1, 'juliana.almeida@example.com', 'avatar.png', NULL, '2024-10-01 19:33:22', '2024-10-01 19:33:22'),
(27, '890123-08', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 1, 'ricardo.gomes@example.com', 'avatar.png', NULL, '2024-10-01 19:33:22', '2024-10-01 19:33:22'),
(28, '901234-09', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 1, 'p.patricia.rocha@example.com', 'avatar.png', NULL, '2024-10-01 19:33:22', '2024-10-01 19:33:22'),
(29, '678901-06', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 1, 'lucas.pereira@example.com', 'avatar.png', NULL, '2024-10-01 19:35:51', '2024-10-01 19:35:51'),
(30, '012345-10', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 1, ' gabriel.martins@example.com', 'avatar.png', NULL, '2024-10-01 19:36:37', '2024-10-01 19:36:37'),
(31, '123456-11', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 1, 'thiago.mendes@example.com', 'avatar.png', NULL, '2024-10-01 19:39:46', '2024-10-01 19:39:46'),
(32, '234567-12', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 1, 'sofia.lima@example.com', 'avatar.png', NULL, '2024-10-01 19:39:46', '2024-10-01 19:39:46'),
(33, '345678-13', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 1, 'felipe.costa@example.com', 'avatar.png', NULL, '2024-10-01 19:39:47', '2024-10-01 19:39:47'),
(34, '456789-14', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 1, 'mariana.silva@example.com', 'avatar.png', NULL, '2024-10-01 19:39:47', '2024-10-01 19:39:47'),
(35, '567890-15', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 1, 'eduardo.rocha@example.com', 'avatar.png', NULL, '2024-10-01 19:39:47', '2024-10-01 19:39:47'),
(36, '987655-88', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 1, 'elias@fariseu.com', 'avatar.png', NULL, '2024-10-09 19:02:30', '2024-10-09 19:02:30');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id_aluno`),
  ADD UNIQUE KEY `ra` (`ra`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices para tabela `conteudos`
--
ALTER TABLE `conteudos`
  ADD PRIMARY KEY (`id_conteudo`),
  ADD KEY `disciplina` (`disciplina`),
  ADD KEY `curso` (`curso`);

--
-- Índices para tabela `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_curso`);

--
-- Índices para tabela `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD PRIMARY KEY (`id_disciplina`),
  ADD KEY `curso` (`curso`);

--
-- Índices para tabela `periodos`
--
ALTER TABLE `periodos`
  ADD PRIMARY KEY (`id_periodo`),
  ADD UNIQUE KEY `periodo` (`periodo`);

--
-- Índices para tabela `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`id_prof`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices para tabela `turmas`
--
ALTER TABLE `turmas`
  ADD PRIMARY KEY (`id_turma`),
  ADD KEY `aluno_ra` (`aluno_ra`),
  ADD KEY `disciplina_id` (`disciplina_id`),
  ADD KEY `professor_id` (`professor_id`),
  ADD KEY `periodo_id` (`periodo_id`),
  ADD KEY `curso` (`curso`),
  ADD KEY `turno_id` (`turno_id`);

--
-- Índices para tabela `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`id_turno`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `conteudos`
--
ALTER TABLE `conteudos`
  MODIFY `id_conteudo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `disciplinas`
--
ALTER TABLE `disciplinas`
  MODIFY `id_disciplina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `periodos`
--
ALTER TABLE `periodos`
  MODIFY `id_periodo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `professores`
--
ALTER TABLE `professores`
  MODIFY `id_prof` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `turmas`
--
ALTER TABLE `turmas`
  MODIFY `id_turma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `turnos`
--
ALTER TABLE `turnos`
  MODIFY `id_turno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `conteudos`
--
ALTER TABLE `conteudos`
  ADD CONSTRAINT `conteudos_ibfk_1` FOREIGN KEY (`disciplina`) REFERENCES `disciplinas` (`id_disciplina`),
  ADD CONSTRAINT `conteudos_ibfk_2` FOREIGN KEY (`curso`) REFERENCES `cursos` (`id_curso`);

--
-- Limitadores para a tabela `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD CONSTRAINT `disciplinas_ibfk_1` FOREIGN KEY (`curso`) REFERENCES `cursos` (`id_curso`);

--
-- Limitadores para a tabela `turmas`
--
ALTER TABLE `turmas`
  ADD CONSTRAINT `turmas_ibfk_1` FOREIGN KEY (`aluno_ra`) REFERENCES `alunos` (`ra`),
  ADD CONSTRAINT `turmas_ibfk_2` FOREIGN KEY (`disciplina_id`) REFERENCES `disciplinas` (`id_disciplina`),
  ADD CONSTRAINT `turmas_ibfk_3` FOREIGN KEY (`professor_id`) REFERENCES `professores` (`id_prof`),
  ADD CONSTRAINT `turmas_ibfk_4` FOREIGN KEY (`periodo_id`) REFERENCES `periodos` (`id_periodo`),
  ADD CONSTRAINT `turmas_ibfk_5` FOREIGN KEY (`curso`) REFERENCES `cursos` (`id_curso`),
  ADD CONSTRAINT `turmas_ibfk_6` FOREIGN KEY (`turno_id`) REFERENCES `turnos` (`id_turno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
