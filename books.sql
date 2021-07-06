-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2021 年 7 月 07 日 01:10
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
(24, 'In the Wake 震災以後　：　日本の写真家がとらえた3.11', '新井 卓', '2015-06', 500, '写真集', '学生時代に買ったもので, ３回くらい読んでそれっきり本棚に飾ってある状態です. ', '../image/20210706200443d41d8cd98f00b204e9800998ecf8427e.jpg', 0, 7, NULL, NULL, NULL, NULL, NULL, 0, '2021-07-06 20:04:43', '2021-07-06 20:04:43'),
(26, '東京の子供', 'ホンマタカシ', '2001-12', 800, '写真集', '廃盤なのでレアです', '../image/202107062024018c7bedc744527a5cad493a23c9c389f5.webp', 0, 10, NULL, NULL, NULL, NULL, NULL, 0, '2021-07-06 20:24:01', '2021-07-06 20:24:01'),
(29, 'Ancient And Modern ', 'William Eggleston ', '2002-01', 700, '写真集', 'ウィリアム・エグルストンの写真集。南アメリカで撮影された初期の作品から、1980年代終盤までの作品を編纂して収録。', '../image/202107070051478c7bedc744527a5cad493a23c9c389f5.jpg', 0, 10, NULL, NULL, NULL, NULL, NULL, 0, '2021-07-07 00:51:47', '2021-07-07 00:51:47'),
(30, 'The Decisive Moment', 'アンリ・カルティエ・ブレッソン', '2014-06', 1400, '写真集', '写真家集団マグナムを創設したことでも知られるフランスの写真家、アンリ・カルティエ=ブレッソンの写真集。ストリートスナップを芸術として確立させた代表作「決定的瞬間」の待望の復刻版。解説ブックレット付。 函に少ヨゴレがあるほかは、全体的に状態良好。', '../image/202107070100258c7bedc744527a5cad493a23c9c389f5.jpg', 0, 10, NULL, NULL, NULL, NULL, NULL, 0, '2021-07-07 01:00:25', '2021-07-07 01:00:25'),
(31, 'Dayanita Singh: Museum of Chance', 'Dayanita Singh', '2005-07', 1000, '写真集', 'インド出身の写真家、ダヤニータ・シンの写真集。外国人が思い描く、\"エキゾチック\"、\"混沌\"といったステレオタイプなインドではなく、静謐で詩的、夢と現実を行き来するかのようなインドの姿がモノクロ作品で収められている。 全体的に状態良好。', '../image/202107070106448c7bedc744527a5cad493a23c9c389f5.png', 0, 10, NULL, NULL, NULL, NULL, NULL, 0, '2021-07-07 01:06:44', '2021-07-07 01:06:44'),
(32, 'William Eggleston: Election Eve', 'William Eggleston', '2020-03', 800, '写真集', 'カラー表現を用いたアート・フォトのパイオニア、ウィリアム・エグルストンの作品集。1977年にコルデコット・チャブ社から5冊のみ出版された2冊組の希少な作品集を、シュタイデル社が1冊にまとめたもの。テネシー州メンフィスからジョージア州プレーンズへ旅した際に撮影された写真を収録。 英語表記。 全体的に状態良好。', '../image/202107070109128c7bedc744527a5cad493a23c9c389f5.png', 0, 10, NULL, NULL, NULL, NULL, NULL, 0, '2021-07-07 01:09:12', '2021-07-07 01:09:12');

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
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
