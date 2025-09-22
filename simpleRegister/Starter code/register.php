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
      <div class="form_container">
        <form action="" method="post" class="form">
          <h3 class="form_heading">Sign Up</h3>

          <input
            type="text"
            placeholder="Enter your username"
            class="input_fields"
            name="username" required
          />
          <input
            type="email"
            placeholder="Enter your email"
            class="input_fields"
            name="email" required
          />
          <input
            type="password"
            placeholder="Enter your password"
            class="input_fields"
            name="password" required
          />
          <input
            type="password"
            placeholder="Confirm Password"
            class="input_fields"
            name="cpassword" required
          />
          <select name="gender" required class="input_fields">
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
          </select>
          <input
            type="number"
            placeholder="Enter your phone number"
            class="input_fields"
            name="mobile" required
          />
          <p class="form_question">
            Already have an account?
            <a href="login.php" class="login_text">Login here</a>
          </p>
          <input type="submit" value="Sign Up" class="btn" />
        </form>
      </div>
      <div class="image_container">
        <img src="images/blue-scenary.png" alt="Registration Image" />
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
