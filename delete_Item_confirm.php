<html>

<style>
form {
    border: 3px solid #f1f1f1;
}

button {
    background-color: #f44336;
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
    background-color: #4CAF50;
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

<h1>Confirm Deletion :</h1>
<br>
<form action="delete_Item_final.php" method="POST" >
  <?php
    include("config_new.php");

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
      $myuser_selected_id = mysqli_real_escape_string($conn,$_POST['id']);

      $sql=" SELECT * from Item where ID= '$myuser_selected_id' ";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      $Item_name=$row['Name'];
      echo "Delete : <b> $Item_name </b>";
    }
    echo '<input type="hidden" name="Item_id" id="hiddenField" value= "'.$myuser_selected_id.'" />';
  ?>

  <button type="submit">CONFIRM</button>

 </form>

  <div class="container" style="background-color:#f1f1f1">
    <a href="delete_Item.php">
    <button type="button" class="cancelbtn">Previous</button>
    </a>
    <a href="Manage_Store.html">
    <button type="button" class="cancelbtn">Back to Store</button>
    </a>
    <a href="welcome_new2_Coordi.php">
    <button type="button" class="cancelbtn">HOME</button>
    </a>
  </div>

</body>

</html>
