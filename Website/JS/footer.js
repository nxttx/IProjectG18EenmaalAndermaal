var footerloop = setInterval(function () {

    if (screen.width >= 768) {
        document.getElementById('desktop').style = "display: block;";
        document.getElementById('mobile').style = "display: none;";
    } else {
        document.getElementById('mobile').style = "display: block;";
        document.getElementById('desktop').style = "display: none;";
    }
}, 250);