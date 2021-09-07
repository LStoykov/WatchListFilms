<?php
  $title="Moviex";
  include("includes/header.php");
    include("functions/db.php");
 ?>

   <div id="content">
       <div class="container">
           <div class="col-md-12">

               <ul class="breadcrumb">
                   <li>
                       <a href="index.php">Home</a>
                   </li>
                   <li>
                       My Account
                   </li>
               </ul>

           </div>

           <div class="col-md-3">

   <?php

    include("includes/sidebar_account.php");

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
