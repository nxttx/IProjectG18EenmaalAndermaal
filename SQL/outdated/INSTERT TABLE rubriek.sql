--------------------------------------
--INSERT QUERY FOR EENMAALANDERMAAL --
--TABLE RUBRIEK                     --
--VERSION: 1.0                      --
--04-MAY-2020                       --
--IPROJECT GROEP 18                 -- 
--HIGHEST ID: 129                   --
--------------------------------------
--VERSIONS:                         --
--V1.0, BUILD QUERY                 --
--V1.1, FIXED NAMES AND ID PROBLEMS --
--------------------------------------

use iproject18
-----------------------------------------------------------------------nr, naam, valt onder rubrieknummer, volgorde nummer--
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(1, 'Audio, Tv en Foto',NULL, 1)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(2, 'Boeken', NULL, 2)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(3, 'Computers en Software', NULL, 3)

--Audio, TV en Foto
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(4, 'Accessoires', 1, 1)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(5, 'Audio', 1, 2)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(6, 'Film, Video en Tv', 1, 3)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(7, 'Fotografie', 1, 4)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(8, 'Optische apparatuur', 1, 5)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(9, 'Overige', 1, 6)

--Boeken
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(10, 'Geschiedenis & Politiek', 2, 1)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(11, 'Kind en Jeugd', 2, 2)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(12, 'Kunst en Cultuur', 2, 3)

--Computers en Software
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(13, 'Randapparatuur', 3, 1)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(14, 'Software', 3, 2)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(15, 'Tablets en E-readers', 3, 3)

-- Audio, Tv en Foto -- Accessoires
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(16, 'Accu''s en Batterijen', 4, 1)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(17, 'Afstandsbedieningen', 4, 2)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(18, 'Kabels', 4, 3)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(128, 'Opladers', 4, 4) --Dit id is omdat het zinloos en tijd verspillend is om alle andere records aan te passen zodat deze 'id' werkt

-- Audio, Tv en Foto -- Audio
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(19, 'Bandrecorders', 5, 1)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(20, 'Buizenversterkers', 5, 2)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(21, 'Cassettedecks', 5, 3)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(22, 'Luidsprekers', 5, 4)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(23, 'Platenspelers', 5, 5)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(24, 'Radio''s', 5, 6)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(25, 'Stereo-sets', 5, 7)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(26, 'Versterkers en Receivers', 5, 8)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(27, 'Mp3-spelers', 5, 9)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(28, 'Mp3-accessoires', 5, 10)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(29, 'Mp4-spelers', 5, 11)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(30, 'Walkmans en Discmans', 5, 12)

-- Audio, Tv en Foto -- Film, Video en Tv
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(31, 'Beamers', 6, 1)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(32, 'Blu-ray-Spelers', 6, 2)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(33, 'Dvd-spelers', 6, 3)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(34, 'Films 8mm, 16mm en 35mm', 6, 4)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(35, 'Harddiskrecorders', 6, 5)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(36, 'Home Cinema-sets', 6, 6)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(37, 'Mediaspelers', 6, 7)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(38, 'Sport- en Actiecamera''s', 6, 8)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(39, 'Tv-decoders & schotels', 6, 9)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(40, 'Tv''s', 6, 10)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(41, 'Videobewakingsapparatuur', 6, 11)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(42, 'Videocamera''s', 6, 12)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(43, 'Videospelers', 6, 13)

--Audio, Tv en Foto	-- Fotografie
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(44, 'Accu''s en Batterijen', 7, 1)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(45, 'Camera''s', 7, 2)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(46, 'Diaprojectors', 7, 3)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(47, 'Digitale fotolijstjes', 7, 4)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(48, 'Doka Toebehoren', 7, 5)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(49, 'Filters', 7, 6)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(50, 'Flitsers', 7, 7)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(51, 'Fotolijsten', 7, 8)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(52, 'Fotoprinters', 7, 9)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(53, 'Fotostudio en Toebehoren', 7, 10)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(54, 'Fototassen', 7, 11)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(55, 'Lenzen en Objectieven', 7, 12)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(56, 'Onderwatercamera''s', 7, 13)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(57, 'Professionele apparatuur', 7, 14)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(58, 'Statieven en Balhoofden', 7, 15)

--Audio, Tv en Foto -- Optische apparatuur
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(59, 'Microscopen', 8, 1)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(60, 'Telescopen', 8, 2)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(61, 'Verrekijkers', 8, 3)
 
