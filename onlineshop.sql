-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2022 at 10:31 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'ad eius', 'ad-eius', '2022-01-03 11:03:53', '2022-01-03 11:03:53'),
(2, 'quia voluptate', 'quia-voluptate', '2022-01-03 11:03:53', '2022-01-03 11:03:53'),
(3, 'quod minima', 'quod-minima', '2022-01-03 11:03:53', '2022-01-03 11:03:53'),
(4, 'autem quos', 'autem-quos', '2022-01-03 11:03:53', '2022-01-03 11:03:53'),
(6, 'elctronic', 'elctronic', '2022-01-04 04:39:59', '2022-01-04 04:39:59'),
(7, 'electric', 'electric', '2022-01-04 04:45:00', '2022-01-04 04:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('fixed','percent') COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` decimal(8,2) NOT NULL,
  `cart_value` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `expiry_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `type`, `value`, `cart_value`, `created_at`, `expiry_time`, `updated_at`) VALUES
(2, '123', 'percent', '10.00', '50.00', '2022-01-08 10:31:30', '2022-02-02 08:30:00', '2022-01-10 12:36:31'),
(3, '987', 'percent', '5.00', '25.00', '2022-01-08 10:32:48', '2022-01-09 09:42:27', '2022-01-08 10:32:48'),
(4, '456', 'percent', '10.00', '5.00', '2022-01-09 13:28:07', '2022-03-05 04:57:33', '2022-01-09 13:28:07');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_categories`
--

CREATE TABLE `home_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cate_ideas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_products` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_categories`
--

INSERT INTO `home_categories` (`id`, `cate_ideas`, `no_of_products`, `created_at`, `updated_at`) VALUES
(1, '2,3,6,7', 4, '2022-01-05 14:30:11', '2022-01-05 12:34:59');

-- --------------------------------------------------------

--
-- Table structure for table `home_sliders`
--

CREATE TABLE `home_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_sliders`
--

INSERT INTO `home_sliders` (`id`, `title`, `subtitle`, `link`, `image`, `status`, `price`, `created_at`, `updated_at`) VALUES
(1, 'In iste qui animi dolorem.', 'Deleniti.', 'http://www.mayert.com/sit-quo-voluptatem-fugit-doloremque-et-est.html', 'main-slider-3-2.jpg', 1, '98.00', '2022-01-04 11:14:10', '2022-01-04 11:14:10'),
(2, 'wwwwwwwwwwww', 'ssssssss', 'ssssssss', '1641323314-2-mega_accessories_1.jpg', 0, '21.00', '2022-01-04 11:40:09', '2022-01-04 15:38:34');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_01_03_101356_create_sessions_table', 1),
(7, '2022_01_03_133041_add_user_type_to_users_table', 2),
(8, '2022_01_03_135512_create_categories_table', 3),
(9, '2022_01_03_135530_create_products_table', 3),
(10, '2022_01_03_143028_add_category_id_to_products', 4),
(11, '2022_01_04_142525_create_home_sliders_table', 5),
(12, '2022_01_05_083809_create_sales_table', 6),
(13, '2022_01_05_142730_create_home_categories_table', 7),
(14, '2022_01_06_122632_create_coupons_table', 8),
(16, '2022_01_09_090434_add_expiry_time_to_coupons_table', 9),
(17, '2022_01_10_165850_create_orders_table', 10),
(18, '2022_01_10_175956_create_order_items_table', 11),
(19, '2022_01_10_181609_create_shippings_table', 12),
(20, '2022_01_10_181938_create_transactions_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `subtotal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` decimal(15,2) NOT NULL,
  `tax` decimal(15,2) NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `line1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `line2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('ordered','delivered','canceled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ordered',
  `is_shipping_different` tinyint(1) NOT NULL DEFAULT 0,
  `delivered_date` date DEFAULT NULL,
  `canceled_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `subtotal`, `discount`, `tax`, `total`, `firstName`, `lastName`, `email`, `mobile`, `line1`, `line2`, `city`, `province`, `country`, `zipcode`, `status`, `is_shipping_different`, `delivered_date`, `canceled_date`, `created_at`, `updated_at`) VALUES
