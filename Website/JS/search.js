let searchKeyword = getURLParams("searchInput").values[0];

let button = document.getElementById('search-input');

let resultsDiv = document.getElementById('results');

button.value = searchKeyword;

window.history.pushState({
    search: searchKeyword
}, `${searchKeyword}`, `?searchInput=${searchKeyword}`);

document.getElementById("form").addEventListener("submit", (e) => {
    e.preventDefault();
});

window.onpopstate = async (e) => {
    button.value = e.state.search;

    searchKeyword = e.state.search;

    trySearch(searchKeyword);
};

window.onload = async () => {
    trySearch(searchKeyword);
}

search = async (form) => {
    const input = form.searchInput.value;

    searchKeyword = input;

    window.history.pushState({
        search: input
    }, `${input}`, `?searchInput=${input}`);

    trySearch(input);
};

trySearch = async (input) => {
    try {
        let html = "";

        let response = await requestSearchRecords(input);

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
        <article class="message">
            <div class="message-header has-background-primary"><h1 class="title is-4 has-text-white">${record.titel}</h1></div>
            <div class="message-body">
                <p>${record.beschrijving}</p>
                <br>
                <p class="has-text-weight-bold">&euro;${record.euro} </p> <p class="is-size-7">excl. &euro;${record.Verzendkosten} verzendkosten</p>
            </div>
        </article>

        <br>
    `;
}

requestSearchRecords = (input) => {
    let requestPromise = new Promise((resolve, reject) => {
        let searchRequest = new XMLHttpRequest();

        searchRequest.open("GET", `php/searchHandler.php?search=${input}`, true);

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