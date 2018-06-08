-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19-Dez-2017 às 18:37
-- Versão do servidor: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notas_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `alu_id` int(5) NOT NULL,
  `alu_nome` varchar(45) NOT NULL,
  `alu_matricula` varchar(45) NOT NULL,
  `alu_telefone` varchar(15) NOT NULL,
  `alu_nascimento` date NOT NULL,
  `alu_email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`alu_id`, `alu_nome`, `alu_matricula`, `alu_telefone`, `alu_nascimento`, `alu_email`) VALUES
(6, 'Jessica Bastos da Silva', '1511104400019', '', '2000-11-01', ''),
(7, 'Julia da Rocha Campos', '1511104400044', '', '2000-11-01', ''),
(8, 'Luiz Gustavo Miletti', '1511104400023', '', '2000-11-01', ''),
(9, 'Marcos Daniel Souza da Silva', '1511104400050', '', '2000-11-01', ''),
(10, 'Norton Silva de Assis', '1511104400049', '', '2000-11-01', ''),
(11, 'Gustavo Brandão', '1511104400015', '', '2000-07-28', ''),
(12, 'Leandro Moreira', '1511104400018', '', '2000-07-28', ''),
(13, 'Guilherme Luiz Rigon', '1511104400026', '', '2000-07-28', ''),
(14, 'Yuri Neville', '1511104400025', '', '2000-07-28', ''),
(15, 'Alan Nunes da Silva', '1511104400011', '', '2000-07-28', ''),
(16, 'Nicolas Bueno Idalino', '1711104400006', '', '2017-10-17', ''),
(17, 'Heitor Nogueira Negrão', '1711104400008', '', '2017-10-17', ''),
(18, 'Gabriel Alves da Silva', '1711104400009', '', '2017-10-17', ''),
(19, 'Luiz Eduardo Maximo Maciel', '1711104400005', '', '2017-10-17', ''),
(20, 'Felipe Salem Leon', '1711104400007', '', '2017-10-17', ''),
(21, 'João Victor Marcelino', '1711100100016', '', '2017-11-15', ''),
(22, 'Ana Beatriz Mariana', '1711100100014', '', '2017-11-15', ''),
(23, 'Vinicius Castro', '1711100100015', '', '2017-11-15', ''),
(24, 'Larissa Gasparino', '1711100100018', '', '2017-11-15', ''),
(25, 'Luana Machado', '1711100100017', '', '2017-11-15', ''),
(26, 'Ketelyn Bertolaccini', '1611100100005', '', '2017-10-02', ''),
(27, 'Larissa Goulart', '1611100100004', '', '2017-10-02', ''),
(28, 'Mateus Ermano', '1611100100010', '', '2017-10-02', ''),
(29, 'Nathália Cabral', '1611100100023', '', '2017-10-02', ''),
(30, 'Wilgner Beloni', '1611100100022', '', '2017-10-02', ''),
(31, 'Anna Carolyne Marçal', '1511100100040', '', '2017-10-18', ''),
(32, 'Bianca de Freitas', '1511100100049', '', '2017-10-18', ''),
(33, 'Cassiane de Souza', '1511100100021', '', '2017-10-18', ''),
(34, 'Maria Cristina de Oliveira', '1511100100010', '', '2017-10-18', ''),
(35, 'Thiffany dos Santos', '1511100100017', '', '2017-10-18', ''),
(36, 'TESTE', '11111111111', '333553535', '2017-12-05', 'dasdasdsad@sdadsa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `alu_turdisc`
--

CREATE TABLE `alu_turdisc` (
  `tur_id` int(5) NOT NULL,
  `disc_id` int(5) NOT NULL,
  `alu_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `alu_turdisc`
--

