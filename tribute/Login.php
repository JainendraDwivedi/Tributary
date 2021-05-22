<!-- php code for fetching data,connecting to db, redirecting to Write Tribute etc  -->
<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_connectdb.php';
    $username = $_POST["uname"];
    $password = $_POST["psw"]; 
    
         
    $sql = "Select * from `users` where `username`='$username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    // verify the user password
    $usr_pass = password_verify($password, $row['user_password']);
    // $num = mysqli_num_rows($result);
    if ($usr_pass == 1){
        $login = true;
        session_start();
        $_SESSION['btn'] = true;
        $_SESSION['uname'] = $username;
        header("location:WriteTribute.php");

    } 
    else{
        $showError = "Invalid Credentials";
    }
}
?>
<!DOCTYPE ht<ml>
<html lang="en">

<head>
  <title>Login</title>
  <link rel="stylesheet" href="./css/Login.css" />
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>

<body>
  <!-- Copied Background Animation -->
  <div class="bg"></div>
  <div class="bg bg2"></div>
  <div class="bg bg3"></div>
  
  <!-- Header List  -->
  <ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="Login.php"> Write Tribute </a></li>
    <li style="float: right"><a href="Signup.php">Sign Up</a></li>
  </ul>
  <!-- Tribute Logo  -->
  <div class="imgcontainer">
    <img src="Images/medias-tribute-to-craft-tribute-png-1200_900.png" alt="Avatar" class="avatar" />
  </div>
 <!-- Alert Box for Login-->
    <?php  if($showError) { ?>
        <div id="msgbox" class="container alert-box-2" role="alert">
        <div class='alert-content'>
            <strong> Error </strong><?php echo $showError; ?> 
        </div>
    </div>
    <?php   } ?>

<!-- Login Form  -->
  <form action="Login.php" method="post">
    <div class="container">
      <div class="fieldBox">
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uname" required />
      </div>

      <div class="fieldBox">
        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required />
      </div>
      <div class="fieldbox1">
        <button type="submit" id="btn">Login</button>
      </div>
    </div>
  </form>
</body>
<!-- JS for Alert Box  -->
<script>
$(document).ready(function() {
  $( "#msgbox" ).fadeOut( 5000, function() {
    // Animation complete.
  });
});
</script>
</html>