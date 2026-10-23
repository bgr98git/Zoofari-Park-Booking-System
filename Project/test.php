<?php
include "header.php";
include_once "db/db_connect.php";

// Check if 'pk' is set and not empty
$pk = isset($_REQUEST["pk"]) ? $_REQUEST["pk"] : '';
if (empty($pk)) {
    die('No package ID provided.');
}

// Escape the 'pk' value to prevent SQL injection
$pk = $conn->real_escape_string($pk);

// Define SQL queries
$sql1 = "SELECT * FROM packages WHERE pid='$pk'";
$sql2 = "SELECT * FROM pkg_detail WHERE pid='$pk'";

// Debug: Print SQL queries
echo 'SQL1: ' . htmlspecialchars($sql1) . '<br>';
echo 'SQL2: ' . htmlspecialchars($sql2) . '<br>';

// Execute queries
$result1 = $conn->query($sql1);
$result2 = $conn->query($sql2);

// Check for errors in execution
if (!$result1) {
    die('Error executing query1: ' . $conn->error);
}
if (!$result2) {
    die('Error executing query2: ' . $conn->error);
}

// Debug: Print number of rows
echo 'Result1 rows: ' . $result1->num_rows . '<br>';
echo 'Result2 rows: ' . $result2->num_rows . '<br>';

// Display results if any
if ($result1->num_rows > 0 && $result2->num_rows > 0) {
    while ($row1 = $result1->fetch_assoc()) {
        ?>
        <div class="container-xxl py-5">
          <div class="container">
            <div class="row g-5">
              <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <p><span class="text-primary me-2">#</span>Welcome To Zoofari</p>
                <h1 class="display-5 mb-4">
                  Why You Should Visit
                  <span class="text-primary"><?php echo htmlspecialchars($row1['pkg_name']); ?></span> Park!
                </h1>
                <h3>Vehicals: <?php echo htmlspecialchars($row1['vehical']); ?></h3><br />
                <h3>Price: <?php echo htmlspecialchars($row1['price']); ?></h3>
                <h3>Duration: <?php echo htmlspecialchars($row1['duration']); ?></h3>
              </div>

              <!-- Image Column -->
              <div class="col-lg-6 wow fadeInUp" style="height:50%;" data-wow-delay="0.5s">
                <div class="img-border">
                  <img class="img-fluid" src="admin/uploads/jun5.jpg" alt="" />
                </div>
              </div>
            </div>

            <!-- Details Section -->
            <div class="row g-5">
              <div class="col-12">
                <?php
                while ($row2 = $result2->fetch_assoc()) {
                    ?>
                    <div style="margin-top:20px; width:100%;">
                      <h3>Description:</h3>
                      <p><?php echo htmlspecialchars($row2['longdesc']); ?></p>
                    </div>
                    <h5 class="mb-3">
                      <i class="far fa-check-circle text-primary me-3"></i>Free Car Parking
                    </h5>
                    <h5 class="mb-3">
                      <i class="far fa-check-circle text-primary me-3"></i>Natural Environment
                    </h5>
                    <h5 class="mb-3">
                      <i class="far fa-check-circle text-primary me-3"></i>Professional Guide & Security
                    </h5>
                    <h5 class="mb-3">
                      <i class="far fa-check-circle text-primary me-3"></i>World Best Animals
                    </h5>
                    <a class="btn btn-primary py-3 px-5 mt-3" href="#">Read More</a>
                    <?php
                }
                ?>
              </div>
            </div>
          </div>
        </div>
        <?php
    }
} else {
    echo "No packages found.";
}

$conn->close();
?>

<?php
include "footer.php";
?>
