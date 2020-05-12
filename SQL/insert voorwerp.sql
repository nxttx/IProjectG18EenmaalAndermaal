USE iproject18;


ALTER TABLE voorwerp ALTER COLUMN voorwerpnummer numeric(10) NOT NULL;
	ALTER TABLE voorwerp ALTER COLUMN titel char(255) NOT NULL;
	ALTER TABLE voorwerp ALTER COLUMN beschrijving char(255) NOT NULL;
	ALTER TABLE voorwerp ALTER COLUMN euro char(10) NOT NULL;
	ALTER TABLE voorwerp ALTER COLUMN Betalingswijze char(255) NOT NULL;
	ALTER TABLE voorwerp ALTER COLUMN betalingsinstructie char(255) NULL;
	ALTER TABLE voorwerp ALTER COLUMN plaatsnaam char(50) NOT NULL;
	ALTER TABLE voorwerp ALTER COLUMN landnaam char(50) NOT NULL;
	ALTER TABLE voorwerp ALTER COLUMN dagen numeric(1)  NOT NULL;
	ALTER TABLE voorwerp ALTER COLUMN LooptijdbeginDag char(50) NOT NULL;
	ALTER TABLE voorwerp ALTER COLUMN LooptijdbeginTijdstip char(50) NOT NULL;
	ALTER TABLE voorwerp ALTER COLUMN Verzendkosten char(20) NULL;
	ALTER TABLE voorwerp ALTER COLUMN verzendinstructies char(255) NULL;
	ALTER TABLE voorwerp ALTER COLUMN Verkoper char(10) NOT NULL;
	ALTER TABLE voorwerp ALTER COLUMN Koper char(10) NULL;
	ALTER TABLE voorwerp ALTER COLUMN LooptijdeindeDag char(50) NOT NULL;
	ALTER TABLE voorwerp ALTER COLUMN LooptijdeindeTijdstip char(50) NOT NULL;
	ALTER TABLE voorwerp ALTER COLUMN VeilinGesloten char(3) NOT NULL;
	ALTER TABLE voorwerp ALTER COLUMN Verkoopprijs char(5) NULL;
	



/*

CREATE TABLE voorwerp (
	voorwerpnummer numeric(10) NOT NULL,
	titel char(255) NOT NULL,
	beschrijving char(255) NOT NULL,
	euro char(10) NOT NULL,
	Betalingswijze char(255) NOT NULL,
	betalingsinstructie char(255) NULL,
	plaatsnaam char(50) NOT NULL,
	landnaam char(50) NOT NULL,
	dagen numeric(1)  NOT NULL,
	LooptijdbeginDag char(50) NOT NULL,
	LooptijdbeginTijdstip char(50) NOT NULL,
	Verzendkosten char(20) NULL,
	verzendinstructies char(255) NULL,
	Verkoper char(10) NOT NULL,
	Koper char(10) NULL,
	LooptijdeindeDag char(50) NOT NULL,
	LooptijdeindeTijdstip char(50) NOT NULL,
	VeilinGesloten char(3) NOT NULL,
	Verkoopprijs char(5) NULL
	)

*/

-- select * from voorwerp


INSERT INTO voorwerp (voorwerpnummer, titel, beschrijving, euro, Betalingswijze, betalingsinstructie, 
						plaatsnaam, landnaam, dagen, LooptijdbeginDag, LooptijdbeginTijdstip, Verzendkosten,
						verzendinstructies, Verkoper, Koper, LooptijdeindeDag, LooptijdeindeTijdstip, VeilinGesloten, Verkoopprijs)
