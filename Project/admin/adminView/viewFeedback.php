
<div >
  <h3>FeedBack Details</h3>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">user_id</th>
		<th class="text-center">FeedBack</th>
      </tr>
    </thead>
    <?php
      include_once "../config/db_connect.php";
      $sql="SELECT * from feedback";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td><?=$count?></td>
	    <td><?=$row["uid"]?></td> 
	   <td><?=$row["message"]?></td>   
	  </tr>
      <?php
            $count=$count+1;
          }
        }
      ?>
  </table>

  