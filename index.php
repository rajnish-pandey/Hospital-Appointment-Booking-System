
<?php

    if(array_key_exists("submit",$_POST)){
        
        $link=mysqli_connect("sdb-e.hosting.stackcp.net","lifelinedb-3138336592","dar8buj799","lifelinedb-3138336592");
        
        if(mysqli_connect_error()){
            die("DB connection error");
        }
        //$error="";
        if(!$_POST['email']){
            $error.="Email address is required";
        }
        if(!$_POST['password']){
            $error.="Password is required";
        }
        
        if($error!=""){
            $error=$error;//optional
        }else{//error is NOT present;
            //$query="select uid from `users` where email = '".mysqli_real_escape_string($_POST['email'])."'Limit 1";
            //echo $_POST['signup'];
            if($_POST['signUp']=='1'){
                //echo $_POST['email'];
                $query="select UId from `users` where email = '".$_POST['email']."'";
                $result= mysqli_query($link, $query);
                
                if(mysqli_num_rows($result)>0){
                    //email already exists
                    $error="This email is already registered";
                    echo $error;
                }else{
                    $query="insert into `users` (`email`, `password`) values ('".$_POST['email']."','".$_POST['password']."')";
                    //echo $query;
                    if(mysqli_query($link,$query)){
                        echo "Sign up Succeeded";
                    }else{
                        echo "sign up Failed!";
                    }
                }
            }else{
                 //echo "Logging in";
                //$query="select UId from `users` where email='".$_POST['email']."'";
                $query="select password from `users` where email='".$_POST['email']."'";
                $result=mysqli_query($link, $query);
                
                //echo $query;
                
                $row=mysqli_fetch_array($result);
                ///echo $row['password'];
                
                if($row['password']==$_POST['password']){
                    //header("Location: http://lifeline-com.stackstaging.com/bookapt.php");
                    echo "Login Succeeded!<br>Redirecting you to Appointment Booking Portal...";
                    //sleep(10);
                    //Redirecting using Echo
                    echo '<script type="text/javascript">
                        window.location="https://lifeline-com.stackstaging.com/bookapt.php"</script>';
                    //ob_end_clean();
                    //http_redirect("Location: http://www.geeksforgeeks.org");
                    
                    //header("Location: http://www.geeksforgeeks.org");
                    //exit;
                }else{
                        echo "Passwords didnt match";
                        //echo $_POST['password'];
                        //echo $row['password'];
                    }
              
               
            }
        }
    }


?>


<!doctype html>

<html lang="en">
  <head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Allura&family=Kaushan+Script&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Alex+Brush&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="style.css" />
    <title>Lifeline</title>
  </head>
  <body>

    <div class="container">




      <div class="forms-container">
        <div id="brand2" class="brand">
          <h1><span style="color:#fc0065; font-weight: 600" >L</span>ifeline.</h1>
        </div>
        <div class="signin-signup">




          <form method="POST" class="sign-in-form" >
              <input type="hidden" name="signUp" value="0">


            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="email" placeholder="Email" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" />
            </div>
            <input type="submit" name="submit" value="Login" class="btn solid" />
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



                              <div class="content">
                                <br>

                                <h3>Don't have an account?</h3>

                                <div class="btn transparent" id="sign-up-btn" margin="auto">
                                  Sign up
                                </div>
                            
                            
                            
                                <div class="btn transparent" id="adminlogin">
                                  <a style="text-decoration:none" href="https://lifeline-com.stackstaging.com/hospitallogin.php">Admin Login</a>
                                </div>
                                
                                
                                <div class="btn transparent" id="deleteacc">
                                  <a style="text-decoration:none" href="https://lifeline-com.stackstaging.com/del.php">Delete Account</a>
                                </div>
                              </div>




          </form>




          <form method="POST" class="sign-up-form">
                <input type="hidden" name="signUp" value="1">



            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="uname" placeholder="Username" />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" placeholder="Email" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" />
            </div>
            <input type="submit" name="submit" class="btn" value="Sign up" />
            <p class="social-text">Or Sign up with social platforms</p>
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


            <div class="content">
              <br>
              <h3>Already have an account?</h3>

              <div class="btn transparent" id="sign-in-btn">

                Sign in
              </div>
            </div>




          </form>






        </div>


      </div>

      <div class="panels-container">




        <div class="panel left-panel">







        <img src="main.jpg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div id="brand1" class="brand1" display="none" >




            <img id="imagerightid" src="main2.jpg" class="imageright" alt="" />
          </div>







        </div>
      </div>
    </div>

    <script src="app.js"></script>
  </body>
</html>
