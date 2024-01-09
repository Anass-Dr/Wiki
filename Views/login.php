<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="assets/css/login.css">
  <title>Login</title>
</head>

<body>
  <div id="login" class="login-box">
    <h2>Login</h2>
    <form>
      <div class="user-box">
        <input id="email" type="email" autocomplete="off" required onkeyup="inputClicked(event)" />
        <label>Email</label>
        <small class="hidden">Please enter a valid email</small>
      </div>
      <div class="user-box">
        <input id="password" type="password" required onkeyup="inputClicked(event)" />
        <label>Password</label>
        <small class="hidden">Password must be between 7 to 15 characters which contain at least one numeric digit and a special character</small>
      </div>
      <div class="btns">
        <span id="submit" onclick="login()">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          Submit
        </span>
        <a id="register" href="/register">Register</a>
      </div>
    </form>
  </div>

  <script src="assets/js/authentification.js"></script>
</body>

</html>