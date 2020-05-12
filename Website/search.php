<?php
$siteTitle = "Contact";
?>

<?php include "includes/head.php" ?>
<?php include "includes/header.php" ?>
<section>
    <div class="container">
        <br>

        <div class="card ">

            <div class="card-content">
                <h1 class="title">Zoeken</h1>

                <form onsubmit="search(this)" class="is-full" id="form">
                    <div class="field">
                        <div class="control">
                            <label>
                                <input class="input is-primary" placeholder="Zoeken..." type="text" id="search-input" name="searchInput">
                            </label>
                        </div>
                    </div>
                </form>

                <br>

                <h2 class="is-2  has-text-left">Resultaten:</h2>

                <div class="results">
                    
                </div>
            </div>
        </div>
        <br>
    </div>
</section>

<script src="JS/search-params.js"></script>
<script src="JS/search.js"></script>

<?php include "includes/footer.html" ?>