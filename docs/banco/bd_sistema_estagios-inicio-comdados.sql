-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.38-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para bd_sistema_estagios
CREATE DATABASE IF NOT EXISTS `bd_sistema_estagios` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `bd_sistema_estagios`;

-- Copiando estrutura para tabela bd_sistema_estagios.tbl_aluno
CREATE TABLE IF NOT EXISTS `tbl_aluno` (
  `idusuario` int(10) unsigned NOT NULL,
  `idnatureza_vinculo` int(10) unsigned NOT NULL,
  `carga_horaria_cumprida` int(3) NOT NULL DEFAULT '0',
  `periodo` int(1) DEFAULT NULL,
  `data_cadastro` timestamp NULL DEFAULT NULL,
  `data_modificacao` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idusuario`),
  KEY `fk_aluno_natureza_vinculo1_idx` (`idnatureza_vinculo`),
  CONSTRAINT `fk_aluno_natureza_vinculo1` FOREIGN KEY (`idnatureza_vinculo`) REFERENCES `tbl_natureza_vinculo` (`idnatureza_vinculo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_aluno_usuario` FOREIGN KEY (`idusuario`) REFERENCES `tbl_usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela bd_sistema_estagios.tbl_aluno: ~0 rows (aproximadamente)
DELETE FROM `tbl_aluno`;
/*!40000 ALTER TABLE `tbl_aluno` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_aluno` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_sistema_estagios.tbl_arquivo
CREATE TABLE IF NOT EXISTS `tbl_arquivo` (
  `idarquivo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idtipo_arquivo` int(10) unsigned NOT NULL,
  `idestagio` int(10) unsigned NOT NULL,
  `nome` text NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `data_cadastro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `data_modificacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idarquivo`),
  KEY `fk_arquivo_tipo_arquivo1_idx` (`idtipo_arquivo`),
  KEY `fk_tbl_arquivo_tbl_estagio1_idx` (`idestagio`),
  CONSTRAINT `fk_arquivo_tipo_arquivo1` FOREIGN KEY (`idtipo_arquivo`) REFERENCES `tbl_tipo_arquivo` (`idtipo_arquivo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_arquivo_tbl_estagio1` FOREIGN KEY (`idestagio`) REFERENCES `tbl_estagio` (`idestagio`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela bd_sistema_estagios.tbl_arquivo: ~0 rows (aproximadamente)
DELETE FROM `tbl_arquivo`;
/*!40000 ALTER TABLE `tbl_arquivo` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_arquivo` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_sistema_estagios.tbl_arquivos_necessarios
CREATE TABLE IF NOT EXISTS `tbl_arquivos_necessarios` (
  `idnatureza_vinculo` int(10) unsigned NOT NULL,
  `idtipo_arquivo` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idnatureza_vinculo`,`idtipo_arquivo`),
  KEY `fk_natureza_vinculo_has_tipo_arquivo_tipo_arquivo1_idx` (`idtipo_arquivo`),
  KEY `fk_natureza_vinculo_has_tipo_arquivo_natureza_vinculo1_idx` (`idnatureza_vinculo`),
  CONSTRAINT `fk_natureza_vinculo_has_tipo_arquivo_natureza_vinculo1` FOREIGN KEY (`idnatureza_vinculo`) REFERENCES `tbl_natureza_vinculo` (`idnatureza_vinculo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_natureza_vinculo_has_tipo_arquivo_tipo_arquivo1` FOREIGN KEY (`idtipo_arquivo`) REFERENCES `tbl_tipo_arquivo` (`idtipo_arquivo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela bd_sistema_estagios.tbl_arquivos_necessarios: ~0 rows (aproximadamente)
DELETE FROM `tbl_arquivos_necessarios`;
/*!40000 ALTER TABLE `tbl_arquivos_necessarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_arquivos_necessarios` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_sistema_estagios.tbl_contato
CREATE TABLE IF NOT EXISTS `tbl_contato` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `contato` varchar(11) NOT NULL,
  `data_cadastro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `data_modificacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela bd_sistema_estagios.tbl_contato: ~0 rows (aproximadamente)
DELETE FROM `tbl_contato`;
/*!40000 ALTER TABLE `tbl_contato` DISABLE KEYS */;
INSERT INTO `tbl_contato` (`id`, `contato`, `data_cadastro`, `data_modificacao`) VALUES
	(1, '33333333333', '2022-02-17 09:13:19', '2022-02-17 09:13:20');
/*!40000 ALTER TABLE `tbl_contato` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_sistema_estagios.tbl_empresa
CREATE TABLE IF NOT EXISTS `tbl_empresa` (
  `idempresa` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `razao_social` varchar(255) NOT NULL,
  `cnpj` varchar(18) NOT NULL,
  `inicio_vinculo` date NOT NULL,
  `final_vinculo` date NOT NULL,
  `contato` varchar(14) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `cidade` varchar(60) DEFAULT NULL,
  `bairro` varchar(60) DEFAULT NULL,
  `endereco` varchar(155) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `data_cadastro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `data_modificacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idempresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela bd_sistema_estagios.tbl_empresa: ~0 rows (aproximadamente)
DELETE FROM `tbl_empresa`;
/*!40000 ALTER TABLE `tbl_empresa` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_empresa` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_sistema_estagios.tbl_estagio
CREATE TABLE IF NOT EXISTS `tbl_estagio` (
  `idestagio` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idusuario` int(10) unsigned NOT NULL,
  `idsemestre_letivo` int(10) unsigned NOT NULL,
  `idempresa` int(10) unsigned NOT NULL,
  `idusuario_s` int(10) unsigned NOT NULL,
  `area_de_atuacao` text NOT NULL,
  `data_inicio` date NOT NULL,
  `data_termino` date NOT NULL,
  `carga_horaria_total` int(3) NOT NULL,
  `data_cadastro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `data_modificacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idestagio`),
  KEY `fk_estagio_aluno1_idx` (`idusuario`),
  KEY `fk_estagio_semestre_letivo1_idx` (`idsemestre_letivo`),
  KEY `fk_estagio_supervisor_empresa1_idx` (`idempresa`,`idusuario_s`),
  CONSTRAINT `fk_estagio_aluno1` FOREIGN KEY (`idusuario`) REFERENCES `tbl_aluno` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_estagio_semestre_letivo1` FOREIGN KEY (`idsemestre_letivo`) REFERENCES `tbl_semestre_letivo` (`idsemestre_letivo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_estagio_supervisor_empresa1` FOREIGN KEY (`idempresa`, `idusuario_s`) REFERENCES `tbl_supervisor_empresa` (`empresa_idempresa`, `usuario_idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela bd_sistema_estagios.tbl_estagio: ~0 rows (aproximadamente)
DELETE FROM `tbl_estagio`;
/*!40000 ALTER TABLE `tbl_estagio` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_estagio` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_sistema_estagios.tbl_mensagem
CREATE TABLE IF NOT EXISTS `tbl_mensagem` (
  `idusuario1` int(10) unsigned NOT NULL,
  `idusuario2` int(10) unsigned NOT NULL,
  `mensagem` varchar(255) NOT NULL,
  `data_envio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_visualizacao` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `data_cadastro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `data_modificacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idusuario1`,`idusuario2`),
  KEY `fk_tbl_usuario_has_tbl_usuario_tbl_usuario2_idx` (`idusuario2`),
  KEY `fk_tbl_usuario_has_tbl_usuario_tbl_usuario1_idx` (`idusuario1`),
  CONSTRAINT `fk_tbl_usuario_has_tbl_usuario_tbl_usuario1` FOREIGN KEY (`idusuario1`) REFERENCES `tbl_usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_usuario_has_tbl_usuario_tbl_usuario2` FOREIGN KEY (`idusuario2`) REFERENCES `tbl_usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela bd_sistema_estagios.tbl_mensagem: ~0 rows (aproximadamente)
DELETE FROM `tbl_mensagem`;
/*!40000 ALTER TABLE `tbl_mensagem` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_mensagem` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_sistema_estagios.tbl_menus
CREATE TABLE IF NOT EXISTS `tbl_menus` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `data_cadastro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `data_modificacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela bd_sistema_estagios.tbl_menus: ~0 rows (aproximadamente)
DELETE FROM `tbl_menus`;
/*!40000 ALTER TABLE `tbl_menus` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_menus` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_sistema_estagios.tbl_menus_itens
CREATE TABLE IF NOT EXISTS `tbl_menus_itens` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `id_menu` bigint(20) NOT NULL,
  `id_metodo` bigint(20) NOT NULL,
  `data_cadastro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `data_modificacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_menus_itens_tbl_menus1_idx` (`id_menu`),
  KEY `fk_tbl_menus_itens_tbl_metodos1_idx` (`id_metodo`),
  CONSTRAINT `fk_tbl_menus_itens_tbl_menus1` FOREIGN KEY (`id_menu`) REFERENCES `tbl_menus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_menus_itens_tbl_metodos1` FOREIGN KEY (`id_metodo`) REFERENCES `tbl_metodos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela bd_sistema_estagios.tbl_menus_itens: ~0 rows (aproximadamente)
DELETE FROM `tbl_menus_itens`;
/*!40000 ALTER TABLE `tbl_menus_itens` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_menus_itens` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_sistema_estagios.tbl_metodos
CREATE TABLE IF NOT EXISTS `tbl_metodos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `classe` varchar(45) NOT NULL,
  `metodo` varchar(45) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `apelido` varchar(255) NOT NULL,
  `privado` tinyint(1) NOT NULL,
  `data_criacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `data_modificacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=140 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela bd_sistema_estagios.tbl_metodos: ~0 rows (aproximadamente)
DELETE FROM `tbl_metodos`;
/*!40000 ALTER TABLE `tbl_metodos` DISABLE KEYS */;
INSERT INTO `tbl_metodos` (`id`, `nome`, `classe`, `metodo`, `descricao`, `apelido`, `privado`, `data_criacao`, `data_modificacao`) VALUES
	(139, 'sistema', 'sistema', 'index', 'index', 'sistema/index', 1, '2022-02-17 12:09:31', '2022-02-17 12:09:31');
/*!40000 ALTER TABLE `tbl_metodos` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_sistema_estagios.tbl_natureza_vinculo
CREATE TABLE IF NOT EXISTS `tbl_natureza_vinculo` (
  `idnatureza_vinculo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `descricao` text NOT NULL,
  `carga_horaria_maxima` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `data_cadastro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `data_modificacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idnatureza_vinculo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela bd_sistema_estagios.tbl_natureza_vinculo: ~0 rows (aproximadamente)
DELETE FROM `tbl_natureza_vinculo`;
/*!40000 ALTER TABLE `tbl_natureza_vinculo` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_natureza_vinculo` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_sistema_estagios.tbl_perfis
CREATE TABLE IF NOT EXISTS `tbl_perfis` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `identificacao` varchar(5) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `data_cadastro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `data_modificacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela bd_sistema_estagios.tbl_perfis: ~0 rows (aproximadamente)
DELETE FROM `tbl_perfis`;
/*!40000 ALTER TABLE `tbl_perfis` DISABLE KEYS */;
INSERT INTO `tbl_perfis` (`id`, `nome`, `identificacao`, `status`, `data_cadastro`, `data_modificacao`) VALUES
	(14, 'Administrador', 'ADMIN', 1, '2022-02-17 09:10:27', '2022-02-17 09:10:28');
/*!40000 ALTER TABLE `tbl_perfis` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_sistema_estagios.tbl_permissoes
CREATE TABLE IF NOT EXISTS `tbl_permissoes` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_perfil` int(2) NOT NULL,
  `id_metodo` bigint(20) NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`,`id_perfil`,`id_metodo`),
  KEY `fk_tbl_perfis_has_tbl_metodos_tbl_metodos1_idx` (`id_metodo`),
  KEY `fk_tbl_perfis_has_tbl_metodos_tbl_perfis1_idx` (`id_perfil`),
  CONSTRAINT `fk_tbl_perfis_has_tbl_metodos_tbl_metodos1` FOREIGN KEY (`id_metodo`) REFERENCES `tbl_metodos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_perfis_has_tbl_metodos_tbl_perfis1` FOREIGN KEY (`id_perfil`) REFERENCES `tbl_perfis` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela bd_sistema_estagios.tbl_permissoes: ~0 rows (aproximadamente)
DELETE FROM `tbl_permissoes`;
/*!40000 ALTER TABLE `tbl_permissoes` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_permissoes` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_sistema_estagios.tbl_responsavel_aluno
CREATE TABLE IF NOT EXISTS `tbl_responsavel_aluno` (
  `usuario_idusuario` int(10) unsigned NOT NULL,
  `aluno_usuario_idusuario` int(10) unsigned NOT NULL,
  `tipo_responsavel` tinyint(1) NOT NULL,
  `data_cadastro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`usuario_idusuario`,`aluno_usuario_idusuario`),
  KEY `fk_usuario_has_aluno_aluno1_idx` (`aluno_usuario_idusuario`),
  KEY `fk_usuario_has_aluno_usuario1_idx` (`usuario_idusuario`),
  CONSTRAINT `fk_usuario_has_aluno_aluno1` FOREIGN KEY (`aluno_usuario_idusuario`) REFERENCES `tbl_aluno` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_has_aluno_usuario1` FOREIGN KEY (`usuario_idusuario`) REFERENCES `tbl_usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela bd_sistema_estagios.tbl_responsavel_aluno: ~0 rows (aproximadamente)
DELETE FROM `tbl_responsavel_aluno`;
/*!40000 ALTER TABLE `tbl_responsavel_aluno` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_responsavel_aluno` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_sistema_estagios.tbl_semestre_letivo
CREATE TABLE IF NOT EXISTS `tbl_semestre_letivo` (
  `idsemestre_letivo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `semestre` int(1) NOT NULL,
  `ano` int(4) unsigned NOT NULL,
  `data_inicio` date NOT NULL,
  `data_final` date NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `data_cadastro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `data_modificacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idsemestre_letivo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela bd_sistema_estagios.tbl_semestre_letivo: ~0 rows (aproximadamente)
DELETE FROM `tbl_semestre_letivo`;
/*!40000 ALTER TABLE `tbl_semestre_letivo` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_semestre_letivo` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_sistema_estagios.tbl_supervisor_empresa
CREATE TABLE IF NOT EXISTS `tbl_supervisor_empresa` (
  `empresa_idempresa` int(10) unsigned NOT NULL,
  `usuario_idusuario` int(10) unsigned NOT NULL,
  PRIMARY KEY (`empresa_idempresa`,`usuario_idusuario`),
  KEY `fk_empresa_has_usuario_usuario1_idx` (`usuario_idusuario`),
  KEY `fk_empresa_has_usuario_empresa1_idx` (`empresa_idempresa`),
  CONSTRAINT `fk_empresa_has_usuario_empresa1` FOREIGN KEY (`empresa_idempresa`) REFERENCES `tbl_empresa` (`idempresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresa_has_usuario_usuario1` FOREIGN KEY (`usuario_idusuario`) REFERENCES `tbl_usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela bd_sistema_estagios.tbl_supervisor_empresa: ~0 rows (aproximadamente)
DELETE FROM `tbl_supervisor_empresa`;
/*!40000 ALTER TABLE `tbl_supervisor_empresa` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_supervisor_empresa` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_sistema_estagios.tbl_tipo_arquivo
CREATE TABLE IF NOT EXISTS `tbl_tipo_arquivo` (
  `idtipo_arquivo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `descricao` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `data_cadastro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `data_modificacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idtipo_arquivo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela bd_sistema_estagios.tbl_tipo_arquivo: ~0 rows (aproximadamente)
DELETE FROM `tbl_tipo_arquivo`;
/*!40000 ALTER TABLE `tbl_tipo_arquivo` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_tipo_arquivo` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_sistema_estagios.tbl_usuario
CREATE TABLE IF NOT EXISTS `tbl_usuario` (
  `idusuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `perfil` int(2) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `matricula` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `id_contato` int(10) unsigned DEFAULT NULL,
  `alterar_senha` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `data_cadastro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `data_modificacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idusuario`),
  KEY `fk_usuario_tbl_perfis1_idx` (`perfil`),
  KEY `fk_tbl_usuario_tbl_contato1_idx` (`id_contato`),
  CONSTRAINT `fk_tbl_usuario_tbl_contato1` FOREIGN KEY (`id_contato`) REFERENCES `tbl_contato` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_tbl_perfis1` FOREIGN KEY (`perfil`) REFERENCES `tbl_perfis` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela bd_sistema_estagios.tbl_usuario: ~1 rows (aproximadamente)
DELETE FROM `tbl_usuario`;
/*!40000 ALTER TABLE `tbl_usuario` DISABLE KEYS */;
INSERT INTO `tbl_usuario` (`idusuario`, `perfil`, `cpf`, `nome`, `matricula`, `email`, `senha`, `id_contato`, `alterar_senha`, `status`, `data_cadastro`, `data_modificacao`) VALUES
	(4, 14, '0', 'Administrador', '0', 'teste@email.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, 0, 1, '2022-02-17 09:12:29', '2022-02-17 12:13:25');
/*!40000 ALTER TABLE `tbl_usuario` ENABLE KEYS */;

-- Copiando estrutura para tabela bd_sistema_estagios.tbl_vagas
CREATE TABLE IF NOT EXISTS `tbl_vagas` (
  `idtbl_vagas` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idempresa` int(10) unsigned NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `data_cadastro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `data_modificacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idtbl_vagas`),
  KEY `fk_tbl_vagas_empresa1_idx` (`idempresa`),
  CONSTRAINT `fk_tbl_vagas_empresa1` FOREIGN KEY (`idempresa`) REFERENCES `tbl_empresa` (`idempresa`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela bd_sistema_estagios.tbl_vagas: ~0 rows (aproximadamente)
DELETE FROM `tbl_vagas`;
/*!40000 ALTER TABLE `tbl_vagas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_vagas` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
