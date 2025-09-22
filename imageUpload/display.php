<?php
  require"./includes/connect.php";
    $query = "SELECT * FROM profiles";
    $result = mysqli_execute_query($connection, $query);
    if(isset($result)){
      $result = $result->fetch_all(MYSQLI_ASSOC);
    }else{
      echo "Fetching error, select an image and try again";
      header("Refresh:3;url=index.php");
      exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./Assets/CSS/all.min.css">
  <link rel="stylesheet" href="./Assets/CSS/bootstrap.min.css">
  <link rel="stylesheet" href="./Assets/CSS/style.css">
  <title>display</title>
</head>
<body>
  <div class="table_container">
    <table class="table">
      <thead>
        <tr class="head">
        <th>ID</th>
        <th>Profile Image</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $index = 1;
          foreach($result as $row){
            echo"
            <tr>
            <td>$index</td>
            <td><img src='{$row['image']}'></td>
            </tr>
            ";
            $index++;
          }
        ?>
      </tbody>
    </table>
  </div>
  <a href="index.php" class="link">Back</a>
</body>
</html>