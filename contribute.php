<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="form.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="/var/www/html/project/bootstrap/js/jquery-1.11.1.min.js"></script>

  
  <style>
  form
  {
    text-align: center;
  }
  </style>
</head>
<body>
<h2 align="center">Share Experience</h2>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
         <div class="form-group">
      <label for="name">Name:</label>
     <input type="text" name="name" >
     </div>
        <br><br>
             <div class="form-group">
      <label for="subject">Subject:</label>
        <input type="text" name="subject" style="text-align:center;" >
        </div>

        <br><br>
             <div class="form-group">
      <label for="filename">Filename:</label>
        <input type="text" name="filename" >
        </div>
        <br><br>
              <div class="form-group">
          <input type="submit" name="submit" value="Submit">  
          </div>
          <br><br>
        </form>

  <form id="d"action="example.php" method="post" enctype="multipart/form-data">
     <div class="form-group">
      <label for="name">Select file to upload:</label>
  
      <input type="file" name="fileToUpload" id="fileToUpload">
      <button class="btn1" input type="submit" value="Upload File" name="submit"></button>
      </div>
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

$stmt = $conn->prepare("INSERT INTO experience (name, subject, filename) VALUES (?, ?, ?)");
$stmt->bind_param("sss",$name, $subject, $filename);
$name=$_POST[name];
$subject=$_POST[subject];
$filename=$_POST[filename];

if($name!='' && $subject!='' && $filename!=''){
$stmt->execute();


}

$stmt->close();

$conn->close();


?>








