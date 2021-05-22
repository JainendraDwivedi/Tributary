<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    //echo '<pre>';
    //print_r($_POST); die;
    include 'partials/_connectdb.php';
    // get the post value from the ajax function
    $count = $_POST['count'];
    $tribute_id = $_POST['id'];
    //print_r($_POST); die;

    // incrementing the count by 1
    $count = $count + 1;

    // sql query to update the count
    $sql = "UPDATE `tributes` SET tribute_count=$count WHERE tribute_id= $tribute_id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo $count;
    }
}
?>