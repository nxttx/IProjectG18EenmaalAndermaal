<?php
$siteTitle = "Over ons";
ob_start();
?>

<?php include "includes/head.php" ?>
<?php include "includes/header.php" ?>
<?php include "php/dbh.php" ?>

<?php
    if(isset($_SESSION["user"])){
        $name='';
        $userr=$_SESSION["user"];
        $dbh = connectToDatabase();
        $smtve = $dbh->prepare("select * From verkoper where gebruiker='$userr'");
        $smtve->execute();
        $data = $smtve->fetchAll();

        foreach ($data as $row): 
        $name=$row["gebruiker"];

        endforeach;

        if($name==''){
            header("location: index.php");
        }				
    }
else {
    header("location: index.php");
}

?>
<section>



    <div class="notification">
        <form method="post" action="insertproduct.php" enctype="multipart/form-data">
            <div class="field">
                <label class="label">Productnaam</label>
                <div class="control">
                    <input class="input" name="titel"  type="text" placeholder="Productnaam">
                </div>
            </div>

            <div class="field">
                <label class="label">Startprijs</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input is-success" name="prijs" type="text" placeholder="Bedrag" >
                    <span class="icon is-small is-left">
                        <i class="fas fa-money-check"></i>
                    </span>
                    <span class="icon is-small is-right">
                        <i class="fas fa-check"></i>
                    </span>
                </div>

            </div>

            <div class="field">
                <label class="label">Betalingswijze</label>

                <div class="control">

                    <div class="select">

                        <select name="betaling">

                            <option>Bank</option>
                            <option>Creditcard</option>
                        </select>
                    </div>
                </div>
            </div>

            <?php
            $dbh = connectToDatabase();
            $smt = $dbh->prepare('select * From Rubriek');
            $smt->execute();
            $data = $smt->fetchAll();

            ?>

            <div class="field">
                <label class="label">Categorie</label>
                <div class="control">
                    <div class="select">
                        <select name="categorie">
                            <?php foreach ($data as $row): ?>
                            <option value="<?=$row["rubrieknummer"];
                                    ?>"><?=$row["rubrieknaam"];
                                ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
            </div>
            <?php

            ?>
            <div class="field">
                <label class="label">Beschrijving</label>
                <div class="control">
                    <textarea class="textarea" name="beschrijving" placeholder="Beschrijving van product"></textarea>
                </div>
            </div>

            <div class="field">
                <label class="label">Land</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input is-success" name="land" type="text" placeholder="Land" >
                    <span class="icon is-small is-left">
                        <i class="fas fa-globe-europe"></i>
                    </span>
                </div>
            </div>
            <div class="field">
                <label class="label">Plaats</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input is-success" name="plaats" type="text" placeholder="Plaats" >
                </div>
            </div>

            <div class="file">
                <label class="file-label">
                    <input class="file-input" type="file" name="pic" id="propic">
                    <span class="file-cta">
                        <span class="file-icon">
                            <i class="fas fa-upload"></i>
                        </span>
                        <span class="file-label">
                            Choose a file…
                        </span>
                    </span>
                </label>
            </div>

            <div class="field">
                <div class="control">
                    <label class="checkbox">
                        <input type="checkbox" name="check" value="check">
                        Ik accepteer de <a href="tos.php">Algemene voorwaarden</a>
                    </label>
                </div>
            </div>



            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-link" name="insertproduct">Submit</button>
                </div>
                <div class="control">
                    <button class="button is-link is-light">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</section>
<?php include "includes/footer.html" ?>
<?php






    if(isset($_POST['insertproduct'])){
        $userr=$_SESSION["user"];
        $dbh = connectToDatabase();
        $smtid = $dbh->prepare('select * From voorwerp');
        $smtid->execute();
        $data = $smtid->fetchAll();

        foreach ($data as $row): 
        $iid=$row["voorwerpnummer"];

        endforeach;

        $idn=$iid+1;
        $product_titel = $_POST['titel'];
        $product_prijs = $_POST['prijs'];
        $product_betalingswijze = $_POST['betaling'];
        $product_categorie = $_POST['categorie'];
        $product_beschrijving = $_POST['beschrijving'];
        $product_land = $_POST['land'];
        $product_plaats = $_POST['plaats'];
        if(isset($_FILES['pic']['name']));
        $picname=$_FILES['pic']['name'];
        $tmp=$_FILES['pic']['tmp_name'];

        $ext="jpg";
        $picpath="data/voorwerpen/$product_titel.$ext";

        move_uploaded_file($tmp,$picpath); 


        if ($product_titel == '' OR $product_prijs == '' OR $product_betalingswijze == '' OR $product_categorie == '' OR $product_beschrijving == '' OR $_POST['check'] == ''){
            echo "<script>alert('Vul alle velden in')</script>";
            exit();

        }

        $dbh = connectToDatabase();
        $smte = $dbh->prepare("INSERT INTO voorwerp (voorwerpnummer, titel, beschrijving, startprijs, Betalingswijze, betalingsinstructie, 
						plaatsnaam, land, LooptijdbeginDag, LooptijdbeginTijdstip, Verzendkosten,
						verzendinstructies, Verkoper, Koper, LooptijdeindeDag, LooptijdeindeTijdstip, VeilinGesloten, Verkoopprijs)
VALUES	   ('$idn', '$product_titel','$product_beschrijving','$product_prijs', '$product_betalingswijze', 'Overschrijving moet ontvangen zijn binnen 10 dagen na verkoop', '$product_plaats', '$product_land', CONVERT(date, GETDATE()), CONVERT(time, GETDATE()), '6,95', null , 'aliquet', NULL, '22-mei-20', '12:46:', 'niet', null)");
        $smte->execute();

        $dbh = connectToDatabase();
        $smtc = $dbh->prepare("INSERT INTO voorwerpinrubriek (voorwerp, rubriekoplaagsteniveau) VALUES ('$idn', '$product_categorie')");
        $smtc->execute();

        $dbh = connectToDatabase();
        $smtpic = $dbh->prepare("INSERT INTO bestand (filenaam, voorwerpnummer) VALUES ('$picpath', '$idn')");
        $smtpic->execute();




    }
