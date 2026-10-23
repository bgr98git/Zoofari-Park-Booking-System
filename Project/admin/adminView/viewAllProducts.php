<div >
  <h2>All Packages</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Package Name</th>
		<th class="text-center">Description</th>
        <th class="text-center">Duration</th>
        <th class="text-center">image</th>
        <th class="text-center">vehical</th>
        <th class="text-center">Price</th>
		
        <th class="text-center">Category Name</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
      include_once "../config/db_connect.php";
      $sql="SELECT * from packages, category WHERE packages.category_id=category.category_id";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["pkg_name"]?></td>
	  <td><?=$row["description"]?></td>
      <td><?=$row["duration"]?></td>
	  
      <td><img height='100px' src='./uploads/<?=$row["pkg_img"]?>'></td>
      <td><?=$row["vehical"]?></td>
      <td><?=$row["price"]?></td>      
      <td><?=$row["category_name"]?></td> 
      <td><button class="btn btn-primary" style="height:40px" onclick="itemEditForm('<?=$row['pid']?>')">Edit</button></td>
      <td><button class="btn btn-danger" style="height:40px" onclick="itemDelete('<?=$row['pid']?>')">Delete</button></td>
      </tr>
      <?php
            $count=$count+1;
          }
        }
      ?>
  </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary " style="height:40px" data-toggle="modal" data-target="#myModal">
    Add Packages
  </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Product Item</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data' onsubmit="addItems(event)" method="POST">
            <div class="form-group">
              <label for="name">Package Name:</label>
              <input type="text" class="form-control" id="p_nm" required>
            </div>
			<div class="form-group">
              <label for="name">Package Descrption:</label>
             <textarea class="form-control" id="p_desc" rows="10" required></textarea>
            </div>
            <div class="form-group">
              <label for="price">Duration:</label>
              <input type="text" class="form-control" id="p_du" required>
            </div>
            <div class="form-group">
              <label for="qty">Vehical:</label>
              <input type="text" class="form-control" id="p_vehi" required>
            </div>
			<div class="form-group">
              <label for="qty">Price:</label>
              <input type="number" class="form-control" id="p_prc" required>
            </div>
            <div class="form-group">
              <label>Category:</label>
              <select id="category" >
                <option disabled selected>Select category</option>
                <?php

                  $sql="SELECT * from category";
                  $result = $conn-> query($sql);

                  if ($result-> num_rows > 0){
                    while($row = $result-> fetch_assoc()){
                      echo"<option value='".$row['category_id']."'>".$row['category_name'] ."</option>";
                    }
                  }
                ?>
              </select>
            </div>
            <div class="form-group">
                <label for="file">Choose Image:</label>
                <input type="file" class="form-control-file" id="file">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" id="upload" style="height:40px">Add Item</button>
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

<script>
function addItems(event){
	event.preventDefault();
    var pkg_name=$('#p_nm').val();
	var pkg_desc=$('#p_desc').val();

    var pkg_du=$('#p_du').val();
    var pkg_vehi=$('#p_vehi').val();
	var pkg_prc=$('#p_prc').val();
    var category=$('#category').val();
    var upload=$('#upload').val();
    var file=$('#file')[0].files[0];

    var fd = new FormData();
    fd.append('p_nm', pkg_name);
    fd.append('p_desc', pkg_desc);

    fd.append('p_du', pkg_du);
    fd.append('p_vehi', pkg_vehi);
	fd.append('p_prc', pkg_prc);
    fd.append('category', category);
    fd.append('file', file);
    fd.append('upload', upload);
    $.ajax({
        url:"./controller/addItemController.php",
        method:"post",
        data:fd,
        processData: false,
        contentType: false,
        success: function(data){
           alert('Product Added successfully.');
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

   </body>
   </html>