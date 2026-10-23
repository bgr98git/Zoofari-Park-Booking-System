<div >
  <h2>Booked Packages</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">Booked_id</th>
        <th class="text-center">Uid</th>
        <th class="text-center">pid</th>
        <th class="text-center">Adults</th>
        <th class="text-center">Child</th>
        <th class="text-center">Date</th>
        <th class="text-center">Time</th>
        <th class="text-center">Payment_method</th>
      </tr>
    </thead>
    <tbody>
      <?php
        include_once "../../db/db_connect.php";
       
        $sql3 = "SELECT * FROM booked_pkg"; 
        $result3 = $conn->query($sql3);

        if ($result3->num_rows > 0) {
          while ($row3 = $result3->fetch_assoc()) {
            $booid = $row3["book_id"];
            $uid = $row3["uid"];
            $pid = $row3["pid"];
            $ad = $row3["adults"];
            $ch = $row3["children"];
            $in = $row3["check_in_date"];
            $out = $row3["check_out_date"];
            $time = $row3["time_slot"];
            $pay = $row3["pay_method"];

            // Convert the date format
            $datein = new DateTime($in);
            $dateout = new DateTime($out);
            $ind = $datein->format('d/m/y');
            $outd = $dateout->format('d/m/y');
            
            // Display each record in the table
            echo "<tr>
                    <td class='text-center'>{$booid}</td>
                    <td class='text-center'>{$uid}</td>
                    <td class='text-center'>{$pid}</td>
                    <td class='text-center'>{$ad}</td>
                    <td class='text-center'>{$ch}</td>
                    <td class='text-center'>{$ind} to {$outd}</td>
                    <td class='text-center'>{$time}</td>
                    <td class='text-center'>{$pay}</td>
                  </tr>";
          }
        } else {
          echo "<tr><td colspan='8' class='text-center'>No results</td></tr>";
        }
      ?>
    </tbody>
  </table>
</div>
