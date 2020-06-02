<?php
$siteTitle = "Product toevoegen";
ob_start();
?>

<?php include "includes/head.php" ?>
<?php include "includes/header.php" ?>
<?php include "php/dbh.php" ?>

<?php
//session_destroy();

if (isset($_SESSION["user"])) {
    $name = '';
    $userr = $_SESSION["user"];
    $dbh = connectToDatabase();
    $smtve = $dbh->prepare("select * From verkoper where gebruiker='$userr'");
    $smtve->execute();
    $data = $smtve->fetchAll();

    foreach ($data as $row):
        $name = $row["gebruiker"];

    endforeach;

    if ($name == '') {
        header("location: index.php");
    }
} else {
    header("location: index.php");
}

?>
    <section>
        <div class="container">
            <br>

            <div class="card ">
                <div class="card-content">
                    <h2 class="title is-2  has-text-centered">Product toevoegen</h2>
                    <form method="post" action="insertproduct.php" enctype="multipart/form-data">


                        <?php
                        $dbh = connectToDatabase();
                        $smt = $dbh->prepare('select * From Rubriek where Rubriek IS NULL');
                        $smt->execute();
                        $data = $smt->fetchAll();
                        if (isset($_POST['categorie'])) {
                            $categorie = $_POST['categorie'];
                            $_SESSION['categorie'] = $categorie;
                        }

                        ?>

                        <div class="field">
                            <label class="label">Categorie <font style="margin-left:12%;"></font> <font
                                        style="margin-left:8%;"></font></label>
                            <div class="control">
                                <div class="select">
                                    <select class="input is-primary" name="categorie" onchange='this.form.submit()'>

                                        <?php

                                        if (isset($_SESSION['categorie'])) {
                                            $showcat = $_SESSION['categorie'];
                                            $dbh = connectToDatabase();
                                            $smts = $dbh->prepare("select * From Rubriek where rubrieknummer='$showcat'");
                                            $smts->execute();
                                            $datas = $smts->fetchAll();

                                            foreach ($datas as $rows):
                                                echo '<option value="' . $rows["rubrieknummer"] . '">' . $rows["rubrieknaam"] . '</option>';
                                            endforeach;
                                        }

                                        if (!isset($_SESSION['categorie'])) {
                                            echo '<option value="0" disabled selected>Selecteer Categorie</option>';
                                        }


                                        ?>


                                        <?php foreach ($data as $row): ?>
                                            <option value="<?= $row["rubrieknummer"];
                                            ?>"><?= $row["rubrieknaam"];
                                                ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>

                                <?php
                                $categorienumber = '';
                                if (isset($_SESSION['categorie']))
                                    $categorienumber = $_SESSION['categorie'];

                                $dbh = connectToDatabase();
                                $smt1 = $dbh->prepare("select * From Rubriek where Rubriek='$categorienumber'");
                                $smt1->execute();
                                $data1 = $smt1->fetchAll();

                                if (isset($_POST['subcategorie'])) {
                                    $subcategorie = $_POST['subcategorie'];
                                    $_SESSION['subcategorie'] = $subcategorie;
                                }

                                ?>


                                <div class="select">
                                    <select class="input is-primary" name="subcategorie" onchange='this.form.submit()'>
                                        <?php

                                        if (isset($_SESSION['subcategorie'])) {
                                            $showcat1 = $_SESSION['subcategorie'];
                                            $dbh = connectToDatabase();
                                            $smtd = $dbh->prepare("select * From Rubriek where rubrieknummer='$showcat1'");
                                            $smtd->execute();
                                            $datad = $smtd->fetchAll();

                                            foreach ($datad as $rowd):
                                                echo '<option value="' . $rowd["rubrieknummer"] . '">' . $rowd["rubrieknaam"] . '</option>';
                                            endforeach;
                                        }

                                        if (!isset($_SESSION['categorie'])) {
                                            echo '<option value="0" disabled selected>Selecteer Categorie</option>';
                                        }


                                        ?>

                                        <?php foreach ($data1 as $row1): ?>

                                            <option value="<?= $row1["rubrieknummer"];
                                            ?>"><?= $row1["rubrieknaam"];
                                                ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>


                                <?php
                                $subcategorienumber = '';
                                if (isset($_SESSION['subcategorie']))
                                    $subcategorienumber = $_SESSION['subcategorie'];

                                $dbh = connectToDatabase();
                                $smt2 = $dbh->prepare("select * From Rubriek where Rubriek='$subcategorienumber'");
                                $smt2->execute();
                                $data2 = $smt2->fetchAll();


                                ?>


                                <div class="select">
                                    <select class="input is-primary" name="subsubcategorie">

                                        <?php

                                        if (!isset($_SESSION['subcategorie'])) {
                                            echo ' <option value="0" disabled selected>Selecteer Categorie</option>';
                                        }
                                        ?>

                                        <?php foreach ($data2 as $row2): ?>
                                            <option value="<?= $row2["rubrieknummer"];
                                            ?>"><?= $row2["rubrieknaam"];
                                                ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>


                            </div>


                        </div>


                        <div class="field">
                            <label class="label">Productnaam</label>
                            <div class="control">
                                <input class="input is-primary"  name="titel" type="text" placeholder="Productnaam">
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Startprijs</label>
                            <div class="control has-icons-left has-icons-right">
                                <input class="input is-success" name="prijs" type="number" placeholder="Bedrag">
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

                                    <select class="input is-primary " name="betaling">

                                        <option>Bank</option>
                                        <option>Creditcard</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <?php

                        ?>
                        <div class="field">
                            <label class="label">Beschrijving</label>
                            <div class="control">
                                <textarea class="textarea is-primary" name="beschrijving"
                                          placeholder="Beschrijving van product"></textarea>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Land</label>
                            <div class="control has-icons-left has-icons-right">
                                <input class="input is-success" name="land" type="text" placeholder="Land">
                                <span class="icon is-small is-left">
                        <i class="fas fa-globe-europe"></i>
                    </span>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Plaats</label>
                            <div class="control has-icons-left has-icons-right">
                                <input class="input is-success" name="plaats" type="text" placeholder="Plaats">
                            </div>
                        </div>
                        <br>
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

                        <li>Max. 10MB</li>
                        <li>Alleen .JPG of .JPEG</li>
                        <br>
                        <div class="field">
                            <div class="control">
                                <label class="checkbox">
                                    <input type="checkbox" name="check" value="check" required>
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
            </div>

            <br>

        </div>
    </section>
