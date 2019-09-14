<!DOCTYPE html>
<html>
<head>
<style>
form {
    border: 3px solid #f1f1f1;
}
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.container {
    padding: 16px;
}

table, th, td {
    border: 1px solid black;
}
</style>
</head>
<body>
  <h1>Return:</h1>
<?php
   include("config_new.php");

   if($_SERVER["REQUEST_METHOD"] == "POST") {

      $myRequest_id = mysqli_real_escape_string($conn,$_POST['Request_id']);

      $sql = "    Select  RID , Item.Name Item , Student.Name Issued_to , Request.Quantity Quantity_Issued , Item.Quantity - Item.Issued  Currently_In_Store , Coordi.Name Accepted_By  from (((Request Inner join Student on Request.SID=Student.SID)Inner join Item on Request.IID = Item.ID)Inner join Coordi on Request.CID = Coordi.CID ) where RID = '$myRequest_id' ";
      $result = mysqli_query($conn,$sql);
      $row = $result->fetch_assoc();

      echo '<form action="Return_final.php" method="POST" >';
      echo '<input type="hidden" name="Request_id" id="hiddenField" value= "'.$row["RID"].'" />';
      echo "<table><tr><th>ID</th><th> Item </th><th>Issued_to</th><th>Quantity_Issued</th><th>Currently_In_Store</th><th>Accepted_By</th></tr>";
      //echo $row["RID"]."".$row['Item']."".$row['Issued_to']."".$row['Quantity_Issued']."".$row['Currently_In_Store']."".$row['Accepted_By'];
      echo "<tr><td>". $row["RID"]. "</td><td>". $row["Item"]. "</td><td>".$row["Issued_to"] . "</td><td>".$row["Quantity_Issued"]."</td><td>".$row["Currently_In_Store"] . "</td><td>".$row["Accepted_By"] . "</td></tr>";
      echo "</table>";
      echo '<button type="submit">CONFIRM</button>';
      echo '</form>';
   }
?>
<div class="container" style="background-color:#f1f1f1">
  <a href="Return_Item.php">
  <button type="button" class="cancelbtn">Cancel</button>
  </a>
  <a href="welcome_new2_Coordi.php">
  <button type="button" class="cancelbtn">HOME</button>
  </a>
</div>
</body>
</html>
