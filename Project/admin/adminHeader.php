<?php
   session_start();
   include_once "./config/db_connect.php";

?>
       
 <!-- nav -->
 <nav  class="navbar navbar-expand-lg navbar-light px-5" style="background-color: #022a18; width:auto;" >
    
    <a class="navbar-brand ml-5" href="./index.php">
        <img src="uploads/icons8-edit-text-file-50.png" width="80" height="80" alt="Swiss Collection">
    </a>
	 <h2 style="color:#FFFFFF">Admin Panel</h2> 
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>
  
    <div class="user-cart">
	  
       <!-- <?php           
       // if(isset($_SESSION['user_id'])){
          ?>
          <a href="" style="text-decoration:none;">
            <i class="fa fa-user mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></i>
         </a>
          <?php
      //  } else {
            ?>
            <a href="" style="text-decoration:none;">
                    <i class="fa fa-sign-in mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></i>
            </a>

            <?php
      //  } ?>-->
	  
	  
	  
	  
	   <?php if (isset($_SESSION['username'])): ?>
                    
                        <a href="../logout.php" class="nav-item nav-link">
                            <img src="assets/images/icons8-logout-48.png" alt="Profile" class="profile-logo" height="50px">
							
                        </a>
                    
                <?php else: ?>
				
				 <?php endif; ?>

    </div>  
</nav>
