<head>
<style>
.for3
{
	text-transform:capitalize;
	display: inline-block; margin-right: 10px;
	margin-top:5px;
	padding-bottom:5px;
	color:#007100;
	text-decoration:underline;

}
.for4
{
	display: inline-block; margin: 0;
	color:#111111;
	margin-top:5px;
	font-size:20px;
	font-weight:500;

}
h5
{
	padding-top:5px;
	font-size:24px;
}

/* Custom alert box styling */
		 
        .custom-alert {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #d4edda; /* Light green background */
            color: #155724; /* Deep green text */
            padding: 20px;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1001;
			
            display: none; /* Initially hidden */
        }

        .custom-alert button {
            background-color: #155724; /* Deep green button background */
            color: #fff; /* White text */
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 3px;
			width:auto;
        }

        .custom-alert button:hover {
            background-color: #0c3e16; /* Darker green on hover */
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #fff; /* Solid white background */
            z-index: 1000;
            display: none; /* Initially hidden */
        }

</style>
</head>


<?php
	include "header.php";
	include_once "db/db_connect.php";
	if (isset($_SESSION['username'])) {
	$sql1= "SELECT * FROM packages where pid='".$_REQUEST["pk"]."'";
	$result1 = $conn->query($sql1);
	$sql2 = "SELECT * FROM pkg_detail where pid='".$_REQUEST["pk"]."'";
	$result2 = $conn->query($sql2);
	?>
	
	
	
	<!-- Page Header Start -->
    <div class="container-fluid header-bg py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-4 text-white mb-3 animated slideInDown">Detailed Page</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Packages</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->
	
	
	
	<div class="container-xxl py-5">
      <div class="container">
        <?php
        if ($result1->num_rows > 0 && $result2->num_rows > 0) {
            while ($row1 = $result1->fetch_assoc()) {
                ?>
                <div class="row g-5">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <p><span class="text-primary me-2">#</span>Welcome To Zoofari</p>
                        <h1 class="display-5 mb-4">
                            Why You Should Visit
                            <span class="text-primary"><?php echo htmlspecialchars($row1['pkg_name']); ?></span> Park!
                        </h1>
                        <h3 class="for3">Vehicals: </h3><p class="for4"><?php echo htmlspecialchars($row1['vehical']); ?></p><br />
                        <h3 class="for3">Price: </h3><p class="for4"><?php echo htmlspecialchars($row1['price']); ?></p><br />
                        <h3 class="for3">Duration: </h3><p class="for4"><?php echo htmlspecialchars($row1['duration']); ?></p><br />					
                    </div>
                    <!-- Image Column -->
                    <div class="col-lg-6 wow fadeInUp" style="height:50%;" data-wow-delay="0.5s">
                        <div class="img-border" style="height:100%;">
                            <img class="img-fluid" src="admin/uploads/<?php echo ($row1['pkg_img']); ?>" alt="" />
                        </div>
                    </div>
                </div>
                <?php
            }
        
        ?>
    </div>
</div>



			<?php
			    while ($row2 = $result2->fetch_assoc()) {
                        ?>
  				  <div class="container">
				  
				  			<h3 class="for3">Description : </h3><br />
							<p style="margin-top:5px;font-size:24px; width:auto;" class="mb-4">
							  <?php echo htmlspecialchars($row2['longdesc']); ?>
							</p>
						<h3 class="for3">Max_Adults: </h3><p class="for4"><?php echo htmlspecialchars($row2['max_ad']); ?></p><br />
						<h3 class="for3">Max_Child: </h3><p class="for4"><?php echo htmlspecialchars($row2['max_ch']); ?></p><br /><br />
						 <h3 class="for3">Inclusion : </h3><br />
						<?php 
						// Get the comma-separated value
						$features = $row2['inclusion'];
						
						// Split the string into an array
        				$ary = explode(',', $features);
						  foreach ($ary as $ch) {
						
						  echo '<h5 class="mb-3">
						  <i class="far fa-check-circle text-primary me-3"></i>'. htmlspecialchars($ch) .'</h5>';
						  }?>
						  
						  <h3 class="for3">Optional(Extra charges) : </h3><br />
						<?php 
						// Get the comma-separated value
						$features = $row2['optional'];
						
						// Split the string into an array
        				$ary = explode(',', $features);
						  foreach ($ary as $ch) {
						
						  echo '<h5 class="mb-3">
						  <i class="far fa-check-circle text-primary me-3"></i>'. htmlspecialchars($ch) .'</h5>';
						  }?>
						  
						  <h3 class="for3">Safty-Notes : </h3><br />
						  <?php 
						// Get the comma-separated value
						$features = $row2['safty'];
						
						// Split the string into an array
        				$ary = explode('@', $features);
						  foreach ($ary as $ch) {
						
						  echo '<h5 class="mb-3">
						  <i class="far fa-check-circle text-primary me-3"></i>'. htmlspecialchars($ch) .'</h5>';
						  }?>
						  
						  <h3 class="for3">FAQs : </h3><br />
						  <?php 
						// Get the comma-separated value
						$features = $row2['fAQs'];
						
						// Split the string into an array
        				$ary = explode('*', $features);
						  foreach ($ary as $ch) {
						
						  echo '<h5 class="mb-3">'. htmlspecialchars($ch) .'</h5>';
						  }?>
						
						
						
						
						<a class="btn btn-primary py-3 px-5 mt-3" href="booked.php?pk=<?php echo $_REQUEST["pk"]; ?>">Book Now</a>
       		  
		  
		  
		  <?php
		  }
		  }
		  
         else {
            echo "No packages found.";
        }
        //$conn->close();
		
		} else
		 {
   /* // Redirect without any output before the header
    echo "<script>alert('Please log in first.');</script>";
    echo "<script>window.location.href='login.php';</script>";
    exit;*/ 
	 echo '
    <div class="overlay"></div>
    <div class="custom-alert">
        <p>!Please log in first.</p>
        <button onclick="redirect()">OK</button>
    </div>
    <script>
        function showAlert() {
            document.querySelector(".overlay").style.display = "block";
            document.querySelector(".custom-alert").style.display = "block";
        }

        function redirect() {
            window.location.href = "login.php";
        }

        showAlert();
    </script>
    ';
    exit;
}
        
        ?>
        
           
       </div>
	   
	   
	 <!--  <div class="box">
	  <div id="popup1" class="overlay">
	     <div class="popup">
		    <h2> Here I am</h2>
		    <a class="close" href="#">&times;</a>
				<div class="content">
					Thank to pop me out of that button, but now i'm done so you can close this window.
				</div>
		</div>
      </div>
   </div>
	-->
	
	
<?php
	include "footer.php";
?>