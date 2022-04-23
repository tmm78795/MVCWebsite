<?php

require_once "Model/connection.php";
require_once "Model/Movie.php";

class MovieModel {

    public $con;

    public function __construct()
    {
        $this->con = new mysqli(DB_HOSTNAME,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
        if ($this->con->connect_error)
        {
            die("Connection failed: " . $this->con->connect_error);
        }
    }


    public function getMovies() {

        $query = "SELECT * FROM `movie`";
        $result = $this->con->query($query);

        $list = array();
       
        while($movie = $result->fetch_assoc()) {
            $movieId = $movie['movieId'];
            $title = $movie['title'];
            $length = $movie['length'];
            $releaseDate = $movie['releaseDate'];
            $price = $movie['price'];
            $description = $movie['Description'];
            $pathInfo = $movie['pathInfo'];
            $obj = new Movie($movieId, $title, $length,$releaseDate, $price, $description, $pathInfo);

            array_push($list, $obj);
        }

        
            return $list;
       
    }


    public function getMovie($movieId) {
        $list = $this->getMovies();
        foreach($list as $movie) {
            if($movie->getmovieId() == $movieId) 
            {
                return $movie;
            }
        }
    }



    public function addMovie($movieId, $title, $length,$releaseDate, $price, $description, $pathInfo) {


        $movie = new Movie($movieId, $title, $length,$releaseDate, $price, $description, $pathInfo);

        $addMovieQuery = "INSERT INTO `movie` (`title`, `length`, `releaseDate`, `price`, `description`, `pathInfo`)
                            VALUES('".$movie->getTitle()."', '".$movie->getLength()."', '".$movie->getReleaseDate()."', '".$movie->getPrice()."', '".$movie->getDescription()."', '".$movie->getPathInfo()."')";

        $this->con->query($addMovieQuery);

        return true;

    }


    public function updateMovie($movieId, $title, $length,$releaseDate, $price, $description, $pathInfo) {

        $movie = new Movie($movieId, $title, $length,$releaseDate, $price, $description, $pathInfo);
        

        $updateQuerry = "UPDATE `movie`  
            SET `title`='".$movie->getTitle()."', `length`='".$movie->getLength()."', `releaseDate`='".$movie->getReleaseDate()."', `price`='".$movie->getPrice()."', `Description`='".$movie->getDescription()."', `pathInfo`='".$movie->getPathInfo()."'
            WHERE `movieId`='".$movie->getMovieId()."'";
        
        $this->con->query($updateQuerry);
        

    }

    public function deleteMovie($movieId) {

        $movie = $this->getMovie($movieId);
        $pathInfo = $movie->getPathInfo();
        $query = "DELETE FROM movie WHERE `movieId` ='".$movieId."'";
        $this->con->query($query);

        return $pathInfo;
    }

    
}

?>