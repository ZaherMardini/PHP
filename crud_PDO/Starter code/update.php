<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PDO - CRUD Operation</title>
    <link rel="stylesheet" href="style.css?v1=a" />
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <form class="form" method="post" action="update.php">
        <div class="form-input-container">
          <input
            autocomplete="off"
            type="text"
            class="form-input"
            id="username"
            name="username"
          />
          
        </div>
        <div class="form-input-container">
          <input
            autocomplete="off"
            type="text"
            class="form-input"
            id="email"
            name="email"
          />
          
        </div>
        <div class="form-input-container">
          <input
            autocomplete="off"
            type="password"
            class="form-input"
            id="password"
            name="password"
          />
          
        </div>
        <div class="form-input-container">
          <input
            autocomplete="off"
            type="password"
            class="form-input"
            id="password2"
            name="password2"
          />
          
        </div>
        <input type="submit" value="Update" class="form-btn" name="submit"/>
      </form>
    </div>

 
  </body>
</html>
