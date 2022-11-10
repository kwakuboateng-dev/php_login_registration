<?php require_once("./classes/register.class.php") ?>

<?php

if (isset($_POST['submit'])) {
  $user = new RegisterUser($_POST['username'], $_POST['password']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PHP application</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>

<body>
  <section class="section">
    <div class="container">

      <h1 class="title is-1 is-spaced">Registration</h1>
      <h1 class="subtitle is-5">All fields are required</h1>


      <!-- email field-->
      <div class="field">
        <label class="label">Email</label>
        <input class="input " type="email" placeholder="Enter email" required>
      </div>

      <!-- password field-->
      <div class="field">
        <label class="label">Password</label>
        <input class="input " type="password" name="password" placeholder="Enter password" required="true">
      </div>


      <button class="button is-link" type="submit">Submit</button>

      <p class="sucess"><?php echo @$user->success ?></p>
      <p class="error"><?php echo @$user->error ?></p>


    </div>
  </section>
</body>

</html>