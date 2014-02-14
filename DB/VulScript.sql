-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 14, 2014 at 01:42 PM
-- Server version: 5.5.29
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
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

INSERT INTO `category` (`name`, `description`) VALUES
('First-person Shooter', NULL),
('Platform', NULL),
('Real Time Strategy', NULL),
('Role Playing Game', NULL),
('Third-person shooter', NULL),
('Turn-based games', NULL);

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first name`, `surname`, `email`, `user_username`, `postcode`, `woonplaats`, `adress`) VALUES
(1, 'Henk', 'Henken', 'henk@henk.nl', 'Henk', '1111HH', 'Henkenplaats', 'Henkenstraat 1h');

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `image`, `category_name`) VALUES
(1, 'Call Of Duty 1', '10.00', 'Call of Duty is a 2003 first-person shooter video game developed by Infinity Ward and published by Activision. The game simulates the infantry and combined arms warfare of World War II. The game is based on the Quake III: Team Arena engine. It was accompanied in September 2004 by an expansion pack, Call of Duty: United Offensive, which was produced by Activision, and developed by Gray Matter Interactive, with contributions from Pi Studios. Call of Duty is similar in theme and gameplay to Medal of Honor, as it is made out of single-player campaigns and missions. However, unlike Medal of Honor, the war is seen not just from the viewpoint of an American soldier but also from the viewpoint of British, Canadian, and Soviet soldiers.', NULL, 'First-person Shooter'),
(2, 'Call Of Duty 2', '15.00', 'Call of Duty 2 is a 2005 first-person shooter video game, the second installment in the critically acclaimed Call of Duty series. It was developed by Activision and published by Konami in Japan and Activision in the rest of the world. The game was released on October 25, 2005 for Microsoft Windows PCs and on November 22, 2005 as a launch game for the Xbox 360 in Europe, Australia and South America, and later in Japan. The game is set during World War II and the campaign mode is experienced through the perspectives of four soldiers: one in the Red Army, one in the United States Army, and two in the British Army. It contains four individual campaigns, split into three stories, with a total of twenty-seven missions. Activision officially announced the game on April 7, 2005 in a press release. Many features were added and changed from the original Call of Duty. The most notable change is the regenerating health. Additions include an icon that indicates a nearby grenade about to explode.', NULL, 'First-person Shooter'),
(3, 'Super Mario Bros', '5.00', 'Super Mario Bros is a 1985 platform video game initially developed by Nintendo EAD and published by Nintendo as a pseudo-sequel to the 1983 game Mario Bros. It was originally released in Japan for the Family Computer on September 13, 1985, and later for the Nintendo Entertainment System in North America in 1985, Europe on May 15, 1987 and Australia in 1987. It is the first of the Super Mario series of games. In Super Mario Bros., the player controls Mario and in a two-player game, a second player controls Mario''s brother Luigi as he travels through the Mushroom Kingdom in order to rescue Princess Toadstool from the antagonist Bowser.', NULL, 'Platform'),
(4, 'Super Smash Bros Brawl', '20.00', 'Super Smash Bros Brawl is the third installment in the Super Smash Bros. series of crossover fighting games, developed by an ad hoc development team consisting of Sora, Game Arts and staff from other developers, and published by Nintendo for the Wii video game console. Brawl was announced at a pre-E3 2005 press conference by Nintendo president and Chief Executive Officer Satoru Iwata. Masahiro Sakurai, director of the previous two games in the series, assumed the role of director for the third installment at the request of Iwata. Game development began in October 2005 with a creative team that included members from several Nintendo and third party development teams. After delays due to development problems, the game was finally released on January 31, 2008. ', NULL, 'Platform'),
(5, 'Lord Of The Rings Battle For Middle Earth', '15.00', 'The Lord of the Rings: The Battle for Middle-Earth is a PC real-time strategy game developed by EA Los Angeles. It is based on Peter Jackson''s The Lord of the Rings film trilogy, in turn based on J. R. R. Tolkien''s original novel. The game uses short video clips from the movies and a number of the voice actors, including the hobbits and wizards.', NULL, 'Real Time Strategy'),
(6, 'Lord Of The Rings Battle For Middle Earth 2', '20.00', 'The Lord of the Rings: The Battle for Middle-earth II is a real-time strategy video game developed and published by Electronic Arts. It is based on the fantasy novels The Lord of the Rings and The Hobbit by J. R. R. Tolkien and its live-action film trilogy adaptation. It is the sequel to Electronic Arts'' 2004 title The Lord of the Rings: The Battle for Middle-earth. The Windows version of the game was released on March 2, 2006 and the Xbox 360 version was released on July 5, 2006. ', NULL, 'Real Time Strategy'),
(7, 'The Elder Scrolls I: Arena', '5.00', 'The Elder Scrolls: Arena is an epic fantasy open world action role-playing video game developed by Bethesda Softworks and released in 1994 for PC DOS. It is the first game in The Elder Scrolls series. In 2004, a downloadable version of the game was made available free of charge as part of the 10th anniversary of The Elder Scrolls series. Like its sequels, Arena takes place on the continent of Tamriel, complete with wilderness, dungeons, and a spell creation system that allows players to mix various spell effects.', NULL, 'Role Playing Game'),
(8, 'The Elder Scrolls II: Daggerfall', '5.00', 'The Elder Scrolls II: Daggerfall is a fantasy open world action role-playing video game developed by Bethesda Softworks and released in 1996 for MS-DOS. It is a sequel to The Elder Scrolls: Arena and the second installment in The Elder Scrolls series. It is the first game in the series to be rated M. ', NULL, 'Role Playing Game'),
(9, 'Uncharted: Drake''s Fortune', '10.00', 'Uncharted: Drake''s Fortune is an action-adventure third-person shooter platform game developed by Naughty Dog, and published by Sony Computer Entertainment for PlayStation 3. It is the first game in the Uncharted series. Combining action-adventure and platforming elements with a third-person perspective, the game charts the journey of protagonist Nathan Drake, supposed descendant of the explorer Sir Francis Drake, as he seeks the lost treasure of El Dorado, with the help of journalist Elena Fisher and mentor Victor Sullivan. ', NULL, 'Third-person shooter'),
(10, 'Uncharted 2: Among Thieves', '15.00', 'Uncharted 2: Among Thieves is an action-adventure third-person shooter platform video game developed by Naughty Dog and published by Sony Computer Entertainment for the PlayStation 3. It is the sequel to the 2007 game Uncharted: Drake''s Fortune. It was first shown and announced on December 1, 2008. Officially announced in the January 2009 issue of Game Informer, it was released in October 2009. ', NULL, 'Third-person shooter'),
(11, 'Worms', '2.00', 'Worms is an artillery strategy video game developed by Team17 and released in 1995. It is the first game in the Worms series of video games and was initially only available for the Amiga. Later it was ported to other platforms. Worms is a turn based game where a player controls a team of worms against other teams of worms that are controlled by a computer or human opponent. The aim is to use various weapons to kill the worms on the other teams and have the last surviving worm(s).', NULL, 'Turn-based games'),
(12, 'Worms 2', '3.00', 'Worms 2 is an artillery strategy game developed by Team17 as part of the Worms series. The game was released in 1997. The player controls a team of up to eight worms in combat against opposing teams. The game features the same premise as the original game, and involves controlling an army of worms and using a collection of eclectic weaponry such as bazookas, dynamite, grenades, cluster bombs, homing missiles, banana bombs and the infamous holy hand grenade. These are among the basic weapons used to eliminate the opposing team(s) of worms. It features a completely new graphics system, going for a cartoon style, which has remained for the rest of the series.', NULL, 'Turn-based games');

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
