
<div >
  <h3>Contact Details</h3>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Name</th>
		<th class="text-center">Email</th>
		<th class="text-center">Subject</th>
		<th class="text-center">message</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
      include_once "../config/db_connect.php";
      $sql="SELECT * from contact";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["name"]?></td>
	  <td><?=$row["email"]?></td>
	  <td><?=$row["subject"]?></td>
	   <td><?=$row["message"]?></td>   
	  <td><a class="btn btn-danger" style="height:40px" href="./controller/deleteContact.php?cid=<?=$row['con_id']?>">Delete</a></td>      </tr>
      <?php
            $count=$count+1;
          }
        }
      ?>
  </table>

  