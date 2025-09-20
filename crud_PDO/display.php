<?php
  require "./Includes/connect.php";
    //=============Delete logic=============\\
  if(isset($_GET["delete_id"])){
    $id = $_GET["delete_id"];
    $query = "DELETE FROM users WHERE ID = :id";
    $result = $connection->prepare($query);
    if($result->execute(['id' => $id])){
      echo "Deleted";
    }else{
      echo "Not Deleted";
    };
  }
  //=============End Delete logic=============\\

  try{
    $query = "SELECT * FROM users";
    $result = $connection->query($query);
  }catch(PDOException $e){
    echo "Error {$e->getMessage()}";
  }
  function view($result, &$connection){
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
      echo <<< record
        <tr>
          <td>{$row['ID']}</td>
          <td>{$row['username']}</td>
          <td>{$row['email']}</td>
          <td>{$row['phone']}</td>
          <td>{$row['place']}</td>
          <td>
            <a href='update.php?update_id={$row['ID']}'><i class='fa-solid fa-pen-to-square'></i></a>
            <a href='display.php?delete_id={$row['ID']}'><i class='fa-solid fa-trash'></i></a>
          </td>
        </tr>
      record;
    }
    return $row;
  }
  closeConnection(connection: $connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./Assets/CSS/style.css">
  <link rel="stylesheet" href="./Assets/CSS/all.min.css">
  <link rel="stylesheet" href="./Assets/CSS/bootstrap.min.css">

  <title>View</title>
</head>
<body>
  <div class="table_container">
    <table class="table">
      <thead>
        <tr>
          <td>ID</td>
          <td>Username</td>
          <td>Email</td>
          <td>Mobile</td>
          <td>Place</td>
          <td>Action</td>
        </tr>
      </thead>
      <tbody>
        <?php
         if(isset($result)){
          print_r(view($result, $connection));
         }
        ?>
      </tbody>
    </table>  
  </div>  
  </body>
  </html>