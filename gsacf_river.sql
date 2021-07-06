-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2021 年 7 月 06 日 21:30
-- サーバのバージョン： 10.4.19-MariaDB
-- PHP のバージョン: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gsacf_river`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `books`
--

CREATE TABLE `books` (
  `id` int(12) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `published` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(12) NOT NULL,
  `genre` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `user_id` int(12) NOT NULL,
  `borrow_user_id` int(12) DEFAULT NULL,
  `trade_type` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receipt_date` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_date` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `books`
--

INSERT INTO `books` (`id`, `name`, `author`, `published`, `price`, `genre`, `description`, `image`, `status`, `user_id`, `borrow_user_id`, `trade_type`, `place_name`, `receipt_date`, `return_date`, `is_deleted`, `created_at`, `updated_at`) VALUES
(3, 'NEW WAVE', 'ホンマタカシ', '2007-06', 400, '写真', 'これはすごい本です', '20210706164600d41d8cd98f00b204e9800998ecf8427e.jpg', 0, 2, 4, 'NULL', 'NULL', 'NULL', 'NULL', 0, '2021-07-06 19:09:18', '2021-07-06 19:09:18'),
(6, 'NEW WAVE', 'ホンマタカシ', '2007-06', 400, '写真', 'これはすごい本です', '20210706164600d41d8cd98f00b204e9800998ecf8427e.jpg', 0, 2, NULL, NULL, NULL, NULL, NULL, 0, '2021-07-06 19:29:03', '2021-07-06 19:29:03'),
(8, 'In the Wake 震災以後　：　日本の写真家がとらえた3.11', '新井 卓', '2015-06', 500, '写真集', '学生時代に買ったもので, ３回くらい読んでそれっきり本棚に飾ってある状態です. ', '../image/20210706194252d41d8cd98f00b204e9800998ecf8427e.jpg', 0, 7, NULL, NULL, NULL, NULL, NULL, 0, '2021-07-06 19:42:52', '2021-07-06 19:42:52'),
(9, 'In the Wake 震災以後　：　日本の写真家がとらえた3.11', '新井 卓', '2015-06', 500, '写真集', '学生時代に買ったもので, ３回くらい読んでそれっきり本棚に飾ってある状態です. ', '../image/20210706194512d41d8cd98f00b204e9800998ecf8427e.jpg', 0, 7, NULL, NULL, NULL, NULL, NULL, 0, '2021-07-06 19:45:12', '2021-07-06 19:45:12'),
(10, 'In the Wake 震災以後　：　日本の写真家がとらえた3.11', '新井 卓', '2015-06', 500, '写真集', '学生時代に買ったもので, ３回くらい読んでそれっきり本棚に飾ってある状態です. ', '../image/20210706194725d41d8cd98f00b204e9800998ecf8427e.jpg', 0, 7, NULL, NULL, NULL, NULL, NULL, 0, '2021-07-06 19:47:25', '2021-07-06 19:47:25'),
(11, 'In the Wake 震災以後　：　日本の写真家がとらえた3.11', '新井 卓', '2015-06', 500, '写真集', '学生時代に買ったもので, ３回くらい読んでそれっきり本棚に飾ってある状態です. ', '../image/20210706194935d41d8cd98f00b204e9800998ecf8427e.jpg', 0, 7, NULL, NULL, NULL, NULL, NULL, 0, '2021-07-06 19:49:35', '2021-07-06 19:49:35'),
(12, 'In the Wake 震災以後　：　日本の写真家がとらえた3.11', '新井 卓', '2015-06', 500, '写真集', '学生時代に買ったもので, ３回くらい読んでそれっきり本棚に飾ってある状態です. ', '../image/20210706194940d41d8cd98f00b204e9800998ecf8427e.jpg', 0, 7, NULL, NULL, NULL, NULL, NULL, 0, '2021-07-06 19:49:40', '2021-07-06 19:49:40'),
(13, 'In the Wake 震災以後　：　日本の写真家がとらえた3.11', '新井 卓', '2015-06', 500, '写真集', '学生時代に買ったもので, ３回くらい読んでそれっきり本棚に飾ってある状態です. ', '../image/20210706195148d41d8cd98f00b204e9800998ecf8427e.jpg', 0, 7, NULL, NULL, NULL, NULL, NULL, 0, '2021-07-06 19:51:48', '2021-07-06 19:51:48'),
(14, 'In the Wake 震災以後　：　日本の写真家がとらえた3.11', '新井 卓', '2015-06', 500, '写真集', '学生時代に買ったもので, ３回くらい読んでそれっきり本棚に飾ってある状態です. ', '../image/20210706195228d41d8cd98f00b204e9800998ecf8427e.jpg', 0, 7, NULL, NULL, NULL, NULL, NULL, 0, '2021-07-06 19:52:28', '2021-07-06 19:52:28'),
(15, 'In the Wake 震災以後　：　日本の写真家がとらえた3.11', '新井 卓', '2015-06', 500, '写真集', '学生時代に買ったもので, ３回くらい読んでそれっきり本棚に飾ってある状態です. ', '../image/20210706195435d41d8cd98f00b204e9800998ecf8427e.jpg', 0, 7, NULL, NULL, NULL, NULL, NULL, 0, '2021-07-06 19:54:35', '2021-07-06 19:54:35'),
(16, 'In the Wake 震災以後　：　日本の写真家がとらえた3.11', '新井 卓', '2015-06', 500, '写真集', '学生時代に買ったもので, ３回くらい読んでそれっきり本棚に飾ってある状態です. ', '../image/20210706195504d41d8cd98f00b204e9800998ecf8427e.jpg', 0, 7, NULL, NULL, NULL, NULL, NULL, 0, '2021-07-06 19:55:04', '2021-07-06 19:55:04'),
(17, 'In the Wake 震災以後　：　日本の写真家がとらえた3.11', '新井 卓', '2015-06', 500, '写真集', '学生時代に買ったもので, ３回くらい読んでそれっきり本棚に飾ってある状態です. ', '../image/20210706195526d41d8cd98f00b204e9800998ecf8427e.jpg', 0, 7, NULL, NULL, NULL, NULL, NULL, 0, '2021-07-06 19:55:26', '2021-07-06 19:55:26'),
(18, 'In the Wake 震災以後　：　日本の写真家がとらえた3.11', '新井 卓', '2015-06', 500, '写真集', '学生時代に買ったもので, ３回くらい読んでそれっきり本棚に飾ってある状態です. ', '../image/20210706195725d41d8cd98f00b204e9800998ecf8427e.jpg', 0, 7, NULL, NULL, NULL, NULL, NULL, 0, '2021-07-06 19:57:25', '2021-07-06 19:57:25'),
(19, 'In the Wake 震災以後　：　日本の写真家がとらえた3.11', '新井 卓', '2015-06', 500, '写真集', '学生時代に買ったもので, ３回くらい読んでそれっきり本棚に飾ってある状態です. ', '../image/20210706200016d41d8cd98f00b204e9800998ecf8427e.jpg', 0, 7, NULL, NULL, NULL, NULL, NULL, 0, '2021-07-06 20:00:16', '2021-07-06 20:00:16'),
(20, 'In the Wake 震災以後　：　日本の写真家がとらえた3.11', '新井 卓', '2015-06', 500, '写真集', '学生時代に買ったもので, ３回くらい読んでそれっきり本棚に飾ってある状態です. ', '../image/20210706200105d41d8cd98f00b204e9800998ecf8427e.jpg', 0, 7, NULL, NULL, NULL, NULL, NULL, 0, '2021-07-06 20:01:05', '2021-07-06 20:01:05'),
(21, 'In the Wake 震災以後　：　日本の写真家がとらえた3.11', '新井 卓', '2015-06', 500, '写真集', '学生時代に買ったもので, ３回くらい読んでそれっきり本棚に飾ってある状態です. ', '../image/20210706200317d41d8cd98f00b204e9800998ecf8427e.jpg', 0, 7, NULL, NULL, NULL, NULL, NULL, 0, '2021-07-06 20:03:17', '2021-07-06 20:03:17'),
(22, 'In the Wake 震災以後　：　日本の写真家がとらえた3.11', '新井 卓', '2015-06', 500, '写真集', '学生時代に買ったもので, ３回くらい読んでそれっきり本棚に飾ってある状態です. ', '../image/20210706200403d41d8cd98f00b204e9800998ecf8427e.jpg', 0, 7, NULL, NULL, NULL, NULL, NULL, 0, '2021-07-06 20:04:03', '2021-07-06 20:04:03'),
(23, 'In the Wake 震災以後　：　日本の写真家がとらえた3.11', '新井 卓', '2015-06', 500, '写真集', '学生時代に買ったもので, ３回くらい読んでそれっきり本棚に飾ってある状態です. ', '../image/20210706200411d41d8cd98f00b204e9800998ecf8427e.jpg', 0, 7, NULL, NULL, NULL, NULL, NULL, 0, '2021-07-06 20:04:11', '2021-07-06 20:04:11'),
(24, 'In the Wake 震災以後　：　日本の写真家がとらえた3.11', '新井 卓', '2015-06', 500, '写真集', '学生時代に買ったもので, ３回くらい読んでそれっきり本棚に飾ってある状態です. ', '../image/20210706200443d41d8cd98f00b204e9800998ecf8427e.jpg', 0, 7, NULL, NULL, NULL, NULL, NULL, 0, '2021-07-06 20:04:43', '2021-07-06 20:04:43'),
(26, '東京の子供', 'ホンマタカシ', '2001-12', 800, '写真集', '廃盤なのでレアです', '../image/202107062024018c7bedc744527a5cad493a23c9c389f5.webp', 0, 10, NULL, NULL, NULL, NULL, NULL, 0, '2021-07-06 20:24:01', '2021-07-06 20:24:01');

-- --------------------------------------------------------

--
-- テーブルの構造 `places`
--

CREATE TABLE `places` (
  `id` int(12) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_type` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int(12) NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `users_table`
