function ingreso() {

    var expr = "^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$";
    var email = $("#email").val();
    var pass = $("#password").val();

    if(email == "" || !expr.test(email)) {
        $("#mensajeEmail").fadeIn();
        return false;
    } else {
        $("#mensajeEmail").fadeOut();
        if(pass == "") {
            $("#mensajePass").fadeIn();
            return false;
        } else {
            $("#mensajePass").fadeOut();
        }
    }
}