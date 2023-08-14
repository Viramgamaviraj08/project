 <?php
 session_start();
?> 



<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login page</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter&family=Nunito:wght@500&display=swap');

/* font-family: 'Inter', sans-serif;
font-family: 'Nunito', sans-serif; */
body{
     margin:0;
     padding:0;
     background: #111B28;
}
#login-form{
     position: absolute;
     top: 50%;
     left: 50%;
     width: 400px;
     padding: 40px;
     transform: translate(-50%, -50%);
     background: linear-gradient(#0B111A, #111B28);
     box-sizing: border-box;
     box-shadow: 0 15px 25px #0DC8F4;
     border-radius: 10px;
     color: white;
     letter-spacing: .2em ;
}
#login-head{
     text-align: center;
     font-family: 'Inter', sans-serif;
     color:#0DC8F4 ;
     text-shadow: 0 0 .28rem#0DC8F4;
}
#login-details{
     margin-top: 3rem;
     margin-left: 1rem;
     font-size: 1.5rem;    
}
label{
     font-family: 'Inter', sans-serif;   
}
#user input{
     background-color: transparent;
     border-color: transparent;
     font-size: 1.2rem;
     width: 100%;
     color: white;
     margin-top: 0.5rem;
     border-radius: 4px;
     padding: .3rem;
     transition: .5S;
     letter-spacing: .1em ;
    
}
#user input:hover{
     box-shadow: 0 0 2em 0 #0DC8F4; 
}

#pass{
     margin-top: 1rem;
}
#pass input{
     background-color: transparent;
     border-color: transparent;
     font-size: 1.2rem;
     width: 100%;
     color: white;
     margin-top: 0.5rem;
     border-radius: 4px;
     padding: .3rem;
     transition: .5S;
     letter-spacing: .1em ;
}
#pass input:hover{
     box-shadow: 0 0 2em 0 #0DC8F4;
}


#submit{
     
     margin-top: 20%;
     margin-bottom: 20%;
     margin-left: 3%;
     
}
#submit input{
     padding: .5rem;
     color: #0DC8F4;
     background-color: transparent;
     border: solid 2px #0DC8F4;
     font-family: 'Inter', sans-serif;
     font-size: 16px;
     font-weight: 400;
     letter-spacing: 3px ;
     border-radius: 0.25em;
     transition: .5s;
     text-shadow: 0 0 0.125em white , 0 0 0.25 currentColor ;
     text-shadow: 0 0 .2rem #0DC8F4;  
}
#submit input:hover{
     background: #0DC8F4;
     color: white;
     box-shadow: 1px 0  3.5em 0 #0DC8F4;
     text-shadow: 0 0 .2rem white;  
}

  </style>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
 <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css"> -->
</head> 

<body >
 
<div id="login-form">
          <div id="login-head">
          <div class="col-lg-12 login-key">
                <i class="fa fa-key" aria-hidden="true"></i>
                </div>
               <h1>Nilkanth Eletrical</h1>
          </div>
     <div id="login-details">
          <form action="" method="POST">
               
               <div id="user">
          <input type="text" name="email" placeholder="Email" required>
          </div>
          
          <div id="pass">
          <input type="password" name="password" placeholder="Password" required>
          <i class="uil uil-lock password"></i>
              <i class="uil uil-eye-slash pw_hide"></i>
          </div>

          <div id="submit" class="d-flex justify-content-center">
          <input type="submit" name="submit" value="Login">
               </div>
          </form>

     </div>
</div>



<?php
$servername = "localhost";
$username = "root";
$password  = "";
$dbname = "bill";

$conn = mysqli_connect($servername,$username,$password,$dbname);

//check connection 
if(!$conn)
{
   die("Connection failed : ".mysqli_connect_error());
}
//echo "|Connected|";
  if (isset($_POST['submit'])){

$email = $_POST['email'];
$password = $_POST['password'];


//get user input from login form
//
// Query to check if the email and password exist in the database.
$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($conn,$sql);
 
if(mysqli_num_rows($result)>0){
//    echo "Welcom Admin "."<br>".$Email;
    // $_SESSION['email']= $email;
    header("location:dashboard.php");
}else{
    echo '<script>alert("Your password is wrong!")</script>'.$email;
 // header("location:dashboard.php");
}
mysqli_close($conn);
  }
?>