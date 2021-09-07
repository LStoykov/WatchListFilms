<?php
include("api/api_movie_id.php");
include("functions/db.php");

function getRealIpUser(){

    switch(true){

            case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
            case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
            case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];

            default : return $_SERVER['REMOTE_ADDR'];
    }
}

function add_watchlist(){

    global $con;

    if(isset($_GET['id'])){

        $id_movie = $_GET['id'];

        $date = date("Y-m-d");

        $ip_add = getRealIpUser();

        $check_watchlist= "select * from watchlist where ip_add='$ip_add' AND movie_id='$id_movie'";

        $run_check = mysqli_query($con,$check_watchlist);

        if(mysqli_num_rows($run_check)>0){

            echo "<script>alert('This movie has already added in watchlist')</script>";

        }else{

            $query = "INSERT INTO watchlist (movie_id,user_id,ip_add,notes,created_date,created_by,updated_date,updated_by)
            VALUES ('$id_movie','','$ip_add','','$date','','$date','')";

            $run_query = mysqli_query($con,$query);
        }

    }

}

?>
