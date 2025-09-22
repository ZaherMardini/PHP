<?php
  $connection = mysqli_connect("localhost", "root", "", "crud_ops");
  if(!$connection){
    echo "Connection failed";
  }
  function closeConnection(mysqli $connection){
    $connection->close();
  }
?>