-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2023 年 1 月 01 日 02:02
-- サーバのバージョン： 5.7.34
-- PHP のバージョン: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `recipe`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `likes`
--

CREATE TABLE `likes` (
  `id` int(32) NOT NULL,
  `user_id` int(32) NOT NULL,
  `recipe_id` int(32) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `recipe_id`, `created_at`, `updated_at`) VALUES
(243, 19, 157, '2022-12-31 20:57:06', '2022-12-31 20:57:06'),
(245, 19, 159, '2022-12-31 20:57:12', '2022-12-31 20:57:12'),
(246, 20, 159, '2022-12-31 22:34:46', '2022-12-31 22:34:46'),
(247, 20, 157, '2022-12-31 22:34:58', '2022-12-31 22:34:58'),
(248, 20, 158, '2022-12-31 22:35:40', '2022-12-31 22:35:40'),
(249, 20, 150, '2022-12-31 22:35:42', '2022-12-31 22:35:42'),
(250, 20, 162, '2022-12-31 22:35:43', '2022-12-31 22:35:43'),
(251, 20, 155, '2022-12-31 22:35:44', '2022-12-31 22:35:44'),
(252, 13, 157, '2022-12-31 23:17:23', '2022-12-31 23:17:23'),
(253, 13, 160, '2022-12-31 23:17:24', '2022-12-31 23:17:24'),
(254, 13, 150, '2022-12-31 23:17:25', '2022-12-31 23:17:25');

-- --------------------------------------------------------

--
-- テーブルの構造 `materials`
--