--Audio, Tv en Foto	-- Overige
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(62, 'Karaoke-apparatuur', 9, 1)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(63, 'Prof apparatuur', 9, 2)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(64, 'Weerstations', 9, 3)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(65, 'Overige', 9, 4)

--Boeken -- Geschiedenis, Politiek en Historie
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(66, 'Geschiedenis', 10, 1)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(67, 'Historische romans', 10, 2)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(68, 'Oorlog en Militair', 10, 3)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(69, 'Politiek en Maatschappij', 10, 4)

--Boeken -- Kind en Jeugd
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(70, 'Baby''s en Peuters', 11, 1)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(71, 'Kleuters', 11, 2)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(72, 'Jeugd', 11, 3)

--Boeken -- Kunst en Cultuur
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(73, 'Film, Tv en Media', 12, 1)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(74, 'Architectuur', 12, 2)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(75, 'Beeldend', 12, 3)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(76, 'Dans en Theater', 12, 4)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(77, 'Fotografie en Design', 12, 5)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(78, 'Muziek', 12, 6)

--Computers en Software -- Randapparatuur
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(129, 'Cd Spelers en Branders', 13, 1) --Dit id is omdat het zinloos en tijd verspillend is om alle andere records aan te passen zodat deze 'id' werkt
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(79, 'Modems, ISDN, Faxen', 13, 2)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(80, 'Monitoren', 13, 3)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(81, 'Muizen en Joysticks', 13, 4)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(82, 'MuNoodvoedingen (UPS)', 13, 5)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(83, 'Printers', 13, 6)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(84, 'Printerbenodigdheden', 13, 7)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(85, 'Scanners', 13, 8)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(86, 'Toetsenborden', 13, 9)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(87, 'Webcams', 13, 10)

--Computers en Software -- Software
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(88, 'Antivirus en Beveiliging', 14, 1)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(89, 'Apple', 14, 2)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(90, 'Besturingssoftware', 14, 3)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(91, 'Educatie en Cursussen', 14, 4)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(92, 'Grafisch, Foto en Film', 14, 5)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(93, 'Kinderen en Jeugd', 14, 6)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(94, 'Muziek en Audio', 14, 7)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(95, 'Navigatie en Geografie', 14, 8)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(96, 'Overige', 14, 9)

--Computers en Software -- Tablets en E-readers
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(97, 'E-books', 15, 1)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(98, 'Tablets', 15, 2)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(99, 'E-Readers', 15, 3)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(100, 'Hoezen', 15, 4)

--Audio, Tv en Foto	-- Audio -- Mp3-spelers
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(101, 'Ipod', 27, 1)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(102, 'Overige', 27, 2)

-- Audio, Tv en Foto -- Audio -- Mp3-accessoires
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(103, 'Ipod', 28, 1)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(104, 'Overige', 28, 2)

--Audio, Tv en Foto -- Film, Video en Tv -- Tv's
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(105, 'Plasma, Lcd, Led', 40, 1)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(106, 'Overige Tv''s', 40, 2)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(107, 'Accessoires', 40, 3)

--Audio, Tv en Foto -- Film, Video en Tv -- Videocamera's
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(108, 'Analoog', 42, 1)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(109, 'Digitaal', 42, 2)

--Audio, Tv en Foto -- Fotografie -- Camera's
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(110, 'Analoog', 45, 1)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(111, 'Digitaal', 45, 2)

--Boeken -- Geschiedenis, Politiek en Historie -- Geschiedenis
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(112, 'Regio', 66, 1)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(113, 'Vaderland', 66, 2)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(114, 'Wereld', 66, 3)

-- Boeken -- Kind en Jeugd -- Jeugd
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(115, 'Onder 10 jaar', 72, 1)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(116, '10 tot 12 jaar', 72, 2)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(117, '13 jaar en ouder', 72, 3)

--Computers en Software -- Randapparatuur -- Printers
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(118, '3d-printer', 83, 1)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(119, 'Printer', 83, 2)

--Computers en Software -- Tablets en E-readers -- Tablets
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(120, 'Apple iPad', 98, 1)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(121, 'Apple iPad Mini', 98, 2)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(122, 'Samsung', 98, 3)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(123, 'Overige merken', 98, 4)

-- Computers en Software -- Tablets en E-readers -- Hoezen
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(124, 'Apple iPad', 100, 1)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(125, 'Apple iPad Mini', 100, 2)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(126, 'Samsung', 100, 3)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(127, 'Overige merken', 100, 4)