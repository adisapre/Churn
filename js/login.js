
function activateRegister() {
    var i, content;

    content = document.getElementsByClassName("tab");
    console.log(content)
    for (i = 0; i < content.length; i++) {
        content[i].style.display = 'none';
    }
    document.getElementById("register-form-link").className= 'active';
    document.getElementById("login-form-link").className= '#';
    document.getElementById("register-form").style.display = "block";

};
function activateLogin() {
    var i, content;

    content = document.getElementsByClassName("tab");
    console.log(content)
    for (i = 0; i < content.length; i++) {
        content[i].style.display = 'none';
    }
    document.getElementById("login-form-link").className= 'active';
    document.getElementById("register-form-link").className= '#';
    document.getElementById("login-form").style.display = "block"

}

