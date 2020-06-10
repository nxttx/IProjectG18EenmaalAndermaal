# Documentatie

## Bulma standaard waardes:
`$primary: $purple;`<br>
`$link: $turquoise;`<br>
`//$info: $cyan; // standaard`<br>
`$success: $turquoise;`<br>
`//$warning: $yellow; //standaard`<br>
`$danger: $red;`<br>
`$dark: $grey-dark;`<br>
`$text: $grey-dark;`<br>
`$body-background-color: $gray;`<br>

## Footer
Voor de footer gaan we javascript gebruiken zodat de footer mee scaled met de breedte van het scherm. Dit gaan we doen met `screen.width` en een `setInterval`. Daarmee gaan we een if statement doen waarmee de visability word aangepast. 
###### edit 
```SetInterval``` is uiteindelijk niet gebruik vanwege performance 
##header
Voor de footer gaan we javascript gebruiken zodat de footer mee scaled met de breedte van het scherm. Dit gaan we doen met `screen.width` en een `setInterval`. Daarmee gaan we een if statement doen waarmee de visability word aangepast. 
###### edit
```SetInterval``` is uiteindelijk niet gebruik vanwege performance 

## index
De advertenties bij de index worden laten zien door een for each loop. Die de gegevens 1 voor 1 van de database verwerkt in de goede colom.

## Rubriekenboom
De rubriekenboom gaan we met twee for loops doorlopen, waardoor we eerst de headerkiezen en daarna het sub menu.
###### edit
De wanneer er op een sub rubriek wordt gedrukt wordt door middel van een iframe op de desktop pagina de subsubrubrieken weergegeven. Op de mobiele pagina wordt je doorgestuurd naar een apparte pagina waar je opnieuw door kan drukken naar de sub sub rubriek.

## Breadcrumbs
Controleer de Rubriek, ALS Rubriek NULL is, identificeren ze dat dit een hoofdcategorie is.
Daarna als Rubriek niet null is dan berekenen ze de Rubriek NULL en als Rubriek <= Aantal hoofdcategorieën. Vervolgens identificeren ze deze subcategorie en en rubrieknaam de hoofdcategorie.
Tot slot als Rubriek is> Aantal hoofdcategorieën + 1, Ze identificeren dat dit een SubSub-categorie is, Subcat = rubriek.

## Inloggen
Login.php is de daadwerkelijk zichtbare pagina waar men zijn of haar credentials kan invoeren. Op de inlogform zit een onsubmit-event waarin de functie login wordt uitgevoerd. In de login functie wordt een POST-request geopend naar het bestand authenticate.php. In dit bestand wordt de gebruikersnaam in een sql-statement gezet en wordt de wachtwoordhash vergeleken met het ingevoerde wachtwoord. Indien het wachtwoord correct is wordt een HTTP response code 200 terugstuurd. Indien de gebruikersnaam bestaat maar het wachtwoord verkeerd is wordt een 404 teruggestuurd. Eigenlijk is dit een 401 - unauthorized, maar om niet het idee te geven dat de gebruikersnaam correct is en vervolgens meerdere wachtwoorden geprobeerd worden bij een hack wordt het een 404. Indien de gebruikersnaam niet herkent wordt, wordt er ook een 404 teruggestuurd. Bij correcte gegevens wordt een user session variabele aangemaakt en wordt de gebruiker doorverwezen naar de homepagina.

## Zoeken
In de header staat een zoekbalk waar men op kan klikken. Als op enter wordt gedrukt wordt een get-request uitgevoerd naar search.php. Deze pagina opent vanzelf en stuurt vervolgens aan de hand van de URL een get-request uit naar searchHandler.php. De reden dat dit tweemaal gebeurt is zodat de zoekopdracht in de URL staat en met de back en forward knop in de browser terug wordt verwezen naar deze resultaten.

## Registreren
Tijdens het registeren kan je door middel van javascript, php en sql checken of je gebuikers naam nog vrij is.
Bij het wachtwoord wordt gecheckt of het wachtwoord gelijk is en lang genoeg. Dit gaat worden gedaan door middel van javascript en het veranderen van de kleur van de rand. De gebruiker mag dit negeren. Echter zal de gebruiker dan een fout melding krijgen na het inleveren van de form. Bij elke input is ingesteld dat het niet langer mag zijn dan dat de database toestaat. Dit is een html lock en kan dus wel met element inspecteren worden veranderd. Maar de database accepteert dit niet. 

