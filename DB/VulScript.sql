-- phpMyAdmin SQL Dump
-- version 4.1.9
-- http://www.phpmyadmin.net
--
-- Host: databases.aii.avans.nl
-- Generation Time: Mar 20, 2014 at 09:09 PM
-- Server version: 5.5.29
-- PHP Version: 5.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `egjhatti_db`
--

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`name`, `description`, `categorytype_name`) VALUES
('Action', NULL, 'subcategory'),
('Adventure', NULL, 'subcategory'),
('Fantasy', NULL, 'subcategory'),
('First-person Shooter', NULL, 'maincategory'),
('Platform', NULL, 'maincategory'),
('Real Time Strategy', NULL, 'maincategory'),
('Role Playing Game', NULL, 'maincategory'),
('Third-person shooter', NULL, 'maincategory'),
('Turn-based games', NULL, 'maincategory');

--
-- Dumping data for table `categorytype`
--

INSERT INTO `categorytype` (`name`) VALUES
('maincategory'),
('subcategory');

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `link`, `menu_name`) VALUES
(1, 'Gameshop ET', 'home', 'user'),
(2, 'Products', 'products', 'user'),
(3, 'Login', 'login', 'user'),
(4, 'About', 'about', 'user'),
(5, 'Progress', 'progressscreen', 'user'),
(6, 'Add Product', 'adminproductscreen', 'admin');

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `short_description`, `image`, `category`, `subcategory`) VALUES
(1, 'Call Of Duty 1', '10.00', 'Call of Duty is a 2003 first-person shooter video game developed by Infinity Ward and published by Activision. The game simulates the infantry and combined arms warfare of World War II. The game is based on the Quake III: Team Arena engine. It was accompanied in September 2004 by an expansion pack, Call of Duty: United Offensive, which was produced by Activision, and developed by Gray Matter Interactive, with contributions from Pi Studios. Call of Duty is similar in theme and gameplay to Medal of Honor, as it is made out of single-player campaigns and missions. However, unlike Medal of Honor, the war is seen not just from the viewpoint of an American soldier but also from the viewpoint of British, Canadian, and Soviet soldiers.', 'A first-person shooter in the second world war, with amazing multiplayer features.', 'images/cod1.png', 'First-person Shooter', 'Action'),
(2, 'Call Of Duty 2', '15.00', 'Call of Duty 2 is a 2005 first-person shooter video game, the second installment in the critically acclaimed Call of Duty series. It was developed by Activision and published by Konami in Japan and Activision in the rest of the world. The game was released on October 25, 2005 for Microsoft Windows PCs and on November 22, 2005 as a launch game for the Xbox 360 in Europe, Australia and South America, and later in Japan. The game is set during World War II and the campaign mode is experienced through the perspectives of four soldiers: one in the Red Army, one in the United States Army, and two in the British Army. It contains four individual campaigns, split into three stories, with a total of twenty-seven missions. Activision officially announced the game on April 7, 2005 in a press release. Many features were added and changed from the original Call of Duty. The most notable change is the regenerating health. Additions include an icon that indicates a nearby grenade about to explode.', ' The follow up of Call Of Duty 1, with a lot new features.', 'images/cod2.png', 'First-person Shooter', 'Action'),
(3, 'Super Mario Bros', '5.00', 'Super Mario Bros is a 1985 platform video game initially developed by Nintendo EAD and published by Nintendo as a pseudo-sequel to the 1983 game Mario Bros. It was originally released in Japan for the Family Computer on September 13, 1985, and later for the Nintendo Entertainment System in North America in 1985, Europe on May 15, 1987 and Australia in 1987. It is the first of the Super Mario series of games. In Super Mario Bros., the player controls Mario and in a two-player game, a second player controls Mario''s brother Luigi as he travels through the Mushroom Kingdom in order to rescue Princess Toadstool from the antagonist Bowser.', ' 2D game where you play Mario to save Peach', 'images/supermariobros.png', 'Platform', 'Adventure'),
(4, 'Super Smash Bros Brawl', '20.00', 'Super Smash Bros Brawl is the third installment in the Super Smash Bros. series of crossover fighting games, developed by an ad hoc development team consisting of Sora, Game Arts and staff from other developers, and published by Nintendo for the Wii video game console. Brawl was announced at a pre-E3 2005 press conference by Nintendo president and Chief Executive Officer Satoru Iwata. Masahiro Sakurai, director of the previous two games in the series, assumed the role of director for the third installment at the request of Iwata. Game development began in October 2005 with a creative team that included members from several Nintendo and third party development teams. After delays due to development problems, the game was finally released on January 31, 2008. ', ' Fight game where you fight with Nintendo heroes versus Nintendo heroes!', 'images/supersmashbrosbrawl.png', 'Platform', 'Action'),
(5, 'Lord Of The Rings Battle For Middle Earth', '15.00', 'The Lord of the Rings: The Battle for Middle-Earth is a PC real-time strategy game developed by EA Los Angeles. It is based on Peter Jackson''s The Lord of the Rings film trilogy, in turn based on J. R. R. Tolkien''s original novel. The game uses short video clips from the movies and a number of the voice actors, including the hobbits and wizards.', ' Real Time Strategy game in the world of Lord Of The Rings: Middle-Earth', 'images/bfme.jpg', 'Real Time Strategy', 'Fantasy'),
(6, 'Lord Of The Rings Battle For Middle Earth 2', '20.00', 'The Lord of the Rings: The Battle for Middle-earth II is a real-time strategy video game developed and published by Electronic Arts. It is based on the fantasy novels The Lord of the Rings and The Hobbit by J. R. R. Tolkien and its live-action film trilogy adaptation. It is the sequel to Electronic Arts'' 2004 title The Lord of the Rings: The Battle for Middle-earth. The Windows version of the game was released on March 2, 2006 and the Xbox 360 version was released on July 5, 2006. ', ' The follow up of Lord Of The Rings Battle For Middle Earth, with a lot new features.', 'images/bfme2.png', 'Real Time Strategy', 'Fantasy'),
(7, 'The Elder Scrolls I: Arena', '5.00', 'The Elder Scrolls: Arena is an epic fantasy open world action role-playing video game developed by Bethesda Softworks and released in 1994 for PC DOS. It is the first game in The Elder Scrolls series. In 2004, a downloadable version of the game was made available free of charge as part of the 10th anniversary of The Elder Scrolls series. Like its sequels, Arena takes place on the continent of Tamriel, complete with wilderness, dungeons, and a spell creation system that allows players to mix various spell effects.', 'A game where you can build a character the way you wish.', 'images/elderscrollsarena.jpg', 'Role Playing Game', 'Fantasy'),
(8, 'The Elder Scrolls II: Daggerfall', '5.00', 'The Elder Scrolls II: Daggerfall is a fantasy open world action role-playing video game developed by Bethesda Softworks and released in 1996 for MS-DOS. It is a sequel to The Elder Scrolls: Arena and the second installment in The Elder Scrolls series. It is the first game in the series to be rated M. ', 'Follow up of The Elder Scrolls 1: Arena, with a lot more new features', 'images/elderscrollsdaggerfall.jpg', 'Role Playing Game', 'Fantasy'),
(9, 'Uncharted: Drake''s Fortune', '10.00', 'Uncharted: Drake''s Fortune is an action-adventure third-person shooter platform game developed by Naughty Dog, and published by Sony Computer Entertainment for PlayStation 3. It is the first game in the Uncharted series. Combining action-adventure and platforming elements with a third-person perspective, the game charts the journey of protagonist Nathan Drake, supposed descendant of the explorer Sir Francis Drake, as he seeks the lost treasure of El Dorado, with the help of journalist Elena Fisher and mentor Victor Sullivan. ', ' Adventure game where you go treasure hunting with Nathan Drake', 'images/uncharteddrakesfortune.jpg', 'Third-person shooter', 'Adventure'),
(10, 'Uncharted 2: Among Thieves', '15.00', 'Uncharted 2: Among Thieves is an action-adventure third-person shooter platform video game developed by Naughty Dog and published by Sony Computer Entertainment for the PlayStation 3. It is the sequel to the 2007 game Uncharted: Drake''s Fortune. It was first shown and announced on December 1, 2008. Officially announced in the January 2009 issue of Game Informer, it was released in October 2009. ', ' Follow up of Uncharted Drake''s Fortune, with a whole new story and a multiplayer', 'images/unchartedamongthieves.jpg', 'Third-person shooter', 'Adventure'),
(11, 'Worms', '2.00', 'Worms is an artillery strategy video game developed by Team17 and released in 1995. It is the first game in the Worms series of video games and was initially only available for the Amiga. Later it was ported to other platforms. Worms is a turn based game where a player controls a team of worms against other teams of worms that are controlled by a computer or human opponent. The aim is to use various weapons to kill the worms on the other teams and have the last surviving worm(s).', ' A game where you order your worms to attack the other team with weapons', 'images/worms.jpg', 'Turn-based games', 'Action'),
(12, 'Worms 2', '3.00', 'Worms 2 is an artillery strategy game developed by Team17 as part of the Worms series. The game was released in 1997. The player controls a team of up to eight worms in combat against opposing teams. The game features the same premise as the original game, and involves controlling an army of worms and using a collection of eclectic weaponry such as bazookas, dynamite, grenades, cluster bombs, homing missiles, banana bombs and the infamous holy hand grenade. These are among the basic weapons used to eliminate the opposing team(s) of worms. It features a completely new graphics system, going for a cartoon style, which has remained for the rest of the series.', ' Follow up of Worms, with a bunch of new weapons.', 'images/worms2.jpg', 'Turn-based games', 'Action');

--
-- Dumping data for table `rights`
--

INSERT INTO `rights` (`right`) VALUES
('admin'),
('customer'),
('employee');

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `rights_right`) VALUES
('admin', 'admin', 'admin'),
('employee', 'employee', 'employee'),
('Henk', 'Henken', 'customer');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
