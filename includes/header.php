<?php
session_start();
include("functions/db.php");
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
      <?php echo $title ?>
    </title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>

  <div id="top">

       <div class="container">

           <div class="col-md-6 offer">

               <a href="index.php" class="btn btn-success btn-sm">
                 <?php
                    if (!isset($_SESSION['user_email'])) {
                      echo "Welcome : Guest";
                    }else {
                      echo "Welcome : ". $_SESSION['user_email'] ."";
                    }
                  ?>
               </a>


               <a href="now_playing.php">Check Out Now Playing Movies!</a>

           </div>

           <div class="col-md-6">

           </div>

           <div class="col-md-6">

               <ul class="menu">

                   <li>
                       <a href="user_register.php">Register</a>
                   </li>
                   <li>
                       <a href="my_account.php">My Account</a>
                   </li>
                   <li>
                       <a href="checkout.php">
                         <?php
                            if (!isset($_SESSION['user_email'])) {
                              echo "<a href = 'login.php'>Login</a>";
                            }else {
                              echo "<a href = 'logout.php'>Logout</a>";
                            }
                          ?>
                       </a>
                   </li>

               </ul>

           </div>

       </div>

   </div>

   <div id="navbar" class="navbar navbar-default">

       <div class="container">

           <div class="navbar-header">

               <a href="index.php" class="navbar-brand home">

                   <img src="images/logox.png" alt="Logo" class="hidden-xs">
                   <img src="images/logos-mobile.png" alt="Logo Mobile" class="visible-xs">

               </a>

           </div>

           <div class="navbar-collapse collapse" id="navigation">

               <div class="padding-nav">

                   <ul class="nav navbar-nav left">

                       <li>
                           <a href="index.php">Home</a>
                       </li>
                       <li>
                           <a href="popular.php">Popular</a>
                       </li>
                       <li>
                           <a href="now_playing.php">Now Playing</a>
                       </li>
                       <li>
                           <a href="top_rated.php">Top Rated</a>
                       </li>
                       <li>
                           <a href="watchlist.php">My Watch List</a>
                       </li>
                     

                   </ul>

               </div>

               <a href="watchlist.php" class="btn navbar-btn btn-primary right">

                   <i class="fa fa-film"></i>

                   <?php
                   include_once "functions/db.php";
                   $get_row = "SELECT COUNT(*) FROM watchlist";
                   $query = mysqli_query($con,$get_row);
                   $result = mysqli_fetch_array($query);
                   echo $result[0];
                   ?>
                   <span>Movie(s) In Your Watchlist</span>

               </a>

               <div class="navbar-collapse collapse right">

                   <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search"><!-- btn btn-primary navbar-btn Begin -->

                       <span class="sr-only">Toggle Search</span>

                       <i class="fa fa-search"></i>

                   </button>

               </div>

               <div class="collapse clearfix" id="search">

                   <form method="get" action="search.php" class="navbar-form">

                       <div class="input-group">

                           <input type="text" class="form-control" placeholder="Search" name="search" required>
                           <select name="channel" required>
                             <option value="movie" selected="selected">Movie
                             </option>
                             
                           </select>

                           <span class="input-group-btn">

                           <button type="submit" value="movie" class="btn btn-primary">

                               <i class="fa fa-search"></i>

                           </button>

                           </span>

                       </div>

                   </form>

               </div>

           </div>

       </div>

   </div>
