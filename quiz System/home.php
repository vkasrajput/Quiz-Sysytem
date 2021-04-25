<?php
session_start();
// if(!isset($_session['username'])){
//      header("location:registration.php");
//  }
$con=mysqli_connect('localhost','root','root');
if($con){
    // echo "success";
    }
    mysqli_select_db($con, 'quizdb')
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="hom.css">
    
</head>
<body>
      <div class="container">
            <!-- <h2 text="center"> Welcome <?php echo $_SESSION['username']; ?>  </h2> -->
          <div class="card"> 
             <h3 text="center"> Welcome <?php echo $_SESSION['username']; ?>  , You havce to select only one out of 4 options </h3>
          </div><br>
         <div class="logout"><a href="logout.php">Logout</a></div>
          <p id="countdown">5:00</p>
            <form action="check.php" method="post">
             
               <?php
                   for($i=1; $i<6; $i++){
                   $q="select * from question where qid=$i";                  
                   $query=mysqli_query($con, $q );
                   
                    while($rows = mysqli_fetch_array($query)){
                ?>
                   
                  <div class="card">
                   
                      

                     <h4 class="qa">  <?php echo $rows['question'] ?> </h4> 
                     
                    

                         <?php

                              $q="select * from answer where ansid=$i";
                               $query=mysqli_query($con, $q );

                                while($rows = mysqli_fetch_array($query)){
                        ?>

                       <div class="a">
    
                          <input type="radio" name="QuizCheck[<?php echo $rows['ansid']; ?>]" value="<?php echo $rows['aid'];  ?>">
                          <?php echo $rows['answer']; ?>

                        </div>

   



                        <?php
                        }} }
    
                         ?>
                          <button type="submit" name="submit" value="submit" class="bbt">submit</button>
                     
                    </form>
    </div>
    </div>
    
    <script>
const startingMinutes=5;
        let time=startingMinutes * 60;
        const countdownel = document.getElementById('countdown');
        setInterval(updateCountdown, 1000);
        function updateCountdown()
        {
            const minutes= Math.floor(time / 60);
            let seconds=time%60;
            countdownel.innerHTML=`${minutes}:${seconds}`;
            time--;
        }

    </script>

</body>
</html>  