--

CREATE TABLE `users_table` (
  `id` int(12) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` varchar(512) NOT NULL,
  `icon` mediumblob NOT NULL,
  `is_admin` int(1) NOT NULL,
  `is_deleted` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `users_table`
--

INSERT INTO `users_table` (`id`, `name`, `email`, `password`, `address`, `profile`, `icon`, `is_admin`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, '地図先生', 'tizu@example.com', 'tizutizu', '', '', '', 0, 0, '2021-06-19 17:04:18', '2021-06-19 17:26:55'),
(2, 'Watson', 'watson@example.com', 'watson', '', '', '', 0, 0, '2021-06-19 17:04:50', '2021-06-19 17:04:50'),
(3, 'hige', 'hige@example.com', 'higehige', '', '', '', 0, 0, '2021-06-19 17:28:11', '2021-06-19 17:28:11'),
(4, 'miya', 'miya@example.com', 'miyamiya', '', '', '', 0, 0, '2021-07-05 02:26:14', '2021-07-05 02:26:14'),
(5, '具志堅', 'gushiken@example.com', 'gushiken', '', '', '', 0, 0, '2021-07-05 02:26:36', '2021-07-05 02:26:36');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `books`
--
ALTER TABLE `books`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- テーブルの AUTO_INCREMENT `places`
--
ALTER TABLE `places`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `users_table`
--
ALTER TABLE `users_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
