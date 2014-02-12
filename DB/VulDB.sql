INSERT INTO `category` (`id`, `name`, `description`) VALUES
(1, 'FirstPersonShooter', NULL),
(2, 'RealTimeStrategy', NULL),
(3, 'MMORPG', 'Massively multiplayer online role-playing game');

INSERT INTO `customers` (`id`, `name`, `adress`, `email`) VALUES
(1, 'Thim Heider', 'Thimsstraat 5 Thimsdorp 5555 TH', 'thim@thim.nl'),
(2, 'Edwin Hattink', 'Edwinstraat 5 Edwindorp 5555 ED', 'edwin@edwin.nl');

INSERT INTO `orders` (`id`, `customers_id`) VALUES
(1, 1);

INSERT INTO `products` (`id`, `name`, `price`, `description`, `category_id`) VALUES
(1, 'Call Of Duty 4', 40, NULL, 1),
(2, 'Command & Conquer Generals', 30, NULL, 2),
(3, 'Path Of Exile', 0, NULL, 5),
(4, 'The Settlers 7', 20, NULL, 2),
(5, 'Call Of Duty 8', 60, NULL, 1);

INSERT INTO `products_has_orders` (`products_id`, `orders_id`, `amount`) VALUES
(1, 1, 1),
(2, 1, 1);