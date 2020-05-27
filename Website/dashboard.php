<!--Gebruik de code in deze pagina om een nieuwe pagina aan te maken. Op deze houden we overal dezelfde stijl -->

<?php
$siteTitle = "Dashboard ";
?>

<?php include "php/dbh.php" ?>


<?php
$dbh = connectToDatabase();
$gebruiker = "";
$antaal_Alle_Gebruiker = "";
$antaal_Nieuwe_Gebruiker = "";

$false = 0;
$true = 1;


if(isset($_POST['akkoord'])){

        $gebruikersnaam = $_POST['gebruikersnaam'];
        try {
        $sql = 'UPDATE gebruiker
                SET is_geverifieerd = :is_geverifieerd
                WHERE gebruikersnaam = :gebruikersnaam';
        $stmt = $dbh->prepare($sql);
        $stmt->execute([$true, $gebruikersnaam]);

        header('Location: ../dashboard.php?action=akkoord');

         } catch (PDOException $e) {
        echo $e->getMessage();
    }
    }

    elseif(isset($_POST['delete'])){
        $gebruikersnaam = $_POST['gebruikersnaam'];
        try {
        $sql = 'UPDATE gebruiker
                SET is_geverifieerd = :is_geverifieerd
                WHERE gebruikersnaam = :gebruikersnaam';
        $stmt = $dbh->prepare($sql);
        $stmt->execute([$false, $gebruikersnaam]);
        header('Location: ../dashboard.php?action=nietAkkoord');
        } catch (PDOException $e) {
        echo $e->getMessage();
    }

}

$sql = "SELECT COUNT(gebruikersnaam) as aantal FROM gebruiker  WHERE is_geverifieerd =? ";

$stmt = $dbh->prepare($sql);
$stmt->execute([$true]);
foreach ($stmt->fetchAll() as $row) {
    $antaal_Alle_Gebruiker .= $row['aantal'];
}

$sql = "SELECT COUNT(gebruikersnaam) as aantal FROM gebruiker  WHERE is_geverifieerd =? ";

$stmt = $dbh->prepare($sql);
$stmt->execute([$false]);
foreach ($stmt->fetchAll() as $row) {
    $antaal_Nieuwe_Gebruiker .= $row['aantal'];
}

?>

<?php include "includes/head.php" ?>
<?php include "includes/header.php" ?>
<section>
    <div class="container">
        <br>

        <div class="card ">
            <div class="card-content">
                <h2 class="title is-2  has-text-centered">Dashboard</h2>
            </div>
        </div>

        <br>

        <div class="section">
            <div class="columns">
                <aside class="column is-2">
                    <nav class="menu">
                        <ul class="menu-list">
                            <li><a>Dashboard</a></li>
                            <li><a>Klanten</a></li>
                        </ul>
                    </nav>
                </aside>
                <main class="column">
                    <div class="level">
                        <div class="level-left">
                            <div class="level-item">
                                <div class="title">Klanten</div>
                            </div>
                        </div>
                    </div>
                    <div class="columns is-multiline">
                        <div class="column">
                            <div class="box">
                                <div class="level">
                                    <div class="level-item">
                                        <div class="">
                                            <div class="heading">Geaccepteerde Klanten</div>
                                            <div class="title is-4">
                                                <?php echo $antaal_Alle_Gebruiker ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="level-item">
                                        <div class="">
                                            <div class="heading">Nieuwe Klanten</div>
                                            <div class="title is-4">
                                                <?php echo $antaal_Nieuwe_Gebruiker ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="columns is-multiline is-">
                        <table class="table" >
                            <thead>
                            <tr>
                                <th><abbr title="Gebruiker's_Naam">Gebruiker Name</abbr></th>
                                <th><abbr title="Emailadres">Email Address</abbr></th>
                                <th>
                                    <div class="field is-grouped is-grouped-right">
                                        <p class="control">
                                            Akkoord/Delete
                                        </p>
                                    </div>
                                </th>
                            </tr>
                            <?php

                            try {
                                echo '
                              <form class="field" method="post">';
                            $sql = "SELECT gebruikersnaam, emailadress  FROM gebruiker WHERE is_geverifieerd =?";
                            $stmt = $dbh->prepare($sql);
                            $stmt->execute([$false]);

                            foreach ($stmt->fetchAll() as $row) {

                                    echo '<tr>';
                                    echo '<td>' . $row['gebruikersnaam'] . '</td>';
                                    echo '<td>' . $row['emailadress'] . '</td>';
                                    echo '<input type="hidden" name="gebruikersnaam" value="'.$row['gebruikersnaam'].'">';
                                    echo '
                                    <td>
                                        <button class="button is-primary" name="akkoord" type="submit">Akkoord</button> |
                                        <button class="button is-primary" name="delete" type="submit">Delete</button>
                                    </td>';
                                echo '</tr>';
                                echo '</form>';

                                }

                            } catch (PDOException $e) {
                                echo $e->getMessage();
                            }
                            ?>
                            </thead>
                        </table>
                    </div>
                </main>
            </div>
        </div>
    </div>
</section>
<?php include "includes/footer.php" ?>