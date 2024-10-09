-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09-Out-2024 às 21:04
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
  `nome_aluno` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `status_aluno` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ativo',
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

INSERT INTO `alunos` (`id_aluno`, `nome_aluno`, `status_aluno`, `avatar`, `ra`, `cpf`, `email`, `fone`, `curso`, `turno`, `data_criado`, `data_editado`) VALUES
(13, 'Jose da Silva', 'ativo', 'avatar.png', '564564', '56456454', 'jsilva@gmail.com', '(51) 847-47985', '2', 'Noite', '2024-09-29 21:54:34', '2024-10-09 18:37:05'),
(14, 'Rhian Silva', 'ativo', 'avatar.png', '84132351', '534.654.745-54', 'rihan@gmail.com', '(51) 3456-8974', '1', 'Tarde', '2024-09-29 21:56:29', '2024-10-09 18:36:20'),
(17, 'JoÃ£o Silva', 'ativo', 'avatar.png', '1234567-89', '123.456.789-00', 'joao.silva@example.com', '(11) 91234-5678', '1', 'ManhÃ£', '2024-10-01 19:21:34', '2024-10-09 18:36:24'),
(18, 'Maria Oliveira', 'ativo', 'avatar.png', '98-7654321', '987.654.321-00', 'maria.oliveira@example.com', '(21) 99876-5432', '2', 'ManhÃ£', '2024-10-01 19:21:34', '2024-10-09 18:37:02'),
(19, 'Carlos Santos', 'ativo', 'avatar.png', '4567891-23', '456.789.123-00', 'carlos.santos@example.com', '(31) 93456-7890', '1', 'Tarde', '2024-10-01 19:21:34', '2024-10-09 18:36:28'),
(20, 'Ana Costa', 'ativo', 'avatar.png', '3216-54987', '321.654.987-00', 'ana.costa@example.com', '(41) 94567-8901', '2', 'Noite', '2024-10-01 19:21:34', '2024-10-09 18:36:58'),
(21, 'Fernando Lima', 'ativo', 'avatar.png', '159753-486', '159.753.486-00', 'fernanda.lima@example.com', '(51) 95678-9012', '1', 'Noite', '2024-10-01 19:21:34', '2024-10-09 18:36:31'),
(24, 'Juliana Almeida', 'ativo', 'avatar.png', '789012-07', '852.369.741-00', 'juliana.almeida@example.com', '(71) 97890-1234', '3', 'ManhÃ£', '2024-10-01 19:33:22', '2024-10-09 18:37:32'),
(25, 'Ricardo Gomes', 'ativo', 'avatar.png', '890123-08', '951.753.852-00', 'ricardo.gomes@example.com', '(81) 98901-2345', '4', 'Tarde', '2024-10-01 19:33:22', '2024-10-09 18:37:38'),
(26, 'PatrÃ­cia Rocha', 'inativo', 'avatar.png', '901234-09', '147.258.369-00', 'p.patricia.rocha@example.com', '(91) 99012-3456', '1', 'Noite', '2024-10-01 19:33:22', '2024-10-09 18:36:35'),
(27, 'Lucas Pereira', 'ativo', 'avatar.png', '678901-06', '753.759.486-00', 'lucas.pereira@example.com', '(51) 96789-0123', '2', 'Noite', '2024-10-01 19:35:51', '2024-10-09 18:36:55'),
(28, 'Gabriel Martins', 'ativo', 'avatar.png', '012345-10', '258.969.147-00', ' gabriel.martins@example.com', '(51) 90123-4567', '2', 'ManhÃ£', '2024-10-01 19:36:37', '2024-10-09 18:36:52'),
(29, 'Thiago Mendes', 'ativo', 'avatar.png', '123456-11', '111.222.333-44', 'thiago.mendes@example.com', '(11) 91234-5678', '1', 'ManhÃ£', '2024-10-01 19:39:46', '2024-10-09 18:36:39'),
(30, 'Sofia Lima', 'ativo', 'avatar.png', '234567-12', '222.333.444-55', 'sofia.lima@example.com', '(21) 99876-5432', '2', 'Tarde', '2024-10-01 19:39:46', '2024-10-09 18:36:47'),
(31, 'Felipe Costa', 'ativo', 'avatar.png', '345678-13', '333.444.555-66', 'felipe.costa@example.com', '(31) 93456-7890', '3', 'Noite', '2024-10-01 19:39:47', '2024-10-09 18:37:35'),
(32, 'Mariana Silva', 'ativo', 'avatar.png', '456789-14', '444.555.666-77', 'mariana.silva@example.com', '(41) 94567-8901', '4', 'ManhÃ£', '2024-10-01 19:39:47', '2024-10-09 18:37:42'),
(33, 'Eduardo Rocha', 'ativo', 'avatar.png', '567890-15', '555.666.777-88', 'eduardo.rocha@example.com', '(51) 95678-9012', '1', 'Tarde', '2024-10-01 19:39:47', '2024-10-09 18:36:42'),
(34, 'Billy da Bahia', 'ativo', 'avatar.png', '987655-88', '91353645599', 'elias@fariseu.com', '(61) 84074070', '1', 'noite', '2024-10-09 19:02:30', '2024-10-09 19:03:34');

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
  `conteudo` text COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `quem_editou` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `data_criado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_editado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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
  `nome_curso` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `quem_editou` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `data_criado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_editado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`id_curso`, `nome_curso`, `quem_editou`, `data_criado`, `data_editado`) VALUES
