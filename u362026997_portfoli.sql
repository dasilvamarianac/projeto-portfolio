-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 04-Dez-2019 às 00:31
-- Versão do servidor: 10.2.27-MariaDB
-- versão do PHP: 7.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `u362026997_portfoli`
--
CREATE DATABASE IF NOT EXISTS `u362026997_portfoli` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `u362026997_portfoli`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `indicators`
--

DROP TABLE IF EXISTS `indicators`;
CREATE TABLE IF NOT EXISTS `indicators` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator` bigint(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `indicator_values`
--

DROP TABLE IF EXISTS `indicator_values`;
CREATE TABLE IF NOT EXISTS `indicator_values` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `indicator_project` bigint(20) NOT NULL,
  `value` double(8,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `metrics`
-- (Veja abaixo para a view atual)
--
DROP VIEW IF EXISTS `metrics`;
CREATE TABLE IF NOT EXISTS `metrics` (
`max` double(8,2)
,`min` double(8,2)
,`med` double(19,2)
,`percent` decimal(27,2)
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profile` int(11) NOT NULL,
  `users` int(11) NOT NULL,
  `permissions` int(11) NOT NULL,
  `indicators` int(11) NOT NULL,
  `members` int(11) NOT NULL,
  `projects` int(11) NOT NULL,
  `project_detail` int(11) NOT NULL,
  `project_member` int(11) NOT NULL,
  `project_indicators` int(11) NOT NULL,
  `status_change` int(11) NOT NULL,
  `indicator_value` int(11) NOT NULL,
  `reports` int(11) NOT NULL,
  `progress` int(11) NOT NULL,
  `analysis` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `progresses`
--

DROP TABLE IF EXISTS `progresses`;
CREATE TABLE IF NOT EXISTS `progresses` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `project` bigint(20) NOT NULL,
  `user` bigint(20) NOT NULL,
  `status` int(11) NOT NULL,
  `inform` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `budget` double(8,2) NOT NULL,
  `scope` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date NOT NULL,
  `expected_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `leader` bigint(20) NOT NULL,
  `manager` bigint(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `risk` int(11) NOT NULL,
  `office_leader` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `project_indicators`
--

DROP TABLE IF EXISTS `project_indicators`;
CREATE TABLE IF NOT EXISTS `project_indicators` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `project` bigint(20) NOT NULL,
  `indicator` bigint(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `max_value` double(8,2) NOT NULL,
  `min_value` double(8,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `project_members`
--

DROP TABLE IF EXISTS `project_members`;
CREATE TABLE IF NOT EXISTS `project_members` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `member` bigint(20) NOT NULL,
  `project` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_changes`
--

DROP TABLE IF EXISTS `status_changes`;
CREATE TABLE IF NOT EXISTS `status_changes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `project` bigint(20) NOT NULL,
  `responsible` bigint(20) NOT NULL,
  `status` int(11) NOT NULL,
  `justification` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` int(11) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `v_cancellations`
