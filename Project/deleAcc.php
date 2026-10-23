<?php
include_once "./db/db_connect.php";

// Start the session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$uid = $_SESSION["uid"];

/*// Verify that the uid is set and not empty
if (isset($uid) && !empty($uid)) {
    $query = "DELETE FROM user_rajister WHERE uid='$uid'";

    $data = mysqli_query($conn, $query);

    if ($data) {
        echo '<script>alert("Account Deleted..");</script>';
        echo "<script>window.location.href='logout.php';</script>";
    } else {
        // Debugging: display the error message
        $error_message = mysqli_error($conn);
        echo '<script>alert("Account not Deleted. Error: ' . $error_message . '");</script>';
    }
} else {
    echo '<script>alert("User ID is not set.");</script>';
}*/




// Check if the user confirmed deletion
if (isset($_GET['confirm']) && $_GET['confirm'] === 'true') {
    $query = "DELETE FROM user_rajister WHERE uid='$uid'";

    $data = mysqli_query($conn, $query);

    if ($data) {
        echo '<script>alert("Account Deleted..");</script>';
        echo "<script>window.location.href='logout.php';</script>";
    } else {
        // Debugging: display the error message
        $error_message = mysqli_error($conn);
        echo '<script>alert("Account not Deleted. Error: ' . $error_message . '");</script>';
    }
} else {
    echo '<script>alert("User ID is not set.");</script>';
}
?>

