-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2022 at 10:46 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finna_ruma_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `host_id` bigint(20) UNSIGNED NOT NULL,
  `listing_id` bigint(20) UNSIGNED NOT NULL,
  `booking_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_at` timestamp NULL DEFAULT NULL,
  `payment_proof` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_approved_at` timestamp NULL DEFAULT NULL,
  `check_in` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checkout` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `days` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adults` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `children` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `infants` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pets` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_fee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_per_night` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pending_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_paid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmed_at` timestamp NULL DEFAULT NULL,
  `canceled_at` timestamp NULL DEFAULT NULL,
  `completed_at` timestamp NULL DEFAULT NULL,
  `reviewed_at` timestamp NULL DEFAULT NULL,
  `viewed_by_host` tinyint(1) DEFAULT 0,
  `viewed_by_user` tinyint(1) DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `user_id`, `host_id`, `listing_id`, `booking_status`, `payment_method`, `payment_status`, `paid_at`, `payment_proof`, `payment_approved_at`, `check_in`, `checkout`, `days`, `adults`, `children`, `infants`, `pets`, `service_fee`, `price_per_night`, `pending_total`, `total`, `total_paid`, `confirmed_at`, `canceled_at`, `completed_at`, `reviewed_at`, `viewed_by_host`, `viewed_by_user`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1000001, 5, 1, 2, 'Confirmed Reservation', NULL, NULL, '2022-09-10 01:25:38', NULL, '2022-09-10 01:25:38', '09/12/2022', '09/14/2022', '2', '2', '1', '1', '0', '99.98', '1500', '3,000', '3099', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2022-09-09 08:38:31', '2022-09-10 01:25:38'),
(1000002, 5, 1, 1, 'Confirmed Reservation', 'Gcash Payment', 'Fully Paid', '2022-09-10 01:26:59', 'gcash qr.jpg', '2022-09-10 01:26:59', '10/04/2022', '10/06/2022', '2', '2', '0', '0', '0', '200', '2300', '4,600', '4800', '4800', NULL, NULL, NULL, NULL, 0, 0, NULL, '2022-09-10 00:54:06', '2022-09-10 01:26:59'),
(1000003, 5, 1, 1, 'Waiting for payment approval', 'Gcash Payment', 'Fully Paid', NULL, 'gcash qr.jpg', NULL, '11/10/2022', '11/11/2022', '1', '2', '1', '0', '0', '200', '2300', '2,300', '2500', '2500', NULL, NULL, NULL, NULL, 0, 0, NULL, '2022-09-10 00:55:02', '2022-09-10 01:10:59'),
(1000004, 5, 1, 1, 'Confirmed Reservation', 'Paypal Payment', 'Fully Paid', '2022-09-10 01:00:24', NULL, NULL, '09/23/2022', '09/24/2022', '1', '1', '0', '0', '0', '200', '2300', '2,300', '2500', '2500', NULL, NULL, NULL, NULL, 0, 0, NULL, '2022-09-10 00:57:50', '2022-09-10 01:00:24');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Islands', 'Active', NULL, '2022-09-08 04:18:18', '2022-09-08 04:18:18'),
(2, 'Tree House', 'Active', NULL, '2022-09-08 04:18:50', '2022-09-08 04:18:50'),
(3, 'Camping', 'Active', NULL, '2022-09-08 04:19:01', '2022-09-08 04:19:01'),
(4, 'House', 'Active', NULL, '2022-09-08 04:19:17', '2022-09-08 04:19:17'),
(5, 'Room', 'Active', NULL, '2022-09-08 04:19:23', '2022-09-08 04:19:23'),
(6, 'Beachfront', 'Active', NULL, '2022-09-08 04:19:51', '2022-09-08 04:19:51'),
(7, 'Shared Homes', 'Active', NULL, '2022-09-08 04:20:21', '2022-09-08 04:20:21'),
(8, 'Tiny House', 'Active', NULL, '2022-09-08 04:20:30', '2022-09-08 04:20:30');

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
-- Table structure for table `host_reviews`
--