INSERT INTO `alu_turdisc` (`tur_id`, `disc_id`, `alu_id`) VALUES
(1, 5, 11),
(1, 5, 12),
(1, 5, 13),
(1, 5, 14),
(1, 5, 15),
(3, 5, 6),
(3, 5, 7),
(3, 5, 8),
(3, 5, 9),
(3, 5, 10),
(5, 5, 16),
(5, 5, 17),
(5, 5, 18),
(5, 5, 19),
(5, 5, 20),
(1, 6, 11),
(1, 6, 12),
(1, 6, 13),
(1, 6, 14),
(1, 6, 15),
(3, 6, 6),
(3, 6, 7),
(3, 6, 8),
(3, 6, 9),
(3, 6, 10),
(3, 7, 6),
(3, 7, 7),
(3, 7, 8),
(3, 7, 9),
(3, 7, 10),
(5, 7, 16),
(5, 7, 17),
(5, 7, 18),
(5, 7, 19),
(5, 7, 20),
(1, 8, 11),
(1, 8, 12),
(1, 8, 13),
(1, 8, 14),
(1, 8, 15),
(3, 8, 6),
(3, 8, 7),
(3, 8, 8),
(3, 8, 9),
(3, 8, 10),
(5, 8, 16),
(5, 8, 17),
(5, 8, 18),
(5, 8, 19),
(5, 8, 20),
(1, 9, 11),
(1, 9, 12),
(1, 9, 13),
(1, 9, 14),
(1, 9, 15),
(1, 10, 11),
(1, 10, 12),
(1, 10, 13),
(1, 10, 14),
(1, 10, 15),
(2, 10, 31),
(2, 10, 32),
(2, 10, 33),
(2, 10, 34),
(2, 10, 35),
(5, 11, 16),
(5, 11, 17),
(5, 11, 18),
(5, 11, 19),
(5, 11, 20),
(5, 12, 16),
(5, 12, 17),
(5, 12, 18),
(5, 12, 19),
(5, 12, 20),
(5, 13, 16),
(5, 13, 17),
(5, 13, 18),
(5, 13, 19),
(5, 13, 20),
(5, 14, 16),
(5, 14, 17),
(5, 14, 18),
(5, 14, 19),
(5, 14, 20),
(5, 15, 16),
(5, 15, 17),
(5, 15, 18),
(5, 15, 19),
(5, 15, 20),
(6, 16, 21),
(6, 16, 22),
(6, 16, 23),
(6, 16, 24),
(6, 16, 25),
(6, 17, 21),
(6, 17, 22),
(6, 17, 23),
(6, 17, 24),
(6, 17, 25),
(4, 18, 26),
(4, 18, 27),
(4, 18, 28),
(4, 18, 29),
(4, 18, 30),
(6, 18, 21),
(6, 18, 22),
(6, 18, 23),
(6, 18, 24),
(6, 18, 25),
(6, 19, 21),
(6, 19, 22),
(6, 19, 23),
(6, 19, 24),
(6, 19, 25),
(6, 20, 21),
(6, 20, 22),
(6, 20, 23),
(6, 20, 24),
(6, 20, 25),
(4, 21, 26),
(4, 21, 27),
(4, 21, 28),
(4, 21, 29),
(4, 21, 30),
(2, 22, 31),
(2, 22, 32),
(2, 22, 33),
(2, 22, 34),
(2, 22, 35),
(4, 22, 26),
(4, 22, 27),
(4, 22, 28),
(4, 22, 29),
(4, 22, 30),
(2, 23, 31),
(2, 23, 32),
(2, 23, 33),
(2, 23, 34),
(2, 23, 35),
(4, 23, 26),
(4, 23, 27),
(4, 23, 28),
(4, 23, 29),
(4, 23, 30),
(4, 24, 26),
(4, 24, 27),
(4, 24, 28),
(4, 24, 29),
(4, 24, 30),
(4, 25, 26),
(4, 25, 27),
(4, 25, 28),
(4, 25, 29),
(4, 25, 30),
(4, 26, 26),
(4, 26, 27),
(4, 26, 28),
(4, 26, 29),
(4, 26, 30),
(4, 27, 26),
(4, 27, 27),
(4, 27, 28),
(4, 27, 29),
(4, 27, 30),
(2, 28, 31),
(2, 28, 32),
(2, 28, 33),
(2, 28, 34),
(2, 28, 35),
(2, 29, 31),
(2, 29, 32),
(2, 29, 33),
(2, 29, 34),
(2, 29, 35),
(2, 30, 31),
(2, 30, 32),
(2, 30, 33),
(2, 30, 34),
(2, 30, 35);

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `cur_id` int(5) NOT NULL,
  `cur_nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`cur_id`, `cur_nome`) VALUES
(1, 'Informática'),
(2, 'Administração');

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `disc_id` int(5) NOT NULL,
  `disc_nome` varchar(45) NOT NULL,
  `disc_conteudo` varchar(60) DEFAULT NULL,
  `disc_cargaHora` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`disc_id`, `disc_nome`, `disc_conteudo`, `disc_cargaHora`) VALUES
(5, 'LTPW', NULL, NULL),
(6, 'Modelagem', NULL, NULL),
(7, 'Redes', NULL, NULL),
(8, 'Design', NULL, NULL),
(9, 'Aplicativos Móveis', NULL, NULL),
(10, 'Projeto', NULL, NULL),
(11, 'Ferramentas p/ Internet', NULL, NULL),
(12, 'Hardware', NULL, NULL),
(13, 'Lógica', NULL, NULL),
(14, 'Aplicativos Web', NULL, NULL),
(15, 'Sistemas Operacionais', NULL, NULL),
(16, 'Fundamentos de Administração', NULL, NULL),
(17, 'Gestão Ambiental', NULL, NULL),
(18, 'Contabilidade', NULL, NULL),
(19, 'Estatística', NULL, NULL),
(20, 'Empreendedorismo', NULL, NULL),
(21, 'Matemática Financeira', NULL, NULL),
(22, 'Direito', NULL, NULL),
(23, 'Tópicos', NULL, NULL),
(24, 'Gestão Mercadológica', NULL, NULL),
(25, 'Gestão de Produção e Qualidade', NULL, NULL),
(26, 'Logística', NULL, NULL),
(27, 'Fundamentos de Economia', NULL, NULL),
(28, 'Administração Financeira e Orçamentária', NULL, NULL),
(29, 'Gestão de Pessoas', NULL, NULL),
(30, 'Informática Aplicada', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `notas`
--

CREATE TABLE `notas` (
  `tur_id` int(5) NOT NULL,
  `disc_id` int(5) NOT NULL,
  `alu_id` int(5) NOT NULL,
  `not_trime` int(5) NOT NULL DEFAULT '1',
  `not_valor` decimal(3,1) DEFAULT '0.0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `notas`
--

INSERT INTO `notas` (`tur_id`, `disc_id`, `alu_id`, `not_trime`, `not_valor`) VALUES
(1, 5, 11, 1, NULL),
(1, 5, 11, 2, NULL),
(1, 5, 11, 3, NULL),
(1, 5, 12, 1, NULL),
(1, 5, 12, 2, NULL),
(1, 5, 12, 3, NULL),
(1, 5, 13, 1, NULL),
(1, 5, 13, 2, NULL),
(1, 5, 13, 3, NULL),
(1, 5, 14, 1, NULL),
(1, 5, 14, 2, NULL),
(1, 5, 14, 3, NULL),
(1, 5, 15, 1, NULL),
(1, 5, 15, 2, NULL),
(1, 5, 15, 3, NULL),
(1, 6, 11, 1, NULL),
(1, 6, 11, 2, NULL),
(1, 6, 11, 3, NULL),
(1, 6, 12, 1, NULL),
(1, 6, 12, 2, NULL),
(1, 6, 12, 3, NULL),
(1, 6, 13, 1, NULL),
(1, 6, 13, 2, NULL),
(1, 6, 13, 3, NULL),
(1, 6, 14, 1, NULL),
(1, 6, 14, 2, NULL),
(1, 6, 14, 3, NULL),
(1, 6, 15, 1, NULL),
(1, 6, 15, 2, NULL),
(1, 6, 15, 3, NULL),
(1, 8, 11, 1, NULL),
(1, 8, 11, 2, NULL),
(1, 8, 11, 3, NULL),
(1, 8, 12, 1, NULL),
(1, 8, 12, 2, NULL),
(1, 8, 12, 3, NULL),
(1, 8, 13, 1, NULL),
(1, 8, 13, 2, NULL),
(1, 8, 13, 3, NULL),
(1, 8, 14, 1, NULL),
(1, 8, 14, 2, NULL),
(1, 8, 14, 3, NULL),
(1, 8, 15, 1, NULL),
(1, 8, 15, 2, NULL),
(1, 8, 15, 3, NULL),
(1, 9, 11, 1, NULL),
(1, 9, 11, 2, NULL),
(1, 9, 11, 3, NULL),
(1, 9, 12, 1, NULL),
(1, 9, 12, 2, NULL),
(1, 9, 12, 3, NULL),
(1, 9, 13, 1, NULL),
(1, 9, 13, 2, NULL),
(1, 9, 13, 3, NULL),
(1, 9, 14, 1, NULL),
(1, 9, 14, 2, NULL),
(1, 9, 14, 3, NULL),
(1, 9, 15, 1, NULL),
(1, 9, 15, 2, NULL),
(1, 9, 15, 3, NULL),
(1, 10, 11, 1, NULL),
(1, 10, 11, 2, NULL),
(1, 10, 11, 3, NULL),
(1, 10, 12, 1, NULL),
(1, 10, 12, 2, NULL),
(1, 10, 12, 3, NULL),
(1, 10, 13, 1, NULL),
(1, 10, 13, 2, NULL),
(1, 10, 13, 3, NULL),
(1, 10, 14, 1, NULL),
(1, 10, 14, 2, NULL),
(1, 10, 14, 3, NULL),
(1, 10, 15, 1, NULL),
(1, 10, 15, 2, NULL),
(1, 10, 15, 3, NULL),
(2, 10, 31, 1, NULL),
(2, 10, 31, 2, NULL),
(2, 10, 31, 3, NULL),
(2, 10, 32, 1, NULL),
(2, 10, 32, 2, NULL),
(2, 10, 32, 3, NULL),
(2, 10, 33, 1, NULL),
(2, 10, 33, 2, NULL),
(2, 10, 33, 3, NULL),
(2, 10, 34, 1, NULL),
(2, 10, 34, 2, NULL),
(2, 10, 34, 3, NULL),
(2, 10, 35, 1, NULL),
(2, 10, 35, 2, NULL),
(2, 10, 35, 3, NULL),
(2, 22, 31, 1, NULL),
(2, 22, 31, 2, NULL),
(2, 22, 31, 3, NULL),
(2, 22, 32, 1, NULL),
(2, 22, 32, 2, NULL),
(2, 22, 32, 3, NULL),
(2, 22, 33, 1, NULL),
(2, 22, 33, 2, NULL),
(2, 22, 33, 3, NULL),
(2, 22, 34, 1, NULL),
(2, 22, 34, 2, NULL),
(2, 22, 34, 3, NULL),
(2, 22, 35, 1, NULL),
(2, 22, 35, 2, NULL),
(2, 22, 35, 3, NULL),
(2, 23, 31, 1, NULL),
(2, 23, 31, 2, NULL),
(2, 23, 31, 3, NULL),
(2, 23, 32, 1, NULL),
(2, 23, 32, 2, NULL),
(2, 23, 32, 3, NULL),
(2, 23, 33, 1, NULL),
(2, 23, 33, 2, NULL),
(2, 23, 33, 3, NULL),
(2, 23, 34, 1, NULL),
(2, 23, 34, 2, NULL),
(2, 23, 34, 3, NULL),
(2, 23, 35, 1, NULL),
(2, 23, 35, 2, NULL),
(2, 23, 35, 3, NULL),
(2, 28, 31, 1, NULL),
(2, 28, 31, 2, NULL),
(2, 28, 31, 3, NULL),
(2, 28, 32, 1, NULL),
(2, 28, 32, 2, NULL),
(2, 28, 32, 3, NULL),
(2, 28, 33, 1, NULL),
(2, 28, 33, 2, NULL),
(2, 28, 33, 3, NULL),
(2, 28, 34, 1, NULL),
(2, 28, 34, 2, NULL),
(2, 28, 34, 3, NULL),
(2, 28, 35, 1, NULL),
(2, 28, 35, 2, NULL),
(2, 28, 35, 3, NULL),
(2, 29, 31, 1, NULL),
(2, 29, 31, 2, NULL),
(2, 29, 31, 3, NULL),
(2, 29, 32, 1, NULL),
(2, 29, 32, 2, NULL),
(2, 29, 32, 3, NULL),
(2, 29, 33, 1, NULL),
(2, 29, 33, 2, NULL),
(2, 29, 33, 3, NULL),
(2, 29, 34, 1, NULL),
(2, 29, 34, 2, NULL),
(2, 29, 34, 3, NULL),
(2, 29, 35, 1, NULL),
(2, 29, 35, 2, NULL),
(2, 29, 35, 3, NULL),
(2, 30, 31, 1, NULL),
(2, 30, 31, 2, NULL),
(2, 30, 31, 3, NULL),
(2, 30, 32, 1, NULL),
(2, 30, 32, 2, NULL),
(2, 30, 32, 3, NULL),
(2, 30, 33, 1, NULL),
(2, 30, 33, 2, NULL),
(2, 30, 33, 3, NULL),
(2, 30, 34, 1, NULL),
(2, 30, 34, 2, NULL),
(2, 30, 34, 3, NULL),
(2, 30, 35, 1, NULL),
(2, 30, 35, 2, NULL),
(2, 30, 35, 3, NULL),
(3, 5, 6, 1, NULL),
(3, 5, 6, 2, NULL),
(3, 5, 6, 3, NULL),
(3, 5, 7, 1, NULL),
(3, 5, 7, 2, NULL),
(3, 5, 7, 3, NULL),
(3, 5, 8, 1, NULL),
(3, 5, 8, 2, NULL),
(3, 5, 8, 3, NULL),
(3, 5, 9, 1, NULL),
(3, 5, 9, 2, NULL),
(3, 5, 9, 3, NULL),
(3, 5, 10, 1, NULL),
(3, 5, 10, 2, NULL),
(3, 5, 10, 3, NULL),
(3, 6, 6, 1, NULL),
(3, 6, 6, 2, NULL),
(3, 6, 6, 3, NULL),
(3, 6, 7, 1, NULL),
(3, 6, 7, 2, NULL),
(3, 6, 7, 3, NULL),
(3, 6, 8, 1, NULL),
(3, 6, 8, 2, NULL),
(3, 6, 8, 3, NULL),
(3, 6, 9, 1, NULL),
(3, 6, 9, 2, NULL),
(3, 6, 9, 3, NULL),
(3, 6, 10, 1, NULL),
(3, 6, 10, 2, NULL),
(3, 6, 10, 3, NULL),
(3, 7, 6, 1, NULL),
(3, 7, 6, 2, NULL),
(3, 7, 6, 3, NULL),
(3, 7, 7, 1, NULL),
(3, 7, 7, 2, NULL),
(3, 7, 7, 3, NULL),
(3, 7, 8, 1, NULL),
(3, 7, 8, 2, NULL),
(3, 7, 8, 3, NULL),
(3, 7, 9, 1, NULL),
(3, 7, 9, 2, NULL),
(3, 7, 9, 3, NULL),
(3, 7, 10, 1, NULL),
(3, 7, 10, 2, NULL),
(3, 7, 10, 3, NULL),
(3, 8, 6, 1, NULL),
(3, 8, 6, 2, NULL),
(3, 8, 6, 3, NULL),
(3, 8, 7, 1, NULL),
(3, 8, 7, 2, NULL),
(3, 8, 7, 3, NULL),
(3, 8, 8, 1, NULL),
(3, 8, 8, 2, NULL),
(3, 8, 8, 3, NULL),
(3, 8, 9, 1, NULL),
(3, 8, 9, 2, NULL),
(3, 8, 9, 3, NULL),
(3, 8, 10, 1, NULL),
(3, 8, 10, 2, NULL),
(3, 8, 10, 3, NULL),
(4, 18, 26, 1, NULL),
(4, 18, 26, 2, NULL),
(4, 18, 26, 3, NULL),
(4, 18, 27, 1, NULL),
(4, 18, 27, 2, NULL),
(4, 18, 27, 3, NULL),
(4, 18, 28, 1, NULL),
(4, 18, 28, 2, NULL),
(4, 18, 28, 3, NULL),
(4, 18, 29, 1, NULL),
(4, 18, 29, 2, NULL),
(4, 18, 29, 3, NULL),
(4, 18, 30, 1, NULL),
(4, 18, 30, 2, NULL),
(4, 18, 30, 3, NULL),
(4, 21, 26, 1, NULL),
(4, 21, 26, 2, NULL),
(4, 21, 26, 3, NULL),
(4, 21, 27, 1, NULL),
(4, 21, 27, 2, NULL),
(4, 21, 27, 3, NULL),
(4, 21, 28, 1, NULL),
(4, 21, 28, 2, NULL),
(4, 21, 28, 3, NULL),
(4, 21, 29, 1, NULL),
(4, 21, 29, 2, NULL),
(4, 21, 29, 3, NULL),
(4, 21, 30, 1, NULL),
(4, 21, 30, 2, NULL),
(4, 21, 30, 3, NULL),
(4, 22, 26, 1, NULL),
(4, 22, 26, 2, NULL),
(4, 22, 26, 3, NULL),
(4, 22, 27, 1, NULL),
(4, 22, 27, 2, NULL),
(4, 22, 27, 3, NULL),
(4, 22, 28, 1, NULL),
(4, 22, 28, 2, NULL),
(4, 22, 28, 3, NULL),
(4, 22, 29, 1, NULL),
(4, 22, 29, 2, NULL),
(4, 22, 29, 3, NULL),
(4, 22, 30, 1, NULL),
(4, 22, 30, 2, NULL),
(4, 22, 30, 3, NULL),
(4, 23, 26, 1, NULL),
(4, 23, 26, 2, NULL),
(4, 23, 26, 3, NULL),
(4, 23, 27, 1, NULL),
(4, 23, 27, 2, NULL),
(4, 23, 27, 3, NULL),
(4, 23, 28, 1, NULL),
(4, 23, 28, 2, NULL),
(4, 23, 28, 3, NULL),
(4, 23, 29, 1, NULL),
(4, 23, 29, 2, NULL),
(4, 23, 29, 3, NULL),
(4, 23, 30, 1, NULL),
(4, 23, 30, 2, NULL),
(4, 23, 30, 3, NULL),
(4, 24, 26, 1, NULL),
(4, 24, 26, 2, NULL),
(4, 24, 26, 3, NULL),
(4, 24, 27, 1, NULL),
(4, 24, 27, 2, NULL),
(4, 24, 27, 3, NULL),
(4, 24, 28, 1, NULL),
(4, 24, 28, 2, NULL),
(4, 24, 28, 3, NULL),
(4, 24, 29, 1, NULL),
(4, 24, 29, 2, NULL),
(4, 24, 29, 3, NULL),
(4, 24, 30, 1, NULL),
(4, 24, 30, 2, NULL),
(4, 24, 30, 3, NULL),
(4, 25, 26, 1, NULL),
(4, 25, 26, 2, NULL),
(4, 25, 26, 3, NULL),
(4, 25, 27, 1, NULL),
(4, 25, 27, 2, NULL),
(4, 25, 27, 3, NULL),
(4, 25, 28, 1, NULL),
(4, 25, 28, 2, NULL),
(4, 25, 28, 3, NULL),
(4, 25, 29, 1, NULL),
(4, 25, 29, 2, NULL),
(4, 25, 29, 3, NULL),
(4, 25, 30, 1, NULL),
(4, 25, 30, 2, NULL),
(4, 25, 30, 3, NULL),
(4, 26, 26, 1, NULL),
(4, 26, 26, 2, NULL),
(4, 26, 26, 3, NULL),
(4, 26, 27, 1, NULL),
(4, 26, 27, 2, NULL),
(4, 26, 27, 3, NULL),
(4, 26, 28, 1, NULL),
(4, 26, 28, 2, NULL),
(4, 26, 28, 3, NULL),
(4, 26, 29, 1, NULL),
(4, 26, 29, 2, NULL),
(4, 26, 29, 3, NULL),
(4, 26, 30, 1, NULL),
(4, 26, 30, 2, NULL),
(4, 26, 30, 3, NULL),
(4, 27, 26, 1, NULL),
(4, 27, 26, 2, NULL),
(4, 27, 26, 3, NULL),
(4, 27, 27, 1, NULL),
(4, 27, 27, 2, NULL),
(4, 27, 27, 3, NULL),
(4, 27, 28, 1, NULL),
(4, 27, 28, 2, NULL),
(4, 27, 28, 3, NULL),
(4, 27, 29, 1, NULL),
(4, 27, 29, 2, NULL),
(4, 27, 29, 3, NULL),
(4, 27, 30, 1, NULL),
(4, 27, 30, 2, NULL),
(4, 27, 30, 3, NULL),
(5, 5, 16, 1, NULL),
(5, 5, 16, 2, NULL),
(5, 5, 16, 3, NULL),
(5, 5, 17, 1, NULL),
(5, 5, 17, 2, NULL),
(5, 5, 17, 3, NULL),
(5, 5, 18, 1, NULL),
(5, 5, 18, 2, NULL),
(5, 5, 18, 3, NULL),
(5, 5, 19, 1, NULL),
(5, 5, 19, 2, NULL),
(5, 5, 19, 3, NULL),
(5, 5, 20, 1, NULL),
(5, 5, 20, 2, NULL),
(5, 5, 20, 3, NULL),
(5, 7, 16, 1, NULL),
(5, 7, 16, 2, NULL),
(5, 7, 16, 3, NULL),
(5, 7, 17, 1, NULL),
(5, 7, 17, 2, NULL),
(5, 7, 17, 3, NULL),
(5, 7, 18, 1, NULL),
(5, 7, 18, 2, NULL),
(5, 7, 18, 3, NULL),
(5, 7, 19, 1, NULL),
(5, 7, 19, 2, NULL),
(5, 7, 19, 3, NULL),
(5, 7, 20, 1, NULL),
(5, 7, 20, 2, NULL),
(5, 7, 20, 3, NULL),
(5, 8, 16, 1, NULL),
(5, 8, 16, 2, NULL),
(5, 8, 16, 3, NULL),
(5, 8, 17, 1, NULL),
(5, 8, 17, 2, NULL),
(5, 8, 17, 3, NULL),
(5, 8, 18, 1, NULL),
(5, 8, 18, 2, NULL),
(5, 8, 18, 3, NULL),
(5, 8, 19, 1, NULL),
(5, 8, 19, 2, NULL),
(5, 8, 19, 3, NULL),
(5, 8, 20, 1, NULL),
(5, 8, 20, 2, NULL),
(5, 8, 20, 3, NULL),
(5, 11, 16, 1, NULL),
(5, 11, 16, 2, NULL),
(5, 11, 16, 3, NULL),
(5, 11, 17, 1, NULL),
(5, 11, 17, 2, NULL),
(5, 11, 17, 3, NULL),
(5, 11, 18, 1, NULL),
(5, 11, 18, 2, NULL),
(5, 11, 18, 3, NULL),
(5, 11, 19, 1, NULL),
(5, 11, 19, 2, NULL),
(5, 11, 19, 3, NULL),
(5, 11, 20, 1, NULL),
(5, 11, 20, 2, NULL),
(5, 11, 20, 3, NULL),
(5, 12, 16, 1, NULL),
(5, 12, 16, 2, NULL),
(5, 12, 16, 3, NULL),
(5, 12, 17, 1, NULL),
(5, 12, 17, 2, NULL),
(5, 12, 17, 3, NULL),
(5, 12, 18, 1, NULL),
(5, 12, 18, 2, NULL),
(5, 12, 18, 3, NULL),
(5, 12, 19, 1, NULL),
(5, 12, 19, 2, NULL),
(5, 12, 19, 3, NULL),
(5, 12, 20, 1, NULL),
(5, 12, 20, 2, NULL),
(5, 12, 20, 3, NULL),
(5, 13, 16, 1, NULL),
(5, 13, 16, 2, NULL),
(5, 13, 16, 3, NULL),
(5, 13, 17, 1, NULL),
(5, 13, 17, 2, NULL),
(5, 13, 17, 3, NULL),
(5, 13, 18, 1, NULL),
(5, 13, 18, 2, NULL),
(5, 13, 18, 3, NULL),
(5, 13, 19, 1, NULL),
(5, 13, 19, 2, NULL),
(5, 13, 19, 3, NULL),
(5, 13, 20, 1, NULL),
(5, 13, 20, 2, NULL),
(5, 13, 20, 3, NULL),
(5, 14, 16, 1, NULL),
(5, 14, 16, 2, NULL),
(5, 14, 16, 3, NULL),
(5, 14, 17, 1, NULL),
(5, 14, 17, 2, NULL),
(5, 14, 17, 3, NULL),
(5, 14, 18, 1, NULL),
(5, 14, 18, 2, NULL),
(5, 14, 18, 3, NULL),
(5, 14, 19, 1, NULL),
(5, 14, 19, 2, NULL),
(5, 14, 19, 3, NULL),
(5, 14, 20, 1, NULL),
(5, 14, 20, 2, NULL),
(5, 14, 20, 3, NULL),
(5, 15, 16, 1, NULL),
(5, 15, 16, 2, NULL),
(5, 15, 16, 3, NULL),
(5, 15, 17, 1, NULL),
(5, 15, 17, 2, NULL),
(5, 15, 17, 3, NULL),
(5, 15, 18, 1, NULL),
(5, 15, 18, 2, NULL),
(5, 15, 18, 3, NULL),
(5, 15, 19, 1, NULL),
(5, 15, 19, 2, NULL),
(5, 15, 19, 3, NULL),
(5, 15, 20, 1, NULL),
(5, 15, 20, 2, NULL),
(5, 15, 20, 3, NULL),
(6, 16, 21, 1, NULL),
(6, 16, 21, 2, NULL),
(6, 16, 21, 3, NULL),
(6, 16, 22, 1, NULL),
(6, 16, 22, 2, NULL),
(6, 16, 22, 3, NULL),
(6, 16, 23, 1, NULL),
(6, 16, 23, 2, NULL),
(6, 16, 23, 3, NULL),
(6, 16, 24, 1, NULL),
(6, 16, 24, 2, NULL),
(6, 16, 24, 3, NULL),
(6, 16, 25, 1, NULL),
(6, 16, 25, 2, NULL),
(6, 16, 25, 3, NULL),
(6, 17, 21, 1, NULL),
(6, 17, 21, 2, NULL),
(6, 17, 21, 3, NULL),
(6, 17, 22, 1, NULL),
(6, 17, 22, 2, NULL),
(6, 17, 22, 3, NULL),
(6, 17, 23, 1, NULL),
(6, 17, 23, 2, NULL),
(6, 17, 23, 3, NULL),
(6, 17, 24, 1, NULL),
(6, 17, 24, 2, NULL),
(6, 17, 24, 3, NULL),
(6, 17, 25, 1, NULL),
(6, 17, 25, 2, NULL),
(6, 17, 25, 3, NULL),
(6, 18, 21, 1, NULL),
(6, 18, 21, 2, NULL),
(6, 18, 21, 3, NULL),
(6, 18, 22, 1, NULL),
(6, 18, 22, 2, NULL),
(6, 18, 22, 3, NULL),
(6, 18, 23, 1, NULL),
(6, 18, 23, 2, NULL),
(6, 18, 23, 3, NULL),
(6, 18, 24, 1, NULL),
(6, 18, 24, 2, NULL),
(6, 18, 24, 3, NULL),
(6, 18, 25, 1, NULL),
(6, 18, 25, 2, NULL),
(6, 18, 25, 3, NULL),
(6, 19, 21, 1, NULL),
(6, 19, 21, 2, NULL),
(6, 19, 21, 3, NULL),
(6, 19, 22, 1, NULL),
(6, 19, 22, 2, NULL),
(6, 19, 22, 3, NULL),
(6, 19, 23, 1, NULL),
(6, 19, 23, 2, NULL),
(6, 19, 23, 3, NULL),
(6, 19, 24, 1, NULL),
(6, 19, 24, 2, NULL),
(6, 19, 24, 3, NULL),
(6, 19, 25, 1, NULL),
(6, 19, 25, 2, NULL),
(6, 19, 25, 3, NULL),
(6, 20, 21, 1, NULL),
(6, 20, 21, 2, NULL),
(6, 20, 21, 3, NULL),
(6, 20, 22, 1, NULL),
(6, 20, 22, 2, NULL),
(6, 20, 22, 3, NULL),
(6, 20, 23, 1, NULL),
(6, 20, 23, 2, NULL),
(6, 20, 23, 3, NULL),
(6, 20, 24, 1, NULL),
(6, 20, 24, 2, NULL),
(6, 20, 24, 3, NULL),
(6, 20, 25, 1, NULL),
(6, 20, 25, 2, NULL),
(6, 20, 25, 3, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `pro_id` int(5) NOT NULL,
  `pro_nome` varchar(45) NOT NULL,
  `pro_email` varchar(50) NOT NULL,
  `pro_telefone` varchar(15) NOT NULL,
  `pro_matricula` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`pro_id`, `pro_nome`, `pro_email`, `pro_telefone`, `pro_matricula`) VALUES
(8, 'Roberto', '', '', '1722204400001'),
(9, 'Anderson', '', '', '1722204400002'),
(10, 'Henrique', '', '', '1722204400003'),
(11, 'Marcelo Arantes', '', '', '1722204400004'),
(12, 'Rosenclever', '', '', '1722204400005'),
(14, 'Paula', '', '', '1722204400007'),
(15, 'Nélio', '', '', '1722204400008'),
(16, 'Rubem', '', '', '1722204400009'),
(17, 'Sonia', '', '', '1722204400010'),
(18, 'Fernanda', '', '', '1722204400011'),
(19, 'Gimenez', '', '', '1722204400012'),
(20, 'João', '', '', '1722204400013'),
(21, 'Marcelo Santana', '', '', '1722204400014'),
(22, 'André', '', '', '1722204400015'),
(23, 'Thiago', '', '', '1722204400016'),
(24, 'Arnaldo', '', '', '1722204400017');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `tur_id` int(5) NOT NULL,
  `tur_nome` varchar(45) NOT NULL,
  `cur_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`tur_id`, `tur_nome`, `cur_id`) VALUES
