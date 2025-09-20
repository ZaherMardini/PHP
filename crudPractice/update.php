<?php 
    require './includes/connection.php';
    if(isset($_POST['update'])){
			$username = $_POST["username"];
			$email = $_POST["email"];
			$phone = $_POST["phone"];
			$place = $_POST["place"];
			
			$query = "
			UPDATE users SET username = '$username', email = '$email', phone = '$phone', place = '$place'
            WHERE ID = {$_GET['uID']}
			";
			$result = mysqli_query($connection, $query);
			if(isset($result)){
                echo 'User updated';
                header("Location:http://phppractice.local/display.php");
                // header("Refresh:2; url=http://phppractice.local/display.php");
                // exit;
            }else{
                die($connection);
            }
			// closeConnection($connection);
        }    ;
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="Assets/css/all.min.css"/>
        <link rel="stylesheet" href="Assets/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="Assets/css/app.css"/>
        <title>PHP killer CRUD ops project</title>
    </head>
    <body>
    <div class="container">
        <form action="" method="post">
            <fieldset>
                <legend>User info</legend>
                
                <?php 
                if(isset($_GET['uID'])){

                    $query = "SELECT * FROM users WHERE ID = {$_GET['uID']}";
                    $result = mysqli_query($connection, $query);
                    if($result){
                        $data = $result->fetch_array(MYSQLI_ASSOC);
                        echo"
                        <label for='username'>Username</label>
                        <input value='{$data["username"]}' type='text' name='username' placeholder='Username' required>
                        <label for='email'>Email</label>
                        <input value='{$data["email"]}' type='email' name='email' placeholder='Email' required>
                        <label for='phone'>Phone</label>
                        <input value='{$data["phone"]}' type='text' name='phone' placeholder='Phone' required>
                        <label for='place'>Place</label>
                        <input value='{$data["place"]}' type='text' name='place' placeholder='Place' required>
                        ";
                    }
                }
                ?>
                
                <input type="submit" name="update" value="Update" class="btn btn-info">
							</fieldset>
						</form>
						<a href="display.php" class="btn btn-primary">Details</a>
    </div>
    <script src="Assets/JS/Bootstrap.bundle.min.js"></script>
    </body>
</html>