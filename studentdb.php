 <?php
$servername = "localhost";
$username = "root";
$password = "shreya";
$dbname = "project";
$name=$_POST["username"];
$pwd=$_POST["pwd"];
$email=$_POST["email"];

session_start();
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "INSERT INTO student (username, password, email)
VALUES (' $name', '$pwd', '$email')";

if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
   $_SESSION['name']=$name;
    //echo    $_SESSION['name'];

   header("Location: student.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?> 