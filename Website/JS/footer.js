var footerloop = setInterval(function () {

    if (screen.width >= 768) {
        document.getElementById('desktop').style = "visibility: visible;";
        document.getElementById('mobile').style = "visibility: hidden;";
        document.getElementById('copyright').style = "margin-top: -10em;";
    } else {
        document.getElementById('mobile').style = "visibility: visible; margin-top:-10em;";
        document.getElementById('desktop').style = "visibility: hidden;";
        document.getElementById('copyright').style = "margin-top: 0;";
    }
}, 250);