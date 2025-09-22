<?php include './includes/connect.php';

if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $place=$_POST['place'];
    
    $insert_query="insert into validate (username,email,phone,place) values ('$username','$email','$phone','$place')";
    $result=mysqli_query($con,$insert_query);
    if($result){
      echo "<script>alert('Data inserted successfully')</script>";
      echo "<script>window.open('index.php','_self')</script>";
      
    }else{
      die(mysqli_error($result));
    }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    <link rel="stylesheet" href="style.css?v1=a">
</head>
<body>
<div class="form_container">
  <h1 class="heading">Form Validation</h1>
  <div>
    <form action="" method="post">
      <input type="text" name="username" placeholder="Enter your username"  class="input_field"  autocomplete="off"/>
      <input type="email" name="email" placeholder="Enter your email"  class="input_field" autocomplete="off"/>
      <input type="number" name="phone" placeholder="Enter your phone" class="input_field" autocomplete="off"/>
      <input type="place" name="place" placeholder="Enter your place"  class="input_field" autocomplete="off"/>
      <button type="submit" class="btn" name="submit">Submit Form</button>
    </form>
</div>
</div>
</body>
</html>