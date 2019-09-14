<html>

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

/* Change styles for cancel button on extra small screens */
@media screen and (max-width: 300px) {
    .cancelbtn {
       width: 100%;
    }
}
</style>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
</head>

<body background="white-wallpaper20.jpg" style="background-attachment: fixed">

<h1>Increase Quantity Of ? :</h1>
<br>
<form action="Increase_Quantity_Quantity.php" method="POST" >
  <?php
    include("config_new.php");

      $sql=" select * from Item";
      $result = $conn->query($sql);

      if ($result->num_rows > 0)
      {
        echo "<select name='id'>";
        while($row = $result->fetch_assoc())
        {
          $id = $row['ID'];
          $item_name = $row['Name'];
          echo '<option value = "'.$id.'">'.$item_name.'</option>';
        }
        echo "</select>";
      }

      else
      {
      echo " NO Item found ";
      }

  ?>

  <button type="submit">Proceed</button>

 </form>

  <div class="container" style="background-color:#f1f1f1">
    <a href="Manage_Store.html">
    <button type="button" class="cancelbtn">Cancel</button>
    <a href="welcome_new2_Coordi.php">
    <button type="button" class="cancelbtn">HOME</button>
    </a>
  </div>

</body>

</html>
