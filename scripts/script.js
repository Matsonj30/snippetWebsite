function showForm(){
    var form = document.getElementById("inputForm")
    form.style.display = "block"
}

function burgerMenu(){
    var checkbox = document.getElementById("hamburgerCheckbox");
    var menu = document.getElementById("menu");
    var burgerMenu = document.getElementsByClassName("hamburgerMenu");

    if(checkbox.checked == true){
        menu.style.transform = "none";
        burgerMenu[0].style.position = "fixed";
    }
    else{
        menu.style.transform = "translate(200px)";
        burgerMenu[0].style.position = "absolute";
    }
}
