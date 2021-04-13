-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 23-Ago-2019 às 16:41
-- Versão do servidor: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 5.6.40-6+ubuntu16.04.1+deb.sury.org+3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_sistema_estagios`
--

--
-- Extraindo dados da tabela `tbl_menus`
--

INSERT INTO `tbl_menus` (`id`, `nome`, `status`, `data_cadastro`, `data_modificacao`) VALUES
(8, 'Administração', 1, '2019-08-23 10:38:06', '2019-08-23 10:38:28'),
(9, 'Empresas', 1, '2019-08-23 10:42:59', '2019-08-23 10:42:59'),
(10, 'Usuários', 1, '2019-08-23 10:44:07', '2019-08-23 10:44:07'),
(11, 'Estágios', 1, '2019-08-23 10:44:28', '2019-08-23 10:44:28');

--
-- Extraindo dados da tabela `tbl_menus_itens`
--

INSERT INTO `tbl_menus_itens` (`id`, `nome`, `status`, `id_menu`, `id_metodo`, `data_cadastro`, `data_modificacao`) VALUES
(34, 'Perfis', 1, 8, 140, '2019-08-23 10:38:46', '2019-08-23 10:38:46'),
(35, 'Menus', 1, 8, 153, '2019-08-23 10:38:59', '2019-08-23 10:38:59'),
(36, 'Gerenciar', 1, 9, 139, '2019-08-23 10:43:11', '2019-08-23 15:53:39'),
(37, 'Gerenciar', 1, 10, 146, '2019-08-23 10:46:06', '2019-08-23 10:46:06'),
(38, 'Semestres', 1, 11, 161, '2019-08-23 16:08:04', '2019-08-23 16:08:04');

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

--
-- Extraindo dados da tabela `tbl_perfis`
--

INSERT INTO `tbl_perfis` (`id`, `nome`, `identificacao`, `status`, `data_cadastro`, `data_modificacao`) VALUES
(14, 'Administrador', 'ADMIN', 1, '2019-08-23 13:13:30', '2019-08-23 18:38:07'),
(15, 'Supervisor', NULL, 1, '2019-08-23 19:24:04', '2019-08-23 19:24:04'),
(16, 'Orientador', NULL, 1, '2019-08-23 19:24:22', '2019-08-23 19:24:22'),
(17, 'Aluno', NULL, 1, '2019-08-23 19:24:27', '2019-08-23 19:24:27'),
(18, 'Coordenador', NULL, 1, '2019-08-23 19:24:45', '2019-08-23 19:24:45');

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
(36, 14, 173, '2019-08-23 13:37:30'),
(37, 15, 149, '2019-08-23 19:24:59'),
(38, 15, 150, '2019-08-23 19:25:02'),
(39, 15, 151, '2019-08-23 19:25:03'),
(40, 15, 152, '2019-08-23 19:25:04'),
(41, 15, 139, '2019-08-23 19:27:18'),
(42, 15, 169, '2019-08-23 19:27:35');

--
-- Extraindo dados da tabela `tbl_semestre_letivo`
--

INSERT INTO `tbl_semestre_letivo` (`idsemestre_letivo`, `semestre`, `ano`, `data_inicio`, `data_final`, `status`, `data_cadastro`, `data_modificacao`) VALUES
(1, 2, 2019, '2019-08-18', '2019-12-31', 1, '2019-08-23 19:11:04', '2019-08-23 19:11:04');

--
-- Extraindo dados da tabela `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`idusuario`, `perfil`, `nome`, `sobrenome`, `matricula`, `email`, `senha`, `alterar_senha`, `contato`, `status`, `data_cadastro`, `data_modificacao`) VALUES
(1, 14, 'Administrador', '', 'admin', 'teste@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 0, NULL, 1, '2019-08-23 13:14:03', '2019-08-23 18:24:24'),
(2, 15, 'Supervisor', '', 'supervisor', 'superviso@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 0, '(33) 33333-333', 1, '2019-08-23 19:35:22', '2019-08-23 19:35:22');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
