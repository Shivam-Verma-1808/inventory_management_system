<html>

<head>
<meta http-equiv="Content-Language" content="en">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Coordinators contact</title>
</head>

<body background="white-wallpaper20.jpg" style="background-attachment: fixed">

<p><font size="7">Coordinators contact</font></p>
<p>&nbsp;</p>

<?php
  include("config_new.php");

    $sql="Select * from Item ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0)
    {
                                                                                //echo "bgcolor";
      echo "<table><tr><th>ID</th><th>Name</th><th>Quantity</th><th>Issued</th></tr>";
    // output data of each row
      while($row = $result->fetch_assoc())
      {
        echo "<tr><td>". $row["ID"]. "</td><td>". $row["Name"]. "</td><td>".$row["Quantity"] . "</td><td>".$row["Issued"]."</td></tr>";
      }
      echo "</table>";
    }

    else
    {
    echo "0 results";
    }


?>

</body>

</html>
