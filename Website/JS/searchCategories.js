let gatheredIDs = [];

getAllMainCategories = () => {
    let request = new XMLHttpRequest;

    request.open('GET', `php/categoryHandler.php?index`, true);

    request.send();

    request.onreadystatechange = () => {
        if (request.readyState === 4 && request.status === 200) {
            let response = JSON.parse(request.response);
            let categoriesDIV = document.getElementById("categories");
            let HTML = "";

            response.map((category) => {
                let subCategoryHTML = "";

                category.sub_rubrieken.map((category) => {
                    subCategoryHTML += `
                        <li onclick="getSubCategory(${category.rubrieknummer})" id="${category.rubrieknummer}" class="close">
                            <p class="" onclick="displaySubCategories(${category.rubrieknummer})">${category.rubrieknaam}</p>
                            <ul id="list-${category.rubrieknummer}"></ul>
                        </li>
                    `
                })

                HTML += `
                    <li id="${category.rubrieknummer}" class="close">
                        <p class="title is-5" onclick="displaySubCategories(${category.rubrieknummer})">${category.rubrieknaam}</p>

                        <ul>
                            ${subCategoryHTML}
                        </ul>
                    </li>
                `
            });

            categoriesDIV.innerHTML = HTML;
        } else if (request.readyState === 4 && request.status === 204) {

        } else if (request.readyState === 4) {

        }
    }
}

getSubCategory = (rubrieknummer) => {
    let id = gatheredIDs.find((id) => id == rubrieknummer);

    if (!id) {
        let categoryList = document.getElementById(`list-${rubrieknummer}`);

        let request = new XMLHttpRequest;

        request.open('GET', `php/categoryHandler.php?show=${rubrieknummer}`, true);

        request.send();

        request.onreadystatechange = () => {
            if (request.readyState === 4 && request.status === 200) {
                let response = JSON.parse(request.response);
                let HTML = "";

                response.map((category) => {
                    HTML += `
                    <li><p class="has-text-weight-light" onclick="changeCategory(${category.rubrieknummer})">${category.rubrieknaam}</p></li>
                `
                });

                gatheredIDs.push(rubrieknummer);

                categoryList.innerHTML = HTML;
            } else if (request.readyState === 4 && request.status === 204) {
                changeCategory(rubrieknummer);
            } else if (request.readyState === 4) {

            }
        }
    };
}

displaySubCategories = (rubrieknummer) => {
    let categoryList = document.getElementById(`${rubrieknummer}`);

    categoryList.classList.toggle('close');
}

changeCategory = (id) => {
    categoryKeyword = id;
    
    if(id == undefined) {
        categoryKeyword = "";
    }

    window.history.pushState({
        search: searchKeyword,
        category: categoryKeyword
    }, `${searchKeyword}`, `?searchInput=${searchKeyword}&category=${categoryKeyword}`);

    trySearch(searchKeyword, categoryKeyword);
}

openCategoryMenu = () => {
    document.getElementById("categories-container").classList.toggle("open");
}