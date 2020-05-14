-------------------------------------	
--INSERT QUERY FOR EENMAALANDERMAAL --
--TABLE voorwerp                    --
--VERSION: 1.0                      --
--12-MAY-2020                       --
--IPROJECT GROEP 18                 -- 
--				                    --
--------------------------------------
--VERSIONS:                         --
--V1.0, BUILD QUERY                 --
--------------------------------------

USE iproject18;

--with view populated:

INSERT INTO voorwerp (voorwerpnummer, titel, beschrijving, startprijs, Betalingswijze, betalingsinstructie, 
						plaatsnaam, land, LooptijdbeginDag, LooptijdbeginTijdstip, Verzendkosten,
						verzendinstructies, Verkoper, Koper, LooptijdeindeDag, LooptijdeindeTijdstip, VeilinGesloten, Verkoopprijs, views)
VALUES 
       (1, 'Game of Thrones', 'Flaptekst The first volume', '7,89' ,'Bank', 'Overschrijving moet ontvangen zijn binnen 10 dagen na verkoop', 'Arnhem', 'Nederland', '19-mei-20', '19:46', '6,95', null , 'WILLEM', 'adipiscing', '22-mei-20', '12:46:', 'niet', null, '156'),
	   (2, 'PlayStation 4 Slim', 'Dit itemPlayStation 4 Slim', '493,35' ,'Bank', 'Overschrijving moet ontvangen zijn binnen 10 dagen na verkoop', 'Arnhem', 'Nederland', '19-mei-20', '19:46', '6,95', null , 'WILLEM', 'adipiscing', '22-mei-20', '12:46:', 'niet', null, '56'),
       (3, 'Call of Duty: Black Ops 4 - Xbox One (Xbox One)', 'Publicatiedatum: 21 januari 2020', '38,35 ' ,'Bank', 'Overschrijving moet ontvangen zijn binnen 10 dagen na verkoop', 'Arnhem', 'Nederland', '19-mei-20', '19:46', '6,95', null , 'WILLEM', 'adipiscing', '22-mei-20', '12:46:', 'niet', null, '564'),
	   (4, 'Withnail And I', 'Publicatiedatum: 21 januari 2020', '14,54' ,'Bank', 'Taal: Engels', 'Arnhem', 'Nederland', '19-mei-20', '19:46', '6,95', null , 'WILLEM', 'adipiscing', '22-mei-20', '12:46:', 'niet', null,'415'),
	   (5, 'Canon EOS 90D Spiegelreflexcamera', 'Canon EOS 90D Spiegelreflexcamera, 32,5MP, 7,7 cm Scherm, APS-C Sensor, 4K', '1462,08' ,'Bank', 'Overschrijving moet ontvangen zijn binnen 10 dagen na verkoop', 'Arnhem', 'Nederland', '19-mei-20', '19:46', '6,95', null , 'WILLEM', 'adipiscing', '22-mei-20', '12:46:', 'niet', null,'548'),
	   (6, 'Ravensburger 179565 179565 Legpuzzels', 'Hoofdtaal of -talen	Spaans published, Italiaans', '12,29' ,'Bank', 'Overschrijving moet ontvangen zijn binnen 10 dagen na verkoop', 'Arnhem', 'Nederland', '19-mei-20', '19:46', '6,95', null , 'WILLEM', 'adipiscing', '22-mei-20', '12:46:', 'niet', null,'213'),
	   (7, 'Apple Leren hoesje', '(voor iPhone 11 Pro Max) - Zadelbruin', '40,40' ,'Bank', 'Overschrijving moet ontvangen zijn binnen 10 dagen na verkoop', 'Arnhem', 'Nederland', '19-mei-20', '19:46', '6,95', null , 'WILLEM', 'adipiscing', '22-mei-20', '12:46:', 'niet', null, '153'),
	   (8, 'AVG Ultimate 2020', ' meerdere apparaten | 10 apparaten | 1 Jaar', '45,99' ,'Bank', 'Overschrijving moet ontvangen zijn binnen 10 dagen na verkoop', 'Arnhem', 'Nederland', '19-mei-20', '19:46', '6,95', null , 'WILLEM', 'adipiscing', '22-mei-20', '12:46:', 'niet', null,'518'),
	   (9, 'Bose Quietcomfort 35', 'Bose Quietcomfort 35 (Serie II) Draadloze Hoofdtelefoon, Noise Cancelling, Zwart', '299,00' ,'Bank', 'Overschrijving moet ontvangen zijn binnen 10 dagen na verkoop', 'Arnhem', 'Nederland', '19-mei-20', '19:46', '6,95', null , 'WILLEM', 'adipiscing', '22-mei-20', '12:46:', 'niet', null, '218'),
	   (10,'First Trainer Six Practice Tests with Answers with Audio', 'Six full practice tests with tips and training for the 2015 revised Cambridge English: First (FCE).', '28,39' ,'Bank', 'Overschrijving moet ontvangen zijn binnen 10 dagen na verkoop', 'Arnhem', 'Nederland', '19-mei-20', '19:46', '6,95', null , 'WILLEM', 'adipiscing', '22-mei-20', '12:46:', 'niet', null, '752');


