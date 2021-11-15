function register(){
    fullnameHelp.value = "";
    loginHelp.innerText = "";
    passwordHelp.innerText= "";
    repasswordHelp.innerText = "";
    let ok = true;

    if(fullname.value==""){
        fullnameHelp.innerText = "Please fill fullname field";
        ok = false;
    }

    if(login.value==""){
        loginHelp.innerText = "Please fill login field";
        ok = false;
    }

    if(password.value==""){
        passwordHelp.innerText = "Please fill password field";
        ok = false;
    }

    if(repassword.value==""){
        repasswordHelp.innerText = "Please fill repassword field";
        ok = false;
    }
    
    if(password.value != repassword.value){
        passwordHelp.innerText = repasswordHelp.innerText ="Passwords are different";
        ok = false;
        return;
    }
    if(password.value.length < 6){
        passwordHelp.innerText ="Password must be at least 6 symbols";
        ok = false;;
    }
    if(repassword.value.length < 6){
        repasswordHelp.innerText ="Password must be at least 6 symbols";
        ok = false;;
    }

    if(ok){
        regform.submit();
    }
}