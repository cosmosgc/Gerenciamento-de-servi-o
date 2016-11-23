-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23-Nov-2016 às 08:10
-- Versão do servidor: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `royalink`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cnpj` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc_empresa` text COLLATE utf8_unicode_ci NOT NULL,
  `ceo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

CREATE TABLE `funcionario` (
  `id_funcionario` int(11) NOT NULL,
  `cpf` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` int(15) NOT NULL,
  `senha` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fk_setor` int(11) NOT NULL,
  `fk_empresa` int(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id_funcionario`, `cpf`, `nome`, `email`, `telefone`, `senha`, `fk_setor`, `fk_empresa`) VALUES
(1, '12345678', 'funcionario1', 'func@func.com', 19024857, '202cb962ac59075b964b07152d234b70', 388882, 20),
(2, '', '', '', 0, 'd41d8cd98f00b204e9800998ecf8427e', 0, 0),
(3, '123456798', 'funcionario2', 'email@email', 123456789, '202cb962ac59075b964b07152d234b70', 388882, 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `niveis`
--

CREATE TABLE `niveis` (
  `id_niveis` int(255) NOT NULL,
  `fk_funcionario` int(255) NOT NULL,
  `criarServico` tinyint(1) NOT NULL,
  `verSetores` tinyint(1) NOT NULL,
  `modificarServiço` tinyint(1) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `ceo` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Niveis de acesso';

-- --------------------------------------------------------

--
-- Estrutura da tabela `projetos`
--

CREATE TABLE `projetos` (
  `id_projeto` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `horas` int(11) NOT NULL,
  `startDate` timestamp NOT NULL,
  `endDate` timestamp NOT NULL,
  `fk_empresa` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `projetos`
--

INSERT INTO `projetos` (`id_projeto`, `nome`, `descricao`, `horas`, `startDate`, `endDate`, `fk_empresa`) VALUES
(1, 'nomedoprojeto', 'descrição do projeto', 1, '2016-10-20 02:00:00', '2016-10-30 02:00:00', 19),
(2, 'nomedoprojeto', 'descrição do projeto', 1, '2016-10-20 02:00:00', '2016-10-30 02:00:00', 19),
(5, '100 % suco de laranja', 'Um projeto animu de tabuleiro com Karu e Roy', 72, '2016-11-22 02:00:00', '2016-11-25 02:00:00', 20),
(4, 'Projeto de animaÃ§Ã£o 2d', 'Com assistÃªncia de Maise do Nascimento', 720, '2016-10-20 02:00:00', '2016-11-19 02:00:00', 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `registro`
--

CREATE TABLE `registro` (
  `id_registro` int(11) NOT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dataHoraIni` datetime NOT NULL,
  `dataHorafim` datetime NOT NULL,
  `fk_funcionario` int(11) NOT NULL,
  `fk_servico` int(11) NOT NULL,
  `fk_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE `servico` (
  `id_servico` int(11) NOT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `horas` int(11) NOT NULL,
  `fk_projeto` int(11) NOT NULL,
  `fk_status` int(11) NOT NULL,
  `fk_funcionario` int(11) NOT NULL,
  `fk_setor` int(11) NOT NULL,
  `completo` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`id_servico`, `descricao`, `horas`, `fk_projeto`, `fk_status`, `fk_funcionario`, `fk_setor`, `completo`) VALUES
(1, '<div style="text-align: center;">descriÃ§Ã£o serviÃ§o aqui</div>', 0, 5, 8, 3, 388884, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `setor`
--

CREATE TABLE `setor` (
  `id_setor` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fk_empresa` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `status`
--

INSERT INTO `status` (`id_status`, `descricao`) VALUES
(1, 'Recém criado'),
(2, 'RecÃ©m criado'),
(3, 'RecÃ©m criado'),
(4, 'RecÃ©m criado'),
(5, 'RecÃ©m criado'),
(6, 'RecÃ©m criado'),
(7, 'RecÃ©m criado'),
(8, 'RecÃ©m criado');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`);
ALTER TABLE `empresa` ADD FULLTEXT KEY `desc_empresa` (`desc_empresa`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id_funcionario`),
  ADD KEY `fk_setor` (`fk_setor`),
  ADD KEY `fk_setor_2` (`fk_setor`);

--
-- Indexes for table `niveis`
--
ALTER TABLE `niveis`
  ADD PRIMARY KEY (`id_niveis`),
  ADD KEY `fk_funcionario` (`fk_funcionario`);

--
-- Indexes for table `projetos`
--
ALTER TABLE `projetos`
  ADD PRIMARY KEY (`id_projeto`),
  ADD KEY `fk_empresa` (`fk_empresa`),
  ADD KEY `fk_empresa_2` (`fk_empresa`);

--
-- Indexes for table `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id_registro`),
  ADD KEY `fk_funcionario` (`fk_funcionario`,`fk_servico`,`fk_status`),
  ADD KEY `fk_funcionario_2` (`fk_funcionario`),
  ADD KEY `fk_servico` (`fk_servico`),
  ADD KEY `fk_status` (`fk_status`);

--
-- Indexes for table `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`id_servico`),
  ADD KEY `fk_projeto` (`fk_projeto`,`fk_status`,`fk_funcionario`,`fk_setor`),
  ADD KEY `fk_projeto_2` (`fk_projeto`),
  ADD KEY `fk_status` (`fk_status`),
  ADD KEY `fk_funcionario` (`fk_funcionario`),
  ADD KEY `fk_setor` (`fk_setor`);
ALTER TABLE `servico` ADD FULLTEXT KEY `descricao` (`descricao`);

--
-- Indexes for table `setor`
--
ALTER TABLE `setor`
  ADD PRIMARY KEY (`id_setor`),
  ADD KEY `fk_empresa` (`fk_empresa`),
  ADD KEY `fk_empresa_2` (`fk_empresa`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `niveis`
--
ALTER TABLE `niveis`
  MODIFY `id_niveis` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `projetos`
--
ALTER TABLE `projetos`
  MODIFY `id_projeto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `registro`
--
ALTER TABLE `registro`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `servico`
--
ALTER TABLE `servico`
  MODIFY `id_servico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `setor`
--
ALTER TABLE `setor`
  MODIFY `id_setor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=388889;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
