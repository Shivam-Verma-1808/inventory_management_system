<!DOCTYPE html>
<html>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
<body>
<h1>Issue Regiser :</h1>
<?php
  include("config_new.php");

    $sql="Select RID , Item.Name Item , Student.Name Issued_to , Request.Quantity Quantity_Issued , Item.Quantity - Item.Issued  Currently_In_Store , Coordi.Name Accepted_By  from (((Request Inner join Student on Request.SID=Student.SID)Inner join Item on Request.IID = Item.ID)Inner join Coordi on Request.CID = Coordi.CID ) where Accepted = 1 ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0)
    {
      echo "<table><tr><th>ID</th><th> Item </th><th>Issued_to</th><th>Quantity_Issued</th><th>Currently_In_Store</th><th>Accepted_By</th></tr>";
    // output data of each row
      while($row = $result->fetch_assoc())
      {
        echo "<tr><td>". $row["RID"]. "</td><td>". $row["Item"]. "</td><td>".$row["Issued_to"] . "</td><td>".$row["Quantity_Issued"]."</td><td>".$row["Currently_In_Store"] . "</td><td>".$row["Accepted_By"] . "</td></tr>";
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
