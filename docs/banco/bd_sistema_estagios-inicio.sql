-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Set-2019 às 20:01
-- Versão do servidor: 10.3.15-MariaDB
-- versão do PHP: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_sistema_estagios`
--
CREATE DATABASE IF NOT EXISTS `bd_sistema_estagios` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bd_sistema_estagios`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_aluno`
--

CREATE TABLE `tbl_aluno` (
  `idusuario` int(10) UNSIGNED NOT NULL,
  `idnatureza_vinculo` int(10) UNSIGNED NOT NULL,
  `carga_horaria_cumprida` int(3) NOT NULL DEFAULT 0,
  `periodo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_arquivos_necessarios`
--

CREATE TABLE `tbl_arquivos_necessarios` (
  `idnatureza_vinculo` int(10) UNSIGNED NOT NULL,
  `idtipo_arquivo` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_documento`
--

CREATE TABLE `tbl_documento` (
  `iddocumento` int(10) UNSIGNED NOT NULL,
  `idusuario` int(10) UNSIGNED NOT NULL,
  `idtipo_arquivo` int(10) UNSIGNED NOT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diretorio` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `data_upload` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_empresa`
--

CREATE TABLE `tbl_empresa` (
  `idempresa` int(10) UNSIGNED NOT NULL,
  `razao_social` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cnpj` varchar(18) COLLATE utf8_unicode_ci NOT NULL,
  `inicio_vinculo` date NOT NULL,
  `final_vinculo` date NOT NULL,
  `contato` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cidade` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bairro` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `endereco` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cep` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_atualizacao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_estagio`
--

CREATE TABLE `tbl_estagio` (
  `idestagio` int(10) UNSIGNED NOT NULL,
  `idusuario` int(10) UNSIGNED NOT NULL,
  `idsemestre_letivo` int(10) UNSIGNED NOT NULL,
  `idempresa` int(10) UNSIGNED NOT NULL,
  `idusuario_s` int(10) UNSIGNED NOT NULL,
  `area_de_atuacao` text COLLATE utf8_unicode_ci NOT NULL,
  `data_inicio` date NOT NULL,
  `data_termino` date NOT NULL,
  `carga_horaria_total` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_mensagem`
--

CREATE TABLE `tbl_mensagem` (
  `idusuario1` int(10) UNSIGNED NOT NULL,
  `idusuario2` int(10) UNSIGNED NOT NULL,
  `mensagem` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data_envio` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_visualizacao` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_menus`
--

CREATE TABLE `tbl_menus` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `data_modificacao` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbl_menus`
--

INSERT INTO `tbl_menus` (`id`, `nome`, `status`, `data_cadastro`, `data_modificacao`) VALUES
(8, 'Administração', 1, '2019-08-23 10:38:06', '2019-08-23 10:38:28'),
(9, 'Empresas', 1, '2019-08-23 10:42:59', '2019-08-23 10:42:59'),
(10, 'Usuários', 1, '2019-08-23 10:44:07', '2019-08-23 10:44:07'),
(11, 'Estágios', 1, '2019-08-23 10:44:28', '2019-08-23 10:44:28');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_menus_itens`
--

CREATE TABLE `tbl_menus_itens` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `id_menu` bigint(20) NOT NULL,
  `id_metodo` bigint(20) NOT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `data_modificacao` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbl_menus_itens`
--

INSERT INTO `tbl_menus_itens` (`id`, `nome`, `status`, `id_menu`, `id_metodo`, `data_cadastro`, `data_modificacao`) VALUES
(34, 'Perfis', 1, 8, 140, '2019-08-23 10:38:46', '2019-08-23 10:38:46'),
(35, 'Menus', 1, 8, 153, '2019-08-23 10:38:59', '2019-08-23 10:38:59'),
(36, 'Gerenciar', 1, 9, 139, '2019-08-23 10:43:11', '2019-08-23 10:43:18'),
(37, 'Gerenciar', 1, 10, 146, '2019-08-23 10:46:06', '2019-08-23 10:46:06'),
(38, 'Tipos de Vínculos', 1, 8, 170, '2019-09-12 12:10:58', '2019-09-12 12:10:58'),
(39, 'Semestres Letivos', 1, 8, 161, '2019-09-12 12:20:59', '2019-09-12 12:20:59'),
(40, 'Arquivos Obrigatórios', 1, 8, 165, '2019-09-12 12:21:19', '2019-09-12 12:21:19');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_metodos`
--

CREATE TABLE `tbl_metodos` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `classe` varchar(45) NOT NULL,
  `metodo` varchar(45) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `apelido` varchar(255) NOT NULL,
  `privado` tinyint(1) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_modificacao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbl_metodos`
--

INSERT INTO `tbl_metodos` (`id`, `nome`, `classe`, `metodo`, `descricao`, `apelido`, `privado`, `data_criacao`, `data_modificacao`) VALUES
(139, 'sistema', 'sistema', 'index', 'index', 'sistema/index', 1, '2019-03-28 02:24:23', '2019-03-28 02:24:23'),
(140, 'perfil', 'perfil', 'index', 'index', 'perfil/index', 1, '2019-08-23 13:23:33', '2019-08-23 13:23:33'),
(141, 'perfil', 'perfil', 'cadastrar', 'cadastrar', 'perfil/cadastrar', 1, '2019-08-23 13:23:49', '2019-08-23 13:23:49'),
(142, 'perfil', 'perfil', 'editar', 'editar', 'perfil/editar', 1, '2019-08-23 13:23:53', '2019-08-23 13:23:53'),
(143, 'perfil', 'perfil', 'excluir', 'excluir', 'perfil/excluir', 1, '2019-08-23 13:24:02', '2019-08-23 13:24:02'),
(144, 'permissao', 'permissao', 'index', 'index', 'permissao/index', 1, '2019-08-23 13:24:11', '2019-08-23 13:24:11'),
(145, 'permissao', 'permissao', 'alterar_permissao', 'alterar_permissao', 'permissao/alterar_permissao', 1, '2019-08-23 13:24:22', '2019-08-23 13:24:22'),
(146, 'usuario', 'usuario', 'index', 'index', 'usuario/index', 1, '2019-08-23 13:24:29', '2019-08-23 13:24:29'),
(147, 'usuario', 'usuario', 'cadastrar', 'cadastrar', 'usuario/cadastrar', 1, '2019-08-23 13:24:32', '2019-08-23 13:24:32'),
(148, 'usuario', 'usuario', 'editar', 'editar', 'usuario/editar', 1, '2019-08-23 13:24:34', '2019-08-23 13:24:34'),
(149, 'empresa', 'empresa', 'index', 'index', 'empresa/index', 1, '2019-08-23 13:24:51', '2019-08-23 13:24:51'),
(150, 'empresa', 'empresa', 'cadastrar', 'cadastrar', 'empresa/cadastrar', 1, '2019-08-23 13:24:54', '2019-08-23 13:24:54'),
(151, 'empresa', 'empresa', 'editar', 'editar', 'empresa/editar', 1, '2019-08-23 13:24:57', '2019-08-23 13:24:57'),
(152, 'empresa', 'empresa', 'excluir', 'excluir', 'empresa/excluir', 1, '2019-08-23 13:24:59', '2019-08-23 13:24:59'),
(153, 'menu', 'menu', 'index', 'index', 'menu/index', 1, '2019-08-23 13:25:05', '2019-08-23 13:25:05'),
(154, 'menu', 'menu', 'cadastrar', 'cadastrar', 'menu/cadastrar', 1, '2019-08-23 13:25:08', '2019-08-23 13:25:08'),
(155, 'menu', 'menu', 'editar', 'editar', 'menu/editar', 1, '2019-08-23 13:25:10', '2019-08-23 13:25:10'),
(156, 'menu', 'menu', 'excluir', 'excluir', 'menu/excluir', 1, '2019-08-23 13:25:13', '2019-08-23 13:25:13'),
(157, 'item', 'item', 'index', 'index', 'item/index', 1, '2019-08-23 13:25:21', '2019-08-23 13:25:21'),
(158, 'item', 'item', 'cadastrar', 'cadastrar', 'item/cadastrar', 1, '2019-08-23 13:25:23', '2019-08-23 13:25:23'),
(159, 'item', 'item', 'editar', 'editar', 'item/editar', 1, '2019-08-23 13:25:25', '2019-08-23 13:25:25'),
(160, 'item', 'item', 'excluir', 'excluir', 'item/excluir', 1, '2019-08-23 13:25:28', '2019-08-23 13:25:28'),
(161, 'semestre', 'semestre', 'index', 'index', 'semestre/index', 1, '2019-08-23 13:25:34', '2019-08-23 13:25:34'),
(162, 'semestre', 'semestre', 'cadastrar', 'cadastrar', 'semestre/cadastrar', 1, '2019-08-23 13:25:37', '2019-08-23 13:25:37'),
(163, 'semestre', 'semestre', 'editar', 'editar', 'semestre/editar', 1, '2019-08-23 13:25:39', '2019-08-23 13:25:39'),
(164, 'semestre', 'semestre', 'excluir', 'excluir', 'semestre/excluir', 1, '2019-08-23 13:25:41', '2019-08-23 13:25:41'),
(165, 'tipoArquivo', 'tipoArquivo', 'index', 'index', 'tipoArquivo/index', 1, '2019-08-23 13:25:51', '2019-08-23 13:25:51'),
(166, 'tipoArquivo', 'tipoArquivo', 'cadastrar', 'cadastrar', 'tipoArquivo/cadastrar', 1, '2019-08-23 13:25:53', '2019-08-23 13:25:53'),
(167, 'tipoArquivo', 'tipoArquivo', 'editar', 'editar', 'tipoArquivo/editar', 1, '2019-08-23 13:25:55', '2019-08-23 13:25:55'),
(168, 'tipoArquivo', 'tipoArquivo', 'excluir', 'excluir', 'tipoArquivo/excluir', 1, '2019-08-23 13:25:58', '2019-08-23 13:25:58'),
(169, 'aluno', 'aluno', 'index', 'index', 'aluno/index', 1, '2019-08-23 13:26:06', '2019-08-23 13:26:06'),
(170, 'naturezaVinculo', 'naturezaVinculo', 'index', 'index', 'naturezaVinculo/index', 1, '2019-08-23 13:26:17', '2019-08-23 13:26:17'),
(171, 'naturezaVinculo', 'naturezaVinculo', 'cadastrar', 'cadastrar', 'naturezaVinculo/cadastrar', 1, '2019-08-23 13:26:28', '2019-08-23 13:26:28'),
(172, 'naturezaVinculo', 'naturezaVinculo', 'editar', 'editar', 'naturezaVinculo/editar', 1, '2019-08-23 13:26:31', '2019-08-23 13:26:31'),
(173, 'naturezaVinculo', 'naturezaVinculo', 'excluir', 'excluir', 'naturezaVinculo/excluir', 1, '2019-08-23 13:26:35', '2019-08-23 13:26:35'),
(174, 'aluno', 'aluno', 'cadastrar', 'cadastrar', 'aluno/cadastrar', 1, '2019-08-23 13:32:38', '2019-08-23 13:32:38');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_natureza_vinculo`
--

CREATE TABLE `tbl_natureza_vinculo` (
  `idnatureza_vinculo` int(10) UNSIGNED NOT NULL,
  `nome` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_atualizacao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_perfis`
--

CREATE TABLE `tbl_perfis` (
  `id` int(2) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `identificacao` varchar(5) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_atualizacao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbl_perfis`
--

INSERT INTO `tbl_perfis` (`id`, `nome`, `identificacao`, `status`, `data_cadastro`, `data_atualizacao`) VALUES
(14, 'Administrador', 'ADMIN', 1, '2019-08-23 13:13:30', '2019-08-23 13:13:30');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_permissoes`
--

CREATE TABLE `tbl_permissoes` (
  `id` bigint(20) NOT NULL,
  `id_perfil` int(2) NOT NULL,
  `id_metodo` bigint(20) NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbl_permissoes`
--

INSERT INTO `tbl_permissoes` (`id`, `id_perfil`, `id_metodo`, `data_cadastro`) VALUES
(1, 14, 139, '2019-08-23 13:17:27'),
(2, 14, 145, '2019-08-23 13:33:25'),
(3, 14, 140, '2019-08-23 13:33:46'),
(4, 14, 144, '2019-08-23 13:36:28'),
(5, 14, 141, '2019-08-23 13:36:36'),
(6, 14, 142, '2019-08-23 13:36:38'),
(7, 14, 143, '2019-08-23 13:36:39'),
(8, 14, 146, '2019-08-23 13:36:44'),
(9, 14, 147, '2019-08-23 13:36:45'),
(10, 14, 148, '2019-08-23 13:36:46'),
(11, 14, 149, '2019-08-23 13:36:50'),
(12, 14, 150, '2019-08-23 13:36:51'),
(13, 14, 151, '2019-08-23 13:36:52'),
(14, 14, 152, '2019-08-23 13:36:53'),
(15, 14, 153, '2019-08-23 13:36:56'),
(16, 14, 154, '2019-08-23 13:36:57'),
(17, 14, 155, '2019-08-23 13:36:58'),
(18, 14, 156, '2019-08-23 13:36:59'),
(19, 14, 157, '2019-08-23 13:37:04'),
(20, 14, 158, '2019-08-23 13:37:05'),
(21, 14, 159, '2019-08-23 13:37:06'),
(22, 14, 160, '2019-08-23 13:37:07'),
(23, 14, 161, '2019-08-23 13:37:10'),
(24, 14, 162, '2019-08-23 13:37:11'),
(25, 14, 163, '2019-08-23 13:37:12'),
(26, 14, 164, '2019-08-23 13:37:13'),
(27, 14, 165, '2019-08-23 13:37:16'),
(28, 14, 166, '2019-08-23 13:37:16'),
(29, 14, 167, '2019-08-23 13:37:17'),
(30, 14, 168, '2019-08-23 13:37:18'),
(31, 14, 169, '2019-08-23 13:37:22'),
(32, 14, 174, '2019-08-23 13:37:23'),
(33, 14, 170, '2019-08-23 13:37:26'),
(34, 14, 171, '2019-08-23 13:37:28'),
(35, 14, 172, '2019-08-23 13:37:29'),
(36, 14, 173, '2019-08-23 13:37:30');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_relatorio`
--

CREATE TABLE `tbl_relatorio` (
  `idrelatorio` int(10) UNSIGNED NOT NULL,
  `idusuario` int(10) UNSIGNED NOT NULL,
  `idtipo_arquivo` int(10) UNSIGNED NOT NULL,
  `dados` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `status_c` tinyint(1) NOT NULL DEFAULT 0,
  `status_s` tinyint(1) NOT NULL DEFAULT 0,
  `status_o` tinyint(1) NOT NULL DEFAULT 0,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_responsavel_aluno`
--

CREATE TABLE `tbl_responsavel_aluno` (
  `usuario_idusuario` int(10) UNSIGNED NOT NULL,
  `aluno_usuario_idusuario` int(10) UNSIGNED NOT NULL,
  `tipo_responsavel` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_semestre_letivo`
--

CREATE TABLE `tbl_semestre_letivo` (
  `idsemestre_letivo` int(10) UNSIGNED NOT NULL,
  `semestre` int(1) NOT NULL,
  `ano` int(4) UNSIGNED NOT NULL,
  `data_inicio` date NOT NULL,
  `data_final` date NOT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_supervisor_empresa`
--

CREATE TABLE `tbl_supervisor_empresa` (
  `empresa_idempresa` int(10) UNSIGNED NOT NULL,
  `usuario_idusuario` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_tipo_arquivo`
--

CREATE TABLE `tbl_tipo_arquivo` (
  `idtipo_arquivo` int(10) UNSIGNED NOT NULL,
  `nome` varchar(45) NOT NULL,
  `descricao` text NOT NULL,
  `diretorio` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `data_cadastro` timestamp NULL DEFAULT current_timestamp(),
  `data_modificacao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbl_tipo_arquivo`
--

INSERT INTO `tbl_tipo_arquivo` (`idtipo_arquivo`, `nome`, `descricao`, `diretorio`, `status`, `data_cadastro`, `data_modificacao`) VALUES
(1, 'teste', 'teste', '/assets/uploads/required_files/1ª Convocação de Tutor a Distância.pdf', 1, '2019-09-12 17:57:00', '2019-09-12 17:57:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `idusuario` int(10) UNSIGNED NOT NULL,
  `perfil` int(2) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `matricula` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `alterar_senha` tinyint(1) NOT NULL DEFAULT 0,
  `contato1` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `contato2` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_atualizacao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`idusuario`, `perfil`, `nome`, `matricula`, `email`, `senha`, `alterar_senha`, `contato1`, `contato2`, `status`, `data_cadastro`, `data_atualizacao`) VALUES
(1, 14, 'Administrador', 'admin', 'teste@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 0, '3333333', NULL, 1, '2019-08-23 13:14:03', '2019-08-23 13:17:05');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_vagas`
--

CREATE TABLE `tbl_vagas` (
  `idtbl_vagas` int(10) UNSIGNED NOT NULL,
  `idempresa` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_atualizacao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbl_aluno`
--
ALTER TABLE `tbl_aluno`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `fk_aluno_natureza_vinculo1_idx` (`idnatureza_vinculo`);

--
-- Índices para tabela `tbl_arquivos_necessarios`
--
ALTER TABLE `tbl_arquivos_necessarios`
  ADD PRIMARY KEY (`idnatureza_vinculo`,`idtipo_arquivo`),
  ADD KEY `fk_natureza_vinculo_has_tipo_arquivo_tipo_arquivo1_idx` (`idtipo_arquivo`),
  ADD KEY `fk_natureza_vinculo_has_tipo_arquivo_natureza_vinculo1_idx` (`idnatureza_vinculo`);

--
-- Índices para tabela `tbl_documento`
--
ALTER TABLE `tbl_documento`
  ADD PRIMARY KEY (`iddocumento`),
  ADD KEY `fk_arquivo_tipo_arquivo1_idx` (`idtipo_arquivo`),
  ADD KEY `fk_arquivo_usuario1_idx` (`idusuario`);

--
-- Índices para tabela `tbl_empresa`
--
ALTER TABLE `tbl_empresa`
  ADD PRIMARY KEY (`idempresa`);

--
-- Índices para tabela `tbl_estagio`
--
ALTER TABLE `tbl_estagio`
  ADD PRIMARY KEY (`idestagio`),
  ADD KEY `fk_estagio_aluno1_idx` (`idusuario`),
  ADD KEY `fk_estagio_semestre_letivo1_idx` (`idsemestre_letivo`),
  ADD KEY `fk_estagio_supervisor_empresa1_idx` (`idempresa`,`idusuario_s`);

--
-- Índices para tabela `tbl_mensagem`
--
ALTER TABLE `tbl_mensagem`
  ADD PRIMARY KEY (`idusuario1`,`idusuario2`),
  ADD KEY `fk_tbl_usuario_has_tbl_usuario_tbl_usuario2_idx` (`idusuario2`),
  ADD KEY `fk_tbl_usuario_has_tbl_usuario_tbl_usuario1_idx` (`idusuario1`);

--
-- Índices para tabela `tbl_menus`
--
ALTER TABLE `tbl_menus`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tbl_menus_itens`
--
ALTER TABLE `tbl_menus_itens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tbl_menus_itens_tbl_menus1_idx` (`id_menu`),
  ADD KEY `fk_tbl_menus_itens_tbl_metodos1_idx` (`id_metodo`);

--
-- Índices para tabela `tbl_metodos`
--
ALTER TABLE `tbl_metodos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tbl_natureza_vinculo`
--
ALTER TABLE `tbl_natureza_vinculo`
  ADD PRIMARY KEY (`idnatureza_vinculo`);

--
-- Índices para tabela `tbl_perfis`
--
ALTER TABLE `tbl_perfis`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tbl_permissoes`
--
ALTER TABLE `tbl_permissoes`
  ADD PRIMARY KEY (`id`,`id_perfil`,`id_metodo`),
  ADD KEY `fk_tbl_perfis_has_tbl_metodos_tbl_metodos1_idx` (`id_metodo`),
  ADD KEY `fk_tbl_perfis_has_tbl_metodos_tbl_perfis1_idx` (`id_perfil`);

--
-- Índices para tabela `tbl_relatorio`
--
ALTER TABLE `tbl_relatorio`
  ADD PRIMARY KEY (`idrelatorio`),
  ADD KEY `fk_tbl_documento_tbl_usuario1_idx` (`idusuario`),
  ADD KEY `fk_tbl_documento_tbl_tipo_arquivo1_idx` (`idtipo_arquivo`);

--
-- Índices para tabela `tbl_responsavel_aluno`
--
ALTER TABLE `tbl_responsavel_aluno`
  ADD PRIMARY KEY (`usuario_idusuario`,`aluno_usuario_idusuario`),
  ADD KEY `fk_usuario_has_aluno_aluno1_idx` (`aluno_usuario_idusuario`),
  ADD KEY `fk_usuario_has_aluno_usuario1_idx` (`usuario_idusuario`);

--
-- Índices para tabela `tbl_semestre_letivo`
--
ALTER TABLE `tbl_semestre_letivo`
  ADD PRIMARY KEY (`idsemestre_letivo`);

--
-- Índices para tabela `tbl_supervisor_empresa`
--
ALTER TABLE `tbl_supervisor_empresa`
  ADD PRIMARY KEY (`empresa_idempresa`,`usuario_idusuario`),
  ADD KEY `fk_empresa_has_usuario_usuario1_idx` (`usuario_idusuario`),
  ADD KEY `fk_empresa_has_usuario_empresa1_idx` (`empresa_idempresa`);

--
-- Índices para tabela `tbl_tipo_arquivo`
--
ALTER TABLE `tbl_tipo_arquivo`
  ADD PRIMARY KEY (`idtipo_arquivo`);

--
-- Índices para tabela `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `fk_usuario_tbl_perfis1_idx` (`perfil`);

--
-- Índices para tabela `tbl_vagas`
--
ALTER TABLE `tbl_vagas`
  ADD PRIMARY KEY (`idtbl_vagas`),
  ADD KEY `fk_tbl_vagas_empresa1_idx` (`idempresa`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbl_documento`
--
ALTER TABLE `tbl_documento`
  MODIFY `iddocumento` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_empresa`
--
ALTER TABLE `tbl_empresa`
  MODIFY `idempresa` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_estagio`
--
ALTER TABLE `tbl_estagio`
  MODIFY `idestagio` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_menus`
--
ALTER TABLE `tbl_menus`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `tbl_menus_itens`
--
ALTER TABLE `tbl_menus_itens`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de tabela `tbl_metodos`
--
ALTER TABLE `tbl_metodos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT de tabela `tbl_natureza_vinculo`
--
ALTER TABLE `tbl_natureza_vinculo`
  MODIFY `idnatureza_vinculo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_perfis`
--
ALTER TABLE `tbl_perfis`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `tbl_permissoes`
--
ALTER TABLE `tbl_permissoes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `tbl_relatorio`
--
ALTER TABLE `tbl_relatorio`
  MODIFY `idrelatorio` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_semestre_letivo`
--
ALTER TABLE `tbl_semestre_letivo`
  MODIFY `idsemestre_letivo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_tipo_arquivo`
--
ALTER TABLE `tbl_tipo_arquivo`
  MODIFY `idtipo_arquivo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `idusuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbl_vagas`
--
ALTER TABLE `tbl_vagas`
  MODIFY `idtbl_vagas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbl_aluno`
--
ALTER TABLE `tbl_aluno`
  ADD CONSTRAINT `fk_aluno_natureza_vinculo1` FOREIGN KEY (`idnatureza_vinculo`) REFERENCES `tbl_natureza_vinculo` (`idnatureza_vinculo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_aluno_usuario` FOREIGN KEY (`idusuario`) REFERENCES `tbl_usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tbl_arquivos_necessarios`
--
ALTER TABLE `tbl_arquivos_necessarios`
  ADD CONSTRAINT `fk_natureza_vinculo_has_tipo_arquivo_natureza_vinculo1` FOREIGN KEY (`idnatureza_vinculo`) REFERENCES `tbl_natureza_vinculo` (`idnatureza_vinculo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_natureza_vinculo_has_tipo_arquivo_tipo_arquivo1` FOREIGN KEY (`idtipo_arquivo`) REFERENCES `tbl_tipo_arquivo` (`idtipo_arquivo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tbl_documento`
--
ALTER TABLE `tbl_documento`
  ADD CONSTRAINT `fk_arquivo_tipo_arquivo1` FOREIGN KEY (`idtipo_arquivo`) REFERENCES `tbl_tipo_arquivo` (`idtipo_arquivo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_arquivo_usuario1` FOREIGN KEY (`idusuario`) REFERENCES `tbl_usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tbl_estagio`
--
ALTER TABLE `tbl_estagio`
  ADD CONSTRAINT `fk_estagio_aluno1` FOREIGN KEY (`idusuario`) REFERENCES `tbl_aluno` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_estagio_semestre_letivo1` FOREIGN KEY (`idsemestre_letivo`) REFERENCES `tbl_semestre_letivo` (`idsemestre_letivo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_estagio_supervisor_empresa1` FOREIGN KEY (`idempresa`,`idusuario_s`) REFERENCES `tbl_supervisor_empresa` (`empresa_idempresa`, `usuario_idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tbl_mensagem`
--
ALTER TABLE `tbl_mensagem`
  ADD CONSTRAINT `fk_tbl_usuario_has_tbl_usuario_tbl_usuario1` FOREIGN KEY (`idusuario1`) REFERENCES `tbl_usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_usuario_has_tbl_usuario_tbl_usuario2` FOREIGN KEY (`idusuario2`) REFERENCES `tbl_usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tbl_menus_itens`
--
ALTER TABLE `tbl_menus_itens`
  ADD CONSTRAINT `fk_tbl_menus_itens_tbl_menus1` FOREIGN KEY (`id_menu`) REFERENCES `tbl_menus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_menus_itens_tbl_metodos1` FOREIGN KEY (`id_metodo`) REFERENCES `tbl_metodos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tbl_permissoes`
--
ALTER TABLE `tbl_permissoes`
  ADD CONSTRAINT `fk_tbl_perfis_has_tbl_metodos_tbl_metodos1` FOREIGN KEY (`id_metodo`) REFERENCES `tbl_metodos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_perfis_has_tbl_metodos_tbl_perfis1` FOREIGN KEY (`id_perfil`) REFERENCES `tbl_perfis` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tbl_relatorio`
--
ALTER TABLE `tbl_relatorio`
  ADD CONSTRAINT `fk_tbl_documento_tbl_tipo_arquivo1` FOREIGN KEY (`idtipo_arquivo`) REFERENCES `tbl_tipo_arquivo` (`idtipo_arquivo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_documento_tbl_usuario1` FOREIGN KEY (`idusuario`) REFERENCES `tbl_usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tbl_responsavel_aluno`
--
ALTER TABLE `tbl_responsavel_aluno`
  ADD CONSTRAINT `fk_usuario_has_aluno_aluno1` FOREIGN KEY (`aluno_usuario_idusuario`) REFERENCES `tbl_aluno` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_has_aluno_usuario1` FOREIGN KEY (`usuario_idusuario`) REFERENCES `tbl_usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tbl_supervisor_empresa`
--
ALTER TABLE `tbl_supervisor_empresa`
  ADD CONSTRAINT `fk_empresa_has_usuario_empresa1` FOREIGN KEY (`empresa_idempresa`) REFERENCES `tbl_empresa` (`idempresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_empresa_has_usuario_usuario1` FOREIGN KEY (`usuario_idusuario`) REFERENCES `tbl_usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD CONSTRAINT `fk_usuario_tbl_perfis1` FOREIGN KEY (`perfil`) REFERENCES `tbl_perfis` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tbl_vagas`
--
ALTER TABLE `tbl_vagas`
  ADD CONSTRAINT `fk_tbl_vagas_empresa1` FOREIGN KEY (`idempresa`) REFERENCES `tbl_empresa` (`idempresa`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
