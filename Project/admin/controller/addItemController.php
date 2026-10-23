<?php
    include_once "../config/db_connect.php";
    
    if(isset($_POST['upload']))
    {
       
        $pkg_nm = $_POST['p_nm'];
		$pkg_desc = $_POST['p_desc'];
        $pkg_du= $_POST['p_du'];
        $pkg_vehi = $_POST['p_vehi'];
		$pkg_prc = $_POST['p_prc'];
		
        $category = $_POST['category'];
       
            
        $name = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name'];
    
        $location="./uploads/";
        $image=$location.$name;

        $target_dir="../uploads/";
        $finalImage=$target_dir.$name;

        move_uploaded_file($temp,$finalImage);

         $insert = mysqli_query($conn,"INSERT INTO packages
         (pkg_name,description,duration,pkg_img,vehical,price,category_id) 
         VALUES ('$pkg_nm','$pkg_desc','$pkg_du','$name','$pkg_vehi',$pkg_prc,'$category')");
 
         if(!$insert)
         {
             echo mysqli_error($conn);
         }
         else
         {
             echo "Records added successfully.";
         }
     
    }
        

  ?>