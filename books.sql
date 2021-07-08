-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2021 年 7 月 08 日 20:18
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
(24, 'In the Wake 震災以後　：　日本の写真家がとらえた3.11', '新井 卓', '2015-06', 500, '写真集', '学生時代に買ったもので, ３回くらい読んでそれっきり本棚に飾ってある状態です. ', 'image/20210706200443d41d8cd98f00b204e9800998ecf8427e.jpg', 0, 2, NULL, NULL, NULL, NULL, NULL, 0, '2021-07-06 20:04:43', '2021-07-06 20:04:43'),
(26, '東京の子供', 'ホンマタカシ', '2001-12', 800, '写真集', '廃盤なのでレアです', 'image/202107062024018c7bedc744527a5cad493a23c9c389f5.webp', 1, 4, 1, '郵送', NULL, '2021-07-8', '2021-07-15', 0, '2021-07-06 20:24:01', '2021-07-08 04:47:21'),
(29, 'Ancient And Modern ', 'William Eggleston ', '2002-01', 700, '写真集', 'ウィリアム・エグルストンの写真集。南アメリカで撮影された初期の作品から、1980年代終盤までの作品を編纂して収録。', 'image/202107070051478c7bedc744527a5cad493a23c9c389f5.jpg', 1, 3, 4, '郵送', NULL, '2021-07-08', '2021-07-15', 0, '2021-07-07 00:51:47', '2021-07-08 00:42:37'),
(30, 'The Decisive Moment', 'アンリ・カルティエ・ブレッソン', '2014-06', 1400, '写真集', '写真家集団マグナムを創設したことでも知られるフランスの写真家、アンリ・カルティエ=ブレッソンの写真集。ストリートスナップを芸術として確立させた代表作「決定的瞬間」の待望の復刻版。解説ブックレット付。 函に少ヨゴレがあるほかは、全体的に状態良好。', 'image/202107070100258c7bedc744527a5cad493a23c9c389f5.jpg', 1, 1, 3, '郵送', NULL, '2021-07-10', '2021-07-17', 0, '2021-07-07 01:00:25', '2021-07-08 01:20:02'),
(31, 'Dayanita Singh: Museum of Chance', 'Dayanita Singh', '2005-07', 1000, '写真集', 'インド出身の写真家、ダヤニータ・シンの写真集。外国人が思い描く、\"エキゾチック\"、\"混沌\"といったステレオタイプなインドではなく、静謐で詩的、夢と現実を行き来するかのようなインドの姿がモノクロ作品で収められている。 全体的に状態良好。', 'image/202107070106448c7bedc744527a5cad493a23c9c389f5.png', 1, 5, 3, '郵送', NULL, '2021-07-13', '2021-07-20', 0, '2021-07-07 01:06:44', '2021-07-08 00:57:30'),
(32, 'William Eggleston: Election Eve', 'William Eggleston', '2020-03', 800, '写真集', 'カラー表現を用いたアート・フォトのパイオニア、ウィリアム・エグルストンの作品集。1977年にコルデコット・チャブ社から5冊のみ出版された2冊組の希少な作品集を、シュタイデル社が1冊にまとめたもの。テネシー州メンフィスからジョージア州プレーンズへ旅した際に撮影された写真を収録。 英語表記。 全体的に状態良好。', 'image/202107070109128c7bedc744527a5cad493a23c9c389f5.png', 0, 6, NULL, NULL, NULL, NULL, NULL, 0, '2021-07-07 01:09:12', '2021-07-07 01:09:12'),
(33, 'TOKYO NOBODY―中野正貴写真集', '中野正貴', '2000-07', 500, '写真集', '街から人がいなくなり、残されたのは建物だけ。今まで人間が行ってきたことは何だったのか。自然との共存を拒否し、破壊と創造を繰り返した人間が作り出した街の姿を捉えた写真集。', 'image/202107071247508c7bedc744527a5cad493a23c9c389f5.jpg', 1, 7, 3, 'コンビニ', NULL, '2021-07-14', '2021-07-21', 0, '2021-07-07 12:47:50', '2021-07-08 00:58:07'),
(34, 'プログラミングC# 第8版', 'Ian Griffiths, 鈴木 幸敏他', '2021-06', 500, 'IT・コンピュータ', 'C#を体系的に網羅したC#プログラマのバイブルが、C# 8.0に合わせて全面改訂。言語仕様からクラウドも考慮したWebアプリ開発、デスクトップアプリ構築まで、C# 8.0の基本から高度なテクニックまでを詳しく紹介します。', 'image/20210707182616498b5cccba0c431f2f0c2bb139cdb804.webp', 1, 5, 4, '郵送', NULL, '2021-07-12', '2021-07-19', 0, '2021-07-07 18:26:16', '2021-07-08 00:49:50'),
(35, 'Docker', 'Adrian Mouat、 Sky株式会社 玉川 竜司', '2016-08', 500, 'IT・コンピュータ', '本書はオープンソースのコンテナ管理ソフトウェア、Dockerの基礎から応用までを網羅した総合的な解説書です。\r\nはじめに開発環境をセットアップし、シンプルなWebアプリケーションのビルドについて解説した上で、コンテナの開発、テスト、結合に加えて、デプロイの方法、実動システムの効率的なモニタリングとロギングを紹介します。', 'image/20210708023833498b5cccba0c431f2f0c2bb139cdb804.webp', 0, 9, NULL, NULL, NULL, NULL, NULL, 0, '2021-07-08 02:38:33', '2021-07-08 02:38:33'),
(36, 'ソールライターのすべて', 'ソールライター', '2017-06', 500, '写真集', '「人生で大切なことは、何を手に入れるかじゃない。何を捨てるかということだ」\r\n\r\n作品と言葉で紡ぐ、ソール・ライターの人生哲学と美意識', 'image/2021070803070026677236ba3a7db94b5fb3e44a7eb71b.jpg', 0, 2, NULL, NULL, NULL, NULL, NULL, 0, '2021-07-08 03:07:00', '2021-07-08 03:07:00'),
(37, '永遠のソール・ライター', 'ソール・ライター', '2020-01', 400, '写真集', 'NHK「日曜美術館」で紹介された展覧会の公式図録としても大注目!\r\n「カラー写真のパイオニア」、写真家ソール・ライター。NYの日常風景を天性の色彩感覚と構図で切り取ったスナップ写真は、世界中に驚きと賞賛をもって受け止められ、2017年に日本で開催された作品展も大成功を収めました。', 'image/2021070803124026677236ba3a7db94b5fb3e44a7eb71b.jpg', 0, 2, NULL, NULL, NULL, NULL, NULL, 0, '2021-07-08 03:12:40', '2021-07-08 03:12:40'),
(38, 'グスタフ・クリムトの世界-女たちの黄金迷宮', '海野 弘', '2018-07', 600, '画集', '世紀末ウィーンの巨匠グスタフ・クリムト(1862-1918)の作品約230点を収録した超豪華作品集。クリムトの生涯、19世紀末ウィーンの文化、ウィーン分離派・工房のアーティストたちの作品について、海野弘氏のこれまでにない新しい解説とともに美しい図版の数々を紹介します。', 'image/2021070803160426677236ba3a7db94b5fb3e44a7eb71b.jpg', 0, 2, NULL, NULL, NULL, NULL, NULL, 0, '2021-07-08 03:16:04', '2021-07-08 03:16:04'),
(39, '起業の科学 スタートアップサイエンス', '田所 雅之', '2017-11', 300, 'ビジネス', 'スタートアップが必ず直面する課題と\r\nその解決策を、時系列に整理。\r\n失敗を潰せる「科学的な起業」の教科書。\r\nあなたの失敗は99%潰せる!', 'image/2021070803221026677236ba3a7db94b5fb3e44a7eb71b.jpg', 0, 2, NULL, NULL, NULL, NULL, NULL, 0, '2021-07-08 03:22:10', '2021-07-08 03:22:10'),
(40, 'サピエンス全史 上 文明の構造と人類の幸福', 'ユヴァル・ノア・ハラリ, 柴田 裕之他', '2017-02', 400, 'ビジネス', '国家、貨幣、企業……虚構が他人との協力を可能にし、文明をもたらした！　ではその文明は人類を幸福にしたのだろうか？　現代世界を鋭くえぐる、50カ国以上で刊行の世界的ベストセラー！', 'image/2021070803294726677236ba3a7db94b5fb3e44a7eb71b.webp', 0, 2, NULL, NULL, NULL, NULL, NULL, 0, '2021-07-08 03:29:47', '2021-07-08 03:29:47'),
(41, 'ライゾマティクス_マルティプレックス', '東京都現代美術館 (監修)', '2021-06', 600, 'IT・コンピュータ', 'テクノロジーと表現の新しい可能性を常に探求し、数多くの実験的なプロジェクトとコラボレーションで世界的に活躍するクリエイティブ集団、ライゾマティクス。', 'image/2021070803332226677236ba3a7db94b5fb3e44a7eb71b.jpg', 0, 2, NULL, NULL, NULL, NULL, NULL, 0, '2021-07-08 03:33:22', '2021-07-08 03:33:22'),
(42, 'HIROSHI SUGIMOTO', '杉本博司', '2005-09', 750, '写真集', 'アーティスト杉本博司の作品がトータルに収録された唯一の作品集。現在進行形の作家の新作が増補された貴重な一冊。\r\n「HIROSHI SUGIMOTO」展のドイツでの開催に合わせて、[放電場]を増補して出版された。ドイツ語版に日本語ブックレット付きで販売。', 'image/2021070803352626677236ba3a7db94b5fb3e44a7eb71b.webp', 0, 2, NULL, NULL, NULL, NULL, NULL, 0, '2021-07-08 03:35:26', '2021-07-08 03:35:26'),
(43, 'Old Is New: 新素材研究所の仕事', '杉本 博司  (著), 榊田 倫之 (著)', '2021-03', 1000, '写真集', '現代美術作家の杉本博司と建築家の榊田倫之による新素材研究所の初のモノグラフ。伝統的な素材を取り入れて、新しい大胆な建築デザインに取り組んだ作品をヴィジュアルに紹介。\r\n\r\n新素材研究所:現代美術作家の杉本博司と、建築家の榊田倫之によって2008年に設立された建築設計事務所。', 'image/2021070803412426677236ba3a7db94b5fb3e44a7eb71b.jpg', 0, 2, NULL, NULL, NULL, NULL, NULL, 0, '2021-07-08 03:41:24', '2021-07-08 03:41:24'),
(44, 'ルイス・カーン―光と空間', 'ウルス ビュッティカー (著), Urs B¨uttiker (原著), 富岡 義人 (翻訳),', '1996-09', 800, '写真集', '「構造は光を与え、光は空間をつくりだす」という言葉を残し、自然光の扱い方について現代建築に大きな影響を与えたルイス・カーンの仕事の道筋を、多くの作品を紹介するとともに丹念に跡づけ、分析する。', 'image/2021070803475026677236ba3a7db94b5fb3e44a7eb71b.jpg', 0, 2, NULL, NULL, NULL, NULL, NULL, 0, '2021-07-08 03:47:50', '2021-07-08 03:47:50'),
(45, 'Wall and Piece', 'Banksy(バンクシー) (著), 廣渡 太郎 (翻訳)', '2011-07', 400, '写真集', 'イギリスのロンドンを拠点に活動する覆面芸術家バンクシー。\r\nロンドンのテート・モダンや、ニューヨークのメトロポリタン美術館への無許可展示など、\r\n常にスキャンダラスなパフォーマンスで話題の人物。\r\n世界中の壁、橋、街の動物園など、あらゆるストリートの一角に、\r\nウィットに富み、破壊力のあるグラフィティで彩りを与えることを仕業としている。', 'image/2021070814054426677236ba3a7db94b5fb3e44a7eb71b.jpg', 0, 1, NULL, NULL, NULL, NULL, NULL, 0, '2021-07-08 14:05:44', '2021-07-08 14:05:44'),
(46, 'Mario Giacomelli ペーパーバック', ' Alistair Crawford (著)', '2006-01', 1000, '写真集', 'Alistair Crawford has contributed widely to photography books, catalogues and journals throughout Britain, France, Italy, New Zealand and the US. He has curated several major touring photographic exhibitions, including \'Mario Giacomelli\'.', 'image/2021070815131926677236ba3a7db94b5fb3e44a7eb71b.jpg', 0, 9, NULL, NULL, NULL, NULL, NULL, 0, '2021-07-08 15:13:19', '2021-07-08 15:13:19'),
(47, 'マリオ・ジャコメッリ写真集 ―黒と白の往還の果てに＜新装版＞（完全日本語版）', 'マリオ・​ジャコメッリ/アレッサンドラ・マウロ編/岡本太郎 他訳', '2013-04', 800, '写真集', '寡黙なる宿命の大地虚無と孤独実存を突き刺す深淵の世界・・・・・\r\nモノクロームと強烈なコントラストで「生」と「死」のあいだを往還する作品は、見る者を遥か記憶の彼方へと連れ出し、心奥に圧倒的な残像をもたらす。\r\n\r\n掲載作品：代表作品100余点を網羅。\r\n年譜：ポートレイトを含む貴重な写真を添えて\r\n詩：制作にインスピレーションを与えた詩6篇\r\n寄稿：様々な識者による寄稿文\r\n日本語翻訳：岡本太郎', 'image/2021070815192626677236ba3a7db94b5fb3e44a7eb71b.jpg', 0, 9, NULL, NULL, NULL, NULL, NULL, 0, '2021-07-08 15:19:26', '2021-07-08 15:19:26'),
(50, '[第3版]Python機械学習プログラミング 達人データサイエンティストによる理論と実践', 'Sebastian Raschka  (著), Vahid Mirjalili (著)', '2020-10', 600, 'IT・コンピュータ', '本書は、機械学習コンセプト全般をカバーし、理論的背景とPythonコーディングの実際を解説しています。初歩的な線形回帰から始め、ディープラーニング(CNN/RNN)、敵対的生成ネットワーク(GAN)、強化学習などを取り上げ、scikit‐learnやTensorFlowなどPythonライブラリの新版を使ってプログラミング。第3版では13~16章の内容をほとんど刷新したほか、敵対的生成ネットワークと強化学習の章を新たに追加。機械学習プログラミングの本格的な理解と実践に向けて大きく飛躍できる一冊です。', 'image/2021070817590926677236ba3a7db94b5fb3e44a7eb71b.jpg', 1, 9, 4, 'コンビニ', NULL, '2021-07-27', '2021-08-03', 0, '2021-07-08 17:59:09', '2021-07-08 20:17:34');

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
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `borrow_user_ID` FOREIGN KEY (`borrow_user_id`) REFERENCES `users_table` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ID` FOREIGN KEY (`user_id`) REFERENCES `users_table` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
