<?php
require 'Includes/connection.php';
class validation{
  public static $errorMessages = [
    "empty" => "Fill all the fields",
    "user" => "Username too short",
    "email" => "Email not valid",
    "phone" => "Phone number should be 10 digits",
    "place" => "Place too short",
    "uniqueUser" => "Username exists",
    "uniqueEmail" => "Email exists"
  ];
  public static $detectedErrors = [];
  public static function submitting(string $submitName){
    return isset($_POST[$submitName]);
  }
  public static function getFormValues(Array $filedsNames): array{ //tested
    $fieldValues = [];
    if(count($filedsNames) > 0){
      foreach($filedsNames as $fieldName){
        if($fieldName === "username" || $fieldName === "place"){
          $fieldValues[] = htmlspecialchars(str_replace(" ","",$_POST[$fieldName]));
          continue;
        }
        $fieldValues[] = $_POST[$fieldName];
      }  
      return array_combine($filedsNames,$fieldValues);
    }
    return [];
  }
  public static function submit(String $submitName): bool{
    return isset($_POST[$submitName]);
  }

  public static function digits(string $phone){
    return ctype_digit($phone) && strlen($phone) === 10;
  }
  public static function emptyFields(Array $filedsNames): bool{//tested
    foreach($filedsNames as $fieldName){
      $fieldValue = $_POST[$fieldName];
      if($fieldValue === ""){
        return true;
      }
    }
    return false;
  }
  public static function charsCount(string $filedValue, int $minChars): bool{
    return strlen($filedValue) >= $minChars;
  }
  public static function email(string $email){
    return filter_var($email, FILTER_VALIDATE_EMAIL) || preg_match('/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email);
  }
  public static function uniqueUser(string $username, mysqli $connection){//continue here
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_execute_query($connection, $query);
    if(isset($result)){
      return $result->num_rows === 0;
    }
    return false;
  }
  public static function uniqueEmail(string $email, mysqli $connection){//continue here
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_execute_query($connection, $query);
    if(isset($result)){
      return $result->num_rows === 0;
    }
    return false;
  }

  public static function validateAll(array $fieldsNames, mysqli $connection): bool{
    if(validation::emptyFields($fieldsNames)){
      validation::$detectedErrors[] = validation::$errorMessages["empty"];
    }
    $result = validation::getFormValues($fieldsNames);
    if(!validation::charsCount($result["username"], 3)){
      validation::$detectedErrors[] = validation::$errorMessages["user"];
    }
    if(!validation::email($result["email"])){
      validation::$detectedErrors[] = validation::$errorMessages["email"];
    }
    if(!validation::digits($result["phone"])){
      validation::$detectedErrors[] = validation::$errorMessages["phone"];
    }
    if(!validation::charsCount($result["place"], 5)){
      validation::$detectedErrors[] = validation::$errorMessages["place"];
    }
    if(!validation::uniqueUser($result["username"], $connection)){
      validation::$detectedErrors[] = validation::$errorMessages["uniqueUser"];
    }
    if(!validation::uniqueEmail($result["email"], $connection)){
      validation::$detectedErrors[] = validation::$errorMessages["uniqueEmail"];
    }

    return count(validation::$detectedErrors) === 0;
  }
}

function insertValidData(mysqli $connection, array $dataArray){
  $query = "
  INSERT INTO users (username, email, phone, place) VALUES
  ('" . $dataArray['username'] . "', '" . $dataArray['email'] . "', '" . $dataArray['phone'] . "', '" . $dataArray['place'] . "')
  ";
  $result = mysqli_execute_query($connection, $query);
  return isset($result);
}

//Testing Validation class (Finish the project entierly)
if(validation::submitting("submit")){
  $fieldsNames = ["username", "email", "phone", "place"];
  if(validation::validateAll($fieldsNames, $connection)){
    
    if(insertValidData($connection, validation::getFormValues($fieldsNames))){
      echo "Success";
    };
    closeConnection($connection);
  }
  header("Refresh:3; url=http://formValidation.local/index.php");
}
//End Testing Validation class
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Assets/css/all.min.css">
    <link rel="stylesheet" href="./Assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./Assets/css/style.css?va=1">
    <title>Form Validation</title>
</head>
<body>
<div class="form_container">
  <h1 class="heading">Form Validation</h1>
  <div>
    <form action="" method="post">
      <?php 
        if(in_array(validation::$errorMessages["empty"], validation::$detectedErrors)){
          echo "<span>".validation::$errorMessages["empty"]."</span>";
        }
      ?>
      <input value="special" type="text" name="username" placeholder="Enter your username"  class="input_field"  autocomplete="off"/>
      <?php 
      if(in_array(validation::$errorMessages["user"], validation::$detectedErrors)){
        echo "<span>" .validation::$errorMessages["user"]. "</span>";
      }
      if(in_array(validation::$errorMessages["uniqueUser"], validation::$detectedErrors)){
        echo "<span>" .validation::$errorMessages["uniqueUser"]. "</span>";
      }
      ?>
      <input value="special@zozo.com" type="text" name="email" placeholder="Enter your email"  class="input_field" autocomplete="off"/>
      <?php
        if(in_array(validation::$errorMessages["email"], validation::$detectedErrors)){
          echo "<span>" .validation::$errorMessages["email"]. "</span>";
        }
        if(in_array(validation::$errorMessages["uniqueEmail"], validation::$detectedErrors)){
          echo "<span>" .validation::$errorMessages["uniqueEmail"]. "</span>";
        }
        ?>
      <input value="1234567890" type="number" name="phone" placeholder="Enter your phone" class="input_field" autocomplete="off"/>
      <?php 
        if(in_array(validation::$errorMessages["phone"], validation::$detectedErrors)){
          echo "<span>".validation::$errorMessages["phone"]."</span>";
        }
      ?>
      <input value="some random place" type="place" name="place" placeholder="Enter your place"  class="input_field" autocomplete="off"/>
      <?php 
        if(in_array(validation::$errorMessages["place"], validation::$detectedErrors)){
          echo "<span>".validation::$errorMessages["place"]."</span>";
        }
      ?>
      <input type="submit" class="btn" name="submit" value="Submit form">
    </form>
  </div>
</div>
</body>
</html>