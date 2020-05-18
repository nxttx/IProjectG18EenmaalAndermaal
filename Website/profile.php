<?php
$siteTitle = "Mijn profiel";
?>

<?php include "includes/head.php" ?>
<?php include "includes/header.php" ?>
    <section>
        <div class="container">
            <br>
            <div class="card ">
                <div class="card-content">


                    <?php if (!isset($_SESSION['user'])) { ?>
                        <h2 class="title is-3">U bent nog niet ingelogd, u wordt doorgestuurd naar de inlogpagina</h2>
                        <h3 class="subtitle is-5">Gebeurt dit niet automatisch binnnen enkele seconden? Klik dan <a
                                    href="login.php">hier.</a></h3>

                        <script>
                            setTimeout(function () {
                                window.location.href = 'login.php';
                            }, 2000)
                        </script>

                    <?php } elseif ($_SESSION['user'] == "admin") { ?>
                        <!--html admin -->


                    <?php }
                    elseif (isset($_SESSION['user'])) { ?>
                        <!--html user-->
                        <h1 class="title is-1 has-text-centered">Mijn gegevens</h1>
                        <h3 class="subtitle is-size-5 has-text-centered">Hier kunt u uw gegevens bekijken en
                            aanpassen</h3>


                        <form method="post" action="">
                            <div class="columns">
                                <div class="column is-full">
                                    <label for="gebruikersnaam" class="label">Uw gebruikersnaam: *</label>
                                    <div class="field has-addons">

                                        <div class="control has-icons-left">
                                            <input class="input is-primary" type="text" name="gebruikersnaam"
                                                   id="gebruikersnaam"
                                                   placeholder="YOUR DATA FROM THE DB" maxlength="50" minlength="5"
                                                   required>
                                            <span class="icon is-small is-left">
                                        <i class="fas fa-user"></i>
                                    </span>
                                        </div>
                                        <a class="button"
                                           onclick="">Check beschikbaarheid</a>

                                    </div>
                                    <p class="help">Uw gebruikersnaam moet minimaal 5 tekens lang zijn.</p>
                                    <iframe id="testusername" style="display:none" height="100" width="100%"
                                            scrolling="no"></iframe>
                                </div>

                            </div>
                            <!--namen:-->
                            <div class="columns">
                                <div class="column is-half">
                                    <div class="field">
                                        <label for="voornaam" class="label">Uw voornaam: *</label>
                                        <div class="control">
                                            <input class="input is-primary" type="text" name="voornaam"
                                                   placeholder="YOUR DATA FROM THE DB"
                                                   maxlength="50" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-half">
                                    <div class="field">
                                        <label for="achternaam" class="label">Uw achternaam: *</label>
                                        <div class="control">
                                            <input class="input is-primary" type="text" name="achternaam"
                                                   placeholder="YOUR DATA FROM THE DB"
                                                   maxlength="50" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <!--adress-->
                            <div class="columns">
                                <div class="column is-half">
                                    <div class="field">
                                        <label for="adresregel1" class="label">Uw adres: *</label>
                                        <p class="control has-icons-left">
                                            <input class="input is-primary" type="text" name="adresregel1"
                                                   placeholder="YOUR DATA FROM THE DB"
                                                   maxlength="100" required>
                                            <span class="icon is-small is-left">
                                        <i class="fas fa-map-marked-alt"></i>
                                    </span>
                                        </p>
                                    </div>
                                </div>
                                <div class="column is-half">
                                    <div class="field">
                                        <label for="adresregel2" class="label">Uw adres:</label>
                                        <p class="control has-icons-left">
                                            <input class="input is-primary" type="text" name="adresregel2"
                                                   placeholder="YOUR OPTIONAL DATA FROM THE DB" maxlength="100">
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
                                                   placeholder="YOUR DATA FROM THE DB"
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
                                                   placeholder="YOUR DATA FROM THE DB" maxlength="50" required>
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
                                                   placeholder="YOUR DATA FROM THE DB"
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
                                            <input class="input is-primary" type="email" name="email"
                                                   placeholder="YOUR DATA FROM THE DB"
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
                                            <input class="input is-primary" type="password" name="wachtwoordregel1"
                                                   id="wachtwoordregel1"
                                                   placeholder="YOUR DATA FROM THE DB" oninput="" minlength="8"
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
                                            <input class="input is-primary" type="password" name="wachtwoordregel2"
                                                   id="wachtwoordregel2"
                                                   placeholder="YOUR DATA FROM THE DB" oninput=""
                                                   minlength="8"
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
                                                   placeholder="YOUR DATA FROM THE DB " maxlength="255" required>
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
                                        Ik ga akkoord met <a href="tos.php" target="_blank">de algemene voorwaarden.</a>
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


                    <?php } ?>
                </div>
            </div>

            <br>

        </div>
    </section>


<?php include "includes/footer.php" ?>