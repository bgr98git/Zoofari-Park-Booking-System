<div >
  <h2>All Users</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">Uid</th>
        <th class="text-center">Username </th>
        <th class="text-center">Email</th>
		<th class="text-center">Address</th>
        <th class="text-center">Contact Number</th>
        
      </tr>
    </thead>
    <?php
                include_once "../../db/db_connect.php";
      $sql="SELECT * from user_rajister where isAdmin=0";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
           
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["username"]?> </td>
      <td><?=$row["email"]?></td>
      <td><?=$row["Address"]?></td>
      <td><?=$row["phon"]?></td>
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