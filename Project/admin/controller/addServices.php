<?php
    include_once "../config/db_connect.php";
    ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    if (!empty($_POST['s_name']) && !empty($_POST['s_desc']) && isset($_FILES['file'])) {
    $ser_nm = $_POST['s_name'];
    $ser_desc = $_POST['s_desc'];
    $name = $_FILES['file']['name'];
    $temp = $_FILES['file']['tmp_name'];

    $location = "./uploads/";
    $finalImage = "../uploads/" . $name;

    if (move_uploaded_file($temp, $finalImage)) {
        $sql = "INSERT INTO services (s_name, s_desc, s_img) VALUES ('$ser_nm', '$ser_desc', '$name')";
        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("inserted")</script>';
            echo '<script>window.location.href = "../index.php";</script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "File upload failed.";
    }
} else {
    echo "All fields are required.";
}
?>
    
        

  