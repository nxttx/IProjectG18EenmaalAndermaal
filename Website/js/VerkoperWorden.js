function checkSelect() {
    if(document.getElementById('controleOptie').value == 'Creditcard') {
        document.getElementById('controleOptieCreditCard').innerHTML  = "<div class='column'>" +
            "                                <div class=\"field\">\n" +
            "                                <label for=\"creditcard\" class=\"label\">Uw creditcard nummer: *</label>\n" +
            "                                <p class=\"control has-icons-left\">\n" +
            "                                    <input class=\"input is-primary\" type=\"creditcard\" name=\"creditcard\" placeholder=\"Uw creditcard nummer\"\n" +
            "                                           required maxlength=\"20\" required>\n" +
            "                                    <span class=\"icon is-small is-left\">\n" +
            "                                        <i class=\"fas fa-envelope\"></i>\n" +
            "                                     </span>\n" +
            "                                </p>\n" +
            "                            </div>" +
            "                            </div>";
    }else{
        document.getElementById('controleOptieCreditCard').innerHTML = "";
    }
}
