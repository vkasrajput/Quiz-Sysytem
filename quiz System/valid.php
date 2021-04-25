<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <style>
        div{
            position:relative;
            text-align:center;
            top:250px;
            font-size:35px;
            color:white;
            background-color:red;
        }
    </style>
</head>
<body>
<div>

<?php

session_start();

$con=mysqli_connect('localhost','root','root');
if($con){
   // echo "succes";
}
else{
    //echo "fail";
}
mysqli_select_db($con, 'quizdb');
$name = $_POST['user1'];
$pass=  $_POST['password1'];

$q= "select * from signin where name = '$name' and password= '$pass'";

$result=mysqli_query($con,$q);
$num= mysqli_num_rows($result);
//echo "hello";
//echo "$num";

if($num==1){
      $_SESSION['username']= $name;
      header('location:start.html');
    }
    else{
      
      
       $message="invalid";
       //echo '<script>alert("'.$message.'");</script>';
        //echo '<script>header(" refresh:5;location:index.html");</script>';
        echo "Please Log With The Valid Usernmae & Password";
        echo "<script>setTimeout(\"location.href = 'http://localhost/quiz%20app2/index.html';\",1500);</script>";
}

?>

</div>
</body>
</html>