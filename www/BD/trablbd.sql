-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 12/11/2021 às 23:34
-- Versão do servidor: 10.4.20-MariaDB
-- Versão do PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `trablbd`
--
CREATE DATABASE IF NOT EXISTS `trablbd` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `trablbd`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Caixa`
--

CREATE TABLE `Caixa` (
  `nomePaciente` varchar(255) NOT NULL,
  `cpfPaciente` varchar(11) NOT NULL,
  `emailPaciente` varchar(255) NOT NULL,
  `procedimento` varchar(255) NOT NULL,
  `dataProcedimento` date NOT NULL,
  `valor` float NOT NULL,
  `observacaoVenda` varchar(255) NOT NULL,
  `vendaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Endereco`
--

CREATE TABLE `Endereco` (
  `rua` varchar(255) NOT NULL,
  `numero` int(11) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `complemento` int(11) NOT NULL,
  `enderecoID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Material`
--

CREATE TABLE `Material` (
  `nomeFornecedor` varchar(255) NOT NULL,
  `produto` varchar(255) NOT NULL,
  `qtd` int(11) NOT NULL,
  `valor` float NOT NULL,
  `dataCompra` date NOT NULL,
  `observacoesMaterial` varchar(255) NOT NULL,
  `materialID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Paciente`
--

CREATE TABLE `Paciente` (
  `pacienteID` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `dataNasc` date NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefone` varchar(255) NOT NULL,
  `celular` varchar(255) NOT NULL,
  `observacoes` int(11) NOT NULL,
  `enderecoPaciente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Usuario`
--

CREATE TABLE `Usuario` (
  `usuarioID` int(11) NOT NULL,
  `nomeUsuario` varchar(255) NOT NULL,
  `cpfUsuario` varchar(11) NOT NULL,
  `emailUsuario` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipoUsuario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `Caixa`
--
ALTER TABLE `Caixa`
  ADD PRIMARY KEY (`vendaID`);

--
-- Índices de tabela `Endereco`
--
ALTER TABLE `Endereco`
  ADD PRIMARY KEY (`enderecoID`);

--
-- Índices de tabela `Material`
--
ALTER TABLE `Material`
  ADD PRIMARY KEY (`materialID`);

--
-- Índices de tabela `Paciente`
--
ALTER TABLE `Paciente`
  ADD PRIMARY KEY (`cpf`),
  ADD UNIQUE KEY `enderecoPaciente` (`enderecoPaciente`),
  ADD UNIQUE KEY `id` (`pacienteID`);

--
-- Índices de tabela `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`cpfUsuario`),
  ADD UNIQUE KEY `usuarioID` (`usuarioID`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `Caixa`
--
ALTER TABLE `Caixa`
  MODIFY `vendaID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `Material`
--
ALTER TABLE `Material`
  MODIFY `materialID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `Paciente`
--
ALTER TABLE `Paciente`
  MODIFY `pacienteID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `Paciente`
--
ALTER TABLE `Paciente`
  ADD CONSTRAINT `paciente_endereco_FK` FOREIGN KEY (`enderecoPaciente`) REFERENCES `Endereco` (`enderecoID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
