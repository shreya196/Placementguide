<?php
session_start();

  if($_SESSION['name']=='')
  {
   header("Location: studentlog.php");
  }

$servername = "localhost";
$username = "root";
$password = "shreya";
$dbname = "project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
        }
//$sname = test_data($_POST["sname"]);    
//$pwd = test_data($_POST["pwd"]);


$sql = "SELECT * FROM experience" ;
$result=$conn->query($sql);
if($result->num_rows > 0)
{
   while($row=$result->fetch_assoc())
   {
       echo "<h2>".$row["name"]."</h2>"."<br>";
       echo "<h3>"."Subject:  ".$row["subject"]."</h3>"."<br>";
       $link=$row["filename"];
       echo"<a href='uploads/$link'>Read experience</a>";

   }
}
else
{
  echo "0 results";
}

$conn->close();
?>
