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
