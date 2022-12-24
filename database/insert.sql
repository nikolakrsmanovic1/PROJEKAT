INSERT INTO `ekipe` (`ime_ekipe`, `grad`, `trener`, `registracioni_broj`, `lozinka`) VALUES
('Warriors', 'Kraljevo', 'Nikola Krsmanovic', 12345, 'warrior'),
('Pacers', 'Subotica', 'Predrag Babic', 33444, 'raptor'),
('Raptors', 'Kragujevac', 'Ognjen Kukalj', 34215, 'raptor'),
('Nuggets', 'Novi Sad', 'Milosav Zivkovic', 54321, 'nugget');
-- --------------------------------------------------------
INSERT INTO `komentari` (`opis`, `imeKreatora`, `utakmica_id`, `datum`) VALUES
('Utakmica je bila dobra.', 'Predrag Babic', 3, '2022-12-23 16:16:29'),
('Losa utakmica', 'Ognjen Kukalj', 3, '2022-12-23 16:17:10'),
('asdads', 'Ognjen Kukalj', 8, '2022-12-23 16:29:20'),
('asdasdasd', 'Ognjen Kukalj', 15, '2022-12-23 16:40:57'),
('sadas', 'Ognjen Kukalj', 15, '2022-12-23 16:40:59');

-- --------------------------------------------------------
INSERT INTO `utakmice` (`id`, `domacin`, `gost`, `datum`) VALUES
(1, 'Warriors', 'Pacers', '2022-12-13'),
(3, 'Pacers', 'Nuggets', '2022-12-22'),
(4, 'Warriors', 'Nuggets', '2022-12-14'),
(6, 'Raptors', 'Nuggets', '2022-12-21'),
(8, 'Pacers', 'Nuggets', '2022-12-28'),
(9, 'Raptors', 'Nuggets', '2022-12-04'),
(10, 'Warriors', 'Nuggets', '2022-12-04'),
(11, 'Raptors', 'Nuggets', '2022-12-06'),
(12, 'Pacers', 'Raptors', '2022-12-29'),
(13, 'Pacers', 'Raptors', '2022-12-29'),
(14, 'Pacers', 'Raptors', '2022-12-24'),
(15, 'Pacers', 'Raptors', '2022-12-24');