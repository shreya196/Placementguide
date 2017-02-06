


     <form action=""<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"" method="post">
     <div class="form-group">
      <label for="Question">Question:</label>
      <input type="text" class="form-control" name="question" placeholder="Enter question">
    </div>
    <div class="form-group">
      <label for="option1">Option1:</label>
      <input type="text" class="form-control" name="Option1" placeholder="Option1">
    </div>

    <div class="form-group">
      <label for="option2">Option2:</label>
      <input type="text" class="form-control" name="Option2" placeholder="Option2">
    </div>
        <div class="form-group">
      <label for="option3">Option3:</label>
      <input type="text" class="form-control" name="Option3" placeholder="Option3">
    </div>
    <div class="form-group">
      <label for="option4">Option4:</label>
      <input type="text" class="form-control" name="Option4" placeholder="Option4">
    </div>
        <div class="form-group">
      <label for="answer">Answer:</label>
      <input type="text" class="form-control" name="Answer" placeholder="answer">
    </div>


    
    
    <button type="submit" name="next" value="next"class="btn btn-default">Next</button>
    <button type="submit" name="end" value="end"class="btn btn-default">End</button>
   
  </form>

<?php
if(isset($_POST['end'])!='')
  header("Location:company.php")
?>


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
$ques = test_data($_POST["question"]);    
$op1 = test_data($_POST["Option1"]);
$op2 = test_data($_POST["Option2"]);
$op3 = test_data($_POST["Option3"]);
$op4 = test_data($_POST["Option4"]);
$ans= test_data($_POST["Answer"]);



function test_data($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if($ques!='' && $op1!='' && $op2!='' && $op3!=''&& $op4!='' && $ans!=''){
$sql = "INSERT INTO quiz (question, op1, op2, op3, op4, ans)
VALUES (' $ques', '$op1', '$op2', '$op3', '$op4', '$ans')";}

if ($conn->query($sql) === TRUE ) {
    //echo "New record created successfully";
  // $_SESSION['name']=$name;
    //echo    $_SESSION['name'];

   //header("Location: student.php");
}

$conn->close();
?>

