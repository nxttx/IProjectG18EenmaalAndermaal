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






/*
 *
 *
 * $stmt = $dbh->prepare($sql);
$stmt->execute([$false]);          <?php
            try {

                $stmt = $db->query('SELECT postID, postTitle, postDate FROM blog ORDER BY postID DESC');
                while ($row = $stmt->fetch()) {

                    <td>
                        <a href="edit-post.php?id=<?php echo $row['postID']; ?>">Edit</a> |
                        <a href="del-post.php?id=<?php echo $row['postID']; ?>">Delete</a>
                    </td>

                    <?php
                    echo '</tr>';

                }

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
            ?>

while ($row = $stmt->fetch()) {
    $gebruiker .= '
                    <tr>
                      <td>'. $row["gebruikersnaam"].'</td>
                      <td> '. $row["emailadress"] . ' </td>
                      <td>
                        <div class="field is-grouped is-grouped-right">
                          <p class="control">
                          <a href="edit-post.php?id=<?php echo $row[\'postID\']; ?>">Edit</a>
                          <a type="post" href="PHP/verwerken_gebruiker.php?gebruikersnaam ='. $row['gebruikersnaam'].'" class="button is-primary">
                          Akkoord
                          </a>                         
                          </p>
                          <p class="control">
       
                              Delete
                            </a>
                          </p>
                        </div>
                       </td>
                    </tr>   
                     ';
}
 */

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
                            <li><a class="is-active">Dashboard</a></li>
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
                                            <div class="heading">Alle Klanten</div>
                                            <div class="title is-5">
                                                <?php echo $antaal_Alle_Gebruiker ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="level-item">
                                        <div class="">
                                            <div class="heading">Nieuwe Klanten</div>
                                            <div class="title is-5">
                                                <?php echo $antaal_Nieuwe_Gebruiker ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <table class="table">
                            <thead>
                            <tr>
                                <th><abbr title="Gebruiker's_Naam">Gebruiker Name</abbr>
                                </th>
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
                            $sql = "SELECT gebruikersnaam, emailadress  FROM gebruiker WHERE is_geverifieerd =?";
                            $stmt = $dbh->prepare($sql);
                            $stmt->execute([$false]);

                            foreach ($stmt->fetchAll() as $row) {

                                    echo '<tr>';
                                    echo '<td>' . $row['gebruikersnaam'] . '</td>';
                                    echo '<td>' . $row['emailadress'] . '</td>';
                                    ?>

                                    <td>
                                        <a class="button is-primary" href="PHP/verwerken_gebruiker.php?gebruikersnaam=<?php echo $row['gebruikersnaam']; ?>"> Akkoord </a> |

                                    </td>

                                    <?php
                                    echo '</tr>';

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