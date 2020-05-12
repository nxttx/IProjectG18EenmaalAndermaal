getURLParams = (keyword) => {
    let queryString = window.location.search;

    let queries = queryString.replace(new RegExp('\\?'), '').split("&");

    queries = queries.map(query => {
        let parameter = query.split("=")[0];
        let values = query.split("=")[1].split(",");
        
        return {parameter: parameter, values: values};
    })

    if(keyword) {
        let query = queries.filter(query => query.parameter === keyword);

        if(query.length === 0) {
            throw new Error("URL parameter niet gevonden")
        } else {
            return query[0];
        }
    } else {
        return queries;
    }
}