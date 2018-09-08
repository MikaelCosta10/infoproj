-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 08-Set-2018 às 04:26
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissao`
--

CREATE TABLE IF NOT EXISTS `permissao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `permissao`
--

INSERT INTO `permissao` (`id`, `nome`) VALUES
(1, 'Administradoor'),
(2, 'Lider'),
(3, 'Tecnico');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_permissao`
--

CREATE TABLE IF NOT EXISTS `tipo_permissao` (
  `idtipo_permissao` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`idtipo_permissao`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `tipo_permissao`
--

INSERT INTO `tipo_permissao` (`idtipo_permissao`, `nome`) VALUES
(1, 'Editar'),
(2, 'Excluir'),
(3, 'Adicionar');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `senha_nova` varchar(45) DEFAULT NULL,
  `data_senha` date DEFAULT NULL,
  `prontuario` varchar(10) NOT NULL,
  `img` varchar(100) DEFAULT NULL,
  `Id_tipo_permissao` int(11) DEFAULT NULL,
  `lattes` varchar(200) DEFAULT NULL,
  `permissao_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`permissao_id`),
  KEY `fk_Usuario_permissao1_idx` (`permissao_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `senha_nova`, `data_senha`, `prontuario`, `img`, `Id_tipo_permissao`, `lattes`, `permissao_id`) VALUES
(1, NULL, 'mikael.souza6@gmail.com', '123', NULL, NULL, 'ba1690256', NULL, NULL, NULL, 1),
(2, NULL, 'teste@teste', '1234', NULL, NULL, '12345678', NULL, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuariopermissao`
--

CREATE TABLE IF NOT EXISTS `usuariopermissao` (
  `Id_usuario` int(11) NOT NULL,
  `valor` int(11) DEFAULT NULL,
  `Id_tipo_permissao` int(11) NOT NULL,
  PRIMARY KEY (`Id_usuario`,`Id_tipo_permissao`),
  KEY `fk_Usuario_has_permissao_Usuario_idx` (`Id_usuario`),
  KEY `fk_UsuarioPermissao_tipo_permissao1_idx` (`Id_tipo_permissao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuariopermissao`
--

INSERT INTO `usuariopermissao` (`Id_usuario`, `valor`, `Id_tipo_permissao`) VALUES
(2, 1, 3);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_Usuario_permissao1` FOREIGN KEY (`permissao_id`) REFERENCES `permissao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuariopermissao`
--
ALTER TABLE `usuariopermissao`
  ADD CONSTRAINT `fk_UsuarioPermissao_tipo_permissao1` FOREIGN KEY (`Id_tipo_permissao`) REFERENCES `tipo_permissao` (`idtipo_permissao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Usuario_has_permissao_Usuario` FOREIGN KEY (`Id_usuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
