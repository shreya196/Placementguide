<html>
<body>

<?php
session_start();

  if($_SESSION['name']=='')
  {
   header("Location: companylog.php");
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


$sql = "SELECT * FROM quiz" ;
$result=$conn->query($sql);

if($result->num_rows > 0)
{
  $i=0;

   while($row=$result->fetch_assoc())
   {
       echo "Question".$row["question"]."<br>";
       echo "   1".$row["op1"]."<br>";
       echo "   2".$row["op2"]."<br>";
       echo "   3".$row["op3"]."<br>";
       echo "   4".$row["op4"]."<br>";
       $ans=$_POST["arr"];
        if($ans==$row[ans])
            $i++;
  echo"
  <form  action=\"\">
<br>
<br>
A.
<input type=\"radio\" name=\"arr\" value=\"A\"> 
B.
<input type=\"radio\" name=\"arr\" value=\"B\"> 
C.
<input type=\"radio\" name=\"arr\" value=\"C\"> 
D.
<input type=\"radio\" name=\"arr\" value=\"D\">
<br>
  <input type=\"submit\" value=\"submit\">
</form>

";

  }
  echo "<br>";
  echo "Your score is";
  echo $i;

 }
else
{
  echo "0 results";
}

$conn->close();
?>
</body>
</html>
