<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="chek.css">
    <style>
   .log{
    float: right;
    margin-right: 50px;
    font-size: 19px;
    color:green;
    background-color: red;
    text-decoration: none;
    
    padding: 15px 25px;
    border-radius: 5px;
       
   }
    </style>
</head>
<body>


<?php
session_start();
// if(!isset($_session['username'])){
//      header("location:registration.php");
//  }
$con=mysqli_connect('localhost','root','root');
if($con){
    // echo "success";
    }
    mysqli_select_db($con, 'quizdb'); 

    if(isset($_POST['submit'] )){
        
        if(!empty($_POST['QuizCheck'])){
$count= count($_POST['QuizCheck']);
  echo "<h2>out of 5 you have selected ".$count." option</h2>";

  $result=0;
  $i=1;
  $selected=$_POST['QuizCheck'];
  //print_r($selected);

  $q="select * from question";
  $query=mysqli_query($con, $q);
  while($rows=mysqli_fetch_array($query)){
      //print_r($rows['ansid']);
      $checked=$rows['ansid']==$selected[$i];
      if($checked){
          $result++;
      }
      $i++;
  }
    echo "<br><h4>  your total score is  ".$result. "</h4>";
        }
    }
$name=$_SESSION['username'];
$finalresult="insert into user(username, totalques, answerscore) values('$name','5','$result')";
$queryresult=mysqli_query($con,$finalresult);
// echo $finalresult;
?>

<div class="log"><a href="logout.php">Logout</a></div>

</body>
</html>