VALUES 
     (1, 'Game of Thrones', 'Flaptekst The first volume', '7,89' ,'Bank', 'Overschrijving moet ontvangen zijn binnen 10 dagen na verkoop', 'Arnhem', 'Nederland', 7, '19-mei-20', '19:46', '6,95', null , 'WILLEM', 'Peter', '22-mei-20', '12:46:', 'Ja', null),
	   (2, 'PlayStation 4 Slim', 'Dit itemPlayStation 4 Slim', '493,35' ,'Bank', 'Overschrijving moet ontvangen zijn binnen 10 dagen na verkoop', 'Arnhem', 'Nederland', 7, '19-mei-20', '19:46', '6,95', null , 'WILLEM', 'Peter', '22-mei-20', '12:46:', 'Nee', null),
	   (3, 'Call of Duty: Black Ops 4 - Xbox One (Xbox One)', 'Publicatiedatum: 21 januari 2020', '38,35 ' ,'Bank', 'Overschrijving moet ontvangen zijn binnen 10 dagen na verkoop', 'Arnhem', 'Nederland', 7, '19-mei-20', '19:46', '6,95', null , 'WILLEM', 'Peter', '22-mei-20', '12:46:', 'Ja', null),
	   (4, 'Withnail And I', 'Publicatiedatum: 21 januari 2020', '14,54' ,'Bank', 'Taal: Engels', 'Arnhem', 'Nederland', 7, '19-mei-20', '19:46', '6,95', null , 'WILLEM', 'Peter', '22-mei-20', '12:46:', 'Ja', null),
	   (5, 'Canon EOS 90D Spiegelreflexcamera', 'Canon EOS 90D Spiegelreflexcamera, 32,5MP, 7,7 cm Scherm, APS-C Sensor, 4K', '1.462,08' ,'Bank', 'Overschrijving moet ontvangen zijn binnen 10 dagen na verkoop', 'Arnhem', 'Nederland', 7, '19-mei-20', '19:46', '6,95', null , 'WILLEM', 'Peter', '22-mei-20', '12:46:', 'Ja', null),
	   (6, 'Ravensburger 179565 179565 Legpuzzels', 'Hoofdtaal of -talen	Spaans published, Italiaans', '12,29' ,'Bank', 'Overschrijving moet ontvangen zijn binnen 10 dagen na verkoop', 'Arnhem', 'Nederland', 7, '19-mei-20', '19:46', '6,95', null , 'WILLEM', 'Peter', '22-mei-20', '12:46:', 'nee', null),
	   (7, 'Apple Leren hoesje', '(voor iPhone 11 Pro Max) - Zadelbruin', '40,40' ,'Bank', 'Overschrijving moet ontvangen zijn binnen 10 dagen na verkoop', 'Arnhem', 'Nederland', 7, '19-mei-20', '19:46', '6,95', null , 'WILLEM', 'Peter', '22-mei-20', '12:46:', 'nee', null),
	   (8, 'AVG Ultimate 2020', ' meerdere apparaten | 10 apparaten | 1 Jaar', '45,99' ,'Bank', 'Overschrijving moet ontvangen zijn binnen 10 dagen na verkoop', 'Arnhem', 'Nederland', 7, '19-mei-20', '19:46', '6,95', null , 'WILLEM', 'Peter', '22-mei-20', '12:46:', 'ja', null),
	   (9, 'Bose Quietcomfort 35', 'Bose Quietcomfort 35 (Serie II) Draadloze Hoofdtelefoon, Noise Cancelling, Zwart', '€ 299,00' ,'Bank', 'Overschrijving moet ontvangen zijn binnen 10 dagen na verkoop', 'Arnhem', 'Nederland', 7, '19-mei-20', '19:46', '6,95', null , 'WILLEM', 'Peter', '22-mei-20', '12:46:', 'ja', null),
	   (10,'First Trainer Six Practice Tests with Answers with Audio', 'Six full practice tests with tips and training for the 2015 revised Cambridge English: First (FCE).', '€ 28,39' ,'Bank', 'Overschrijving moet ontvangen zijn binnen 10 dagen na verkoop', 'Arnhem', 'Nederland', 7, '19-mei-20', '19:46', '6,95', null , 'WILLEM', 'Peter', '22-mei-20', '12:46:', 'nee', null);


insert into gebruiker values ('WILLEM', 'Wilem', 'Klul', 'adres1', NULL, '1234AB', 'Arnhem', 'NL', '07-05-2020', ' ', NULL, 1, 'iets', 'ja');
insert into verkoper values ('WILLEM', 1234, 124, 123, NULL);

UPDATE voorwerp SET Verkoopprijs=7.50 WHERE voorwerpnummer = 1;
UPDATE voorwerp SET Verkoopprijs=20 WHERE voorwerpnummer = 2;
UPDATE voorwerp SET Verkoopprijs=500 WHERE voorwerpnummer = 3;