(15, 1, '1,416.00', '0.00', '297.36', '1,713.36', 'eeeeeee', 'eeeeeeeee', 'admin@gmail.com', '555', 'ffffff', 'f', 'ddddd', 'ffffffffff', 'ffffffffff', '45555', 'canceled', 0, '2022-01-14', '2022-01-14', '2022-01-12 05:00:45', '2022-01-14 11:38:44'),
(16, 1, '423.00', '0.00', '88.83', '511.83', 'eeeee', 'eeeeeeee', 'admin@gmail.com', '4520', 'eeeee', 'eeeeeee', 'eeeee', 'eeeeeee', 'eeeeeee', '5252', 'canceled', 0, '2022-01-14', '2022-01-14', '2022-01-12 05:01:55', '2022-01-14 12:03:56');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `product_id`, `order_id`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(14, 2, 15, '472.00', 3, '2022-01-12 05:00:45', '2022-01-12 05:00:45'),
(15, 7, 16, '423.00', 1, '2022-01-12 05:01:55', '2022-01-12 05:01:55');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regular_price` decimal(15,2) NOT NULL,
  `sale_price` decimal(15,2) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock_status` enum('inStock','outOfStock') COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `featured` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `regular_price`, `sale_price`, `image`, `images`, `quantity`, `short_description`, `description`, `stock_status`, `category_id`, `featured`, `created_at`, `updated_at`) VALUES