--without view populated:


INSERT INTO voorwerp (voorwerpnummer, titel, beschrijving, startprijs, Betalingswijze, betalingsinstructie, 
						plaatsnaam, land, LooptijdbeginDag, LooptijdbeginTijdstip, Verzendkosten,
						verzendinstructies, Verkoper, Koper, LooptijdeindeDag, LooptijdeindeTijdstip, VeilinGesloten, Verkoopprijs)
VALUES	   (11, 'Mondkapje - Face Mask - Mond Masker Katoenen - Gezicht Masker - Mond kap', 'Dit zijn geen medische mondkapjes.', '7,50','Bank', 'Overschrijving moet ontvangen zijn binnen 10 dagen na verkoop', 'Arnhem', 'Nederland', '19-mei-20', '19:46', '6,95', null , 'arcu.', NULL, '22-mei-20', '12:46:', 'niet', null);
INSERT INTO voorwerp (voorwerpnummer, titel, beschrijving, startprijs, Betalingswijze, betalingsinstructie, 
						plaatsnaam, land, LooptijdbeginDag, LooptijdbeginTijdstip, Verzendkosten,
						verzendinstructies, Verkoper, Koper, LooptijdeindeDag, LooptijdeindeTijdstip, VeilinGesloten, Verkoopprijs)
VALUES	   (12, 'Kobo Libra H2O e-reader - Waterdicht - Grote 7 inch scherm - Instelbaar warme kleur - 8GB - Wifi - Zwart', 'Maak kennis met de nieuwe Kobo Libra H2O. Het ergonomische design gecombineerd met het grote 7 inch scherm.','179,99', 'Bank', 'Overschrijving moet ontvangen zijn binnen 10 dagen na verkoop', 'Arnhem', 'Nederland', '19-mei-20', '19:46', '6,95', null , 'auctor', NULL, '22-mei-20', '12:46:', 'niet', null);
INSERT INTO voorwerp (voorwerpnummer, titel, beschrijving, startprijs, Betalingswijze, betalingsinstructie, 
						plaatsnaam, land, LooptijdbeginDag, LooptijdbeginTijdstip, Verzendkosten,
						verzendinstructies, Verkoper, Koper, LooptijdeindeDag, LooptijdeindeTijdstip, VeilinGesloten, Verkoopprijs)
VALUES	   (13, 'WD Elements Portable 1 TB', 'Deze WD externe harde schijf werkt perfect samen met USB 2.0 en met je USB 3.0-apparaten. Het kleine, lichtgewicht ontwerp biedt een hoge opslagcapaciteit van 1 TB.', '52,90', 'Bank', 'Overschrijving moet ontvangen zijn binnen 10 dagen na verkoop', 'Arnhem', 'Nederland', '19-mei-20', '19:46', '6,95', null , 'Fusce', NULL, '22-mei-20', '12:46:', 'niet', null);
INSERT INTO voorwerp (voorwerpnummer, titel, beschrijving, startprijs, Betalingswijze, betalingsinstructie, 
						plaatsnaam, land, LooptijdbeginDag, LooptijdbeginTijdstip, Verzendkosten,
						verzendinstructies, Verkoper, Koper, LooptijdeindeDag, LooptijdeindeTijdstip, VeilinGesloten, Verkoopprijs)
