<?php

class Show {

    public $movieId;
    public $showDate;
    public $showTime;
    public $seats;
 

    public function __construct($movieId, $showDate, $showTime, $seats) 
    {
        $this->movieId = $movieId;
        $this->showDate = $showDate;
        $this->showTime = $showTime;
        $this->seats = $seats;
        
    }

    public function getMovieId() {
        return $this->movieId;
    }

    public function getShowDate() {
        return $this->showDate;
    }


    public function getShowTime() {
        return $this->showTime;
    }

    public function getSeats() {
        return $this->seats;
    }

    public function isSame(Show $obj) {
        return $this->getShowDate() === $obj->getShowDate();
    }

}


?>