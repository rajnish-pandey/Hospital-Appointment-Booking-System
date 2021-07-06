<?php
    if(array_key_exists("submit",$_POST)){//submit button is hit. Now ensure connection
        $link=mysqli_connect("sdb-e.hosting.stackcp.net","lifelinedb-3138336592","dar8buj799","lifelinedb-3138336592");
        
        if(mysqli_connect_error()){
            die("DB connection error");
        }
        //$query="insert into `appointment` (`date`,`name`,`age`,`address`,`number`,`symptom`,`doctor`) values ('".        $_POST['date']."','".$_POST['name']."','".$_POST['age']."','".$_POST['address']."','".$_POST['number']."','".$_POST['symptom']."','".$_POST['doctor']."')";
        if($_POST["email"]=="hospital@gmail.com"  && $_POST["password"]=="abc"){
            $query="select * from `appointment`";
            $result= mysqli_query($link, $query);
            $msg="Displaying appointment details for various doctors: <br><hr>";
            foreach($result as $row)
            {
                $msg=$msg."<br>Appointment Id: ".$row["id"]."       Date of appointment:".$row["date"]."         Name: ".$row["name"]."  Age: ".$row["age"]."<br>Address: ".$row["address"]."      Contact: ".$row["number"]."<br><br>PROBLEM DETAILS:   Symptoms:".$row["symptom"]."<br>Appointment booked with ".$row["doctor"]."<br><hr>";
                //echo $row["id"];
                //echo $row["name"];
            }
        
            
        }else{
            $msg="Wrong Username/Password entered!";
        }
        echo $msg;
        //exit;
        //echo $result;
        /*if(mysqli_query($link,$query)){
                        echo "Appointment Succeeded  <br>";
                        $msg="Your appointment has been successfully booked with ".$_POST['doctor']." on  ".$_POST['date'];
                        echo $msg;
                    }else{
                        echo "Appointment Failed!";
                    }*/
        //echo $_POST['name'];
        
        //echo $_POST['doctors'];
        //echo "Entered block";
    }
    
    if(array_key_exists("submit2",$_POST)){//Submit2 is hit
        $link=mysqli_connect("sdb-e.hosting.stackcp.net","lifelinedb-3138336592","dar8buj799","lifelinedb-3138336592");
        
        if(mysqli_connect_error()){
            die("DB connection error");
        }
        if($_POST["email"]=="hospital@gmail.com"  && $_POST["password"]=="abc"){
            $query="select * from `appointment` where id=".$_POST['delid'];
            $result= mysqli_query($link, $query);
            if($result){$todel="";
                /*foreach($result as $row)
                {
                    if($row["id"]==$_POST["delid"])
                        $todel=$row["id"];
                }*/
                $query2="delete from `appointment` where id=".$_POST["delid"];
                //echo $query2;
                if(mysqli_query($link, $query2)){echo "delete succeeded";}else{echo "delete failed";}
            }else{
                echo "Deletion Failed";
            }
            
        }else{echo "Wrong email-password";}
        
        
        //echo "Second submit hit";
    }
    
    //echo "Welcome to php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="style.css" />
    <title>Admin Login</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="#" class="sign-in-form" method="POST">
            <h2 class="title">Hospital login portal</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input id="email" name="email" type="email" placeholder="Email" required />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" required />
            </div>
            <button id="submit" name="submit" type="submit" class="btn solid" >Submit</button>
            <p class="social-text">Or Sign in with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
              
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="text" name="delid" placeholder="Enter Appointment ID to delete appointment"/>
            </div>
            <button id="submit2" name="submit2" type="submit" class="btn transparent" >Submit</button>
            
            
            <div class="btn transparent" id="home">
                                  <a style="text-decoration:none" href="https://lifeline-com.stackstaging.com/">Home</a>
                                </div>
          </form>
          
          
        </div>
        
      </div>

      <div class="panels-container">
      
        <div class="panel left-panel">
          
          
           
          
            <img src="main.jpg" class="image" alt="" />


       

        </div>
        
      </div>
    </div>

    <script src="app.js"></script>
  </body>
</html>




