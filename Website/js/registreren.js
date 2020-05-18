function testUsername(username){
    document.getElementById('testusername').style="display:block;";
    document.getElementById('testusername').src = "PHP/checks/check_username.php?UN="+username;

}

function checkPasswordLength(){
    var password1= document.getElementById('wachtwoordregel1').value;
    if(password1.length <8){
        document.getElementById('wachtwoordregel1').classList="input is-danger";
    }else{
        document.getElementById('wachtwoordregel1').classList="input is-link";
    }
}

function checkPasswordIsTheSame(){
    var password1= document.getElementById('wachtwoordregel1').value;
    var password2= document.getElementById('wachtwoordregel2').value;
    console.log(password1);
    console.log(password2);
    if(password1 === password2){
        document.getElementById('wachtwoordregel2').classList="input is-link";
    }else{
        document.getElementById('wachtwoordregel2').classList="input is-danger";
    }
}