(1, '3101 INFO', 1),
(2, '3101 ADM', 2),
(3, '2101 INFO', 1),
(4, '2101 ADM', 2),
(5, '1101 INFO', 1),
(6, '1101 ADM', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma_disciplina`
--

CREATE TABLE `turma_disciplina` (
  `tur_id` int(5) NOT NULL,
  `disc_id` int(5) NOT NULL,
  `pro_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `turma_disciplina`
--

INSERT INTO `turma_disciplina` (`tur_id`, `disc_id`, `pro_id`) VALUES
(3, 5, 8),
(5, 11, 8),
(5, 15, 8),
(1, 6, 9),
(3, 6, 9),
(5, 13, 9),
(1, 8, 10),
(1, 9, 10),
(3, 7, 10),
(3, 8, 10),
(1, 5, 11),
(5, 5, 11),
(1, 10, 12),
(5, 14, 12),
(5, 8, 14),
(5, 12, 15),
(5, 7, 16),
(2, 29, 17),
(4, 24, 17),
(6, 16, 17),
(6, 17, 18),
(2, 28, 19),
(4, 18, 19),
(4, 27, 19),
(6, 18, 19),
(4, 21, 20),
(6, 19, 20),
(2, 23, 21),
(4, 23, 21),
(6, 20, 21),
(2, 22, 22),
(4, 22, 22),
(2, 10, 23),
(4, 25, 23),
(4, 26, 23),
(2, 30, 24);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `usu_id` int(5) NOT NULL,
  `usu_login` varchar(45) NOT NULL,
  `usu_senha` varchar(45) NOT NULL,
  `usu_nivel` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`usu_id`, `usu_login`, `usu_senha`, `usu_nivel`) VALUES
