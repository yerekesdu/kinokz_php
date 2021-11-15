<?php
    try{
        $connection = new PDO("mysql:host=localhost;dbname=kinokz","root","");
    }
    catch(Exception $e){
        echo $e->getMessage();
    }

    function getUser($login){
        global $connection;
        try{
            $query = $connection->prepare("select u.id, u.login, u.password, u.fullname, r.rolename, r.code
            from users u inner join roles r on u.role_id = r.id
            where u.login = ?");
            $query->execute([$login]);
            $result = $query->fetch();
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        return $result;
    }

    function registerUser($login, $password, $fullname){
        global $connection;

        try{
            $query = $connection->prepare("insert into users(login,
            password, fullname) values (?,?,?)");
            $query->execute([$login, $password, $fullname]);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
    }
    
    function getAllGoods(){
        global $connection;
        try{
            $query = $connection->prepare("select g.id, g.name, 
            g.description,  g.price, g.qty, g.image, g.category_id, c.name as cname
            from goods g inner join 
            categories c on g.category_id=c.id");
            $query->execute();
            $result = $query->fetchAll();
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        return $result;
    }

    function getAllFilms(){
        global $connection;
        try{
            $query = $connection->prepare("select f.id, f.name, 
            substr(f.description,1,70) as short_desc, f.description, 
            ft.type_name, c.name as cname, f.duration, f.image
            from films f inner join 
            film_types ft on f.type_id=ft.id 
            inner join country c on f.country_id = c.id
            ");
            $query->execute();
            $result = $query->fetchAll();
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        return $result;
    }

    function getAllCinemas(){
        global $connection;
        try{
            $query = $connection->prepare("select cn.id, cn.name, 
            substr(cn.description,1,70) as short_desc, cn.description, 
            ct.city_name, cn.address, cn.contacts, cn.image
            from cinemas cn inner join 
            cities ct on cn.city_id=ct.id 
            ");
            $query->execute();
            $result = $query->fetchAll();
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        return $result;
    }

    function getAllMovies(){
        global $connection;
        try{
            $query = $connection->prepare("SELECT m.id, c.name as cname, f.name as fname, 
            m.time, m.price, m.buy from movie m INNER JOIN cinemas c 
            on m.cinema_id = c.id INNER JOIN films f 
            on m.film_id = f.id
            order by m.time;
            ");
            $query->execute();
            $result = $query->fetchAll();
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        return $result;
    }

    function getAllCities(){
        global $connection;
        try{
            $query = $connection->prepare("SELECT * from cities");
            $query->execute();
            $result = $query->fetchAll();
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        return $result;
    }

    function getAllFilmTypes(){
        global $connection;
        try{
            $query = $connection->prepare("SELECT * from film_types");
            $query->execute();
            $result = $query->fetchAll();
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        return $result;
    }

    function getMoviesById($id){
        global $connection;
        try{
            $query = $connection->prepare("SELECT m.id, c.name as cname, f.name as fname, 
            m.time, m.price, m.buy from movie m INNER JOIN cinemas c 
            on m.cinema_id = c.id INNER JOIN films f 
            on m.film_id = f.id
            where m.id = (select movie_id from tickets where id = ?) 
            order by m.time;
            ");
            $query->execute([$id]);
            $result = $query->fetch();
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        return $result;
    }

    function getMoviesByCinema($id){
        global $connection;
        try{
            $query = $connection->prepare("SELECT m.id, c.name as cname, f.name as fname, 
            m.time, m.price, m.buy from movie m INNER JOIN cinemas c 
            on m.cinema_id = c.id INNER JOIN films f 
            on m.film_id = f.id
            where c.id = ?
            order by m.time;
            ");
            $query->execute([$id]);
            $result = $query->fetchAll();
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        return $result;
    }

    function getMoviesByFilm($id){
        global $connection;
        try{
            $query = $connection->prepare("SELECT m.id, c.name as cname, f.name as fname, 
            m.time, m.price, m.buy from movie m INNER JOIN cinemas c 
            on m.cinema_id = c.id INNER JOIN films f 
            on m.film_id = f.id
            where f.id = ?
            order by m.time;
            ");
            $query->execute([$id]);
            $result = $query->fetchAll();
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        return $result;
    }

    function getFilm($id){
        global $connection;
        try{
            $query = $connection->prepare("select f.id, f.name, 
            substr(f.description,1,70) as short_desc, f.description, 
            ft.type_name, c.name as cname, f.duration, f.image
            from films f inner join 
            film_types ft on f.type_id=ft.id 
            inner join country c on f.country_id = c.id
            where f.id = ?
            ");
            $query->execute([$id]);
            $result = $query->fetch();
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        return $result;
    }

    function getBalance($id){
        global $connection;
        try{
            $query = $connection->prepare("select p.balance from profile p 
            inner join users u on p.user_id = u.id 
            where u.id = ?;
            ");
            $query->execute([$id]);
            $result = $query->fetch();
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        return $result;
    }

    function getUserInfo($id){
        global $connection;
        try{
            $query = $connection->prepare("select u.id, u.fullname, r.rolename, p.email, p.balance
            from profile p 
            inner join users u on p.user_id = u.id
            inner join roles r on u.role_id = r.id 
            where u.id = ?;
            ");
            $query->execute([$id]);
            $result = $query->fetch();
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        return $result;
    }

    function getCinema($id){
        global $connection;
        try{
            $query = $connection->prepare("select cn.id, cn.name, 
            substr(cn.description,1,70) as short_desc, cn.description, 
            ct.city_name, cn.address, cn.contacts, cn.image
            from cinemas cn inner join 
            cities ct on cn.city_id=ct.id 
            where cn.id = ?
            ");
            $query->execute([$id]);
            $result = $query->fetch();
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        return $result;
    }

    function getFilmsbyType($id){
        global $connection;
        try{
            $query = $connection->prepare("select f.id, f.name, 
            substr(f.description,1,70) as short_desc, f.description, 
            ft.type_name, c.name as cname, f.duration, f.image
            from films f inner join 
            film_types ft on f.type_id=ft.id 
            inner join country c on f.country_id = c.id
            where f.type_id=?
            ");
            $query->execute([$id]);
            $result = $query->fetchAll();
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        return $result;
    }

    function getCinemasbyCity($id){
        global $connection;
        try{
            $query = $connection->prepare("select cn.id, cn.name, 
            substr(cn.description,1,70) as short_desc, cn.description, 
            ct.city_name, cn.address, cn.contacts, cn.image
            from cinemas cn inner join 
            cities ct on cn.city_id=ct.id 
            where cn.city_id=?
            ");
            $query->execute([$id]);
            $result = $query->fetchAll();
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        return $result;
    }   

    function getAllCategories(){
        global $connection;
        try{
            $query = $connection->prepare("select * from categories;");
            $query->execute();
            $result = $query->fetchAll();
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        return $result;
    }

    function addGood($name, $description, $price, $qty, $image, $category_id){
        global $connection;

        try{
            $query = $connection->prepare("insert into goods(name,
            description, price, qty, image, category_id) values (?,?,?,?,?,?)");
            $query->execute([$name, $description, $price, $qty, $image, $category_id]);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
    }
    
    function addMovie($cinema_id, $film_id, $time, $price){
        global $connection;

        try{
            $query = $connection->prepare("insert into movie(cinema_id,
            film_id, time, price) values (?,?,?,?)");
            $query->execute([$cinema_id, $film_id, $time, $price]);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
    }

    function addCategory($name, $description){
        global $connection;

        try{
            $query = $connection->prepare("insert into categories(name,
            description) values (?,?)");
            $query->execute([$name, $description]);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
    }

    function getGood($id){
        global $connection;
        try{
            $query = $connection->prepare("select * from goods
            where id = ?");
            $query->execute([$id]);
            $result = $query->fetch();
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        return $result;
    }

    function getCategory($id){
        global $connection;
        try{
            $query = $connection->prepare("select * from categories
            where id = ?");
            $query->execute([$id]);
            $result = $query->fetch();
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        return $result;
    }

    function getCategoryName($id){
        global $connection;
        try{
            $query = $connection->prepare("select name from categories
            where id = ?");
            $query->execute([$id]);
            $result = $query->fetch();
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        return $result;
    }

    function goodByCatID($id){
        global $connection;
        try{
            $query = $connection->prepare("select * from goods
            where category_id = ?");
            $query->execute([$id]);
            $result = $query->fetchAll();
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        return $result;
    }

    function updateGood($id, $name, $description, $price, $qty, $image, $category_id){
        global $connection;

        try{
            $query = $connection->prepare("update goods set name=?, description=?, 
            price=?, qty=?, image=?, category_id=?
            where id =?");

             $query->execute([$name, $description, $price, $qty, $image, $category_id, $id]);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
    }

    function updateCategory($id, $name, $description){
        global $connection;

        try{
            $query = $connection->prepare("update categories set name=?, description=?
            where id =?");

             $query->execute([$name, $description, $id]);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
    }

    function deleteGood($id){
        global $connection;

        try{
            $query = $connection->prepare("delete from goods where id =?");

             $query->execute([$id]);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
    }

    function deleteCategory($id){
        global $connection;

        try{
            $query = $connection->prepare("delete from categories where id =?");

             $query->execute([$id]);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
    }

    function addUser($username, $password, $person_name, $person_surname){
        global $connection;

        try{
            $query = $connection->prepare("insert into users(login,
            password, person_name, person_surname) values (?,?,?,?)");
            $query->execute([$username, $password, $person_name, $person_surname]);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
    }

    function addTicket($user_id, $movie_id){
        global $connection;

        try{
            $query = $connection->prepare("insert into tickets(user_id,
            movie_id) values (?,?)");
            $query->execute([$user_id, $movie_id]);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
    }

    function getAllUsers(){
        global $connection;
        try{
            $query = $connection->prepare("select login, password from users;");
            $query->execute();
            $result = $query->fetchAll();
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        return $result;
    }

    function getTicketsByUser($id){
        global $connection;
        try{
            $query = $connection->prepare("select t.id from tickets t 
            INNER JOIN users u on u.id = t.user_id
            where u.id = ?
            ");
            $query->execute([$id]);
            $result = $query->fetchAll();
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        return $result;
    }

    function getName($login){
        global $connection;
        try{
            $query = $connection->prepare("select person_name, person_surname from users where login=?;");
            $query->execute([$login]);
            $result = $query->fetch();
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        return $result;
    }

    function getId($login){
        global $connection;
        try{
            $query = $connection->prepare("select id from users where login=?;");
            $query->execute([$login]);
            $result = $query->fetch();
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        return $result;
    }

    function addToBasket($user_id, $good_id, $qty){
        global $connection;

        try{
            $query = $connection->prepare("insert into userbasket(user_id, good_id, qty) values (?,?,?)");
            $query->execute([$user_id, $good_id, $qty]);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
    }

    function getUserBasket(){
        global $connection;
        try{
            $query = $connection->prepare("select * from userbasket");
            $query->execute();
            $result = $query->fetchAll();
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        return $result;
    }

    


?>