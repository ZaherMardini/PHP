<?php
  require './Includes/connection.php';
  if(isset($_GET['dID'])){
    if(isset($_GET['exit'])){
      header("Location:http://phppractice.local/display.php");
      exit;
    }
    $d_ID = $_GET['dID'];
    $getQuery = "SELECT * FROM users WHERE ID = '$d_ID'";
    $getResult = mysqli_query($connection, $getQuery);
    if($getResult){
      $userData = $getResult->fetch_array(MYSQLI_ASSOC);
      $user_id = $userData["ID"];
      $username = $userData["username"];
      $email = $userData["email"];
      $phone = $userData["phone"];
      $place = $userData["place"];
    }
    $deleteQuery = "DELETE FROM users WHERE ID = '$d_ID'";
    $deleteResult = mysqli_query($connection, $deleteQuery);
    if($deleteResult){
      header("Location:http://phppractice.local/display.php");
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
	<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="Assets/css/all.min.css"/>
      <link rel="stylesheet" href="Assets/css/bootstrap.min.css"/>
      <link rel="stylesheet" href="Assets/css/app.css?va=1"/>
      <title>Delete user</title>
	</head>
  <body>
    <h1>Deleting the following user</h1>
    <form action="">
      <input type="submit" name="exit" value="Cancel" class="btn btn-danger">
    </form>
      <div class="table_container">
				<table class="table">
					<thead>
						<tr>
							<th>Sl No</th>
							<th>Username</th>
							<th>Email</th>
							<th>Mobile</th>
							<th>Place</th>
							<th>Action</th>
						</tr>
					</thead>
          <tr>
            <td><?php echo $user_id ?></td>
            <td><?php echo $username ?></td>
            <td><?php echo $email ?></td>
            <td><?php echo $phone ?></td>
            <td><?php echo $place ?></td>
          </tr>
					<tbody>
      </div>
  </body>
</html>