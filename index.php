<?php
session_start();
if (!isset($_SESSION['gold']) || !isset($_SESSION['messages']))
  {
    header("Location:process.php");
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Ninja Gold - no style</title>
  <style>
  .red{
    color:red;
  }
  .green{
    color:green;
  }
  </style>
</head>
<body>
  <h1>Welcome to Ninja Gold</h1>
  <p> You currently have: <?= $_SESSION['gold'] ?> </p>
  <form action = 'process.php' method = 'post'>
    <input type = 'hidden' name ='enter_building' value = 'home'>
    <input type = 'submit' value = 'Go Home'>
  </form>
  <form action = 'process.php' method = 'post'>
    <input type = 'hidden' name ='enter_building' value = 'farm'>
    <input type = 'submit' value = 'Farm'>
  </form>
  <form action = 'process.php' method = 'post'>
    <input type = 'hidden' name ='enter_building' value = 'cave'>
    <input type = 'submit' value = 'Enter Cave'>
  </form>
  <form action = 'process.php' method = 'post'>
    <input type = 'hidden' name ='enter_building' value = 'casino'>
    <input type = 'submit' value = 'Gamble'>
  </form>
  <!-- lots of PHP here -->
  <?= $_SESSION['messages'][0] ?>
  <?php
  for ($i = count($_SESSION['messages'])-1; $i >= 1; $i --)
  {
    echo $_SESSION['messages'][$i];
  }
  ?>

  <form action = 'process.php' method = 'post'>
    <input type = 'hidden' name ='delete' value = 'delete'>
    <input type = 'submit' value = 'Restart Game'>
  </form>

</body>
</html>
