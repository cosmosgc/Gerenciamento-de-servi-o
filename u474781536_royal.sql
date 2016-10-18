
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 18/10/2016 às 11:11:18
-- Versão do Servidor: 10.0.20-MariaDB
-- Versão do PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `u474781536_royal`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
  `id_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cnpj` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc_empresa` text COLLATE utf8_unicode_ci NOT NULL,
  `ceo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_empresa`),
  FULLTEXT KEY `desc_empresa` (`desc_empresa`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `nome`, `cnpj`, `senha`, `telefone`, `email`, `desc_empresa`, `ceo`, `cidade`, `estado`) VALUES
(1, 'vinicius', 'cnpj', '202cb962ac59075b964b07152d234b70', '', 'cosmoskitsune@hotmail.com', '', '', '', ''),
(2, 'cosmosgc', '061.480.139-75', '864f1a5b1b39f5f071ca3123c4e806bb', '4734421282', 'cosmoskitsune@hotmail.com', '', '', 'São Francisco do Sul', 'SC'),
(3, 'teste1', '123456789', '202cb962ac59075b964b07152d234b70', '4734421282', 'cosmoskitsune@hotmail.com', 'empresa com coisas que começa com letra b', '', 'São Francisco do Sul, SC', ''),
(4, 'teste2', '123456789', '202cb962ac59075b964b07152d234b70', '4734421282', 'cosmoskitsune@hotmail.com', 'Coisas', '', 'SFS', ''),
(5, 'teste3', '123456789', '202cb962ac59075b964b07152d234b70', '4734421282', 'cosmoskitsune@hotmail.com', 'bush', '', 'R. Francisco Mascarenhas\r\nReta', ''),
(6, 'teste4', '123456789', '202cb962ac59075b964b07152d234b70', '4734421282', 'cosmoskitsune@hotmail.com', 'bush', '', 'R. Francisco Mascarenhas\r\nReta', ''),
(7, 'testes', '123456789', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', '', '', ''),
(8, 'teste5', '123456789', '202cb962ac59075b964b07152d234b70', '4734421282', 'cosmoskitsune@hotmail.com', 'Uma empresa ', '', 'SFS', ''),
(9, 'teste6', '123456789', '202cb962ac59075b964b07152d234b70', '4734421282', 'cosmoskitsune@hotmail.com', 'Uma empresa ', '', 'SFS', ''),
(10, 'teste7', '1234567895', '202cb962ac59075b964b07152d234b70', '4734421282', 'cosmoskitsune@hotmail.com', 'bites', '', 'algum lugar', ''),
(11, 'Shukin', '', '5797fa2cd8e16663d2636a15a6efd182', '', 'shukin@shukinhekon.com', '', '', '', ''),
(12, 'Shukin1', '', 'd0970714757783e6cf17b26fb8e2298f', '', 'shukin@shukin.com', '', '', '', ''),
(13, 'Shukin2', '', 'd0970714757783e6cf17b26fb8e2298f', '', 'shukin@shukin.com', '', '', '', ''),
(14, 'Shukin3', '', 'd0970714757783e6cf17b26fb8e2298f', '', 'shukin@shukin.com', '', '', '', ''),
(15, 'rodape', '12345678951', '202cb962ac59075b964b07152d234b70', '4734421282', 'cosmoskitsune@hotmail.com', 'coisas estranhas', '', 'invisivel', ''),
(16, 'sim', '', '202cb962ac59075b964b07152d234b70', '', 'email', '', '', '', ''),
(17, 'jabuti', '', '202cb962ac59075b964b07152d234b70', '', 'lucas@gmail.com', '', '', '', ''),
(18, 'Teste', '', '698dc19d489c4e4db73e28a713eab07b', '', 'pc@pc.com', '', '', '', ''),
(19, 'raposa', '', '864f1a5b1b39f5f071ca3123c4e806bb', '', 'cosmoskitsune@hotmail.com', '', '', '', ''),
(20, 'raposacosmica', '', '864f1a5b1b39f5f071ca3123c4e806bb', '34421282', 'cosmoskitsune@hotmail.com', 'Uma empresa para os furries', 'Vinícius Bretas', 'Rua francisco mascarenhas - 6000', ''),
(21, 'empresa21', '123456789', '202cb962ac59075b964b07152d234b70', '4734421282', 'cosmoskitsune@hotmail.com', 'empresa numero 21, senha 123', 'raposa', 'that is it', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE IF NOT EXISTS `funcionario` (
  `id_funcionario` int(11) NOT NULL AUTO_INCREMENT,
  `cpf` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` int(15) NOT NULL,
  `senha` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fk_setor` int(11) NOT NULL,
  `fk_empresa` int(100) NOT NULL,
  PRIMARY KEY (`id_funcionario`),
  KEY `fk_setor` (`fk_setor`),
  KEY `fk_setor_2` (`fk_setor`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id_funcionario`, `cpf`, `nome`, `email`, `telefone`, `senha`, `fk_setor`, `fk_empresa`) VALUES
