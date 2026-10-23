<?php
    include_once "../config/db_connect.php";

		$product_id=$_POST['product_id'];
    	$pkg_nm = $_POST['p_nm'];
		$pkg_desc = $_POST['p_desc'];
        $pkg_du= $_POST['p_du'];
        $pkg_vehi = $_POST['p_vehi'];
		$pkg_prc = $_POST['p_prc'];
		
        $category= $_POST['category'];
		$img=$_FILES['newImage']['name'];
		if ($img == "") {
    // Do not update pkg_img if no new image is provided
    $qry = "UPDATE packages SET 
        pkg_name='$pkg_nm', 
        description='$pkg_desc', 
        duration='$pkg_du',
        vehical='$pkg_vehi',
        price=$pkg_prc,
        category_id=$category
        WHERE pid='$product_id'";
} else {
    // Correctly handle the image upload and update
    if (move_uploaded_file($_FILES['newImage']['tmp_name'], "../uploads/" . $img)) {
        $qry = "UPDATE packages SET 
            pkg_name='$pkg_nm', 
            description='$pkg_desc', 
            duration='$pkg_du',
            pkg_img='$img',
            vehical='$pkg_vehi',
            price=$pkg_prc,
            category_id=$category
            WHERE pid='$product_id'";
    } else {
        echo "Failed to upload image.";
        exit; // Stop further execution if the image upload fails
    }
}

		
		$res=mysqli_query($conn,$qry);
		
		if($res)
		{
		  echo "true";
		}
		else
		{
		   echo mysqli_error($conn);
		}
   
?>