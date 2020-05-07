logout = () => {
    let request = new XMLHttpRequest;

    request.onreadystatechange = () => {
        if(request.status == 200) {
            location.reload();
        }
    }

    request.open("POST", "php/logout.php", true);
    request.send();
}