(1, '12345678', 'funcionario1', 'func@func.com', 19024857, '202cb962ac59075b964b07152d234b70', 388882, 20),
(2, '', '', '', 0, 'd41d8cd98f00b204e9800998ecf8427e', 0, 0),
(3, '12345679', 'funcionario2', 'email@email', 123456798, '202cb962ac59075b964b07152d234b70', 388882, 20),
(4, '51515151515151515151515151', 'kimmykun', 'kimmykun@live.com', 0, 'c8837b23ff8aaa8a2dde915473ce0991', 388882, 20),
(5, '691.666.133-74', 'Royoster, mas pode me chamar de Royzin', 'royosterrrrrrrrrapidinho@caudalevantada.sempre', 4666, '26243fdb8fc89675c5598ca0f412c10b', 388883, 20),
(6, '23242312', 'correberg', 'tf_é_a_meliorcoisa@viciado.emyiff', 2147483647, '81dc9bdb52d04dc20036dbd8313ed055', 388883, 20),
(7, '', 'Hund', 'diegoborgesdemoraes@gmail.com', 0, 'e2d1ed0fb81f86c7d80dedb32178db5f', 388883, 20),
(8, '', 'RenanHDMLG', 'renanHDgameplays@SeInscreveAe.com', 0, '4badaee57fed5610012a296273158f5f', 388883, 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `niveis`
--

CREATE TABLE IF NOT EXISTS `niveis` (
  `id_niveis` int(255) NOT NULL AUTO_INCREMENT,
  `fk_funcionario` int(255) NOT NULL,
  `criarServico` tinyint(1) NOT NULL,
  `verSetores` tinyint(1) NOT NULL,
  `modificarServiço` tinyint(1) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `ceo` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_niveis`),
  KEY `fk_funcionario` (`fk_funcionario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Niveis de acesso' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `projetos`
--

CREATE TABLE IF NOT EXISTS `projetos` (
  `id_projeto` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `horas` int(11) NOT NULL,
  `fk_empresa` int(11) NOT NULL,
  PRIMARY KEY (`id_projeto`),
  KEY `fk_empresa` (`fk_empresa`),
  KEY `fk_empresa_2` (`fk_empresa`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `registro`
--

CREATE TABLE IF NOT EXISTS `registro` (
  `id_registro` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dataHoraIni` datetime NOT NULL,
  `dataHorafim` datetime NOT NULL,
  `fk_funcionario` int(11) NOT NULL,
  `fk_servico` int(11) NOT NULL,
  `fk_status` int(11) NOT NULL,
  PRIMARY KEY (`id_registro`),
  KEY `fk_funcionario` (`fk_funcionario`,`fk_servico`,`fk_status`),
  KEY `fk_funcionario_2` (`fk_funcionario`),
  KEY `fk_servico` (`fk_servico`),
  KEY `fk_status` (`fk_status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE IF NOT EXISTS `servico` (
  `id_servico` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `horas` int(11) NOT NULL,
  `fk_projeto` int(11) NOT NULL,
  `fk_status` int(11) NOT NULL,
  `fk_funcionario` int(11) NOT NULL,
  `fk_setor` int(11) NOT NULL,
  PRIMARY KEY (`id_servico`),
  KEY `fk_projeto` (`fk_projeto`,`fk_status`,`fk_funcionario`,`fk_setor`),
  KEY `fk_projeto_2` (`fk_projeto`),
  KEY `fk_status` (`fk_status`),
  KEY `fk_funcionario` (`fk_funcionario`),
  KEY `fk_setor` (`fk_setor`),
  FULLTEXT KEY `descricao` (`descricao`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `setor`
--

CREATE TABLE IF NOT EXISTS `setor` (
  `id_setor` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fk_empresa` int(11) NOT NULL,
  PRIMARY KEY (`id_setor`),
  KEY `fk_empresa` (`fk_empresa`),
  KEY `fk_empresa_2` (`fk_empresa`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=388889 ;

--
-- Extraindo dados da tabela `setor`
--

INSERT INTO `setor` (`id_setor`, `nome`, `fk_empresa`) VALUES
(388861, 'giga', 10),
(388862, 'mega', 10),
(388863, 'byte', 10),
(388864, 'Música Boa', 11),
(388865, 'Música Ruim', 11),
(388866, 'Música Mediana', 11),
(388867, 'Música Ruim', 12),
(388868, 'Música Ruim', 13),
(388869, 'Música Ruim', 14),
(388870, 'chico bueno', 15),
(388871, 'beringela', 15),
(388872, 'legal', 15),
(388873, 'show', 15),
(388874, 'setorlegal', 16),
(388875, '', 16),
(388876, '', 16),
(388877, '', 16),
(388878, '', 16),
(388879, '', 17),
(388880, '', 18),
(388881, '', 19),
(388882, 'furry', 20),
(388883, 'discord', 20),
(388884, 'bot', 20),
(388885, 'e-sport', 20),
(388886, 'cursos', 20),
(388887, 'setorN1', 21),
(388888, 'setorN2', 21);

-- --------------------------------------------------------

--
-- Estrutura da tabela `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
