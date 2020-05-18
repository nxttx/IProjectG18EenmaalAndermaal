function showSubSub(number){
    document.getElementById('subsubsub').style="display:block;";
    document.getElementById('subsubsub').src = "includes/catsubsub.php?rk="+number;

}

if (screen.width >= 768) {
    document.getElementById('boomDesktop').style = "display: block;";
    document.getElementById('boomMobile').style = "display: none;";
} else {
    document.getElementById('boomMobile').style = "display: block;";
    document.getElementById('boomDesktop').style = "display: none;";
}