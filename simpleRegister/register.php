<?php
  require "./Includes/connect.php";
  // $query = "SELECT password FROM users WHERE username = :u";
  function RegisteredUser(PDO $connection,array $info): bool{
    $query = "SELECT ID FROM users WHERE username = :u";
    $result = $connection->prepare($query);
    if($result->execute(["u" => $info["user"]])){
      return $result->rowCount() > 0;
    }
    return false;
  }
  function insertUser(PDO $connection, array $userInfo){
    $hashedPw = password_hash($userInfo["pw"], PASSWORD_DEFAULT);
    $query = "INSERT INTO users(username, OriginalPW, password, email, gender, phone) VALUES (:u,:op,:p,:e,:g,:ph)";
    $result = $connection->prepare($query);
    return $result->execute([
      "u"  => $userInfo["user"], 
      "op"  => $userInfo["cpw"], 
      "p"  => $hashedPw, 
      "e"  => $userInfo["em"],
      "g"  => $userInfo["gn"],
      "ph" => $userInfo["ph"]
    ]);
  }
  function Register(PDO $connection){
    $info = [
    "user" => $_POST["username"],
    "pw" => $_POST["password"],
    "cpw" => $_POST["cpassword"],
    "em" => $_POST["email"],
    "gn" => $_POST["gender"],
    "ph" => $_POST["phone"]
    ];
    if($result = ($info["pw"] === $info["cpw"])){
      if($result = !RegisteredUser(connection: $connection, info: $info)){
        $result = insertUser($connection, $info);
      }
    }
    return $result;
  }

//===========Register flow===========\\
if(isset($_POST["signup"])){
  if(!($_POST["password"] === $_POST["cpassword"])){
    echo "Passwords not matched";
    header("Refresh:3;url=register.php");
  }else{
    $result = Register($connection);
    if($result){
      echo "Registered Successfuly";
      header("Refresh:3;url=welcome.php?username={$_POST["username"]}");
    }
    else{
      echo "Account exists redirecting to login page";
      header("Refresh:3;url=index.php");
    }
  }
  closeConnection($connection);
  exit;
}
//===========End Register flow===========\\
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

        <div class="form_container">
          <form action="" method="post" class="form">
            <h3 class="form_heading">Sign Up</h3>
            <input
            type="text"
            placeholder="Enter your username"
            class="input_fields"
            name="username" required
            value="special"
            />
            <input
            type="password"
            placeholder="Enter your password"
            class="input_fields"
            name="password" required
            value="special"
            />
            <input
            type="password"
            placeholder="Confirm Password"
            class="input_fields"
            name="cpassword" required
            value="special"
            />
            <input
            type="email"
            placeholder="Enter your email"
            class="input_fields"
            name="email" required
            value="special@ex.com"
            />
            <select name="gender" required class="form-select form-select-lg w-25">
              <option value="male" selected>Male</option>
              <option value="female">Female</option>
            </select>
            <input
            type="number"
            placeholder="Enter your phone number"
            class="input_fields"
            name="phone" required
            value="5252685"
          />
          <p class="form_question">
            Already have an account?
            <a href="index.php" class="login_text">Login here</a>
          </p>
          <input name="signup" type="submit" value="Sign Up" class="btn">
        </form>
      </div>
      <div class="image_container">
        <img src="./Assets/images/blue-scenary.png" alt="Registration Image" />
      </div>
    </div>
      <footer class="footer">
        <p>
          Made with 💖 by Khanam
          <a href="https://www.youtube.com/c/StepbyStep_KhanamCoding">Visit here</a>
        </p>
      </footer>
    </div>
  </body>
</html>