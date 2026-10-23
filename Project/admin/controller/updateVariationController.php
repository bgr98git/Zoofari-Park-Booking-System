




<?php
include_once "../config/db_connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $detid = mysqli_real_escape_string($conn, $_POST['detid']);
	$selectedPackageId = mysqli_real_escape_string($conn, $_POST['packages']); // Accessing the selected package ID
	$long = mysqli_real_escape_string($conn, $_POST['ldesc']); // Accessing the selected package ID
	
		$inclu = isset($_POST['inclu']) ? $_POST['inclu'] : [];
	   $opt = isset($_POST['opti']) ? $_POST['opti'] : [];

		// Convert arrays to comma-separated strings
	$incluString = implode(", ", $inclu);
	$optString = implode(", ", $opt);
		
 
  	$sfty =  $_POST['sefti']; // Accessing the selected package ID
	$faqs =  $_POST['faqs'];
	$qty =  $_POST['qty'];
	$mad = $_POST['m_ad'];
	$mch = $_POST['m_ch'];
	
	$qry = "UPDATE pkg_detail SET
	pid = '$selectedPackageId', 
    longdesc = '$long',
    inclusion = '$incluString', 
    optional = '$optString',
    safty = '$sfty',
    fAQs = '$faqs',
    quantity = '$qty',
	max_ad =$mad,
	max_ch=$mch
    WHERE de_id = '$detid'";

   $res = mysqli_query($conn, $qry);

// Check the result of the query execution
if ($res) {

    echo '<script>alert("updated")</script>';
            echo '<script>window.location.href = "../index.php";</script>';
} else {
    echo "Error: " . mysqli_error($conn);
}

// Close the connection
mysqli_close($conn);

}
?>
