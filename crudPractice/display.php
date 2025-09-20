<?php require "./Includes/connection.php"?>
<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">
	<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<link rel="stylesheet" href="Assets/css/all.min.css"/>
			<link rel="stylesheet" href="Assets/css/bootstrap.min.css"/>
			<link rel="stylesheet" href="Assets/css/app.css?va=1"/>
			<title>Users details</title>
	</head>
	<body>
			<div class="table_container">
				<table class="table">
				<?php
					$query = "Select * from users";
					$result = mysqli_query($connection, $query);
				if($result->num_rows > 0){
					echo'
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
					<tbody>					
					';
					if($result){
						$data = $result->fetch_all(MYSQLI_ASSOC);
					}else{
						die(mysqli_error($connection));
					}
					$index = 1;
					foreach($data as $row){
						echo  "
						<tr>
						<td>{$index}</td>
						<td>{$row["username"]}</td>
						<td>{$row["email"]}</td>
						<td>{$row["phone"]}</td>
						<td>{$row["place"]}</td>
						<td>
						<a href='update.php?uID={$row["ID"]}'>
						<i class='fa-solid fa-pen-to-square'></i>
						</a>
						<a href='delete.php?dID={$row["ID"]}'>
						<i class='fa-solid fa-trash'></i>  
						</a>
						</td>
						</tr>
						";
						$index++;
					}
					}else{
						echo'Nothing to show';
						header("Refresh:3; url=http://phppractice.local/index.php");
					}
				?>
						
					</tbody>
				</table>
			</div>
	</body>
</html>