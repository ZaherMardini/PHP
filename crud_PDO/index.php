<?php
  require './Includes/connect.php';
//=============Insert logic=============\\
if(isset($_POST["insert"])){
  $query = "INSERT INTO users(username, email, phone, place) VALUES (:un, :e, :ph, :pl)";
  $result = $connection->prepare($query);
  if(!$result->execute([
    "un" => "{$_POST["username"]}", 
    "e"  => "{$_POST['email']}", 
    "ph" => "{$_POST['phone']}", 
    "pl" => "{$_POST['place']}", 
    ])){
      echo "Query error";
    }else{
      echo "Inserted";
    };
  }
//=============End Insert logic=============\\
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PDO - CRUD Operation</title>
    <link rel="stylesheet" href="./Assets/CSS/style.css">
    <link rel="stylesheet" href="./Assets/CSS/all.min.css">
    <link rel="stylesheet" href="./Assets/CSS/bootstrap.min.css">
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
            value="zozo"
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
            value="123456"
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
            value="zozo kingdom"
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
            value="zozo@email.com"
            />
          
        </div>

        <input type="submit" value="Submit" class="form-btn" name="insert"/>
      </form>

      <div>
        <button class="display-btn"><a href="display.php">Display</a></button>
      </div>

    </div>

  </body>
</html>
