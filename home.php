<?php
$servername = "localhost";
$user = "root";
$password = "123";
$dbname="db";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $user, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = "INSERT INTO user ( email, username ) VALUES ( :email,:username )";
	$stmt = $conn->prepare( $sql );
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $username = $_POST["username"];
    $email = $_POST["email"];
    $stmt->execute();
    header("Location: greeting.php");
    
	
  
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>