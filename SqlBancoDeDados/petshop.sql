-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 01-Maio-2019 às 23:24
-- Versão do servidor: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petshop`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `animal`
--

CREATE TABLE `animal` (
  `id` int(10) UNSIGNED NOT NULL,
  `nomeA` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomeD` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricaoR` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dataN` date NOT NULL,
  `foto` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tipo` int(10) UNSIGNED DEFAULT NULL,
  `idade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `animal`
--

INSERT INTO `animal` (`id`, `nomeA`, `nomeD`, `descricaoR`, `dataN`, `foto`, `created_at`, `updated_at`, `tipo`, `idade`) VALUES
(1, 'Rex', 'Mateus', 'Fila', '2018-05-19', 'toto.jpg', '2018-05-20 03:01:01', '2018-05-20 03:01:01', 1, 0),
(3, 'Lua', 'Mauricio', 'Chitzu', '2018-05-21', 'smigle.jpg', '2018-05-20 03:05:09', '2018-05-20 03:05:09', 1, 0),
(4, 'Lua', 'Clarice', 'Chitzu', '2014-06-25', 'smigle.jpg', '2018-05-20 03:07:38', '2018-05-23 22:15:07', 1, 3),
(7, 'Jered', 'Whinderson', 'Calopsita', '2010-06-09', 'download.jpg', '2018-05-23 04:00:36', '2018-05-23 04:00:36', 3, 7),
(8, 'Bruno Weberty Silva Ribeiro', 'Pedro Ribeiro', 'black', '2000-10-10', 'po.jpg', '2018-05-25 00:31:25', '2018-05-25 00:31:25', 5, 17);

-- --------------------------------------------------------

--
-- Estrutura da tabela `atendimento`
--

CREATE TABLE `atendimento` (
  `id` int(10) UNSIGNED NOT NULL,
  `animal` int(10) UNSIGNED DEFAULT NULL,
  `nomeV` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detAtendimento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dataA` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `atendimento`
--

INSERT INTO `atendimento` (`id`, `animal`, `nomeV`, `detAtendimento`, `dataA`, `created_at`, `updated_at`) VALUES
(2, 7, 'Laura de Alcantra', 'Banho e tosa.', '2018-05-31', '2018-05-23 07:06:39', '2018-05-24 01:11:53'),
(3, 8, 'Maria de Jesus', '123123123123', '2018-05-24', '2018-05-25 03:31:48', '2018-05-25 03:31:48');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_05_17_040130_create_animals_table', 1),
(4, '2018_05_17_042335_create_tipos_table', 1),
(5, '2018_05_17_045134_update-animal', 1),
(6, '2018_05_19_183524_update_animal2', 1),
(7, '2018_05_19_222119_create_atendimentos_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos`
--

CREATE TABLE `tipos` (
  `id` int(10) UNSIGNED NOT NULL,
  `descricao` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tipos`
--

INSERT INTO `tipos` (`id`, `descricao`, `created_at`, `updated_at`) VALUES
(1, 'Cachorro', '2018-05-20 05:59:37', '2018-05-20 05:59:37'),
(2, 'Lagarto', '2018-05-20 06:02:49', '2018-05-20 06:02:49'),
(3, 'Passáro', '2018-05-23 06:58:39', '2018-05-23 06:58:39'),
(4, 'Gato', '2018-05-23 06:58:54', '2018-05-23 06:58:54'),
(5, 'Cachoooorro', '2018-05-25 03:28:30', '2018-05-25 03:28:30');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Maria Aparecida', 'maria@hotmail.com', '$2y$10$Bzj.FHVvvkRHWJgw1d4S9OXHSTuXIyP3m4dNM03UWxgMVc8.HFbsG', 'toto', '2018-05-20 05:58:15', '2018-05-20 05:58:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `animal_tipo_foreign` (`tipo`);

--
-- Indexes for table `atendimento`
--
ALTER TABLE `atendimento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `atendimento_animal_foreign` (`animal`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animal`
--
ALTER TABLE `animal`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `atendimento`
--
ALTER TABLE `atendimento`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tipos`
--
ALTER TABLE `tipos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `animal_tipo_foreign` FOREIGN KEY (`tipo`) REFERENCES `tipos` (`id`);

--
-- Limitadores para a tabela `atendimento`
--
ALTER TABLE `atendimento`
  ADD CONSTRAINT `atendimento_animal_foreign` FOREIGN KEY (`animal`) REFERENCES `animal` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
