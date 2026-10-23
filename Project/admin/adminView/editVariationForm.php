<div class="container p-5">

<h4>Edit Variation Detail</h4>
<?php
    include_once "../config/db_connect.php";
    $ID = $_POST['record'];
    $qry = mysqli_query($conn, "SELECT * from pkg_detail Where de_id='$ID'");
    $numberOfRow = mysqli_num_rows($qry);
    if ($numberOfRow > 0) {
        while ($row1 = mysqli_fetch_array($qry)) {
            $pID = $row1["pid"];
?>
<form id="update-Items" enctype='multipart/form-data' method="post"  action="./controller/updateVariationController.php" >
    <!-- Hidden field for de_id -->
        <div class="form-group">
            <input type="hidden" class="form-control" id="detid" name="detid" value="<?= $row1['de_id'] ?>">
        </div>
	<!-- Package selection -->
        <div class="form-group">
            <label>Packages:</label>
        <select id="packages"  name="packages">
        <?php
          $sql="SELECT * from packages WHERE pid='$pID'";
          $result = $conn-> query($sql);
          if ($result-> num_rows > 0){
            while($row = $result-> fetch_assoc()){
              echo"<option value='". $row['pid'] ."'>" .$row['pkg_name'] ."</option>";
            }
          }
        ?>
        <?php
          $sql="SELECT * from packages WHERE pid!='$pID'";
          $result = $conn-> query($sql);
          if ($result-> num_rows > 0){
            while($row = $result-> fetch_assoc()){
              echo"<option value='". $row['pid'] ."'>" .$row['pkg_name'] ."</option>";
            }
          }
        ?>
      </select>

        </div>
	
	 <!-- Long description -->
        <div class="form-group">
            <label for="ldesc">Long Description:</label>
            <textarea class="form-control" id="ldesc" name="ldesc" rows="10"><?php echo htmlspecialchars($row1['longdesc']); ?></textarea>
        </div>
	
       <!-- Inclusion checkboxes -->
        <div class="form-group">
            <label for="inclu">Inclusion:</label><br />
            <?php
            $inclusion = $row1['inclusion'];
            $inclusionArray = array_map('trim', explode(',', $inclusion));

            $checkboxes = [
                "Expert guide safari" => "Expert guide safari",
                "Local Transportation" => "Local Transportation",
                "Luxury tents" => "Luxury tents",
                "Helicopter Transfers" => "Helicopter Transfers",
                "Exclusive Game Drives" => "Exclusive Game Drives",
                "Educational Wildlife Talks" => "Educational Wildlife Talks",
                "Food and Beverages" => "Food and Beverages",
                "Car Parking" => "Car Parking",
                "Animal Photos" => "Animal Photos",
                "Guide Services" => "Guide Services",
                "Rest House" => "Rest House"
            ];

            foreach ($checkboxes as $key => $label) {
                $isChecked = in_array($key, $inclusionArray) ? 'checked' : '';
                echo '<input type="checkbox" name="inclu[]" value="' . htmlspecialchars($key) . '" ' . $isChecked . '> ' . htmlspecialchars($label) . '<br />';
            }
            ?>
        </div>
	
	<!-- Optional-add checkboxes -->
        <div class="form-group">
            <label for="opti">Optional-add:</label><br />
            <?php
            $optionalAdd = $row1['optional'];
            $optionalAddArray = array_map('trim', explode(',', $optionalAdd));

            $optionalCheckboxes = [
                "Free Hi Speed Wi-Fi" => "Free Hi Speed Wi-Fi",
                "Hot air balloon safari at sunrise" => "Hot air balloon safari at sunrise",
                "Marine Park Fees" => "Marine Park Fees",
                "Guided walking tours with experienced rangers" => "Guided walking tours with experienced rangers"
            ];

            foreach ($optionalCheckboxes as $key => $label) {
                $isChecked = in_array($key, $optionalAddArray) ? 'checked' : '';
                echo '<input type="checkbox" name="opti[]" value="' . htmlspecialchars($key) . '" ' . $isChecked . '> ' . htmlspecialchars($label) . '<br />';
            }
            ?>
        </div>
		
		<!-- Safety input -->
        <div class="form-group">
            <label for="sefti">Safety:</label>
            <input type="text" class="form-control" id="sefti" name="sefti" value="<?= htmlspecialchars($row1['safty']) ?>">
        </div>

        <!-- FAQs input -->
        <div class="form-group">
            <label for="faqs">FAQs:</label>
            <input type="text" class="form-control" id="faqs" name="faqs" value="<?= htmlspecialchars($row1['fAQs']) ?>">
        </div>

        <!-- Package availability -->
        <div class="form-group">
            <label for="qty">Package availability:</label>
            <input type="text" class="form-control" id="qty" name="qty" value="<?= htmlspecialchars($row1['quantity']) ?>">
        </div>
		<div class="form-group">
              <label for="qty">Max_Adults : </label>
              <input type="number" class="form-control" name="m_ad" value="<?= htmlspecialchars($row1['max_ad'])?>" required>
            </div>
			<div class="form-group">
              <label for="qty">Max_child : </label>
              <input type="number" class="form-control" name="m_ch" value="<?= htmlspecialchars($row1['max_ch'])?>" required>
            </div>
	
	  
    <!-- Submit button -->
        <div class="form-group">
            <button type="submit" style="height:40px" class="btn btn-primary" name="upbtn">Update Variation</button>
        </div>
		</form>
    <?php
        }
    }
    ?>


</div>
