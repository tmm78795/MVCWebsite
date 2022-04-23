<?php

class AdminController
{

    public $model;

    public function __construct()
    {
        session_start();
    }

    public static function sanitizeString($string)
    {
        $string = stripslashes($string);
        $string = htmlentities($string);
        $string = strip_tags($string);
        return $string;
    }

    public function invoke()
    {
        include "View/admin/signIn.php";
    }

    public function newMovie()
    {

        include "View/admin/addMovie.php";
    }

    public function checkLogin()
    {
        if (isset($_POST['adminName']) && $_POST['adminName'] != "" && isset($_POST['password']) && $_POST['password'] != "") {
            $adminName = AdminController::sanitizeString($_POST['adminName']);
            $password = AdminController::sanitizeString($_POST['password']);

            require_once "Model/AdminModel.php";

            $this->model = new AdminModel();
            $user = $this->model->getAdmin($adminName, $password);

            if ($user != false) {

                $_SESSION['admin'] = $user->getName();
                $_SESSION['adminName'] = $adminName;
                $_SESSION['isLoggedIn'] = 1;


                header("location:index1.php?function=homePage");
            } else {
                header("location:index1.php?function=invoke");
            }
        } else {

            if (isset($_SESSION['isLoggedIn']) === 1) {
                header("location:index1.php?function=homePage");
            }
            header("location:index1.php?function=invoke");
        }
    }

    public function homePage()
    {

        if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == 1) {

            require_once "Model/MovieModel.php";
            $movieModel = new MovieModel();
            $movies = $movieModel->getMovies();
            include "View/admin/homePage.php";


        } else {
            header("location:index1.php?function=invoke");
        }
    }

    public function addNewMovie()
    {
        if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == 1) {

        

        $title = $_POST['title'];
        $length = $_POST['length'];
        $releaseDate = $_POST['releaseDate'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $pathInfo = "";

        // for saving movie Image
        $filedirectory = "View/Images/Movies/";
        $imageFile = $filedirectory . basename($_FILES['imageToUpload']['name']);
        $uploadOk = 1;
        // to check extension of the file
        $fileExtension = strtolower(pathinfo($imageFile, PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["imageToUpload"]["tmp_name"]);
        if ($check !== false) {
            
            $uploadOk = 1;
        } else {
            $error = "File is not an image.";
            header("location:index1.php?function=newMovie&error=$error");
            $uploadOk = 0;
        }


        // Check if file already exists
        if (file_exists($imageFile)) {
            $error = "Sorry, file already exists.";
            header("location:index1.php?function=newMovie&error=$error");
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["imageToUpload"]["size"] > 500000) {
            $error = "Sorry, your file is too large.";
            header("location:index1.php?function=newMovie&error=$error");
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (
            $fileExtension != "jpg" && $fileExtension != "png" && $fileExtension != "jpeg"
            && $fileExtension != "gif"
        ) {
            $error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            header("location:index1.php?function=newMovie&error=$error");
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if($uploadOk == 1) {
            $imageFile = $filedirectory . $title . "." . $fileExtension;
            $pathInfo = $imageFile;

            move_uploaded_file($_FILES["imageToUpload"]["tmp_name"], $imageFile);

            // now add the movie to database

            require_once "Model/MovieModel.php";
            $this->model = new MovieModel();
            
            $this->model->addMovie(1, $title, $length, $releaseDate, $price, $description, $pathInfo);
        
            header("location:index1.php?function=homePage");

        }



        }

        else {
            header("location:index1.php?function=checkLogin");
        }

    }

    public function movieProfile() {

        if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == 1) 
        {
            require_once ("Model/MovieModel.php");
            $movieId = $_GET['movieId'];
            $this->model = new MovieModel();
            $movie = $this->model->getMovie($movieId);
            include_once "View/admin/movieProfile.php";
        }

    }


    public function updateMovie() {
        if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == 1) 
         {

            if($_FILES['imageToUpload']['size'] == 0) {
                
                $movieId = $_POST['movieId'];
                $title = $_POST['title'];
                $length = $_POST['length'];
                $releaseDate = $_POST['releaseDate'];
                $price = $_POST['price'];
                $description = $_POST['description'];
                

                

                require_once "Model/MovieModel.php";
                $this->model = new MovieModel();
                $movie =$this->model->getMovie($movieId);
                $pathInfo = $movie->getPathInfo();
                
                $this->model->updateMovie($movieId, $title, $length, $releaseDate, $price, $description, $pathInfo);
                
                header("location:index1.php?function=homePage");


            }
            else 
             {
                $pathInfo =  $_POST['pathInfo'];
                unlink($pathInfo);
                $movieId = $_POST['movieId'];
                $title = $_POST['title'];
                $length = $_POST['length'];
                $releaseDate = $_POST['releaseDate'];
                $price = $_POST['price'];
                $description = $_POST['description'];
                

                // for saving movie Image
                $filedirectory = "View/Images/Movies/";
                $imageFile = $filedirectory . basename($_FILES['imageToUpload']['name']);
                $uploadOk = 1;
                // to check extension of the file
                $fileExtension = strtolower(pathinfo($imageFile, PATHINFO_EXTENSION));
                $check = getimagesize($_FILES["imageToUpload"]["tmp_name"]);
                if ($check !== false) {
                    
                    $uploadOk = 1;
                } else {
                    $error = "File is not an image.";
                    header("location:index1.php?function=newMovie&error=$error");
                    $uploadOk = 0;
                }


                // Check if file already exists
                if (file_exists($imageFile)) {
                    $error = "Sorry, file already exists.";
                    header("location:index1.php?function=newMovie&error=$error");
                    $uploadOk = 0;
                }

                // Check file size
                if ($_FILES["imageToUpload"]["size"] > 500000) {
                    $error = "Sorry, your file is too large.";
                    header("location:index1.php?function=newMovie&error=$error");
                    $uploadOk = 0;
                }

                // Allow certain file formats
                if (
                    $fileExtension != "jpg" && $fileExtension != "png" && $fileExtension != "jpeg"
                    && $fileExtension != "gif"
                ) {
                    $error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    header("location:index1.php?function=newMovie&error=$error");
                    $uploadOk = 0;
                }

                // Check if $uploadOk is set to 0 by an error
                if($uploadOk == 1) {
                    $imageFile = $filedirectory . $title . "." . $fileExtension;
                    $pathInfo = $imageFile;

                    move_uploaded_file($_FILES["imageToUpload"]["tmp_name"], $imageFile);

                    // now add the movie to database

                    require_once "Model/MovieModel.php";
                    $this->model = new MovieModel();
                    
                    $this->model->updateMovie($movieId, $title, $length, $releaseDate, $price, $description, $pathInfo);
                
                    header("location:index1.php?function=homePage");

                
                }

            }

            
        }
    }

    public function deleteMovie() {

        if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == 1)
        {
            $movieId = AdminController::sanitizeString($_GET['movieId']);
            require_once('Model/MovieModel.php');
            $this->model = new MovieModel();
            $pathInfo = $this->model->deleteMovie($movieId);
            unlink($pathInfo);

            header("location:index1.php?function=homePage");
        }
    }


}