(1, 'TÃ©cnico em InformÃ¡tica', 'Admin', '2024-10-09 18:31:14', '2024-10-09 18:31:14'),
(2, 'TÃ©cnico em ADM', 'Admin', '2024-10-09 18:31:27', '2024-10-09 18:31:27'),
(3, 'Jovem Profissional', 'Admin', '2024-10-09 18:31:46', '2024-10-09 18:31:46'),
(4, 'Pacote Office', 'Admin', '2024-10-09 18:31:56', '2024-10-09 18:31:56');

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplinas`
--

CREATE TABLE `disciplinas` (
  `id_disciplina` int(11) NOT NULL,
  `nome` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(90) COLLATE utf8_unicode_ci DEFAULT 'logo.png',
  `curso` int(11) NOT NULL,
  `pre_requisito` varchar(90) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Nenhum',
  `quem_editou` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `data_criado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_editado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `disciplinas`
--

INSERT INTO `disciplinas` (`id_disciplina`, `nome`, `logo`, `curso`, `pre_requisito`, `quem_editou`, `data_criado`, `data_editado`) VALUES
(1, 'Sistemas Operacionais I', 'so1.png', 1, 'Nenhum', 'Admin', '2024-10-02 17:39:37', '2024-10-09 18:34:15'),
(2, 'Sistemas Operacionais II', 'so2.png', 1, 'Nenhum', 'Admin', '2024-10-02 18:28:13', '2024-10-09 18:34:15'),
(3, 'IntroduÃ§Ã£o a Redes', 'rede.png', 1, 'Nenhum', 'Admin', '2024-10-02 18:31:21', '2024-10-09 18:34:15'),
(4, 'IntroduÃ§Ã£o Ã  InformÃ¡tica', 'info.png', 1, 'Nenhum', 'Admin', '2024-10-02 18:32:45', '2024-10-09 18:34:15'),
(5, 'Tecnologia Wireless', 'wir.png', 1, 'IntroduÃ§Ã£o a Redes', 'Admin', '2024-10-02 18:52:27', '2024-10-09 18:34:15'),
(6, 'Linguagem de ProgramaÃ§Ã£o Web I', 'php.png', 1, 'LÃ³gica de ProgramaÃ§Ã£o', 'Admin', '2024-10-07 17:32:37', '2024-10-09 18:34:15'),
(7, 'Linguagem de ProgramaÃ§Ã£o Web II ', 'php.png', 1, 'Banco de Dados', 'Admin', '2024-10-07 17:33:01', '2024-10-09 18:34:15'),
(8, 'Banco de Dados', 'bd.png', 1, 'AnÃ¡lise de Sistemas', 'Admin', '2024-10-07 17:33:32', '2024-10-09 18:34:15'),
(9, 'Linguagem de ProgramaÃ§Ã£o Desktop I', 'java.png', 1, 'LÃ³gica de ProgramaÃ§Ã£o', 'Admin', '2024-10-07 17:37:04', '2024-10-09 18:34:15'),
(10, 'Linguagem de ProgramaÃ§Ã£o Desktop II', 'java.png', 1, 'Banco de Dados', 'Admin', '2024-10-07 17:37:23', '2024-10-09 18:34:15'),
(11, 'Arquitetura de Computadores', 'hd.png', 1, 'Nenhum', 'Admin', '2024-10-07 18:00:22', '2024-10-09 18:34:15'),
(12, 'InglÃªs Instrumental', 'flag.png', 1, 'Nenhum', 'Admin', '2024-10-07 18:00:35', '2024-10-09 18:34:15'),
(13, 'Mercado de Trabalho', 'mercado.png', 1, 'Nenhum', 'Admin', '2024-10-07 18:00:51', '2024-10-09 18:34:15'),
(14, 'OrganizaÃ§Ã£o de Empresas', 'empresa.png', 1, 'Nenhum', 'Admin', '2024-10-07 18:01:02', '2024-10-09 18:34:15'),
(15, 'Redes de Computadores', 'rede.png', 1, 'Nenhum', 'Admin', '2024-10-07 18:01:24', '2024-10-09 18:34:15'),
(16, 'Design e AnimaÃ§Ã£o', 'design.png', 1, 'Nenhum', 'Admin', '2024-10-07 18:01:36', '2024-10-09 18:34:15'),
(17, 'Internet', 'internet.png', 1, 'Nenhum', 'Admin', '2024-10-07 18:01:47', '2024-10-09 18:34:15'),
(18, 'Metodologia Para ElaboraÃ§Ã£o de Projetos', 'project.png', 1, 'Nenhum', 'Admin', '2024-10-07 18:01:59', '2024-10-09 18:34:15'),
(19, 'LÃ³gica de ProgramaÃ§Ã£o', 'logic.png', 1, 'Nenhum', 'Admin', '2024-10-07 18:02:15', '2024-10-09 18:34:15'),
(20, 'AnÃ¡lise de Sistemas', 'flux.png', 1, 'Nenhum', 'Admin', '2024-10-07 18:02:26', '2024-10-09 18:34:15'),
(21, 'Fundamentos de Sistemas Operacionais', 'os.png', 1, 'Nenhum', 'Admin', '2024-10-07 18:02:39', '2024-10-09 18:34:15'),
(22, 'HTML', 'html.png', 1, 'Nenhum', 'Admin', '2024-10-07 18:02:48', '2024-10-09 18:34:15'),
(23, 'ComputaÃ§Ã£o em Nuvem', 'cloud.png', 1, 'Nenhum', 'Admin', '2024-10-07 18:02:59', '2024-10-09 18:34:15');

