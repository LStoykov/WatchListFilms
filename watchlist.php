<?php
  $title="Watchlist";
  include("includes/header.php");
  include("functions/info.php");
  include("functions/db.php")
 ?>

   <div id="content">
       <div class="container">
           <div class="col-md-12">

               <ul class="breadcrumb">
                   <li>
                       <a href="index.php">Home</a>
                   </li>
                   <li>
                       Watch List
                   </li>
               </ul>

           </div>

           <div id="cart" class="col-md-12">

               <div class="box">

                   <form action="watchlist.php" method="post" enctype="multipart/form-data">

                       <h1>Movie Watch List</h1>
                       <?php
                       function getRealIpUser(){

                           switch(true){

                                   case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
                                   case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
                                   case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];

                                   default : return $_SERVER['REMOTE_ADDR'];
                           }
                       }

                       $ip_add = getRealIpUser();


                       $get_row = "SELECT COUNT(*) FROM watchlist where ip_add='$ip_add'";
                       $query = mysqli_query($con,$get_row);
                       $result = mysqli_fetch_array($query);
                       ?>
                       <p class="text-muted">You currently have <?php echo $result[0]; ?> item(s) in your movie watch list </p>

                       <?php
                       $sql = "SELECT movie_id FROM watchlist where ip_add='$ip_add'";
                       $query = mysqli_query($con,$sql);
                       while ($result = mysqli_fetch_array($query)) {
                       $mov_id = $result['movie_id'];
                       $id_movie = $mov_id;


                       include_once "api/api_movie_id.php";
                       echo
                       '<div class="table-responsive">
                           <table class="table">
                               <thead>
                                   <tr>
                                       <th colspan="2">Movie</th>
                                       <th>Rating</th>
                                       <th>Popularity</th>
                                       <th>Vote</th>
                                   </tr>
                               </thead>
                               <tbody>
                                   <tr>
                                       <td>
                                           <img class="img-responsive" src="'.$imgurl_1.''. $movie_id->poster_path . '" alt="Image">
                                       </td>
                                       <td>
                                           <a href="movies.php?id=' . $movie_id->id . '"><div class="text">' . $movie_id->original_title . " (" . substr($movie_id->release_date, 0, 4) . ")</a>
                                       </td>
                                       <td>
                                          <em> " . $movie_id->vote_average . "</em>
                                       </td>
                                       <td>
                                           <em>" . round($movie_id->popularity) . "</em>
                                       </td>

                                       <td>
                                           <em>" . $movie_id->vote_count . "</em>
                                       </td>


                                   </tr>

                                   </tr>

                               </tfoot>

                           </table>

                       </div>";
                     }
                       ?>



                       <div class="box-footer">

                           <div class="pull-left">

                               <a href="index.php" class="btn btn-default">

                                   <i class="fa fa-chevron-left"></i> Browsing More

                               </a>

                           </div>

                           <div class="pull-right">

                               <button type="submit" name="update" value="Update List" class="btn btn-primary">

                                   <i class="fa fa-refresh"></i> Update List

                               </button>

                           </div>

                       </div>

                   </form>

               </div>

               <?php

                function update_list(){
                  global $con;

                  if (isset($_POST['update'])) {
                    foreach ($_POST['remove'] as $remove_id) {
                      $delete_list = "delete from watchlist where movie_id='$remove_id'";
                      $run_delete = mysqli_query($con,$delete_list);
                      if ($run_delete) {
                        echo "<script>window.open('watchlist.php','_self')</script>";

                      }

                    }

                  }

                }

                echo $up_cart = update_list();

                ?>

           </div>

       </div>
   </div>

   <?php

    include("includes/footer.php");

    ?>

    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>


</body>
</html>
