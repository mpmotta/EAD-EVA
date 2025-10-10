-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 10-Out-2025 às 20:28
-- Versão do servidor: 5.6.51
-- versão do PHP: 8.0.7

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
  `nome_aluno` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `status_aluno` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ativo',
  `avatar` varchar(90) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'avatar.png',
  `ra` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `cpf` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `fone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `curso_id` tinyint(1) DEFAULT NULL,
  `data_criado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_editado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id_aluno`, `nome_aluno`, `status_aluno`, `avatar`, `ra`, `cpf`, `email`, `fone`, `curso_id`, `data_criado`, `data_editado`) VALUES
(4, 'Daiene Torgo Fabretti', 'ativo', 'avatar.png', '4513515-12', NULL, 'daiene@gmail.com', '99885566', 1, '2025-08-12 18:38:58', '2025-08-12 18:38:58'),
(5, 'Lucas Pereira dos Santos', 'ativo', 'avatar.png', '9874528-95', NULL, 'lucas.psantos@gmail.com', '(51) 99866-4477', NULL, '2025-08-20 20:32:47', '2025-08-20 20:32:47');

-- --------------------------------------------------------

--
-- Estrutura da tabela `conteudos`
--

CREATE TABLE `conteudos` (
  `id_conteudo` int(11) NOT NULL,
  `disciplina_id` int(11) NOT NULL,
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

INSERT INTO `conteudos` (`id_conteudo`, `disciplina_id`, `curso`, `num_aula`, `conteudo`, `tipo`, `quem_editou`, `data_criado`, `data_editado`) VALUES
(1, 22, 1, 1, 'Programacao Front-End - Aula 1', 'Titulo', 'Admin', '2024-10-07 18:52:35', '2025-08-25 20:00:39'),
(2, 22, 1, 1, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/IOU6qyF9u3s?si=ikpkE6eY9S2B_w95\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', 'Video', 'Admin', '2024-10-07 18:55:05', '2025-08-25 19:59:16'),
(3, 22, 1, 1, 'APRESENTAÇÃO\nO Inglês Instrumental, English for Specific Purposes (ESP), é uma abordagem que surgiu nas\nuniversidades brasileiras, nos anos 70, apresentando técnicas de leitura que possibilitavam, ao\nleitor, compreender e interpretar textos em inglês. A demanda principal do mundo globalizado é\nque estejamos sempre atualizados; o mercado de trabalho exige que sejamos profissionais\narrojados e o inglês aparece como o idioma oficial do mercado internacional.\nJuntando todas essas constatações, entendemos a necessidade de se obter uma certa proficiência\nem técnicas de leitura para cumprirmos tais exigências, através da utilização de bibliografias\ntécnicas ou não, produzidas mundialmente. Por isso, o nosso objetivo nesta Unidade de\nAprendizagem é focarmos na importância do Inglês Instrumental, aplicando-o, eficientemente,\npara obtermos a essência dos textos em inglês que lermos.\nBons estudos.\nAo final desta Unidade de Aprendizagem, você deve apresentar os seguintes aprendizados:\n• Explicar a importância do Inglês Instrumental na leitura de textos em inglês.\n• Reconhecer a importância do inglês como o idioma oficial do mercado internacional.\n• Realizar a tradução e interpretação de pequenos textos, a partir de técnicas bem simples.', 'texto', 'Admin', '2024-10-07 19:22:12', '2025-08-25 19:59:23'),
(4, 22, 1, 2, 'Programacao Front-End - Aula 2', 'Titulo', 'Admin', '2025-08-15 18:54:56', '2025-08-25 20:00:51'),
(5, 22, 1, 1, 'Saiba Mais', 'Saiba', 'Admin', '2025-08-25 19:56:46', '2025-08-25 19:59:37');

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
(1, 'TÃ©cnico em InformÃ¡tica', 'Admin', '2024-10-09 18:31:14', '2025-10-10 20:24:03'),
(2, 'TÃ©cnico em AdministraÃ§Ã£o', 'Admin', '2024-10-09 18:31:27', '2025-10-10 20:24:38'),
(3, 'Jovem Profissional', 'Admin', '2024-10-09 18:31:46', '2024-10-09 18:31:46'),
(4, 'Pacote Office', 'Admin', '2024-10-09 18:31:56', '2024-10-09 18:31:56'),
(5, 'TÃ©cnico em AdministraÃ§Ã£o EAD', 'Admin', '2025-10-10 20:25:13', '2025-10-10 20:25:47'),
(6, 'TÃ©cnico em InformÃ¡tica EAD', 'Admin', '2025-10-10 20:25:31', '2025-10-10 20:25:52');

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplinas`
--

