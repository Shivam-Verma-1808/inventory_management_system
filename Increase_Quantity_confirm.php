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

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
</head>

<body>
<h1>Confirm Quantity Increment:</h1>
<?php
   include("config_new.php");

   if($_SERVER["REQUEST_METHOD"] == "POST") {

      $myItem_id = mysqli_real_escape_string($conn,$_POST['Item_id']);
      $myItem_quantity_add = mysqli_real_escape_string($conn,$_POST['quantity_add']);

      $sql=" SELECT * from Item where ID= '$myItem_id' ";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      $Item_name=$row['Name'];
      $current_quntity=$row['Quantity'];
      $New_total_Quantity=$current_quntity+$myItem_quantity_add;

      echo '<form action="Increase_Quantity_final.php" method="post">';
      echo '<div class="container">';
      echo "Item :<b>$Item_name</b> &nbsp;&nbsp;&nbsp;&nbsp; Currently In Store :<b>$current_quntity</b>";
      echo "<label>&nbsp;&nbsp;&nbsp;&nbsp;<b>New total Quantity : $New_total_Quantity</b></label>";
      echo '<input type="hidden" name="Item_id" id="hiddenField" value= "'.$myItem_id.'" />';
      echo '<input type="hidden" name="quantity" id="hiddenField" value= "'.$New_total_Quantity.'" />';
      echo '<button type="submit">CONFIRM</button>';
      echo '</div>';
      echo '</form>';

      }
?>
<div class="container" style="background-color:#f1f1f1">
  <a href="Increase_Quantity.php">
  <button type="button" class="cancelbtn">CANCLE</button>
  </a>
  <a href="Manage_Store.html">
  <button type="button" class="cancelbtn">STORE</button>
  </a>
  <a href="welcome_new2_Coordi.php">
  <button type="button" class="cancelbtn">HOME</button>
  </a>
</div>
</body>
</html>
