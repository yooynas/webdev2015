CREATE TABLE `students` (
`id_student` int(20) NOT NULL,
  `firstname_student` varchar(50) CHARACTER SET latin1 NOT NULL,
  `nickname_student` varchar(50) CHARACTER SET latin1 NOT NULL,
  `lastname_student` varchar(50) CHARACTER SET latin1 NOT NULL,
  `email_student` varchar(100) CHARACTER SET latin1 NOT NULL,
  `pass_student` varchar(255) COLLATE utf8_bin NOT NULL,
  `activationkey_student` varchar(50) COLLATE utf8_bin NOT NULL,
  `first_login_student` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id_student`, `firstname_student`, `nickname_student`, `lastname_student`, `email_student`, `pass_student`, `activationkey_student`, `first_login_student`) VALUES
(1, 'Julien', '', 'Houyet', 'julien.houyet@gmail.com', 'CisJUn6rUC9gXKbopmmFuEduRR0lXRACXT7y0t906ReAgLi1g+PF0r+sBqS4wwUW7jANp6HXyQsuPxS2yB1zSQ==', '', '0000-00-00'),
(2, 'Kevin', 'rouskof', 'Lessire', 'kevin.lessire@gmail.com', '', 'lol', '0000-00-00'),
(3, 'Laetitia', 'mil0o', 'Daubechies', 'mil0o@hotmail.com', '', 'lol', '0000-00-00'),
(4, 'Quentin', 'Quent', 'Michot', 'michot.quentin@hotmail.com', '', 'lol', '2015-03-04'),
(5, 'Damien', 'damslesbraslong', 'Geniesse', 'geniessed@gmail.com', '', 'lol', '2015-03-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
 ADD PRIMARY KEY (`id_student`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
MODIFY `id_student` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;