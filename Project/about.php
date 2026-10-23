<?php
	include 'header.php';
?>
<!-- Page Header Start -->
    <div
      class="container-fluid header-bg py-5 mb-5 wow fadeIn"
      data-wow-delay="0.1s"
    >
      <div class="container py-5">
        <h1 class="display-4 text-white mb-3 animated slideInDown">
          About Page
		  
        </h1>
        <nav aria-label="breadcrumb animated slideInDown">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
              <a class="text-white" href="index.php">Home</a>
            </li>
            <!--<li class="breadcrumb-item">
              <a class="text-white" href="#">Pages</a>
            </li>-->
            <li class="breadcrumb-item text-primary active" aria-current="page">
              About
            </li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- Page Header End -->
    <!-- About Start -->
    <div class="container-xxl py-5">
      <div class="container">
        <div class="row g-5">
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
            <p><span class="text-primary me-2">#</span>Welcome To Zoofari</p>
            <h1 class="display-5 mb-4">
              Why You Should Visit
              <span class="text-primary">Zoofari</span> Park!
            </h1>
            <p class="mb-4" style="text-indent:40px">
              Welcome to Zoofari, a unique blend of zoo and safari park that offers an unforgettable experience with nature and wildlife. Located in the heart of Gujarat, Zoofari is a haven for animal lovers, nature enthusiasts, and adventure seekers. Our park is home to a diverse range of species, from the majestic big cats to the gentle giants of the savannah, all thriving in environments that closely mimic their natural habitats.<br /></p>
    <p class="mb-4" style="text-indent:40px">
	we offer a unique family adventure with diverse wildlife, engaging activities, and exceptional services.
Everyone can book wildlife Tour Packages or also book Tickets for visit zoofari park.<br /></p>
<p class="mb-4" style="text-indent:40px">
	Visitors to Zoofari can embark on a thrilling safari adventure, where you can get up close and personal with some of the world's most incredible creatures. Our knowledgeable guides are passionate about wildlife and eager to share their expertise with you, making your visit both educational and entertaining.</p>
	<p class="mb-4" style="text-indent:40px">
	Join us at Zoofari and embark on a journey through the wild. Together, we can make a difference in the lives of animals and the preservation of our planet’s incredible biodiversity.</p>

            </p>
            <h5 class="mb-3">
              <i class="far fa-check-circle text-primary me-3"></i>Free Car
              Parking
            </h5>
            <h5 class="mb-3">
              <i class="far fa-check-circle text-primary me-3"></i>Natural
              Environment
            </h5>
            <h5 class="mb-3">
              <i class="far fa-check-circle text-primary me-3"></i>Professional
              Guide & Security
            </h5>
            <h5 class="mb-3">
              <i class="far fa-check-circle text-primary me-3"></i>World Best
              Animals
            </h5>
            <a class="btn btn-primary py-3 px-5 mt-3" href="service.php">Read More</a>
          </div>
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
            <div class="img-border">
              <img class="img-fluid" src="img/lion3.jpg" alt="" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- About End -->





<?php
function incrementVisitorCount() {
    // Path to the file where the visitor count is stored
    $file_path = "visitor_count.txt";
    
    // Check if the file exists
    if (file_exists($file_path)) {
        // Read the current count from the file
        $count = file_get_contents($file_path);
        // Increase the count
        $count++;
    } else {
        // If the file does not exist, start with count 1
        $count = 1;
    }

    // Write the new count back to the file
    file_put_contents($file_path, $count);

    // Return the current count
    return $count;
}

// Call the function to increment the count and get the updated value
$visitor_count = incrementVisitorCount();
?>







    <!-- Facts Start -->
    <div
      class="container-xxl bg-primary facts my-5 py-5 wow fadeInUp"
      data-wow-delay="0.1s"
    >
      <div class="container py-5">
        <div class="row g-4">
          <div
            class="col-md-6 col-lg-3 text-center wow fadeIn"
            data-wow-delay="0.1s"
          >
            <i class="fa fa-paw fa-3x text-primary mb-3"></i>
            <h1 class="text-white mb-2" data-toggle="counter-up">12</h1>
            <p class="text-white mb-0">Total Animal</p>
          </div>
          <div
            class="col-md-6 col-lg-3 text-center wow fadeIn"
            data-wow-delay="0.3s"
          >
            <i class="fa fa-users fa-3x text-primary mb-3"></i>
            <h1 class="text-white mb-2" data-toggle="counter-up"><?php echo $visitor_count; ?></h1>
            <p class="text-white mb-0">Daily Vigitors</p>
          </div>
		  
		  
		   <?php
//include_once "db/db_connect.php";

$sql = "SELECT COUNT(uid) AS total_membership FROM user_rajister";
$result = $conn->query($sql);

// Fetch the result and store it in a variable
$total_membership = 0;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_membership = $row['total_membership']; // Corrected to match the alias
}
//$conn->close();
?>
          <div
            class="col-md-6 col-lg-3 text-center wow fadeIn"
            data-wow-delay="0.5s"
          >
            <i class="fa fa-certificate fa-3x text-primary mb-3"></i>
            <h1 class="text-white mb-2" data-toggle="counter-up"><?php echo $total_membership; ?></h1>
            <p class="text-white mb-0">Total Membership</p>
          </div>
          <div
            class="col-md-6 col-lg-3 text-center wow fadeIn"
            data-wow-delay="0.7s"
          >
            <i class="fa fa-shield-alt fa-3x text-primary mb-3"></i>
            <h1 class="text-white mb-2" data-toggle="counter-up">00</h1>
            <p class="text-white mb-0">Save Wild Life</p>
          </div>
        </div>
      </div>
    </div>
    <!-- Facts End -->

    
    <?php
	include 'footer.php';
?>
  </body>
</html>
