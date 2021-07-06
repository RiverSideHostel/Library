-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2021 年 7 月 06 日 20:12
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
(1, '宮川', 'ホンマタカシ', '2015-06', 400, '写真', 'これはすごい本です', '20210706164600d41d8cd98f00b204e9800998ecf8427e.jpg', 0, 2, 4, 'コンビニ', '大名', 'NULL', 'NULL', 0, '2021-06-24 11:59:11', '2021-06-24 11:59:11'),
(2, '宮川', 'ホンマタカシ', '2015-06', 400, '写真', 'これはすごい本です', '20210706164600d41d8cd98f00b204e9800998ecf8427e.jpg', 0, 2, 4, 'コンビニ', '大名', 'NULL', 'NULL', 0, '2021-07-06 18:58:39', '2021-07-06 18:58:39'),
(3, 'NEW WAVE', 'ホンマタカシ', '2007-06', 400, '写真', 'これはすごい本です', '20210706164600d41d8cd98f00b204e9800998ecf8427e.jpg', 0, 2, 4, 'NULL', 'NULL', 'NULL', 'NULL', 0, '2021-07-06 19:09:18', '2021-07-06 19:09:18'),
(4, 'NEW WAVE', 'ホンマタカシ', '2007-06', 400, '写真', 'これはすごい本です', '20210706164600d41d8cd98f00b204e9800998ecf8427e.jpg', 0, 2, NULL, 'NULL', 'NULL', 'NULL', 'NULL', 0, '2021-07-06 19:26:34', '2021-07-06 19:26:34'),
(5, 'NEW WAVE', 'ホンマタカシ', '2007-06', 400, '写真', 'これはすごい本です', '20210706164600d41d8cd98f00b204e9800998ecf8427e.jpg', 0, 2, NULL, NULL, NULL, NULL, NULL, 0, '2021-07-06 19:27:16', '2021-07-06 19:27:16'),
(6, 'NEW WAVE', 'ホンマタカシ', '2007-06', 400, '写真', 'これはすごい本です', '20210706164600d41d8cd98f00b204e9800998ecf8427e.jpg', 0, 2, NULL, NULL, NULL, NULL, NULL, 0, '2021-07-06 19:29:03', '2021-07-06 19:29:03'),
(7, 'In the Wake 震災以後　：　日本の写真家がとらえた3.11', '新井 卓', '2015-06', 500, '写真集', '学生時代に買ったもので, ３回くらい読んでそれっきり本棚に飾ってある状態です. ', '../image/20210706194246d41d8cd98f00b204e9800998ecf8427e.jpg', 0, 7, NULL, NULL, NULL, NULL, NULL, 0, '2021-07-06 19:42:46', '2021-07-06 19:42:46'),
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
(25, 'In the Wake 震災以後　：　日本の写真家がとらえた3.11', '新井 卓', '2015-06', 500, '写真集', '学生時代に買ったもので, ３回くらい読んでそれっきり本棚に飾ってある状態です. ', '../image/20210706200459d41d8cd98f00b204e9800998ecf8427e.jpg', 0, 7, NULL, NULL, NULL, NULL, NULL, 0, '2021-07-06 20:04:59', '2021-07-06 20:04:59');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `books`
--
ALTER TABLE `books`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
