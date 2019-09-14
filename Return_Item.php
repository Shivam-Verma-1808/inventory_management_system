<!DOCTYPE html>
<html>
<style>
table, th, td {
    border: 1px solid black;
}
button {
  background-color: white; /* Green */
  border: 2px solid #555555;
  color: black;
  padding: 16px 32px;
  text-align: center;
  display: inline-block;
  font-size: 14px;
  margin: 4px 2px;
  transition-duration: 0.2s;
  cursor: pointer;
  border-radius: 8px;
}

button:hover {
    opacity: 0.8;
    background-color: #555555;
    color: white;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    color: white;
    background-color: #f44336;
    border:  2px solid #f44336;
    border-radius: 0px;
}

.container {
    padding: 16px;
}

</style>
<body>
<h1>Return back to store ? :</h1>
<?php
  include("config_new.php");

    $sql="Select RID , Item.Name Item , Student.Name Issued_to , Request.Quantity Quantity_Issued , Item.Quantity - Item.Issued  Currently_In_Store , Coordi.Name Accepted_By  from (((Request Inner join Student on Request.SID=Student.SID)Inner join Item on Request.IID = Item.ID)Inner join Coordi on Request.CID = Coordi.CID ) where Accepted = 1 ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0)
    {
      echo "<table><tr><th>ID</th><th> Item </th><th>Issued_to</th><th>Quantity_Issued</th><th>Currently_In_Store</th><th>Accepted_By</th><th>Return</th></tr>";
    // output data of each row
      while($row = $result->fetch_assoc())
      {
        echo "<tr><td><b>". $row["RID"]. "</b></td><td>". $row["Item"]. "</td><td>".$row["Issued_to"] . "</td><td>".$row["Quantity_Issued"]."</td><td>".$row["Currently_In_Store"] . "</td><td>".$row["Accepted_By"] . "</td><td>";
        echo '<form action="Return_confirmation.php" method="POST" >';
        echo '<input type="hidden" name="Request_id" id="hiddenField" value= "'.$row["RID"].'" />';
        echo '<button type="submit">RETURN</button>';
        echo "</form></td></tr>";
      }
      echo "</table>";
    }

    else
    {
    echo "0 results";
    }


?>

<div class="container" style="background-color:#f1f1f1">
  <a href="welcome_new2_Coordi.php">
  <button type="button" class="cancelbtn">Cancel</button>
  </a>
</div>

</body>
</html>