CREATE TABLE `disciplinas` (
  `id_disciplina` int(11) NOT NULL,
  `nome` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `thumb` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'thumb.png',
  `logo` varchar(90) COLLATE utf8_unicode_ci DEFAULT 'logo.png',
  `curso` int(11) NOT NULL,
  `Ciclo` int(1) NOT NULL,
  `quem_editou` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `data_criado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_editado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `disciplinas`
--

INSERT INTO `disciplinas` (`id_disciplina`, `nome`, `thumb`, `logo`, `curso`, `Ciclo`, `quem_editou`, `data_criado`, `data_editado`) VALUES
(1, 'Sistemas Operacionais ProprietÃ¡rios', 'so.png', 'so1.png', 1, 1, 'Admin', '2024-10-02 17:39:37', '2025-10-10 20:17:59'),
(2, 'Sistemas Operacionais Livres', 'thumb.png', 'so2.png', 1, 1, 'Admin', '2024-10-02 18:28:13', '2025-10-10 20:18:03'),
(3, 'Redes de Computadores', 'thumb.png', 'rede.png', 1, 1, 'Admin', '2024-10-02 18:31:21', '2025-10-10 20:18:06'),
(4, 'IntroduÃ§Ã£o Ã  InformÃ¡tica', 'thumb.png', 'info.png', 1, 1, 'Admin', '2024-10-02 18:32:45', '2025-10-10 20:18:09'),
(5, 'InteligÃªncia Artificial', 'thumb.png', 'ia.png', 1, 1, 'Admin', '2024-10-02 18:52:27', '2025-10-10 20:18:14'),
(6, 'Linguagem de ProgramaÃ§Ã£o Web', 'php.png', 'php.png', 1, 2, 'Admin', '2024-10-07 17:32:37', '2025-10-10 20:18:17'),
(8, 'Banco de Dados', 'thumb.png', 'bd.png', 1, 1, 'Admin', '2024-10-07 17:33:32', '2025-10-10 20:18:20'),
(9, 'Linguagem de ProgramaÃ§Ã£o Backend', 'python.png', 'python.png', 1, 2, 'Admin', '2024-10-07 17:37:04', '2025-10-10 20:18:24'),
(11, 'Manutencao de Hardware ', 'thumb.png', 'hd.png', 1, 1, 'Admin', '2024-10-07 18:00:22', '2025-10-10 20:18:27'),
(12, 'Desenvolvimento de Jogos', 'thumb.png', 'games.png', 1, 2, 'Admin', '2024-10-07 18:00:35', '2025-10-10 20:19:26'),
(15, 'Ciberseguranca', 'thumb.png', 'sec.png', 1, 1, 'Admin', '2024-10-07 18:01:24', '2025-10-10 20:18:33'),
(16, 'Design e AnimaÃ§Ã£o', 'thumb.png', 'design.png', 1, 1, 'Admin', '2024-10-07 18:01:36', '2025-10-10 20:18:44'),
(17, 'Internet das Coisas', 'thumb.png', 'iot.png', 1, 1, 'Admin', '2024-10-07 18:01:47', '2025-10-10 20:18:49'),
(19, 'LÃ³gica de ProgramaÃ§Ã£o', 'thumb.png', 'logic.png', 1, 1, 'Admin', '2024-10-07 18:02:15', '2025-10-10 20:18:52'),
(22, 'Programacao Front-End', 'html.png', 'html.png', 1, 1, 'Admin', '2024-10-07 18:02:48', '2025-10-10 20:18:55'),
(23, 'ComputaÃ§Ã£o em Nuvem', 'thumb.png', 'cloud.png', 1, 2, 'Admin', '2024-10-07 18:02:59', '2025-10-10 20:19:00'),
(24, 'Projeto Final', 'thumb.png', 'logo.png', 1, 3, 'Admin', '2025-10-10 20:17:44', '2025-10-10 20:26:08');

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
(1, '03-2025', '2024-10-08 18:38:57', '2025-08-15 18:19:03');

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
(2, 'MÃ¡rcio Paiva da Motta', 'mmotta@gmail.com', '(51) 99534-3085', '2025-08-12 17:45:02', '2025-08-12 17:45:02'),
(3, 'Alexandre Bonnamain', 'bonnamain@gmail.com', '99666669', '2025-08-12 17:50:40', '2025-08-12 17:50:40');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turmas`
--

CREATE TABLE `turmas` (
  `id_turma` int(11) NOT NULL,
  `nome_turma` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ativa` tinyint(1) NOT NULL DEFAULT '1',
  `aluno_ra` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `disciplina_id` int(11) NOT NULL,
  `professor_id` int(11) NOT NULL,
  `periodo_id` int(11) NOT NULL,
  `curso_id` int(11) NOT NULL,
  `turno_id` int(11) NOT NULL,
  `alterado_por` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_criado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_editado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `turmas`
--

INSERT INTO `turmas` (`id_turma`, `nome_turma`, `ativa`, `aluno_ra`, `disciplina_id`, `professor_id`, `periodo_id`, `curso_id`, `turno_id`, `alterado_por`, `data_criado`, `data_editado`) VALUES
(1, 'INF-T1B', 1, '4513515-12', 1, 3, 1, 1, 2, 'Admin', '2025-08-15 18:21:10', '2025-08-15 18:48:09'),
(2, 'INF-T1B', 1, '4513515-12', 22, 2, 1, 1, 2, 'Admin', '2025-08-15 18:21:10', '2025-08-15 18:46:37'),
(3, 'INF-M1A', 1, '9874528-95', 16, 2, 1, 1, 1, 'Admin', '2025-08-20 20:38:33', '2025-08-21 20:08:04');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turnos`
--

CREATE TABLE `turnos` (
  `id_turno` int(11) NOT NULL,
  `turno` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `editado_por` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `data_criado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_editado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `turnos`
--

INSERT INTO `turnos` (`id_turno`, `turno`, `editado_por`, `data_criado`, `data_editado`) VALUES
(1, 'ManhÃ£', 'Admin', '2024-10-16 13:08:05', '2025-10-10 20:22:59'),
(2, 'Tarde', 'Admin', '2024-10-16 13:08:15', '2024-10-16 13:08:15'),
(3, 'Noite', 'Admin', '2024-10-16 13:08:22', '2024-10-16 13:08:22'),
(4, 'EAD', 'Admin', '2024-10-16 13:08:29', '2024-10-16 13:08:29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(128) COLLATE utf8_unicode_ci DEFAULT '7B00348CD926B12509E4326E7E1AA6BC23C59D3621D0A9EC902E09A01C692ED6',
  `nivel` tinyint(1) DEFAULT '1',
  `email` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(128) COLLATE utf8_unicode_ci DEFAULT 'avatar.png',
  `ultimo_login` timestamp NULL DEFAULT NULL,
  `data_criado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_editado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `username`, `senha`, `nivel`, `email`, `avatar`, `ultimo_login`, `data_criado`, `data_editado`) VALUES
(1, 'Admin', '7B00348CD926B12509E4326E7E1AA6BC23C59D3621D0A9EC902E09A01C692ED6', 9, 'admin@eva-alcidesmaya.com.br', 'avatar.png', '2025-10-10 18:09:32', '2024-09-28 20:31:27', '2025-10-10 18:09:32'),
(2, 'NADD', '7B00348CD926B12509E4326E7E1AA6BC23C59D3621D0A9EC902E09A01C692ED6', 3, 'nadd@alcidesmaya.com.br', 'avatar.png', NULL, '2024-09-28 21:03:32', '2025-10-10 18:09:44'),
(73, 'marcio_motta', '7B00348CD926B12509E4326E7E1AA6BC23C59D3621D0A9EC902E09A01C692ED6', 2, 'mmotta@gmail.com', 'obiwan.jpg', '2025-08-29 18:02:59', '2025-08-12 17:45:02', '2025-10-10 18:09:49'),
(74, 'alexandre_bonnamain', '7B00348CD926B12509E4326E7E1AA6BC23C59D3621D0A9EC902E09A01C692ED6', 2, 'bonnamain@gmail.com', 'avatar.png', NULL, '2025-08-12 17:50:40', '2025-10-10 18:09:53'),
(77, '4513515-12', '7B00348CD926B12509E4326E7E1AA6BC23C59D3621D0A9EC902E09A01C692ED6', 1, 'daiene@gmail.com', 'avatar.png', '2025-09-10 18:06:58', '2025-08-12 18:38:58', '2025-10-10 18:09:56'),
(78, '9874528-95', '7B00348CD926B12509E4326E7E1AA6BC23C59D3621D0A9EC902E09A01C692ED6', 1, 'lucas.psantos@gmail.com', 'avatar.png', NULL, '2025-08-20 20:32:47', '2025-10-10 18:10:01');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id_aluno`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `ra` (`ra`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- Índices para tabela `conteudos`
--
ALTER TABLE `conteudos`
  ADD PRIMARY KEY (`id_conteudo`),
  ADD KEY `disciplina` (`disciplina_id`),
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
  ADD PRIMARY KEY (`id_prof`);

--
-- Índices para tabela `turmas`
--
ALTER TABLE `turmas`
  ADD PRIMARY KEY (`id_turma`),
  ADD KEY `aluno_ra` (`aluno_ra`),
  ADD KEY `disciplina_id` (`disciplina_id`),
  ADD KEY `professor_id` (`professor_id`),
  ADD KEY `periodo_id` (`periodo_id`),
  ADD KEY `curso` (`curso_id`),
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
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `conteudos`
--
ALTER TABLE `conteudos`
  MODIFY `id_conteudo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `disciplinas`
--
ALTER TABLE `disciplinas`
  MODIFY `id_disciplina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `periodos`
--
ALTER TABLE `periodos`
  MODIFY `id_periodo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `professores`
--
ALTER TABLE `professores`
  MODIFY `id_prof` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `turmas`
--
ALTER TABLE `turmas`
  MODIFY `id_turma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `turnos`
--
ALTER TABLE `turnos`
  MODIFY `id_turno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `conteudos`
--
ALTER TABLE `conteudos`
  ADD CONSTRAINT `conteudos_ibfk_1` FOREIGN KEY (`disciplina_id`) REFERENCES `disciplinas` (`id_disciplina`),
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
  ADD CONSTRAINT `turmas_ibfk_5` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id_curso`),
  ADD CONSTRAINT `turmas_ibfk_6` FOREIGN KEY (`turno_id`) REFERENCES `turnos` (`id_turno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
