<?php
// Include the database connection file
include_once "db/db_connect.php";

// Check if connection is established
if ($conn && $conn->ping()) {
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
            $dis_name = $row['distri_name'];

            $time_parts = explode(',', $time);
        }
    } else {
        echo "No data found in admin_contact table.";
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Database connection error.";
}
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Zoofari - Zoo & Safari Park Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

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
    <!-- Footer Start -->
    <div
      class="container-fluid footer bg-dark text-light footer mt-5 pt-5 wow fadeIn"
      data-wow-delay="0.1s"
    >
      <div class="container py-5">
        <div class="row g-5">
          <div class="col-lg-3 col-md-6">
            <h5 class="text-light mb-4">Address</h5>
            <p class="mb-2">
              <i class="fa fa-map-marker-alt me-3"></i>123 Zoofari Park,Kevadia,Gujarat
            </p>
            <p class="mb-2">
              <i class="fa fa-phone-alt me-3"></i>+91&nbsp;<?php  echo htmlspecialchars($phone);?>
            </p>
            <p class="mb-2">
              <i class="fa fa-envelope me-3"></i><?php  echo htmlspecialchars($email);?>
            </p>
            <div class="d-flex pt-2">
              <a class="btn btn-outline-light btn-social" href="https://x.com/"
                ><img class="fab fa-twitter" src="img/icon/icons8-twitterx-50 (3).png" height="25px" />
              </a>
              <a class="btn btn-outline-light btn-social" href="https://www.facebook.com/"
                ><i class="fab fa-facebook-f"></i
              ></a>
              <a class="btn btn-outline-light btn-social" href="https://www.youtube.com/"
                ><i class="fab fa-youtube"></i
              ></a>
              <a class="btn btn-outline-light btn-social" href="https://www.linkedin.com/hp"
                ><i class="fab fa-linkedin-in"></i
              ></a>
            </div>
          </div>
          <div class="col-lg-3 col-md-6" style="width:300px;margin-left:150px">
            <h5 class="text-light mb-4">Quick Links</h5>
            <a class="btn btn-link" href="index.php">Home</a>
            <a class="btn btn-link" href="about.php">About</a>
            <a class="btn btn-link" href="service.php">Our Services</a>
            <a class="btn btn-link" href="contact.php">Contact us</a>
			<a class="btn btn-link" href="feedback.php">FeedBack</a>
            <a class="btn btn-link" href="login.php">Login</a>
			
          </div>
          <!--<div class="col-lg-3 col-md-6">
            <h5 class="text-light mb-4">Popular Links</h5>
            <a class="btn btn-link" href="">About Us</a>
            <a class="btn btn-link" href="">Contact Us</a>
            <a class="btn btn-link" href="">Our Services</a>
            <a class="btn btn-link" href="">Terms & Condition</a>
            <a class="btn btn-link" href="">Support</a>
          </div>-->
          <div class="col-lg-3 col-md-6" style="width:300px;margin-left:100px">
            <h5 class="text-light mb-4">Zoofari</h5>
            <p>Enjoy Wonderful Day With Your Family</p>
            <div class="position-relative mx-auto" style="max-width: 400px">
             
              <a href="feedback.php" 
                type="button"
                class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2"
				 style="width:250px"
              >
                Give FeedBack
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="copyright">
          <div class="row">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
              &copy; <a class="border-bottom" href="#">Zoofari Park</a>, All
              Right Reserved.
            </div>
            <div class="col-md-6 text-center text-md-end">
              <!--/*** This template is free as long as you keep the footer author�s credit link/attribution link/backlink. If you'd like to use the template without the footer author�s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
              Designed By :
              <?php  echo htmlspecialchars($deve_name);?>
              <br />Distributed By:
             <?php  echo htmlspecialchars($dis_name);?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer End -->
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