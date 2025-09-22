<?php
  require "./Includes/connect.php";

  function remembered(PDO $connection){
    $query = "SELECT username, password FROM remembered WHERE ID = 1";
    $result = $connection->query($query);
    if($result){
      $result = $result->fetch();
    }
    return $result;
  }
  function userExists(PDO $connection, string $username):bool{
    $query = "SELECT ID FROM users WHERE username = :u";
    $result = $connection->prepare($query);
    return $result->execute(['u' => $username]) && $result->rowCount() > 0;
  }
  function checkSignedUser(PDO $connection,array $info): bool{
    if(userExists($connection, $info['user'])){
      $query = "SELECT password FROM users WHERE username = :u";
      $result = $connection->prepare($query);
      if($result->execute(['u' => $info['user']])){
        $pw = $result->fetch();
        return password_verify($info["pw"], $pw["password"]);
      }
    }
    return false;
  }
  function login(PDO $connection){
    $info = ["user" => trim($_POST["username"]), "pw" => $_POST["password"]];
    return checkSignedUser(connection: $connection, info: $info);
  }
  function loginFlow(PDO $connection){
    if(isset($_POST["signin"])){
    $result = login($connection);
    if($result){
      echo "Logged in Successfuly";
      header("Refresh:3;url=welcome.php?username={$_POST["username"]}");
    }else if(userExists($connection, $_POST["username"])){
      echo "Wrong password, try again";
      header("Refresh:2;url=index.php");
    }else{
      echo "Account doesn't exists redirecting to register page";
      header("Refresh:3;url=register.php");
    }
    closeConnection($connection);
    exit;
    }
  }
//===========log in flow===========\\
// loginFlow($connection);

//===========End log in flow===========\\
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration and Login System</title>
    <link rel="stylesheet" href="./Assets/CSS/style.css?va=1">
    <link rel="stylesheet" href="./Assets/CSS/all.min.css">
    <link rel="stylesheet" href="./Assets/CSS/bootstrap.min.css">
  </head>
  <body>
    <h1 class="heading">Registration System in PHP</h1>
    <div class="container">
      <div class="form-image-container">
        <div class="image_container">
          <img src="./Assets/images/white-scenary.png" alt="Login Form" />
        </div>
        <div class="form_container">
          <form action="" class="form" method="post">
            <h3 class="form_heading">Sign In</h3>
            <input
            type="text"
            placeholder="Username"
            class="input_fields"
            name="username"
            value="john_doe"
            />
            <input
            type="password"
            placeholder="Password"
            class="input_fields"
            name="password"
            value="testing1"
            />
            <p class="form_question">
              Don't have an account?
              <a href="register.php" class="login_text">Register here</a>
            </p>
            <input name="signin" type="submit" value="Sign In" class="btn" />
          </form>
        </div>
      </div>
    </div>


  <?php
    // ==============testing==============\\
    $result = remembered($connection);
    print_r($result);

    // ==============testing==============\\
  ?>


    <footer class="footer">
      <p>
        Made with 💖 by Khanam
        <a href="https://www.youtube.com/c/StepbyStep_KhanamCoding"
          >Visit here</a
        >
      </p>
    </footer>
  </body>
</html>
