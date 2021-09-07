 <div class="box">

   <div class="box-header">

       <center>

           <h1> Login </h1>

           <p class="lead"> Have an account? </p>

       </center>

   </div>

   <form method="post" action="index.php">

       <div class="form-group">

           <label> Email </label>

           <input name="c_email" type="text" class="form-control" required>

       </div>

        <div class="form-group">

           <label> Password </label>

           <input name="c_pass" type="password" class="form-control" required>

       </div>

       <div class="text-center">

           <button name="login" value="Login" class="btn btn-primary">

               <i class="fa fa-sign-in"></i> Login

           </button>

       </div>

   </form>

   <center>

      <a href="user_register.php">

          <h3> Register if you don't have an account </h3>

      </a>

   </center>

 </div>


 <?php

 if(isset($_POST['login'])){

     $user_email = $_POST['u_email'];

     $user_pass = $_POST['u_pass'];

     $select_user = "select * from customers where customer_email='$user_email' AND customer_pass='$user_pass'";

     $run_user = mysqli_query($con,$select_user);

     $get_ip = getRealIpUser();

     $check_user = mysqli_num_rows($run_user);

     $select_watchlist = "select * from cart where ip_add='$get_ip'";

     $run_list = mysqli_query($con,$select_watchlist);

     $check_list = mysqli_num_rows($run_list);

     if($check_user==0){

         echo "<script>alert('Your email or password is wrong')</script>";

         exit();

     }

     if($check_user==1 AND $check_list==0){

         $_SESSION['user_email']=$user_email;

        echo "<script>alert('You are Logged in')</script>";

        echo "<script>window.open('my_account.php','_self')</script>";

     }else{

         $_SESSION['user_email']=$user_email;

        echo "<script>alert('You are Logged in')</script>";

        echo "<script>window.open('user_login.php','_self')</script>";

     }

 }

 ?>
