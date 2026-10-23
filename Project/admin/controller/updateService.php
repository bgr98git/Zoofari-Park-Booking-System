<div class="container p-5">

<h4>Edit Services</h4>
<?php
     include_once "../config/db_connect.php";
	$ID=$_POST['record'];
	$qry=mysqli_query($conn, "SELECT * FROM services WHERE s_id='$ID'");
	$numberOfRow=mysqli_num_rows($qry);
	if($numberOfRow>0){
		while($row1=mysqli_fetch_array($qry)){
?>
 <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Servics Item</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data' action="controller/updateServiceCode.php" method="POST">
		  <div class="form-group">
      <input type="text" class="form-control" name="s_id" value="<?=$row1['s_id']?>" hidden>
   		 </div>
            <div class="form-group">
              <label for="c_name">Services Name:</label>
              <input type="text" class="form-control" name="s_name" value="<?=$row1['s_name']?>" required>
            </div>
			<div class="form-group">
              <label for="name">Descrption:</label>
             <textarea class="form-control" name="s_desc" rows="10"    required><?=$row1["s_desc"]?></textarea>
            </div>
			  <div>
            <label for="file">Choose Image:</label>
			<input type="file" id="newImage" name="newImage" class="form-control" value="<?=$row1['s_img']?>"  />
            <!--<input type="text" id="existingImage" class="form-control" value="" hidden>-->
           <!-- <input type="file" id="newImage" value="">-->
			
			
         </div>
            <div class="form-group">
              <input type="submit" class="btn btn-primary" name="upload" style="height:40px" value="update">
            </div>
			<?php
    		}
    	}
    ?>
          </form>

        
      
    </div>
  </div>
  

