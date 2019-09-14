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
<h1>Confirm Item:</h1>
<?php
   include("config_new.php");

   if($_SERVER["REQUEST_METHOD"] == "POST") {

      $myItem_name = mysqli_real_escape_string($conn,$_POST['name']);
      $myItem_quantity = mysqli_real_escape_string($conn,$_POST['quantity']);

      echo '<form action="confirm_create_item_final.php" method="post">';
      echo '<div class="container">';
      echo "Item:<b>'$myItem_name'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Quantity:<b>'$myItem_quantity'</b>";
      echo '<input type="hidden" name="name" id="hiddenField" value= "'.$myItem_name.'" />';
      echo '<input type="hidden" name="quantity" id="hiddenField" value= "'.$myItem_quantity.'" />';
      echo '<button type="submit">CONFIRM</button>';
      echo '</div>';
      echo '</form>';

      }
?>
<div class="container" style="background-color:#f1f1f1">
  <a href="create_Item.html">
  <button type="button" class="cancelbtn">Cancel</button>
  </a>
  <a href="welcome_new2_Coordi.php">
  <button type="button" class="cancelbtn">HOME</button>
  </a>
</div>
</body>
</html>
