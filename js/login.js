
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
function validateUser(desc) {
    var usererror = document.getElementById("username");
    if(desc.value === "") {
        usererror.innerHTML = "<span class=\"error\" id=\"username-note\" style='color: red;'>" +
            "Please enter a username</span>"
        document.getElementById("username").focus();
        return false;
    }
    else {
        return true;
    }}



/*$(function() {

    $('#login-form-link').click(function(x) {
        $("#login-form").delay(100).fadeIn(100);
        $("#register-form").fadeOut(100);
        $('#register-form-link').removeClass('active');
        $(this).addClass('active');
        x.preventDefault();
    });
    $('#register-form-link').click(function(e) {
        $("#register-form").fadeIn(100);
        $("#login-form").fadeOut(100);
        $('#login-form-link').removeClass('active');
        $(this).addClass('active');
        x.preventDefault();
    });

});
*/