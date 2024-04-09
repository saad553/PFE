-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2024 at 01:10 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projet`
--

-- --------------------------------------------------------

--
-- Table structure for table `cours`
--

CREATE TABLE `cours` (
  `id_cours` int(10) NOT NULL,
  `Titre` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enseignant`
--

CREATE TABLE `enseignant` (
  `id_Ens` int(11) NOT NULL,
  `Nom` varchar(10) NOT NULL,
  `Prenom` varchar(10) NOT NULL,
  `Domaine` varchar(10) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Mot_de_passe` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `enseignant`
--

INSERT INTO `enseignant` (`id_Ens`, `Nom`, `Prenom`, `Domaine`, `Email`, `Mot_de_passe`) VALUES
(1, 'El Bouzidi', 'Abdelilah', 'Java', 'abdelilahelbouzidi@e', 'P@ssw0rd1'),
(3, 'Zerouali', 'Fatima', 'Python', 'fatimazerouali@examp', 'P@ssw0rd2'),
(4, 'Laaribi', 'Mohammed', 'SQL', 'mohammedlaaribi@exam', 'P@ssw0rd3'),
(5, 'Essalhi', 'Nadia', 'JavaScript', 'nadiaessalhi@example', 'P@ssw0rd4'),
(6, 'El Mansour', 'Rachid', 'C++', 'rachidelmansouri@exa', 'P@ssw0rd5');

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

CREATE TABLE `etudiant` (
  `id_Etudiant` int(11) NOT NULL,
  `Nom` varchar(10) NOT NULL,
  `Prenom` varchar(10) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Mot_de_passe` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `etudiant`
--

INSERT INTO `etudiant` (`id_Etudiant`, `Nom`, `Prenom`, `Email`, `Mot_de_passe`) VALUES
(50, 'El Aoufir', 'Younes', 'youneselaoufir@examp', 'P@ssw0rd1'),
(51, 'Bouchraoui', 'Fatima', 'fatimabouchraoui@exa', 'P@ssw0rd2'),
(52, 'El Ouardig', 'Mohammed', 'mohammedelouardighi@', 'P@ssw0rd3'),
(53, 'Ben Amar', 'Nadia', 'nadiabenamar@example', 'P@ssw0rd4'),
(54, 'Chahid', 'Rachid', 'rachidchahid@example', 'P@ssw0rd5'),
(55, 'El Kharraz', 'Hafsa', 'hafsaelkharraz@examp', 'P@ssw0rd6'),
(56, 'Belhaj', 'Mehdi', 'mehdibelhaj@example.', 'P@ssw0rd7'),
(57, 'El Kettani', 'Amina', 'aminaelkettani@examp', 'P@ssw0rd8'),
(58, 'Lamrani', 'Karim', 'karimlamrani@example', 'P@ssw0rd9'),
(59, 'El Ghazi', 'Sara', 'saraelghazi@example.', 'P@ssw0rd10'),
(60, 'Benjelloun', 'Ahmed', 'ahmedbenjelloun@exam', 'P@ssw0rd11'),
(61, 'El Alaoui', 'Houda', 'houdaelalaoui@exampl', 'P@ssw0rd12'),
(62, 'Benslimane', 'Brahim', 'brahimbenslimane@exa', 'P@ssw0rd13'),
(63, 'El Moutawa', 'Loubna', 'loubnaelmoutawakil@e', 'P@ssw0rd14'),
(64, 'Benabdella', 'Abdelali', 'abdelalibenabdellah@', 'P@ssw0rd15'),
(65, 'El Fakir', 'Samira', 'samiraelefakir@examp', 'P@ssw0rd16'),
(66, 'Boukhriss', 'Omar', 'omarboukhriss@exampl', 'P@ssw0rd17'),
(67, 'El Hajoui', 'Khadija', 'khadijaelhajoui@exam', 'P@ssw0rd18'),
(68, 'Benmoussa', 'Mustapha', 'mustaphabenmoussa@ex', 'P@ssw0rd19'),
(69, 'El Mansour', 'Nawal', 'nawalelmansouri@exam', 'P@ssw0rd20');

-- --------------------------------------------------------

--
-- Table structure for table `exercice`
--

CREATE TABLE `exercice` (
  `id` int(10) NOT NULL,
  `idlesson` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id_lesson` int(10) NOT NULL,
  `Titre` varchar(10) NOT NULL,
  `video_path` varchar(100) NOT NULL,
  `idcourse` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id_lesson`, `Titre`, `video_path`, `idcourse`) VALUES
(2, 'Javascript', 'uploads/yt1s.com - Parkour Bridge  Minecraft Free to Use Gameplay  TiktokShorts Format.mp4', NULL),
(3, 'Javascript', 'uploads/yt1s.com - Minecraft Jump and Run Gameplay TIKTOK Format  60fps 1440p HD  No Ads No Credits ', NULL),
(4, 'javascript', 'uploads/yt1s.com - Parkour Bridge  Minecraft Free to Use Gameplay  TiktokShorts Format.mp4', NULL),
(5, 'Javascript', 'uploads/yt1s.com - Parkour Bridge  Minecraft Free to Use Gameplay  TiktokShorts Format.mp4', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id_cours`);

--
-- Indexes for table `enseignant`
--
ALTER TABLE `enseignant`
  ADD PRIMARY KEY (`id_Ens`);

--
-- Indexes for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id_Etudiant`);

--
-- Indexes for table `exercice`
--
ALTER TABLE `exercice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idlesson` (`idlesson`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id_lesson`),
  ADD KEY `idcourse` (`idcourse`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cours`
--
ALTER TABLE `cours`
  MODIFY `id_cours` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enseignant`
--
ALTER TABLE `enseignant`
  MODIFY `id_Ens` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id_Etudiant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id_lesson` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exercice`
--
ALTER TABLE `exercice`
  ADD CONSTRAINT `exercice_ibfk_1` FOREIGN KEY (`idlesson`) REFERENCES `video` (`id_lesson`);

--
-- Constraints for table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `video_ibfk_1` FOREIGN KEY (`idcourse`) REFERENCES `cours` (`id_cours`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
