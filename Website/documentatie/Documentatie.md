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

## Profiel aanpassen
De pagina die wordt gebruikt voor het aanpassen van het profiel is grotendeels gebaseerd op de registreren pagina. Er zijn een paar velden verwijderd en daarna is er code toegevoegd. De ingelogde gebruiker krijgt zijn data uit de database te zien. Dit wordt gedaan door met een  `foreach` de data uit de database te halen en deze in de `value` van een `input-field` te zetten. 

Hier zitten een paar problemen aan omdat de `strings` die in de database staan heel veel spaties aan het einde hebben. Gelukkig is hier een PHP-functie voor. Door `rtrim()` binnen de `values` toe te voegen wordt alle data goed weergegeven, verzonden en vergeleken.

Als de gebruiker zijn data heeft aangepast en het wachtwoord is geverifieerd wordt met een `prepared statement` het formulier naar de database verstuurd en de gegevens aangepast.

## Gegevens verwijderen
Als de gebruiker ingelogd is en op de `Mijn profiel` knop drukt komt er een pagina met 2 knop/opties tevoorschijn. de gebruiker klan verkoper worden(zie hietrboven) of gegevens aanpassen. Op de gegevens aanpassen pagina kan de gebruiker op een knop drukken om zijn gegevens te verwijderen

