
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `messagebox`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `db_id` int(50) NOT NULL AUTO_INCREMENT COMMENT 'Database ID',
  `SID` varchar(100) NOT NULL COMMENT 'Twilio SID',
  `timestamp` varchar(50) NOT NULL COMMENT 'PHP Time',
  `sender_number` varchar(50) NOT NULL,
  `receiving_number` varchar(50) NOT NULL,
  `body` varchar(100) NOT NULL,
  `direction` varchar(50) NOT NULL,
  `threaded_id` int(50) NOT NULL,
  PRIMARY KEY (`db_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
