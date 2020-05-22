-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  Dim 15 sep. 2019 à 22:34
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.3.3

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données :  `khemetic_new`
--

-- --------------------------------------------------------

--
-- Structure de la table `backgrounds`
--

DROP TABLE IF EXISTS `backgrounds`;
CREATE TABLE IF NOT EXISTS `backgrounds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `type` varchar(10) NOT NULL,
  `page` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `backgrounds`
--

INSERT INTO `backgrounds` (`id`, `image`, `type`, `page`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '5c714c203b872_1550928928.jpg', 'jpg', 1, '2019-02-23 12:35:28', '2019-02-23 12:35:28', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `blog_etc_categories`
--

DROP TABLE IF EXISTS `blog_etc_categories`;
CREATE TABLE IF NOT EXISTS `blog_etc_categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_description` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_by` int(10) UNSIGNED DEFAULT NULL COMMENT 'user id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `blog_etc_categories_slug_unique` (`slug`),
  KEY `blog_etc_categories_created_by_index` (`created_by`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `blog_etc_categories`
--

INSERT INTO `blog_etc_categories` (`id`, `category_name`, `slug`, `category_description`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'The church', 'the-church', 'this categorie is concerning the church', NULL, '2019-02-03 09:53:38', '2019-02-03 09:53:38');

-- --------------------------------------------------------

--
-- Structure de la table `blog_etc_comments`
--

DROP TABLE IF EXISTS `blog_etc_comments`;
CREATE TABLE IF NOT EXISTS `blog_etc_comments` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `blog_etc_post_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'if user was logged in',
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'if enabled in the config file',
  `author_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'if not logged in',
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'the comment body',
  `approved` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `author_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `blog_etc_comments_blog_etc_post_id_index` (`blog_etc_post_id`),
  KEY `blog_etc_comments_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `blog_etc_posts`
--

DROP TABLE IF EXISTS `blog_etc_posts`;
CREATE TABLE IF NOT EXISTS `blog_etc_posts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'New blog post',
  `subtitle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `meta_desc` text COLLATE utf8mb4_unicode_ci,
  `post_body` mediumtext COLLATE utf8mb4_unicode_ci,
  `use_view_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'should refer to a blade file in /views/',
  `posted_at` datetime DEFAULT NULL COMMENT 'Public posted at time, if this is in future then it wont appear yet',
  `is_published` tinyint(1) NOT NULL DEFAULT '1',
  `image_large` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_medium` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_thumbnail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `seo_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `blog_etc_posts_slug_unique` (`slug`),
  KEY `blog_etc_posts_user_id_index` (`user_id`),
  KEY `blog_etc_posts_posted_at_index` (`posted_at`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `blog_etc_posts`
--

INSERT INTO `blog_etc_posts` (`id`, `user_id`, `slug`, `title`, `subtitle`, `meta_desc`, `post_body`, `use_view_file`, `posted_at`, `is_published`, `image_large`, `image_medium`, `image_thumbnail`, `created_at`, `updated_at`, `short_description`, `seo_title`) VALUES
(1, 1, 'khemetic', 'KHEMETIC CHURCH', 'Presentation and vision', 'presentation of khemetic church and his vision', '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>', NULL, '2019-02-03 10:47:22', 1, 'khemetic-church-1000x700.jpg', 'khemetic-church-600x400.jpg', 'khemetic-church-150x150.jpg', '2019-02-03 09:54:25', '2019-02-03 09:54:25', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'khemetic church, presentation, vision'),
(2, 1, 'KhemeticSecondPost', 'Khemetic Second post', 'Khemetic Second Post', 'dignissimos ducimus qui blanditiis praesentium voluptatumdignissimos ducimus qui blanditiis praesentium voluptatumdignissimos ducimus qui blanditiis praesentium voluptatumdignissimos ducimus qui blanditiis praesentium voluptatumdignissimos ducimus qui blanditiis praesentium voluptatum', '<h1><strong>At vero eos et accusamus</strong></h1>\r\n\r\n<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.&nbsp;At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.&nbsp;</p>\r\n\r\n<h2>expedita distinctio</h2>\r\n\r\n<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.&nbsp;At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', NULL, '2019-02-03 10:59:51', 1, 'khemetic-second-post-urcdo-1000x700.jpg', 'khemetic-second-post-wu9lh-600x400.jpg', 'khemetic-second-post-eq6vq-150x150.jpg', '2019-02-03 10:06:07', '2019-02-21 16:16:14', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.', 'dignissimos, ducimus, qui blanditiis, praesentium, voluptatum,');

-- --------------------------------------------------------

--
-- Structure de la table `blog_etc_post_categories`
--

DROP TABLE IF EXISTS `blog_etc_post_categories`;
CREATE TABLE IF NOT EXISTS `blog_etc_post_categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `blog_etc_post_id` int(10) UNSIGNED NOT NULL,
  `blog_etc_category_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `blog_etc_post_categories_blog_etc_post_id_index` (`blog_etc_post_id`),
  KEY `blog_etc_post_categories_blog_etc_category_id_index` (`blog_etc_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `blog_etc_post_categories`
--

INSERT INTO `blog_etc_post_categories` (`id`, `blog_etc_post_id`, `blog_etc_category_id`) VALUES
(1, 1, 1),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `blog_etc_uploaded_photos`
--

DROP TABLE IF EXISTS `blog_etc_uploaded_photos`;
CREATE TABLE IF NOT EXISTS `blog_etc_uploaded_photos` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uploaded_images` text COLLATE utf8mb4_unicode_ci,
  `image_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unknown',
  `uploader_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `blog_etc_uploaded_photos_uploader_id_index` (`uploader_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `blog_etc_uploaded_photos`
--

INSERT INTO `blog_etc_uploaded_photos` (`id`, `uploaded_images`, `image_title`, `source`, `uploader_id`, `created_at`, `updated_at`) VALUES
(1, '{\"image_large\":{\"filename\":\"khemetic-church-1000x700.jpg\",\"w\":1000,\"h\":700},\"image_medium\":{\"filename\":\"khemetic-church-600x400.jpg\",\"w\":600,\"h\":400},\"image_thumbnail\":{\"filename\":\"khemetic-church-150x150.jpg\",\"w\":150,\"h\":150}}', NULL, 'BlogFeaturedImage', NULL, '2019-02-03 09:54:24', '2019-02-03 09:54:24'),
(2, '{\"image_large\":{\"filename\":\"khemetic-second-post-1000x700.jpg\",\"w\":1000,\"h\":700},\"image_medium\":{\"filename\":\"khemetic-second-post-600x400.jpg\",\"w\":600,\"h\":400},\"image_thumbnail\":{\"filename\":\"khemetic-second-post-150x150.jpg\",\"w\":150,\"h\":150}}', NULL, 'BlogFeaturedImage', NULL, '2019-02-03 10:08:25', '2019-02-03 10:08:25'),
(3, '{\"image_large\":{\"filename\":\"khemetic-second-post-urcdo-1000x700.jpg\",\"w\":1000,\"h\":700},\"image_medium\":{\"filename\":\"khemetic-second-post-wu9lh-600x400.jpg\",\"w\":600,\"h\":400},\"image_thumbnail\":{\"filename\":\"khemetic-second-post-eq6vq-150x150.jpg\",\"w\":150,\"h\":150}}', NULL, 'BlogFeaturedImage', NULL, '2019-02-21 16:16:13', '2019-02-21 16:16:13');

-- --------------------------------------------------------

--
-- Structure de la table `calendars`
--

DROP TABLE IF EXISTS `calendars`;
CREATE TABLE IF NOT EXISTS `calendars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `day` date NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `calendars`
--

INSERT INTO `calendars` (`id`, `title`, `description`, `day`, `image`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Alice', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Alice Lorem ipsum dolor sit amet, consectetur adipiscing elit. AliceLorem ipsum dolor sit amet, consectetur adipiscing elit. AliceLorem ipsum dolor sit amet, consectetur adipiscing elit. Alice', '2019-05-16', 'moon-half-left.png', 1, '2019-05-10 20:07:33', '2019-05-12 18:20:13', NULL),
(2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Alice 31', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. \r\n\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '2019-05-31', 'moon-white.png', 1, '2019-05-10 20:12:01', '2019-05-12 18:20:51', NULL),
(3, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing April', '2019-04-01', NULL, 1, '2019-05-10 20:28:14', '2019-05-10 20:28:14', NULL),
(4, NULL, 'i am checking new even in the calendar', '2019-05-08', NULL, 1, '2019-05-11 16:07:48', '2019-05-11 16:07:48', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'default', '2019-02-26 11:09:09', '2019-02-26 11:09:09', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Kings', 'test1@khemetic.com', 'i am writing to Khemetic support 2', '2019-02-16 19:35:49', '2019-02-16 19:37:54', NULL),
(2, NULL, NULL, 'i\'m testing small message to the khemetic support', '2019-02-16 20:32:35', '2019-02-16 20:32:35', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `contact_adresses`
--

DROP TABLE IF EXISTS `contact_adresses`;
CREATE TABLE IF NOT EXISTS `contact_adresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact_adresses`
--

INSERT INTO `contact_adresses` (`id`, `email`, `tel`, `nom`, `prenom`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'test@test.com', '98456165', 'Watio', 'Alice', '2019-02-06 19:34:49', '2019-02-06 19:37:26', '2019-02-06 19:37:26'),
(2, 'test@test.com', '98456165', 'Watio', 'Alice', '2019-02-06 19:34:51', '2019-02-06 19:34:51', NULL),
(3, 'test@test.com', '89415614', 'Watio', 'Alice', '2019-02-06 19:35:59', '2019-02-06 19:35:59', NULL),
(4, 'test34@dixandmeet.com', '8465165615', 'Watio', 'voila', '2019-02-06 20:43:53', '2019-02-06 20:43:53', NULL),
(5, 'test@test.com', '7879654123', 'Watio', 'Alice', '2019-02-06 20:47:33', '2019-02-06 20:47:33', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `downloads`
--

DROP TABLE IF EXISTS `downloads`;
CREATE TABLE IF NOT EXISTS `downloads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `page` int(11) NOT NULL,
  `fichier` varchar(255) NOT NULL,
  `auth` tinyint(1) NOT NULL DEFAULT '1',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `type` varchar(10) DEFAULT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `downloads`
--

INSERT INTO `downloads` (`id`, `title`, `subtitle`, `page`, `fichier`, `auth`, `active`, `type`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, NULL, 1, '5c5b0c00dea69_1549470720.pdf', 1, 0, 'pdf', 'je laisse une description', '2019-02-06 13:45:20', '2019-02-06 16:41:32', NULL),
(2, NULL, NULL, 1, '5c5b0834b672e_1549469748.mp4', 1, 1, 'mp4', 'i put another description  updated', '2019-02-06 15:15:48', '2019-02-06 20:24:07', NULL),
(3, 'The title', 'The SubTitle', 2, '5c5b4a74b2fea_1549486708.jpg', 1, 1, 'jpg', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.', '2019-02-06 19:58:28', '2019-02-06 20:24:37', NULL),
(4, 'The title 2', 'The SubTitle2', 2, '5c5b539fbf9b9_1549489055.jpg', 0, 1, 'jpg', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. 2', '2019-02-06 20:37:35', '2019-02-06 20:41:07', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `feedbacks`
--

DROP TABLE IF EXISTS `feedbacks`;
CREATE TABLE IF NOT EXISTS `feedbacks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `subjet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_fgk_1` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `user_id`, `subjet`, `page`, `content`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, 'User feedback form page HOME', 'HOME', 'I live my feedBack concerning the home page', '2019-05-27 11:13:36', '2019-05-27 11:13:36', NULL),
(2, 4, 'User feedback form page HOME', 'HOME', 'I live my feedBack concerning the home page', '2019-05-27 11:13:58', '2019-05-27 11:13:58', NULL),
(3, 4, 'User feedback form page CALENDAR', 'CALENDAR', 'this is my second feedback, from calendar page', '2019-05-27 11:57:17', '2019-05-27 11:57:17', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `languages`
--

DROP TABLE IF EXISTS `languages`;
CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `abbr` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `script` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `native` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `default` tinyint(3) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `languages`
--

INSERT INTO `languages` (`id`, `name`, `flag`, `abbr`, `script`, `native`, `active`, `default`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'English', NULL, 'en', 'Latn', 'English', 1, 1, NULL, NULL, NULL),
(2, 'Romanian', '', 'ro', 'Latn', 'română', 1, 0, NULL, NULL, NULL),
(3, 'French', NULL, 'fr', 'Latn', 'français', 1, NULL, NULL, '2019-02-09 07:35:47', NULL),
(4, 'Italian', '', 'it', 'Latn', 'italiano', 0, 0, NULL, NULL, NULL),
(5, 'Spanish', '', 'es', 'Latn', 'español', 0, 0, NULL, NULL, NULL),
(6, 'German', '', 'de', 'Latn', 'Deutsch', 0, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `langues`
--

DROP TABLE IF EXISTS `langues`;
CREATE TABLE IF NOT EXISTS `langues` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code2` varchar(8) DEFAULT NULL,
  `code4` varchar(8) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `drapeau` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom_UNIQUE` (`nom`),
  UNIQUE KEY `code2_UNIQUE` (`code2`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `langues`
--

INSERT INTO `langues` (`id`, `code2`, `code4`, `nom`, `description`, `drapeau`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'fr', 'fr_fr', 'Français', 'français de france', 'fr.png', '2018-09-05 22:00:00', '2018-09-05 22:00:00', NULL),
(2, 'en', 'en_en', 'English', 'British English', 'en.png', '2018-09-07 22:00:00', '2018-09-07 22:00:00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `laravel_fulltext`
--

DROP TABLE IF EXISTS `laravel_fulltext`;
CREATE TABLE IF NOT EXISTS `laravel_fulltext` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `indexable_id` int(11) NOT NULL,
  `indexable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `indexed_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `indexed_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `laravel_fulltext_indexable_type_indexable_id_unique` (`indexable_type`,`indexable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `laravel_fulltext`
--

INSERT INTO `laravel_fulltext` (`id`, `indexable_id`, `indexable_type`, `indexed_title`, `indexed_content`, `created_at`, `updated_at`) VALUES
(1, 2, 'WebDevEtc\\BlogEtc\\Models\\BlogEtcPost', 'Khemetic Second post Khemetic Second Post dignissimos, ducimus, qui blanditiis, praesentium, voluptatum,', '<h1><strong>At vero eos et accusamus</strong></h1>\r\n\r\n<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.&nbsp;At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.&nbsp;</p>\r\n\r\n<h2>expedita distinctio</h2>\r\n\r\n<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.&nbsp;At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.&nbsp;</p>\r\n\r\n<p>&nbsp;</p> At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. dignissimos ducimus qui blanditiis praesentium voluptatumdignissimos ducimus qui blanditiis praesentium voluptatumdignissimos ducimus qui blanditiis praesentium voluptatumdignissimos ducimus qui blanditiis praesentium voluptatumdignissimos ducimus qui blanditiis praesentium voluptatum', '2019-02-03 10:06:08', '2019-02-03 10:06:08');

-- --------------------------------------------------------

--
-- Structure de la table `medias`
--

DROP TABLE IF EXISTS `medias`;
CREATE TABLE IF NOT EXISTS `medias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categorie_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `fichier` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `type` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categorie_id` (`categorie_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `medias`
--

INSERT INTO `medias` (`id`, `categorie_id`, `name`, `fichier`, `image`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'first video', '5c7684d82fb69_1551271128.mp4', '5c77f06d9c111_1551364205.jpg', 'mp4', '2019-02-27 11:38:48', '2019-02-28 13:30:05', NULL),
(2, 1, 'first video', '5c768530d50d4_1551271216.mp4', '5c77f07ef1e71_1551364222.jpg', 'mp4', '2019-02-27 11:40:16', '2019-02-28 13:30:22', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `media_associers`
--

DROP TABLE IF EXISTS `media_associers`;
CREATE TABLE IF NOT EXISTS `media_associers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `media_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `fichier` varchar(255) NOT NULL,
  `type` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `media_id` (`media_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `media_associers`
--

INSERT INTO `media_associers` (`id`, `media_id`, `name`, `fichier`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'First video - new image', '5c76bbecf2a9a_1551285228.jpg', 'jpg', '2019-02-27 11:38:48', '2019-02-27 15:33:49', NULL),
(2, 2, 'first video - image', '5c7685310ae70_1551271217.jpg', 'jpg', '2019-02-27 11:40:17', '2019-02-27 11:40:17', NULL),
(3, 2, 'first video - profile', '5c768531396d9_1551271217.jpg', 'jpg', '2019-02-27 11:40:17', '2019-02-27 11:40:17', NULL),
(4, 1, 'Some music', '5c77f4447094e_1551365188.mp3', 'mp3', '2019-02-28 13:46:28', '2019-02-28 13:46:28', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_11_04_152913_create_laravel_fulltext_table', 1),
(4, '2018_05_28_224023_create_blog_etc_posts_table', 1),
(5, '2018_09_16_224023_add_author_and_url_blog_etc_posts_table', 1),
(6, '2018_09_26_085711_add_short_desc_textrea_to_blog_etc', 1),
(7, '2018_09_27_122627_create_blog_etc_uploaded_photos_table', 1),
(8, '2015_09_07_190535_create_languages_table', 2),
(9, '2015_09_10_124414_alter_languages_table', 2);

-- --------------------------------------------------------

--
-- Structure de la table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\User', 1),
(5, 'App\\Models\\User', 3),
(5, 'App\\User', 3),
(5, 'App\\Models\\User', 4),
(5, 'App\\User', 4);

-- --------------------------------------------------------

--
-- Structure de la table `page_statics`
--

DROP TABLE IF EXISTS `page_statics`;
CREATE TABLE IF NOT EXISTS `page_statics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `page_statics`
--

INSERT INTO `page_statics` (`id`, `user_id`, `code`, `title`, `content`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'terms_conditions', 'Terms & Conditions', '<p>this is your terms and conditions page</p>\r\n\r\n<p>&nbsp;</p>', '2019-05-21 14:30:57', '2019-05-24 06:36:22', NULL),
(2, 1, 'about_us', 'About Us', '<p>About Us</p>', '2019-05-21 16:03:38', '2019-05-21 16:03:38', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'create admin', 'web', '2019-05-01 10:53:48', '2019-05-01 10:53:48'),
(2, 'manag blog', 'web', '2019-05-01 10:53:48', '2019-05-01 10:53:48'),
(3, 'manag wiki', 'web', '2019-05-01 10:53:48', '2019-05-01 10:53:48');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo` varchar(255) DEFAULT 'default.jpg',
  `title` varchar(255) DEFAULT NULL,
  `prix` decimal(10,2) DEFAULT '0.00',
  `redirect_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `photo`, `title`, `prix`, `redirect_link`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '5c59c425529e3_1549386789.jpg', 'Phone', '20.00', 'http://localhost/my_projects/Freelancer/xoheruox/public/', '2019-02-05 15:43:10', '2019-02-05 17:19:24', NULL),
(2, '5c59ca3abfdc0_1549388346.jpg', 'Frigo', '530.00', 'http://localhost/my_projects/Freelancer/xoheruox/public/shop', '2019-02-05 16:39:06', '2019-02-05 17:19:51', NULL),
(3, '5c59ca5d597db_1549388381.jpg', 'Tv', '250.00', 'http://localhost/my_projects/Freelancer/xoheruox/public/contact', '2019-02-05 16:39:41', '2019-02-05 17:20:07', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'web', '2019-05-01 10:53:48', '2019-05-01 10:53:48'),
(2, 'admin', 'web', '2019-05-01 10:53:49', '2019-05-01 10:53:49'),
(3, 'blog manager', 'web', '2019-05-01 10:53:49', '2019-05-01 10:53:49'),
(4, 'wiki manager', 'web', '2019-05-01 10:53:49', '2019-05-01 10:53:49'),
(5, 'user', 'web', '2019-05-01 10:53:49', '2019-05-01 10:53:49');

-- --------------------------------------------------------

--
-- Structure de la table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(2, 2),
(2, 3),
(3, 1),
(3, 2),
(3, 4);

-- --------------------------------------------------------

--
-- Structure de la table `school_accounts`
--

DROP TABLE IF EXISTS `school_accounts`;
CREATE TABLE IF NOT EXISTS `school_accounts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `school_accounts`
--

INSERT INTO `school_accounts` (`id`, `name`, `type`, `amount`, `description`, `school_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Prof. Lou Gaylord', 'expense', 4836, 'Sint illum aut hic nam laborum. Officiis quia consequatur enim corporis incidunt. Impedit ducimus deleniti autem amet dolorum.', 38, 17, '2019-06-01 14:35:37', '2019-06-01 14:35:37'),
(2, 'Polly Brakus', 'expense', 8055, 'Quis animi et cumque sunt molestias incidunt. Cupiditate vitae voluptatibus quia et. Quia autem voluptas hic et.', 3, 12, '2019-06-01 14:35:37', '2019-06-01 14:35:37'),
(3, 'Loraine Shields', 'income', 5268, 'Quia molestias ad eos. Tempora itaque ex aut optio consequuntur est. Ducimus doloribus sit aperiam.', 23, 15, '2019-06-01 14:35:37', '2019-06-01 14:35:37'),
(4, 'Urban Stoltenberg', 'income', 9487, 'Quae animi hic ut laboriosam ex laboriosam quidem. Dolorum sed enim aut est. Nam aut consectetur vel reiciendis hic quam odit aperiam.', 24, 18, '2019-06-01 14:35:37', '2019-06-01 14:35:37'),
(5, 'Hilario Bahringer DDS', 'expense', 4003, 'Vel ab dolor vel ea accusantium. Itaque et magnam corporis nisi non. Ratione dolor adipisci ut aliquid ut.', 45, 21, '2019-06-01 14:35:37', '2019-06-01 14:35:37'),
(6, 'Mrs. Roselyn Jacobs', 'income', 5023, 'Qui quia eos ratione velit atque qui. Quis optio dicta consequatur quaerat dignissimos odit. Et blanditiis saepe odit minima aperiam adipisci.', 20, 13, '2019-06-01 14:35:38', '2019-06-01 14:35:38'),
(7, 'Gillian Collins', 'income', 2397, 'Illo exercitationem sed consequuntur molestiae. Sapiente debitis molestias nostrum et. Commodi est et quae exercitationem consequatur.', 3, 20, '2019-06-01 14:35:38', '2019-06-01 14:35:38'),
(8, 'Renee Russel', 'income', 3786, 'Et quisquam vitae sed non pariatur. Iure et delectus amet illum ratione. Dolor ea mollitia aut.', 26, 17, '2019-06-01 14:35:38', '2019-06-01 14:35:38'),
(9, 'Timmy Ankunding III', 'expense', 7953, 'Earum iste harum dolorum hic impedit. Et ad sunt et. Nulla qui in quia est eius qui.', 32, 16, '2019-06-01 14:35:38', '2019-06-01 14:35:38'),
(10, 'Sincere Lynch', 'income', 8371, 'Quidem nihil voluptas expedita est ducimus quas quos. Cumque omnis aut quia soluta earum. Ut vel distinctio voluptate.', 13, 16, '2019-06-01 14:35:38', '2019-06-01 14:35:38'),
(11, 'Bryon Tremblay', 'income', 3130, 'Amet id ut et eaque distinctio. Alias libero tempore corrupti soluta similique numquam doloremque adipisci. Quos aliquam qui asperiores qui quia.', 45, 20, '2019-06-01 14:35:38', '2019-06-01 14:35:38'),
(12, 'Rodrigo Stoltenberg', 'income', 3012, 'Aut nemo aut qui iure aperiam. Optio qui dolorum eos nisi. Temporibus dignissimos molestiae corporis commodi harum exercitationem.', 39, 19, '2019-06-01 14:35:38', '2019-06-01 14:35:38'),
(13, 'Eric Glover', 'expense', 1395, 'Itaque et vero quam fugit. Ea ut aspernatur molestiae id voluptas. Porro enim ea suscipit ullam deleniti.', 37, 18, '2019-06-01 14:35:38', '2019-06-01 14:35:38'),
(14, 'Mrs. Alice Willms', 'expense', 2302, 'Eum itaque aut inventore sint omnis. Facilis repellat dolor quia dolores est. Ullam rerum nulla debitis aut voluptatum facere aperiam dolorem.', 20, 20, '2019-06-01 14:35:38', '2019-06-01 14:35:38'),
(15, 'Miss Leanna Powlowski IV', 'expense', 4003, 'Cumque at veniam dignissimos. Et omnis asperiores ea velit qui perferendis. Tempore consequatur possimus optio quam velit ullam.', 32, 19, '2019-06-01 14:35:38', '2019-06-01 14:35:38'),
(16, 'Mrs. Asia Bahringer IV', 'income', 562, 'Nihil repellat nulla optio repudiandae omnis. Mollitia quia repellat ex suscipit delectus fugiat. Temporibus eligendi consequatur ipsa distinctio atque non perferendis.', 44, 12, '2019-06-01 14:35:38', '2019-06-01 14:35:38'),
(17, 'Grace Schmidt', 'income', 6424, 'Et vel cum aut voluptatibus blanditiis vitae. Autem at nisi dicta eaque. Earum eveniet voluptas omnis praesentium quia.', 51, 14, '2019-06-01 14:35:38', '2019-06-01 14:35:38'),
(18, 'Dr. Aileen Gibson', 'income', 8134, 'Facilis qui doloribus amet sed tempora doloribus voluptates. Dolorem officia ut rerum reiciendis. Dolores consequuntur quas qui dolore voluptatum.', 19, 18, '2019-06-01 14:35:38', '2019-06-01 14:35:38'),
(19, 'Kailey Feest', 'income', 3162, 'Fugiat mollitia eum omnis sint labore sint sit. Ratione blanditiis vel est consequatur dolor. Nihil quia eum culpa.', 49, 21, '2019-06-01 14:35:38', '2019-06-01 14:35:38'),
(20, 'Tiara Shields', 'expense', 8779, 'Sequi consequatur explicabo omnis velit ea est non nulla. Sit laudantium error asperiores qui a. Voluptatem aut totam maiores et.', 50, 20, '2019-06-01 14:35:38', '2019-06-01 14:35:38'),
(21, 'Paige Klein', 'expense', 9375, 'Ea et at doloremque. Fugiat hic ut doloribus autem sunt iusto ut. Error voluptatem tenetur illum magnam quo beatae itaque.', 20, 12, '2019-06-01 14:35:38', '2019-06-01 14:35:38'),
(22, 'Makenna VonRueden Jr.', 'expense', 8833, 'Natus a et illo quo quia. Rerum numquam qui perferendis et ullam qui. Eos in maiores dignissimos nostrum.', 45, 12, '2019-06-01 14:35:38', '2019-06-01 14:35:38'),
(23, 'Janick White', 'income', 9183, 'Cupiditate magni quia similique itaque at quam dignissimos. Magni aperiam sint occaecati delectus velit vero quae. Itaque repellat quam et dicta fugit ipsum tenetur.', 4, 21, '2019-06-01 14:35:38', '2019-06-01 14:35:38'),
(24, 'Ellis Rohan DVM', 'income', 20, 'Sint praesentium aut omnis eos laborum sed. Aut numquam sit enim officiis quis et dicta enim. Saepe repellat sit doloremque laborum sunt.', 16, 17, '2019-06-01 14:35:39', '2019-06-01 14:35:39'),
(25, 'Eldora Corkery', 'income', 2803, 'Aut et quo deleniti occaecati maiores nobis exercitationem. Ex id aut voluptatem cum. Architecto porro doloribus aperiam inventore et libero quidem.', 29, 18, '2019-06-01 14:35:39', '2019-06-01 14:35:39'),
(26, 'Mr. Skylar Hahn', 'expense', 5148, 'Consequatur sapiente qui veritatis perferendis sint. Deserunt dolore sint et mollitia. Quia magnam sint culpa quia nulla impedit consequatur.', 4, 20, '2019-06-01 14:35:39', '2019-06-01 14:35:39'),
(27, 'Mrs. Hilma Beier MD', 'income', 234, 'Et occaecati ipsa labore alias. Enim culpa praesentium voluptas vel. Enim expedita dignissimos ab corporis.', 33, 12, '2019-06-01 14:35:39', '2019-06-01 14:35:39'),
(28, 'Moises Thiel DVM', 'expense', 8188, 'Magnam illum beatae corrupti eaque corrupti nesciunt. Aut sed consectetur dolorem amet. Voluptatibus quam suscipit placeat quibusdam magni tenetur.', 36, 17, '2019-06-01 14:35:39', '2019-06-01 14:35:39'),
(29, 'Mr. Triston Wehner', 'income', 9582, 'Nesciunt et eaque soluta voluptatem. Velit cupiditate rerum delectus nam necessitatibus maiores quam. Non et tempora ad est sed quisquam.', 45, 15, '2019-06-01 14:35:39', '2019-06-01 14:35:39'),
(30, 'Sophia Boyle IV', 'expense', 789, 'Doloribus quasi vel iusto facere fuga nisi. Quia culpa alias ex. Alias dolore dolorem blanditiis autem consequatur.', 45, 14, '2019-06-01 14:35:39', '2019-06-01 14:35:39'),
(31, 'Talon Klein', 'income', 1979, 'Nulla praesentium ut deleniti cum. Sed in consequatur alias blanditiis nam. Ut iste reprehenderit ut dicta suscipit tenetur voluptatem.', 28, 17, '2019-06-01 14:35:39', '2019-06-01 14:35:39'),
(32, 'Giovanna Osinski', 'income', 230, 'Amet consectetur eum aut culpa aut. Quam illo aut modi delectus dignissimos. Maiores eaque molestiae non modi.', 34, 20, '2019-06-01 14:35:39', '2019-06-01 14:35:39'),
(33, 'Dominic Walter', 'expense', 1739, 'At modi iste eum quis fugiat qui et eos. Ipsam nemo sunt veniam voluptatibus distinctio aut. Atque sed rerum et sed earum.', 5, 13, '2019-06-01 14:35:39', '2019-06-01 14:35:39'),
(34, 'Mrs. Layla Waelchi Sr.', 'expense', 8422, 'Doloribus ab iusto vitae quasi numquam adipisci sed quasi. Consequatur optio et autem temporibus est. Et quo commodi eos ipsam et exercitationem.', 21, 20, '2019-06-01 14:35:39', '2019-06-01 14:35:39'),
(35, 'Prof. Rossie Schumm Jr.', 'income', 1315, 'Aliquam et officia veniam ut. Consectetur et illo incidunt alias. Accusantium sed nobis explicabo voluptatem consequuntur harum.', 43, 12, '2019-06-01 14:35:39', '2019-06-01 14:35:39'),
(36, 'Kassandra Sipes', 'expense', 6214, 'Accusantium sit quia ratione consequuntur aut. Esse laboriosam adipisci ab dolores dolorem dolores quas. Velit id sunt expedita.', 18, 20, '2019-06-01 14:35:39', '2019-06-01 14:35:39'),
(37, 'Arturo Kub', 'expense', 6811, 'Atque exercitationem magni accusamus rem sed ratione placeat. Totam sit qui impedit voluptatem saepe eligendi recusandae vel. Iusto nesciunt vero possimus praesentium fuga dolores.', 1, 14, '2019-06-01 14:35:39', '2019-06-01 14:35:39'),
(38, 'Lukas Lind', 'expense', 6669, 'Nihil quae voluptates a atque. Est iste nam tenetur aliquid. Natus tempore iure nesciunt ab tempora voluptas.', 16, 19, '2019-06-01 14:35:39', '2019-06-01 14:35:39'),
(39, 'Bridie Lueilwitz', 'income', 2067, 'Sunt labore enim similique molestiae itaque doloremque ipsa. Est adipisci dolores ad voluptate aut suscipit non. Veritatis ut autem a illum.', 21, 13, '2019-06-01 14:35:39', '2019-06-01 14:35:39'),
(40, 'Darlene Adams', 'expense', 4753, 'Voluptas pariatur voluptas incidunt voluptates exercitationem esse et. Voluptatibus tempore fuga a aut sed. Officia pariatur quod ea voluptas.', 26, 15, '2019-06-01 14:35:39', '2019-06-01 14:35:39'),
(41, 'Elvis Nolan', 'income', 9852, 'Reiciendis quas incidunt accusamus est ducimus magnam. Recusandae voluptatibus qui enim ad. Est sunt et iusto mollitia nemo.', 25, 14, '2019-06-01 14:35:39', '2019-06-01 14:35:39'),
(42, 'Julian Koss', 'expense', 9889, 'Nobis inventore sit omnis enim eos et. Cumque fugit perspiciatis saepe repellendus nobis nam dolorum. Odit exercitationem quam enim maiores praesentium eligendi alias.', 35, 16, '2019-06-01 14:35:39', '2019-06-01 14:35:39'),
(43, 'Adriel Daniel', 'income', 8863, 'Ad laudantium fuga praesentium voluptatibus. Quia qui et ad sunt alias quibusdam. Quo vero in ut suscipit rerum.', 16, 13, '2019-06-01 14:35:40', '2019-06-01 14:35:40'),
(44, 'Tierra Jast', 'income', 2694, 'Tenetur fuga assumenda aut maiores. Et sint harum minima magni et qui repellendus qui. Voluptatem tempore impedit facilis velit saepe ullam molestias.', 18, 19, '2019-06-01 14:35:40', '2019-06-01 14:35:40'),
(45, 'Prof. Simone Miller MD', 'income', 34, 'Consequuntur a veritatis dolores. Autem ullam at et dignissimos sapiente recusandae. Non modi dolorem provident.', 19, 12, '2019-06-01 14:35:40', '2019-06-01 14:35:40'),
(46, 'Dallas Marquardt Jr.', 'income', 9050, 'Quod eum quos et ipsa labore. In commodi impedit repellat non animi. Repellat est vero qui facilis facere maiores.', 2, 14, '2019-06-01 14:35:40', '2019-06-01 14:35:40'),
(47, 'Pinkie Hagenes', 'expense', 9125, 'Quod doloribus cum nulla in. Omnis neque officiis harum numquam. Eveniet quidem voluptatum praesentium facilis laboriosam ea ut.', 13, 21, '2019-06-01 14:35:40', '2019-06-01 14:35:40'),
(48, 'Esperanza Armstrong', 'expense', 1234, 'Vitae labore et distinctio. Ea odio cupiditate et consequatur voluptatem sapiente ut nobis. Odit tenetur dignissimos eos iure.', 46, 12, '2019-06-01 14:35:40', '2019-06-01 14:35:40'),
(49, 'Liliane Crona', 'expense', 5560, 'Voluptatibus consequatur reprehenderit eos error qui et autem. Magnam deleniti facere in fugiat illum aut. Qui quasi aliquam quod et ut soluta quo.', 34, 19, '2019-06-01 14:35:40', '2019-06-01 14:35:40'),
(50, 'Dr. Milford Kertzmann', 'income', 819, 'Et perferendis magni et itaque repellat at eos voluptates. Est quia qui quam qui quae. Rem sit aperiam dolor debitis.', 49, 19, '2019-06-01 14:35:40', '2019-06-01 14:35:40');

-- --------------------------------------------------------

--
-- Structure de la table `school_account_sectors`
--

DROP TABLE IF EXISTS `school_account_sectors`;
CREATE TABLE IF NOT EXISTS `school_account_sectors` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `school_account_sectors`
--

INSERT INTO `school_account_sectors` (`id`, `name`, `type`, `school_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Intuitive responsive concept', 'expense', 27, 19, '2019-06-01 14:35:40', '2019-06-01 14:35:40'),
(2, 'Implemented executive service-desk', 'expense', 2, 15, '2019-06-01 14:35:40', '2019-06-01 14:35:40'),
(3, 'Profound responsive paradigm', 'expense', 9, 13, '2019-06-01 14:35:40', '2019-06-01 14:35:40'),
(4, 'Exclusive holistic analyzer', 'expense', 39, 14, '2019-06-01 14:35:40', '2019-06-01 14:35:40'),
(5, 'Pre-emptive context-sensitive ability', 'expense', 14, 13, '2019-06-01 14:35:41', '2019-06-01 14:35:41'),
(6, 'Managed mobile capability', 'expense', 1, 12, '2019-06-01 14:35:41', '2019-06-01 14:35:41'),
(7, 'Phased asynchronous opensystem', 'expense', 9, 15, '2019-06-01 14:35:41', '2019-06-01 14:35:41'),
(8, 'Proactive holistic encryption', 'income', 42, 20, '2019-06-01 14:35:41', '2019-06-01 14:35:41'),
(9, 'Focused homogeneous capability', 'expense', 11, 19, '2019-06-01 14:35:41', '2019-06-01 14:35:41'),
(10, 'Intuitive fault-tolerant groupware', 'expense', 46, 20, '2019-06-01 14:35:41', '2019-06-01 14:35:41'),
(11, 'Innovative executive help-desk', 'expense', 21, 13, '2019-06-01 14:35:41', '2019-06-01 14:35:41'),
(12, 'Streamlined non-volatile alliance', 'expense', 11, 19, '2019-06-01 14:35:41', '2019-06-01 14:35:41'),
(13, 'Proactive 3rdgeneration protocol', 'expense', 5, 15, '2019-06-01 14:35:41', '2019-06-01 14:35:41'),
(14, 'Right-sized 4thgeneration access', 'expense', 41, 15, '2019-06-01 14:35:41', '2019-06-01 14:35:41'),
(15, 'Team-oriented 24/7 orchestration', 'income', 36, 15, '2019-06-01 14:35:41', '2019-06-01 14:35:41'),
(16, 'Proactive 24/7 knowledgebase', 'expense', 5, 20, '2019-06-01 14:35:41', '2019-06-01 14:35:41'),
(17, 'Phased fresh-thinking encryption', 'income', 50, 14, '2019-06-01 14:35:41', '2019-06-01 14:35:41'),
(18, 'Operative upward-trending strategy', 'expense', 21, 14, '2019-06-01 14:35:41', '2019-06-01 14:35:41'),
(19, 'Ameliorated regional product', 'income', 1, 20, '2019-06-01 14:35:41', '2019-06-01 14:35:41'),
(20, 'Mandatory maximized paradigm', 'expense', 31, 20, '2019-06-01 14:35:41', '2019-06-01 14:35:41'),
(21, 'Optional intermediate time-frame', 'expense', 51, 20, '2019-06-01 14:35:41', '2019-06-01 14:35:41'),
(22, 'Realigned multi-state time-frame', 'expense', 36, 16, '2019-06-01 14:35:42', '2019-06-01 14:35:42'),
(23, 'Re-engineered national throughput', 'expense', 51, 12, '2019-06-01 14:35:42', '2019-06-01 14:35:42'),
(24, 'Automated discrete product', 'expense', 38, 16, '2019-06-01 14:35:42', '2019-06-01 14:35:42'),
(25, 'Digitized solution-oriented artificialintelligence', 'income', 25, 15, '2019-06-01 14:35:42', '2019-06-01 14:35:42'),
(26, 'Integrated content-based help-desk', 'income', 6, 21, '2019-06-01 14:35:42', '2019-06-01 14:35:42'),
(27, 'Managed multi-tasking website', 'income', 41, 13, '2019-06-01 14:35:42', '2019-06-01 14:35:42'),
(28, 'Versatile system-worthy collaboration', 'expense', 42, 15, '2019-06-01 14:35:42', '2019-06-01 14:35:42'),
(29, 'Intuitive real-time concept', 'income', 8, 19, '2019-06-01 14:35:42', '2019-06-01 14:35:42'),
(30, 'Multi-channelled maximized installation', 'income', 1, 15, '2019-06-01 14:35:42', '2019-06-01 14:35:42'),
(31, 'Innovative hybrid software', 'expense', 17, 16, '2019-06-01 14:35:42', '2019-06-01 14:35:42'),
(32, 'Versatile foreground openarchitecture', 'expense', 36, 16, '2019-06-01 14:35:42', '2019-06-01 14:35:42'),
(33, 'Vision-oriented zeroadministration utilisation', 'expense', 8, 13, '2019-06-01 14:35:42', '2019-06-01 14:35:42'),
(34, 'Persevering client-server portal', 'income', 27, 13, '2019-06-01 14:35:42', '2019-06-01 14:35:42'),
(35, 'Stand-alone intermediate GraphicInterface', 'income', 35, 21, '2019-06-01 14:35:42', '2019-06-01 14:35:42'),
(36, 'Mandatory foreground product', 'expense', 37, 18, '2019-06-01 14:35:42', '2019-06-01 14:35:42'),
(37, 'Reduced even-keeled knowledgeuser', 'income', 27, 13, '2019-06-01 14:35:43', '2019-06-01 14:35:43'),
(38, 'Up-sized mobile firmware', 'income', 32, 15, '2019-06-01 14:35:43', '2019-06-01 14:35:43'),
(39, 'Multi-lateral holistic utilisation', 'income', 35, 20, '2019-06-01 14:35:43', '2019-06-01 14:35:43'),
(40, 'Profound mobile circuit', 'expense', 11, 18, '2019-06-01 14:35:43', '2019-06-01 14:35:43'),
(41, 'Visionary coherent conglomeration', 'expense', 16, 21, '2019-06-01 14:35:43', '2019-06-01 14:35:43'),
(42, 'Configurable well-modulated emulation', 'expense', 19, 20, '2019-06-01 14:35:43', '2019-06-01 14:35:43'),
(43, 'Right-sized actuating collaboration', 'income', 24, 20, '2019-06-01 14:35:43', '2019-06-01 14:35:43'),
(44, 'Integrated multimedia conglomeration', 'expense', 10, 14, '2019-06-01 14:35:43', '2019-06-01 14:35:43'),
(45, 'Assimilated high-level attitude', 'income', 19, 13, '2019-06-01 14:35:43', '2019-06-01 14:35:43'),
(46, 'Expanded 24hour toolset', 'income', 26, 18, '2019-06-01 14:35:43', '2019-06-01 14:35:43'),
(47, 'Function-based tangible localareanetwork', 'income', 3, 17, '2019-06-01 14:35:43', '2019-06-01 14:35:43'),
(48, 'Cross-platform 4thgeneration GraphicalUserInterface', 'income', 32, 16, '2019-06-01 14:35:43', '2019-06-01 14:35:43'),
(49, 'Sharable intangible service-desk', 'income', 10, 18, '2019-06-01 14:35:43', '2019-06-01 14:35:43'),
(50, 'Triple-buffered coherent firmware', 'income', 51, 18, '2019-06-01 14:35:43', '2019-06-01 14:35:43');

-- --------------------------------------------------------

--
-- Structure de la table `school_attendances`
--

DROP TABLE IF EXISTS `school_attendances`;
CREATE TABLE IF NOT EXISTS `school_attendances` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` int(10) UNSIGNED NOT NULL,
  `section_id` int(10) UNSIGNED NOT NULL,
  `exam_id` int(10) UNSIGNED NOT NULL,
  `present` tinyint(3) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `school_attendances`
--

INSERT INTO `school_attendances` (`id`, `student_id`, `section_id`, `exam_id`, `present`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 62, 6, 7, 1, 259, '2019-06-01 14:35:07', '2019-06-01 14:35:07'),
(2, 69, 4, 3, 0, 161, '2019-06-01 14:35:07', '2019-06-01 14:35:07'),
(3, 69, 15, 4, 2, 186, '2019-06-01 14:35:07', '2019-06-01 14:35:07'),
(4, 65, 11, 3, 1, 152, '2019-06-01 14:35:07', '2019-06-01 14:35:07'),
(5, 68, 14, 4, 2, 226, '2019-06-01 14:35:07', '2019-06-01 14:35:07'),
(6, 64, 2, 2, 1, 134, '2019-06-01 14:35:07', '2019-06-01 14:35:07'),
(7, 70, 4, 4, 1, 27, '2019-06-01 14:35:07', '2019-06-01 14:35:07'),
(8, 67, 1, 8, 2, 56, '2019-06-01 14:35:07', '2019-06-01 14:35:07'),
(9, 70, 13, 7, 2, 252, '2019-06-01 14:35:08', '2019-06-01 14:35:08'),
(10, 70, 1, 4, 2, 228, '2019-06-01 14:35:08', '2019-06-01 14:35:08'),
(11, 65, 17, 5, 0, 258, '2019-06-01 14:35:08', '2019-06-01 14:35:08'),
(12, 68, 18, 3, 2, 245, '2019-06-01 14:35:08', '2019-06-01 14:35:08'),
(13, 62, 14, 3, 2, 21, '2019-06-01 14:35:08', '2019-06-01 14:35:08'),
(14, 63, 7, 6, 0, 187, '2019-06-01 14:35:08', '2019-06-01 14:35:08'),
(15, 70, 3, 3, 1, 163, '2019-06-01 14:35:08', '2019-06-01 14:35:08'),
(16, 70, 5, 1, 0, 49, '2019-06-01 14:35:08', '2019-06-01 14:35:08'),
(17, 71, 12, 8, 1, 4, '2019-06-01 14:35:08', '2019-06-01 14:35:08'),
(18, 70, 19, 5, 0, 109, '2019-06-01 14:35:08', '2019-06-01 14:35:08'),
(19, 68, 6, 1, 0, 123, '2019-06-01 14:35:08', '2019-06-01 14:35:08'),
(20, 67, 15, 10, 1, 148, '2019-06-01 14:35:08', '2019-06-01 14:35:08'),
(21, 70, 19, 8, 2, 247, '2019-06-01 14:35:08', '2019-06-01 14:35:08'),
(22, 68, 5, 6, 1, 19, '2019-06-01 14:35:08', '2019-06-01 14:35:08'),
(23, 67, 15, 1, 1, 114, '2019-06-01 14:35:08', '2019-06-01 14:35:08'),
(24, 66, 14, 6, 2, 34, '2019-06-01 14:35:08', '2019-06-01 14:35:08'),
(25, 68, 12, 4, 2, 100, '2019-06-01 14:35:08', '2019-06-01 14:35:08'),
(26, 64, 9, 1, 2, 30, '2019-06-01 14:35:08', '2019-06-01 14:35:08'),
(27, 62, 15, 1, 1, 61, '2019-06-01 14:35:09', '2019-06-01 14:35:09'),
(28, 63, 15, 7, 2, 143, '2019-06-01 14:35:09', '2019-06-01 14:35:09'),
(29, 68, 15, 10, 2, 200, '2019-06-01 14:35:09', '2019-06-01 14:35:09'),
(30, 70, 13, 4, 1, 188, '2019-06-01 14:35:09', '2019-06-01 14:35:09'),
(31, 67, 19, 4, 1, 72, '2019-06-01 14:35:09', '2019-06-01 14:35:09'),
(32, 71, 9, 8, 0, 249, '2019-06-01 14:35:09', '2019-06-01 14:35:09'),
(33, 64, 13, 9, 2, 61, '2019-06-01 14:35:09', '2019-06-01 14:35:09'),
(34, 65, 3, 10, 0, 90, '2019-06-01 14:35:09', '2019-06-01 14:35:09'),
(35, 65, 3, 6, 1, 237, '2019-06-01 14:35:09', '2019-06-01 14:35:09'),
(36, 68, 19, 8, 1, 56, '2019-06-01 14:35:09', '2019-06-01 14:35:09'),
(37, 64, 13, 2, 1, 41, '2019-06-01 14:35:09', '2019-06-01 14:35:09'),
(38, 67, 18, 3, 0, 253, '2019-06-01 14:35:09', '2019-06-01 14:35:09'),
(39, 64, 10, 4, 0, 85, '2019-06-01 14:35:09', '2019-06-01 14:35:09'),
(40, 62, 5, 6, 1, 205, '2019-06-01 14:35:09', '2019-06-01 14:35:09'),
(41, 67, 15, 3, 2, 162, '2019-06-01 14:35:09', '2019-06-01 14:35:09'),
(42, 70, 18, 7, 1, 93, '2019-06-01 14:35:09', '2019-06-01 14:35:09'),
(43, 64, 13, 5, 1, 228, '2019-06-01 14:35:09', '2019-06-01 14:35:09'),
(44, 67, 5, 7, 1, 38, '2019-06-01 14:35:10', '2019-06-01 14:35:10'),
(45, 65, 16, 10, 2, 181, '2019-06-01 14:35:10', '2019-06-01 14:35:10'),
(46, 70, 16, 4, 0, 194, '2019-06-01 14:35:10', '2019-06-01 14:35:10'),
(47, 62, 2, 6, 0, 69, '2019-06-01 14:35:10', '2019-06-01 14:35:10'),
(48, 68, 12, 9, 2, 129, '2019-06-01 14:35:10', '2019-06-01 14:35:10'),
(49, 64, 2, 5, 1, 171, '2019-06-01 14:35:10', '2019-06-01 14:35:10'),
(50, 67, 6, 1, 2, 27, '2019-06-01 14:35:10', '2019-06-01 14:35:10');

-- --------------------------------------------------------

--
-- Structure de la table `school_books`
--

DROP TABLE IF EXISTS `school_books`;
CREATE TABLE IF NOT EXISTS `school_books` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `book_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `rackNo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rowNo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `books_book_code_unique` (`book_code`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `school_books`
--

INSERT INTO `school_books` (`id`, `book_code`, `title`, `author`, `quantity`, `rackNo`, `rowNo`, `img_path`, `about`, `type`, `price`, `class_id`, `school_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'bk7240251', 'Esse nobis ad ducimus ut odit a.', 'Lauryn Champlin', 34, '3', '3', 'https://lorempixel.com/150/150/cats/?89292', 'Maiores sit et excepturi voluptatem incidunt. Et ducimus itaque ullam ut sint architecto. Consequatur neque totam incidunt nihil voluptate et.', 'Other', 39722913, 1, 49, 24, '2019-06-01 14:35:24', '2019-06-01 14:35:24'),
(2, 'bk4796736', 'Nihil atque deleniti modi facilis aliquid qui.', 'Otto Bashirian', 19, '9', '2', 'https://lorempixel.com/150/150/cats/?98878', 'Cupiditate sint consectetur aliquam earum distinctio neque veritatis. Et et sint dolores sit. Eligendi odio rerum id quidem adipisci.', 'Magazine', 501, 7, 43, 24, '2019-06-01 14:35:24', '2019-06-01 14:35:24'),
(3, 'bk7235852', 'Sunt fuga culpa quasi earum.', 'Dr. Abigayle Purdy', 13, '5', '4', 'https://lorempixel.com/150/150/cats/?55648', 'Eligendi voluptates itaque dolores saepe ex ipsam modi. Alias quia cumque voluptatem. Impedit ea esse excepturi velit dolor.', 'Story', 48, 13, 25, 22, '2019-06-01 14:35:24', '2019-06-01 14:35:24'),
(4, 'bk6794981', 'Est autem amet doloribus sed.', 'Heather Hettinger', 13, '4', '9', 'https://lorempixel.com/150/150/cats/?72482', 'Libero et repellendus veritatis et vitae ut. Nostrum recusandae nostrum est excepturi. Id at molestiae nihil sed quod.', 'Other', 256, 11, 25, 22, '2019-06-01 14:35:24', '2019-06-01 14:35:24'),
(5, 'bk4172586', 'Magni ut est accusantium repudiandae id ipsam.', 'Mr. Trevion Parisian', 5, '4', '6', 'https://lorempixel.com/150/150/cats/?62231', 'Velit vel sint corporis aut. Dolorum tenetur ratione ut sequi ea sint. Officia consectetur sed aliquam dolor ut eos in.', 'Academic', 614, 6, 7, 27, '2019-06-01 14:35:24', '2019-06-01 14:35:24'),
(6, 'bk9850996', 'Porro eveniet maiores fugiat ducimus.', 'Guy Russel MD', 34, '10', '1', 'https://lorempixel.com/150/150/cats/?86769', 'Quis aut ipsum eveniet architecto sed ducimus sed. Ipsa qui ut corrupti officiis. Veniam molestiae vero repellendus quo dolorem id.', 'Magazine', 202622, 9, 29, 30, '2019-06-01 14:35:25', '2019-06-01 14:35:25'),
(7, 'bk7949165', 'Tempora sunt assumenda natus autem.', 'Brett Bashirian', 19, '9', '12', 'https://lorempixel.com/150/150/cats/?92415', 'Dignissimos praesentium iste rerum animi cum. Voluptatem aut maxime rerum consequatur vel ut aliquid. Alias nisi inventore dolorem dignissimos sit nulla aut qui.', 'Academic', 71529939, 5, 31, 28, '2019-06-01 14:35:25', '2019-06-01 14:35:25'),
(8, 'bk559094', 'Qui qui qui non illo dolore sed porro.', 'Elouise Bayer', 8, '11', '7', 'https://lorempixel.com/150/150/cats/?53342', 'Aut recusandae perferendis ut quasi officiis. Sint est ullam aspernatur consequatur reiciendis dolorem consequatur doloremque. Incidunt quos mollitia velit repellendus.', 'Other', 345, 12, 25, 27, '2019-06-01 14:35:25', '2019-06-01 14:35:25'),
(9, 'bk9962853', 'Magni odit dolores voluptatem et autem.', 'Arjun Casper', 34, '5', '3', 'https://lorempixel.com/150/150/cats/?86338', 'Ducimus beatae quidem reprehenderit voluptates nulla quo. Ut quod velit facilis optio ullam illum consequatur. Commodi tempore nesciunt soluta ut ex sed.', 'Academic', 15, 6, 43, 22, '2019-06-01 14:35:25', '2019-06-01 14:35:25'),
(10, 'bk6114005', 'Vero aut inventore qui atque quasi ipsum enim.', 'Ansley Ryan', 13, '8', '6', 'https://lorempixel.com/150/150/cats/?21148', 'Aperiam veritatis non excepturi hic voluptas. Eum nulla ut vitae commodi et. Consectetur molestias qui excepturi id est.', 'Other', 569833993, 2, 6, 31, '2019-06-01 14:35:25', '2019-06-01 14:35:25'),
(11, 'bk3360131', 'Temporibus aspernatur dolores maxime tenetur.', 'Miss Pearline Haag', 5, '12', '3', 'https://lorempixel.com/150/150/cats/?98687', 'Omnis alias tenetur maiores ipsa vel assumenda mollitia. Voluptates rerum temporibus culpa. Voluptatem ea qui qui maiores.', 'Academic', 6414, 9, 39, 27, '2019-06-01 14:35:25', '2019-06-01 14:35:25'),
(12, 'bk9964353', 'Rerum est expedita quisquam inventore accusamus sit et.', 'Stone Wyman', 13, '12', '9', 'https://lorempixel.com/150/150/cats/?14187', 'Nihil qui natus quo. Et nihil et tempora ducimus. Et dolor qui voluptas est dolores repellat.', 'Story', 47612610, 3, 19, 24, '2019-06-01 14:35:25', '2019-06-01 14:35:25'),
(13, 'bk3154369', 'Eveniet qui quidem quia molestiae.', 'Prof. Modesto Lang', 34, '2', '6', 'https://lorempixel.com/150/150/cats/?28674', 'Vel omnis corrupti incidunt et distinctio dignissimos autem. Est voluptatem consequatur accusamus ut illum dolor. Voluptatibus dolores quas ex consequatur adipisci est ullam.', 'Magazine', 1366, 2, 44, 29, '2019-06-01 14:35:25', '2019-06-01 14:35:25'),
(14, 'bk8776338', 'Facere quos asperiores nulla ipsum et ut deserunt.', 'Everette Christiansen', 13, '6', '4', 'https://lorempixel.com/150/150/cats/?19717', 'Exercitationem iste adipisci cum corporis consequuntur magni et. Aut occaecati expedita iusto. Quis odio at ipsa reiciendis dolorem sed sunt.', 'Story', 754185, 7, 43, 31, '2019-06-01 14:35:25', '2019-06-01 14:35:25'),
(15, 'bk5153206', 'Suscipit quo incidunt repudiandae dolor necessitatibus.', 'Jasen Hettinger III', 8, '3', '12', 'https://lorempixel.com/150/150/cats/?70895', 'Repudiandae cupiditate omnis fugit alias. Sed ad labore qui. Distinctio suscipit omnis nulla sunt quia.', 'Other', 982355, 9, 41, 27, '2019-06-01 14:35:25', '2019-06-01 14:35:25'),
(16, 'bk7617590', 'Dolores non dignissimos dolor.', 'Nichole Little DDS', 19, '5', '4', 'https://lorempixel.com/150/150/cats/?23627', 'Sequi vero ratione autem saepe minima totam nisi. Fuga voluptatem eos vel expedita eveniet reiciendis. Minus dolorem pariatur qui labore dolores cum quidem.', 'Magazine', 63570088, 3, 21, 28, '2019-06-01 14:35:25', '2019-06-01 14:35:25'),
(17, 'bk6720203', 'Dolores consequatur magni cum cumque quo odio aperiam.', 'Jamaal Bernier', 34, '4', '3', 'https://lorempixel.com/150/150/cats/?30064', 'Suscipit quis enim laudantium asperiores explicabo eum mollitia. Quaerat ad error aspernatur aut est laboriosam aliquam perspiciatis. Qui quia nesciunt ducimus fugit nostrum odio eveniet.', 'Story', 52, 12, 36, 27, '2019-06-01 14:35:25', '2019-06-01 14:35:25'),
(18, 'bk3634205', 'Aliquid non ipsa omnis.', 'Kendall Rohan', 8, '4', '9', 'https://lorempixel.com/150/150/cats/?85679', 'Omnis perferendis voluptas quia aut qui sit sunt atque. Porro fugit fugit ut et asperiores. Officia voluptatem impedit aliquid est illo illo et.', 'Story', 89, 4, 7, 29, '2019-06-01 14:35:26', '2019-06-01 14:35:26'),
(19, 'bk5920839', 'Distinctio id fuga culpa excepturi.', 'Mortimer Jaskolski III', 13, '4', '2', 'https://lorempixel.com/150/150/cats/?43532', 'Fugit inventore illo tempore et id nihil. Fugiat sed alias laboriosam sint voluptas optio incidunt. Eum rerum magni voluptatem voluptatem.', 'Other', 616391422, 6, 34, 25, '2019-06-01 14:35:26', '2019-06-01 14:35:26'),
(20, 'bk8388041', 'Eaque id eum et et quidem non voluptas ea.', 'Dangelo Hahn Jr.', 8, '6', '9', 'https://lorempixel.com/150/150/cats/?15224', 'Odio non ut aspernatur quaerat quia a. Sunt ut quibusdam et laudantium et quia commodi laboriosam. Quis hic eos aperiam cupiditate dolor necessitatibus distinctio.', 'Academic', 17962405, 5, 28, 23, '2019-06-01 14:35:26', '2019-06-01 14:35:26'),
(21, 'bk3126259', 'Nisi omnis eos non qui repudiandae.', 'Dexter Torphy', 13, '6', '5', 'https://lorempixel.com/150/150/cats/?62496', 'Quia animi quia maxime deserunt ad. Voluptatem cupiditate qui tempora ducimus doloribus quia. Possimus expedita amet fugiat.', 'Story', 40, 10, 35, 26, '2019-06-01 14:35:26', '2019-06-01 14:35:26'),
(22, 'bk4160451', 'Numquam fugit quibusdam in temporibus.', 'Maya Feeney', 19, '2', '12', 'https://lorempixel.com/150/150/cats/?35230', 'Est eum ad quis dolorem odio. Sed facilis autem dicta sed officiis fugit quam. Ipsum illum est magnam iusto.', 'Magazine', 5, 6, 26, 29, '2019-06-01 14:35:26', '2019-06-01 14:35:26'),
(23, 'bk7792837', 'Atque et fugiat aut nihil consequatur beatae ea.', 'Morris Lueilwitz', 13, '6', '6', 'https://lorempixel.com/150/150/cats/?42149', 'Architecto corporis non sit quis. Sit quae aut blanditiis. Enim in ratione quae excepturi ipsum nam.', 'Magazine', 660860689, 1, 47, 31, '2019-06-01 14:35:26', '2019-06-01 14:35:26'),
(24, 'bk107411', 'Tenetur nemo atque explicabo.', 'Prof. Tobin Wiegand', 8, '5', '5', 'https://lorempixel.com/150/150/cats/?62452', 'Deserunt quod et quo recusandae. Sed quisquam totam eligendi omnis. Molestias voluptate natus omnis.', 'Academic', 950, 7, 13, 27, '2019-06-01 14:35:26', '2019-06-01 14:35:26'),
(25, 'bk2329468', 'Qui officiis perspiciatis et et.', 'Joana Stehr III', 8, '2', '7', 'https://lorempixel.com/150/150/cats/?79079', 'Iusto nostrum eligendi fugit itaque. Est dicta velit voluptatum velit molestias qui cumque inventore. Dignissimos excepturi et quos magnam voluptatem.', 'Other', 720422655, 8, 18, 22, '2019-06-01 14:35:26', '2019-06-01 14:35:26'),
(26, 'bk1325786', 'Et magnam cupiditate cum omnis qui ipsa.', 'Keenan Kautzer', 8, '8', '8', 'https://lorempixel.com/150/150/cats/?83551', 'Et laborum exercitationem vel reiciendis praesentium aut unde. Aut atque eos sint minus molestiae enim. Sit assumenda rerum sit nesciunt repellendus voluptatum beatae.', 'Story', 276705615, 11, 1, 26, '2019-06-01 14:35:26', '2019-06-01 14:35:26'),
(27, 'bk3935968', 'Sit quibusdam vero totam quia beatae.', 'Lacy Fadel III', 34, '11', '9', 'https://lorempixel.com/150/150/cats/?64863', 'Tempora nihil expedita omnis officiis sapiente omnis labore. Quis qui quia possimus illum facilis quo magni. Est quasi aliquid eos.', 'Academic', 5, 10, 49, 30, '2019-06-01 14:35:26', '2019-06-01 14:35:26'),
(28, 'bk6258725', 'Facilis autem doloribus qui dolores et.', 'Rudolph Kuhlman', 13, '12', '7', 'https://lorempixel.com/150/150/cats/?87623', 'Quis aut voluptatem ea ipsum numquam quis ut. Beatae ea officiis quo libero qui minima. Aliquam quisquam doloremque consequatur esse omnis velit voluptas sunt.', 'Story', 99100, 6, 48, 23, '2019-06-01 14:35:26', '2019-06-01 14:35:26'),
(29, 'bk5008876', 'Voluptatum rerum provident officia.', 'Kristina Cormier', 13, '6', '11', 'https://lorempixel.com/150/150/cats/?96509', 'Molestias deleniti ad est aspernatur qui aut. Saepe dignissimos repudiandae deserunt inventore voluptas aut non. Sint pariatur totam ad distinctio libero sunt officiis esse.', 'Story', 2, 12, 46, 27, '2019-06-01 14:35:26', '2019-06-01 14:35:26'),
(30, 'bk653458', 'Numquam porro et aut nihil ducimus.', 'Enos Jaskolski', 19, '1', '2', 'https://lorempixel.com/150/150/cats/?50828', 'Ipsum quia sit officiis tenetur. Voluptatibus deserunt maiores officiis enim. Enim amet aut eveniet excepturi iusto quis vel est.', 'Magazine', 469139, 7, 30, 30, '2019-06-01 14:35:27', '2019-06-01 14:35:27'),
(31, 'bk1868368', 'Doloribus ducimus velit atque amet quod et molestiae accusamus.', 'Deven Cronin', 5, '5', '6', 'https://lorempixel.com/150/150/cats/?93203', 'Dolore maxime quaerat amet aut. Odit quia pariatur aut qui quibusdam inventore dolore. Dicta dicta illum laborum unde laudantium possimus.', 'Other', 3759692, 4, 30, 28, '2019-06-01 14:35:27', '2019-06-01 14:35:27'),
(32, 'bk9318532', 'Omnis ex perspiciatis perspiciatis hic tempore ipsa.', 'Aurelie Kris IV', 5, '11', '2', 'https://lorempixel.com/150/150/cats/?60430', 'Sit consequuntur quia aspernatur iste. Dolores non culpa beatae culpa eos repellendus. Nam dolorem dicta sequi at aut vero qui eaque.', 'Magazine', 22876381, 6, 42, 28, '2019-06-01 14:35:27', '2019-06-01 14:35:27'),
(33, 'bk9799661', 'Quas qui voluptas et.', 'Dr. Cierra Bernhard I', 13, '2', '5', 'https://lorempixel.com/150/150/cats/?18145', 'Mollitia illum fuga occaecati. Repellendus eum omnis necessitatibus et eveniet. Deleniti corporis voluptatibus a veritatis aut quo quia.', 'Magazine', 53879758, 13, 13, 22, '2019-06-01 14:35:27', '2019-06-01 14:35:27'),
(34, 'bk9313001', 'Temporibus inventore pariatur at tenetur ipsa fuga doloribus tempora.', 'Mrs. Anahi Sanford', 8, '1', '2', 'https://lorempixel.com/150/150/cats/?35043', 'Est aspernatur ut quia perspiciatis. Nostrum quo ut voluptas eos voluptatem ea. Eum nemo maxime debitis corporis non officia sed.', 'Other', 40809, 7, 11, 30, '2019-06-01 14:35:27', '2019-06-01 14:35:27'),
(35, 'bk6353586', 'Earum rerum numquam incidunt ad voluptatem est ullam.', 'Reggie Robel', 13, '7', '10', 'https://lorempixel.com/150/150/cats/?95685', 'Nam ullam illo mollitia aut. Amet saepe earum et explicabo et voluptates. Sapiente repellendus illum quia unde voluptas sit.', 'Magazine', 111, 8, 50, 30, '2019-06-01 14:35:27', '2019-06-01 14:35:27'),
(36, 'bk8869885', 'Et dolorem id sed.', 'Walker Hyatt', 19, '10', '11', 'https://lorempixel.com/150/150/cats/?92244', 'Facilis eaque magnam sit et quo. Illo ipsam maiores veritatis. Eligendi non molestias atque consequatur.', 'Magazine', 123087, 1, 45, 25, '2019-06-01 14:35:27', '2019-06-01 14:35:27'),
(37, 'bk4659530', 'Ullam labore eius rem eum dolore.', 'Neha Kunze', 34, '9', '2', 'https://lorempixel.com/150/150/cats/?53838', 'Accusamus voluptatum aut atque. Deleniti perspiciatis est eos consequatur eum nisi ut. Quas dolorem voluptate in qui.', 'Magazine', 962304651, 7, 37, 22, '2019-06-01 14:35:27', '2019-06-01 14:35:27'),
(38, 'bk8125379', 'Et non quia dicta temporibus.', 'Jettie McClure', 13, '10', '12', 'https://lorempixel.com/150/150/cats/?24557', 'Ullam quo voluptas recusandae cum iure nesciunt ut. At quos quidem repellat aut eos. Velit itaque cum et deleniti sed odio.', 'Other', 13, 10, 29, 28, '2019-06-01 14:35:27', '2019-06-01 14:35:27'),
(39, 'bk287270', 'Id dolores dolorem omnis.', 'Shanelle Breitenberg', 5, '7', '12', 'https://lorempixel.com/150/150/cats/?51347', 'Hic eos officiis quibusdam itaque aperiam laudantium. Cupiditate et explicabo facilis quidem cumque et. Blanditiis quis recusandae ut cupiditate.', 'Magazine', 12724072, 12, 22, 24, '2019-06-01 14:35:27', '2019-06-01 14:35:27'),
(40, 'bk8715332', 'Non temporibus voluptas sit ipsam dignissimos.', 'Anna Runolfsdottir I', 13, '3', '4', 'https://lorempixel.com/150/150/cats/?37076', 'Quidem nulla enim omnis officiis rerum. Magnam minus optio minima qui omnis consequuntur distinctio animi. At officiis dignissimos iusto exercitationem voluptas nobis aperiam.', 'Story', 8, 11, 23, 31, '2019-06-01 14:35:27', '2019-06-01 14:35:27'),
(41, 'bk3732070', 'Deserunt vel similique blanditiis doloremque vitae voluptas ut architecto.', 'Dr. Francesco Rutherford DVM', 8, '5', '4', 'https://lorempixel.com/150/150/cats/?37883', 'Dolores occaecati mollitia est nulla eos voluptate voluptatem recusandae. Est reiciendis quia suscipit facere cumque et esse molestiae. Alias delectus est dignissimos et esse ut.', 'Story', 8848679, 7, 47, 29, '2019-06-01 14:35:27', '2019-06-01 14:35:27'),
(42, 'bk9083695', 'Hic vitae tempora eaque dignissimos.', 'Hollis Swaniawski', 13, '3', '8', 'https://lorempixel.com/150/150/cats/?73732', 'Et qui nostrum suscipit mollitia et dolores. Dolores qui esse voluptas in autem et. Et voluptatum dolorem eveniet reiciendis delectus.', 'Magazine', 0, 11, 40, 23, '2019-06-01 14:35:27', '2019-06-01 14:35:27'),
(43, 'bk3456697', 'Possimus veniam nostrum quia dolores est libero vero.', 'Clay Keebler', 19, '2', '5', 'https://lorempixel.com/150/150/cats/?45719', 'Autem velit ut error illo voluptatem. Fugit provident aspernatur adipisci totam quasi nulla ducimus. Nam voluptas odio ipsa sint cupiditate.', 'Academic', 940067466, 13, 26, 28, '2019-06-01 14:35:28', '2019-06-01 14:35:28'),
(44, 'bk535162', 'Eos excepturi placeat reprehenderit non vel aliquid similique veritatis.', 'Dr. Brando Robel DVM', 5, '6', '4', 'https://lorempixel.com/150/150/cats/?62362', 'Culpa perspiciatis eius velit odit. Id quo est non labore velit quis eos. Provident et quibusdam sequi quod recusandae autem et.', 'Story', 6786225, 12, 45, 26, '2019-06-01 14:35:28', '2019-06-01 14:35:28'),
(45, 'bk4846085', 'Omnis ex voluptatum laboriosam id.', 'Terry Yost', 19, '1', '7', 'https://lorempixel.com/150/150/cats/?43437', 'Ullam facere sapiente autem dolorem distinctio ut non. Qui veniam nobis nihil minus iure officia. Quas nihil maxime temporibus aut sed sequi quisquam.', 'Other', 618020, 11, 10, 28, '2019-06-01 14:35:28', '2019-06-01 14:35:28'),
(46, 'bk5368458', 'Fugit magni neque voluptas corporis quisquam quod tempore.', 'Joanie Hayes', 13, '1', '9', 'https://lorempixel.com/150/150/cats/?61965', 'Debitis quia accusamus et cum placeat. Distinctio laboriosam voluptatem est inventore itaque in. Hic eum architecto fuga deserunt.', 'Magazine', 23635, 5, 5, 28, '2019-06-01 14:35:28', '2019-06-01 14:35:28'),
(47, 'bk9868787', 'Quis voluptate at deleniti deleniti aut.', 'Jolie Wisoky', 13, '8', '5', 'https://lorempixel.com/150/150/cats/?81814', 'Recusandae numquam ea dolorem vitae ipsum iusto. Rerum et et odit suscipit saepe nihil doloremque. Ipsa omnis sed non excepturi vel qui.', 'Story', 7193754, 5, 11, 27, '2019-06-01 14:35:28', '2019-06-01 14:35:28'),
(48, 'bk4644127', 'Mollitia culpa culpa reiciendis qui.', 'Clare Daugherty', 34, '6', '12', 'https://lorempixel.com/150/150/cats/?22570', 'Impedit eligendi maxime aut qui ea consectetur aut. Nam eveniet nemo delectus ut consequatur est quis tempora. Illum autem animi id.', 'Other', 3099666, 2, 6, 27, '2019-06-01 14:35:28', '2019-06-01 14:35:28'),
(49, 'bk6659270', 'Laudantium excepturi nihil molestias perspiciatis sit veritatis similique.', 'Miss Herta Wilderman', 8, '9', '10', 'https://lorempixel.com/150/150/cats/?90090', 'Sunt est voluptatem minima. Eum temporibus soluta numquam odit aut voluptatem. Accusamus quia perspiciatis debitis.', 'Magazine', 225, 12, 42, 31, '2019-06-01 14:35:28', '2019-06-01 14:35:28'),
(50, 'bk725511', 'Pariatur aut cupiditate eos nostrum nemo.', 'Idella Mann', 34, '9', '6', 'https://lorempixel.com/150/150/cats/?35368', 'Qui quia veniam est sunt non maiores et. Sit molestiae perspiciatis voluptatem itaque ad dolores. Aut vel voluptas adipisci nesciunt.', 'Magazine', 71, 10, 8, 29, '2019-06-01 14:35:28', '2019-06-01 14:35:28');

-- --------------------------------------------------------

--
-- Structure de la table `school_classes`
--

DROP TABLE IF EXISTS `school_classes`;
CREATE TABLE IF NOT EXISTS `school_classes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `class_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `school_classes`
--

INSERT INTO `school_classes` (`id`, `class_number`, `school_id`, `group`, `created_at`, `updated_at`) VALUES
(1, '0', 1, '', '2019-06-01 14:33:59', '2019-06-01 14:33:59'),
(2, '1', 1, '', '2019-06-01 14:33:59', '2019-06-01 14:33:59'),
(3, '2', 1, '', '2019-06-01 14:33:59', '2019-06-01 14:33:59'),
(4, '3', 1, '', '2019-06-01 14:33:59', '2019-06-01 14:33:59'),
(5, '4', 1, '', '2019-06-01 14:33:59', '2019-06-01 14:33:59'),
(6, '5', 1, '', '2019-06-01 14:33:59', '2019-06-01 14:33:59'),
(7, '6', 1, '', '2019-06-01 14:33:59', '2019-06-01 14:33:59'),
(8, '7', 1, '', '2019-06-01 14:34:00', '2019-06-01 14:34:00'),
(9, '8', 1, 'arts', '2019-06-01 14:34:00', '2019-06-01 14:34:00'),
(10, '9', 1, 'science', '2019-06-01 14:34:00', '2019-06-01 14:34:00'),
(11, '10', 1, 'commerce', '2019-06-01 14:34:00', '2019-06-01 14:34:00'),
(12, '11', 1, 'arts', '2019-06-01 14:34:00', '2019-06-01 14:34:00'),
(13, '12', 1, 'commerce', '2019-06-01 14:34:00', '2019-06-01 14:34:00');

-- --------------------------------------------------------

--
-- Structure de la table `school_courses`
--

DROP TABLE IF EXISTS `school_courses`;
CREATE TABLE IF NOT EXISTS `school_courses` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `course_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade_system_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quiz_count` int(11) NOT NULL,
  `assignment_count` int(11) NOT NULL,
  `ct_count` int(11) NOT NULL,
  `quiz_percent` int(11) NOT NULL,
  `attendance_percent` int(11) NOT NULL,
  `assignment_percent` int(11) NOT NULL,
  `ct_percent` int(11) NOT NULL,
  `final_exam_percent` int(11) NOT NULL,
  `practical_percent` int(11) NOT NULL,
  `att_fullmark` int(11) NOT NULL,
  `quiz_fullmark` int(11) NOT NULL,
  `a_fullmark` int(11) NOT NULL,
  `ct_fullmark` int(11) NOT NULL,
  `final_fullmark` int(11) NOT NULL,
  `practical_fullmark` int(11) NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `exam_id` int(10) UNSIGNED NOT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `section_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `school_courses`
--

INSERT INTO `school_courses` (`id`, `course_name`, `class_id`, `course_type`, `course_time`, `grade_system_name`, `quiz_count`, `assignment_count`, `ct_count`, `quiz_percent`, `attendance_percent`, `assignment_percent`, `ct_percent`, `final_exam_percent`, `practical_percent`, `att_fullmark`, `quiz_fullmark`, `a_fullmark`, `ct_fullmark`, `final_fullmark`, `practical_fullmark`, `school_id`, `exam_id`, `teacher_id`, `section_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'et et consectetur', 9, 'Core', '12:50PM-01:40PM', 'Grade System 1', 1, 3, 4, 10, 5, 15, 10, 50, 25, 5, 15, 20, 15, 100, 30, 1, 6, 34, 12, 74, '2019-06-01 14:34:56', '2019-06-01 14:34:56'),
(2, 'ut eligendi sed', 5, 'Elective', '12:50PM-01:40PM', 'Grade System 1', 4, 2, 1, 10, 5, 15, 10, 50, 25, 5, 15, 20, 15, 100, 30, 1, 9, 34, 5, 47, '2019-06-01 14:34:56', '2019-06-01 14:34:56'),
(3, 'eos repellendus nihil', 1, 'Elective', '12:50PM-01:40PM', 'Grade System 1', 3, 3, 1, 10, 5, 15, 10, 50, 25, 5, 15, 20, 15, 100, 30, 1, 10, 41, 2, 181, '2019-06-01 14:34:56', '2019-06-01 14:34:56'),
(4, 'est ea explicabo', 8, 'Elective', '9:30AM-10:20AM', 'Grade System 1', 3, 1, 1, 10, 5, 15, 10, 50, 25, 5, 15, 20, 15, 100, 30, 1, 2, 32, 20, 9, '2019-06-01 14:34:56', '2019-06-01 14:34:56'),
(5, 'harum optio exercitationem', 8, 'Elective', '12:50PM-01:40PM', 'Grade System 1', 5, 3, 1, 10, 5, 15, 10, 50, 25, 5, 15, 20, 15, 100, 30, 1, 8, 36, 9, 128, '2019-06-01 14:34:57', '2019-06-01 14:34:57'),
(6, 'id nulla ullam', 7, 'Core', '9:30AM-10:20AM', 'Grade System 1', 4, 1, 2, 10, 5, 15, 10, 50, 25, 5, 15, 20, 15, 100, 30, 1, 3, 37, 15, 248, '2019-06-01 14:34:57', '2019-06-01 14:34:57'),
(7, 'sed quos commodi', 8, 'Elective', '9:30AM-10:20AM', 'Grade System 1', 5, 1, 3, 10, 5, 15, 10, 50, 25, 5, 15, 20, 15, 100, 30, 1, 5, 41, 12, 76, '2019-06-01 14:34:57', '2019-06-01 14:34:57'),
(8, 'quia ratione itaque', 1, 'Elective', '9:30AM-10:20AM', 'Grade System 1', 5, 3, 1, 10, 5, 15, 10, 50, 25, 5, 15, 20, 15, 100, 30, 1, 4, 38, 1, 112, '2019-06-01 14:34:57', '2019-06-01 14:34:57'),
(9, 'qui ipsa et', 11, 'Core', '9:30AM-10:20AM', 'Grade System 1', 2, 3, 3, 10, 5, 15, 10, 50, 25, 5, 15, 20, 15, 100, 30, 1, 5, 33, 15, 194, '2019-06-01 14:34:57', '2019-06-01 14:34:57'),
(10, 'provident et quidem', 9, 'Core', '9:30AM-10:20AM', 'Grade System 1', 3, 1, 3, 10, 5, 15, 10, 50, 25, 5, 15, 20, 15, 100, 30, 1, 2, 41, 13, 152, '2019-06-01 14:34:57', '2019-06-01 14:34:57'),
(11, 'sed fugiat at', 12, 'Core', '12:50PM-01:40PM', 'Grade System 1', 5, 3, 5, 10, 5, 15, 10, 50, 25, 5, 15, 20, 15, 100, 30, 1, 7, 37, 20, 28, '2019-06-01 14:34:57', '2019-06-01 14:34:57'),
(12, 'sunt molestias sequi', 11, 'Core', '9:30AM-10:20AM', 'Grade System 1', 4, 3, 2, 10, 5, 15, 10, 50, 25, 5, 15, 20, 15, 100, 30, 1, 7, 35, 18, 135, '2019-06-01 14:34:57', '2019-06-01 14:34:57'),
(13, 'quia non facere', 1, 'Core', '12:50PM-01:40PM', 'Grade System 1', 1, 3, 5, 10, 5, 15, 10, 50, 25, 5, 15, 20, 15, 100, 30, 1, 6, 40, 11, 82, '2019-06-01 14:34:57', '2019-06-01 14:34:57'),
(14, 'quis ut harum', 7, 'Elective', '9:30AM-10:20AM', 'Grade System 1', 5, 3, 4, 10, 5, 15, 10, 50, 25, 5, 15, 20, 15, 100, 30, 1, 4, 38, 13, 156, '2019-06-01 14:34:57', '2019-06-01 14:34:57'),
(15, 'quos quo nihil', 4, 'Elective', '12:50PM-01:40PM', 'Grade System 1', 3, 3, 1, 10, 5, 15, 10, 50, 25, 5, 15, 20, 15, 100, 30, 1, 5, 35, 3, 215, '2019-06-01 14:34:57', '2019-06-01 14:34:57'),
(16, 'minus iure aut', 1, 'Elective', '12:50PM-01:40PM', 'Grade System 1', 2, 2, 1, 10, 5, 15, 10, 50, 25, 5, 15, 20, 15, 100, 30, 1, 8, 41, 3, 91, '2019-06-01 14:34:58', '2019-06-01 14:34:58'),
(17, 'illum sint ipsa', 6, 'Elective', '9:30AM-10:20AM', 'Grade System 1', 5, 3, 4, 10, 5, 15, 10, 50, 25, 5, 15, 20, 15, 100, 30, 1, 5, 32, 18, 245, '2019-06-01 14:34:58', '2019-06-01 14:34:58'),
(18, 'voluptas esse nobis', 8, 'Elective', '12:50PM-01:40PM', 'Grade System 1', 4, 1, 3, 10, 5, 15, 10, 50, 25, 5, 15, 20, 15, 100, 30, 1, 10, 38, 7, 128, '2019-06-01 14:34:58', '2019-06-01 14:34:58'),
(19, 'ut nesciunt odio', 9, 'Elective', '9:30AM-10:20AM', 'Grade System 1', 2, 3, 1, 10, 5, 15, 10, 50, 25, 5, 15, 20, 15, 100, 30, 1, 4, 35, 12, 80, '2019-06-01 14:34:58', '2019-06-01 14:34:58'),
(20, 'tenetur harum dolor', 2, 'Elective', '9:30AM-10:20AM', 'Grade System 1', 3, 3, 4, 10, 5, 15, 10, 50, 25, 5, 15, 20, 15, 100, 30, 1, 9, 34, 5, 6, '2019-06-01 14:34:58', '2019-06-01 14:34:58'),
(21, 'et est dolores', 12, 'Elective', '12:50PM-01:40PM', 'Grade System 1', 3, 2, 3, 10, 5, 15, 10, 50, 25, 5, 15, 20, 15, 100, 30, 1, 2, 34, 3, 151, '2019-06-01 14:34:58', '2019-06-01 14:34:58'),
(22, 'doloribus et illum', 3, 'Core', '12:50PM-01:40PM', 'Grade System 1', 1, 3, 5, 10, 5, 15, 10, 50, 25, 5, 15, 20, 15, 100, 30, 1, 3, 41, 10, 230, '2019-06-01 14:34:58', '2019-06-01 14:34:58'),
(23, 'ullam omnis ut', 1, 'Elective', '9:30AM-10:20AM', 'Grade System 1', 5, 3, 1, 10, 5, 15, 10, 50, 25, 5, 15, 20, 15, 100, 30, 1, 8, 36, 13, 235, '2019-06-01 14:34:58', '2019-06-01 14:34:58'),
(24, 'voluptate minima perferendis', 13, 'Elective', '12:50PM-01:40PM', 'Grade System 1', 1, 2, 5, 10, 5, 15, 10, 50, 25, 5, 15, 20, 15, 100, 30, 1, 1, 37, 10, 71, '2019-06-01 14:34:58', '2019-06-01 14:34:58'),
(25, 'quia dolor ea', 10, 'Elective', '12:50PM-01:40PM', 'Grade System 1', 1, 3, 2, 10, 5, 15, 10, 50, 25, 5, 15, 20, 15, 100, 30, 1, 2, 37, 19, 35, '2019-06-01 14:34:59', '2019-06-01 14:34:59'),
(26, 'tempore quas quis', 1, 'Core', '9:30AM-10:20AM', 'Grade System 1', 4, 1, 3, 10, 5, 15, 10, 50, 25, 5, 15, 20, 15, 100, 30, 1, 9, 38, 1, 80, '2019-06-01 14:34:59', '2019-06-01 14:34:59'),
(27, 'et et est', 8, 'Core', '9:30AM-10:20AM', 'Grade System 1', 4, 2, 3, 10, 5, 15, 10, 50, 25, 5, 15, 20, 15, 100, 30, 1, 2, 36, 3, 55, '2019-06-01 14:34:59', '2019-06-01 14:34:59'),
(28, 'et nostrum earum', 8, 'Elective', '12:50PM-01:40PM', 'Grade System 1', 2, 3, 4, 10, 5, 15, 10, 50, 25, 5, 15, 20, 15, 100, 30, 1, 2, 34, 1, 5, '2019-06-01 14:34:59', '2019-06-01 14:34:59'),
(29, 'inventore laboriosam amet', 7, 'Core', '12:50PM-01:40PM', 'Grade System 1', 4, 3, 4, 10, 5, 15, 10, 50, 25, 5, 15, 20, 15, 100, 30, 1, 4, 41, 14, 24, '2019-06-01 14:34:59', '2019-06-01 14:34:59'),
(30, 'earum optio voluptatem', 10, 'Elective', '12:50PM-01:40PM', 'Grade System 1', 5, 1, 1, 10, 5, 15, 10, 50, 25, 5, 15, 20, 15, 100, 30, 1, 5, 36, 4, 166, '2019-06-01 14:34:59', '2019-06-01 14:34:59'),
(31, 'autem consequatur et', 10, 'Core', '9:30AM-10:20AM', 'Grade System 1', 4, 2, 1, 10, 5, 15, 10, 50, 25, 5, 15, 20, 15, 100, 30, 1, 7, 35, 11, 245, '2019-06-01 14:34:59', '2019-06-01 14:34:59'),
(32, 'facilis totam libero', 4, 'Core', '9:30AM-10:20AM', 'Grade System 1', 4, 3, 2, 10, 5, 15, 10, 50, 25, 5, 15, 20, 15, 100, 30, 1, 6, 37, 1, 120, '2019-06-01 14:34:59', '2019-06-01 14:34:59'),
(33, 'esse voluptatem natus', 2, 'Elective', '12:50PM-01:40PM', 'Grade System 1', 1, 2, 4, 10, 5, 15, 10, 50, 25, 5, 15, 20, 15, 100, 30, 1, 9, 33, 17, 159, '2019-06-01 14:34:59', '2019-06-01 14:34:59'),
(34, 'temporibus impedit id', 8, 'Core', '12:50PM-01:40PM', 'Grade System 1', 2, 2, 2, 10, 5, 15, 10, 50, 25, 5, 15, 20, 15, 100, 30, 1, 3, 37, 18, 183, '2019-06-01 14:35:00', '2019-06-01 14:35:00'),
(35, 'totam consequatur dolores', 5, 'Core', '12:50PM-01:40PM', 'Grade System 1', 5, 2, 3, 10, 5, 15, 10, 50, 25, 5, 15, 20, 15, 100, 30, 1, 10, 38, 12, 60, '2019-06-01 14:35:00', '2019-06-01 14:35:00'),
(36, 'dolore aut quia', 5, 'Elective', '9:30AM-10:20AM', 'Grade System 1', 5, 1, 2, 10, 5, 15, 10, 50, 25, 5, 15, 20, 15, 100, 30, 1, 7, 36, 13, 172, '2019-06-01 14:35:00', '2019-06-01 14:35:00'),
(37, 'officiis accusamus asperiores', 1, 'Core', '12:50PM-01:40PM', 'Grade System 1', 5, 1, 3, 10, 5, 15, 10, 50, 25, 5, 15, 20, 15, 100, 30, 1, 8, 38, 14, 36, '2019-06-01 14:35:00', '2019-06-01 14:35:00'),
(38, 'sit accusamus quod', 2, 'Core', '9:30AM-10:20AM', 'Grade System 1', 1, 3, 5, 10, 5, 15, 10, 50, 25, 5, 15, 20, 15, 100, 30, 1, 1, 32, 7, 198, '2019-06-01 14:35:00', '2019-06-01 14:35:00'),
(39, 'nesciunt qui blanditiis', 10, 'Core', '9:30AM-10:20AM', 'Grade System 1', 4, 2, 4, 10, 5, 15, 10, 50, 25, 5, 15, 20, 15, 100, 30, 1, 2, 35, 7, 129, '2019-06-01 14:35:00', '2019-06-01 14:35:00'),
(40, 'numquam voluptatem accusantium', 11, 'Core', '9:30AM-10:20AM', 'Grade System 1', 5, 1, 2, 10, 5, 15, 10, 50, 25, 5, 15, 20, 15, 100, 30, 1, 5, 35, 5, 179, '2019-06-01 14:35:00', '2019-06-01 14:35:00'),
(41, 'ullam deleniti qui', 7, 'Elective', '9:30AM-10:20AM', 'Grade System 1', 5, 3, 5, 10, 5, 15, 10, 50, 25, 5, 15, 20, 15, 100, 30, 1, 3, 32, 9, 90, '2019-06-01 14:35:00', '2019-06-01 14:35:00'),
(42, 'consequuntur vitae et', 13, 'Core', '9:30AM-10:20AM', 'Grade System 1', 1, 2, 3, 10, 5, 15, 10, 50, 25, 5, 15, 20, 15, 100, 30, 1, 8, 37, 7, 145, '2019-06-01 14:35:00', '2019-06-01 14:35:00'),
(43, 'quis eveniet et', 2, 'Core', '12:50PM-01:40PM', 'Grade System 1', 1, 3, 5, 10, 5, 15, 10, 50, 25, 5, 15, 20, 15, 100, 30, 1, 3, 37, 15, 100, '2019-06-01 14:35:01', '2019-06-01 14:35:01'),
(44, 'sed eum debitis', 3, 'Elective', '12:50PM-01:40PM', 'Grade System 1', 1, 3, 2, 10, 5, 15, 10, 50, 25, 5, 15, 20, 15, 100, 30, 1, 1, 38, 15, 181, '2019-06-01 14:35:01', '2019-06-01 14:35:01'),
(45, 'fuga natus pariatur', 10, 'Core', '9:30AM-10:20AM', 'Grade System 1', 2, 2, 4, 10, 5, 15, 10, 50, 25, 5, 15, 20, 15, 100, 30, 1, 5, 32, 18, 39, '2019-06-01 14:35:01', '2019-06-01 14:35:01'),
(46, 'numquam quasi enim', 8, 'Core', '12:50PM-01:40PM', 'Grade System 1', 4, 3, 3, 10, 5, 15, 10, 50, 25, 5, 15, 20, 15, 100, 30, 1, 4, 32, 12, 103, '2019-06-01 14:35:01', '2019-06-01 14:35:01'),
(47, 'ipsum a rem', 10, 'Core', '9:30AM-10:20AM', 'Grade System 1', 1, 2, 1, 10, 5, 15, 10, 50, 25, 5, 15, 20, 15, 100, 30, 1, 8, 33, 6, 26, '2019-06-01 14:35:01', '2019-06-01 14:35:01'),
(48, 'unde veritatis ut', 1, 'Elective', '9:30AM-10:20AM', 'Grade System 1', 1, 2, 4, 10, 5, 15, 10, 50, 25, 5, 15, 20, 15, 100, 30, 1, 3, 37, 20, 175, '2019-06-01 14:35:01', '2019-06-01 14:35:01'),
(49, 'consequatur vero aut', 5, 'Elective', '9:30AM-10:20AM', 'Grade System 1', 4, 1, 5, 10, 5, 15, 10, 50, 25, 5, 15, 20, 15, 100, 30, 1, 5, 39, 7, 226, '2019-06-01 14:35:01', '2019-06-01 14:35:01'),
(50, 'aut et modi', 13, 'Elective', '9:30AM-10:20AM', 'Grade System 1', 5, 3, 1, 10, 5, 15, 10, 50, 25, 5, 15, 20, 15, 100, 30, 1, 4, 32, 2, 155, '2019-06-01 14:35:01', '2019-06-01 14:35:01');

-- --------------------------------------------------------

--
-- Structure de la table `school_departments`
--

DROP TABLE IF EXISTS `school_departments`;
CREATE TABLE IF NOT EXISTS `school_departments` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `school_id` int(10) UNSIGNED NOT NULL,
  `department_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `school_departments`
--

INSERT INTO `school_departments` (`id`, `school_id`, `department_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Math', '2019-06-01 14:33:58', '2019-06-01 14:33:58'),
(2, 1, 'Bangla', '2019-06-01 14:33:58', '2019-06-01 14:33:58'),
(3, 1, 'English', '2019-06-01 14:33:58', '2019-06-01 14:33:58'),
(4, 1, 'Bangla', '2019-06-01 14:33:58', '2019-06-01 14:33:58'),
(5, 1, 'English', '2019-06-01 14:33:58', '2019-06-01 14:33:58'),
(6, 1, 'Bangla', '2019-06-01 14:33:58', '2019-06-01 14:33:58'),
(7, 1, 'English', '2019-06-01 14:33:58', '2019-06-01 14:33:58'),
(8, 1, 'Math', '2019-06-01 14:33:59', '2019-06-01 14:33:59'),
(9, 1, 'Bangla', '2019-06-01 14:33:59', '2019-06-01 14:33:59'),
(10, 1, 'Bangla', '2019-06-01 14:33:59', '2019-06-01 14:33:59');

-- --------------------------------------------------------

--
-- Structure de la table `school_events`
--

DROP TABLE IF EXISTS `school_events`;
CREATE TABLE IF NOT EXISTS `school_events` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `file_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `school_events`
--

INSERT INTO `school_events` (`id`, `file_path`, `title`, `description`, `active`, `school_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'http://www.bechtelar.com/rerum-aut-autem-est-voluptatibus-distinctio-eum', 'Iusto delectus provident aut quia tempore placeat facere tenetur.', 'Eveniet reiciendis accusantium eos alias excepturi voluptas architecto. Atque in fuga reprehenderit sed consequatur. Id quos voluptatum qui voluptatem quae perferendis.', 1, 1, 76, '2019-06-01 14:34:33', '2019-06-01 14:34:33'),
(2, 'https://www.schultz.com/voluptatem-recusandae-similique-aspernatur-quasi-aliquid', 'Quo vero est voluptatem consequatur nam.', 'Consequuntur quas ex sit rerum omnis. Deleniti sapiente sapiente maiores possimus corrupti ipsum. Atque delectus rem repellendus eos.', 0, 1, 49, '2019-06-01 14:34:33', '2019-06-01 14:34:33'),
(3, 'http://rohan.biz/eos-accusantium-aliquid-architecto-qui-eaque-consequatur-qui', 'Magni sit unde provident alias ea qui.', 'Omnis voluptatem iste et dolor fuga. Minima et modi assumenda sapiente provident. Autem excepturi impedit ut animi reprehenderit aperiam tenetur rerum.', 0, 1, 56, '2019-06-01 14:34:33', '2019-06-01 14:34:33'),
(4, 'http://mayert.org/blanditiis-ut-consequatur-dolores-itaque-error-amet-excepturi-doloremque.html', 'Et velit nemo quia similique aut quae et.', 'Exercitationem temporibus libero in voluptatem qui soluta quaerat. Non dolore veritatis et animi optio quia aperiam. Reprehenderit dolorem repellat explicabo laudantium amet.', 1, 1, 116, '2019-06-01 14:34:33', '2019-06-01 14:34:33'),
(5, 'http://stracke.com/in-sint-at-repellat-laudantium-sit-ut-ut', 'Voluptatem expedita aut inventore autem expedita.', 'Iusto quas vitae culpa saepe voluptatibus. Quis vel est molestiae quod nihil sit. Sit eos qui vero distinctio.', 0, 1, 208, '2019-06-01 14:34:33', '2019-06-01 14:34:33'),
(6, 'http://www.oconner.net/et-qui-eos-placeat-qui', 'Et debitis molestiae maiores corrupti commodi.', 'Velit deserunt enim velit voluptate accusantium. Expedita eum aut inventore. Ducimus mollitia dolores fugiat et.', 0, 1, 183, '2019-06-01 14:34:33', '2019-06-01 14:34:33'),
(7, 'http://www.turner.org/facere-modi-aut-similique-nobis-dignissimos-molestiae', 'Sint quae illum amet eligendi.', 'Omnis at odit quas. Occaecati qui eius ducimus quisquam non enim. Adipisci cum eos non qui nisi.', 1, 1, 2, '2019-06-01 14:34:33', '2019-06-01 14:34:33'),
(8, 'http://www.pfannerstill.com/', 'Officiis occaecati harum cupiditate nesciunt.', 'Quod cumque nisi molestiae dolor autem vitae voluptatem. Et dolores quia vero illum at. Voluptatem voluptatem ratione in minima veniam libero at.', 0, 1, 203, '2019-06-01 14:34:34', '2019-06-01 14:34:34'),
(9, 'http://www.quitzon.net/deleniti-est-consequatur-consequuntur-hic-perspiciatis-soluta-ipsa-temporibus', 'Similique qui iste voluptatem perferendis.', 'Voluptates quia rerum in minus qui qui unde dolores. Est in temporibus in id. Quo ipsum non ipsum debitis quisquam rem.', 0, 1, 168, '2019-06-01 14:34:34', '2019-06-01 14:34:34'),
(10, 'http://quigley.com/deserunt-autem-aut-velit-dicta', 'Quaerat sequi nulla eum quod autem quis nemo.', 'Molestias optio provident laboriosam quam. Ut beatae et et et quaerat quis. Quibusdam voluptas quae et nisi sint.', 1, 1, 84, '2019-06-01 14:34:34', '2019-06-01 14:34:34'),
(11, 'http://www.murazik.com/cupiditate-laudantium-eos-commodi-voluptate', 'Qui soluta est omnis.', 'Veritatis accusamus vero officiis consectetur labore. Eos ducimus iste aut reprehenderit rerum. Error dolores molestiae et eius veniam ea alias quos.', 1, 1, 218, '2019-06-01 14:34:34', '2019-06-01 14:34:34'),
(12, 'https://www.hintz.com/vero-nemo-ducimus-nam-alias-amet-illo', 'Dolor cumque odit earum natus.', 'Et atque perferendis qui qui nihil. Ipsa quia sunt nobis. In dignissimos occaecati quaerat est.', 1, 1, 108, '2019-06-01 14:34:34', '2019-06-01 14:34:34'),
(13, 'http://www.berge.com/nemo-placeat-a-delectus-aut-fuga-explicabo-ipsa', 'Quod ut a id sit similique qui.', 'Ipsa ut repudiandae alias aliquid aliquid quia. Ea illo molestiae aperiam sint incidunt dolores odit. Ipsa dolorem ut itaque quod esse sunt.', 1, 1, 204, '2019-06-01 14:34:34', '2019-06-01 14:34:34'),
(14, 'https://www.rodriguez.com/ipsum-et-amet-et-non-tenetur-ut-et-nam', 'Non incidunt iusto facilis consectetur quasi.', 'Dignissimos nihil ut sed consectetur voluptate quasi. Tempora mollitia soluta tempore accusantium blanditiis quam eaque. Sed qui consequuntur et repellendus et minus consequatur.', 0, 1, 28, '2019-06-01 14:34:34', '2019-06-01 14:34:34'),
(15, 'http://www.lockman.com/', 'Excepturi quo commodi cupiditate.', 'Dolorem impedit quaerat ab eum quae provident aut. Et cupiditate laudantium nemo eos nihil voluptatum rerum. Quo ea quas in.', 0, 1, 243, '2019-06-01 14:34:34', '2019-06-01 14:34:34'),
(16, 'http://www.klein.com/', 'Sit id vel eligendi et suscipit non.', 'Voluptas voluptas qui sequi et quo. Laborum voluptatem modi et quisquam quaerat. Repellendus et libero autem odit delectus ea odit.', 1, 1, 127, '2019-06-01 14:34:34', '2019-06-01 14:34:34'),
(17, 'http://powlowski.com/', 'Repudiandae expedita non expedita quis est quibusdam.', 'Quam non quasi voluptatem. Laborum quam voluptas et dolor reiciendis. Blanditiis ipsa quae libero qui.', 0, 1, 109, '2019-06-01 14:34:34', '2019-06-01 14:34:34'),
(18, 'https://berge.com/nisi-recusandae-vitae-non.html', 'Sint est enim non autem vitae atque et.', 'Porro facilis tempora eos dolorem veniam et quam. Est autem magnam ad non aliquid omnis. Ut ea et quasi velit sunt.', 0, 1, 99, '2019-06-01 14:34:34', '2019-06-01 14:34:34'),
(19, 'http://halvorson.org/', 'Voluptates ea facere aut minima ea quo aliquam.', 'Aut accusamus numquam occaecati. Dolorem perspiciatis et non ipsum velit. Ut soluta sit vel minus.', 1, 1, 145, '2019-06-01 14:34:34', '2019-06-01 14:34:34'),
(20, 'http://deckow.com/qui-consectetur-iste-incidunt-illum-provident-molestias.html', 'Et voluptate illum ducimus quae.', 'Ut aspernatur voluptas et aut beatae. Libero non rerum ipsam ipsum. Quis fugiat officia blanditiis illum culpa ut autem.', 0, 1, 9, '2019-06-01 14:34:34', '2019-06-01 14:34:34'),
(21, 'https://www.runolfsson.com/laboriosam-consequatur-ullam-repellat-doloribus', 'Soluta blanditiis ut suscipit iure architecto corporis.', 'Voluptatibus aut eum est ratione consectetur est impedit quia. Id nostrum ratione sunt quis est deserunt reiciendis. Odit aut reprehenderit officiis autem sint eum totam.', 1, 1, 173, '2019-06-01 14:34:34', '2019-06-01 14:34:34'),
(22, 'http://willms.com/qui-cumque-nam-fuga-tempore-alias', 'Eveniet aliquid recusandae sunt qui sint ut.', 'Aliquid quaerat in beatae exercitationem perferendis eaque consequatur. Nemo et sit sunt repudiandae eos. Quia quibusdam accusamus minus non debitis iure et.', 0, 1, 243, '2019-06-01 14:34:35', '2019-06-01 14:34:35'),
(23, 'http://www.dickinson.com/impedit-velit-dolorem-quaerat-in-minus-qui', 'Aut delectus aliquid iste impedit.', 'Asperiores corporis omnis voluptatem tempore ducimus architecto. Voluptatem molestias labore expedita et veniam quae molestiae. Delectus hic dolorem asperiores enim.', 1, 1, 251, '2019-06-01 14:34:35', '2019-06-01 14:34:35'),
(24, 'http://shields.com/', 'Ut at omnis in fuga.', 'Recusandae dignissimos quo repellendus voluptatibus inventore temporibus nobis. Rem quia voluptatum quam repellendus temporibus et nisi. Vel nihil eum sed voluptatum inventore quas.', 0, 1, 106, '2019-06-01 14:34:35', '2019-06-01 14:34:35'),
(25, 'http://bartell.net/eius-sint-explicabo-iure-nihil', 'Architecto aut culpa ipsa voluptatem necessitatibus ipsum temporibus.', 'Reiciendis sapiente officia adipisci neque assumenda. Veritatis consequatur at tempore mollitia optio tenetur qui maiores. Aspernatur odio expedita ipsam in veniam.', 0, 1, 184, '2019-06-01 14:34:35', '2019-06-01 14:34:35'),
(26, 'http://www.mertz.com/iure-magni-omnis-qui-maiores-rerum', 'Necessitatibus illo rerum et qui eos est quod.', 'Fugit recusandae pariatur porro aut repellendus fugit. Est id id voluptatem nulla eaque in. Natus quia praesentium dignissimos non eaque accusamus.', 0, 1, 232, '2019-06-01 14:34:35', '2019-06-01 14:34:35'),
(27, 'http://swift.com/', 'Doloremque similique magni et suscipit.', 'Nihil dolore nam qui expedita sequi. Et porro placeat atque in labore. Nihil culpa id aut eos rerum deleniti dolores.', 0, 1, 28, '2019-06-01 14:34:35', '2019-06-01 14:34:35'),
(28, 'http://emmerich.com/', 'Voluptatem aut et voluptatibus quis et.', 'Rem aspernatur suscipit nam repellendus non dignissimos. Aut alias inventore et inventore eum. Sed fugiat consequuntur voluptatem incidunt voluptates expedita.', 0, 1, 252, '2019-06-01 14:34:35', '2019-06-01 14:34:35'),
(29, 'https://rolfson.info/tempore-voluptatem-ipsum-ut-incidunt-molestiae-ea-totam-hic.html', 'Labore autem quibusdam aliquam ut aliquid eos magni animi.', 'Dolorem repellendus porro incidunt ut dolorem et itaque hic. Id delectus aliquid voluptas qui. Mollitia et perferendis similique quis est suscipit sint.', 1, 1, 249, '2019-06-01 14:34:35', '2019-06-01 14:34:35'),
(30, 'http://cronin.com/et-unde-corporis-recusandae-dolorem-autem', 'Et eos quibusdam non et.', 'Qui rem voluptates voluptatum aut in ipsum quas aperiam. Eos voluptatum facere fuga aut autem nulla. Perferendis distinctio possimus exercitationem dignissimos.', 1, 1, 219, '2019-06-01 14:34:35', '2019-06-01 14:34:35'),
(31, 'http://lowe.com/', 'Inventore minima repellendus illo sint aperiam doloremque.', 'Velit repellat quo doloremque ratione officiis adipisci. Amet dolor blanditiis ratione soluta. Repellat aut molestias consequatur sit aliquid voluptates voluptatibus similique.', 1, 1, 247, '2019-06-01 14:34:35', '2019-06-01 14:34:35'),
(32, 'https://dach.biz/quibusdam-sed-omnis-non-quis.html', 'Totam in consequatur animi vero aut doloremque deleniti.', 'Voluptates dolorum et a eum voluptatem pariatur. Natus ipsam odit officia eos culpa ipsum officia. Sapiente est atque expedita sunt quia vitae.', 0, 1, 211, '2019-06-01 14:34:35', '2019-06-01 14:34:35'),
(33, 'http://jakubowski.com/aperiam-nesciunt-excepturi-enim-nesciunt-non.html', 'Neque expedita aspernatur aperiam omnis voluptatem et.', 'Et ea nisi possimus rerum dolores rerum officia. Asperiores nemo sapiente omnis consequatur quidem. Qui et debitis quia eligendi error.', 1, 1, 109, '2019-06-01 14:34:35', '2019-06-01 14:34:35'),
(34, 'http://www.bartell.biz/', 'Repellendus inventore quisquam ratione unde ea facilis.', 'Ullam voluptatibus sit voluptatem accusamus omnis. Alias ut qui rerum et ut ducimus cum. Doloremque maxime unde deserunt nostrum.', 1, 1, 207, '2019-06-01 14:34:35', '2019-06-01 14:34:35'),
(35, 'http://dubuque.biz/suscipit-ut-voluptatem-facere-labore-et', 'Veritatis et tempore quibusdam autem molestiae sit officiis accusantium.', 'Inventore vel eum necessitatibus consequuntur eos tenetur. Illo cum quas ratione. Eos quae consectetur nemo sed.', 1, 1, 5, '2019-06-01 14:34:35', '2019-06-01 14:34:35'),
(36, 'http://www.windler.com/porro-quia-doloremque-alias-nihil-dolorem-sint-sed.html', 'Impedit eum earum sit qui corrupti est nesciunt.', 'Velit quasi sunt accusantium reiciendis sit. Ut consequatur autem culpa nam. Ut minus at voluptatem ut ab.', 1, 1, 218, '2019-06-01 14:34:35', '2019-06-01 14:34:35'),
(37, 'https://www.hilpert.com/quo-amet-accusantium-est-omnis', 'Quaerat dolorum voluptatem magnam ut in.', 'Qui similique illum sed optio numquam ea non. Est qui tempora asperiores perspiciatis. Consequatur vero at enim ducimus nobis quis unde.', 1, 1, 69, '2019-06-01 14:34:35', '2019-06-01 14:34:35'),
(38, 'http://www.schumm.info/', 'Aliquid cupiditate cupiditate ducimus reprehenderit quia eum quo recusandae.', 'Ad accusamus cumque aliquid minus ducimus. Magnam sit nesciunt eos adipisci odio sunt eveniet. Consequatur sunt sed doloremque deserunt molestias.', 0, 1, 175, '2019-06-01 14:34:35', '2019-06-01 14:34:35'),
(39, 'http://www.damore.net/animi-sunt-in-labore-veniam-asperiores-facilis-nisi', 'Qui necessitatibus fuga sapiente dolor.', 'Eos corrupti ducimus illo odio dolores qui. Ipsum dolores ut soluta sequi. Dolores a non in suscipit.', 1, 1, 33, '2019-06-01 14:34:35', '2019-06-01 14:34:35'),
(40, 'http://jaskolski.com/rerum-dolorum-excepturi-molestiae-voluptas-illo-tenetur', 'Rem doloremque vel consequatur nisi fugiat dignissimos culpa.', 'Exercitationem sunt laborum omnis nostrum. Sed nam quis repellat aut dolor maxime omnis ab. Placeat est nisi delectus qui soluta quae accusamus.', 0, 1, 83, '2019-06-01 14:34:35', '2019-06-01 14:34:35'),
(41, 'http://www.spinka.com/', 'Doloremque harum enim quos cupiditate incidunt.', 'Similique pariatur accusantium quia neque ad rem provident. Laborum consequatur eveniet ea nostrum voluptatibus consequatur. Itaque voluptatem omnis iste repellendus quos aliquid.', 0, 1, 103, '2019-06-01 14:34:35', '2019-06-01 14:34:35'),
(42, 'http://www.mann.com/blanditiis-praesentium-nostrum-labore-est-libero-ut-molestias.html', 'Laborum autem dolores et fuga consequatur beatae excepturi.', 'Sint ex et impedit soluta. Tempora architecto unde necessitatibus velit magnam. Magni perspiciatis pariatur quia dolore.', 0, 1, 30, '2019-06-01 14:34:36', '2019-06-01 14:34:36'),
(43, 'http://wiza.net/', 'Consequatur amet inventore nisi voluptas.', 'Placeat voluptatibus sit ut hic dolor quam dolorem. Quos expedita exercitationem est et odio animi. Et eligendi odit est dolor iusto suscipit neque.', 1, 1, 146, '2019-06-01 14:34:36', '2019-06-01 14:34:36'),
(44, 'http://www.deckow.com/et-possimus-reprehenderit-laborum-ut-vel', 'Reprehenderit sapiente facere hic saepe eius nesciunt nulla.', 'Nihil quidem ut optio officiis qui. Impedit ea voluptatem dicta sit blanditiis. Labore quo quo et inventore culpa vel.', 1, 1, 121, '2019-06-01 14:34:36', '2019-06-01 14:34:36'),
(45, 'http://ryan.info/consequatur-minima-iste-corporis', 'Laudantium quos temporibus architecto qui.', 'Laborum quae voluptatem voluptatem ut. Esse sed quae quasi aut laboriosam a quibusdam. Eaque non voluptates aperiam possimus aspernatur.', 0, 1, 15, '2019-06-01 14:34:36', '2019-06-01 14:34:36'),
(46, 'http://kirlin.org/delectus-ea-dolorem-facilis', 'Tenetur consequatur porro tenetur quia voluptatibus.', 'Et necessitatibus sed quo ex omnis sint unde. Molestias repudiandae qui fugit facere debitis ut. Quibusdam quidem vitae et ducimus.', 0, 1, 115, '2019-06-01 14:34:36', '2019-06-01 14:34:36'),
(47, 'http://oconner.net/', 'Debitis culpa optio occaecati in.', 'Occaecati est debitis sint ullam ut vel. Cum placeat nesciunt inventore. Quam corrupti eos aut earum ut ut.', 0, 1, 33, '2019-06-01 14:34:36', '2019-06-01 14:34:36'),
(48, 'http://www.lubowitz.info/', 'Sequi delectus tenetur in eius provident enim.', 'Ipsam similique sint qui et dolor aut. Eos quia quisquam eum qui deleniti exercitationem. Id repellendus molestias praesentium quidem commodi quia sit cum.', 1, 1, 97, '2019-06-01 14:34:36', '2019-06-01 14:34:36'),
(49, 'http://ortiz.com/perferendis-repellat-qui-voluptatibus-nostrum', 'Quo deleniti dolorum nulla qui eos illum.', 'Facilis illum error dignissimos consequuntur necessitatibus. Minima minima ea et voluptas. Beatae commodi inventore nisi officia et.', 1, 1, 175, '2019-06-01 14:34:36', '2019-06-01 14:34:36'),
(50, 'http://bergstrom.com/', 'Ipsum rerum qui suscipit consequatur et consequatur.', 'Voluptate quos voluptatum eos numquam et est sit. Quis molestias officiis officia voluptas velit aliquam. Velit ex autem est laboriosam.', 0, 1, 174, '2019-06-01 14:34:36', '2019-06-01 14:34:36');

-- --------------------------------------------------------

--
-- Structure de la table `school_exams`
--

DROP TABLE IF EXISTS `school_exams`;
CREATE TABLE IF NOT EXISTS `school_exams` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `exam_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL,
  `notice_published` tinyint(4) NOT NULL,
  `result_published` tinyint(4) NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `term` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `start_date` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `end_date` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `school_exams`
--

INSERT INTO `school_exams` (`id`, `exam_name`, `active`, `notice_published`, `result_published`, `school_id`, `user_id`, `created_at`, `updated_at`, `term`, `start_date`, `end_date`) VALUES
(1, 'ea sed veniam', 0, 1, 1, 1, 64, '2019-06-01 14:34:54', '2019-06-01 14:34:54', 'Magnam ex inventore ', '1984-01-10 23:25:14', '1977-06-26 11:44:20'),
(2, 'rerum earum autem', 1, 0, 1, 1, 164, '2019-06-01 14:34:54', '2019-06-01 14:34:54', 'Consequatur incidunt', '1992-05-14 09:53:47', '2003-06-22 18:21:19'),
(3, 'qui eius vel', 0, 1, 0, 1, 97, '2019-06-01 14:34:54', '2019-06-01 14:34:54', 'Aut dolores ab excep', '1996-11-01 22:45:11', '2011-09-26 10:35:01'),
(4, 'ea enim ipsa', 1, 1, 1, 1, 156, '2019-06-01 14:34:54', '2019-06-01 14:34:54', 'Asperiores nostrum q', '1974-07-14 07:54:06', '1988-03-07 00:44:48'),
(5, 'et expedita illo', 1, 1, 1, 1, 151, '2019-06-01 14:34:54', '2019-06-01 14:34:54', 'Id corporis doloribu', '1990-07-14 07:49:58', '1973-03-16 11:06:34'),
(6, 'ducimus expedita laboriosam', 0, 0, 0, 1, 64, '2019-06-01 14:34:54', '2019-06-01 14:34:54', 'Dolor ut et aut iust', '1988-03-12 06:42:06', '2003-05-05 06:39:38'),
(7, 'et accusamus harum', 0, 0, 0, 1, 231, '2019-06-01 14:34:54', '2019-06-01 14:34:54', 'Ut rerum aut veritat', '2011-09-12 05:35:44', '2011-09-24 17:37:20'),
(8, 'illo et et', 0, 0, 0, 1, 58, '2019-06-01 14:34:54', '2019-06-01 14:34:54', 'Voluptas ut voluptat', '1988-06-17 08:52:51', '2018-04-03 23:26:51'),
(9, 'et animi aut', 1, 1, 1, 1, 217, '2019-06-01 14:34:54', '2019-06-01 14:34:54', 'A aut sint hic ut qu', '1994-09-30 03:54:22', '1986-04-12 00:41:21'),
(10, 'non nisi saepe', 0, 0, 0, 1, 180, '2019-06-01 14:34:54', '2019-06-01 14:34:54', 'Corrupti aut rem rei', '1994-01-23 10:47:50', '2005-10-22 20:26:49');

-- --------------------------------------------------------

--
-- Structure de la table `school_exam_for_classes`
--

DROP TABLE IF EXISTS `school_exam_for_classes`;
CREATE TABLE IF NOT EXISTS `school_exam_for_classes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `class_id` int(10) UNSIGNED NOT NULL,
  `exam_id` int(10) UNSIGNED NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `school_exam_for_classes`
--

INSERT INTO `school_exam_for_classes` (`id`, `class_id`, `exam_id`, `active`) VALUES
(1, 7, 2, 1),
(2, 8, 5, 1),
(3, 7, 4, 1),
(4, 11, 5, 0),
(5, 9, 2, 0),
(6, 10, 4, 1),
(7, 12, 2, 0),
(8, 1, 5, 0),
(9, 1, 5, 0),
(10, 9, 4, 0),
(11, 2, 2, 0),
(12, 7, 4, 0),
(13, 10, 4, 0),
(14, 4, 4, 1),
(15, 5, 5, 0),
(16, 8, 5, 1),
(17, 4, 5, 0),
(18, 8, 5, 1),
(19, 10, 9, 1),
(20, 4, 9, 1),
(21, 7, 4, 0),
(22, 2, 2, 1),
(23, 1, 2, 0),
(24, 12, 5, 1),
(25, 4, 2, 0),
(26, 12, 5, 0),
(27, 7, 9, 0),
(28, 10, 5, 1),
(29, 11, 5, 0),
(30, 1, 9, 1);

-- --------------------------------------------------------

--
-- Structure de la table `school_faqs`
--

DROP TABLE IF EXISTS `school_faqs`;
CREATE TABLE IF NOT EXISTS `school_faqs` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `school_faqs`
--

INSERT INTO `school_faqs` (`id`, `question`, `answer`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Velit aperiam nihil similique blanditiis eum nam voluptatibus qui.', 'Nemo qui ut est officia voluptates ea occaecati omnis. Unde a itaque sunt magnam. Tempora et quod vitae dolor veniam soluta.', 18, '2019-06-01 14:35:33', '2019-06-01 14:35:33'),
(2, 'Dolor voluptate qui velit soluta ducimus quos.', 'Pariatur cumque maiores vero ut distinctio. In incidunt aut sunt est. Omnis laboriosam eligendi aspernatur.', 207, '2019-06-01 14:35:33', '2019-06-01 14:35:33'),
(3, 'Quod deserunt et beatae recusandae iure.', 'Et eaque aliquid quaerat adipisci sunt. Adipisci dicta provident adipisci ratione animi. A unde tempora ab qui repellat iusto.', 38, '2019-06-01 14:35:33', '2019-06-01 14:35:33'),
(4, 'Odit eum quam blanditiis facere qui facilis ut.', 'Et maxime sit ad laboriosam nostrum. Eligendi facilis illum eos ex ut id. Nobis rerum eaque et ut sed enim nemo.', 56, '2019-06-01 14:35:33', '2019-06-01 14:35:33'),
(5, 'Debitis perspiciatis inventore quisquam praesentium laudantium.', 'Consequatur totam quisquam sunt fugit. Incidunt commodi praesentium quis neque inventore fugiat. Iusto perspiciatis eveniet qui reprehenderit deleniti qui quos.', 163, '2019-06-01 14:35:33', '2019-06-01 14:35:33'),
(6, 'Laboriosam veniam et dignissimos dolores recusandae.', 'Voluptas quia in nobis eos. Voluptas error nesciunt voluptate ipsum ipsa. Similique similique in deleniti consequuntur qui deleniti.', 79, '2019-06-01 14:35:33', '2019-06-01 14:35:33'),
(7, 'Expedita laboriosam hic nisi.', 'Corporis nesciunt iusto et ipsam est quia vero. Laudantium ad et explicabo rerum sed. Minima et in voluptatem.', 93, '2019-06-01 14:35:33', '2019-06-01 14:35:33'),
(8, 'Hic similique rerum enim excepturi id harum commodi.', 'Velit quaerat nemo et consequatur aliquid. Inventore corrupti distinctio voluptas possimus. Minus cupiditate provident deserunt consectetur quis et labore.', 174, '2019-06-01 14:35:33', '2019-06-01 14:35:33'),
(9, 'In in quaerat sit eveniet eos neque.', 'Animi et blanditiis ab facere. Cupiditate non dolores qui temporibus est. Aut unde recusandae est unde rerum voluptatem veniam.', 83, '2019-06-01 14:35:33', '2019-06-01 14:35:33'),
(10, 'Occaecati reiciendis fuga accusamus vel.', 'Quidem doloremque nobis doloremque. Sequi tempore nam voluptas quod voluptatem voluptatem minima. Cumque sunt illo illum sequi expedita alias.', 148, '2019-06-01 14:35:33', '2019-06-01 14:35:33'),
(11, 'Aliquam facilis velit dolorum ea optio ipsum et.', 'Saepe voluptatum magnam consequuntur modi ipsa quibusdam est. Eum est molestiae rerum quae omnis et soluta quia. Corporis ducimus ut eaque neque perspiciatis doloremque dicta ex.', 104, '2019-06-01 14:35:33', '2019-06-01 14:35:33'),
(12, 'Neque et atque corporis eum dolorum non.', 'Et dolores numquam qui dolor. Est nisi consequuntur magni necessitatibus nam. Iusto et dicta et voluptatibus est quo.', 210, '2019-06-01 14:35:34', '2019-06-01 14:35:34'),
(13, 'Iure consectetur odit autem quos.', 'Repellat repudiandae atque voluptatem sit. Qui rerum qui quidem magnam officiis. Aliquid repellat expedita distinctio dolorum perferendis.', 51, '2019-06-01 14:35:34', '2019-06-01 14:35:34'),
(14, 'Sit qui iure consectetur qui itaque.', 'Reprehenderit odit laborum dolores aliquid. Id excepturi delectus enim itaque. Ad vero libero officiis ipsa cupiditate nisi.', 15, '2019-06-01 14:35:34', '2019-06-01 14:35:34'),
(15, 'Sint ut esse eos.', 'Quo modi ut id aut commodi sed. Nulla similique enim ab maiores earum. Nulla laborum ex facere magni repellat a molestiae.', 147, '2019-06-01 14:35:34', '2019-06-01 14:35:34'),
(16, 'Est facere nihil occaecati aliquid vero omnis.', 'Dolores aut facere sit ea. Numquam cumque quod reprehenderit nam deserunt doloremque excepturi rerum. Soluta maiores eum voluptatem rem omnis.', 157, '2019-06-01 14:35:34', '2019-06-01 14:35:34'),
(17, 'Expedita ut molestias eum dolorem qui eveniet.', 'Doloribus fugit et deleniti autem dolor. Excepturi aliquam accusantium optio tenetur est explicabo. Officia corporis sed sed et.', 167, '2019-06-01 14:35:34', '2019-06-01 14:35:34'),
(18, 'Necessitatibus neque quo voluptatem dolores.', 'Recusandae eius ea adipisci. Quos asperiores nisi eum sed libero voluptatem. Sint repellat distinctio in est.', 156, '2019-06-01 14:35:35', '2019-06-01 14:35:35'),
(19, 'Eius non et nemo.', 'Sunt incidunt dolore perferendis aut sint. Sit ipsam quo numquam perspiciatis. Sit facilis nostrum et qui saepe necessitatibus quo libero.', 91, '2019-06-01 14:35:35', '2019-06-01 14:35:35'),
(20, 'Quaerat fugiat doloremque quisquam.', 'Qui magni illum commodi magni voluptatum. Aliquid expedita odio est odio. Reiciendis sint pariatur voluptate aut rerum voluptatem.', 191, '2019-06-01 14:35:35', '2019-06-01 14:35:35'),
(21, 'Voluptatibus voluptatum vero eaque eveniet soluta optio.', 'Alias sed id aperiam quod quae. Amet ut totam at dolorem. Velit saepe suscipit earum sint vitae mollitia.', 99, '2019-06-01 14:35:35', '2019-06-01 14:35:35'),
(22, 'Ad eligendi in modi quasi ut quidem dolor voluptates.', 'Qui impedit nisi dolorem. Qui voluptas nobis impedit vel pariatur quam enim deleniti. Dolore repellendus eligendi consequuntur eum et.', 27, '2019-06-01 14:35:35', '2019-06-01 14:35:35'),
(23, 'Laboriosam occaecati ut ut recusandae atque animi.', 'Ipsum aspernatur voluptate error doloremque dolorem. Aut error laboriosam tenetur sed rerum eum praesentium recusandae. Et vitae accusamus doloribus eius numquam numquam.', 231, '2019-06-01 14:35:35', '2019-06-01 14:35:35'),
(24, 'Laboriosam voluptatem sit sunt.', 'Impedit eum sunt quia qui eos. Autem et repellendus occaecati maiores sit et et. Atque velit quo unde illum.', 137, '2019-06-01 14:35:35', '2019-06-01 14:35:35'),
(25, 'Hic laborum dolor corrupti.', 'Facere reiciendis aliquam enim aut. In eos dolores laborum. Libero repellendus reiciendis accusantium id.', 16, '2019-06-01 14:35:35', '2019-06-01 14:35:35'),
(26, 'Dolor quia consequatur non nobis.', 'Quia asperiores consequatur eos officia quo. Aspernatur praesentium tempore quaerat rem. Quo vel eligendi soluta itaque.', 138, '2019-06-01 14:35:35', '2019-06-01 14:35:35'),
(27, 'Rem architecto debitis consequatur quis vel.', 'Consequatur consequatur blanditiis asperiores iusto. Iusto veniam beatae aut mollitia. Commodi veritatis aliquid praesentium non.', 21, '2019-06-01 14:35:35', '2019-06-01 14:35:35'),
(28, 'Dolorem blanditiis ducimus quo.', 'Qui quae voluptatem dolorum nam consequatur. Ea qui voluptatem est consequatur ut. Sed quidem nesciunt voluptatem quia.', 24, '2019-06-01 14:35:35', '2019-06-01 14:35:35'),
(29, 'Mollitia facilis alias qui magni rem.', 'Aperiam esse perspiciatis aut nesciunt culpa illum. Soluta laudantium est laborum aut hic laborum. Veniam incidunt vitae vel aliquam et cumque deserunt suscipit.', 245, '2019-06-01 14:35:35', '2019-06-01 14:35:35'),
(30, 'Vero est sit aut quae ut qui quas dignissimos.', 'Velit non aperiam odio sunt ipsam. Sunt autem a sequi vel. Dignissimos ut et et quidem aut officiis.', 198, '2019-06-01 14:35:35', '2019-06-01 14:35:35'),
(31, 'Fugit omnis et doloremque aut perferendis.', 'Et quas aut minus ipsum molestiae inventore est molestiae. Cumque numquam vel expedita. Praesentium possimus laboriosam id ut natus voluptatum laboriosam.', 188, '2019-06-01 14:35:35', '2019-06-01 14:35:35'),
(32, 'Consequatur et est atque sed et explicabo.', 'Modi exercitationem doloremque ratione culpa. Magnam hic necessitatibus recusandae esse suscipit recusandae sequi. Molestiae iusto dolores veniam quam.', 119, '2019-06-01 14:35:35', '2019-06-01 14:35:35'),
(33, 'Est dolorem excepturi et maxime sit ullam in.', 'Minus culpa culpa doloremque natus deserunt sit asperiores. Fugiat omnis aut voluptas sunt earum dolorem ut. Quia repellendus voluptate qui molestias qui.', 224, '2019-06-01 14:35:35', '2019-06-01 14:35:35'),
(34, 'Impedit eum quos non expedita magni explicabo aliquid.', 'Aut reiciendis at laudantium velit fugiat suscipit. Et doloribus ut minus sed eaque eum. Qui vero ab voluptatem magnam.', 260, '2019-06-01 14:35:35', '2019-06-01 14:35:35'),
(35, 'Maxime architecto veniam ut qui.', 'Blanditiis impedit quis architecto quia sapiente quia et mollitia. Cum voluptate et consequatur consequuntur. Eveniet explicabo beatae debitis assumenda saepe.', 37, '2019-06-01 14:35:35', '2019-06-01 14:35:35'),
(36, 'Numquam at sit ea laboriosam maxime animi.', 'Voluptas incidunt inventore doloremque explicabo sit repellat. Nam voluptatum necessitatibus enim. Quia aspernatur eos temporibus suscipit voluptates rerum.', 42, '2019-06-01 14:35:36', '2019-06-01 14:35:36'),
(37, 'Voluptates praesentium voluptas qui sit iste et consequatur.', 'Fuga a ab repellat corporis pariatur modi quia. Quia voluptatem ipsum doloribus qui dolorem vel facere. Magnam laboriosam odio eos ut.', 141, '2019-06-01 14:35:36', '2019-06-01 14:35:36'),
(38, 'Quia sint recusandae eligendi officia laborum praesentium dolorem.', 'Nostrum dicta asperiores molestias itaque eum aut. Impedit possimus eius consequuntur accusamus. Officiis numquam enim ut aut eius.', 63, '2019-06-01 14:35:36', '2019-06-01 14:35:36'),
(39, 'Eum et facilis vel qui.', 'Nihil vel ut sint cum molestiae. Commodi impedit quo perferendis id iusto id. Architecto sed voluptates neque repellendus asperiores ullam explicabo.', 140, '2019-06-01 14:35:36', '2019-06-01 14:35:36'),
(40, 'Est cupiditate iure in quae animi soluta natus.', 'Et aperiam aut optio rerum possimus. Similique reprehenderit eaque reprehenderit odio esse voluptate amet. In quod sapiente non molestiae aut expedita.', 46, '2019-06-01 14:35:36', '2019-06-01 14:35:36'),
(41, 'Sed praesentium repellat cupiditate expedita vel aut.', 'Rerum aut aut nam adipisci aut architecto. Repellendus qui sapiente et maiores. Qui architecto sed quaerat aut veritatis reiciendis.', 140, '2019-06-01 14:35:36', '2019-06-01 14:35:36'),
(42, 'Rerum natus voluptate iste voluptatem molestiae.', 'Dicta quia delectus blanditiis explicabo qui. Eaque quibusdam architecto qui ipsam id accusantium. Mollitia eum molestiae praesentium explicabo rerum quis.', 112, '2019-06-01 14:35:36', '2019-06-01 14:35:36'),
(43, 'Expedita pariatur hic a magnam aspernatur dolores numquam voluptatem.', 'Assumenda commodi ea fuga sint voluptas harum est facilis. Amet quos quaerat laborum illum et. At non dolorem sunt repellendus.', 84, '2019-06-01 14:35:36', '2019-06-01 14:35:36'),
(44, 'Non dolor voluptas dignissimos totam architecto.', 'Omnis error vel ut iusto natus. Ratione sunt fugit ut nisi. Rem doloremque deserunt reiciendis sit.', 139, '2019-06-01 14:35:36', '2019-06-01 14:35:36'),
(45, 'Et quia deserunt rerum impedit iste ut recusandae ut.', 'Modi animi autem debitis incidunt reprehenderit. Eligendi inventore sed at quam quia voluptates vitae qui. In praesentium neque optio consequuntur quae optio.', 200, '2019-06-01 14:35:36', '2019-06-01 14:35:36'),
(46, 'Veniam qui dolores magni non placeat reprehenderit asperiores.', 'Saepe eius quibusdam assumenda ullam consequatur minus. Tempore repellat at est delectus. Quos optio beatae quod odit non a illo.', 187, '2019-06-01 14:35:36', '2019-06-01 14:35:36'),
(47, 'Est numquam repellendus consequatur consequatur aliquid magni sint.', 'Ut ea est non quidem excepturi. Est natus temporibus ipsum molestiae fugiat. Rerum impedit doloribus aut veritatis vitae.', 96, '2019-06-01 14:35:36', '2019-06-01 14:35:36'),
(48, 'Aliquam blanditiis excepturi molestias ut in harum.', 'Et corporis numquam excepturi debitis voluptas tempora. Consequatur quaerat illo cum odio fuga mollitia. Optio ut sint qui molestias officia harum illo.', 188, '2019-06-01 14:35:36', '2019-06-01 14:35:36'),
(49, 'Fugit sit rerum cum optio dolores.', 'Esse earum aut natus vel id. Qui voluptas sed numquam sed nesciunt non excepturi. Iure pariatur pariatur eos sunt qui.', 116, '2019-06-01 14:35:36', '2019-06-01 14:35:36'),
(50, 'Cum architecto fuga odio et laborum.', 'Qui delectus temporibus culpa velit. Eligendi magni consectetur aliquid eos repellendus atque doloremque. Sequi mollitia ratione neque laboriosam molestiae.', 219, '2019-06-01 14:35:36', '2019-06-01 14:35:36');

-- --------------------------------------------------------

--
-- Structure de la table `school_feedbacks`
--

DROP TABLE IF EXISTS `school_feedbacks`;
CREATE TABLE IF NOT EXISTS `school_feedbacks` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `school_feedbacks`
--

INSERT INTO `school_feedbacks` (`id`, `description`, `teacher_id`, `student_id`, `created_at`, `updated_at`) VALUES
(1, 'Et architecto aut voluptates sapiente dignissimos. Omnis omnis ut nobis blanditiis magnam nemo. Commodi voluptas dolorem aliquam reprehenderit officiis nisi qui ullam.', 45, 101, '2019-06-01 14:35:10', '2019-06-01 14:35:10'),
(2, 'Quia quam et amet labore. Commodi commodi quae amet error in impedit a. Sint nihil ut similique harum.', 41, 146, '2019-06-01 14:35:10', '2019-06-01 14:35:10'),
(3, 'Dolorum culpa asperiores consequuntur laborum omnis id. Enim in veniam quia sed corporis vero et quia. Voluptatum deserunt magni ut odit ipsa sequi.', 35, 168, '2019-06-01 14:35:11', '2019-06-01 14:35:11'),
(4, 'Rerum molestiae sunt eum magnam. Odit quos tempore dolorem dolor. Dignissimos qui ad quasi vel harum.', 59, 260, '2019-06-01 14:35:11', '2019-06-01 14:35:11'),
(5, 'Ullam quos et dolorum error explicabo assumenda cum. Quasi dolorem sed ex accusamus. Accusamus cupiditate sint qui quasi praesentium magni.', 45, 86, '2019-06-01 14:35:11', '2019-06-01 14:35:11'),
(6, 'Architecto suscipit et architecto vel consequuntur. Consectetur neque eum et ullam. Necessitatibus natus quo nam ut cumque in ut.', 37, 104, '2019-06-01 14:35:11', '2019-06-01 14:35:11'),
(7, 'Libero voluptas qui commodi dolorem. Voluptas quo et alias possimus voluptatem dicta laudantium. Est voluptatum eaque impedit illo qui dolores eaque possimus.', 60, 71, '2019-06-01 14:35:11', '2019-06-01 14:35:11'),
(8, 'Ipsam odit est aut qui enim. Omnis eaque similique consequatur error illo. Consequatur exercitationem aspernatur veniam quo officia dolores.', 40, 118, '2019-06-01 14:35:11', '2019-06-01 14:35:11'),
(9, 'Repellat voluptas error consequatur non recusandae veritatis accusamus et. Ipsa a quaerat vero alias dolores accusantium voluptatem. Doloribus omnis quo quidem expedita maxime ea saepe.', 56, 168, '2019-06-01 14:35:11', '2019-06-01 14:35:11'),
(10, 'Totam et rerum et dolor accusantium inventore illum. Laudantium nihil dolorem et explicabo beatae. Maxime non dolores sit vel eveniet ipsa non.', 48, 219, '2019-06-01 14:35:11', '2019-06-01 14:35:11'),
(11, 'Provident ratione dolore qui. Quo odio rerum aut beatae. Pariatur molestiae rerum delectus quos.', 59, 115, '2019-06-01 14:35:11', '2019-06-01 14:35:11'),
(12, 'In mollitia quibusdam ea eum aut. Praesentium similique officia nemo mollitia repellat et possimus molestias. Nam nihil architecto delectus nemo est corrupti qui laboriosam.', 45, 102, '2019-06-01 14:35:11', '2019-06-01 14:35:11'),
(13, 'Amet hic voluptate maxime perspiciatis et error dolor. Sed commodi animi optio expedita. Quam quo ut totam deleniti aliquam explicabo maiores.', 35, 211, '2019-06-01 14:35:11', '2019-06-01 14:35:11'),
(14, 'Incidunt accusamus cupiditate ut et repellendus nihil accusamus. Voluptatem facere labore sit. Voluptatem aliquam quasi delectus veniam et nihil.', 41, 131, '2019-06-01 14:35:11', '2019-06-01 14:35:11'),
(15, 'Voluptas est harum ullam aut error explicabo consequatur. Ad ipsa at dolorum quaerat perferendis et corporis. Qui cum consectetur autem corporis ut quia nam quis.', 54, 162, '2019-06-01 14:35:11', '2019-06-01 14:35:11'),
(16, 'Culpa quo sapiente corrupti ipsam similique voluptatem. Quibusdam ex non consectetur doloremque earum quis corrupti nulla. Qui commodi suscipit fugiat.', 45, 209, '2019-06-01 14:35:11', '2019-06-01 14:35:11'),
(17, 'Rerum aut qui inventore molestiae inventore hic ut autem. Nam atque architecto doloremque quia commodi. Officiis pariatur est omnis quaerat delectus aut dolores.', 58, 159, '2019-06-01 14:35:11', '2019-06-01 14:35:11'),
(18, 'Rerum voluptatem ut et dignissimos reiciendis aperiam in. Corrupti animi dignissimos mollitia et. Laborum animi tempore atque sunt.', 38, 180, '2019-06-01 14:35:11', '2019-06-01 14:35:11'),
(19, 'Occaecati dolor quia nobis corrupti laborum. Facilis porro at aliquid fugiat aut. Sed iusto et rem sequi corporis voluptas autem labore.', 58, 102, '2019-06-01 14:35:11', '2019-06-01 14:35:11'),
(20, 'Id adipisci corporis blanditiis et hic perferendis quisquam. Tempore hic itaque quia molestiae quisquam voluptatem impedit. Aspernatur incidunt dolore unde et aut.', 54, 229, '2019-06-01 14:35:12', '2019-06-01 14:35:12'),
(21, 'Quam omnis ipsum dignissimos dolor tenetur ut. Eveniet voluptatem accusantium aspernatur minus eligendi laborum harum. Quas dignissimos nihil est dolores.', 37, 127, '2019-06-01 14:35:12', '2019-06-01 14:35:12'),
(22, 'Praesentium placeat non quod maxime. Rem occaecati quia quaerat officiis. Sed atque beatae aperiam pariatur et sunt consequatur dolorum.', 38, 239, '2019-06-01 14:35:12', '2019-06-01 14:35:12'),
(23, 'Ut minima cupiditate alias ut illum. Officia ullam atque ut unde ut. Tempore facilis neque dolor dolore atque est in nostrum.', 52, 78, '2019-06-01 14:35:12', '2019-06-01 14:35:12'),
(24, 'Qui iusto consectetur aut molestiae et vel. Sapiente fugiat eum quo dicta consequuntur dolor. Ad repellat aliquam fuga quos.', 53, 190, '2019-06-01 14:35:12', '2019-06-01 14:35:12'),
(25, 'Pariatur quas eveniet porro eum. Ut sit aut voluptatibus nihil cumque vitae. Eos aut nihil autem quis.', 59, 94, '2019-06-01 14:35:12', '2019-06-01 14:35:12'),
(26, 'Quaerat sit eaque eveniet consectetur quia. Voluptatibus aut ullam quis optio natus. Voluptas qui explicabo tempore velit.', 52, 88, '2019-06-01 14:35:12', '2019-06-01 14:35:12'),
(27, 'Id voluptas sed est consectetur. Minus quo qui labore a cumque dolorem. Ab enim sit unde nesciunt adipisci et.', 49, 168, '2019-06-01 14:35:12', '2019-06-01 14:35:12'),
(28, 'Possimus cupiditate facere ut. Quia magni rem est ex tempore. Molestias necessitatibus earum ipsam atque.', 35, 176, '2019-06-01 14:35:12', '2019-06-01 14:35:12'),
(29, 'Doloremque maiores placeat velit modi. Cumque laboriosam ex illum quis ad. Ea et sunt quis quos.', 61, 232, '2019-06-01 14:35:12', '2019-06-01 14:35:12'),
(30, 'Qui nihil nobis aut ut aut autem magni nihil. Ut odit ut ut iure voluptate. Aut necessitatibus maxime illo blanditiis nostrum.', 58, 171, '2019-06-01 14:35:12', '2019-06-01 14:35:12'),
(31, 'Sint magni ea labore distinctio eos. Omnis dolorem aut omnis quam. Natus commodi fugiat temporibus nobis quasi.', 45, 195, '2019-06-01 14:35:13', '2019-06-01 14:35:13'),
(32, 'In quibusdam et deleniti qui excepturi hic. Praesentium alias quisquam sed enim. Et est unde molestiae adipisci.', 52, 78, '2019-06-01 14:35:13', '2019-06-01 14:35:13'),
(33, 'Ut ut voluptatem incidunt natus. Voluptatum sit recusandae a id. Nesciunt autem dolore rerum libero.', 40, 201, '2019-06-01 14:35:13', '2019-06-01 14:35:13'),
(34, 'Autem fugit tempore blanditiis iste. Consectetur dolor sint repudiandae incidunt provident provident. Tempora quia recusandae totam voluptatem.', 33, 88, '2019-06-01 14:35:13', '2019-06-01 14:35:13'),
(35, 'Harum vitae accusamus est laborum ipsam totam aliquam. Aut maiores ut veniam aut. Assumenda dolorem et qui eos pariatur dolor repellendus.', 57, 105, '2019-06-01 14:35:13', '2019-06-01 14:35:13'),
(36, 'Eligendi cumque ut quaerat sit autem alias totam. Corrupti corrupti itaque tempora praesentium exercitationem. Et qui qui voluptatum quod.', 57, 246, '2019-06-01 14:35:13', '2019-06-01 14:35:13'),
(37, 'Est dolore laborum labore maxime. Enim quasi et velit voluptates consequuntur vitae fugit. Excepturi molestias inventore eius deserunt non sint veritatis.', 61, 211, '2019-06-01 14:35:13', '2019-06-01 14:35:13'),
(38, 'Et adipisci facere unde modi. Eaque natus culpa ea sed exercitationem impedit aut et. Praesentium quis quibusdam itaque sunt aut reprehenderit.', 50, 189, '2019-06-01 14:35:13', '2019-06-01 14:35:13'),
(39, 'Quia consectetur facilis repellendus in delectus provident. Consequatur exercitationem odit est quaerat in consequuntur. Aliquam excepturi nisi nihil doloremque tempore.', 34, 261, '2019-06-01 14:35:13', '2019-06-01 14:35:13'),
(40, 'Voluptatem sint cupiditate nihil explicabo ab enim. Odit repellendus temporibus fuga. Velit eos doloremque ut officiis animi delectus quo.', 52, 158, '2019-06-01 14:35:13', '2019-06-01 14:35:13'),
(41, 'Expedita repellat illum molestiae sit et ipsa. In nihil fuga aut quisquam. Eos quod quo et sed est explicabo aliquam.', 43, 83, '2019-06-01 14:35:13', '2019-06-01 14:35:13'),
(42, 'Repellendus sint sed totam exercitationem nihil. Consequatur tenetur tempore et ea accusantium. Nam et aliquam natus distinctio.', 55, 83, '2019-06-01 14:35:14', '2019-06-01 14:35:14'),
(43, 'Voluptates ratione temporibus aut id dolorem et fugit omnis. Animi ad aliquid magnam ut reprehenderit voluptas animi. Asperiores amet corrupti voluptates molestias molestiae saepe eos dolorum.', 61, 64, '2019-06-01 14:35:14', '2019-06-01 14:35:14'),
(44, 'Eaque illum quod unde saepe ad. Non hic exercitationem et voluptatem tenetur. Deleniti quia non ut ullam tenetur.', 57, 242, '2019-06-01 14:35:14', '2019-06-01 14:35:14'),
(45, 'Voluptates recusandae aperiam et quisquam doloremque est natus. Officiis cumque dignissimos nesciunt accusamus consequuntur consequatur. Iure voluptatibus at aut aut.', 33, 226, '2019-06-01 14:35:14', '2019-06-01 14:35:14'),
(46, 'Rem ratione voluptatem est voluptates voluptate. Eius quaerat eaque voluptatem. Fugiat nisi voluptatem ratione sint nihil odit officiis occaecati.', 56, 62, '2019-06-01 14:35:14', '2019-06-01 14:35:14'),
(47, 'Temporibus saepe quo eaque velit aspernatur. Praesentium in tenetur veniam aut id. Ea nobis doloribus nulla modi aut atque.', 35, 93, '2019-06-01 14:35:14', '2019-06-01 14:35:14'),
(48, 'Rerum eum ducimus ut maxime molestias quisquam. Consequatur voluptatem eum saepe id. Nesciunt fugiat qui et commodi rerum sit illo.', 40, 88, '2019-06-01 14:35:14', '2019-06-01 14:35:14'),
(49, 'Quasi voluptatem culpa quasi esse id et. Dolor nam explicabo reiciendis rerum autem. Vero sint nihil cumque qui aspernatur.', 51, 214, '2019-06-01 14:35:14', '2019-06-01 14:35:14'),
(50, 'Et maxime aut expedita nemo. Odit eligendi fuga sunt laboriosam. Et quod excepturi est quasi dolore culpa.', 42, 177, '2019-06-01 14:35:14', '2019-06-01 14:35:14');

-- --------------------------------------------------------

--
-- Structure de la table `school_fees`
--

DROP TABLE IF EXISTS `school_fees`;
CREATE TABLE IF NOT EXISTS `school_fees` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fee_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `school_fees`
--

INSERT INTO `school_fees` (`id`, `fee_name`, `school_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Kevon Kshlerin', 1, 192, '2019-06-01 14:34:36', '2019-06-01 14:34:36'),
(2, 'Bradley Leffler', 1, 161, '2019-06-01 14:34:36', '2019-06-01 14:34:36'),
(3, 'Arne Beer', 1, 21, '2019-06-01 14:34:36', '2019-06-01 14:34:36'),
(4, 'Miss Vena Moen', 1, 22, '2019-06-01 14:34:37', '2019-06-01 14:34:37'),
(5, 'Jace Gislason', 1, 49, '2019-06-01 14:34:37', '2019-06-01 14:34:37'),
(6, 'Cody Schuppe', 1, 220, '2019-06-01 14:34:37', '2019-06-01 14:34:37'),
(7, 'Dr. Natasha Larson PhD', 1, 89, '2019-06-01 14:34:37', '2019-06-01 14:34:37'),
(8, 'Noemy Hirthe', 1, 190, '2019-06-01 14:34:37', '2019-06-01 14:34:37'),
(9, 'Prof. Zena Ondricka', 1, 132, '2019-06-01 14:34:37', '2019-06-01 14:34:37'),
(10, 'Pauline Ebert', 1, 124, '2019-06-01 14:34:37', '2019-06-01 14:34:37'),
(11, 'Misty Rutherford', 1, 194, '2019-06-01 14:34:37', '2019-06-01 14:34:37'),
(12, 'Peyton Welch', 1, 154, '2019-06-01 14:34:37', '2019-06-01 14:34:37'),
(13, 'Candelario Lind Jr.', 1, 18, '2019-06-01 14:34:37', '2019-06-01 14:34:37'),
(14, 'Gus Kuhic Sr.', 1, 152, '2019-06-01 14:34:37', '2019-06-01 14:34:37'),
(15, 'Vickie Leannon I', 1, 215, '2019-06-01 14:34:38', '2019-06-01 14:34:38'),
(16, 'Sasha Ledner', 1, 56, '2019-06-01 14:34:38', '2019-06-01 14:34:38'),
(17, 'Davon Hand', 1, 148, '2019-06-01 14:34:38', '2019-06-01 14:34:38'),
(18, 'Mrs. Vicky Hoppe', 1, 158, '2019-06-01 14:34:38', '2019-06-01 14:34:38'),
(19, 'Jesus Goyette', 1, 107, '2019-06-01 14:34:38', '2019-06-01 14:34:38'),
(20, 'Kamron Blanda V', 1, 219, '2019-06-01 14:34:38', '2019-06-01 14:34:38'),
(21, 'Prof. Roosevelt Mohr PhD', 1, 68, '2019-06-01 14:34:38', '2019-06-01 14:34:38'),
(22, 'Jordyn Ondricka', 1, 31, '2019-06-01 14:34:38', '2019-06-01 14:34:38'),
(23, 'Cordia Ritchie', 1, 60, '2019-06-01 14:34:38', '2019-06-01 14:34:38'),
(24, 'Hillard Torphy', 1, 32, '2019-06-01 14:34:38', '2019-06-01 14:34:38'),
(25, 'Anastasia Corkery', 1, 105, '2019-06-01 14:34:38', '2019-06-01 14:34:38'),
(26, 'Prof. Marion Deckow', 1, 260, '2019-06-01 14:34:38', '2019-06-01 14:34:38'),
(27, 'Dr. Madeline Walter IV', 1, 185, '2019-06-01 14:34:39', '2019-06-01 14:34:39'),
(28, 'Piper Purdy', 1, 228, '2019-06-01 14:34:39', '2019-06-01 14:34:39'),
(29, 'Jerad Harber', 1, 80, '2019-06-01 14:34:39', '2019-06-01 14:34:39'),
(30, 'Lottie Hirthe V', 1, 121, '2019-06-01 14:34:39', '2019-06-01 14:34:39'),
(31, 'Dr. Carlo Mohr', 1, 210, '2019-06-01 14:34:39', '2019-06-01 14:34:39'),
(32, 'Ms. Lola Kozey I', 1, 25, '2019-06-01 14:34:39', '2019-06-01 14:34:39'),
(33, 'Chanel Fay MD', 1, 8, '2019-06-01 14:34:39', '2019-06-01 14:34:39'),
(34, 'Jade Kessler', 1, 161, '2019-06-01 14:34:39', '2019-06-01 14:34:39'),
(35, 'Gunnar Breitenberg', 1, 158, '2019-06-01 14:34:39', '2019-06-01 14:34:39'),
(36, 'Ally Weissnat Jr.', 1, 52, '2019-06-01 14:34:39', '2019-06-01 14:34:39'),
(37, 'Randy Dickinson', 1, 86, '2019-06-01 14:34:40', '2019-06-01 14:34:40'),
(38, 'Karlee Bradtke', 1, 119, '2019-06-01 14:34:40', '2019-06-01 14:34:40'),
(39, 'Enola Schimmel', 1, 78, '2019-06-01 14:34:40', '2019-06-01 14:34:40'),
(40, 'Mitchel Schulist', 1, 154, '2019-06-01 14:34:40', '2019-06-01 14:34:40'),
(41, 'Frankie Kertzmann', 1, 153, '2019-06-01 14:34:40', '2019-06-01 14:34:40'),
(42, 'Ms. Megane Mann DDS', 1, 228, '2019-06-01 14:34:40', '2019-06-01 14:34:40'),
(43, 'Alvis Kunze', 1, 136, '2019-06-01 14:34:40', '2019-06-01 14:34:40'),
(44, 'Ms. Chelsie Rolfson', 1, 192, '2019-06-01 14:34:40', '2019-06-01 14:34:40'),
(45, 'Nakia Graham', 1, 225, '2019-06-01 14:34:40', '2019-06-01 14:34:40'),
(46, 'Brent Breitenberg IV', 1, 31, '2019-06-01 14:34:40', '2019-06-01 14:34:40'),
(47, 'Susana Sipes', 1, 89, '2019-06-01 14:34:40', '2019-06-01 14:34:40'),
(48, 'Shania Boyer', 1, 172, '2019-06-01 14:34:41', '2019-06-01 14:34:41'),
(49, 'Nia Sawayn Sr.', 1, 14, '2019-06-01 14:34:41', '2019-06-01 14:34:41'),
(50, 'Miss Vella Kuhic I', 1, 38, '2019-06-01 14:34:41', '2019-06-01 14:34:41');

-- --------------------------------------------------------

--
-- Structure de la table `school_forms`
--

DROP TABLE IF EXISTS `school_forms`;
CREATE TABLE IF NOT EXISTS `school_forms` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `school_forms`
--

INSERT INTO `school_forms` (`id`, `name`, `file_path`, `school_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Jerrod Grant', 'http://www.wintheiser.biz/sit-ipsam-veritatis-facere-molestias-sed-saepe-corrupti-temporibus.html', 2, 200, '2019-06-01 14:35:19', '2019-06-01 14:35:19'),
(2, 'Prof. Wilbert Harris Jr.', 'http://www.rogahn.com/consequatur-eius-nemo-id-itaque-nobis', 3, 92, '2019-06-01 14:35:19', '2019-06-01 14:35:19'),
(3, 'Cristopher Graham', 'http://ohara.com/dolores-reprehenderit-maxime-illo-sit-officia', 4, 89, '2019-06-01 14:35:19', '2019-06-01 14:35:19'),
(4, 'Grady Upton V', 'http://gerlach.com/at-voluptate-officia-dolores-eos-non-illo', 5, 54, '2019-06-01 14:35:20', '2019-06-01 14:35:20'),
(5, 'Alfredo Kuphal Jr.', 'http://turner.com/et-numquam-ratione-illo-dolores-at-laborum-corrupti.html', 6, 227, '2019-06-01 14:35:20', '2019-06-01 14:35:20'),
(6, 'Nolan Ankunding', 'http://feest.biz/nostrum-quaerat-facilis-error-aut', 7, 48, '2019-06-01 14:35:20', '2019-06-01 14:35:20'),
(7, 'Neoma Weimann', 'http://hagenes.info/', 8, 18, '2019-06-01 14:35:20', '2019-06-01 14:35:20'),
(8, 'Madge Schinner', 'http://www.quigley.com/consequatur-nulla-sed-omnis-ipsam', 9, 92, '2019-06-01 14:35:20', '2019-06-01 14:35:20'),
(9, 'Frank Kreiger', 'http://johns.info/fugiat-corrupti-nemo-in-mollitia-et', 10, 67, '2019-06-01 14:35:20', '2019-06-01 14:35:20'),
(10, 'Prof. Velva Sipes III', 'http://www.hackett.net/', 11, 239, '2019-06-01 14:35:20', '2019-06-01 14:35:20'),
(11, 'Emmalee Parker', 'https://roberts.info/vel-maxime-accusamus-minus-earum-temporibus-distinctio-voluptates.html', 12, 173, '2019-06-01 14:35:20', '2019-06-01 14:35:20'),
(12, 'Muriel Volkman', 'http://www.cormier.com/voluptas-sit-corrupti-est-autem-harum-enim', 13, 202, '2019-06-01 14:35:20', '2019-06-01 14:35:20'),
(13, 'Dr. Keanu Schiller IV', 'http://muller.com/sit-iusto-vel-dolores', 14, 84, '2019-06-01 14:35:20', '2019-06-01 14:35:20'),
(14, 'Mrs. Eldora Bogisich', 'https://www.reinger.com/libero-rem-nihil-assumenda-aut-facere-perferendis-et', 15, 77, '2019-06-01 14:35:21', '2019-06-01 14:35:21'),
(15, 'Dawson Schuppe', 'http://www.rowe.biz/totam-mollitia-est-quidem', 16, 29, '2019-06-01 14:35:21', '2019-06-01 14:35:21'),
(16, 'Dayton Hoeger', 'http://www.mertz.com/sint-ex-omnis-debitis.html', 17, 153, '2019-06-01 14:35:21', '2019-06-01 14:35:21'),
(17, 'Candace Corkery', 'http://wehner.org/corrupti-maxime-quia-harum-explicabo-non.html', 18, 47, '2019-06-01 14:35:21', '2019-06-01 14:35:21'),
(18, 'Winona Kuhic', 'http://kuhlman.com/unde-debitis-recusandae-excepturi-qui-perferendis', 19, 65, '2019-06-01 14:35:21', '2019-06-01 14:35:21'),
(19, 'Dr. Desmond Rice', 'http://zboncak.com/officia-dignissimos-iste-hic-ut-autem-ducimus-molestias.html', 20, 20, '2019-06-01 14:35:21', '2019-06-01 14:35:21'),
(20, 'Ethelyn Boyle', 'http://www.champlin.com/natus-accusamus-dolorum-consequuntur-iste-neque', 21, 203, '2019-06-01 14:35:21', '2019-06-01 14:35:21'),
(21, 'Dr. Virginia Padberg', 'http://ryan.org/earum-et-enim-similique-libero-ea-neque-molestias.html', 22, 5, '2019-06-01 14:35:21', '2019-06-01 14:35:21'),
(22, 'Mrs. Althea Dare', 'http://www.wilderman.org/architecto-fugit-aut-occaecati-id-corrupti-consectetur-repellat', 23, 84, '2019-06-01 14:35:21', '2019-06-01 14:35:21'),
(23, 'Jordi Nikolaus IV', 'http://www.kub.net/accusamus-et-vitae-et-quo-tempora-repellendus', 24, 42, '2019-06-01 14:35:21', '2019-06-01 14:35:21'),
(24, 'Tierra Dietrich IV', 'http://www.balistreri.com/aspernatur-consequatur-numquam-ea-ipsam-est-nihil-ut-nemo', 25, 167, '2019-06-01 14:35:21', '2019-06-01 14:35:21'),
(25, 'Maymie Hamill', 'http://www.lindgren.info/quae-aliquam-earum-sint-vitae.html', 26, 144, '2019-06-01 14:35:21', '2019-06-01 14:35:21'),
(26, 'Karolann Yost', 'http://www.goodwin.biz/doloribus-placeat-minus-voluptates-consectetur-quos-consequatur-itaque.html', 27, 251, '2019-06-01 14:35:21', '2019-06-01 14:35:21'),
(27, 'Manley Pouros', 'http://www.greenholt.net/necessitatibus-aliquid-totam-vitae-et-animi-et', 28, 53, '2019-06-01 14:35:22', '2019-06-01 14:35:22'),
(28, 'Hassie Weber I', 'http://www.ortiz.biz/laboriosam-itaque-temporibus-et-est-dolores-ut-odit.html', 29, 203, '2019-06-01 14:35:22', '2019-06-01 14:35:22'),
(29, 'Mr. Freeman Bauch I', 'http://eichmann.com/', 30, 104, '2019-06-01 14:35:22', '2019-06-01 14:35:22'),
(30, 'Mack Hintz', 'http://www.feil.com/', 31, 103, '2019-06-01 14:35:22', '2019-06-01 14:35:22'),
(31, 'Camryn Kshlerin', 'http://robel.com/', 32, 188, '2019-06-01 14:35:22', '2019-06-01 14:35:22'),
(32, 'Joaquin Lueilwitz Sr.', 'http://wehner.com/ratione-et-fugit-nesciunt-maxime-quae-rerum', 33, 144, '2019-06-01 14:35:22', '2019-06-01 14:35:22'),
(33, 'Mrs. Lora Balistreri Sr.', 'http://hermann.com/', 34, 16, '2019-06-01 14:35:22', '2019-06-01 14:35:22'),
(34, 'Tyra Lubowitz', 'https://romaguera.com/ut-possimus-fugiat-id-corrupti-repellendus.html', 35, 208, '2019-06-01 14:35:22', '2019-06-01 14:35:22'),
(35, 'Sigrid Powlowski', 'http://armstrong.com/', 36, 43, '2019-06-01 14:35:22', '2019-06-01 14:35:22'),
(36, 'Mrs. Alexandrine Predovic', 'http://towne.net/eaque-odit-architecto-sed-ad-consectetur-rerum', 37, 161, '2019-06-01 14:35:22', '2019-06-01 14:35:22'),
(37, 'Dr. Lorenza Rice', 'http://sanford.com/illo-officiis-ut-repellendus-nobis-deserunt-totam.html', 38, 260, '2019-06-01 14:35:22', '2019-06-01 14:35:22'),
(38, 'Jaron Ortiz II', 'http://wolf.com/mollitia-inventore-doloribus-velit-dolor-incidunt-non-sit', 39, 8, '2019-06-01 14:35:22', '2019-06-01 14:35:22'),
(39, 'Shanny Crona', 'http://www.kuhn.info/rerum-distinctio-omnis-est-officiis-itaque-voluptatibus-mollitia', 40, 9, '2019-06-01 14:35:22', '2019-06-01 14:35:22'),
(40, 'Elsie Rolfson', 'https://kautzer.com/labore-aperiam-nulla-in-eum-distinctio-et-amet-autem.html', 41, 102, '2019-06-01 14:35:22', '2019-06-01 14:35:22'),
(41, 'Fletcher Boehm', 'http://hackett.com/voluptatem-accusamus-eos-aliquam-nihil-voluptas-laudantium', 42, 254, '2019-06-01 14:35:22', '2019-06-01 14:35:22'),
(42, 'Matteo Jones', 'http://strosin.com/', 43, 15, '2019-06-01 14:35:23', '2019-06-01 14:35:23'),
(43, 'Dr. Keenan Maggio Jr.', 'http://feest.com/unde-quo-sed-et-ut-dolor-culpa', 44, 206, '2019-06-01 14:35:23', '2019-06-01 14:35:23'),
(44, 'Magnus Rowe', 'http://dibbert.com/ad-mollitia-vero-et-quibusdam', 45, 50, '2019-06-01 14:35:23', '2019-06-01 14:35:23'),
(45, 'Miss Abbey McCullough', 'https://leannon.com/aut-maiores-magni-pariatur-aut-deserunt.html', 46, 128, '2019-06-01 14:35:23', '2019-06-01 14:35:23'),
(46, 'Garret Zboncak', 'http://www.orn.org/provident-commodi-voluptatum-maiores-soluta-voluptate-quasi-quo', 47, 4, '2019-06-01 14:35:23', '2019-06-01 14:35:23'),
(47, 'Kristoffer Jast', 'https://hackett.com/qui-atque-eaque-odit-rerum-sunt.html', 48, 247, '2019-06-01 14:35:23', '2019-06-01 14:35:23'),
(48, 'Dr. Amos Jones I', 'http://oreilly.biz/expedita-qui-quia-voluptas-quisquam-ad-debitis', 49, 13, '2019-06-01 14:35:23', '2019-06-01 14:35:23'),
(49, 'Silas Block', 'http://www.muller.com/quaerat-accusamus-tempore-quo-qui-qui-minima', 50, 234, '2019-06-01 14:35:23', '2019-06-01 14:35:23'),
(50, 'Antone Durgan', 'http://rowe.biz/dolor-rerum-error-harum-aliquid-explicabo-veniam-quia', 51, 99, '2019-06-01 14:35:23', '2019-06-01 14:35:23');

-- --------------------------------------------------------

--
-- Structure de la table `school_grades`
--

DROP TABLE IF EXISTS `school_grades`;
CREATE TABLE IF NOT EXISTS `school_grades` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `marks` double(8,2) NOT NULL,
  `gpa` double(8,2) NOT NULL,
  `attendance` double(8,2) NOT NULL,
  `quiz1` double(8,2) NOT NULL,
  `quiz2` double(8,2) NOT NULL,
  `quiz3` double(8,2) NOT NULL,
  `quiz4` double(8,2) NOT NULL,
  `quiz5` double(8,2) NOT NULL,
  `ct1` double(8,2) NOT NULL,
  `ct2` double(8,2) NOT NULL,
  `ct3` double(8,2) NOT NULL,
  `ct4` double(8,2) NOT NULL,
  `ct5` double(8,2) NOT NULL,
  `assignment1` double(8,2) NOT NULL,
  `assignment2` double(8,2) NOT NULL,
  `assignment3` double(8,2) NOT NULL,
  `written` double(8,2) NOT NULL,
  `mcq` double(8,2) NOT NULL,
  `practical` double(8,2) NOT NULL,
  `exam_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `school_grades`
--

INSERT INTO `school_grades` (`id`, `marks`, `gpa`, `attendance`, `quiz1`, `quiz2`, `quiz3`, `quiz4`, `quiz5`, `ct1`, `ct2`, `ct3`, `ct4`, `ct5`, `assignment1`, `assignment2`, `assignment3`, `written`, `mcq`, `practical`, `exam_id`, `student_id`, `teacher_id`, `course_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 67.00, 5.00, 5.00, 15.00, 10.00, 41.00, 19.00, 45.00, 98.00, 41.00, 90.00, 98.00, 32.00, 58.00, 84.00, 28.00, 77.00, 95.00, 17.00, 8, 65, 36, 1, 234, '2019-06-01 14:35:01', '2019-06-01 14:35:01'),
(2, 16.00, 9.00, 5.00, 98.00, 35.00, 20.00, 70.00, 46.00, 67.00, 93.00, 2.00, 64.00, 34.00, 29.00, 29.00, 35.00, 85.00, 98.00, 46.00, 5, 66, 38, 7, 154, '2019-06-01 14:35:01', '2019-06-01 14:35:01'),
(3, 32.00, 4.00, 5.00, 72.00, 16.00, 65.00, 70.00, 78.00, 65.00, 40.00, 20.00, 62.00, 95.00, 62.00, 66.00, 53.00, 19.00, 21.00, 51.00, 5, 70, 39, 6, 54, '2019-06-01 14:35:02', '2019-06-01 14:35:02'),
(4, 9.00, 0.00, 5.00, 4.00, 24.00, 15.00, 17.00, 32.00, 52.00, 23.00, 24.00, 96.00, 58.00, 73.00, 28.00, 37.00, 95.00, 87.00, 96.00, 7, 63, 41, 4, 147, '2019-06-01 14:35:02', '2019-06-01 14:35:02'),
(5, 69.00, 0.00, 5.00, 62.00, 85.00, 20.00, 88.00, 98.00, 46.00, 53.00, 68.00, 6.00, 77.00, 24.00, 90.00, 53.00, 14.00, 42.00, 11.00, 9, 66, 40, 2, 233, '2019-06-01 14:35:02', '2019-06-01 14:35:02'),
(6, 52.00, 3.00, 5.00, 1.00, 95.00, 41.00, 63.00, 94.00, 81.00, 81.00, 17.00, 14.00, 67.00, 76.00, 41.00, 8.00, 44.00, 18.00, 47.00, 2, 63, 39, 2, 247, '2019-06-01 14:35:02', '2019-06-01 14:35:02'),
(7, 21.00, 8.00, 5.00, 5.00, 60.00, 0.00, 21.00, 30.00, 30.00, 2.00, 10.00, 17.00, 76.00, 83.00, 31.00, 26.00, 82.00, 35.00, 21.00, 2, 65, 39, 5, 22, '2019-06-01 14:35:02', '2019-06-01 14:35:02'),
(8, 98.00, 2.00, 5.00, 48.00, 54.00, 69.00, 56.00, 32.00, 7.00, 42.00, 50.00, 19.00, 1.00, 23.00, 34.00, 38.00, 45.00, 9.00, 76.00, 5, 70, 40, 3, 175, '2019-06-01 14:35:02', '2019-06-01 14:35:02'),
(9, 3.00, 5.00, 5.00, 5.00, 26.00, 27.00, 87.00, 49.00, 25.00, 18.00, 5.00, 33.00, 35.00, 28.00, 95.00, 40.00, 33.00, 22.00, 18.00, 3, 70, 35, 1, 124, '2019-06-01 14:35:02', '2019-06-01 14:35:02'),
(10, 73.00, 6.00, 5.00, 58.00, 5.00, 49.00, 53.00, 19.00, 97.00, 46.00, 26.00, 78.00, 6.00, 73.00, 1.00, 51.00, 12.00, 97.00, 59.00, 9, 64, 37, 6, 43, '2019-06-01 14:35:02', '2019-06-01 14:35:02'),
(11, 92.00, 5.00, 5.00, 8.00, 54.00, 16.00, 60.00, 18.00, 41.00, 1.00, 95.00, 79.00, 65.00, 17.00, 59.00, 18.00, 31.00, 48.00, 14.00, 8, 71, 34, 3, 192, '2019-06-01 14:35:02', '2019-06-01 14:35:02'),
(12, 39.00, 2.00, 5.00, 84.00, 65.00, 93.00, 22.00, 67.00, 78.00, 22.00, 12.00, 92.00, 50.00, 12.00, 21.00, 49.00, 56.00, 51.00, 56.00, 4, 62, 36, 10, 113, '2019-06-01 14:35:02', '2019-06-01 14:35:02'),
(13, 22.00, 2.00, 5.00, 73.00, 14.00, 61.00, 46.00, 61.00, 49.00, 94.00, 47.00, 29.00, 63.00, 13.00, 89.00, 1.00, 24.00, 20.00, 72.00, 10, 69, 39, 1, 32, '2019-06-01 14:35:02', '2019-06-01 14:35:02'),
(14, 98.00, 1.00, 5.00, 89.00, 17.00, 76.00, 11.00, 27.00, 92.00, 29.00, 79.00, 21.00, 11.00, 38.00, 41.00, 74.00, 1.00, 6.00, 63.00, 4, 63, 37, 5, 138, '2019-06-01 14:35:02', '2019-06-01 14:35:02'),
(15, 49.00, 9.00, 5.00, 70.00, 24.00, 19.00, 39.00, 25.00, 74.00, 71.00, 87.00, 98.00, 35.00, 85.00, 12.00, 72.00, 24.00, 28.00, 62.00, 5, 63, 33, 5, 235, '2019-06-01 14:35:02', '2019-06-01 14:35:02'),
(16, 48.00, 7.00, 5.00, 9.00, 30.00, 55.00, 70.00, 16.00, 30.00, 82.00, 30.00, 84.00, 40.00, 5.00, 58.00, 38.00, 89.00, 77.00, 11.00, 9, 65, 39, 4, 181, '2019-06-01 14:35:02', '2019-06-01 14:35:02'),
(17, 38.00, 9.00, 5.00, 43.00, 28.00, 12.00, 92.00, 37.00, 36.00, 9.00, 23.00, 15.00, 16.00, 35.00, 77.00, 11.00, 99.00, 37.00, 42.00, 5, 64, 41, 7, 18, '2019-06-01 14:35:02', '2019-06-01 14:35:02'),
(18, 69.00, 3.00, 5.00, 34.00, 73.00, 40.00, 63.00, 7.00, 62.00, 91.00, 27.00, 23.00, 84.00, 13.00, 66.00, 42.00, 3.00, 48.00, 37.00, 3, 68, 39, 4, 223, '2019-06-01 14:35:02', '2019-06-01 14:35:02'),
(19, 18.00, 8.00, 5.00, 97.00, 99.00, 28.00, 85.00, 7.00, 54.00, 90.00, 27.00, 3.00, 78.00, 43.00, 42.00, 66.00, 6.00, 2.00, 1.00, 8, 71, 39, 2, 79, '2019-06-01 14:35:02', '2019-06-01 14:35:02'),
(20, 45.00, 4.00, 5.00, 67.00, 63.00, 83.00, 82.00, 84.00, 75.00, 51.00, 92.00, 62.00, 71.00, 22.00, 47.00, 18.00, 87.00, 61.00, 55.00, 9, 71, 40, 6, 113, '2019-06-01 14:35:02', '2019-06-01 14:35:02'),
(21, 96.00, 3.00, 5.00, 42.00, 87.00, 15.00, 59.00, 64.00, 61.00, 50.00, 57.00, 62.00, 79.00, 5.00, 23.00, 84.00, 53.00, 17.00, 89.00, 7, 67, 38, 4, 61, '2019-06-01 14:35:03', '2019-06-01 14:35:03'),
(22, 29.00, 6.00, 5.00, 18.00, 83.00, 8.00, 29.00, 41.00, 95.00, 60.00, 12.00, 91.00, 1.00, 84.00, 2.00, 0.00, 43.00, 73.00, 25.00, 10, 63, 36, 9, 221, '2019-06-01 14:35:03', '2019-06-01 14:35:03'),
(23, 38.00, 1.00, 5.00, 27.00, 14.00, 19.00, 91.00, 25.00, 67.00, 82.00, 48.00, 11.00, 26.00, 79.00, 26.00, 2.00, 72.00, 27.00, 16.00, 6, 69, 36, 8, 129, '2019-06-01 14:35:03', '2019-06-01 14:35:03'),
(24, 52.00, 8.00, 5.00, 27.00, 95.00, 65.00, 57.00, 46.00, 29.00, 95.00, 78.00, 50.00, 97.00, 38.00, 95.00, 24.00, 19.00, 41.00, 93.00, 10, 67, 37, 9, 77, '2019-06-01 14:35:03', '2019-06-01 14:35:03'),
(25, 72.00, 5.00, 5.00, 85.00, 94.00, 69.00, 86.00, 45.00, 64.00, 43.00, 36.00, 33.00, 17.00, 17.00, 99.00, 30.00, 25.00, 7.00, 30.00, 3, 64, 40, 1, 212, '2019-06-01 14:35:03', '2019-06-01 14:35:03'),
(26, 95.00, 4.00, 5.00, 37.00, 8.00, 24.00, 91.00, 94.00, 68.00, 83.00, 83.00, 63.00, 34.00, 81.00, 23.00, 4.00, 6.00, 28.00, 6.00, 8, 68, 39, 2, 231, '2019-06-01 14:35:03', '2019-06-01 14:35:03'),
(27, 92.00, 3.00, 5.00, 91.00, 32.00, 59.00, 86.00, 85.00, 19.00, 56.00, 26.00, 89.00, 2.00, 16.00, 32.00, 98.00, 92.00, 50.00, 71.00, 2, 65, 36, 5, 167, '2019-06-01 14:35:03', '2019-06-01 14:35:03'),
(28, 26.00, 8.00, 5.00, 28.00, 24.00, 83.00, 46.00, 59.00, 73.00, 60.00, 45.00, 99.00, 44.00, 17.00, 35.00, 29.00, 94.00, 27.00, 25.00, 9, 68, 34, 9, 211, '2019-06-01 14:35:03', '2019-06-01 14:35:03'),
(29, 87.00, 3.00, 5.00, 25.00, 12.00, 52.00, 40.00, 4.00, 26.00, 18.00, 7.00, 48.00, 5.00, 36.00, 34.00, 67.00, 46.00, 98.00, 71.00, 4, 65, 35, 1, 61, '2019-06-01 14:35:03', '2019-06-01 14:35:03'),
(30, 26.00, 0.00, 5.00, 99.00, 70.00, 96.00, 40.00, 43.00, 29.00, 45.00, 39.00, 31.00, 26.00, 31.00, 85.00, 52.00, 12.00, 25.00, 51.00, 10, 67, 38, 3, 257, '2019-06-01 14:35:04', '2019-06-01 14:35:04'),
(31, 96.00, 5.00, 5.00, 61.00, 71.00, 7.00, 45.00, 17.00, 42.00, 48.00, 7.00, 36.00, 28.00, 13.00, 33.00, 12.00, 36.00, 89.00, 22.00, 2, 66, 37, 10, 148, '2019-06-01 14:35:04', '2019-06-01 14:35:04'),
(32, 27.00, 7.00, 5.00, 27.00, 68.00, 32.00, 30.00, 10.00, 55.00, 60.00, 32.00, 14.00, 32.00, 4.00, 70.00, 46.00, 43.00, 40.00, 24.00, 10, 71, 39, 6, 56, '2019-06-01 14:35:04', '2019-06-01 14:35:04'),
(33, 33.00, 4.00, 5.00, 84.00, 52.00, 79.00, 1.00, 87.00, 90.00, 39.00, 83.00, 41.00, 69.00, 87.00, 72.00, 72.00, 67.00, 30.00, 86.00, 8, 64, 40, 1, 24, '2019-06-01 14:35:04', '2019-06-01 14:35:04'),
(34, 37.00, 1.00, 5.00, 16.00, 61.00, 11.00, 92.00, 54.00, 36.00, 61.00, 37.00, 6.00, 21.00, 46.00, 61.00, 68.00, 14.00, 22.00, 9.00, 9, 64, 36, 9, 149, '2019-06-01 14:35:04', '2019-06-01 14:35:04'),
(35, 11.00, 3.00, 5.00, 0.00, 72.00, 74.00, 82.00, 18.00, 53.00, 50.00, 89.00, 89.00, 67.00, 38.00, 76.00, 79.00, 77.00, 89.00, 18.00, 6, 65, 36, 10, 106, '2019-06-01 14:35:04', '2019-06-01 14:35:04'),
(36, 34.00, 4.00, 5.00, 51.00, 67.00, 17.00, 74.00, 45.00, 31.00, 10.00, 47.00, 72.00, 88.00, 55.00, 62.00, 53.00, 51.00, 67.00, 77.00, 6, 71, 35, 2, 236, '2019-06-01 14:35:04', '2019-06-01 14:35:04'),
(37, 95.00, 9.00, 5.00, 12.00, 99.00, 9.00, 37.00, 89.00, 4.00, 91.00, 17.00, 0.00, 74.00, 86.00, 59.00, 34.00, 80.00, 67.00, 15.00, 4, 65, 35, 3, 57, '2019-06-01 14:35:04', '2019-06-01 14:35:04'),
(38, 88.00, 2.00, 5.00, 45.00, 53.00, 0.00, 95.00, 29.00, 91.00, 71.00, 93.00, 89.00, 55.00, 92.00, 68.00, 22.00, 15.00, 58.00, 16.00, 7, 65, 35, 2, 86, '2019-06-01 14:35:04', '2019-06-01 14:35:04'),
(39, 0.00, 9.00, 5.00, 44.00, 73.00, 27.00, 34.00, 71.00, 43.00, 70.00, 39.00, 97.00, 59.00, 70.00, 12.00, 86.00, 34.00, 74.00, 7.00, 4, 67, 38, 8, 97, '2019-06-01 14:35:04', '2019-06-01 14:35:04'),
(40, 97.00, 6.00, 5.00, 19.00, 26.00, 2.00, 12.00, 82.00, 54.00, 52.00, 98.00, 50.00, 80.00, 75.00, 85.00, 31.00, 12.00, 0.00, 2.00, 6, 65, 41, 4, 258, '2019-06-01 14:35:04', '2019-06-01 14:35:04'),
(41, 8.00, 6.00, 5.00, 12.00, 18.00, 22.00, 84.00, 75.00, 73.00, 4.00, 58.00, 25.00, 84.00, 23.00, 13.00, 91.00, 43.00, 94.00, 17.00, 3, 71, 39, 6, 171, '2019-06-01 14:35:04', '2019-06-01 14:35:04'),
(42, 59.00, 5.00, 5.00, 36.00, 88.00, 68.00, 34.00, 9.00, 45.00, 76.00, 21.00, 24.00, 74.00, 99.00, 24.00, 54.00, 30.00, 37.00, 7.00, 7, 69, 35, 8, 38, '2019-06-01 14:35:04', '2019-06-01 14:35:04'),
(43, 29.00, 7.00, 5.00, 97.00, 30.00, 90.00, 41.00, 40.00, 81.00, 33.00, 89.00, 65.00, 24.00, 80.00, 63.00, 49.00, 99.00, 27.00, 43.00, 8, 69, 33, 3, 244, '2019-06-01 14:35:04', '2019-06-01 14:35:04'),
(44, 7.00, 8.00, 5.00, 87.00, 56.00, 73.00, 79.00, 59.00, 64.00, 58.00, 31.00, 54.00, 16.00, 14.00, 85.00, 77.00, 70.00, 0.00, 98.00, 1, 64, 37, 9, 139, '2019-06-01 14:35:04', '2019-06-01 14:35:04'),
(45, 73.00, 8.00, 5.00, 86.00, 93.00, 29.00, 69.00, 72.00, 98.00, 1.00, 46.00, 36.00, 69.00, 8.00, 37.00, 54.00, 90.00, 10.00, 79.00, 8, 65, 32, 7, 160, '2019-06-01 14:35:04', '2019-06-01 14:35:04'),
(46, 22.00, 2.00, 5.00, 40.00, 11.00, 72.00, 63.00, 93.00, 75.00, 36.00, 49.00, 92.00, 0.00, 69.00, 89.00, 80.00, 24.00, 72.00, 72.00, 10, 64, 39, 7, 41, '2019-06-01 14:35:04', '2019-06-01 14:35:04'),
(47, 52.00, 4.00, 5.00, 48.00, 64.00, 34.00, 97.00, 31.00, 38.00, 10.00, 4.00, 91.00, 94.00, 15.00, 42.00, 39.00, 87.00, 45.00, 47.00, 8, 65, 35, 1, 121, '2019-06-01 14:35:04', '2019-06-01 14:35:04'),
(48, 68.00, 1.00, 5.00, 17.00, 13.00, 10.00, 29.00, 11.00, 41.00, 28.00, 45.00, 16.00, 11.00, 74.00, 34.00, 9.00, 64.00, 23.00, 68.00, 4, 66, 33, 8, 18, '2019-06-01 14:35:05', '2019-06-01 14:35:05'),
(49, 99.00, 3.00, 5.00, 45.00, 53.00, 50.00, 50.00, 32.00, 5.00, 49.00, 19.00, 23.00, 75.00, 85.00, 85.00, 59.00, 39.00, 91.00, 38.00, 6, 64, 33, 2, 142, '2019-06-01 14:35:05', '2019-06-01 14:35:05'),
(50, 5.00, 2.00, 5.00, 86.00, 85.00, 68.00, 16.00, 15.00, 16.00, 29.00, 66.00, 18.00, 58.00, 88.00, 96.00, 61.00, 30.00, 30.00, 92.00, 3, 63, 41, 9, 260, '2019-06-01 14:35:05', '2019-06-01 14:35:05');

-- --------------------------------------------------------

--
-- Structure de la table `school_grade_systems`
--

DROP TABLE IF EXISTS `school_grade_systems`;
CREATE TABLE IF NOT EXISTS `school_grade_systems` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `grade_system_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `point` double(8,2) NOT NULL,
  `from_mark` int(11) NOT NULL,
  `to_mark` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `school_grade_systems`
--

INSERT INTO `school_grade_systems` (`id`, `grade_system_name`, `grade`, `point`, `from_mark`, `to_mark`, `school_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Grade System 1', 'D+', 5.00, 90, 90, 1, 254, '2019-06-01 14:34:55', '2019-06-01 14:34:55'),
(2, 'Grade System 1', 'D+', 4.00, 70, 80, 1, 45, '2019-06-01 14:34:56', '2019-06-01 14:34:56');

-- --------------------------------------------------------

--
-- Structure de la table `school_homeworks`
--

DROP TABLE IF EXISTS `school_homeworks`;
CREATE TABLE IF NOT EXISTS `school_homeworks` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `file_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `section_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `school_homeworks`
--

INSERT INTO `school_homeworks` (`id`, `file_path`, `description`, `teacher_id`, `section_id`, `created_at`, `updated_at`) VALUES
(1, 'http://baumbach.org/repellendus-vel-et-eos-tempora-corporis.html', 'Et reiciendis ipsum voluptate. Et sint ut tempora dolores accusamus sunt. Dolores iure id nostrum ratione sit.', 48, 18, '2019-06-01 14:34:41', '2019-06-01 14:34:41'),
(2, 'http://cartwright.com/', 'Ut voluptate repudiandae nisi labore rem. Ad cupiditate delectus ut enim est sint aut. Odio perferendis autem assumenda omnis tenetur.', 40, 14, '2019-06-01 14:34:41', '2019-06-01 14:34:41'),
(3, 'https://www.torp.biz/quisquam-cum-assumenda-nisi-ratione-vel-sed', 'Sit non iusto necessitatibus molestias omnis. Id maiores ut libero id et doloremque. Laboriosam voluptas enim veritatis quasi incidunt sit saepe assumenda.', 41, 20, '2019-06-01 14:34:41', '2019-06-01 14:34:41'),
(4, 'https://www.doyle.biz/quisquam-perspiciatis-ex-sint-et-qui-exercitationem', 'Sunt saepe omnis esse porro error dolorem qui sit. Saepe cum at possimus ea distinctio. Sunt tempora dolores sed sint facilis.', 37, 7, '2019-06-01 14:34:41', '2019-06-01 14:34:41'),
(5, 'https://www.friesen.info/vel-consectetur-alias-mollitia-praesentium-id-quo', 'Accusantium voluptatem quod velit natus enim ut. Repellat iure aliquam et corrupti nemo excepturi. Repudiandae odit et voluptatem sit id.', 49, 10, '2019-06-01 14:34:41', '2019-06-01 14:34:41'),
(6, 'https://www.rau.info/omnis-in-repudiandae-molestiae-unde-cupiditate-possimus-libero-sit', 'Qui laboriosam enim quo corrupti sed consequatur. Aspernatur rerum rerum facilis qui quam. Quis aut dignissimos provident recusandae sapiente saepe.', 36, 10, '2019-06-01 14:34:42', '2019-06-01 14:34:42'),
(7, 'http://www.beer.biz/tenetur-et-debitis-natus', 'Est officia ut vitae possimus enim at qui. Blanditiis error facilis libero est vero temporibus error. Ea incidunt unde omnis atque.', 52, 7, '2019-06-01 14:34:42', '2019-06-01 14:34:42'),
(8, 'http://www.lowe.com/', 'Delectus veniam est inventore suscipit occaecati veniam. Dolor voluptatem sed placeat aspernatur ea. Ut nemo deserunt consectetur dolore eum dolorem omnis.', 37, 3, '2019-06-01 14:34:42', '2019-06-01 14:34:42'),
(9, 'http://www.lynch.info/ipsam-molestiae-dolorem-similique', 'At velit aliquid nihil odio dolorem officia. Molestiae distinctio nobis fuga corrupti in nam. Consequatur assumenda et nihil rerum.', 38, 9, '2019-06-01 14:34:42', '2019-06-01 14:34:42'),
(10, 'http://www.smitham.com/', 'Molestiae minus laudantium rerum quae omnis. Praesentium quos saepe omnis numquam. Qui nemo qui sed molestiae enim laborum autem.', 42, 16, '2019-06-01 14:34:42', '2019-06-01 14:34:42'),
(11, 'http://roob.com/placeat-blanditiis-voluptatem-ea', 'Aut ipsa minus temporibus recusandae eius minus. Suscipit quis doloremque molestias aut. Provident fugit id voluptatum ut consequatur deserunt.', 44, 10, '2019-06-01 14:34:42', '2019-06-01 14:34:42'),
(12, 'https://www.satterfield.biz/doloremque-voluptatem-quos-magnam-eligendi-qui-ut-sint', 'Aperiam fugiat sunt consectetur itaque vel et et deleniti. Aut ad libero vero est. Qui tempore fuga explicabo necessitatibus error nulla.', 44, 11, '2019-06-01 14:34:42', '2019-06-01 14:34:42'),
(13, 'http://gutkowski.com/repellat-nobis-ratione-ut-quo-similique-omnis', 'Hic iusto accusamus aut pariatur debitis. Eligendi modi consequuntur molestiae earum. Consequatur debitis illum harum ducimus hic porro quasi et.', 32, 5, '2019-06-01 14:34:42', '2019-06-01 14:34:42'),
(14, 'http://wuckert.com/', 'Ut expedita porro voluptas dignissimos quas. A est quo necessitatibus atque explicabo quis delectus. Illum aut libero sunt rerum dolores.', 54, 17, '2019-06-01 14:34:42', '2019-06-01 14:34:42'),
(15, 'http://www.hirthe.net/laboriosam-neque-possimus-temporibus-commodi-ut-et-non-voluptas', 'Tempora hic et expedita ullam laboriosam aut dignissimos. Porro debitis est dignissimos quis voluptatem. Minima in maiores quia sapiente molestiae esse sed.', 55, 7, '2019-06-01 14:34:42', '2019-06-01 14:34:42'),
(16, 'http://www.carter.com/dicta-cupiditate-dignissimos-quod-dicta', 'Nostrum maiores soluta repellat eius aspernatur dicta laudantium. Nostrum ea magnam et quis numquam non consequatur modi. Vel sapiente et ipsum eos.', 49, 18, '2019-06-01 14:34:42', '2019-06-01 14:34:42'),
(17, 'http://www.hettinger.com/', 'Sunt accusamus velit magnam in nihil repellendus. Mollitia accusantium voluptate enim itaque itaque ut. Quo ut unde molestiae sit.', 53, 5, '2019-06-01 14:34:42', '2019-06-01 14:34:42'),
(18, 'https://www.murazik.com/magni-accusantium-sint-quo-voluptas', 'Atque tenetur maiores consequuntur voluptatem repudiandae et. Ratione tempora non repellat possimus. Veritatis et ratione in voluptatem minus.', 38, 4, '2019-06-01 14:34:43', '2019-06-01 14:34:43'),
(19, 'https://www.miller.com/cumque-aut-quaerat-velit-quisquam', 'Debitis fugit nobis delectus quas hic odit placeat cupiditate. Eum ipsa explicabo ut occaecati libero. Perferendis fugiat eaque explicabo et labore.', 54, 10, '2019-06-01 14:34:43', '2019-06-01 14:34:43'),
(20, 'http://howe.net/atque-nobis-fugiat-magnam-et-velit-dolores', 'Ullam sit ad id dolores quas eligendi explicabo. Tempora corporis mollitia beatae corrupti et. Ut et rem eaque id.', 59, 7, '2019-06-01 14:34:43', '2019-06-01 14:34:43'),
(21, 'http://cassin.info/ipsam-cupiditate-natus-nulla-aliquam-veniam-impedit.html', 'Maiores et est aliquid autem pariatur quia pariatur suscipit. Et voluptas corrupti dolorem quo sed beatae. Cupiditate hic reprehenderit ullam culpa tempora quo.', 59, 9, '2019-06-01 14:34:43', '2019-06-01 14:34:43'),
(22, 'http://www.legros.biz/itaque-repellendus-eligendi-ad-illo-harum-laborum-doloribus.html', 'Atque atque facere blanditiis repellat hic rerum eos. Eum in sit temporibus ut omnis. Fuga porro aut iusto necessitatibus quibusdam ut a.', 32, 15, '2019-06-01 14:34:43', '2019-06-01 14:34:43'),
(23, 'http://donnelly.com/vero-magnam-minus-aliquam-beatae-sunt-facere-repudiandae', 'Molestias doloribus voluptatem est rerum non iusto iure. Aut quaerat magni ad est eum. Aut doloremque sit at omnis.', 33, 4, '2019-06-01 14:34:43', '2019-06-01 14:34:43'),
(24, 'https://www.bode.net/quia-quo-corrupti-molestias-blanditiis-cum-quia-sint', 'Deserunt totam neque blanditiis dolorem. Sit neque facere placeat facere sint sint et. Aut autem consequatur quo.', 39, 18, '2019-06-01 14:34:43', '2019-06-01 14:34:43'),
(25, 'http://www.buckridge.info/dolores-nam-dolorem-id-nihil-nihil-consectetur-delectus', 'Totam rerum temporibus quo quaerat aut perferendis dolore. Laudantium aut omnis deserunt veritatis. Itaque magnam fugiat quae quo aliquam.', 52, 14, '2019-06-01 14:34:43', '2019-06-01 14:34:43'),
(26, 'http://www.macejkovic.com/voluptas-eum-quisquam-officiis-ipsum-quia-qui.html', 'Unde eum sint iure nesciunt provident. Aut est amet libero voluptas quas vel sunt. Dolor dicta quam vitae illum vero optio et.', 36, 14, '2019-06-01 14:34:43', '2019-06-01 14:34:43'),
(27, 'http://www.franecki.com/', 'Praesentium qui vel qui quasi. Facilis ut odit et et. Recusandae et delectus commodi.', 32, 12, '2019-06-01 14:34:43', '2019-06-01 14:34:43'),
(28, 'https://www.schroeder.com/quas-cumque-nam-vitae-non-sapiente', 'Odit et ut qui saepe commodi facere quod. Id laboriosam tempore quis atque amet eos omnis. Velit qui soluta sed.', 32, 18, '2019-06-01 14:34:43', '2019-06-01 14:34:43'),
(29, 'https://bruen.biz/fuga-voluptatum-ut-eius-provident-et-suscipit.html', 'Consequatur mollitia dicta harum a voluptatem quisquam accusamus magni. Nesciunt dolor incidunt aliquid doloremque quia veniam. Impedit nihil unde et et consectetur libero saepe.', 45, 20, '2019-06-01 14:34:43', '2019-06-01 14:34:43'),
(30, 'http://mosciski.org/aut-aperiam-cumque-eos-rem-voluptas.html', 'Dicta debitis neque occaecati. Necessitatibus harum debitis dolorem quae. Pariatur sapiente ut facilis sed.', 59, 11, '2019-06-01 14:34:44', '2019-06-01 14:34:44'),
(31, 'http://kirlin.com/veniam-dolores-accusantium-alias-nisi-maiores-quis-consequatur', 'Deserunt aliquid itaque asperiores aut totam quasi ea fuga. Est qui magnam aspernatur nam sint. Quaerat consequatur quod commodi numquam.', 39, 2, '2019-06-01 14:34:44', '2019-06-01 14:34:44'),
(32, 'https://abshire.com/temporibus-vitae-debitis-similique.html', 'Laudantium adipisci dolorem id recusandae. Adipisci nihil qui sit neque hic quis incidunt. Neque eos dolorem cum sunt rerum molestias.', 36, 9, '2019-06-01 14:34:44', '2019-06-01 14:34:44'),
(33, 'http://mueller.com/laboriosam-magnam-sequi-praesentium-qui-maxime', 'Rerum aut tenetur quibusdam praesentium aliquam sint necessitatibus. Quis magni ut ut laborum voluptatem cum. Perferendis fuga quod ex rerum.', 53, 12, '2019-06-01 14:34:44', '2019-06-01 14:34:44'),
(34, 'https://www.kozey.com/ea-eum-odio-enim-voluptas-nesciunt-ut', 'Alias voluptatem animi et. Quo et consequatur similique possimus. Ipsum laboriosam consequuntur facilis inventore sed.', 56, 10, '2019-06-01 14:34:44', '2019-06-01 14:34:44'),
(35, 'http://gottlieb.com/', 'Rem beatae porro nulla quo iure quia. Adipisci et sit recusandae fugiat qui fugit eligendi ad. Itaque temporibus quod et.', 42, 20, '2019-06-01 14:34:44', '2019-06-01 14:34:44'),
(36, 'https://metz.org/voluptatem-dolores-non-saepe-qui-et.html', 'Maiores modi saepe vel dolorem. Similique aut facere magni eligendi quibusdam voluptas magni praesentium. Facilis et dignissimos vero.', 50, 1, '2019-06-01 14:34:44', '2019-06-01 14:34:44'),
(37, 'http://huel.com/est-et-quia-autem-assumenda-sequi-minima-at', 'Tempora earum veritatis totam molestias incidunt quam. Sunt accusamus accusantium magni. Culpa distinctio voluptate est quasi amet.', 58, 15, '2019-06-01 14:34:44', '2019-06-01 14:34:44'),
(38, 'http://zemlak.com/qui-molestias-voluptate-incidunt-quibusdam-rerum-sed', 'Maiores ipsam id et earum consequatur et quo. Adipisci et voluptatem accusantium perspiciatis sunt. Officia eos laudantium consequatur necessitatibus aperiam facilis non.', 43, 6, '2019-06-01 14:34:44', '2019-06-01 14:34:44'),
(39, 'http://www.kreiger.info/laborum-architecto-itaque-tempora.html', 'Voluptas quia consequatur molestiae inventore alias. Eligendi aspernatur molestiae reprehenderit eum. Officia rerum repudiandae quos eos reiciendis eos reprehenderit.', 40, 15, '2019-06-01 14:34:44', '2019-06-01 14:34:44'),
(40, 'https://www.farrell.net/et-tenetur-aut-veniam-id-distinctio-quos-rerum', 'Ad sit vitae qui eum. Et est vel natus sit. In consectetur deserunt vitae qui iusto quo.', 40, 20, '2019-06-01 14:34:44', '2019-06-01 14:34:44'),
(41, 'http://koch.com/voluptate-est-vel-inventore', 'Delectus commodi et recusandae dolor error velit voluptas. Ex consequuntur qui cupiditate fuga. Autem sequi modi vero.', 49, 11, '2019-06-01 14:34:45', '2019-06-01 14:34:45'),
(42, 'http://www.renner.net/', 'Consectetur blanditiis consectetur tempora vitae ut blanditiis explicabo. Non qui ea cumque illum aut laboriosam quam. Rerum quia natus ex quibusdam.', 49, 1, '2019-06-01 14:34:45', '2019-06-01 14:34:45'),
(43, 'http://sanford.com/nihil-porro-quaerat-qui-aut-corrupti-quasi-sit.html', 'Velit vero et ratione facere. Quod id qui laboriosam voluptatibus omnis et. Omnis sit qui dignissimos.', 43, 2, '2019-06-01 14:34:45', '2019-06-01 14:34:45'),
(44, 'http://www.thompson.biz/', 'Rerum culpa aut sequi beatae. Accusamus maiores et voluptates et. Voluptas debitis veniam harum voluptas officia.', 45, 12, '2019-06-01 14:34:45', '2019-06-01 14:34:45'),
(45, 'http://www.cartwright.com/voluptatum-quis-voluptatum-quaerat-quaerat', 'Et qui omnis quis fuga quia illo. Ratione quibusdam quis voluptates mollitia qui consectetur eaque modi. Aspernatur et alias qui libero laborum.', 43, 1, '2019-06-01 14:34:45', '2019-06-01 14:34:45'),
(46, 'https://www.lemke.biz/amet-id-voluptatibus-eum-et-autem-laborum', 'Culpa quo sint placeat necessitatibus nihil aut perspiciatis. Nostrum delectus praesentium labore nesciunt. Nesciunt ipsa sint nemo numquam non.', 46, 18, '2019-06-01 14:34:45', '2019-06-01 14:34:45'),
(47, 'http://www.gutmann.info/quia-explicabo-quam-numquam', 'Deleniti non aut qui. Dolorem consequatur culpa quo dolores. Aut et repellendus minima sit.', 40, 16, '2019-06-01 14:34:45', '2019-06-01 14:34:45'),
(48, 'http://wiza.info/et-temporibus-pariatur-molestiae-ut-aut-nulla.html', 'Distinctio aut sed sit similique. Qui vel est dicta excepturi. Beatae perferendis odio aut quae velit maiores.', 51, 20, '2019-06-01 14:34:45', '2019-06-01 14:34:45'),
(49, 'http://kassulke.com/est-ea-et-itaque-commodi-nisi', 'Iusto provident id dolores aut tempora vero dignissimos. Magni ducimus ipsum eum fugit qui veritatis amet. Ex ea itaque consequatur.', 35, 10, '2019-06-01 14:34:45', '2019-06-01 14:34:45'),
(50, 'http://www.dibbert.com/voluptatem-ipsam-est-doloribus-maiores-aperiam-pariatur', 'Doloremque qui tenetur et occaecati iure voluptatum. Quia dicta cupiditate voluptatem praesentium quidem. Autem id possimus et corrupti cupiditate.', 48, 12, '2019-06-01 14:34:45', '2019-06-01 14:34:45');

-- --------------------------------------------------------

--
-- Structure de la table `school_issued_books`
--

DROP TABLE IF EXISTS `school_issued_books`;
CREATE TABLE IF NOT EXISTS `school_issued_books` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_code` int(11) NOT NULL,
  `book_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `issue_date` date NOT NULL,
  `return_date` date NOT NULL,
  `fine` decimal(8,2) NOT NULL,
  `borrowed` tinyint(4) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `school_issued_books`
--

INSERT INTO `school_issued_books` (`id`, `student_code`, `book_id`, `quantity`, `school_id`, `issue_date`, `return_date`, `fine`, `borrowed`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 4506805, 30, 13, 11, '1998-12-04', '1970-08-02', '13.00', 0, 78, '2019-06-01 14:35:36', '2019-06-01 14:35:36'),
(2, 4204886, 11, 34, 48, '1986-12-08', '2004-09-21', '13.00', 1, 116, '2019-06-01 14:35:36', '2019-06-01 14:35:36'),
(3, 2182996, 1, 5, 14, '1995-11-22', '1975-04-02', '8.00', 1, 30, '2019-06-01 14:35:37', '2019-06-01 14:35:37'),
(4, 4899553, 28, 34, 43, '1995-01-11', '1970-11-24', '34.00', 1, 138, '2019-06-01 14:35:37', '2019-06-01 14:35:37'),
(5, 728862, 29, 8, 21, '1976-11-21', '1979-05-31', '8.00', 1, 46, '2019-06-01 14:35:37', '2019-06-01 14:35:37');

-- --------------------------------------------------------

--
-- Structure de la table `school_messages`
--

DROP TABLE IF EXISTS `school_messages`;
CREATE TABLE IF NOT EXISTS `school_messages` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `messages_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `school_messages`
--

INSERT INTO `school_messages` (`id`, `phone_number`, `email`, `message`, `school_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '6343097', 'oral66@example.net', 'Dolor suscipit ut commodi et quo qui. Eligendi occaecati eius quis nihil recusandae ipsam autem. Maiores quod id sunt temporibus non vel.', 11, 123, '2019-06-01 14:35:28', '2019-06-01 14:35:28'),
(2, '2713663', 'lrussel@example.net', 'Nobis odit ad eum enim earum debitis aut. Voluptatum iste dolor autem quaerat. Qui vitae neque laboriosam praesentium numquam nesciunt provident.', 18, 85, '2019-06-01 14:35:29', '2019-06-01 14:35:29'),
(3, '152859', 'maximo54@example.org', 'Sequi culpa qui rem magnam et. Atque voluptatem fuga ducimus nam suscipit. Aut eaque quia quia et.', 40, 38, '2019-06-01 14:35:29', '2019-06-01 14:35:29'),
(4, '4498677', 'fadel.jaquan@example.org', 'Est repellendus illum corrupti consequatur. Quidem impedit accusantium at omnis. Modi a consequuntur eveniet recusandae perspiciatis tempora.', 37, 135, '2019-06-01 14:35:29', '2019-06-01 14:35:29'),
(5, '5099081', 'uhagenes@example.com', 'Dolorem velit totam et vero provident assumenda est. Debitis deleniti dignissimos qui ullam. Autem et qui laborum odio voluptatem praesentium.', 51, 53, '2019-06-01 14:35:29', '2019-06-01 14:35:29'),
(6, '9038792', 'xrussel@example.net', 'Sit dolore non dolorum aperiam rerum. Placeat ea molestiae ratione. Facere eum officia et harum sunt quisquam quisquam ea.', 42, 174, '2019-06-01 14:35:29', '2019-06-01 14:35:29'),
(7, '9383060', 'jayme48@example.net', 'Illo maiores dolor quidem at laboriosam quos et. Tempora adipisci rerum sunt et eum. Nisi nobis fugiat qui repellendus.', 45, 117, '2019-06-01 14:35:29', '2019-06-01 14:35:29'),
(8, '2005382', 'tania06@example.com', 'Qui quia quo et repellat qui unde doloremque. Omnis tenetur ut illo ipsam ipsa porro quia. Rem ut laboriosam qui quod.', 46, 77, '2019-06-01 14:35:29', '2019-06-01 14:35:29'),
(9, '36416', 'greenfelder.clint@example.com', 'Nulla nulla sed totam quidem et. Facere nisi consequuntur quia eum corporis odio numquam. Ut consequatur magni modi aut.', 42, 240, '2019-06-01 14:35:29', '2019-06-01 14:35:29'),
(10, '4094291', 'mittie.keebler@example.com', 'Vel eum saepe est impedit facilis iusto excepturi repellat. Voluptatum enim sunt aut in voluptates quidem. Sit a incidunt nihil qui qui distinctio.', 37, 82, '2019-06-01 14:35:29', '2019-06-01 14:35:29'),
(11, '3253099', 'howell.euna@example.net', 'Placeat dicta sunt ducimus voluptatibus voluptatem illo aperiam. Perferendis voluptas ea quam rerum est. Velit perferendis incidunt eaque dolorem.', 33, 95, '2019-06-01 14:35:30', '2019-06-01 14:35:30'),
(12, '3230569', 'ikoch@example.com', 'Vel facere consequuntur tenetur sed adipisci. Vel quod molestiae quae cupiditate vel earum eligendi. Quam omnis beatae voluptatem.', 42, 202, '2019-06-01 14:35:30', '2019-06-01 14:35:30'),
(13, '4615895', 'eichmann.victoria@example.com', 'Et beatae officia in corporis exercitationem vel. Enim iure dolores ullam sed adipisci. Quia animi eos deleniti nihil ut non omnis.', 49, 250, '2019-06-01 14:35:30', '2019-06-01 14:35:30'),
(14, '4562410', 'edward52@example.com', 'Quibusdam quaerat eum dolores doloribus sit repudiandae nam. Ab consequatur numquam animi quae consequuntur. Laboriosam ipsa et numquam.', 47, 243, '2019-06-01 14:35:30', '2019-06-01 14:35:30'),
(15, '4953189', 'kaufderhar@example.org', 'Corrupti minima voluptas laboriosam consequuntur eaque in molestias. Vel dolorem molestiae non est. Aut voluptatem est quia commodi.', 17, 113, '2019-06-01 14:35:30', '2019-06-01 14:35:30'),
(16, '4485256', 'mozell.okeefe@example.org', 'Assumenda eum inventore neque quas. Architecto ut repellat et. Vero non provident voluptas unde provident enim.', 42, 17, '2019-06-01 14:35:30', '2019-06-01 14:35:30'),
(17, '489669', 'matilda91@example.net', 'Suscipit consequatur ea voluptatibus in velit nobis et. Et et eaque voluptatum eos voluptatem temporibus ex. Consequatur dolore et vero impedit voluptatem incidunt sit et.', 11, 62, '2019-06-01 14:35:30', '2019-06-01 14:35:30'),
(18, '9222331', 'shayne.ankunding@example.com', 'Suscipit enim et rerum. Et repellendus illum velit reprehenderit iste nihil doloremque. Enim odit consequatur aliquam saepe id.', 27, 152, '2019-06-01 14:35:30', '2019-06-01 14:35:30'),
(19, '6568563', 'leuschke.maggie@example.org', 'Autem et harum quia laboriosam dolor perferendis et. Velit sapiente in nesciunt consequuntur enim optio voluptatem. Porro quia fugiat eius quo aperiam.', 18, 59, '2019-06-01 14:35:30', '2019-06-01 14:35:30'),
(20, '4693157', 'macejkovic.geoffrey@example.net', 'Voluptates rerum maxime fuga cum. Est sint sunt voluptatum ad. Porro repellat necessitatibus cumque delectus possimus quaerat.', 42, 240, '2019-06-01 14:35:30', '2019-06-01 14:35:30'),
(21, '7713728', 'kautzer.alayna@example.com', 'Eius quod eaque voluptas porro nemo tenetur. Harum aliquid similique est alias sit quas recusandae vitae. Sed et pariatur quidem ex cupiditate beatae ut.', 41, 176, '2019-06-01 14:35:30', '2019-06-01 14:35:30'),
(22, '3033959', 'wolf.colin@example.org', 'Iusto aliquam magni voluptatem quos illum soluta nesciunt voluptatem. Nam vel iste voluptatem qui maxime. Velit minus iusto voluptatem voluptatem.', 24, 219, '2019-06-01 14:35:30', '2019-06-01 14:35:30'),
(23, '3231443', 'mohr.may@example.org', 'Et nisi nisi ut magnam et. Voluptates velit inventore ex officiis. Quo provident laborum quis iste id aut earum blanditiis.', 24, 190, '2019-06-01 14:35:31', '2019-06-01 14:35:31'),
(24, '6529578', 'ckoss@example.com', 'Asperiores reprehenderit quia porro rerum molestiae. Et adipisci quisquam est deserunt omnis. Qui minus omnis libero exercitationem qui fugit.', 40, 146, '2019-06-01 14:35:31', '2019-06-01 14:35:31'),
(25, '5468348', 'qdenesik@example.com', 'Voluptatibus incidunt et quidem iure et ut. Odit et aut itaque id. Placeat impedit nihil dignissimos possimus est recusandae in.', 22, 138, '2019-06-01 14:35:31', '2019-06-01 14:35:31'),
(26, '5165674', 'igleichner@example.net', 'Eos reiciendis illo quisquam animi sed debitis. Et illo ut voluptatum atque. Accusamus quia nisi quia tempore aut ipsam libero.', 51, 44, '2019-06-01 14:35:31', '2019-06-01 14:35:31'),
(27, '8592880', 'qharber@example.net', 'Nulla qui ut possimus sunt est minus. Provident harum omnis vel deserunt. Consectetur et est vero reiciendis aliquam dolor numquam.', 13, 14, '2019-06-01 14:35:31', '2019-06-01 14:35:31'),
(28, '2425075', 'uwitting@example.net', 'Quo velit provident quibusdam sit. Quia totam quia ut eos officia nam. Qui nihil quos modi nihil et.', 8, 92, '2019-06-01 14:35:31', '2019-06-01 14:35:31'),
(29, '3576273', 'bert.schroeder@example.org', 'Dolor facilis minima dolorum velit eos similique. Et quod commodi sunt iure et. Accusantium quae alias temporibus exercitationem qui.', 9, 8, '2019-06-01 14:35:31', '2019-06-01 14:35:31'),
(30, '4821457', 'pthiel@example.com', 'Dolores repellat veritatis voluptate. Qui blanditiis et doloremque voluptate qui sint non. Rerum aspernatur labore nam non excepturi omnis.', 28, 42, '2019-06-01 14:35:31', '2019-06-01 14:35:31'),
(31, '3222140', 'luz.ohara@example.net', 'Doloremque ut perspiciatis illo dignissimos quis omnis est nam. Quia atque earum quas. Quis nobis consequatur nam sequi.', 2, 76, '2019-06-01 14:35:31', '2019-06-01 14:35:31'),
(32, '4626533', 'fannie.kessler@example.org', 'Iusto inventore sequi autem sed. Quis molestias est soluta qui. Ratione illo beatae architecto earum amet.', 39, 228, '2019-06-01 14:35:31', '2019-06-01 14:35:31'),
(33, '6845695', 'kassulke.hiram@example.com', 'Tempora laborum ut repudiandae hic et. Debitis enim voluptas quis rem voluptatibus. Nulla ut voluptates voluptatem labore et quia officiis.', 38, 85, '2019-06-01 14:35:31', '2019-06-01 14:35:31'),
(34, '7243867', 'stone93@example.com', 'Architecto delectus illo rem exercitationem dicta temporibus. Nisi nulla id hic ad. Et ut et impedit quasi.', 46, 70, '2019-06-01 14:35:31', '2019-06-01 14:35:31'),
(35, '806881', 'feil.hope@example.org', 'Qui modi voluptates et voluptatibus. Est consequatur est qui dolor aperiam et maiores qui. Voluptates ad modi similique enim.', 36, 156, '2019-06-01 14:35:32', '2019-06-01 14:35:32'),
(36, '6518299', 'icorkery@example.net', 'Quod inventore ab nesciunt debitis. Vel tempora iusto et. Aliquam maiores quas distinctio doloribus.', 14, 59, '2019-06-01 14:35:32', '2019-06-01 14:35:32'),
(37, '1472445', 'cremin.dell@example.com', 'Voluptate hic et et inventore. Sed nemo quam ut ducimus culpa voluptatum perspiciatis. Voluptatem quo explicabo fugiat minus voluptatem ex.', 19, 169, '2019-06-01 14:35:32', '2019-06-01 14:35:32'),
(38, '1800519', 'schiller.misael@example.org', 'Iusto nihil dolorem et omnis enim. Dicta quod in neque odio omnis est. Consequuntur est aut aperiam ut ipsa inventore quia molestiae.', 51, 218, '2019-06-01 14:35:32', '2019-06-01 14:35:32'),
(39, '4608870', 'feest.alvena@example.net', 'Quibusdam odio quia quidem sunt quibusdam sit. Tempore molestias aut omnis aspernatur. Cumque quod at ea iusto omnis blanditiis cupiditate ipsa.', 38, 132, '2019-06-01 14:35:32', '2019-06-01 14:35:32'),
(40, '3064653', 'pollich.nona@example.org', 'Reiciendis eum quia commodi facilis consequatur. Pariatur corporis est aut et. Aut dolores sint modi officiis iure reiciendis id tempore.', 12, 136, '2019-06-01 14:35:32', '2019-06-01 14:35:32'),
(41, '9709764', 'ocie.ritchie@example.net', 'Optio asperiores rem fugiat dolorem voluptatem. Aut similique id quidem beatae. Labore vero veniam qui saepe dolores provident.', 5, 133, '2019-06-01 14:35:32', '2019-06-01 14:35:32'),
(42, '2039788', 'lourdes.boyle@example.org', 'Ut harum ipsam repellat sint nemo ex non ipsum. Excepturi dolorem rem ex voluptatem veniam sapiente. Iure occaecati assumenda dolor quia dolore eius.', 48, 63, '2019-06-01 14:35:32', '2019-06-01 14:35:32'),
(43, '115341', 'boyle.dahlia@example.org', 'Ea ea sint deserunt illum officiis. Aliquam tempora dolor ut mollitia. Iure et nisi fuga vel commodi inventore itaque.', 24, 96, '2019-06-01 14:35:32', '2019-06-01 14:35:32'),
(44, '4824725', 'tboyle@example.com', 'Ea assumenda qui sit et. Ullam aspernatur voluptatem dolorem assumenda maxime odit ea. Recusandae ab et voluptates id iure nulla.', 7, 27, '2019-06-01 14:35:32', '2019-06-01 14:35:32'),
(45, '7015267', 'bleannon@example.org', 'Aut unde explicabo velit quasi. Est praesentium illum beatae voluptas. Nihil officiis natus soluta.', 25, 28, '2019-06-01 14:35:32', '2019-06-01 14:35:32'),
(46, '6870993', 'champlin.jaqueline@example.com', 'Sequi maxime aut dolorum tempore fuga sunt. Similique nisi doloremque aspernatur culpa aut. Voluptates autem vero sed dignissimos.', 29, 243, '2019-06-01 14:35:32', '2019-06-01 14:35:32'),
(47, '3092516', 'webert@example.net', 'Quia et facere minima vel. Vel deserunt consequuntur suscipit commodi et. Aliquam quisquam aut voluptatem doloribus.', 22, 189, '2019-06-01 14:35:32', '2019-06-01 14:35:32'),
(48, '422391', 'steuber.nichole@example.org', 'Ut ipsa et molestiae iure laudantium. Aspernatur cumque libero explicabo. Architecto distinctio ullam minus qui qui voluptas ea.', 9, 51, '2019-06-01 14:35:32', '2019-06-01 14:35:32'),
(49, '5032821', 'ohara.deja@example.org', 'Consectetur delectus quibusdam nihil numquam. Dolorem necessitatibus corporis sed harum placeat. Et impedit autem ipsum odit ut atque odit.', 37, 74, '2019-06-01 14:35:32', '2019-06-01 14:35:32'),
(50, '3633401', 'usmith@example.com', 'Voluptatum sint vero id dicta maxime et sunt sit. Inventore quia debitis praesentium quia. Sequi quas molestiae placeat hic at eum minus.', 21, 81, '2019-06-01 14:35:33', '2019-06-01 14:35:33');

-- --------------------------------------------------------

--
-- Structure de la table `school_migrations`
--

DROP TABLE IF EXISTS `school_migrations`;
CREATE TABLE IF NOT EXISTS `school_migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `school_migrations`
--

INSERT INTO `school_migrations` (`id`, `migration`, `batch`) VALUES
(43, '2014_10_12_000000_create_schools_table', 1),
(44, '2014_10_12_100000_create_users_table', 1),
(45, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(46, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(47, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(48, '2016_06_01_000004_create_oauth_clients_table', 1),
(49, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(50, '2017_12_21_065735_create_exams_table', 1),
(51, '2017_12_27_025313_create_password_resets_table', 1),
(52, '2017_12_27_025349_create_attendances_table', 1),
(53, '2017_12_27_025413_create_classes_table', 1),
(54, '2017_12_27_025427_create_sections_table', 1),
(55, '2017_12_27_025450_create_syllabuses_table', 1),
(56, '2017_12_27_025503_create_notices_table', 1),
(57, '2017_12_27_025512_create_events_table', 1),
(58, '2017_12_27_025530_create_homeworks_table', 1),
(59, '2017_12_27_025542_create_routines_table', 1),
(60, '2017_12_27_025556_create_grades_table', 1),
(61, '2017_12_27_025612_create_notifications_table', 1),
(62, '2017_12_27_025631_create_feedbacks_table', 1),
(63, '2017_12_27_025644_create_books_table', 1),
(64, '2017_12_27_025727_create_courses_table', 1),
(65, '2017_12_27_025738_create_forms_table', 1),
(66, '2017_12_27_025751_create_messages_table', 1),
(67, '2017_12_27_025806_create_faqs_table', 1),
(68, '2018_02_06_161642_create_fees_table', 1),
(69, '2018_03_26_105657_create_grade_systems_table', 1),
(70, '2018_03_27_153448_create_issued_books_table', 1),
(71, '2018_04_01_195635_create_accounts_table', 1),
(72, '2018_04_01_195715_create_account_sectors_table', 1),
(73, '2018_04_29_121233_create_student_infos_table', 1),
(74, '2018_04_29_121517_create_student_board_exams_table', 1),
(75, '2018_10_05_163435_create_exam_for_classes_table', 1),
(76, '2018_10_08_002853_add_department_class_teacher_to_users_table', 1),
(77, '2018_10_09_093606_add_term_start_end_date_to_exams_table', 1),
(78, '2018_10_09_203125_create_departments_table', 1),
(79, '2019_04_08_105033_add_class_id_to_syllabuses_table', 1),
(80, '2019_04_08_121149_add_section_id_to_routines_table', 1),
(81, '2019_04_25_101700_add_active_to_exam_for_class_table', 1),
(82, '2019_05_10_151601_add_stripe_fields_in_users_table', 1),
(83, '2019_05_10_163920_create_stripe_subscription_table', 1),
(84, '2019_05_10_193135_create_payments_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `school_notices`
--

DROP TABLE IF EXISTS `school_notices`;
CREATE TABLE IF NOT EXISTS `school_notices` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `file_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `school_notices`
--

INSERT INTO `school_notices` (`id`, `file_path`, `title`, `description`, `active`, `school_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'http://crist.com/nostrum-omnis-libero-recusandae-sequi-dicta-quia.html', 'Et ab eos sit nihil illum nihil voluptas voluptas.', 'Corrupti a illo eos accusantium nostrum ut eius distinctio. Quia quasi qui eligendi omnis quas distinctio cum ipsam. Labore sed quo dolorum natus nam sed.', 1, 1, 52, '2019-06-01 14:34:29', '2019-06-01 14:34:29'),
(2, 'http://russel.com/natus-velit-laborum-ea-ut-vel-rerum', 'Reprehenderit deserunt sapiente enim rem eos explicabo.', 'Eos rerum quisquam pariatur est. Ad in quisquam facilis neque eius optio. Pariatur sed quo nam quo debitis.', 1, 1, 261, '2019-06-01 14:34:29', '2019-06-01 14:34:29'),
(3, 'http://kreiger.com/expedita-optio-doloremque-suscipit-unde-consequatur.html', 'Dolores magni minus soluta asperiores.', 'Placeat veniam perspiciatis aut quis praesentium non. Voluptate nam aperiam voluptas mollitia iure vel consequuntur optio. Delectus neque dolorum unde delectus illum quaerat.', 1, 1, 223, '2019-06-01 14:34:29', '2019-06-01 14:34:29'),
(4, 'http://www.tillman.biz/', 'Ut minima repellat inventore sit autem ipsam enim.', 'Labore debitis molestiae sunt illo. Est enim aut velit rerum veritatis maiores. Debitis aut et similique aut eos minus.', 0, 1, 70, '2019-06-01 14:34:30', '2019-06-01 14:34:30'),
(5, 'http://effertz.biz/assumenda-libero-repellat-id-aliquid-necessitatibus-amet', 'Expedita temporibus dolores mollitia quia odit aut deserunt.', 'Illum quaerat error soluta. Ut doloremque est rerum aut illo delectus dolores. Debitis debitis excepturi eum.', 0, 1, 248, '2019-06-01 14:34:30', '2019-06-01 14:34:30'),
(6, 'http://www.emard.net/aut-reiciendis-expedita-molestias-unde-ducimus-mollitia', 'Voluptatem aut omnis quis voluptatem.', 'Harum quis voluptatem corporis est architecto reiciendis ut. Fugit voluptatem in voluptatum ea voluptatem. Incidunt aut quas quia unde temporibus laborum dolore.', 0, 1, 55, '2019-06-01 14:34:30', '2019-06-01 14:34:30'),
(7, 'http://www.bergnaum.com/eligendi-magni-deserunt-enim-consequatur', 'Et quam ut nulla non.', 'Sed ea ut ut vel et debitis. Praesentium autem tenetur nemo nulla quo. Dolor consequuntur cupiditate esse sequi quo.', 1, 1, 93, '2019-06-01 14:34:30', '2019-06-01 14:34:30'),
(8, 'http://www.hackett.com/nisi-sit-dolor-nisi-voluptatem-nemo-laudantium.html', 'Fuga rerum ipsa mollitia autem modi sit dolores error.', 'Sit fuga est possimus non explicabo sed nam. Magni fugiat pariatur et dolor qui. Eveniet dolor et in est.', 1, 1, 226, '2019-06-01 14:34:30', '2019-06-01 14:34:30'),
(9, 'http://www.mayert.com/pariatur-iure-et-recusandae-est-et-magnam-veniam', 'Laboriosam doloremque impedit et eligendi.', 'Reprehenderit sit voluptate quasi quia dolore dignissimos eos ut. Et aspernatur quia laboriosam qui dolorem libero. Perferendis et ex ut dolorem aut corporis.', 1, 1, 191, '2019-06-01 14:34:30', '2019-06-01 14:34:30'),
(10, 'http://medhurst.net/voluptatem-repellendus-officiis-debitis-totam.html', 'Sequi nemo reiciendis quaerat officiis cupiditate sit esse.', 'Sint facilis reprehenderit nemo est. Molestiae aut in nisi vero quod laudantium excepturi. Vel quaerat et minus sit laudantium labore tempora.', 0, 1, 11, '2019-06-01 14:34:30', '2019-06-01 14:34:30'),
(11, 'http://bahringer.com/debitis-autem-tempore-aut-quis-doloribus-quaerat-sed', 'Ut soluta non totam sint error.', 'Aliquid minima aperiam asperiores ipsam laudantium. Officia tempora consectetur nam odio et. Aut tempore nihil omnis commodi debitis aliquid omnis perspiciatis.', 0, 1, 48, '2019-06-01 14:34:30', '2019-06-01 14:34:30'),
(12, 'http://www.kshlerin.com/et-provident-recusandae-nesciunt-voluptas', 'Facere delectus eligendi magnam libero id.', 'Odit rerum aut maxime id et. Perspiciatis iure sed voluptates dolorem quos. Quasi iure ex consequatur eos.', 0, 1, 148, '2019-06-01 14:34:30', '2019-06-01 14:34:30'),
(13, 'http://www.jerde.com/necessitatibus-quod-eius-nihil-atque-molestiae-explicabo', 'Consequatur doloribus dolorem qui omnis sed qui mollitia.', 'Ab illo voluptatem illum laboriosam. Ut voluptas mollitia qui magnam est sed. Quasi alias sint consequatur sed quis.', 0, 1, 229, '2019-06-01 14:34:30', '2019-06-01 14:34:30'),
(14, 'http://gerhold.com/error-quibusdam-quae-quam-aliquam-non-totam', 'Quia debitis quos maxime ut.', 'Quibusdam soluta hic ex rerum. Harum quo magni quod sunt nisi tenetur voluptas. Et minus provident sequi at incidunt est rerum.', 0, 1, 226, '2019-06-01 14:34:30', '2019-06-01 14:34:30'),
(15, 'https://www.mann.com/in-atque-ex-et-repudiandae-quia-officiis', 'Dolorem error consequatur molestiae atque.', 'Quia doloribus fuga et fuga. Aliquid fugit sed qui quo ipsum minus. Sit officiis nulla magni et.', 0, 1, 43, '2019-06-01 14:34:30', '2019-06-01 14:34:30'),
(16, 'http://buckridge.com/aliquam-id-autem-ut-vitae-molestiae', 'Nam qui perspiciatis voluptas.', 'Et sit deserunt qui sequi ab odit aut. Iste hic quia expedita id suscipit earum quibusdam. Quam sit architecto amet tenetur.', 0, 1, 220, '2019-06-01 14:34:30', '2019-06-01 14:34:30'),
(17, 'http://stehr.com/ea-et-rerum-ipsam-possimus', 'Eaque perferendis officia aut aliquid incidunt ut fuga.', 'Consequatur earum sunt occaecati necessitatibus praesentium. Occaecati vel et voluptatum est ut vel. Dolorem eius amet deserunt ratione rem est.', 1, 1, 148, '2019-06-01 14:34:31', '2019-06-01 14:34:31'),
(18, 'http://jones.org/porro-numquam-voluptatem-aliquam-ea-nihil-adipisci.html', 'Eius sed et molestias dolorem.', 'Esse eaque non inventore impedit labore. Sed provident blanditiis et dolor voluptatem. Delectus ea ut est quam necessitatibus consequatur.', 1, 1, 252, '2019-06-01 14:34:31', '2019-06-01 14:34:31'),
(19, 'http://gleason.com/tenetur-esse-voluptas-nobis-voluptatibus-aut-quod.html', 'Aut voluptatum et ipsum dicta aut pariatur.', 'Ratione aut sapiente ipsa sed. Perspiciatis maiores dignissimos sit nihil quibusdam sit est delectus. Eos voluptate et autem dolor dignissimos.', 0, 1, 195, '2019-06-01 14:34:31', '2019-06-01 14:34:31'),
(20, 'http://www.larson.com/consequatur-consequatur-dolorum-veritatis-fugit-nostrum', 'Blanditiis voluptas deleniti quae rem iste eius consequuntur.', 'Officia fugiat nisi optio eos reprehenderit. Maiores adipisci aut quis quam. Et ad repellat enim molestias consectetur.', 0, 1, 205, '2019-06-01 14:34:31', '2019-06-01 14:34:31'),
(21, 'http://www.mckenzie.info/quam-ea-earum-incidunt-saepe-quis-assumenda.html', 'Tempore dolores sapiente quo aut aliquam ut.', 'Temporibus quam maxime dolorem atque quisquam nihil. Quo magni dolorem dolorum magni. Nulla dolorem ratione eligendi sit incidunt qui dolore similique.', 0, 1, 153, '2019-06-01 14:34:31', '2019-06-01 14:34:31'),
(22, 'http://crist.info/impedit-doloremque-voluptate-delectus-pariatur-autem-praesentium-accusantium.html', 'Accusamus facere veniam dicta voluptatum ut quam.', 'Voluptatem aut dignissimos est voluptas autem. Et dolorem assumenda architecto molestiae omnis ipsam fuga. Atque ut sapiente labore qui atque quasi.', 1, 1, 148, '2019-06-01 14:34:31', '2019-06-01 14:34:31'),
(23, 'http://swaniawski.com/', 'Dolores et et molestiae voluptas quia est temporibus.', 'Qui iusto repellat delectus iste facere expedita aliquid ut. Maxime voluptas ut voluptas eos tempora. Ut sapiente delectus et officia atque.', 1, 1, 253, '2019-06-01 14:34:31', '2019-06-01 14:34:31'),
(24, 'http://www.rempel.com/molestiae-veritatis-quod-nisi-consequatur-praesentium-molestiae-error', 'Velit reiciendis expedita incidunt eligendi facilis nulla perferendis.', 'Itaque quam quo mollitia nisi. Similique architecto facilis quam quo quaerat facilis. Eaque illum accusamus voluptatem ex ut maxime.', 0, 1, 168, '2019-06-01 14:34:31', '2019-06-01 14:34:31'),
(25, 'http://waters.biz/aut-quia-qui-voluptatem.html', 'Facilis ullam saepe et molestias unde.', 'Sunt voluptas eos doloribus minima velit ut. Alias voluptatem occaecati provident saepe. Quae occaecati qui eum quas eos voluptate nam.', 0, 1, 10, '2019-06-01 14:34:31', '2019-06-01 14:34:31'),
(26, 'https://gulgowski.net/iusto-soluta-vero-error-repellat-quasi-minima.html', 'Expedita ut est et molestias ut.', 'Quia sint est ut reprehenderit. Et error quaerat eligendi culpa omnis minima tempore et. Dicta numquam qui recusandae animi incidunt illo.', 1, 1, 165, '2019-06-01 14:34:31', '2019-06-01 14:34:31'),
(27, 'http://www.quitzon.com/molestiae-iusto-optio-adipisci-explicabo-hic.html', 'Minus hic molestiae distinctio quia ea.', 'Consequatur vel tenetur sunt aliquam. Qui nihil tempore eos saepe aspernatur. Consequatur neque similique enim aut ea.', 0, 1, 170, '2019-06-01 14:34:31', '2019-06-01 14:34:31'),
(28, 'http://medhurst.org/laboriosam-nostrum-earum-corporis', 'Rerum accusantium omnis inventore.', 'Et ut impedit magni quia. Itaque neque tenetur rerum omnis quo est velit accusantium. Et facere qui aspernatur labore.', 1, 1, 240, '2019-06-01 14:34:31', '2019-06-01 14:34:31'),
(29, 'http://effertz.com/at-voluptas-iure-quisquam.html', 'Saepe hic voluptatum et sit omnis.', 'Qui non inventore placeat corporis. Eaque quia laborum enim voluptas harum quo quia similique. Debitis suscipit temporibus odio tempore aut.', 1, 1, 251, '2019-06-01 14:34:31', '2019-06-01 14:34:31'),
(30, 'http://www.willms.com/culpa-et-odio-et-praesentium-quia-exercitationem-consequuntur', 'Voluptatem nisi tempore sit facere molestiae.', 'Sed cupiditate vitae nihil ducimus praesentium culpa aut quasi. Cumque molestias voluptas delectus. Aut eveniet sed ullam quis repellat impedit.', 1, 1, 93, '2019-06-01 14:34:31', '2019-06-01 14:34:31'),
(31, 'http://www.greenholt.com/', 'Nemo corporis occaecati dolorem ut.', 'Et est enim quo voluptate officiis minus accusantium. Debitis et blanditiis expedita rerum eum. Ducimus expedita consequatur sunt eum suscipit.', 1, 1, 229, '2019-06-01 14:34:31', '2019-06-01 14:34:31'),
(32, 'http://www.doyle.com/', 'Esse natus impedit sit saepe.', 'Sed nam quia optio voluptates cupiditate. Dignissimos ex id praesentium aliquam occaecati iusto. Repellat laborum natus est voluptates eligendi.', 1, 1, 136, '2019-06-01 14:34:31', '2019-06-01 14:34:31'),
(33, 'http://www.gleason.info/eveniet-expedita-molestiae-ipsa-corrupti-sapiente-est-ut.html', 'Et facere architecto molestiae expedita cum doloribus labore ea.', 'Optio ut et omnis est est. Facilis similique maxime et autem adipisci maxime qui. Nobis ab aut nemo ipsum qui.', 1, 1, 173, '2019-06-01 14:34:31', '2019-06-01 14:34:31'),
(34, 'http://www.gorczany.com/quasi-repellat-ad-voluptatem-debitis-qui-velit', 'Cupiditate sed magni aut enim reiciendis.', 'Suscipit provident quis voluptatibus at vero. Maxime numquam sed et. Blanditiis atque eius dolorem odit beatae.', 0, 1, 85, '2019-06-01 14:34:31', '2019-06-01 14:34:31'),
(35, 'http://brakus.com/distinctio-et-modi-iusto-vitae-ut-dolor-illum.html', 'Minus omnis quam pariatur aut laborum similique.', 'Eaque est voluptatem enim cum sed eaque. Et quidem asperiores quidem rem. Quidem dolor occaecati et ad est aut ut.', 0, 1, 99, '2019-06-01 14:34:31', '2019-06-01 14:34:31'),
(36, 'http://trantow.net/ea-dolores-beatae-vitae-aut-sunt', 'Facere autem est nobis omnis magni.', 'Aut ullam eius consectetur suscipit eos sit nihil. Fuga animi dicta inventore. Molestiae repellat autem minus odit quaerat quibusdam non.', 1, 1, 29, '2019-06-01 14:34:31', '2019-06-01 14:34:31'),
(37, 'http://www.von.com/iste-veritatis-quae-dolores-magni-aut-eaque', 'Dolor quisquam dolor aliquid occaecati inventore accusantium.', 'Ipsum libero magnam rerum magni. Quas veritatis fugit quos eos vitae voluptate distinctio. Quia alias necessitatibus tempore aspernatur animi accusamus omnis.', 0, 1, 199, '2019-06-01 14:34:31', '2019-06-01 14:34:31'),
(38, 'http://www.jacobson.info/atque-voluptate-quo-dicta-nihil-consequuntur-et-officia.html', 'Voluptatibus maxime omnis unde.', 'Illum voluptatem dolorem et et exercitationem voluptas pariatur sint. Dolor magnam sit assumenda eligendi. Impedit ratione reiciendis sapiente dolor perferendis.', 0, 1, 54, '2019-06-01 14:34:32', '2019-06-01 14:34:32'),
(39, 'http://www.kuhn.com/voluptas-minima-assumenda-voluptatum-excepturi-dignissimos.html', 'Quia veritatis ut aliquid necessitatibus voluptas nemo.', 'Libero vel est minima sit atque. Qui et exercitationem ea ipsam qui qui quos qui. Doloremque velit omnis a qui mollitia.', 0, 1, 192, '2019-06-01 14:34:32', '2019-06-01 14:34:32'),
(40, 'https://www.marvin.org/sapiente-exercitationem-aliquid-esse', 'Ab odit consectetur eum consequuntur et velit.', 'Culpa laborum sint commodi rerum mollitia nisi magni cum. Ea officia vero et quod quam illo harum. Esse dolore eaque cupiditate repellat quos non.', 0, 1, 35, '2019-06-01 14:34:32', '2019-06-01 14:34:32'),
(41, 'http://www.deckow.org/sapiente-voluptate-voluptas-fugit-repudiandae.html', 'Et molestiae eos facere vitae.', 'Voluptatem iste earum similique officiis officiis vitae. Et sunt consequatur consequatur nesciunt officiis. Inventore ex quia corrupti provident.', 1, 1, 174, '2019-06-01 14:34:32', '2019-06-01 14:34:32'),
(42, 'http://www.osinski.biz/aperiam-commodi-eligendi-illum-et.html', 'Accusamus ea laborum quidem beatae molestiae iure accusamus.', 'Blanditiis aut id enim sunt amet assumenda dolorem. Cupiditate qui sit iure quisquam consequatur eveniet. Nisi eos vero temporibus.', 1, 1, 144, '2019-06-01 14:34:32', '2019-06-01 14:34:32'),
(43, 'http://www.hudson.org/natus-assumenda-nobis-earum-nobis-expedita-officia', 'Quibusdam sunt ipsum aut laudantium.', 'Expedita itaque fugit voluptatem consequuntur. Dolores vitae excepturi tempore qui tenetur nemo reprehenderit et. Et quaerat nemo aperiam animi.', 0, 1, 260, '2019-06-01 14:34:32', '2019-06-01 14:34:32'),
(44, 'http://www.renner.com/et-ad-quasi-vel', 'Ipsum vero voluptas rerum quisquam consequatur corrupti.', 'Unde beatae totam quia quasi optio qui. Voluptatem quo et minima. Doloremque vitae cupiditate sunt sed ut eum.', 1, 1, 180, '2019-06-01 14:34:32', '2019-06-01 14:34:32'),
(45, 'http://www.lind.com/reprehenderit-debitis-inventore-animi-dignissimos-corporis-praesentium', 'Et omnis qui modi temporibus velit qui.', 'Consequatur tempore veniam magnam omnis. Deserunt iusto rerum rem quam. Tempora laboriosam consectetur voluptatem non porro nihil ratione.', 1, 1, 232, '2019-06-01 14:34:32', '2019-06-01 14:34:32'),
(46, 'http://www.ebert.com/dignissimos-nobis-iure-laboriosam-consectetur-eius-voluptatibus-pariatur', 'Et sunt ut aspernatur quidem ea itaque saepe.', 'Earum eligendi corporis nam exercitationem. Aspernatur cum ut ratione modi. Nihil nemo quia dolorem asperiores enim voluptas eos earum.', 0, 1, 163, '2019-06-01 14:34:32', '2019-06-01 14:34:32'),
(47, 'http://champlin.net/voluptatem-rerum-nulla-aperiam-dolores.html', 'Omnis qui sit dolores natus voluptates quos.', 'Sequi error tenetur sunt officia velit suscipit. Minus qui explicabo totam facere. Consequatur in dolorum enim quam.', 0, 1, 221, '2019-06-01 14:34:32', '2019-06-01 14:34:32'),
(48, 'http://www.beatty.com/', 'Atque dolor alias ea nam vel consectetur.', 'Magni nostrum mollitia consectetur qui quia quibusdam possimus cupiditate. Ex error sit aliquid unde. Voluptates rerum suscipit ut atque.', 1, 1, 149, '2019-06-01 14:34:32', '2019-06-01 14:34:32'),
(49, 'http://www.hand.com/', 'Vitae praesentium dolorum maxime vitae neque sint.', 'Nobis corrupti occaecati sint corporis qui voluptas. Placeat eaque dicta enim corporis et minima. Qui reiciendis cumque possimus enim.', 0, 1, 178, '2019-06-01 14:34:32', '2019-06-01 14:34:32'),
(50, 'http://www.larson.com/corrupti-eum-assumenda-natus-ea', 'Vero nobis ratione doloribus et aut natus.', 'Commodi reiciendis est possimus accusamus id. Possimus doloribus quod repudiandae rerum in. Delectus est quia quam sed doloremque dicta.', 1, 1, 209, '2019-06-01 14:34:33', '2019-06-01 14:34:33');

-- --------------------------------------------------------

--
-- Structure de la table `school_notifications`
--

DROP TABLE IF EXISTS `school_notifications`;
CREATE TABLE IF NOT EXISTS `school_notifications` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sent_status` tinyint(4) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `school_notifications`
--

INSERT INTO `school_notifications` (`id`, `sent_status`, `active`, `message`, `student_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 'Provident rerum laborum sint vitae quis totam. Quis inventore non enim sint autem cum veritatis quia. Eaque eos praesentium at voluptatem voluptatem consequuntur dolorem.', 246, 199, '2019-06-01 14:34:50', '2019-06-01 14:34:50'),
(2, 1, 1, 'Fuga officia nisi earum provident vel voluptatibus sed. Alias ullam exercitationem facere. Ab quod vero aperiam.', 201, 179, '2019-06-01 14:34:50', '2019-06-01 14:34:50'),
(3, 0, 1, 'Officiis nulla temporibus occaecati enim corporis at. Nobis ab esse ea repellendus maiores eum labore. Soluta recusandae atque accusantium enim totam saepe et.', 73, 13, '2019-06-01 14:34:50', '2019-06-01 14:34:50'),
(4, 0, 0, 'Dolor dignissimos aperiam dolor cupiditate dignissimos qui maxime. Inventore sint blanditiis voluptatem quasi minima. Voluptas non id perferendis debitis minima error.', 121, 183, '2019-06-01 14:34:50', '2019-06-01 14:34:50'),
(5, 0, 1, 'Non et et in accusantium totam asperiores quae debitis. Ut corrupti dolorum praesentium et deserunt consequatur ut. Cupiditate consequuntur amet necessitatibus quo qui iste.', 214, 39, '2019-06-01 14:34:50', '2019-06-01 14:34:50'),
(6, 0, 0, 'Soluta ipsa est asperiores beatae. Reiciendis quas sint blanditiis quisquam numquam. Aut nostrum numquam voluptas magnam minima.', 200, 194, '2019-06-01 14:34:50', '2019-06-01 14:34:50'),
(7, 0, 0, 'Ad est asperiores asperiores provident est consectetur commodi. Velit perspiciatis praesentium eos atque minus temporibus distinctio velit. Quia necessitatibus laborum quis quod iure quas.', 70, 226, '2019-06-01 14:34:51', '2019-06-01 14:34:51'),
(8, 1, 0, 'Est assumenda ipsa quam. Voluptatibus consectetur sed aliquam expedita inventore molestias. Numquam voluptate quas et eius.', 121, 104, '2019-06-01 14:34:51', '2019-06-01 14:34:51'),
(9, 1, 0, 'Fugiat reiciendis ad eaque sit voluptatem. Voluptatem quae quo quasi praesentium delectus. Ut voluptate quo harum quae harum vitae.', 126, 259, '2019-06-01 14:34:51', '2019-06-01 14:34:51'),
(10, 0, 1, 'Sed veritatis voluptatibus quo aperiam omnis. Et quibusdam consequuntur consequatur enim earum. Eveniet cupiditate corporis consectetur modi.', 217, 136, '2019-06-01 14:34:51', '2019-06-01 14:34:51'),
(11, 1, 0, 'Laborum odio corrupti numquam officia. Ipsam eos dolore ea inventore aut labore. Est ratione omnis saepe voluptatem.', 235, 19, '2019-06-01 14:34:51', '2019-06-01 14:34:51'),
(12, 0, 1, 'Eligendi perferendis impedit omnis exercitationem velit et velit. Repudiandae perspiciatis enim quo facilis corporis exercitationem optio. Inventore non ab quisquam quis ex dolorem repudiandae magnam.', 202, 198, '2019-06-01 14:34:51', '2019-06-01 14:34:51'),
(13, 0, 1, 'Possimus iure iste veritatis alias. Numquam et esse enim consequuntur voluptatibus ipsam. Ipsum sint doloremque consequuntur.', 175, 143, '2019-06-01 14:34:51', '2019-06-01 14:34:51'),
(14, 1, 1, 'Et sunt quia cupiditate ullam facere placeat eius. Asperiores dolorem nisi rem facere omnis. Odit quis veniam ut pariatur est non qui.', 222, 127, '2019-06-01 14:34:51', '2019-06-01 14:34:51'),
(15, 0, 0, 'Non repellendus deserunt debitis qui a laboriosam ea iusto. Nihil quos commodi rerum ratione animi. Suscipit ipsa est nesciunt sunt.', 135, 75, '2019-06-01 14:34:51', '2019-06-01 14:34:51'),
(16, 0, 0, 'Libero architecto aliquid ea officiis. Iure animi placeat recusandae dignissimos quidem necessitatibus deleniti. Veritatis velit quis ut.', 201, 127, '2019-06-01 14:34:51', '2019-06-01 14:34:51'),
(17, 1, 1, 'A velit iste tempore quis veritatis. Et repellat est cupiditate maiores. Ad et ad aut sunt sed eum nihil.', 230, 163, '2019-06-01 14:34:51', '2019-06-01 14:34:51'),
(18, 1, 0, 'Et placeat odio est aut corrupti consequatur repudiandae. Beatae ea iste aperiam voluptatem enim labore similique. Voluptates vitae sed quas tempore odit aspernatur id.', 92, 125, '2019-06-01 14:34:51', '2019-06-01 14:34:51'),
(19, 1, 0, 'Ducimus et aut cum dignissimos rerum nam. Cupiditate qui repudiandae dolore ex necessitatibus dolorem est. Possimus tenetur itaque rerum deleniti ex quia aut itaque.', 150, 45, '2019-06-01 14:34:51', '2019-06-01 14:34:51'),
(20, 1, 0, 'Aspernatur et dolor quibusdam laudantium. Voluptas dicta ex sed cupiditate omnis consequatur numquam. Animi nihil autem aut dolorem culpa id.', 203, 193, '2019-06-01 14:34:52', '2019-06-01 14:34:52'),
(21, 0, 0, 'Recusandae velit voluptatum nihil eos nemo pariatur inventore. Voluptas et temporibus incidunt ut explicabo. Eius iusto ad laborum vel.', 108, 197, '2019-06-01 14:34:52', '2019-06-01 14:34:52'),
(22, 1, 0, 'Sequi qui iure officia. Ipsum illo porro totam. Quia architecto eius dolores occaecati.', 120, 178, '2019-06-01 14:34:52', '2019-06-01 14:34:52'),
(23, 0, 1, 'Ipsum aperiam accusamus aut alias aspernatur veniam. Odit unde laudantium ea minima ad voluptatem in. Ducimus quia eos modi laborum consequatur ut cumque.', 138, 169, '2019-06-01 14:34:52', '2019-06-01 14:34:52'),
(24, 0, 1, 'Nihil veritatis voluptatem minima est qui dolorem sed. Deleniti aut sint culpa dolore voluptas accusamus animi. Possimus dolorem totam quia.', 162, 101, '2019-06-01 14:34:52', '2019-06-01 14:34:52'),
(25, 1, 0, 'Ut consequatur saepe recusandae fugit. Reiciendis omnis ut dolores voluptatum. Enim dolorem voluptas dolor nihil molestiae nesciunt.', 139, 87, '2019-06-01 14:34:52', '2019-06-01 14:34:52'),
(26, 1, 0, 'Veritatis at adipisci sint. Quaerat error sit voluptatem placeat libero sunt in. Nulla ipsam cum id voluptates soluta aut sit.', 219, 238, '2019-06-01 14:34:52', '2019-06-01 14:34:52'),
(27, 1, 1, 'Et officia vero rem totam officia molestiae. Et cum doloribus id vel aut perferendis iusto. Neque architecto voluptas delectus quis.', 261, 170, '2019-06-01 14:34:52', '2019-06-01 14:34:52'),
(28, 1, 1, 'Temporibus alias voluptatum alias ea. Et aut voluptatem dolores ducimus temporibus porro rerum. Molestiae blanditiis dolore voluptas voluptatem neque non earum.', 234, 110, '2019-06-01 14:34:52', '2019-06-01 14:34:52'),
(29, 1, 1, 'Corporis architecto sunt incidunt itaque et. Corrupti pariatur quis qui ut dolorem non et. Aut eius asperiores sed omnis accusamus quia quod.', 65, 139, '2019-06-01 14:34:52', '2019-06-01 14:34:52'),
(30, 1, 1, 'Et et dolorum et quis porro et. Aperiam earum aut omnis. Voluptatem est iste deserunt voluptatem.', 73, 220, '2019-06-01 14:34:52', '2019-06-01 14:34:52'),
(31, 0, 0, 'Suscipit dolorem autem similique quis laborum architecto. Exercitationem rerum voluptatem ex hic et. Ducimus dicta sapiente aliquam est minima.', 77, 6, '2019-06-01 14:34:52', '2019-06-01 14:34:52'),
(32, 1, 0, 'Qui hic voluptatem et aut temporibus et. Maiores ducimus aut omnis nihil. Vel deserunt quia et et sed ipsa ut.', 122, 210, '2019-06-01 14:34:52', '2019-06-01 14:34:52'),
(33, 0, 1, 'Praesentium molestiae reiciendis provident enim ea ipsum. Rem commodi optio consequatur molestias dicta minima. Tempore aut qui fugiat consectetur quisquam eos odit.', 253, 256, '2019-06-01 14:34:52', '2019-06-01 14:34:52'),
(34, 0, 0, 'Aspernatur nostrum minima exercitationem sapiente porro aliquid. Alias sit tempora architecto quae occaecati debitis. Amet eos reprehenderit natus nobis.', 225, 15, '2019-06-01 14:34:53', '2019-06-01 14:34:53'),
(35, 1, 0, 'Iste neque aut omnis eos similique asperiores atque. Deleniti doloremque laborum veritatis non officia. Soluta quasi illo quidem eum assumenda sit.', 83, 140, '2019-06-01 14:34:53', '2019-06-01 14:34:53'),
(36, 0, 0, 'Corrupti harum ducimus nulla. Repellat rerum molestiae expedita voluptas maxime aperiam perspiciatis. Iure nobis magni saepe explicabo numquam aut voluptatem.', 221, 91, '2019-06-01 14:34:53', '2019-06-01 14:34:53'),
(37, 0, 0, 'Quo itaque quis nemo corrupti cum. Qui quia eum minima voluptas et. Distinctio dolores odit minus distinctio natus.', 243, 114, '2019-06-01 14:34:53', '2019-06-01 14:34:53'),
(38, 0, 0, 'Eum non est et quidem. Illum qui illo et impedit perspiciatis qui. Esse quas et molestiae.', 154, 161, '2019-06-01 14:34:53', '2019-06-01 14:34:53'),
(39, 0, 1, 'Rerum aut et modi neque sint qui ex. Eos voluptatum accusantium quo ex. Dolores et et maxime voluptatibus.', 141, 105, '2019-06-01 14:34:53', '2019-06-01 14:34:53'),
(40, 1, 0, 'Et et eum voluptas fugiat nam autem. Et totam dolorem aut aliquid architecto quod. Consequatur voluptates sapiente porro ut excepturi enim.', 152, 61, '2019-06-01 14:34:53', '2019-06-01 14:34:53'),
(41, 0, 1, 'Est voluptatem est sed dolores dolor assumenda. Consequuntur impedit nesciunt ea. Suscipit dolores ut saepe eos voluptas.', 211, 12, '2019-06-01 14:34:53', '2019-06-01 14:34:53'),
(42, 1, 1, 'Optio neque eligendi sunt dolorum dolores et earum. Iusto praesentium voluptatem molestiae voluptas. Nihil aut vero in quia rerum.', 93, 261, '2019-06-01 14:34:53', '2019-06-01 14:34:53'),
(43, 0, 0, 'Eaque et error neque est doloremque. Corrupti eum sed unde magnam maxime eos et. Fuga pariatur ducimus delectus ipsum ipsam.', 238, 120, '2019-06-01 14:34:53', '2019-06-01 14:34:53'),
(44, 1, 1, 'Magnam asperiores rem dignissimos. Architecto pariatur sint aspernatur. Vero perferendis voluptatem illum vel.', 217, 205, '2019-06-01 14:34:53', '2019-06-01 14:34:53'),
(45, 0, 0, 'Enim dolor voluptate debitis fuga ut blanditiis. Ex numquam est ducimus voluptatem similique modi. Odit voluptates molestias sapiente deleniti inventore qui.', 70, 254, '2019-06-01 14:34:53', '2019-06-01 14:34:53'),
(46, 0, 0, 'Et ut quibusdam cum. Et aut dicta quo maxime sapiente non sunt. Quisquam in tenetur fugiat dolorem.', 192, 196, '2019-06-01 14:34:54', '2019-06-01 14:34:54'),
(47, 1, 1, 'Nihil incidunt laborum ipsum et. Necessitatibus aut ex perspiciatis est reiciendis. Aut consectetur consequatur molestias.', 225, 17, '2019-06-01 14:34:54', '2019-06-01 14:34:54'),
(48, 1, 0, 'Magnam architecto quis recusandae eligendi consequuntur quae necessitatibus. Fugiat aut magnam minus sed aut aut corporis. Ad quae odit consectetur fugit reiciendis nostrum quas corrupti.', 100, 174, '2019-06-01 14:34:54', '2019-06-01 14:34:54'),
(49, 1, 1, 'Atque placeat exercitationem vel excepturi sint unde quod quo. Vero dolorum dignissimos quos molestias sed officiis voluptatum molestiae. Assumenda consectetur repellat et rerum tenetur.', 227, 234, '2019-06-01 14:34:54', '2019-06-01 14:34:54'),
(50, 0, 0, 'Iusto minima dignissimos minus. Omnis est hic quibusdam error animi. Ipsam quae expedita rerum veniam dolorum.', 163, 166, '2019-06-01 14:34:54', '2019-06-01 14:34:54');

-- --------------------------------------------------------

--
-- Structure de la table `school_oauth_access_tokens`
--

DROP TABLE IF EXISTS `school_oauth_access_tokens`;
CREATE TABLE IF NOT EXISTS `school_oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `school_oauth_auth_codes`
--

DROP TABLE IF EXISTS `school_oauth_auth_codes`;
CREATE TABLE IF NOT EXISTS `school_oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `school_oauth_clients`
--

DROP TABLE IF EXISTS `school_oauth_clients`;
CREATE TABLE IF NOT EXISTS `school_oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `school_oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `school_oauth_personal_access_clients`;
CREATE TABLE IF NOT EXISTS `school_oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_personal_access_clients_client_id_index` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `school_oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `school_oauth_refresh_tokens`;
CREATE TABLE IF NOT EXISTS `school_oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `school_password_resets`
--

DROP TABLE IF EXISTS `school_password_resets`;
CREATE TABLE IF NOT EXISTS `school_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `school_payments`
--

DROP TABLE IF EXISTS `school_payments`;
CREATE TABLE IF NOT EXISTS `school_payments` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `payment_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` tinyint(4) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `custormer_id` int(10) UNSIGNED NOT NULL,
  `charge_for` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `school_routines`
--

DROP TABLE IF EXISTS `school_routines`;
CREATE TABLE IF NOT EXISTS `school_routines` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `file_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `section_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `school_routines`
--

INSERT INTO `school_routines` (`id`, `file_path`, `title`, `description`, `active`, `school_id`, `user_id`, `created_at`, `updated_at`, `section_id`) VALUES
(1, 'http://www.terry.com/nihil-laborum-animi-quia-id-consequatur.html', 'Rem officia error ut qui sunt ut.', 'Quae autem rerum sunt expedita dolores qui quia. Quia ratione quia nemo iste tempora minus. Praesentium inventore eligendi eligendi adipisci tenetur.', 0, 1, 202, '2019-06-01 14:34:46', '2019-06-01 14:34:46', 20),
(2, 'http://www.casper.biz/', 'Quasi est pariatur exercitationem ut voluptatem voluptate.', 'Ut enim quisquam dolorem quibusdam quidem veniam in dolores. Maiores perferendis aliquid minima et non non odit aut. Excepturi nisi doloribus qui enim omnis.', 1, 1, 8, '2019-06-01 14:34:46', '2019-06-01 14:34:46', 4),
(3, 'http://lubowitz.org/vel-ut-veritatis-itaque-et-vel-aut.html', 'Et itaque culpa culpa quidem autem eum.', 'Vitae et consequatur aut fuga voluptatum. Exercitationem omnis dolor corporis possimus fugit occaecati. Neque omnis qui veritatis accusantium.', 0, 1, 215, '2019-06-01 14:34:46', '2019-06-01 14:34:46', 8),
(4, 'http://www.nienow.com/rerum-consequuntur-esse-et-illum-sunt-ipsum', 'Ea accusantium repellendus nulla nihil.', 'Iste sit laudantium ducimus eaque dolorem. Ut nihil velit tempora inventore. Assumenda distinctio omnis qui ad voluptatibus.', 0, 1, 149, '2019-06-01 14:34:46', '2019-06-01 14:34:46', 18),
(5, 'http://steuber.biz/', 'Consectetur ratione libero doloremque provident.', 'Quam eveniet illum recusandae veritatis nemo et officiis inventore. Nesciunt molestiae sequi cumque et odit a non. Sed sed similique magnam fuga quae ut omnis.', 1, 1, 177, '2019-06-01 14:34:46', '2019-06-01 14:34:46', 14),
(6, 'http://www.lynch.com/', 'Placeat id officiis necessitatibus aut quibusdam qui.', 'Sed aliquid et porro hic aspernatur ipsum. Qui accusantium possimus enim officiis expedita. Aut harum nihil praesentium hic.', 0, 1, 220, '2019-06-01 14:34:46', '2019-06-01 14:34:46', 3),
(7, 'http://gleason.com/consectetur-soluta-rerum-laborum-est-rem-ipsam-ullam.html', 'Culpa voluptatem voluptatibus voluptas sed autem adipisci et.', 'Pariatur labore adipisci aut magnam non consequatur. Quia ipsam cum dolore temporibus. Quod accusantium cumque rem magnam quia et sed autem.', 0, 1, 108, '2019-06-01 14:34:46', '2019-06-01 14:34:46', 7),
(8, 'http://www.kunde.com/voluptas-rerum-aperiam-itaque-aut-et-quo', 'Voluptas laboriosam sit voluptatem voluptatem error molestiae ut.', 'Laboriosam quos ipsum suscipit sed maiores magnam quo inventore. Aut aspernatur alias velit suscipit eveniet sed ipsa dolores. Dolorem labore commodi aliquid fuga voluptatem.', 1, 1, 154, '2019-06-01 14:34:46', '2019-06-01 14:34:46', 14),
(9, 'http://www.ryan.org/', 'Ipsam corrupti velit molestiae voluptatem.', 'Pariatur sequi nihil facilis molestiae sed. Ut aut voluptatem quia iste. Aut et adipisci quia repellendus tempora error.', 0, 1, 188, '2019-06-01 14:34:46', '2019-06-01 14:34:46', 10),
(10, 'http://roob.org/', 'Eveniet quasi voluptatem sit porro.', 'Explicabo qui dignissimos et nam magni atque. Quo eos soluta in nemo ratione voluptas veritatis. Qui corporis sed repudiandae dolore voluptatum esse.', 1, 1, 107, '2019-06-01 14:34:46', '2019-06-01 14:34:46', 5),
(11, 'http://www.bogisich.com/a-sint-sit-totam-aut-alias', 'Nihil eius natus quia id culpa.', 'Ut impedit nulla accusantium beatae. Adipisci tempore eum modi laudantium ipsa qui. In hic illum id possimus.', 0, 1, 62, '2019-06-01 14:34:46', '2019-06-01 14:34:46', 20),
(12, 'https://gutkowski.com/et-et-laboriosam-quo-et-et-qui-libero.html', 'Maiores id nihil veniam recusandae facilis incidunt iusto.', 'Sed sapiente voluptatum dolorem nihil. Nam aut omnis cumque et dolorum. Laudantium cumque eius sunt sit rerum distinctio reprehenderit.', 1, 1, 45, '2019-06-01 14:34:46', '2019-06-01 14:34:46', 16),
(13, 'http://powlowski.info/', 'Qui nihil magni enim nisi dolorum.', 'Voluptas minima deleniti enim sit perspiciatis. Sunt sunt voluptas dolorem quo accusamus deleniti ratione. Dignissimos eveniet dolores placeat id.', 0, 1, 133, '2019-06-01 14:34:46', '2019-06-01 14:34:46', 5),
(14, 'http://www.lindgren.com/id-laudantium-deserunt-officiis-aperiam', 'Libero magnam recusandae nesciunt nisi ullam.', 'Asperiores qui maxime qui sunt. Non et vel ab magnam. Occaecati enim ullam ea sint enim.', 1, 1, 56, '2019-06-01 14:34:46', '2019-06-01 14:34:46', 5),
(15, 'http://www.bartoletti.net/aperiam-vel-eveniet-id-unde-amet', 'Et laboriosam id perferendis nemo.', 'Quia dolorem qui cupiditate ratione minima esse. Perspiciatis odit qui et. Voluptatem nobis dignissimos sed aut recusandae quidem.', 1, 1, 190, '2019-06-01 14:34:47', '2019-06-01 14:34:47', 18),
(16, 'http://www.ziemann.net/natus-veniam-est-dolorum-facere', 'Sit possimus quis nihil iure est et reiciendis.', 'Assumenda odit molestiae eum rerum possimus non eveniet. Voluptates architecto minima quas repellat saepe minima voluptas et. Ut facilis minima consequatur atque quis aut.', 1, 1, 146, '2019-06-01 14:34:47', '2019-06-01 14:34:47', 9),
(17, 'https://barton.com/est-nihil-quo-repellat-mollitia-molestias.html', 'Autem totam tenetur ut eaque ut voluptates.', 'Nam inventore necessitatibus quae culpa alias nesciunt. Expedita qui non at ex sint. Sit iusto aut laboriosam ea.', 0, 1, 10, '2019-06-01 14:34:47', '2019-06-01 14:34:47', 1),
(18, 'https://fahey.info/est-dolorem-ea-in-cumque-hic-labore.html', 'Dolor placeat maiores quia quo.', 'Sit consequatur harum commodi ipsa esse cumque. Eum architecto mollitia neque sequi. Sint in omnis laboriosam rerum.', 1, 1, 35, '2019-06-01 14:34:47', '2019-06-01 14:34:47', 14),
(19, 'http://wilkinson.biz/', 'Cumque necessitatibus animi porro ipsam odit.', 'Et fugit qui qui id dolores maxime. Quibusdam illo quo reprehenderit ut illo. Quis molestias sit hic repellendus eos.', 1, 1, 75, '2019-06-01 14:34:47', '2019-06-01 14:34:47', 6),
(20, 'https://www.mcdermott.org/ut-qui-nam-amet-fugit', 'Quam magnam qui non distinctio.', 'Recusandae cumque rerum consectetur vitae. Ut iure ullam voluptatem ratione non ut. Consectetur dolores repudiandae consectetur est suscipit consequatur et.', 0, 1, 29, '2019-06-01 14:34:47', '2019-06-01 14:34:47', 9),
(21, 'http://donnelly.com/', 'Ut commodi nobis vel molestiae sit eveniet.', 'Ut ea aliquid ab pariatur ut dignissimos est. Inventore neque quae reprehenderit aut dolorem molestiae tempora. Sit cum quo illo natus repellat omnis.', 0, 1, 116, '2019-06-01 14:34:47', '2019-06-01 14:34:47', 10),
(22, 'http://www.dooley.info/', 'Corporis dolorum eius excepturi id nam consequatur sequi.', 'Nesciunt necessitatibus quis quis ducimus debitis beatae optio. Sed et ea amet praesentium doloremque. Occaecati et ipsam quia et nemo.', 0, 1, 245, '2019-06-01 14:34:47', '2019-06-01 14:34:47', 17),
(23, 'http://www.trantow.info/iusto-ad-placeat-fuga-reprehenderit-sint-ea-at.html', 'Omnis sed in praesentium dolore.', 'Ipsum magni molestias eos ex voluptatem natus molestiae. Aspernatur iusto cum et voluptas debitis animi. Molestiae consectetur molestias consectetur vel consectetur rerum similique.', 1, 1, 228, '2019-06-01 14:34:47', '2019-06-01 14:34:47', 12),
(24, 'http://hagenes.biz/', 'Nobis inventore quidem ut ea delectus et deleniti.', 'Rerum id ab nostrum exercitationem omnis eum aut nostrum. Eligendi reiciendis dolorum doloribus sunt rerum. Aut voluptatem ut quasi qui voluptatem.', 1, 1, 135, '2019-06-01 14:34:47', '2019-06-01 14:34:47', 6),
(25, 'http://hodkiewicz.net/', 'Aut non nobis nulla fugiat sunt.', 'Dolorum tenetur consequatur consequatur in labore. Ratione earum velit sint assumenda ab. Quibusdam voluptatem consequatur consequatur eligendi quas voluptas tempore voluptatem.', 0, 1, 81, '2019-06-01 14:34:47', '2019-06-01 14:34:47', 17),
(26, 'http://www.macejkovic.com/consequatur-quod-saepe-nobis-eos', 'Error non aut et autem quia qui nihil illo.', 'Rem maxime optio minus qui. Nobis mollitia natus tempore fugiat molestias. Fugit sunt atque aut.', 1, 1, 63, '2019-06-01 14:34:47', '2019-06-01 14:34:47', 15),
(27, 'http://white.biz/consectetur-minima-explicabo-minus-illo-et-vero', 'Doloribus est tenetur voluptatibus fugit.', 'Architecto officiis dolore eum ut esse fugiat ut. Eos sit molestias vitae velit quo accusamus. Nam doloremque ex fugit qui.', 0, 1, 150, '2019-06-01 14:34:48', '2019-06-01 14:34:48', 1),
(28, 'http://gorczany.com/aspernatur-cupiditate-id-et-dolorum-at.html', 'Dolore sit impedit blanditiis veritatis culpa odio accusantium.', 'Laboriosam vel a officia. Doloribus reiciendis ea suscipit molestiae. Fugit ipsam deleniti odit enim provident accusantium.', 0, 1, 46, '2019-06-01 14:34:48', '2019-06-01 14:34:48', 3),
(29, 'http://huel.biz/eos-magni-qui-hic-eum-ea.html', 'Repellendus quaerat ullam aliquid temporibus autem quis explicabo.', 'Quas qui placeat sit molestiae eius itaque. Dolorem soluta soluta fugit vero a. Itaque et voluptates culpa aut inventore.', 0, 1, 175, '2019-06-01 14:34:48', '2019-06-01 14:34:48', 4),
(30, 'http://nolan.biz/quia-maiores-praesentium-cumque-dolores-alias', 'Esse autem aliquid cupiditate dolorem accusantium qui adipisci.', 'Iste eos quae earum nihil. Veniam quia aut minima facilis vero alias expedita. Voluptatem nihil omnis quis consequatur.', 1, 1, 57, '2019-06-01 14:34:48', '2019-06-01 14:34:48', 17),
(31, 'http://schmeler.com/et-voluptas-odit-unde-omnis-voluptatum.html', 'Maiores suscipit perspiciatis quia sint fugit.', 'Dolorem autem facere molestiae temporibus repellendus. Quia corrupti officiis nobis explicabo. Repudiandae et dolor doloribus iure quia impedit aut esse.', 0, 1, 178, '2019-06-01 14:34:48', '2019-06-01 14:34:48', 10),
(32, 'http://www.champlin.biz/voluptas-adipisci-voluptatem-nostrum-asperiores-ut.html', 'Maxime qui est voluptatem nihil aut.', 'Officiis unde sed exercitationem optio possimus dolores quia maxime. Est et natus quo sunt nulla maiores autem. Et et voluptatibus omnis id dolor excepturi qui.', 1, 1, 11, '2019-06-01 14:34:48', '2019-06-01 14:34:48', 15),
(33, 'https://ullrich.info/ratione-animi-fugit-quis-accusantium-veritatis.html', 'Et laborum repudiandae iusto doloribus expedita odit.', 'Optio facilis accusantium voluptatem sunt minus ut non. Enim repellendus tempore sed est blanditiis enim. Illo earum atque quaerat dignissimos.', 1, 1, 223, '2019-06-01 14:34:48', '2019-06-01 14:34:48', 10),
(34, 'http://www.mayer.com/', 'Totam iste ipsum consequatur eum facilis.', 'Dolorum quasi in reiciendis quod unde. Molestiae aspernatur necessitatibus accusamus voluptas. Explicabo eum sed repudiandae aliquid voluptas.', 1, 1, 87, '2019-06-01 14:34:48', '2019-06-01 14:34:48', 9),
(35, 'http://www.douglas.com/et-sunt-quia-pariatur-et-voluptatem-error-eveniet', 'Hic autem minus sit neque eaque in eveniet.', 'Ipsum ipsum aspernatur suscipit repellat. Voluptatem quis sed ea accusantium. Corporis eligendi consequatur voluptatem delectus dicta nobis.', 0, 1, 98, '2019-06-01 14:34:48', '2019-06-01 14:34:48', 7),
(36, 'http://www.dietrich.com/rerum-maxime-hic-dolore-suscipit-qui.html', 'Omnis sit qui sed incidunt culpa assumenda culpa.', 'Aut iure totam facilis architecto. Aut debitis voluptate minus. Ipsa ut suscipit distinctio laudantium nulla saepe saepe quas.', 1, 1, 123, '2019-06-01 14:34:48', '2019-06-01 14:34:48', 9),
(37, 'http://www.windler.com/', 'Quia delectus labore atque libero ducimus laudantium corporis.', 'Facilis voluptas et expedita autem doloribus qui. Officia blanditiis qui consequatur sunt saepe. Quasi architecto aut itaque blanditiis iste.', 0, 1, 258, '2019-06-01 14:34:48', '2019-06-01 14:34:48', 1),
(38, 'http://www.mohr.com/et-nesciunt-ab-architecto-rerum-nihil', 'Nesciunt sed nisi minus.', 'Quisquam laudantium quaerat omnis a. At ea pariatur voluptatibus blanditiis et aut. Illum velit hic repudiandae.', 0, 1, 142, '2019-06-01 14:34:48', '2019-06-01 14:34:48', 17),
(39, 'http://dooley.biz/non-veritatis-nemo-minus-ullam-omnis-odio.html', 'Quaerat possimus aut veniam nam sed aut temporibus placeat.', 'Distinctio est et autem repudiandae. Voluptatibus adipisci quibusdam dolorem molestias quidem aut et natus. Facilis sint quis quia tempore accusantium possimus aut quis.', 1, 1, 22, '2019-06-01 14:34:49', '2019-06-01 14:34:49', 19),
(40, 'http://www.schowalter.com/ut-sed-quia-incidunt-rerum-in-deserunt-minus', 'Ut illum laboriosam veritatis alias velit officia vero.', 'Velit et qui minima officia quaerat aperiam. Distinctio aliquam aut eum repellendus. Labore nulla eius voluptatibus vero odit necessitatibus et.', 0, 1, 180, '2019-06-01 14:34:49', '2019-06-01 14:34:49', 11),
(41, 'http://www.reichert.org/non-culpa-tenetur-possimus', 'Perspiciatis inventore nostrum dolorum accusamus quo quia tempora.', 'Quis est modi aliquid corporis est consequatur. Qui veritatis molestiae non voluptas et nostrum sint. Blanditiis iusto nesciunt totam non modi aut.', 1, 1, 84, '2019-06-01 14:34:49', '2019-06-01 14:34:49', 16),
(42, 'http://schaefer.info/', 'Et perspiciatis animi occaecati culpa sed at.', 'Aut vitae similique asperiores quia ut. Esse tempore aut tempora itaque necessitatibus odio et tenetur. Dolorum autem autem quibusdam dolore necessitatibus.', 0, 1, 86, '2019-06-01 14:34:49', '2019-06-01 14:34:49', 20),
(43, 'http://dubuque.com/et-quam-veniam-natus-adipisci-vero', 'Nemo molestiae omnis rem et quos repudiandae.', 'Ea rem aliquid vel eligendi consequatur voluptas. Cupiditate quas labore velit nam. Non dolorem dolor numquam minus eos omnis.', 1, 1, 71, '2019-06-01 14:34:49', '2019-06-01 14:34:49', 19),
(44, 'http://stracke.biz/pariatur-assumenda-eum-minima-eaque-harum-sed.html', 'Sunt possimus accusamus atque autem vel expedita expedita ducimus.', 'Ut ducimus iste non voluptas porro. Atque maxime quia sapiente in ea incidunt voluptatem ut. Voluptas quis soluta error.', 1, 1, 28, '2019-06-01 14:34:49', '2019-06-01 14:34:49', 4),
(45, 'http://www.hickle.com/', 'Magnam delectus non ex nesciunt veniam at recusandae.', 'Quae non excepturi occaecati maxime. Voluptatum et dicta sed magnam omnis. Impedit ullam fugiat nemo eaque et aut dolor.', 1, 1, 224, '2019-06-01 14:34:49', '2019-06-01 14:34:49', 2),
(46, 'https://durgan.com/vel-aut-aut-architecto-accusantium-qui-numquam-sequi.html', 'Adipisci ratione in tenetur recusandae.', 'Voluptatibus et ab rerum aut maxime eaque officia. Quod necessitatibus doloribus qui tempore ipsam sit. Ea quo voluptate sed amet.', 1, 1, 261, '2019-06-01 14:34:49', '2019-06-01 14:34:49', 12),
(47, 'http://hill.com/', 'Porro hic omnis maiores nemo.', 'Consectetur quia molestiae explicabo et. Molestiae molestiae dolore iusto reprehenderit. Reiciendis sed perferendis iure aut.', 1, 1, 129, '2019-06-01 14:34:49', '2019-06-01 14:34:49', 9),
(48, 'http://www.von.com/vero-repudiandae-molestiae-ducimus-sapiente-omnis-nemo', 'Aut ab voluptate et sed deserunt.', 'Vero odit et vel. Sint quis quaerat deleniti numquam ut. Consectetur quis reprehenderit doloremque blanditiis eos eaque.', 0, 1, 15, '2019-06-01 14:34:49', '2019-06-01 14:34:49', 18),
(49, 'https://www.hirthe.com/veritatis-deserunt-velit-praesentium-est-et-error-saepe', 'Voluptatem et ea et soluta.', 'In libero ipsum unde vel dicta non odio. Sit quia voluptas eaque ipsam quos voluptatem et voluptatem. Omnis amet doloribus nemo voluptate ad voluptas quis illo.', 1, 1, 249, '2019-06-01 14:34:49', '2019-06-01 14:34:49', 2),
(50, 'http://www.gerlach.com/', 'In impedit tempore et dolores omnis ullam.', 'Animi veritatis omnis dolor dolorem modi alias ut ut. Aut facere ipsam iusto laboriosam odio qui recusandae velit. Consequatur ut est voluptatum doloremque sint earum.', 1, 1, 128, '2019-06-01 14:34:49', '2019-06-01 14:34:49', 1);

-- --------------------------------------------------------

--
-- Structure de la table `school_schools`
--

DROP TABLE IF EXISTS `school_schools`;
CREATE TABLE IF NOT EXISTS `school_schools` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `established` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `medium` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` int(11) NOT NULL,
  `theme` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `schools_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `school_schools`
--

INSERT INTO `school_schools` (`id`, `name`, `established`, `about`, `medium`, `code`, `theme`, `created_at`, `updated_at`) VALUES
(1, 'Ms. Melody O\'Hara', '', 'Quod non eligendi et autem ut autem qui. Vel consequuntur quis sint rerum expedita. Eligendi et ut ut illo.', 'english', 19292940, 'flatly', '2019-06-01 14:33:58', '2019-06-01 14:33:58'),
(2, 'Winston Mraz', '', 'Fugiat dicta repellat dolor odit quia et sed. Harum iure ea voluptate. Minima fuga sint autem necessitatibus.', 'bangla', 19185988, 'flatly', '2019-06-01 14:35:14', '2019-06-01 14:35:14'),
(3, 'Dr. Joe Abshire Jr.', '', 'Culpa ea eos fugit vel. Officiis ratione culpa dolorem rerum. Est consequatur quo unde quis sunt eos.', 'bangla', 19160716, 'flatly', '2019-06-01 14:35:14', '2019-06-01 14:35:14'),
(4, 'Prof. Sigmund Hills I', '', 'Temporibus vel error molestiae sed quo accusantium. Ut voluptatem cum accusamus quia. Mollitia minus et velit dolorem nihil.', 'english', 19893784, 'flatly', '2019-06-01 14:35:14', '2019-06-01 14:35:14'),
(5, 'Mavis White', '', 'Quis soluta in laboriosam hic repudiandae temporibus laudantium. Exercitationem veniam excepturi quia eos quaerat rerum explicabo reprehenderit. Voluptatem sint inventore cumque dolorum et.', 'english', 19574550, 'flatly', '2019-06-01 14:35:15', '2019-06-01 14:35:15'),
(6, 'Jeramie Shanahan', '', 'Ut alias non dolorem repellat. Provident corrupti exercitationem sapiente non quo qui vel. Laudantium qui non quo aut cupiditate officiis necessitatibus quos.', 'english', 19290936, 'flatly', '2019-06-01 14:35:15', '2019-06-01 14:35:15'),
(7, 'Ms. Vena Beer I', '', 'Sequi illo reprehenderit incidunt. Consequatur eligendi deleniti sunt quia quia voluptas. Eum placeat officia reiciendis quia.', 'bangla', 19971205, 'flatly', '2019-06-01 14:35:15', '2019-06-01 14:35:15'),
(8, 'Anabel Wintheiser', '', 'Est in atque vitae in. Quo reiciendis dolor et itaque rerum aliquam laborum. Maxime cumque et accusamus mollitia eos.', 'english', 19524603, 'flatly', '2019-06-01 14:35:15', '2019-06-01 14:35:15'),
(9, 'Brendon Dibbert', '', 'Sunt sequi itaque mollitia id consequuntur voluptates qui. Deleniti ut saepe accusamus dolor tempore in autem sed. Expedita suscipit repellat cum sit ab quod nostrum dolor.', 'english', 19208271, 'flatly', '2019-06-01 14:35:15', '2019-06-01 14:35:15'),
(10, 'Minnie Tillman', '', 'Dolorum odio et accusamus aut maxime dolor ducimus. Porro molestias quia et pariatur repellat illo. Laborum quia velit veniam odit omnis.', 'english', 19466098, 'flatly', '2019-06-01 14:35:15', '2019-06-01 14:35:15'),
(11, 'Lesley Frami', '', 'Ex delectus harum reiciendis ut accusamus. Nulla ratione dolor quae laudantium. Fugiat aut quos est nobis porro quidem.', 'bangla', 19200120, 'flatly', '2019-06-01 14:35:15', '2019-06-01 14:35:15'),
(12, 'Mercedes Donnelly III', '', 'Est eius sed cum ad corrupti. Impedit assumenda et illo sequi nihil. Numquam sunt quidem corporis culpa.', 'english', 19169529, 'flatly', '2019-06-01 14:35:15', '2019-06-01 14:35:15'),
(13, 'Austyn Feeney', '', 'Tempora maxime voluptas maiores ea. Illum deleniti est dolores sunt. Necessitatibus corrupti voluptatem exercitationem consectetur at.', 'english', 19511260, 'flatly', '2019-06-01 14:35:15', '2019-06-01 14:35:15'),
(14, 'Tad Douglas', '', 'Cum accusamus dolorum sequi. In harum in nihil exercitationem iusto repellat. Voluptas quibusdam beatae rerum quia iusto ratione.', 'bangla', 19198150, 'flatly', '2019-06-01 14:35:16', '2019-06-01 14:35:16'),
(15, 'Mr. Jaiden Toy I', '', 'Vero et magni ut saepe ut et odit dolor. Quis magni hic illum beatae laborum. Minus et libero optio fugit sint sint ut.', 'english', 19194117, 'flatly', '2019-06-01 14:35:16', '2019-06-01 14:35:16'),
(16, 'Ms. Adriana Bogisich', '', 'Repellendus quae occaecati eligendi dignissimos est enim ut. Omnis et quam eligendi in rerum. Dolorem ratione perferendis laborum labore quas odio rerum.', 'english', 19102913, 'flatly', '2019-06-01 14:35:16', '2019-06-01 14:35:16'),
(17, 'Beatrice Walter DVM', '', 'Eos dolore amet doloribus tenetur aut autem. Molestias dignissimos quae incidunt odit qui non. Temporibus beatae ut maxime.', 'english', 19281968, 'flatly', '2019-06-01 14:35:16', '2019-06-01 14:35:16'),
(18, 'Alba Sawayn', '', 'Provident rem molestias similique omnis iure distinctio sequi. Est illo quis et et nam. Veritatis eos qui molestiae vitae alias.', 'bangla', 19139762, 'flatly', '2019-06-01 14:35:16', '2019-06-01 14:35:16'),
(19, 'Dominique Walker', '', 'Molestiae sequi ipsam modi ad incidunt id. Eum ut iste suscipit ab reprehenderit assumenda veritatis. Nisi illo distinctio minus odio cupiditate.', 'english', 19225572, 'flatly', '2019-06-01 14:35:16', '2019-06-01 14:35:16'),
(20, 'Antwan O\'Keefe PhD', '', 'Quod quia ipsa non et quo totam et. Delectus eius aut qui doloribus ut et. Impedit mollitia dolor quidem ut.', 'bangla', 19226868, 'flatly', '2019-06-01 14:35:16', '2019-06-01 14:35:16'),
(21, 'Mr. Terry Rempel DDS', '', 'Sed sed iure et culpa ipsa natus voluptatum. Itaque eligendi architecto voluptatem ducimus voluptatem. Et eligendi aut ut itaque accusamus est.', 'bangla', 19182341, 'flatly', '2019-06-01 14:35:16', '2019-06-01 14:35:16'),
(22, 'Sterling Walker III', '', 'Illum omnis praesentium dolorum sapiente et quam vel. Ratione voluptatem amet consequatur. Occaecati et et in et odio.', 'english', 19204752, 'flatly', '2019-06-01 14:35:16', '2019-06-01 14:35:16'),
(23, 'Dr. Cale Bernier PhD', '', 'Aspernatur sit rerum dignissimos quo. Voluptatem qui asperiores dolorem eum. Aspernatur non temporibus enim consequatur enim eos.', 'bangla', 19174663, 'flatly', '2019-06-01 14:35:16', '2019-06-01 14:35:16'),
(24, 'Magnolia Ledner I', '', 'Dolorum vero doloremque rerum odio rerum deserunt harum ipsum. Recusandae velit modi officiis laborum atque unde perspiciatis architecto. Voluptatem illum recusandae quod modi id.', 'bangla', 19290799, 'flatly', '2019-06-01 14:35:16', '2019-06-01 14:35:16'),
(25, 'Arnoldo Beier', '', 'Et eos rerum ipsam nam. Praesentium excepturi nihil corrupti voluptatem dolorum. Nam sapiente iusto quam aliquid qui voluptas vero.', 'bangla', 19593445, 'flatly', '2019-06-01 14:35:17', '2019-06-01 14:35:17'),
(26, 'Rhiannon Wiza PhD', '', 'Accusantium nostrum aliquid qui atque dolore sunt. Quia et qui quo quia nisi doloremque ad. Quis ipsum magni vel vitae enim atque expedita.', 'bangla', 19818207, 'flatly', '2019-06-01 14:35:17', '2019-06-01 14:35:17'),
(27, 'Prof. Sidney Prohaska MD', '', 'Ut sit vel qui non praesentium aliquid aut. Quidem accusamus et et consequatur dolor qui et. Dolorum excepturi est deserunt et.', 'bangla', 19214326, 'flatly', '2019-06-01 14:35:17', '2019-06-01 14:35:17'),
(28, 'Dr. Golden Harber', '', 'Alias aspernatur dolorem quaerat quo a aut reiciendis. Repudiandae molestias sequi sit accusamus illum id dolores quae. Est sapiente deserunt ullam repudiandae earum autem maxime.', 'english', 19489631, 'flatly', '2019-06-01 14:35:17', '2019-06-01 14:35:17'),
(29, 'Dr. Elvie Roberts III', '', 'Ut magni tempore id. Aut dolore voluptatem reiciendis a voluptatem. Vitae quibusdam ex adipisci accusamus sint eos.', 'bangla', 19169400, 'flatly', '2019-06-01 14:35:17', '2019-06-01 14:35:17'),
(30, 'Mr. Garnett Kiehn PhD', '', 'Quis in error velit. Incidunt illum quo nostrum eum molestiae optio. Cumque est quia odio et.', 'bangla', 19273326, 'flatly', '2019-06-01 14:35:17', '2019-06-01 14:35:17'),
(31, 'Ebba Olson IV', '', 'Expedita excepturi vel pariatur dolor libero et ipsam. Sit corrupti culpa commodi nulla. Ut et deleniti quas maxime beatae est.', 'bangla', 19163873, 'flatly', '2019-06-01 14:35:17', '2019-06-01 14:35:17'),
(32, 'Mrs. Yesenia Douglas', '', 'Saepe dicta vel velit doloribus. Omnis veritatis voluptas repellendus consequatur est laudantium. Sit doloremque sit nihil quaerat dolor eveniet.', 'bangla', 19232243, 'flatly', '2019-06-01 14:35:17', '2019-06-01 14:35:17'),
(33, 'Cortney Heathcote', '', 'Quibusdam aut expedita laboriosam aliquid. Fugiat odio eligendi quia voluptatem. Iste mollitia ullam aut perspiciatis.', 'bangla', 19269142, 'flatly', '2019-06-01 14:35:17', '2019-06-01 14:35:17'),
(34, 'Kristofer Johnson', '', 'Qui et molestiae perspiciatis nisi. Ea laudantium perferendis minus amet. Velit sunt corporis molestias vitae.', 'bangla', 19292810, 'flatly', '2019-06-01 14:35:17', '2019-06-01 14:35:17'),
(35, 'Richmond Schultz', '', 'Dolorem sunt delectus et qui. Ipsam maiores corrupti sunt distinctio. Amet qui consequatur aut dolores nesciunt.', 'english', 19322863, 'flatly', '2019-06-01 14:35:17', '2019-06-01 14:35:17'),
(36, 'Mr. Erich Rau', '', 'Magni libero harum dolorem praesentium maiores. Harum est doloremque quidem excepturi totam itaque. Veniam et eum atque et doloribus beatae unde.', 'bangla', 19182849, 'flatly', '2019-06-01 14:35:18', '2019-06-01 14:35:18'),
(37, 'Mr. Emmet Ritchie', '', 'Est mollitia atque dicta eligendi. Corrupti aperiam totam quod ab vel. Quae velit tenetur deleniti aut laboriosam sint.', 'english', 19974898, 'flatly', '2019-06-01 14:35:18', '2019-06-01 14:35:18'),
(38, 'Whitney Harvey', '', 'Aut rerum corporis quidem animi. Perspiciatis qui mollitia laudantium corrupti maxime. Voluptates perferendis suscipit harum non est laudantium quaerat.', 'english', 19188291, 'flatly', '2019-06-01 14:35:18', '2019-06-01 14:35:18'),
(39, 'Ryann Gislason MD', '', 'Et temporibus autem aut quod. Nesciunt illo dolor iusto molestiae et aut. Laboriosam iusto magni alias provident ex.', 'bangla', 19202456, 'flatly', '2019-06-01 14:35:18', '2019-06-01 14:35:18'),
(40, 'Angelica Schmidt', '', 'Alias harum est et. Laborum dolorum provident et. Expedita similique quia amet.', 'english', 19283346, 'flatly', '2019-06-01 14:35:18', '2019-06-01 14:35:18'),
(41, 'Eldora Beatty II', '', 'Consequuntur error mollitia earum qui quo occaecati. Autem quod necessitatibus dolore asperiores ex dolores consequuntur. Nesciunt autem voluptates ab pariatur voluptate quia voluptas.', 'bangla', 19116534, 'flatly', '2019-06-01 14:35:18', '2019-06-01 14:35:18'),
(42, 'Prof. Aimee Toy DVM', '', 'Autem aut dolore provident. Nesciunt et incidunt molestiae autem. Facilis nisi inventore repudiandae cumque qui at aut.', 'english', 19329178, 'flatly', '2019-06-01 14:35:18', '2019-06-01 14:35:18'),
(43, 'Linnea Pollich', '', 'Ut aperiam quis rerum quibusdam odit enim. Placeat repellendus id et. Officia tempora omnis perspiciatis dignissimos cumque eius officiis.', 'english', 19815020, 'flatly', '2019-06-01 14:35:18', '2019-06-01 14:35:18'),
(44, 'Gunner Nitzsche', '', 'Ratione debitis doloremque reiciendis nihil ut inventore qui molestiae. Consequatur iste similique vero officia numquam perspiciatis id. Et aut vero sed consequuntur quo.', 'bangla', 19303743, 'flatly', '2019-06-01 14:35:18', '2019-06-01 14:35:18'),
(45, 'Dr. Edyth Ryan', '', 'Commodi suscipit nesciunt ut id. Tempora temporibus quia dolores. Blanditiis non molestiae culpa dicta voluptatem dolore sed.', 'bangla', 19277513, 'flatly', '2019-06-01 14:35:18', '2019-06-01 14:35:18'),
(46, 'Uriel Welch I', '', 'Nemo iure et sit. Et dolor quia delectus omnis sit natus ad. Sunt soluta quia labore ea necessitatibus.', 'bangla', 19276126, 'flatly', '2019-06-01 14:35:19', '2019-06-01 14:35:19'),
(47, 'Dr. Isac Monahan', '', 'Quia voluptate est molestias non. Et quaerat et itaque dicta et dolorum. Suscipit quis delectus quibusdam molestias aut.', 'bangla', 19341462, 'flatly', '2019-06-01 14:35:19', '2019-06-01 14:35:19'),
(48, 'Cecile Reilly', '', 'Id dolor dolorum ipsa ut cupiditate impedit occaecati. Doloremque eaque nobis qui. Delectus at facere veniam aut ut eum sed.', 'bangla', 19160735, 'flatly', '2019-06-01 14:35:19', '2019-06-01 14:35:19'),
(49, 'Hudson Connelly', '', 'Sint assumenda beatae quis unde sit. Sapiente aliquam consequatur asperiores nihil soluta dolorum. Maxime ut adipisci enim assumenda odit et animi.', 'bangla', 19947540, 'flatly', '2019-06-01 14:35:19', '2019-06-01 14:35:19'),
(50, 'Melvina Ledner', '', 'Maiores inventore dicta rerum. Enim nemo ullam sunt inventore. Qui adipisci qui rerum perspiciatis.', 'bangla', 19131152, 'flatly', '2019-06-01 14:35:19', '2019-06-01 14:35:19'),
(51, 'Ms. Cara Huels IV', '', 'Praesentium autem quo eos sit tempore. Aut pariatur nam repudiandae ullam aut dolores ipsa. Praesentium et non sit sed soluta corporis.', 'bangla', 19194352, 'flatly', '2019-06-01 14:35:19', '2019-06-01 14:35:19');

-- --------------------------------------------------------

--
-- Structure de la table `school_sections`
--

DROP TABLE IF EXISTS `school_sections`;
CREATE TABLE IF NOT EXISTS `school_sections` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `section_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_number` int(11) NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `school_sections`
--

INSERT INTO `school_sections` (`id`, `section_number`, `room_number`, `class_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'I', 7, 11, 0, '2019-06-01 14:34:00', '2019-06-01 14:34:00'),
(2, 'F', 4, 3, 0, '2019-06-01 14:34:01', '2019-06-01 14:34:01'),
(3, 'E', 4, 8, 0, '2019-06-01 14:34:01', '2019-06-01 14:34:01'),
(4, 'H', 3, 12, 0, '2019-06-01 14:34:01', '2019-06-01 14:34:01'),
(5, 'L', 9, 9, 0, '2019-06-01 14:34:01', '2019-06-01 14:34:01'),
(6, 'L', 1, 2, 0, '2019-06-01 14:34:01', '2019-06-01 14:34:01'),
(7, 'B', 2, 4, 0, '2019-06-01 14:34:02', '2019-06-01 14:34:02'),
(8, 'I', 3, 9, 0, '2019-06-01 14:34:02', '2019-06-01 14:34:02'),
(9, 'I', 3, 4, 0, '2019-06-01 14:34:02', '2019-06-01 14:34:02'),
(10, 'H', 1, 9, 0, '2019-06-01 14:34:02', '2019-06-01 14:34:02'),
(11, 'B', 2, 5, 0, '2019-06-01 14:34:02', '2019-06-01 14:34:02'),
(12, 'J', 1, 9, 0, '2019-06-01 14:34:03', '2019-06-01 14:34:03'),
(13, 'J', 2, 10, 0, '2019-06-01 14:34:03', '2019-06-01 14:34:03'),
(14, 'F', 7, 11, 0, '2019-06-01 14:34:03', '2019-06-01 14:34:03'),
(15, 'H', 9, 8, 0, '2019-06-01 14:34:03', '2019-06-01 14:34:03'),
(16, 'G', 6, 10, 0, '2019-06-01 14:34:03', '2019-06-01 14:34:03'),
(17, 'J', 4, 8, 0, '2019-06-01 14:34:03', '2019-06-01 14:34:03'),
(18, 'I', 6, 9, 0, '2019-06-01 14:34:03', '2019-06-01 14:34:03'),
(19, 'H', 7, 4, 0, '2019-06-01 14:34:03', '2019-06-01 14:34:03'),
(20, 'K', 7, 7, 0, '2019-06-01 14:34:03', '2019-06-01 14:34:03');

-- --------------------------------------------------------

--
-- Structure de la table `school_student_board_exams`
--

DROP TABLE IF EXISTS `school_student_board_exams`;
CREATE TABLE IF NOT EXISTS `school_student_board_exams` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` int(10) UNSIGNED NOT NULL,
  `exam_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roll` int(11) NOT NULL,
  `registration` int(11) NOT NULL,
  `session` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `board` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passing_year` int(11) NOT NULL,
  `institution_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gpa` double(8,2) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=201 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `school_student_board_exams`
--

INSERT INTO `school_student_board_exams` (`id`, `student_id`, `exam_name`, `group`, `roll`, `registration`, `session`, `board`, `passing_year`, `institution_name`, `gpa`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 255, 'JSC', 'arts', 8855716, 1624476, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:51', '2019-06-01 14:35:51'),
(2, 78, 'O Level', 'commerce', 3628821, 5987564, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:51', '2019-06-01 14:35:51'),
(3, 254, 'A Level', 'science', 6344234, 9103358, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:51', '2019-06-01 14:35:51'),
(4, 177, 'O Level', 'commerce', 626967, 3483882, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:51', '2019-06-01 14:35:51'),
(5, 115, 'A Level', 'commerce', 7024439, 557983, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:51', '2019-06-01 14:35:51'),
(6, 208, 'JSC', 'commerce', 9781142, 4116419, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:51', '2019-06-01 14:35:51'),
(7, 254, 'A Level', 'science', 5773426, 8451838, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:51', '2019-06-01 14:35:51'),
(8, 93, 'O Level', 'commerce', 8269386, 4023274, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:51', '2019-06-01 14:35:51'),
(9, 198, 'SSC', 'commerce', 5417754, 2078533, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:51', '2019-06-01 14:35:51'),
(10, 81, 'A Level', 'science', 4701677, 4574271, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:51', '2019-06-01 14:35:51'),
(11, 120, 'JSC', 'science', 8973235, 2232822, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:52', '2019-06-01 14:35:52'),
(12, 69, 'A Level', 'arts', 4801140, 8594591, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:52', '2019-06-01 14:35:52'),
(13, 126, 'A Level', 'commerce', 1620816, 2541654, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:52', '2019-06-01 14:35:52'),
(14, 174, 'JSC', 'commerce', 4056410, 4780105, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:52', '2019-06-01 14:35:52'),
(15, 125, 'JSC', 'arts', 160910, 8656128, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:52', '2019-06-01 14:35:52'),
(16, 234, 'JSC', 'commerce', 1081393, 5433065, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:52', '2019-06-01 14:35:52'),
(17, 199, 'SSC', 'science', 6577613, 5285546, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:52', '2019-06-01 14:35:52'),
(18, 97, 'SSC', 'science', 8975326, 5632153, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:52', '2019-06-01 14:35:52'),
(19, 252, 'O Level', 'arts', 9875957, 8452275, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:52', '2019-06-01 14:35:52'),
(20, 217, 'A Level', 'science', 6883557, 9308707, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:52', '2019-06-01 14:35:52'),
(21, 134, 'JSC', 'arts', 9034609, 6142358, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:53', '2019-06-01 14:35:53'),
(22, 183, 'SSC', 'science', 5563586, 531826, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:53', '2019-06-01 14:35:53'),
(23, 217, 'JSC', 'science', 2473238, 8122404, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:53', '2019-06-01 14:35:53'),
(24, 206, 'JSC', 'arts', 7787921, 3569591, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:53', '2019-06-01 14:35:53'),
(25, 179, 'JSC', 'arts', 900113, 848175, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:53', '2019-06-01 14:35:53'),
(26, 116, 'O Level', 'science', 6178438, 249765, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:53', '2019-06-01 14:35:53'),
(27, 102, 'A Level', 'science', 1093464, 2657560, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:53', '2019-06-01 14:35:53'),
(28, 145, 'O Level', 'arts', 5475466, 5509288, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:53', '2019-06-01 14:35:53'),
(29, 216, 'A Level', 'science', 9065469, 9789156, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:53', '2019-06-01 14:35:53'),
(30, 196, 'JSC', 'commerce', 8735260, 9439205, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:53', '2019-06-01 14:35:53'),
(31, 103, 'A Level', 'commerce', 8879629, 269990, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:53', '2019-06-01 14:35:53'),
(32, 201, 'SSC', 'commerce', 3348191, 2344633, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:54', '2019-06-01 14:35:54'),
(33, 82, 'SSC', 'arts', 6826211, 8658396, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:54', '2019-06-01 14:35:54'),
(34, 197, 'O Level', 'arts', 3580854, 9182989, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:54', '2019-06-01 14:35:54'),
(35, 100, 'SSC', 'commerce', 9512738, 2850716, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:54', '2019-06-01 14:35:54'),
(36, 189, 'O Level', 'arts', 5261574, 6217584, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:54', '2019-06-01 14:35:54'),
(37, 246, 'A Level', 'arts', 3613003, 3268857, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:54', '2019-06-01 14:35:54'),
(38, 77, 'O Level', 'arts', 5403138, 6406600, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:54', '2019-06-01 14:35:54'),
(39, 69, 'JSC', 'commerce', 9721150, 243834, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:54', '2019-06-01 14:35:54'),
(40, 255, 'O Level', 'science', 1680402, 7248966, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:54', '2019-06-01 14:35:54'),
(41, 63, 'SSC', 'science', 9911530, 993077, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:54', '2019-06-01 14:35:54'),
(42, 130, 'O Level', 'science', 4152212, 4838463, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:54', '2019-06-01 14:35:54'),
(43, 238, 'A Level', 'arts', 6834504, 358427, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:55', '2019-06-01 14:35:55'),
(44, 140, 'SSC', 'arts', 4152807, 3213844, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:55', '2019-06-01 14:35:55'),
(45, 203, 'A Level', 'arts', 8783472, 2836083, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:55', '2019-06-01 14:35:55'),
(46, 128, 'A Level', 'science', 8271779, 7826260, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:55', '2019-06-01 14:35:55'),
(47, 224, 'SSC', 'science', 3064813, 7103311, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:55', '2019-06-01 14:35:55'),
(48, 160, 'JSC', 'arts', 9125357, 1526633, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:55', '2019-06-01 14:35:55'),
(49, 229, 'SSC', 'science', 8191262, 4816578, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:55', '2019-06-01 14:35:55'),
(50, 246, 'SSC', 'science', 564254, 5229903, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:55', '2019-06-01 14:35:55'),
(51, 124, 'O Level', 'science', 3971215, 6617209, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:55', '2019-06-01 14:35:55'),
(52, 234, 'O Level', 'commerce', 1799536, 5024064, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:55', '2019-06-01 14:35:55'),
(53, 134, 'A Level', 'science', 2327191, 8821000, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:56', '2019-06-01 14:35:56'),
(54, 118, 'O Level', 'arts', 6306602, 7949904, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:56', '2019-06-01 14:35:56'),
(55, 153, 'JSC', 'arts', 5150588, 2415214, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:56', '2019-06-01 14:35:56'),
(56, 73, 'JSC', 'science', 706881, 8663349, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:56', '2019-06-01 14:35:56'),
(57, 171, 'O Level', 'commerce', 3778034, 3130552, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:56', '2019-06-01 14:35:56'),
(58, 253, 'SSC', 'commerce', 1599053, 5074931, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:56', '2019-06-01 14:35:56'),
(59, 104, 'JSC', 'commerce', 2428082, 3538527, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:56', '2019-06-01 14:35:56'),
(60, 225, 'O Level', 'commerce', 8601720, 8496748, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:56', '2019-06-01 14:35:56'),
(61, 84, 'SSC', 'commerce', 7426838, 8384163, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:56', '2019-06-01 14:35:56'),
(62, 139, 'A Level', 'arts', 5164102, 9442488, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:57', '2019-06-01 14:35:57'),
(63, 112, 'SSC', 'commerce', 8251770, 2687158, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:57', '2019-06-01 14:35:57'),
(64, 243, 'O Level', 'arts', 3222390, 5158348, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:57', '2019-06-01 14:35:57'),
(65, 168, 'SSC', 'science', 5558743, 3346757, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:57', '2019-06-01 14:35:57'),
(66, 244, 'JSC', 'commerce', 4173577, 1802526, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:57', '2019-06-01 14:35:57'),
(67, 102, 'O Level', 'commerce', 2001130, 5264157, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:57', '2019-06-01 14:35:57'),
(68, 143, 'A Level', 'science', 2443067, 5287297, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:57', '2019-06-01 14:35:57'),
(69, 106, 'O Level', 'arts', 2682306, 4036823, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:57', '2019-06-01 14:35:57'),
(70, 163, 'JSC', 'arts', 1915743, 4278763, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:57', '2019-06-01 14:35:57'),
(71, 247, 'JSC', 'science', 3195866, 3016660, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:57', '2019-06-01 14:35:57'),
(72, 76, 'SSC', 'commerce', 6515584, 4389218, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:57', '2019-06-01 14:35:57'),
(73, 128, 'A Level', 'commerce', 3309666, 2581427, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:57', '2019-06-01 14:35:57'),
(74, 118, 'SSC', 'science', 8791854, 7633572, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:57', '2019-06-01 14:35:57'),
(75, 216, 'O Level', 'science', 8104605, 9255133, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:58', '2019-06-01 14:35:58'),
(76, 235, 'JSC', 'commerce', 3090738, 2208760, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:58', '2019-06-01 14:35:58'),
(77, 211, 'JSC', 'commerce', 618473, 2286625, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:58', '2019-06-01 14:35:58'),
(78, 112, 'O Level', 'arts', 4667558, 5074995, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:58', '2019-06-01 14:35:58'),
(79, 110, 'JSC', 'science', 7096942, 5293535, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:58', '2019-06-01 14:35:58'),
(80, 211, 'SSC', 'arts', 9865104, 1085655, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:58', '2019-06-01 14:35:58'),
(81, 110, 'O Level', 'arts', 4227866, 3838291, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:58', '2019-06-01 14:35:58'),
(82, 207, 'SSC', 'commerce', 2488937, 2903550, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:58', '2019-06-01 14:35:58'),
(83, 254, 'A Level', 'commerce', 2880193, 2175642, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:58', '2019-06-01 14:35:58'),
(84, 229, 'SSC', 'arts', 4927886, 8183437, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:58', '2019-06-01 14:35:58'),
(85, 163, 'SSC', 'science', 461387, 4735129, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:58', '2019-06-01 14:35:58'),
(86, 100, 'A Level', 'science', 221424, 1467286, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:58', '2019-06-01 14:35:58'),
(87, 232, 'O Level', 'science', 6957007, 9677749, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:59', '2019-06-01 14:35:59'),
(88, 241, 'O Level', 'arts', 7111888, 5555105, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:59', '2019-06-01 14:35:59'),
(89, 164, 'JSC', 'science', 3644461, 3862842, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:59', '2019-06-01 14:35:59'),
(90, 110, 'SSC', 'science', 6498144, 251364, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:59', '2019-06-01 14:35:59'),
(91, 261, 'JSC', 'arts', 5900356, 232908, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:59', '2019-06-01 14:35:59'),
(92, 90, 'JSC', 'science', 365323, 3649088, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:59', '2019-06-01 14:35:59'),
(93, 126, 'O Level', 'commerce', 7174736, 7650436, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:59', '2019-06-01 14:35:59'),
(94, 193, 'JSC', 'arts', 5228737, 7612534, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:59', '2019-06-01 14:35:59'),
(95, 257, 'O Level', 'arts', 2664247, 1760340, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:59', '2019-06-01 14:35:59'),
(96, 236, 'JSC', 'science', 4726259, 8902904, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:59', '2019-06-01 14:35:59'),
(97, 161, 'O Level', 'science', 1857569, 6416131, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:59', '2019-06-01 14:35:59'),
(98, 115, 'O Level', 'science', 6327055, 4666307, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:35:59', '2019-06-01 14:35:59'),
(99, 237, 'JSC', 'arts', 7648021, 2303112, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:00', '2019-06-01 14:36:00'),
(100, 101, 'JSC', 'arts', 4403269, 6767700, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:00', '2019-06-01 14:36:00'),
(101, 200, 'O Level', 'arts', 6171890, 236411, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:00', '2019-06-01 14:36:00'),
(102, 111, 'O Level', 'science', 9569538, 7355432, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:00', '2019-06-01 14:36:00'),
(103, 224, 'JSC', 'commerce', 7130533, 2062803, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:00', '2019-06-01 14:36:00'),
(104, 210, 'O Level', 'science', 904127, 1028476, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:00', '2019-06-01 14:36:00'),
(105, 185, 'A Level', 'science', 2971146, 80304, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:00', '2019-06-01 14:36:00'),
(106, 130, 'O Level', 'commerce', 2459330, 9082205, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:00', '2019-06-01 14:36:00'),
(107, 131, 'SSC', 'arts', 8767164, 9086013, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:00', '2019-06-01 14:36:00'),
(108, 163, 'O Level', 'science', 1858024, 4723814, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:00', '2019-06-01 14:36:00'),
(109, 136, 'O Level', 'arts', 2820553, 2151809, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:00', '2019-06-01 14:36:00'),
(110, 78, 'O Level', 'arts', 6736067, 7720241, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:00', '2019-06-01 14:36:00'),
(111, 233, 'O Level', 'arts', 1972063, 3583976, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:00', '2019-06-01 14:36:00'),
(112, 140, 'SSC', 'commerce', 3087063, 1887071, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:01', '2019-06-01 14:36:01'),
(113, 100, 'O Level', 'arts', 8271302, 344784, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:01', '2019-06-01 14:36:01'),
(114, 84, 'SSC', 'science', 9910978, 666748, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:01', '2019-06-01 14:36:01'),
(115, 183, 'JSC', 'commerce', 3835522, 7113272, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:01', '2019-06-01 14:36:01'),
(116, 136, 'JSC', 'arts', 4691163, 3455328, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:01', '2019-06-01 14:36:01'),
(117, 111, 'SSC', 'commerce', 9686149, 9401790, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:01', '2019-06-01 14:36:01'),
(118, 116, 'SSC', 'arts', 9901021, 6593990, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:01', '2019-06-01 14:36:01'),
(119, 92, 'SSC', 'arts', 2598874, 4679105, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:01', '2019-06-01 14:36:01'),
(120, 110, 'O Level', 'commerce', 6731669, 9095050, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:02', '2019-06-01 14:36:02'),
(121, 229, 'O Level', 'commerce', 3607286, 9235929, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:02', '2019-06-01 14:36:02'),
(122, 147, 'O Level', 'arts', 7920761, 669557, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:02', '2019-06-01 14:36:02'),
(123, 95, 'SSC', 'arts', 3894439, 8139361, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:02', '2019-06-01 14:36:02'),
(124, 261, 'O Level', 'science', 2703709, 4887604, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:02', '2019-06-01 14:36:02'),
(125, 226, 'JSC', 'commerce', 3906719, 4701871, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:02', '2019-06-01 14:36:02'),
(126, 174, 'O Level', 'commerce', 9678882, 9811279, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:02', '2019-06-01 14:36:02'),
(127, 140, 'JSC', 'commerce', 4997476, 678301, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:02', '2019-06-01 14:36:02'),
(128, 228, 'SSC', 'arts', 5463404, 3734313, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:02', '2019-06-01 14:36:02'),
(129, 109, 'JSC', 'commerce', 9227552, 8909313, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:02', '2019-06-01 14:36:02'),
(130, 167, 'JSC', 'arts', 68648, 2572929, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:02', '2019-06-01 14:36:02'),
(131, 218, 'JSC', 'science', 206077, 3145551, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:02', '2019-06-01 14:36:02'),
(132, 195, 'SSC', 'commerce', 4967463, 2200909, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:03', '2019-06-01 14:36:03'),
(133, 167, 'SSC', 'arts', 8550619, 2651908, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:03', '2019-06-01 14:36:03'),
(134, 122, 'JSC', 'science', 5065512, 4527502, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:03', '2019-06-01 14:36:03'),
(135, 112, 'A Level', 'commerce', 5944661, 7593454, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:03', '2019-06-01 14:36:03'),
(136, 162, 'SSC', 'science', 3584241, 542953, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:03', '2019-06-01 14:36:03'),
(137, 108, 'A Level', 'commerce', 2221398, 227121, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:03', '2019-06-01 14:36:03'),
(138, 136, 'O Level', 'commerce', 1930396, 6661348, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:03', '2019-06-01 14:36:03'),
(139, 118, 'SSC', 'arts', 14738, 7680559, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:03', '2019-06-01 14:36:03'),
(140, 137, 'JSC', 'arts', 2190177, 6824219, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:03', '2019-06-01 14:36:03'),
(141, 179, 'O Level', 'commerce', 2436619, 9515009, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:03', '2019-06-01 14:36:03'),
(142, 243, 'JSC', 'science', 1630222, 6281191, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:03', '2019-06-01 14:36:03'),
(143, 240, 'JSC', 'arts', 1682180, 9286173, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:03', '2019-06-01 14:36:03'),
(144, 175, 'O Level', 'arts', 2128783, 1581165, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:03', '2019-06-01 14:36:03'),
(145, 181, 'SSC', 'arts', 9367242, 8288191, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:03', '2019-06-01 14:36:03'),
(146, 232, 'JSC', 'commerce', 6388106, 6935950, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:03', '2019-06-01 14:36:03'),
(147, 94, 'O Level', 'science', 7352447, 2698348, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:03', '2019-06-01 14:36:03'),
(148, 79, 'JSC', 'commerce', 275837, 9635446, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:03', '2019-06-01 14:36:03'),
(149, 111, 'JSC', 'arts', 8900513, 709907, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:04', '2019-06-01 14:36:04'),
(150, 230, 'O Level', 'arts', 8023187, 8210021, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:04', '2019-06-01 14:36:04'),
(151, 169, 'JSC', 'arts', 93449, 6862425, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:04', '2019-06-01 14:36:04'),
(152, 105, 'JSC', 'commerce', 7079800, 4287160, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:04', '2019-06-01 14:36:04'),
(153, 187, 'SSC', 'commerce', 5991093, 1084601, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:04', '2019-06-01 14:36:04'),
(154, 180, 'SSC', 'arts', 4120012, 6951368, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:04', '2019-06-01 14:36:04'),
(155, 158, 'A Level', 'commerce', 3004804, 5970706, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:04', '2019-06-01 14:36:04'),
(156, 74, 'O Level', 'commerce', 3775083, 9687392, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:04', '2019-06-01 14:36:04'),
(157, 143, 'O Level', 'commerce', 7225344, 9592106, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:04', '2019-06-01 14:36:04'),
(158, 119, 'JSC', 'arts', 5628968, 259620, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:04', '2019-06-01 14:36:04'),
(159, 71, 'SSC', 'arts', 7649398, 7609575, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:05', '2019-06-01 14:36:05'),
(160, 238, 'JSC', 'commerce', 9434083, 6764702, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:06', '2019-06-01 14:36:06'),
(161, 158, 'O Level', 'commerce', 9886987, 226248, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:06', '2019-06-01 14:36:06'),
(162, 128, 'SSC', 'science', 4386414, 6214777, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:06', '2019-06-01 14:36:06'),
(163, 73, 'SSC', 'commerce', 3430968, 7534463, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:06', '2019-06-01 14:36:06'),
(164, 236, 'SSC', 'arts', 9027789, 1630792, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:06', '2019-06-01 14:36:06'),
(165, 150, 'A Level', 'arts', 9202316, 3338686, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:06', '2019-06-01 14:36:06'),
(166, 212, 'O Level', 'arts', 1596403, 9747976, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:07', '2019-06-01 14:36:07'),
(167, 242, 'O Level', 'science', 8169759, 882506, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:07', '2019-06-01 14:36:07'),
(168, 178, 'A Level', 'science', 7529158, 6809784, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:07', '2019-06-01 14:36:07'),
(169, 109, 'JSC', 'science', 3976507, 2814350, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:07', '2019-06-01 14:36:07'),
(170, 63, 'SSC', 'science', 4398456, 3268777, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:07', '2019-06-01 14:36:07'),
(171, 260, 'A Level', 'commerce', 7637813, 2270712, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:07', '2019-06-01 14:36:07'),
(172, 249, 'SSC', 'arts', 3760447, 4425489, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:07', '2019-06-01 14:36:07'),
(173, 256, 'O Level', 'science', 1826821, 2215376, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:07', '2019-06-01 14:36:07'),
(174, 213, 'SSC', 'arts', 3383472, 5152351, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:07', '2019-06-01 14:36:07'),
(175, 187, 'JSC', 'science', 7312669, 966085, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:07', '2019-06-01 14:36:07'),
(176, 248, 'O Level', 'science', 4830145, 5061582, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:08', '2019-06-01 14:36:08'),
(177, 89, 'A Level', 'arts', 5687324, 8143761, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:08', '2019-06-01 14:36:08'),
(178, 143, 'O Level', 'science', 9173329, 8224460, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:08', '2019-06-01 14:36:08'),
(179, 237, 'A Level', 'science', 4721997, 8801982, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:08', '2019-06-01 14:36:08'),
(180, 135, 'JSC', 'arts', 9207529, 8803167, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:08', '2019-06-01 14:36:08'),
(181, 191, 'JSC', 'arts', 2222051, 7987930, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:08', '2019-06-01 14:36:08'),
(182, 105, 'SSC', 'commerce', 7768403, 1207021, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:08', '2019-06-01 14:36:08'),
(183, 201, 'JSC', 'science', 9608715, 9310469, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:08', '2019-06-01 14:36:08'),
(184, 227, 'A Level', 'science', 9352688, 918168, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:09', '2019-06-01 14:36:09'),
(185, 75, 'A Level', 'science', 9635586, 8505650, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:09', '2019-06-01 14:36:09'),
(186, 165, 'O Level', 'commerce', 7557776, 7459170, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:09', '2019-06-01 14:36:09'),
(187, 239, 'A Level', 'arts', 21585, 509419, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:09', '2019-06-01 14:36:09'),
(188, 138, 'JSC', 'commerce', 288992, 5003293, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:09', '2019-06-01 14:36:09'),
(189, 178, 'O Level', 'commerce', 5680275, 5763636, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:09', '2019-06-01 14:36:09'),
(190, 116, 'JSC', 'science', 255097, 6878137, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:09', '2019-06-01 14:36:09'),
(191, 100, 'SSC', 'science', 9606531, 4516394, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:09', '2019-06-01 14:36:09'),
(192, 62, 'O Level', 'commerce', 6905716, 5978159, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:09', '2019-06-01 14:36:09'),
(193, 73, 'JSC', 'science', 8237457, 7082175, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:09', '2019-06-01 14:36:09'),
(194, 238, 'SSC', 'commerce', 8944762, 847950, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:09', '2019-06-01 14:36:09'),
(195, 131, 'SSC', 'science', 6523142, 7610737, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:09', '2019-06-01 14:36:09'),
(196, 229, 'SSC', 'arts', 4683074, 1596808, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:09', '2019-06-01 14:36:09'),
(197, 122, 'A Level', 'arts', 4653966, 905877, '2018-19', 'rajsahi', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:10', '2019-06-01 14:36:10'),
(198, 99, 'A Level', 'science', 5584472, 8326878, '2018-19', 'dhaka', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:10', '2019-06-01 14:36:10'),
(199, 195, 'A Level', 'arts', 497391, 1100531, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:10', '2019-06-01 14:36:10'),
(200, 239, 'A Level', 'commerce', 7127865, 4386063, '2018-19', 'sylhet', 2011, 'efnj school', 5.00, 0, '2019-06-01 14:36:10', '2019-06-01 14:36:10');

-- --------------------------------------------------------

--
-- Structure de la table `school_student_infos`
--

DROP TABLE IF EXISTS `school_student_infos`;
CREATE TABLE IF NOT EXISTS `school_student_infos` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` int(10) UNSIGNED NOT NULL,
  `session` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `version` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` datetime NOT NULL,
  `religion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_national_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_occupation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_annual_income` int(11) NOT NULL,
  `mother_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_national_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_occupation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_annual_income` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `school_student_infos`
--

INSERT INTO `school_student_infos` (`id`, `student_id`, `session`, `version`, `group`, `birthday`, `religion`, `father_name`, `father_phone_number`, `father_national_id`, `father_occupation`, `father_designation`, `father_annual_income`, `mother_name`, `mother_phone_number`, `mother_national_id`, `mother_occupation`, `mother_designation`, `mother_annual_income`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 92, '2019', 'english', '', '1993-02-22 00:00:00', 'hinduism', 'Brigitte Emard', '6577204', 'SA0218IBYZVZJSEC8536V4XC', 'Forest Fire Fighting Supervisor', 'City Planning Aide', 700000, 'Harold Hansen', '6939384', 'SA0218IBYZVZJSEC8536V4XC', 'Computer Programmer', 'Bill and Account Collector', 700000, 0, '2019-06-01 14:35:44', '2019-06-01 14:35:44'),
(2, 207, '2019', 'english', '', '2007-11-09 00:00:00', 'islam', 'Mrs. Carlie Ryan II', '3281945', 'SA0218IBYZVZJSEC8536V4XC', 'Government Service Executive', 'Radio Operator', 500000, 'Miss Maia Kunze IV', '8007857', 'SA0218IBYZVZJSEC8536V4XC', 'Sawing Machine Setter', 'English Language Teacher', 300000, 0, '2019-06-01 14:35:44', '2019-06-01 14:35:44'),
(3, 184, '2019', 'bangla', '', '1957-06-01 00:00:00', 'buddhism', 'Alejandrin Deckow', '3360719', 'SA0218IBYZVZJSEC8536V4XC', 'Stock Broker', 'Diamond Worker', 500000, 'Christina Rice', '3459818', 'SA0218IBYZVZJSEC8536V4XC', 'Shoe and Leather Repairer', 'Archivist', 1000000, 0, '2019-06-01 14:35:44', '2019-06-01 14:35:44'),
(4, 170, '2019', 'english', '', '1925-01-22 00:00:00', 'other', 'Prof. Darren Balistreri III', '511603', 'SA0218IBYZVZJSEC8536V4XC', 'Air Crew Member', 'Technical Specialist', 1000000, 'Evert Will', '2966090', 'SA0218IBYZVZJSEC8536V4XC', 'Aircraft Body Repairer', 'Logging Worker', 700000, 0, '2019-06-01 14:35:44', '2019-06-01 14:35:44'),
(5, 260, '2019', 'bangla', '', '1920-06-12 00:00:00', 'islam', 'Prof. Andres Treutel', '5592730', 'SA0218IBYZVZJSEC8536V4XC', 'Slot Key Person', 'Crossing Guard', 300000, 'Renee Dach', '4743512', 'SA0218IBYZVZJSEC8536V4XC', 'Loading Machine Operator', 'Occupational Therapist Aide', 700000, 0, '2019-06-01 14:35:44', '2019-06-01 14:35:44'),
(6, 156, '2019', 'bangla', '', '1956-04-23 00:00:00', 'buddhism', 'Onie Simonis', '5979488', 'SA0218IBYZVZJSEC8536V4XC', 'Database Administrator', 'Gas Appliance Repairer', 500000, 'Prof. Zion Rogahn', '1311913', 'SA0218IBYZVZJSEC8536V4XC', 'CTO', 'Public Health Social Worker', 300000, 0, '2019-06-01 14:35:44', '2019-06-01 14:35:44'),
(7, 127, '2019', 'bangla', '', '1946-04-13 00:00:00', 'hinduism', 'Bonita Ledner', '9713650', 'SA0218IBYZVZJSEC8536V4XC', 'Bellhop', 'Instrument Sales Representative', 700000, 'Maverick Runte', '6807686', 'SA0218IBYZVZJSEC8536V4XC', 'Material Movers', 'Warehouse', 1000000, 0, '2019-06-01 14:35:44', '2019-06-01 14:35:44'),
(8, 211, '2019', 'bangla', '', '1949-09-07 00:00:00', 'islam', 'Brown Douglas Jr.', '1895135', 'SA0218IBYZVZJSEC8536V4XC', 'Financial Manager', 'Counsil', 1000000, 'Kristina Welch', '433897', 'SA0218IBYZVZJSEC8536V4XC', 'Engraver', 'Librarian', 500000, 0, '2019-06-01 14:35:44', '2019-06-01 14:35:44'),
(9, 133, '2019', 'english', '', '1970-03-15 00:00:00', 'christianism', 'Felicita Bauch', '1767703', 'SA0218IBYZVZJSEC8536V4XC', 'Infantry Officer', 'Keyboard Instrument Repairer and Tuner', 500000, 'Mina Pacocha', '2726732', 'SA0218IBYZVZJSEC8536V4XC', 'Laundry OR Dry-Cleaning Worker', 'Bench Jeweler', 300000, 0, '2019-06-01 14:35:44', '2019-06-01 14:35:44'),
(10, 130, '2019', 'english', '', '1998-07-11 00:00:00', 'islam', 'Pink Zulauf', '2856189', 'SA0218IBYZVZJSEC8536V4XC', 'Plating Operator', 'Air Crew Officer', 300000, 'Andre Purdy', '2152932', 'SA0218IBYZVZJSEC8536V4XC', 'Textile Knitting Machine Operator', 'Preschool Education Administrators', 300000, 0, '2019-06-01 14:35:44', '2019-06-01 14:35:44'),
(11, 226, '2019', 'english', '', '1991-01-05 00:00:00', 'buddhism', 'Sincere Bogisich IV', '4374357', 'SA0218IBYZVZJSEC8536V4XC', 'Rigger', 'Curator', 1000000, 'Prof. Zachariah Bayer', '6402087', 'SA0218IBYZVZJSEC8536V4XC', 'Singer', 'Child Care Worker', 1000000, 0, '2019-06-01 14:35:44', '2019-06-01 14:35:44'),
(12, 195, '2019', 'bangla', '', '1950-02-06 00:00:00', 'hinduism', 'Raoul Kub', '8530331', 'SA0218IBYZVZJSEC8536V4XC', 'Geoscientists', 'Electrical Drafter', 500000, 'Norris Schinner Jr.', '1444081', 'SA0218IBYZVZJSEC8536V4XC', 'Recreational Therapist', 'Driver-Sales Worker', 500000, 0, '2019-06-01 14:35:44', '2019-06-01 14:35:44'),
(13, 145, '2019', 'english', '', '1934-05-19 00:00:00', 'islam', 'Willa Grimes DVM', '1176744', 'SA0218IBYZVZJSEC8536V4XC', 'Boat Builder and Shipwright', 'Executive Secretary', 1000000, 'Linnea Luettgen', '3108404', 'SA0218IBYZVZJSEC8536V4XC', 'Patrol Officer', 'Special Forces Officer', 500000, 0, '2019-06-01 14:35:44', '2019-06-01 14:35:44'),
(14, 123, '2019', 'bangla', '', '1978-08-15 00:00:00', 'christianism', 'Mr. Selmer Auer I', '1884964', 'SA0218IBYZVZJSEC8536V4XC', 'Inspector', 'Marine Architect', 1000000, 'Prof. Eileen Towne PhD', '4897982', 'SA0218IBYZVZJSEC8536V4XC', 'Biological Technician', 'Dietetic Technician', 500000, 0, '2019-06-01 14:35:44', '2019-06-01 14:35:44'),
(15, 64, '2019', 'bangla', '', '1968-06-25 00:00:00', 'other', 'Cheyenne Hermann', '5215446', 'SA0218IBYZVZJSEC8536V4XC', 'Furniture Finisher', 'Telecommunications Facility Examiner', 300000, 'Rey Leffler', '1112272', 'SA0218IBYZVZJSEC8536V4XC', 'Numerical Control Machine Tool Operator', 'Woodworker', 1000000, 0, '2019-06-01 14:35:44', '2019-06-01 14:35:44'),
(16, 251, '2019', 'english', '', '1920-05-02 00:00:00', 'hinduism', 'Prof. Ashlee Johnston', '9952605', 'SA0218IBYZVZJSEC8536V4XC', 'Tree Trimmer', 'Physical Therapist', 700000, 'Mr. Alvis Gleichner', '5859221', 'SA0218IBYZVZJSEC8536V4XC', 'Personal Trainer', 'Aviation Inspector', 700000, 0, '2019-06-01 14:35:45', '2019-06-01 14:35:45'),
(17, 122, '2019', 'bangla', '', '1929-02-27 00:00:00', 'islam', 'Althea Lynch', '8450349', 'SA0218IBYZVZJSEC8536V4XC', 'Caption Writer', 'Paste-Up Worker', 500000, 'Prof. Elmo Wilderman', '2718484', 'SA0218IBYZVZJSEC8536V4XC', 'Cutting Machine Operator', 'Mixing and Blending Machine Operator', 1000000, 0, '2019-06-01 14:35:45', '2019-06-01 14:35:45'),
(18, 81, '2019', 'bangla', '', '2004-02-22 00:00:00', 'buddhism', 'Granville Aufderhar', '4110600', 'SA0218IBYZVZJSEC8536V4XC', 'Air Traffic Controller', 'Calibration Technician OR Instrumentation Technician', 1000000, 'Agustin Lindgren', '7889082', 'SA0218IBYZVZJSEC8536V4XC', 'Food Preparation', 'Biophysicist', 700000, 0, '2019-06-01 14:35:45', '2019-06-01 14:35:45'),
(19, 86, '2019', 'english', '', '2013-05-07 00:00:00', 'hinduism', 'Mr. Murphy Toy II', '9128554', 'SA0218IBYZVZJSEC8536V4XC', 'Forensic Investigator', 'Insurance Underwriter', 700000, 'Geo Beier', '5389732', 'SA0218IBYZVZJSEC8536V4XC', 'Heat Treating Equipment Operator', 'Command Control Center Specialist', 300000, 0, '2019-06-01 14:35:45', '2019-06-01 14:35:45'),
(20, 249, '2019', 'bangla', '', '2004-05-20 00:00:00', 'christianism', 'Arvel Stroman', '9365431', 'SA0218IBYZVZJSEC8536V4XC', 'Dentist', 'Actuary', 700000, 'Dr. Effie Feest Sr.', '9204214', 'SA0218IBYZVZJSEC8536V4XC', 'Instrument Sales Representative', 'Business Development Manager', 1000000, 0, '2019-06-01 14:35:45', '2019-06-01 14:35:45'),
(21, 105, '2019', 'bangla', '', '1964-11-26 00:00:00', 'islam', 'Hannah Wolf', '4178322', 'SA0218IBYZVZJSEC8536V4XC', 'Electric Meter Installer', 'Restaurant Cook', 500000, 'Malinda Jenkins', '4229006', 'SA0218IBYZVZJSEC8536V4XC', 'Materials Engineer', 'Arbitrator', 1000000, 0, '2019-06-01 14:35:45', '2019-06-01 14:35:45'),
(22, 66, '2019', 'bangla', '', '1966-10-28 00:00:00', 'other', 'Vincent Schamberger Jr.', '3453997', 'SA0218IBYZVZJSEC8536V4XC', 'Video Editor', 'Producers and Director', 500000, 'Ronny Cormier', '6140555', 'SA0218IBYZVZJSEC8536V4XC', 'Drycleaning Machine Operator', 'Drycleaning Machine Operator', 700000, 0, '2019-06-01 14:35:45', '2019-06-01 14:35:45'),
(23, 155, '2019', 'bangla', '', '2006-05-29 00:00:00', 'hinduism', 'Korbin O\'Reilly V', '7932073', 'SA0218IBYZVZJSEC8536V4XC', 'Residential Advisor', 'Dietetic Technician', 300000, 'Reagan Dickinson', '1251879', 'SA0218IBYZVZJSEC8536V4XC', 'Multiple Machine Tool Setter', 'Sketch Artist', 500000, 0, '2019-06-01 14:35:45', '2019-06-01 14:35:45'),
(24, 258, '2019', 'bangla', '', '1934-06-19 00:00:00', 'christianism', 'Jacky Mosciski', '2361081', 'SA0218IBYZVZJSEC8536V4XC', 'Database Manager', 'Fiber Product Cutting Machine Operator', 300000, 'Dayana Lemke', '6302678', 'SA0218IBYZVZJSEC8536V4XC', 'Precision Lens Grinders and Polisher', 'Laundry OR Dry-Cleaning Worker', 500000, 0, '2019-06-01 14:35:45', '2019-06-01 14:35:45'),
(25, 185, '2019', 'english', '', '1997-10-25 00:00:00', 'buddhism', 'Hailee Ruecker', '2867614', 'SA0218IBYZVZJSEC8536V4XC', 'Nuclear Engineer', 'Mail Machine Operator', 1000000, 'Mrs. Barbara Ward', '4983710', 'SA0218IBYZVZJSEC8536V4XC', 'Maid', 'Carpenter', 1000000, 0, '2019-06-01 14:35:45', '2019-06-01 14:35:45'),
(26, 253, '2019', 'english', '', '1948-02-11 00:00:00', 'buddhism', 'Emilio Huels DVM', '9140723', 'SA0218IBYZVZJSEC8536V4XC', 'ccc', 'Social Scientists', 300000, 'Reina Collier', '4602968', 'SA0218IBYZVZJSEC8536V4XC', 'Professional Photographer', 'Maintenance and Repair Worker', 1000000, 0, '2019-06-01 14:35:45', '2019-06-01 14:35:45'),
(27, 135, '2019', 'english', '', '1930-07-31 00:00:00', 'islam', 'Russ Gutkowski I', '7836808', 'SA0218IBYZVZJSEC8536V4XC', 'Refinery Operator', 'Sales and Related Workers', 1000000, 'Zena Fritsch', '2936027', 'SA0218IBYZVZJSEC8536V4XC', 'Economics Teacher', 'Film Laboratory Technician', 700000, 0, '2019-06-01 14:35:45', '2019-06-01 14:35:45'),
(28, 113, '2019', 'bangla', '', '1922-05-15 00:00:00', 'christianism', 'Jacynthe Beatty', '1051815', 'SA0218IBYZVZJSEC8536V4XC', 'Massage Therapist', 'Surveying and Mapping Technician', 500000, 'Charlene Schultz', '6280820', 'SA0218IBYZVZJSEC8536V4XC', 'Prepress Technician', 'Diesel Engine Specialist', 500000, 0, '2019-06-01 14:35:45', '2019-06-01 14:35:45'),
(29, 81, '2019', 'bangla', '', '2006-02-05 00:00:00', 'buddhism', 'Dr. Tina Jaskolski', '1246370', 'SA0218IBYZVZJSEC8536V4XC', 'Precious Stone Worker', 'Press Machine Setter, Operator', 700000, 'Lonzo Armstrong', '2839634', 'SA0218IBYZVZJSEC8536V4XC', 'Fence Erector', 'Automatic Teller Machine Servicer', 500000, 0, '2019-06-01 14:35:45', '2019-06-01 14:35:45'),
(30, 196, '2019', 'bangla', '', '2004-08-12 00:00:00', 'hinduism', 'Marquise Hermiston Sr.', '5153275', 'SA0218IBYZVZJSEC8536V4XC', 'Precision Devices Inspector', 'Ship Engineer', 700000, 'Roy Collier', '8910804', 'SA0218IBYZVZJSEC8536V4XC', 'Agricultural Equipment Operator', 'Medical Appliance Technician', 300000, 0, '2019-06-01 14:35:45', '2019-06-01 14:35:45'),
(31, 251, '2019', 'bangla', '', '2010-12-12 00:00:00', 'islam', 'Arjun Wisozk', '7537805', 'SA0218IBYZVZJSEC8536V4XC', 'Correctional Officer', 'Automotive Technician', 300000, 'Vada Bahringer', '1600947', 'SA0218IBYZVZJSEC8536V4XC', 'Trainer', 'Environmental Engineering Technician', 500000, 0, '2019-06-01 14:35:45', '2019-06-01 14:35:45'),
(32, 155, '2019', 'english', '', '1964-07-04 00:00:00', 'islam', 'Miss Jacynthe Batz', '2825272', 'SA0218IBYZVZJSEC8536V4XC', 'Transportation Attendant', 'Radio Operator', 300000, 'Julius Metz', '2899797', 'SA0218IBYZVZJSEC8536V4XC', 'Health Practitioner', 'Platemaker', 1000000, 0, '2019-06-01 14:35:45', '2019-06-01 14:35:45'),
(33, 107, '2019', 'english', '', '1951-03-01 00:00:00', 'buddhism', 'Prof. Wilhelmine Gorczany DDS', '9550819', 'SA0218IBYZVZJSEC8536V4XC', 'Claims Examiner', 'Flight Attendant', 700000, 'Hyman Bailey', '2439325', 'SA0218IBYZVZJSEC8536V4XC', 'General Manager', 'Bookkeeper', 700000, 0, '2019-06-01 14:35:46', '2019-06-01 14:35:46'),
(34, 140, '2019', 'english', '', '1933-07-26 00:00:00', 'hinduism', 'Luna Cartwright', '1707208', 'SA0218IBYZVZJSEC8536V4XC', 'Musical Instrument Tuner', 'Fish Hatchery Manager', 1000000, 'Rosalia Tromp', '5049836', 'SA0218IBYZVZJSEC8536V4XC', 'Telecommunications Line Installer', 'Graduate Teaching Assistant', 700000, 0, '2019-06-01 14:35:46', '2019-06-01 14:35:46'),
(35, 161, '2019', 'bangla', '', '2003-09-09 00:00:00', 'buddhism', 'Patrick Hills MD', '2400760', 'SA0218IBYZVZJSEC8536V4XC', 'Woodworking Machine Setter', 'Radiation Therapist', 300000, 'Kenny Toy', '6848647', 'SA0218IBYZVZJSEC8536V4XC', 'Engineering Teacher', 'Electrical Engineering Technician', 300000, 0, '2019-06-01 14:35:46', '2019-06-01 14:35:46'),
(36, 155, '2019', 'bangla', '', '1937-08-12 00:00:00', 'hinduism', 'Sydnie Weber V', '8062301', 'SA0218IBYZVZJSEC8536V4XC', 'Spraying Machine Operator', 'Financial Examiner', 1000000, 'Kurt Runolfsson DVM', '3718556', 'SA0218IBYZVZJSEC8536V4XC', 'Boat Builder and Shipwright', 'Central Office and PBX Installers', 1000000, 0, '2019-06-01 14:35:46', '2019-06-01 14:35:46'),
(37, 199, '2019', 'bangla', '', '2007-09-14 00:00:00', 'hinduism', 'Prof. Oswaldo Emard', '3846170', 'SA0218IBYZVZJSEC8536V4XC', 'Job Printer', 'Industrial Engineer', 700000, 'Prince Ernser', '9636640', 'SA0218IBYZVZJSEC8536V4XC', 'Cashier', 'Auditor', 1000000, 0, '2019-06-01 14:35:46', '2019-06-01 14:35:46'),
(38, 201, '2019', 'bangla', '', '1990-08-27 00:00:00', 'buddhism', 'Lavern Beer', '4508090', 'SA0218IBYZVZJSEC8536V4XC', 'Nuclear Engineer', 'Clergy', 1000000, 'Jameson Boehm V', '7570497', 'SA0218IBYZVZJSEC8536V4XC', 'Molding Machine Operator', 'Human Resources Specialist', 500000, 0, '2019-06-01 14:35:46', '2019-06-01 14:35:46'),
(39, 160, '2019', 'english', '', '1949-06-22 00:00:00', 'islam', 'Ms. Mariah Schoen I', '6160336', 'SA0218IBYZVZJSEC8536V4XC', 'Structural Metal Fabricator', 'Photoengraving Machine Operator', 700000, 'Mariano Stanton', '8607059', 'SA0218IBYZVZJSEC8536V4XC', 'Precision Aircraft Systems Assemblers', 'Tire Builder', 500000, 0, '2019-06-01 14:35:46', '2019-06-01 14:35:46'),
(40, 187, '2019', 'bangla', '', '1944-01-30 00:00:00', 'buddhism', 'Ms. Earnestine Raynor', '6837032', 'SA0218IBYZVZJSEC8536V4XC', 'Head Nurse', 'Earth Driller', 1000000, 'Danielle Kub', '4841423', 'SA0218IBYZVZJSEC8536V4XC', 'Geological Data Technician', 'Director Of Marketing', 300000, 0, '2019-06-01 14:35:46', '2019-06-01 14:35:46'),
(41, 213, '2019', 'bangla', '', '1965-05-13 00:00:00', 'christianism', 'Napoleon Barrows', '4122410', 'SA0218IBYZVZJSEC8536V4XC', 'Costume Attendant', 'Paste-Up Worker', 300000, 'Cortez Gusikowski', '5075527', 'SA0218IBYZVZJSEC8536V4XC', 'Janitor', 'Steel Worker', 1000000, 0, '2019-06-01 14:35:46', '2019-06-01 14:35:46'),
(42, 113, '2019', 'bangla', '', '1982-07-26 00:00:00', 'christianism', 'Michelle Rogahn', '9774756', 'SA0218IBYZVZJSEC8536V4XC', 'Captain', 'Personal Trainer', 500000, 'Onie Hodkiewicz', '7792612', 'SA0218IBYZVZJSEC8536V4XC', 'Gauger', 'Library Worker', 700000, 0, '2019-06-01 14:35:46', '2019-06-01 14:35:46'),
(43, 229, '2019', 'english', '', '1978-05-19 00:00:00', 'islam', 'Sonny Rodriguez', '22707', 'SA0218IBYZVZJSEC8536V4XC', 'Manager of Weapons Specialists', 'Personal Care Worker', 1000000, 'Alec Hickle', '4814896', 'SA0218IBYZVZJSEC8536V4XC', 'Home Appliance Repairer', 'Library Assistant', 300000, 0, '2019-06-01 14:35:46', '2019-06-01 14:35:46'),
(44, 76, '2019', 'english', '', '1992-01-01 00:00:00', 'islam', 'Ms. Petra Jast III', '9249025', 'SA0218IBYZVZJSEC8536V4XC', 'Biomedical Engineer', 'Funeral Director', 1000000, 'Mr. Roger Schiller MD', '4655863', 'SA0218IBYZVZJSEC8536V4XC', 'Commercial and Industrial Designer', 'Night Security Guard', 300000, 0, '2019-06-01 14:35:46', '2019-06-01 14:35:46'),
(45, 190, '2019', 'bangla', '', '1993-07-20 00:00:00', 'islam', 'Otho Becker', '8986617', 'SA0218IBYZVZJSEC8536V4XC', 'Copy Machine Operator', 'Operations Research Analyst', 700000, 'Dr. Tania Johnston DVM', '6662946', 'SA0218IBYZVZJSEC8536V4XC', 'Tree Trimmer', 'Mechanical Drafter', 700000, 0, '2019-06-01 14:35:46', '2019-06-01 14:35:46'),
(46, 257, '2019', 'english', '', '1938-10-17 00:00:00', 'hinduism', 'Jany Schroeder', '4933093', 'SA0218IBYZVZJSEC8536V4XC', 'Maintenance and Repair Worker', 'Healthcare Support Worker', 700000, 'Norene Rosenbaum', '9912537', 'SA0218IBYZVZJSEC8536V4XC', 'Butcher', 'Hoist and Winch Operator', 300000, 0, '2019-06-01 14:35:46', '2019-06-01 14:35:46'),
(47, 85, '2019', 'english', '', '1969-07-29 00:00:00', 'christianism', 'Dr. Kenna Bechtelar', '7636957', 'SA0218IBYZVZJSEC8536V4XC', 'Musical Instrument Tuner', 'Fitness Trainer', 700000, 'Charlene Cronin', '7967459', 'SA0218IBYZVZJSEC8536V4XC', 'Textile Dyeing Machine Operator', 'Automotive Glass Installers', 1000000, 0, '2019-06-01 14:35:46', '2019-06-01 14:35:46'),
(48, 252, '2019', 'bangla', '', '1921-07-23 00:00:00', 'buddhism', 'Miss Ally O\'Connell', '6106322', 'SA0218IBYZVZJSEC8536V4XC', 'Religious Worker', 'Training Manager OR Development Manager', 300000, 'Augustine Nolan', '3240661', 'SA0218IBYZVZJSEC8536V4XC', 'Cutting Machine Operator', 'Nuclear Technician', 700000, 0, '2019-06-01 14:35:46', '2019-06-01 14:35:46'),
(49, 196, '2019', 'bangla', '', '1988-09-26 00:00:00', 'other', 'Chanelle Bahringer', '1960566', 'SA0218IBYZVZJSEC8536V4XC', 'Farmer', 'Bulldozer Operator', 700000, 'Reid Sanford MD', '827158', 'SA0218IBYZVZJSEC8536V4XC', 'Legal Secretary', 'Equal Opportunity Representative', 700000, 0, '2019-06-01 14:35:46', '2019-06-01 14:35:46'),
(50, 225, '2019', 'bangla', '', '1969-05-06 00:00:00', 'islam', 'Katrine Gaylord', '6177644', 'SA0218IBYZVZJSEC8536V4XC', 'Coroner', 'Welder-Fitter', 300000, 'Nora Hauck', '5040186', 'SA0218IBYZVZJSEC8536V4XC', 'Crushing Grinding Machine Operator', 'Industrial Production Manager', 300000, 0, '2019-06-01 14:35:46', '2019-06-01 14:35:46'),
(51, 170, '2019', 'english', 'science', '1971-10-21 00:00:00', 'buddhism', 'Eveline Powlowski', '8960565', 'SA0218IBYZVZJSEC8536V4XC', 'Electrotyper', 'Human Resources Assistant', 1000000, 'Mr. Okey O\'Connell', '8827394', 'SA0218IBYZVZJSEC8536V4XC', 'Pile-Driver Operator', 'Pipelaying Fitter', 1000000, 0, '2019-06-01 14:35:47', '2019-06-01 14:35:47'),
(52, 99, '2019', 'english', 'science', '2002-03-15 00:00:00', 'christianism', 'Dr. Erin Wyman Sr.', '9721907', 'SA0218IBYZVZJSEC8536V4XC', 'Chemist', 'Foreign Language Teacher', 500000, 'Jaylen Littel', '2500372', 'SA0218IBYZVZJSEC8536V4XC', 'Commercial Diver', 'Fire Fighter', 300000, 0, '2019-06-01 14:35:47', '2019-06-01 14:35:47'),
(53, 249, '2019', 'english', 'science', '1956-04-04 00:00:00', 'hinduism', 'Paxton Treutel PhD', '184612', 'SA0218IBYZVZJSEC8536V4XC', 'Curator', 'Boilermaker', 700000, 'Ms. Twila Price PhD', '7229581', 'SA0218IBYZVZJSEC8536V4XC', 'Slot Key Person', 'Millwright', 300000, 0, '2019-06-01 14:35:47', '2019-06-01 14:35:47'),
(54, 85, '2019', 'bangla', 'science', '1995-06-12 00:00:00', 'christianism', 'Chelsie Anderson', '2771958', 'SA0218IBYZVZJSEC8536V4XC', 'Postsecondary Education Administrators', 'Technical Director', 500000, 'Danny Bahringer', '1646417', 'SA0218IBYZVZJSEC8536V4XC', 'Home Entertainment Equipment Installer', 'Textile Machine Operator', 300000, 0, '2019-06-01 14:35:47', '2019-06-01 14:35:47'),
(55, 77, '2019', 'bangla', 'science', '1990-01-21 00:00:00', 'christianism', 'Prof. Darryl Nienow', '3090651', 'SA0218IBYZVZJSEC8536V4XC', 'Product Safety Engineer', 'Artillery Crew Member', 500000, 'Cecilia Abernathy', '3361441', 'SA0218IBYZVZJSEC8536V4XC', 'Funeral Attendant', 'Safety Engineer', 500000, 0, '2019-06-01 14:35:47', '2019-06-01 14:35:47'),
(56, 259, '2019', 'english', 'science', '1955-11-02 00:00:00', 'christianism', 'Prof. Astrid Windler III', '1184396', 'SA0218IBYZVZJSEC8536V4XC', 'Food Tobacco Roasting', 'Human Resources Specialist', 300000, 'Bianka Bergstrom', '3261424', 'SA0218IBYZVZJSEC8536V4XC', 'Emergency Management Specialist', 'Portable Power Tool Repairer', 1000000, 0, '2019-06-01 14:35:47', '2019-06-01 14:35:47'),
(57, 108, '2019', 'bangla', 'science', '1977-10-18 00:00:00', 'islam', 'Tyrese Ankunding III', '2925613', 'SA0218IBYZVZJSEC8536V4XC', 'Receptionist and Information Clerk', 'Pharmacist', 1000000, 'Quinton Bailey Jr.', '956875', 'SA0218IBYZVZJSEC8536V4XC', 'ccc', 'Illustrator', 1000000, 0, '2019-06-01 14:35:47', '2019-06-01 14:35:47'),
(58, 124, '2019', 'english', 'science', '1921-06-14 00:00:00', 'other', 'Bria Wisozk', '8347821', 'SA0218IBYZVZJSEC8536V4XC', 'Forming Machine Operator', 'Administrative Services Manager', 1000000, 'Julianne Doyle', '7304500', 'SA0218IBYZVZJSEC8536V4XC', 'Pastry Chef', 'Private Household Cook', 1000000, 0, '2019-06-01 14:35:47', '2019-06-01 14:35:47'),
(59, 214, '2019', 'english', 'science', '1997-04-26 00:00:00', 'islam', 'Olaf Kassulke III', '3896824', 'SA0218IBYZVZJSEC8536V4XC', 'Janitor', 'Manufacturing Sales Representative', 1000000, 'Molly Hermann', '4104711', 'SA0218IBYZVZJSEC8536V4XC', 'Cutting Machine Operator', 'Watch Repairer', 500000, 0, '2019-06-01 14:35:47', '2019-06-01 14:35:47'),
(60, 170, '2019', 'bangla', 'science', '1959-07-07 00:00:00', 'buddhism', 'Gregg Feest', '3446357', 'SA0218IBYZVZJSEC8536V4XC', 'Sculptor', 'Communications Teacher', 300000, 'Rae Rempel MD', '8950426', 'SA0218IBYZVZJSEC8536V4XC', 'Door To Door Sales', 'Food Tobacco Roasting', 1000000, 0, '2019-06-01 14:35:47', '2019-06-01 14:35:47'),
(61, 91, '2019', 'bangla', 'science', '2016-03-15 00:00:00', 'christianism', 'Mr. Muhammad Dooley V', '481454', 'SA0218IBYZVZJSEC8536V4XC', 'Utility Meter Reader', 'Elementary and Secondary School Administrators', 700000, 'Theodore Abernathy DDS', '42199', 'SA0218IBYZVZJSEC8536V4XC', 'Stationary Engineer', 'Food Preparation', 500000, 0, '2019-06-01 14:35:47', '2019-06-01 14:35:47'),
(62, 102, '2019', 'english', 'science', '1943-11-06 00:00:00', 'islam', 'Lawrence Carter MD', '4127094', 'SA0218IBYZVZJSEC8536V4XC', 'Soldering Machine Setter', 'Actuary', 1000000, 'Michale Gibson', '2959394', 'SA0218IBYZVZJSEC8536V4XC', 'Claims Adjuster', 'Communications Equipment Operator', 500000, 0, '2019-06-01 14:35:47', '2019-06-01 14:35:47'),
(63, 117, '2019', 'bangla', 'science', '2011-01-17 00:00:00', 'other', 'Eldon Zieme', '6724981', 'SA0218IBYZVZJSEC8536V4XC', 'Storage Manager OR Distribution Manager', 'Occupational Therapist Aide', 500000, 'Prof. Rosie Corkery', '30712', 'SA0218IBYZVZJSEC8536V4XC', 'Typesetter', 'HR Specialist', 1000000, 0, '2019-06-01 14:35:47', '2019-06-01 14:35:47'),
(64, 128, '2019', 'bangla', 'science', '1994-03-16 00:00:00', 'christianism', 'Shania Gibson DDS', '348862', 'SA0218IBYZVZJSEC8536V4XC', 'Reservation Agent OR Transportation Ticket Agent', 'Health Technologist', 1000000, 'Prof. Noemi Osinski PhD', '7090744', 'SA0218IBYZVZJSEC8536V4XC', 'Program Director', 'Social and Human Service Assistant', 300000, 0, '2019-06-01 14:35:47', '2019-06-01 14:35:47'),
(65, 90, '2019', 'english', 'science', '1934-08-05 00:00:00', 'hinduism', 'Owen Sauer', '4617836', 'SA0218IBYZVZJSEC8536V4XC', 'Sawing Machine Tool Setter', 'Tire Changer', 500000, 'Susie Shanahan', '5031938', 'SA0218IBYZVZJSEC8536V4XC', 'Mental Health Counselor', 'Healthcare Practitioner', 700000, 0, '2019-06-01 14:35:47', '2019-06-01 14:35:47'),
(66, 92, '2019', 'english', 'science', '1993-01-21 00:00:00', 'christianism', 'Terence Goodwin', '724759', 'SA0218IBYZVZJSEC8536V4XC', 'Molding Machine Operator', 'Conveyor Operator', 300000, 'Miss Isabella Koepp', '1863780', 'SA0218IBYZVZJSEC8536V4XC', 'Agricultural Inspector', 'Agricultural Product Grader Sorter', 500000, 0, '2019-06-01 14:35:48', '2019-06-01 14:35:48'),
(67, 212, '2019', 'english', 'science', '1958-10-07 00:00:00', 'other', 'Leonora Fritsch Sr.', '812830', 'SA0218IBYZVZJSEC8536V4XC', 'Solderer', 'Pharmaceutical Sales Representative', 700000, 'Vada Spencer', '5819648', 'SA0218IBYZVZJSEC8536V4XC', 'Nonfarm Animal Caretaker', 'Sewing Machine Operator', 700000, 0, '2019-06-01 14:35:48', '2019-06-01 14:35:48'),
(68, 199, '2019', 'english', 'science', '1969-05-04 00:00:00', 'buddhism', 'Mr. Isaiah Schaden DDS', '9709798', 'SA0218IBYZVZJSEC8536V4XC', 'Ship Engineer', 'Costume Attendant', 500000, 'Ona Crona', '6647836', 'SA0218IBYZVZJSEC8536V4XC', 'Security Guard', 'Correspondence Clerk', 1000000, 0, '2019-06-01 14:35:48', '2019-06-01 14:35:48'),
(69, 261, '2019', 'english', 'science', '1928-09-20 00:00:00', 'hinduism', 'Percy Runolfsdottir IV', '1230536', 'SA0218IBYZVZJSEC8536V4XC', 'Social Work Teacher', 'Upholsterer', 300000, 'Ahmad Bauch', '4044488', 'SA0218IBYZVZJSEC8536V4XC', 'Bicycle Repairer', 'Chemical Equipment Controller', 1000000, 0, '2019-06-01 14:35:48', '2019-06-01 14:35:48'),
(70, 85, '2019', 'bangla', 'science', '1994-09-06 00:00:00', 'christianism', 'Laverne Dooley I', '6011263', 'SA0218IBYZVZJSEC8536V4XC', 'Refractory Materials Repairer', 'Set and Exhibit Designer', 300000, 'Gerard Rogahn', '5942419', 'SA0218IBYZVZJSEC8536V4XC', 'Supervisor of Customer Service', 'Biological Science Teacher', 700000, 0, '2019-06-01 14:35:48', '2019-06-01 14:35:48'),
(71, 134, '2019', 'english', 'science', '1927-03-22 00:00:00', 'islam', 'Wellington Mitchell', '5647533', 'SA0218IBYZVZJSEC8536V4XC', 'Electronic Engineering Technician', 'Photoengraver', 700000, 'Raymundo Mitchell', '9260428', 'SA0218IBYZVZJSEC8536V4XC', 'Model Maker', 'Food Preparation and Serving Worker', 300000, 0, '2019-06-01 14:35:48', '2019-06-01 14:35:48'),
(72, 226, '2019', 'bangla', 'science', '1982-01-21 00:00:00', 'islam', 'Alexandria Schuppe', '5174393', 'SA0218IBYZVZJSEC8536V4XC', 'Maintenance Supervisor', 'Pesticide Sprayer', 700000, 'Georgette Dooley', '9206888', 'SA0218IBYZVZJSEC8536V4XC', 'Sociologist', 'Video Editor', 700000, 0, '2019-06-01 14:35:48', '2019-06-01 14:35:48'),
(73, 173, '2019', 'bangla', 'science', '1961-01-19 00:00:00', 'hinduism', 'Emmy Willms', '3208564', 'SA0218IBYZVZJSEC8536V4XC', 'Logging Supervisor', 'Counselor', 1000000, 'Randi Miller', '6527100', 'SA0218IBYZVZJSEC8536V4XC', 'Counseling Psychologist', 'Engineering Teacher', 300000, 0, '2019-06-01 14:35:48', '2019-06-01 14:35:48'),
(74, 219, '2019', 'bangla', 'science', '1979-06-08 00:00:00', 'christianism', 'Mckenna Fisher', '7724926', 'SA0218IBYZVZJSEC8536V4XC', 'Forensic Investigator', 'Precision Printing Worker', 500000, 'Jakob Kulas Jr.', '3108031', 'SA0218IBYZVZJSEC8536V4XC', 'Pump Operators', 'Web Developer', 700000, 0, '2019-06-01 14:35:48', '2019-06-01 14:35:48'),
(75, 91, '2019', 'bangla', 'science', '1960-11-07 00:00:00', 'other', 'Issac Ryan', '9123312', 'SA0218IBYZVZJSEC8536V4XC', 'Adjustment Clerk', 'Personnel Recruiter', 700000, 'Isaac Parker', '8598015', 'SA0218IBYZVZJSEC8536V4XC', 'Human Resource Director', 'Tire Builder', 500000, 0, '2019-06-01 14:35:48', '2019-06-01 14:35:48'),
(76, 240, '2019', 'bangla', 'commerce', '2001-02-12 00:00:00', 'islam', 'Melba McClure', '31224', 'SA0218IBYZVZJSEC8536V4XC', 'Medical Equipment Repairer', 'Interpreter OR Translator', 500000, 'Javon Ziemann', '7811691', 'SA0218IBYZVZJSEC8536V4XC', 'Building Cleaning Worker', 'Information Systems Manager', 300000, 0, '2019-06-01 14:35:48', '2019-06-01 14:35:48'),
(77, 203, '2019', 'bangla', 'commerce', '1928-10-07 00:00:00', 'other', 'Justice Carter III', '9087639', 'SA0218IBYZVZJSEC8536V4XC', 'Education Teacher', 'Clinical Psychologist', 700000, 'Golda Gutkowski', '4658874', 'SA0218IBYZVZJSEC8536V4XC', 'Watch Repairer', 'Optometrist', 1000000, 0, '2019-06-01 14:35:48', '2019-06-01 14:35:48'),
(78, 114, '2019', 'english', 'commerce', '1932-06-27 00:00:00', 'other', 'Lula Sporer', '6683794', 'SA0218IBYZVZJSEC8536V4XC', 'Order Filler OR Stock Clerk', 'Eligibility Interviewer', 300000, 'Ms. Marisa Waelchi', '6728021', 'SA0218IBYZVZJSEC8536V4XC', 'Veterinary Assistant OR Laboratory Animal Caretaker', 'Logging Tractor Operator', 700000, 0, '2019-06-01 14:35:48', '2019-06-01 14:35:48'),
(79, 204, '2019', 'english', 'commerce', '1959-04-02 00:00:00', 'buddhism', 'Deonte Roob Sr.', '9456319', 'SA0218IBYZVZJSEC8536V4XC', 'Soil Scientist OR Plant Scientist', 'Landscape Artist', 700000, 'Dangelo Bosco II', '3389810', 'SA0218IBYZVZJSEC8536V4XC', 'Textile Dyeing Machine Operator', 'Maintenance Worker', 500000, 0, '2019-06-01 14:35:48', '2019-06-01 14:35:48'),
(80, 148, '2019', 'english', 'commerce', '2006-01-31 00:00:00', 'buddhism', 'Miguel Rice', '1461074', 'SA0218IBYZVZJSEC8536V4XC', 'Control Valve Installer', 'Biochemist or Biophysicist', 500000, 'Robyn Walsh', '3447676', 'SA0218IBYZVZJSEC8536V4XC', 'Safety Engineer', 'Electric Meter Installer', 300000, 0, '2019-06-01 14:35:48', '2019-06-01 14:35:48'),
(81, 229, '2019', 'bangla', 'commerce', '1978-06-27 00:00:00', 'buddhism', 'Kellen Lang', '7274833', 'SA0218IBYZVZJSEC8536V4XC', 'Prepress Technician', 'Postal Service Mail Carrier', 1000000, 'Gunner Sporer', '2222999', 'SA0218IBYZVZJSEC8536V4XC', 'Appliance Repairer', 'Fitter', 500000, 0, '2019-06-01 14:35:48', '2019-06-01 14:35:48'),
(82, 232, '2019', 'english', 'commerce', '1921-08-01 00:00:00', 'other', 'Kelsi Olson', '8998618', 'SA0218IBYZVZJSEC8536V4XC', 'Recreational Vehicle Service Technician', 'Business Teacher', 500000, 'Skyla Maggio V', '9739079', 'SA0218IBYZVZJSEC8536V4XC', 'Oil and gas Operator', 'Roustabouts', 500000, 0, '2019-06-01 14:35:49', '2019-06-01 14:35:49'),
(83, 210, '2019', 'english', 'commerce', '1997-09-28 00:00:00', 'islam', 'Easton McKenzie', '6559112', 'SA0218IBYZVZJSEC8536V4XC', 'Tour Guide', 'Portable Power Tool Repairer', 1000000, 'Carolyn Dooley', '3466445', 'SA0218IBYZVZJSEC8536V4XC', 'Employment Interviewer', 'Veterinary Technician', 700000, 0, '2019-06-01 14:35:49', '2019-06-01 14:35:49'),
(84, 173, '2019', 'bangla', 'commerce', '2004-03-26 00:00:00', 'buddhism', 'Prof. Lauren Grady Sr.', '4462562', 'SA0218IBYZVZJSEC8536V4XC', 'Surgical Technologist', 'Central Office and PBX Installers', 1000000, 'Mozell Reilly', '3378351', 'SA0218IBYZVZJSEC8536V4XC', 'Health Educator', 'Environmental Compliance Inspector', 500000, 0, '2019-06-01 14:35:49', '2019-06-01 14:35:49'),
(85, 238, '2019', 'bangla', 'commerce', '1960-04-08 00:00:00', 'buddhism', 'Marianna Pagac', '7064851', 'SA0218IBYZVZJSEC8536V4XC', 'Pharmaceutical Sales Representative', 'Engineering', 500000, 'Cole Goodwin DDS', '2858469', 'SA0218IBYZVZJSEC8536V4XC', 'Creative Writer', 'Metal Worker', 1000000, 0, '2019-06-01 14:35:49', '2019-06-01 14:35:49'),
(86, 198, '2019', 'bangla', 'commerce', '1984-06-19 00:00:00', 'buddhism', 'Prof. Glennie Kuvalis', '2987653', 'SA0218IBYZVZJSEC8536V4XC', 'Lodging Manager', 'Transportation Equipment Painters', 700000, 'Lempi Gleichner', '2558011', 'SA0218IBYZVZJSEC8536V4XC', 'Prepress Technician', 'Motion Picture Projectionist', 700000, 0, '2019-06-01 14:35:49', '2019-06-01 14:35:49'),
(87, 235, '2019', 'bangla', 'commerce', '1960-11-25 00:00:00', 'other', 'Seamus Hill III', '7152884', 'SA0218IBYZVZJSEC8536V4XC', 'Silversmith', 'Printing Machine Operator', 300000, 'Raoul Lang', '3439350', 'SA0218IBYZVZJSEC8536V4XC', 'Human Resource Manager', 'Communications Teacher', 1000000, 0, '2019-06-01 14:35:49', '2019-06-01 14:35:49'),
(88, 172, '2019', 'english', 'commerce', '1935-08-12 00:00:00', 'islam', 'Mr. Murray Cremin', '8267619', 'SA0218IBYZVZJSEC8536V4XC', 'Industrial Engineer', 'Wellhead Pumper', 500000, 'Cleve Rodriguez', '6027366', 'SA0218IBYZVZJSEC8536V4XC', 'Grinding Machine Operator', 'Control Valve Installer', 300000, 0, '2019-06-01 14:35:49', '2019-06-01 14:35:49'),
(89, 128, '2019', 'bangla', 'commerce', '1930-12-27 00:00:00', 'buddhism', 'Ms. Alva Sauer', '8496818', 'SA0218IBYZVZJSEC8536V4XC', 'Paving Equipment Operator', 'Health Practitioner', 1000000, 'Dr. Angus O\'Keefe III', '2500087', 'SA0218IBYZVZJSEC8536V4XC', 'Etcher', 'Library Assistant', 500000, 0, '2019-06-01 14:35:49', '2019-06-01 14:35:49'),
(90, 239, '2019', 'english', 'commerce', '1988-05-18 00:00:00', 'buddhism', 'Prof. Delpha Jerde DDS', '8189200', 'SA0218IBYZVZJSEC8536V4XC', 'Skin Care Specialist', 'Food Service Manager', 1000000, 'Miss Ciara O\'Reilly I', '2983894', 'SA0218IBYZVZJSEC8536V4XC', 'Physicist', 'Archeologist', 1000000, 0, '2019-06-01 14:35:49', '2019-06-01 14:35:49'),
(91, 71, '2019', 'english', 'arts', '1963-04-03 00:00:00', 'other', 'Dr. Freida Crona', '1070430', 'SA0218IBYZVZJSEC8536V4XC', 'Foundry Mold and Coremaker', 'Sales Person', 1000000, 'Elisabeth Donnelly', '739595', 'SA0218IBYZVZJSEC8536V4XC', 'Conveyor Operator', 'Electronics Engineering Technician', 1000000, 0, '2019-06-01 14:35:49', '2019-06-01 14:35:49'),
(92, 100, '2019', 'bangla', 'arts', '1959-09-23 00:00:00', 'christianism', 'Colton Weissnat', '6923304', 'SA0218IBYZVZJSEC8536V4XC', 'Animal Scientist', 'Architecture Teacher', 700000, 'Evie Anderson PhD', '3753410', 'SA0218IBYZVZJSEC8536V4XC', 'Agricultural Sales Representative', 'Budget Analyst', 500000, 0, '2019-06-01 14:35:50', '2019-06-01 14:35:50'),
(93, 162, '2019', 'english', 'arts', '1972-07-27 00:00:00', 'hinduism', 'Norbert Waelchi MD', '9404422', 'SA0218IBYZVZJSEC8536V4XC', 'Writer OR Author', 'Paste-Up Worker', 500000, 'Delbert Krajcik Jr.', '5085634', 'SA0218IBYZVZJSEC8536V4XC', 'Geological Sample Test Technician', 'Stringed Instrument Repairer and Tuner', 500000, 0, '2019-06-01 14:35:50', '2019-06-01 14:35:50'),
(94, 250, '2019', 'bangla', 'arts', '1931-07-11 00:00:00', 'buddhism', 'Miss Rebeca Runolfsson MD', '4934142', 'SA0218IBYZVZJSEC8536V4XC', 'Usher', 'Waitress', 1000000, 'Fiona Fay II', '5604143', 'SA0218IBYZVZJSEC8536V4XC', 'Brazer', 'Set and Exhibit Designer', 500000, 0, '2019-06-01 14:35:50', '2019-06-01 14:35:50'),
(95, 201, '2019', 'english', 'arts', '1971-03-01 00:00:00', 'islam', 'Chyna Carroll', '5895950', 'SA0218IBYZVZJSEC8536V4XC', 'Human Resources Manager', 'Aircraft Body Repairer', 300000, 'Easter Johnston', '9832195', 'SA0218IBYZVZJSEC8536V4XC', 'Office and Administrative Support Worker', 'Construction Equipment Operator', 300000, 0, '2019-06-01 14:35:50', '2019-06-01 14:35:50'),
(96, 87, '2019', 'english', 'arts', '1997-06-02 00:00:00', 'other', 'Anne Tromp', '4195312', 'SA0218IBYZVZJSEC8536V4XC', 'Recreation and Fitness Studies Teacher', 'Manicurists', 500000, 'Janiya Pfeffer', '2064729', 'SA0218IBYZVZJSEC8536V4XC', 'Animal Control Worker', 'Middle School Teacher', 500000, 0, '2019-06-01 14:35:50', '2019-06-01 14:35:50'),
(97, 224, '2019', 'bangla', 'arts', '1961-11-13 00:00:00', 'other', 'Mr. Willy Collins IV', '9292939', 'SA0218IBYZVZJSEC8536V4XC', 'Business Teacher', 'Respiratory Therapist', 1000000, 'Dayana Pfannerstill', '1536284', 'SA0218IBYZVZJSEC8536V4XC', 'Environmental Science Teacher', 'Nursery Manager', 300000, 0, '2019-06-01 14:35:50', '2019-06-01 14:35:50'),
(98, 99, '2019', 'bangla', 'arts', '1964-10-23 00:00:00', 'buddhism', 'Gerhard Orn', '2047087', 'SA0218IBYZVZJSEC8536V4XC', 'Microbiologist', 'Commercial and Industrial Designer', 500000, 'Lavonne Doyle', '1527627', 'SA0218IBYZVZJSEC8536V4XC', 'Nursery Manager', 'Operations Research Analyst', 700000, 0, '2019-06-01 14:35:50', '2019-06-01 14:35:50'),
(99, 84, '2019', 'english', 'arts', '1923-02-21 00:00:00', 'hinduism', 'Emie Tillman', '673314', 'SA0218IBYZVZJSEC8536V4XC', 'Dragline Operator', 'Dental Hygienist', 300000, 'Marlen Rolfson', '6114323', 'SA0218IBYZVZJSEC8536V4XC', 'Atmospheric and Space Scientist', 'Armored Assault Vehicle Officer', 1000000, 0, '2019-06-01 14:35:50', '2019-06-01 14:35:50'),
(100, 211, '2019', 'bangla', 'arts', '1946-12-14 00:00:00', 'christianism', 'Dr. Joey Luettgen PhD', '1585720', 'SA0218IBYZVZJSEC8536V4XC', 'Wholesale Buyer', 'Auditor', 700000, 'Bennie Runolfsdottir IV', '2642253', 'SA0218IBYZVZJSEC8536V4XC', 'Home Entertainment Equipment Installer', 'Recruiter', 300000, 0, '2019-06-01 14:35:50', '2019-06-01 14:35:50');

-- --------------------------------------------------------

--
-- Structure de la table `school_subscriptions`
--

DROP TABLE IF EXISTS `school_subscriptions`;
CREATE TABLE IF NOT EXISTS `school_subscriptions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_plan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `school_syllabuses`
--

DROP TABLE IF EXISTS `school_syllabuses`;
CREATE TABLE IF NOT EXISTS `school_syllabuses` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `file_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `class_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `school_syllabuses`
--

INSERT INTO `school_syllabuses` (`id`, `file_path`, `title`, `description`, `active`, `school_id`, `user_id`, `created_at`, `updated_at`, `class_id`) VALUES
(1, 'http://crona.com/et-inventore-cum-voluptas-adipisci-quam-ex-voluptatem', 'Omnis minus ratione quia et recusandae.', 'Consequuntur reprehenderit asperiores optio exercitationem. Nam impedit facilis architecto doloremque et. Quis recusandae tempore esse sunt saepe commodi ut.', 0, 1, 182, '2019-06-01 14:34:24', '2019-06-01 14:34:24', 4),
(2, 'http://www.stracke.org/', 'Accusantium voluptas iste at amet sint exercitationem.', 'Impedit dolor enim atque voluptatum nihil dignissimos blanditiis. Nisi minus eveniet iusto quidem. Quia corrupti modi ut quia.', 0, 1, 154, '2019-06-01 14:34:25', '2019-06-01 14:34:25', 6),
(3, 'http://www.harvey.com/aut-aut-ea-quod-quia-voluptas-voluptas.html', 'Odio aliquid repudiandae odio omnis.', 'Fugiat similique ut expedita nisi. Molestiae in rerum consequatur. Labore et similique quod praesentium qui perspiciatis.', 0, 1, 164, '2019-06-01 14:34:25', '2019-06-01 14:34:25', 11),
(4, 'https://kassulke.net/nesciunt-aperiam-maxime-unde.html', 'Quas explicabo sapiente quasi reprehenderit officia quaerat voluptatem.', 'Velit non vel expedita qui id. Aut consequatur reprehenderit assumenda iusto quia. Et accusantium in cupiditate explicabo hic ut.', 0, 1, 94, '2019-06-01 14:34:25', '2019-06-01 14:34:25', 3),
(5, 'http://price.info/commodi-quisquam-assumenda-aut-consequatur-sint-qui-et-explicabo', 'Voluptatibus non id natus quae non et.', 'Eum hic voluptas ipsam quos. Rem corrupti aliquid officia odit ut corporis. Et quas voluptatem saepe non reiciendis commodi ad.', 1, 1, 179, '2019-06-01 14:34:25', '2019-06-01 14:34:25', 1),
(6, 'http://www.okuneva.com/autem-ipsa-occaecati-itaque-ut-sint', 'Maiores ipsum corporis et ex debitis veniam.', 'Laboriosam consequatur quo veniam nesciunt molestiae. Dolores nobis reprehenderit ut aut voluptas voluptas odit. Totam et necessitatibus autem inventore.', 1, 1, 50, '2019-06-01 14:34:25', '2019-06-01 14:34:25', 9),
(7, 'http://www.mcdermott.info/labore-ipsam-fuga-voluptatibus-eos-dolor-consectetur-perspiciatis', 'Eius placeat quidem reiciendis.', 'Nihil iure quo iste deleniti explicabo ex ut. Culpa iste occaecati rem minima modi molestiae. Et odit sed beatae harum odio.', 1, 1, 123, '2019-06-01 14:34:25', '2019-06-01 14:34:25', 9),
(8, 'https://www.sauer.info/quidem-quas-eligendi-corporis-illo-iusto-rerum-mollitia', 'Sit porro quasi sint et ipsam.', 'Est perspiciatis illum sed. Ut laborum perferendis possimus soluta minima. Labore dolor id quia aut nobis ipsa.', 1, 1, 251, '2019-06-01 14:34:25', '2019-06-01 14:34:25', 1),
(9, 'http://www.goodwin.com/', 'Et enim sed voluptatem dolorem quis.', 'Distinctio vero cumque et animi quibusdam suscipit. Nisi nulla rerum autem. Non voluptates laudantium quia aliquid fugit.', 1, 1, 35, '2019-06-01 14:34:26', '2019-06-01 14:34:26', 10),
(10, 'http://www.kiehn.com/', 'Saepe corrupti hic voluptas sint tenetur.', 'Et nihil nihil quae aut dicta et in. Deleniti facere maiores rerum repudiandae. Ullam alias accusamus corporis quasi accusamus sit autem.', 1, 1, 77, '2019-06-01 14:34:26', '2019-06-01 14:34:26', 1),
(11, 'https://www.gislason.com/nulla-facilis-provident-qui-consequatur-tempore', 'Ut consectetur consectetur eveniet et totam et repudiandae eum.', 'Incidunt quis eligendi amet recusandae minus impedit. Deleniti ipsa quo atque harum sit corporis possimus reiciendis. Possimus sit magnam illum aliquam ipsa tempore.', 0, 1, 7, '2019-06-01 14:34:26', '2019-06-01 14:34:26', 13),
(12, 'http://hill.info/non-molestiae-accusantium-eum-odio-quod-repellendus.html', 'Quos eum qui maxime et excepturi.', 'Possimus culpa unde laudantium assumenda dolorum sit exercitationem. Id praesentium dicta beatae. Deleniti vero velit enim qui.', 0, 1, 111, '2019-06-01 14:34:26', '2019-06-01 14:34:26', 2),
(13, 'http://stracke.org/assumenda-harum-voluptatum-nostrum-a-ea-possimus-assumenda', 'Qui ipsam repudiandae ducimus possimus illo molestiae ea.', 'Perferendis consequatur autem sed sit fugiat a officiis. Doloremque ipsam voluptates officia iure. Excepturi nihil perspiciatis officiis.', 0, 1, 201, '2019-06-01 14:34:26', '2019-06-01 14:34:26', 10),
(14, 'http://www.nitzsche.com/', 'Fugit id perferendis dolores rem.', 'Dignissimos pariatur nemo omnis molestiae natus impedit quas. Debitis laudantium repudiandae maxime vel ut ut iure autem. Et animi repellendus quibusdam atque repellendus sed.', 0, 1, 96, '2019-06-01 14:34:26', '2019-06-01 14:34:26', 3),
(15, 'http://schroeder.info/at-qui-molestias-molestiae-officia-nemo-beatae-iste-quaerat', 'Et minus quos voluptas facilis eius eum excepturi.', 'Vel dolores omnis nesciunt ipsum odio voluptatem. Maxime at eveniet architecto facilis atque. Ut quisquam consequatur incidunt praesentium.', 0, 1, 195, '2019-06-01 14:34:26', '2019-06-01 14:34:26', 4),
(16, 'http://www.kovacek.biz/', 'Vel quasi ut sapiente delectus odio velit sit.', 'Id harum et nobis et ratione. Libero blanditiis dolore nihil ex id ut et animi. Accusantium at omnis voluptatum nulla qui qui accusamus.', 0, 1, 251, '2019-06-01 14:34:26', '2019-06-01 14:34:26', 5),
(17, 'http://price.com/nostrum-deserunt-reprehenderit-laborum.html', 'Labore et accusantium quia sunt perspiciatis.', 'Veniam itaque culpa quis voluptatem veniam eos. Voluptatem debitis et porro ducimus blanditiis. Velit dolorem perspiciatis at.', 0, 1, 234, '2019-06-01 14:34:26', '2019-06-01 14:34:26', 6),
(18, 'http://www.marvin.info/iusto-ipsum-qui-exercitationem-ut-voluptatem-et-tempora', 'Voluptatibus fuga perspiciatis deleniti facere est enim sit.', 'Sequi voluptatibus esse natus voluptatem eos dolor. Est ut sit sequi aliquid deserunt debitis vitae deserunt. Autem sunt asperiores quas odit.', 1, 1, 253, '2019-06-01 14:34:26', '2019-06-01 14:34:26', 1),
(19, 'http://schaefer.com/eligendi-mollitia-qui-architecto-omnis-incidunt-qui-sed.html', 'Commodi tenetur natus error qui ipsum.', 'Explicabo ut alias quo cumque sint et. Et cumque et eius ut fuga. Id est voluptatem totam qui.', 1, 1, 169, '2019-06-01 14:34:26', '2019-06-01 14:34:26', 6),
(20, 'http://schuppe.org/magni-autem-neque-ut-possimus-mollitia-quis', 'Quod qui eos magni sed beatae sed suscipit quis.', 'Enim eveniet aliquam libero quas quis. In eos dolores et id nam aut. Est repudiandae consequatur tempore architecto laborum omnis voluptatibus.', 0, 1, 170, '2019-06-01 14:34:27', '2019-06-01 14:34:27', 3),
(21, 'http://www.white.org/culpa-maiores-quae-sint-rerum', 'Cum vel et et vero expedita ut velit.', 'Eum quas rerum rerum. Consequuntur nostrum dolores hic fugit. Quis est dolorem ipsa expedita repellendus est.', 0, 1, 168, '2019-06-01 14:34:27', '2019-06-01 14:34:27', 5),
(22, 'http://www.wintheiser.biz/dicta-nesciunt-incidunt-enim-eum.html', 'Odio tempore voluptates dolor ipsa magni alias fugiat.', 'Maxime animi autem assumenda porro excepturi. Fugiat rerum temporibus rerum voluptate non voluptates. Ea consequuntur est dolor cupiditate ut.', 1, 1, 233, '2019-06-01 14:34:27', '2019-06-01 14:34:27', 9),
(23, 'http://reilly.info/esse-tempora-amet-neque-pariatur', 'Officiis voluptatem magnam delectus sint ducimus.', 'Optio asperiores odit iste corrupti explicabo consequatur. In cum et quibusdam ullam eos aliquam. At optio totam inventore enim praesentium est modi odit.', 0, 1, 252, '2019-06-01 14:34:27', '2019-06-01 14:34:27', 6),
(24, 'http://www.flatley.biz/hic-atque-eos-quisquam-voluptates-nulla', 'Perspiciatis laboriosam repudiandae officiis dolore id.', 'Quos vero et fugit non in. Atque aut nesciunt sit est est id tempora. Id magnam qui sunt unde perspiciatis.', 1, 1, 116, '2019-06-01 14:34:27', '2019-06-01 14:34:27', 7),
(25, 'http://www.bartell.info/sit-aut-beatae-quo-quo-fuga.html', 'Qui labore quaerat aut sit culpa quod.', 'Molestiae consequatur fuga sed. Omnis quisquam molestias veniam aliquam beatae exercitationem quae ducimus. Nisi asperiores qui placeat magni saepe est et.', 0, 1, 73, '2019-06-01 14:34:27', '2019-06-01 14:34:27', 1),
(26, 'http://www.leuschke.com/consequuntur-nihil-nihil-est-et', 'Nemo consectetur qui aut velit nulla molestiae rem.', 'Recusandae et aut fugit soluta maxime. Ipsa porro similique necessitatibus. Vitae ab ex minima numquam qui vitae.', 0, 1, 72, '2019-06-01 14:34:27', '2019-06-01 14:34:27', 5),
(27, 'http://wiegand.com/asperiores-facere-rerum-tenetur-aliquam-deleniti-et-ratione', 'Nostrum rerum est veritatis voluptas molestias.', 'Est et voluptas delectus hic ipsam ut. Quo molestias sed veritatis ut porro. Sit et sunt repudiandae fuga.', 1, 1, 240, '2019-06-01 14:34:27', '2019-06-01 14:34:27', 7),
(28, 'http://www.mcglynn.com/', 'Eligendi provident quam est consectetur provident.', 'Ratione qui deserunt autem. Rerum doloribus dolorem excepturi neque nisi. Blanditiis voluptatem consequuntur assumenda quia consequatur rerum exercitationem dolorem.', 0, 1, 101, '2019-06-01 14:34:27', '2019-06-01 14:34:27', 2),
(29, 'http://pollich.com/eum-id-libero-necessitatibus-adipisci-illo-explicabo', 'Aspernatur voluptatem doloremque ea ut.', 'Dolore est aut in dignissimos maiores quis debitis. Reprehenderit ut perspiciatis enim. Sit ea vitae iste ex voluptates quod eligendi recusandae.', 0, 1, 232, '2019-06-01 14:34:27', '2019-06-01 14:34:27', 10),
(30, 'http://www.bechtelar.com/', 'Aut quisquam voluptatem hic voluptatibus.', 'Dolores officia consequatur quibusdam quaerat adipisci. Suscipit vel perspiciatis cupiditate architecto. Atque hic sed quia quos est.', 0, 1, 242, '2019-06-01 14:34:27', '2019-06-01 14:34:27', 12),
(31, 'http://www.anderson.biz/', 'Sed molestiae consequatur commodi magni.', 'Aperiam dolore velit nisi dolor. Est qui praesentium asperiores explicabo qui est. Consectetur dicta cum sunt aut aperiam dicta.', 1, 1, 55, '2019-06-01 14:34:28', '2019-06-01 14:34:28', 4),
(32, 'http://fahey.net/omnis-quisquam-id-ut-omnis', 'Error quod numquam et vel facere architecto id deserunt.', 'Exercitationem maxime omnis neque qui quia ut. At modi qui sint vel voluptates id. Omnis architecto ipsum corrupti non reprehenderit laborum praesentium.', 0, 1, 172, '2019-06-01 14:34:28', '2019-06-01 14:34:28', 2),
(33, 'http://www.olson.com/quaerat-rerum-fugit-maiores-non.html', 'Accusantium alias amet laborum delectus.', 'Quae saepe animi et vero eius debitis ut est. Molestias facilis deleniti dolor in. Occaecati enim ipsa laborum voluptate.', 0, 1, 241, '2019-06-01 14:34:28', '2019-06-01 14:34:28', 10),
(34, 'http://www.bartell.com/est-nemo-hic-aut-rerum-eligendi-quia', 'Quis ipsum nisi alias et explicabo est non.', 'Ullam assumenda in non officia rerum repellendus occaecati. Explicabo deleniti repellat aliquid consequatur accusantium. Voluptatem magnam minima molestiae natus nobis.', 0, 1, 71, '2019-06-01 14:34:28', '2019-06-01 14:34:28', 12),
(35, 'http://pfannerstill.org/', 'Odio et repudiandae ut.', 'Ut autem debitis natus asperiores dolores velit. Repellendus distinctio qui voluptatem dignissimos provident ratione. Aperiam dolorem voluptate id dolores excepturi in.', 0, 1, 109, '2019-06-01 14:34:28', '2019-06-01 14:34:28', 7),
(36, 'http://www.beier.com/dolor-dolor-et-possimus-numquam', 'Quia quod maiores facilis laborum et culpa cumque.', 'Distinctio iure quibusdam ea doloremque qui. Recusandae veniam facilis magni nemo magni. Quasi ducimus magni consequatur.', 1, 1, 155, '2019-06-01 14:34:28', '2019-06-01 14:34:28', 9),
(37, 'https://bins.biz/eos-quis-delectus-qui-labore.html', 'Eaque facere qui repudiandae hic non reiciendis dolor.', 'Aut qui ratione assumenda officiis delectus id. Repellat amet ut dolore repudiandae voluptas. Qui quam nobis et non.', 1, 1, 235, '2019-06-01 14:34:28', '2019-06-01 14:34:28', 3),
(38, 'http://zieme.com/', 'Eveniet dolore aut consequatur omnis.', 'Ducimus earum aut nam voluptas earum eum. Et occaecati saepe veritatis magni. Ipsum voluptas unde aspernatur.', 1, 1, 52, '2019-06-01 14:34:28', '2019-06-01 14:34:28', 10),
(39, 'http://pfannerstill.com/rerum-sit-qui-corporis-enim-consequuntur-quia-ducimus.html', 'Sed mollitia tenetur nihil doloribus rerum aliquam totam ipsum.', 'Reiciendis fuga quos debitis reiciendis consequatur reiciendis rem ut. Odio veritatis ea aut ullam. Id aut magnam aut quae.', 0, 1, 153, '2019-06-01 14:34:28', '2019-06-01 14:34:28', 12),
(40, 'http://reilly.com/odit-ad-ducimus-quia-aut-incidunt-rerum-est', 'Facere soluta vel deserunt nisi repellendus rerum dolores.', 'Nihil sapiente officia est porro quasi laudantium repellat dolor. Sunt accusantium numquam error laboriosam ut dolorum. Itaque dolorem quo totam aut.', 1, 1, 93, '2019-06-01 14:34:28', '2019-06-01 14:34:28', 2),
(41, 'http://lehner.com/', 'Rerum in fugit nesciunt non.', 'Minus sunt minima dolor distinctio. Laborum voluptatum minima ut saepe recusandae. Explicabo dolorum occaecati non praesentium.', 0, 1, 206, '2019-06-01 14:34:28', '2019-06-01 14:34:28', 3),
(42, 'http://www.schinner.com/asperiores-eius-in-doloremque-ipsum', 'Rerum unde assumenda similique assumenda doloremque natus numquam.', 'Officiis ipsum saepe voluptates sit. Voluptatem aut aut occaecati dolore. Odio nulla incidunt numquam sequi ratione.', 1, 1, 104, '2019-06-01 14:34:28', '2019-06-01 14:34:28', 2),
(43, 'http://www.bahringer.com/', 'Consequuntur sapiente repellendus consequuntur eos velit sit.', 'Eos necessitatibus voluptas accusamus aliquid at sed similique accusamus. Quasi distinctio laudantium deserunt nisi necessitatibus sit voluptatem. Magnam quos quisquam pariatur blanditiis debitis quo.', 0, 1, 152, '2019-06-01 14:34:29', '2019-06-01 14:34:29', 9),
(44, 'http://gerlach.com/similique-reprehenderit-dicta-aut-voluptatem-quia-a-quaerat', 'Consequatur tempora est similique vitae nihil.', 'Est numquam ut blanditiis. Nesciunt libero omnis voluptatum beatae provident ea quos ut. Blanditiis sunt et aut nostrum est optio earum.', 1, 1, 216, '2019-06-01 14:34:29', '2019-06-01 14:34:29', 5),
(45, 'http://www.bauch.com/maiores-quia-possimus-quos-doloremque-aut', 'Magnam repudiandae a quos cum optio quia.', 'Autem quo aperiam aperiam est quia animi. Et aut eaque nam est. Et enim voluptas illo quibusdam.', 0, 1, 19, '2019-06-01 14:34:29', '2019-06-01 14:34:29', 11),
(46, 'http://wiza.com/aut-qui-perspiciatis-omnis-sed', 'Sed officia nihil possimus.', 'Aut nulla sit exercitationem. Consequuntur delectus sed sint enim adipisci perspiciatis. Id esse qui rerum quis animi.', 1, 1, 138, '2019-06-01 14:34:29', '2019-06-01 14:34:29', 3),
(47, 'https://krajcik.com/reprehenderit-autem-tempora-et-eum-eos-exercitationem.html', 'Nostrum repellendus corrupti unde suscipit ea aliquid.', 'Voluptatem laboriosam maxime quisquam. Iure sint voluptatem aut et sed veritatis et. Et sint earum rerum rerum non.', 1, 1, 66, '2019-06-01 14:34:29', '2019-06-01 14:34:29', 9),
(48, 'http://www.blanda.biz/', 'Quo odio et doloremque aliquid rem quos dolorem quas.', 'Ut quo voluptas amet et minima. Accusantium iusto facilis eum laudantium. Dolores tenetur quis beatae quas vel velit molestiae quis.', 1, 1, 183, '2019-06-01 14:34:29', '2019-06-01 14:34:29', 4),
(49, 'http://www.boyer.com/tempore-perspiciatis-et-ut-vel-delectus', 'Molestiae impedit doloremque quia perspiciatis at totam.', 'Accusantium ut debitis voluptatibus. Natus non quo repellendus voluptatem excepturi quia ipsam. Nisi magnam fugiat nulla eum id non.', 0, 1, 125, '2019-06-01 14:34:29', '2019-06-01 14:34:29', 1),
(50, 'http://klein.info/aut-optio-illum-esse-eos', 'Vitae occaecati deserunt maiores et architecto.', 'Ducimus distinctio voluptatem distinctio optio eum ipsa. Laborum aut fugiat aliquid. Nostrum aliquid excepturi nihil qui sapiente totam.', 1, 1, 135, '2019-06-01 14:34:29', '2019-06-01 14:34:29', 13);

-- --------------------------------------------------------

--
-- Structure de la table `school_users`
--

DROP TABLE IF EXISTS `school_users`;
CREATE TABLE IF NOT EXISTS `school_users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL,
  `school_id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `student_code` int(11) NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `blood_group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `nationality` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `verified` tinyint(4) NOT NULL,
  `section_id` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `department_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `stripe_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_brand` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_last_four` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_student_code_unique` (`student_code`),
  UNIQUE KEY `users_phone_number_unique` (`phone_number`)
) ENGINE=InnoDB AUTO_INCREMENT=262 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `school_users`
--

INSERT INTO `school_users` (`id`, `name`, `email`, `password`, `role`, `active`, `school_id`, `code`, `student_code`, `gender`, `blood_group`, `nationality`, `phone_number`, `address`, `about`, `pic_path`, `verified`, `section_id`, `remember_token`, `created_at`, `updated_at`, `department_id`, `stripe_id`, `card_brand`, `card_last_four`, `trial_ends_at`) VALUES
(1, 'hasib', 'hasib@unifiedtransform.com', '$2y$10$4mIwURNSs5ehsIp6UNASXeZCNhEElgDqOMDzFgBHqm9lA7pvnnVQq', 'master', 1, 0, 0, 0, '', '', '', '', '', '', '', 1, 0, '89g4FxXSIsaDYqOEVx157DibqU7FvSz2WbyYUVUp7ehbQof3bgQRmHFKTFbE', NULL, '2019-06-01 16:36:08', 0, NULL, NULL, NULL, NULL),
(2, 'Curtis O\'Reilly', 'missouri.russel@example.net', '$2y$10$aXSiH2bXZUNjMlkKXm3qCOyo8s9fWp5I2E1TcfBiVERFiKUAbZwNC', 'admin', 1, 1, 19292940, 1040641, 'female', 'o+', 'Bangladeshi', '768.297.4327 x5234', '502 Mertz Flat\nFelixburgh, CT 40217-4398', 'Praesentium qui nemo exercitationem magni similique sed. Quas modi et aut explicabo eaque aperiam et ipsum. Minima reprehenderit impedit et quasi maxime assumenda sunt.', 'https://lorempixel.com/640/480/?27929', 1, 6, 'WOZJleoTOA9JKBp6k0l9xh2AToq5HuFiEtrfvLi7lpIoI46BQD4wrD71bWHb', '2019-06-01 14:34:03', '2019-06-01 16:36:08', 2, NULL, NULL, NULL, NULL),
(3, 'Yasmin Kuhic', 'thompson.lia@example.com', '$2y$10$Z870vrF0ApFtgjUPG6.IQ.0gbzpIS79yGUirwRTEM2YjVoTsgduqm', 'admin', 1, 1, 19292940, 8286272, 'male', 'ab', 'Bangladeshi', '(279) 761-5575', '8882 Dana Ford\nNorth Rubie, WY 54509', 'Est sint in iure consequatur dolor. Ullam iure et assumenda dolores aliquid officiis quasi. Omnis sunt enim placeat molestiae.', 'https://lorempixel.com/640/480/?71188', 1, 6, '2RT0RbnSo6', '2019-06-01 14:34:04', '2019-06-01 16:36:09', 3, NULL, NULL, NULL, NULL),
(4, 'Gavin VonRueden V', 'mann.serena@example.com', '$2y$10$jbhvwuMF4Wa5kmVdpBZbaeK0uJ37Ru1FSj.UEmltBkaZoAd4da8gG', 'admin', 1, 1, 19292940, 999488, 'male', 'b+', 'Bangladeshi', '+1 (504) 263-9336', '9534 Keeley Path\nCarletonmouth, WI 79448', 'Et unde eum ut consequuntur. Eum corporis sit reiciendis sed laborum voluptates eum. Nesciunt deserunt voluptatum accusamus minima.', 'https://lorempixel.com/640/480/?21866', 1, 6, 'cTiUFNeauV', '2019-06-01 14:34:04', '2019-06-01 16:36:09', 2, NULL, NULL, NULL, NULL),
(5, 'Juwan Aufderhar', 'akeem.rowe@example.net', '$2y$10$ric.szrKHuCAP.LWRerkmu.dIt2Ql9lNqJSVAkvi3B0Bu/qX2E.lq', 'admin', 1, 1, 19292940, 2292795, 'male', 'o+', 'Bangladeshi', '747.884.0670', '661 Verna Curve\nWilliamsonmouth, SD 40151-3690', 'Atque ut minus consectetur quas at quasi. Quia consequatur dolores quasi sapiente. A libero hic neque non.', 'https://lorempixel.com/640/480/?46980', 1, 1, 'sUpVhTubQk', '2019-06-01 14:34:04', '2019-06-01 16:36:09', 3, NULL, NULL, NULL, NULL),
(6, 'Philip Ullrich I', 'kunde.maud@example.org', '$2y$10$PNNiLYHd0SkjppYOJLVNBOqkIt3t5Ek56rlK2I/ME7FvwHUZd4Alu', 'admin', 1, 1, 19292940, 7017550, 'female', 'b+', 'Bangladeshi', '634.537.5006 x55980', '100 Frami Crescent Apt. 225\nSouth Walterland, NC 58350', 'Sunt est dolorum autem quia cupiditate ut neque commodi. Molestias optio corrupti qui ut. Sint natus expedita dolores et accusamus illo.', 'https://lorempixel.com/640/480/?50402', 1, 5, 'UNVLM2438e', '2019-06-01 14:34:04', '2019-06-01 16:36:09', 1, NULL, NULL, NULL, NULL),
(7, 'Gregoria Bashirian', 'hfeeney@example.org', '$2y$10$1tiZg.nkxMY5fhvh6P6X2eAbgpJzAgPrEBnFiNIzBIZBtsNlz.iWC', 'admin', 1, 1, 19292940, 5663548, 'female', 'a+', 'Bangladeshi', '(852) 635-9852 x49469', '39857 Raynor Centers\nNew Lexiechester, NM 89628', 'Optio omnis sed rerum et. Est et voluptatibus dolorum. Quidem quisquam qui voluptatibus asperiores voluptatem.', 'https://lorempixel.com/640/480/?53685', 1, 9, '7GGCh79Yvu', '2019-06-01 14:34:04', '2019-06-01 16:36:09', 7, NULL, NULL, NULL, NULL),
(8, 'Merlin Simonis', 'ellen80@example.org', '$2y$10$mU52MiYbz3QbDxbgj05.EOOVhbD/oBr0adRtaAR0.ModnwRsXJKA6', 'admin', 1, 1, 19292940, 3919530, 'male', 'ab', 'Bangladeshi', '920.355.8801', '3230 Shields Track Apt. 058\nNorth Ashleeville, OR 96220', 'Ea omnis numquam sint. Non provident fugiat quia veniam dolorum. Magnam libero amet occaecati occaecati unde deleniti laudantium.', 'https://lorempixel.com/640/480/?19832', 1, 19, 'U6NB7cpmwJ', '2019-06-01 14:34:04', '2019-06-01 16:36:09', 7, NULL, NULL, NULL, NULL),
(9, 'Claud Medhurst Jr.', 'dave.johnson@example.net', '$2y$10$oxeCa1p03h5QQGnss8gtsuccbWqvQ/ldKKx7A6bt.Ng7CY8oMCiz.', 'admin', 1, 1, 19292940, 8629039, 'male', 'o+', 'Bangladeshi', '240.650.5097 x0354', '4208 Ebert Plaza\nMarleneburgh, OK 96628', 'Quo et recusandae itaque. Quisquam voluptas blanditiis quae incidunt neque quia consectetur. Officiis quia possimus sunt ratione dolore similique.', 'https://lorempixel.com/640/480/?26478', 1, 5, '6y28XbWvmx', '2019-06-01 14:34:04', '2019-06-01 16:36:09', 5, NULL, NULL, NULL, NULL),
(10, 'Anne Gibson', 'johnston.kristy@example.net', '$2y$10$5Z5BNLyP9oIhk.8EghB10uZgje6l4FZUHEcD6I.teDeN319yYGaui', 'admin', 1, 1, 19292940, 8861499, 'female', 'ab', 'Bangladeshi', '(884) 649-5490 x130', '396 Spencer Park Apt. 561\nKerlukeburgh, HI 06065-4686', 'Recusandae dolores eos laboriosam. Voluptates adipisci sint necessitatibus aliquid atque. Voluptatem non accusantium officiis velit totam modi nisi a.', 'https://lorempixel.com/640/480/?62745', 1, 19, 'XWg9v90KEA', '2019-06-01 14:34:04', '2019-06-01 16:36:10', 9, NULL, NULL, NULL, NULL),
(11, 'Alda Lubowitz Jr.', 'cole.damien@example.org', '$2y$10$77BIbKfnKgwRXDSWXnP6A.6MuWzhZiSuPQCI8hhEYvrIAtcP6Uj5G', 'admin', 1, 1, 19292940, 9881725, 'male', 'a+', 'Bangladeshi', '(729) 788-8858 x12545', '47229 Zelma Ramp\nWest Theresia, MO 87924', 'Dicta velit dolorem quis distinctio dolore. Molestiae odit expedita officiis sunt qui sequi. Amet nostrum nobis maiores molestias qui ratione.', 'https://lorempixel.com/640/480/?56257', 1, 15, '2zbsVAt6Vh', '2019-06-01 14:34:04', '2019-06-01 16:36:10', 10, NULL, NULL, NULL, NULL),
(12, 'Rodger McClure', 'frami.johnathan@example.com', '$2y$10$rHoYqlhu3c/N9pdVxI82q.0C.8ehVrDT5gVOgkfxMBid8MiURBq7e', 'accountant', 1, 1, 19292940, 1977219, 'female', 'o+', 'Bangladeshi', '479.276.4406 x8487', '29004 Wuckert Harbor Suite 637\nElzamouth, RI 30833', 'Magnam voluptas quia facilis. Consequatur ut est sint explicabo. Aut labore ea accusamus occaecati.', 'https://lorempixel.com/640/480/?63009', 1, 8, '3OS7YGYHSE', '2019-06-01 14:34:04', '2019-06-01 16:36:10', 6, NULL, NULL, NULL, NULL),
(13, 'Harmony Jerde Jr.', 'stark.sigrid@example.org', '$2y$10$D2ERKderJT5y9hvOEslQIuTQShw6yHuetZ0bY5J1qdfaylOeeH1X6', 'accountant', 1, 1, 19292940, 9393054, 'male', 'o+', 'Bangladeshi', '+1.487.992.1815', '8341 Lehner Path Apt. 951\nKoepptown, OK 86564', 'Ipsam aut dolore officiis nobis iusto. Est amet distinctio tempora nihil reprehenderit quo. Nostrum asperiores alias corrupti optio.', 'https://lorempixel.com/640/480/?23569', 1, 10, 'tDb9zMsUvN', '2019-06-01 14:34:04', '2019-06-01 16:36:10', 7, NULL, NULL, NULL, NULL),
(14, 'Milo Champlin', 'stamm.flavie@example.org', '$2y$10$meuWPtuRIzbme9/ZYXZGou0lOXFsIjGv.KZ8WWqbkG0O1VDsmr4lO', 'accountant', 1, 1, 19292940, 1910293, 'female', 'o+', 'Bangladeshi', '(818) 519-5922 x25724', '3935 Laverne Roads Apt. 011\nGunnerside, OR 80856', 'Ea esse omnis optio qui officiis. Corporis maiores doloremque ut ratione sunt temporibus. Quo eligendi sed aut harum ea.', 'https://lorempixel.com/640/480/?57141', 1, 11, 'BUqRLukF1T', '2019-06-01 14:34:04', '2019-06-01 16:36:10', 3, NULL, NULL, NULL, NULL),
(15, 'Erna Nicolas', 'kristopher56@example.com', '$2y$10$J7kbqwXb64p.cC210B0j8.eeJfW98D3gQZD0ov.X4xW.ylJZqA6Cm', 'accountant', 1, 1, 19292940, 1982600, 'male', 'o+', 'Bangladeshi', '443.643.1864', '511 Vito Freeway\nDouglasmouth, NH 71467', 'Itaque debitis placeat nostrum velit dicta repellendus. Quisquam quo sed laborum qui maxime. Rerum facilis sit voluptatem cum.', 'https://lorempixel.com/640/480/?26527', 1, 15, 'o9l4XBatt3', '2019-06-01 14:34:04', '2019-06-01 16:36:10', 5, NULL, NULL, NULL, NULL),
(16, 'Ms. Jayne Yundt Sr.', 'khyatt@example.com', '$2y$10$ouiFtWPdzQp5L87PwpSbGucvx23QKIZTjTJhHSO1JRNT0IAfnFtgy', 'accountant', 1, 1, 19292940, 6727892, 'male', 'a+', 'Bangladeshi', '1-783-392-7978 x91900', '27088 Brown Shoal Apt. 705\nLeuschkeside, UT 51755-0138', 'Quos illum modi vitae sit quae. Ipsam ut quo ut omnis. Dicta error vero tempora vel quia.', 'https://lorempixel.com/640/480/?64188', 1, 4, 'UoTKV91TSe', '2019-06-01 14:34:04', '2019-06-01 16:36:11', 6, NULL, NULL, NULL, NULL),
(17, 'Demetris Gaylord DVM', 'kunze.waylon@example.org', '$2y$10$PlV1mGQiuRb4fVXqhWdPq.qHSL/pICDyjOjSL.p3DlagbF/6KpeMS', 'accountant', 1, 1, 19292940, 6920254, 'female', 'ab', 'Bangladeshi', '1-708-980-2547 x710', '598 Johnson Plaza\nParisianshire, MS 82034', 'Reprehenderit voluptas autem pariatur totam. Voluptatem consequatur ut beatae unde quisquam quae. Tempore explicabo odio vero.', 'https://lorempixel.com/640/480/?33707', 1, 18, '7Oeg991ZTB', '2019-06-01 14:34:05', '2019-06-01 16:36:11', 10, NULL, NULL, NULL, NULL),
(18, 'Audie Terry', 'arno.hansen@example.net', '$2y$10$psfE7xiBTSIUUCl6RjTJm.e9TVBR8x80AypJf7tkCRt37I7y1BSEG', 'accountant', 1, 1, 19292940, 9563211, 'male', 'o+', 'Bangladeshi', '1-358-594-3950 x974', '510 Heller Centers Apt. 674\nNew Mafalda, MD 15835-5151', 'Dolor eligendi maiores ea nemo. Eum illum veniam quia dolor quidem qui. Distinctio necessitatibus quo ut est fugiat est veniam.', 'https://lorempixel.com/640/480/?47425', 1, 15, 'jOl2xev7ja', '2019-06-01 14:34:05', '2019-06-01 16:36:11', 1, NULL, NULL, NULL, NULL),
(19, 'Larue Jacobi DVM', 'beier.hollie@example.net', '$2y$10$b83CqKrUPz6pKlFPuzzLju01H9Dp5Noh2uAL6aUHfOfDfRAdeZE2K', 'accountant', 1, 1, 19292940, 837499, 'male', 'a+', 'Bangladeshi', '(541) 377-6877 x9761', '39488 Marvin Points\nWiegandstad, IL 80835', 'Illum quam non voluptatum sunt qui illo officia. Vel corrupti sapiente eveniet. Quia rerum error consectetur et et a.', 'https://lorempixel.com/640/480/?59771', 1, 16, 'QYi9AqhIeD', '2019-06-01 14:34:05', '2019-06-01 16:36:11', 6, NULL, NULL, NULL, NULL),
(20, 'Mozelle Borer', 'joshuah32@example.com', '$2y$10$gYW75QwuDohnLVnJ2pSCmOD4dKF3RJeyEfZu9pAjIzr.OX7D1kr6W', 'accountant', 1, 1, 19292940, 1848416, 'male', 'ab', 'Bangladeshi', '1-598-519-5574 x427', '8322 Hyatt Summit Apt. 738\nCassidyfurt, WA 82139', 'Est aut rerum amet id sed sapiente. Blanditiis officiis dolor porro possimus occaecati voluptatem aut. Aspernatur est repellendus ex adipisci.', 'https://lorempixel.com/640/480/?85329', 1, 14, 'nlEzzjntFH', '2019-06-01 14:34:05', '2019-06-01 16:36:11', 2, NULL, NULL, NULL, NULL),
(21, 'Percival Waelchi', 'brakus.aurore@example.com', '$2y$10$jrZwpguXR2vUwQWNroAAd.NmpVPB9.kf72jN05gPvA7idFUO9PYAW', 'accountant', 1, 1, 19292940, 7002895, 'male', 'ab', 'Bangladeshi', '+18255431973', '6681 Blanda Hill Suite 391\nWest Chanelle, DE 58278', 'Quam architecto tenetur maiores sequi sequi beatae. Unde omnis reprehenderit sed commodi. Sit magni voluptatem consequuntur qui fuga vel.', 'https://lorempixel.com/640/480/?52333', 1, 17, '7DL6Y1NhDE', '2019-06-01 14:34:05', '2019-06-01 16:36:11', 1, NULL, NULL, NULL, NULL),
(22, 'Emmy Stanton', 'creynolds@example.com', '$2y$10$pBY3XX6wCnj7d3f.V2yHhOQYdrxNOOEleUsqhLU3ScYMBSPHNwrZa', 'librarian', 1, 1, 19292940, 850343, 'female', 'ab', 'Bangladeshi', '+1-742-306-6299', '599 Wyman Coves\nTavaresbury, NV 64991-7179', 'Ullam doloribus magnam cupiditate ipsam iste voluptatem labore. Vel quos repellat beatae sequi sit repellat. Tenetur tenetur nostrum eum enim et.', 'https://lorempixel.com/640/480/?38064', 1, 11, 'MHm277wqvg', '2019-06-01 14:34:05', '2019-06-01 16:36:11', 4, NULL, NULL, NULL, NULL),
(23, 'Mr. Art Fritsch', 'ghegmann@example.org', '$2y$10$puQw/Dvf/MFu/gJH5dplouBArvSpVvD9Cntyhi2rbl1Ey61R7jyGe', 'librarian', 1, 1, 19292940, 7556668, 'female', 'b+', 'Bangladeshi', '893-366-2794', '8846 Schuppe Gateway\nEast Luluport, NH 67323', 'Est voluptatum rerum quia laborum aliquam provident. Omnis dolor tenetur assumenda ea sapiente eum impedit est. Sapiente minima ipsa pariatur incidunt non ex ipsum.', 'https://lorempixel.com/640/480/?21242', 1, 11, 'xWSHEIifTY', '2019-06-01 14:34:05', '2019-06-01 16:36:12', 5, NULL, NULL, NULL, NULL),
(24, 'Kaylee Hauck', 'hermann.orville@example.com', '$2y$10$TTaZnq/y2FHRu2ZFvVQZVORcfzbdYD3pC2vLY0/tC5Hn7Llv0ddL.', 'librarian', 1, 1, 19292940, 4615888, 'female', 'b+', 'Bangladeshi', '+14307303371', '31191 Hattie Meadows\nThomasland, NV 40892-9165', 'In sit exercitationem ipsam dolor fugiat error. Voluptatibus natus neque iste accusantium. Minus omnis officia voluptatem ut delectus omnis ut.', 'https://lorempixel.com/640/480/?83415', 1, 11, 'IyeS8u9GU6', '2019-06-01 14:34:05', '2019-06-01 16:36:12', 8, NULL, NULL, NULL, NULL),
(25, 'Mr. Kelvin Corwin', 'runolfsson.jadyn@example.org', '$2y$10$Jkjs9OmWHTs2FtIr8RxSMODjy4X8vAH7TrEYvj2nwmtd/.rj/g8Fm', 'librarian', 1, 1, 19292940, 2076996, 'female', 'b+', 'Bangladeshi', '+1 (749) 559-0892', '5185 Donald Summit\nBergnaumtown, CO 82778-3966', 'Sequi quia omnis architecto ipsam ut minus sit. Dolorem id praesentium quasi velit quo reprehenderit eaque. Fugit quis labore rerum praesentium et distinctio.', 'https://lorempixel.com/640/480/?28993', 1, 2, 'KXkrjuckxP', '2019-06-01 14:34:05', '2019-06-01 16:36:12', 5, NULL, NULL, NULL, NULL),
(26, 'Violet Hessel IV', 'kristy26@example.net', '$2y$10$6fyzXtrneCFi7FNG.oOwiONII7/wGXAdG9BI2ahEXf64c50jDNrZC', 'librarian', 1, 1, 19292940, 9457431, 'female', 'o+', 'Bangladeshi', '(435) 654-3264 x876', '60272 Maximo Causeway Suite 190\nLake Myah, NC 69329', 'Soluta temporibus assumenda eos qui. Aut et non voluptatem excepturi ipsa consequatur et. Eligendi cumque ea voluptatem aut qui.', 'https://lorempixel.com/640/480/?70077', 1, 14, 'Xx7kZ8ukgZ', '2019-06-01 14:34:05', '2019-06-01 16:36:12', 9, NULL, NULL, NULL, NULL),
(27, 'Dorian Nienow', 'terrance.hauck@example.net', '$2y$10$92OcHitUu./YRJLjLu4zC.ANVn7FggN7Hw0U2DarAlXkJdx26aVjm', 'librarian', 1, 1, 19292940, 7517829, 'female', 'a+', 'Bangladeshi', '(945) 467-0935', '3119 Cary Island Suite 995\nNew Brendan, NM 17401', 'Et maiores totam ut ut eaque. Facilis natus voluptatibus molestiae. Ullam et dolore dolorem voluptatibus velit itaque.', 'https://lorempixel.com/640/480/?31541', 1, 15, 'v8wZbOWGWF', '2019-06-01 14:34:05', '2019-06-01 16:36:12', 2, NULL, NULL, NULL, NULL),
(28, 'Mr. Gillian Cartwright', 'schaefer.reinhold@example.com', '$2y$10$WCbPeuptN.kPAlfCyVasbuYYKEBBuExPvuoAN3DwQ8buhepQrZvsS', 'librarian', 1, 1, 19292940, 4692659, 'male', 'a+', 'Bangladeshi', '(385) 742-4157 x8761', '31175 Reilly Rest Apt. 640\nAraceliport, GA 91830', 'Cupiditate officia blanditiis omnis. Expedita et enim reiciendis. Sunt sapiente et cumque esse.', 'https://lorempixel.com/640/480/?42804', 1, 11, 'U1W1Ndvohb', '2019-06-01 14:34:05', '2019-06-01 16:36:12', 2, NULL, NULL, NULL, NULL),
(29, 'Mr. Patrick Stracke', 'kasey55@example.org', '$2y$10$F4lSfpyslSxeusjY3oxvc.Ro/NhSHxZYpOGn6DpzuA/ufjmCwBXyK', 'librarian', 1, 1, 19292940, 8924112, 'male', 'o+', 'Bangladeshi', '1-681-812-0313 x459', '9926 Rolfson River Suite 715\nEast Adriel, IL 29961', 'In rerum eos dignissimos at molestias eveniet. Et iusto nesciunt saepe. Molestias dolores omnis vel vel quae omnis harum.', 'https://lorempixel.com/640/480/?25441', 1, 8, '7ajL3SwuBD', '2019-06-01 14:34:05', '2019-06-01 16:36:12', 9, NULL, NULL, NULL, NULL),
(30, 'Prof. Angie Heathcote V', 'kfriesen@example.net', '$2y$10$/QZm2.QdRkLznhLSeR4eMuo4iNqL729NY4RuSJt9K1dyJ.t1dK6j2', 'librarian', 1, 1, 19292940, 3152966, 'female', 'ab', 'Bangladeshi', '(428) 825-8827 x77592', '17967 Crooks Plains Apt. 607\nLake Dwightview, NH 45331', 'Aut esse blanditiis maiores eius ut ut reiciendis est. Aut maiores voluptatem doloremque atque est a. Pariatur minima suscipit sed quia expedita enim.', 'https://lorempixel.com/640/480/?83888', 1, 9, 'ziHueJjZLJ', '2019-06-01 14:34:05', '2019-06-01 16:36:12', 4, NULL, NULL, NULL, NULL),
(31, 'Carlo Lueilwitz', 'ooconnell@example.net', '$2y$10$LHJoTPDZ4cOpMAEem43Ed.0W5c.E.L8fJWr7hX/Fq44ydUzE7Fdhq', 'librarian', 1, 1, 19292940, 9171367, 'female', 'b+', 'Bangladeshi', '634.671.3772 x522', '8342 Lincoln Glens Apt. 492\nSibylfort, KS 63030', 'Mollitia animi fugiat illo quidem. Asperiores repellat illum vel. Ut dolorem nihil consequuntur et rerum.', 'https://lorempixel.com/640/480/?60158', 1, 11, 'mZ2btO0K7v', '2019-06-01 14:34:05', '2019-06-01 16:36:13', 1, NULL, NULL, NULL, NULL),
(32, 'Chadrick Streich IV', 'crist.brandyn@example.com', '$2y$10$qllwQ6LdSwPoT5lG6AkSduolNf2gIGmdP7tkAix3xmwWJb2FswOnG', 'teacher', 1, 1, 19292940, 4729583, 'female', 'b+', 'Bangladeshi', '(745) 833-2202', '78452 Kirk Villages Suite 829\nLake Hulda, ME 01741-3077', 'Quasi fuga unde voluptatum ipsam tempore. Quis ipsa iusto sunt mollitia assumenda expedita a fuga. Quos optio sint cupiditate eaque.', 'https://lorempixel.com/640/480/?18620', 1, 7, 'XvXG3a5SXm', '2019-06-01 14:34:06', '2019-06-01 16:36:13', 3, NULL, NULL, NULL, NULL),
(33, 'Rosalind Walter', 'muller.orrin@example.org', '$2y$10$pMX6QYBLjEeakN03HVGG4OLFcKtDil6SMeN9kcY.pgwQCeDF0n8ky', 'teacher', 1, 1, 19292940, 3664574, 'male', 'ab', 'Bangladeshi', '1-695-614-9112 x7150', '8056 Borer Turnpike\nElissabury, NY 27705', 'Eos expedita temporibus aut quae necessitatibus consequatur. Quam laudantium adipisci aspernatur veritatis doloremque amet veniam. Nam ullam eos quo praesentium libero aspernatur laudantium.', 'https://lorempixel.com/640/480/?78592', 1, 12, 'Z6RZs4nLLc', '2019-06-01 14:34:06', '2019-06-01 16:36:13', 1, NULL, NULL, NULL, NULL),
(34, 'Myriam Feil IV', 'hansen.leo@example.net', '$2y$10$1m0sdP5OBfjXa5XLfZ0cX.1Tlr71PT2bKuAzdBZSuwzZ1UqfljpS6', 'teacher', 1, 1, 19292940, 7764746, 'male', 'a+', 'Bangladeshi', '+17488963177', '2391 Wisozk Ford Apt. 245\nEast Freddie, AL 47889-9075', 'Eligendi qui quia voluptatibus voluptatibus modi nesciunt ratione. Est aut non et iure vero. Odit autem ab eius consectetur sit.', 'https://lorempixel.com/640/480/?61552', 1, 16, 'ZY1r93paNK', '2019-06-01 14:34:06', '2019-06-01 16:36:13', 8, NULL, NULL, NULL, NULL),
(35, 'Mr. Blair Nikolaus', 'okon.desmond@example.com', '$2y$10$3.rQjyn9EFDxuV6YzZO23Obl7EQZcNLHepZOmEmMGvJBTsr6BjhSq', 'teacher', 1, 1, 19292940, 5233799, 'male', 'b+', 'Bangladeshi', '352.915.9010 x172', '4590 Cormier Stream\nNorth Ruth, TX 78499', 'Blanditiis impedit deleniti maiores delectus. Sunt est iste quia earum. Et reiciendis nulla dolorem numquam neque voluptatibus.', 'https://lorempixel.com/640/480/?14850', 1, 7, '9LyJ2VHq7a', '2019-06-01 14:34:06', '2019-06-01 16:36:13', 7, NULL, NULL, NULL, NULL),
(36, 'Dr. Jamar Labadie', 'jayce.stamm@example.com', '$2y$10$J5iIiug.wmVMw0vZr20Xf.gwI5C5q9UrbNkXrjGdl5DnA4fQ6QpCW', 'teacher', 1, 1, 19292940, 4899553, 'male', 'b+', 'Bangladeshi', '247.344.3242 x4892', '8411 Viola Camp Apt. 865\nNew Jasenborough, OK 14607-5015', 'Laborum repudiandae neque voluptas at velit repellat velit. Possimus asperiores et tempore. Consequatur blanditiis sapiente ea vitae ullam eos.', 'https://lorempixel.com/640/480/?48303', 1, 3, 'N3DbFRhRD7', '2019-06-01 14:34:06', '2019-06-01 16:36:13', 10, NULL, NULL, NULL, NULL),
(37, 'Marvin Morar', 'maryam12@example.com', '$2y$10$HYfjucAfGjrEhi4ufeCXuO9BpKN6dtPNgfum/mtUcWvJtJWJjCQ9m', 'teacher', 1, 1, 19292940, 458178, 'male', 'b+', 'Bangladeshi', '350.698.0248', '23998 Carson Canyon Apt. 511\nGleasonfurt, CA 33863', 'Sunt et et sunt architecto aperiam et laborum. Natus quia quam ipsa quia in qui. Nemo sit modi eum in sint porro est.', 'https://lorempixel.com/640/480/?39626', 1, 14, 'Zx9Bho4Kj3', '2019-06-01 14:34:06', '2019-06-01 16:36:13', 1, NULL, NULL, NULL, NULL),
(38, 'Ms. Libby Williamson', 'murphy82@example.net', '$2y$10$fXR3yX4ATUs9Re4N.p7dm.3adx38ftpSwCUu51O..kjqyDUZGW/SS', 'teacher', 1, 1, 19292940, 2038943, 'female', 'a+', 'Bangladeshi', '+16784380392', '5236 Herman Land Apt. 007\nCorkeryland, AZ 49309-7534', 'Odio ab nihil est non necessitatibus. Cupiditate maiores natus dolorum ut laudantium. Aut adipisci dolorem nihil.', 'https://lorempixel.com/640/480/?40901', 1, 11, '6b6j0X9BsB', '2019-06-01 14:34:06', '2019-06-01 16:36:13', 8, NULL, NULL, NULL, NULL),
(39, 'Johan Leuschke', 'irma98@example.net', '$2y$10$KNJBuwK4AYaxX5m4Y5mYAO9MEm4era1IWmzeOTOKAuaJ2.6plEun2', 'teacher', 1, 1, 19292940, 5941533, 'female', 'o+', 'Bangladeshi', '906.302.2796', '67122 Abdullah Manors Suite 165\nNew Jameson, NV 88048-0946', 'Perferendis aspernatur possimus qui vero qui reiciendis ipsum. Aut reprehenderit provident voluptas vero autem. Quas nulla ducimus qui dicta.', 'https://lorempixel.com/640/480/?86295', 1, 13, 'pt3Vf4b0vJ', '2019-06-01 14:34:06', '2019-06-01 16:36:14', 1, NULL, NULL, NULL, NULL),
(40, 'Giovanni Welch PhD', 'darius04@example.org', '$2y$10$8rQW31qxuHy9JC5EVaIfNOL.G7k.JhH7JWiRDHgjaGHmBPhi98Lxe', 'teacher', 1, 1, 19292940, 2552873, 'female', 'o+', 'Bangladeshi', '609-279-9821 x233', '842 Rollin Centers\nVadaberg, WA 42816', 'Sed qui vitae eos similique unde. Tenetur facere possimus et. Sed et odit voluptatem dolores sed repellat maxime.', 'https://lorempixel.com/640/480/?57827', 1, 18, 'Wgn8GM1klq', '2019-06-01 14:34:07', '2019-06-01 16:36:14', 3, NULL, NULL, NULL, NULL),
(41, 'Bethel Wisozk', 'rbalistreri@example.org', '$2y$10$70LL09ml5/md59bXX.AbCeBQBpZ4dQp6GA3chyLxEw0MXDG/dsTsy', 'teacher', 1, 1, 19292940, 4957666, 'male', 'ab', 'Bangladeshi', '1-232-972-0476', '988 Brakus Shoals Suite 047\nWymanside, GA 30753', 'Quam corporis corporis et ipsam suscipit ab. Molestiae possimus accusantium distinctio illo quis ut eum quod. Dolore vel molestiae velit et officia in.', 'https://lorempixel.com/640/480/?43738', 1, 5, 'niWfjKR4fS', '2019-06-01 14:34:07', '2019-06-01 16:36:14', 1, NULL, NULL, NULL, NULL),
(42, 'Dr. Maudie Stoltenberg DVM', 'dewayne24@example.com', '$2y$10$31qOtrNwVkz.rnUOoiz.Oeuo2SLbxCaR7bcGYsUUyT/hHppI/WatW', 'teacher', 1, 1, 19292940, 8158173, 'male', 'b+', 'Bangladeshi', '221.540.6272 x3765', '663 Royal Alley\nHandburgh, GA 26685-6013', 'Expedita omnis eligendi nihil voluptatem sit numquam hic. Illo veritatis delectus vel deleniti. Consequatur eum deleniti a aspernatur debitis magnam.', 'https://lorempixel.com/640/480/?40599', 1, 13, 'DVE2YNZsEn', '2019-06-01 14:34:07', '2019-06-01 16:36:14', 3, NULL, NULL, NULL, NULL),
(43, 'Eudora Runolfsdottir', 'heloise.welch@example.net', '$2y$10$RrO2jGuriDgYI4Hnv9HcXuw43/bUF/M9D1QLR.32j05HiPaYaktyq', 'teacher', 1, 1, 19292940, 3895205, 'male', 'o+', 'Bangladeshi', '1-597-637-5055 x911', '2270 Bins Street\nNew Billton, WA 77982', 'Dicta odit aliquam sit aut omnis. Libero eos nostrum mollitia vero. Numquam quo nobis id vitae nesciunt.', 'https://lorempixel.com/640/480/?42713', 1, 18, 'jkUQ6MwaSr', '2019-06-01 14:34:07', '2019-06-01 16:36:14', 10, NULL, NULL, NULL, NULL),
(44, 'Mallie Stanton', 'zita.marquardt@example.com', '$2y$10$sIqMCnUR7MVbpotBw.aKueIg8CP.zzkwkGcaoWqDuFG5N6Hn9elRu', 'teacher', 1, 1, 19292940, 3857417, 'male', 'a+', 'Bangladeshi', '1-356-384-2535 x8504', '46821 Champlin View Apt. 660\nKuvalisland, MT 32877', 'Minus ratione odit et enim nulla id. Sequi voluptates quaerat culpa architecto doloremque iste ut. Aut doloremque facere odio eum totam ut.', 'https://lorempixel.com/640/480/?61090', 1, 12, 'x3jwW7i4CW', '2019-06-01 14:34:07', '2019-06-01 16:36:14', 2, NULL, NULL, NULL, NULL),
(45, 'Florian Harber', 'crist.maxie@example.com', '$2y$10$k61y58I8RuHjfBwvMwvQwe6GZg8zwa3Pk2AkFBpoHtPxhySr4GKBa', 'teacher', 1, 1, 19292940, 8521122, 'male', 'a+', 'Bangladeshi', '949-864-9291', '63666 Kulas Gateway\nNorth Jeffreyburgh, HI 52314-6470', 'Laboriosam excepturi aliquam dolorem et quaerat. Sit et earum reiciendis illo qui inventore doloribus. Non qui quis voluptatibus totam.', 'https://lorempixel.com/640/480/?39158', 1, 16, '6Ar0gm3X8z', '2019-06-01 14:34:07', '2019-06-01 16:36:14', 9, NULL, NULL, NULL, NULL),
(46, 'Freddie Nienow', 'lmccullough@example.net', '$2y$10$xVjRpUjfwoLG/K7pD2g1BuTE.Ojy0UVqe03I9avQ3anMdygPZfqbu', 'teacher', 1, 1, 19292940, 1956239, 'female', 'a+', 'Bangladeshi', '+1-532-261-4477', '141 Joana Tunnel Apt. 612\nNorth Brad, WA 27223', 'Minus fuga rem nisi et et quam quo dolore. Possimus animi incidunt molestiae voluptates. Perferendis repellendus aperiam consectetur debitis voluptatum animi quia.', 'https://lorempixel.com/640/480/?62482', 1, 1, 'u3YzYjXVSt', '2019-06-01 14:34:07', '2019-06-01 16:36:15', 7, NULL, NULL, NULL, NULL),
(47, 'Marilie Heidenreich', 'nziemann@example.org', '$2y$10$rDeEFbvS86Tz0OoLKK/6a.jQtDxnf8iAer4cLb1u6baTrkvuJ9iNG', 'teacher', 1, 1, 19292940, 5341925, 'male', 'b+', 'Bangladeshi', '1-801-767-8935', '6011 Aubrey Court Apt. 413\nDavinshire, WY 87334', 'Eum molestiae aut nam quis nihil. Libero voluptas et adipisci sapiente dolorum inventore. Ut eos vitae veritatis nulla.', 'https://lorempixel.com/640/480/?46476', 1, 16, 'BuwdT497yM', '2019-06-01 14:34:07', '2019-06-01 16:36:15', 3, NULL, NULL, NULL, NULL),
(48, 'Fabian Gottlieb', 'jaskolski.annamarie@example.net', '$2y$10$.yMffmYublPCtvEa7KhyHuFPl2AU37MgnnmcDZW4HX0s5XzP1pB5y', 'teacher', 1, 1, 19292940, 118407, 'male', 'b+', 'Bangladeshi', '+1 (938) 573-7742', '695 Lavada Crest\nPort Freddy, AR 40184-5329', 'Dolor eum dolor qui voluptatem. Non exercitationem modi pariatur autem id adipisci ullam. Accusantium enim ullam ut esse quasi optio deserunt velit.', 'https://lorempixel.com/640/480/?15425', 1, 10, 'a0UNWDX2hQ', '2019-06-01 14:34:07', '2019-06-01 16:36:15', 4, NULL, NULL, NULL, NULL),
(49, 'Kaci Gusikowski', 'preston17@example.org', '$2y$10$phZ/OnKPTQz9jwSItmZcSeMFVHnASgRQF6hoP.P6kykTrAw2378Cu', 'teacher', 1, 1, 19292940, 1032279, 'female', 'ab', 'Bangladeshi', '540-552-3499 x045', '980 Lavada Vista\nLake Wade, AK 69544', 'Vero ex quae voluptate. Facere maiores perferendis qui quo. Ut et eaque velit alias qui.', 'https://lorempixel.com/640/480/?85784', 1, 8, 'PFEytkcJB9', '2019-06-01 14:34:07', '2019-06-01 16:36:15', 5, NULL, NULL, NULL, NULL),
(50, 'Justen McDermott', 'buckridge.elena@example.net', '$2y$10$641lF7GZOhe4OBaREZPE9.q5AqZ4WrSfy9mtLHwFkyyhGHrmvrJYC', 'teacher', 1, 1, 19292940, 5618055, 'female', 'a+', 'Bangladeshi', '543.647.4022', '1702 Maud Course\nHeathcotefort, CA 69863-2705', 'Velit tenetur aspernatur porro sed dicta nulla. Nostrum in numquam illo porro nihil. Et unde sint a quia.', 'https://lorempixel.com/640/480/?62268', 1, 18, 'MuJSlY8u3L', '2019-06-01 14:34:07', '2019-06-01 16:36:15', 7, NULL, NULL, NULL, NULL),
(51, 'Logan Halvorson', 'htreutel@example.org', '$2y$10$6KpLRXGhko5c5xIwpVcn/OFK6yrK6MajeqHpuRwHl8H2ZYWryAOD2', 'teacher', 1, 1, 19292940, 9429648, 'female', 'ab', 'Bangladeshi', '+16566913549', '14131 Botsford Parks\nBartellside, MO 85489', 'Tempore numquam asperiores accusamus ut qui laudantium aut laudantium. Qui aut temporibus explicabo magni magnam dolore. Consequuntur quaerat minima ducimus.', 'https://lorempixel.com/640/480/?58518', 1, 8, 'V4jZUCmj2w', '2019-06-01 14:34:07', '2019-06-01 16:36:15', 8, NULL, NULL, NULL, NULL),
(52, 'Zoe Williamson V', 'skovacek@example.net', '$2y$10$KZ.NLaA6t5SSa9M1Mu5cNuA9pCwDcDqiE/ORKxHos1JGkK2iLxXqO', 'teacher', 1, 1, 19292940, 7963971, 'female', 'b+', 'Bangladeshi', '736-881-4425', '389 Candice Harbors Suite 793\nAndreannechester, CO 28882', 'Sequi nulla et et corporis quo eveniet. Corporis eligendi in odio ipsa neque nulla. Omnis nesciunt voluptas eligendi a illum.', 'https://lorempixel.com/640/480/?11465', 1, 3, 'tuMZXQAPxu', '2019-06-01 14:34:07', '2019-06-01 16:36:16', 9, NULL, NULL, NULL, NULL),
(53, 'Miss Destinee Beatty Jr.', 'christopher.armstrong@example.net', '$2y$10$KiOLiRcCw.dkVxEjatUTTOBoJ77d/ZjmMcHFttbOry7M/UUfXutQy', 'teacher', 1, 1, 19292940, 7305210, 'male', 'o+', 'Bangladeshi', '954.909.6490', '9861 Ondricka Wall\nKovacekmouth, WV 33388', 'Et quo officiis et. Quae odit consectetur eius facilis soluta reiciendis nobis. Aliquam occaecati odit molestias quasi dolorem et.', 'https://lorempixel.com/640/480/?91938', 1, 4, 'W9eecsQ483', '2019-06-01 14:34:07', '2019-06-01 16:36:16', 8, NULL, NULL, NULL, NULL),
(54, 'Mossie Bechtelar', 'senger.valentine@example.com', '$2y$10$uWnJFSaGT9eZACmNsu/iYOCPIogE5cUb7XKRDRz6.pL8sHxPwdQSS', 'teacher', 1, 1, 19292940, 1223352, 'male', 'a+', 'Bangladeshi', '1-303-740-7301 x15222', '353 Labadie Branch Apt. 181\nBreannemouth, IN 23569', 'Id dignissimos pariatur fugiat deleniti impedit eveniet omnis. Soluta quis at aliquid praesentium. Cupiditate ut optio delectus dignissimos.', 'https://lorempixel.com/640/480/?26037', 1, 7, 'ENb4FPcR9p', '2019-06-01 14:34:07', '2019-06-01 16:36:16', 9, NULL, NULL, NULL, NULL),
(55, 'Shayna Ratke', 'ihoppe@example.com', '$2y$10$NyqdosTb039YpHGRBpa/reZEj0N5erIyWSLWtQ2Q03EMh/4J5VhV6', 'teacher', 1, 1, 19292940, 387113, 'male', 'b+', 'Bangladeshi', '+1-831-810-3415', '4247 Spinka Drive\nZiemannfort, DC 62683', 'Velit ut iusto eligendi eligendi. Officiis necessitatibus tenetur quia. Non aperiam quia qui sed totam doloremque deserunt.', 'https://lorempixel.com/640/480/?59524', 1, 6, 'IsyBxG5AYZ', '2019-06-01 14:34:07', '2019-06-01 16:36:16', 9, NULL, NULL, NULL, NULL),
(56, 'Eloy Conn', 'garry.kunde@example.com', '$2y$10$klBUJjeZEit4iOiapxHMcu1gr59.b1iw/6R4MSb.mEC3PTGn/oVSm', 'teacher', 1, 1, 19292940, 8800879, 'male', 'ab', 'Bangladeshi', '+1 (620) 376-4854', '6711 Alicia Locks\nRosaliafurt, NM 16768-0041', 'Quaerat vero iusto voluptas ut omnis enim ea sint. Nam porro omnis sit excepturi eligendi dolor molestiae. Iure enim modi in saepe qui omnis.', 'https://lorempixel.com/640/480/?49836', 1, 11, '86VBjzK8dg', '2019-06-01 14:34:07', '2019-06-01 16:36:16', 7, NULL, NULL, NULL, NULL),
(57, 'Stephania Ernser', 'showell@example.org', '$2y$10$EBW539BWwgXZQg.tuW5Ilef1p0dspA4dSytg/5PTQlasBQZ2Hn.QG', 'teacher', 1, 1, 19292940, 9611887, 'female', 'b+', 'Bangladeshi', '(578) 340-9151 x47786', '118 Steuber Fall\nNorth Ana, ID 11391-7264', 'Ullam eos a adipisci aliquam modi sint perspiciatis rerum. Odio quia saepe perferendis expedita error sunt suscipit. Sit ipsam optio adipisci facilis officiis quo.', 'https://lorempixel.com/640/480/?14277', 1, 13, 'mW3q0ezp7w', '2019-06-01 14:34:07', '2019-06-01 16:36:16', 3, NULL, NULL, NULL, NULL),
(58, 'Dr. Cali Prohaska V', 'vena.kuphal@example.com', '$2y$10$4B4THwI2vAtxK63MvWUz7O31XT0zeS8MZOV9F/Lq1zor/r5x1DDyS', 'teacher', 1, 1, 19292940, 7604155, 'female', 'o+', 'Bangladeshi', '772.689.4856', '86812 Schinner Square Suite 225\nMaggioborough, NY 94790', 'Et quo unde et ab velit ducimus. Dicta numquam quod perspiciatis nesciunt provident. Maxime odio ipsum qui et.', 'https://lorempixel.com/640/480/?91570', 1, 15, 'VGp8FIu8wL', '2019-06-01 14:34:08', '2019-06-01 16:36:16', 9, NULL, NULL, NULL, NULL),
(59, 'Eda Witting', 'jamil.daugherty@example.net', '$2y$10$zEN1bkgkLFUnRKu2wzjs8ORgMIxtpe3xP6Xeo9X5by9jGjweH1QFK', 'teacher', 1, 1, 19292940, 5318493, 'male', 'a+', 'Bangladeshi', '989-912-2402 x07936', '921 Cassidy Station Apt. 163\nBennyshire, MO 73061', 'Nesciunt nisi voluptates quis similique. Unde nihil dolore eligendi fuga ut quia quod. Molestiae placeat animi odit.', 'https://lorempixel.com/640/480/?56366', 1, 7, 'OclENcCGp9', '2019-06-01 14:34:08', '2019-06-01 16:36:16', 6, NULL, NULL, NULL, NULL),
(60, 'Florine Kertzmann Jr.', 'hill.libby@example.net', '$2y$10$lRdrWVfDzsP6QYZ/ZXhDjObNkfKb5s5HpdnMRH36qYoKQ7WzOwOBu', 'teacher', 1, 1, 19292940, 9241532, 'male', 'b+', 'Bangladeshi', '+1 (941) 398-7747', '9561 Agustina Junctions\nLavernland, ME 77249-1753', 'Velit dolor dolorum reiciendis iusto nostrum blanditiis quos. Non temporibus doloremque consequuntur officiis voluptatum vitae est ratione. Non sit ea et qui deleniti tempore.', 'https://lorempixel.com/640/480/?39111', 1, 6, 'wRHMIsNlXx', '2019-06-01 14:34:08', '2019-06-01 16:36:17', 1, NULL, NULL, NULL, NULL),
(61, 'Ms. Maymie Harris IV', 'ctoy@example.net', '$2y$10$UiGFGrXaKzTGI.nxAgi9RuQxeweggXWAqMpQdsxP.kLNUx9JZuAjW', 'teacher', 1, 1, 19292940, 6228948, 'female', 'o+', 'Bangladeshi', '630.891.8814 x973', '2527 Windler Radial\nGrantchester, CA 03156', 'Omnis perferendis cupiditate molestiae. Et facere id sed dolor laudantium quia. Hic asperiores labore cum est omnis nisi voluptatem.', 'https://lorempixel.com/640/480/?47150', 1, 20, 'Ulumyqj5FO', '2019-06-01 14:34:08', '2019-06-01 16:36:17', 6, NULL, NULL, NULL, NULL),
(62, 'Dr. Felicity Cronin', 'btowne@example.com', '$2y$10$3MORYmOlLqAcYytQF43VMuP9dsWPkyHx0mZeo36wkQk6GRtmMj0Ii', 'student', 1, 1, 19292940, 6563208, 'male', 'b+', 'Bangladeshi', '1-585-347-1636 x3884', '637 Witting Stravenue\nNorth Mosesport, MT 32711-7559', 'Quibusdam ipsum est placeat optio debitis. Illo doloribus similique numquam voluptas fuga harum quae. Molestiae et sit aliquam delectus eius asperiores praesentium.', 'https://lorempixel.com/640/480/?17719', 1, 7, 'Pts08tBUCK', '2019-06-01 14:34:08', '2019-06-01 16:36:17', 3, NULL, NULL, NULL, NULL),
(63, 'Prof. Bradly Stamm Sr.', 'bogisich.douglas@example.com', '$2y$10$3iGug9IyjfWNB0zgUiL07OILwUzNEMDbk4K2ZXPoka3I/PRSHZCO6', 'student', 1, 1, 19292940, 545062, 'male', 'a+', 'Bangladeshi', '+1.952.908.5479', '4587 Heller Spurs\nNew Conorhaven, MO 79573', 'Similique voluptatem excepturi eum minima ullam. Exercitationem quod hic molestias maxime. Esse et aut commodi quo impedit nobis.', 'https://lorempixel.com/640/480/?95456', 1, 3, 'LJtzOcQlWz', '2019-06-01 14:34:09', '2019-06-01 16:36:17', 2, NULL, NULL, NULL, NULL),
(64, 'Prof. Tad Bradtke', 'richmond.rippin@example.com', '$2y$10$Hx/xPoJecgSvZnuUCefP3eaCgQOFoEXRC2vB20Wrs9.4THOhuumLG', 'student', 1, 1, 19292940, 7546560, 'male', 'b+', 'Bangladeshi', '1-719-477-8022 x84710', '296 Beverly Pass\nNorth Jaren, IN 94040', 'Necessitatibus numquam similique dicta praesentium aliquid aut iusto. Fugiat exercitationem earum et officiis et sit perspiciatis. Nisi consequuntur hic similique possimus.', 'https://lorempixel.com/640/480/?30037', 1, 7, 'IIoO0h6AwA', '2019-06-01 14:34:09', '2019-06-01 16:36:17', 6, NULL, NULL, NULL, NULL),
(65, 'Keira Rolfson', 'natasha.gerlach@example.com', '$2y$10$K3qponV8noBr5vvOoJI6Ru.K1/hXDyaaHAmWMj1nUZiewm4BUL8lu', 'student', 1, 1, 19292940, 7207170, 'female', 'ab', 'Bangladeshi', '+1-879-556-6102', '85812 Osinski Shore\nNorth Nakiabury, WA 22655-9768', 'Veritatis et quia quas autem itaque aut. Repellendus atque facere in in eligendi cupiditate. Voluptate repudiandae itaque quibusdam debitis et illum.', 'https://lorempixel.com/640/480/?42520', 1, 13, 'TZS4tqChUL', '2019-06-01 14:34:09', '2019-06-01 16:36:17', 6, NULL, NULL, NULL, NULL),
(66, 'Carolyn Wisoky', 'fisher.georgette@example.com', '$2y$10$ORKibkoO57i2NfxIdUL85OfOuuHQNpAjTU.Mq/ExQD0wkikyWMPpi', 'student', 1, 1, 19292940, 9014917, 'male', 'ab', 'Bangladeshi', '(725) 765-3846', '361 Bergstrom Key\nJerelfurt, NV 21693-6798', 'Natus esse reprehenderit velit non commodi reiciendis est. Dicta magni magni ut quasi tempora. Voluptatum ab et iusto amet.', 'https://lorempixel.com/640/480/?87398', 1, 16, 'ZyrcUT5gFI', '2019-06-01 14:34:09', '2019-06-01 16:36:17', 4, NULL, NULL, NULL, NULL),
(67, 'Deanna Larson', 'stroman.yoshiko@example.org', '$2y$10$mfR8hEy81cac0/Z9DfWvR.wYDdsbP5Gi4Kju34avIP1o7iGPH9BWu', 'student', 1, 1, 19292940, 658598, 'female', 'o+', 'Bangladeshi', '+13302361454', '56192 Johns Divide\nWardberg, NM 74133-2990', 'Fuga voluptas nihil eveniet laboriosam numquam unde cumque. Enim quos doloribus numquam. Autem aut sit expedita.', 'https://lorempixel.com/640/480/?44448', 1, 14, '3lssCUaWEf', '2019-06-01 14:34:09', '2019-06-01 16:36:18', 4, NULL, NULL, NULL, NULL),
(68, 'Salma Kassulke', 'predovic.sam@example.org', '$2y$10$dC5rwhyz/aM8p1sd5iKgR.1stf8eeYV4J3m85ePZSWEiQ1phcWgw6', 'student', 1, 1, 19292940, 338810, 'female', 'b+', 'Bangladeshi', '+1 (220) 473-8798', '545 Wunsch Viaduct Suite 469\nEllsworthtown, MD 33631-7224', 'Et temporibus ut aut. Voluptatem laudantium saepe qui voluptates voluptatibus. Corrupti laborum quasi illo non exercitationem.', 'https://lorempixel.com/640/480/?29506', 1, 1, 'tEB4wTXF8x', '2019-06-01 14:34:09', '2019-06-01 16:36:18', 3, NULL, NULL, NULL, NULL),
(69, 'Dr. Grace Hessel IV', 'schulist.eladio@example.net', '$2y$10$kEJaggvvk7.FHzVC1jxb2udvyX/TEkhQ7YQsYZhGX7VjzTY3jVukC', 'student', 1, 1, 19292940, 985940, 'female', 'o+', 'Bangladeshi', '1-206-240-7924 x6252', '8722 Khalid Islands\nMonroeberg, OR 25737-9443', 'Magni quos eum qui ratione repellendus hic et nihil. Sit et aliquam laborum officia iusto. Saepe veniam dignissimos perspiciatis sunt aperiam eveniet sint.', 'https://lorempixel.com/640/480/?11198', 1, 9, '0spxMFM7LD', '2019-06-01 14:34:09', '2019-06-01 16:36:18', 5, NULL, NULL, NULL, NULL),
(70, 'Dr. Itzel Kuvalis', 'vita.swift@example.net', '$2y$10$EtTmkcczYLVokCkbn36.SuoLTo1yz7q9kNLsb4lPrFCJHdPIEMdHy', 'student', 1, 1, 19292940, 854986, 'female', 'b+', 'Bangladeshi', '+1.424.721.6963', '3326 Adrain Haven\nNew Lavinaville, AZ 65860-4653', 'Maiores aut natus quia adipisci. Non velit doloremque ipsa minus inventore. Dolores dolorem totam vitae minima ea et.', 'https://lorempixel.com/640/480/?73814', 1, 3, 'iTF1uxpw9o', '2019-06-01 14:34:09', '2019-06-01 16:36:18', 1, NULL, NULL, NULL, NULL),
(71, 'Ethan Olson', 'lboyle@example.com', '$2y$10$GCbWqxaJC73x.hgQeEbQ3eWgjLyG0B404Eg1c8kXsZPGHH70AI7Oe', 'student', 1, 1, 19292940, 2203151, 'female', 'ab', 'Bangladeshi', '1-227-268-1463', '567 Trudie Ramp Apt. 653\nGrimesville, VT 23837-1689', 'Asperiores voluptatem rerum repellendus asperiores quis est quibusdam. Non vitae consequatur ex vero. Ipsa soluta ab cumque non qui quia cumque.', 'https://lorempixel.com/640/480/?87436', 1, 16, 'nFcvhwFk06', '2019-06-01 14:34:09', '2019-06-01 16:36:18', 2, NULL, NULL, NULL, NULL),
(72, 'Miss Shany Sauer', 'erempel@example.com', '$2y$10$EuH.JIFMkiHLfvt3e2.QTuLLm6zCfuHbqKKn7yMYBpD9etR6buCJi', 'student', 1, 1, 19292940, 2508425, 'female', 'ab', 'Bangladeshi', '784.810.7417', '919 Heller Haven\nErdmanmouth, NV 84986', 'Iste repudiandae aut sint. Fuga et aut quia sapiente omnis. Molestiae harum ipsam dolorem perferendis eos deleniti voluptate.', 'https://lorempixel.com/640/480/?45109', 1, 17, 'a9QMaAYmrS', '2019-06-01 14:34:09', '2019-06-01 16:36:18', 7, NULL, NULL, NULL, NULL),
(73, 'Prof. Clinton Corkery', 'yrobel@example.org', '$2y$10$Dy.ndwCPCQ1khNvAPMqiCugqvNyC.088xlT3a4HVHXcKYMUTh7.0i', 'student', 1, 1, 19292940, 6425167, 'male', 'a+', 'Bangladeshi', '1-486-782-7047 x636', '348 Haley Shoals\nMarvinport, AZ 71581-5643', 'Ea architecto est autem optio debitis. Ducimus odio unde error dicta. Iusto impedit assumenda et ipsam.', 'https://lorempixel.com/640/480/?76796', 1, 9, 'hfKsSjuELI', '2019-06-01 14:34:09', '2019-06-01 16:36:18', 1, NULL, NULL, NULL, NULL),
(74, 'Nakia Bauch IV', 'gulgowski.gia@example.org', '$2y$10$S7h8DDZ8CW/wFvy2jEV9y.gxApxchjcgE1MyLgpaVWHO2dplwzaM.', 'student', 1, 1, 19292940, 1405743, 'female', 'o+', 'Bangladeshi', '409.778.6487 x78754', '57250 Aufderhar Junction\nNorth Lucile, NM 28320', 'Vel voluptas occaecati ut dolorem ad voluptas rem. Officia aperiam aliquam debitis sunt. Veritatis porro rem rem eos iure neque.', 'https://lorempixel.com/640/480/?76324', 1, 2, 'ws9MpHqZtx', '2019-06-01 14:34:09', '2019-06-01 16:36:18', 1, NULL, NULL, NULL, NULL),
(75, 'Mr. Randall Kris II', 'stephany14@example.org', '$2y$10$u0cUwzYkh2eWi79P9M1u9.UikE5nvZCPFu8VoEcthDeCS9FvqM.zq', 'student', 1, 1, 19292940, 8444418, 'male', 'ab', 'Bangladeshi', '983-255-8856 x9865', '7871 Champlin Grove\nBeierberg, SC 54658', 'Harum eligendi eveniet tempora doloribus debitis ea. Quam repellendus placeat eum veniam velit. Dolorem quam et repellat repellendus cumque.', 'https://lorempixel.com/640/480/?15333', 1, 2, 'MD4cAyFud8', '2019-06-01 14:34:09', '2019-06-01 16:36:19', 6, NULL, NULL, NULL, NULL),
(76, 'Rachael Davis', 'nolan.melvin@example.com', '$2y$10$2L1gZhwvloLY8hUvzQvEm.bGzC3LFt4e62fNk05m3ZYFLhOji2py2', 'student', 1, 1, 19292940, 7658787, 'female', 'a+', 'Bangladeshi', '586-435-3569 x658', '595 Jimmy Drive Suite 730\nNew Dayana, MO 67252', 'Minima est omnis laudantium numquam culpa ex nostrum et. Quia quia voluptas consequatur deserunt ex. Officia earum assumenda quos quos in.', 'https://lorempixel.com/640/480/?92681', 1, 17, 'gE08bzS3UX', '2019-06-01 14:34:09', '2019-06-01 16:36:19', 10, NULL, NULL, NULL, NULL),
(77, 'Krystel Oberbrunner', 'rhalvorson@example.net', '$2y$10$IMBk6/8q9VP5bHdge94XTebps.hzyxtzXCalWuFCezOVYnkYSo4qO', 'student', 1, 1, 19292940, 3306528, 'female', 'ab', 'Bangladeshi', '803.815.0781 x27723', '38203 Lang Meadows Suite 929\nAbshireland, HI 04008-2868', 'Non corporis voluptatem voluptas nobis. Nobis quis quos quidem. Reprehenderit consequuntur explicabo illo.', 'https://lorempixel.com/640/480/?86044', 1, 9, 'Rs1Aqn4Q6X', '2019-06-01 14:34:09', '2019-06-01 16:36:19', 4, NULL, NULL, NULL, NULL),
(78, 'Owen Waelchi', 'bdoyle@example.com', '$2y$10$dVSnWtB87Oz/.BGSOPT3b.YcqLWWmzbOm1GUWGKVnoOWCdKbrGxBW', 'student', 1, 1, 19292940, 4204886, 'female', 'a+', 'Bangladeshi', '468-609-3566', '361 Feeney Track Apt. 292\nDaphneystad, WA 85651-0813', 'Qui quis velit debitis laboriosam consequatur illum eius. Consequatur et id et sed eligendi reiciendis. Sint ad facilis qui quos officia et.', 'https://lorempixel.com/640/480/?66788', 1, 4, 'nCLgkHGrCd', '2019-06-01 14:34:09', '2019-06-01 16:36:19', 6, NULL, NULL, NULL, NULL),
(79, 'Breanne Sipes Sr.', 'wthompson@example.com', '$2y$10$cjk.qmL7XDz0Vid8mxuJmeMnyn/nQc/kgKMguyyDE6Drm3G0koK6m', 'student', 1, 1, 19292940, 4506805, 'female', 'o+', 'Bangladeshi', '745.329.4657', '6295 Mariela Garden Apt. 812\nWest Solon, KS 45872', 'Ex cupiditate cupiditate voluptas veritatis qui est omnis. Delectus esse excepturi placeat rem. Qui at ipsum officiis tempora nulla mollitia dolor.', 'https://lorempixel.com/640/480/?72698', 1, 6, 'aUMpxNPIuq', '2019-06-01 14:34:10', '2019-06-01 16:36:19', 4, NULL, NULL, NULL, NULL),
(80, 'Princess Romaguera', 'okeefe.trudie@example.net', '$2y$10$ZHxaU3ljgBLxh9SKTrvrVu6l5eqXbchs2qHH1qLt4/hP.kN0U9AQm', 'student', 1, 1, 19292940, 7107446, 'male', 'b+', 'Bangladeshi', '829.655.7036 x385', '24259 Nienow Springs\nLoweview, OK 32924', 'Necessitatibus dolor eos consequatur magni dignissimos cum nihil. Non culpa quisquam voluptas aut. Ea officiis consequatur expedita velit et sapiente iusto.', 'https://lorempixel.com/640/480/?94977', 1, 13, 'C0Ob949emK', '2019-06-01 14:34:10', '2019-06-01 16:36:19', 4, NULL, NULL, NULL, NULL),
(81, 'Andre Klein III', 'alta77@example.net', '$2y$10$PX0TcurSs3x///CrKt57Buwwnb1aAK3q8mzJfvyVej77/3FSfEihG', 'student', 1, 1, 19292940, 6136830, 'male', 'a+', 'Bangladeshi', '608-513-2090 x988', '73210 Vaughn Roads Suite 338\nVaughnville, GA 27605-9906', 'Aut voluptas quia quia fuga eos et consectetur. Doloremque aut laboriosam enim ex a consequatur ut. Delectus mollitia quo aut rerum porro nihil debitis.', 'https://lorempixel.com/640/480/?59716', 1, 17, 'AeP5ZrbA0w', '2019-06-01 14:34:10', '2019-06-01 16:36:19', 2, NULL, NULL, NULL, NULL),
(82, 'Giovani Ernser', 'brook.pfannerstill@example.com', '$2y$10$co.4ONoJvNECyPHxOzvNf.o6JePbLJ.LtsyZnPbrxKk0XEmDya.PC', 'student', 1, 1, 19292940, 2408895, 'male', 'o+', 'Bangladeshi', '663.824.0755 x91993', '682 Stracke Oval Suite 801\nD\'Amoreport, MT 73576', 'Et ut nobis qui asperiores debitis qui consequuntur. Ipsam recusandae nesciunt repudiandae unde vel. Natus enim sint numquam architecto nam harum.', 'https://lorempixel.com/640/480/?13490', 1, 11, '76sqEOaSz7', '2019-06-01 14:34:10', '2019-06-01 16:36:20', 7, NULL, NULL, NULL, NULL),
(83, 'Maye Fritsch', 'afadel@example.org', '$2y$10$aW5SipyA36VmVfXBfnRBV.GxD/MEp4oWF3DTr6Uwpv1XNM5MiRuuq', 'student', 1, 1, 19292940, 9426777, 'female', 'o+', 'Bangladeshi', '397.298.1108 x53098', '278 Isabelle Drive\nSouth Edd, IL 53913', 'Expedita et exercitationem minima tempora. Nam cumque rem ipsam dolores similique minima non. Iure perspiciatis porro et et temporibus odit.', 'https://lorempixel.com/640/480/?51050', 1, 4, '1kJSonZhTm', '2019-06-01 14:34:10', '2019-06-01 16:36:20', 1, NULL, NULL, NULL, NULL),
(84, 'Mrs. Breanna Upton', 'ipadberg@example.org', '$2y$10$cq8FnIZ6xRvuBPtSWMogYehlveQqjczr3I6eLj1Ee7irh17hbSTaO', 'student', 1, 1, 19292940, 1225368, 'male', 'b+', 'Bangladeshi', '208.945.1726', '8790 Elise Drives\nRoryville, TX 06830', 'Ipsa distinctio voluptatum dolorum. Accusamus provident occaecati sint velit pariatur. Eius possimus at fugit.', 'https://lorempixel.com/640/480/?15877', 1, 11, 'Xm8aJh9Ism', '2019-06-01 14:34:10', '2019-06-01 16:36:20', 3, NULL, NULL, NULL, NULL),
(85, 'Bobby Reynolds', 'zleuschke@example.net', '$2y$10$wM2F2I.fgQNRK0fazqzSEuBaduvuyMhMv94p9A7ouOC./maDfmB8y', 'student', 1, 1, 19292940, 8714560, 'female', 'ab', 'Bangladeshi', '(557) 310-2872 x45746', '7406 Kaden Knoll\nRickeyburgh, WI 81705-8235', 'Vero voluptas necessitatibus commodi commodi ut. Voluptatem ad recusandae in possimus aliquam a numquam. Tenetur iusto beatae autem velit aspernatur.', 'https://lorempixel.com/640/480/?10309', 1, 20, 'FmkHx4dsAB', '2019-06-01 14:34:10', '2019-06-01 16:36:20', 3, NULL, NULL, NULL, NULL),
(86, 'Maureen Murphy', 'judge.conroy@example.com', '$2y$10$/dVGQgZMi/ub14Ak/3Nhw.5wwmDjJLUdM4ApV12MsD7hvJPL9dXGi', 'student', 1, 1, 19292940, 3236410, 'female', 'a+', 'Bangladeshi', '545.237.9586', '98014 Guadalupe Fork\nAmandashire, CT 39092', 'Sed inventore voluptatibus similique numquam laboriosam et. Eaque ut doloremque sunt commodi. Unde est occaecati eligendi dolorem illum.', 'https://lorempixel.com/640/480/?14384', 1, 20, 'AlAoKEWa95', '2019-06-01 14:34:10', '2019-06-01 16:36:20', 2, NULL, NULL, NULL, NULL),
(87, 'Prof. Delores Runolfsdottir', 'weissnat.ruben@example.net', '$2y$10$6ty.SytL6tBU1/.3r2.xmODmA7FsZwWmQvnN5JG0umikPmrTaZFEW', 'student', 1, 1, 19292940, 5225708, 'male', 'a+', 'Bangladeshi', '952.301.2581 x012', '461 Fredrick Greens Apt. 419\nWestview, MI 28298-8094', 'Enim sapiente doloremque et nihil. Est culpa doloribus error nesciunt. Eius impedit ipsam eveniet.', 'https://lorempixel.com/640/480/?19892', 1, 13, 'oQoKJEu77v', '2019-06-01 14:34:10', '2019-06-01 16:36:20', 7, NULL, NULL, NULL, NULL),
(88, 'Prof. Nia Mann', 'gregg38@example.net', '$2y$10$3CYK3ZB3o2.4h3JvW3JcvOEjiwjXVftKy9jeSMVVDBRyqcEsuxTxy', 'student', 1, 1, 19292940, 6671037, 'male', 'ab', 'Bangladeshi', '(884) 582-8398', '5134 Yundt Streets\nOsinskistad, SC 93461-3758', 'Quis quidem nihil vel esse molestiae quis beatae aspernatur. Debitis aut quas aperiam et ipsum aspernatur. Et omnis in et qui eos repudiandae.', 'https://lorempixel.com/640/480/?82412', 1, 18, 'xYiwFvOXx5', '2019-06-01 14:34:10', '2019-06-01 16:36:20', 7, NULL, NULL, NULL, NULL),
(89, 'Alycia Okuneva', 'darien.koelpin@example.net', '$2y$10$YFJLwgGogYXzByFE0uhrxu0g3IMbmh4nLJytzTT4jhT8ORi0/0xIi', 'student', 1, 1, 19292940, 3943316, 'female', 'a+', 'Bangladeshi', '1-682-895-4774', '878 Caden Isle Apt. 280\nDouglashaven, MI 52597-2926', 'Sit magnam qui veritatis ut dolor. Placeat voluptatem aut voluptatem accusamus. Voluptas vitae ullam facere neque eum maiores.', 'https://lorempixel.com/640/480/?10236', 1, 17, 'iim20qJUUx', '2019-06-01 14:34:10', '2019-06-01 16:36:21', 6, NULL, NULL, NULL, NULL),
(90, 'Coleman Weber', 'blick.erin@example.org', '$2y$10$FNSRnzbsgzq3u.xrLB7Vw.RpM6YiVtkcac.VYy7ZtZLSjHLyPzETa', 'student', 1, 1, 19292940, 2540109, 'female', 'a+', 'Bangladeshi', '527.217.9654 x824', '5304 Concepcion Extensions Apt. 491\nJasenland, LA 26275', 'Eligendi qui quo odio sit. Consequatur eligendi est voluptate ut. Numquam suscipit cumque ad et.', 'https://lorempixel.com/640/480/?10373', 1, 15, 'uoQJIhbwGY', '2019-06-01 14:34:10', '2019-06-01 16:36:21', 9, NULL, NULL, NULL, NULL),
(91, 'Destiney O\'Conner', 'miller.leila@example.net', '$2y$10$p..QfPJPD7lZxiJxPWQP/eG5pRRVFeXj95OaUC0fxaeLdECsDWM6W', 'student', 1, 1, 19292940, 6200090, 'male', 'a+', 'Bangladeshi', '398.964.3263 x89111', '34900 Rosenbaum Common Suite 049\nNew Martine, ME 05535-8797', 'Quibusdam quos omnis omnis. Ut vel laboriosam modi aut officia. Sequi veniam aut et illo enim.', 'https://lorempixel.com/640/480/?81887', 1, 4, 'ps5XZJHBE9', '2019-06-01 14:34:10', '2019-06-01 16:36:21', 9, NULL, NULL, NULL, NULL),
(92, 'Frederique Lockman', 'ahettinger@example.com', '$2y$10$f9GoNhQ84nGc7oTgragSOOgghBWIqglDZN0kufvoMpL6oH/saP7KC', 'student', 1, 1, 19292940, 7705523, 'male', 'b+', 'Bangladeshi', '518-612-7561', '26046 Barrows Creek\nConnellyport, NM 88594-9264', 'Voluptas voluptate id sed error ipsa nihil ut architecto. Eveniet rerum velit dolores ad tempore dolores. Autem atque dignissimos nisi.', 'https://lorempixel.com/640/480/?69027', 1, 5, 's6tR98UuSJ', '2019-06-01 14:34:10', '2019-06-01 16:36:21', 9, NULL, NULL, NULL, NULL),
(93, 'Dr. Sierra Volkman PhD', 'ryleigh.cole@example.org', '$2y$10$0LjX4kpS8OdwD1wBLdn9AO.NFDHADYRy0NEGHo1yBOtLeOThcFwAS', 'student', 1, 1, 19292940, 9156771, 'female', 'ab', 'Bangladeshi', '490-974-0437 x95013', '482 Lebsack Rest\nNorth Clintonbury, VA 61746', 'Laboriosam aut aut nostrum temporibus minima cum. Ex unde illum voluptatem velit earum non pariatur voluptatem. Aut aut esse aut dolorem vel qui.', 'https://lorempixel.com/640/480/?30590', 1, 13, 'w7FEejiP56', '2019-06-01 14:34:11', '2019-06-01 16:36:21', 8, NULL, NULL, NULL, NULL),
(94, 'Alicia Cummings Sr.', 'jaylan63@example.net', '$2y$10$Tq2ZnJgt6WBGuo4wIk4WWOfcTINuKGd6i0uZZsA7ZrJSo.eW7aCIe', 'student', 1, 1, 19292940, 3977609, 'female', 'o+', 'Bangladeshi', '705-518-6109', '5627 Nitzsche Isle Suite 301\nOrtizmouth, NJ 94298-4670', 'Et cumque ut et quaerat est qui dolore. Iusto perspiciatis laudantium tempora commodi eum consequuntur incidunt. Dolores veritatis illo tempora repudiandae possimus id harum.', 'https://lorempixel.com/640/480/?38619', 1, 19, 'dYepMT2L93', '2019-06-01 14:34:11', '2019-06-01 16:36:21', 3, NULL, NULL, NULL, NULL),
(95, 'Burley Osinski', 'rledner@example.org', '$2y$10$B3D9DAyHrVakCZEdY5czgOEkHsIy8q695CMYmOZLKB63GhdTJgnFG', 'student', 1, 1, 19292940, 4562906, 'female', 'a+', 'Bangladeshi', '504-903-9873 x15100', '9508 Herman Light Apt. 760\nBrucefort, ME 23366', 'Assumenda sint tenetur non unde et quas. Cupiditate amet et dolorem sequi soluta neque. Ea quam voluptas est error repudiandae.', 'https://lorempixel.com/640/480/?87217', 1, 19, 'btHzEje3rM', '2019-06-01 14:34:11', '2019-06-01 16:36:21', 6, NULL, NULL, NULL, NULL);
INSERT INTO `school_users` (`id`, `name`, `email`, `password`, `role`, `active`, `school_id`, `code`, `student_code`, `gender`, `blood_group`, `nationality`, `phone_number`, `address`, `about`, `pic_path`, `verified`, `section_id`, `remember_token`, `created_at`, `updated_at`, `department_id`, `stripe_id`, `card_brand`, `card_last_four`, `trial_ends_at`) VALUES
(96, 'Reagan Johnson Sr.', 'gstroman@example.net', '$2y$10$3//bQ.6vLx/i5ylRyZm3iujnMLZPmlMAeRIKP58PfIuEO7NdDNI2a', 'student', 1, 1, 19292940, 2439445, 'female', 'a+', 'Bangladeshi', '283-686-6027 x54651', '9482 Dach Mill\nZiemannside, RI 87736-8095', 'Doloribus officia voluptate perferendis magni nostrum. Aut quibusdam eius illo voluptatem. Eos nobis corrupti qui ut et ea adipisci.', 'https://lorempixel.com/640/480/?68348', 1, 17, 'izCdmELlQv', '2019-06-01 14:34:11', '2019-06-01 16:36:21', 8, NULL, NULL, NULL, NULL),
(97, 'Susanna Douglas III', 'jarvis22@example.org', '$2y$10$1P//ZKLw1ysZv6vayspl/.zLVlzCBGuzt6yF.uHA3UlljEwmiA/2.', 'student', 1, 1, 19292940, 1747398, 'female', 'a+', 'Bangladeshi', '1-590-332-1236', '82662 Treutel Walk\nNorth Nolanburgh, KY 63520-9725', 'Eum ut consequatur explicabo dolore quo assumenda provident. Et voluptas aut natus in. Vitae dolores recusandae iste omnis sit aut dolorem.', 'https://lorempixel.com/640/480/?16554', 1, 3, 'kk0m7mt7u4', '2019-06-01 14:34:11', '2019-06-01 16:36:22', 3, NULL, NULL, NULL, NULL),
(98, 'Dr. Roosevelt Gibson', 'turner69@example.com', '$2y$10$mAwSqbePD1JhMAr6N5soGe12p7c2NTPmM0jEQlQBLbcO21FAS3iXG', 'student', 1, 1, 19292940, 2039141, 'female', 'ab', 'Bangladeshi', '215.990.1023 x0732', '13685 Kunze Lake\nFrancescashire, NH 29971', 'Iste cupiditate ad dolore sapiente. Maxime sunt omnis maiores voluptas. Et vel dolor fugit aliquam at.', 'https://lorempixel.com/640/480/?96284', 1, 14, '61w8EV41Tv', '2019-06-01 14:34:11', '2019-06-01 16:36:22', 4, NULL, NULL, NULL, NULL),
(99, 'Esmeralda Kovacek', 'champlin.stephany@example.net', '$2y$10$Pw7M2Y1WW/vDl5qEnYrE7.rhRMK5y9AuxCqZ.5Zk1dsiOlqNEs7yS', 'student', 1, 1, 19292940, 4018380, 'female', 'o+', 'Bangladeshi', '1-316-412-7289 x4234', '565 Josiane Isle Apt. 476\nPort Thoraside, VT 15523', 'Voluptas voluptas ut sequi culpa incidunt fuga molestiae. Odio sunt sed sed suscipit eum aliquam consectetur. Dolorem dicta adipisci nihil eum quo incidunt.', 'https://lorempixel.com/640/480/?13146', 1, 9, 'M9sp4P3vlC', '2019-06-01 14:34:11', '2019-06-01 16:36:22', 3, NULL, NULL, NULL, NULL),
(100, 'Carlee Towne', 'rosalinda.effertz@example.org', '$2y$10$TXxib7ml8ub6p3kogOqZ9Ovoj.Cxy.uGmX9qWfBtvKw6XcLcL89iO', 'student', 1, 1, 19292940, 5226192, 'female', 'a+', 'Bangladeshi', '1-980-966-7849 x49526', '50512 Rosalind Valley Apt. 087\nPort Bart, OH 93515-6458', 'Dignissimos ad non ea ab repudiandae dolores autem. Doloremque velit assumenda sapiente placeat molestiae impedit doloremque. Atque voluptatem nesciunt dolore nisi tempore.', 'https://lorempixel.com/640/480/?38845', 1, 4, 'YmcO6TGV1v', '2019-06-01 14:34:11', '2019-06-01 16:36:22', 5, NULL, NULL, NULL, NULL),
(101, 'Benny King', 'malinda98@example.net', '$2y$10$u5yaRxrshvk8SwAaevvUVudoLTnQSiodrkN5YGRDEjavbcrNu1qsG', 'student', 1, 1, 19292940, 7839767, 'female', 'a+', 'Bangladeshi', '875.238.5875', '840 Ayana Shores Suite 267\nChanceland, RI 77091-1276', 'Quo quo adipisci necessitatibus qui repellat pariatur. Rem impedit autem facilis eos quaerat deserunt pariatur. Laborum voluptatem nam quos cupiditate sit error odit praesentium.', 'https://lorempixel.com/640/480/?55360', 1, 20, 'Cl0CseEzYV', '2019-06-01 14:34:11', '2019-06-01 16:36:22', 9, NULL, NULL, NULL, NULL),
(102, 'Camron Mosciski', 'janice.hills@example.org', '$2y$10$U9ATdsibEzh.03y7YgDrsO7QfEDKVRLGn/ZyW05dfxRJt/ibAbeFi', 'student', 1, 1, 19292940, 6724003, 'male', 'ab', 'Bangladeshi', '(885) 925-2716', '84670 Doyle Haven Suite 319\nMackenziestad, KY 67089', 'Omnis quia odit sapiente non. Quam et necessitatibus est accusamus. Voluptatem et ratione aliquam inventore.', 'https://lorempixel.com/640/480/?64873', 1, 10, 'FqTN7xRZX3', '2019-06-01 14:34:11', '2019-06-01 16:36:22', 10, NULL, NULL, NULL, NULL),
(103, 'Katherine Cremin', 'xstanton@example.net', '$2y$10$yIgReiyP2ryu4STlognBZeSvfRnf5TJRtT8IbVBWnEvTVDUchodPK', 'student', 1, 1, 19292940, 5516690, 'male', 'o+', 'Bangladeshi', '+1-316-602-2157', '1168 Elfrieda Plaza\nWest Shirley, NC 70765', 'Quaerat sed nisi eaque aliquid. Est rerum aliquam et itaque. Illum amet dolores sint commodi et explicabo ratione rerum.', 'https://lorempixel.com/640/480/?99674', 1, 5, 'TH30Za9vFY', '2019-06-01 14:34:11', '2019-06-01 16:36:22', 9, NULL, NULL, NULL, NULL),
(104, 'Rhett Dooley', 'ozboncak@example.org', '$2y$10$kCatPunL3SySdJu4pu4IreHoLs9X9pIsdExClKrxiGHK37IexfHqW', 'student', 1, 1, 19292940, 2441132, 'male', 'b+', 'Bangladeshi', '(695) 940-0483', '92918 Kiera Ways Apt. 954\nLonieshire, NM 15843', 'Rerum sunt amet vel debitis quisquam numquam. Voluptatem sint et illum ullam consectetur alias. Facere ratione eum corrupti eius sunt repellat odio.', 'https://lorempixel.com/640/480/?46862', 1, 15, 'Jj9pLdyvqg', '2019-06-01 14:34:11', '2019-06-01 16:36:22', 7, NULL, NULL, NULL, NULL),
(105, 'Audra Beer III', 'rosario17@example.com', '$2y$10$fjBMoiJoKtjpU/Ik/xXcjOw5bFSIva.upEEs0GjtZYB2z0PeWBO8.', 'student', 1, 1, 19292940, 2168302, 'female', 'ab', 'Bangladeshi', '1-286-387-9766', '5827 Marvin Squares Suite 433\nPort Rafaela, VT 42712-2717', 'Est praesentium et soluta magnam et voluptatem amet. Quod voluptas error commodi similique nostrum magnam. Cum mollitia ut qui autem ut.', 'https://lorempixel.com/640/480/?57316', 1, 13, 'RSkjgJwV4K', '2019-06-01 14:34:11', '2019-06-01 16:36:23', 3, NULL, NULL, NULL, NULL),
(106, 'Ms. Asia Hauck III', 'emerald53@example.org', '$2y$10$LwLJKqUNQXBX8d4EGKkKQ.MEb3L5e7E.0zn15m5yrV0Bp13vepp5O', 'student', 1, 1, 19292940, 6470186, 'male', 'o+', 'Bangladeshi', '1-519-217-9321 x168', '95748 Becker Village Suite 235\nSouth Evelineshire, OK 21626', 'Ducimus incidunt aut impedit accusamus placeat inventore voluptas. Totam voluptatem qui repudiandae amet totam mollitia officiis iure. Esse veniam animi esse autem.', 'https://lorempixel.com/640/480/?29260', 1, 9, 'oOrgCuJFPw', '2019-06-01 14:34:11', '2019-06-01 16:36:23', 7, NULL, NULL, NULL, NULL),
(107, 'Saige Veum', 'bruce.ortiz@example.com', '$2y$10$Bv6xg/5DK.X/jKBAWioWVOtHWorQAVHos7aIlf48VsgSOEODDFwt2', 'student', 1, 1, 19292940, 5884059, 'male', 'a+', 'Bangladeshi', '323-397-9807', '43194 Hailee Square\nVergieland, AZ 13451-7521', 'Commodi asperiores vitae harum accusamus necessitatibus ut. Nihil illum ab at voluptas. Suscipit quis soluta omnis.', 'https://lorempixel.com/640/480/?19967', 1, 7, 'wHMNTd8746', '2019-06-01 14:34:11', '2019-06-01 16:36:23', 10, NULL, NULL, NULL, NULL),
(108, 'Miss Gwen Langworth DVM', 'katrine94@example.net', '$2y$10$31FQFMqIvXjjOgq7dLrQeuMkXmKOiTvzrM9PeT3i4XhSQhjcUAhhK', 'student', 1, 1, 19292940, 773173, 'female', 'a+', 'Bangladeshi', '(413) 561-3577 x52439', '466 Howe Mount Suite 977\nLake Bernadette, CT 57459', 'Quo qui odio alias quas adipisci sapiente eum. Aut ex ipsam sed repellendus odio earum. Cum saepe doloribus beatae.', 'https://lorempixel.com/640/480/?83263', 1, 11, 't8soRVmRye', '2019-06-01 14:34:11', '2019-06-01 16:36:23', 2, NULL, NULL, NULL, NULL),
(109, 'Prof. Ahmad Kub', 'dwest@example.net', '$2y$10$yP.TkzfHomiid4d7W0391ul3HRr.2wTmpT8llmDlXxqwXpbdKhiPG', 'student', 1, 1, 19292940, 8335097, 'female', 'o+', 'Bangladeshi', '781-759-4179 x16182', '9195 Lenna Street\nRaleighchester, AR 57703', 'Atque excepturi eum sunt. Dolorem quidem maiores placeat dolore delectus officia. Iusto qui nihil aut facilis.', 'https://lorempixel.com/640/480/?11304', 1, 8, 'jn4wazmTgW', '2019-06-01 14:34:11', '2019-06-01 16:36:23', 5, NULL, NULL, NULL, NULL),
(110, 'Margarita Gutkowski', 'joanny.von@example.net', '$2y$10$8q6/7HdRsnZLeLRao1hPi.4EYT.tPpFDuiucrOxDO9eoRAK6T.XyS', 'student', 1, 1, 19292940, 7850863, 'female', 'ab', 'Bangladeshi', '+1 (645) 243-2587', '4432 Jenkins Pine\nJonesshire, OH 39382', 'Porro autem incidunt sed reiciendis amet harum ad. Repellat ut vitae nulla veniam. Et ea iste architecto quis officia fuga.', 'https://lorempixel.com/640/480/?29692', 1, 10, 'YKQ5GvnDTK', '2019-06-01 14:34:11', '2019-06-01 16:36:23', 5, NULL, NULL, NULL, NULL),
(111, 'Miss Pauline Robel', 'claude89@example.org', '$2y$10$p64Q0fOrYieesSztuUdhcO46vxqVD2laEyDw0D9Nk6dmaf/3Bg0.q', 'student', 1, 1, 19292940, 9236871, 'male', 'ab', 'Bangladeshi', '378.817.0405', '375 Georgianna Pike\nBrakusburgh, SC 02148-5900', 'Quidem eum odio a ducimus quas ipsam ipsam. Officia qui qui dolore corrupti. Dicta excepturi fugiat fuga dolores.', 'https://lorempixel.com/640/480/?30874', 1, 17, 'IORNMFnXsZ', '2019-06-01 14:34:11', '2019-06-01 16:36:23', 1, NULL, NULL, NULL, NULL),
(112, 'Mercedes Marvin', 'stokes.shanon@example.com', '$2y$10$7cpI02o3IvO72e1D22eGQ.7u8vfmU1aalH5otTWO.H6gg/ceMaJPe', 'student', 1, 1, 19292940, 4030604, 'female', 'b+', 'Bangladeshi', '(201) 455-2247 x4410', '26229 Fannie Mission\nSouth Kimberly, ND 19475', 'Ea voluptatem est possimus vel neque consectetur. Qui laudantium velit a quia architecto sit. Reprehenderit dicta eos amet tenetur asperiores dolorum quos.', 'https://lorempixel.com/640/480/?64677', 1, 17, 'ri1sqdzTHL', '2019-06-01 14:34:12', '2019-06-01 16:36:23', 3, NULL, NULL, NULL, NULL),
(113, 'Mr. Johnny Waelchi II', 'junior.wiegand@example.com', '$2y$10$nMTuFTCNFUtb65ApQhJ5MO0jAbDLl1JNs/6vy7PK5W.WAsNg89FEy', 'student', 1, 1, 19292940, 5836932, 'male', 'o+', 'Bangladeshi', '563.367.2265 x65688', '7073 Alayna Gardens Suite 246\nNew Emelietown, AK 29817', 'Cumque dolor labore et aut iusto. Est minus optio ea esse. Accusantium similique molestiae tempora rem labore nihil.', 'https://lorempixel.com/640/480/?59221', 1, 3, 'PX20g8dhFS', '2019-06-01 14:34:12', '2019-06-01 16:36:24', 9, NULL, NULL, NULL, NULL),
(114, 'Eleanore Murray Jr.', 'nmante@example.com', '$2y$10$2Fji38sW496egjYSWMYAw.HW.38MJtHEJY0Fi.YaVpvVcYDPY02ta', 'student', 1, 1, 19292940, 650706, 'female', 'ab', 'Bangladeshi', '1-517-364-7938 x7356', '304 Schuyler Camp\nAbshireside, SD 39249-2575', 'Alias nobis doloribus repellat aut dolor libero molestiae in. Ut ut laborum tempora esse. Veritatis dolores tempora assumenda ullam repudiandae ex sapiente.', 'https://lorempixel.com/640/480/?66511', 1, 7, 'litCd1zhqk', '2019-06-01 14:34:12', '2019-06-01 16:36:24', 5, NULL, NULL, NULL, NULL),
(115, 'Jarret Ferry', 'myrna.hermann@example.com', '$2y$10$XJVG7A1ma.wXMsk0sMVQFO/.V1Bt5lH/A6pLYw/cTTXvkhVH9r1Qq', 'student', 1, 1, 19292940, 6567009, 'female', 'a+', 'Bangladeshi', '414-688-1102 x04652', '568 Carter Street\nHarmonymouth, NE 07204', 'Architecto est velit ut fugit optio. Nemo asperiores ut quia dolor voluptatibus eius facilis. Enim amet pariatur tempore consequatur.', 'https://lorempixel.com/640/480/?43992', 1, 16, 'iPbULQRCGT', '2019-06-01 14:34:12', '2019-06-01 16:36:24', 2, NULL, NULL, NULL, NULL),
(116, 'Josiane Schinner', 'jerry.boehm@example.org', '$2y$10$cdcE4tnc55zsLgNwbSYYzesYvjHOFCbZkmN.Ls7X/ktwfLPkHZt/6', 'student', 1, 1, 19292940, 5151537, 'male', 'b+', 'Bangladeshi', '1-805-591-2594 x1659', '33600 Selmer Views Suite 913\nWest Rocio, WA 89919', 'Enim placeat fugit amet minima id vel unde. Quaerat nihil velit eveniet sint repellendus ut aspernatur. Dolor neque cupiditate eos consequatur quia.', 'https://lorempixel.com/640/480/?60783', 1, 13, 'lWe3pCizyM', '2019-06-01 14:34:12', '2019-06-01 16:36:24', 2, NULL, NULL, NULL, NULL),
(117, 'Edna Ortiz', 'harold14@example.net', '$2y$10$neYjMJdyLn9YHFjiepStJu8PApIuhgDkINW5QAJSvHKbsxAzuHT9e', 'student', 1, 1, 19292940, 217175, 'male', 'o+', 'Bangladeshi', '1-608-701-5005 x797', '70320 Waters Mill\nNienowbury, RI 54816-1682', 'Dolores consectetur iste est quos vel eum. Rerum vero aut consequuntur exercitationem quis ex. Delectus velit iste qui aut.', 'https://lorempixel.com/640/480/?84971', 1, 5, 'zj1uh65RCm', '2019-06-01 14:34:12', '2019-06-01 16:36:24', 8, NULL, NULL, NULL, NULL),
(118, 'Ignatius Medhurst', 'ssmitham@example.com', '$2y$10$gQynyC5BaGrTFDKFKeXpoeSUX5lmnTFZE6KH2B3S8Gf1lQIrF3/66', 'student', 1, 1, 19292940, 1866430, 'male', 'a+', 'Bangladeshi', '802-394-9323 x23756', '4882 Lehner Prairie\nJacobimouth, FL 64267-7455', 'Illum non neque similique placeat ea aut sunt. Aut atque reiciendis dignissimos consequuntur nemo. Placeat quae reiciendis rem fuga distinctio.', 'https://lorempixel.com/640/480/?98791', 1, 15, 'UV3WeF5kKM', '2019-06-01 14:34:12', '2019-06-01 16:36:24', 1, NULL, NULL, NULL, NULL),
(119, 'Mr. Jedediah Auer', 'destiney.reichel@example.net', '$2y$10$0eTC8hWUzr3phM64iDT3mO7LAvVEpQZ2Db0rcwvpZHLgcnr20erum', 'student', 1, 1, 19292940, 983933, 'female', 'b+', 'Bangladeshi', '(326) 332-5512', '5706 Medhurst Trace Suite 926\nRosannatown, AK 93040-4110', 'Beatae qui vel nobis animi. Et nisi aut nobis et exercitationem. Nam non eos expedita culpa.', 'https://lorempixel.com/640/480/?27083', 1, 14, 'Zg9AKyhNXT', '2019-06-01 14:34:12', '2019-06-01 16:36:24', 1, NULL, NULL, NULL, NULL),
(120, 'Blake Doyle', 'kari.ernser@example.com', '$2y$10$R9jF7wfn1Awi/3YVf0CTAOzbrnjqrovkLFa1yaLfBJVYajvd1crmW', 'student', 1, 1, 19292940, 1181504, 'female', 'a+', 'Bangladeshi', '(523) 539-9833 x08307', '62217 Cathrine Court\nNew Sadye, ND 98536-2279', 'Eos tempore sunt ratione sunt. Voluptatibus eligendi velit dolorem quibusdam nam sed. Fuga dolorem fugit et consequatur.', 'https://lorempixel.com/640/480/?46999', 1, 7, 'FXhSyfRyqP', '2019-06-01 14:34:12', '2019-06-01 16:36:25', 3, NULL, NULL, NULL, NULL),
(121, 'Miss Isabell Kiehn', 'blanda.dusty@example.com', '$2y$10$gwDqvYqb4.nZlrJCOlt5zuklzwgZw7PO2pp9N7nG8a3IV8M1O0Wgu', 'student', 1, 1, 19292940, 6538647, 'male', 'ab', 'Bangladeshi', '1-346-479-1853 x2027', '851 Patricia Drive\nAsaview, FL 23829', 'Non ipsam quis dolorum necessitatibus praesentium unde eaque. Id voluptas perspiciatis laborum hic dolore necessitatibus. Quia et ea rerum totam repudiandae totam cupiditate aut.', 'https://lorempixel.com/640/480/?72599', 1, 2, 'vl6JUOPSS8', '2019-06-01 14:34:12', '2019-06-01 16:36:25', 7, NULL, NULL, NULL, NULL),
(122, 'Geo Sauer', 'orland58@example.com', '$2y$10$9DJkTz4ZxKnlPKlrYR4b1e7L.fN5g7aACt8oApIh4GpZguC1MUvQa', 'student', 1, 1, 19292940, 9037227, 'female', 'o+', 'Bangladeshi', '564.708.4606', '259 Pagac Falls Apt. 379\nSipesport, IA 28260-2757', 'Aut provident doloribus enim voluptas perferendis doloremque placeat. Vel consequatur non saepe officia modi neque. Incidunt neque dolorem reprehenderit quis libero commodi ut modi.', 'https://lorempixel.com/640/480/?27908', 1, 4, 'Pb7jHqjzWi', '2019-06-01 14:34:12', '2019-06-01 16:36:25', 4, NULL, NULL, NULL, NULL),
(123, 'Dustin Lakin IV', 'russel.lamont@example.com', '$2y$10$0JK06T9tWe6U5iNpiHRyle4EXM/4xiPlQ3p0O.1Evba4GHQe.fj9u', 'student', 1, 1, 19292940, 161633, 'male', 'b+', 'Bangladeshi', '282-409-7183 x33873', '442 Tommie Road\nQueenieburgh, MD 80123', 'Alias aut quos impedit vero culpa. Repellat inventore qui sequi minus laborum aperiam ut. Autem ut blanditiis labore veritatis.', 'https://lorempixel.com/640/480/?65163', 1, 4, 'gF7erO3BRO', '2019-06-01 14:34:12', '2019-06-01 16:36:25', 8, NULL, NULL, NULL, NULL),
(124, 'Ansley Brakus', 'arlene03@example.net', '$2y$10$c5bJimT9FJCwbo4gk55auuLUQnAPd0dJ8TQ6YlOpKVh30.Wb.yJeu', 'student', 1, 1, 19292940, 5978013, 'female', 'ab', 'Bangladeshi', '+1-603-408-2843', '817 Nicolas Ville\nMabelton, WV 83516-2858', 'Aliquid odio praesentium at dolorem voluptatem. Enim alias quo vel possimus error sed. Sed vitae id quam voluptatem eos quia quae sequi.', 'https://lorempixel.com/640/480/?75232', 1, 7, 'FoGyG6vgAm', '2019-06-01 14:34:13', '2019-06-01 16:36:25', 3, NULL, NULL, NULL, NULL),
(125, 'Sydnee Sanford', 'weffertz@example.net', '$2y$10$JINhM6jbg7LqJJx.MytWaut7KzCA1EImfsi9dl1Rr/V0/2iW0X24.', 'student', 1, 1, 19292940, 5869417, 'female', 'b+', 'Bangladeshi', '+1-437-340-3947', '84631 Leuschke Lodge Suite 398\nFaustoburgh, NV 08010', 'At eos delectus aut quae sed. Ex eius quaerat dolor animi dolore. Officiis earum in at pariatur eveniet.', 'https://lorempixel.com/640/480/?67412', 1, 17, 'ef1w9KSOsW', '2019-06-01 14:34:13', '2019-06-01 16:36:25', 3, NULL, NULL, NULL, NULL),
(126, 'Nikolas Blanda', 'murl.littel@example.com', '$2y$10$dAUPFwYlfzdq6MXcHgBnUuHHxDbAczQ46XZmCZqShgi6Uc90kb8c2', 'student', 1, 1, 19292940, 1409509, 'male', 'o+', 'Bangladeshi', '(783) 209-3125', '81579 Lowell Knoll\nSierraport, WA 62221-5066', 'Accusamus perferendis doloremque eligendi ut eum. Adipisci quo sit doloribus sit. In voluptatem sunt odio officia nihil.', 'https://lorempixel.com/640/480/?93421', 1, 19, 'MDBTLrn4Ne', '2019-06-01 14:34:13', '2019-06-01 16:36:25', 8, NULL, NULL, NULL, NULL),
(127, 'Ms. Adela Haley PhD', 'yadira88@example.net', '$2y$10$xjs18rLgBKxw2OhapcDwMO5nex1F0xQmCj1wzHcYH85lpsudjA04q', 'student', 1, 1, 19292940, 2044868, 'male', 'o+', 'Bangladeshi', '+18925031561', '32802 Barbara Meadow\nNew Meagan, PA 64679', 'Qui non quod voluptates sed et. Voluptatem laborum et corrupti aliquam consequatur rerum. Molestiae adipisci ab fugiat eum eveniet ut dolor.', 'https://lorempixel.com/640/480/?60849', 1, 2, 'YQFV2fkYLu', '2019-06-01 14:34:13', '2019-06-01 16:36:26', 1, NULL, NULL, NULL, NULL),
(128, 'Gerda Leuschke', 'emile.shields@example.org', '$2y$10$2EMt4Mbbs7OjHueWShB/nOmQLx8AxGYSighOLDLYfC.JUPGyK7e1K', 'student', 1, 1, 19292940, 5495690, 'female', 'ab', 'Bangladeshi', '693.915.3986 x92204', '639 Torphy Summit\nDuBuqueside, VT 46733-7940', 'Expedita nam ut illo enim veritatis. Doloribus quia molestiae aut omnis et quo. Sint maiores nihil expedita quia praesentium dolorem vero.', 'https://lorempixel.com/640/480/?12885', 1, 2, 'pQQqQMfBkQ', '2019-06-01 14:34:13', '2019-06-01 16:36:26', 4, NULL, NULL, NULL, NULL),
(129, 'Graciela Marks', 'lauryn.leuschke@example.org', '$2y$10$62tWBhqGPIUH/t4.VJMJbeUgpmzSBaQRQpRuPRHLSyViauHNNJxmy', 'student', 1, 1, 19292940, 1477116, 'male', 'o+', 'Bangladeshi', '(939) 576-4717 x962', '13073 Alysson Spring Apt. 713\nEast Marionfurt, WA 02155', 'Et qui laboriosam consectetur repellendus ipsam veritatis qui. Blanditiis inventore consectetur recusandae nulla non. Et et quo totam harum.', 'https://lorempixel.com/640/480/?89256', 1, 2, 'ePqbdkE7fD', '2019-06-01 14:34:13', '2019-06-01 16:36:26', 5, NULL, NULL, NULL, NULL),
(130, 'Colleen McDermott', 'tremblay.angelina@example.net', '$2y$10$URh/Cgdzl2PwRLaDivvDNe2vNUoMkC45mfnf.7m655V192OpLXEx.', 'student', 1, 1, 19292940, 518073, 'female', 'a+', 'Bangladeshi', '506.542.1756 x627', '5168 Armani Ferry Apt. 635\nPort Annabell, MN 17696-2483', 'Voluptatem inventore consequatur accusantium dolor qui facere. Iste placeat repudiandae fuga tenetur iure vero minus accusantium. Molestiae officiis optio quisquam deleniti nostrum fuga et.', 'https://lorempixel.com/640/480/?66689', 1, 3, 'wU6ZDT46Hq', '2019-06-01 14:34:13', '2019-06-01 16:36:26', 9, NULL, NULL, NULL, NULL),
(131, 'Mollie Cole', 'fleta03@example.net', '$2y$10$Qep0MgsSHe.Qq7gJooNhY.VJ5pFFtgncPyNpoYeu.KzVE0M9KhFpO', 'student', 1, 1, 19292940, 1921649, 'male', 'a+', 'Bangladeshi', '+1-304-467-2903', '7793 Gerhold Plaza\nNew Codyview, WY 77714', 'Dolore quos ex ullam quisquam magnam vel fugiat non. Et molestias eius quod amet est est. Est nobis quia atque ut.', 'https://lorempixel.com/640/480/?21207', 1, 11, 'brcyTKJ3Ey', '2019-06-01 14:34:13', '2019-06-01 16:36:26', 1, NULL, NULL, NULL, NULL),
(132, 'Aniyah Becker', 'althea.gutkowski@example.com', '$2y$10$f4.QxTkttKO1t6ng4IR.G.k7c3jkCdmFAIqaSjGtkQoZsSGux3/b6', 'student', 1, 1, 19292940, 4652342, 'female', 'o+', 'Bangladeshi', '418-591-2584 x112', '1750 Leuschke Ridges\nGilesland, MA 49425-9457', 'Dolorem enim doloremque tenetur sed enim. Et ut voluptatibus ut omnis. Architecto consequatur ut architecto dicta.', 'https://lorempixel.com/640/480/?76741', 1, 16, '2zSpp4ajxT', '2019-06-01 14:34:13', '2019-06-01 16:36:26', 6, NULL, NULL, NULL, NULL),
(133, 'Mr. Cristina Feest', 'wkemmer@example.com', '$2y$10$9s12Vp4SIfy//f9U74LCj.a/8wjLWJTCrRqcM61yCfraAyqAAiVPa', 'student', 1, 1, 19292940, 728862, 'female', 'ab', 'Bangladeshi', '(357) 996-1575 x6231', '23024 Akeem Village Apt. 805\nEphraimtown, OK 71637-3698', 'Impedit fugiat sequi ea at. Est labore facilis unde repellendus. Distinctio enim aperiam nihil facere ea dolorem.', 'https://lorempixel.com/640/480/?65905', 1, 15, 'LkcVLW8Xl2', '2019-06-01 14:34:13', '2019-06-01 16:36:26', 2, NULL, NULL, NULL, NULL),
(134, 'Mr. Delaney Quigley II', 'nader.cody@example.net', '$2y$10$UYvw99ekTTyd4vXm8zjoFuZoxPaNxD2xhLVVRz1.EbghSa24/mxLO', 'student', 1, 1, 19292940, 765212, 'female', 'b+', 'Bangladeshi', '+1-837-310-1614', '13403 Von Glen\nNorth Joyhaven, MA 90024-4526', 'Quidem expedita excepturi illo pariatur iusto. Repellat architecto distinctio corporis vel inventore reiciendis. Aliquam et possimus cupiditate nihil perferendis quibusdam iusto.', 'https://lorempixel.com/640/480/?32834', 1, 20, 'CmPE3BINNz', '2019-06-01 14:34:14', '2019-06-01 16:36:27', 6, NULL, NULL, NULL, NULL),
(135, 'Dr. Nelson Cremin', 'arjun52@example.org', '$2y$10$xP.YHjQOpilYnhviapW2IOgoGM0TU6iidccIh/74fv4aIw1X254FC', 'student', 1, 1, 19292940, 4914440, 'male', 'a+', 'Bangladeshi', '495.869.3830', '262 Ramona Loaf Suite 285\nMcKenziechester, WY 76685', 'Vero animi eligendi amet praesentium. Incidunt quibusdam velit quas quam quia et. Ad maiores dolor accusamus.', 'https://lorempixel.com/640/480/?53146', 1, 10, 'AyFTL5SvUi', '2019-06-01 14:34:14', '2019-06-01 16:36:27', 2, NULL, NULL, NULL, NULL),
(136, 'Ted McClure III', 'horacio.lueilwitz@example.org', '$2y$10$W.WbF/RHvKC2gpFIDkuRLeV5RCW4/tcxCNDxpMN19r/lGB3e7Rvz2', 'student', 1, 1, 19292940, 6715804, 'female', 'b+', 'Bangladeshi', '+1-914-470-9906', '1839 Smith Cliffs\nNorth Anais, RI 74446', 'Sed dolorum et nihil cumque facilis. Molestias cumque deleniti ut adipisci aut optio. Maiores et veniam voluptas aliquam suscipit.', 'https://lorempixel.com/640/480/?99577', 1, 14, 'X8U4JiMAUp', '2019-06-01 14:34:14', '2019-06-01 16:36:27', 3, NULL, NULL, NULL, NULL),
(137, 'Melody Rutherford', 'susan27@example.org', '$2y$10$RPbM6jB5xiO1Po3dvEWwFuP7me5Q.LyGqrjq1MrDI.4mVXaQU1ziu', 'student', 1, 1, 19292940, 6840861, 'male', 'ab', 'Bangladeshi', '(706) 819-7920', '59705 Owen Viaduct Suite 758\nMcCulloughstad, ME 87342', 'At deleniti facere sit est. Dignissimos magnam nemo aliquam ullam aliquid provident. Est doloribus aspernatur quo mollitia voluptatem fugiat modi.', 'https://lorempixel.com/640/480/?98030', 1, 18, 'B4d1LPbJF4', '2019-06-01 14:34:14', '2019-06-01 16:36:27', 4, NULL, NULL, NULL, NULL),
(138, 'Mrs. Reanna Thompson', 'gulgowski.jaden@example.net', '$2y$10$ukk0d6NrgfCDob80UezMXuhVAwVMMubLeeciK64iQEOnEA4QqLnSO', 'student', 1, 1, 19292940, 4234476, 'male', 'o+', 'Bangladeshi', '997.759.0247', '94201 Funk Extensions Suite 501\nWest Reyes, OH 08574-1059', 'Est pariatur iste blanditiis dolor. Repudiandae hic odio veniam laboriosam illum ipsa culpa. Veritatis et quia eaque quo.', 'https://lorempixel.com/640/480/?22029', 1, 20, 'QTyArHiODV', '2019-06-01 14:34:14', '2019-06-01 16:36:27', 8, NULL, NULL, NULL, NULL),
(139, 'Gabe Satterfield', 'quigley.renee@example.net', '$2y$10$IYi/8gV5q.Qft7ZO8yDWsuCAav1RnOrD4/lCS09ngmJ12EraB2J7y', 'student', 1, 1, 19292940, 2704585, 'female', 'a+', 'Bangladeshi', '(845) 619-1709 x4730', '9552 Lind Lakes\nCasperberg, NE 87765-2014', 'Sunt harum quas illo qui occaecati. Tempore illum quo consequuntur commodi molestiae dolor. Nam nam velit porro et.', 'https://lorempixel.com/640/480/?68879', 1, 3, 'ehwr9FzkCc', '2019-06-01 14:34:14', '2019-06-01 16:36:27', 1, NULL, NULL, NULL, NULL),
(140, 'Alia Marquardt', 'kozey.luciano@example.org', '$2y$10$cqPxe0jcynu6otwC19lUTeNS0P0c5LU4Qe6iiBWnNuYsIzHeHucKS', 'student', 1, 1, 19292940, 8878864, 'male', 'ab', 'Bangladeshi', '835.403.0594', '3186 Zboncak Village Apt. 160\nKenton, MS 57434', 'Facere suscipit consequatur porro dolorem. Culpa rerum eius laborum aut maiores tempora explicabo. Et expedita omnis deleniti eligendi assumenda neque alias.', 'https://lorempixel.com/640/480/?50887', 1, 9, 'DIVdrNvs15', '2019-06-01 14:34:14', '2019-06-01 16:36:27', 6, NULL, NULL, NULL, NULL),
(141, 'Karli Rosenbaum', 'bednar.cruz@example.org', '$2y$10$wRniSuzc9u.FjF0zVzZf4uCZCaGiq.ip644GVYpZAbSaZwiDaP4uW', 'student', 1, 1, 19292940, 4815850, 'female', 'ab', 'Bangladeshi', '(930) 840-0831 x73847', '8010 Ilene Union\nIgnatiusview, MA 42001', 'Esse odit tenetur cumque expedita est blanditiis. Unde quod sit voluptatem atque sed dolor. Dolores enim facere magni in quam eos.', 'https://lorempixel.com/640/480/?37092', 1, 18, 'qEl65Vb66O', '2019-06-01 14:34:14', '2019-06-01 16:36:28', 6, NULL, NULL, NULL, NULL),
(142, 'Edythe Cormier', 'claudia59@example.org', '$2y$10$4uhQbMyy4CHg30OcKZToxe3mBL5gbjBOxWLkKVXVV42t6LixGKxi2', 'student', 1, 1, 19292940, 6385804, 'female', 'o+', 'Bangladeshi', '940-440-0479', '6603 Jayne Turnpike\nEast Christop, WV 86348', 'Consectetur provident et quod ut omnis. Qui ipsum voluptas facere laboriosam deleniti asperiores ut ut. Ut et debitis maxime itaque consequuntur et.', 'https://lorempixel.com/640/480/?12972', 1, 14, 'LWhB4R4LQH', '2019-06-01 14:34:14', '2019-06-01 16:36:28', 2, NULL, NULL, NULL, NULL),
(143, 'Kathleen Bruen', 'vemard@example.net', '$2y$10$MXvKUh6dqPrOwHFe7UETqeIN5j4oTfKr4ctZ8vWVj9pkd8lGVcLGW', 'student', 1, 1, 19292940, 2999731, 'male', 'b+', 'Bangladeshi', '1-693-263-3661', '26767 Darius Manor\nPort Kalliehaven, VT 17231-7134', 'Quia pariatur quo cupiditate cupiditate voluptatem qui. Debitis earum quidem quia ullam eum. Amet quos nulla dolorem eum.', 'https://lorempixel.com/640/480/?47363', 1, 15, 'UKcJQLx0YN', '2019-06-01 14:34:15', '2019-06-01 16:36:28', 10, NULL, NULL, NULL, NULL),
(144, 'Frank Schulist MD', 'glenna.klein@example.org', '$2y$10$bGnpzCFoevrxIO9mL8df4.KyhHkSBVFr4xt7.4IzPg8xdLoWM3TZm', 'student', 1, 1, 19292940, 7469696, 'female', 'b+', 'Bangladeshi', '825-342-9485 x05559', '797 Winston Springs\nLake Makayla, DE 86747', 'Amet sunt eius eum et fugit. Qui animi rerum fuga iusto maiores nihil id. Dolorem exercitationem inventore sit recusandae a.', 'https://lorempixel.com/640/480/?77706', 1, 7, 'PC2WZ3QIzw', '2019-06-01 14:34:15', '2019-06-01 16:36:28', 4, NULL, NULL, NULL, NULL),
(145, 'Dianna Tromp', 'zborer@example.com', '$2y$10$i4BdaV1dEyABgJh7zrCQouTCd3mu92BaXZG/AX2zkMo/d0bMkE6/6', 'student', 1, 1, 19292940, 2751450, 'male', 'ab', 'Bangladeshi', '1-901-694-1662 x06259', '585 Grace Stream Apt. 462\nWeissnatchester, KS 78872-3869', 'Et maiores repudiandae architecto amet. In veritatis enim repellendus qui illo ab. Molestiae quis voluptate harum eos odit qui veniam enim.', 'https://lorempixel.com/640/480/?37891', 1, 14, 'Mz71QWaPmI', '2019-06-01 14:34:15', '2019-06-01 16:36:28', 8, NULL, NULL, NULL, NULL),
(146, 'Jensen Jacobs', 'jast.jazmin@example.com', '$2y$10$t.gWkPRwzWpXucz7b5Op9u02F04D2BSTv9ogLbdI7Wj4S.XbLtOGe', 'student', 1, 1, 19292940, 2558919, 'male', 'o+', 'Bangladeshi', '686-263-8746 x1058', '919 Herminia Cliffs\nWest Aiden, CO 05122-2864', 'Velit natus libero repellat est velit quia est qui. Est voluptatem iusto perspiciatis aut. Aut occaecati omnis veniam mollitia dolor aut.', 'https://lorempixel.com/640/480/?93651', 1, 18, '6xUqbIMmA5', '2019-06-01 14:34:15', '2019-06-01 16:36:28', 3, NULL, NULL, NULL, NULL),
(147, 'Jaime Wuckert', 'oberbrunner.retta@example.net', '$2y$10$PcsdgkeLoP4Kk57KJ7w.feF1jYuHaohizHLEnz81lknCvIw.wrZy.', 'student', 1, 1, 19292940, 4954080, 'female', 'a+', 'Bangladeshi', '806.231.7908', '11187 O\'Conner Union Apt. 531\nPort Jadechester, OK 19298-5630', 'Possimus voluptatem nulla velit explicabo corporis fugit. Ut occaecati ducimus itaque vitae quisquam id itaque vel. Ullam quia omnis quidem iure est eos.', 'https://lorempixel.com/640/480/?65993', 1, 19, 'CC1CfqA7tl', '2019-06-01 14:34:15', '2019-06-01 16:36:28', 10, NULL, NULL, NULL, NULL),
(148, 'Prof. Maeve Baumbach V', 'iwisozk@example.net', '$2y$10$1VvvlaO7OlcX.JTg5C60t.QQdgDTB8cy3y9nr5jfak5f5pMh3iWOy', 'student', 1, 1, 19292940, 2182996, 'female', 'o+', 'Bangladeshi', '395-928-4815', '936 Rasheed Bridge\nJosefamouth, FL 98030', 'Minus optio occaecati tenetur. Nulla et quia quae nulla aliquam. Qui enim quos vel eos.', 'https://lorempixel.com/640/480/?22173', 1, 19, 'pfvqI8KEfe', '2019-06-01 14:34:15', '2019-06-01 16:36:29', 4, NULL, NULL, NULL, NULL),
(149, 'April Kutch', 'smraz@example.com', '$2y$10$z1ETppaJMkuhwxBt6IHN3OIKREhfMSSCSSB43H.F.wJBX27VlZQpq', 'student', 1, 1, 19292940, 2600266, 'female', 'b+', 'Bangladeshi', '+1-741-580-5735', '1146 Sandrine Stravenue Suite 058\nLiamburgh, RI 90579', 'Et labore quia id qui quod corporis quae. Laborum vel architecto nesciunt quod et omnis quis et. Deserunt suscipit unde aperiam occaecati doloribus.', 'https://lorempixel.com/640/480/?69667', 1, 11, 'fedu6Fu8ln', '2019-06-01 14:34:15', '2019-06-01 16:36:29', 1, NULL, NULL, NULL, NULL),
(150, 'Jeanette Volkman', 'larkin.alysa@example.org', '$2y$10$GgbmgIYNrqFS4t7mFx2zxu/1EJZcZxtA/1iJWJjf12sLMmRPJYygi', 'student', 1, 1, 19292940, 8823318, 'female', 'o+', 'Bangladeshi', '326.581.8086', '51099 Farrell Plains Apt. 290\nEmmetshire, NY 77184', 'Aut ex maxime nam aut. Sed a iste nihil excepturi. Enim excepturi placeat incidunt sunt omnis rerum quas.', 'https://lorempixel.com/640/480/?86828', 1, 7, '193BgnQDxl', '2019-06-01 14:34:15', '2019-06-01 16:36:29', 7, NULL, NULL, NULL, NULL),
(151, 'Jaime Pfannerstill I', 'garland45@example.org', '$2y$10$2O5q3JdrAnZOGjPmnkM0zelmGs/4Xf8NnHFm99SCPGxFIxk8l1uti', 'student', 1, 1, 19292940, 1424986, 'male', 'ab', 'Bangladeshi', '(884) 627-0642 x171', '401 Hoeger Station Apt. 244\nSouth Haskellchester, CO 72430', 'Magni molestiae ipsum et cum fugit. Qui numquam et ea ad sapiente. Necessitatibus aut quis molestias quibusdam consequuntur harum ut.', 'https://lorempixel.com/640/480/?91907', 1, 4, 'kmrf9s71nL', '2019-06-01 14:34:15', '2019-06-01 16:36:29', 10, NULL, NULL, NULL, NULL),
(152, 'Delta Raynor', 'peter.larkin@example.net', '$2y$10$FmYS7jldsnoqj22Jx8aeGuC9FJGdYFaad1o//B9rloAJbQ0i6hgZ.', 'student', 1, 1, 19292940, 9302349, 'female', 'o+', 'Bangladeshi', '1-823-231-5785 x16546', '6866 Von Locks Suite 931\nNew Maxinebury, CT 58222', 'Aut et quaerat est earum dolores eum. Et sint nemo autem eos blanditiis quidem consequatur ut. Sunt aliquid voluptate deleniti.', 'https://lorempixel.com/640/480/?87079', 1, 12, 'NobVIQuS2j', '2019-06-01 14:34:15', '2019-06-01 16:36:29', 3, NULL, NULL, NULL, NULL),
(153, 'Ms. Eleanora Reinger', 'mayert.ava@example.org', '$2y$10$eDbMcZ4EIfSo3.pALFhjUOtYf0NTx2g/q9dbxAlofMr5H0c0EMIJO', 'student', 1, 1, 19292940, 7190901, 'male', 'o+', 'Bangladeshi', '1-331-824-6713', '5231 Fisher Circles\nSouth Narcisoshire, LA 48281-9289', 'Dolor ullam nulla quos eum veniam eaque. Harum ea delectus odio. Ad at sed ipsa.', 'https://lorempixel.com/640/480/?37657', 1, 14, 'rUtLwKY7Qw', '2019-06-01 14:34:15', '2019-06-01 16:36:29', 5, NULL, NULL, NULL, NULL),
(154, 'Blake Cartwright', 'kaci00@example.net', '$2y$10$UY4UIE1nSlwZKL079D7YbeRs3z0gv33IfNzgx0xI/KuOq0RAgA0Mi', 'student', 1, 1, 19292940, 7259576, 'female', 'ab', 'Bangladeshi', '1-972-967-0553', '1511 Hilton Groves\nWaterston, NV 42515-4859', 'Adipisci quibusdam molestias rerum cum aut ea. Rerum ut voluptate error. Sequi ut corporis natus eos sit.', 'https://lorempixel.com/640/480/?75966', 1, 13, 'k0J2HLxX7m', '2019-06-01 14:34:15', '2019-06-01 16:36:29', 1, NULL, NULL, NULL, NULL),
(155, 'Teresa Hermiston', 'conroy.zella@example.net', '$2y$10$4gSJjrIVsc.WqYxoIX78XOqMWupCSUIvP7ZXXqtCbO7Y6ZRbxPVV6', 'student', 1, 1, 19292940, 9054147, 'female', 'b+', 'Bangladeshi', '695.708.6359 x0708', '8418 Angie Dam Apt. 726\nViviennetown, NV 24208-4716', 'Est est eum qui sint est qui quibusdam. Vel et ea molestias omnis ut et hic error. Perspiciatis fuga a a et sed ut et.', 'https://lorempixel.com/640/480/?60370', 1, 7, 'dlplc1ciCb', '2019-06-01 14:34:16', '2019-06-01 16:36:29', 10, NULL, NULL, NULL, NULL),
(156, 'Dr. Annabelle Pacocha V', 'hattie.wilkinson@example.net', '$2y$10$rigf.WF7Wt2Da1gZZVsiQOYy1TpgVprelybIIfAT52TnteDCQbZO6', 'student', 1, 1, 19292940, 5061278, 'female', 'b+', 'Bangladeshi', '+17789269557', '241 Hailey Court Apt. 965\nCarterchester, TX 23684', 'Quaerat unde consequuntur rerum tenetur voluptatem optio. Dolores ea adipisci quo asperiores aut iusto. Et sit ipsa asperiores rerum officia veritatis.', 'https://lorempixel.com/640/480/?71483', 1, 7, 'puT7HwVtxf', '2019-06-01 14:34:16', '2019-06-01 16:36:30', 4, NULL, NULL, NULL, NULL),
(157, 'Quentin Tremblay', 'ncartwright@example.net', '$2y$10$wvsdNlayTQp4UcrP787tK.U5dhguQPtff0Zn9L0sGj0leqV1d5XcW', 'student', 1, 1, 19292940, 2998333, 'female', 'a+', 'Bangladeshi', '630.840.0384 x097', '728 Sophie Turnpike Apt. 019\nSavionview, CT 35454-3529', 'Consequuntur cum neque et impedit quae excepturi unde. Nulla eligendi quos aliquam nisi voluptas aut. Ut unde et aut dolores itaque.', 'https://lorempixel.com/640/480/?81879', 1, 1, 'uVJrrUKoy9', '2019-06-01 14:34:16', '2019-06-01 16:36:30', 7, NULL, NULL, NULL, NULL),
(158, 'Lauryn Considine', 'ezra.kunze@example.com', '$2y$10$hWvD2XOnRPjBY63ZeOF49OczRJM85nh3O5mv1N.0VBvLqHi2gS8JO', 'student', 1, 1, 19292940, 4416671, 'female', 'o+', 'Bangladeshi', '+1 (885) 255-1709', '86277 Jarret Rest Apt. 246\nNorth Stephanieport, CA 02815-7911', 'Ut in nobis alias laborum repellendus consequatur. Nesciunt minus eaque aut rerum. Nobis nam illo nam inventore.', 'https://lorempixel.com/640/480/?75665', 1, 17, 'QFVFFpjYYt', '2019-06-01 14:34:16', '2019-06-01 16:36:30', 7, NULL, NULL, NULL, NULL),
(159, 'Alexane Bailey', 'wyman.rasheed@example.com', '$2y$10$NBeVumdytJO4Zh0cJbzSpOWy27LbKiFEz20aV3a2MpGPmf2ERGeKO', 'student', 1, 1, 19292940, 5741649, 'female', 'b+', 'Bangladeshi', '1-348-567-0054', '7740 Troy Street\nRunolfsdottirbury, NY 53703', 'Consequatur voluptatem culpa dolore quis quis. Voluptatem qui accusantium temporibus. Minus autem voluptatem vitae totam molestiae ut.', 'https://lorempixel.com/640/480/?93419', 1, 14, '62WyaFXG1e', '2019-06-01 14:34:16', '2019-06-01 16:36:30', 8, NULL, NULL, NULL, NULL),
(160, 'Nayeli Jast', 'aupton@example.org', '$2y$10$A1/MlvZlKaKjuu7uoZwfge6J28ynuWvL3SRZZ8NAltv7BVZ8swiVe', 'student', 1, 1, 19292940, 1866071, 'female', 'a+', 'Bangladeshi', '1-669-791-3918', '225 Celine Crescent\nLangworthborough, ID 60353-0479', 'Accusantium voluptates voluptatem laborum modi incidunt debitis. Sit aliquam delectus autem beatae. Quia dicta qui sint qui quis nihil suscipit suscipit.', 'https://lorempixel.com/640/480/?96260', 1, 15, 'FfCA2x0CVG', '2019-06-01 14:34:16', '2019-06-01 16:36:30', 2, NULL, NULL, NULL, NULL),
(161, 'Ressie Murphy', 'orpha70@example.com', '$2y$10$GWWDJFRRqsIvYJSoNRD3zuU0iRExV8V136t9G.BxmQhnHxN0S1b.y', 'student', 1, 1, 19292940, 3663374, 'male', 'a+', 'Bangladeshi', '515.808.5983', '87516 Haley Cliff\nNorth Lulu, CO 82546-0424', 'Voluptatem harum numquam explicabo ipsam omnis optio. Facere optio eaque accusamus nisi saepe veritatis perferendis iusto. Qui in nobis voluptatem consequatur ipsa.', 'https://lorempixel.com/640/480/?39070', 1, 8, 'sCzPvMukAj', '2019-06-01 14:34:16', '2019-06-01 16:36:30', 5, NULL, NULL, NULL, NULL),
(162, 'Mr. Louvenia Wolff', 'vkreiger@example.com', '$2y$10$82eLBhkL/KcZwpIzfUMgS.6INfkxtS7nw/Kh7kxaJpE1IiIKsas6O', 'student', 1, 1, 19292940, 8516451, 'male', 'a+', 'Bangladeshi', '471-736-3684 x096', '64637 Alexie Ridge\nLake Estellaton, VT 88739', 'Iusto totam sint impedit quis facilis doloremque excepturi quisquam. Non excepturi laboriosam rerum in dolore eius. Eum sunt id molestiae omnis et qui et.', 'https://lorempixel.com/640/480/?99917', 1, 14, 'znbXcaySFI', '2019-06-01 14:34:16', '2019-06-01 16:36:30', 1, NULL, NULL, NULL, NULL),
(163, 'Jalon Berge', 'yost.margaret@example.net', '$2y$10$GUHwFv3ASRfsxeNzGcQTi.spl48sifstmxDrkKEYHKHzuPTioghQK', 'student', 1, 1, 19292940, 7609450, 'female', 'b+', 'Bangladeshi', '912.314.1539 x648', '2676 McKenzie Harbors\nWyattton, VA 92420', 'Laborum illo praesentium ea modi reiciendis modi eum repellat. Amet dicta molestiae unde facilis. Et nostrum in vel dolorem ad fugiat omnis.', 'https://lorempixel.com/640/480/?87816', 1, 3, '35cc6rKO0v', '2019-06-01 14:34:16', '2019-06-01 16:36:31', 5, NULL, NULL, NULL, NULL),
(164, 'Wayne Kutch', 'tyundt@example.net', '$2y$10$KhyQQgLRSVYIWZ5Tft/BEuIrGRbaTkbTCfTcp6PLA6.UydK166arm', 'student', 1, 1, 19292940, 3236655, 'female', 'ab', 'Bangladeshi', '+12085753749', '192 Schneider Crest Suite 324\nHodkiewiczfurt, MS 12114', 'Et fugit et natus voluptas repellat. Veniam quo nobis tenetur modi ipsum. Reprehenderit corrupti consequatur qui et vel.', 'https://lorempixel.com/640/480/?44303', 1, 11, '4AjqyepSMA', '2019-06-01 14:34:16', '2019-06-01 16:36:31', 7, NULL, NULL, NULL, NULL),
(165, 'Mrs. Michelle Hoeger', 'avis.stamm@example.net', '$2y$10$3Ty1iXT9aUMAFPxqsD1Uau0uP.A7rAEsQINbBS6TPTpom5mP5qTMe', 'student', 1, 1, 19292940, 9318423, 'male', 'ab', 'Bangladeshi', '(396) 571-5382 x746', '26511 Julius Shoals\nVerniceside, AK 00304-8920', 'Molestiae modi iste necessitatibus et dolorum. Officia incidunt tenetur praesentium ea in ipsum recusandae et. Velit et repellat nihil sed provident aliquam aut deleniti.', 'https://lorempixel.com/640/480/?38106', 1, 17, 'sWv6PWdLNT', '2019-06-01 14:34:16', '2019-06-01 16:36:31', 6, NULL, NULL, NULL, NULL),
(166, 'Danny Corkery I', 'samara27@example.net', '$2y$10$eM.uaEowT65GpAz0voC3nucgmTvUxT9LAxqXZoDfHT8iAZA6ZQBYe', 'student', 1, 1, 19292940, 1667089, 'female', 'ab', 'Bangladeshi', '(328) 899-0125 x6174', '147 Adalberto Unions\nPort Earnestfurt, KY 37701', 'Et est atque qui dolorem. Dolorem sit necessitatibus sed minus. Est nesciunt et nihil nihil qui.', 'https://lorempixel.com/640/480/?94485', 1, 8, 'N7nG36T1zb', '2019-06-01 14:34:16', '2019-06-01 16:36:31', 7, NULL, NULL, NULL, NULL),
(167, 'Hertha Wuckert', 'joannie87@example.net', '$2y$10$gnn.tccci0sj2xPeRzKDNeAkfZO1r0enNU1nGJCaRSALeAEv9qlE6', 'student', 1, 1, 19292940, 6159137, 'female', 'o+', 'Bangladeshi', '401.838.5528 x6952', '818 Spinka Prairie Apt. 650\nLittelbury, NH 34484-5447', 'Enim modi sunt omnis illo et non. Ut exercitationem repudiandae expedita sequi. Unde voluptas labore consectetur velit sunt odit.', 'https://lorempixel.com/640/480/?85042', 1, 14, 'TnWkkwrr96', '2019-06-01 14:34:16', '2019-06-01 16:36:31', 4, NULL, NULL, NULL, NULL),
(168, 'Ruby Barrows', 'lorine.feest@example.net', '$2y$10$dcXLmdBcst/HTQqZz7ZVb.5OASmHMJHp3S0BU0vVw8/s5mzXOr3t.', 'student', 1, 1, 19292940, 4433065, 'male', 'ab', 'Bangladeshi', '1-923-546-6733 x73834', '499 Zachery Ridges Suite 582\nMarcosport, VT 51780-5884', 'Quo delectus deleniti velit id consequatur voluptates qui. Porro quas quia consequuntur consequatur labore iusto consequatur. Aut itaque omnis iure et asperiores.', 'https://lorempixel.com/640/480/?35850', 1, 18, 'oF55bqLXTW', '2019-06-01 14:34:17', '2019-06-01 16:36:31', 10, NULL, NULL, NULL, NULL),
(169, 'Prof. Robin Schaefer', 'qklocko@example.org', '$2y$10$Ghr4LPlOTaCVB1iTiOy.xuTZuOdR4Kca18akOZDnFhV1x4IPEwkLW', 'student', 1, 1, 19292940, 4216296, 'female', 'o+', 'Bangladeshi', '552-240-7544', '1145 Johnpaul Keys\nEast Annamae, TN 02038-9763', 'Ipsum hic occaecati optio porro aliquam. Quis et magnam voluptatem et. Sunt iure quaerat quia.', 'https://lorempixel.com/640/480/?75286', 1, 4, 'ZiXOKMoh78', '2019-06-01 14:34:17', '2019-06-01 16:36:31', 3, NULL, NULL, NULL, NULL),
(170, 'Halie Hermiston', 'sid.deckow@example.org', '$2y$10$RhcQGb7pRfmJb6DBQJyKI.l91/gQS7Tpto4xRYVs1gZKbf0AE1Kzy', 'student', 1, 1, 19292940, 8860018, 'male', 'o+', 'Bangladeshi', '1-713-218-1747 x4804', '70232 Cornelius Wells\nPort Delphine, TN 48927', 'Optio repellendus et minus aliquam natus minima et. Vel aut facere quo velit tenetur odio ea. Aut magnam eum et et corrupti tempora aliquid.', 'https://lorempixel.com/640/480/?32509', 1, 5, 'f71iXZB1hq', '2019-06-01 14:34:17', '2019-06-01 16:36:31', 6, NULL, NULL, NULL, NULL),
(171, 'Carmelo Feil', 'cronin.ardith@example.com', '$2y$10$LGdCCO4sg8VyfDFZq5Hm7Okttxpq3Rqf2hXauRyjsblBx/jyHLj06', 'student', 1, 1, 19292940, 7497975, 'male', 'b+', 'Bangladeshi', '932.881.5729', '9117 Ortiz Islands\nRobbbury, CT 23352', 'Quisquam saepe ducimus incidunt ratione numquam. Ea nostrum ex harum. A praesentium ut placeat dolores.', 'https://lorempixel.com/640/480/?33180', 1, 18, 'BgkeIU9569', '2019-06-01 14:34:17', '2019-06-01 16:36:32', 1, NULL, NULL, NULL, NULL),
(172, 'Michelle Bednar', 'selmer77@example.org', '$2y$10$uFGYigjHnUGAYE6kcbhfBOWkjEZFvPRYHzJu.SQ0NCPGdz3qiEXh.', 'student', 1, 1, 19292940, 3668628, 'female', 'ab', 'Bangladeshi', '1-693-232-0218 x6232', '903 Schowalter Ramp Apt. 444\nNew Arturomouth, MI 82083-3860', 'Commodi id enim blanditiis. Nulla sed doloribus explicabo debitis quae. Voluptatem omnis omnis ut aut placeat.', 'https://lorempixel.com/640/480/?58223', 1, 13, 'vA0oiNAOiR', '2019-06-01 14:34:17', '2019-06-01 16:36:32', 4, NULL, NULL, NULL, NULL),
(173, 'Naomi Vandervort', 'henry.torp@example.com', '$2y$10$kJNf284ZBEAjJVhy5TtHTe5T1e6ELLzAAWDgFrNctx25xbSdnhWt6', 'student', 1, 1, 19292940, 9578296, 'female', 'ab', 'Bangladeshi', '1-227-287-6350 x19320', '743 Guy Route\nNorth Katarina, KS 70226-1682', 'In eos nesciunt cum. Repellat consequatur qui facere sequi cumque enim minima. Labore esse expedita aut illum.', 'https://lorempixel.com/640/480/?92123', 1, 11, 'VuHql0Sx5d', '2019-06-01 14:34:17', '2019-06-01 16:36:32', 10, NULL, NULL, NULL, NULL),
(174, 'Dr. Nicholas Lehner', 'selina.rice@example.com', '$2y$10$XXSkVTgrDS2CWJWTzbpxM.gOmoG/qYQXFCZnxuIomf2EeczPNrO3C', 'student', 1, 1, 19292940, 4708129, 'male', 'o+', 'Bangladeshi', '1-537-970-0247 x09123', '96304 Shanahan Key\nWest Phyllis, MN 34593-1254', 'Eius voluptates nobis culpa hic recusandae qui. Dolor earum molestiae id et explicabo non quia. Facilis odit eos soluta omnis consequatur nesciunt.', 'https://lorempixel.com/640/480/?10483', 1, 16, 'qiEXsyG5t7', '2019-06-01 14:34:17', '2019-06-01 16:36:32', 6, NULL, NULL, NULL, NULL),
(175, 'Dudley Hand IV', 'neal.zemlak@example.net', '$2y$10$2rQPC3Mj87nzNPPmY9TnM.S1YLZJnXBMnPqDba9GtedsYeLBcFR7m', 'student', 1, 1, 19292940, 7801638, 'male', 'a+', 'Bangladeshi', '1-274-684-2072', '168 Anna Meadows\nNew Venashire, CT 92409-5193', 'Cupiditate eius necessitatibus modi quia. Consequatur assumenda id qui laborum error. Quia totam quae excepturi eveniet dolores.', 'https://lorempixel.com/640/480/?20078', 1, 6, 'BZNTKNEh7F', '2019-06-01 14:34:17', '2019-06-01 16:36:32', 3, NULL, NULL, NULL, NULL),
(176, 'Jermaine Abernathy', 'ukonopelski@example.net', '$2y$10$7MttZod7c/46lLU2hEVXcOvy5TS7emhXBq7qX.CAFDTVzvAQFFk/6', 'student', 1, 1, 19292940, 5924101, 'female', 'b+', 'Bangladeshi', '1-437-393-9076', '902 Lubowitz Hill Apt. 886\nSchambergerland, WA 98252', 'Consectetur officia temporibus qui magni et ea ea aut. Optio quidem vel ut fugit incidunt. Ut voluptatem voluptas rem molestias aut.', 'https://lorempixel.com/640/480/?94822', 1, 5, 'kmHwI6gA8s', '2019-06-01 14:34:17', '2019-06-01 16:36:32', 1, NULL, NULL, NULL, NULL),
(177, 'Prof. Ralph Halvorson II', 'wilber.donnelly@example.com', '$2y$10$G2qsEzyltMlqhVCL3qPtYeq09.PkcFHVHT3d3Iv3AuHHEJDbrwbSe', 'student', 1, 1, 19292940, 96476, 'male', 'ab', 'Bangladeshi', '+1 (991) 979-1540', '418 Solon Roads Suite 903\nEast Kaitlin, UT 93896', 'Itaque dolorem accusantium optio et. Est quisquam molestiae esse ea fugit quasi. Eveniet voluptas autem architecto iure.', 'https://lorempixel.com/640/480/?43695', 1, 20, 'qOefSC7mdG', '2019-06-01 14:34:17', '2019-06-01 16:36:32', 3, NULL, NULL, NULL, NULL),
(178, 'Dr. Devyn Lynch Sr.', 'rosalinda02@example.com', '$2y$10$B8n2Js/BPCOJ1uCAxVgYV.JFHT60dWy6qlCY74aBCSX/GzTzQdXoa', 'student', 1, 1, 19292940, 6345279, 'male', 'a+', 'Bangladeshi', '(690) 743-1844 x375', '32206 Rath Glen\nGusmouth, NC 18594', 'Repudiandae ea distinctio perferendis laborum dolor quisquam eligendi. Odio quis quae doloremque. Molestiae pariatur et corporis vitae reprehenderit magnam.', 'https://lorempixel.com/640/480/?86711', 1, 2, 'rDG8lL98DR', '2019-06-01 14:34:17', '2019-06-01 16:36:33', 2, NULL, NULL, NULL, NULL),
(179, 'Prof. Oliver Jacobi Sr.', 'egorczany@example.org', '$2y$10$2vH9efACJu1NkDQSP56va.ScxOhmdg/ISoytN.//SzMa5FN0DAFq2', 'student', 1, 1, 19292940, 2843681, 'female', 'ab', 'Bangladeshi', '602-489-2256 x25005', '432 Ola Route\nEast Ramon, KS 82304', 'Quasi ipsam omnis dolore labore repellat quae corrupti. Officia libero non atque modi sit ab. Quo velit ducimus quod consequatur laboriosam.', 'https://lorempixel.com/640/480/?35020', 1, 15, '1qmnPSt5Fd', '2019-06-01 14:34:17', '2019-06-01 16:36:33', 3, NULL, NULL, NULL, NULL),
(180, 'Eula Braun', 'dion.dibbert@example.net', '$2y$10$oSHGZA3u1tg4JD4cbkE0oOuIYrILJButF5A0BKsd9K9AwacSMvSOK', 'student', 1, 1, 19292940, 8113986, 'female', 'a+', 'Bangladeshi', '+1 (243) 665-4332', '701 Veum Run Apt. 539\nPort Samantha, TN 72448-3911', 'Pariatur nihil quia sit modi ut. Aut voluptas quibusdam vel. Veniam id fugit quia voluptatem.', 'https://lorempixel.com/640/480/?69509', 1, 13, '5hXoHaAb7X', '2019-06-01 14:34:17', '2019-06-01 16:36:33', 10, NULL, NULL, NULL, NULL),
(181, 'Mr. Koby Sauer', 'okuneva.estrella@example.net', '$2y$10$bYpyaCG0J.nESfGhVPJigu.ommebKGmxDTvyyDIc4HXhTkBpZ8Ko2', 'student', 1, 1, 19292940, 8865893, 'male', 'b+', 'Bangladeshi', '+1-607-222-5767', '93312 Rogelio Rest\nNyamouth, KS 23683', 'Repudiandae est et voluptates doloremque excepturi. Voluptas molestiae fugiat ducimus repudiandae adipisci magni. Et commodi est voluptatem dolorem enim aut.', 'https://lorempixel.com/640/480/?48381', 1, 2, 'MaHA3tTNMS', '2019-06-01 14:34:17', '2019-06-01 16:36:33', 7, NULL, NULL, NULL, NULL),
(182, 'Emily Glover', 'jalen18@example.com', '$2y$10$Xm8UwvfjkX887vYUOukTbeGFvbsXfrARtiowyds9dCpQxN2g5DbSi', 'student', 1, 1, 19292940, 5295389, 'female', 'a+', 'Bangladeshi', '(312) 243-5386 x7879', '513 Mann Port\nWest Verlaburgh, TN 21590', 'Eius quia temporibus earum voluptas earum. Sed quis ut id dolor nostrum. Sequi sunt in consequuntur.', 'https://lorempixel.com/640/480/?28357', 1, 6, 'YrsDOJhlbB', '2019-06-01 14:34:18', '2019-06-01 16:36:33', 5, NULL, NULL, NULL, NULL),
(183, 'Jameson Reilly', 'syble.gerlach@example.net', '$2y$10$4Q2zJ1LZ9IOx7fmpGmBHGuA3UCjg0t2KuGexDSUV42L80EL5.E.gG', 'student', 1, 1, 19292940, 8509015, 'female', 'ab', 'Bangladeshi', '+1.971.763.5248', '94219 Breitenberg Rapid Suite 873\nPowlowskihaven, AL 44730', 'Eos dolores delectus unde asperiores odit. Atque expedita eligendi et animi est eos vel. Fuga et odio est eos consequatur doloremque amet.', 'https://lorempixel.com/640/480/?12075', 1, 3, 'Ru35IqqmGO', '2019-06-01 14:34:18', '2019-06-01 16:36:33', 6, NULL, NULL, NULL, NULL),
(184, 'Gloria Ward', 'bergnaum.raegan@example.org', '$2y$10$HjG7rAb8vkCWgCyTkYRPYemreOQvvVsiO72kz67hdDR/iUIP8ac0a', 'student', 1, 1, 19292940, 7107327, 'female', 'b+', 'Bangladeshi', '+15279438355', '27921 Cristal Brook Apt. 088\nCormierview, IL 30807-5141', 'Ab harum voluptatibus corrupti dicta maiores veritatis totam. Voluptatem omnis vitae animi temporibus. Tempora fugit repellat cum culpa est ab amet.', 'https://lorempixel.com/640/480/?16540', 1, 20, '1JN3wDwgx1', '2019-06-01 14:34:18', '2019-06-01 16:36:33', 1, NULL, NULL, NULL, NULL),
(185, 'Emilio Wisoky DDS', 'lhuels@example.com', '$2y$10$YS/O/gGd0Qz8IhYMeZXrq.RT9V0wVYICKRwfTZgJXRdX4MHFOS..a', 'student', 1, 1, 19292940, 8662550, 'female', 'o+', 'Bangladeshi', '1-385-279-3737 x537', '11216 Nitzsche Plains\nEast Monte, MS 84050-5732', 'Qui et suscipit architecto sit deleniti. Accusamus sunt voluptatem ut cumque quia magnam ullam. Voluptates est omnis ut ut velit eos.', 'https://lorempixel.com/640/480/?94291', 1, 3, 'rlIvGdnQJf', '2019-06-01 14:34:18', '2019-06-01 16:36:34', 5, NULL, NULL, NULL, NULL),
(186, 'Dr. Justyn Brekke', 'bryan@example.org', '$2y$10$9aw.D.0/j7U0rZk0QB7b4OaQdlNJRuhCsVSUsY/OvRQWbyQCNjWIy', 'student', 1, 1, 19292940, 1386090, 'male', 'o+', 'Bangladeshi', '+1-895-747-4519', '846 Rowe Heights Apt. 163\nNew Joellemouth, AZ 45609-7413', 'Porro error aliquam laborum hic tempora. Incidunt eum odio mollitia aliquam voluptatibus est deleniti. Eaque optio placeat dolore repellat.', 'https://lorempixel.com/640/480/?90757', 1, 19, 'xGDfx3RHDr', '2019-06-01 14:34:18', '2019-06-01 16:36:34', 10, NULL, NULL, NULL, NULL),
(187, 'Kristofer Grant', 'ardith.hane@example.com', '$2y$10$D4ccXLPGy9OeezPXv6JO6uC5AbMHq1twqbKovXfs5bjRDk.Makqc6', 'student', 1, 1, 19292940, 799996, 'male', 'ab', 'Bangladeshi', '1-563-201-9180 x18489', '836 Towne Knolls Suite 091\nSouth Freddy, NM 33037', 'Sequi id est et magni. Quis dolores facere non quia error. Neque cumque dignissimos ipsum.', 'https://lorempixel.com/640/480/?10495', 1, 4, 'IKlk1rHrh4', '2019-06-01 14:34:18', '2019-06-01 16:36:34', 8, NULL, NULL, NULL, NULL),
(188, 'Destiney Koss PhD', 'carroll.lora@example.org', '$2y$10$ZMpbVkXjJncdYIxfUy8TUuKlCyqqnhzw.1HxCNxQV1Iid1CknME.C', 'student', 1, 1, 19292940, 6648604, 'female', 'a+', 'Bangladeshi', '(454) 854-3388 x767', '1664 Metz Center Apt. 745\nEast Abbey, NH 75589', 'Officia similique quo alias deleniti est dolor. Et ut et eaque commodi et. Natus in voluptatem ex.', 'https://lorempixel.com/640/480/?93571', 1, 15, 'CsQNUYeXCG', '2019-06-01 14:34:18', '2019-06-01 16:36:34', 8, NULL, NULL, NULL, NULL),
(189, 'Deshawn Barrows', 'schulist.chloe@example.org', '$2y$10$o3PuyG7cJ61Fw0Ac/aSyk.AyivbmosqettrhqKhi7QtCjLNUkTDM2', 'student', 1, 1, 19292940, 9360862, 'male', 'o+', 'Bangladeshi', '(573) 863-0121 x5978', '1393 Hackett Green\nAmirborough, IL 56268-2493', 'Consectetur expedita consectetur et vel quaerat nesciunt. Qui quibusdam maxime illo ea qui. Autem explicabo sequi tempore illum placeat at et natus.', 'https://lorempixel.com/640/480/?35310', 1, 9, 'pI4e8AUYsY', '2019-06-01 14:34:18', '2019-06-01 16:36:34', 9, NULL, NULL, NULL, NULL);
INSERT INTO `school_users` (`id`, `name`, `email`, `password`, `role`, `active`, `school_id`, `code`, `student_code`, `gender`, `blood_group`, `nationality`, `phone_number`, `address`, `about`, `pic_path`, `verified`, `section_id`, `remember_token`, `created_at`, `updated_at`, `department_id`, `stripe_id`, `card_brand`, `card_last_four`, `trial_ends_at`) VALUES
(190, 'Mr. Sherman Douglas Jr.', 'kathryne.hyatt@example.com', '$2y$10$bajSTSfnfVxefZc1LOWmuuXBe9zqfcN.nqzitRigllpQYpKGTYhp2', 'student', 1, 1, 19292940, 1714969, 'male', 'a+', 'Bangladeshi', '936-227-6520 x81517', '570 Grayson Estate Apt. 851\nIzabellaburgh, MO 83727-7004', 'Pariatur et aut quia dolor deserunt. Quia magni hic qui mollitia laudantium. Repellat rem qui in consequatur.', 'https://lorempixel.com/640/480/?27016', 1, 19, '7yihEQWt01', '2019-06-01 14:34:18', '2019-06-01 16:36:34', 10, NULL, NULL, NULL, NULL),
(191, 'Mr. Luigi Jenkins Jr.', 'verna.jenkins@example.org', '$2y$10$4Hy1t1lJRegbPz99mDnUHu9S9mV2KT/kecqTymklgEmnc3pke2Upe', 'student', 1, 1, 19292940, 1526225, 'female', 'b+', 'Bangladeshi', '272.807.4316 x703', '23363 Hettinger Parkway Suite 407\nPort Ileneton, AK 28434-6647', 'Maxime et magnam sit est. Ea modi quae eaque vitae veritatis sunt corrupti. Sunt omnis nesciunt in mollitia odio.', 'https://lorempixel.com/640/480/?90967', 1, 13, 'Ul7Wbr8HrH', '2019-06-01 14:34:18', '2019-06-01 16:36:34', 8, NULL, NULL, NULL, NULL),
(192, 'Meda Bernier', 'kautzer.kamron@example.org', '$2y$10$DObyKVtDa6BifvQXW8Ub4eydrxCXQDQBeu0D0/h7rDieyx2LE0Q1i', 'student', 1, 1, 19292940, 9351723, 'female', 'o+', 'Bangladeshi', '1-858-225-9848 x474', '626 Bogisich Prairie\nEast Omerfurt, KY 88552', 'Tempora est asperiores quia cum ut enim. Ut ut accusamus quis nisi corporis praesentium quas. Harum soluta sint accusantium esse qui.', 'https://lorempixel.com/640/480/?91167', 1, 14, 'fa0CbS4Rpl', '2019-06-01 14:34:18', '2019-06-01 16:36:35', 1, NULL, NULL, NULL, NULL),
(193, 'Danial Dibbert', 'lrogahn@example.net', '$2y$10$Br8ZFcHncXiOMgqAv88qd.CAWS.zxE6pXF.0EAvrZQMkx1.kZVeMS', 'student', 1, 1, 19292940, 3509305, 'male', 'o+', 'Bangladeshi', '1-440-908-7820', '95559 Pfeffer Brooks\nShannyside, LA 32508-4233', 'Praesentium repudiandae quis ipsum. Enim provident magnam distinctio similique quia neque. Aperiam tenetur facilis tempore atque doloribus.', 'https://lorempixel.com/640/480/?93436', 1, 10, '4VVdLf3Oqt', '2019-06-01 14:34:19', '2019-06-01 16:36:35', 4, NULL, NULL, NULL, NULL),
(194, 'Chelsey Green', 'vivianne.prosacco@example.com', '$2y$10$FgI1lmYtWth0.GN3pxJgeuYEjAFFW4hrpzC12V2uENatjJ3t7vFCa', 'student', 1, 1, 19292940, 3020383, 'male', 'a+', 'Bangladeshi', '(895) 389-7978 x2653', '39316 Hickle Ridge\nVolkmanview, MD 85407', 'Voluptatem id id non aspernatur nisi minus. Et sit ut nam similique. Ut doloribus ut delectus ab et at.', 'https://lorempixel.com/640/480/?24553', 1, 1, 'uUDnWq4LRa', '2019-06-01 14:34:19', '2019-06-01 16:36:35', 6, NULL, NULL, NULL, NULL),
(195, 'Dr. Kristoffer Conroy Sr.', 'vincent.swaniawski@example.net', '$2y$10$K/FqDRdaf6ZB8M.aVGJis.iHxcYuE9KuU.uu/tjEB97zcjVHiyUBi', 'student', 1, 1, 19292940, 2978664, 'male', 'b+', 'Bangladeshi', '(931) 416-0299 x49402', '30044 Sarah Cliff\nSouth Davidmouth, NM 74679', 'Commodi quia harum molestiae ut voluptatem voluptas quo. Quae quae quod quia corporis earum perspiciatis nesciunt. Officia sit reprehenderit incidunt reiciendis consequatur voluptas aut rerum.', 'https://lorempixel.com/640/480/?47765', 1, 10, 'cZS7RkBprU', '2019-06-01 14:34:19', '2019-06-01 16:36:35', 5, NULL, NULL, NULL, NULL),
(196, 'Dr. Madelynn Morar DVM', 'osinski.harrison@example.org', '$2y$10$GXN1ZbVISUIKti.nlRq5pOl5SbNKZ6A54dZlu0IXs/MaPkGRAyeBa', 'student', 1, 1, 19292940, 2835584, 'female', 'ab', 'Bangladeshi', '708.485.0802 x30499', '79508 Russel Canyon\nRaheemburgh, KS 25831-4873', 'Nostrum repudiandae eveniet sapiente possimus recusandae. Ex esse eum corporis maiores sunt. Ipsa reiciendis repellat sequi autem numquam.', 'https://lorempixel.com/640/480/?57733', 1, 17, 'poBBNwseV8', '2019-06-01 14:34:19', '2019-06-01 16:36:36', 2, NULL, NULL, NULL, NULL),
(197, 'Braulio Thompson I', 'xgrimes@example.net', '$2y$10$ytFxSQjutGyrHifehM/DX.F8tfUG6IJsbc9P.tuGcmTWAFMfMVzzu', 'student', 1, 1, 19292940, 5816089, 'female', 'o+', 'Bangladeshi', '(536) 739-9610', '90244 Kade Drives\nWalshmouth, IL 87660-9098', 'Illum amet error voluptas et et enim dolor. Laudantium quaerat est ut et ducimus eum. Sunt omnis ipsum numquam facere error quasi nemo quis.', 'https://lorempixel.com/640/480/?48736', 1, 6, 'v1VjGn9uVL', '2019-06-01 14:34:19', '2019-06-01 16:36:36', 3, NULL, NULL, NULL, NULL),
(198, 'Dereck Mertz', 'christelle61@example.org', '$2y$10$c7mDq4KkXeKQ8d7lsIi8yettq9u.dXsbQP0AZA0FIPfSPAMUyZ/wm', 'student', 1, 1, 19292940, 2563912, 'male', 'b+', 'Bangladeshi', '1-915-942-5658 x1140', '187 Eddie Shoal Apt. 374\nBricefurt, NY 22756', 'Tenetur sed aut distinctio dolorum. Veniam architecto dolore asperiores iure. Quis qui at amet fuga fuga.', 'https://lorempixel.com/640/480/?81363', 1, 10, 'gzoPGTfOM3', '2019-06-01 14:34:19', '2019-06-01 16:36:36', 7, NULL, NULL, NULL, NULL),
(199, 'Marc Crona', 'littel.hellen@example.com', '$2y$10$4p09hZRTQgrGuqwO.29Bt.3BO6qCbSuK1ohDDSytB3ognu0lQ.3kK', 'student', 1, 1, 19292940, 129052, 'female', 'o+', 'Bangladeshi', '+1-831-465-8312', '376 Strosin Parkway Suite 098\nEast Tiana, ND 92706', 'Quia et quisquam aliquam sed amet iusto. Possimus earum voluptates fuga voluptatem. Quibusdam veritatis corporis aliquam occaecati.', 'https://lorempixel.com/640/480/?66336', 1, 20, 'Lefhb7xvse', '2019-06-01 14:34:19', '2019-06-01 16:36:36', 8, NULL, NULL, NULL, NULL),
(200, 'Rusty Larson', 'hegmann.clint@example.net', '$2y$10$omXYIOMHjL/A41NEjgBl0OttEfuzd4UYfJPJAfltY5Q.3.ZWxopjG', 'student', 1, 1, 19292940, 7863246, 'male', 'b+', 'Bangladeshi', '826.902.9799 x693', '23854 Smith Throughway\nLake Annaliseville, MO 28979', 'Velit veritatis quis nostrum cumque repellat ea. A architecto sint minus ea qui rerum et nisi. In ratione delectus qui est nobis delectus accusamus.', 'https://lorempixel.com/640/480/?72613', 1, 4, 'vpo3mazKhL', '2019-06-01 14:34:19', '2019-06-01 16:36:36', 7, NULL, NULL, NULL, NULL),
(201, 'Orie Pollich PhD', 'letitia48@example.net', '$2y$10$HS227Eln3O20a5nZOuKdW.Jd1F0f/n3JZUIxHx4c9g.Jnl9NUD.k2', 'student', 1, 1, 19292940, 130753, 'male', 'b+', 'Bangladeshi', '475-607-1519', '569 Joel Streets Apt. 387\nLake Shanellehaven, KY 14755-7279', 'Officia libero qui ut blanditiis et eligendi omnis. Saepe non enim labore nostrum officia sed. Sed praesentium unde ut ut officiis et soluta.', 'https://lorempixel.com/640/480/?13064', 1, 2, 'jnwjh8lAiy', '2019-06-01 14:34:19', '2019-06-01 16:36:36', 6, NULL, NULL, NULL, NULL),
(202, 'Mr. Maxime Kuphal Jr.', 'rupert47@example.com', '$2y$10$dMqS.FjxQNryZ.G7/XaKdeWebKXg.oxTKJUcOg6WvK/FWbcVvUk1y', 'student', 1, 1, 19292940, 1565891, 'female', 'o+', 'Bangladeshi', '835.599.2211 x428', '640 Gulgowski Junction Suite 885\nHowardborough, OH 50465-6429', 'Eos eius tempora cumque. Pariatur ut iusto quia error nesciunt. Optio esse amet et vitae ullam soluta suscipit.', 'https://lorempixel.com/640/480/?22452', 1, 2, 'l2g8KHMqE9', '2019-06-01 14:34:19', '2019-06-01 16:36:36', 4, NULL, NULL, NULL, NULL),
(203, 'Laurine Turner', 'dbrown@example.net', '$2y$10$BJj5.3hU.nmmsFDJ1zli2uyIJgo60d76.E2zo7QbZM0ZpxNDH9q5u', 'student', 1, 1, 19292940, 2716167, 'male', 'a+', 'Bangladeshi', '(921) 573-1864', '1608 Kaden Village\nLake Jannie, AR 11592-9753', 'Amet corrupti nam ipsum voluptatem. Ad ipsa optio sit iure fugit voluptatem. Nihil quidem voluptatem non culpa voluptas odio.', 'https://lorempixel.com/640/480/?91791', 1, 13, 'vjaLtA1fGq', '2019-06-01 14:34:19', '2019-06-01 16:36:37', 1, NULL, NULL, NULL, NULL),
(204, 'Owen Padberg', 'romaguera.delta@example.net', '$2y$10$QrCjFGNMDT40P7aUfrakLebKidsIbN0M6NMchT413Z3T6aq/isiUy', 'student', 1, 1, 19292940, 5590269, 'female', 'o+', 'Bangladeshi', '220-897-0706', '93718 Hettinger Rest Suite 407\nNew Linnea, IL 05083', 'Sint quia commodi eveniet nobis placeat nulla. Tempore animi assumenda ea repellat. Quia maiores quidem voluptatibus ut nemo dolorem.', 'https://lorempixel.com/640/480/?80809', 1, 7, 'VBHn5eClMZ', '2019-06-01 14:34:19', '2019-06-01 16:36:37', 8, NULL, NULL, NULL, NULL),
(205, 'Mr. Vance Von Sr.', 'jward@example.net', '$2y$10$KLBHh9Y1Wlx4hUd7cP0OKuUcjEG98yCi1rMHFpsdg5b4JsuIekiLi', 'student', 1, 1, 19292940, 787651, 'female', 'o+', 'Bangladeshi', '1-638-961-6292 x003', '6497 Rohan Hill\nEast Meda, UT 03511', 'Sint earum quia qui consequatur voluptatum ut laboriosam dolor. Dolores doloribus autem quis esse qui id. Est inventore aut reprehenderit quisquam autem.', 'https://lorempixel.com/640/480/?12666', 1, 10, 'OTNQYYX1Yt', '2019-06-01 14:34:19', '2019-06-01 16:36:37', 1, NULL, NULL, NULL, NULL),
(206, 'Dorian Ondricka', 'octavia.kiehn@example.net', '$2y$10$KKJdLrziA.Q1R/nowadlYOm10GRTAfMrAn.vmbK8/gtbmCrLNqsZ2', 'student', 1, 1, 19292940, 9767591, 'female', 'ab', 'Bangladeshi', '556-858-1056 x483', '28094 Dax Fork Apt. 968\nNorth Carson, GA 95245-2061', 'Nemo illum et sunt omnis quod qui accusantium. Rem consequatur reiciendis culpa dolor quia. Voluptate soluta nemo et placeat provident nesciunt.', 'https://lorempixel.com/640/480/?94227', 1, 12, 'BWZ5NBtJqa', '2019-06-01 14:34:20', '2019-06-01 16:36:37', 2, NULL, NULL, NULL, NULL),
(207, 'Dewitt Abbott', 'whintz@example.com', '$2y$10$c6DIK20A/h9cwTG2Ob3Ziu7Aec/ocymSkrLM/c0puLeuSz./wsAt2', 'student', 1, 1, 19292940, 4603794, 'male', 'a+', 'Bangladeshi', '283.248.8778', '76691 Amy Meadow\nHaleystad, MD 33409', 'Nemo aliquid voluptas enim iste maiores doloribus. Vel sunt id ut. Molestiae veniam rerum libero dolores iure provident quis nisi.', 'https://lorempixel.com/640/480/?67383', 1, 11, 'H4GcmMcYAN', '2019-06-01 14:34:20', '2019-06-01 16:36:37', 9, NULL, NULL, NULL, NULL),
(208, 'Murphy Bernhard', 'cristobal.dickinson@example.org', '$2y$10$9tGQzT5LPzq.kVEhRzrO2u2XHq8ZMdB99yk62/iLjv5tZdRLUrC42', 'student', 1, 1, 19292940, 6343295, 'male', 'b+', 'Bangladeshi', '418-631-9395 x469', '7788 Dibbert Shoal Suite 848\nManteshire, SD 80313', 'Quaerat at quia beatae et. Non omnis est repudiandae exercitationem eos. Qui deleniti aut mollitia rem eius ea.', 'https://lorempixel.com/640/480/?15753', 1, 17, 'XtT79ANBBm', '2019-06-01 14:34:20', '2019-06-01 16:36:37', 7, NULL, NULL, NULL, NULL),
(209, 'Cristal Renner Sr.', 'verdie05@example.com', '$2y$10$eB4IIzaXX1ABnVu/7GeKBOw4tFaeooebti/rInh7UoDTA17Wj59tu', 'student', 1, 1, 19292940, 966638, 'male', 'a+', 'Bangladeshi', '1-773-332-4591', '91652 Koepp Light Suite 227\nPort Genesisside, CT 89223-0768', 'Et repellat sint commodi eligendi facere eos. Quod facilis esse autem nesciunt velit. Consequatur magnam est rem dignissimos rerum temporibus ut.', 'https://lorempixel.com/640/480/?52609', 1, 8, 'DuRaxmyWxa', '2019-06-01 14:34:20', '2019-06-01 16:36:37', 9, NULL, NULL, NULL, NULL),
(210, 'Marvin Medhurst', 'kuhic.daija@example.com', '$2y$10$uMInTtKdwe8vR03awzUtie8wUPDXvbYqUBynpqosSSjffB9VWE2QS', 'student', 1, 1, 19292940, 5675231, 'female', 'o+', 'Bangladeshi', '1-523-967-4584', '8202 Hoeger Course Apt. 893\nPort Jayde, DC 43413', 'Cupiditate sed aut eius sequi nemo est. Quae amet aut sit blanditiis ipsam facere tempore. Sed consequatur in esse aut.', 'https://lorempixel.com/640/480/?29504', 1, 8, 'pFP1djcdh4', '2019-06-01 14:34:20', '2019-06-01 16:36:38', 4, NULL, NULL, NULL, NULL),
(211, 'Jaime Corkery', 'maude74@example.org', '$2y$10$67tRduvntKYuRnMwtqCgseXrR2BBNNmUlI6D.relIUST899dTVokG', 'student', 1, 1, 19292940, 1517846, 'male', 'ab', 'Bangladeshi', '+17069433707', '9188 Littel Mission\nHolliemouth, NJ 23650', 'Eos at nulla qui libero praesentium rerum. Qui explicabo fugiat veritatis quibusdam deserunt amet. Sunt minus quia voluptatum non ut velit atque.', 'https://lorempixel.com/640/480/?38747', 1, 14, 'scDKZGoNlH', '2019-06-01 14:34:20', '2019-06-01 16:36:38', 1, NULL, NULL, NULL, NULL),
(212, 'Silas Bernier', 'lwest@example.net', '$2y$10$tgyfVJ304lVM3BCoXKB9beNAiO8IdB6dEQVXe6zqGq7JXXhy6KtlK', 'student', 1, 1, 19292940, 3108235, 'male', 'ab', 'Bangladeshi', '(290) 661-7936', '69127 Harvey Motorway\nCitlallihaven, LA 56969', 'Ab consequatur cupiditate ipsum consequatur quia cumque maiores. Et qui ad quisquam deserunt. Quia mollitia non similique quis.', 'https://lorempixel.com/640/480/?20656', 1, 8, 'VSBkdbAWdc', '2019-06-01 14:34:20', '2019-06-01 16:36:38', 4, NULL, NULL, NULL, NULL),
(213, 'Nina Okuneva Sr.', 'sritchie@example.org', '$2y$10$F..ADCkRmUSuJTiroaugCeNW4RnBk5sajBejQ1dQ9KY18eko2lZs.', 'student', 1, 1, 19292940, 2312455, 'female', 'a+', 'Bangladeshi', '234-304-4333 x82025', '48560 Gerhold Rest\nHandburgh, NY 48994-5439', 'Sed sint quo quo atque non. Exercitationem aut nobis autem temporibus assumenda. Sed qui porro tempore alias rem aliquid.', 'https://lorempixel.com/640/480/?10145', 1, 8, 'SIxniVJk1I', '2019-06-01 14:34:20', '2019-06-01 16:36:38', 4, NULL, NULL, NULL, NULL),
(214, 'Bobbie Langworth', 'qwaelchi@example.org', '$2y$10$4AmWItgtFCaSbBIqsXns7eaaW1HjJG2W8kbkc3aNMR5DRKgSoOX2e', 'student', 1, 1, 19292940, 180517, 'male', 'ab', 'Bangladeshi', '961-973-5099 x239', '748 Darien Center Suite 918\nEast Clotildehaven, OK 54641-1557', 'Ut beatae sit voluptas qui. Tempora omnis nobis quaerat. Soluta illo tempore maxime quia.', 'https://lorempixel.com/640/480/?34547', 1, 10, 'YszV3Yj9Rt', '2019-06-01 14:34:20', '2019-06-01 16:36:38', 7, NULL, NULL, NULL, NULL),
(215, 'Mr. Cleo Grimes', 'hodkiewicz.georgiana@example.org', '$2y$10$VbtHVN5jk/8T4Nn5I2HKj.WzVkP2gBTzRePobAKmHTKnmCQ4qsRn6', 'student', 1, 1, 19292940, 5276262, 'female', 'ab', 'Bangladeshi', '934.456.1005', '58508 Isobel Wall\nWest Amelie, AZ 63520', 'Enim quis veritatis minus eum dolores sint. Sapiente nihil incidunt repellendus voluptas aut. Non consequatur vitae modi consequatur accusamus.', 'https://lorempixel.com/640/480/?41126', 1, 15, '5hf84m5iLx', '2019-06-01 14:34:20', '2019-06-01 16:36:38', 2, NULL, NULL, NULL, NULL),
(216, 'Monte Reichert', 'vstanton@example.com', '$2y$10$JdYUvdzkQpYKVkccU396UeZIg1hHpfWASBjf2N/GtFZDbcNKXzQ8O', 'student', 1, 1, 19292940, 5947945, 'female', 'ab', 'Bangladeshi', '834.434.1866 x64987', '1059 Oswaldo Loop Suite 441\nNew Jayceefurt, AK 06942', 'Deleniti sed aperiam et adipisci necessitatibus et. Nobis consectetur animi dolorem facilis. Occaecati consequatur accusantium aut dolor ipsam error.', 'https://lorempixel.com/640/480/?26303', 1, 10, 'FCTGoIBJLq', '2019-06-01 14:34:20', '2019-06-01 16:36:38', 10, NULL, NULL, NULL, NULL),
(217, 'Dr. Jarrell Graham', 'olueilwitz@example.net', '$2y$10$XIha1SuiE9woe9jPWraLVeF9EG8pSOHXZ/Sx0eh9mHR2yBEbprbcC', 'student', 1, 1, 19292940, 3153699, 'male', 'o+', 'Bangladeshi', '223-539-6125', '206 Wilderman Flat\nNorth Gage, WA 49631-2407', 'Deleniti deserunt neque nihil placeat laborum et. Culpa quia ipsam veniam rerum aut consequatur distinctio. Enim laboriosam ipsum deleniti a.', 'https://lorempixel.com/640/480/?63866', 1, 12, 'yvqbjhKX1h', '2019-06-01 14:34:20', '2019-06-01 16:36:39', 1, NULL, NULL, NULL, NULL),
(218, 'Prof. Lilly Cormier', 'hackett.helga@example.net', '$2y$10$q56Xq3OjI5QD2lvCMK3MM.oypgaC0dXwIbWe0MBF69LNFO7b9g1km', 'student', 1, 1, 19292940, 1894122, 'female', 'a+', 'Bangladeshi', '570.518.3562', '63854 Maximilian Lodge\nSouth Valentinberg, WV 15760', 'Vel et perferendis vero qui quaerat quam. Esse ut rerum quas distinctio est at nihil rem. Qui velit vel eum nobis mollitia.', 'https://lorempixel.com/640/480/?60178', 1, 7, 'xf8V7DJLAh', '2019-06-01 14:34:21', '2019-06-01 16:36:39', 4, NULL, NULL, NULL, NULL),
(219, 'Prof. Arlo Yost II', 'gwendolyn.satterfield@example.com', '$2y$10$6QVcq8uj.S0MMRTCu00v3.6Phb2TYctfBUESv2iVsRjmqs2uzV2BW', 'student', 1, 1, 19292940, 3229132, 'male', 'a+', 'Bangladeshi', '647-853-4539 x727', '8787 Muller Points\nCummerataberg, KY 82446-8201', 'Cupiditate ut quod nemo autem ut debitis. Ut aut odit ipsa est. Quia et repellat eveniet quis voluptates dolorem cupiditate.', 'https://lorempixel.com/640/480/?89313', 1, 6, 'Dk5i3HLLzz', '2019-06-01 14:34:21', '2019-06-01 16:36:39', 7, NULL, NULL, NULL, NULL),
(220, 'Mr. Evans Stracke I', 'stan.weissnat@example.com', '$2y$10$At1NJDKrP6mUlo0yGjIHYudWObkVVR855uZ0gSYMN8PKR/R3OTewm', 'student', 1, 1, 19292940, 1583387, 'female', 'o+', 'Bangladeshi', '291-397-1485 x780', '591 Murphy Drives Suite 298\nKemmerhaven, AL 46357', 'Cum sint officia repellat numquam quis praesentium. Totam cumque necessitatibus repudiandae maiores quos autem. Hic fuga eos laudantium eos.', 'https://lorempixel.com/640/480/?33631', 1, 19, 'SNjns0Ulo5', '2019-06-01 14:34:21', '2019-06-01 16:36:39', 9, NULL, NULL, NULL, NULL),
(221, 'Keven Torphy', 'ybednar@example.com', '$2y$10$bLOVp9gc.bfUAkdY0RgGUe.12TdP/tWDfdfKsvsrB/etj3QOMnJlq', 'student', 1, 1, 19292940, 8559802, 'female', 'a+', 'Bangladeshi', '592-856-0474 x069', '853 Durgan Villages\nWest Elroy, ND 56638-3427', 'Saepe nostrum itaque quas. Deserunt delectus saepe eveniet est iste voluptatibus. Dignissimos tenetur animi dolorum officiis tenetur.', 'https://lorempixel.com/640/480/?48561', 1, 7, '5rGV5aSDlj', '2019-06-01 14:34:21', '2019-06-01 16:36:39', 1, NULL, NULL, NULL, NULL),
(222, 'Mr. Hester Watsica V', 'qrowe@example.net', '$2y$10$eHaharnkAQtfm.gQtCdUL.D4o4D6yRiumN0gGUasafrg0DnCdXJNq', 'student', 1, 1, 19292940, 2296336, 'female', 'ab', 'Bangladeshi', '484.524.9132 x601', '89023 Braun Brook Apt. 660\nTaureanmouth, NV 83511', 'Necessitatibus non laudantium velit omnis velit eum a ducimus. Minima omnis modi consequuntur quis ut. At facere expedita ut sit.', 'https://lorempixel.com/640/480/?84809', 1, 19, '2bQblZMvBc', '2019-06-01 14:34:21', '2019-06-01 16:36:39', 7, NULL, NULL, NULL, NULL),
(223, 'Wyatt Schmidt IV', 'prudence.mueller@example.net', '$2y$10$F.dSGMOBer70r80X7WuMLO/7hx21DEAP9GKbvDeZyfqCPXwQ7HBSu', 'student', 1, 1, 19292940, 5692661, 'male', 'a+', 'Bangladeshi', '879.774.1378 x1694', '82054 O\'Keefe Islands\nMohrfort, PA 29280', 'Sapiente adipisci atque alias pariatur quos est corporis qui. Ea et non iusto sapiente molestiae totam deserunt. Fugiat neque ea illo at.', 'https://lorempixel.com/640/480/?88681', 1, 1, 'CnqzfXb1Yv', '2019-06-01 14:34:21', '2019-06-01 16:36:40', 9, NULL, NULL, NULL, NULL),
(224, 'Ahmed Gleichner', 'xschowalter@example.org', '$2y$10$EU9Yv3i79LK2UaUMhaxkOeTMiOaPJwJv0pnPwt3jXMA8HVhKMG/9K', 'student', 1, 1, 19292940, 5154050, 'male', 'b+', 'Bangladeshi', '493.685.9314', '89735 Kolby Motorway\nMartyport, NM 71011', 'Consequatur vitae similique sed blanditiis. Sapiente qui ut ab debitis. Est odio quaerat ut consequatur ut cupiditate voluptates.', 'https://lorempixel.com/640/480/?64774', 1, 1, 'F5Q2mF92TS', '2019-06-01 14:34:21', '2019-06-01 16:36:40', 10, NULL, NULL, NULL, NULL),
(225, 'Adan Reinger', 'willms.hosea@example.net', '$2y$10$626mdgCaVYeGro1tAIn3weLLQ7bzhMRRwe87D2EgbHxx1flzWSD6G', 'student', 1, 1, 19292940, 1365815, 'male', 'o+', 'Bangladeshi', '320-405-0193 x297', '646 Raymundo Light Suite 125\nCorkeryland, TX 66163-1645', 'Recusandae repellat enim deserunt illum. Blanditiis aut libero ratione at porro. Reprehenderit minus possimus repellendus rerum sit deserunt ex.', 'https://lorempixel.com/640/480/?43133', 1, 15, 'gTJgHEtm5k', '2019-06-01 14:34:21', '2019-06-01 16:36:40', 7, NULL, NULL, NULL, NULL),
(226, 'Pedro Kris', 'vkihn@example.net', '$2y$10$.f0ih5bWQ/2khFpjfcuULew5lL1lZhB9x0xFYMJPNxj7b5jWpfA6C', 'student', 1, 1, 19292940, 3184976, 'male', 'o+', 'Bangladeshi', '1-457-892-6549', '798 Alexander Square Suite 636\nGlendafort, MT 37307-5733', 'Aspernatur non ducimus voluptates quia eveniet quia commodi. Fuga sequi ut dignissimos unde porro. Aperiam sint quam temporibus.', 'https://lorempixel.com/640/480/?87024', 1, 16, '2lr2bbhEo0', '2019-06-01 14:34:21', '2019-06-01 16:36:40', 10, NULL, NULL, NULL, NULL),
(227, 'Juliana Stokes V', 'hodkiewicz.jennyfer@example.net', '$2y$10$Ia3oLB2C/Y909W31hwVQDOCXVtBPZ9.8HQ548gfLHxY0.6bVeQOcS', 'student', 1, 1, 19292940, 3457015, 'female', 'b+', 'Bangladeshi', '669.391.6483 x715', '59664 Amara Gardens\nWilkinsonmouth, HI 18091', 'Voluptate et praesentium voluptate praesentium illum aut. Officia omnis ad enim repellendus. Qui repellat repellat iusto impedit.', 'https://lorempixel.com/640/480/?72967', 1, 8, 'LxBuRN8Wkz', '2019-06-01 14:34:21', '2019-06-01 16:36:41', 5, NULL, NULL, NULL, NULL),
(228, 'Shawna O\'Reilly', 'eichmann.eileen@example.org', '$2y$10$/kyTI3q.8WNEOJSsG/fmRevkcmcfRV/MyQj0IB3MSfV1oncbkfncK', 'student', 1, 1, 19292940, 8097330, 'male', 'a+', 'Bangladeshi', '(695) 267-2311 x4284', '72896 Sanford Islands Suite 857\nJaskolskimouth, CT 40210', 'Optio et blanditiis omnis est quisquam eum et. Occaecati dolorem quidem quia nemo. Natus fugiat non ducimus in similique.', 'https://lorempixel.com/640/480/?61583', 1, 7, 'L0n0p0P7dX', '2019-06-01 14:34:21', '2019-06-01 16:36:41', 5, NULL, NULL, NULL, NULL),
(229, 'Preston Lynch', 'ardith.krajcik@example.net', '$2y$10$PP7665cN54XCe3fZaHE3Suu3QehWTcWZFPmrMQWGZJRvTlWeqDjjS', 'student', 1, 1, 19292940, 4748719, 'female', 'a+', 'Bangladeshi', '1-520-719-2596', '15708 Cassandra Camp Apt. 756\nO\'Keefetown, NE 20419', 'Doloribus est asperiores impedit quae. At voluptas voluptas omnis quidem. Dolor et voluptate natus nemo qui aut.', 'https://lorempixel.com/640/480/?61415', 1, 19, 'R1ZLgruTA1', '2019-06-01 14:34:22', '2019-06-01 16:36:41', 7, NULL, NULL, NULL, NULL),
(230, 'Prof. Sylvan Batz DDS', 'qwest@example.net', '$2y$10$PT.DWzq.GWkwY5098c8fY.ttWBeXiBWsGx8Kl1SRmYAdeQK1qjsNe', 'student', 1, 1, 19292940, 6684099, 'male', 'o+', 'Bangladeshi', '(593) 518-2449 x4791', '42722 Antonina Parkway Apt. 928\nNorth Ryleigh, MS 46825-0420', 'Soluta distinctio voluptatem illo ex fugit qui. Illo labore incidunt corrupti dolorem in. Eaque quia a esse fugit magnam provident magnam.', 'https://lorempixel.com/640/480/?33677', 1, 18, 'wmtatZpeNG', '2019-06-01 14:34:22', '2019-06-01 16:36:41', 10, NULL, NULL, NULL, NULL),
(231, 'Nona Beier', 'vrice@example.com', '$2y$10$gvMO3cXCuiYyyCS5gaXI4eGFiQRrhPDQvYLre6CmFqH/iarzTfL82', 'student', 1, 1, 19292940, 5690017, 'female', 'b+', 'Bangladeshi', '1-635-934-7882 x18925', '30964 Ora Park Suite 823\nEast Landenport, NH 75819-6259', 'Iusto facere molestias ea qui. Blanditiis eaque voluptas enim optio quae doloremque. Dicta et officia consequatur nesciunt perspiciatis enim.', 'https://lorempixel.com/640/480/?45119', 1, 19, 'slGXfTAzxh', '2019-06-01 14:34:22', '2019-06-01 16:36:41', 4, NULL, NULL, NULL, NULL),
(232, 'Edwardo Grant I', 'mae.jacobs@example.org', '$2y$10$7UGU6Z6haaegBLdvyUGVBOQywgC1xkJsBSEQIYL1FQn2KQ4dPcNau', 'student', 1, 1, 19292940, 8913825, 'female', 'a+', 'Bangladeshi', '(214) 928-7662', '12623 Chasity Plaza\nPouroschester, AK 95107-0374', 'Et quas modi nulla aut. Voluptatem molestias sequi consequatur non ex qui. Laboriosam quia laborum voluptatem.', 'https://lorempixel.com/640/480/?99963', 1, 20, 'u6DQ9ZBx2U', '2019-06-01 14:34:22', '2019-06-01 16:36:41', 5, NULL, NULL, NULL, NULL),
(233, 'Maci Jones', 'maud.gorczany@example.net', '$2y$10$PT0wmEULiwHUN1uBTrS7Au2y1p68m7II.Pfn4VRA9okTJf416EVuu', 'student', 1, 1, 19292940, 5436453, 'male', 'a+', 'Bangladeshi', '374-483-6796', '34284 Jerome Branch Suite 446\nEast Breanneberg, ME 77222-2192', 'Eaque autem deleniti ut et nam. Et corporis vitae non dolorum exercitationem optio. Totam veritatis sed eligendi nulla.', 'https://lorempixel.com/640/480/?85110', 1, 7, 'ONo4P8Yo8Y', '2019-06-01 14:34:22', '2019-06-01 16:36:42', 10, NULL, NULL, NULL, NULL),
(234, 'Dr. Lynn Schaefer IV', 'fabian.sipes@example.com', '$2y$10$L1uMbWhaJUEOeFIVAiwzfOPR5TV/tlLiBmih0bDTcTnbSR.wU0kN2', 'student', 1, 1, 19292940, 6876043, 'female', 'b+', 'Bangladeshi', '295.471.3172 x9774', '117 Marks Route\nJanieview, WV 76270-4256', 'Aut autem deserunt doloremque consequatur non id amet vero. Sunt ipsa nemo est deserunt voluptas consequuntur et error. Dolor voluptatibus iusto vitae corrupti.', 'https://lorempixel.com/640/480/?74607', 1, 19, 'EaaQ0fFuIc', '2019-06-01 14:34:22', '2019-06-01 16:36:42', 10, NULL, NULL, NULL, NULL),
(235, 'Tyrique Gaylord', 'arthur.dach@example.org', '$2y$10$a8t./NzoNREBGtit8SXFd.OjxZi9d8RE5rMUxrx3J0al/K6DKZVCi', 'student', 1, 1, 19292940, 6366615, 'female', 'a+', 'Bangladeshi', '+16612738515', '62891 Swift Square Apt. 067\nWest Gail, MI 30046-9520', 'Praesentium voluptatem similique autem enim eum maiores voluptatem. Corrupti rem aut labore. Iste recusandae animi dolorum laudantium aliquid.', 'https://lorempixel.com/640/480/?21684', 1, 5, 'dbaSg670xY', '2019-06-01 14:34:22', '2019-06-01 16:36:42', 4, NULL, NULL, NULL, NULL),
(236, 'Dr. Linnea Langworth DVM', 'waltenwerth@example.net', '$2y$10$KRv/Lq1cQbleAtX9Od/OaeRq.xdGGdxKawoduj745Mpq04CGM8tFq', 'student', 1, 1, 19292940, 3036315, 'male', 'b+', 'Bangladeshi', '(534) 372-6686 x04919', '278 Garrison Extensions\nRaufurt, NV 61722', 'Ipsam repellat ipsa impedit possimus ad accusamus. Illo ipsam tenetur fuga in. Qui quidem voluptas at molestias.', 'https://lorempixel.com/640/480/?59581', 1, 5, 'IZryEiibX9', '2019-06-01 14:34:22', '2019-06-01 16:36:42', 1, NULL, NULL, NULL, NULL),
(237, 'Jack Jacobson', 'choppe@example.org', '$2y$10$3hpifYr4mrvP8DMS4zB1Sui8wr1gbYgqpI53xaGOrtzySB8akAoA2', 'student', 1, 1, 19292940, 5625424, 'female', 'b+', 'Bangladeshi', '1-413-565-8659', '45824 O\'Conner Summit\nPort Jaydon, AK 17132', 'Natus eos blanditiis aut eum vel. Quis ullam dolor a quos quaerat dolor maiores. Sunt sint sunt voluptates et quidem fuga maxime.', 'https://lorempixel.com/640/480/?53138', 1, 15, 'm6y2bJw9JS', '2019-06-01 14:34:22', '2019-06-01 16:36:42', 8, NULL, NULL, NULL, NULL),
(238, 'Elyse Feest III', 'alycia79@example.org', '$2y$10$aPCGhLJDSkAA7pQCe5qkp.0rFvJL0vs884ruKE0BYb2AbW4JQjkBm', 'student', 1, 1, 19292940, 892721, 'male', 'o+', 'Bangladeshi', '1-262-888-5894 x6897', '17475 Bosco Road Apt. 267\nMcCulloughport, VA 06584', 'Voluptates officia animi aliquid quam voluptatem reiciendis nobis. Iure corporis repellat repellendus aut omnis tempora. Nobis repudiandae aliquid magnam qui sit suscipit.', 'https://lorempixel.com/640/480/?20729', 1, 20, 'D0fsrlgKsY', '2019-06-01 14:34:22', '2019-06-01 16:36:42', 4, NULL, NULL, NULL, NULL),
(239, 'Mr. Herman Romaguera', 'qkemmer@example.net', '$2y$10$hyn3i2joopyGP1j1oyOYF.dHo6RRqCByShY1EoANh4qAxnbHRoIsa', 'student', 1, 1, 19292940, 2082631, 'male', 'o+', 'Bangladeshi', '(949) 941-8354', '20420 Reese Station Apt. 289\nSouth Jenningsport, AR 51466-5504', 'Accusantium minus aut iste. Minima qui ipsam est dolorum accusantium vitae. Odio qui eligendi officiis eaque.', 'https://lorempixel.com/640/480/?70985', 1, 10, 'Uv0DC2ZNW7', '2019-06-01 14:34:22', '2019-06-01 16:36:42', 4, NULL, NULL, NULL, NULL),
(240, 'Dr. Kaylin Gerlach Jr.', 'rippin.heber@example.net', '$2y$10$u/3yjLMQMcZphLkg9HYlBumU6FvJ6Sjnw.dlT00uroNOw5h0vSIY2', 'student', 1, 1, 19292940, 1768124, 'male', 'b+', 'Bangladeshi', '1-764-296-6417', '591 Palma Isle\nNew Evaton, MD 31991', 'Nihil dicta quo dicta omnis cupiditate et. Voluptas amet aut illo facere qui ab a. Qui rem sit sunt sapiente animi ad nobis.', 'https://lorempixel.com/640/480/?60708', 1, 1, 't0tb6Jz9Jo', '2019-06-01 14:34:22', '2019-06-01 16:36:43', 6, NULL, NULL, NULL, NULL),
(241, 'Gussie Sawayn', 'qswift@example.com', '$2y$10$/mEqokgQA62c6gmpc1bn1uLe2gYqee9vPdQx7ft2Pa1ELdGjMFa8.', 'student', 1, 1, 19292940, 1447051, 'female', 'b+', 'Bangladeshi', '817.521.0021', '470 McGlynn Track Suite 767\nCamillaborough, NM 53596', 'Voluptas fuga sed earum aliquid sunt. Vero quos saepe numquam et voluptates deserunt quis. Voluptatum et quo repellat vero.', 'https://lorempixel.com/640/480/?31887', 1, 18, 'AWAZ3zLKAG', '2019-06-01 14:34:22', '2019-06-01 16:36:43', 9, NULL, NULL, NULL, NULL),
(242, 'Ms. Christa Kulas', 'geo.reilly@example.net', '$2y$10$Lwsobq5aoDB6MNFQlDkjfeas77FJLv0dKSwhA6/lcPdsMqB.JsG3C', 'student', 1, 1, 19292940, 5874046, 'female', 'a+', 'Bangladeshi', '809-801-0593 x4326', '2320 Marquardt Causeway Suite 006\nLake Kristoferborough, HI 37198', 'Consequuntur blanditiis laudantium tempore nihil. Impedit ut omnis nemo magni dolor et quo. Ea cupiditate accusantium ut incidunt neque quae.', 'https://lorempixel.com/640/480/?61988', 1, 8, '5qCYkXEl46', '2019-06-01 14:34:22', '2019-06-01 16:36:43', 6, NULL, NULL, NULL, NULL),
(243, 'Leonor Kerluke', 'wbartell@example.org', '$2y$10$24lAesYc0pyK9Rs0bJf28e4p.p.zgCzdm9J0rydmlP6oMcS2aQr7O', 'student', 1, 1, 19292940, 5977713, 'female', 'ab', 'Bangladeshi', '+1 (351) 964-7026', '50052 Friesen Island Suite 858\nLake Israel, AK 38813', 'Eos recusandae dolor est rem odit. Exercitationem beatae harum maxime aut voluptatibus unde maxime. Et a ad placeat nulla officiis laboriosam expedita.', 'https://lorempixel.com/640/480/?16624', 1, 15, 'qGyzidWU3b', '2019-06-01 14:34:22', '2019-06-01 16:36:43', 1, NULL, NULL, NULL, NULL),
(244, 'Dayne Koch', 'kshlerin.chris@example.com', '$2y$10$lFvXY5clDZpHlN8x.tdDy.0G96wC4qJa/b54XiauCyKAq3OWrTCDS', 'student', 1, 1, 19292940, 2664922, 'female', 'ab', 'Bangladeshi', '+1-656-862-7630', '88810 Muller Motorway\nDavionhaven, AL 45131-3291', 'Nihil ut eum nisi aut. Cupiditate ipsum inventore nobis aut accusantium. Provident eligendi qui rerum quasi.', 'https://lorempixel.com/640/480/?53701', 1, 10, 'EPfi9gsWeR', '2019-06-01 14:34:22', '2019-06-01 16:36:43', 10, NULL, NULL, NULL, NULL),
(245, 'Shea Mann', 'darlene31@example.net', '$2y$10$Gfe9OI/pqMitZ/Nb5/8J6eEVZAXKEoK7TFKBGAbahycN35ODUEOEy', 'student', 1, 1, 19292940, 948749, 'female', 'b+', 'Bangladeshi', '(553) 907-5991', '2346 Sarina Courts\nMerlinmouth, ME 55554-3037', 'Tempore qui quia nihil natus. Autem ut dignissimos architecto molestias. Veritatis ducimus non et provident.', 'https://lorempixel.com/640/480/?48730', 1, 14, 'ptsIMr7tg6', '2019-06-01 14:34:23', '2019-06-01 16:36:43', 1, NULL, NULL, NULL, NULL),
(246, 'Carlos Grant', 'lisette53@example.com', '$2y$10$0Dcg8UvIEI40zRZlxRZMke50svJC4VOlqLAjyXHJQPHGyepsGluG6', 'student', 1, 1, 19292940, 5226452, 'male', 'b+', 'Bangladeshi', '428-858-1846 x2245', '146 Sipes Junctions\nPort Quentinville, IN 58006-7438', 'Ad eligendi assumenda consectetur. Quo ullam nobis reiciendis modi vel quo quaerat. Molestiae asperiores excepturi quia voluptatem quasi.', 'https://lorempixel.com/640/480/?69986', 1, 3, 'Hmu9VUkWCa', '2019-06-01 14:34:23', '2019-06-01 16:36:44', 9, NULL, NULL, NULL, NULL),
(247, 'Ova Feil MD', 'emcclure@example.com', '$2y$10$spxinHSQ1xN2vnHp0epTBe5Ji/EPwpWvfvpl9TqfFoiv7C3S/E1Py', 'student', 1, 1, 19292940, 3654356, 'female', 'a+', 'Bangladeshi', '863-232-8296', '75582 Casper Locks Suite 036\nRunolfsdottirburgh, MN 53761', 'Autem veritatis inventore natus soluta ipsam qui a. Tenetur nihil neque sequi sunt perferendis vel placeat. Laudantium fuga qui non amet.', 'https://lorempixel.com/640/480/?74208', 1, 17, 'bwLv2CkJpK', '2019-06-01 14:34:23', '2019-06-01 16:36:44', 6, NULL, NULL, NULL, NULL),
(248, 'Dr. Antonio Baumbach V', 'delores.rice@example.net', '$2y$10$cmoThk0zSk/QzKdgxa0fSukSGgHGuapcfAogEQPRvGOcZnzm1XjQm', 'student', 1, 1, 19292940, 6884560, 'female', 'b+', 'Bangladeshi', '(624) 485-8844', '6210 Greenfelder Dam Suite 971\nEast Kaleigh, PA 19418', 'Fugit quis ab magni adipisci. Illum repellat repellat vel maxime ea sint doloremque. Deserunt aut deserunt recusandae.', 'https://lorempixel.com/640/480/?58500', 1, 3, 'NMBHccG9mj', '2019-06-01 14:34:23', '2019-06-01 16:36:44', 5, NULL, NULL, NULL, NULL),
(249, 'Floy O\'Hara DDS', 'alyson98@example.org', '$2y$10$vdZplC7lYlAonoMmzMuWr.KaxAqH37R/QWbal0igc1fpNnC/H8Fyi', 'student', 1, 1, 19292940, 2004443, 'male', 'b+', 'Bangladeshi', '621.552.6671', '1227 Alyce Road\nLake Patiencefurt, NV 18994-3599', 'Aut voluptatum et accusantium impedit eaque aperiam quisquam. Nemo aliquam quae libero ad voluptatem ipsa illo qui. Mollitia eveniet maxime nihil a cum cupiditate.', 'https://lorempixel.com/640/480/?49011', 1, 6, '9btdZK2Ovv', '2019-06-01 14:34:23', '2019-06-01 16:36:44', 5, NULL, NULL, NULL, NULL),
(250, 'Eleonore Padberg', 'ntorphy@example.org', '$2y$10$JP07w7PdhqOmrAiKbbelQOoCy6WY0WBJ5mAtP1O0u9XsrTDMi7sSq', 'student', 1, 1, 19292940, 1893080, 'male', 'o+', 'Bangladeshi', '(354) 328-7152', '6009 Rodolfo View Apt. 542\nLangland, OH 74286', 'Vitae ut veniam quia voluptatem. Voluptates qui velit qui illo eius error hic. Voluptas velit at blanditiis culpa iste fugiat et.', 'https://lorempixel.com/640/480/?48518', 1, 12, 'YrAnlhX2C9', '2019-06-01 14:34:23', '2019-06-01 16:36:44', 2, NULL, NULL, NULL, NULL),
(251, 'Nikita Ryan', 'mittie.rippin@example.org', '$2y$10$NMl7uAKVz2VSxedDq3yfbueEIRNi2XkgqbQTExDKiwN6a43.Fh196', 'student', 1, 1, 19292940, 3836574, 'male', 'o+', 'Bangladeshi', '1-628-709-4991 x2997', '26787 Aufderhar Forge Apt. 467\nPfannerstillmouth, SD 89144', 'Enim et dolorem omnis doloremque. Saepe aliquam iusto qui reprehenderit facilis debitis. Vero suscipit voluptatem odit nihil.', 'https://lorempixel.com/640/480/?74045', 1, 5, 'OZup3wdQZM', '2019-06-01 14:34:23', '2019-06-01 16:36:44', 3, NULL, NULL, NULL, NULL),
(252, 'Burdette Muller', 'storphy@example.net', '$2y$10$K5GdZf1A.r3iBwuH0RGQ4OWb2kNl76DiNS3nBP0/2ABhtUV9YsxxC', 'student', 1, 1, 19292940, 2091741, 'male', 'ab', 'Bangladeshi', '1-998-376-1834 x06190', '48625 Mosciski Common Suite 418\nLubowitzbury, MD 75878', 'Qui magnam dicta atque dignissimos repellendus. Est voluptatem neque dolorem repellat. Minima nesciunt provident dolor.', 'https://lorempixel.com/640/480/?91730', 1, 11, 'PyPRBDADmN', '2019-06-01 14:34:23', '2019-06-01 16:36:45', 9, NULL, NULL, NULL, NULL),
(253, 'Fern Mueller', 'dee26@example.com', '$2y$10$Emnwgzxtji2SAFU5hwg.MOUfdUY7oCtky3YwrgldpMpMIPoU0w4RW', 'student', 1, 1, 19292940, 8309029, 'female', 'b+', 'Bangladeshi', '537-301-1163', '513 Eulalia Brook\nLacymouth, AR 66177-3058', 'Doloribus ea expedita sit dolorem et accusantium. A dolorum earum est ipsa. Laborum aut minus debitis alias rerum.', 'https://lorempixel.com/640/480/?23573', 1, 14, 'SF0JWYaYFD', '2019-06-01 14:34:23', '2019-06-01 16:36:45', 4, NULL, NULL, NULL, NULL),
(254, 'Jovani Doyle PhD', 'kailey91@example.com', '$2y$10$EuQPh3dNAg3Aw6bZ50wNte50J2UMalbqs2ahP7u.xl9GcY56TqpE6', 'student', 1, 1, 19292940, 7513294, 'female', 'b+', 'Bangladeshi', '985.440.9719', '1079 Gay Pass Suite 266\nSpinkabury, CT 34978', 'Non est repellat non ut eius. Aut sit quis quidem maiores amet quaerat quam. Est aut eos et illum perspiciatis deserunt nisi rerum.', 'https://lorempixel.com/640/480/?48954', 1, 12, 'DypVSKNAZE', '2019-06-01 14:34:23', '2019-06-01 16:36:45', 8, NULL, NULL, NULL, NULL),
(255, 'Trey Hegmann', 'schuppe.allan@example.com', '$2y$10$.94UGiqDJQJSFdDS9gt18OaxOr5JOkXIURHmvpRvbdvxH0ZCKSm56', 'student', 1, 1, 19292940, 547579, 'male', 'a+', 'Bangladeshi', '(601) 697-1908', '1410 Wintheiser Stream Suite 926\nWest Enricobury, KS 44015', 'Quis aut et dolor et beatae quo. Impedit veritatis non placeat adipisci earum. Perferendis reprehenderit ea quidem odio architecto.', 'https://lorempixel.com/640/480/?66253', 1, 20, 'OzFVCeZzal', '2019-06-01 14:34:23', '2019-06-01 16:36:45', 9, NULL, NULL, NULL, NULL),
(256, 'Ms. Alison Cormier', 'tavares.dicki@example.net', '$2y$10$Q2UoHM7Mr1hW3D.gtLJXgOWfORxMWfCs4np93.o7aOSlK15UK47nC', 'student', 1, 1, 19292940, 7606425, 'female', 'ab', 'Bangladeshi', '1-853-698-4306 x8835', '31072 Ruth Station Suite 869\nStantonport, WI 58575-4840', 'Quo dolore voluptatibus at sint aliquid ullam non. Fugit dicta modi aut minima dolor quam. Aut sint cumque molestias consectetur tenetur.', 'https://lorempixel.com/640/480/?37775', 1, 14, 'mRam3iryxI', '2019-06-01 14:34:23', '2019-06-01 16:36:45', 7, NULL, NULL, NULL, NULL),
(257, 'Mr. Jalen Boyer', 'cathryn47@example.org', '$2y$10$KvZ6R.NpNFHUi3rPpinQG.bI3SziB3B5lGelFXy9EBh/PU9/ts9j6', 'student', 1, 1, 19292940, 2217642, 'male', 'o+', 'Bangladeshi', '939.646.0815 x102', '785 Nathanael Route Suite 950\nNorth Mittie, LA 61430-6640', 'Natus qui amet porro earum sint sit expedita iusto. Aut veniam minus accusantium sequi neque quas. At deserunt delectus sed.', 'https://lorempixel.com/640/480/?95173', 1, 15, 'Ow8mDgrbFy', '2019-06-01 14:34:24', '2019-06-01 16:36:45', 8, NULL, NULL, NULL, NULL),
(258, 'Chaya Daniel', 'rheaney@example.com', '$2y$10$V5TmAMDfuTsxUuwp0shlleyDkPMlkX7DB1L0.Qr46sOdwa6uvqhaG', 'student', 1, 1, 19292940, 6412788, 'female', 'a+', 'Bangladeshi', '424-539-4013 x4603', '646 Kole Underpass\nSouth Sebastianfurt, MD 28261-8406', 'Sit eius eum non dolorum et. Et vel neque natus est corrupti cumque quod et. Quos mollitia voluptatem similique voluptas aut et.', 'https://lorempixel.com/640/480/?77540', 1, 19, 'pPHFrPWzBE', '2019-06-01 14:34:24', '2019-06-01 16:36:46', 2, NULL, NULL, NULL, NULL),
(259, 'Jazmyn Hagenes', 'kory27@example.com', '$2y$10$tdXosOsVr8CDX39.DDnF8.Y8dwUrFt40i4D8JJwrYya.x6KFtI/Hq', 'student', 1, 1, 19292940, 2700476, 'male', 'ab', 'Bangladeshi', '863-377-3986 x41964', '56243 Schmeler Loop Apt. 701\nSouth Lynnshire, DE 36565-4958', 'Nesciunt omnis dolorem reprehenderit totam. Vitae consequatur laudantium quis dolor autem. Id quam sint placeat cumque.', 'https://lorempixel.com/640/480/?76540', 1, 1, '8XcTXPjNxx', '2019-06-01 14:34:24', '2019-06-01 16:36:46', 1, NULL, NULL, NULL, NULL),
(260, 'Karl Eichmann', 'brown.maye@example.net', '$2y$10$7/VKx/WQNcxwENyVSf0xWO7yIC9rTzbNKe1i7lI4fyJ8nDIOjSQaK', 'student', 1, 1, 19292940, 6650895, 'female', 'o+', 'Bangladeshi', '626.722.9978', '2748 Kuvalis Stravenue Apt. 769\nNew Myrtisside, NC 60633', 'Quidem officiis recusandae expedita voluptatibus totam. Est laboriosam omnis praesentium ad dolor distinctio. Ut possimus qui quaerat fuga quis.', 'https://lorempixel.com/640/480/?75832', 1, 1, 'CNI23uS7NV', '2019-06-01 14:34:24', '2019-06-01 16:36:46', 8, NULL, NULL, NULL, NULL),
(261, 'Boyd Grant II', 'antone.rau@example.net', '$2y$10$gVX2/QcPNsddhg/S7OKkR.S1ZnadkXWDO3/RqD9o2KgqnGvY/qUkG', 'student', 1, 1, 19292940, 7070775, 'female', 'o+', 'Bangladeshi', '(542) 923-7645 x840', '1023 Christiansen Ways\nDerickview, NC 25582-9799', 'Aut expedita esse cum ea debitis consequatur id. Maiores quo voluptas quibusdam nulla optio pariatur. Qui quibusdam voluptatem magni autem iure laboriosam.', 'https://lorempixel.com/640/480/?37794', 1, 16, 'c72MH53Cok', '2019-06-01 14:34:24', '2019-06-01 16:36:46', 5, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `shop_admins`
--

DROP TABLE IF EXISTS `shop_admins`;
CREATE TABLE IF NOT EXISTS `shop_admins` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `shop_admins`
--

INSERT INTO `shop_admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Alice', 'admin@khemeticchurch.com', '$2y$10$riYAkaYxP4e0673vOvy11.FT2FC5kVk.BXhUgb7180jYXTX.IKKsW', NULL, '2019-06-05 18:04:14', '2019-06-05 18:04:14');

-- --------------------------------------------------------

--
-- Structure de la table `shop_comments`
--

DROP TABLE IF EXISTS `shop_comments`;
CREATE TABLE IF NOT EXISTS `shop_comments` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `shop_contact_users`
--

DROP TABLE IF EXISTS `shop_contact_users`;
CREATE TABLE IF NOT EXISTS `shop_contact_users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `visitor_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visitor_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visitor_website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visitor_message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `shop_grn_details`
--

DROP TABLE IF EXISTS `shop_grn_details`;
CREATE TABLE IF NOT EXISTS `shop_grn_details` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `grn_num` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `received_item_code` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `received_item_qty` int(11) NOT NULL,
  `serial_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `po_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `shop_guest_users`
--

DROP TABLE IF EXISTS `shop_guest_users`;
CREATE TABLE IF NOT EXISTS `shop_guest_users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_no` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` int(11) NOT NULL,
  `cookie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `shop_items`
--

DROP TABLE IF EXISTS `shop_items`;
CREATE TABLE IF NOT EXISTS `shop_items` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `item_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_type` int(11) NOT NULL,
  `item_brand` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_category` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `colors` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `shop_items`
--

INSERT INTO `shop_items` (`id`, `item_code`, `item_type`, `item_brand`, `item_category`, `item_name`, `item_description`, `colors`, `created_at`, `updated_at`) VALUES
(1, '123456', 1, 'Zara', 'Bridal Collection', 'Mask', 'African Mask : origne of Cameroon Nord region', 'black', '2019-05-25 14:48:14', '2019-05-25 14:48:14');

-- --------------------------------------------------------

--
-- Structure de la table `shop_items_images`
--

DROP TABLE IF EXISTS `shop_items_images`;
CREATE TABLE IF NOT EXISTS `shop_items_images` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `item_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `shop_items_images`
--

INSERT INTO `shop_items_images` (`id`, `item_code`, `item_image`, `created_at`, `updated_at`) VALUES
(1, '123456', 'uploads/Item-ObL.jpg', '2019-05-25 14:48:14', '2019-05-25 14:48:14');

-- --------------------------------------------------------

--
-- Structure de la table `shop_item_brands`
--

DROP TABLE IF EXISTS `shop_item_brands`;
CREATE TABLE IF NOT EXISTS `shop_item_brands` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `shop_item_brands`
--

INSERT INTO `shop_item_brands` (`id`, `brand_name`, `brand_logo`, `created_at`, `updated_at`) VALUES
(1, 'Zara', 'uploads/Brand-X91.png', '2019-05-21 23:00:00', '2019-05-21 23:00:00'),
(2, 'Maria B', 'uploads/Brand-Co7.png', '2019-05-21 23:00:00', '2019-05-21 23:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `shop_item_categories`
--

DROP TABLE IF EXISTS `shop_item_categories`;
CREATE TABLE IF NOT EXISTS `shop_item_categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_parent_category` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `shop_item_categories`
--

INSERT INTO `shop_item_categories` (`id`, `category_name`, `category_description`, `category_parent_category`, `created_at`, `updated_at`) VALUES
(1, 'Wedding Dress', 'Buy bridal dresses of famous brands online form Z...', '0', '2019-05-21 23:00:00', '2019-05-21 23:00:00'),
(2, 'Bridal Collection', 'we have a huge range of Packistani bridal collection', '1', '2019-05-21 23:00:00', '2019-05-21 23:00:00'),
(3, 'Groom Shirwani', 'Groom Shirwani', '1', '2019-05-21 23:00:00', '2019-05-21 23:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `shop_item_current_inventories`
--

DROP TABLE IF EXISTS `shop_item_current_inventories`;
CREATE TABLE IF NOT EXISTS `shop_item_current_inventories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `item_code` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_qty_in_hand` int(11) DEFAULT NULL,
  `item_current_selling_price` int(11) DEFAULT NULL,
  `item_current_purchase_price` int(11) DEFAULT NULL,
  `item_current_avg_price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `shop_item_types`
--

DROP TABLE IF EXISTS `shop_item_types`;
CREATE TABLE IF NOT EXISTS `shop_item_types` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `shop_migrations`
--

DROP TABLE IF EXISTS `shop_migrations`;
CREATE TABLE IF NOT EXISTS `shop_migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `shop_migrations`
--

INSERT INTO `shop_migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_11_14_051542_create_items_table', 1),
(4, '2018_11_14_053438_create_items_images_table', 1),
(5, '2018_11_14_055626_create_item_types_table', 1),
(6, '2018_11_14_055650_create_item_brands_table', 1),
(7, '2018_11_14_055708_create_item_categories_table', 1),
(8, '2018_11_14_055733_create_item_current_inventories_table', 1),
(9, '2018_11_14_073355_create_suppliers_table', 1),
(10, '2018_11_14_073503_create_purchase_orders_table', 1),
(11, '2018_11_14_073519_create_purchase_order_details_table', 1),
(12, '2018_11_14_073601_create_grns_table', 1),
(13, '2018_11_14_073614_create_grn_details_table', 1),
(14, '2018_11_14_140800_create_quotations_table', 1),
(15, '2018_11_14_140910_create_qoutation_details_table', 1),
(16, '2018_11_14_140941_create_sales_invoices_table', 1),
(17, '2018_11_14_140952_create_sales_invoice_details_table', 1),
(18, '2018_11_15_075907_create_sales_customers_table', 1),
(19, '2018_11_15_080017_create_sales_quotations_table', 1),
(20, '2018_11_15_080028_create_sales_quotation_details_table', 1),
(21, '2018_11_15_080108_create_sales_perchase_requests_table', 1),
(22, '2018_11_15_080119_create_sales_perchase_request_details_table', 1),
(23, '2018_11_15_080136_create_sales_returns_table', 1),
(24, '2018_11_15_080148_create_sales_return_details_table', 1),
(25, '2018_11_15_080203_create_sales_sdns_table', 1),
(26, '2018_11_15_080213_create_sales_sdn_details_table', 1),
(27, '2018_11_27_104147_create_temp_purchase_orders_table', 2),
(28, '2018_12_06_105224_create_temp_purchase_requests_table', 3),
(29, '2018_12_10_051111_create_purchases_table', 4),
(30, '2018_12_10_055806_create_temp_purchases_table', 5),
(31, '2018_12_13_134547_create_temp_grns_table', 6),
(32, '2018_12_19_080054_create_temp_invoices_table', 7),
(33, '2018_12_27_051612_create_purchase_return_details_table', 8),
(34, '2018_12_27_053051_create_purchase_returns_table', 9),
(35, '2019_01_07_071138_create_temp_quotations_table', 10),
(36, '2019_01_08_142858_create_temp_sdns_table', 11),
(37, '2019_01_12_144741_create_user_details_table', 12),
(38, '2019_01_12_144948_create_user_carts_table', 13),
(39, '2019_01_12_145046_create_order_shipment_details_table', 13),
(40, '2019_01_12_145156_create_temp_orders_table', 14),
(41, '2019_01_12_145303_create_order_status_types_table', 15),
(42, '2019_01_12_145339_create_orders_payments_table', 15),
(43, '2019_01_12_145439_create_order_payment_details_table', 15),
(44, '2019_01_12_145528_create_measurments_females_table', 15),
(45, '2019_01_12_145616_create_measurments_males_table', 15),
(46, '2019_01_12_145800_create_contact_users_table', 15),
(47, '2019_01_14_152620_create_admins_table', 16),
(48, '2019_02_13_110401_create_posts_table', 17);

-- --------------------------------------------------------

--
-- Structure de la table `shop_orders_payments`
--

DROP TABLE IF EXISTS `shop_orders_payments`;
CREATE TABLE IF NOT EXISTS `shop_orders_payments` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_temp_order_id` int(11) NOT NULL,
  `payment_method` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `shop_order_details`
--

DROP TABLE IF EXISTS `shop_order_details`;
CREATE TABLE IF NOT EXISTS `shop_order_details` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_qty` int(11) NOT NULL,
  `order_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `cookie` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `shop_order_payment_details`
--

DROP TABLE IF EXISTS `shop_order_payment_details`;
CREATE TABLE IF NOT EXISTS `shop_order_payment_details` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_temp_order_id` int(11) NOT NULL,
  `order_amount` int(11) NOT NULL,
  `transection_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_cnic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL,
  `order_no` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `shop_order_shipment_details`
--

DROP TABLE IF EXISTS `shop_order_shipment_details`;
CREATE TABLE IF NOT EXISTS `shop_order_shipment_details` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `receiver_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_alternative_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_shipment_landmark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_stat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_zipcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_shipment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_temp_order_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `shop_password_resets`
--

DROP TABLE IF EXISTS `shop_password_resets`;
CREATE TABLE IF NOT EXISTS `shop_password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `shop_posts`
--

DROP TABLE IF EXISTS `shop_posts`;
CREATE TABLE IF NOT EXISTS `shop_posts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(600) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `shop_products`
--

DROP TABLE IF EXISTS `shop_products`;
CREATE TABLE IF NOT EXISTS `shop_products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `item_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `colors` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_description` varchar(600) COLLATE utf8mb4_unicode_ci NOT NULL,
  `old_price` int(11) NOT NULL,
  `new_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `shop_products`
--

INSERT INTO `shop_products` (`id`, `item_code`, `item_brand`, `item_category`, `item_name`, `colors`, `item_description`, `old_price`, `new_price`, `quantity`, `created_at`, `updated_at`) VALUES
(1, '123456', 'Zara', 'Bridal Collection', 'Mask', 'black', 'African Mask from Nord Cameroon', 270, 250, 9, '2019-05-25 14:51:07', '2019-05-25 14:51:07');

-- --------------------------------------------------------

--
-- Structure de la table `shop_product_images`
--

DROP TABLE IF EXISTS `shop_product_images`;
CREATE TABLE IF NOT EXISTS `shop_product_images` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `item_code` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `shop_product_images`
--

INSERT INTO `shop_product_images` (`id`, `item_code`, `item_image`, `created_at`, `updated_at`) VALUES
(1, '123456', 'uploads/pro-5xU.jpg', '2019-05-25 14:51:07', '2019-05-25 14:51:07');

-- --------------------------------------------------------

--
-- Structure de la table `shop_purchases`
--

DROP TABLE IF EXISTS `shop_purchases`;
CREATE TABLE IF NOT EXISTS `shop_purchases` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `purchase_order_number` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `items` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `shop_purchase_orders`
--

DROP TABLE IF EXISTS `shop_purchase_orders`;
CREATE TABLE IF NOT EXISTS `shop_purchase_orders` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `supplier` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `po_total_value` bigint(20) DEFAULT NULL,
  `po_genrated_by` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `po_signed_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchaseRequest` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_refrence` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_cost` int(11) NOT NULL,
  `percentage` int(11) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `shop_purchase_order_details`
--

DROP TABLE IF EXISTS `shop_purchase_order_details`;
CREATE TABLE IF NOT EXISTS `shop_purchase_order_details` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `po_code` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchased_item_qty` int(11) DEFAULT NULL,
  `purchased_item_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po_id` int(11) NOT NULL,
  `items` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchaseRequest` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `po_id` (`po_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `shop_purchase_returns`
--

DROP TABLE IF EXISTS `shop_purchase_returns`;
CREATE TABLE IF NOT EXISTS `shop_purchase_returns` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `purchases_inv_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `shop_purchase_return_details`
--

DROP TABLE IF EXISTS `shop_purchase_return_details`;
CREATE TABLE IF NOT EXISTS `shop_purchase_return_details` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `purchase_return_number` int(11) NOT NULL,
  `purchased_item_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_returned_item_qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `shop_qoutation_details`
--

DROP TABLE IF EXISTS `shop_qoutation_details`;
CREATE TABLE IF NOT EXISTS `shop_qoutation_details` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `quotaion_code` int(11) NOT NULL,
  `item_code` int(11) NOT NULL,
  `item_price` int(11) NOT NULL,
  `item_qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `shop_quotations`
--

DROP TABLE IF EXISTS `shop_quotations`;
CREATE TABLE IF NOT EXISTS `shop_quotations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_code` int(11) NOT NULL,
  `genrated_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `shop_replies`
--

DROP TABLE IF EXISTS `shop_replies`;
CREATE TABLE IF NOT EXISTS `shop_replies` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `umessage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cid` int(11) NOT NULL,
  `icode` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `shop_request_for_returns`
--

DROP TABLE IF EXISTS `shop_request_for_returns`;
CREATE TABLE IF NOT EXISTS `shop_request_for_returns` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_qty` int(11) NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `shop_sales_customers`
--

DROP TABLE IF EXISTS `shop_sales_customers`;
CREATE TABLE IF NOT EXISTS `shop_sales_customers` (
  `cid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_cnic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `shop_sales_invoices`
--

DROP TABLE IF EXISTS `shop_sales_invoices`;
CREATE TABLE IF NOT EXISTS `shop_sales_invoices` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_code` int(11) NOT NULL,
  `customer_mobile` int(15) NOT NULL,
  `inv_number` int(11) DEFAULT NULL,
  `total_amount` int(11) DEFAULT NULL,
  `genrated_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `shop_sales_invoice_details`
--

DROP TABLE IF EXISTS `shop_sales_invoice_details`;
CREATE TABLE IF NOT EXISTS `shop_sales_invoice_details` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sales_inv_code` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_code` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_price` int(11) NOT NULL,
  `item_qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `shop_sales_perchase_requests`
--

DROP TABLE IF EXISTS `shop_sales_perchase_requests`;
CREATE TABLE IF NOT EXISTS `shop_sales_perchase_requests` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `purchase_requested_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `shop_sales_perchase_request_details`
--

DROP TABLE IF EXISTS `shop_sales_perchase_request_details`;
CREATE TABLE IF NOT EXISTS `shop_sales_perchase_request_details` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `purchase_request_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_requested_item` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_requested_qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `shop_sales_quotations`
--

DROP TABLE IF EXISTS `shop_sales_quotations`;
CREATE TABLE IF NOT EXISTS `shop_sales_quotations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_code` int(11) NOT NULL,
  `customer_mobile` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quotation_created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `shop_sales_quotation_details`
--

DROP TABLE IF EXISTS `shop_sales_quotation_details`;
CREATE TABLE IF NOT EXISTS `shop_sales_quotation_details` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `item_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quotation_number` int(11) NOT NULL,
  `quoted_item_code` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quoted_item_price` int(11) NOT NULL,
  `quoted_item_qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `shop_sales_returns`
--

DROP TABLE IF EXISTS `shop_sales_returns`;
CREATE TABLE IF NOT EXISTS `shop_sales_returns` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sales_inv_number` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `shop_sales_return_details`
--

DROP TABLE IF EXISTS `shop_sales_return_details`;
CREATE TABLE IF NOT EXISTS `shop_sales_return_details` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sales_return_number` int(11) NOT NULL,
  `sales_returned_item_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_returned_item_qty` int(11) NOT NULL,
  `sales_returned_item_status` int(11) DEFAULT NULL,
  `sales_returned_item_reson` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `shop_sales_sdns`
--

DROP TABLE IF EXISTS `shop_sales_sdns`;
CREATE TABLE IF NOT EXISTS `shop_sales_sdns` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sales_inv_number` int(11) NOT NULL,
  `sales_delivered_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `shop_sales_sdn_details`
--

DROP TABLE IF EXISTS `shop_sales_sdn_details`;
CREATE TABLE IF NOT EXISTS `shop_sales_sdn_details` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sales_sdn_number` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_delivered_item` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_delivered_qty` int(11) NOT NULL,
  `sales_inv_code` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `shop_suppliers`
--

DROP TABLE IF EXISTS `shop_suppliers`;
CREATE TABLE IF NOT EXISTS `shop_suppliers` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `supplier_reg_no` int(11) NOT NULL,
  `supplier_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp_designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp_phone` int(11) NOT NULL,
  `cp_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_category` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `shop_temp_grns`
--

DROP TABLE IF EXISTS `shop_temp_grns`;
CREATE TABLE IF NOT EXISTS `shop_temp_grns` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `received_item_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `received_item_qty` int(11) NOT NULL,
  `serial_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `po_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `shop_temp_invoices`
--

DROP TABLE IF EXISTS `shop_temp_invoices`;
CREATE TABLE IF NOT EXISTS `shop_temp_invoices` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `item_code` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_price` int(11) NOT NULL,
  `item_qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `shop_temp_orders`
--

DROP TABLE IF EXISTS `shop_temp_orders`;
CREATE TABLE IF NOT EXISTS `shop_temp_orders` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `order_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `shop_temp_purchases`
--

DROP TABLE IF EXISTS `shop_temp_purchases`;
CREATE TABLE IF NOT EXISTS `shop_temp_purchases` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `purchase_order_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `items` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `shop_temp_purchase_orders`
--

DROP TABLE IF EXISTS `shop_temp_purchase_orders`;
CREATE TABLE IF NOT EXISTS `shop_temp_purchase_orders` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `po_code` int(11) DEFAULT NULL,
  `purchased_item_qty` int(11) DEFAULT NULL,
  `purchased_item_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `items` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchaseRequest` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `shop_temp_purchase_requests`
--

DROP TABLE IF EXISTS `shop_temp_purchase_requests`;
CREATE TABLE IF NOT EXISTS `shop_temp_purchase_requests` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `purchase_requested_item` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_requested_qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `shop_temp_quotations`
--

DROP TABLE IF EXISTS `shop_temp_quotations`;
CREATE TABLE IF NOT EXISTS `shop_temp_quotations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `item_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quoted_item_code` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quoted_item_price` int(11) NOT NULL,
  `quoted_item_qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `shop_temp_sdns`
--

DROP TABLE IF EXISTS `shop_temp_sdns`;
CREATE TABLE IF NOT EXISTS `shop_temp_sdns` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sales_delivered_item` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_delivered_qty` int(11) NOT NULL,
  `sales_inv_code` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `shop_ucarts`
--

DROP TABLE IF EXISTS `shop_ucarts`;
CREATE TABLE IF NOT EXISTS `shop_ucarts` (
  `cid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `item_code` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_qty` int(11) NOT NULL,
  `date_of_addition` int(11) DEFAULT NULL,
  `user_temp_order_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `color` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `method` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_no` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `shop_users`
--

DROP TABLE IF EXISTS `shop_users`;
CREATE TABLE IF NOT EXISTS `shop_users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `shop_user_carts`
--

DROP TABLE IF EXISTS `shop_user_carts`;
CREATE TABLE IF NOT EXISTS `shop_user_carts` (
  `cid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `item_code` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_qty` int(11) NOT NULL,
  `date_of_addition` int(11) DEFAULT NULL,
  `user_temp_order_id` int(11) DEFAULT NULL,
  `color` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cookie` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `shop_user_carts`
--

INSERT INTO `shop_user_carts` (`cid`, `item_code`, `item_qty`, `date_of_addition`, `user_temp_order_id`, `color`, `created_at`, `updated_at`, `cookie`) VALUES
(1, '123456', 1, NULL, NULL, 'black', '2019-06-05 20:36:59', '2019-06-05 20:36:59', '09htWh7AbSjlgSxzGAP5d7umx3hBMQkURAwGG3ye');

-- --------------------------------------------------------

--
-- Structure de la table `shop_user_details`
--

DROP TABLE IF EXISTS `shop_user_details`;
CREATE TABLE IF NOT EXISTS `shop_user_details` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_contact_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_alternative_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_alternative_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_dob` int(11) NOT NULL,
  `user_country` int(11) NOT NULL,
  `user_city` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `socials`
--

DROP TABLE IF EXISTS `socials`;
CREATE TABLE IF NOT EXISTS `socials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `socials`
--

INSERT INTO `socials` (`id`, `name`, `link`, `image`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'twitter', 'http://twitter.com/khmetic-tribal', '5c712b2e47d4f_1550920494.png', 'png', '2019-02-22 23:00:00', '2019-02-23 10:14:54', NULL),
(2, 'instagram', 'http://instagram.com/khmetic-tribal', '5c7131d457c52_1550922196.png', 'png', '2019-02-22 23:00:00', '2019-02-23 10:43:16', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `subscribs`
--

DROP TABLE IF EXISTS `subscribs`;
CREATE TABLE IF NOT EXISTS `subscribs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `subscribs`
--

INSERT INTO `subscribs` (`id`, `email`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'test@kemetic.com', '2019-02-16 19:31:07', '2019-02-16 19:31:07', NULL),
(2, 'test3@test.com', '2019-02-16 20:05:55', '2019-02-16 20:05:55', NULL),
(3, 'test4@test.com', '2019-02-16 20:10:00', '2019-02-16 20:10:00', NULL),
(4, 'test5@test.com', '2019-02-16 20:22:18', '2019-02-16 20:22:18', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `texte_sites`
--

DROP TABLE IF EXISTS `texte_sites`;
CREATE TABLE IF NOT EXISTS `texte_sites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `texte` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `texte_sites`
--

INSERT INTO `texte_sites` (`id`, `section`, `code`, `texte`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'footer', 'Stay_connected', 'Stay connected', '2019-02-07 23:00:00', '2019-02-07 23:00:00', NULL),
(2, 'footer', 'Subscribe_to_our_newsletter', 'Subscribe to our newsletter', '2019-02-07 23:00:00', '2019-02-07 23:00:00', NULL),
(3, 'footer', 'Join_our_mailling', 'Join our mailling list to receive the lastest news and update from our team.', '2019-02-07 23:00:00', '2019-02-07 23:00:00', NULL),
(4, 'footer', 'Susbcribe', 'Susbcribe', '2019-02-07 23:00:00', '2019-02-07 23:00:00', NULL),
(5, 'footer', 'Your_Email', 'Your Email', '2019-02-07 23:00:00', '2019-02-07 23:00:00', NULL),
(6, 'menu', 'HOME', 'HOME', '2019-02-07 23:00:00', '2019-02-07 23:00:00', NULL),
(7, 'menu', 'TRIBAL_MEMBERSHIP', 'KTM/TRIBAL MEMBERSHIP', '2019-02-07 23:00:00', '2019-02-07 23:00:00', NULL),
(8, 'menu', 'SHOP', 'SHOP', '2019-02-07 23:00:00', '2019-02-07 23:00:00', NULL),
(9, 'menu', 'TRIBAL_SERVICE', 'TRIBAL SERVICE', '2019-02-07 23:00:00', '2019-02-07 23:00:00', NULL),
(10, 'menu', 'CONTACT_US', 'CONTACT US', '2019-02-07 23:00:00', '2019-02-07 23:00:00', NULL),
(11, 'menu', 'DONATE', 'DONATE', '2019-02-07 23:00:00', '2019-02-07 23:00:00', NULL),
(12, 'contact', 'Call_Us', 'Call Us', '2019-02-07 23:00:00', '2019-02-07 23:00:00', NULL),
(13, 'contact', 'Message_Us', 'Message Us', '2019-02-07 23:00:00', '2019-02-07 23:00:00', NULL),
(14, 'contact', 'Send', 'Send', '2019-02-07 23:00:00', '2019-02-07 23:00:00', NULL),
(15, 'blog', 'Add_a_comment', 'Add a comment', '2019-02-07 23:00:00', '2019-02-07 23:00:00', NULL),
(16, 'blog', 'Your_Comment', 'Your Comment', '2019-02-07 23:00:00', '2019-02-07 23:00:00', NULL),
(17, 'blog', 'Write_your_comment_here', 'Write your comment here', '2019-02-07 23:00:00', '2019-02-07 23:00:00', NULL),
(18, 'blog', 'Your_Name', 'Your Name', '2019-02-07 23:00:00', '2019-02-07 23:00:00', NULL),
(19, 'blog', 'Your_Email', 'Your Email', '2019-02-07 23:00:00', '2019-02-07 23:00:00', NULL),
(20, 'blog', 'Your_Website', 'Your Website', '2019-02-07 23:00:00', '2019-02-07 23:00:00', NULL),
(21, 'blog', 'Will_be_displayed', 'Will be displayed', '2019-02-07 23:00:00', '2019-02-07 23:00:00', NULL),
(22, 'blog', 'Your_Website_URL', 'Your Website URL', '2019-02-07 23:00:00', '2019-02-07 23:00:00', NULL),
(23, 'blog', 'Add_Comment', 'Add Comment', '2019-02-07 23:00:00', '2019-02-07 23:00:00', NULL),
(24, 'donate', 'Enter_Amount', 'Enter Amount', '2019-02-09 23:00:00', '2019-02-09 23:00:00', NULL),
(25, 'donate', 'Donate_Now', 'Donate Now', '2019-02-09 23:00:00', '2019-02-09 23:00:00', NULL),
(26, 'donate', 'Share', 'Share', '2019-02-09 23:00:00', '2019-02-09 23:00:00', NULL),
(27, 'membership', 'KHEMETIC_CHURCH_MEMBERSHIP_INFORMATION', 'KHEMETIC CHURCH MEMBERSHIP INFORMATION', '2019-02-18 23:00:00', '2019-02-18 23:00:00', NULL),
(28, 'membership', 'application_member_ship', 'KTM / TRIBAL <span class=\"up\">M</span>EMBERSHIP <span class=\"up\">A</span>PPLICATION', '2019-02-18 23:00:00', '2019-02-18 23:00:00', NULL),
(29, 'membership', 'definition', '<span class=\"up\">D</span>EFINITION OF MEMBERSHIP.', '2019-02-18 23:00:00', '2019-02-18 23:00:00', NULL),
(30, 'membership', 'membership_1', '1 : THE STATE OR STATUS OF BEING A MEMBER.', '2019-02-18 23:00:00', '2019-02-18 23:00:00', NULL),
(31, 'membership', 'membership_2', '2 : THE BODY OF MEMBERS AN ORGANIZATION WITH A LARGE MEMEBERSHIP.', '2019-02-18 23:00:00', '2019-02-18 23:00:00', NULL),
(32, 'membership', 'Downlaod', 'Downlaod', '2019-02-18 23:00:00', '2019-02-18 23:00:00', NULL),
(33, 'download information', 'user_info_pleasefield', 'please field somme information befor downloading', '2019-02-20 23:00:00', '2019-02-20 23:00:00', NULL),
(34, 'download information', 'user_info_Email_address', 'Email address', '2019-02-20 23:00:00', '2019-02-20 23:00:00', NULL),
(35, 'download information', 'user_info_Enter_your_email', 'Enter your email', '2019-02-20 23:00:00', '2019-02-20 23:00:00', NULL),
(36, 'download information', 'user_info_first_name', 'first name', '2019-02-20 23:00:00', '2019-02-20 23:00:00', NULL),
(37, 'download information', 'user_info_your_first_name', 'Enter your first name', '2019-02-20 23:00:00', '2019-02-20 23:00:00', NULL),
(38, 'download information', 'user_info_Last_name', 'Last name', '2019-02-20 23:00:00', '2019-02-20 23:00:00', NULL),
(39, 'download information', 'user_info_your_Last_name', 'Enter your Last name', '2019-02-20 23:00:00', '2019-02-20 23:00:00', NULL),
(40, 'download information', 'user_info_Phone', 'Phone', '2019-02-20 23:00:00', '2019-02-20 23:00:00', NULL),
(41, 'download information', 'user_info_your_phone_number', 'Enter your phone number', '2019-02-20 23:00:00', '2019-02-20 23:00:00', NULL),
(42, 'download information', 'user_info_Close', 'Close', '2019-02-20 23:00:00', '2019-02-20 23:00:00', NULL),
(43, 'download information', 'user_info_Save_and_download', 'Save and download', '2019-02-20 23:00:00', '2019-02-20 23:00:00', NULL),
(44, 'form', 'save', 'Save ', '2019-02-22 23:00:00', '2019-02-22 23:00:00', NULL),
(45, 'message', 'msg_email', 'your email have been succefully save ', '2019-02-22 23:00:00', '2019-02-22 23:00:00', NULL),
(46, 'contact', 'user_info_phone', 'Phone', '2019-03-05 23:00:00', '2019-03-05 23:00:00', NULL),
(47, 'form', 'phone_save', 'Call now', '2019-03-06 23:00:00', '2019-03-06 23:00:00', NULL),
(48, 'button', 'listen', 'Listen', '2019-03-08 23:00:00', '2019-03-08 23:00:00', NULL),
(49, 'button', 'download_stream', 'Download', '2019-03-08 23:00:00', '2019-03-08 23:00:00', NULL),
(50, 'menu', 'CALENDAR', 'CALENDAR', '2019-05-11 10:40:06', '2019-05-11 10:40:48', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `texte_sites_langues`
--

DROP TABLE IF EXISTS `texte_sites_langues`;
CREATE TABLE IF NOT EXISTS `texte_sites_langues` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `langue_id` int(11) NOT NULL,
  `texte_site_id` int(11) NOT NULL,
  `section` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `texte` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_texte_sites_langues_langues1_idx` (`langue_id`),
  KEY `fk_texte_sites_langues_texte_sites1_idx` (`texte_site_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `texte_sites_langues`
--

INSERT INTO `texte_sites_langues` (`id`, `langue_id`, `texte_site_id`, `section`, `code`, `texte`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 1, 'footer', 'Stay_connected', 'Rester connecté', '2019-02-08 19:38:08', '2019-02-08 19:57:43', NULL),
(2, 2, 1, 'footer', 'Stay_connected', 'Rămâneți conectat (ă)', '2019-02-08 19:53:40', '2019-02-08 19:53:40', NULL),
(3, 4, 1, 'footer', 'Stay_connected', 'Rimani connesso', '2019-02-08 19:54:19', '2019-02-08 19:54:19', NULL),
(4, 5, 1, 'footer', 'Stay_connected', 'Mantente conectado', '2019-02-08 19:54:38', '2019-02-08 19:54:38', NULL),
(5, 6, 1, 'footer', 'Stay_connected', 'Bleiben Sie in Verbindung', '2019-02-08 19:54:53', '2019-02-08 19:54:53', NULL),
(6, 3, 2, 'footer', 'Subscribe_to_our_newsletter', 'Recevez nos dernières information', '2019-02-10 10:01:23', '2019-02-10 10:01:23', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `photo`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SuperAdmin', 'admin@khemeticchurch.com', '5c60018597def_1549795717.png', '$2y$10$6x4WNRGvkoE9qAtcBXYTbOdu8e5NsFnKoNBWuaz7S3hpLU5XT.7UC', 'WQTSkpplEIXsGOVXlxSQ0EnUkqoy1Ex5LDtL34AZlnLONEdx1PrsOZysMYYm', '2019-02-03 09:43:42', '2019-05-01 15:42:04', NULL),
(2, 'admin', 'simpleadmin@khemeticchurch.com', 'default.jpg', '$2y$10$p7y/XXNdc.hP6KjNdZC7.OsYDNgFBPwXhHkX0Jcupn8rfKu921tM.', NULL, '2019-02-10 09:35:21', '2019-05-01 15:42:04', NULL),
(3, 'User TEST', 'test1@test.com', 'default.jpg', '$2y$10$DSo/YhWyWWPfhf/idPhoy./hh0NZofZg9s.zIhbSnTKAOwIsxAmmS', 'sT5y4W3gueNuY2HQwgZgt4RLneQpchK1tXpPtKhhTQ9JPTGRIyhYLXsUJLts', '2019-05-01 14:26:32', '2019-05-01 14:26:32', NULL),
(4, 'Alice', 'alice@test.com', 'default.jpg', '$2y$10$eGFX4IEC9Cl5W4JYVxXI4.EIXjQBF/3BAtMhHiC17qZS8kCLJGhDq', 'ImO74DWUG6t3elJJ9j02LUXijiHRIWbsKAQ4CardAg4BkzM6sEFWBoUKRp6X', '2019-05-13 18:37:38', '2019-05-13 18:37:38', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `laravel_fulltext`
--
ALTER TABLE `laravel_fulltext` ADD FULLTEXT KEY `fulltext_title` (`indexed_title`);
ALTER TABLE `laravel_fulltext` ADD FULLTEXT KEY `fulltext_title_content` (`indexed_title`,`indexed_content`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `blog_etc_comments`
--
ALTER TABLE `blog_etc_comments`
  ADD CONSTRAINT `blog_etc_comments_blog_etc_post_id_foreign` FOREIGN KEY (`blog_etc_post_id`) REFERENCES `blog_etc_posts` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `blog_etc_post_categories`
--
ALTER TABLE `blog_etc_post_categories`
  ADD CONSTRAINT `blog_etc_post_categories_blog_etc_category_id_foreign` FOREIGN KEY (`blog_etc_category_id`) REFERENCES `blog_etc_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blog_etc_post_categories_blog_etc_post_id_foreign` FOREIGN KEY (`blog_etc_post_id`) REFERENCES `blog_etc_posts` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `medias`
--
ALTER TABLE `medias`
  ADD CONSTRAINT `medias_ibfk_1` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`);

--
-- Contraintes pour la table `media_associers`
--
ALTER TABLE `media_associers`
  ADD CONSTRAINT `media_associers_ibfk_1` FOREIGN KEY (`media_id`) REFERENCES `medias` (`id`);

--
-- Contraintes pour la table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

