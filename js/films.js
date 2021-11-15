function getfilmtype(){
    let url = "films.php?type="+selid.value;
    if(selid.value==0){
        url = "films.php";
        console.log(selid.value);
    }
    window.location = url;
}

