
<?php
   session_start();
   include("database.php");
   ob_start();
?>
<!DOCTYPE html>
<html>
   <head>
      <style>
         body{
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background-color: rgb(20,25,55);
         }
         .main-body{
            width: 100%;
            height: 100%;
            background-image: linear-gradient(135deg, rgba(0, 0, 0,1), rgba(16, 28, 95, 0.788), rgba(0, 0, 0,1)),url(../backlogin.png);
            background-position: center;
            background-size:cover;
            position: absolute;
         }
         .logo-container{
            margin-left: auto;
            margin-right: auto;
            position: relative;
            max-width: 450px;
         }
         .form-box{
            max-width: 600px;
            height: 570px;
            margin-left:auto;
            margin-right: auto;
            position: relative;
            margin-top: 20px;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0));
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 20px;
            border:1px solid rgba(255, 255, 255, 0.18);
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
            padding: 5px;
            border-radius: 30px;
            overflow: hidden;
         }
         .button-box{
            width: 320px;
            height: 50px;
            margin-top:50px;
            margin-left:auto;
            margin-right: auto;
            position: relative;
            box-shadow: 0 0 20px 9px rgba(18, 6, 37, 0.3);
            border-radius: 30px;
         }
         .toggle-btn{
            padding: 20px 57px;
            cursor: pointer;
            background:transparent;
            border:0;
            outline: none;
            position: relative;
            color: rgb(178, 145, 255);
         }
         #btn{
            top:0;
            left:0;
            position: absolute;
            width: 160px;
            height: 100%;
            background-image: linear-gradient(135deg, rgb(72, 74, 179), rgba(19, 8, 94, 0.753));
            border-radius: 100px;
            transition: 0.5s;
         }
         .input-group{
            top: 180px;
            position: absolute;
            width: 380px;
            transition: .5s;
         }
         .input-field{
            width: 100%;
            padding: 10px 0;
            margin: 5px 0;
            border-left:0;
            border-right: 0;
            font-size: 20px;
            border-top:0;
            border-bottom: 1px solid #a9a3c4;
            outline: none;
            background: transparent;
            color: rgb(220, 207, 255);
         }
         .submit-btn{
            width: 85%;
            padding: 20px 30px;
            cursor: pointer;
            display: block;
            margin: auto;
            margin-top:20px;
            background-image: linear-gradient(135deg, rgb(104, 72, 179), rgb(20, 8, 94));
            border:0;
            outline: none;
            border-radius: 30px;
            color: rgb(202, 195, 255);
            font-size:17px
         }
         .submit-btn:active{
            color: white;
         }
         .check-box{
            margin:30px 10px 30px 0px;
            
         }
         .check-text{
            margin:30px 10px 30px 0px;
            color: rgb(163, 157, 207);
         }
         span{
            color: #777;
            bottom:68px;
            position: absolute;
         }
         #login{
            left:120px;
         }
         #register{
            left:720px
         }
         .check{
            display: grid;
            grid-template-columns: 30px 1fr;
         }
         .showpass{
            display: inline-block;
            color: rgb(169,163,196);
         }
         .button-box1{
            display: grid;
            grid-template-columns: 1fr 1fr;
         }
         @media (max-width: 1200px){
            .logo-container{
               max-width: 120%;
               position: relative;
               margin-left: 40%;
               translate: -40% 0;
            }
            .logo-container img{
               width: 120%;
            }
            .form-box{
               height: 620px;
            }
            .input-group{
               width: 500px;
               margin-left: -60px;
            }
            .input-field{
               font-size: 3em;
            }
            .check-box{
               width: 30px;
               height: 30px;
            }
            .check-text{
               font-size: 2.4em;
               margin-left: 20px;
            }
            .submit-btn{
               font-size: 3.2em;
               border-radius: 100px;
            }
            .toggle-btn{
               font-size: 2em;
               padding: 10px 0;
               text-align: center;
            }
         }

      </style>
   </head>
   <body>
      <div class="main-body">
         <div class="logo-container">
            <img src="../icons/logo.png">
         </div>
         <div class="form-box">
            <div class="button-box">
               <div id="btn"></div>
               <div class="button-box1">
                  <button type="button" class="toggle-btn" onclick="loginn()">
                     Log In
                  </button>
                  <button type="button" class="toggle-btn" onclick="registerr()">
                     Register
                  </button>
               </div>
               
            </div>
            <form id="login" class="input-group" action="login.php" method="post">
               <div class="credentials">
                  <input type="text" class="input-field" name="usernamelog" placeholder="Username" required>
                  <input type="password" name="passwordlog" class="input-field" placeholder="Password" required>
                  
                  <div class="check">
                     <input type="checkbox" class="check-box">
                     <div class="check-text">Remember Me</div>
                  </div>
               </div>
               <button type="submit" class="submit-btn" name="login">Log In</button>
            </form>
            <form id="register" class="input-group" action="login.php" method="post">
               <div class="credentials">
                  <input type="text" class="input-field" name="username" placeholder="Create Username" required>
                  <input type="email" name="Email"  class="input-field" placeholder="E-mail" required>
                  <input type="password" name="password"  class="input-field" placeholder="Password" id="passkey2" required>
               </div>
               
               <button type="submit" class="submit-btn" name="register">Register</button>
            </form>
            <div class="possible-errors">
               <?php
                  if($_SERVER["REQUEST_METHOD"]=="POST"){
                     if(isset($_POST["register"])){
                        $username=$_POST["username"];
                        $password=$_POST["password"];
                        $hash=password_hash($password,PASSWORD_DEFAULT);
                        $email=$_POST["Email"];
                        if(empty($username) || empty($password) || empty($email)){
                           echo "<p style='color:rgba(255, 255, 255, 0.712);
                                    text-align:center; top:20px;'>Please fill in all credentials!</p>";
                        }
                        $sql="INSERT INTO usercredentials (user,password,email)
                              VALUES ('$username','$hash','$email')";
                        try{
                           mysqli_query($conn,$sql);
                           echo "<p style='color:rgba(255, 255, 255, 0.712);
                                    text-align:center; top:20px;'>You are now registered! Please Log in!</p>";
                        }
                        catch(mysqli_sql_exception){
                           echo "<p style='color:rgba(255, 255, 255, 0.712);
                                    text-align:center; top:20px;'>User credentials already taken!</p>";
                        }
                     }
                     if(isset($_POST["login"])){
                        $username=$_POST["usernamelog"];
                        $password=$_POST["passwordlog"];
                        $hash=password_hash($password,PASSWORD_DEFAULT);
                        if(empty($username) || empty($password)){
                           echo "<p style='color:rgba(255, 255, 255, 0.712);
                                    text-align:center; top:20px;'>Please fill in all credentials!</p>";
                        }
                        $sql="SELECT * FROM usercredentials WHERE
                              user='$username';";
                        
                        try{
                           $result=mysqli_query($conn,$sql);
                           if(mysqli_num_rows($result)> 0){
                              $row=mysqli_fetch_array($result);
                              
                              if(password_verify($password,$row["password"])){
                                 
                                 $_SESSION["username"]=$username;
                                 $_SESSION["password"]=$password;
                                 $_SESSION["email"]=$row["email"];
                                 $_SESSION["image"]=$row["image"];
                                 $_SESSION["id"]=$row["id"];
                                 echo $_SESSION["username"];
                                 header("Location:../mainpage/mainpage.php");
                              }
                              else{
                                 echo "<p style='color:rgba(255, 255, 255, 0.712);
                                    text-align:center; top:20px;'>Incorrect password</p>";
                              }
                           }
                           else{
                              echo "<p style='color:rgba(255, 255, 255, 0.712);
                                    text-align:center; top:20px;'>User not found!</p>";
                           }
                           
                        }
                        catch(mysqli_sql_exception){
                           echo "<p style='color:rgba(255, 255, 255, 0.712);
                                    text-align:center; top:20px;'>User not found!</p>";
                        }
                     }
                  }
                  mysqli_close($conn); 
               ?>
            </div>
         </div>
      </div>
      <script src="login.js">
      </script>
   </body>
</html>

