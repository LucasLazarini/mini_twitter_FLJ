-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02/08/2018 às 02:18
-- Versão do servidor: 10.1.31-MariaDB
-- Versão do PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mini-twitter`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `followers`
--

CREATE TABLE `followers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `follower_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tweet_id` int(11) NOT NULL,
  `dateTime` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Fazendo dump de dados para tabela `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `tweet_id`, `dateTime`, `type`) VALUES
(112, 16, 16, 1, 0),
(116, 17, 21, 1, 0),
(119, 20, 18, 1, 0),
(120, 20, 12, 1, 0),
(121, 16, 12, 1, 0),
(127, 16, 18, 1, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tweets`
--

CREATE TABLE `tweets` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `message` varchar(140) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `removed` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Fazendo dump de dados para tabela `tweets`
--

INSERT INTO `tweets` (`id`, `date`, `message`, `user_id`, `removed`) VALUES
(9, '2018-08-01 19:46:39', 'dadasda', 16, 1),
(10, '2018-08-01 20:45:58', 'adadasdasdasdasda', 16, 1),
(11, '2018-07-30 15:26:13', 'dsadasdas', 17, 0),
(12, '2018-07-30 17:57:14', 'Prog 3\r\n', 17, 0),
(13, '2018-07-30 19:58:11', 'Prog 3\r\n', 17, 0),
(14, '2018-08-01 20:45:54', 'grkjkdsfjksdfhfds', 16, 1),
(15, '2018-07-31 23:58:27', 'teste de like', 20, 0),
(16, '2018-08-01 13:22:06', 'dadajsdadjka', 20, 0),
(17, '2018-08-01 13:53:15', 'jdasjdhasjkdas\r\n', 20, 0),
(18, '2018-08-01 20:49:02', 'testando contagem de likes', 20, 1),
(19, '2018-08-01 19:43:34', 'eae\r\n', 16, 1),
(20, '2018-08-01 19:43:23', 'ola', 30, 1),
(21, '2018-08-01 19:51:26', 'Testando Likes e ExclusÃ£o', 16, 1),
(22, '2018-08-01 22:33:03', 'ajsdkjasdjasdasd', 20, 1),
(23, '2018-08-01 20:50:39', 'Teste de JunÃ§Ã£o de cÃ³digos', 20, 1),
(24, '2018-08-01 22:07:37', 'olÃ¡\r\n', 20, 1),
(25, '2018-08-01 22:09:49', 'testando postagens\r\n', 31, 0),
(26, '2018-08-01 22:10:09', 'OlÃ¡ prog3!!', 31, 1),
(27, '2018-08-01 22:12:15', 'testando exclusÃ£o e likes', 31, 0),
(28, '2018-08-01 22:17:03', 'nbjbhj', NULL, 0),
(29, '2018-08-01 22:19:05', 'djahdjkashdjkasdha', 39, 1),
(30, '2018-08-01 22:19:03', 'dasdjkashdaks', 39, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `removed` tinyint(1) DEFAULT '0',
  `birthDate` date NOT NULL,
  `sex` varchar(30) NOT NULL,
  `city` varchar(150) NOT NULL,
  `website` varchar(300) DEFAULT NULL,
  `picture` varchar(500) DEFAULT NULL,
  `private` tinyint(1) DEFAULT '0',
  `hasCookieSenha` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Fazendo dump de dados para tabela `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `creationDate`, `removed`, `birthDate`, `sex`, `city`, `website`, `picture`, `private`, `hasCookieSenha`) VALUES
(12, 'lucas lazarini', 'lucaslazarini_', 'lucas.lazarini@uenp.edu.br', '18071997', '2018-06-28 07:05:06', 0, '1997-07-18', 'Masculino', 'Bandeirates', NULL, NULL, 0, NULL),
(13, 'Emanoel Juvencio', 'ManuJuve', 'Manu@juve.com', '123456', '2018-07-23 13:30:10', 0, '1997-07-18', 'Masculino', 'Bandeirantes', '', NULL, 0, NULL),
(15, 'Joao', 'jaum', 'jaum@gmail.com', 'fe703d258c7ef5f50b71e06565a65aa07194907f', '2018-07-25 21:24:42', 0, '1999-02-13', 'NÃ£o informado', 'Itambaraca', '', NULL, 0, NULL),
(16, 'Fabricio Paschoal', 'fabriciopaschoal', 'fabricio@gmail.com', 'fe703d258c7ef5f50b71e06565a65aa07194907f', '2018-07-25 22:29:42', 0, '1996-10-28', 'Masculino', 'Itambaraca', 'https://github.com/FabricioPaschoal', NULL, 0, NULL),
(17, 'pedro', 'pedro', 'pedro@gmail.com', 'adcd7048512e64b48da55b027577886ee5a36350', '2018-07-25 22:37:59', 0, '1990-08-15', 'NÃ£o informado', 'Itambaraca', '', NULL, 0, NULL),
(20, 'boi', 'boi', 'boi@gmail.com', '0937afa17f4dc08f3c0e5dc908158370ce64df86', '2018-07-25 23:00:52', 0, '1996-10-28', 'Masculino', 'Itambaraca', 'https://github.com/FabricioPaschoal', NULL, 0, NULL),
(21, 'cachorro', 'cao', 'cao@gmail.com', '0937afa17f4dc08f3c0e5dc908158370ce64df86', '2018-07-26 18:34:04', 0, '1990-12-18', 'NÃ£o informado', 'Itambaraca', '', NULL, 0, NULL),
(22, 'neto', 'neto', 'neto@gmail.com', '4cb49412f654669b9796446cf501a614ccede53b', '2018-07-31 23:17:56', 0, '1990-05-19', 'Feminino', 'itca', '', NULL, 0, NULL),
(24, 'leo', 'leozin', 'leo@gmail.com', '0937afa17f4dc08f3c0e5dc908158370ce64df86', '2018-07-31 23:20:35', 0, '1998-12-28', 'Masculino', 'andira', '', NULL, 0, NULL),
(27, 'leozao', 'leozao', 'leozao@gmail.com', '0937afa17f4dc08f3c0e5dc908158370ce64df86', '2018-07-31 23:23:06', 0, '1998-12-28', 'Masculino', 'andira', '', NULL, 0, NULL),
(28, 'f', 'f', 'f@gmail.com', 'ec78ddda0cbcc3ba8f0e79ffc29e242cfccae579', '2018-08-01 13:44:06', 0, '1996-10-28', 'Masculino', 'i', '', NULL, 0, NULL),
(29, 'w', 'w', 'w@gmail.com', '45ab79e6210f967e603c415dea94705c8257dd03', '2018-08-01 13:48:37', 0, '1990-08-19', 'Masculino', 'w', '', NULL, 0, NULL),
(30, 'scooby', 'scooby', 'scooby@gmail.com', '0937afa17f4dc08f3c0e5dc908158370ce64df86', '2018-08-01 16:58:36', 0, '1996-10-28', 'NÃ£o informado', 'Itambaraca', '', NULL, 0, NULL),
(31, 'prog3', 'prog3', 'prog3@gmail.com', '0937afa17f4dc08f3c0e5dc908158370ce64df86', '2018-08-01 22:08:19', 0, '1996-10-28', 'Masculino', 'bandeirantes', '', NULL, 0, NULL),
(32, 'prog31', 'prog31', 'prog31@gmail.com', '0937afa17f4dc08f3c0e5dc908158370ce64df86', '2018-08-01 22:13:22', 0, '1996-10-28', 'Masculino', 'bandeirantes', '', NULL, 0, NULL),
(38, 'enos', 'enos', 'enos@gmail.com', '0937afa17f4dc08f3c0e5dc908158370ce64df86', '2018-08-01 22:16:49', 0, '1995-02-15', 'Masculino', 'bandeirantes', '', NULL, 0, NULL),
(39, 'enos2', 'enos2', 'enos2@gmail.com', '0937afa17f4dc08f3c0e5dc908158370ce64df86', '2018-08-01 22:18:35', 0, '1995-02-15', 'Masculino', 'bandeirantes', '', NULL, 0, NULL),
(40, 'guedin', 'guedin', 'guedin@gmail.com', '0937afa17f4dc08f3c0e5dc908158370ce64df86', '2018-08-01 22:19:34', 0, '1994-08-15', 'Masculino', 'bandeirantes', '', NULL, 0, NULL);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `follower_id` (`follower_id`);

--
-- Índices de tabela `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_likes_users` (`user_id`),
  ADD KEY `tweet_id` (`tweet_id`);

--
-- Índices de tabela `tweets`
--
ALTER TABLE `tweets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_twitts_users_idx` (`user_id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `followers`
--
ALTER TABLE `followers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT de tabela `tweets`
--
ALTER TABLE `tweets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `followers`
--
ALTER TABLE `followers`
  ADD CONSTRAINT `fk_followers_followers` FOREIGN KEY (`follower_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_followers_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Restrições para tabelas `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `fk_likes_tweets` FOREIGN KEY (`tweet_id`) REFERENCES `tweets` (`id`),
  ADD CONSTRAINT `fk_likes_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Restrições para tabelas `tweets`
--
ALTER TABLE `tweets`
  ADD CONSTRAINT `fk_tweets_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
