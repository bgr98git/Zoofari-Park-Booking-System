<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--=============== BOXICONS ===============-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="assets/css/styles.css">

    <style>
    /*=============== GOOGLE FONTS ===============*/
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');

    /*=============== VARIABLES CSS ===============*/
    :root {
        --hue: 240;
        --first-color: hsl(var(--hue), 16%, 18%);
        --first-color-alt: hsl(var(--hue), 16%, 12%);
        --title-color: hsl(var(--hue), 8%, 15%);
        --text-color: hsl(var(--hue), 8%, 35%);
        --body-color: hsl(var(--hue), 100%, 99%);
        --container-color: #FFF;
        --body-font: 'Poppins', sans-serif;
        --big-font-size: 1.5rem;
        --normal-font-size: .938rem;
        --z-modal: 1000;
    }

    @media screen and (min-width: 968px) {
        :root {
            --big-font-size: 1.75rem;
            --normal-font-size: 1rem;
        }
    }

    * {
        box-sizing: border-box;
        padding: 0;
        margin: 0;
    }

    body, button {
        font-family: var(--body-font);
        font-size: var(--normal-font-size);
    }

    body {
        background-color: var(--body-color);
        color: var(--text-color);
        position: relative;
    }

    button {
        cursor: pointer;
        border: none;
        outline: none;
    }

    img {
        max-width: 100%;
        height: auto;
    }

    .container {
        margin-left: 1rem;
        margin-right: 1rem;
    }

    .modal {
        height: 100vh;
        display: grid;
        place-items: center;
		
    }

    .modal__button {
        display: inline-block;
        /*background-color: var(--first-color);*/
		background-color:#228B22	;
        color: #FFF;
        padding: 1rem 1.25rem;
        border-radius: .5rem;
        transition: .3s;
    }

    .modal__button:hover{
       /* background-color: var(--first-color-alt);*/
	   background-color:#A3E882;
    }

   /*=============== MODAL ===============*/
.modal__container {
    position: fixed;
    top: 0;
    left: 0;
    background-color: hsla(var(--hue), 18%, 75%, .8);
    width: 100%;
    height: 100%;
    display: grid;
    align-items: center; /* Center the modal vertically */
    justify-content: center; /* Center the modal horizontally */
    overflow: hidden;
    transition: all .3s;
    z-index: var(--z-modal);
    visibility: hidden;
    opacity: 0;
}

.modal__content {
    position: relative;
    background-color: var(--container-color);
    text-align: center;
    padding: 2rem;
    border-radius: 10px;
    max-width: 800px; /* Set the modal width to 800px */
    max-height: 95vh; /* Prevent modal from being too tall */
    overflow-y: auto; /* Enable vertical scrolling if content exceeds height */
    width: 100%; /* Ensure it scales responsively */
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3); /* Add some shadow for a better look */
}

.modal__img {
    width: 150px;
    margin-bottom: .75rem;
}

.modal__close {
    display: inline-flex;
    /*background-color: var(--first-color);*/
	background-color:#228B22	;
    border-radius: .25rem;
    color: #FFF;
    font-size: 1.5rem;
    position: absolute;
    top: 1rem; /* Adjusted position */
    right: 1rem; /* Adjusted position */
    cursor: pointer;
}
.modal__close:hover
{
	background-color:#A3E882;
}

.modal__title {
    font-size: var(--big-font-size);
    /*color: var(--title-color);*/
	color:#28374;
    font-weight: 600;
	text-align:left;
}

.modal__description {
/*    margin-bottom: 1.5rem;
*/	padding-top:2px;

}
.customer-details {
    margin-top: 8px;
}

.detail-item {
    display: flex;
    margin-bottom: 3px;
	padding-left:25px;
}

.detail-item dt {
    width: 100px;
    font-weight: bold;
    color: #333;
    margin: 0;
}

.detail-item dd {
    margin: 0;
    color: #555;
}

.modal__button-width {
    width: 90%;
	margin-top:20px;
}

.modal__button-link {
    display: block;
    margin: 1rem auto 0;
   background-color: transparent;
/*    color: var(--first-color);*/

	color:#228B22	;
    font-weight: 700;
}

.show-modal {
    visibility: visible;
    opacity: 1;
}

.show-modal .modal__content {
    transform: translateY(0);
}

h2{
font-family:'Times New Roman', Times, serif;
color:#145a32;
text-align:left;
padding-top:10px
}
/* Adjust the max-width for larger screens */
@media screen and (min-width: 576px) {
    .modal__content {
        margin: auto;
        max-width: 800px; /* Set the modal width to 800px */
    }

    .modal__img {
        width: 170px;
    }
}

    </style>
</head>
<?php

include_once "db/db_connect.php";

	$username="";
    $uid = $_REQUEST["uid"];
    $pid = $_REQUEST["pid"];
    
    $sql1 = "SELECT * FROM user_rajister WHERE uid = '$uid'"; 
    $result1 = $conn->query($sql1);
	
	$sql2 = "SELECT * FROM packages WHERE pid = '$pid'"; 
    $result2 = $conn->query($sql2);
	
	$sql3 = "SELECT * FROM booked_pkg WHERE uid = '$uid'"; 
    $result3 = $conn->query($sql3);

    // Fetch the result