## Bieden
Voor bieden hebben we eerst een check nodig of de gebruiker de verkoper is. Dit doen we met javascript. Wanneer dit klopt wordt de text veld voor het bieden ```disabled```. Dit wordt ook gecheckt in de php zodat er niet met element inspecteren ```disabled``` weg kan halen. 

Daarna wordt er met PHP een check of de gebruiker wel is ingelogd. Wanneer dit niet is, wordt opnieuw het text veld ```disabled```. Als de gebruiker ingelogd is en niet de verkoper is dan kan er een bieding plaatsvinden. Met JS wordt er gekeken of de bieding hoger is dan de huidige prijs en of er aan de minimum verhoging wordt voldaan. Wanneer dit niet waar is komt er een error message in beeld en blijft de knop ```disabled```.

Anders wanneer er aan deze eisen wordt voldaan kan je op bieden drukken en herlaad de pagina. Bij het bezoeken van een pagina wordt gecheckt of er gebruikt wordt gemaakt van ```POST```. Wanneer dit waar is wordt de gegevens opnieuw gecheckt of je wel ingelogd bent en of je zelf niet de verkoper bent. Als dat waar is dan wordt er een prepaird statement uitgevoerd waardoor je bod geregistreerd wordt.

Je kan ook een lijst met de vorige biedingen bekijken. Deze wordt opgehaald uit de database door prepaired statements en in een foreach loop uit gewerkt naar mooie colomen. 

## Verkoper worden
Voor het worden van een verkoper worden eerst een aantal checks gedaan. Eerst wordt gecheckt of je ingelogd bent. Daarna wordt gecheckt of de admin is ingelogd, en als laatste wordt gecheckt of je al een verkoper bent.
Wanneer je al een verkoper bent wordt er aangegeven dat je niet opnieuw verkoper kan worden en daarna wordt je terug gestuurd naar de hoofdpagina. De admin ontvangt een blanke pagina die we later nog kunnen invullen, en wannener je niet bent ingelog dan wordt je door gestuurd naar de inlog pagina.

Wanneer je al gebruiker bent wordt er eerst gecheckt of er een aanvraag is met een post methode. Wanneer dat niet waar is wordt er direct gecheckt of de huidige gebruiker al een verkoper is. Wanneer dit waar is zal hij een bericht krijgen op zijn scherm dat hij al verkoper is met een knop om terug te keren naar de hoofdpagina. 

Wanneer de gebruiker nog niet verkoper is zal hij een uitleg tekst te zien krijgen en daarna een formulier. Waarbij de controle keuze met javascript bepaald of er nog een ```input``` veld bij komt. Wanneer alle velden zijn ingevuld en er op de inlever knop wordt gedrukt zal de pagina herladen.

Door de eerder aangegeven post check zullen nu met prepared statements de gegevens in de database geplaatst worden.

## Profielpagina
Als de gebruiker ingelogd is en op de `Mijn profiel` knop drukt komt er een pagina met 2 opties tevoorschijn:  

De gebruiker kan verkoper worden (zie kopje **_Verkoper worden_** hierboven) of de gebruiker kan zijn gegevens aanpassen (zie kopje **_Gegevens aanpassen_** hieronder). 

Als laatste is er een administrator pagina die alleen weergegeven wordt als de gebruiker een administrator is. 
Dit wordt gedaan met een `IF ELSEIF-statement` en met een `isset $_SESSION` om te checken wat voor account er is ingelogd.
(zie kopje **_Admin dashboard_** hieronder)

Is een gebruiker niet ingelogd komt en komt hij of zijn toch op een profielpagina. Dan krijgt de gebruiker een melding dat er eerst ingelogd moet worden, na 2 seconden is er een `redirect` naar de inlogpagina.

## Gegevens aanpassen
Nadat er op de profielpagina op de `Gegevens aanpassen`-knop is geklikt kom je op deze pagina.

De pagina die wordt gebruikt voor het aanpassen van het profiel is grotendeels gebaseerd op de registreren pagina. Er zijn een paar velden verwijderd en aangepast. Daarna is er code voor het veranderen en weergeven van de gegevens toegevoegd. 

