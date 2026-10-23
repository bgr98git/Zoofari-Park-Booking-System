<div class="container p-5">

<h4>Edit Category</h4>
<?php
     include_once "../config/db_connect.php";
	$ID=$_POST['record'];
	$qry=mysqli_query($conn, "SELECT * FROM category WHERE category_id='$ID'");
	$numberOfRow=mysqli_num_rows($qry);
	if($numberOfRow>0){
		while($row1=mysqli_fetch_array($qry)){
?>
 <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Category</h4>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data' action="./controller/updateCatecode.php" method="POST">
		  <div class="form-group">
      <input type="text" class="form-control" name="cid" value="<?=$row1['category_id']?>" hidden>
   		 </div>
            <div class="form-group">
              <label for="c_name">Category Name:</label>
              <input type="text" class="form-control" name="cname" value="<?=$row1['category_name']?>" required>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" name="upload" style="height:40px">Update Category</button>
            </div>
          

        
          </form>

        <?php
    		}
    	}
    ?>
      
    </div>
  </div>
  

