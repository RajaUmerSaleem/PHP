
/*<?php
$cookie_name = "user";
$cookie_value = "jande yr";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
?>
<html>
<body>

<?php
$cookie_name = "user"; // Ensure the variable is defined
if(!isset($_COOKIE[$cookie_name])) {
  echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
  echo "Cookie '" . $cookie_name . "' is set!<br>";
  echo "Value is: " . $_COOKIE[$cookie_name];
}
?>

</body>
</html>*/



<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<body>
<?php
// Set session variables
$_SESSION["favcolor"] = "green";
$_SESSION["favanimal"] = "cat";
$_SESSION["username"] = "Jande yr";
echo "Session variables are set.<br>";

// Check if session variables are set
if(isset($_SESSION["favcolor"]) && isset($_SESSION["favanimal"]) && isset($_SESSION["username"])) {
    echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";
    echo "Favorite animal is " . $_SESSION["favanimal"] . ".<br>";
    echo "Username is " . $_SESSION["username"] . ".";
} else {
    echo "Session variables are not set.";
}
?>
</body>
</html>
<?php
$jsonobj = '{"Peter":35,"Ben":37,"Joe":43}';

var_dump(json_decode($jsonobj));
?>