De ingelogde gebruiker krijgt zijn data uit de database te zien. Dit wordt gedaan door met een `foreach` de data uit de database te halen en deze in de `value` van een `input-field` te zetten. 
Hier komen een paar problemen tevoorschijn omdat de `chars` die in de database staan heel veel spaties aan het einde hebben. Gelukkig is hier een PHP-functie voor. Door `rtrim()` binnen de `values` toe te voegen wordt alle data goed weergegeven, verzonden en vergeleken.

Als de gebruiker zijn data heeft aangepast en het wachtwoord is geverifieerd, wordt met een `prepared statement` het formulier naar de database verstuurd en de gegevens aangepast.


## Account verwijderen
Als de gebruiker op de gegevens aanpassen pagina naar onder scrolt, staat er een knop om je gegevens te verwijderen. 

De gebruiker gaat dan naar een aparte pagina waar de gebruikersnaam staat en het wachtwoord moet worden ingegeven. Als de gebruiker een `checkbox` heeft aangevinkt waarmee hij aangeeft het account echt te willen 
En het wachtwoord klopt worden met meerdere `prepared statements` de gegevens verwijderd. 

Het kan voorkomen dat verwijderen niet meteen een optie is omdat de gebruiker advertenties of biedingen heeft openstaan.
Dan wordt de gebruiker in de openstaande acties veranderd naar `VERWIJDERDE_GEBRUIKER` en wordt het account van de gebruiker alsnog verwijderd.
Als deze `DELETE-` en `UPDATE-statements` succesvol zijn uitgevoerd wordt met een `session_destroy();` alle `session variabelen` verwijderd en een nieuwe `session` gestart.

## Admin dashboard  
@Osama verder 

## Databatch conversie 
De databatch conversie was veel ingewikkelder dan gedacht, dit is verder toegelicht in sprint review 3 en de persoonlijke projectverslagen. 
Het komt er kort op neer dat er te laat naar is gekeken en daardoor te weinig tijd was om de (zwaar) vervuilde database op te schonen.
Hierdoor hebben we alleen de categorieën compleet geïmporteerd. 

Om herhaling minimaal te houden laat ik de stappen zien die ik heb genomen in het uiteindelijke script. 
Als deze stappen juist zijn uitgevoerd kom je op de huidige database structuur uit. 
1. Constraint uitzetten met een `NOCHECK-Statement` 
2. De oude data verwijderen met een `DELETE-Statement`
3. Constraint weer aanzetten met een `CHECK-Statement`
4. De `CREATE-` en `DELETE-Statements` uit de databatch aanpassen om de rubrieken in een aparte `importeer-tabel` te zetten
5. De lengte van de rubrieknaam wordt met een `ALTER TABLE-` en `ALTER COLUMN-Statements` verhoogd omdat het anders te kort is voor de nieuwe rubrieknamen
6. Hoofdrubrieken met een `INSERT-SELECT`-combinatie importeren. Een aantal manipulaties van de data zijn nog nodig om ze te laten aansluiten op de huidige data in de database.
7. Subrubrieken met een `INSERT-SELECT`-combinatie importeren. Een aantal manipulaties van de data zijn nog nodig om ze te laten aansluiten op de huidige data in de database.

Uiteindelijk stond alles goed in de database maar werd het verkeerd op de site weergegeven. 
Dit was een probleem in de PHP-code en is na overleg en onderzoek door de maker van de code opgelost.


## Invoeren veiling
Als de gebruiker een nieuwe veiling wilt openen, moet hij of zij naar de `insertproduct.php` pagina. Hiervoor moet de gebruiker wel een verkoper zijn. Is de gebruiker dat niet, wordt hij naar de index gestuurd.

Allereerst moet de juiste rubriek worden gevonden. De rubrieken worden uit de `POST-METHOD` gehaald. Eerst wordt de hoofdcategorie geselecteerd. Vervolgens krijgt het systeem het `rubrieknummer` en vullen ze de volgende selectielijst met de bijbehorende subcategorieën. En hetzelfde proces voor sub-subcategorieën.

Daarna moeten er wat algemene gegevens worden ingevoerd, zoals titel, prijs, omschrijving en land van herkomst. Deze velden zijn `required` en moeten dus worden ingevoerd, anders wordt er geen nieuwe veiling aangemaakt. 

Tot slot moet de verkoper een `image` uploaden. Met een input script wordt de image gekopieerd in de directory. Filepath is vooraf bepaald, zodat alle images in dezelde map komen.
Met een `INSERT` query worden alle gegevens in de database gezet.
