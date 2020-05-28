<!--Gebruik de code in deze pagina om een nieuwe pagina aan te maken. Op deze houden we overal dezelfde stijl -->

<?php
$siteTitle = "titel";
?>

<?php include "includes/head.php" ?>
<?php include "includes/header.php" ?>
<section>
    <div class="container">
        <br>

        <div class="card ">
            <div class="card-content">
                <h2 class="title is-2  has-text-centered">Titel</h2>
                <p class="subtitle is-5  has-text-centered">Subtitel is dit maar die is meerdere woorden </p>
            </div>
        </div>

        <br>
        <label for="gebruikersnaam" class="label">Gebruikersnaam:</label>
        <input class="input is-primary" type="text" name="gebruikersnaam"
               id="gebruikersnaam" value="' . rtrim($row['gebruikersnaam']) . '" disabled="disabled">
        <br>


        <form class="field">
            <!--namen:-->
            <br>
            <div class="columns">
                <div class="column is-half">
                    <div class="field">
                        <label for="voornaam" class="label">Voornaam:</label>
                        <div class="control">
                            <input class="input is-primary" type="text" name="voornaam"
                                   value="' . rtrim($row['voornaam']) . '"
                                   maxlength="50" disabled="disabled">
                        </div>
                    </div>
                </div>
                <div class="column is-half">
                    <div class="field">
                        <label for="achternaam" class="label">Achternaam:</label>
                        <div class="control">
                            <input class="input is-primary"
                                   value="' . rtrim($row['achternaam']) . '"
                                   type="text" name="achternaam"
                                   maxlength="50" disabled="disabled">
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <!--adress-->
            <div class="columns">
                <div class="column is-half">
                    <div class="field">
                        <label for="adresregel1" class="label">Adres:</label>
                        <p class="control has-icons-left">
                            <input class="input is-primary" type="text" name="adresregel1"
                                   value="' . rtrim($row['adresregel1']) . '"
                                   maxlength="100" disabled="disabled">
                            <span class="icon is-small is-left">
               <i class="fas fa-map-marked-alt"></i>
               </span>
                        </p>
                    </div>
                </div>
                <div class="column is-half">
                    <div class="field">
                        <label for="adresregel2" class="label">Adres 2:</label>
                        <p class="control has-icons-left">
                            <input class="input is-primary" type="text" name="adresregel2"
                                   value="' . rtrim($row['adresregel2']) . '"
                                   maxlength="100" disabled="disabled">
                            <span class="icon is-small is-left">
               <i class="fas fa-map-marked-alt"></i>
               </span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="columns">
                <div class="column is-half">
                    <div class="field">
                        <label for="postcode" class="label">Postcode:</label>
                        <div class="control has-icons-left">
                            <input class="input is-primary" type="text" name="postcode"
                                   value="' . rtrim($row['postcode']) . '"
                                   maxlength="20" disabled="disabled">
                            <span class="icon is-small is-left">
               <i class="fas fa-map-marked-alt"></i>
               </span>
                        </div>
                    </div>
                </div>
                <div class="column is-half">
                    <div class="field">
                        <label for="plaatsnaam" class="label">Plaatsnaam: *</label>
                        <div class="control has-icons-left">
                            <input class="input is-primary" type="text" name="plaatsnaam"
                                   value="' . rtrim($row['plaatsnaam']) . '"
                                   maxlength="50" disabled="disabled">
                            <span class="icon is-small is-left">
               <i class="fas fa-map-marked-alt"></i>
               </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="columns">
                <div class="column is-half">
                    <div class="field">
                        <label for="land" class="label">Land:</label>
                        <div class="control has-icons-left">
                            <input class="input is-primary" type="text" name="plaatsnaam"
                                   value="' . rtrim($row['land']) . '"
                                   maxlength="50" disabled="disabled">
                            <span class="icon is-small is-left">
                            <i class="fas fa-map-marked-alt"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="column is-half">
                    <div class="field">
                        <label for="birthdate" class="label">Geboortedatum: *</label>
                        <p class="control has-icons-left">
                            <input class="input is-primary" type="text" name="birthdate"
                                   value="' . rtrim($row['geboorteDag']) . '"
                                   maxlength="10" disabled="disabled">
                            <span class="icon is-small is-left">
               <i class="far fa-calendar-alt"></i>
               </span>
                        </p>
                    </div>
                </div>
            </div>
            <br>
            <!--                    Persoonlijk-->
            <div class="columns">
                <div class="column is-half">
                    <div class="field">
                        <label for="email" class="label">Email:</label>
                        <p class="control has-icons-left">
                            <input class="input is-primary" type="email" name="email"
                                   value="' . rtrim($row['emailadress']) . '"
                                   required maxlength="50" disabled="disabled">
                            <span class="icon is-small is-left">
               <i class="fas fa-envelope"></i>
               </span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="column is-full">
                <div class="field">
                    <td>
                    <div class="columns is-vcentered">
                        <div class="column is-1">
                            <button class="button is-primary" name="akkoord" type="submit">Akkoord</button>
                        </div>
                        <div class="column">
                            <button class="button is-primary" name="delete" type="submit">Delete</button>
                        </div>
                    </div>
                    </td>

                </div>
            </div>
        </form>
    </div>
    <br>
</section>
<?php include "includes/footer.php" ?>