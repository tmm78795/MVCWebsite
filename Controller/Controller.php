<?php

    class Controller {

        public $model;

        public function __construct()
        {
            session_start();
            
        }

        // for sanitizing the string from user
        public static function sanitizeString($string) {
            $string = stripslashes($string);
            $string = htmlentities($string);
            $string = strip_tags($string);
            return $string;
        }

        // for index page 
        public function invoke() {
            if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == 1) {
                $isLoggedIn = true;
                require_once "Model/MovieModel.php";
                $this->model = new MovieModel();
                $movies = $this->model->getMovies();
                include_once "View/Public/index.php";
            }
            else {
                $isLoggedIn = false;
                require_once "Model/MovieModel.php";
                $this->model = new MovieModel();
                $movies = $this->model->getMovies();
                include_once "View/Public/index.php";
               
            }
            
            
        }

        // load the SignIn Page.
        public function signIn() {
            include_once "View/Public/signIn.php";
            
        }

        public function signUp() {
            include_once "View/Public/signUp.php";
            
            
        }

        // add New User
        public function addUser() {

            if(isset($_POST['name']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['mobileNumber'])) 
            {
                $name = Controller::sanitizeString($_POST['name']);
                $username = Controller::sanitizeString($_POST['username']);
                $password = Controller::sanitizeString($_POST['password']);
                $email = Controller::sanitizeString($_POST['email']);
                $mobileNumber = Controller::sanitizeString($_POST['mobileNumber']);

                require_once "Model/UserModel.php";
                $UserModelObj = new UserModel();
                $cuser = $UserModelObj->addUser($username, $password, $name, $email, $mobileNumber);

                if($user) 
                {
                    $_SESSION['user'] = $user->getName();
                    $_SESSION['username'] = $username;
                    $_SESSION['isLoggedIn'] = 1;

                    header("location:index.php?function=homePage");
                }

                else {
                    header("location:index.php?function=invoke");
                }
            }
        }
        

        public function checkLogin() {

            if(isset($_POST['username']) && $_POST['username'] != "" && isset($_POST['password']) && $_POST['password'] != "") 
            {
                $username = Controller::sanitizeString($_POST['username']);
                $password = Controller::sanitizeString($_POST['password']);

                require_once "Model/UserModel.php";

                $this->model = new UserModel();
                $user = $this->model->getUser($username, $password);

                if($user != false) {
                    $_SESSION['user'] = $user->getName();
                    $_SESSION['username'] = $username;
                    $_SESSION['isLoggedIn'] = 1;

                    header("location:index.php?function=homePage");
                }
                
                else {
                    header("location:index.php?function=invoke");
                }
            }

            else 
            {
                header("location:index.php?function=invoke");
            }
             
        }


        public function logOut() {
            $isLoggedIn = false;
            session_destroy();
            header("location:index.php?function=invoke");
        }


        


        public function movieProfile() 
        {
            $isLoggedIn = false;
            if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == 1) {

            
                $isLoggedIn = true;
                
            }
            
            if (isset($_POST['movieId']) ) {
                
                $movieId = Controller::sanitizeString($_POST['movieId']);
                require_once "Model/MovieModel.php";
                $movieModel = new MovieModel();
                $movie = $movieModel->getMovie($movieId);
                $dates = $movieModel->getDistinctShowDates($movieId);
                include_once "View/selectedMovie.php";
            }

            else if(isset($_GET['movieId'])) 
            {
                $movieId = Controller::sanitizeString($_GET['movieId']);
                require_once "Model/MovieModel.php";
                $movieModel = new MovieModel();
                $movie = $movieModel->getMovie($movieId);
                $dates = $movieModel->getDistinctShowDates($movieId);
                include_once "View/Public/selectedMovie.php";
            }
            
            else 
            {
                header("location:index.php?function=invoke");
            }
            

            
           
        }

        

        public function booking() {
            if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == 1)
            {

                if (isset($_POST['movieId']) && isset($_POST['showDate']) && isset($_POST['showTime'])) 
                {
                    $movieId = Controller::sanitizeString($_POST['movieId']);
                    $date = Controller::sanitizeString($_POST['showDate']);
                    $time = Controller::sanitizeString($_POST['showTime']);
                    $seats = Controller::sanitizeString($_POST['seats']);
                    require_once "Model/MovieModel.php";
                    $movieModel = new MovieModel();
                    $movie = $movieModel->getMovie($movieId);

                    require_once "Model/ShowModel.php";
                    $showModelObj = new ShowModel();
                    $confirmed = $showModelObj->booking($movie, $date, $time, $seats);
                    $total = $seats * $movie->getPrice();
                    $movieTitle = $movie->getTitle();
                    include_once "View/Public/booking.php";
                }
                
                else 
                {
                    header("location:index.php?function=homePage");
                }

            }

            else 
            {
                header("location:index.php?function=invoke");
            }
            

        }


        public function myAccount() {

            if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == 1)
            {
                $username = $_SESSION['username'];
                require_once "Model/ShowModel.php";
                $showModelObj = new ShowModel();
                $shows = $showModelObj->getMyBookings($username);
                $pastShows = $shows['pastShows'];
                $upcomingShows = $shows['upcomingShows'];
                
                include_once "View/Public/myAccount.php";
            }
        }

        public function deleteBooking() {

            if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == 1)
            {
                if(isset($_POST['movieId']) && isset($_POST['date']) && isset($_POST['time']) && isset($_POST['seats'])) {

                    $movieId = $_POST['movieId'];
                    $showTime = $_POST['time'];
                    $showDate = $_POST['date'];
                    $seats = $_POST['seats'];
                    $username = $_SESSION['username'];

                    require_once "Model/booking.php";
                    $this->model = new Booking();
                    $this->model->deleteBooking($username, $movieId, $showDate, $showTime, $seats);

                    header("location:index.php?function=myAccount");


                    
                }

            }

        
        }

    }


    

?>