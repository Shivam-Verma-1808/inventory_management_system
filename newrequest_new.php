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
<form action="newrequest_new_quntity.php" method="POST" >
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

                                                                                      /*$sql_2= "select * from Item ";
                                                                                      $result = $conn->query($sql_2);

                                                                                      echo "<select name='Quantity'>";
                                                                                      while($row = $result->fetch_assoc())
                                                                                      {
                                                                                          $Quan = $row['Quantity'];
                                                                                          $Issu = $row['Issued'];
                                                                              //          echo '<option value = "'.$id.'">'.$.'</option>';
                                                                                          $diff = 1 ;
                                                                                          while($diff <= $Quan-$Issu)
                                                                                          {
                                                                                            echo '<option value = "'.$diff.'">'.$diff.'</option>';
                                                                                            $diff = $diff + 1;
                                                                                          }
                                                                                      }
                                                                                            echo "</select>";*/
      }

      else
      {
      echo " NO Item found ";
      }

  ?>

  <button type="submit">Proceed</button>

 </form>

  <p>









  </p>

  <div class="container" style="background-color:#f1f1f1">
    <a href="welcome_new2.php">
    <button type="button" class="cancelbtn">Cancel</button>
    </a>
  </div>

</body>

</html>
