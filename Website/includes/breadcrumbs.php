
<?php

function makeBreadcrumbs()
{
}

?>
<?php
$id2 = $_GET['pn'];
$queryn="select * from voorwerpinrubriek where Voorwerp='$id2'";

$datan=connectToDatabase()->query($queryn);
foreach($datan as $rown)
{
 $newid=$rown['rubriekOpLaagsteNiveau'];
}
$id=$newid;



$cat = "";
$subcat = "";
$subsubcat = "";
$rubrieknaam1 = "";
$query1 = "select * from rubriek where rubrieknummer=:id";

$data = connectToDatabase()->prepare($query1);

$data->execute(array($id));

$data = $data->fetchAll();

foreach ($data as $row1) {
    $rubrieknummer = $row1['rubrieknummer'];
    $rubrieknaam1 = $row1['rubrieknaam'];
    $Rubriek = $row1['rubriek'];
    $volgnr = $row1['volgnr'];
}

$i = 0;
$query5 = "select * from rubriek where rubriek IS NULL";

$data5 = connectToDatabase()->query($query5);

foreach ($data5 as $row5) {
    $i++;
    $rr = $row5['rubrieknummer'];
}

if ($Rubriek == "") {
    $cat = $rubrieknaam1;
}

if ($Rubriek <= $i) {
    $query2 = "select rubrieknaam from rubriek where Rubriek=:rubriek";
    $data1 = connectToDatabase()->prepare($query2);
    $data1->execute(array($Rubriek));
    $data1 = $data1->fetchAll();

    foreach ($data1 as $row2) {
        $cat = $row2['rubrieknaam'];
    }

    $subcat = $rubrieknaam1;
}

$j = $i + 1;

if ($Rubriek >= $j) {
    $query3 = "select * from rubriek where rubrieknummer=$Rubriek";
    $data3 = connectToDatabase()->query($query3);

    foreach ($data3 as $row3) {
        $subcat = $row3['rubrieknaam'];
        $Rub1 = $row3['rubriek'];
    }

    $query4 = "select rubrieknaam from rubriek where rubrieknummer='$Rub1'";
    $data4 = connectToDatabase()->query($query4);

    foreach ($data4 as $row4) {
        $cat = $row4['rubrieknaam'];
    } {
        $subsubcat = $rubrieknaam1;
    }
}
?>

<div class="notification">
    <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
            <li><a href="#"><?php echo $cat ?></a></li>
            <li><a href="#"><?php echo $subcat ?></a></li>
            <li><a href="#"><?php echo $subsubcat ?></a></li>
            
        </ul>
    </nav>


</div>