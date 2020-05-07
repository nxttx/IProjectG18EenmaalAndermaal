<?php
$servername = "localhost";
$username = "root";
$password = "";


$conn = new PDO("mysql:host=$servername;dbname=icaproject", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>

    <?php
    $siteTitle= "hoofdpagina"

    ?>

    <?php include "includes/head.php" ?>
    <?php include"includes/header.html"?>
    <?php include"includes/footer.html"?>

    <!DOCTYPE html>
    <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">

        </head>

        <body style="padding-top:2%;">
            <main>
			
      <div style="width:100%; height:auto;"> 
            <?php
        //$id=1;
		echo '

		 <div class="columns is-centered" style=" float:left; width:100%; margin-left:1%;">
    <section class="section">
    <div class="container has-text-centered">

<div>
            <div class="tile is-ancestor">';
		
        $query1="select * from voorwerp  limit 0,5";
    $data=$conn->query($query1);
    foreach($data as $row1)
    {
 $row1['voorwerpnummer'];
        $titel=$row1['titel'];
        $product=$row1['beschrijving'];
        $euro=$row1['euro'];

        echo '
	
			
                <div class="tile is-parent"">
                    <article class="tile is-child box">
                        <figure class="image">
                            <img src="image.png">
                        </figure>
						
                        <p class="title">'.$titel.'</p>
                        <p class="subtitle">'.$product.'</p>
                        <p class="subtitle">'.$euro.'</p>
                        <a class="button">Koop nu!</a>
                    </article>
                    </div>
              
	
';

    }
	echo '</div>
			            </div>
</div>
    </section>';
	

            ?> 
            
            
            <?php 
			
			echo' </div>
		 <div class="columns is-centered" style="float:left; width:100%;height:auto; margin-left:1%;">
    <section class="section">
    <div class="container has-text-centered">

<div>
            <div class="tile is-ancestor">';
		
        $query1="select * from voorwerp  limit 5,5";
    $data=$conn->query($query1);
    foreach($data as $row1)
    {
 $row1['voorwerpnummer'];
        $titel=$row1['titel'];
        $product=$row1['beschrijving'];
        $euro=$row1['euro'];

        echo '
	
			
                <div class="tile is-parent">
                    <article class="tile is-child box">
                        <figure class="image">
                            <img src="image.png">
                        </figure>
						
                        <p class="title">'.$titel.'</p>
                        <p class="subtitle">'.$product.'</p>
                        <p class="subtitle">'.$euro.'</p>
                        <a class="button">Koop nu!</a>
                    </article>
                    </div>
              
	
';

    }
	echo '</div>
			            </div>
</div>
    </section>';
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
	
            ?>
           

            </main>

        </body>

    </html>