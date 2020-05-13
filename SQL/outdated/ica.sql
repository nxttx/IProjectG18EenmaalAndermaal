--
-- Database: `iproject18`
--

--CREATE DATABASE iproject18;
USE iproject18;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bestand`
--

DROP TABLE IF EXISTS bestand;

CREATE TABLE bestand (
  filenaam char(13) NOT NULL,
  voorwerpnummer numeric(10) NOT NULL
)

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bod`
--

DROP TABLE IF EXISTS bod;
CREATE TABLE bod (
  Voorwerp numeric(10) NOT NULL,
  Bodbedrag char(5) NOT NULL,
  Gebruiker char(10) NOT NULL,
  BodDag char(10) NOT NULL,
  BodTijdstip char(8) NOT NULL
) 

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `feedback`
--

DROP TABLE IF EXISTS feedback;

CREATE TABLE feedback (
  Voorwerp numeric(10) NOT NULL,
  SoortGebruiker char(8) NOT NULL,
  Feedbacksoort char(8) NOT NULL,
  Dag char(10) NOT NULL,
  Tijdstip char(8) NOT NULL,
  commentaar char(12) DEFAULT NULL
)

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruiker`
--

--INSERT INTO gebruiker(gebruikersnaam, voornaam, achternaam, adresregel1, adresregel2, postcode, plaatsnaam, Land, GeboorteDag, Mailbox, wachtwoord, Vraag, antwoordtekst, Verkopen) VALUES(
--	WILLEM', 'piet','piet','gesges',NULL, '2424FG', 'ARNHEM', 'Netherls', 'wfewf', 'mvail@gmail.com', 'test', '1', 'wrwr', 'rwr');

DROP TABLE IF EXISTS gebruiker;
CREATE TABLE gebruiker (
  gebruikersnaam char(10) NOT NULL,
  voornaam char(5) NOT NULL,
  achternaam char(8) NOT NULL,
  adresregel1 char(15) NOT NULL,
  adresregel2 char(15) DEFAULT NULL,
  postcode char(7) NOT NULL,
  plaatsnaam char(12) NOT NULL,
  Land char(9) NOT NULL,
  GeboorteDag char(10) NOT NULL,
  Mailbox char(18) NOT NULL,
  wachtwoord char(9) NOT NULL,
  Vraag numeric(1) NOT NULL,
  antwoordtekst char(6) NOT NULL,
  Verkopen char(3) NOT NULL
)

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikerstelefoon`
--

DROP TABLE IF EXISTS gebruikerstelefoon;
CREATE TABLE gebruikerstelefoon (
  volgnr numeric(2) NOT NULL,
  Gebruiker char(10) NOT NULL,
  Telefoon char(11) NOT NULL
) 
-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `rubriek`
--

DROP TABLE IF EXISTS rubriek;
CREATE TABLE rubriek (
  rubrieknummer numeric(3) NOT NULL,
  rubrieknaam char(24) NOT NULL,
  Rubriek numeric(3)  NULL,
  volgnr numeric(2) NOT NULL
) 
-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `verkoper`
--

--INSERT INTO verkoper(Gebruiker, Bank, Bankrekening, ControleOptie, Creditcard) VALUES(
	
--	'WILLEM', 'Rabobank', null, 'wqwrq', NULL);

--	select * from verkoper
--	select * from gebruiker

DROP TABLE IF EXISTS verkoper;
CREATE TABLE verkoper (
  Gebruiker char(10) NOT NULL,
  Bank char(8) DEFAULT NULL,
  Bankrekening numeric(7) NULL,
  ControleOptie char(10) NOT NULL,
  Creditcard char(19) DEFAULT NULL
)

-- Tabelstructuur voor tabel 'voorwerp'

DROP TABLE IF EXISTS voorwerp;
CREATE TABLE voorwerp (
	voorwerpnummer numeric(10) NOT NULL,
	titel char(18) NOT NULL,
	beschrijving char(22) NOT NULL,
	euro char(5) NOT NULL,
	Betalingswijze char(9) NOT NULL,
	betalingsinstructie char(23) NULL,
	plaatsnaam char(12) NOT NULL,
	landnaam char(9) NOT NULL,
	dagen numeric(1) NOT NULL,
	LooptijdbeginDag char(10) NOT NULL,
	LooptijdbeginTijdstip char(8) NOT NULL,
	Verzendkosten char(5) NULL,
	verzendinstructies char(27) NULL,
	Verkoper char(10) NOT NULL,
	Koper char(10) NULL,
	LooptijdeindeDag char(10) NOT NULL,
	LooptijdeindeTijdstip char(8) NOT NULL,
	VeilinGesloten char(3) NOT NULL,
	Verkoopprijs char(5) NULL
	)

-- Tabelstructuur voor Voorwerp in Rubriek
DROP TABLE IF EXISTS VoorwerpInRubriek;
CREATE TABLE VoorwerpInRubriek(
	Voorwerp numeric(10) NOT NULL,
	RubriekOpLaagsteNiveau numeric(3) NOT NULL
	)

