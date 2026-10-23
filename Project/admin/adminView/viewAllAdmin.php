

<div >
  <h2>All Admin</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">Uid</th>
        <th class="text-center">Username </th>
        <th class="text-center">Email</th>
		<th class="text-center">Address</th>
        <th class="text-center">Contact Number</th>
         <th class="text-center" colspan="2">Action</th>

      </tr>
    </thead>
    <?php
                include_once "../../db/db_connect.php";
      $sql="SELECT * from user_rajister where isAdmin=1";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
           $uid=$row["uid"];
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["username"]?> </td>
      <td><?=$row["email"]?></td>
      <td><?=$row["Address"]?></td>
      <td><?=$row["phon"]?></td>
	  <td><a href="./controller/adminDelete.php?uid=<?=$uid?>" class="btn btn-danger" style="height:40px" >Delete</a></td>


    </tr>
    <?php
            $count=$count+1;
           
        }
		}
		else 
		{
                    echo "<tr><td colspan='5' >No customers found</td></tr>";
               
			   
		 }
    
    ?>
  </table>
  
  
  
  
  
  
  
  
  
   <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary " style="height:40px" data-toggle="modal" data-target="#myModal">
    New Admin Register
  </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Admin Register</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data' action="./controller/adregister.php" method="POST">
            <div class="form-group">
              <label for="name">Admin Name:</label>
			  <input type="text" class="form-control" name="unm" required/>

            </div>
			<div class="form-group">
              <label for="name">Email :</label>
                <input type="email" class="form-control" name="email" required/>
            </div>
            <div class="form-group">
              <label for="price">Password:</label>
                <input type="password" class="form-control" name="pwd" required/>
            </div>
            <div class="form-group">
              <label for="qty">Address:</label>
				<textarea id="message" name="add"  class="form-control"></textarea><br><br>
			</div>
			<div class="form-group">
              <label for="qty">Phone:</label>
                <input type="number" class="form-control" name="pnum" required/>
            </div>
           
            <div class="form-group">
			    <input type="submit" value="Submit" id="btn" name="submit" class="btn btn-secondary" style="height:40px"/>

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
