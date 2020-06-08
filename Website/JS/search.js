try {
    var searchKeyword = getURLParams("searchInput").values[0];
} catch (e) {
    var searchKeyword = "";
}

try {
    var categoryKeyword = getURLParams("category").values[0];
} catch (e) {
    var categoryKeyword = "";
}

let button = document.getElementById('search-input');

let resultsDiv = document.getElementById('results');

button.value = searchKeyword;

window.history.pushState({
    search: searchKeyword,
    category: categoryKeyword
}, `${searchKeyword}`, `?searchInput=${searchKeyword}&category=${categoryKeyword}`);

document.getElementById("form").addEventListener("submit", (e) => {
    e.preventDefault();
});

window.onpopstate = async (e) => {
    button.value = e.state.search;

    searchKeyword = e.state.search;
    categoryKeyword = e.state.category;

    trySearch(searchKeyword, categoryKeyword);
};

search = async (form) => {
    let input = form.searchInput.value;

    searchKeyword = input;

    window.history.pushState({
        search: input,
        category: categoryKeyword
    }, `${input}`, `?searchInput=${input}&category=${categoryKeyword}`);

    trySearch(input, categoryKeyword);
};

trySearch = async (input) => {
    try {
        let html = "";

        let response = await requestSearchRecords(input, categoryKeyword);

        response.map(record => {
            html += message(record);
        })

        resultsDiv.innerHTML = html;
    } catch (e) {
        resultsDiv.innerHTML = `
            <div class="card">
                <div class="card-content">
                    <h1 class="title is-5">${e}</h1>
                </div>
            </div>
            `;
    }
}


message = (record) => {
    return `
        <div class="message is-primary">
            <div class="message-header ">
                <a class="title is-4 has-text-white" href="/product.php?pn=${record.voorwerpnummer}">${record.titel}</a>
            </div>
            <div class="message-body">               
                <div class="content columns">
                    <div class="column">
                        <p >${record.beschrijving}</p>
                    </div>
                    <div class="column">
                        <h1 class="title is-2 search-price has-text-right">&euro;${record.startprijs} </h1> 
                        <p class="is-size-7 has-text-right">excl. &euro;${record.verzendkosten} verzendkosten</p>
                    </div>
                </div>
            </div>
        </div>
        <br>
    `;
}

requestSearchRecords = (input, categoryKeyword) => {
    let requestPromise = new Promise((resolve, reject) => {
        let searchRequest = new XMLHttpRequest();

        searchRequest.open("GET", `php/searchHandler.php?search=${input}&category=${categoryKeyword}`, true);

        searchRequest.send();

        searchRequest.onreadystatechange = () => {
            if (searchRequest.readyState === 4 && searchRequest.status === 200) {
                resolve(JSON.parse(searchRequest.response));
            } else if (searchRequest.readyState === 4 && searchRequest.status === 204) {
                reject("Geen resultaten");
            } else if (searchRequest === 4) {
                reject("Er ging iets fout.");
            }
        }
    })

    return requestPromise;
}