-- Tabelstructuur voor Vraag
DROP TABLE IF EXISTS Vraag;
CREATE TABLE Vraag(
	vraagnummer INT NOT NULL,
	tekstvraag char(21) NOT NULL
	)


	
--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `bestand`
--
ALTER TABLE bestand
  ADD PRIMARY KEY (filenaam);

--
-- Indexen voor tabel `bod`
--
ALTER TABLE bod
  ADD PRIMARY KEY (Voorwerp,Bodbedrag);


--
-- Indexen voor tabel `feedback`
--
ALTER TABLE feedback
  ADD PRIMARY KEY (Voorwerp,SoortGebruiker);

--
-- Indexen voor tabel `gebruiker`
--
ALTER TABLE gebruiker
  ADD PRIMARY KEY (gebruikersnaam);

--
-- Indexen voor tabel `gebruikerstelefoon`
--
ALTER TABLE gebruikerstelefoon
  ADD PRIMARY KEY (volgnr, Gebruiker);

--
-- Indexen voor tabel `rubriek`
--
ALTER TABLE rubriek
  ADD PRIMARY KEY (rubrieknummer);


--
-- Indexen voor tabel `verkoper`
--
ALTER TABLE verkoper
  ADD PRIMARY KEY (Gebruiker);

--
-- Indexen voor tabel Voorwerp
ALTER TABLE Voorwerp
	ADD PRIMARY KEY (voorwerpnummer);

-- Indexen voor tabel Voorwerp in Rubriek
ALTER TABLE VoorwerpInRubriek
	ADD PRIMARY KEY (Voorwerp);

-- Indexen voor tabel Vraag
ALTER TABLE Vraag
	ADD PRIMARY KEY (vraagnummer);


--
-- Beperkingen voor tabel `bod`
--
ALTER TABLE bod
	ADD CONSTRAINT bod_ibfk_1 FOREIGN KEY (Gebruiker) REFERENCES gebruiker (gebruikersnaam),
		CONSTRAINT gebruiker_bodDag_bodTijd_Uq UNIQUE (Gebruiker ,BodDag, BodTijdstip),
		CONSTRAINT voorwerp_bodDag_bodTijd_Uq UNIQUE (Voorwerp ,BodDag, BodTijdstip);
  
  


--
-- Beperkingen voor tabel `gebruikerstelefoon`
--
ALTER TABLE gebruikerstelefoon
  ADD CONSTRAINT gebruikerstelefoon_ibfk_1 FOREIGN KEY (Gebruiker) REFERENCES gebruiker (gebruikersnaam);

--
-- Beperkingen voor tabel `rubriek`
--
ALTER TABLE rubriek
  ADD CONSTRAINT rubriek_ibfk_1 FOREIGN KEY (Rubriek) REFERENCES rubriek (rubrieknummer);

--
-- Beperkingen voor tabel `verkoper`
--
ALTER TABLE verkoper
  ADD CONSTRAINT verkoper_ibfk_1 FOREIGN KEY (Gebruiker) REFERENCES gebruiker (gebruikersnaam);

-- Beperkingen voor tabel Voorwerp
ALTER TABLE Voorwerp
	ADD CONSTRAINT Voorwerp_ibfk_1 FOREIGN KEY (verkoper) REFERENCES Verkoper(Gebruiker),
		CONSTRAINT Voorwerp_ibfk_2 FOREIGN KEY (Koper) REFERENCES gebruiker(gebruikersnaam);
-- Beperkingen voor tabel VoorwerpInRubriek
ALTER TABLE VoorwerpInRubriek
	ADD CONSTRAINT Voorwerp_irfk_1 FOREIGN KEY (Voorwerp) REFERENCES Voorwerp(voorwerpnummer),
		CONSTRAINT Voorwerp_irfk_2 FOREIGN KEY (RubriekOpLaagsteNiveau) REFERENCES Rubriek(rubrieknummer);


-- Extra beperkingen
-- Tabellen Verkoper en Gebruiker: Kolom Verkoper(Gebruiker) moet uitsluitend alle gebruikers bevatten, die in kolom Gebruiker(Verkoper?) de waarde ‘wel’ hebben.
use iproject18


use iproject18

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- Beperking B1
CREATE TRIGGER trg_Gebruiker_WEL
ON Verkoper 
FOR INSERT, UPDATE
AS
	DECLARE @v_Gebruiker char(10);
	DECLARE @v_Gebruiker_Wel char(10);
	select @v_Gebruiker=i.Gebruiker  	from Inserted i;
	select @v_Gebruiker_Wel=Verkopen  	from Gebruiker where gebruikersnaam = @v_Gebruiker;

	IF(@v_Gebruiker_Wel != 'yes')
		BEGIN
			RAISERROR ('Error', 16, 1)
			ROLLBACK TRANSACTION
		END
	ELSE
		PRINT 'Row Inserted';


