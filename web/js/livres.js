function showHide() {
    var ele = document.getElementById("ajouter");
    var ele1 = document.getElementById("modifier");
    var ele2 = document.getElementById("supprimer");
    var ele3 = document.getElementById("listBooks");
    ele1.style.display = "none";
    ele2.style.display = "none";
    ele3.style.display = "none";
    if(ele.style.display == "block") {
            ele.style.display = "none";
      }
    else {
        ele.style.display = "block";
    }
}

function showHide1() {
    var ele = document.getElementById("ajouter");
    var ele1 = document.getElementById("modifier");
    var ele2 = document.getElementById("supprimer");
    var ele3 = document.getElementById("listBooks");
    ele.style.display = "none";
    ele2.style.display = "none";
    ele3.style.display = "none";
    if(ele1.style.display == "block") {
            ele1.style.display = "none";
      }
    else {
        ele1.style.display = "block";
    }
}

function showHide2() {
    var ele = document.getElementById("ajouter");
    var ele1 = document.getElementById("modifier");
    var ele2 = document.getElementById("supprimer");
    var ele3 = document.getElementById("listBooks");
    ele.style.display = "none";
    ele1.style.display = "none";
    ele3.style.display = "none";

    if(ele2.style.display == "block") {
            ele2.style.display = "none";
      }
    else {
        ele2.style.display = "block";
    }
}

function showHide3(){
    var ele = document.getElementById("listBooks");
    if (ele.style.display != "block") {
        ele.style.display = "block";
    } else {
        ele.style.display = "none";
    }
}

function alertBox() {
    if (confirm("Êtes-vous sûr que vous voulez vous déconnecter?") == true) {
        window.location.replace("logout.php");
    } else {
        window.location.replace("livres.php");
    }
}