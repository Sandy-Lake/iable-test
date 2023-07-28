--
-- Database: `iable`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--
CREATE TABLE IF NOT EXISTS `courses` (
    `id` int NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `instructor` VARCHAR(255) NOT NULL,
    `description` TEXT NOT NULL,
    `credits` TEXT NOT NULL,
    PRIMARY KEY (`id`)
    )ENGINE=InnoDB  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `courses` (`id`, `name`, `instructor`, `description`, `credits`) VALUES
(1, 'Bottle Refusal', 'Maya Kim MD', 'How to help mom with bottle refusal', '["lcerp=1.0,nursing=1.0,cpeu=1.0","lcerp=1.0,nursing=1.0,cpeu=1.0"]'),
(2, 'Slow Weight Gain', 'Sato Tanaka MD, NABBLM', 'Detection/Treatment of Slow Weight Gain', '["lcerp=1.0,nursing=1.0,cpeu=1.0"]'),
(3, 'Mastitis', 'Sofia Hernandez MD, FABM', 'Discusson of the Latest ABM Protocol', '["lcerp=1.5"]'),
(4, 'Hyperbilirubinemia', 'Sarah Williams MD', 'Read an article on the topic of hyperbilirubinemia', '["lcerp=2.0","lcerp=1.0,cpeu=1.0"]'),
(5, 'Breastfeeding an Infant or Child with Type 1 Diabetes', 'Leila Amari MD', 'Read a peer-reviewed journal article on the topic of breastfeeding a child with type 1 diabetes', '["cme=1.5", "cme=2.0,ecerp=1.5"]');