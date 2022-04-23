<?php

class Movie {

    public $movieId;
    public $title;
    public $length;
    public $releaseDate;
    public $price;
    public $description;
    public $pathInfo;

    public function __construct($movieId, $title, $length, $releaseDate, $price, $description, $pathInfo) 
    {
        $this->movieId = $movieId;
        $this->title = $title;
        $this->length = $length;
        $this->releaseDate = $releaseDate;
        $this->price = $price;
        $this->description = $description;
        $this->pathInfo = $pathInfo;
    }


    public function getMovieId() {
        return $this->movieId;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getLength() {
        return $this->length;
    }

    public function getReleaseDate() {
        return $this->releaseDate;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getPathInfo() {
        return $this->pathInfo;
    }
}


?>