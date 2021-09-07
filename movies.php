<?php
  include("functions/info.php");
  $id_movie = $_GET['id'];
  include_once "api/api_movie_id.php";
  include_once "api/api_movie_video_id.php";
  include_once "api/api_movie_similar.php";
  $title = "Update List (".$movie_id->original_title.")";
  include("includes/header.php");
  include("functions/function.php");
  include("functions/db.php");
?>

    <?php
    if(isset($_GET['id'])){
    $id_movie = $_GET['id'];
    ?>

    <div class="box">
    <h1><?php echo $movie_id->original_title ?></h1>

    <?php
      echo "<h5>~ ".$movie_id->tagline." ~</h5>";
    ?>

    <?php
      $query = "SELECT movie_id, notes FROM watchlist where movie_id = '$id_movie'";
      $result = mysqli_query($con,$query);
      $row = mysqli_fetch_assoc($result);

      echo "Notes: " .$row['notes']. "";
     ?>

     <div class="form-group">
         <input type="text" placeholder="type here to update notes" class="form-control" name="notes">
     </div>

       <form action="movies.php?id=<?php echo $id_movie; ?>" class="form-horizontal" method="post">
           <p class="text-left buttons">
             <button type='submit' name="insert" class="btn btn-primary i fa fa-refresh"> Update Notes</button></p>
       </form>

       <form action="watchlist.php" class="form-horizontal" method="post">
           <p class="text-left buttons">
             <button type='submit' name="delete" class="btn btn-danger i fa fa-trash"> Delete List</button></p>
       </form>

     </div>

     <?php
     if (isset($_POST['insert'])) {
        $notes = $_POST['notes'];
        echo $notes;

        $update = "UPDATE watchlist SET notes='$notes' where movie_id = '$movie_id'";
        $run = mysqli_query($con,$update);
     }?>

     <?php
     if (isset($_POST['delete'])) {
        $update = "DELETE FROM watchlist where movie_id = '$movie_id'";
        $run = mysqli_query($con,$update);
     }?>



          <div class="box">
            <img src="<?php echo $imgurl_2 ?><?php echo $movie_id->poster_path ?>">
            <div class="box">
              <p>Title : <?php echo $movie_id->original_title ?></p>
              <p>Tagline : <?php echo $movie_id->tagline ?></p>
              <p>Genres :
                  <?php
                    foreach($movie_id->genres as $g){
                      echo '<span>' . $g->name . '</span> ';
                    }
                  ?>
              </p>
              <p>Overview : <?php echo $movie_id->overview ?></p>
              <p>Release Date : <?php $rel = date('d F Y', strtotime($movie_id->release_date)); echo $rel ?>
              <p>Production Companies :
                  <?php
                    foreach($movie_id->production_companies as $pc){
                      echo $pc->name." ";
                    }
                  ?>
              </p>
              <p>Production Countries:
                  <?php
                    foreach($movie_id->production_countries as $pco){
                      echo $pco->name. "&nbsp;&nbsp;" ;
                    }
                  ?>
              </p>
              <p>Budget: $ <?php echo $movie_id->budget ?> </p>
              <p>Vote Average : <?php echo $movie_id->vote_average ?></p>
              <p>Vote Count : <?php echo $movie_id->vote_count ?></p>
            </div>




            <?php
            } else{
              echo "<h5>Movie not found.</h5>";
            }
            ?>
    </div>

    <?php
     include("includes/footer.php");
     ?>

     <script src="js/jquery-331.min.js"></script>
     <script src="js/bootstrap-337.min.js"></script>

   </body>
   </html>
