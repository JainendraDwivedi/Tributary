<!-- php code  for password encryption,inserting user record -->
<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //echo '<pre>';
    //print_r($_POST); die;
    include 'partials/_connectdb.php';
    $username = $_POST["uname"];
    $password = $_POST["psw"];
    $cpassword = $_POST["rpsw"];
    $email=$_POST["email"];
    $exists=false;
    if(($password == $cpassword) && $exists==false){
        // encrypting the password
        $password_hash = password_hash($password,PASSWORD_DEFAULT);

        // inserting the user record
        $sql = "INSERT INTO `users` (`username`, `email_id`,`user_password`, `is_active`, `created_date`) VALUES ('$username', '$email','$password_hash','1',now())";
        $result = mysqli_query($conn, $sql);

       if ($result){
          $showAlert = true;
      }
    }
    else{
        $showError = "Passwords do not match";
    }
} 
// for retaining the already entered value 
else {
    $username = "";
    $email= "";
}
    
?>

<!DOCTYPE ht<ml>
<html lang="en">

<head>

    <title>Sign Up</title>
    <link rel="stylesheet" href="./css/SignUp.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <!-- Copied Background Animation -->
    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>
    <!-- Header List Items  -->
    <ul>

        <li><a href="index.php">Home</a></li>
        <li><a href="Login.php"> Write Tribute </a></li>

        <li style="float: right;"><a href="Signup.php">Sign Up</a></li>
    </ul>
<!-- Tribute Logo  -->
    <div class="imgcontainer">
        <img src="Images/medias-tribute-to-craft-tribute-png-1200_900.png" alt="Avatar" class="avatar">
    </div>
<!-- Alert Box for Success and Failure-->
    <?php if($showAlert) { ?>
    <div id="msgbox" class="container alert-box-1" role="alert">
        <div class='alert-content'>
            <strong>Success</strong> Your account is created! And you can Write Tribute
        </div>
    </div>
    <?php } else if($showError) { ?>
        <div id="msgbox" class="container alert-box-2" role="alert">
        <div class='alert-content'>
            <strong>Error</strong><?php echo $showError; ?> 
        </div>
    </div>
    <?php } ?>
    <!-- Signup Form -->
    <form action="Signup.php" method="post">
        <div class="container">
            <div class="fieldBox2">                
                <label for="email"><b>Email</b></label>
                <input type="email" placeholder="Enter Email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="fieldBox2">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname"  value="<?php echo $username; ?>" required>
            </div>

            <div class="fieldBox2">
                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>
            </div>
            <div class="fieldBox2">
                <label for="rpsw"><b>Re Enter Password</b></label>
                <input type="password" placeholder="ReEnter Password" name="rpsw" required>
            </div>
            <div class="fieldBox2">
                <input type="checkbox" required><b> Accept <a href="Pdfs/Terms and Conditions.pdf" target="_blank">Terms
                        and Conditions</a></b>
            </div>

            <div class="fieldbox1"><button type="submit" id="btn">SignUp</button>

            </div>
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