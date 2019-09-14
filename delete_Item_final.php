<?php

   include("config_new.php");

   if($_SERVER["REQUEST_METHOD"] == "POST") {

      $myItem_id = mysqli_real_escape_string($conn,$_POST['Item_id']);

      $sql_1="select * from Item";
      $result_1=mysqli_query($conn,$sql_1);
      $count_1 = $result_1->num_rows;

      $sql_1_5 = "select * from Item where ID='$myItem_id'";
      $result_1_5=mysqli_query($conn,$sql_1_5);
      $row_1_5= $result_1_5->fetch_assoc();
      $Item_name=$row_1_5['Name'];

      $sql = "DELETE FROM Item WHERE ID= '$myItem_id' ";
      $result = mysqli_query($conn,$sql);                                                                                                                   //$result=$conn->query($sql);                                                                                              //$result = mysqli_query($db,$sql);

      $result_2=mysqli_query($conn,$sql_1);
      $count_2 = $result_2->num_rows;


      if($count_2 == ($count_1 - 1) ) {

        echo "Item: <b>$Item_name</b> DELETED .";
        header("refresh:3; url = Manage_Store.html");

      }
      else {
         echo "Seem that some error occured : E:06";
         header("refresh:3; url = delete_Item.php");

      }
   }
?>