(7, '1511104400019', 'e4963ccd8e9072a2c871fc18ae8304a5964aa688', 1),
(8, '1511104400044', 'e4963ccd8e9072a2c871fc18ae8304a5964aa688', 1),
(9, '1511104400023', 'e4963ccd8e9072a2c871fc18ae8304a5964aa688', 1),
(10, '1511104400050', 'e4963ccd8e9072a2c871fc18ae8304a5964aa688', 1),
(11, '1511104400049', 'e4963ccd8e9072a2c871fc18ae8304a5964aa688', 1),
(12, '1511104400015', 'e4963ccd8e9072a2c871fc18ae8304a5964aa688', 1),
(13, '1511104400018', 'e4963ccd8e9072a2c871fc18ae8304a5964aa688', 1),
(14, '1511104400026', 'e4963ccd8e9072a2c871fc18ae8304a5964aa688', 1),
(15, '1511104400025', 'e4963ccd8e9072a2c871fc18ae8304a5964aa688', 1),
(16, '1511104400011', 'e4963ccd8e9072a2c871fc18ae8304a5964aa688', 1),
(17, 'Creuza', '38867ea30a72b716af9af72f9ff64ff202eeb6f2', 3),
(18, '1711104400006', 'e4963ccd8e9072a2c871fc18ae8304a5964aa688', 1),
(19, '1711104400008', 'e4963ccd8e9072a2c871fc18ae8304a5964aa688', 1),
(20, '1711104400009 	', 'e4963ccd8e9072a2c871fc18ae8304a5964aa688', 1),
(21, '1711104400005 	', 'e4963ccd8e9072a2c871fc18ae8304a5964aa688', 1),
(22, '1711104400007', 'e4963ccd8e9072a2c871fc18ae8304a5964aa688', 1),
(23, '1711100100016', 'e4963ccd8e9072a2c871fc18ae8304a5964aa688', 1),
(24, '1711100100014', 'e4963ccd8e9072a2c871fc18ae8304a5964aa688', 1),
(25, '1711100100015', 'e4963ccd8e9072a2c871fc18ae8304a5964aa688', 1),
(26, '1711100100018 	', 'e4963ccd8e9072a2c871fc18ae8304a5964aa688', 1),
(27, '1711100100017', 'e4963ccd8e9072a2c871fc18ae8304a5964aa688', 1),
(28, '1611100100005', 'e4963ccd8e9072a2c871fc18ae8304a5964aa688', 1),
(29, '1611100100004', 'e4963ccd8e9072a2c871fc18ae8304a5964aa688', 1),
(30, '1611100100010', 'e4963ccd8e9072a2c871fc18ae8304a5964aa688', 1),
(31, '1611100100023', 'e4963ccd8e9072a2c871fc18ae8304a5964aa688', 1),
(32, '1611100100022', 'e4963ccd8e9072a2c871fc18ae8304a5964aa688', 1),
(33, '1511100100040', 'e4963ccd8e9072a2c871fc18ae8304a5964aa688', 1),
(34, '1511100100049', 'e4963ccd8e9072a2c871fc18ae8304a5964aa688', 1),
(35, '1511100100021', 'e4963ccd8e9072a2c871fc18ae8304a5964aa688', 1),
(36, '1511100100010', 'e4963ccd8e9072a2c871fc18ae8304a5964aa688', 1),
(37, '1511100100017', 'e4963ccd8e9072a2c871fc18ae8304a5964aa688', 1),
(38, '123', 'e4963ccd8e9072a2c871fc18ae8304a5964aa688', 2),
(39, '1722204400001', '10ddeb5e067f6aefda9d7665bfa3edb40f6a8f4b', 2),
(40, '1722204400002', '10ddeb5e067f6aefda9d7665bfa3edb40f6a8f4b', 2),
(41, '1722204400003', '10ddeb5e067f6aefda9d7665bfa3edb40f6a8f4b', 2),
(42, '1722204400004', '10ddeb5e067f6aefda9d7665bfa3edb40f6a8f4b', 2),
(43, '1722204400005', '10ddeb5e067f6aefda9d7665bfa3edb40f6a8f4b', 2),
(44, '1722204400006', '10ddeb5e067f6aefda9d7665bfa3edb40f6a8f4b', 2),
(45, '1722204400007', '10ddeb5e067f6aefda9d7665bfa3edb40f6a8f4b', 2),
(46, '1722204400008', '10ddeb5e067f6aefda9d7665bfa3edb40f6a8f4b', 2),
(47, '1722204400009', '10ddeb5e067f6aefda9d7665bfa3edb40f6a8f4b', 2),
(48, '1722204400010', '10ddeb5e067f6aefda9d7665bfa3edb40f6a8f4b', 2),
(49, '1722204400011', '10ddeb5e067f6aefda9d7665bfa3edb40f6a8f4b', 2),
(50, '1722204400012', '10ddeb5e067f6aefda9d7665bfa3edb40f6a8f4b', 2),
(51, '1722204400013', '10ddeb5e067f6aefda9d7665bfa3edb40f6a8f4b', 2),
(52, '1722204400014', '10ddeb5e067f6aefda9d7665bfa3edb40f6a8f4b', 2),
(53, '1722204400015', '10ddeb5e067f6aefda9d7665bfa3edb40f6a8f4b', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`alu_id`),
  ADD UNIQUE KEY `alu_matricula` (`alu_matricula`);

