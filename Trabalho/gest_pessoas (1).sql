-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Maio-2023 às 12:00
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `gest_pessoas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `atendimento`
--

CREATE TABLE `atendimento` (
  `id` int(11) NOT NULL,
  `data_atendimento` date NOT NULL,
  `peso` int(11) NOT NULL,
  `observacao` varchar(32) NOT NULL,
  `id_funcionario` int(11) NOT NULL,
  `id_Bebe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `atendimento`
--

INSERT INTO `atendimento` (`id`, `data_atendimento`, `peso`, `observacao`, `id_funcionario`, `id_Bebe`) VALUES
(9, '2023-05-10', 21, 'bem', 3, 1),
(10, '2023-05-04', 34, 'bem', 3, 1),
(11, '2023-05-11', 23, 'bem', 3, 5),
(12, '2023-05-05', 23, 'bem', 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `bebe`
--

CREATE TABLE `bebe` (
  `id` int(11) NOT NULL,
  `nome` varchar(10) NOT NULL,
  `apelido` varchar(10) NOT NULL,
  `sexo` char(1) NOT NULL,
  `data_nascimento` date NOT NULL,
  `morada` varchar(20) NOT NULL,
  `concelho` varchar(20) NOT NULL,
  `id_responsavel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `bebe`
--

INSERT INTO `bebe` (`id`, `nome`, `apelido`, `sexo`, `data_nascimento`, `morada`, `concelho`, `id_responsavel`) VALUES
(1, 'Aline', 'Samira', 'F', '2023-05-16', 'Picos', 'Santa Cantarina', 1),
(5, 'Leandra', 'leonidas', '', '2023-05-06', 'Assomada', 'Santa Catarina', 5),
(7, 'klever', 'leonidas', '', '2023-05-25', 'Praia', 'Praia', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `data_nascimento` date NOT NULL,
  `morada` varchar(10) NOT NULL,
  `telefone` varchar(7) NOT NULL,
  `area_formado` varchar(15) NOT NULL,
  `nfi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id`, `nome`, `data_nascimento`, `morada`, `telefone`, `area_formado`, `nfi`) VALUES
(3, 'Marcia', '2023-05-25', 'Picos', '973520', 'Economea', 12145),
(4, 'fred', '2023-05-10', 'Assomada', '9861267', 'eng', 345678);

-- --------------------------------------------------------

--
-- Estrutura da tabela `responsavel`
--

CREATE TABLE `responsavel` (
  `id` int(11) NOT NULL,
  `nome` varchar(10) NOT NULL,
  `apelido` varchar(10) NOT NULL,
  `relacao` varchar(10) NOT NULL,
  `telefone` varchar(7) NOT NULL,
  `n_bi` varchar(10) NOT NULL,
  `morada` varchar(10) NOT NULL,
  `concelho` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `responsavel`
--

INSERT INTO `responsavel` (`id`, `nome`, `apelido`, `relacao`, `telefone`, `n_bi`, `morada`, `concelho`) VALUES
(1, 'klever', 'leonidas', 'Pai', '9818536', '121215', 'Assomada', 'Santa Catarina'),
(5, 'klever', 'leonidas', 'Bisaavo', '999999', '121215', 'Praia', 'Santa '),
(7, 'Eliezer', 'JN', 'Irmao', '999999', '8.73687e11', '', ''),
(8, 'klever', 'Raul', 'tio', '9818536', '121215', '', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `atendimento`
--
ALTER TABLE `atendimento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_funcionario` (`id_funcionario`),
  ADD KEY `id_Bebe` (`id_Bebe`);

--
-- Índices para tabela `bebe`
--
ALTER TABLE `bebe`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `responsavel`
--
ALTER TABLE `responsavel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `atendimento`
--
ALTER TABLE `atendimento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `bebe`
--
ALTER TABLE `bebe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `responsavel`
--
ALTER TABLE `responsavel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `atendimento`
--
ALTER TABLE `atendimento`
  ADD CONSTRAINT `atendimento_ibfk_1` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `atendimento_ibfk_2` FOREIGN KEY (`id_Bebe`) REFERENCES `bebe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `bebe`
--
ALTER TABLE `bebe`
  ADD CONSTRAINT `bebe_ibfk_1` FOREIGN KEY (`id`) REFERENCES `responsavel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
