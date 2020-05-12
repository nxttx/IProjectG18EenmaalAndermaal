let searchKeyword = getURLParams("searchInput").values[0];

let button = document.getElementById('search-input');

button.value = searchKeyword;

window.history.pushState({
    search: searchKeyword
}, `${searchKeyword}`, `?searchInput=${searchKeyword}`);

document.getElementById("form").addEventListener("submit", (e) => {
    e.preventDefault();
});

window.onpopstate = (e) => {
    button.value = e.state.search;
};

search = async (form) => {
    const input = form.searchInput.value;


    window.history.pushState({
        search: input
    }, `${input}`, `?searchInput=${input}`);

    try {
        let response = await requestSearchRecords(input);
    } catch (e) {
        let reponse = e;
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