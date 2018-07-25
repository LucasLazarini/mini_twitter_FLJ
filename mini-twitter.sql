-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25-Jul-2018 às 09:23
-- Versão do servidor: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mini-twitter`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `followers`
--

CREATE TABLE `followers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `follower_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tweet_id` int(11) NOT NULL,
  `dateTime` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tweets`
--

CREATE TABLE `tweets` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `message` varchar(140) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `removed` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tweets`
--

INSERT INTO `tweets` (`id`, `date`, `message`, `user_id`, `removed`) VALUES
(5, '2018-06-28 08:07:33', 'Ola', NULL, 0),
(6, '2018-06-28 09:47:41', 'Ola', NULL, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
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
  `private` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `creationDate`, `removed`, `birthDate`, `sex`, `city`, `website`, `picture`, `private`) VALUES
(12, 'lucas lazarini', 'lucaslazarini_', 'lucas.lazarini@uenp.edu.br', '18071997', '2018-06-28 04:05:06', 0, '1997-07-18', 'Masculino', 'Bandeirates', NULL, NULL, 0),
(13, 'Emanoel Juvencio', 'ManuJuve', 'Manu@juve.com', '123456', '2018-07-23 10:30:10', 0, '1997-07-18', 'Masculino', 'Bandeirantes', '', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `follower_id` (`follower_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_likes_users` (`user_id`),
  ADD KEY `tweet_id` (`tweet_id`);

--
-- Indexes for table `tweets`
--
ALTER TABLE `tweets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_twitts_users_idx` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tweets`
--
ALTER TABLE `tweets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `followers`
--
ALTER TABLE `followers`
  ADD CONSTRAINT `fk_followers_followers` FOREIGN KEY (`follower_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_followers_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `fk_likes_tweets` FOREIGN KEY (`tweet_id`) REFERENCES `tweets` (`id`),
  ADD CONSTRAINT `fk_likes_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `tweets`
--
ALTER TABLE `tweets`
  ADD CONSTRAINT `fk_tweets_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
