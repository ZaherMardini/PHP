<?php 
    require './includes/connection.php';
    if(isset($_POST['submit'])){
			$username = $_POST["username"];
			$email = $_POST["email"];
			$phone = $_POST["phone"];
			$place = $_POST["place"];
			
			$query = "
			INSERT INTO users (username, email, phone, place) VALUES
			('$username', '$email', '$phone', '$place');
			";
			$result = mysqli_query($connection, $query);
			if(isset($result))
			echo 'New user Added';
			closeConnection($connection);
			header("Refresh:2; url=index.php");
    };
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="Assets/css/all.min.css"/>
        <link rel="stylesheet" href="Assets/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="Assets/css/app.css?va=1"/>
        <title>PHP killer CRUD ops project</title>
    </head>
    <body>
    <div class="container">
        <form action="" method="post">
            <fieldset>
                <legend>User info</legend>
                
                <label for="username">Username</label>
                <input value="testing_username" type="text" name="username" placeholder="Username" required>
                <label for="email">Email</label>
                <input value="testing@gmail.com" type="email" name="email" placeholder="Email" required>
                <label for="phone">Phone</label>
                <input value="testing_Phone" type="text" name="phone" placeholder="Phone" required>
                <label for="place">Place</label>
                <input value="testing_Place" type="text" name="place" placeholder="Place" required>
                
                <input type="submit" name="submit" value="Send" class="btn btn-info">
							</fieldset>
						</form>
						<a href="display.php" class="btn btn-primary">Details</a>
    </div>
    <script src="Assets/JS/Bootstrap.bundle.min.js"></script>
    </body>
</html>