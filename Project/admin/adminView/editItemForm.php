
<div class="container p-5">

<h4>Edit Packages Detail</h4>
<?php
    include_once "../config/db_connect.php";
	$ID=$_POST['record'];
	$qry=mysqli_query($conn, "SELECT * FROM packages WHERE pid='$ID'");
	$numberOfRow=mysqli_num_rows($qry);
	if($numberOfRow>0){
		while($row1=mysqli_fetch_array($qry)){
      $catID=$row1["category_id"];
?>
<form id="update-Items"  enctype='multipart/form-data' onsubmit="updateItems(event)">
		<div class="form-group">
      <input type="text" class="form-control" id="product_id" value="<?=$row1['pid']?>" hidden>
   		 </div>
    	 <div class="form-group">
              <label for="name">Package Name:</label>
              <input type="text" class="form-control" id="p_nm" value="<?=$row1['pkg_name']?>">
         </div>
      	 <div class="form-group">
              <label for="name">Package Descrption:</label>
             <textarea class="form-control" id="p_desc" rows="10"  ><?php echo ($row1['description']);?></textarea>
          </div>
   			 <div class="form-group">
              <label for="price">Duration:</label>
              <input type="text" class="form-control" id="p_du" value="<?=$row1['duration']?>">
            </div>
			<div class="form-group">
              <label for="qty">Vehical:</label>
              <input type="text" class="form-control" id="p_vehi" value="<?=$row1['vehical']?>">
            </div>
			<div class="form-group">
              <label for="qty">Price:</label>
              <input type="number" class="form-control" id="p_prc" value="<?=$row1['price']?>">
            </div>
    <div class="form-group">
      <label>Category:</label>
      <select id="category">
        <?php
          $sql="SELECT * from category WHERE category_id='$catID'";
          $result = $conn-> query($sql);
          if ($result-> num_rows > 0){
            while($row = $result-> fetch_assoc()){
              echo"<option value='". $row['category_id'] ."'>" .$row['category_name'] ."</option>";
            }
          }
        ?>
        <?php
          $sql="SELECT * from category WHERE category_id!='$catID'";
          $result = $conn-> query($sql);
          if ($result-> num_rows > 0){
            while($row = $result-> fetch_assoc()){
              echo"<option value='". $row['category_id'] ."'>" .$row['category_name'] ."</option>";
            }
          }
        ?>
      </select>
    </div>
      <div class="form-group">
	 <!-- <img src="http://localhost:8081/fari/admin/uploads/ful.jpg"  />-->
	    <img width='200px' height='150px' src='http://localhost:8081/zoo2/admin/uploads/<?=$row1["pkg_img"]?>'>

         <div>
            <label for="file">Choose Image:</label>
			<input type="file" id="newImage" class="form-control" value="<?=$row1['pkg_img']?>"  />
            <!--<input type="text" id="existingImage" class="form-control" value="" hidden>-->
           <!-- <input type="file" id="newImage" value="">-->
			
			
         </div>
    </div>
    <div class="form-group">
      <button type="submit" style="height:40px" class="btn btn-primary" >Update Item</button>
    </div>
    <?php
    		}
    	}
    ?>
  </form>

    </div>

<script>
//edit product data
function itemEditForm(id){
    $.ajax({
        url:"./adminView/editItemForm.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}
function updateItems(event){
	event.preventDefault();

    var product_id = $('#product_id').val();
    var pkg_name = $('#p_nm').val();
	var pkg_desc=$('#p_desc').val();
    var pkg_du=$('#p_du').val();
    var pkg_vehi=$('#p_vehi').val();
	var pkg_prc=$('#p_prc').val();
    var category=$('#category').val();
    var existingImage = $('#newImage').val();
    var newImage = $('#newImage')[0].files[0];
    var fd = new FormData();
    fd.append('product_id', product_id);
    fd.append('p_nm', pkg_name);
    fd.append('p_desc', pkg_desc);
    fd.append('p_du', pkg_du);
    fd.append('p_vehi', pkg_vehi);
	fd.append('p_prc', pkg_prc);
    fd.append('category', category);
    fd.append('existingImage', existingImage);
    fd.append('newImage', newImage);
   
    /*$.ajax({
      url:'./controller/updateItemController.php',
      method:'post',
      data:fd,
      processData: false,
      contentType: false,
      success: function(data){
        alert('Data Update Success.');
        $('form').trigger('reset');
        showProductItems();
      }
    });*/
	
	$.ajax({
        url:"./controller/updateItemController.php",
        method:"post",
        data:fd,
        processData: false,
        contentType: false,
        success: function(data){
           alert('Data Update Success.');
            $('form').trigger('reset');
			 $('#myModal').modal('hide');
			 $('.modal-backdrop').remove();  // Remove the backdrop
		  $('body').removeClass('modal-open'); // Ensure modal-open class is removed


               showProductItems();
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error: ' + status + error);
        }
    });

}
</script>
