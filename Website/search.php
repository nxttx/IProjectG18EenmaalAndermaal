<?php
$siteTitle = "Contact";
?>

<?php include "includes/head.php" ?>
<?php include "includes/header.php" ?>
<section>
    <div class="container" id="search-container">
        <br>

        <div class="card ">
            <div class="card-content">
                <h1 class="title" id="search-title-desktop">Zoeken</h1>

                <div id="mobile-search-header">
                    <h1 class="title" id="search-title-mobile">Zoeken</h1>
                    <button onclick="openCategoryMenu()" class="button is-normal">Filter</button>
                </div>

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
                <button onclick="changeCategory()" class="button is-large is-fullwidth">Overal zoeken</button>
                <div id="categories-container">
                    <div id="categories-header-mobile">
                        <p>Categorieën</p>
                        <button onclick="openCategoryMenu()" class="button is-small">Close</button>
                    </div>
                    <ul id="categories">

                    </ul>
                </div>
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