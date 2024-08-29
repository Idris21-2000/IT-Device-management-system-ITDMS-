<!DOCTYPE html>
<?php
require_once "includes/models/main_model.php";
require_once "includes/connection.inc.php";
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200..800&family=Inconsolata:wght@200..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/reg-form.css">
  <title>Register user</title>
</head>
<?php
$departments = department_data($pdo);
$roles = roles_data($pdo);
?>

<body>
  <div class="navbar">
    <ul>
      <li><a href="index.php">Dashboard</a></li>
      <li><a href="pages-home.html">Home</a></li>
    </ul>
  </div>
  <br><br>
  <div class="reg-form">
    <form action="includes/registration.inc.php" method="POST">
      <h1>User Registration</h1>
      <input type="text" name="Fname" placeholder="First name" />
      <input type="text" name="Lname" placeholder="Last name" />
      <br /><br />
      <input type="tel" name="phone" placeholder="Phone number" />
      <input type="email" name="email" placeholder="Email (elius@gmail.com)" />
      <br /><br />
      <input type="password" name="password" placeholder="Password" />
      <select class="form-select" aria-label="Disabled select example" row="1" name="roleId">
        <option selected>Select user type</option>
        <?php foreach ($roles as $role): ?>
          <option value="<?php echo $role['roleId']; ?>"><?php echo $role['roleName']; ?></option>
        <?php endforeach; ?>
      </select>
      <br /><br />
      <select class="form-select" aria-label="Disabled select example" row="1" name="dptId">
        <option selected>Select department</option>
        <?php foreach ($departments as $department): ?>
          <option value="<?php echo $department['dptId']; ?>"><?php echo $department['dptName']; ?></option>
        <?php endforeach; ?>
      </select><br><br>
      <button type="submit">Register</button>
      <br />
    </form>
  </div>
</body>

</html>