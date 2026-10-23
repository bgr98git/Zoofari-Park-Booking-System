<?php
    include_once "../config/db_connect.php";
    
    if(isset($_POST['upload']))
    {
       
        $category = $_POST['product'];
		$lodes = $_POST['ldesc'];
		
		// Check if checkboxes are set, otherwise set as empty array
    $inclu = isset($_POST['inclu']) ? $_POST['inclu'] : [];
    $opt = isset($_POST['opti']) ? $_POST['opti'] : [];

    // Convert arrays to comma-separated strings
    $incluString = implode(", ", $inclu);
    $optString = implode(", ", $opt);

		
		$saf = $_POST['sefti'];
		$fa = $_POST['faqs'];
		$qty = $_POST['qty'];
		$mad = $_POST['m_ad'];
		$mch = $_POST['m_ch'];
		
		 $sql = "INSERT INTO pkg_detail (pid, longdesc, inclusion, optional, safty, fAQs, quantity,max_ad,max_ch) 
            VALUES ('$category', '$lodes', '$incluString', '$optString', '$saf', '$fa', '$qty',$mad,$mch)";

   
	
	
	// Execute the query
    $insert = mysqli_query($conn, $sql);

    // Check if the query was successful
    if ($insert)
	 {
        echo '<script>alert("Inserted successfully")</script>';
            echo '<script>window.location.href = "../index.php";</script>';

    } 
	else 
	{
        echo "Error: " . mysqli_error($conn);
         header("Location: ../index.php?size=error");
    }


       
        
	
	}
	
	
?>

        