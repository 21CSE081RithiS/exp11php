<!DOCTYPE HTML>  
<html>
<head>
</head>
<body>  

<?php
// define variables and set to empty values
$name = $email = $subscription_plan = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $subscription_plan = test_input($_POST["sp"]);

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2></h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name">
  <br><br>
  email: <input type="text" name="email">
  <br><br>
  subscription plan <input type="text" name="sp">
<input type="submit" name="submit" value="Submit">  

 
</form>

<?php
echo "<h1>Your details:</h1 >";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $subscription_plan;

?>

<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "users";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
 {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO DETAILS (USER_NAME, email,subscription_plan)
VALUES ('$name' , '$email', '$sp');

if ($conn->query($sql) === TRUE) {
  echo data created successfully;
} else {
  echo Error:  . $sql . <br> . $conn_error;
}

$connclose();

?>
</body>
</html>