VALUES	   (14, 'Tempered Glass Screen Protector Iphone Iphone 11, op maat gemaakt, transparant','De Tempered Glass Screenprotector is een revolutie op gebied van display bescherming voor smartphones. ','9,99', 'Bank', 'Overschrijving moet ontvangen zijn binnen 10 dagen na verkoop', 'Arnhem', 'Nederland', '19-mei-20', '19:46', '6,95', null , 'eget', NULL, '22-mei-20', '12:46:', 'niet', null);
INSERT INTO voorwerp (voorwerpnummer, titel, beschrijving, startprijs, Betalingswijze, betalingsinstructie, 
						plaatsnaam, land, LooptijdbeginDag, LooptijdbeginTijdstip, Verzendkosten,
						verzendinstructies, Verkoper, Koper, LooptijdeindeDag, LooptijdeindeTijdstip, VeilinGesloten, Verkoopprijs)
VALUES	   (15, 'Curver Roll Prullenbak - 50 l - Zwart','De Curver rolltop afvalbak 50L zilver met bolle deksel.','20,99', 'Bank', 'Overschrijving moet ontvangen zijn binnen 10 dagen na verkoop', 'Arnhem', 'Nederland', '19-mei-20', '19:46', '6,95', null , 'dui', NULL, '22-mei-20', '12:46:', 'niet', null);
INSERT INTO voorwerp (voorwerpnummer, titel, beschrijving, startprijs, Betalingswijze, betalingsinstructie, 
						plaatsnaam, land, LooptijdbeginDag, LooptijdbeginTijdstip, Verzendkosten,
						verzendinstructies, Verkoper, Koper, LooptijdeindeDag, LooptijdeindeTijdstip, VeilinGesloten, Verkoopprijs)
VALUES	   (16, 'Calvin Klein Trunk Stretch Cotton Heren Boxershorts - 3-pack - Zwart - Maat M','Calvin Klein Trunks voor heren. De Trunkshorts zijn gemaakt van katoen en elastaan, wat zorgt dat de stof veel rek heeft.','35,96', 'Bank', 'Overschrijving moet ontvangen zijn binnen 10 dagen na verkoop', 'Arnhem', 'Nederland', '19-mei-20', '19:46', '6,95', null , 'condimentum', NULL, '22-mei-20', '12:46:', 'niet', null);
INSERT INTO voorwerp (voorwerpnummer, titel, beschrijving, startprijs, Betalingswijze, betalingsinstructie, 
						plaatsnaam, land, LooptijdbeginDag, LooptijdbeginTijdstip, Verzendkosten,
						verzendinstructies, Verkoper, Koper, LooptijdeindeDag, LooptijdeindeTijdstip, VeilinGesloten, Verkoopprijs)
VALUES	   (17, 'Cheaque Unisex T-shirt 104 Maat M','Chapeau! jij hebt smaak. Deze lichtblauwe tee met een staalblauwe zeefdruk print gaat ''m helemaal worden bij je kid. Materiaal: 100% katoen','9,95', 'Bank', 'Overschrijving moet ontvangen zijn binnen 10 dagen na verkoop', 'Arnhem', 'Nederland', '19-mei-20', '19:46', '6,95', null , 'bibendum', NULL, '22-mei-20', '12:46:', 'niet', null);
INSERT INTO voorwerp (voorwerpnummer, titel, beschrijving, startprijs, Betalingswijze, betalingsinstructie, 
						plaatsnaam, land, LooptijdbeginDag, LooptijdbeginTijdstip, Verzendkosten,
						verzendinstructies, Verkoper, Koper, LooptijdeindeDag, LooptijdeindeTijdstip, VeilinGesloten, Verkoopprijs)
