-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 14 sep. 2022 à 04:38
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `azerty`
--

-- --------------------------------------------------------

--
-- Structure de la table `continents`
--

DROP TABLE IF EXISTS `continents`;
CREATE TABLE IF NOT EXISTS `continents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idContinent` varchar(10) NOT NULL,
  `nom` varchar(10) NOT NULL,
  `photoPath` varchar(50) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `continents`
--

INSERT INTO `continents` (`id`, `idContinent`, `nom`, `photoPath`, `description`) VALUES
(1, 'ab5b2e2f7a', 'Afrique', '../medias/continents/Afrique/Irlande.jpg', 'uygdqsuhdgqsjhdgsqjhdgqsdhqsdjqshdqsiuopoiqsudiusqjghqsjhqsh'),
(2, '534e992dd7', 'Europe', '../medias/continents/Europe/Royaume-Uni.jpg', 'shfsdkjfhskfjhsdkzrçzurtzyequdsiopxclkjnbx,'),
(3, '5d1d322928', 'Asie', '../medias/continents/Asie/Pays.jpg', 'fkjsdhfsfskjlfnsfs'),
(4, '3c3d839b3d', 'Amerique', '../medias/continents/Amerique/Balt.jpg', 'kjfjqdjls');

-- --------------------------------------------------------

--
-- Structure de la table `destinations`
--

