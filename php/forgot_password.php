<?php
$servername = "localhost";
$username = "root";
$password = "root123.,";
$dbname = "pokedex";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// prepare and bind
$stmt = $conn->prepare("UPDATE user_pkmn SET password='?'");
$stmt->bind_param("s", $password);

// set parameters and execute
$password = $_POST["new_pass"];
$stmt->execute();

echo "New records created successfully";

$stmt->close();
$conn->close();
?>