CREATE TABLE `host_reviews` (
  `host_review_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `listing_id` bigint(20) UNSIGNED NOT NULL,
  `stars` int(11) DEFAULT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `viewed_by_host` tinyint(1) DEFAULT 0,
  `viewed_by_user` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

CREATE TABLE `listings` (
  `listing_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `listing_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `price_per_night` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_fee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_guest` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_pet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_pin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bedrooms` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `beds` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bed_detials` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bathrooms` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `listing_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `default_photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gcash_qr` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `viewers` int(11) DEFAULT NULL,
  `messenger_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_notes` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listings`
--

INSERT INTO `listings` (`listing_id`, `user_id`, `category_id`, `slug`, `listing_title`, `description`, `approved_by`, `approved_at`, `price_per_night`, `service_fee`, `max_guest`, `max_pet`, `property_size`, `location`, `map_pin`, `city`, `country`, `bedrooms`, `beds`, `bed_detials`, `bathrooms`, `property_type`, `listing_status`, `default_photo`, `gcash_qr`, `viewers`, `messenger_url`, `additional_notes`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 'metro-pines-inn', 'Metro Pines Inn', '<p>Located in Baguio, within a 4-minute walk of Burnham Park and half a kilometer of Session Road, Metro Pines Inn has accommodations with a terrace as well as free private parking for guests who drive. Among the facilities at this property are a 24-hour front desk and room service, along with free WiFi throughout the property. The inn has family rooms.</p><p>At the inn, the rooms are equipped with a desk, a flat-screen TV, a private bathroom, bed linen and towels. At Metro Pines Inn rooms contain a seating area.</p><p>Popular points of interest near the accommodation include SM City Baguio, Mines View Park and Lourdes Grotto.</p><p>Families in particular like the location – they rated it <strong>9.1</strong> for a stay with kids.</p>', 'admin one', '2022-09-08 06:18:32', '2300', '200', '6', '1', '12', '20 Otek Street, Benguet, 2600 Baguio, Philippines', '20%20Otek%20Street,%20Benguet,%202600%20Baguio,%20Philippines', NULL, NULL, '3', '3', '1 King, 2 Queen, 5 Junior', '1', 'House', 'Approved', '280068244.jpg', 'gcash qr.jpg', 0, 'https://www.messenger.com/t/100002390070945', NULL, NULL, '2022-09-08 04:45:44', '2022-09-08 06:18:32'),
(2, 1, 5, '456-hotel', '456 Hotel', '<p>You\'re eligible for a Genius discount at 456 Hotel! To save at this property, all you have to do is <a href=\"https://account.booking.com/auth/oauth2?state=UqcFntNqQDMTpd1igPfirU1GnYiuWOOKQgFcjypgZF8P7nZO5tyYGVweBU4eRUnkWsdRqT3CWv2yhnO8_e7_iUHmhjHVg59PrrdpHY1Z2J_-qAiDcDh0Y026_akzT3k8j9gyGgiQI6QEp4psE0p4hNIT5BiBZT4yPYtrjliruVZvNjOYIycBi16jZkhL6VGHYTLgeEtjz9W0iFUIxM61NZbBnp1Kv2fcEZ6m5FYOGlJUn6PrHzTFWq4skgqwGWZoiemHbPLFDQGj2BNY5LH3u-oPkb6uF2Fxx56knn9UJoTlP8SAoUl1oS0bekHOu4VfN2uYQSM4B2H1RI6gDhgqaVMV7ONBRchlPey84kBmIulYiG-kXLhbcQP8j4hjkI5TpcE11vJ_cfM5khRKPNv-yFu6gevySN5LPUMOYg5kOlxodBCfLIpU5oAvCry96fBhFOVQGvbCFLvVf2Cf4HmtmKBo7qXSNJKyqfGPT24cYiVFVTZ-ThlmAfGYy88XbbYUT9v63TJMo0e2BAIhsyUuf3y7e3MA0XJmfOTax2asHH5KHMh8W3jZLRqsrXzQiWjA2P6bZxW35GC7oDltYkh13bz_m7jTAJ8xl6LPywAqPV5TeXNStETFeD_t2cg-9HdIID1ej8-UVxsjiySiPD8RYwY-iu4s0vSIL00Yfw7nhrfFZfCjubukCWUyamno3VcERF9opk-8hj65V2DM1hWApWVDB8d-i3K45so4h3oLKGYyA06pKf_vfKsRq7YF8GiOtiKxuXJ36Xb5RLWZZyhEQSTJZEU3YG6NxezTnm_HupGDvRrNJODYGMVZIu_g7nCkxeCtA3MJa5_EI5lQ4JV5t4HLWtUIXuuvoY7RiuO1mzNBqegpX5R3c21jt_c0qm9YW20dog4RM2c3pQ&amp;response_type=code&amp;client_id=vO1Kblk7xX9tUn2cpZLS&amp;lang=en-us&amp;bkng_action=hotel&amp;redirect_uri=https%3A%2F%2Fsecure.booking.com%2Flogin.html%3Fop%3Doauth_return&amp;dt=1662611848&amp;aid=304142\"><strong>sign in or register</strong></a>.</p><p>Located in Baguio, a 10-minute walk from Burnham Park, 456 Hotel has accommodations with a bar, free private parking, a garden and a terrace. This 3-star hotel offers a 24-hour front desk, room service and free WiFi. The hotel has family rooms.</p><p>All rooms at the hotel come with a seating area, a flat-screen TV with satellite channels, a safety deposit box and a private bathroom with a bidet, slippers and a hairdryer. Rooms come with an electric tea pot, while selected rooms also feature a patio and others also feature garden views. At 456 Hotel the rooms have bed linen and towels.</p><p>The accommodation has a playground.</p><p>Session Road is a 20-minute walk from 456 Hotel, while SM City Baguio is 2.1 km from the property.</p>', 'admin one', '2022-09-08 06:18:27', '1500', '99.98', '10', '2', '2', 'Legarda Road, 2600 Baguio, Philippines', 'Legarda%20Road,%202600%20Baguio,%20Philippines', NULL, NULL, '1', '1', 'Full Size', '1', 'Apartment', 'Approved', '241452379.jpg', NULL, 0, 'https://www.messenger.com/t/100002390070945', NULL, NULL, '2022-09-08 06:14:35', '2022-09-08 06:18:27'),
(3, 1, 4, 'makati-diamond-residences', 'Makati Diamond Residences', '<p>Located along Legazpi Street in the heart of Makati\'s central business district, the Makati Diamond Residences offers modern and luxurious accommodations with free WiFi access in its rooms.</p><p>Conveniently across Greenbelt 1 &amp; 5 and a short walk away from the bustling Ayala Avenue, and the lifestyle and enterprise hub of Legazpi Village, the Makati Diamond Residences provides access to top commerce, leisure and dining destinations.</p><p>Featuring European and Filipino furnishing, the luxurious rooms at Makati Diamond Residences feature 55-inch LED televisions and fully equipped kitchenettes with refrigerators, ovens, ceramic convection stoves, as well as washers and dryers. The private bathroom also includes separate bath and shower areas.</p><p>Guests can exercise at the 24-hour gym, TRX Studio and a 23 m indoor lap pool or relax in the spa. The Club Lounge is an inviting space furnished with higher level of comfort and personalized concierge services. Other facilities include spacious function rooms as well as boardrooms for the convenience of business travelers.</p><p>Opens for breakfast, lunch and dinner, the in-house restaurant, Alfred, serves Asian and Continental cuisines matched with an extensive menu of wine and whiskey collection. Guests can also enjoy other culinary delights at Baked, Pool Bar and Whiskey &amp; Cigar Bar.</p><p>This is our guests\' favorite part of Manila, according to independent reviews.</p>', 'admin one', '2022-09-08 06:18:21', '1500', '200', '8', '2', '6', 'Legaspi Street, Legaspi Village, Makati, 1229 Manila, Philippines', 'Legaspi%20Street,%20Legaspi%20Village,%20Makati,%201229%20Manila,%20Philippines', NULL, NULL, '2', '2', 'Full Size, Queen Size', '1', 'Apartment', 'Approved', '108004161.jpg', 'gcash qr.jpg', 0, 'https://www.messenger.com/t/100002390070945', NULL, NULL, '2022-09-08 06:17:29', '2022-09-08 06:18:21'),
(4, 2, 4, 'bay-area-suites-manila', 'Bay Area Suites Manila', '<p>In a prime location in the Malate district of Manila, Bay Area Suites Manila is located 1.4 mi from Cultural Center of the Philippines, 1.8 mi from Rizal Park and 1.8 mi from Intramuros. This 3-star hotel offers a 24-hour front desk and a concierge service. Free WiFi is available and private parking can be arranged at an extra charge.</p><p>The hotel offers a children\'s playground.</p><p>San Agustin Church is 1.9 mi from Bay Area Suites Manila, while Fort Santiago is 1.9 mi away. The nearest airport is Manila Ninoy Aquino International Airport, 5.6 mi from the accommodations.</p>', 'admin one', '2022-09-08 10:15:27', '2000', '99.96', '4', '1', '4', '1820 Maria Orosa Street Malate, 1004 Manila, Philippines', '1820%20Maria%20Orosa%20Street%20Malate,%201004%20Manila,%20Philippines', NULL, NULL, '3', '2', 'Full Size, Queen Size', '1', 'Hotel', 'Approved', '261968042.jpg', NULL, 0, 'https://www.messenger.com/t/100002390070945', NULL, NULL, '2022-09-08 09:15:57', '2022-09-08 10:15:27'),
(5, 2, 5, 'yes-hotel-pandi-bulacan', 'Yes Hotel Pandi Bulacan', '<p>Yes Hotel Pandi Bulacan provides rooms in Pandi. Among the facilities of this property are a restaurant, a 24-hour front desk and room service, along with free WiFi. Guests can have a drink at the snack bar.</p><p>Guest rooms are equipped with air conditioning, a flat-screen TV with cable channels, an electric tea pot, a bidet, slippers and a desk. Rooms come complete with a private bathroom equipped with a bath or shower and a hairdryer, while certain rooms at the hotel also offer a seating area. At Yes Hotel Pandi Bulacan each room has bed linen and towels.</p><p>The accommodation offers a à la carte or Asian breakfast.</p><p>Manila is 30.6 km from Yes Hotel Pandi Bulacan, while Angeles is 48.3 km away. The nearest airport is Ninoy Aquino</p>', 'admin one', '2022-09-08 10:15:22', '5000', '230', '6', '2', '6', 'Divimart, Pandi-Balagtas Road, Bunsuran 1, Pandi, Bulacan, 3014 Pandi, Philippines', 'Divimart,%20Pandi-Balagtas%20Road,%20Bunsuran%201,%20Pandi,%20Bulacan,%203014%20Pandi,%20Philippines', NULL, NULL, '1', '2', '2 Full Size', '1', 'House', 'Approved', '322671012.jpg', 'gcash qr.jpg', 0, 'https://www.messenger.com/t/100002390070945', NULL, NULL, '2022-09-08 10:12:32', '2022-09-08 10:15:22'),
(6, 2, 4, 'pension-inn-marilao', 'Pension Inn Marilao', '<p>Operating a 24-hour front desk, Pension Inn offers simple yet comfy accommodations with free WiFi access in its public areas. It provides rooms with private bathroom facility.</p><p>Fitted with tiled flooring, cozy rooms feature air conditioning, a desk, clothes rack, a personal safe and flat-screen TV. The attached bathroom comes with shower facility.</p><p>Fluently-conversed in Filipino and English, the friendly staff can assist guests with their requests throughout the day.</p><p>The property is approximately 18 mi from Manila International Airport.</p>', 'admin one', '2022-09-08 10:15:17', '4300', '150', '4', '1', '4', 'Lias Road corner Mabel Compound Street, Bulacan, 3019 Lias, Philippines', 'Lias%20Road%20corner%20Mabel%20Compound%20Street,%20Bulacan,%203019%20Lias,%20Philippines', NULL, NULL, '1', '2', 'Full Size', '1', 'House', 'Approved', '194030225.jpg', NULL, 0, 'https://www.messenger.com/t/100002390070945', NULL, NULL, '2022-09-08 10:14:49', '2022-09-08 10:15:17'),
(7, 1, 4, 'thunderbird-resorts-poro-point', 'Thunderbird Resorts - Poro Point', '<p>Thunderbird Resorts - Poro Point is located in San Fernando, 5.2 mi from Bauang Beach and 6 mi from San Juan Beach, a Mediterranean-inspired resort with an infinity pool, yoga classes and an on-site casino. Sitting on a cliff overlooking the South China Sea, it also provides free Wi-Fi and free parking.</p><p>Spacious and well-designed, all the air-conditioned rooms have a private balcony with sea views. A flat-screen TV, an iPod dock, and a DVD player are included in each room while the private bathrooms come with shower and free toiletries.</p><p>Olives Restaurant serves Mediterranean cuisine in an elegant setting, while Patio Santorini offers cocktails accompanied by sea views. There is also a Pool Bar, which serves snacks and drinks by the pool.</p><p>Guests can request in-room massage and beauty treatments, provided by Zaphira Spa. For a good workout, there is also a scenic jogging track, a golf course, and a basketball court. Water sports activities, as well as ATV and mountain bike rentals, are also available.</p><p>Thunderbird Resorts - Poro Point is 7.8 mi from Bascil Ridge and 3.3 mi from Macho Temple while the nearest airport is Clark International Airport, 3-hour drive from the property.</p>', 'admin one', '2022-09-08 10:32:49', '88000', '2000.02', '10', '3', '26', 'Poro Point Freeport Zone, La Union, 2500 San Fernando, Philippines', 'Poro%20Point%20Freeport%20Zone,%20La%20Union,%202500%20San%20Fernando,%20Philippines', NULL, NULL, '3', '3', '1 King, 1 Queen, 1 Full', '2', 'House', 'Approved', '181963662.jpg', 'gcash qr.jpg', 0, 'https://www.messenger.com/t/100002390070945', NULL, NULL, '2022-09-08 10:29:25', '2022-09-08 10:32:49'),
(8, 1, 4, 'affordable-la-union', 'Affordable La Union', '<p>Located in Caba in the Luzon region, Affordable La Union provides accommodations with free private parking.</p><p>Some units are air-conditioned and include a seating and/or dining area and a flat-screen TV.</p><p>The apartment has a terrace.</p><p>A grill can be found at Affordable La Union, along with a shared lounge.</p><p>San Fernando is 19.3 km from the accommodation, while Dagupan is 45.1 km away.</p>', 'admin one', '2022-09-08 10:32:45', '2320', '199.99', '4', '2', '12', 'Bautista, Caba, 2502 Caba, Philippines', 'Bautista,%20Caba,%202502%20Caba,%20Philippines', NULL, NULL, '1', '1', 'Full Size', '1', 'Guest House', 'Approved', '353889331.jpg', 'gcash qr.jpg', 0, 'https://www.messenger.com/t/100002390070945', NULL, NULL, '2022-09-08 10:32:23', '2022-09-08 10:32:45'),
(9, 2, 5, 'la-bella-boutique-hotel', 'La Bella Boutique Hotel', '<p>Located 8 km from Picnic Grove, Bella Suites at Wind Residences Tagaytay offers a restaurant, a garden and air-conditioned accommodations with a balcony and free WiFi.</p><p>A fridge and electric tea pot are also available.</p><p>The apartment has a playground.</p><p>A car rental service is available at Bella Suites at Wind Residences Tagaytay.</p><p>People\'s Park in the Sky is 11.3 km from the accommodation, while Taal Lake is 14.5 km from the property. The nearest airport is Ninoy Aquino International, 62.8 km from Bella Suites at Wind Residences Tagaytay, and the property offers a paid airport shuttle service.</p>', 'admin one', '2022-09-09 08:32:04', '5140', '400', '4', '2', '12', 'Barangay Neogan, 4120 Tagaytay, Philippines', 'Barangay%20Neogan,%204120%20Tagaytay,%20Philippines', NULL, NULL, '1', '1', 'Queen Size', '1', 'Guest House', 'Approved', '1.jpg', 'gcash qr.jpg', 0, 'https://www.messenger.com/t/100002390070945', NULL, NULL, '2022-09-09 08:28:06', '2022-09-09 08:32:04'),
(10, 2, 4, 'taal-vista-hotel', 'Taal Vista Hotel', '<p>Located an hour away from the hustle and bustle of Manila, Taal Vista Hotel offers accommodations in Tagaytay City. Built in 1939, the English Tudor-styled mansion Hotel has become part of the Filipino heritage. It features an outdoor swimming pool and guests can enjoy meals from 3 dining options or have a drink at the bar. Free WiFi is available throughout the property.</p><p>The property is a 5-minute walk away from PAGCOR Casino, and a 10-minute drive from Picnic Grove.</p><p>The hotel has stylishly appointed rooms that are all individually air conditioned, and are fully-equipped with modern amenities such as premium bedding, LED cable TV, a fully stocked mini-bar and complimentary WiFi internet access.</p><p>Guests can approach the 24-hour front desk for currency exchange, luggage storage and concierge services. A games room is available for guests who wish to stay indoors. Alternatively, guests can indulge in massage treatments at the in-house spa.</p><p>Café Veranda serves up authentic local dishes, as well as a variety of international food items. Alternatively, guests can feast on the weekend lunch buffet featuring the Hotel’s heritage cuisine, a collection of Filipino favorites with a twist. While at Taza Fresh Table, enjoy laid-back dining with garden-to-table vegetables, handmade pasta and sauces, and meats smoked right in the kitchen.</p>', 'admin one', '2022-09-09 08:32:00', '6000', '299.98', '6', '1', '26', 'Km. 60, Aguinaldo Highway, Tagaytay City, 4120 Tagaytay, Philippines', 'Km.%2060,%20Aguinaldo%20Highway,%20Tagaytay%20City,%204120%20Tagaytay,%20Philippines', NULL, NULL, '2', '2', 'Full Size, Queen Size', '2', 'House', 'Approved', '1.jpg', 'gcash qr.jpg', 0, 'https://www.messenger.com/t/100002390070945', NULL, NULL, '2022-09-09 08:31:39', '2022-09-09 08:32:00');

-- --------------------------------------------------------

--
-- Table structure for table `listing_amenities`
--

CREATE TABLE `listing_amenities` (
  `listing_amenity_id` bigint(20) UNSIGNED NOT NULL,
  `listing_id` bigint(20) UNSIGNED NOT NULL,
  `wifi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `washer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `air_conditioning` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `heating` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `tv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `iron` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `kitchen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `dryer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `dedicated_workspace` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `hair_dryer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `pool` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `free_parking` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `crib` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `grill` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `gym` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `smoking_allowed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `breakfast` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `smoke_alarm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `carbon_monoxide_alarm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listing_amenities`
--

INSERT INTO `listing_amenities` (`listing_amenity_id`, `listing_id`, `wifi`, `washer`, `air_conditioning`, `heating`, `tv`, `iron`, `kitchen`, `dryer`, `dedicated_workspace`, `hair_dryer`, `pool`, `free_parking`, `crib`, `grill`, `gym`, `smoking_allowed`, `breakfast`, `smoke_alarm`, `carbon_monoxide_alarm`, `created_at`, `updated_at`) VALUES
(1, 1, '1', '1', '1', '1', '0', '0', '0', '0', '1', '0', '0', '0', '0', '1', '1', '0', '0', '0', '0', '2022-09-08 04:45:44', '2022-09-08 04:45:44'),
(2, 2, '1', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '0', '0', '1', '1', '0', '0', '0', '0', '2022-09-08 06:14:35', '2022-09-08 06:14:35'),
(3, 3, '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '0', '0', '0', '0', '2022-09-08 06:17:29', '2022-09-08 06:17:29'),
(4, 4, '1', '1', '1', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2022-09-08 09:15:57', '2022-09-08 09:15:57'),
(5, 5, '1', '1', '1', '0', '0', '1', '1', '1', '1', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '2022-09-08 10:12:32', '2022-09-08 10:12:32'),
(6, 6, '1', '1', '1', '1', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '2022-09-08 10:14:49', '2022-09-08 10:14:49'),
(7, 7, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '2022-09-08 10:29:25', '2022-09-08 10:29:25'),
(8, 8, '1', '1', '1', '0', '1', '1', '1', '1', '1', '1', '0', '1', '0', '1', '0', '0', '0', '0', '0', '2022-09-08 10:32:23', '2022-09-08 10:32:23'),
(9, 9, '1', '1', '1', '0', '1', '1', '1', '1', '1', '1', '1', '0', '1', '1', '0', '0', '1', '0', '0', '2022-09-09 08:28:06', '2022-09-09 08:28:06'),
(10, 10, '1', '1', '1', '0', '1', '1', '0', '0', '1', '1', '1', '0', '0', '0', '0', '0', '1', '0', '0', '2022-09-09 08:31:39', '2022-09-09 08:31:39');

-- --------------------------------------------------------

--
-- Table structure for table `listing_galleries`
--

CREATE TABLE `listing_galleries` (
  `listing_gallery_id` bigint(20) UNSIGNED NOT NULL,
  `listing_id` bigint(20) UNSIGNED NOT NULL,
  `photo_1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_3` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_4` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_5` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_6` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listing_galleries`
--

INSERT INTO `listing_galleries` (`listing_gallery_id`, `listing_id`, `photo_1`, `photo_2`, `photo_3`, `photo_4`, `photo_5`, `photo_6`, `created_at`, `updated_at`) VALUES
(1, 1, '280068248.jpg', '280068264.jpg', '280068269.jpg', NULL, NULL, NULL, '2022-09-08 04:45:44', '2022-09-08 04:45:45'),
(2, 2, '244064110.jpg', '357077587.jpg', '388741702.jpg', NULL, NULL, NULL, '2022-09-08 06:14:35', '2022-09-08 06:14:35'),
(3, 3, '303816216.jpg', '303816218.jpg', '303819864.jpg', NULL, NULL, NULL, '2022-09-08 06:17:29', '2022-09-08 06:17:30'),
(4, 4, '261968334.jpg', '261968437.jpg', '261968444.jpg', NULL, NULL, NULL, '2022-09-08 09:15:57', '2022-09-08 09:15:58'),
(5, 5, '337214906.jpg', '388880601.jpg', '388880608.jpg', NULL, NULL, NULL, '2022-09-08 10:12:32', '2022-09-08 10:12:33'),
(6, 6, '194030110.jpg', '194030107.jpg', '194030082.jpg', NULL, NULL, NULL, '2022-09-08 10:14:49', '2022-09-08 10:14:50'),
(7, 7, '68428963.jpg', '68425856.jpg', '239026724.jpg', NULL, NULL, NULL, '2022-09-08 10:29:25', '2022-09-08 10:29:26'),
(8, 8, '353889244.jpg', '353889366.jpg', '353889369.jpg', NULL, NULL, NULL, '2022-09-08 10:32:23', '2022-09-08 10:32:24'),
(9, 9, '279262248.jpg', '287364479.jpg', '287367348.jpg', NULL, NULL, NULL, '2022-09-09 08:28:06', '2022-09-09 08:28:07'),
(10, 10, '155763475.jpg', '165981138.jpg', '296871976.jpg', NULL, NULL, NULL, '2022-09-09 08:31:39', '2022-09-09 08:31:40');

-- --------------------------------------------------------

--
-- Table structure for table `listing_reviews`
--

CREATE TABLE `listing_reviews` (
  `listing_review_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `listing_id` bigint(20) UNSIGNED NOT NULL,
  `stars` int(11) DEFAULT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `viewed_by_host` tinyint(1) DEFAULT 0,
  `viewed_by_user` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `listing_rules`
--

CREATE TABLE `listing_rules` (
  `listing_rule_id` bigint(20) UNSIGNED NOT NULL,
  `listing_id` bigint(20) UNSIGNED NOT NULL,
  `refundable` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `check_in` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `check_out` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `claygo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_smoking` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_drinking` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_pets` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_events` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_rules` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listing_rules`
--

INSERT INTO `listing_rules` (`listing_rule_id`, `listing_id`, `refundable`, `check_in`, `check_out`, `claygo`, `no_smoking`, `no_drinking`, `no_pets`, `no_events`, `additional_rules`, `created_at`, `updated_at`) VALUES
(1, 1, '0', NULL, NULL, '0', '1', '1', '0', '1', NULL, '2022-09-08 04:45:44', '2022-09-08 04:45:45'),
(2, 2, '0', '12:00 PM', '12:00 AM', '1', '1', '0', '0', '0', NULL, '2022-09-08 06:14:35', '2022-09-08 06:14:35'),
(3, 3, '0', NULL, NULL, '0', '1', '1', '0', '1', NULL, '2022-09-08 06:17:29', '2022-09-08 06:17:30'),
(4, 4, '0', NULL, NULL, '1', '1', '1', '0', '0', NULL, '2022-09-08 09:15:57', '2022-09-08 09:15:58'),
(5, 5, '0', NULL, NULL, '0', '1', '1', '0', '0', NULL, '2022-09-08 10:12:32', '2022-09-08 10:12:33'),
(6, 6, '0', NULL, NULL, '0', '1', '1', '0', '0', NULL, '2022-09-08 10:14:49', '2022-09-08 10:14:50'),
(7, 7, '0', NULL, NULL, '0', '0', '0', '0', '0', NULL, '2022-09-08 10:29:25', '2022-09-08 10:29:26'),
(8, 8, '0', NULL, NULL, '0', '0', '0', '0', '1', NULL, '2022-09-08 10:32:23', '2022-09-08 10:32:24'),
(9, 9, '0', NULL, NULL, '0', '1', '1', '0', '1', NULL, '2022-09-09 08:28:06', '2022-09-09 08:28:07'),
(10, 10, '0', NULL, NULL, '0', '1', '1', '0', '0', NULL, '2022-09-09 08:31:39', '2022-09-09 08:31:40');

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
(6, '2022_06_08_004416_create_sessions_table', 1),
(7, '2022_06_27_042312_create_user_informations_table', 1),
(8, '2022_06_28_041109_create_categories_table', 1),
(9, '2022_06_29_040856_create_listings_table', 1),
(10, '2022_06_29_040904_create_listing_amenities_table', 1),
(11, '2022_06_29_041032_create_listing_galleries_table', 1),
(12, '2022_06_29_041222_create_listing_rules_table', 1),
(13, '2022_06_29_041311_create_wish_lists_table', 1),
(14, '2022_06_29_042155_create_bookings_table', 1),
(15, '2022_06_29_045714_create_host_reviews_table', 1),
(16, '2022_06_30_041047_create_listing_reviews_table', 1),
(17, '2022_06_30_041144_create_visits_table', 1);

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
('IRhODPG7aMCWIOJTqgTnr3hQMQn8UoG6sMk43dk7', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoibG9PaU1qYVpVdUkwNHVoTGV6V0NFdHEzRnBDRlFVNkk3cEZGRDQ1ZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yZW50YWxzP2NoZWNrX2luPSZjaGVja291dD0mZGVzdGluYXRpb249Jmd1ZXN0cz0iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo1O3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJGpJa050cWtSek5FZWNEa0pFazNoZk9TaXBySHBpNlo5UWlsaUJFOWZsU2dXTzhGMVJ0ZU9LIjtzOjU6ImFsZXJ0IjthOjA6e319', 1662799477);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `external_provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `external_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` int(11) NOT NULL DEFAULT 0,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_banned` timestamp NULL DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `status`, `contact`, `email_verified_at`, `external_provider`, `external_id`, `is_admin`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `is_banned`, `approved_at`, `created_at`, `updated_at`) VALUES
(1, 'host one', 'host1@gmail.com', 'Pending Approval', '9123123123', NULL, NULL, NULL, 2, '$2y$10$2Zyw0CUkG.MV90okM3T6GueNzkrv51JEb/M8vM2zlUwuS13j4hWGi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-08 04:14:09', '2022-09-08 04:35:45'),
(2, 'host two', 'host2@gmail.com', NULL, '9123142312', NULL, NULL, NULL, 2, '$2y$10$tJo5JIysx7W5jPd6eoZjK.xy7gTphicpxagTlaxsCF/iv.ywVR4LO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-08 04:16:18', '2022-09-08 09:14:05'),
(3, 'admin one', 'admin1@gmail.com', NULL, NULL, NULL, NULL, NULL, 1, '$2y$10$gFT7m8OF5h7NfRWVcjscP.ijdhgLfaBAkI3RwxTJlxKcD9ZDIFAoS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-08 04:16:47', '2022-09-08 04:16:47'),
(4, 'admin two', 'admin2@gmail.com', NULL, NULL, NULL, NULL, NULL, 1, '$2y$10$0CEEIBN8leK8AdZQiy.d1.Qrm4qT/9MieJ87vJ1f9fEIqiIwSLN7y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-08 04:17:08', '2022-09-08 04:17:08'),
(5, 'Jon Snow', 'jonsnow@gmail.com', NULL, NULL, NULL, NULL, NULL, 0, '$2y$10$jIkNtqkRzNEecDkJEk3hfOSiprHpi6Z9QiliBE9flSgWO8F1RteOK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-08 04:17:46', '2022-09-08 04:17:46');

-- --------------------------------------------------------

--
-- Table structure for table `user_informations`
--

CREATE TABLE `user_informations` (
  `user_information_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `house` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barangay` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE `visits` (
  `visit_id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visit_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wish_lists`
--

CREATE TABLE `wish_lists` (
  `wish_list_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `listing_id` bigint(20) UNSIGNED NOT NULL,
  `viewed_by_user` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wish_lists`
--

INSERT INTO `wish_lists` (`wish_list_id`, `user_id`, `listing_id`, `viewed_by_user`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 1, '2022-09-09 08:35:29', '2022-09-09 08:35:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `bookings_user_id_foreign` (`user_id`),
  ADD KEY `bookings_host_id_foreign` (`host_id`),
  ADD KEY `bookings_listing_id_foreign` (`listing_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `categories_category_name_unique` (`category_name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `host_reviews`
--
ALTER TABLE `host_reviews`
  ADD PRIMARY KEY (`host_review_id`),
  ADD KEY `host_reviews_user_id_foreign` (`user_id`),
  ADD KEY `host_reviews_booking_id_foreign` (`booking_id`),
  ADD KEY `host_reviews_listing_id_foreign` (`listing_id`);

--
-- Indexes for table `listings`
--
ALTER TABLE `listings`
  ADD PRIMARY KEY (`listing_id`),
  ADD KEY `listings_user_id_foreign` (`user_id`),
  ADD KEY `listings_category_id_foreign` (`category_id`);

--
-- Indexes for table `listing_amenities`
--
ALTER TABLE `listing_amenities`
  ADD PRIMARY KEY (`listing_amenity_id`),
  ADD KEY `listing_amenities_listing_id_foreign` (`listing_id`);

--
-- Indexes for table `listing_galleries`
--
ALTER TABLE `listing_galleries`
  ADD PRIMARY KEY (`listing_gallery_id`),
  ADD KEY `listing_galleries_listing_id_foreign` (`listing_id`);

--
-- Indexes for table `listing_reviews`
--
ALTER TABLE `listing_reviews`
  ADD PRIMARY KEY (`listing_review_id`),
  ADD KEY `listing_reviews_user_id_foreign` (`user_id`),
  ADD KEY `listing_reviews_booking_id_foreign` (`booking_id`),
  ADD KEY `listing_reviews_listing_id_foreign` (`listing_id`);

--
-- Indexes for table `listing_rules`
--
ALTER TABLE `listing_rules`
  ADD PRIMARY KEY (`listing_rule_id`),
  ADD KEY `listing_rules_listing_id_foreign` (`listing_id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_informations`
--
ALTER TABLE `user_informations`
  ADD PRIMARY KEY (`user_information_id`),
  ADD KEY `user_informations_user_id_foreign` (`user_id`);

--
-- Indexes for table `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`visit_id`);

--
-- Indexes for table `wish_lists`
--
ALTER TABLE `wish_lists`
  ADD PRIMARY KEY (`wish_list_id`),
  ADD KEY `wish_lists_user_id_foreign` (`user_id`),
  ADD KEY `wish_lists_listing_id_foreign` (`listing_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000005;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `host_reviews`
--
ALTER TABLE `host_reviews`
  MODIFY `host_review_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `listings`
--
ALTER TABLE `listings`
  MODIFY `listing_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `listing_amenities`
--
ALTER TABLE `listing_amenities`
  MODIFY `listing_amenity_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `listing_galleries`
--
ALTER TABLE `listing_galleries`
  MODIFY `listing_gallery_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `listing_reviews`
--
ALTER TABLE `listing_reviews`
  MODIFY `listing_review_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `listing_rules`
--
ALTER TABLE `listing_rules`
  MODIFY `listing_rule_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_informations`
--
ALTER TABLE `user_informations`
  MODIFY `user_information_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visits`
--
ALTER TABLE `visits`
  MODIFY `visit_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wish_lists`
--
ALTER TABLE `wish_lists`
  MODIFY `wish_list_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_host_id_foreign` FOREIGN KEY (`host_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `bookings_listing_id_foreign` FOREIGN KEY (`listing_id`) REFERENCES `listings` (`listing_id`),
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `host_reviews`
--
ALTER TABLE `host_reviews`
  ADD CONSTRAINT `host_reviews_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`booking_id`),
  ADD CONSTRAINT `host_reviews_listing_id_foreign` FOREIGN KEY (`listing_id`) REFERENCES `listings` (`listing_id`),
  ADD CONSTRAINT `host_reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `listings`
--
ALTER TABLE `listings`
  ADD CONSTRAINT `listings_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`),
  ADD CONSTRAINT `listings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `listing_amenities`
--
ALTER TABLE `listing_amenities`
  ADD CONSTRAINT `listing_amenities_listing_id_foreign` FOREIGN KEY (`listing_id`) REFERENCES `listings` (`listing_id`);

--
-- Constraints for table `listing_galleries`
--
ALTER TABLE `listing_galleries`
  ADD CONSTRAINT `listing_galleries_listing_id_foreign` FOREIGN KEY (`listing_id`) REFERENCES `listings` (`listing_id`);

--
-- Constraints for table `listing_reviews`
--
ALTER TABLE `listing_reviews`
  ADD CONSTRAINT `listing_reviews_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`booking_id`),
  ADD CONSTRAINT `listing_reviews_listing_id_foreign` FOREIGN KEY (`listing_id`) REFERENCES `listings` (`listing_id`),
  ADD CONSTRAINT `listing_reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `listing_rules`
--
ALTER TABLE `listing_rules`
  ADD CONSTRAINT `listing_rules_listing_id_foreign` FOREIGN KEY (`listing_id`) REFERENCES `listings` (`listing_id`);

--
-- Constraints for table `user_informations`
--
ALTER TABLE `user_informations`
  ADD CONSTRAINT `user_informations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `wish_lists`
--
ALTER TABLE `wish_lists`
  ADD CONSTRAINT `wish_lists_listing_id_foreign` FOREIGN KEY (`listing_id`) REFERENCES `listings` (`listing_id`),
  ADD CONSTRAINT `wish_lists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
