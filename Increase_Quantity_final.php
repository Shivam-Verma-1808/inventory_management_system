<?php

   include("config_new.php");

   if($_SERVER["REQUEST_METHOD"] == "POST") {

      $myItem_id = mysqli_real_escape_string($conn,$_POST['Item_id']);
      $myItem_new_quantity = mysqli_real_escape_string($conn,$_POST['quantity']);

      $sql_1 = "select * from Item where ID='$myItem_id'";
      $result_1=mysqli_query($conn,$sql_1);
      $row_1= $result_1->fetch_assoc();
      $Item_name=$row_1['Name'];
      $Item_old_quantity=$row_1['Quantity'];

      $sql = " UPDATE Item SET Quantity= '$myItem_new_quantity' WHERE ID='$myItem_id'";
      $result = mysqli_query($conn,$sql);                                                                                                                   //$result=$conn->query($sql);                                                                                              //$result = mysqli_query($db,$sql);

      $result_2=mysqli_query($conn,$sql_1);
      $row_2= $result_2->fetch_assoc();
      $Item_present_quantity=$row_2['Quantity'];


      if(($Item_present_quantity > $Item_old_quantity) and ($Item_present_quantity == $myItem_new_quantity)) {

        echo "Item: <b>$Item_name</b> Increased .";
        header("refresh:3; url = Manage_Store.html");

      }
      else {
         echo "Seem that some error occured : E:07";
         header("refresh:3; url = Increase_Quantity.php");

      }
   }
?>
