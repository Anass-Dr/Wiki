<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="assets/css/login.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
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
  <!-- Bootstrap Toast : -->
  <div class="toast-container position-fixed top-0 end-0 p-3">
    <div id="info-toast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <strong class="me-auto">Info</strong>
        <small>Just Now</small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body"></div>
    </div>
  </div>

  <script src="assets/js/authentification.js"></script>
</body>

</html>