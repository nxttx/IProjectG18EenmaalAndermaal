--
-- Database: `iproject` v1.3
--

USE master
GO

DROP DATABASE IF EXISTS iproject18;
GO

CREATE DATABASE iproject18;

GO
USE iproject18;


-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bestand`
--

DROP TABLE IF EXISTS bestand;

CREATE TABLE bestand (
  filenaam varchar(35) NOT NULL,
  voorwerp INT NOT NULL
)

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bod`
--

DROP TABLE IF EXISTS bod;

CREATE TABLE bod (
  voorwerp INT NOT NULL,
  bodbedrag char(20) NOT NULL,
  gebruiker char(50) NOT NULL,
  bodDag DATE NOT NULL,
  bodTijdstip char(10) NOT NULL
) 

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `feedback`
--

DROP TABLE IF EXISTS feedback;

CREATE TABLE feedback (
  voorwerp INT NOT NULL,
  soortGebruiker char(8) NOT NULL,
  feedbacksoort char(20) NOT NULL,
  dag DATE NOT NULL,
  tijdstip char(10) NOT NULL,
  commentaar varchar(255) DEFAULT NULL
)

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruiker`
--

DROP TABLE IF EXISTS gebruiker;

CREATE TABLE gebruiker (
  gebruikersnaam char(50) NOT NULL,
  voornaam char(50) NOT NULL,
  achternaam char(50) NOT NULL,
  adresregel1 char(100) NOT NULL,
  adresregel2 char(100) DEFAULT NULL,
  postcode char(20) NOT NULL,
  plaatsnaam char(50) NOT NULL,
  land char(30) NOT NULL,
  geboorteDag char(10) NOT NULL,
  emailadress varchar(50) NOT NULL,
  wachtwoord varchar(255) NOT NULL,
  vraag varchar(255) NOT NULL,
  antwoordtekst varchar(255) NOT NULL,
  verkoper char(3) NOT NULL DEFAULT 'nee'
)

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikerstelefoon`
--

DROP TABLE IF EXISTS gebruikerstelefoon;

CREATE TABLE gebruikerstelefoon (
  volgnr INT NOT NULL,
  gebruiker char(50) NOT NULL,
  telefoon char(15) NOT NULL
) 
-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `rubriek`
--

DROP TABLE IF EXISTS rubriek;

CREATE TABLE rubriek (
  rubrieknummer INT NOT NULL,
  rubrieknaam char(24) NOT NULL,
  rubriek INT  NULL,
  volgnr INT NOT NULL
) 
-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `verkoper`
--

DROP TABLE IF EXISTS verkoper;

CREATE TABLE verkoper (
  gebruiker char(50) NOT NULL,
  bank char(20) DEFAULT NULL,
  bankrekening char(18) NULL,
  controleOptie char(10) NOT NULL,
  creditcard char(20) DEFAULT NULL
)


-- Tabelstructuur voor tabel 'voorwerp'


DROP TABLE IF EXISTS voorwerp;

CREATE TABLE voorwerp (
	voorwerpnummer INT NOT NULL,
	titel char(150) NOT NULL,
	beschrijving varchar(255) NOT NULL,
	startprijs char(20) NOT NULL,
	betalingswijze char(25) NOT NULL,
	betalingsinstructie varchar(255) NULL,
	plaatsnaam char(20) NOT NULL,
	land char(20) NOT NULL,
	looptijd INT NOT NULL DEFAULT 7,
	looptijdbeginDag char(10) NOT NULL,
	looptijdbeginTijdstip char(10) NOT NULL,
	verzendkosten char(6) NULL,
	verzendinstructies varchar(255) NULL,
	verkoper char(50) NOT NULL,
	koper char(50) NULL,
	looptijdeindeDag char(10) NOT NULL,
	looptijdeindeTijdstip char(10) NOT NULL,
	veilinGesloten varchar(4) NOT NULL DEFAULT 'niet',
	verkoopprijs char(20) NULL,
	views INT null
	)


-- Tabelstructuur voor Voorwerp in Rubriek
DROP TABLE IF EXISTS voorwerpInRubriek;

CREATE TABLE voorwerpInRubriek(
	voorwerp INT NOT NULL,
	rubriekOpLaagsteNiveau INT NOT NULL
	)

-- Tabelstructuur voor Vraag
DROP TABLE IF EXISTS Vraag;

CREATE TABLE Vraag(
	vraagnummer INT NOT NULL,
	tekstvraag varchar(255) NOT NULL
	)


--
-- Indexen voor tabel `gebruiker`
--

