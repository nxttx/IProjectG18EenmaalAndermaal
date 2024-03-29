<?php
if(!isset($dbh)){
    include "php/dbh.php" ;
    $dbh = connectToDatabase();
}else{
    //nothing
}

?>

<footer class="footer">
    <div class="container">
        <div id="desktop">
            <div class="columns">
                <div class="column is-4">
                    <p class="title">
                        <a href="index.php">Home</a>
                    </p>
                    <p class="is-link">
                        <a href="../categorieen.php">Categorieën </a>
                    </p>
                    <?php if (!isset($_SESSION['user'])) { ?>
                        <p class="is-link">
                            <a href="../register.php">Registreren</a>
                        </p>
                        <p class="is-link">
                            <a href="../login.php">Inloggen </a>
                        </p>
                    <?php } elseif (isset($_SESSION['user'])) { ?>
                        <p class="link"><a href="../profile.php">Mijn profiel</a></p>
                        <p class="is-link is-large">
                            <a href="../mijn_biedingen.php">Mijn biedingen</a>
                        </p>
                        <?php
                        $sth = $dbh->prepare("SELECT COUNT(gebruiker)as x FROM verkoper WHERE gebruiker=:username");
                        $sth->bindParam(':username', $_SESSION['user']);
                        $sth->execute();
                        foreach ($sth->fetchAll(PDO::FETCH_ASSOC) as $row) {
                            $results=$row['x'];
                        }
                        if($results <1){ //niet verkoper ?>
                            <p class="is-link is-large">
                                <a href="../verkoper_worden.php">Wordt verkoper</a>
                            </p>
                        <?php } else{ //verkoper?>
                            <p class="is-link is-large">
                                <a href="Insertproduct.php">Plaats advertentie</a>
                            </p>
                        <?php }?>
                    <?php }; ?>


                </div>
                <div class="column is-4">
                    <p class="title">
                        <a href="#">EenmaalAndermaal</a>
                    </p>
                    <p class="is-link">
                        <a href="../about.php">Over Ons</a>
                    </p>
                    <p class="is-link">
                        <a href="../contact.php">Contact</a>
                    </p>
                    <p class="is-link">
                        <a href="../tos.php">Algemene voorwaarden</a>
                    </p>
                    <p class="is-link">
                        <a href="../faq.php">Veel gestelde vragen</a>
                    </p>
                </div>
                <div class="column is-4">
                    <p class="title">
                        <a href="#">Social</a>
                    </p>
                    <p class="is-link">
                        <a href="https://instagram.com" target="_blank">Instagram</a>
                    </p>
                    <p class="is-link">
                        <a href="https://facebook.com" target="_blank">Facebook</a>
                    </p>
                    <p class="is-link">
                        <a href="https://twitter.com" target="_blank">Tweet Tweet Twitter</a>
                    </p>
                </div>
            </div>
        </div>
        <div id="mobile" style="margin-top:-2em;">
            <details>
                <summary class="title">Home</summary>
                <p class="is-link is-large">
                    <a href="../categorieen.php">Categorieën </a>
                </p>
                <?php if (!isset($_SESSION['user'])) { ?>
                    <p class="is-link">
                        <a href="../register.php">Registreren</a>
                    </p>
                    <p class="is-link">
                        <a href="../login.php">Inloggen </a>
                    </p>
                <?php } elseif (isset($_SESSION['user'])) { ?>
                    <p class="link"><a href="../profile.php">Mijn profiel</a></p>
                    <p class="is-link is-large">
                        <a href="../mijn_biedingen.php">Mijn biedingen</a>
                    </p>
                    <?php
                    $sth = $dbh->prepare("SELECT COUNT(gebruiker)as x FROM verkoper WHERE gebruiker=:username");
                    $sth->bindParam(':username', $_SESSION['user']);
                    $sth->execute();
                    foreach ($sth->fetchAll(PDO::FETCH_ASSOC) as $row) {
                        $results=$row['x'];
                    }
                    if($results <1){ //niet verkoper ?>
                                        <p class="is-link is-large">
                                            <a href="../verkoper_worden.php">Wordt verkoper</a>
                                        </p>
                    <?php } else{ //verkoper?>
                                        <p class="is-link is-large">
                                            <a href="Insertproduct.php">Plaats advertentie</a>
                                        </p>
                        <?php }?>
                <?php }; ?>


            </details>
            <details>
                <summary class="title">EenmaalAndermaal</summary>
                <p class="is-link is-large">
                    <a href="../about.php">Over Ons</a>
                </p>
                <p class="is-link is-large">
                    <a href="../contact.php">Contact</a>
                </p>
                <p class="is-link is-large">
                    <a href="../tos.php">Algemene voorwaarden</a>
                </p>
                <p class="is-link is-large">
                    <a href="../faq.php">Veel gestelde vragen</a>
                </p>
            </details>
            <details>
                <summary class="title">Social</summary>
                <p class="is-link">
                    <a href="https://instagram.com" target="_blank">Instagram</a>
                </p>
                <p class="is-link">
                    <a href="https://facebook.com" target="_blank">Facebook</a>
                </p>
                <p class="is-link">
                    <a href="https://twitter.com" target="_blank">Tweet Tweet Twitter</a>
                </p>
            </details>
        </div>
        <br>
        <br>
        <br>
        <div class="columns is-mobile is-centered is-paddingless is-marginless" id="copyright">
            <div class="column is-paddingless is-marginless"></div>
            <div class="column is-center is-paddingless is-marginless"><p class="is-center">Copyright &copy; | 2020-2021
                    EenmaalAndermaal</p></div>
            <div class="column is-paddingless is-marginless"></div>
        </div>

    </div>
</footer>
<script src="../js/footer.js"></script>
</body>
</html>