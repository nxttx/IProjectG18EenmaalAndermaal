<?php

if (!isset($_SESSION)) {
    session_start();
}

$login = false;
$login_Admin = false;

if (isset($_SESSION["user"])) {
    $login = true;
    if($_SESSION["user"] == "admin"){
        $login_Admin = true;
    }
}

?>

<body>
<nav class="navbar" id="headerDesktop">
    <div class="container ">
        <div class="navbar-brand">
            <h1 class="navbar-item title">
                <a class="title" href="../index.php"> EenmaalAndermaal</a>
            </h1>
        </div>
        <div class="navbar-menu">
            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="field has-addons">
                        <form action="../search.php" method="get">
                            <div class="field has-addons">
                                <div class="control">
                                    <label>
                                        <input class="input is-primary" placeholder="Zoeken..." type="text"
                                               name="searchInput">
                                    </label>
                                </div>
                                <button class="button is-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>

                <a class="navbar-item" href="../categorieen.php">Categorieën</a>
                <a class="navbar-item" href="contact.php">Contact</a>
                <div class="navbar-item">
                    <div class="buttons">
                        <?php
                        if (!$login && !$login_Admin) {
                            echo '<a class="button is-primary" href="../login.php"><i class="far fa-f2x fa-user small-icon"></i>Log in</a>';
                            echo '<b><a class="button has-text-primary" href="../register.php"><i class="far fa-f2x fa-user small-icon"></i>Registeren</a></b>';
                        } elseif($login_Admin){
                            echo '<b><button class="button has-text-primary" onclick="logout()"><strong><i class="far fa-f2x fa-user small-icon"></i>Uitloggen</strong></button></b>';
                            echo '<a class="button is-primary" href="../dashboard.php"><i class="far fa-f2x fa-user small-icon"></i>Dashboard</strong></a>';
                        }elseif($login) {
                            echo '<b><button class="button has-text-primary" onclick="logout()"><strong><i class="far fa-f2x fa-user small-icon"></i>Uitloggen</strong></button></b>';
                            echo '<a class="button is-primary" href="../profile.php"><i class="far fa-f2x fa-user small-icon"></i>Mijn profiel</strong></a>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<nav class="navbar" id="headerMobile">
    <div class="container">
        <div class="navbar-brand">
            <div class="navbar-item" style="width:100%">
                <details style="width:100%">
                    <summary class="title">&equiv; EenmaalAndermaal</summary>
                    <form action="../search.php" method="get">
                        <div class="field has-addons">
                            <div class="control">
                                <label>
                                    <input class="input is-primary" placeholder="Zoeken" size="50" type="text" name="searchInput">
                                </label>
                            </div>
                            <div class="control">
                                <button class="button is-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                    <p>&nbsp;</p>


                    <div class="buttons">

                        <a href="../index.php" class="button is-light has-text-primary" style="width:82%">
                            <i class="fas fa-2x fa-home"></i>
                            <p> Home</p>
                        </a>

                        <a href="../categorieen.php" class="button is-light has-text-primary" style="width:32%">
                            <i class="fas fa-2x fa-book-open"></i>
                            <p> Categorieën</p>
                        </a>

                        <a href="contact.php" class="button is-light has-text-primary">
                            <i class="fas fa-2x fa-shopping-cart"></i>
                            <p>Contact</p>
                        </a>

                        <?php
                        if (!$login) {
                            echo '                        
                        <a href="../login.php" class="button is-light has-text-primary" style="width:32%">
                            <i class="far fa-2x fa-user"></i>
                            <p> Inloggen</p>
                        </a>
                        <a href="../register.php" class="button is-primary">
                            <i class="far fa-2x fa-user"></i>
                            <p>Registeren</p>
                        </a>
                        ';
                        }
                        elseif($login_Admin){
                            echo '<a href="../dashboard.php" class="button is-primary">
                                    <i class="far fa-2x fa-user"></i>
                                  <p>Dashboard</p>
                                  </a>

                                  <button class="button is-primary" onclick="logout()" style="width:82%">
                                    <i class="far fa-2x fa-user"></i>
                                     <p> Uitloggen</p>
                                  </button>
                                  ';
                        }else {
                            echo '                        
                        <button class="button is-primary " onclick="logout()" style="width:33%">
                            <i class="far fa-2x fa-user"></i>
                            <p> Uitloggen</p>
                        </button>
                        <b><a class="button is-primary" href="../profile.php"><i class="far fa-f2x fa-user small-icon"></i>Mijn profiel</b></a>';
                        }
                        ?>


                    </div>
                </details>
            </div>
        </div>
    </div>
</nav>
<script src="../js/logout.js"></script>
<script src="../js/header.js"></script>