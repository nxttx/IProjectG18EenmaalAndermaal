document.getElementById("form").addEventListener("submit", (e) => {
    e.preventDefault();
})

login = (form) => {
    let username = form.username;
    let pw = form.password;
    let button = form.loginButton;

    button.classList.add("is-loading");

    if(username.value.length === 0) {
        username.classList.add("is-danger")

        button.classList.remove("is-loading");
        return;
    }

    if(pw.value.length == 0) {
        pw.classList.add("is-danger");

        button.classList.remove("is-loading");
        return;
    }

    if(username.value.length != 0 && pw.value.length != 0) {
        let request = new XMLHttpRequest();
        let errorField = document.getElementById("error-field");

        request.onreadystatechange = () => {
            if(request.readyState == 4) {
                button.classList.remove("is-loading");

                switch(request.status) {
                    case 404:
                        errorField.innerHTML("Gebruikersnaam of wachtwoord incorrect");
                        break;
                    case 200:
                        location.href = "index.php";
                        break;
                    default:
                        errorField.innerHTML("Er ging iets mis, probeer het later opnieuw...");
                }
            }
        }

        request.open("POST", "php/LoginController.php", true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send(`username=${username.value}&password=${pw.value}`);
    }
}