ALTER TABLE gebruiker
  ADD 
  CONSTRAINT pk_gebruikersnaam PRIMARY KEY (gebruikersnaam),
  CONSTRAINT ch_value_verkoper CHECK (verkoper = 'nee' or verkoper = 'wel');

--
-- Indexen voor tabel `verkoper`
--

ALTER TABLE verkoper
  ADD 
  CONSTRAINT pk_Gebruiker PRIMARY KEY (gebruiker),
  CONSTRAINT fk_Verkoper_Is_Gebruiker FOREIGN KEY (gebruiker) REFERENCES gebruiker (gebruikersnaam);	
--
-- Indexen voor geëxporteerde tabellen
--
-- Indexen voor tabel Voorwerp
ALTER TABLE voorwerp
	ADD 
	CONSTRAINT pk_voorwerpnummer PRIMARY KEY (voorwerpnummer),
	CONSTRAINT fk_verkoper FOREIGN KEY (verkoper) REFERENCES verkoper (gebruiker),
	CONSTRAINT fk_Koper FOREIGN KEY (koper) REFERENCES gebruiker(gebruikersnaam),
	CONSTRAINT ch_veilinGesloten CHECK (veilinGesloten = 'niet' OR veilinGesloten = 'wel');


-- Indexen voor tabel `bod`

ALTER TABLE bod
  ADD 
  CONSTRAINT pk_Voorwerp_Bodbedrag PRIMARY KEY (Voorwerp,Bodbedrag),
  CONSTRAINT fk_Gebruiker FOREIGN KEY (gebruiker) REFERENCES gebruiker (gebruikersnaam),
  CONSTRAINT un_gebruiker_bodDag_bodTijd_Uq UNIQUE (gebruiker ,bodDag, bodTijdstip),
  CONSTRAINT un_voorwerp_bodDag_bodTijd_Uq UNIQUE (voorwerp ,bodDag, bodTijdstip),
  CONSTRAINT fk_Bod_Voorwerp FOREIGN KEY (voorwerp) REFERENCES voorwerp (voorwerpnummer);



--
-- Indexen voor tabel `feedback`
--
ALTER TABLE feedback
  ADD 
  CONSTRAINT pk_voorwerp_SoortGebruiker PRIMARY KEY (voorwerp,soortGebruiker),
  CONSTRAINT fk_voorwerk_Feedback FOREIGN KEY (voorwerp) REFERENCES voorwerp(voorwerpnummer);




--
-- Indexen voor tabel `gebruikerstelefoon`
--
ALTER TABLE gebruikerstelefoon
  ADD 
  CONSTRAINT pk_volgnr_Gebruiker PRIMARY KEY (volgnr, Gebruiker),
  CONSTRAINT fk_Gebruikerstelefoon FOREIGN KEY (gebruiker) REFERENCES gebruiker (gebruikersnaam);

--
-- Indexen voor tabel `rubriek`
--
ALTER TABLE rubriek
  ADD 
  CONSTRAINT pk_rubrieknummer PRIMARY KEY (rubrieknummer),
  CONSTRAINT rubriek_ibfk_1 FOREIGN KEY (rubriek) REFERENCES rubriek (rubrieknummer);


-- Indexen voor tabel Voorwerp in Rubriek
ALTER TABLE voorwerpInRubriek
	ADD 
	CONSTRAINT pk_Voorwerp PRIMARY KEY (Voorwerp),
	CONSTRAINT fk_Rubriek_Voorwerp FOREIGN KEY (voorwerp) REFERENCES voorwerp(voorwerpnummer),
	CONSTRAINT fk_RubriekOpLaagsteNiveau FOREIGN KEY (rubriekOpLaagsteNiveau) REFERENCES rubriek(rubrieknummer);

--
-- Indexen voor tabel `bestand`
--

ALTER TABLE bestand
  ADD 
  CONSTRAINT pk_filenaam  PRIMARY KEY (filenaam),
  CONSTRAINT fk_Voorwerp FOREIGN KEY (voorwerp) REFERENCES voorwerp (voorwerpnummer);

-- Indexen voor tabel Vraag
ALTER TABLE Vraag
	ADD CONSTRAINT pk_vraagnummer PRIMARY KEY (vraagnummer);

-- Overige beperkingsregels

-- Beperking B1

--DROP TRIGGER  trg_Gebruiker_WEL;
GO

