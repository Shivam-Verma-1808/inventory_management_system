<html>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
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

    $sql="select CID , Name ,Email from Coordi ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0)
    {
                                                                                //echo "bgcolor";
      echo "<table><tr><th>ID</th><th>Name</th><th>Email</th></tr>";
    // output data of each row
      while($row = $result->fetch_assoc())
      {
        echo "<tr><td>". $row["CID"]. "</td><td>". $row["Name"]. "</td><td>".$row["Email"] . "</td></tr>";
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
