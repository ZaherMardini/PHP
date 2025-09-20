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
      <form class="form" method="post" action="insert.php">
        <div class="form-input-container">
          <input
            autocomplete="off"
            type="text"
            class="form-input"
            id="username"
            name="username"
            placeholder="Enter your name"
          />     
        </div>

        <div class="form-input-container">
          <input
            autocomplete="off"
            type="number"
            class="form-input"
            id="number"
            name="phone"
            placeholder="Enter your phone"
          />
        </div>
        <div class="form-input-container">
          <input
            autocomplete="off"
            type="text"
            class="form-input"
            id="text"
            name="place"
            placeholder="Enter your place"
          />
        </div>
        <div class="form-input-container">
          <input
            autocomplete="off"
            type="text"
            class="form-input"
            id="email"
            name="email"
            placeholder="Enter your email address"
          />
          
        </div>

        <input type="submit" value="Submit" class="form-btn" name="submit"/>
      </form>

      <div>
        <button class="display-btn"><a href="display.php">Display</a></button>
      </div>

    </div>

  </body>
</html>
