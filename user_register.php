<?php
  $title="User Register";
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
                       Register
                   </li>
               </ul>

           </div>

           <div class="col-md-3">

   <?php

    include("includes/sidebar.php");

    ?>

    <?php
    function getRealIpUser(){

        switch(true){

                case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
                case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
                case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];

                default : return $_SERVER['REMOTE_ADDR'];
        }
    }
     ?>

           </div>

           <div class="col-md-9">

               <div class="box">

                   <div class="box-header">

                       <center>

                           <h2> Register</h2>

                       </center>

                       <form action="user_register.php" method="post" enctype="multipart/form-data">

                           <div class="form-group">

                               <label>Name</label>

                               <input type="text" class="form-control" name="u_name" required>

                           </div>

                           <div class="form-group">

                               <label>Email</label>

                               <input type="text" class="form-control" name="u_email" required>

                           </div>

                           <div class="form-group">

                               <label>Password</label>

                               <input type="password" class="form-control" name="u_pass" required>

                           </div>

                           <div class="form-group">

                               <label>Country</label>

                               <input type="text" class="form-control" name="u_country" required>

                           </div>

                           <div class="form-group">

                               <label>City</label>

                               <input type="text" class="form-control" name="u_city" required>

                           </div>

                           <div class="form-group">

                               <label>Phone</label>

                               <input type="text" class="form-control" name="u_number" required>

                           </div>

                           <div class="form-group">

                               <label>Address</label>

                               <input type="text" class="form-control" name="u_address" required>

                           </div>

                           <div class="form-group">

                               <label>Profile Pic</label>

                               <input type="file" class="form-control form-height-custom" name="u_image" required>

                           </div>

                           <div class="text-center">

                               <button type="submit" name="register" class="btn btn-primary">

                               <i class="fa fa-user-md"></i> Register

                               </button>

                           </div>

                       </form>

                   </div>

               </div>

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

<?php
$date = date("Y-m-d");
if (isset($_POST['register'])) {

   $u_name = $_POST['u_name'];
   $u_email = $_POST['u_email'];
   $u_pass = $_POST['u_pass'];
   $u_country = $_POST['u_country'];
   $u_city = $_POST['u_city'];
   $u_number = $_POST['u_number'];
   $u_address = $_POST['u_address'];
   $u_image = $_FILES['u_image']['name'];
   $u_image_tmp = $_FILES['u_image']['tmp_name'];
   $u_ip = getRealIpUser();
   move_uploaded_file($c_image_temp,"images/user_images/$u_image");

   $insert_user = "INSERT INTO users (user_name,user_email,user_pass,user_country,user_city,user_number,user_address,user_image,user_ip,created_date,created_by,updated_date,updated_by) VALUES('$u_name','$u_email','$u_pass','$u_country','$u_city','$u_number','$u_address','$u_image','$u_ip','$date','$_email','$date','$_email')";

   $run_user = mysqli_query($con,$insert_user);

   $sel_watchlist = "SELECT * FROM watchlist where ip_add='$u_ip'";
   $run_watchlist = mysqli_query($con,$sel_watchlist);
   $check_watchlist = mysqli_num_rows($run_watchlist);

   if ($check_watchlist>0) {
     $_SESSION['user_email']=$u_email;

     echo "<script>alert('You have been Registered Successfully')</script>";
     echo "<script>window.open('watchlist.php','_self')</script>";
   }else {
     $_SESSION['user_email']=$u_email;

     echo "<script>alert('You have been Registered Successfully')</script>";
     echo "<script>window.open('my_account.php','_self')</script>";
   }
}?>