VALUES	   (18, 'High Peak Campo - Pop-up tent - 2-Persoons - Zwart','De High Peak Campo is een pop-up enkeldakstent, speciaal ontwikkeld voor een snelle opbouw: je hoeft de tent alleen maar op te gooien en hij staat meteen;','39,99', 'Bank', 'Overschrijving moet ontvangen zijn binnen 10 dagen na verkoop', 'Arnhem', 'Nederland', '19-mei-20', '19:46', '6,95', null , 'auctor', NULL, '22-mei-20', '12:46:', 'niet', null);
INSERT INTO voorwerp (voorwerpnummer, titel, beschrijving, startprijs, Betalingswijze, betalingsinstructie, 
						plaatsnaam, land, LooptijdbeginDag, LooptijdbeginTijdstip, Verzendkosten,
						verzendinstructies, Verkoper, Koper, LooptijdeindeDag, LooptijdeindeTijdstip, VeilinGesloten, Verkoopprijs)
VALUES	   (19, 'Bestway - Ballenbakballen - 100 stuks','Deze 100 ballen kun je makkelijk en snel opbergen in de bijgeleverde tas. De ballen zijn uitgevoerd in de kleuren: roze, groen, blauw en geel. Diameter: 6,4 centimeter.','9,89', 'Bank', 'Overschrijving moet ontvangen zijn binnen 10 dagen na verkoop', 'Arnhem', 'Nederland', '19-mei-20', '19:46', '6,95', null , 'at', NULL, '22-mei-20', '12:46:', 'niet', null);
INSERT INTO voorwerp (voorwerpnummer, titel, beschrijving, startprijs, Betalingswijze, betalingsinstructie, 
						plaatsnaam, land, LooptijdbeginDag, LooptijdbeginTijdstip, Verzendkosten,
						verzendinstructies, Verkoper, Koper, LooptijdeindeDag, LooptijdeindeTijdstip, VeilinGesloten, Verkoopprijs)
VALUES	   (20, 'Steigerhouten hoekbank met chaise longue - Loungeset - Doe het zelf - Bouwpakket hoekbank met chaise longue','Mooi bouwpakket voor een strakke en robuuste hoekbank met chaise longue.','395,00', 'Bank', 'Overschrijving moet ontvangen zijn binnen 10 dagen na verkoop', 'Arnhem', 'Nederland', '19-mei-20', '19:46', '6,95', null , 'aliquet', NULL, '22-mei-20', '12:46:', 'niet', null);
INSERT INTO voorwerp (voorwerpnummer, titel, beschrijving, startprijs, Betalingswijze, betalingsinstructie, 
						plaatsnaam, land, LooptijdbeginDag, LooptijdbeginTijdstip, Verzendkosten,
						verzendinstructies, Verkoper, Koper, LooptijdeindeDag, LooptijdeindeTijdstip, VeilinGesloten, Verkoopprijs)
VALUES	   (21, 'FELIX Mix Selectie In Gelei - Kattenvoer - 44 x 100 g','Slimme katten weten wat ze willen, vooral als het om eten gaat! Deze doos bevat 44 zakjes met maaltijdporties in 4 verschillende smaken: kip, rund, zalm en tonijn.','12,19', 'Bank', 'Overschrijving moet ontvangen zijn binnen 10 dagen na verkoop', 'Arnhem', 'Nederland', '19-mei-20', '19:46', '6,95', null , 'at', NULL, '22-mei-20', '12:46:', 'niet', null);
INSERT INTO voorwerp (voorwerpnummer, titel, beschrijving, startprijs, Betalingswijze, betalingsinstructie, 
						plaatsnaam, land, LooptijdbeginDag, LooptijdbeginTijdstip, Verzendkosten,
						verzendinstructies, Verkoper, Koper, LooptijdeindeDag, LooptijdeindeTijdstip, VeilinGesloten, Verkoopprijs)
VALUES	   (22, 'Chernobyl (Tsjernobyl) (Blu-ray)','Dit is de allernieuwste sensatie van HBO: de miniserie Tsjernobyl. Tsjernobyl dramatiseert het verhaal van het nucleaire ongeval in 1986.','23,99', 'Bank', 'Overschrijving moet ontvangen zijn binnen 10 dagen na verkoop', 'Arnhem', 'Nederland', '19-mei-20', '19:46', '6,95', null , 'aliquet', NULL, '22-mei-20', '12:46:', 'niet', null);
	   