--
-- Indexes for table `alu_turdisc`
--
ALTER TABLE `alu_turdisc`
  ADD PRIMARY KEY (`tur_id`,`disc_id`,`alu_id`),
  ADD KEY `disc_id` (`disc_id`),
  ADD KEY `atdFK2` (`alu_id`);

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`cur_id`);

--
-- Indexes for table `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`disc_id`);

--
-- Indexes for table `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`tur_id`,`disc_id`,`alu_id`,`not_trime`),
  ADD KEY `disc_id` (`disc_id`),
  ADD KEY `alu_id` (`alu_id`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`tur_id`),
  ADD KEY `cur_id` (`cur_id`);

--
-- Indexes for table `turma_disciplina`
--
ALTER TABLE `turma_disciplina`
  ADD PRIMARY KEY (`tur_id`,`disc_id`),
  ADD KEY `tdFK2` (`disc_id`),
  ADD KEY `tdFK3` (`pro_id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aluno`
--
ALTER TABLE `aluno`
  MODIFY `alu_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
  MODIFY `cur_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `disc_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
  MODIFY `pro_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `turma`
--
ALTER TABLE `turma`
  MODIFY `tur_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usu_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `alu_turdisc`
--
ALTER TABLE `alu_turdisc`
  ADD CONSTRAINT `atdFK1` FOREIGN KEY (`tur_id`,`disc_id`) REFERENCES `turma_disciplina` (`tur_id`, `disc_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `atdFK2` FOREIGN KEY (`alu_id`) REFERENCES `aluno` (`alu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_ibFK1` FOREIGN KEY (`tur_id`,`disc_id`,`alu_id`) REFERENCES `alu_turdisc` (`tur_id`, `disc_id`, `alu_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `turma_ibfk_1` FOREIGN KEY (`cur_id`) REFERENCES `curso` (`cur_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `turma_disciplina`
--
ALTER TABLE `turma_disciplina`
  ADD CONSTRAINT `tdFK1` FOREIGN KEY (`tur_id`) REFERENCES `turma` (`tur_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tdFK2` FOREIGN KEY (`disc_id`) REFERENCES `disciplina` (`disc_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tdFK3` FOREIGN KEY (`pro_id`) REFERENCES `professor` (`pro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
