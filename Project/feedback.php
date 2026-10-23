<?php
	include 'header.php';
?>
<style>
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
<!-- Page Header Start -->
    <div
      class="container-fluid header-bg py-5 mb-5 wow fadeIn"
      data-wow-delay="0.1s"
    >
      <div class="container py-5">
        <h1 class="display-4 text-white mb-3 animated slideInDown">
          FeedBack Page
		  
        </h1>
        <nav aria-label="breadcrumb animated slideInDown">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
              <a class="text-white" href="index.php">Home</a>
            </li>
            
            <li class="breadcrumb-item text-primary active" aria-current="page">
              FeedBack
            </li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- Page Header End -->

    <!-- Contact Start -->
    <div class="container-xxl py-5">
      <div class="container">
        <div class="row g-4 mb-5">
          
        </div>
        <div class="row g-5">
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
            <p><span class="text-primary me-2">#</span>FeedBack</p>
            <h1 class="display-5 mb-4">How We Provide Good Services?Please Give Your FeedBack</h1>
           
		   
		  <?php


//include_once "db/db_connect.php";

// Check if the session variable 'username' is set
if (isset($_SESSION['username'])) {
    // Prepare the SQL query
    $sql1 = "SELECT * FROM user_rajister WHERE username='" . $conn->real_escape_string($_SESSION['username']) . "'";
    
    // Execute the query
    $result1 = $conn->query($sql1);
    
    // Check if the query returned any rows
    if ($result1->num_rows > 0) {
        // Fetch and process the result
        while ($row1 = $result1->fetch_assoc()) {
            // Your code to handle the row data
       
?>
 
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
            <form method="post">
              <div class="row g-3">
                <div class="col-md-6">
                  <div class="form-floating">
                    <input
                      type="text"
                      class="form-control bg-light border-0"
                      id="name"
                     
					  name="nm"
					  value="<?php echo ($row1['username']);?>"
                    />
                    <label for="name">Your Name</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input
                      type="email"
                      class="form-control bg-light border-0"
                      id="email"
                     
					  name="em"
					  value="<?php echo ($row1['email']);?>"
                    />
                    <label for="email">Your Email</label>
                  </div>
                </div>
                
                <div class="col-12">
                  <div class="form-floating">
                    <textarea
                      class="form-control bg-light border-0"
                      placeholder="Leave a message here"
                      id="message"
                      style="height: 300px"
					  name="msg"
                    ></textarea>
                    <label for="message">Message</label>
                  </div>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary w-100 py-3" type="submit" name="submit">
                    Send FeedBack
                  </button>
                </div>
              </div>
            </form>
          </div>
		   <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
            <div class="h-100" style="min-height: 400px">
             <img src="img/lion2.jpg" height="690px" width="700px"/>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Contact End -->

		  
		  
		  
		  
		<?php
		$uid=$row1['uid'];
             }
    } else {
        // No rows found, handle accordingly
        echo "No user found with the given username.";
    }
} else {
    echo '
    <div class="overlay"></div>
    <div class="custom-alert">
        <p>Please log in first.</p>
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
  
		  
		  
		  
		  
		  
		  
		  
		  
		  
	<?php
//include_once "db/db_connect.php";

// Check if the form was submitted
if (isset($_POST['submit'])) {
    // Collect form data
   
    $id=$uid;
	$img="icoofed.png";
    $msg =$_POST["msg"];

    // Insert the data into the database
    $sql = "INSERT INTO feedback (uid, message,img) VALUES ($uid, '$msg','$img')";
	$res=mysqli_query($conn, $sql);
    // Execute the query
    if ($res) {
        echo "<script>alert('Message sent successfully!')</script>";
		 echo "<script>window.location.href='index.php'</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
   // mysqli_close($conn);
}
?>
	  
		  
		  
         




<?php
	include 'footer.php';
?>
   </body>
</html>

