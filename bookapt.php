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
            
            
            
        
        $query="insert into `appointment` (`date`,`name`,`age`,`address`,`number`,`symptom`,`doctor`) values ('".        $_POST['date']."','".$_POST['name']."','".$_POST['age']."','".$_POST['address']."','".$_POST['number']."','".$_POST['symptom']."','".$_POST['doctor']."')";
        //echo $query;
        if(mysqli_query($link,$query)){
                        echo "<br>Appointment Succeeded!  <br>";
                        $msg=" Your appointment has been successfully booked with ".$_POST['doctor']." on  ".$_POST['date'].".";
                        echo $msg."<hr>";
                        
                        
                        
                        
                         $emailto=$_POST['email'];
    $sub="Lifeline Appointment";
    $body="Dear ".$_POST['name'].",".$msg." Your symptoms are: ".$_POST['symptom'].". It is expected to be solved quickly!";
    $headers="From: lifeline@stackcp.com";

    if(mail($emailto,$sub,$body,$headers))echo "";
    else echo "";
                    }else{
                        echo "Appointment Failed!";
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
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Patient Appointment Booking</title>
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <style media="screen">
        form {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 5rem;
            transition: all 0.2s 0.7s;
            overflow: hidden;
            grid-column: 1 / 2;
            grid-row: 1 / 2;
        }

        body {
            border-radius:5%;
            opacity: 0.85;
            margin: 30px;
            text-align: center;
            font-family: 'Architects Daughter', cursive;
          
        }
         html{background-image: linear-gradient(-90deg,#f1659d, #FF96AD);
            transition: 1.9s ease-in-out;
            
            z-index: 0;}

        input {
            font-family: 'Architects Daughter', cursive;

        }

        .brand {
            font-size: 3rem;
        }

        .input-field {
            max-width: 380px;
            width: 100%;
            background-color: #f0f0f0;
            margin: 10px 0;
            height: 55px;
            border-radius: 55px;
            display: grid;
            grid-template-columns: 15% 85%;
            padding: 0 0.4rem;
            position: relative;
        }

        .input-field i {
            text-align: center;
            line-height: 55px;
            color: #acacac;
            transition: 0.5s;
            font-size: 1.1rem;
        }

        .input-field input {
            background: none;
            outline: none;
            border: none;
            line-height: 1;
            font-weight: 600;
            font-size: 1.1rem;
            color: #E93B81;
        }

        .input-field input::placeholder {
            color: #aaa;
            font-weight: 500;
        }

        .btn {
            width: 150px;
            background-color: #E93B81;
            border: none;
            outline: none;
            height: 49px;
            border-radius: 49px;
            color: #fff;
            text-transform: uppercase;
            font-weight: 600;
            margin: 10px 0;
            cursor: pointer;
            transition: 0.5s;
        }
        

        .btn:hover {
            background-color: #FF96AD;
        }
        .btn-n{
            padding-top:2px;
            font-size:15px;
        }

        .go_back {
            margin: 50px;
            display: block;
            text-align: right;
            margin: 20px;
        }

        @media (max-width: 570px) {
            form {
                padding: 0 1.5rem;
            }
        }
    </style>
</head>

<body>
    <br>
    
    <div class="go_back">
        <div  style="float: left;" type="button" name="button" class="btn btn-primary btn-lg">
            <a style="color: white; text-decoration: none" href="https://lifeline-com.stackstaging.com">
                Go back
            </a>
        </div>
    </div>
    
    <div class="go_back">
        <div  style="float: right;" type="button" name="button" class="btn btn-primary btn-lg btn-n">
            <a style="color: white; text-decoration: none" href="https://tim-minister-74463.herokuapp.com/">
                Sign up to<br> Newsletter
            </a>
        </div>
    </div>
    
    

    <div>
        <h1 class="brand"><span style="color:#f80466; font-weight: 1000">L</span>ifeline</h1>
    </div>

    <h3>Appointment Booking</h3>

    <div id="form">
        <form id="booking_form" method="post">
            <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="email" name="email" placeholder="Email" />
            </div>

            <div class="input-field">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Password" />
            </div>

            <hr>

            <h3>Enter patient details:</h3>

            <div class="input-field">
                <i class="fas fa-calendar-week"></i>
                <input type="text" name="date" placeholder="Date" />
            </div>

            <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" name="name" placeholder="Name" />
            </div>

            <div class="input-field">
                <i class="fas fa-child"></i>
                <input type="text" name="age" placeholder="Age" />
            </div>

            <h3 style="margin-left: 30px;">Choose Gender:</h3>
            <select id="dropdown" class="input-field" name="gender" id="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>

            <div class="input-field">
                <i class="fas fa-address-card"></i>
                <input type="text" name="address" placeholder="Address" />
            </div>

            <div class="input-field">
                <i class="fas fa-phone-alt"></i>
                <input type="number" name="number" placeholder="Phone Number" />
            </div>

            <div class="input-field">
                <i class="fas fa-procedures"></i>
                <input type="text" name="symptom" placeholder="Symptoms/Issue" />
            </div>

            <h3 style="margin-left: 30px;">Choose Doctor:</h3>
            <select class="input-field" id="dropdown" name="doctor" id="doctors">
                <option value="Dr. Rohit(Physician)">Dr. Rohit(Physician)</option>
                <option value="Dr. SP Mehara(Dentist)">Dr. SP Mehara(Dentist)</option>
                <option value="Dr. Krsihna(Surgeon)">Dr. Krsihna(Surgeon)</option>
                <option value="Dr. Mahesh(Pediatrician)">Dr. Mahesh(Pediatrician)</option>
                <option value="Dr. Jethalal(Pediatrician)">Dr. Jethalal(Pediatrician)</option>
                <option value="Dr. Haati(Pediatrician)">Dr. Haati(Pediatrician)</option>
            </select>
            
            

            <button id="submit" type="submit" name="submit" class="btn btn-primary btn-lg">Submit</button>
        </form>
        
    </div>
    <br>
</body>

</html>


