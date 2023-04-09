
 
<?php include('config/constants.php'); ?>

<html>
    <head>
        <title>Login - Cafe Management System</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
   <body>
    
   <div class="login">
    <h1 class ="text-center">LOGIN FORM</h1>
    <br><br> 
    <?php 
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?> 
<form action="" method="POST" class="text-center">
USERNAME:- <br>
<input type="text" name="username" placeholder="Enter Username"><br><br>

PASSWORD:- <br>
<input type="password" name="password" placeholder="Enter Password"><br><br>
<input type="submit" name="submit" value="Login" class="btn-primary">
<br><br>
</form>
<!-- Login Form Ends HEre -->
<p class="text-center">Created By - <a href="www.abhishek singh.com">Abhishek Singh</a></p>
</div>


<div class="social-login">
				<div class="social-icons">
					<a href="#" class="social-login__icon fab fa-instagram"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png"/></a>
					<a href="#" class="social-login__icon fab fa-facebook"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
					<a href="#" class="social-login__icon fab fa-twitter"><img src="https://img.icons8.com/fluent/48/000000/twitter.png"/></a>
				</div>
			</div>
   </body>
</html>

<?php
if(isset($_POST['submit']))
{
  $username=$_POST['username'];
  $password=md5($_POST['password']);

  $sql ="SELECT *FROM tbl_admin WHERE username='$username' AND password='$password'";
  $res =mysqli_query($conn, $sql);

  $count =mysqli_num_rows($res);

  if($count==1)
  {
      $_SESSION['login']="<div class='success'>LOGIN SUCCESSFULLY</div>";
      $_SESSION['user'] =$username;
      header('location:'.SITEURL.'admin/');
  }
  else
  {
    $_SESSION['login']="<div class='error'>LOGIN FAIL</div>";
    header('location:'.SITEURL.'admin/login.php ');
    
  }

}
?>


