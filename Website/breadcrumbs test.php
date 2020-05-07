<?php
$connection = mysqli_connect("localhost","root","","icaproject");
$id=17;
$subcat="";
$undercat="";
$query1="select * from rubriek where rubrieknummer='$id'";
$pri1=mysqli_query($connection, $query1);
$row1=mysqli_fetch_array($pri1);
$rubrieknummer=$row1['rubrieknummer'];
$catt=$row1['rubrieknaam'];
$Rubriek=$row1['Rubriek'];
$volgnr=$row1['volgnr'];
 $toestand=$row1['toestand'];


if($toestand==2){

$query1="select * from rubriek where rubrieknummer='$id'";
$pri1=mysqli_query($connection, $query1);
$row1=mysqli_fetch_array($pri1);
$rubrieknummer=$row1['rubrieknummer'];
$subcat=$row1['rubrieknaam'];


$query2="select rubrieknaam from rubriek where rubrieknummer='$Rubriek'";
$pri2=mysqli_query($connection, $query2);
$row2=mysqli_fetch_array($pri2);
$cat=$row2['rubrieknaam'];
}


else if($toestand==3){

$query1="select * from rubriek where rubrieknummer='$id'";
$pri1=mysqli_query($connection, $query1);
$row1=mysqli_fetch_array($pri1);
$rubrieknummer=$row1['rubrieknummer'];
$undercat=$row1['rubrieknaam'];


$query2="select rubrieknaam from rubriek where rubrieknummer='$Rubriek'";
$pri2=mysqli_query($connection, $query2);
$row2=mysqli_fetch_array($pri2);
$subcat=$row2['rubrieknaam'];


 $query3="select rubrieknaam from rubriek where rubrieknummer='$volgnr'";
$pri3=mysqli_query($connection, $query3);
$row3=mysqli_fetch_array($pri3);
$cat=$row3['rubrieknaam'];
}
else{


$query1="select * from rubriek where rubrieknummer='$id'";
$pri1=mysqli_query($connection, $query1);
$row1=mysqli_fetch_array($pri1);
$rubrieknummer=$row1['rubrieknummer'];
$cat=$row1['rubrieknaam'];
}



?>
<?php
$siteTitle= "hoofdpagina"

?>

<?php include "includes/head.php" ?>
<?php include"includes/header.html"?>
<?php include"includes/footer.html"?>

<nav class="breadcrumb" aria-label="breadcrumbs">
<ul>
<li><a href="#"><?php echo $cat ?></a></li>
<li><a href="#"><?php echo $subcat ?></a></li>
<li><a href="#"><?php echo $undercat ?></a></li>
<li class="is-active"><a href="#" aria-current="page">Breadcrumb</a></li>
</ul>
</nav>