<?php
session_start();
/* if session ('gold') isn't set, then set that to 0.
if messages don't exist, make the first message: 'welcome to ninja gold, choose adventure'
//logic behind visiting different events on the page: "home", "cave", "casino", "farm"

make a session delete button
*/
// starting coditions
if (!isset($_SESSION['gold']))
{
  $_SESSION['gold'] = 0;
}
if (!isset($_SESSION['messages']))
{
  /* session variable that holds an array! :)*/
  $_SESSION['messages'] = ['Welcome to ninja gold, choose your adventure!'];
}

if (isset($_POST['enter_building'])){ // key value of $_POST or get comes from the name attribute of the form, not the value!
    switch ($_POST['enter_building']){ // this key is set, and its value will be one of" 'home', 'cave', 'casino', 'farm'
      case 'home':
        $gold = rand(5,10);
         // rand just generates a random int between 5,10
      break;
      case 'cave':
        $gold = rand(10,20);
      break;
      case 'farm':
        $gold = rand(5,15);
      break;
      case 'casino':
        $gold = rand(-50,50);
      break;
    }
    //$gold is local! can't access that on our index.php.
      $_SESSION['gold'] += $gold;
      if ($gold >= 0)
      {
      $_SESSION['messages'][] = "<p class = 'green'>You entered the ".$_POST['enter_building']." and you earned: ".$gold." gold pieces</p>";
      }
      else
      {
          $_SESSION['messages'][] = "<p class = 'red'>You entered the ".$_POST['enter_building']." and you lost: ".$gold." gold pieces</p>";
      }


}


if (isset($_POST['delete'])){ // post will come from a form with a method post!
  // $_GET, and have the form on index php have a method of 'get' (or no method)
  session_destroy(); //clears our session variables
}
header("Location: index.php");
exit();
?>
