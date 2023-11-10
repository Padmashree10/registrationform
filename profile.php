<?php
// Connect to the MySQL database
$servername = "localhost";
$username = "root";
$password = " ";
$dbname = "registration_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve user information based on the logged-in user
$email = "user@example.com"; // Replace with the logged-in user's email

$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  echo "Name: " . $row['name'] . "<br>";
  echo "Email: " . $row['email'] . "<br>";
} else {
  echo "User not found.";
}

$conn->close();
?>