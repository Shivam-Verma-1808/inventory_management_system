<?php
   include('session_new.php');
?>
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
<title>New Page 4</title>
</head>

<body background="white-wallpaper20.jpg" style="background-attachment: fixed">

<h1>What do you Wish for Today ? :</h1>
<br>
<form action="newrequest_new_final.php" method="POST" >
  <?php
    include("config_new.php");

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
      $myuser_selected_id = mysqli_real_escape_string($conn,$_POST['id']);

      $sql=" SELECT * from Item where ID= '$myuser_selected_id' ";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      echo $row['Name'];
      echo '&nbsp;&nbsp;&nbsp;&nbsp;';
      echo "<select name='Quantity'>";
      $Quan = $row['Quantity'];
      $Issu = $row['Issued'];
      $diff = 1 ;
      while($diff <= $Quan-$Issu)
      {
        echo '<option value = "'.$diff.'">'.$diff.'</option>';
        $diff = $diff + 1;
      }
      echo "</select>";
    }
    echo '<input type="hidden" name="Item_id" id="hiddenField" value= "'.$myuser_selected_id.'" />';
  ?>

  <button type="submit">GO</button>

 </form>

  <p>









  </p>

  <div class="container" style="background-color:#f1f1f1">
    <a href="newrequest_new.php">
    <button type="button" class="cancelbtn">Previous</button>
    </a>
    <a href="welcome_new2.php">
    <button type="button" class="cancelbtn">HOME</button>
    </a>
  </div>

</body>

</html>
