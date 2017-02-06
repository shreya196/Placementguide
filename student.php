<?php
//<!DOCTYPE html>
//html lang="en">

  session_start();
  if($_SESSION['name']=='')
  {
   header("Location: studentlog.php");
  }

   echo "<br>"."Welcome  ";
   echo   $_SESSION['name'];
   //echo ;

  //<h2> $_SESSION['name']</h2>;
 
  ?>

<head>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
   <style>
  body{
    background-color:lightgrey;
  }
  </style>

  
</head>
<body>


<div style="margin-left:50px;margin-top:100px">
<div class="row">
   <div class="col-sm-6">
 
   <a href="stuform.php"><h3>UPLOAD YOUR DETAILS</h3></a>
   <br><br>
   <a href="chat.php"><h3>CHAT ENGINE</h3></a>
       <br><br>
         <a href="open.htm"><h3>INTERNSHIP OPPORTUNITIES</h3></a>



   </div>

   <div class="col-sm-6">
      <a href="readinterview.php"><h3>READ INTERVIEW EXPERIENCES</h3></a>
      <br><br>
     
      <a href="contribute.php"><h3>SHARE INTERVIEW EXPERIENCES</h3></a>
          <br><br>

          <a href="quiz.php"><h3>COMPANIES</h3></a>



   </div>


   </div>
   </div>
   </body>
   </html>
