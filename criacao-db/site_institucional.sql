-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05-Nov-2020 às 03:01
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `site_institucional`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_equipe`
--

CREATE TABLE `tb_equipe` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_equipe`
--

INSERT INTO `tb_equipe` (`id`, `nome`, `descricao`) VALUES
(1, 'testes', 'testestestestestes'),
(2, 'testestestes', 'testestestestes');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_sobre`
--

CREATE TABLE `tb_sobre` (
  `id` int(11) NOT NULL,
  `sobre` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_sobre`
--

INSERT INTO `tb_sobre` (`id`, `sobre`) VALUES
(8, '<div class=\"col-md-4\">\r\n                  <h3><span class=\"glyphicon glyphicon-glass\"></span></h3>\r\n                  <h2>Diferencial #1</h2>\r\n                  <p>Lorem ipsum posuere euismod praesent tortor curae tempus vel, cursus placerat augue ac nisi tristique aptent tristique, non lobortis mollis molestie pellentesque arcu sit. auctor himenaeos eleifend consequat leo quisque consectetur maecenas, eu morbi commodo pharetra fermentum neque faucibus eros, mi fringilla accumsan faucibus ornare quis. mollis etiam malesuada nibh ut sed justo, dolor suspendisse sapien sem interdum cubilia, praesent morbi primis convallis ante. sit massa consequat lectus class porta nostra hac purus ultricies vel luctus purus netus cursus rutrum condimentum nisi sed, eleifend gravida congue dolor porttitor urna donec purus feugiat felis quam sagittis tempor augue venenatis per lectus.</p>\r\n                </div>\r\n<div class=\"col-md-4\">\r\n                  <h3><span class=\"glyphicon glyphicon-star\"></span></h3>\r\n                  <h2>Diferencial #2</h2>\r\n                  <p>Lorem ipsum posuere euismod praesent tortor curae tempus vel, cursus placerat augue ac nisi tristique aptent tristique, non lobortis mollis molestie pellentesque arcu sit. auctor himenaeos eleifend consequat leo quisque consectetur maecenas, eu morbi commodo pharetra fermentum neque faucibus eros, mi fringilla accumsan faucibus ornare quis. mollis etiam malesuada nibh ut sed justo, dolor suspendisse sapien sem interdum cubilia, praesent morbi primis convallis ante. sit massa consequat lectus class porta nostra hac purus ultricies vel luctus purus netus cursus rutrum condimentum nisi sed, eleifend gravida congue dolor porttitor urna donec purus feugiat felis quam sagittis tempor augue venenatis per lectus.</p>\r\n                </div>\r\n<div class=\"col-md-4\">\r\n                  <h3><span class=\"glyphicon glyphicon-heart\"></span></h3>\r\n                  <h2>Diferencial #3</h2>\r\n                  <p>Lorem ipsum posuere euismod praesent tortor curae tempus vel, cursus placerat augue ac nisi tristique aptent tristique, non lobortis mollis molestie pellentesque arcu sit. auctor himenaeos eleifend consequat leo quisque consectetur maecenas, eu morbi commodo pharetra fermentum neque faucibus eros, mi fringilla accumsan faucibus ornare quis. mollis etiam malesuada nibh ut sed justo, dolor suspendisse sapien sem interdum cubilia, praesent morbi primis convallis ante. sit massa consequat lectus class porta nostra hac purus ultricies vel luctus purus netus cursus rutrum condimentum nisi sed, eleifend gravida congue dolor porttitor urna donec purus feugiat felis quam sagittis tempor augue venenatis per lectus.</p>\r\n                </div>');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_equipe`
--
ALTER TABLE `tb_equipe`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_sobre`
--
ALTER TABLE `tb_sobre`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_equipe`
--
ALTER TABLE `tb_equipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_sobre`
--
ALTER TABLE `tb_sobre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
