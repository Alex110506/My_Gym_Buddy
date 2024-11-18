<?php 
   session_start();
   include("../loginpage/database.php");
   ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="settings.css" rel="stylesheet">
</head>
<body>
   <div class="main">
      <div class="sidebar">
         <div class="logo"><img src="../icons/logopic.png" id="logo"></div>
         <div class="options">
            
            <a href="http://localhost/atestat/mainpage/mainpage.php" id="diet-link">
            <button id="home"><img src="../icons/home.png"></button>
            </a>
         
            <a href="http://localhost/atestat/workoutpage/workoutpage.php"><button id="workout-plan"><img src="../icons/workout.png"></button></a>

            <a href="http://localhost/atestat/dietpage/addmeals.php" id="diet-link"><button id="diet-plan"><img src="../icons/meals.png"></button></a>

            <button id="settings"><img src="../icons/settings.png"></button>
         </div>
      </div>
      <div class="interface">
         <div class="left">
            <div class="sidebar-settings">
               <div class="sidebar-opts">
                  <div class="sidebar-title">This is&nbsp <span>Your Profile</span></div>
                  <div class="opt-button-container">
                     <button id="security-button button-sett">
                        <img src="..\icons\user.png">
                        <span>Edit Profile</span>
                     </button>
                  </div>
                  <div class="opt-button-container">
                     <button id="userdata-button button-sett">
                        <img src="..\icons\goals.png">
                        <span>Goals</span>
                     </button>
                  </div>
               </div>
            </div>
            <div class="user-info">
               <div class="prf-image-container">
                  <div class="image-part">
                     <img src="img/<?php echo $_SESSION['image']; ?>" id = "image">
                  </div>
                  <div class="image-opts">
                     <form action="settings.php" method="post">
                        <input type="file" name="fileImg" id = "fileImg" accept=".jpg, .jpeg, .png">
                        <input type="submit" name="submitImg">
                     </form>
                     
                     <button class="delete-btn">Delete Account</button>
                  </div>
               </div>
               <div class="user-credentials">
                  <div class="info-tit">Your Information</div>
                  <div class="actual-info">
                     <div class="data-container">
                        <span>Username</span>
                        <input type="text" readonly value=<?php echo $_SESSION["username"]?>>
                     </div>
                     <div class="data-container">
                        <span>Real Name</span>
                        <input type="text" value="mena">
                     </div>
                     <div class="data-container">
                        <span>E-mail</span>
                        <input type="text" readonly value=<?php echo $_SESSION["email"]?>>
                     </div>
                     <div class="data-container data-pass">
                        <span>Password</span>
                        <input type="password" class="password-input" readonly value=<?php echo $_SESSION["password"]?>>
                        <button class="show-pass">
                           <img src="..\icons\password.png">
                        </button>
                     </div>
                     <div class="buttons-cont">
                        <div class="small-opt">
                           <button>Change Password</button>
                           <button>Change Email</button>
                        </div>
                        <button class="save-changes">Save Changes</button>
                     </div>
                     
                  </div>
                  
               </div>
            </div>
         </div>
         <div class="right">
            
         </div>
         
      </div>
      
   </div>
   <script src="settings.js"></script>
   <script>
      document.getElementById("fileImg").onchange = function(){
        document.getElementById("image").src = URL.createObjectURL(fileImg.files[0]);
      }
   </script>
</body>
</html>

<?php
if (isset($_POST["submitImg"]) && isset($_FILES["fileImg"]["name"])) {
    $id = $_SESSION["id"] ?? 0; // Ensure the session ID is available
    $src = $_FILES["fileImg"]["tmp_name"];
    $imageName = uniqid() . "_" . basename($_FILES["fileImg"]["name"]);
    $target = "img/" . $imageName;

    // Validate file type
    $fileType = mime_content_type($src);
    if (in_array($fileType, ["image/jpeg", "image/png"])) {
        if (move_uploaded_file($src, $target)) {
            $query = "UPDATE usercredentials SET image = ? WHERE id = ?";
            $stmt = $conn->prepare($query);
            if ($stmt) {
                $stmt->bind_param("si", $imageName, $id);
                if ($stmt->execute()) {
                    $_SESSION["image"] = $imageName; // Update session image
                    header("Location: settings.php");
                    exit();
                } else {
                    echo "Database update failed: " . $stmt->error;
                }
                $stmt->close();
            } else {
                echo "Failed to prepare statement: " . $conn->error;
            }
        } else {
            echo "Error uploading the image.";
        }
    } else {
        echo "Only JPG and PNG files are allowed.";
    }
}
?>