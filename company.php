<?php
//<!DOCTYPE html>
//html lang="en">

  session_start();
  if($_SESSION['name']=='')
  {
   header("Location: companylog.php");
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
    background-color: lightgrey;
  }
  </style>

  
</head>
<body>


<div style="margin-left:50px;margin-top:100px">
<div class="row">
   <div class="col-sm-6">
 <a href="search.php"><h3>SEARCH STUDENTS/SEND EMAIL</h3></a>

   <br><br>
  



   </div>

   <div class="col-sm-6">
      <a href="companyquiz.php"><h3>CONDUCT QUIZ</h3></a>
      <br><br>
     
 



   </div>


   </div>
   </div>
   </body>
   </html>
