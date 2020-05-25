//check warde van bod

function checkBodAmount() {
    var huidigBod = Number(document.getElementById("price").innerHTML.replace(",", ".").replace("€", ""));
    var bod = Number(document.getElementById('bod').value.replace(",", ".").replace("€", ""));
    console.log(bod);
    if (bod > huidigBod) {
        if (bod < 49.99) {//Dan moet minimaal +0.50
            if (huidigBod + 0.50 <= bod) {
                document.getElementById('bod').classList = "input is-link";
                document.getElementById('errorBod').style="display:none";
                document.getElementById("submitButton").disabled = false;
            } else {
                document.getElementById("submitButton").disabled = true;
                document.getElementById('errorBod').style = "display:block";
                document.getElementById('errorBod').innerHTML = "Het bod moet minimaal &euro; 0,50 hoger zijn dan het huidige bod.";
                document.getElementById('bod').classList = "input is-danger";
            }
        } else if (bod < 499.99) {//Dan moet minimaal +1.00
            if (huidigBod + 1.00 <= bod) {
                document.getElementById('bod').classList = "input is-link";
                document.getElementById('errorBod').style="display:none";
                document.getElementById("submitButton").disabled = false;
            } else {
                document.getElementById("submitButton").disabled = true;
                document.getElementById('errorBod').style = "display:block";
                document.getElementById('errorBod').innerHTML = "Het bod moet minimaal &euro; 1,00 hoger zijn dan het huidige bod.";
                document.getElementById('bod').classList = "input is-danger";
            }
        } else if (bod < 999.99) {//Dan moet minimaal +5.00
            if (huidigBod + 5.00 <= bod) {
                document.getElementById('bod').classList = "input is-link";
                document.getElementById('errorBod').style="display:none";
                document.getElementById("submitButton").disabled = false;
            } else {
                document.getElementById("submitButton").disabled = true;
                document.getElementById('errorBod').style = "display:block";
                document.getElementById('errorBod').innerHTML = "Het bod moet minimaal &euro; 5,00 hoger zijn dan het huidige bod.";
                document.getElementById('bod').classList = "input is-danger";
            }
        } else if (bod < 4999.99) {//Dan moet minimaal +10.00
            if (huidigBod + 10.00 <= bod) {
                document.getElementById('bod').classList = "input is-link";
                document.getElementById('errorBod').style="display:none";
                document.getElementById("submitButton").disabled = false;
            } else {
                document.getElementById("submitButton").disabled = true;
                document.getElementById('errorBod').style = "display:block";
                document.getElementById('errorBod').innerHTML = "Het bod moet minimaal &euro; 10,00 hoger zijn dan het huidige bod.";
                document.getElementById('bod').classList = "input is-danger";
            }
        } else if (bod > 5000.00) {//Dan moet minimaal +50.00
            if (huidigBod + 50.00 <= bod) {
                document.getElementById('bod').classList = "input is-link";
                document.getElementById('errorBod').style="display:none";
                document.getElementById("submitButton").disabled = false;
            } else {
                document.getElementById("submitButton").disabled = true;
                document.getElementById('errorBod').style = "display:block";
                document.getElementById('errorBod').innerHTML = "Het bod moet minimaal &euro; 50,00 hoger zijn dan het huidige bod.";
                document.getElementById('bod').classList = "input is-danger";
            }
        }
        // console.log(bod + "bod is groter dan huidig bod"+ huidigBod);
        // document.getElementById('bod').classList="input is-link";
    } else {
        document.getElementById('errorBod').style = "display:block";
        document.getElementById('errorBod').innerHTML = "Uw bod moet hoger zijn dan het huidige bod";
        document.getElementById('bod').classList = "input is-danger";
        document.getElementById("submitButton").disabled = true;
    }
}



