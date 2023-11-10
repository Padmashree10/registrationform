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

// Retrieve the form data
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

// Hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Check if the email already exists
$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "Email already exists. Please choose a different email.";
} else {
  // Insert user data into the "users" table
  $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashedPassword')";

  if ($conn->query($sql) === TRUE) {
    echo "Registration successful!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>