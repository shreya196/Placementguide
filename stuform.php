<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
form{
  text-align: center;
}
 
  body{
    background-color:lightgrey;
  }
  </style>

</head>
<body>  


<h2 align="center">UPLOAD YOUR DETAILS</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" >
 
  <br><br>
  E-mail: <input type="text" name="email" >

  <br><br>
  year: <input type="text" name="syear">
  
  <br><br>
  Branch: <input type="text" name="branch" >
  
  <br><br>
  Rollno: <input type="text" name="rollno" >
   <br><br>
  CGPI: <input type="number" step="0.01" name="cgpi" >
 
  <br><br>
  Contactno: <input type="number" name="contactno" >
 
  <br><br>

  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>


</body>
</html>


<?php


$servername = "localhost";
$username = "root";
$password = "shreya";
$dbname = "project";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO details (name, email, syear, branch, rollno, cgpi, contactno, gender) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssdis",$name, $email, $syear, $branch, $rollno , $cgpi, $contactno, $gender);
$name=$_POST[name];
$email=$_POST[email];
$syear=$_POST[syear];
$branch=$_POST[branch];
$rollno=$_POST[rollno];
$cgpi=$_POST[cgpi];
$contactno=$_POST[contactno];
$gender=$_POST[gender];
if($name!='' && $email!='' && $syear!='' && $branch!='' && $rollno!='' && $cgpi!=''&& $contactno!='' && $gender!=''){
$stmt->execute();

echo "REGISTRATION SUCCESSFUL";
}

$stmt->close();

$conn->close();


?>