CREATE TABLE `materials` (
  `id` int(10) UNSIGNED NOT NULL,
  `recipe_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '材料名',
  `qty` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '数量',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `materials`
--

INSERT INTO `materials` (`id`, `recipe_id`, `name`, `qty`, `created_at`, `updated_at`) VALUES
(283, 157, '白菜', '1/2株（1000g）', '2022-12-31 06:56:35', '2022-12-31 06:56:35'),
(284, 157, '豚バラ肉', '300g', '2022-12-31 06:56:35', '2022-12-31 06:56:35'),
(285, 157, '水', '6カップ', '2022-12-31 06:56:35', '2022-12-31 06:56:35'),
(286, 157, '醤油', '大さじ2', '2022-12-31 06:56:35', '2022-12-31 06:56:35'),
(287, 157, 'だしの素', '大さじ2', '2022-12-31 06:56:35', '2022-12-31 06:56:35'),
(288, 157, '白髪ねぎ', '1本分', '2022-12-31 06:56:35', '2022-12-31 06:56:35'),
(295, 145, 'きゅうり', '100g', '2022-12-31 07:32:08', '2022-12-31 07:32:08'),
(296, 145, '鶏胸肉', '200g', '2022-12-31 07:32:08', '2022-12-31 07:32:08'),
(297, 145, 'ごま油', '大さじ1', '2022-12-31 07:32:08', '2022-12-31 07:32:08'),
(298, 145, 'ごま', 'ひとつまみ', '2022-12-31 07:32:08', '2022-12-31 07:32:08'),
(306, 158, '豚ひき肉', '200g', '2022-12-31 09:03:02', '2022-12-31 09:03:02'),
(307, 158, 'ネギ', '1/2束', '2022-12-31 09:03:02', '2022-12-31 09:03:02'),
(308, 158, '餃子の皮', '1袋(20枚)', '2022-12-31 09:03:02', '2022-12-31 09:03:02'),
(309, 158, '酒', '大さじ3', '2022-12-31 09:03:02', '2022-12-31 09:03:02'),
(310, 158, '醤油', '大さじ1/2', '2022-12-31 09:03:02', '2022-12-31 09:03:02'),
(311, 158, '鶏ガラスープの素', '小さじ1', '2022-12-31 09:03:02', '2022-12-31 09:03:02'),
(312, 158, '片栗粉', '小さじ1', '2022-12-31 09:03:02', '2022-12-31 09:03:02'),
(322, 150, '椎茸', '2枚', '2022-12-31 10:39:37', '2022-12-31 10:39:37'),
(323, 150, 'えのき', '1袋', '2022-12-31 10:39:37', '2022-12-31 10:39:37'),
(324, 150, 'しめじ', '1パック', '2022-12-31 10:39:37', '2022-12-31 10:39:37'),
(325, 150, '豚バラ肉', '200g', '2022-12-31 10:39:37', '2022-12-31 10:39:37'),
(326, 150, '三つ葉', '適量', '2022-12-31 10:39:37', '2022-12-31 10:39:37'),
(327, 150, '米', '2カップ', '2022-12-31 10:39:37', '2022-12-31 10:39:37'),
(328, 150, '酒', '大さじ2', '2022-12-31 10:39:37', '2022-12-31 10:39:37'),
(329, 150, 'みりん', '大さじ2', '2022-12-31 10:39:37', '2022-12-31 10:39:37'),
(330, 150, '醤油', '大さじ3', '2022-12-31 10:39:37', '2022-12-31 10:39:37'),
(331, 155, 'エビ', '5尾', '2022-12-31 10:45:14', '2022-12-31 10:45:14'),
(332, 155, 'あさり', '100g', '2022-12-31 10:45:14', '2022-12-31 10:45:14'),
(333, 155, 'ムール貝', '100g', '2022-12-31 10:45:14', '2022-12-31 10:45:14'),
(334, 155, 'レモン', '1/4個', '2022-12-31 10:45:14', '2022-12-31 10:45:14'),
(335, 155, 'オリーブオイル', '大さじ1', '2022-12-31 10:45:14', '2022-12-31 10:45:14'),
(336, 155, '白ワイン', '大さじ1', '2022-12-31 10:45:14', '2022-12-31 10:45:14'),
(337, 155, 'カレー粉', '小さじ2/3', '2022-12-31 10:45:14', '2022-12-31 10:45:14'),
(338, 155, '片栗粉', '大さじ2', '2022-12-31 10:45:14', '2022-12-31 10:45:14'),
(339, 159, 'じゃがいも', '2個', '2022-12-31 11:01:28', '2022-12-31 11:01:28'),
(340, 159, 'にんじん', '1本', '2022-12-31 11:01:28', '2022-12-31 11:01:28'),
(341, 159, '玉ねぎ', '1個', '2022-12-31 11:01:28', '2022-12-31 11:01:28'),
(342, 159, '豚バラ肉', '200g', '2022-12-31 11:01:28', '2022-12-31 11:01:28'),
(343, 159, 'カレールウ', '1箱', '2022-12-31 11:01:28', '2022-12-31 11:01:28'),
(344, 160, '豚バラ肉', '200g', '2022-12-31 12:02:40', '2022-12-31 12:02:40'),
(345, 160, '大根', '2cm', '2022-12-31 12:02:40', '2022-12-31 12:02:40'),
(346, 160, 'こんにゃく', '50g', '2022-12-31 12:02:40', '2022-12-31 12:02:40'),
(347, 160, 'にんじん', '4cm', '2022-12-31 12:02:40', '2022-12-31 12:02:40'),
(348, 160, 'ネギ', '適量', '2022-12-31 12:02:40', '2022-12-31 12:02:40'),
(349, 160, '味噌', '大さじ2', '2022-12-31 12:02:40', '2022-12-31 12:02:40'),
(350, 160, 'ごぼう', '1/2本', '2022-12-31 12:02:40', '2022-12-31 12:02:40'),
(358, 162, '牛肉', '300g', '2022-12-31 12:17:10', '2022-12-31 12:17:10'),
(359, 162, '椎茸', '5枚', '2022-12-31 12:17:10', '2022-12-31 12:17:10'),
(360, 162, '豆腐', '1丁', '2022-12-31 12:17:10', '2022-12-31 12:17:10'),
(361, 162, 'しめじ', '1パック', '2022-12-31 12:17:10', '2022-12-31 12:17:10'),
(362, 162, 'えのき', '1パック', '2022-12-31 12:17:10', '2022-12-31 12:17:10'),
(363, 162, 'ネギ', '1/2本', '2022-12-31 12:17:10', '2022-12-31 12:17:10'),
(364, 162, 'すき焼きのタレ', '200ml', '2022-12-31 12:17:10', '2022-12-31 12:17:10'),
(365, 163, 'ひじき', '20g', '2022-12-31 13:31:39', '2022-12-31 13:31:39'),
(366, 163, '大豆', '100g', '2022-12-31 13:31:39', '2022-12-31 13:31:39'),
(367, 163, 'にんじん', '50g', '2022-12-31 13:31:39', '2022-12-31 13:31:39'),
(368, 163, '醤油', '大さじ１　1/2', '2022-12-31 13:31:39', '2022-12-31 13:31:39'),
(369, 163, '砂糖', '大さじ１　1/3', '2022-12-31 13:31:39', '2022-12-31 13:31:39'),
(370, 163, '酒', '大さじ１', '2022-12-31 13:31:39', '2022-12-31 13:31:39'),
(371, 163, 'だし汁', '3/4カップ', '2022-12-31 13:31:39', '2022-12-31 13:31:39'),
(372, 164, 'ほうれん草', '1わ', '2022-12-31 13:34:11', '2022-12-31 13:34:11'),
(373, 164, '鰹節', '適量', '2022-12-31 13:34:11', '2022-12-31 13:34:11'),
(374, 164, 'だし汁', '1カップ', '2022-12-31 13:34:11', '2022-12-31 13:34:11'),
(375, 164, '醤油', '大さじ2', '2022-12-31 13:34:11', '2022-12-31 13:34:11'),
(376, 164, 'みりん', '小さじ1', '2022-12-31 13:34:11', '2022-12-31 13:34:11');

-- --------------------------------------------------------

--
-- テーブルの構造 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_11_12_053957_create_recipes_table', 2),
(6, '2022_11_12_025314_create_materials_table', 3),
(7, '2022_12_17_215029_create_user_tokens_table', 4);

-- --------------------------------------------------------

--
-- テーブルの構造 `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `recipes`
--

CREATE TABLE `recipes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `image` varchar(512) CHARACTER SET utf8 DEFAULT NULL,
  `genre` varchar(255) CHARACTER SET utf8 NOT NULL,
  `process` varchar(512) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `recipes`
--

INSERT INTO `recipes` (`id`, `user_id`, `title`, `image`, `genre`, `process`, `created_at`, `updated_at`) VALUES
(145, 13, '鳥ときゅうりのサラダ', 'oZ3brYN75UR6nDotI6Mae0vAdPCF0vUx0nfBAo2q.jpg', '副菜', '1.テストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテスト\r\n2.testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest', '2022-12-31 04:42:32', '2022-12-31 07:32:08'),
(150, 13, 'きのこの炊き込みご飯', 'wrW4TTu5egpgsXFZsHGG3h5GwhJwqCbbo67gchWV.jpg', '主食', '1. 米は洗ってから約10分水にひたし、ざるにあけて約10分おく。しいたけは軸を落として薄切りに、えのきたけは根元を落として長さを３等分に切る。しめじは石づきを除いて小房に分ける。三つ葉、豚肉はそれぞれ３cm幅に切る。\r\n\r\n2.鍋に280mlの湯を沸かし、酒、みりん各大さじ２、しょうゆ大さじ３、１のきのこと豚肉を入れて、きのこがしんなりするまでアクを除きながら約３〜４分煮る。ざるでこして具と煮汁に分け、煮汁の粗熱がとれるまでおく。\r\n\r\n3.炊飯器に米と２の煮汁を入れ、ひと混ぜして炊く。炊き上がりの約５分前になったら具を戻し入れて蒸らす。器に盛って三つ葉をのせる。', '2022-12-31 04:45:13', '2022-12-31 10:39:37'),
(155, 13, 'パエリア', 'Jm21KCg2Uu1obPCAfGaWZ9bAH0uEsWaJlt4kvbYK.jpg', 'メイン', '1.testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest\r\n2.testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest', '2022-12-31 04:51:00', '2022-12-31 10:45:14'),
(157, 13, '白菜と豚バラのミルフィーユ鍋', '6dY67UUBM8efy2eGFhrty9455288vz7m9CYM6KLz.jpg', 'メイン', '1.白菜は１枚ずつはがし、白菜と豚肉を交互に４回重ねる。５ｃｍ幅に切り、鍋のフチに沿って敷き詰める。４回ほど行う。\r\n2.だしの素をまんべんなくふり入れ、Ａを加えて火にかける。沸騰したらフタをして煮る。\r\n3.火が通ったら白髪ねぎを上に盛る。', '2022-12-31 06:56:35', '2022-12-31 06:56:35'),
(158, 13, '餃子', 'boQNOVjM14zjJznyKdgnZO4YZaKDUo4mTug9ZbcI.jpg', 'メイン', '1.ひき肉と酒、醤油、鶏がらスープの素をよく練り混ぜて、ねぎを加えてざっと混ぜる。餃子の皮で等分に包む。\r\n\r\n2.フライパンを中火で熱し、１を並べる。水1/2カップを加えてふたをし、弱火で6〜7分焼く。\r\n\r\n3.ふたをはずして中火にし、縁からごま油を回し入れる。カリッとしたら器に盛る。', '2022-12-31 09:02:17', '2022-12-31 09:03:02'),
(159, 19, 'カレーライス', 'xq3egoEtVV5R7D7QP95GbdkyzpGsx1VF5NVg6tYM.jpg', 'メイン', '1. テスト\r\n\r\n2.テスト\r\n\r\n3.テスト', '2022-12-31 11:01:28', '2022-12-31 11:01:28'),
(160, 19, '豚汁', 'GX9pFR5Cn6ZHdc8liPuHuGfcJW6mMyTMikSWdAFF.jpg', '汁物', '1.testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest\r\n\r\n2.testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest\r\n\r\n3.testtesttesttesttesttest', '2022-12-31 12:02:40', '2022-12-31 12:02:40'),
(162, 20, 'すき焼き', 'JzRoTGEqktujcxpxpf01TwAPN5gYLvdieKc4yaaA.jpg', 'メイン', '1.\r\n\r\n2.\r\n\r\n3.', '2022-12-31 12:17:10', '2022-12-31 12:17:10'),
(163, 20, 'ひじきの煮物', 'HFGEInv9D51cdLFzk5bACqRC5ua1DGx3z875Xgqg.jpg', '副菜', '1.\r\n\r\n2.\r\n\r\n3.', '2022-12-31 13:31:39', '2022-12-31 13:31:39'),
(164, 20, 'ほうれん草のおひたし', 'KRHFLYwTchTj9snNyteMCcog5Tui8GER6k243h7r.jpg', '汁物', '1.テスト\r\n\r\n2.テスト\r\n\r\n3.テスト', '2022-12-31 13:34:11', '2022-12-31 13:34:11');

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(32) DEFAULT '0' COMMENT '権限',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'dsaa@gmail.com', NULL, '11', NULL, NULL, '2022-11-12 19:51:49', '2022-11-12 19:51:49'),
(10, 'yitengdajiang889@gmail.com', NULL, '$2y$10$E/V/aXMPwcSQ0eBmK8K4nOb6P2wEwXzikhs14D5gw1f5ZxUuiclGa', NULL, 'JiWAnVZxy66wA0kG6P5kuzgsTfgG76GyvpDxKDdPshhYAVjNYsnKf8Ndlz6T', '2022-11-13 03:30:08', '2022-12-31 03:32:03'),
(11, 'yitengdajiang999@gmail.com', NULL, '$2y$10$CBdgN9sr24/V1.tcEdYOsuG3.GiovfJkwvXP587cVqPCCUFw.8SuS', NULL, '4R1IeFxxHTGphKoqLzI4CxwS9Z0yNBt8Pgo2Jfvs7V8HGHm1s4y70vzpVZbO', '2022-11-22 20:54:11', '2022-11-22 20:54:11'),
(13, 'yitengdajiang222@gmail.com', NULL, '$2y$10$UTiCgknzwH48mZIDgKB9aOgZ9xt/uRwT8sM4nhzFl.P.jl2qXo2xq', 1, 'LuUBL2X2vAcPufe9iAKFHNyRH66o9YvaNnbZHD51TFk9j2l0xKe3HSUqNlvR', '2022-12-03 21:53:55', '2022-12-03 21:53:55'),
(16, 'yitengdajiang555@gmail.com', NULL, '$2y$10$/45varSUx3eGzP3rF1ocTe7Zil8WkNpJNX5mp/WWlexae3yiqYija', 0, NULL, '2022-12-24 14:00:41', '2022-12-24 14:00:41'),
(18, 'test2@gmail.com', NULL, '$2y$10$ehNC9GC5bC6GrQrTG5L4JeIc9Y.voSM8.LDCIpAKsAHBO18FPvoy2', 1, 'MDbdEXlLu43y3I42d1grwVOcivqH2Su8yIiyVPmmpK4bPFzCnGrGdlINJHwd', '2022-12-31 10:55:10', '2022-12-31 10:55:10'),
(19, 'test1@gmail.com', NULL, '$2y$10$iwz7Drd4TURtOsnaXbbB5.OltLyaFpcW/dATqNV8o7Ky519h8.zzK', 0, '0hXntB7xZiQISQF5U6ADNSroPRWldJ1SMu5emxOIt0eIO2cS8B2jcoszYnko', '2022-12-31 10:58:45', '2022-12-31 10:58:45'),
(20, 'test3@gmail.com', NULL, '$2y$10$zUX3tkoZ3V.OhvyZdFLaPeqF/mwZrsWLXZ7mPZCu4S.9C8aHKC.NC', 0, '5lGKeuiWMAQmFexqOLUUuGtdbpFGM49WTW8cKdeZ85Ec57jX7bkYMyzDegTe', '2022-12-31 12:14:47', '2022-12-31 12:14:47');

-- --------------------------------------------------------

--
-- テーブルの構造 `user_tokens`
--

CREATE TABLE `user_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT 'ID',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'トークン',
  `expire_at` datetime DEFAULT NULL COMMENT 'トークンの有効期限',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='ユーザートークン';

--
-- テーブルのデータのダンプ `user_tokens`
--

INSERT INTO `user_tokens` (`id`, `user_id`, `token`, `expire_at`, `created_at`, `updated_at`) VALUES
(1, 10, '67035722363afacf31e6cc3.99578920', '2023-01-02 12:30:59', '2022-12-17 12:55:06', '2022-12-31 03:30:59'),
(2, 13, '684684563639de349057fc8.86771090', '2022-12-20 00:42:01', '2022-12-17 13:44:44', '2022-12-17 15:42:01'),
(3, 1, '2058130055639dc7ceaf8197.98599546', '2022-12-19 22:44:46', '2022-12-17 13:44:46', '2022-12-17 13:44:46');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- テーブルのインデックス `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materials_recipe_id_foreign` (`recipe_id`);

--
-- テーブルのインデックス `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- テーブルのインデックス `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- テーブルのインデックス `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- テーブルのインデックス `user_tokens`
--
ALTER TABLE `user_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_tokens_token_unique` (`token`),
  ADD KEY `user_tokens_user_id_foreign` (`user_id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;

--
-- テーブルの AUTO_INCREMENT `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=377;

--
-- テーブルの AUTO_INCREMENT `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- テーブルの AUTO_INCREMENT `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- テーブルの AUTO_INCREMENT `user_tokens`
--
ALTER TABLE `user_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=4;

--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `materials`
--
ALTER TABLE `materials`
  ADD CONSTRAINT `materials_recipe_id_foreign` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`);

--
-- テーブルの制約 `user_tokens`
--
ALTER TABLE `user_tokens`
  ADD CONSTRAINT `user_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
