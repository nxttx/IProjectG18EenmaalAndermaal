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

## Breadcrumbs
Controleer de Rubriek, ALS Rubriek NULL is, identificeren ze dat dit een hoofdcategorie is.
Daarna als Rubriek niet null is dan berekenen ze de Rubriek NULL en als Rubriek <= Aantal hoofdcategorieën. Vervolgens identificeren ze deze subcategorie en en rubrieknaam de hoofdcategorie.
Tot slot als Rubriek is> Aantal hoofdcategorieën + 1, Ze identificeren dat dit een SubSub-categorie is, Subcat = rubriek.

## Inloggen
Login.php is de daadwerkelijk zichtbare pagina waar men zijn of haar credentials kan invoeren. Op de inlogform zit een onsubmit-event waarin de functie login wordt uitgevoerd. In de login functie wordt een POST-request geopend naar het bestand authenticate.php. In dit bestand wordt de gebruikersnaam in een sql-statement gezet en wordt de wachtwoordhash vergeleken met het ingevoerde wachtwoord. Indien het wachtwoord correct is wordt een HTTP response code 200 terugstuurd. Indien de gebruikersnaam bestaat maar het wachtwoord verkeerd is wordt een 404 teruggestuurd. Eigenlijk is dit een 401 - unauthorized, maar om niet het idee te geven dat de gebruikersnaam correct is en vervolgens meerdere wachtwoorden geprobeerd worden bij een hack wordt het een 404. Indien de gebruikersnaam niet herkent wordt, wordt er ook een 404 teruggestuurd. Bij correcte gegevens wordt een user session variabele aangemaakt en wordt de gebruiker doorverwezen naar de homepagina.