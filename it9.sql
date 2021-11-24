-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2020 at 08:34 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `it9`
--

-- --------------------------------------------------------

--
-- Table structure for table `developer`
--

CREATE TABLE `developer` (
  `developerid` int(11) NOT NULL,
  `developerName` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `developer`
--

INSERT INTO `developer` (`developerid`, `developerName`, `address`) VALUES
(1, 'Valve Software ', 'United States '),
(2, 'Mojang', 'Sweden'),
(3, 'Taleworlds', 'Turkey'),
(4, 'CD Projekt Red', 'Poland'),
(5, 'Electronic Arts', 'United States '),
(6, 'Ubisoft', 'France'),
(7, 'Pootis Dispenser', 'Philippines');

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `gameID` int(11) NOT NULL,
  `developer` varchar(255) NOT NULL,
  `gametitle` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `year` int(5) NOT NULL,
  `price` decimal(11,0) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`gameID`, `developer`, `gametitle`, `description`, `year`, `price`, `img`) VALUES
(1, 'Valve Software          ', 'Team Fortress 2       ', 'Nine distinct classes provide a broad range of tactical abilities and personalities. Constantly updated with new game modes, maps, equipment and, most importantly, hats!', 2007, '759', 'images/teamfortress2.jpg            '),
(2, 'Toby Fox   ', 'Undertale   ', 'Welcome to UNDERTALE. In this RPG, you control a human who falls underground into the world of monsters. Now you must find your way out... or stay trapped forever. ((Healthy Dog\'s Warning: Game contains imagery that may be harmful to players with photosensitive epilepsy or similar condition.))', 2015, '395', 'images/undertale.jpg        '),
(8, 'TaleWorlds  ', 'Mount and Blade: Warband  ', 'Lead your men into battle, expand your realm, and claim the ultimate prize: the throne of Calradia! Mount & Blade: Warband is a stand alone expansion pack for the game that brought medieval battlefields to life with its realistic mounted combat and detailed fighting system.', 2010, '449', 'images/mnbwb.jpg  '),
(10, 'Ubisoft   ', 'Assassin\'s Creed Brotherhood   ', 'Live and breathe as Ezio, a legendary Master Assassin, in his enduring struggle against the powerful Templar Order. He must journey into Italyâ€™s greatest city, Rome, center of power, greed and corruption to strike at the heart of the enemy. Itâ€™s time to join the Brotherhood.', 2010, '550', 'images/acb.jpg   '),
(11, 'Electronic Arts  ', 'The Sims 4  ', 'The Sims 4 is a life simulation game, similar to its predecessors. Players create a Sim character and control their life to explore different personalities which change the way the game plays out', 2014, '550', 'images/sims4.jpg  '),
(12, 'Valve Software  ', 'Counter-Strike: Global Offensive  ', 'Rekt your friends, Peenoise that can\'t do anything but make inaudible noises, or crazy Russians that like to rush B! CS:GO, the latest installment in the longest-running head popping simulator Counter-Strike, presents to you the all-new update: Shattered Web! More skins, and new agents!', 2012, '450', 'images/csgo.jpg  '),
(13, 'CD Projekt Red  ', 'The Witcher 3: Wild Hunt  ', 'The WitcherÂ® 3: Wild Hunt is a story-driven, next-generation open world role-playing game, set in a visually stunning fantasy universe, full of meaningful choices and impactful consequences. You play as Geralt of Rivia, a monster hunter tasked with finding a child from an ancient prophecy.', 2015, '1299', 'images/witcher3.jpg  '),
(22, 'Mojang', 'Minecraft', '', 2009, '699', 'images/minecraft.jpg'),
(23, 'Frictional Games ', 'Amnesia: The Dark Descent ', '', 2010, '259', 'images/amnesia.jpeg '),
(24, 'Ensemble Studios', 'Age of Empires II Definitive Edition', '', 2019, '1000', 'images/aoe2.JPG'),
(25, '2K Games', 'Civilization VI', '', 2016, '999', 'images/civ6.jpg'),
(26, 'Naughty Dog', 'The Last of Us', '', 2013, '1599', 'images/thelastofus.jpg'),
(27, 'Valve Software', 'Left 4 Dead 2', '', 2009, '299', 'images/Left4Dead2.jpg '),
(28, 'Sony Interactive ', 'Killzone ', '', 2004, '850', 'images/kz.jpg '),
(29, 'Rockstar Games', 'Red Dead Redemption 2', '', 2019, '1999', 'images/rdr2.jpg'),
(31, 'Frontier Developments', 'Planet Zoo', '', 2019, '1290', 'images/pz.jpg'),
(32, 'BANDAI', 'Tekken 5', '', 2005, '299', 'images/tekken5.jpg'),
(33, 'Paradox', 'Cities Skylines', '', 2015, '749', 'images/citiesskylines.jpg'),
(34, 'Rockstar Games ', 'Midnight Club 3: DUB Edition ', '', 2005, '349', 'images/mnc.jpg '),
(35, 'Xbox Game Studios', 'Halo 4', '', 2012, '789', 'images/halo4.jpg'),
(36, 'Rockstar Games ', 'Grand Theft Auto V ', 'Grand Theft Auto V is an action-adventure game played from either a third-person or first-person perspective. Players complete missionsâ€”linear scenarios with set objectivesâ€”to progress through the story. Outside of the missions, players may freely roam the open world.', 2013, '939', 'images/gtav.jpg '),
(41, 'Activision', 'Sekiro: Shadows Die Twice', 'Game of the Year - The Game Awards 2019, Best Action Game of 2019 - IGN. Carve your own clever path to vengeance in the award winning adventure from developer FromSoftware, creators of Bloodborne and the Dark Souls series. Take Revenge. Restore Your Honor. Kill Ingeniously.', 2019, '2799', 'images/sekiro.jpg'),
(42, 'Nelson Sexton', 'Unturned', 'Unturned is an epic zombie open-world survival game to play with your friends.', 2013, '199', 'images/unturned.jpg'),
(44, 'Valve Software', 'Half-Life: Alyx', 'After decades of waiting, there is another Half-Life. Still, Valve cannot count to three.', 2020, '2499', 'images/alyx.png'),
(45, 'Studio MDHR', 'Cuphead', 'Cuphead is a classic run and gun action game heavily focused on boss battles. Inspired by cartoons of the 1930s, the visuals and audio are painstakingly created with the same techniques of the era, i.e. traditional hand drawn cel animation, watercolor backgrounds, and original jazz recordings.', 2017, '599', 'images/cuphead.jpg'),
(46, 'TinyBuild Games', 'Secret Neighbor', 'A group of players sneak into their creepy Neighbor\'s basement. One of them is a Neighbor in disguise. Welcome to Secret Neighbor.', 2018, '650', 'images/secretneighbor.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gameorder`
--

CREATE TABLE `gameorder` (
  `OrderID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `DateOrdered` date NOT NULL,
  `Total` decimal(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gameorder`
--

INSERT INTO `gameorder` (`OrderID`, `UserID`, `Username`, `DateOrdered`, `Total`) VALUES
(83, 27, 'CommodoreManzaza', '2020-03-12', '4857'),
(84, 28, 'admin', '2020-03-12', '550'),
(85, 28, 'admin', '2020-03-12', '3357'),
(86, 27, 'CommodoreManzaza', '2020-03-12', '1987'),
(87, 27, 'CommodoreManzaza', '2020-03-13', '999'),
(88, 27, 'CommodoreManzaza', '2020-03-13', '2498');

-- --------------------------------------------------------

--
-- Table structure for table `specific_order`
--

CREATE TABLE `specific_order` (
  `OrderID` int(11) NOT NULL,
  `gameID` int(11) NOT NULL,
  `gametitle` varchar(255) NOT NULL,
  `gameprice` decimal(11,0) NOT NULL,
  `qty` int(11) NOT NULL,
  `datepurchased` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specific_order`
--

INSERT INTO `specific_order` (`OrderID`, `gameID`, `gametitle`, `gameprice`, `qty`, `datepurchased`) VALUES
(83, 1, 'Team Fortress 2       ', '759', 1, '2020-03-12'),
(83, 33, 'Cities Skylines', '749', 1, '2020-03-12'),
(83, 41, 'Sekiro: Shadows Die Twice', '2799', 1, '2020-03-12'),
(83, 1, 'Team Fortress 2       ', '759', 1, '2020-03-12'),
(83, 33, 'Cities Skylines', '749', 1, '2020-03-12'),
(83, 41, 'Sekiro: Shadows Die Twice', '2799', 1, '2020-03-12'),
(85, 1, 'Team Fortress 2       ', '759', 1, '2020-03-12'),
(85, 8, 'Mount and Blade: Warband  ', '449', 1, '2020-03-12'),
(85, 13, 'The Witcher 3: Wild Hunt ', '1299', 1, '2020-03-12'),
(85, 28, 'Killzone ', '850', 1, '2020-03-12'),
(85, 1, 'Team Fortress 2       ', '759', 1, '2020-03-12'),
(85, 8, 'Mount and Blade: Warband  ', '449', 1, '2020-03-12'),
(85, 13, 'The Witcher 3: Wild Hunt ', '1299', 1, '2020-03-12'),
(85, 28, 'Killzone ', '850', 1, '2020-03-12'),
(86, 25, 'Civilization VI', '999', 1, '2020-03-12'),
(86, 35, 'Halo 4', '789', 1, '2020-03-12'),
(86, 42, 'Unturned', '199', 1, '2020-03-12'),
(86, 25, 'Civilization VI', '999', 1, '2020-03-12'),
(86, 35, 'Halo 4', '789', 1, '2020-03-12'),
(86, 42, 'Unturned', '199', 1, '2020-03-12'),
(87, 8, 'Mount and Blade: Warband  ', '449', 1, '2020-03-13'),
(87, 8, 'Mount and Blade: Warband  ', '449', 1, '2020-03-13'),
(88, 1, 'Team Fortress 2       ', '759', 1, '2020-03-13'),
(88, 8, 'Mount and Blade: Warband  ', '449', 1, '2020-03-13'),
(88, 31, 'Planet Zoo', '1290', 1, '2020-03-13'),
(88, 1, 'Team Fortress 2       ', '759', 1, '2020-03-13'),
(88, 8, 'Mount and Blade: Warband  ', '449', 1, '2020-03-13'),
(88, 31, 'Planet Zoo', '1290', 1, '2020-03-13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `username`, `email`, `password`) VALUES
(1, 'ElonMuskStan', 'herosmashpwner133@gmail.com', '202cb962ac59075b964b07152d234b70'),
(5, 'JeonHeejinStan', 'heejinjeon@loonatheworld.com', '202cb962ac59075b964b07152d234b70'),
(6, 'PootisTheDispentry', 'dispenser@dispenser.com.tf', '726fa91985171222cd5b7e9df4d7c842'),
(9, 'BTSONOUTNOW', 'herohero@hero.com', 'a8ae104615cb4e966ddb435f3e575a02'),
(10, 'FancyYOUU', 'twicestan4life4eva@jypent.com', 'b59c67bf196a4758191e42f76670ceba'),
(11, 'MinYoongi', 'minyoongitheproducer@bighit.com', '259bcd65560700d478074da9b5050b49'),
(12, 'JiminPark', 'jimin1337@gmail.com', 'efab407dc57d1872946a14c10f1ecd47'),
(14, 'KimNamjooner', 'koalaman@bighit.com', 'e963bcd16beb570e59a07d68fd784d4c'),
(15, 'BringThePain', 'btsseu@gmail.com', 'b59d0ee14273e65fb53224f8b3d9aeb0'),
(21, 'JohnTravolt', 'what@gmail.com', '202cb962ac59075b964b07152d234b70'),
(26, 'HyunjinPandesalLover', 'hehe@steam.com', '202cb962ac59075b964b07152d234b70'),
(27, 'CommodoreManzaza', 'commodoremanzaza@pootis.com', '726fa91985171222cd5b7e9df4d7c842'),
(28, 'admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3'),
(29, 'jcboy911', 'jcbajao@yahoo.com', '202cb962ac59075b964b07152d234b70'),
(30, 'ralph', 'ralph@gmail.com', '25f9e794323b453885f5181f1b624d0b'),
(34, 'Commodore_Manzaza', 'pootisness@pootis.com', '726fa91985171222cd5b7e9df4d7c842'),
(35, 'user', 'twicebest@gg.com', 'ee11cbb19052e40b07aac0ca060c23ee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `developer`
--
ALTER TABLE `developer`
  ADD PRIMARY KEY (`developerid`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`gameID`);

--
-- Indexes for table `gameorder`
--
ALTER TABLE `gameorder`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `developer`
--
ALTER TABLE `developer`
  MODIFY `developerid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `gameID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `gameorder`
--
ALTER TABLE `gameorder`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
