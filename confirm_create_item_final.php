<?php
   include("config_new.php");

   if($_SERVER["REQUEST_METHOD"] == "POST") {

      $myItem_name = mysqli_real_escape_string($conn,$_POST['name']);
      $myItem_quantity = mysqli_real_escape_string($conn,$_POST['quantity']);

      $sql_1 = "select * from Item";
      $result_1 = mysqli_query($conn,$sql_1);
      $count_1 = $result_1->num_rows;

      $sql = "Insert Into Item (Name,Quantity) values ('$myItem_name','$myItem_quantity')";
      $result = mysqli_query($conn,$sql);

      $result_2 = mysqli_query($conn,$sql_1);
      $count_2 = $result_2->num_rows;

      if($count_2 == ($count_1 + 1)) {

         echo "New Item : $myItem_name created .";
         header("refresh:3; url=Manage_Store.html");
      }
      else {
         echo "Ooops! Seems that something went wrong . E:05";
         header("refresh:3 ;url = create_Item.html");

      }
   }
?>
