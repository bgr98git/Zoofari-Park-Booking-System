
<div >
  <h2>Package Detailed</h2>
  <table class="table">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Package_id</th>
		<th class="text-center">Long Descrption</th>
        <th class="text-center">Inclusion</th>
        <th class="text-center">optional</th>
		<th class="text-center">safty</th>
		<th class="text-center">FAQs</th>
		<th class="text-center">Availabilty</th>
		<th class="text-center">Max_Adults</th>
		<th class="text-center">Max_Child</th>		
		<th class="text-center" colspan="2">Action</th>

      </tr>
    </thead>
    <?php
     include_once "../config/db_connect.php";
	 
      //$sql="SELECT * from pkg_detail, product p, sizes s WHERE p.product_id=v.product_id AND v.size_id=s.size_id ";
	  $sql="SELECT * from pkg_detail, packages WHERE pkg_detail.pid=packages.pid";

      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["pid"]?></td>
      <td ><?=$row["longdesc"]?></td>      
      <td><?=$row["inclusion"]?></td>
	  <td><?=$row["optional"]?></td> 
	  <td><?=$row["safty"]?></td>
	  <td><?=$row["fAQs"]?></td>
	  <td><?=$row["quantity"]?></td>
	  <td><?=$row["max_ad"]?></td>
	  <td><?=$row["max_ch"]?></td>
	       
      <td><button class="btn btn-primary" style="height:40px" onclick="variationEditForm('<?=$row['de_id']?>')">Edit</button></td>
      <td><button class="btn btn-danger" style="height:40px"  onclick="variationDelete('<?=$row['de_id']?>')">Delete</button></td>
      </tr>
      <?php
           $count=$count+1;
          }
        }
      ?>
  </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary" style="height:40px" data-toggle="modal" data-target="#myModal">
    Add Product detailed
  </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Product Size Variation</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data' action="./controller/addSizeController.php" method="POST">
            
            <div class="form-group">
              <label>Packages:</label>
              <select name="product" >
                <option disabled selected>Select Package</option>
                <?php

                  $sql="SELECT * from packages";
                  $result = $conn-> query($sql);

                  if ($result-> num_rows > 0){
                    while($row = $result-> fetch_assoc()){
                      echo"<option value='".$row['pid']."'>".$row['pkg_name'] ."</option>";
                    }
                  }
                ?>
              </select>
            </div>
			<div class="form-group">
              <label for="name">Long Descrption:</label>
             <textarea class="form-control" name="ldesc" rows="10" required></textarea>
            </div>
			<!--inclusion-->
		   <div class="form-group">
		   <label for="name">Inclusion:</label>
		   <br />
            <input type="checkbox" name="inclu[]" value="Expert guide safari"> Expert guide safari
			<br />
			<input type="checkbox" name="inclu[]" value="Local Transportation">Local Transportation
			<br />
			<input type="checkbox" name="inclu[]" value="Luxury tents">Luxury tents
			<br />
			<input type="checkbox" name="inclu[]" value="Helicopter Transfers">Helicopter Transfers
			<br />
			
			<input type="checkbox" name="inclu[]" value="Exclusive Game Drives">Exclusive Game Drives
			<br />
			<input type="checkbox" name="inclu[]" value="Educational Wildlife Talks">Educational Wildlife Talks
			<br />
			
			<input type="checkbox" name="inclu[]" value="Food and Beverages">Food and Beverages
			<br />
			<input type="checkbox" name="inclu[]" value="Car Parking">Car Parking
			<br />
			<input type="checkbox" name="inclu[]" value="Animal Photos">Animal Photos
			<br />
			<input type="checkbox" name="inclu[]" value="Guide Services">Guide Services
			<br />
			<input type="checkbox" name="inclu[]" value="Rest House">Rest House
			<br />
			
           </label>
		   </div>
			<!--optional activity-->
			 <div class="form-group">
		   <label for="name">Optional-add:</label>
		   <br />
		   <input type="checkbox" name="opti[]" value="Free Hi Speed Wi-Fi">Free Hi Speed WiFi
			<br />
			<input type="checkbox" name="opti[]" value="Hot air balloon safari at sunrise">Hot air balloon safari at sunrise

			<br />
			<input type="checkbox" name="opti[]" value="Marine Park Fees">Marine Park Fees
			<br />
			<input type="checkbox" name="opti[]" value="Guided walking tours with experienced rangers">Guided walking tours with experienced rangers
			<br />
			</div>
			
			<div class="form-group">
              <label for="price">Safty:</label>
              <input type="text" class="form-control" name="sefti" required>
            </div>
			
			<div class="form-group">
              <label for="price">FAQs:</label>
              <input type="text" class="form-control" name="faqs" required>
            </div>
			
			
            <div class="form-group">
              <label for="qty">Package avalabilty:</label>
              <input type="text" class="form-control" name="qty" required>
            </div>
			<div class="form-group">
              <label for="qty">Max_Adults : </label>
              <input type="number" class="form-control" name="m_ad" required>
            </div>
			<div class="form-group">
              <label for="qty">Max_child : </label>
              <input type="number" class="form-control" name="m_ch" required>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" name="upload" style="height:40px">Add Data</button>
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
   