<?php
  $title="Moviex";
  include("includes/header.php");
  include("functions/info.php");
  include("functions/db.php");
  include("api/api_upcoming.php");
 ?>

   <div class="container" id="slider">

       <div class="col-md-12">

           <div class="carousel slide" id="myCarousel" data-ride="carousel">

               <ol class="carousel-indicators">

                   <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
                   <li data-target="#myCarousel" data-slide-to="1"></li>
                   <li data-target="#myCarousel" data-slide-to="2"></li>
                   <li data-target="#myCarousel" data-slide-to="3"></li>

               </ol>

               <div class="carousel-inner">

                   <div class="item active">

                       <img src="images/slide_images/slides-2.jpg" alt="Slider Image 1">

                   </div>

                   <div class="item">

                       <img src="images/slide_images/slides-1.png" alt="Slider Image 2">

                   </div>

                   <div class="item">

                       <img src="images/slide_images/slides-3.jpg" alt="Slider Image 3">

                   </div>

                   <div class="item">

                       <img src="images/slide_images/slides-4.png" alt="Slider Image 4">

                   </div>

               </div>

               <a href="#myCarousel" class="left carousel-control" data-slide="prev"><!-- left carousel-control Begin -->

                   <span class="glyphicon glyphicon-chevron-left"></span>
                   <span class="sr-only">Previous</span>

               </a>

               <a href="#myCarousel" class="right carousel-control" data-slide="next"><!-- left carousel-control Begin -->

                   <span class="glyphicon glyphicon-chevron-right"></span>
                   <span class="sr-only">Next</span>

               </a>

           </div>

       </div>

   </div>

   <div id="hot">

       <div class="box">

           <div class="container">

               <div class="col-md-12">

                 <h2>
                     Check Out This Upcoming Movies!
                 </h2>

                 <?php
                 $min = date('d F Y', strtotime($upcoming->dates->minimum));
                 $max = date('d F Y', strtotime($upcoming->dates->maximum));
                 echo "<h2><sub>coming soon from </sub> <span>". $min . "</span> , <sub>until</sub> <span>" . $max . "</span></h2>";
                 ?>

               </div>

           </div>

       </div>

   </div>

   <?php
   foreach($upcoming->results as $p){
    echo
    '<div id="content">
        <div class="same-height-row">
            <div class="col-sm-4 col-sm-6 single">
                <div class="product">
                    <a href="movie.php?id=' . $p->id . '">
                    <img class="img-responsive" src="'.$imgurl_1.''. $p->poster_path . '">
                    <div class="text"><h5>' . $p->original_title . " (" . substr($p->release_date, 0, 4) . ")</h5>
                    <h6><em>Rate : " . $p->vote_average . " |  Vote : " . $p->vote_count . " | Popularity : " . round($p->popularity) . "</em></h6></div>
                    </a>
                </div>
            </div>
        </div>
    </div>";
  }
   ?>

   <center>
       <ul class="pagination">
           <li class="active;"><a href="#">First Page</a></li>
           <li><a href="#">1</a></li>
           <li><a href="#">2</a></li>
           <li><a href="#">3</a></li>
           <li><a href="#">4</a></li>
           <li><a href="#">5</a></li>
           <li><a href="#">Last Page</a></li>
       </ul>
   </center>

   <?php

    include("includes/footer.php");

    ?>

    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>


</body>
</html>
