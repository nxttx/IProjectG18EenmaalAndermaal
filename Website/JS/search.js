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

    try {
        let html = "";

        let response = await requestSearchRecords(searchKeyword);

        response.map(record => {
            html += `
                <div class="card">
                    <div class="card-content">
                        <h1 class="title is-4">${record.titel}</h1>
                        <p class="is-four-fifths">${record.beschrijving}</p>
                    </div>
                </div>
                <br>
            `
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
};

window.onload = async () => {
    try {
        let html = "";

        let response = await requestSearchRecords(searchKeyword);

        response.map(record => {
            html += `
                <div class="card">
                    <div class="card-content">
                        <div class="four-fifths>
                            <h1 class="title is-4">${record.titel}</h1>
                            <p class="is-four-fifths">${record.beschrijving}</p>
                        </div>
                    </div>
                </div>
                <br>
            `
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

search = async (form) => {
    const input = form.searchInput.value;

    searchKeyword = input;

    window.history.pushState({
        search: input
    }, `${input}`, `?searchInput=${input}`);

    try {
        let html = "";

        let response = await requestSearchRecords(input);

        console.log(response)

        response.map(record => {
            html += `
                <div class="card">
                    <div class="card-content">
                    <div></div>
                        <h1 class="title is-4">${record.titel}</h1>
                        <p class="is-four-fifths">${record.beschrijving}</p>
                    </div>
                </div>
                <br>
            `
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
};

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