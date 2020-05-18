<!--Gebruik de code in deze pagina om een nieuwe pagina aan te maken. Op deze houden we overal dezelfde stijl -->

<?php
$siteTitle = "Registreer uw account";
?>

<?php include "includes/head.php" ?>
<?php include "includes/header.php" ?>
<section>
    <div class="container">
        <br>
        <div class="card ">
            <div class="card-content">
                <h2 class="title is-2  has-text-centered">Registreren</h2>
                <form method="post" action="php/registerenintodatabase.php">
                    <div class="columns">
                        <div class="column is-full">
                            <label for="gebruikersnaam" class="label">Uw gebruikersnaam: *</label>
                            <div class="field has-addons">

                                <div class="control has-icons-left">
                                    <input class="input is-primary" type="text" name="gebruikersnaam"
                                           id="gebruikersnaam"
                                           placeholder="Uw gebruikersnaam" maxlength="50" minlength="5" required>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-user"></i>
                                    </span>
                                </div>
                                <a class="button" onclick="testUsername(document.getElementById('gebruikersnaam').value)">Check beschikbaarheid</a>

                            </div>
                            <p class="help">Uw gebruikersnaam moet minimaal 5 tekens lang zijn.</p>
                            <iframe id="testusername" style="display:none" height="100" width="100%" scrolling="no"></iframe>
                        </div>
                    </div>
                    <!--namen:-->
                    <div class="columns">
                        <div class="column is-half">
                            <div class="field">
                                <label for="voornaam" class="label">Uw voornaam: *</label>
                                <div class="control">
                                    <input class="input is-primary" type="text" name="voornaam"
                                           placeholder="Uw voornaam"
                                           maxlength="50" required>
                                </div>
                            </div>
                        </div>
                        <div class="column is-half">
                            <div class="field">
                                <label for="achternaam" class="label">Uw achternaam: *</label>
                                <div class="control">
                                    <input class="input is-primary" type="text" name="achternaam"
                                           placeholder="Uw achternaam"
                                           maxlength="50" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <!--                    adress-->
                    <div class="columns">
                        <div class="column is-half">
                            <div class="field">
                                <label for="adresregel1" class="label">Uw adres: *</label>
                                <p class="control has-icons-left">
                                    <input class="input is-primary" type="text" name="adresregel1"
                                           placeholder="Uw adres"
                                           maxlength="100" required>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-map-marked-alt"></i>
                                    </span>
                                </p>
                            </div>
                        </div>
                        <div class="column is-half">
                            <div class="field">
                                <label for="adresregel2" class="label">Tweede adres regel:</label>
                                <p class="control has-icons-left">
                                    <input class="input is-primary" type="text" name="adresregel2"
                                           placeholder="Uw adres" maxlength="100">
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
                                <label for="postcode" class="label">Uw postcode: *</label>
                                <div class="control has-icons-left">
                                    <input class="input is-primary" type="text" name="postcode"
                                           placeholder="1234 AB"
                                           maxlength="20" required>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-map-marked-alt"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="column is-half">
                            <div class="field">
                                <label for="plaatsnaam" class="label">Uw plaatsnaam: *</label>
                                <div class="control has-icons-left">
                                    <input class="input is-primary" type="text" name="plaatsnaam"
                                           placeholder="Amsterdam" maxlength="50" required>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-map-marked-alt"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column">

                            <div class="field">
                                <label for="land" class="label">Uw land: *</label>
                                <div class="control has-icons-left">
                                    <span class="select">
                                        <select name="land" class="input is-primary">
                                            <option value="Nederland">Nederland</option>
                                            <option value="België">België</option>
                                            <option value="Luxemburg">Luxemburg</option>
                                        </select>
                                    </span>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-globe"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <!--                    Persoonlijk-->
                    <div class="columns">
                        <div class="column is-half">
                            <div class="field">
                                <label for="birthdate" class="label">Uw geboorte datum: *</label>
                                <p class="control has-icons-left">
                                    <input class="input is-primary" type="text" name="birthdate"
                                           placeholder="DD/MM/JJJJ"
                                           maxlength="10" required>
                                    <span class="icon is-small is-left">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                </p>
                            </div>
                        </div>
                        <div class="column is-half">
                            <div class="field">
                                <label for="email" class="label">Uw email: *</label>
                                <p class="control has-icons-left">
                                    <input class="input is-primary" type="email" name="email" placeholder="Uw email"
                                           required maxlength="50">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-envelope"></i>
                                     </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <br>
                    <!--                    wachtwoord-->
                    <div class="columns">
                        <div class="column is-half">
                            <div class="field">
                                <label for="wachtwoordregel1" class="label">Uw wachtwoord: *</label>
                                <div class="control has-icons-left">
                                    <input class="input is-primary" type="password" name="wachtwoordregel1" id="wachtwoordregel1"
                                           placeholder="********" oninput="checkPasswordLength()" minlength="8"
                                           required>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-key"></i>
                                    </span>
                                    <p class="help">Uw wachtwoord moet minimaal 8 tekens lang zijn.</p>
                                </div>
                            </div>
                        </div>
                        <div class="column is-half">
                            <div class="field">
                                <label for="wachtwoordregel2" class="label">Uw wachtwoord herhaling: *</label>
                                <div class="control has-icons-left">
                                    <input class="input is-primary" type="password" name="wachtwoordregel2" id="wachtwoordregel2"
                                           placeholder="*******" oninput="checkPasswordIsTheSame()" minlength="8"
                                           required>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-key"></i>
                                    </span>
                                    <p class="help">Uw wachtwoord moet gelijk zijn.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="columns">
                        <div class="column is-half">
                            <div class="field">
                                <label for="vraag" class="label">Beveiligings vraag: *</label>
                                <div class="control has-icons-left">
                                    <span class="select">
                                        <select name="vraag" class="input is-primary">
                                            <option value='1'>In welke straat ben je geboren?</option>
                                            <option value='2'>Wat is de meisjesnaam je moeder?</option>
                                            <option value='3'>Wat is je lievelingsgerecht?</option>
                                            <option value='4'>Hoe heet je oudste zusje?</option>
                                            <option value='5'>Hoe heet je huisdier?</option>
                                        </select>
                                    </span>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-fingerprint"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="column is-half">
                            <div class="field">
                                <label for="antwoord" class="label">Antwoord tekst: *</label>
                                <div class="control has-icons-left">
                                    <input class="input is-primary" type="text" name="antwoord"
                                           placeholder="Kalverslaan " maxlength="255" required>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-fingerprint"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
<!--                    Final buttons -->
                    <div class="columns">
                        <div class="column"></div>
                        <div class="column has-text-centered">
                            <label class="checkbox">
                                <input type="checkbox" required>
                                I agree to the <a href="tos.php" target="_blank">terms and conditions</a>
                            </label>

                        </div>
                        <div class="column"></div>
                    </div>
                    <div class="columns">
                        <div class="column"></div>
                        <div class="column has-text-centered">
                            <div class="field">
                                <input class="button is-primary" type="submit" value="Submit">
                                <input class="button has-text-primary" type="reset" value="Reset">

                            </div>


                        </div>
                        <div class="column"></div>
                    </div>





                </form>
            </div>
        </div>
        <br>
    </div>
</section>
<script src="js/registreren.js"></script>
<?php include "includes/footer.html" ?>