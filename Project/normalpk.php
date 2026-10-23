


<html>
<head>
<style>
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

.bigdiv{
    font-family: 'Montserrat', sans-serif;
    background-color: #FFFFFF;
    color: #e0e0e0;
    line-height: 1.6;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    padding: 20px;
}
.container {
    max-width: 1200px;
    margin: 0 auto;
    flex: 1;
	display:inline;
	
}

.blog-row {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    margin-bottom: 20px;
}

.blog {
    background-color:#FFFFFF;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    flex: 1 0 calc(33.33% - 20px);
    display: flex;
    flex-direction: column;
}

.blog-image {
    position: relative;
}

.blog-image img {
    width: 100%;
    height: auto;
    transition: transform 0.3s;
}

.blog-image img:hover {
    transform: scale(1.05);
}

.blog-image .date {
    position: absolute;
    bottom: 10px;
    left: 10px;
    background-color: rgba(0, 0, 0, 0.7);
    color: #fff;
    padding: 5px 10px;
    border-radius: 3px;
    font-size: 14px;
}

.blog-content {
    padding: 20px;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
	display: inline;
    
}

.blog-content h2 {
    font-size: 25px;
    margin-bottom: 10px;
    color: #339900;
}

.blog-content p {
    flex-grow: 1;
    color: #000000;
    margin-bottom: 20px;
}

.blog-content a {
    align-self: flex-start;
    background-color:#50C878 ;
    color: #FFFFFF;
    text-decoration: none;
    padding: 10px 20px;
    border-radius: 5px;
    transition: background-color 0.3s;
	
}

.blog-content a:hover {
    background-color: #FFFFFF;
	color:#009933;
	
	text-decoration: underline;
}





.box {
  width: 40%;
  margin: 0 auto;
  background: rgba(255,255,255,0.2);
  padding: 35px;
  border: 2px solid #fff;
  border-radius: 20px/50px;
  background-clip: padding-box;
  text-align: center;
}



.overlay {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.7);
  transition: opacity 500ms;
  visibility: hidden;
  opacity: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
}
.overlay:target {
  visibility: visible;
  opacity: 1;
  z-index: 1000;
}

.popup {
  margin: 70px auto;
  padding: 20px;
  background: #fff;
  border-radius: 5px;
  width: auto;
 position: relative;
   transition: all 5s ease-in-out;
   
   
    max-width: 90%; /* Responsive max width */
            max-height: 80vh; /* Responsive max height */
            overflow-y: auto;
}

.popup h2 {
  margin-top: 0;
  color: #333;
  font-family: Tahoma, Arial, sans-serif;
}
.popup .close {
  position: absolute;
  top: 5px;
  right: 20px;
  transition: all 200ms;
  font-size: 30px;
  font-weight: bold;
  text-decoration: none;
  color: #333;
  background-color:#FFFFFF;
  
  
}
.popup .close:hover {
  color: #06D85F;
}
.popup .content {
padding-top:10px;
  max-height: 100%;
  overflow: auto;
}

@media screen and (max-width: 700px){
  .box{
   /* width: 70%;*/
  }
  .popup{
   /* width: 70%;*/
  }
}



</style>
</head>
<body>
    <?php
	include "header.php";
	
	?>
	
	
  <div class="bigdiv">
    <div class="container">
        <div class="blog-row">
		
		
                
				
<?php
include_once "db/db_connect.php";

// Fetch all packages from the database
$sql = "SELECT * FROM packages where category_id='".$_REQUEST["cat"]."'";
$result = $conn->query($sql);

				
				
				if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
		
		
              <div class="blog">
                 <div class="blog-image">
                    <img src="admin/uploads/<?php echo htmlspecialchars($row['pkg_img']); ?>"alt="Blog Image 1" height="338" width="338">
                     <div class="date"><?php echo htmlspecialchars($row['duration']); ?></div>
                 </div>
                <div class="blog-content">
                    <h2><?php echo htmlspecialchars($row['pkg_name']); ?></h2>
                    <p><?php echo htmlspecialchars($row['description']); ?></p>
					<p>Vehicals:<?php echo htmlspecialchars($row['vehical']); ?></p>
                    <h2 style="color:#004000">Price:<?php echo htmlspecialchars($row['price']); ?> </h2>

					
					<img src="img/star.png" alt="Blog Image 2" height="20"/><br /><br />
					
						<a href="detailed.php?pk=<?php echo $row['pid']?>" class="anch" >Read More</a>
						<a href="booked.php?pk=<?php echo $row['pid']; ?>" class="anch">Book Now</a>
				
					 
                </div>
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
    
	<!--<div class="box">
	  <div id="popup1" class="overlay">
	     <div class="popup">
		    <h2> Here I am</h2>
		    <a class="close" href="#">&times;</a>
				<div class="content">
					Thank to pop me out of that button, but now i'm done so you can close this window.
				</div>
		</div>
      </div>
   </div>-->
	
	
	
	
 <?php
include "footer.php";

 ?>
 <script>
 function toggleDetails() {
    var details = document.querySelector('.package-details');
    var button = document.querySelector('.anch');
    if (details.style.display === 'none') {
        details.style.display = 'block';
        button.textContent = 'Read Less';
    } else {
        details.style.display = 'none';
        button.textContent = 'Read More';
    }
}

 </script>
   