(1, 'voluptates repellendus', 'voluptates-repellendus', '404.00', '300.00', 'digital_08.jpg', NULL, 19, 'Molestiae sed et vel facere. Eum omnis voluptatem iste optio error aut nam.', 'A in et officiis mollitia. Temporibus ut ut unde est illo non quas. Vitae soluta perferendis numquam ipsam aspernatur repellendus. Et dolor saepe reiciendis voluptates enim aut ut omnis. Non et praesentium ea dolor aliquid ut. Et eligendi sit quo rerum. Sed illo voluptatum deserunt doloribus aut aperiam. Dolore placeat mollitia pariatur nesciunt pariatur et tenetur ad. Fugit qui deserunt eligendi qui et recusandae delectus.', 'inStock', 7, 1, '2022-01-03 11:04:33', '2022-01-03 11:04:33'),
(2, 'libero sunt', 'libero-sunt', '472.00', '450.00', 'digital_06.jpg', NULL, 16, 'Maxime dolorum quia delectus veritatis. Cum dolor explicabo sunt nostrum saepe. Et recusandae delectus et.', 'Et id voluptas esse laudantium. Exercitationem optio eum temporibus et ea illo provident. Sunt est quaerat exercitationem ipsa. Nostrum aspernatur tempore sed. Assumenda at ut maxime laudantium eligendi. Optio explicabo nihil numquam saepe. Molestiae autem animi sint perspiciatis nisi quo. Porro similique commodi aliquam et iste officiis. Amet impedit illo illo mollitia ut. Sed enim mollitia quae dolorem. Dignissimos ea et quasi tempora voluptatum.', 'inStock', 3, 1, '2022-01-03 11:04:33', '2022-01-03 11:04:33'),
(3, 'laborum explicabo', 'laborum-explicabo', '10.00', '8.00', 'digital_02.jpg', NULL, 19, 'Tempore ut tenetur nam alias et qui. Esse aut consequatur et officiis vel. Dolorem consequatur rerum provident.', 'Natus similique quibusdam non culpa. Praesentium nemo autem at. Omnis inventore aut voluptas aperiam inventore. Est iure et ut. Placeat et qui vel dignissimos. Error sit officiis ducimus est optio recusandae. Dignissimos culpa recusandae voluptas doloribus. Voluptatem magni exercitationem reiciendis et reprehenderit non eaque. Qui qui qui est alias adipisci iure et. Et fuga alias autem aut voluptas enim dolorum.', 'inStock', 4, 1, '2022-01-03 11:04:33', '2022-01-03 11:04:33'),
(7, 'aut fuga', 'aut-fuga', '423.00', '360.00', 'digital_10.jpg', NULL, 9, 'Voluptates corrupti dolores beatae et mollitia et. Itaque laudantium aperiam consequatur amet. Asperiores quae cum quod deserunt sit. Ut et et deleniti mollitia dicta laudantium et.', 'Quia impedit animi cumque sint maxime. Quos eos autem nam ut vel tempora labore. In tempora earum perspiciatis facilis sit autem. Dolor eius qui consequatur autem. Et mollitia quasi quas aliquam est aperiam. Perferendis eum quis pariatur aliquam ad dolores dolore. Illum accusantium quae et deleniti suscipit architecto.', 'inStock', 2, 1, '2022-01-03 11:04:34', '2022-01-03 11:04:34'),
(8, 'quaerat non', 'quaerat-non', '321.00', '310.00', 'digital_22.jpg', NULL, 18, 'Perspiciatis praesentium nam vel quisquam aut et. Voluptatibus facilis aut est iusto vel et assumenda. Omnis sunt commodi et architecto unde magni.', 'Magni doloribus dolores autem molestiae ut adipisci. Tempora facilis est nobis sunt illum quas. Provident saepe sit explicabo reprehenderit dolorum libero eos. Sunt dolores aut aut non dolorum. Deserunt ipsum ipsam autem ut expedita reprehenderit recusandae aut. Ipsa rerum dicta molestiae sint dolore. Occaecati dolorum a nostrum magnam. Tempore dolor eveniet dolorem et culpa. Deleniti corporis qui omnis enim ut eum nobis nesciunt. Ullam animi quos qui quo saepe qui.', 'inStock', 1, 1, '2022-01-03 11:04:34', '2022-01-03 11:04:34'),
(9, 'nesciunt veritatis', 'nesciunt-veritatis', '312.00', NULL, 'digital_11.jpg', NULL, 9, 'Rerum et sint aut voluptatem omnis dignissimos commodi. Soluta vitae nesciunt quia assumenda repellat aut earum. Voluptas officiis vitae illo quasi et expedita suscipit.', 'Non ullam voluptatem nobis voluptas id. Ipsa deserunt voluptates quisquam ab voluptatem sunt. Molestias itaque placeat ut omnis. Blanditiis omnis aspernatur id et fugit. Quibusdam laudantium rerum autem quo nesciunt. Officiis adipisci aspernatur reiciendis rem minus saepe quam. Sed porro molestiae hic provident. Minus nostrum voluptatem neque. Occaecati pariatur perferendis iste quo fuga itaque. Quos vel ex optio. Recusandae quibusdam officiis enim a. Ipsa esse autem autem id.', 'inStock', 3, 1, '2022-01-03 11:04:34', '2022-01-03 11:04:34'),
(10, 'modi esse', 'modi-esse', '101.00', '50.00', 'digital_15.jpg', NULL, 13, 'Accusamus consequuntur laudantium ut qui. Consequatur aspernatur qui aut quasi natus numquam eius. Rerum asperiores cupiditate nemo est eos distinctio.', 'Qui voluptatem aspernatur similique sapiente fugiat sit. Officiis recusandae nulla earum quas quo. Eum maxime vitae nemo quas veritatis ut. Quas laudantium esse quo ut provident tempore temporibus. Pariatur molestiae et perferendis aut mollitia. Natus consectetur aut ratione. Reprehenderit expedita sunt qui. Autem inventore laborum quo aut assumenda. Sit itaque est qui ratione commodi. Rerum blanditiis alias dolore repellat sunt. Natus architecto qui tempore eos alias iusto consequatur.', 'inStock', 3, 1, '2022-01-03 11:04:34', '2022-01-03 11:04:34'),
(11, 'nesciunt iure', 'nesciunt-iure', '268.00', '200.00', 'digital_12.jpg', NULL, 14, 'Quae consectetur magnam sequi consequatur sed id. Voluptas sit tempora et odit incidunt. Ipsam libero occaecati iure quia.', 'Nesciunt eveniet nam itaque natus omnis dolorum odit. Aut vitae eius laboriosam accusamus sapiente expedita occaecati. Esse officiis dolores laudantium dolorem hic magnam autem. Ut aspernatur ut unde est ipsam aspernatur. Esse tempore quos facilis amet. Molestias et qui ut voluptatibus repellendus tempore nihil. Expedita earum quia iusto aut sed. Aut perspiciatis repellat modi error. Dicta exercitationem iure aspernatur iste sunt rerum expedita.', 'inStock', 4, 1, '2022-01-03 11:04:34', '2022-01-03 11:04:34'),
(12, 'doloremque nulla', 'doloremque-nulla', '272.00', NULL, 'digital_18.jpg', NULL, 8, 'Voluptate commodi optio aut nemo. Vel voluptatem soluta est. Quae qui autem quaerat voluptatem eos et cumque. Suscipit non amet iste et vel.', 'Atque dolores sed consequuntur velit a qui repudiandae. Suscipit autem iure ducimus sequi similique assumenda. Corporis aliquid quos facilis quis sed qui dolorem. Eos dolorem rerum earum voluptate quibusdam error voluptas. Dolorem ipsum quidem dolor ut molestiae nostrum voluptatum. Blanditiis adipisci quisquam quaerat dolores. Id velit qui iusto dolorem soluta et dolorem. Dolores molestias eum ut. In voluptatem et aut.', 'inStock', 4, 1, '2022-01-03 11:04:34', '2022-01-03 11:04:34'),
(13, 'assumenda qui', 'assumenda-qui', '66.00', NULL, 'digital_07.jpg', NULL, 10, 'Eos voluptas voluptates doloremque ab debitis. Ea quisquam et assumenda sed aliquam ipsum laborum. Qui perferendis rerum qui sapiente vero.', 'Ipsum est nobis voluptas repellat quia itaque aspernatur. Aut ut necessitatibus deleniti eos exercitationem. Aut eaque voluptatem placeat et aut distinctio. Quia odit ducimus doloribus qui esse laboriosam autem. Et debitis facilis provident consequatur vitae. Quia in qui vel sit ut ut adipisci. Dolorem totam impedit unde. Natus cum sunt itaque est incidunt.', 'inStock', 2, 1, '2022-01-03 11:04:34', '2022-01-03 11:04:34'),
(15, 'accusamus laudantium', 'accusamus-laudantium', '342.00', '320.00', 'digital_05.jpg', NULL, 9, 'Aut rerum cumque molestiae aut aut sit rerum. Autem deserunt ut sint accusantium aliquam. Facere fugiat at quam inventore rem error. Voluptatibus magni repellendus magni et reiciendis nam doloribus.', 'Sit dolores tenetur repudiandae ut magnam officiis repudiandae. Soluta facilis tenetur quidem quae. In saepe culpa ut nesciunt est pariatur commodi. Delectus sapiente odio ut exercitationem. Maxime vel nam reiciendis laudantium reprehenderit. Molestiae eligendi minus reprehenderit ab. Pariatur consequuntur officia autem voluptas libero ut rerum. Hic sunt exercitationem commodi doloribus fuga. Quis quasi provident occaecati doloribus voluptatem. Cum eos doloribus ea ea in enim.', 'inStock', 2, 1, '2022-01-03 11:04:34', '2022-01-03 11:04:34'),
(16, 'perferendis maxime', 'perferendis-maxime', '78.00', '52.00', 'digital_04.jpg', NULL, 14, 'Et temporibus vero ipsa quod dolores. Accusantium id iste voluptas eum quos ut. Tenetur et dicta blanditiis blanditiis iusto. Quo reprehenderit fuga recusandae minima nulla rerum.', 'Blanditiis consequatur eos ipsam est sunt dolores nam. Itaque dolores placeat id qui ex. Sint vitae consequatur excepturi dolorum rerum. Et in illo cum blanditiis eius fuga eum. Quasi eius quod quo animi rem corporis totam. Qui molestias voluptas cupiditate similique tempore. Itaque aperiam ipsa quia adipisci sunt incidunt. Laudantium consectetur rem nihil sit. Id ut sequi consequatur illo debitis. Ut eveniet optio est saepe sint placeat ut.', 'inStock', 2, 1, '2022-01-03 11:04:34', '2022-01-03 11:04:34'),
(18, 'sunt et', 'sunt-et', '233.00', NULL, 'digital_14.jpg', NULL, 8, 'Ratione maxime vel id rerum nihil voluptate non velit. Odio qui odio et laboriosam in. Maiores ut quos quia ea atque id aspernatur.', 'Modi ipsum iste dolor eos. Nihil fugiat placeat quis eos. Culpa ut magnam eos cupiditate soluta. Rem rerum dolore id fuga natus ut in. Fuga ut libero dolores voluptatem. Dolor et aut facilis. Porro velit laudantium est et. Eos voluptates et rerum repudiandae. Eos quia id expedita totam illo ut blanditiis. Vel dolor natus voluptatum nisi est excepturi in voluptatem.', 'inStock', 3, 1, '2022-01-03 11:04:34', '2022-01-03 11:04:34'),
(19, 'doloremque ducimus', 'doloremque-ducimus', '220.00', '100.00', 'digital_13.jpg', NULL, 19, 'Harum error laborum minima ut sed voluptatem necessitatibus. Suscipit ad vitae ratione. Natus cumque aperiam rerum voluptates. Enim ducimus eius vitae eaque.', 'Cupiditate quia porro culpa aperiam delectus repellat necessitatibus. Nesciunt minus rerum sit non voluptatibus omnis. Maiores et beatae laudantium aut enim maiores. Voluptas cupiditate neque dolorum quaerat ratione quia. Ut occaecati molestiae consectetur dolorem quas ullam fugiat. Quia consequatur voluptate pariatur dicta dicta.', 'inStock', 3, 1, '2022-01-03 11:04:34', '2022-01-03 11:04:34'),
(21, 'ssss', 'ssss', '33.00', '33.00', '1641292006-digital_07.jpg', NULL, 33, 'eeee', 'eeeee', 'inStock', 1, 0, '2022-01-04 05:30:11', '2022-01-04 06:56:46');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `sale_date`, `status`, `created_at`, `updated_at`) VALUES
(1, '2022-02-05 12:00:00', 1, '2022-01-05 10:29:04', '2022-01-05 10:36:57');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('8BhuSBNRXvglW6WAPai6tXJLBWX3mnawEBPomtiq', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:96.0) Gecko/20100101 Firefox/96.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRFZ6YUhOZjRqUzExRHRyeFREYlBJM1JOa2dMMll5SG9ZTzYydE1xMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1642196277),
('GafQNIamks2s3D12DrrVLUpQ78KXczqTmmRNvzSI', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:99.0) Gecko/20100101 Firefox/99.0', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiSUNabGpOeERSTHR2Yk1qanE4UGdYcmptdjZQVzhyR012UldreDdZZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9zaG9wIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJG0zSFRpYldHMDZWeHNFTm1pSDFXWWVXdlFaU2F5d2pxZWpYS1F5OUxta0lEMVMvOXFENS5hIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRtM0hUaWJXRzA2VnhzRU5taUgxV1llV3ZRWlNheXdqcWVqWEtReTlMbWtJRDFTLzlxRDUuYSI7czo0OiJjYXJ0IjthOjI6e3M6ODoid2lzaGxpc3QiO086Mjk6IklsbHVtaW5hdGVcU3VwcG9ydFxDb2xsZWN0aW9uIjoyOntzOjg6IgAqAGl0ZW1zIjthOjE6e3M6MzI6IjAyN2M5MTM0MWZkNWNmNGQyNTc5YjQ5YzRiNmE5MGRhIjtPOjMyOiJHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbSI6OTp7czo1OiJyb3dJZCI7czozMjoiMDI3YzkxMzQxZmQ1Y2Y0ZDI1NzliNDljNGI2YTkwZGEiO3M6MjoiaWQiO2k6MTtzOjM6InF0eSI7aToxO3M6NDoibmFtZSI7czoyMjoidm9sdXB0YXRlcyByZXBlbGxlbmR1cyI7czo1OiJwcmljZSI7ZDo0MDQ7czo3OiJvcHRpb25zIjtPOjM5OiJHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbU9wdGlvbnMiOjI6e3M6ODoiACoAaXRlbXMiO2E6MDp7fXM6Mjg6IgAqAGVzY2FwZVdoZW5DYXN0aW5nVG9TdHJpbmciO2I6MDt9czo0OToiAEdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtAGFzc29jaWF0ZWRNb2RlbCI7czoxODoiQXBwXE1vZGVsc1xQcm9kdWN0IjtzOjQxOiIAR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW0AdGF4UmF0ZSI7aToyMTtzOjQxOiIAR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW0AaXNTYXZlZCI7YjowO319czoyODoiACoAZXNjYXBlV2hlbkNhc3RpbmdUb1N0cmluZyI7YjowO31zOjQ6ImNhcnQiO086Mjk6IklsbHVtaW5hdGVcU3VwcG9ydFxDb2xsZWN0aW9uIjoyOntzOjg6IgAqAGl0ZW1zIjthOjE6e3M6MzI6IjM3MGQwODU4NTM2MGY1YzU2OGIxOGQxZjJlNGNhMWRmIjtPOjMyOiJHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbSI6OTp7czo1OiJyb3dJZCI7czozMjoiMzcwZDA4NTg1MzYwZjVjNTY4YjE4ZDFmMmU0Y2ExZGYiO3M6MjoiaWQiO2k6MjtzOjM6InF0eSI7aToxO3M6NDoibmFtZSI7czoxMToibGliZXJvIHN1bnQiO3M6NToicHJpY2UiO2Q6NDcyO3M6Nzoib3B0aW9ucyI7TzozOToiR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW1PcHRpb25zIjoyOntzOjg6IgAqAGl0ZW1zIjthOjA6e31zOjI4OiIAKgBlc2NhcGVXaGVuQ2FzdGluZ1RvU3RyaW5nIjtiOjA7fXM6NDk6IgBHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbQBhc3NvY2lhdGVkTW9kZWwiO3M6MTg6IkFwcFxNb2RlbHNcUHJvZHVjdCI7czo0MToiAEdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtAHRheFJhdGUiO2k6MjE7czo0MToiAEdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtAGlzU2F2ZWQiO2I6MDt9fXM6Mjg6IgAqAGVzY2FwZVdoZW5DYXN0aW5nVG9TdHJpbmciO2I6MDt9fX0=', 1650054652),
('ulb9zJnVsXLYFmrrNDHcI4S7fZGGnkrfbjXZCAEd', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:96.0) Gecko/20100101 Firefox/96.0', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiNEgyazUyMEJGTHRZbWoxWWV2cGs4bUloOUg4eWwyN1Q3NnZQdEZOYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VyL29yZGVyRGV0YWlscy8xNiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkbTNIVGliV0cwNlZ4c0VObWlIMVdZZVd2UVpTYXl3anFlalhLUXk5TG1rSUQxUy85cUQ1LmEiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJG0zSFRpYldHMDZWeHNFTm1pSDFXWWVXdlFaU2F5d2pxZWpYS1F5OUxta0lEMVMvOXFENS5hIjt9', 1642174436);

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `line1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `line2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `mode` enum('cod','card','paypal') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','approved','declined','refunded') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `order_id`, `user_id`, `mode`, `status`, `created_at`, `updated_at`) VALUES
(2, 15, 1, 'cod', 'pending', '2022-01-12 05:00:45', '2022-01-12 05:00:45'),
(3, 16, 1, 'cod', 'pending', '2022-01-12 05:01:55', '2022-01-12 05:01:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `user_type`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'hossein', 'hossein@gmail.com', NULL, '$2y$10$m3HTibWG06VxsENmiH1WYeWvQZSaywjqejXKQy9LmkID1S/9qD5.a', 'admin', NULL, NULL, NULL, NULL, NULL, '2022-01-03 06:53:04', '2022-01-03 06:53:04'),
(2, 'user', 'user@gmail.com', NULL, '$2y$10$9Axd5xA.lzIOY191RFLTMuhaWFDKcULAdX72LDPvJGDm0TfMekFRq', 'user', NULL, NULL, NULL, NULL, NULL, '2022-01-03 07:04:11', '2022-01-03 07:04:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `home_categories`
--
ALTER TABLE `home_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_sliders`
--
ALTER TABLE `home_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shippings_order_id_foreign` (`order_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_order_id_foreign` (`order_id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_categories`
--
ALTER TABLE `home_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_sliders`
--
ALTER TABLE `home_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shippings`
--
ALTER TABLE `shippings`
  ADD CONSTRAINT `shippings_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
