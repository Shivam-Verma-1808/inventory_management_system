<?php

   include("config_new.php");
   include('session_new.php');

   if($_SERVER["REQUEST_METHOD"] == "POST") {

      $myItem_id = mysqli_real_escape_string($conn,$_POST['Item_id']);
      $myQuantity = mysqli_real_escape_string($conn,$_POST['Quantity']);

      $sql_1="select * from Request";
      $result_1=mysqli_query($conn,$sql_1);
      $count_1 = $result_1->num_rows;

      //echo $myQuantity;

      $sql = "insert into Request (Quantity,IID,SID) values ('$myQuantity','$myItem_id','$login_session') ";
      $result = mysqli_query($conn,$sql);                                                                                                                   //$result=$conn->query($sql);                                                                                              //$result = mysqli_query($db,$sql);

      $result_2=mysqli_query($conn,$sql_1);
      $count_2 = $result_2->num_rows;

      if($count_2 == ($count_1 + 1) ) {

        echo "hurray ! Your Request is Registered ";
        echo "<br>create a new request ? :";
        header("refresh:3; url = newrequest_new.php");

      }
      else {
         echo "Seem that some error occured : E:01";
         echo "<br> redirecting ........";
         header("refresh:3; url = newrequest_new.php");

      }
   }
?>
