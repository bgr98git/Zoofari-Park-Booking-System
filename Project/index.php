
<?php
//include_once "db/db_connect.php";
	include 'header.php';
?>


<!-- Video Modal -->
<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="videoModalLabel">Video</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <video width="100%" controls>
          <source src="img/UGANDA from Above African Wildlife with an FPV drone (720 X 1280).mp4" type="video/mp4">
          Your browser does not support the video tag.
        </video>
      </div>
    </div>
  </div>
</div>













    <!-- Header Start -->
    <div class="container-fluid bg-dark p-0 mb-5">
      <div class="row g-0 flex-column-reverse flex-lg-row">
        <div class="col-lg-6 p-0 wow fadeIn" data-wow-delay="0.1s">
          <div
            class="header-bg h-100 d-flex flex-column justify-content-center p-5"
          >
            <h1 class="display-4 text-light mb-5">
              Enjoy Wonderful Day With Your Family
            </h1>
            <div class="d-flex align-items-center pt-4 animated slideInDown">
              <a href="about.php" class="btn btn-primary py-sm-3 px-3 px-sm-5 me-5"
                >Read More</a
              >
              <a
			    href="img/UGANDA from Above African Wildlife with an FPV drone (720 X 1280).mp4"
                type="button"
                class="btn-play"
                data-bs-toggle="modal"
                data-bs-target="#videoModal"
              >
                <span></span>
              </a>
              <h6 class="text-white m-0 ms-4 d-none d-sm-block">Watch Video</h6>
            </div>
          </div>
        </div>
        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
          <div class="owl-carousel header-carousel">
            <div class="owl-carousel-item">
              <img class="img-fluid" src="img/carousel-1.jpg" alt="" />
            </div>
            <div class="owl-carousel-item">
              <img class="img-fluid" src="img/carousel-2.jpg" alt="" />
            </div>
            <div class="owl-carousel-item">
              <img class="img-fluid" src="img/carousel-3.jpg" alt="" />
            </div>
			
          </div>
        </div>
      </div>
    </div>
    <!-- Header End -->


    <!-- Video Modal Start -->
    <div
      class="modal modal-video fade"
      id="videoModal"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content rounded-0">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel">Youtube Video</h3>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <!-- 16:9 aspect ratio -->
            <div class="ratio ratio-16x9">
              <iframe
                class="embed-responsive-item"
                src="https://youtu.be/2xhmdzNZ820?si=200-g342UoPS2_nJ"
                id="video"
                allowfullscreen 
                allowscriptaccess="always"
                allow="autoplay"
              ></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Video Modal End -->

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
            <p class="mb-4">
              Welcome to Zoofari, a unique blend of zoo and safari park that offers an unforgettable experience with nature and wildlife. Located in the heart of Gujarat, Zoofari is a haven for animal lovers, nature enthusiasts, and adventure seekers. Our park is home to a diverse range of species, from the majestic big cats to the gentle giants of the savannah, all thriving in environments that closely mimic their natural habitats.
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
              <img class="img-fluid" src="img/lion5.jpg" alt="" />
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
            data-wow-delay="0.0000s"
          >
            <i class="fa fa-paw fa-3x text-primary mb-3"></i>
            <h1 class="text-white mb-2" data-toggle="counter-up">12</h1>
            <p class="text-white mb-0">Total Animal</p>
          </div>
          <div
            class="col-md-6 col-lg-3 text-center wow fadeIn"
            data-wow-delay="0.5s" data-wow-duration="0.5s"
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

   
    <!-- Animal Start -->
    <div class="container-xxl py-5">
      <div class="container">
        <div
          class="row g-5 mb-5 align-items-end wow fadeInUp"
          data-wow-delay="0.1s"
        >
          <div class="col-lg-6">
            <p><span class="text-primary me-2">#</span>Our Animals</p>
            <h1 class="display-5 mb-0">
              Let`s See Our <span class="text-primary">Zoofari</span> Awsome
              Animals
            </h1>
          </div>
         <!-- <div class="col-lg-6 text-lg-end">
            <a class="btn btn-primary py-3 px-5" href=""
              >Explore More Animals</a
            >
          </div>-->
        </div>
		
        <div class="row g-4">
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="row g-4">
              <div class="col-12">
                <a
                  class="animal-item"
                  href="img/animal-md-1.jpg"
                  data-lightbox="animal"
                >
                  <div class="position-relative">
                    <img class="img-fluid" src="img/animal-md-1.jpg" alt="" />
                    <div class="animal-text p-4">
                                            <p class="text-white small text-uppercase mb-0">Animal</p>

                    </div>
                  </div>
                </a>
              </div>
              <div class="col-12">
                <a
                  class="animal-item"
                  href="img/animal-lg-1.jpg"
                  data-lightbox="animal"
                >
                  <div class="position-relative">
                    <img class="img-fluid" src="img/animal-lg-1.jpg" alt="" />
                    <div class="animal-text p-4">
                      <p class="text-white small text-uppercase mb-0">Animal</p>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
            <div class="row g-4">
              <div class="col-12">
                <a
                  class="animal-item"
                  href="img/animal-lg-2.jpg"
                  data-lightbox="animal"
                >
                  <div class="position-relative">
                    <img class="img-fluid" src="img/animal-lg-2.jpg" alt="" />
                    <div class="animal-text p-4">
                      <p class="text-white small text-uppercase mb-0">Animal</p>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-12">
                <a
                  class="animal-item"
                  href="img/animal-md-2.jpg"
                  data-lightbox="animal"
                >
                  <div class="position-relative">
                    <img class="img-fluid" src="img/animal-md-2.jpg" alt="" />
                    <div class="animal-text p-4">
                      <p class="text-white small text-uppercase mb-0">Animal</p>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
		  
		  
		  
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
            <div class="row g-4">
              <div class="col-12">
                <a
                  class="animal-item"
                  href="img/animal-md-3.jpg"
                  data-lightbox="animal"
                >
                  <div class="position-relative">
                    <img class="img-fluid" src="img/animal-md-3.jpg" alt="" />
                    <div class="animal-text p-4">
                      <p class="text-white small text-uppercase mb-0">Animal</p>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-12">
                <a
                  class="animal-item"
                  href="img/animal-lg-3.jpg"
                  data-lightbox="animal"
                >
                  <div class="position-relative">
                    <img class="img-fluid" src="img/animal-lg-3.jpg" alt="" />
                    <div class="animal-text p-4">
                      <p class="text-white small text-uppercase mb-0">Animal</p>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Animal End -->
<?php
//include_once "db/db_connect.php";

// Fetch feedback and corresponding user names from the database using a JOIN
$sql = "
  SELECT f.message, f.img, u.username 
  FROM feedback f
  JOIN user_rajister u ON f.uid = u.uid
";
$result = $conn->query($sql);
?>

<!-- Feedback Start -->
<div class="container-xxl py-5">
  <div class="container">
    <h1 class="display-5 text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
      Our Clients Say!
    </h1>
    <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
      <?php
      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              ?>
              <div class="testimonial-item text-center">
                <img
                  class="img-fluid rounded-circle border border-2 p-2 mx-auto mb-4"
                  src="img/<?php echo htmlspecialchars($row['img']); ?>"
                  style="width: 100px; height: 100px"
                />
                <div class="testimonial-text rounded text-center p-4">
                  <p><?php echo htmlspecialchars($row['message']); ?></p>
                  <h5 class="mb-1"><?php echo htmlspecialchars($row['username']); ?></h5> <!-- Display the actual user's name -->
                  <span class="fst-italic">Client</span> <!-- Replace with the actual profession if available -->
                </div>
              </div>
              <?php
          }
      } else {
          echo "No feedback found.";
      }
      ?>
    </div>
  </div>
</div>

<?php
//$conn->close();
?>

<!-- Footer code here -->


    <!-- Testimonial End -->
<?php
include 'footer.php';
?>
 
 
 </body>
</html>