if ($result1->num_rows > 0 && $result2->num_rows && $result3->num_rows)
{
    // Output data of each row
    while ($row1 = $result1->fetch_assoc())
	 {
		   $username=$row1["username"];
		   $email=$row1["email"];
		   $phon=$row1["phon"];
     }
	 while ($row2 = $result2->fetch_assoc())
	 {
		   $pkgnm=$row2["pkg_name"];
		   $vehical=$row2["vehical"];
		   $price=$row2["price"];
		   $catid=$row2["category_id"];
		   $sql = "SELECT * FROM category WHERE category_id = '$catid'"; 
   		   $res = $conn->query($sql);
		   if ($res->num_rows > 0)
		   {
		   	while ($row = $res->fetch_assoc())
			{
			 $cnm=$row["category_name"];
			}
		   }
		   
     }
	 while ($row3 = $result3->fetch_assoc())
	 {
	 		$in=$row3["check_in_date"];
			$out=$row3["check_out_date"];
			$time=$row3["time_slot"];
		    $pay=$row3["pay_method"];
		    $ad=$row3["adults"];
		    $ch=$row3["children"];
			
			 $in=$row3["check_in_date"];
			$out=$row3["check_out_date"];

			// Convert the date format
			$datein = new DateTime($in);
			$dateout = new DateTime($out);
			$ind = $datein->format('d/m/y');
			$outd = $dateout->format('d/m/y');
					   
     }
	 $total = ($ad + $ch) * $price;

} 
else 
{
    echo "0 results";
}

// Close the connection
$conn->close();

?>





<body>
    <section class="modal container">
        <!-- No need for the button to open the modal since it will open on page load -->
        <div class="modal__container show-modal" id="modal-container" >
            <div class="modal__content" >
                <div class="modal__close close-modal" title="Close">
                    <i class='bx bx-x'></i>
                </div>

                <img src="assets/img/star-trophy.png" alt="" class="modal__img">
				
                <h1 class="modal__title">Booking Details &nbsp;:-&nbsp;</h1>
				<h2> Customer's Details:</h2>
				 
				 <dl class="customer-details">
					<div class="detail-item">
						<dt>Name : </dt>
						<dd><?php  echo htmlspecialchars( $username);?></dd>
					</div>
					<div class="detail-item">
						<dt>Email ID : </dt>
						<dd> <?php  echo htmlspecialchars( $email);?></dd>
					</div>
					<div class="detail-item">
						<dt>Phone: </dt>
						<dd><?php  echo htmlspecialchars( $phon);?></dd>
					</div>
				</dl>
				
				<h2> Package's Details:</h2>
				
				 <dl class="customer-details" style="width:500px">
					<div class="detail-item">
						<dt style="padding-left:20px">Package&nbsp;:</dt>
						<dd style="padding-left:3px">&nbsp;<?php  echo htmlspecialchars( $pkgnm);?></dd>
					</div>
					<div class="detail-item">
						<dt style="padding-left:20px">Category&nbsp;:</dt>
						<dd style="padding-left:6px;">&nbsp;<?php echo htmlspecialchars($cnm);?></dd>
					</div>
					
					<div class="detail-item">
						<dt>Time&nbsp;: </dt>
						<dd><?php  echo htmlspecialchars( $time);?></dd>
					</div>
					<div class="detail-item">
						<dt>Date : </dt>
						<dd><?php  echo htmlspecialchars( $ind);?> to <?php  echo htmlspecialchars( $outd);?> </dd>
					</div>
					<div class="detail-item">
						<dt>Price : </dt>
						<dd><?php  echo htmlspecialchars( $price);?>&nbsp;per One  </dd>
					</div>
				</dl>
				
				 <h2> Pricing's Details:</h2>
				  <dl class="customer-details">
					<div class="detail-item">
						<dt>Adults&nbsp:</dt>
						<dd><?php  echo htmlspecialchars( $ad);?></dd>
					</div>
					<div class="detail-item">
						<dt>Childs&nbsp;:</dt>
						<dd> <?php  echo htmlspecialchars( $ch);?></dd>
					</div>
					<div class="detail-item">
						<dt style="padding-left:19px">Total_Price&nbsp;:</dt>
						<dd style="padding-left:25px">&nbsp;&nbsp;<?php  echo htmlspecialchars( $total);?></dd>
					</div>
					<div class="detail-item">
						<dt style="padding-left:19px">Payment_method&nbsp;:</dt>
						<dd style="padding-left:80px">&nbsp;&nbsp;<?php  echo htmlspecialchars( $pay);?></dd>
					</div>
					
				</dl>


		
               
				<a href="phpmaildemo/mail.php?email=<?php  echo htmlspecialchars( $email);?>" class="modal__button modal__button-width"  style="text-decoration:none" name="send">
                  Make Payment
					</a>
					
					<a href="index.php" class="modal__button-link close-modal"  style="text-decoration:none">
                     Close
					</a>

                
            </div>
        </div>
    </section>
	
	
	
	

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>
    <script>
    /*=============== SHOW MODAL ON PAGE LOAD ===============*/
    window.onload = function() {
        const modalContainer = document.getElementById('modal-container');
        modalContainer.classList.add('show-modal');
    }

    /*=============== CLOSE MODAL ===============*/
    const closeBtn = document.querySelectorAll('.close-modal');

    function closeModal() {
        const modalContainer = document.getElementById('modal-container');
        modalContainer.classList.remove('show-modal');
		window.location.href="index.php";
    }

    closeBtn.forEach(c => c.addEventListener('click', closeModal));
    </script>
</body>

</html>
