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
                <div class="slider-container">
                    <div class="slider">
                        <div class="slide-button"></div>
                    </div>
                </div>
            </div>
        </div>
        <br>

        <div class="columns card" id="search-columns">
            <div class="column is-3">
                <ul id="categories">

                </ul>
            </div>
            <div id="results" class="column is-9">

            </div>
        </div>
        <br>
    </div>
</section>

<script src="JS/search-params.js"></script>
<script src="JS/search.js"></script>
<script src="JS/searchCategories.js"></script>

<script>
    window.onload = async () => {
        trySearch(searchKeyword);
        getAllMainCategories();
    }
</script>

<?php include "includes/footer.php" ?>