function dologin(){
    loginHelp.innerText = "";
    passwordHelp.innerText= "";

    let ok = true;

    if(login.value==""){
        loginHelp.innerText = "Please fill login field";
        ok = false;
    }

    if(password.value==""){
        passwordHelp.innerText = "Please fill password field";
        ok = false;
    }

    if(ok){
        logform.submit();
    }
}