DROP TABLE IF EXISTS `destinations`;
CREATE TABLE IF NOT EXISTS `destinations` (
  `idSite` varchar(10) NOT NULL,
  `idUser` varchar(10) NOT NULL,
  `continent` varchar(20) NOT NULL,
  `pays` varchar(20) NOT NULL,
  `coordonnees` varchar(50) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`idSite`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `destinations`
--

INSERT INTO `destinations` (`idSite`, `idUser`, `continent`, `pays`, `coordonnees`, `nom`, `description`) VALUES
('39073d38e4', 'd272da8fd1', 'ab5b2e2f7a', 'Congo', 'zertyuiojkop', 'zongo', 'sdfghjklmùqdsmwfyuiop^$eaz yuiop dsqdgsqdjqsodmjsqkdjqdo fqsifbs eoazurzeiudqkjx dqsudgsqdnsqdsqkjdgsqjfhds sqfnksqdbfqsdjgfqslkjfhoifazeiazefkjbqjqdhqsjdqsmlfq fqifgqkfzepofeziru qsihgdqsidsqopjezoif fsjifgsqfoijf qqsuidqsdqsjdqs djqsbkqsjdqskjdhazfizefrug '),
('b13473348e', 'd272da8fd1', 'ab5b2e2f7a', 'Congo', 'fghjsq', 'kinshasa', 'sdfghjklm'),
('e18067e024', 'd272da8fd1', 'ab5b2e2f7a', 'Congo', 'ghjklmù', 'kamina', 'fdsjfqsdjqshlkqsjdqs fsdkjfbsfs\r\nsdgfjdsgfsd\r\nfdsgfsjdhfsd\r\n\r\n\r\n\r\nsdfksdgfuzefeziufyzefs'),
('099ae71b52', 'd272da8fd1', 'ab5b2e2f7a', 'congo', '', 'cilu', 'a'),
('547885af99', 'd272da8fd1', 'ab5b2e2f7a', 'congo', '', 'mbuela', 'abcde'),
('637dacbf90', 'd272da8fd1', '3c3d839b3d', 'canada', '', 'niagara', 'azerty'),
('6a0a1c412b', 'd272da8fd1', '534e992dd7', 'france', '', 'louvre', 'sdfghjklm'),
('d03ecc4f65', '621804be28', '5d1d322928', 'china', '', 'wuhan', 'La beautÃ© de la chine'),
('39202eb6ae', '621804be28', '534e992dd7', 'angleterre', '', 'zenon', 'zenon'),
('52c5520014', '621804be28', '3c3d839b3d', 'mexique', '', 'guata', 'swae lee'),
('b603ec2224', '621804be28', '5d1d322928', 'china', '', 'japon', 'japon hjfqjsdghsjlkq'),
('979ad8ff85', 'ea2b97679e', '534e992dd7', 'serbie', '', 'canka', 'azerty');

-- --------------------------------------------------------

--
-- Structure de la table `medias`
--

DROP TABLE IF EXISTS `medias`;
CREATE TABLE IF NOT EXISTS `medias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idSite` varchar(10) NOT NULL,
  `path` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `medias`
--

INSERT INTO `medias` (`id`, `idSite`, `path`) VALUES
(1, '39073d38e4', '../medias/sites/39073d38e4/zongo.jpg'),
(18, '099ae71b52', '../medias\\sites\\099ae71b52\\4f517781abe620e49cfd050aeb3694cd42711b24-1.png'),
(6, 'b13473348e', '../medias/sites/b13473348e/Kin.jpg'),
(8, '39073d38e4', '../medias/sites/39073d38e4/kin-oasis.jpg'),
(9, 'b13473348e', '../medias/sites/b13473348e/kinshasacap.jpg'),
(12, 'e18067e024', '../medias/sites/e18067e024/mbu.jpg'),
(19, '547885af99', '../medias\\sites\\547885af99\\954361a1ea53d4394e20004be0363ab0.jpg'),
(20, '637dacbf90', '../medias\\sites\\637dacbf90\\Godafoss-Waterfall-1024x975.jpg'),
(21, '6a0a1c412b', '../medias\\sites\\6a0a1c412b\\Isle-of-Skye-847x1024.jpg'),
(22, 'd03ecc4f65', '../medias\\sites\\d03ecc4f65\\chateau1.jpg'),
(23, '39202eb6ae', '../medias\\sites\\39202eb6ae\\Person-at-Big-Ben-847x1024.jpg'),
(24, '52c5520014', '../medias\\sites\\52c5520014\\Winding-road-1015x1024.jpg'),
(25, 'b603ec2224', '../medias\\sites\\b603ec2224\\chateau1.jpg'),
(26, '979ad8ff85', '../medias\\sites\\979ad8ff85\\Belfast-City.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `email` varchar(100) NOT NULL,
  `idUser` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `statut` int(11) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`email`, `idUser`, `password`, `nom`, `prenom`, `statut`) VALUES
('jonathankukwabantu120302@gmail.com', 'd272da8fd1', '8cb2237d0679ca88db6464eac60da96345513964', 'Kukwabantu', 'Jonathan', 1),
('jonathankukwabantu12030@gmail.com', '42fe33ea41', '8cb2237d0679ca88db6464eac60da96345513964', 'Backelants', 'Joseph', 1),
('jonathankukwabantu1203@gmail.com', 'e2fcfcd348', '8cb2237d0679ca88db6464eac60da96345513964', 'Kasenda', 'Jean', 1),
('jonathankukwabantu12032@gmail.com', 'bd93598ebe', '30136e5392ab5ab089818235ee1552a8fcb172c6', 'Andedi', 'Joel', 1),
('dev@gmail.com', 'a365e97d1a', 'b6589fc6ab0dc82cf12099d1c2d40ab994e8410c', 'mbala', 'dev', 1),
('hans@gmail.com', '35e7dc6081', '9cf95dacd226dcf43da376cdb6cbba7035218921', 'Hybani', 'Hans', 1),
('ot@gmail.com', '37afec6ccd', 'b56495d500f9e5388a3efe5f65ee2361e8ed2238', 'Otema', 'Elie', 1),
('bene@gmail.com', 'aa430d26a1', '63274db57b18124674b845180931dcb653b831b5', 'Manzombi', 'BÃ©nÃ©dicte', 1),
('trump@gmail.com', '621804be28', '39dfa55283318d31afe5a3ff4a0e3253e2045e43', 'trump', 'donald', 1),
('brk@gmail.com', 'ea2b97679e', '39dfa55283318d31afe5a3ff4a0e3253e2045e43', 'Baraka', 'Flo', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
