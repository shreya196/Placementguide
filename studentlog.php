<!DOCTYPE html>
<html lang="en">
<head>
  <title>STUDENT LOGIN</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/project/bootstrap/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  body{
    background-color:lightgrey;
  }
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row">
    


    
    <div class="col-sm-6">
         <h1>SIGN UP</h1>
     <form action="studentdb.php" method="post">
     <div class="form-group">
      <label for="username">UserName:</label>
      <input type="text" class="form-control" name="username" placeholder="Enter username">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" name="pwd" placeholder="Enter password">
    </div>

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" name="email" placeholder="Enter email">
    </div>
    
    
    <button type="submit" class="btn btn-default">Submit</button>
  </form>

   
  </div>

   

   
    <div class="col-sm-6">

     <h1>LOGIN</h1>
    <form action="<?php ($_SERVER["PHP_SELF"]);?>" method="post">
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" class="form-control" name="sname" placeholder="Enter username">
    </div>
    <div class="form-group">..
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" name="pwd" placeholder="Enter password">
    </div>
   
    <button type="submit" class="btn btn-default">Submit</button>
  </form>

    </div>
  







  </div>

</div>
    
</body>
</html>
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "shreya";
$dbname = "project";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
}
$sname = test_data($_POST["sname"]);    
$pwd = test_data($_POST["pwd"]);

function test_data($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$sql = "SELECT password FROM student WHERE username= '$sname' and password='$pwd'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($result);
if ($row[0] === $pwd && $row[0]!=''){
    //Match - Case sensitive
   echo 1;
    // Set session variables
   // $_SESSION["myname"] = $myname;
    //$_SESSION["mypswd"] = $mypswd;
      $_SESSION['name']=$sname;

   header("Location: student.php");

} else if($row[0]!=' ' && $row[0]!=$pwd)
{

   echo "<p align=center>Invalid Email/Password</p> "; 
 }
 else
 {
   echo "<p align=center>   </p> "; 
 }

mysqli_close($conn);
?>






