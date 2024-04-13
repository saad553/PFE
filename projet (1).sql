-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2024 at 04:00 PM
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
-- Table structure for table `commentaire`
--

CREATE TABLE `commentaire` (
  `Id_Commentaire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cours`
--

CREATE TABLE `cours` (
  `Id_Cours` int(11) NOT NULL,
  `Titre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enseignant`
--

CREATE TABLE `enseignant` (
  `Id_Enseignant` int(11) NOT NULL,
  `Nom` varchar(255) DEFAULT NULL,
  `Prenom` varchar(255) DEFAULT NULL,
  `Domaine` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Mot_de_Passe` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enseignant`
--

INSERT INTO `enseignant` (`Id_Enseignant`, `Nom`, `Prenom`, `Domaine`, `Email`, `Mot_de_Passe`) VALUES
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
  `Id_Etudiant` int(11) NOT NULL,
  `Nom` varchar(255) DEFAULT NULL,
  `Prenom` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Mot_de_Passe` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `etudiant`
--

INSERT INTO `etudiant` (`Id_Etudiant`, `Nom`, `Prenom`, `Email`, `Mot_de_Passe`) VALUES
(50, 'El Aouuuuufir', 'Younes', 'youneselaoufir@examp', 'P@ssw0rd1'),
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
  `Id_Exercice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leçon`
--

CREATE TABLE `leçon` (
  `Id_leçon` int(11) NOT NULL,
  `Titre` varchar(255) DEFAULT NULL,
  `source_video` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `Id_Note` int(11) NOT NULL,
  `valeur` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `Id_Question` int(11) NOT NULL,
  `Reponse` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`Id_Commentaire`);

--
-- Indexes for table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`Id_Cours`);

--
-- Indexes for table `enseignant`
--
ALTER TABLE `enseignant`
  ADD PRIMARY KEY (`Id_Enseignant`);

--
-- Indexes for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`Id_Etudiant`);

--
-- Indexes for table `exercice`
--
ALTER TABLE `exercice`
  ADD PRIMARY KEY (`Id_Exercice`);

--
-- Indexes for table `leçon`
--
ALTER TABLE `leçon`
  ADD PRIMARY KEY (`Id_leçon`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`Id_Note`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`Id_Question`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `Id_Commentaire` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cours`
--
ALTER TABLE `cours`
  MODIFY `Id_Cours` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enseignant`
--
ALTER TABLE `enseignant`
  MODIFY `Id_Enseignant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `Id_Etudiant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `exercice`
--
ALTER TABLE `exercice`
  MODIFY `Id_Exercice` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leçon`
--
ALTER TABLE `leçon`
  MODIFY `Id_leçon` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `Id_Note` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `Id_Question` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
