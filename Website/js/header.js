var headerloop = setInterval(function () {

    if (screen.width >= 1023) {
        document.getElementById('headerDesktop').style = "display: block;";
        document.getElementById('headerMobile').style = "display: none;";
    } else {
        document.getElementById('headerMobile').style = "display: block;";
        document.getElementById('headerDesktop').style = "display: none;";
    }
}, 250);