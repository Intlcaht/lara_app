SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


TRUNCATE TABLE `blogs`;
TRUNCATE TABLE `blog_comments`;
TRUNCATE TABLE `business_attachments`;
TRUNCATE TABLE `business_profiles`;
INSERT INTO `business_profiles` (`id`, `u_id`, `escrow_u_id`, `service_notifier_user_u_id`, `cap_percentage`, `is_online`, `address`, `title`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`, `terms_and_conditions`) VALUES
(3, 'intl_bsp', NULL, 'intl_adapter', 100, 1, '', 'BSP Adapter', '', 'ACTIVE', '2022-06-04 16:05:08.000', NULL, NULL, '');

TRUNCATE TABLE `business_profile_adapter`;
TRUNCATE TABLE `business_profile_adapter_transactions`;
TRUNCATE TABLE `business_profile_service`;
INSERT INTO `business_profile_service` (`id`, `u_id`, `created_at`, `updated_at`, `deleted_at`, `business_profilesId`, `servicesId`) VALUES
(1, 'id', '2022-06-04 16:26:25.000', NULL, NULL, 3, 1);

TRUNCATE TABLE `cash_out`;
TRUNCATE TABLE `chats`;
TRUNCATE TABLE `checkin_users`;
TRUNCATE TABLE `check_in`;
TRUNCATE TABLE `commissions`;
TRUNCATE TABLE `earnings`;
TRUNCATE TABLE `escrows`;
INSERT INTO `escrows` (`id`, `u_id`, `balance`) VALUES
(1, 'intl_escrow', 0);

TRUNCATE TABLE `escrow_transactions`;
TRUNCATE TABLE `escrow_transaction_charges`;
TRUNCATE TABLE `failed_jobs`;
TRUNCATE TABLE `f_a_qs`;
TRUNCATE TABLE `locations`;
TRUNCATE TABLE `migrations`;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2022_06_03_053809_create_permission_tables', 2);

TRUNCATE TABLE `model_has_permissions`;
TRUNCATE TABLE `model_has_roles`;
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

TRUNCATE TABLE `orders`;
TRUNCATE TABLE `order_attachments`;
TRUNCATE TABLE `order_statuses`;
TRUNCATE TABLE `order_status_business_profiles`;
TRUNCATE TABLE `order_status_clients`;
TRUNCATE TABLE `order_status_providers`;
TRUNCATE TABLE `order_status_provider_payments`;
TRUNCATE TABLE `payments`;
TRUNCATE TABLE `payment_details`;
INSERT INTO `payment_details` (`id`, `u_id`, `escrow_u_id`, `billing_type`, `kra_pin_number`, `bank_holder_name`, `bank_account_number`, `bank_name`, `bank_branch_name`, `created_at`, `updated_at`, `deleted_at`, `status`, `phone_number`) VALUES
(1, 'intl_pay_id', 'intl_escrow', 'M_PESA', NULL, NULL, NULL, NULL, NULL, '2022-06-04 16:28:52.000', NULL, NULL, 'ACTIVE', NULL);

TRUNCATE TABLE `permissions`;
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'view_businessprofileadapter', 'web', '2022-06-03 06:38:43', '2022-06-03 06:38:43'),
(2, 'view_any_businessprofileadapter', 'web', '2022-06-03 06:38:43', '2022-06-03 06:38:43'),
(3, 'create_businessprofileadapter', 'web', '2022-06-03 06:38:43', '2022-06-03 06:38:43'),
(4, 'delete_businessprofileadapter', 'web', '2022-06-03 06:38:43', '2022-06-03 06:38:43'),
(5, 'delete_any_businessprofileadapter', 'web', '2022-06-03 06:38:43', '2022-06-03 06:38:43'),
(6, 'update_businessprofileadapter', 'web', '2022-06-03 06:38:43', '2022-06-03 06:38:43'),
(7, 'export_businessprofileadapter', 'web', '2022-06-03 06:38:43', '2022-06-03 06:38:43'),
(8, 'view_businessprofileadaptertransaction', 'web', '2022-06-03 06:38:43', '2022-06-03 06:38:43'),
(9, 'view_any_businessprofileadaptertransaction', 'web', '2022-06-03 06:38:43', '2022-06-03 06:38:43'),
(10, 'create_businessprofileadaptertransaction', 'web', '2022-06-03 06:38:43', '2022-06-03 06:38:43'),
(11, 'delete_businessprofileadaptertransaction', 'web', '2022-06-03 06:38:43', '2022-06-03 06:38:43'),
(12, 'delete_any_businessprofileadaptertransaction', 'web', '2022-06-03 06:38:44', '2022-06-03 06:38:44'),
(13, 'update_businessprofileadaptertransaction', 'web', '2022-06-03 06:38:44', '2022-06-03 06:38:44'),
(14, 'export_businessprofileadaptertransaction', 'web', '2022-06-03 06:38:44', '2022-06-03 06:38:44'),
(15, 'view_businessprofile', 'web', '2022-06-03 06:38:44', '2022-06-03 06:38:44'),
(16, 'view_any_businessprofile', 'web', '2022-06-03 06:38:44', '2022-06-03 06:38:44'),
(17, 'create_businessprofile', 'web', '2022-06-03 06:38:44', '2022-06-03 06:38:44'),
(18, 'delete_businessprofile', 'web', '2022-06-03 06:38:44', '2022-06-03 06:38:44'),
(19, 'delete_any_businessprofile', 'web', '2022-06-03 06:38:44', '2022-06-03 06:38:44'),
(20, 'update_businessprofile', 'web', '2022-06-03 06:38:44', '2022-06-03 06:38:44'),
(21, 'export_businessprofile', 'web', '2022-06-03 06:38:44', '2022-06-03 06:38:44'),
(22, 'view_servicetag', 'web', '2022-06-03 06:38:44', '2022-06-03 06:38:44'),
(23, 'view_any_servicetag', 'web', '2022-06-03 06:38:44', '2022-06-03 06:38:44'),
(24, 'create_servicetag', 'web', '2022-06-03 06:38:44', '2022-06-03 06:38:44'),
(25, 'delete_servicetag', 'web', '2022-06-03 06:38:44', '2022-06-03 06:38:44'),
(26, 'delete_any_servicetag', 'web', '2022-06-03 06:38:44', '2022-06-03 06:38:44'),
(27, 'update_servicetag', 'web', '2022-06-03 06:38:44', '2022-06-03 06:38:44'),
(28, 'export_servicetag', 'web', '2022-06-03 06:38:44', '2022-06-03 06:38:44'),
(29, 'view_role', 'web', '2022-06-03 06:38:45', '2022-06-03 06:38:45'),
(30, 'view_any_role', 'web', '2022-06-03 06:38:45', '2022-06-03 06:38:45'),
(31, 'create_role', 'web', '2022-06-03 06:38:45', '2022-06-03 06:38:45'),
(32, 'delete_role', 'web', '2022-06-03 06:38:45', '2022-06-03 06:38:45'),
(33, 'delete_any_role', 'web', '2022-06-03 06:38:45', '2022-06-03 06:38:45'),
(34, 'update_role', 'web', '2022-06-03 06:38:45', '2022-06-03 06:38:45'),
(35, 'export_role', 'web', '2022-06-03 06:38:45', '2022-06-03 06:38:45'),
(36, 'view_settings', 'web', '2022-06-03 06:38:45', '2022-06-03 06:38:45'),
(37, 'view_my_profile', 'web', '2022-06-03 06:38:46', '2022-06-03 06:38:46'),
(38, 'view_dashboard', 'web', '2022-06-03 07:26:01', '2022-06-03 07:26:01'),
(39, 'view_user', 'web', '2022-06-03 08:22:07', '2022-06-03 08:22:07'),
(40, 'update_user', 'web', '2022-06-03 08:22:07', '2022-06-03 08:22:07'),
(41, 'export_user', 'web', '2022-06-03 08:22:07', '2022-06-03 08:22:07');

TRUNCATE TABLE `personal_access_tokens`;
TRUNCATE TABLE `projects`;
TRUNCATE TABLE `projects_clients`;
TRUNCATE TABLE `project_data_types`;
TRUNCATE TABLE `project_profiles`;
TRUNCATE TABLE `project_service_tag_joint`;
TRUNCATE TABLE `project_status_labels`;
TRUNCATE TABLE `project_tasks`;
TRUNCATE TABLE `project_task_group`;
TRUNCATE TABLE `ratings`;
TRUNCATE TABLE `registrations`;
TRUNCATE TABLE `resources`;
TRUNCATE TABLE `roles`;
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', 'web', '2022-06-03 06:38:34', '2022-06-03 06:38:34.000'),
(2, 'adapter', 'web', '2022-06-03 08:19:56', '2022-06-03 08:19:56.000'),
(3, 'provider', 'web', '2022-06-03 08:21:31', '2022-06-03 08:21:31.000'),
(4, 'client', 'web', '2022-06-03 08:22:07', '2022-06-03 08:22:07.000');

TRUNCATE TABLE `role_has_permissions`;
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(15, 2),
(15, 3),
(16, 2),
(17, 3),
(18, 3),
(19, 2),
(20, 2),
(20, 3),
(21, 3),
(23, 3),
(36, 2),
(38, 2),
(39, 4),
(40, 4),
(41, 4);

TRUNCATE TABLE `services`;
INSERT INTO `services` (`id`, `u_id`, `created_at`, `updated_at`, `deleted_at`, `title`, `description`, `expected_delivery`, `location_lat`, `location_long`) VALUES
(1, 'intl_adapter_service_adapters', '2022-06-04 16:20:52.000', NULL, NULL, '', 'Intl Adapter Service that renews and sells adapters', NULL, 0, 0);

TRUNCATE TABLE `service_category`;
TRUNCATE TABLE `service_category_service_joint`;
TRUNCATE TABLE `service_notifications`;
TRUNCATE TABLE `service_packages`;
TRUNCATE TABLE `service_requirements`;
TRUNCATE TABLE `service_reviews`;
TRUNCATE TABLE `service_tags`;
INSERT INTO `service_tags` (`id`, `u_id`, `created_at`, `updated_at`, `deleted_at`, `title`, `description`) VALUES
(1, 'STAG629ae39da0bc9', '2022-06-04 04:46:21.000', '2022-06-04 04:46:21.000', NULL, 'TAXI', 'Taxi Services'),
(2, 'STAG629ae3d43c19e', '2022-06-04 04:47:16.000', '2022-06-04 04:47:16.000', NULL, 'FREELANCER', 'Free lancing services'),
(3, 'STAG629ae410b23f8', '2022-06-04 04:48:16.000', '2022-06-04 05:12:22.000', NULL, 'FOOD', 'Food delivery services'),
(4, 'STAG629ae431e9302', '2022-06-04 04:48:49.000', '2022-06-04 04:48:49.000', NULL, 'PAINTING', 'Painting Services'),
(5, 'STAG629ae47eb73bb', '2022-06-04 04:50:06.000', '2022-06-04 04:50:06.000', NULL, 'DELIVERY', 'Delivery services'),
(6, 'STAG629ae496cf14e', '2022-06-04 04:50:30.000', '2022-06-04 04:50:30.000', NULL, 'GROCERIES', 'Groceries Shopping');

TRUNCATE TABLE `service_tags_blogs_joint`;
TRUNCATE TABLE `service_tags_business_profile_joint`;
TRUNCATE TABLE `service_tags_business_profile_joint_durations`;
TRUNCATE TABLE `service_tags_notifications_joint`;
TRUNCATE TABLE `service_tags_service_category_joint`;
TRUNCATE TABLE `service_tag_check_in`;
TRUNCATE TABLE `service_tires`;
TRUNCATE TABLE `service_tire_packages`;
TRUNCATE TABLE `sessions`;
TRUNCATE TABLE `tokens`;
TRUNCATE TABLE `users`;
INSERT INTO `users` (`id`, `u_id`, `provider_location_lat`, `provider_location_long`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `phone_number`, `status`, `otp`, `created_at`, `updated_at`, `first_name`, `last_name`, `national_id`, `county`, `photo_url`, `initials`) VALUES
(1, 'intl_sys', NULL, NULL, 'system@intlcaht.com', '2022-06-03 09:34:51', '$2y$12$C5Jw8G1Isz0yCw.GwPwqSe7kYgKohFB9/YAw0FfxMC2BEYJrbLijq', 'eyJpdiI6IndobjY0bkhvN0x0L1Y2TzZTYjVnNnc9PSIsInZhbHVlIjoicWRtUDMwYndIVHkwR09veC8xMUwwd1BFRU54ajQ0YnpncTRpbU42MFpnYz0iLCJtYWMiOiI2NDcwYmFlNWEzZTY0OTVjNWJkYzBiYTcyY2QzYjQ1YzIwMjJjYWM5NWVkY2U3ODU', 'eyJpdiI6IkFTRldvUGQyQWh2VGFhbjdnQ21WTmc9PSIsInZhbHVlIjoiUENSeHVhcGRtMlRWMFVDN0NOY09xRUVvUGxXSEw1THlhOTg0SitqMG8vL1lxOTVqTmQ2c3ZMZlBaSUFoRjRqR0JkVUJHUjBsWGFFaUVic1pTRXZCQ1BWbHdsU2M3TEtOZVlEQmw', '2022-06-03 07:35:57', '3DvN0uliudjKKHT7wxGBuuLUBe1LRVjdZ5mfCXwj393WXQNLN9GU82gFBP18', '254700000000', 'APPROVED', NULL, '2022-06-03 10:19:05.000', '2022-06-03 07:35:57.000', 'IntlCaht', 'System', NULL, NULL, NULL, NULL),
(2, 'intl_adapter', NULL, NULL, 'adapter@intlcaht.com', '2022-06-03 09:34:51', '$2y$12$C5Jw8G1Isz0yCw.GwPwqSe7kYgKohFB9/YAw0FfxMC2BEYJrbLijq', NULL, NULL, NULL, 'OoR4Cn3gvwUXHHPF160BtjxnxO1sXx30QH4lld212xjtl328V3Q14EKsbHdo', '254700000001', 'APPROVED', NULL, '2022-06-03 09:34:51.000', NULL, 'Intl', 'Adapter', NULL, NULL, 'https://ui-avatars.com/api/?name=Intl+Adapter', 'MR');

TRUNCATE TABLE `users_ratings`;
TRUNCATE TABLE `user_business_profiles`;
INSERT INTO `user_business_profiles` (`id`, `u_id`, `created_at`, `updated_at`, `deleted_at`, `user_u_id`, `profile_u_id`) VALUES
(1, 'intl_bsp_u_bsp', '2022-06-04 16:06:23.000', NULL, NULL, 'intl_adapter', 'intl_bsp');

TRUNCATE TABLE `user_reviews`;USE `phpmyadmin`;

TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__column_info`;
TRUNCATE TABLE `pma__table_uiprefs`;
TRUNCATE TABLE `pma__tracking`;
TRUNCATE TABLE `pma__bookmark`;
TRUNCATE TABLE `pma__relation`;
TRUNCATE TABLE `pma__savedsearches`;
TRUNCATE TABLE `pma__central_columns`;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
