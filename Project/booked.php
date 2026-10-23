
<?php
	include "header.php";
	
?>

<style>



.bodystyle {
  width: 500px;
  margin: 0 auto;
  padding: 50px;
  border:groove;
  border-color:#99FF33;
  
}

div.elem-group {
  margin: 20px 0;
}

div.elem-group.inlined {
  width: 49%;
  display: inline-block;
  float: left;
  margin-left: 1%;
}

label {
  display: block;
  font-family: 'Nanum Gothic';
  padding-bottom: 10px;
  font-size: 1.25em;
}

input, select, textarea {
  border-radius: 10px;
  border: 2px solid #777;
  box-sizing: border-box;
  font-size: 1.25em;
  font-family: 'Nanum Gothic';
  width: 100%;
  padding: 10px;
}

div.elem-group.inlined input {
  width: 95%;
  display: inline-block;
}



hr {
  border: 1px dotted #ccc;
}

.buttonok {
  height: 50px;
  background:#00DD6F;
  border: none;
  color: white;
  font-size: 1.25em;
  font-family: 'Nanum Gothic';
  border-radius: 4px;
  cursor: pointer;
  width:390px;
}

button:hover {
  border: 2px solid #FFFFFF;
  background:#99CC00;
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
    <div class="container-fluid header-bg py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-4 text-white mb-3 animated slideInDown">Booked Package</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Booked Package</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->
	<?php


//include_once "db/db_connect.php";

// Check if the session variable 'username' is set
$user="";
$phone="";
$email="";
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
			$user=$row1['username'];
			$phone=$row1['phon'];
			$email=$row1['email'];
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



			
       




<div class="bodystyle"  style="background-position: center;background-image:url(img/bg5.jpg);background-repeat: no-repeat;
  background-size:cover;">
		<form  method="post"  >
			  <div class="elem-group">
				<label for="name" style="color:#FFFFFF" >Your Name</label>
				<input type="text"  name="visitor_name" value="<?php echo $user;?>" placeholder="John Doe" pattern=[A-Z\sa-z]{3,20} required>
			  </div>
			  <div class="elem-group">
				<label for="email" style="color:#FFFFFF">Your E-mail</label>
				<input type="email"  name="visitor_email" value="<?php echo $email;?>" placeholder="john.doe@email.com" required>
			  </div>
			  <div class="elem-group">
				<label for="phone" style="color:#FFFFFF">Your Phone</label>
				<input type="number"  name="visitor_phone" value="<?php echo $phone;?>"  required>
			  </div>
			  
			 		  
		  <hr>
		    <?php
			 $ad="";
			$ch="";
				$qry="select * from pkg_detail where pid=".$_REQUEST["pk"];
				 $res = $conn->query($qry);
   
					if ($res->num_rows > 0) {
						while ($r = $res->fetch_assoc()) {
							$ad=$r["max_ad"];
							$ch=$r["max_ch"];
							
							  }
					}
			?>
			  <div class="elem-group inlined">
				<label for="adult" style="color:#FFFFFF">Max_Adults : <?php echo $ad; ?></label>
				<input type="number" id="adult" name="total_adults" placeholder="select adults" min="1"  max="<?php echo $ad; ?>" required>
			  </div>
			  <div class="elem-group inlined">
				<label for="child" style="color:#FFFFFF">Max_Child : <?php echo $ch; ?></label>
				<input type="number" id="child" name="total_children" placeholder="select child" min="0" max="<?php echo $ch; ?>" required>
			  </div>
			  <div class="elem-group inlined">
				<label for="checkin-date" style="color:#FFFFFF">Check-in Date</label>
				<input type="date" id="checkin-date" name="checkin" required>
			  </div>
			  <div class="elem-group inlined">
				<label for="checkout-date" style="color:#FFFFFF">Check-out Date</label>
				<input type="date" id="checkout-date" name="checkout" required>
			  </div>
			  <div class="elem-group">
				<label for="room-selection" style="color:#FFFFFF">Select Time</label>
				<select id="room-selection" name="room_preference" required>
					<option value="">Choose a Time slot</option>
					<?php
					// Fetch time slots from the admin_contact table
					// Fetch time slots from the admin_contact table
					$sql = "SELECT time FROM admin_contact LIMIT 1"; // Adjust LIMIT if you expect multiple rows
					$result = $conn->query($sql);
					
					// Initialize an array to hold time slots
					$timeSlots = [];
					
					if ($result->num_rows > 0) {
						// Output data of each row
						while ($row = $result->fetch_assoc()) {
							// Extract the time slots from the 'time' column
							$times = explode(',', $row['time']); // Split the string by commas
							
							foreach ($times as $time) {
								// Remove "EveryDay :" prefix
								$cleanedTime = str_replace('EveryDay : ', '', $time);
								// Remove any leading or trailing whitespace
								$timeSlots[] = trim($cleanedTime);
							}
						}
					} else {
						echo 'No time slots found';
					}
					foreach ($timeSlots as $slot) {
        echo '<option value="' . htmlspecialchars($slot) . '">' . htmlspecialchars($slot) . '</option>';
    }
					//$conn->close();
?>

					<!--<option value="8:00AM-12:00PM">8:00AM-12:00PM</option>
					<option value="3:00PM-7:00PM">3:00PM-7:00PM</option>-->
				</select>
			  </div>
			  <hr>
			  <div class="elem-group">
				<label for="room-selection" style="color:#FFFFFF">Select Payment Method</label>
				<select id="room-selection" name="pay_method" required>
					<option value="">Payment Method</option>
					<option value="Credit/Debit Cards">Credit/Debit Cards</option>
					<option value="Bank Transfers">Bank Transfers</option>
					<option value="Cash">Cash</option>
				</select>
			  </div>
		  <button type="submit" class="buttonok">Book the Package</button>
		</form>

</div>

</body>





<?php
           /*  }
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


*/





	//include "footer.php";
?>
	
	
	
	
	
	
	
	
	
	
	
	
<?php
//session_start();
include_once "db/db_connect.php";





    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Retrieve and sanitize input data
        $uid = $conn->real_escape_string($_SESSION['uid']);
        $pid = $conn->real_escape_string($_REQUEST["pk"]);
        $total_adults = intval($_POST['total_adults']);
        $total_children = intval($_POST['total_children']);
        $checkin_date = $conn->real_escape_string($_POST['checkin']);
        $checkout_date = $conn->real_escape_string($_POST['checkout']);
        $time_slot = $conn->real_escape_string($_POST['room_preference']);
        $pay_method = $conn->real_escape_string($_POST['pay_method']);
		
		 $sqlCheck = "SELECT * FROM booked_pkg 
                             WHERE (check_in_date <= '$checkout_date' AND check_out_date >= '$checkin_date') 
                             AND pid = '$pid'";
		 $resultCheck = $conn->query($sqlCheck);
		  if ($resultCheck->num_rows > 0) 
		  {
                    // Conflict found, inform the user
                    $rowCheck = $resultCheck->fetch_assoc();
                   /* echo "<script>alert('This package is already booked from " . $rowCheck['check_in_date'] . " to " . $rowCheck['check_out_date'] . ". Please select different dates.');</script>";*/
               
		 		
							 echo '
				<div class="overlay"></div>
				<div class="custom-alert">
					<p>This package is already booked from "' . $rowCheck['check_in_date'] . " to " . $rowCheck['check_out_date'] . '". Please select different dates.</p>
					<button onclick="redirect()">OK</button>
				</div>
				<script>
					function showAlert() {
						document.querySelector(".overlay").style.display = "block";
						document.querySelector(".custom-alert").style.display = "block";
					}
			
					function redirect() {
						window.location.href = "booked.php";
					}
			
					showAlert();
				</script>
				';
				exit;
				
				
				
				
				
		 
		 
		 
		 }
		 else 
		 {

			$sql2 = "INSERT INTO booked_pkg(uid, pid, adults, children, check_in_date, check_out_date, time_slot, pay_method)
					 VALUES ('$uid', '$pid', $total_adults, $total_children, '$checkin_date', '$checkout_date', '$time_slot', '$pay_method')";
					

			if ($conn->query($sql2) === TRUE) 
			{
/*				echo "<script>alert(' Thank You..Booking successful!'); window.location.href='index.php';</script>"; */

			echo '
				<div class="overlay"></div>
				<div class="custom-alert">
					<p>Booking successful!</p>
					<button onclick="redirect()">OK</button>
				</div>
				<script>
					function showAlert() {
						document.querySelector(".overlay").style.display = "block";
						document.querySelector(".custom-alert").style.display = "block";
					}
			
					function redirect() {
						window.location.href = "ppup.php?uid='.$uid.'&pid='.$pid.'";
					}
			
					showAlert();
				</script>
				';
				exit;




			


		 } 
			
		else
			 {
					echo "Error: " . $sql2 . "<br>" . $conn->error;
			  }
   		 }
	}
	
?>


<script>
			var currentDateTime = new Date();
			var year = currentDateTime.getFullYear();
			var month = (currentDateTime.getMonth() + 1);
			var date = (currentDateTime.getDate() + 1);
			
			if(date < 10) {
			  date = '0' + date;
			}
			if(month < 10) {
			  month = '0' + month;
			}
			
			var dateTomorrow = year + "-" + month + "-" + date;
			var checkinElem = document.querySelector("#checkin-date");
			var checkoutElem = document.querySelector("#checkout-date");
			
			checkinElem.setAttribute("min", dateTomorrow);
			
			checkinElem.onchange = function () {
				checkoutElem.setAttribute("min", this.value);
			}
</script>
<?php
 include "footer.php";
?>
