<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<?php
// Include the database connection file
include_once "db/db_connect.php";

// Query to fetch data from the admin_contact table
$sql = "SELECT * FROM admin_contact";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Loop through the fetched data
    while ($row = $result->fetch_assoc()) {
        // Store each column value in a variable
       
        $email = $row['email'];
        $phone = $row['phone'];
        $time = $row['time'];
        $deve_name = $row['deve_name'];
		$dis_name=$row['distri_name'];

      $time_parts = explode(',', $time);
    }
} else {
    echo "No data found in admin_contact table.";
}

// Close the database connection
//$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Zoofari - Zoo & Safari Park Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />
	 <style>
        .profile-logo {
            width: 30px;
            height: 30px;
            border-radius: 50%;
        }
		.username {
    font-size: 16px; /* Adjust font size */
    color: #05B63A; /* Adjust text color */
    font-weight: bold; /* Makes the username bold */
    vertical-align: middle;
	text-decoration:underline;
	 /* Aligns the text with the image */
}
    </style>

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Quicksand:wght@600;700&display=swap"
      rel="stylesheet"
    />

    <!-- Icon Font Stylesheet -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
      rel="stylesheet"
    />

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet" />
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet" />
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />


    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet" />
  </head>

  <body>
    <!-- Spinner Start -->
    <div
      id="spinner"
      class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center"
    >
      <div
        class="spinner-border text-primary"
        style="width: 3rem; height: 3rem"
        role="status"
      >
        <span class="sr-only">Loading...</span>
      </div>
    </div>
    <!-- Spinner End -->

    <!-- Topbar Start -->
    <div class="container-fluid bg-light p-0 wow fadeIn" data-wow-delay="0.1s">
      <div class="row gx-0 d-none d-lg-flex">
        <div class="col-lg-7 px-5 text-start">
          <div class="h-100 d-inline-flex align-items-center py-3 me-4" style="padding-left:0px;">
            <small class="fa fa-map-marker-alt text-primary me-2"></small>
            <small>123,Zoofari Park,Kevadia,Gujarat</small>
			<small class="far fa-clock text-primary me-2" style="padding-left:10px"></small>
            <small> 
			<?php
// Assuming $time_parts is already defined as the array of split times
$total_parts = count($time_parts);

foreach ($time_parts as $index => $part) {
    // Trim and output the current part
    echo htmlspecialchars(trim($part));
    
    // Add the "or" separator if it's not the last part
    if ($index < $total_parts - 1) {
        echo "<small>&nbsp;or&nbsp;</small>";
    }
}
?>

		</small>
          </div>
		  
        
        </div>
        <div class="col-lg-5 px-5 text-end">
          <div class="h-100 d-inline-flex align-items-center py-3 me-4">
            <small class="fa fa-phone-alt text-primary me-2"></small>
            <small>+91&nbsp;<?php  echo htmlspecialchars($phone);?></small>
          </div>
          <div class="h-100 d-inline-flex align-items-center">
            <a class="btn btn-sm-square bg-white text-primary me-1" href="https://www.facebook.com/"
              ><i class="fab fa-facebook-f"></i
            ></a>
            <a class="btn btn-sm-square bg-white text-primary me-1" href="https://x.com/"
              ><img class="fab fa-twitter" src="img/icon/icons8-twitterx-24.png" />
            </a>
            <a class="btn btn-sm-square bg-white text-primary me-1" href="https://www.linkedin.com/hp"
              ><i class="fab fa-linkedin-in"></i
            ></a>
            <a class="btn btn-sm-square bg-white text-primary me-0" href="https://www.instagram.com/"
              ><i class="fab fa-instagram"></i
            ></a>
          </div>
        </div>
      </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-lg-0 px-4 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
      <a href="index.php" class="navbar-brand p-0">
        <img class="img-fluid me-3" src="img/icon/icon-10.png" alt="Icon" />
        <h1 class="m-0 text-primary">Zoofari</h1>
      </a>
      <button
        type="button"
        class="navbar-toggler"
        data-bs-toggle="collapse"
        data-bs-target="#navbarCollapse"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse py-4 py-lg-0" id="navbarCollapse">
        <div class="navbar-nav ms-auto">
          <a href="index.php" class="nav-item nav-link active">Home</a>
          <a href="about.php" class="nav-item nav-link">About</a>
          <a href="service.php" class="nav-item nav-link">Services</a>
          <div class="nav-item dropdown">
            <a
              href=""
              class="nav-link dropdown-toggle"
              data-bs-toggle="dropdown"
              >Packages</a>
            
         
		    <div class="dropdown-menu rounded-0 rounded-bottom m-0">
			
			<?php
//include "db/db_connect.php";

// Query to select all categories
$qry = "SELECT * FROM category";
$result = mysqli_query($conn, $qry);

// Loop through each category and generate a dropdown item
while($row = mysqli_fetch_assoc($result)) {
    echo '<a class="dropdown-item" href="normalpk.php?cat=' . $row['category_id'] . '">' . $row['category_name'] . '</a>';
}
?>
			
		 <!--<a href="normalpk.php?cat=1" class="dropdown-item">Basic/Normal Packages</a>
              <a href="normalpk.php?cat=2" class="dropdown-item">Intermediate/High Packages</a>
			  <a href="normalpk.php?cat=3" class="dropdown-item">Exclusive Packages</a>
              
            --></div>
          </div>
          <a href="contact.php" class="nav-item nav-link">Contact</a>
		   <a href="feedback.php" class="nav-item nav-link">feedBack</a>
		  <!--<a href="login.php" class="nav-item nav-link">Login</a>-->
		  
		  <?php /*if (isset($_SESSION['username'])): ?>
                    
                        <a href="profile.php" class="nav-item nav-link">
                            <img src="img/icon/pro.png" alt="Profile" class="profile-logo">
					<span class="username"><?php echo htmlspecialchars($_SESSION['username']); ?></span>
					

                        </a>
                    
                <?php else: ?>
					<!--<a href="rajis.php" class="nav-item nav-link">Register</a>-->

                    <a href="login.php" class="nav-item nav-link">Login</a>
                <?php endif; */?>
		  
<?php if (isset($_SESSION['username'])): ?>
    <div class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="img/icon/pro.png" alt="Profile" class="profile-logo">
            <span class="username"><?php echo htmlspecialchars($_SESSION['username']); ?></span>
        </a>
        <div class="dropdown-menu" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="resetpass.php">Reset Password</a>
			<a class="dropdown-item" href="confirm.php">Delete Accounts</a>
			<a class="dropdown-item" href="logout.php">Logout</a>
        </div>
    </div>
<?php else: ?>
    <!--<a href="rajis.php" class="nav-item nav-link">Register</a>-->
    <a href="login.php" class="nav-item nav-link">Login</a>
<?php endif; ?>


       
    </nav>
    <!-- Navbar End -->
	

   <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
</html>