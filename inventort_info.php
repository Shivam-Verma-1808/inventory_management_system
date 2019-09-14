<!DOCTYPE html>
<html>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
<body>

<?php
  include("config_new.php");

    $sql="Select * from Item ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0)
    {
      echo "<table><tr><th>ID</th><th>Name</th><th>Quantity</th><th>Issued</th></tr>";
    // output data of each row
      while($row = $result->fetch_assoc())
      {
        echo "<tr><td>". $row["ID"]. "</td><td>". $row["Name"]. "</td><td>".$row["Quantity"] . "</td><td>".$row["Issued"]."</td></tr>";
      }
      echo "</table>";
    }

    else
    {
    echo "0 results";
    }


?>
</body>
</html>
