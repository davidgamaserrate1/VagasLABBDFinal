-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Nov-2021 às 20:49
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `vagas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargo`
--

CREATE TABLE `cargo` (
  `id` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `id_setor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cargo`
--

INSERT INTO `cargo` (`id`, `descricao`, `id_setor`) VALUES
(1, 'ESTAGIARIO', 9),
(2, 'ANALISTA ', 9),
(3, 'GERENTE DE TI', 9),
(4, 'SUPERVISOR', 9),
(5, 'ANALISTA JR', 9),
(6, 'DESC', 9),
(7, 'GERENTE DE TI', 1),
(8, 'DEVENVOLVEDOR 1', 2),
(9, 'VAGA PARA DELETAR', 1),
(10, 'descricao', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `nome_empresa` text NOT NULL,
  `vaga_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id`, `nome_empresa`, `vaga_id`) VALUES
(1, 'MicroSoft', NULL),
(2, 'UFMS', NULL),
(3, 'FACOM', 6),
(4, 'INTEGRATI', NULL),
(5, 'FACOM', 6),
(6, 'DADAE', NULL),
(7, 'INTEGRATI', NULL),
(8, 'CARD', NULL),
(9, 'EMPRESA DELETE', NULL),
(10, 'FACOM', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `setor`
--

CREATE TABLE `setor` (
  `id` int(11) NOT NULL,
  `nome_setor` text NOT NULL,
  `id_empresa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `setor`
--

INSERT INTO `setor` (`id`, `nome_setor`, `id_empresa`) VALUES
(1, 'TI', 1),
(2, 'RH', 2),
(3, 'DEPTO DE PESSOAL', 3),
(4, 'GERENCIA', 3),
(5, 'TI', 1),
(6, 'SET', 1),
(7, 'TI', 2),
(8, '2', 1),
(17, 'SETOR DELETE', 1),
(18, 'ADM', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vaga`
--

CREATE TABLE `vaga` (
  `id` int(11) NOT NULL,
  `descricao` text DEFAULT NULL,
  `empresa` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `vaga`
--

INSERT INTO `vaga` (`id`, `descricao`, `empresa`) VALUES
(1, 'ANALISTA JR 2', 'FACOM'),
(3, 'GERENTE DE TI', 'INTEGRATI 1'),
(6, 'descricao', 'FACOM');

--
-- Acionadores `vaga`
--
DELIMITER $$
CREATE TRIGGER `atualizaEmpresa` AFTER INSERT ON `vaga` FOR EACH ROW update empresa set vaga_id =
new.id
where nome_empresa = new.empresa
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insertLogDelete` AFTER DELETE ON `vaga` FOR EACH ROW insert into vagasalteradas values
(old.id,old.descricao, 
 old.empresa, 'VAGA-DELETADA', 
'VAGA-DELETADA',  'DELETE')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `isertLogUpdate` AFTER UPDATE ON `vaga` FOR EACH ROW insert into vagasalteradas values
(old.id,old.descricao, 
 old.empresa, new.descricao, 
 new.empresa, 'UPDATE')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vagasalteradas`
--

CREATE TABLE `vagasalteradas` (
  `id_vaga` int(11) NOT NULL,
  `descricao_antiga` text DEFAULT NULL,
  `empresa_antiga` text DEFAULT NULL,
  `descricao_nova` text NOT NULL,
  `empresa_nova` text NOT NULL,
  `acao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `vagasalteradas`
--

INSERT INTO `vagasalteradas` (`id_vaga`, `descricao_antiga`, `empresa_antiga`, `descricao_nova`, `empresa_nova`, `acao`) VALUES
(3, 'GERENTE DE TI 2', 'INTEGRATI', 'GERENTE DE TI', 'INTEGRATI 1', 'UPDATE'),
(5, 'VAGA PARA DELETAR', 'EMPRESA DELETE', 'VAGA-DELETADA', 'VAGA-DELETADA', 'DELETE'),
(1, 'ANALISTA JR', 'FACOM1', 'ANALISTA JR 2', 'FACOM]', 'UPDATE'),
(1, 'ANALISTA JR 2', 'FACOM]', 'ANALISTA JR 2', 'FACOM', 'UPDATE');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_vaga_id` (`vaga_id`);

--
-- Índices para tabela `setor`
--
ALTER TABLE `setor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_empresa` (`id_empresa`);

--
-- Índices para tabela `vaga`
--
ALTER TABLE `vaga`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `setor`
--
ALTER TABLE `setor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `vaga`
--
ALTER TABLE `vaga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `fk_vaga_id` FOREIGN KEY (`vaga_id`) REFERENCES `vaga` (`id`);

--
-- Limitadores para a tabela `setor`
--
ALTER TABLE `setor`
  ADD CONSTRAINT `fk_id_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
