<?php

if(!isset($_SESSION)) 
{ 
    session_start(); 
}

$login = false;

if (isset($_SESSION["user"])) {
    $login = true;
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
                                        <input class="input is-primary" placeholder="Zoeken..." type="text" name="searchInput">
                                    </label>
                                </div>
                                <button class="button is-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>

                <a class="navbar-item" href="../categorieen.php">Categorieën</a>
                <a class="navbar-item" href="../#">Aanbiedingen</a>
                <div class="navbar-item">
                    <div class="buttons">
                        <?php
                        if (!$login) {
                            echo '<a class="button is-primary" href="../login.php"><i class="far fa-f2x fa-user small-icon"></i>Log in</strong></a>';
                        } else {
                            echo '<button class="button is-primary" onclick="logout()"><strong><i class="far fa-f2x fa-user small-icon"></i>Uitloggen</strong></button>';
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

                    <form action="zoeken.php" method="get">
                        <div class="field has-addons">
                            <div class="control">
                                <label>
                                    <input class="input is-primary" placeholder="Zoeken" size="50%" type="text">
                                </label>
                            </div>
                            <div class="control">
                                <a class="button is-primary" type="submit">
                                    <i class="fas fa-search"></i>
                                </a>
                            </div>
                        </div>
                    </form>
                    <p>&nbsp;</p>


                    <div class="buttons">
                        <button class="button is-light has-text-primary" style="width:82%">
                            <i class="fas fa-2x fa-home"></i>
                            <a class="has-text-primary" href="../index.php"> Home</a>
                        </button>
                        <button class="button is-light has-text-primary" style="width:32%">
                            <i class="fas fa-2x fa-book-open"></i>
                            <a class="has-text-primary" href="c../ategorieen.php"> Categorieën</a>
                        </button>
                        <button class="button is-light has-text-primary">
                            <i class="fas fa-2x fa-shopping-cart"></i>
                            <a class="has-text-primary" href="#"> Aanbiedingen</a>
                        </button>
                        <?php
                        if (!$login) {
                            echo '                        <button class="button is-light has-text-primary" style="width:32%">
                            <i class="far fa-2x fa-user"></i>
                            <a class="has-text-primary" href="../login.php"> Inloggen</a>
                        </button>';
                        } else {
                            echo '                        <button class="button is-light has-text-primary" onclick="logout()" style="width:32%">
                            <i class="far fa-2x fa-user"></i>
                            <p class="has-text-primary"> Uitloggen</p>
                        </button>';
                        }
                        ?>
                        <button class="button is-primary">
                            <i class="far fa-2x fa-user"></i>
                            <a class="has-text-white" href="#"> Account aanmaken</a>
                        </button>
                    </div>
                </details>
            </div>
        </div>
    </div>
</nav>
<script src="../js/logout.js"></script>
<script src="../js/header.js"></script>