function getCity(){
    let url = "cinemas.php?city="+selid.value;
    if(selid.value==0){
        url = "cinemas.php";
        console.log(selid.value);
    }
        
    window.location = url;
}
