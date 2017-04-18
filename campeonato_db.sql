-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 18/04/2017 às 15:01
-- Versão do servidor: 5.7.17
-- Versão do PHP: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `campeonato_db`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `info_gol`
--

CREATE TABLE `info_gol` (
  `id` int(11) NOT NULL COMMENT '	',
  `jogador_id` int(10) NOT NULL,
  `quantidade` int(4) DEFAULT NULL,
  `jogo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `info_gol`
--

INSERT INTO `info_gol` (`id`, `jogador_id`, `quantidade`, `jogo_id`) VALUES
(5, 1, 3, 1),
(6, 4, 2, 1),
(7, 4, 1, 2),
(8, 8, 2, 2),
(9, 8, 2, 3),
(10, 2, 3, 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `jogador`
--

CREATE TABLE `jogador` (
  `id` int(10) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `id_time` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `jogador`
--

INSERT INTO `jogador` (`id`, `nome`, `id_time`) VALUES
(1, 'Jogador 1', 1),
(2, 'Jogador 2', 1),
(3, 'Jogador 3', 1),
(4, 'Jogador 4', 2),
(5, 'Jogador 5', 2),
(6, 'Jogador 6', 2),
(7, 'Jogador 7', 3),
(8, 'Jogador 8', 3),
(9, 'Jogador 9', 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `jogo`
--

CREATE TABLE `jogo` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL,
  `placar_casa` int(2) DEFAULT NULL,
  `placar_visitante` int(2) DEFAULT NULL,
  `time_casa` int(10) NOT NULL,
  `time_visitante` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `jogo`
--

INSERT INTO `jogo` (`id`, `data`, `placar_casa`, `placar_visitante`, `time_casa`, `time_visitante`) VALUES
(1, '2017-04-21', NULL, NULL, 1, 2),
(2, '2017-04-22', NULL, NULL, 2, 3),
(3, '2017-04-23', NULL, NULL, 1, 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `time`
--

CREATE TABLE `time` (
  `id` int(10) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `pontos` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `time`
--

INSERT INTO `time` (`id`, `nome`, `pontos`) VALUES
(1, 'Time A', 0),
(2, 'Time B', 0),
(3, 'Time C', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `info_gol`
--
ALTER TABLE `info_gol`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_info_gol_jogador1_idx` (`jogador_id`),
  ADD KEY `fk_info_gol_jogo1_idx` (`jogo_id`);

--
-- Índices de tabela `jogador`
--
ALTER TABLE `jogador`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_time` (`id_time`);

--
-- Índices de tabela `jogo`
--
ALTER TABLE `jogo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jogo_time1_idx` (`time_casa`),
  ADD KEY `fk_jogo_time2_idx` (`time_visitante`);

--
-- Índices de tabela `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `info_gol`
--
ALTER TABLE `info_gol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '	', AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de tabela `jogador`
--
ALTER TABLE `jogador`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de tabela `jogo`
--
ALTER TABLE `jogo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `time`
--
ALTER TABLE `time`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `info_gol`
--
ALTER TABLE `info_gol`
  ADD CONSTRAINT `fk_info_gol_jogador1` FOREIGN KEY (`jogador_id`) REFERENCES `jogador` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_info_gol_jogo1` FOREIGN KEY (`jogo_id`) REFERENCES `jogo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `jogador`
--
ALTER TABLE `jogador`
  ADD CONSTRAINT `jogador_ibfk_1` FOREIGN KEY (`id_time`) REFERENCES `time` (`id`);

--
-- Restrições para tabelas `jogo`
--
ALTER TABLE `jogo`
  ADD CONSTRAINT `fk_jogo_time1` FOREIGN KEY (`time_casa`) REFERENCES `time` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_jogo_time2` FOREIGN KEY (`time_visitante`) REFERENCES `time` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
