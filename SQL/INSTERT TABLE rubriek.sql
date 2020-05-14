--------------------------------------
--INSERT QUERY FOR EENMAALANDERMAAL --
--TABLE RUBRIEK                     --
--VERSION: 1.2                      --
--04-MAY-2020                       --
--IPROJECT GROEP 18                 -- 
--HIGHEST ID: 129                   --
--------------------------------------
--VERSIONS:                         --
--V1.0, BUILD QUERY                 --
--V1.1, FIXED NAMES AND ID PROBLEMS --
--V1.2, FIXED NAMES AND REMOVED     --
--      'SUB SUB SUB BUT'           --
--      INCOPERATED IT IN TO        --
--      'SUB SUB' WITH '|'          --
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
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(101, 'Opladers', 4, 4) --Dit id is omdat het zinloos en tijd verspillend is om alle andere records aan te passen zodat deze 'id' werkt

-- Audio, Tv en Foto -- Audio
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(19, 'Bandrecorders', 5, 1)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(20, 'Buizenversterkers', 5, 2)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(21, 'Cassettedecks', 5, 3)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(22, 'Luidsprekers', 5, 4)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(23, 'Platenspelers', 5, 5)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(24, 'Radio''s', 5, 6)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(25, 'Stereo-sets', 5, 7)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(26, 'Versterkers en Receivers', 5, 8)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(27, 'Mp3-spelers | Ipod', 5, 9)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(102, 'Mp3-spelers | Overige', 5, 10)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(28, 'Mp3-accessoires | Ipod', 5, 11)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(103, 'Mp3-accessoires | Over', 5, 12)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(29, 'Mp4-spelers', 5, 13)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(30, 'Walkmans en Discmans', 5, 14)

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
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(40, 'Tv''s | Plasma, Lcd, Led', 6, 10)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(104, 'Tv''s | Overige Tv''s', 6, 11)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(105, 'Tv''s | Accessoires', 6, 12)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(41, 'Videobewakingsapparatuur', 6, 13)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(42, 'Videocamera''s | Analoog', 6, 14)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(106, 'Videocamera''s | Digitaal', 6, 15)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(43, 'Videospelers', 6, 16)

--Audio, Tv en Foto	-- Fotografie
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(44, 'Accu''s en Batterijen', 7, 1)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(45, 'Camera''s | Analoog', 7, 2)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(107, 'Camera''s | Digitaal', 7, 3)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(46, 'Diaprojectors', 7, 4)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(47, 'Digitale fotolijstjes', 7, 5)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(48, 'Doka Toebehoren', 7, 6)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(49, 'Filters', 7, 7)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(50, 'Flitsers', 7, 8)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(51, 'Fotolijsten', 7, 9)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(52, 'Fotoprinters', 7, 10)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(53, 'Fotostudio en Toebehoren', 7, 11)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(54, 'Fototassen', 7, 12)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(55, 'Lenzen en Objectieven', 7, 13)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(56, 'Onderwatercamera''s', 7, 14)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(57, 'Professionele apparatuur', 7, 15)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(58, 'Statieven en Balhoofden', 7, 16)

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
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(66, 'Geschiedenis | Regio', 10, 1)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(108, 'Geschiedenis | Vaderland', 10, 2)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(109, 'Geschiedenis | Wereld', 10, 3)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(67, 'Historische romans', 10, 4)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(68, 'Oorlog en Militair', 10, 5)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(69, 'Politiek en Maatschappij', 10, 6)

--Boeken -- Kind en Jeugd
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(70, 'Baby''s en Peuters', 11, 1)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(71, 'Kleuters', 11, 2)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(72, 'Jeugd | Onder 10 jaar', 11, 3)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(110, 'Jeugd | 10 tot 12 jaar', 11, 4)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(111, 'Jeugd | 13 jaar en ouder', 11, 5)

--Boeken -- Kunst en Cultuur
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(73, 'Film, Tv en Media', 12, 1)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(74, 'Architectuur', 12, 2)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(75, 'Beeldend', 12, 3)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(76, 'Dans en Theater', 12, 4)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(77, 'Fotografie en Design', 12, 5)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(78, 'Muziek', 12, 6)

--Computers en Software -- Randapparatuur
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(119, 'Cd Spelers en Branders', 13, 1) --Dit id is omdat het zinloos en tijd verspillend is om alle andere records aan te passen zodat deze 'id' werkt
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(79, 'Modems, ISDN, Faxen', 13, 2)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(80, 'Monitoren', 13, 3)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(81, 'Muizen en Joysticks', 13, 4)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(82, 'Noodvoedingen (UPS)', 13, 5)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(83, 'Printers | printers', 13, 6)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(112, 'Printers | 3d-printer', 13, 7)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(84, 'Printerbenodigdheden', 13, 8)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(85, 'Scanners', 13, 9)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(86, 'Toetsenborden', 13, 10)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(87, 'Webcams', 13, 11)

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
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(98, 'Tablets | Apple iPad', 15, 2)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(113, 'Tablets | A. iPad Mini', 15, 3)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(114, 'Tablets | Samsung', 15, 4)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(115, 'Tablets | Overige merken', 15, 5)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(99, 'E-Readers', 15, 6)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(100, 'Hoezen | Apple iPad', 15, 7)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(116, 'Hoezen | Apple iPad Mini', 15, 8)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(117, 'Hoezen | Samsung tablets', 15, 9)
INSERT INTO rubriek(rubrieknummer, rubrieknaam, rubriek, volgnr) VALUES(118, 'Hoezen | Overige tablets', 15, 10)

