<!DOCTYPE html>
<html>
<head>
	<title>
search option for companies
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	</title>
</head>
<body>
<?php
$email=$choice="";
$cgpiErr=$cgpi="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	if(empty($_POST["cgpi"]))
	{
		$cgpiErr="cgpi is required";
    }
	else
	{
        $cgpi=test_input($_POST["cgpi"]);
    }
	$choice=test_input($_POST["choice"]);
	$header=test_input($_POST["header"]);
	$email=test_input($_POST["textemail"]);
}
function test_input($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
    
	<form class="form-horizontal" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<div class="form-group">
            <label for="year" class="col-sm-2 control-label">
                Please choose the year:
            </label>
            <div class="col-sm-10">
                <select class="form-control" name="choice">
                    <option <?php if(isset($choice) && $choice=="third ") echo "selected";?> value="third">Third Year</option><br> 
                    <option <?php if(isset($choice) && $choice=="final") echo "selected";?> value="final">Final Year</option><br>
                    <option <?php if(isset($choice) && $choice=="Both") echo "selected";?> value="Both">Both</option><br>
                </select>
            </div>
        </div>
        <br><br>
        <div class="form-group">
            <label for="cgpi" class="col-sm-2 control-label">
                Please enter the lower bound cgpi:
            </label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="cgpi" value="<?php echo $cgpi?>">
                 <label for="error"><?php echo $cgpiErr;?></label>
            </div>
           
        </div>
        <br><br>
        <div class="form-group">
            <label for="email"  class="col-sm-2 control-label"> Please enter your email id:</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="header" value="<?php echo $header?>">
            </div>
        </div>
        <br><br>
        <div class="form-group">
            <label for="message" class="col-sm-2 control-label"> Please type a message if you want to send e-mails to students</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="textemail" rows="10" cols="100"><?php echo $email;?></textarea>
            </div>
        </div>
        <br><br>
		<input type="submit" name="showFirst" value="Show First">
		<input type="submit" name="email" value="Send email">
	</form>
	<br>
	<?php
	
        $conn=mysqli_connect("localhost", "root", "shreya", "project");
            if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        if($choice=="Both")
        {
        $sql2="SELECT name, cgpi, email FROM details
                WHERE cgpi>='$cgpi'";
        
        }
        else{
        $sql2="SELECT name, cgpi, email FROM details
                WHERE syear='$choice' && cgpi>='$cgpi'";
        }
        $result=$conn->query($sql2);
        $check=0;
        
        if(isset($_POST['email']))
        {
            if($result->num_rows>0)
            {
                echo "The email was sent to:"."<br>";
                while($row=$result->fetch_assoc())
                {
                    
                    $email=wordwrap($email,70);
                    if(mail($row['email'],"My Subject",$email,$header))
                    {
                        echo $row['email'];
                        echo "<br>";
                        $check=1;
                    }
                }
                if($check==0)
                    echo "no one because of low internet connectivity";
            }
        }
   ?>

   <?php
    if(isset($_POST['showFirst']))
            {
                if($result->num_rows > 0)
                {
                    echo
                    "<table border=\"2\" >
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>cgpi</th>
                                <th>emailid</th>
                            </tr>
                        </thead>
                    <tbody>";
                    while($row=$result->fetch_assoc())
                    {
                        echo 
                        "<tr>
                            <td>{$row['name']}</td>
                            <td>{$row['cgpi']}</td>
                            <td>{$row['email']}</td>
                        </tr>\n";

                    }
                }
                else
                {   
                    echo "no results";
                }
            }
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
