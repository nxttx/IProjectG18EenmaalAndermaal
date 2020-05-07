//Veilingstijd0
var eindtijdAdvertentie0 = new Date("May 10, 2020 9:01:25").getTime();
var ad1 = setInterval(function () {
    var now = new Date().getTime();
    var t = eindtijdAdvertentie0 - now;
    var days = Math.floor(t / (1000 * 60 * 60 * 24));
    var hours = Math.floor((t % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((t % (1000 * 60)) / 1000);
    document.getElementById("veilingstijd0").innerHTML = days + "d " +
        hours + "u " + minutes + "m " + seconds + "s ";
    if (t < 0) {
        clearInterval(x);
        document.getElementById("veilingstijd0").innerHTML = "Verlopen";
    }}, 1000);

//Veilingstijd1
var eindtijdAdvertentie1 = new Date("May 15, 2020 9:01:25").getTime();
var ad2 = setInterval(function () {
    var now = new Date().getTime();
    var t = eindtijdAdvertentie1 - now;
    var days = Math.floor(t / (1000 * 60 * 60 * 24));
    var hours = Math.floor((t % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((t % (1000 * 60)) / 1000);
    document.getElementById("veilingstijd1").innerHTML = days + "d " +
        hours + "u " + minutes + "m " + seconds + "s ";
    if (t < 0) {
        clearInterval(x);
        document.getElementById("veilingstijd1").innerHTML = "Verlopen";
    }}, 1000);


//Veilingstijd2
var eindtijdAdvertentie2 = new Date("May 20, 2020 9:01:25").getTime();
var ad3 = setInterval(function () {
    var now = new Date().getTime();
    var t = eindtijdAdvertentie2 - now;
    var days = Math.floor(t / (1000 * 60 * 60 * 24));
    var hours = Math.floor((t % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((t % (1000 * 60)) / 1000);
    document.getElementById("veilingstijd2").innerHTML = days + "d " +
        hours + "u " + minutes + "m " + seconds + "s ";
    if (t < 0) {
        clearInterval(x);
        document.getElementById("veilingstijd2").innerHTML = "Verlopen";
    }}, 1000);
