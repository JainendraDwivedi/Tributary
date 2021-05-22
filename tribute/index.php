<!DOCTYPE html>
<html lang="en">

<head>

    <title>Home</title>
    <link rel="stylesheet" href="css/home.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="js/bootstrap.min.css">

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
        <li style="float: right;"><a href="Signup.php">Sign Up</a></li>
    </ul>
<!-- Tribute Logo  -->
    <div class="imgcontainer">
        <img src="Images/medias-tribute-to-craft-tribute-png-1200_900.png" alt="Avatar" class="avatar">
    </div>
<!-- Fetching data from database and using _connectdb file  -->
    <?php 
        include 'partials/_connectdb.php';
        $tribute_data = array(); 
        $sql = "Select * from `tributes`";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $tribute_data[] = $row;
        }
        // echo '<pre>';
        // print_r($tribute_data);
        // die;

    ?>
    <div class="MainContainer">
        <?php  if ($tribute_data) {?>
        <?php foreach($tribute_data as $tribute) { ?>
        <div class="container">
    <!-- using Bootsrtap for the tribute container  -->
            <div class="col-md-6">
                <img class="Soul" src="uploads/<?php echo $tribute['tribute_image_name'] ?>" alt="#">
            </div>
    <!-- In this part of container I am printing the fetched data in required fields  -->
            <div class="col-md-6">
                <h3 class="SoulName">Late <?php echo $tribute['tribute_person_name'] ?></h3>
                <h5 class="TributeGiven">Born on: <?php echo date_format(date_create($tribute['date_of_birth']), "d-M-Y") ?></h5>
                <h5 class="TributeGiven">Died on: <?php echo date_format(date_create($tribute['date_passed_away']), "d-M-Y") ?></h5>
                <p class="TributeGiven"><?php echo $tribute['tribute_content'] ?></p>
                <button class="triCount" id="btn-<?php echo $tribute['tribute_id']; ?>">🌸 Tribute 🌸</button>
                <p class="tri">
                    Tribute Count: <span id="display-<?php echo $tribute['tribute_id']; ?>"><?php echo $tribute['tribute_count'] ?></span>
                </p>
            </div>
        </div>
        <?php } } ?>
    </div>
    <!-- Some Internal JS for the Tribute Button  -->
    <script type="text/javascript">
    $(document).ready(function() {
        $(".triCount").click(function() {
            var id = this.id;
            var idNum = id.split('-');
            var exCount = $("#display-"+idNum[1]).html();
    // using ajax function for updating the count in db
            $.ajax({
                type: "POST",
                url: "ajax.php",
                data: "&count="+exCount+"&id="+idNum[1],
                dataType: "text",
                success: function(resultData){
                    $("#display-"+idNum[1]).html(resultData);
                }
            });
        });
    });
    </script>
    <script>
        window.onclick = function (e) {
            var id = e.target.id;
            if (id === 'sent') {
                var txt = document.getElementById('example').value
                $("#para").empty().append(txt);
            }
        }
        $
    </script>

</body>

</html>