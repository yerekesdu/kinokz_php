function getCinema(){
    let url = "movies.php?cinemaid="+cinema.value;
    if(cinema.value==0){
        url = "movies.php";
        console.log(cinema.value);
    }
        
    window.location = url;
}

function getFilm(){
    let url = "movies.php?filmid="+film.value;
    if(film.value==0){
        url = "movies.php";
        console.log(film.value);
    }
    window.location = url;
}