<?php
$success = 0;
$user = 0;
$invalid = 0;

include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];

  $sql = "SELECT * FROM `registration` WHERE username='$username'";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    $num = mysqli_num_rows($result);
    if ($num > 0) {
      $user = 1;
    } else {
      if ($password === $confirm_password) {
        $sql = "INSERT INTO `registration` (`username`, `password`) VALUES ('$username', '$password')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
          $success = 1;
          header('location:login.php');
        }
      } else {
        $invalid = 1;
      }
    }
  }
}


?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Signup Page</title>

</head>

<body>

  <?php
  if ($user) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>sorry!</strong> User already exits.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }
  ?>

  <?php
  if ($invalid) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>sorry!</strong> Password did not match.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }
  ?>

  <?php

  if ($success) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> You are successfully signed up.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }
  ?>


  <h1 class="text-center"> Signup Page</h1>
  <div class="container mt-5">
    <form action="signup.php" method="post">
      <div class="mb-3">
        <label for="username" class="form-label">Username: </label>
        <input type="text" name="username" class="form-control" placeholder="Enter you Username">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" placeholder='Enter your Password'>
      </div>

      <div class="mb-3">
        <label for="confirm_password" class="form-label">Confirm Password</label>
        <input type="password" name="confirm_password" class="form-control" placeholder='Confirm Password'>
      </div>

      <button type="submit" class="btn btn-primary w-100">Sign up</button>

    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</body>

</html>