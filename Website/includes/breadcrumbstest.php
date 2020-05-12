<?php

function makeBreadcrumbs(){}

include "php/dbh.php" ?>
<?php

$id=18;
$cat="";
$subcat="";
$subsubcat="";
$rubrieknaam1="";
$query1="select * from rubriek where rubrieknummer='$id'";

$data=connectToDatabase()->query($query1);
foreach($data as $row1)
{
 $rubrieknummer=$row1['rubrieknummer'];
 $rubrieknaam1=$row1['rubrieknaam'];
 $Rubriek=$row1['Rubriek'];
$volgnr=$row1['volgnr'];
}


if($Rubriek==""){
$cat=$rubrieknaam1;
}

if($Rubriek==1 || $Rubriek==2 || $Rubriek==3){
$query2="select rubrieknaam from rubriek where rubrieknummer='$Rubriek'";
$data1=connectToDatabase()->query($query2);
foreach($data1 as $row2)
{
$cat=$row2['rubrieknaam'];
}
$subcat=$rubrieknaam1;
}

if($Rubriek>=4){
$query3="select * from rubriek where rubrieknummer='$Rubriek'";
$data3=connectToDatabase()->query($query3);
foreach($data3 as $row3)
{
$subcat=$row3['rubrieknaam'];
$Rub1=$row3['Rubriek'];
}

$query4="select rubrieknaam from rubriek where rubrieknummer='$Rub1'";
$data4=connectToDatabase()->query($query4);
foreach($data4 as $row4)
{
$cat=$row4['rubrieknaam'];
}{
$subsubcat=$rubrieknaam1;
}

}

?>
<?php
$siteTitle= "hoofdpagina"

?>

<?php include "includes/head.php" ?>
<?php include "includes/header.php"?>

<nav class="breadcrumb" aria-label="breadcrumbs">
<ul>
<li><a href="#"><?php echo $cat ?></a></li>
<li><a href="#"><?php echo $subcat ?></a></li>
<li><a href="#"><?php echo $subsubcat ?></a></li>
<li class="is-active"><a href="#" aria-current="page">Breadcrumb</a></li>
</ul>
</nav>