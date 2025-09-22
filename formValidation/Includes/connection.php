<?php
  $connection = mysqli_connect('localhost', 'root', '', 'crud_ops');
  if(!$connection)
  die("Not connected".mysqli_connect_error());
  function closeConnection(mysqli $connection){
    $connection->close();
  }
?>