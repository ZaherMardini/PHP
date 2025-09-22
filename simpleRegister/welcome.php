<?php
    if($_SERVER['REQUEST_METHOD'] === "GET"){
        $user = $_GET["username"];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
</head>
<body>
    <div>
        <h2> Welcome <?php echo $user ?> </h2>
    
        <!-- Logout button -->
        <form action="index.php" method="post">
            <input class="btn btn-danger" type="submit" value="Logout">
        </form>
    </div>
</body>
</html>
