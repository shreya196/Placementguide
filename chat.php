<?php
session_start();
/*

	$conn = new mysqli('localhost','root','123987','Form');

	if($conn->connect_error){
		echo "Connection Failed".$conn->connect_error;
	}
	else{
		echo "Connection established...Database Selected";
	}

	$UserName = $_POST['username'];
	$Password = $_POST['PassWord'];

	$UserName = strip_tags($UserName);
	$Password = strip_tags($Password);

	$UserName = stripslashes($UserName);
	$Password = stripslashes($Password);

//	$UserName = mysqli_real_escape_string($UserName);
//	$Password = mysqli_real_escape_string($Password);

	$pass = md5($Password);

//	echo "$UserName $pass";

	$Var = mysqli_query($conn,"SELECT * FROM signup WHERE Email = '$UserName' AND Password = '$Password'") or die("Failed to log in");
	$row = mysqli_fetch_array($Var);


	if($row!=0){
		session_start();
		$_SESSION['userName'] = $UserName;
		echo $_SESSION['userName'];
//		header('Location:chat.php');
//		echo "hello You are succesfully logged in.";
	}



	else
		echo "failed to login";


//	if(isset($_SESSION['userName'])){
//		session_destroy();
//	}

	echo "$UserName $Password";

//	echo "$Var";
*/
?>

<?php
 //$name=$_POST['username'];    
 //echo $name;
 $i=0;
 $na = $_SESSION['name'];
// echo $_SESSION['uerName'];
/* if(isset($name))
  {
  	$na=$name;
  	//echo 'xxxx';
   } 
   else
   {
   //echo "zzzzzz";
   }      */
?>

<style>
form.fixed {
    
    bottom: 0;
    right: 0;
    width: 500px;

}
</style>

<script type="text/javascript">
	function fun()
	{

		var obj= new XMLHttpRequest();
		obj.open("POST","message.txt",true);
		obj.send();
		obj.onreadystatechange=function(){
			if(obj.readyState==4)
			{

			document.getElementById('div1').innerHTML=obj.responseText;
			}
	}
			}
		
	fun();
	setInterval("fun()",10000);
</script>

<div style="float:left;background-color:white;width:20%;height:100%" >
	<a href="project/nav.html">HOME</a>

	<form method="post" accept=""  class="fixed">
<textarea name='msg' style="width:50%;height:30%"></textarea> 
<br>
<input type="submit" onclick="fun()" value="send" name='sub'>
</form>

</div>

<div id='div1' style="background-color:lightgrey;float:left;width:80%;height:100%">
</div> 



<?php
if(isset($_POST['sub']))
{
	$mess=$_POST['msg'];
	echo $mess;

$fp = fopen("message.txt","a+");
fwrite($fp,"\n".$na.": ".$mess."<br>");
fclose($fp);


}

?>