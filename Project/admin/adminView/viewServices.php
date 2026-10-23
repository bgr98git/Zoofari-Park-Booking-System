
<div >
  <h3>Services Items</h3>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Services Name</th>
		<th class="text-center">Description</th>
		<th class="text-center">Image</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
      include_once "../config/db_connect.php";
      $sql="SELECT * from services";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["s_name"]?></td>
	  <td><?=$row["s_desc"]?></td>
	  <td><?=$row["s_img"]?></td>   
      <td><button class="btn btn-primary" style="height:40px" onclick="EditServiceForm('<?=$row['s_id']?>')">Edit</a></td>
	  <td><a class="btn btn-danger" style="height:40px" href="./controller/deleteService.php?sid=<?=$row['s_id']?>">Delete</a></td>      </tr>
      <?php
            $count=$count+1;
          }
        }
      ?>
  </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary" style="height:40px" data-toggle="modal" data-target="#myModal">
    Add Services
  </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Services Item</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data' action="./controller/addServices.php" method="POST">
            <div class="form-group">
              <label for="c_name">Services Name:</label>
              <input type="text" class="form-control" name="s_name" required>
            </div>
			<div class="form-group">
              <label for="name">Descrption:</label>
             <textarea class="form-control" name="s_desc" rows="10" required></textarea>
            </div>
			 <div class="form-group">
                <label for="file">Choose Image:</label>
                <input type="file" class="form-control-file" name="file">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" name="upload" style="height:40px">Add Services</button>
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  
</div>
   
  