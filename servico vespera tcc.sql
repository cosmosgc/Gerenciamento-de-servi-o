-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07-Dez-2016 às 02:49
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
-- Estrutura da tabela `servico`
--

CREATE TABLE `servico` (
  `id_servico` int(11) NOT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `horas` timestamp(6) NOT NULL,
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
(4, 'time()funciona!', '2016-12-01 19:35:18.000000', 5, 15, 1, 388884, 1),
(5, 'ushi', '2016-12-04 20:28:15.000000', 5, 16, 1, 388884, 1),
(10, 'criando', '2016-12-10 23:25:50.000000', 5, 21, 4, 388884, 0),
(6, 'para ficar bem legal', '2016-12-08 20:35:28.000000', 5, 17, 4, 388884, 1),
(7, 'parece bom demais', '2016-12-09 21:22:06.000000', 5, 18, 1, 388882, 1),
(21, 'novo serviÃ§o aqui', '2016-12-07 04:14:42.000000', 5, 32, 1, 388884, 0);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `servico`
--
ALTER TABLE `servico`
  MODIFY `id_servico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
