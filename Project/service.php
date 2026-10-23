<?php
	include 'header.php';
		include_once "db/db_connect.php";

	
?>
<!-- Page Header Start -->
    <div
      class="container-fluid header-bg py-5 mb-5 wow fadeIn"
      data-wow-delay="0.1s"
    >
      <div class="container py-5">
        <h1 class="display-4 text-white mb-3 animated slideInDown">
         Services
		  
        </h1>
        <nav aria-label="breadcrumb animated slideInDown">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
              <a class="text-white" href="index.php">Home</a>
            </li>
            
            <li class="breadcrumb-item text-primary active" aria-current="page">
              Services
            </li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- Page Header End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
      <div class="container">
        <div class="row g-5 mb-5 wow fadeInUp" data-wow-delay="0.1s">
          <div class="col-lg-6">
            <p><span class="text-primary me-2">#</span>Our Services</p>
            <h1 class="display-5 mb-0">
              Special Services For
              <span class="text-primary">Zoofari</span> Visitors
            </h1>
          </div>
         
        </div>
        <div class="row gy-5 gx-4">
		<?php
$sql = "SELECT * FROM services";
$result = $conn->query($sql);

				
				
				if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
					// echo htmlspecialchars($row['s_img']); 
                        ?>
          <div class="col-lg-3 col-md-4 col-sm-6 wow fadeInUp"
             data-wow-delay="0.1s"
          > <i class="fa fa-3x fa-mobile-alt text-white">
            <img class="img-fluid mb-3" src="img/icon/<?php echo htmlspecialchars($row['s_img']); ?>" alt="Icon" /></i>
            <h5 class="mb-3"><?php echo htmlspecialchars($row['s_name']); ?></h5>
            <span
              ><?php echo htmlspecialchars($row['s_desc']); ?></span
            >
          </div>
          
          <?php
            }
        } else {
            echo "No packages found.";
        }
       // $conn->close();
        ?>
          
          
          
          
          
        </div>
      </div>
    </div>
    <!-- Service End -->

    <?php
	include 'footer.php';
	?>
	
	
	  </body>
</html>