-- (Veja abaixo para a view atual)
--
DROP VIEW IF EXISTS `v_cancellations`;
CREATE TABLE IF NOT EXISTS `v_cancellations` (
`date` varchar(40)
,`name` varchar(255)
,`justification` text
,`resp` varchar(255)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `v_changes`
-- (Veja abaixo para a view atual)
--
DROP VIEW IF EXISTS `v_changes`;
CREATE TABLE IF NOT EXISTS `v_changes` (
`date` varchar(40)
,`status_name` varchar(17)
,`status_color` varchar(9)
,`name` varchar(255)
,`project` bigint(20)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `v_indicator_values`
-- (Veja abaixo para a view atual)
--
DROP VIEW IF EXISTS `v_indicator_values`;
CREATE TABLE IF NOT EXISTS `v_indicator_values` (
`id` bigint(20) unsigned
,`project` bigint(20)
,`name` varchar(255)
,`max_value` double(8,2)
,`min_value` double(8,2)
,`status_name` varchar(17)
,`date` varchar(40)
,`value` double(8,2)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `v_outindicators`
-- (Veja abaixo para a view atual)
--
DROP VIEW IF EXISTS `v_outindicators`;
CREATE TABLE IF NOT EXISTS `v_outindicators` (
`name` varchar(255)
,`date` varchar(40)
,`status_name` varchar(17)
,`status` int(11)
,`project` bigint(20)
,`value` double(8,2)
,`max_value` double(8,2)
,`min_value` double(8,2)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `v_project`
-- (Veja abaixo para a view atual)
--
DROP VIEW IF EXISTS `v_project`;
CREATE TABLE IF NOT EXISTS `v_project` (
`id` bigint(20) unsigned
,`datec` varchar(40)
,`dateu` varchar(40)
,`dates` varchar(40)
,`datee` varchar(40)
,`datep` varchar(40)
,`created_at` timestamp
,`updated_at` timestamp
,`name` varchar(255)
,`desc` text
,`budget` double(8,2)
,`scope` varchar(255)
,`start_date` date
,`expected_date` date
,`end_date` date
,`leader` bigint(20)
,`manager` bigint(20)
,`status` int(11)
,`risk` int(11)
,`office_leader` bigint(20)
,`office_leader_name` varchar(255)
,`manager_name` varchar(255)
,`leader_name` varchar(255)
,`risk_name` varchar(5)
,`status_name` varchar(17)
,`status_color` varchar(9)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `v_projectindicators`
-- (Veja abaixo para a view atual)
--
DROP VIEW IF EXISTS `v_projectindicators`;
CREATE TABLE IF NOT EXISTS `v_projectindicators` (
`id` bigint(20) unsigned
,`created_at` timestamp
,`updated_at` timestamp
,`project` bigint(20)
,`indicator` bigint(20)
,`status` int(11)
,`max_value` double(8,2)
,`min_value` double(8,2)
,`name` varchar(255)
,`date` varchar(40)
,`status_name` varchar(17)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `v_project_indicator`
-- (Veja abaixo para a view atual)
--
DROP VIEW IF EXISTS `v_project_indicator`;
CREATE TABLE IF NOT EXISTS `v_project_indicator` (
`project` bigint(20)
,`name` varchar(255)
,`max_value` double(8,2)
,`min_value` double(8,2)
,`status_name` varchar(17)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `v_users`
-- (Veja abaixo para a view atual)
--
DROP VIEW IF EXISTS `v_users`;
CREATE TABLE IF NOT EXISTS `v_users` (
`id` bigint(20) unsigned
,`name` varchar(255)
,`email` varchar(255)
,`profile` int(11)
,`email_verified_at` timestamp
,`password` varchar(255)
,`status` tinyint(1)
,`remember_token` varchar(100)
,`created_at` timestamp
,`updated_at` timestamp
,`profiledesc` varchar(19)
);

-- --------------------------------------------------------

--
-- Estrutura para vista `metrics`
--
DROP TABLE IF EXISTS `metrics`;

CREATE ALGORITHM=UNDEFINED DEFINER=`u362026997_admin`@`%` SQL SECURITY DEFINER VIEW `metrics`  AS  select `met`.`max` AS `max`,`met`.`min` AS `min`,`met`.`med` AS `med`,`por`.`percent` AS `percent` from ((select max(`indicator_values`.`value`) AS `max`,min(`indicator_values`.`value`) AS `min`,round(avg(`indicator_values`.`value`),2) AS `med` from `indicator_values`) `met` join (select (1 - round(`o`.`out` / `a`.`all`,2)) * 100 AS `percent` from ((select count(0) AS `out` from ((`indicator_values` `iv` join `project_indicators` `p`) join `indicators` `i`) where `p`.`id` = `iv`.`indicator_project` and `i`.`id` = `p`.`indicator` and (`iv`.`value` > `p`.`max_value` or `iv`.`value` < `p`.`min_value`)) `o` join (select count(0) AS `all` from ((`indicator_values` `iv` join `project_indicators` `p`) join `indicators` `i`) where `p`.`id` = `iv`.`indicator_project` and `i`.`id` = `p`.`indicator`) `a`)) `por`) ;

-- --------------------------------------------------------

--
-- Estrutura para vista `v_cancellations`
--
DROP TABLE IF EXISTS `v_cancellations`;

CREATE ALGORITHM=UNDEFINED DEFINER=`u362026997_admin`@`%` SQL SECURITY DEFINER VIEW `v_cancellations`  AS  select distinct date_format(`s`.`created_at`,'%d-%b-%Y') AS `date`,`p`.`name` AS `name`,`s`.`justification` AS `justification`,`u`.`name` AS `resp` from ((`status_changes` `s` join `projects` `p`) join `users` `u`) where `p`.`id` = `s`.`project` and `s`.`responsible` = `u`.`id` and `s`.`status` = 9 and week(curdate(),3) = week(`s`.`created_at`,3) ;

-- --------------------------------------------------------

--
-- Estrutura para vista `v_changes`
--
DROP TABLE IF EXISTS `v_changes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`u362026997_admin`@`%` SQL SECURITY DEFINER VIEW `v_changes`  AS  select date_format(`s`.`created_at`,'%d-%b-%Y') AS `date`,case `s`.`status` when 1 then 'Em Cadastro' when 2 then 'Em Análise' when 3 then 'Análise Realizada' when 4 then 'Análise Aprovada' when 5 then 'Iniciado' when 6 then 'Planejado' when 7 then 'Em Andamento' when 8 then 'Encerrado' when 9 then 'Cancelado' end AS `status_name`,case `s`.`status` when 1 then 'warning' when 2 then 'secondary' when 3 then 'secondary' when 4 then 'secondary' when 5 then 'secondary' when 6 then 'secondary' when 7 then 'secondary' when 8 then 'success' when 9 then 'danger' end AS `status_color`,`u`.`name` AS `name`,`s`.`project` AS `project` from (`status_changes` `s` join `members` `u`) where `u`.`id` = `s`.`responsible` order by `s`.`status` desc ;

-- --------------------------------------------------------

--
-- Estrutura para vista `v_indicator_values`
--
DROP TABLE IF EXISTS `v_indicator_values`;

CREATE ALGORITHM=UNDEFINED DEFINER=`u362026997_admin`@`%` SQL SECURITY DEFINER VIEW `v_indicator_values`  AS  select `i`.`id` AS `id`,`pi`.`project` AS `project`,`i`.`name` AS `name`,`pi`.`max_value` AS `max_value`,`pi`.`min_value` AS `min_value`,case `pi`.`status` when 2 then 'Em Análise' when 3 then 'Análise Realizada' when 4 then 'Análise Aprovada' when 5 then 'Iniciado' when 6 then 'Planejado' when 7 then 'Em Andamento' end AS `status_name`,date_format(`iv`.`created_at`,'%d-%b-%Y') AS `date`,`iv`.`value` AS `value` from ((`project_indicators` `pi` join `indicators` `i`) join `indicator_values` `iv`) where `i`.`id` = `pi`.`indicator` and `pi`.`id` = `iv`.`indicator_project` ;

-- --------------------------------------------------------

--
-- Estrutura para vista `v_outindicators`
--
DROP TABLE IF EXISTS `v_outindicators`;

CREATE ALGORITHM=UNDEFINED DEFINER=`u362026997_admin`@`%` SQL SECURITY DEFINER VIEW `v_outindicators`  AS  select `ii`.`name` AS `name`,date_format(`v`.`created_at`,'%d-%b-%Y') AS `date`,case `i`.`status` when 1 then 'Em Cadastro' when 2 then 'Em Análise' when 3 then 'Análise Realizada' when 4 then 'Análise Aprovada' when 5 then 'Iniciado' when 6 then 'Planejado' when 7 then 'Em Andamento' when 8 then 'Encerrado' when 9 then 'Cancelado' end AS `status_name`,`i`.`status` AS `status`,`i`.`project` AS `project`,`v`.`value` AS `value`,`i`.`max_value` AS `max_value`,`i`.`min_value` AS `min_value` from ((`indicator_values` `v` join `project_indicators` `i`) join `indicators` `ii`) where `i`.`id` = `v`.`indicator_project` and (`v`.`value` < `i`.`min_value` or `v`.`value` > `i`.`max_value`) and `ii`.`id` = `i`.`indicator` order by `ii`.`name`,`v`.`created_at` ;

-- --------------------------------------------------------

--
-- Estrutura para vista `v_project`
--
DROP TABLE IF EXISTS `v_project`;

CREATE ALGORITHM=UNDEFINED DEFINER=`u362026997_admin`@`%` SQL SECURITY DEFINER VIEW `v_project`  AS  select distinct `p`.`id` AS `id`,date_format(`p`.`created_at`,'%d-%b-%Y') AS `datec`,date_format(`p`.`updated_at`,'%d-%b-%Y') AS `dateu`,date_format(`p`.`start_date`,'%d-%b-%Y') AS `dates`,date_format(`p`.`end_date`,'%d-%b-%Y') AS `datee`,date_format(`p`.`expected_date`,'%d-%b-%Y') AS `datep`,`p`.`created_at` AS `created_at`,`p`.`updated_at` AS `updated_at`,`p`.`name` AS `name`,`p`.`desc` AS `desc`,`p`.`budget` AS `budget`,`p`.`scope` AS `scope`,`p`.`start_date` AS `start_date`,`p`.`expected_date` AS `expected_date`,`p`.`end_date` AS `end_date`,`p`.`leader` AS `leader`,`p`.`manager` AS `manager`,`p`.`status` AS `status`,`p`.`risk` AS `risk`,`p`.`office_leader` AS `office_leader`,`u`.`name` AS `office_leader_name`,`m`.`manager` AS `manager_name`,`l`.`leader` AS `leader_name`,case `p`.`risk` when 0 then 'Baixo' when 1 then 'Médio' when 2 then 'Alto' end AS `risk_name`,case `p`.`status` when 1 then 'Em Cadastro' when 2 then 'Em Análise' when 3 then 'Análise Realizada' when 4 then 'Análise Aprovada' when 5 then 'Iniciado' when 6 then 'Planejado' when 7 then 'Em Andamento' when 8 then 'Encerrado' when 9 then 'Cancelado' end AS `status_name`,case `p`.`status` when 1 then 'warning' when 2 then 'secondary' when 3 then 'secondary' when 4 then 'secondary' when 5 then 'secondary' when 6 then 'secondary' when 7 then 'secondary' when 8 then 'success' when 9 then 'danger' end AS `status_color` from (((`projects` `p` join `users` `u`) join (select `u`.`name` AS `manager`,`u`.`id` AS `id` from (`users` `u` join `projects` `p`) where `u`.`id` = `p`.`manager`) `m`) join (select `u`.`name` AS `leader`,`u`.`id` AS `id` from (`users` `u` join `projects` `p`) where `u`.`id` = `p`.`leader`) `l`) where `p`.`office_leader` = `u`.`id` and `p`.`status` <> 0 and `p`.`manager` = `m`.`id` and `p`.`leader` = `l`.`id` order by `p`.`status`,`p`.`start_date` ;

-- --------------------------------------------------------

--
-- Estrutura para vista `v_projectindicators`
--
DROP TABLE IF EXISTS `v_projectindicators`;

CREATE ALGORITHM=UNDEFINED DEFINER=`u362026997_admin`@`%` SQL SECURITY DEFINER VIEW `v_projectindicators`  AS  select `p`.`id` AS `id`,`p`.`created_at` AS `created_at`,`p`.`updated_at` AS `updated_at`,`p`.`project` AS `project`,`p`.`indicator` AS `indicator`,`p`.`status` AS `status`,`p`.`max_value` AS `max_value`,`p`.`min_value` AS `min_value`,`i`.`name` AS `name`,date_format(`p`.`created_at`,'%d-%b-%Y') AS `date`,case `p`.`status` when 1 then 'Em Cadastro' when 2 then 'Em Análise' when 3 then 'Análise Realizada' when 4 then 'Análise Aprovada' when 5 then 'Iniciado' when 6 then 'Planejado' when 7 then 'Em Andamento' when 8 then 'Encerrado' when 9 then 'Cancelado' end AS `status_name` from (`project_indicators` `p` join `indicators` `i`) where `p`.`indicator` = `i`.`id` order by `p`.`status`,`i`.`name` ;

-- --------------------------------------------------------

--
-- Estrutura para vista `v_project_indicator`
--
DROP TABLE IF EXISTS `v_project_indicator`;

CREATE ALGORITHM=UNDEFINED DEFINER=`u362026997_admin`@`%` SQL SECURITY DEFINER VIEW `v_project_indicator`  AS  select `pi`.`project` AS `project`,`i`.`name` AS `name`,`pi`.`max_value` AS `max_value`,`pi`.`min_value` AS `min_value`,case `pi`.`status` when 2 then 'Em Análise' when 3 then 'Análise Realizada' when 4 then 'Análise Aprovada' when 5 then 'Iniciado' when 6 then 'Planejado' when 7 then 'Em Andamento' end AS `status_name` from (`project_indicators` `pi` join `indicators` `i`) where `i`.`id` = `pi`.`indicator` ;

-- --------------------------------------------------------

--
-- Estrutura para vista `v_users`
--
DROP TABLE IF EXISTS `v_users`;

CREATE ALGORITHM=UNDEFINED DEFINER=`u362026997_admin`@`127.0.0.1` SQL SECURITY DEFINER VIEW `v_users`  AS  select `users`.`id` AS `id`,`users`.`name` AS `name`,`users`.`email` AS `email`,`users`.`profile` AS `profile`,`users`.`email_verified_at` AS `email_verified_at`,`users`.`password` AS `password`,`users`.`status` AS `status`,`users`.`remember_token` AS `remember_token`,`users`.`created_at` AS `created_at`,`users`.`updated_at` AS `updated_at`,case when `users`.`profile` = 0 then 'Administrador' when `users`.`profile` = 1 then 'Gerente' when `users`.`profile` = 2 then 'Líder de Projeto' when `users`.`profile` = 3 then 'Líder de Escritório' when `users`.`profile` = 4 then 'Alta Diretoria' else 'Membro' end AS `profiledesc` from `users` order by `users`.`name` ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