-- --------------------------------------------------------

--
-- Estrutura da tabela `periodos`
--

CREATE TABLE `periodos` (
  `id_periodo` int(11) NOT NULL,
  `periodo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `data_criado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_editado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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
  `nome_prof` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `fone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `data_criado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_editado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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
-- Estrutura da tabela `turmas`
--

CREATE TABLE `turmas` (
  `id_turma` int(11) NOT NULL,
  `nome_turma` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `aluno_ra` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `disciplina_id` int(11) NOT NULL,
  `professor_id` int(11) NOT NULL,
  `periodo_id` int(11) NOT NULL,
  `curso` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `turno` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `alterado_por` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_criado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_editado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `turmas`
--

INSERT INTO `turmas` (`id_turma`, `nome_turma`, `aluno_ra`, `disciplina_id`, `professor_id`, `periodo_id`, `curso`, `turno`, `alterado_por`, `data_criado`, `data_editado`) VALUES
(1, 'TPRE.INF-3T1A ', '84132351', 7, 8, 1, 'TÃ©cnico em InformÃ¡tica', 'Tarde', 'Admin', '2024-10-08 18:39:37', '2024-10-08 18:46:18'),
(2, 'TPRE.INF-3T1A ', '234567-12', 7, 8, 1, 'TÃ©cnico em InformÃ¡tica', 'Tarde', 'Admin', '2024-10-08 18:39:37', '2024-10-08 18:46:22'),
(3, 'TPRE.INF-3T1A ', '345678-13', 7, 8, 1, 'TÃ©cnico em InformÃ¡tica', 'Tarde', 'Admin', '2024-10-08 18:39:37', '2024-10-08 18:46:24'),
(4, 'TPRE.INF-3T1A ', '123456-11', 7, 8, 1, 'TÃ©cnico em InformÃ¡tica', 'Tarde', 'Admin', '2024-10-08 18:39:37', '2024-10-08 18:46:27'),
(5, 'TPRE.INF-3T1A ', '98-7654321', 7, 8, 1, 'TÃ©cnico em InformÃ¡tica', 'Tarde', 'Admin', '2024-10-08 18:39:37', '2024-10-08 18:46:29');

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
(1, 'Admin', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 9, 'admin@eva-alcidesmaya.com.br', '2024-10-09 17:46:43', '2024-09-28 20:31:27', '2024-10-09 17:46:43'),
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
(35, '567890-15', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 1, 'eduardo.rocha@example.com', NULL, '2024-10-01 19:39:47', '2024-10-01 19:39:47'),
(36, '987655-88', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 1, 'elias@fariseu.com', NULL, '2024-10-09 19:02:30', '2024-10-09 19:02:30');

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
-- Indexes for table `conteudos`
--
ALTER TABLE `conteudos`
  ADD PRIMARY KEY (`id_conteudo`),
  ADD KEY `disciplina` (`disciplina`),
  ADD KEY `curso` (`curso`);

--
-- Indexes for table `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indexes for table `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD PRIMARY KEY (`id_disciplina`),
  ADD KEY `curso` (`curso`);

--
-- Indexes for table `periodos`
--
ALTER TABLE `periodos`
  ADD PRIMARY KEY (`id_periodo`),
  ADD UNIQUE KEY `periodo` (`periodo`);

--
-- Indexes for table `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`id_prof`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `turmas`
--
ALTER TABLE `turmas`
  ADD PRIMARY KEY (`id_turma`),
  ADD KEY `aluno_ra` (`aluno_ra`),
  ADD KEY `disciplina_id` (`disciplina_id`),
  ADD KEY `professor_id` (`professor_id`),
  ADD KEY `periodo_id` (`periodo_id`);

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
  MODIFY `id_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `conteudos`
--
ALTER TABLE `conteudos`
  MODIFY `id_conteudo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `disciplinas`
--
ALTER TABLE `disciplinas`
  MODIFY `id_disciplina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `periodos`
--
ALTER TABLE `periodos`
  MODIFY `id_periodo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `professores`
--
ALTER TABLE `professores`
  MODIFY `id_prof` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `turmas`
--
ALTER TABLE `turmas`
  MODIFY `id_turma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
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
  ADD CONSTRAINT `turmas_ibfk_4` FOREIGN KEY (`periodo_id`) REFERENCES `periodos` (`id_periodo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
