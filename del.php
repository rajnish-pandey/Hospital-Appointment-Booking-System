<?php
    if(array_key_exists("submit",$_POST)){//submit button is hit. Now ensure connection
        $link=mysqli_connect("sdb-e.hosting.stackcp.net","lifelinedb-3138336592","dar8buj799","lifelinedb-3138336592");
        
        if(mysqli_connect_error()){
            die("DB connection error");
        }
        
        //Password verification
        $query="select password from `users` where email = '".$_POST['email']."'";
        $result= mysqli_query($link, $query);
        $msg="";
        foreach($result as $row){
            $msg=$row["password"];//Retreiving password from USERS table
            //echo $msg;
        }
        //echo $msg;
        
        if($msg==$_POST['password']){
            echo "Verification successful!";
            
        if($_POST['del']=='2')
        {$query2="delete from `users` where `email`='".$_POST['email']."'";}
        
            
            
            
        
        //$query="insert into `appointment` (`date`,`name`,`age`,`address`,`number`,`symptom`,`doctor`) values ('".        $_POST['date']."','".$_POST['name']."','".$_POST['age']."','".$_POST['address']."','".$_POST['number']."','".$_POST['symptom']."','".$_POST['doctor']."')";
        //echo $query;
        if(mysqli_query($link,$query2)){
            if($_POST['del']=='2'){
                echo "<br>Account deleted successfully!<br>";
                $msg="Your account was deleted. Create new account again to reuse the facilities again";
            }/*else{
                echo "<br>Subscription was cancelled successfully!<br>";
                $msg="Your subscription was cancelled. Sign up(Subscribe) again for updates.";
            }*/
    $emailto=$_POST['email'];
    $sub="Lifeline Account updates";
    $body=$msg;
    $headers="From: lifeline@stackcp.com";

    if(mail($emailto,$sub,$body,$headers))echo "";
    else echo "";
                    }else{
                        echo "Operation Failed!";
                    }
        }else{
            echo "Email - Password verification failed";
        }
        
        //echo "$result['password']";
        
        
        //echo $_POST['name'];
        
        //echo $_POST['doctors'];
        //echo "Entered block";
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
    <title>Delete Account</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="#" class="sign-in-form" method="POST">
            <h2 class="title">Service Update</h2>
            <p>Read information carefully before deleting</p>
            
            <h3>Choose required service:</h3>
            
            <select class="input-field" id="dropdown" name="del" id="del" required/>
               
                <option value="2">Delete my account</option>
            </select>
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
              <br><hr>
              <div class="btn transparent" id="home">
                                  <a style="text-decoration:none" href="https://lifeline-com.stackstaging.com/">Home</a>
                                </div>
            </div>
            
            
          </form>
          
        </div>
      </div>

      <div class="panels-container">
      
        <div class="panel left-panel">
          
          
           
          
            <img src="main2.jpg" class="image" alt="" />


       

        </div>
        
      </div>
    </div>

    <script src="app.js"></script>
  </body>
</html>
