<?php 
  include_once "../config/db_connect.php";
  if(isset($_POST["upload"]))
  {
		$sid=$_POST['s_id'];
		$ser_nm = $_POST['s_name'];
        $ser_desc = $_POST['s_desc'];
		$img=$_FILES['newImage']['name'];
		if ($img == "") {
    // Do not update pkg_img if no new image is provided
    $qry = "UPDATE services SET 
        s_name='$ser_nm', 
        s_desc='$ser_desc'
        WHERE s_id='$sid'";
} else {
    // Correctly handle the image upload and update
    if (move_uploaded_file($_FILES['newImage']['tmp_name'], "../uploads/" . $img)) {
        $qry = "UPDATE services SET 
      		    s_name='$ser_nm', 
       			s_desc='$ser_desc',
                s_img='$img'
                WHERE s_id='$sid'";
    } else {
        echo "Failed to upload image.";
        exit; // Stop further execution if the image upload fails
    }
}

		
		$res=mysqli_query($conn,$qry);
		
		if($res)
		{
		   echo '<script>alert("updated")</script>';
            echo '<script>window.location.href = "../index.php";</script>';
		}
		else
		{
		
		   echo mysqli_error($conn);
		}
   }
?>