<?php include "includes/footer.html" ?>
<?php


if (isset($_POST['insertproduct'])) {
    $product_categorie = $_SESSION['categorie'];
    $userr = $_SESSION["user"];
    $dbh = connectToDatabase();
    $smtid = $dbh->prepare('select * From voorwerp');
    $smtid->execute();
    $data = $smtid->fetchAll();

    foreach ($data as $row):
        $iid = $row["voorwerpnummer"];

    endforeach;


    $idn = $iid + 1;
    $dir = $idn;
    $product_titel = $_POST['titel'];
    $product_prijs = $_POST['prijs'];
    $product_betalingswijze = $_POST['betaling'];

    $subproduct_categorie = $_SESSION['subcategorie'];
    $subsubproduct_categorie = $_POST['subsubcategorie'];
    $product_beschrijving = $_POST['beschrijving'];
    $product_land = $_POST['land'];
    $product_plaats = $_POST['plaats'];
    if (isset($_FILES['pic']['name'])) ;
    $picname = $_FILES['pic']['name'];
    $tmp = $_FILES['pic']['tmp_name'];
    $imagesize = $_FILES['pic']['size'];
    $size = 10000000;
    if ($imagesize >= $size) {
        echo "<script>alert('Max Size')</script>";
        exit();
    }


    $ext = end((explode(".", $picname)));
    if ($ext == "jpg" || $ext == "jpeg") {
    } else {
        echo "<script>alert('Upload Image Only')</script>";
        exit();

    }

    $picpath = "data/voorwerpen/$dir/A.$ext";


    if ($product_titel == '' OR $product_prijs == '' OR $product_betalingswijze == '' OR $product_beschrijving == '' OR $_POST['check'] == '' OR $product_land == '' OR $product_plaats == '') {
        echo "<script>alert('Vul alle velden in')</script>";
        exit();

    } else {
        mkdir("data/voorwerpen/" . $idn, 0777, true);
        move_uploaded_file($tmp, $picpath);
        $dbh = connectToDatabase();
        $smte = $dbh->prepare("INSERT INTO voorwerp (voorwerpnummer, titel, beschrijving, startprijs, Betalingswijze, betalingsinstructie, 
						plaatsnaam, land, LooptijdbeginDag, LooptijdbeginTijdstip, Verzendkosten,
						verzendinstructies, Verkoper, Koper, LooptijdeindeDag, LooptijdeindeTijdstip, VeilinGesloten, Verkoopprijs, views)
VALUES	   ('$idn', '$product_titel','$product_beschrijving','$product_prijs', '$product_betalingswijze', 'Overschrijving moet ontvangen zijn binnen 10 dagen na verkoop', '$product_plaats', '$product_land', CONVERT(date, GETDATE()), CONVERT(time, GETDATE()), '6,95', null , '$userr', NULL, DATEADD(day, 7, GETDATE()), CONVERT(time, GETDATE()), 'niet', NULL, 0)");
        $smte->execute();

        $dbh = connectToDatabase();
        $smtc = $dbh->prepare("INSERT INTO voorwerpinrubriek (voorwerp, rubriekoplaagsteniveau) VALUES ('$idn', '$subsubproduct_categorie')");
        $smtc->execute();

        $dbh = connectToDatabase();
        $smtpic = $dbh->prepare("INSERT INTO bestand (filenaam, voorwerp) VALUES ('$picpath', '$idn')");
        $smtpic->execute();

        echo "<script>alert('Product is toegevoegd!')</script>";
        exit();
    }

}
unset($_SESSION['subcategorie']);
unset($_SESSION['categorie']);