CREATE TRIGGER ch_Gebruiker_Is_Verkoper
ON Verkoper 
FOR INSERT, UPDATE
AS
	DECLARE @v_Gebruiker char(25);
	DECLARE @v_Gebruiker_Wel char(25);
	select @v_Gebruiker = Gebruiker  	from Inserted i;
	select @v_Gebruiker_Wel= verkoper  	from Gebruiker where gebruikersnaam = @v_Gebruiker;

	IF(@v_Gebruiker_Wel != 'wel')
		BEGIN
			RAISERROR ('Error', 16, 1)
			ROLLBACK TRANSACTION
		END
	ELSE
		PRINT 'Row Inserted';

Go


-- Beperking B2

CREATE TRIGGER trg_verkoper_validate_credit_card 
ON verkoper 
FOR INSERT, UPDATE
AS
	DECLARE @v_gebruiker char(25);
	DECLARE @v_Bank char(20);
	DECLARE @v_Bankrekening char(18);
	DECLARE @v_ControleOptie char(10);
	DECLARE @v_Creditcard numeric(16);
	select @v_Gebruiker=i.Gebruiker,@v_Bank=i.Bank,	@v_Bankrekening=i.Bankrekening,	
	@v_ControleOptie=i.ControleOptie,@v_Creditcard=i.Creditcard 	from Inserted i;

	IF(@v_ControleOptie = 'CreditCard' AND @v_Creditcard IS NULL)
		BEGIN
			RAISERROR ('Creditcard kan niet leeg zijn als er een creditcard aanwezig is', 16, 1)
			ROLLBACK TRANSACTION
		END
	ELSE
		PRINT 'Row Inserted';
GO




-- Beperking B3


CREATE TRIGGER trg_verkoper_validate_bank_credit 
ON verkoper 
FOR INSERT, UPDATE
AS
	DECLARE @v_Gebruiker char(25);
	DECLARE @v_Bank char(20);
	DECLARE @v_Bankrekening char(18);
	DECLARE @v_ControleOptie char(10);
	DECLARE @v_Creditcard numeric(16);
	select @v_Gebruiker=i.Gebruiker,@v_Bank=i.Bank,	@v_Bankrekening=i.Bankrekening,	
	@v_ControleOptie=i.ControleOptie,@v_Creditcard=i.Creditcard 	from Inserted i;

	IF(@v_Bankrekening IS NULL AND @v_Creditcard IS NULL)
		BEGIN
			RAISERROR ('Bank en creditcard kunnen niet beiden leeg zijn', 16, 1)
			ROLLBACK TRANSACTION
		END
	ELSE
		PRINT 'Row Inserted';
Go
--Beperking B4
		
CREATE TRIGGER trg_bestand_validate_img_count
ON bestand 
FOR INSERT, UPDATE
AS
	DECLARE @v_Filenaam char(25);
	DECLARE @v_voorwerp numeric(25);
	DECLARE @v_voorwerp_Count int;  
	select @v_Filenaam=i.filenaam ,@v_voorwerp=i.voorwerp from Inserted i;
	SELECT @v_voorwerp_Count = COUNT(*) FROM bestand WHERE voorwerp = @v_voorwerp;
	IF @v_voorwerp_Count > 4
	BEGIN
			RAISERROR ('Kan man 4 images per object toevoegen', 16, 1)
			ROLLBACK TRANSACTION
	END;
	ELSE
		PRINT 'Row Inserted';
Go

-- Beperking B5

CREATE TRIGGER trg_bod_validate_Bodbedrag 
ON bod 
FOR INSERT, UPDATE
AS
	DECLARE @v_Voorwerp numeric(25);
	DECLARE @v_Bodbedrag char(20);
	DECLARE @v_Max_Bodbedrag char(20);

	select @v_Voorwerp=i.Voorwerp, @v_Bodbedrag=i.Bodbedrag 	from Inserted i;
	SELECT @v_Max_Bodbedrag = max(CAST(Bodbedrag AS INT)) FROM bod WHERE Voorwerp = @v_Voorwerp;

	IF @v_Max_Bodbedrag <= @v_Bodbedrag
	BEGIN
			RAISERROR ('Bod moet hoger zijn dan gegeven bod.', 16, 1)
			ROLLBACK TRANSACTION
	END;
	ELSE
		PRINT 'Row Inserted';

GO
--Beperking B6



CREATE TRIGGER trg_bod_validare_obj_owner 
ON bod 
FOR INSERT, UPDATE
AS
	DECLARE @v_Voorwerp numeric(25);
	DECLARE @v_Bodbedrag char(6);
	DECLARE @v_Gebruiker char(25);
	DECLARE @v_BodDag DATE;
	DECLARE @v_BodTijdstip char(10);
	DECLARE @v_Verkoper char(25);

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
GO