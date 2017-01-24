-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2016 at 10:02 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `opdracht-security-login`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `hashed_password` varchar(255) NOT NULL,
  `last_login_time` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `salt`, `hashed_password`, `last_login_time`) VALUES
(1, 'joske@hotmail.com', '100596927456968a42a05b87.44894803', 'e04649f06efd2241d77b2b14f4259193889be5547cf5c448bdd239d3a117465c6ccebe25f376edcbe221fdfff3e2cc886f51eddbd499ed7e190a61cac72b09cc', '2016-01-13'),
(2, 'fientje@hotmail.com', '96027576256968bd5c2cbb5.46958107', '8fc29372af93707cde20d790011ca0779ad7399b505b7fbbe9b9aafd8e95c81ef7970e8d92c7c58f979177ec1ba3678bf19e5d028764153d827b9cbf948b8fa9', '2016-01-13'),
(3, 'freddy@melcully.com', '1619573255585a82328d7739.13447647', '7718a475a58c4615aa71e469ba2dc935102d0241eece875175a4226f0bbdb6a07c7ec218b564270b1b19c0e9cce040adc1c084c1ccf8aa4cf60f666d58f349e1', '2016-12-21'),
(4, 'nieuwmail@hotmail.com', '1874064249585a8456e4eb34.74250776', 'a8139212ca9957b6d022c434b64d0cf6569748af2d8bc5795a170c16a90a3198f65f9515926c1ce11fc39120feda8f7054c2e81a9e308100a9ade7d51822766f', '2016-12-21'),
(5, 'fluffy@unicorn.com', '567203124586411bedd6682.53155578', '4f773cf436538ac14aad12127fa60b1d2e5cce5c4254d1285d93ed1168da237cf3812102d7018954748c4020336349c9373c0265102c61aa9381ea41456e40fe', '2016-12-28'),
(6, 'fluffy@unicorn.be', '7852141945864137a932d34.14932463', 'e7c13dcd6ca6d55419f2289cc55d9b0d997aa4712628861495e466f11d52cf4225d41802b4b21633182455e641023510ca8bc2a8db21b44a972f9e28a626d3bd', '2016-12-28'),
(7, 'lizzy@unicorn.be', '640248016586427556e5dd1.49058299', 'b5cac8252fbcce648b45a670364efa4cda41ba6c6fbef681ae6d69b4744126808d4cb608692b9e9dfc5fe1753f2bc1b4556e56a1570dee266246b5543086f8dc', '2016-12-28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
