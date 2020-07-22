//activates Register view, disables Login view
function activateRegister() {
    var i, content;

    content = document.getElementsByClassName("tab");

    for (i = 0; i < content.length; i++) {
        content[i].style.display = 'none';
    }
    document.getElementById("register-form-link").className= 'active';
    document.getElementById("login-form-link").className= '#';
    document.getElementById("register-form").style.display = "block";

};

//disables register view, activates login view
function activateLogin() {
    var i, content;

    content = document.getElementsByClassName("tab");

    for (i = 0; i < content.length; i++) {
        content[i].style.display = 'none';
    }
    document.getElementById("login-form-link").className= 'active';
    document.getElementById("register-form-link").className= '#';
    document.getElementById("login-form").style.display = "block"

};





