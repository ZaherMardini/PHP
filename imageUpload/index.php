<?php
require "./Includes/connect.php";
function uploadToDB(mysqli $connection, $upload_path, array $img_info){
  $query = "INSERT INTO profiles (image) VALUES ('$upload_path')";
  $result = mysqli_execute_query($connection, $query);
  if($result){
    move_uploaded_file($img_info['tmp_name'], $upload_path);
    echo "<script> alert('Uploaded successfully')</script>";
    // echo "Uploaded successfully";
  }else{
    die($connection) . " Not Uploaded";
  }
}

function handleImgExt(array $img_info):array{
  $result = [];
  $img_extensions = ['jpg', 'jpeg', 'png'];
  $exploded = explode(".", $img_info['name']);
  $img_ext = $exploded[count($exploded) - 1];// To ensure we get the extention
  $upload_path = "./assets/IMG/" . $img_info['name'];
  $result = ["extensions" => $img_extensions, "img_ext" => $img_ext, "path" => $upload_path];
  return $result;
}

  if(isset($_POST['submit'])){
    $image = $_FILES['image_file'];
    if($_FILES['image_file']['error'] === UPLOAD_ERR_OK){
      $result = handleImgExt($image);
      if(in_array($result["img_ext"], $result["extensions"])){
        uploadToDB($connection, $result["path"], $image);
      }else{
        echo "Invalid img extention";
      }
    }else{
      echo "Uploading error, select an image and try again";
    }
    header("Refresh:1;url=index.php");
    closeConnection($connection);
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./Assets/CSS/all.min.css">
  <link rel="stylesheet" href="./Assets/CSS/bootstrap.min.css">
  <link rel="stylesheet" href="./Assets/CSS/style.css">
  <title>Image Upload</title>
</head>
<body>
    <div class="container">
      <div class="form_container">
        <h2>Profile Card</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form_group">
              <input type="file" class="input_field" name="image_file">
            </div>
            <div class="form_group">
              <input type="submit" class="submit_btn" name="submit">
            </div>
        </form>
        <a href="display.php" class="link">View Profile</a>
      </div>
    </div>
  <script src="Assets/JS/bootstrap.bundle.min.js"></script>
</body>
</html>