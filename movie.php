<?php
  include("functions/info.php");
  $id_movie = $_GET['id'];
  include_once "api/api_movie_id.php";
  include_once "api/api_movie_video_id.php";
  include_once "api/api_movie_similar.php";
  $title = "Detail Movie (".$movie_id->original_title.")";
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

       <form action="movie.php?id=<?php echo $id_movie; ?>" class="form-horizontal" method="post">
           <p class="text-left buttons">
             <button type='submit' name="insert" class="btn btn-primary i fa fa-film"> Add to Watchlist</button></p>
       </form>
     </div>

     <?php
     if (isset($_POST['insert'])) {
        add_watchlist();
     }?>

     <div class="box">
       <div class="container">
       <?php
         foreach($movie_video_id->results as $video){
                       echo '<iframe width="560" height="315" src="'."https://www.youtube.com/embed/".$video->key.'" frameborder="30" allowfullscreen></iframe>';
         }
        ?>
      </div>
     </div>


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


            <h3>Similar Movies</h3>

              <?php
                $count = 4;
                $output="";
                foreach($movie_similar_id->results as $sim){
                  $output.='<li><a href="movie.php?id='.$sim->id.'"><img src="http://image.tmdb.org/t/p/w300'.$sim->backdrop_path.'"><h5>'.$sim->title.'</h5></a></li>';
                  if($count <=0){
                    break;
                    $count--;
                  }
                }
                echo $output;
              ?>

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
