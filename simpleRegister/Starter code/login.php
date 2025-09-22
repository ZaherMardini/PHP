<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration and Login System</title>
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <h1 class="heading">Registration System in PHP</h1>
    <div class="container">
      <div class="image_container">
        <img src="images/white-scenary.png" alt="Login Form" />
      </div>
      <div class="form_container">
        <form action="" class="form" method="post">
          <h3 class="form_heading">Sign In</h3>

          <input
            type="text"
            placeholder="Username"
            class="input_fields"
            name="username"
          />
          <input
            type="password"
            placeholder="Password"
            class="input_fields"
            name="password"
          />
          <p class="form_question">
            Already have an account?
            <a href="register.php" class="login_text">Register here</a>
          </p>
          <input type="submit" value="Sign In" class="btn" />
        </form>
      </div>
    </div>

    <footer class="footer">
      <p>
        Made with 💖 by Khanam
        <a href="https://www.youtube.com/c/StepbyStep_KhanamCoding"
          >Visit here</a
        >
      </p>
    </footer>
  </body>
</html>