-- Beperking B2
CREATE TRIGGER trg_verkoper_validate_credit_card 
ON verkoper 
FOR INSERT, UPDATE
AS
	DECLARE @v_Gebruiker char(10);
	DECLARE @v_Bank char(8);
	DECLARE @v_Bankrekening numeric(7);
	DECLARE @v_ControleOptie char(10);
	DECLARE @v_Creditcard char(19);
	select @v_Gebruiker=i.Gebruiker,@v_Bank=i.Bank,	@v_Bankrekening=i.Bankrekening,	
	@v_ControleOptie=i.ControleOptie,@v_Creditcard=i.Creditcard 	from Inserted i;

	IF(@v_ControleOptie = 'CreditCard' AND @v_Creditcard IS NULL)
		BEGIN
			RAISERROR ('Creditcard kan niet leeg zijn als er een creditcaard aanwezig is', 16, 1)
			ROLLBACK TRANSACTION
		END
	ELSE IF (@v_ControleOptie != 'CreditCard' AND @v_Creditcard IS NOT NULL)
		BEGIN
			RAISERROR ('Creditcard kan niet leeg zijn als er een creditcaard aanwezig is', 16, 1)
			ROLLBACK TRANSACTION
		END
	ELSE
		PRINT 'Row Inserted';

-- Beperking B3
CREATE TRIGGER trg_verkoper_validate_bank_credit 
ON verkoper 
FOR INSERT, UPDATE
AS
	DECLARE @v_Gebruiker char(10);
	DECLARE @v_Bank char(8);
	DECLARE @v_Bankrekening numeric(7);
	DECLARE @v_ControleOptie char(10);
	DECLARE @v_Creditcard char(19);
	select @v_Gebruiker=i.Gebruiker,@v_Bank=i.Bank,	@v_Bankrekening=i.Bankrekening,	
	@v_ControleOptie=i.ControleOptie,@v_Creditcard=i.Creditcard 	from Inserted i;

	IF(@v_Bankrekening IS NULL AND @v_Creditcard IS NULL)
		BEGIN
			RAISERROR ('Bank en creditcard kunnen niet beiden leeg zijn', 16, 1)
			ROLLBACK TRANSACTION
		END
	ELSE
		PRINT 'Row Inserted';

--Beperking B4
CREATE TRIGGER trg_bestand_validate_img_count ON bestand FOR INSERT, UPDATE
AS
	DECLARE @v_Filenaam char(13);
	DECLARE @v_voorwerpnummer numeric(10);
	DECLARE @v_voorwerp_Count int;  
	select @v_Filenaam=i.Filenaam,@v_voorwerpnummer=i.voorwerpnummer from Inserted i;
	SELECT @v_voorwerp_Count = COUNT(*) FROM bestand WHERE voorwerpnummer = @v_voorwerpnummer;
	IF @v_voorwerp_Count > 4
	BEGIN
			RAISERROR ('Kan niet meer dan 4 images per object toevoegen', 16, 1)
			ROLLBACK TRANSACTION
	END;
	ELSE
		PRINT 'Row Inserted';

-- Beperking B5
CREATE TRIGGER trg_bod_validate_Bodbedrag ON bod FOR INSERT, UPDATE
AS
	DECLARE @v_Voorwerp numeric(10);
	DECLARE @v_Bodbedrag char(5);
	DECLARE @v_Max_Bodbedrag char(5);

	select @v_Voorwerp=i.Voorwerp, @v_Bodbedrag=i.Bodbedrag 	from Inserted i;
	SELECT @v_Max_Bodbedrag = max(CAST(Bodbedrag AS INT)) FROM bod WHERE Voorwerp = @v_Voorwerp;

	IF @v_Max_Bodbedrag <= @v_Bodbedrag
	BEGIN
			RAISERROR ('Bod moet hoger zijn dan gegeven bod.', 16, 1)
			ROLLBACK TRANSACTION
	END;
	ELSE
		PRINT 'Row Inserted';




--Beperking B6
CREATE TRIGGER trg_bod_validare_obj_owner ON bod FOR INSERT, UPDATE
AS
	DECLARE @v_Voorwerp numeric(10);
	DECLARE @v_Bodbedrag char(5);
	DECLARE @v_Gebruiker char(10);
	DECLARE @v_BodDag char(10);
	DECLARE @v_BodTijdstip char(8);
	DECLARE @v_Verkoper char(10);

	select @v_Voorwerp=i.Voorwerp, @v_Bodbedrag=i.Bodbedrag,
	@v_Gebruiker=i.Gebruiker, @v_BodDag=i.BodDag, @v_BodTijdstip=i.BodTijdstip 
	from Inserted i;

	SELECT @v_Verkoper = Verkoper FROM voorwerp WHERE voorwerpnummer = @v_Voorwerp;

	IF @v_Gebruiker = @v_Verkoper
	BEGIN
			RAISERROR ('Een gebruiker kan niet bieden op zijn of haar eigen item', 16, 1)
			ROLLBACK TRANSACTION
	END;
	ELSE
		PRINT 'Row Inserted';

