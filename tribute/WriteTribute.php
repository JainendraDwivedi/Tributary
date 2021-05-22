<!-- php code  -->
<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //echo '<pre>';
    //print_r($_POST); die;
    include 'partials/_connectdb.php';
    $name = $_POST["uname"];
    $dob = $_POST["dob"];
    $dod = $_POST["dod"];
    $TributeC = $_POST["tributecomment"];
    $exists=false;

    $fileToUpload = $_FILES["fileToUpload"]["name"];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $img_status = move_uploaded_file($_FILES["fileToUpload"]["name"], $target_file);

    // uploading the image (img uploadation php code inspired and learnt from w3schools website)
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                
            // inserting the user record
            $sql = "INSERT INTO `tributes` (`tribute_person_name`, `date_of_birth`,`date_passed_away`, `tribute_content`,`tribute_image_name`, `created_date`) VALUES ('$name', '$dob' , '$dod','$TributeC','$fileToUpload',now())";
            $result = mysqli_query($conn, $sql);

            if ($result){
                $showAlert = true;
            }

    } else {
        $showError = " Sorry, There was an error posting your Tribute.";
    }
   
}
?>

<!DOCTYPE ht<ml>
<html lang="en">

<head>

    <title>Tribute</title>
    <link rel="stylesheet" href="./css/WriteTribute.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <!-- Copied Background Animation -->
    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>

<!-- Header List Items -->
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
            <strong>Success !</strong> Tributed Posted Successfully.
        </div>
    </div>
    <?php } else if($showError) { ?>
        <div id="msgbox" class="container alert-box-2" role="alert">
        <div class='alert-content'>
            <strong>Error !</strong><?php echo $showError; ?> 
        </div>
    </div>
    <?php } ?>
<!-- Main Form  -->
    <form action="WriteTribute.php" method="post" enctype="multipart/form-data"> 
        <div class="container">
            <div class="fieldBox">
                <label for="uname"><b>Name</b></label>
                <input type="text" placeholder="Enter name" name="uname" required>
            </div>
            <div class="fieldbox">
                <div class="datefield" id="txtdob">
                    <label for="dob"><b>Date of Birth</b></label>
                    <input type="date" placeholder="Date of Birth" name="dob">
                </div>
                <div class="datefield" id="txtdod">
                    <label for="dod"><b>Date of Demise</b></label>
                    <input type="date" placeholder="Date of Death" name="dod">
                </div>
            </div>


            <div class="fieldBox4">
                <label for="tributecomment"><b>Tribute</b></label>
                <textarea type="text" placeholder="Enter tribute" name="tributecomment" required></textarea>
            </div>
            <div class="fieldbox3">
                <!-- Image Uploading -->
                <label for="tributeImg"><b>Image</b></label>
                <input type="file" name="fileToUpload" id="fileToUpload" />              
            </div>
            <div class="fieldbox1">
                <button type="submit" id="btn">Submit</button>
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