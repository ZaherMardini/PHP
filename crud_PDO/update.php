<?php
  require './Includes/connect.php';
  //=============Get old values=============\\
  if(isset($_GET["update_id"])){
    $id = $_GET["update_id"];
    $query = "SELECT * FROM users WHERE ID = :id";
    $result = $connection->prepare($query);
    if($result->execute(['id' => $id])){
      $record = $result->fetch(PDO::FETCH_ASSOC);
    };
  }
  //=============End Get old values=============\\

  //=============Update logic=============\\
  if(isset($_POST["edit"])){
    // $query = "INSERT INTO users(username, email, phone, place) VALUES ('{$_POST['username']}','{$_POST['email']}','{$_POST['phone']}','{$_POST['place']}')";
    // $result = $connection->query($query);
    $query = "UPDATE users set username = :un, email = :e, phone = :ph, place = :pl WHERE ID = :id";
    $result = $connection->prepare($query);
    if(!$result->execute([
      "un" => "{$_POST["username"]}", 
      "e"  => "{$_POST['email']}", 
      "ph" => "{$_POST['phone']}", 
      "pl" => "{$_POST['place']}", 
      "id" => "{$id}"
      ])){
        echo "Query error";
      }else{
        echo "updated";
      };
    }
    //=============End Update logic=============\\
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./Assets/CSS/style.css">
  <link rel="stylesheet" href="./Assets/CSS/all.min.css">
  <link rel="stylesheet" href="./Assets/CSS/bootstrap.min.css">

  <title>Edit</title>
</head>
<body>
  <div class="container">
    <form class="form" method="post" action="">
      <div class="form-input-container">
        <input
          autocomplete="off"
          type="text"
          class="form-input"
          id="username"
          name="username"
          placeholder="Enter your name"
          value="<?php echo isset($record) ? $record['username'] : '';?>"
          />     
        </div>
        <div class="form-input-container">
          <input
          autocomplete="off"
          type="text"
          class="form-input"
          id="email"
          name="email"
          placeholder="Enter your email address"
          value="<?php echo isset($record) ? $record['email'] : '';?>"
          />
        </div>
        <div class="form-input-container">
          <input
          autocomplete="off"
          type="number"
          class="form-input"
          id="number"
          name="phone"
          placeholder="Enter your phone"
          value="<?php echo isset($record) ? $record['phone'] : '';?>"
          />
        </div>
        <div class="form-input-container">
          <input
          autocomplete="off"
          type="text"
          class="form-input"
          id="text"
          name="place"
          placeholder="Enter your place"
          value="<?php echo isset($record) ? $record['place'] : '';?>"
          />
        </div>
      <input type="submit" value="Submit" class="form-btn" name="edit"/>
    </form>
    <div>
      <button class="display-btn"><a href="display.php">Display</a></button>
    </div>
  </div>
</body>
</html>