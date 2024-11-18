<!DOCTYPE html>
<html>
   <head>
      <link href="workoutpage.css" rel="stylesheet">
   </head>
   <body>
      <div class="main">
         <div class="sidebar">
            <div class="logo"><img src="../icons/logopic.png" id="logo"></div>
            <div class="options">
               
               <a href="http://localhost/atestat/mainpage/mainpage.php" id="diet-link">
               <button id="home"><img src="../icons/home.png"></button>
               </a>
            
               <button id="workout-plan"><img src="../icons/workout.png"></button>

               <a href="http://localhost/atestat/dietpage/addmeals.php" id="diet-link"><button id="diet-plan"><img src="../icons/meals.png"></button></a>

               <a href="http://localhost/atestat/settingspage/settings.php" id="diet-link"><button id="settings"><img src="../icons/settings.png"></button></a>

               
            </div>
         </div>
         <div class="work-page">
            <div class="user-inputs-container">
               <div class="exercise-name-container">
                  <div class="exercise-name">Exercise Name</div>
               </div>
               <div class="exercise-quantity-constainer">
                  <input class="number-of" type="number" placeholder="Duration">
                  <div class="calories-burned">
                     <div class="add-to-exercises">
                        <p id="cals"></p>
                        <p id="unit"></p>
                     </div>
                     <button class="add-btn">+</button>
                  </div>
               </div>
               <div class="exercise-image"></div>
               <div class="ex-info1">
                  <div class="ex-info">
                     Exercise info   
                  </div>
                  <div class="extype"></div>
               </div>
            </div>
            <div class="workout-list-today">
               <div class="calorie-meter">
                  <div class="calmet-name">
                     <span class="calmet-tit">Calories burned: </span>
                     <span class="calmet-nr">400/500 kcal</span>
                  </div>
                  <div class="calmet-bar">
                     <div class="calmet-bar-prog">
                        <div class="did-it"></div>
                     </div>
                  </div>
               </div>
               <div class="title">Today's logged exercises</div>
               <div class="today-list">
                  
               </div>
            </div>
            <div class="exercise-container">
               <div class="str-selector">
                  <div id="btn1"></div>
                  <button id="arms">Arms</button>
                  <button id="chest">Chest</button>
                  <button id="back">Back</button>
                  <button id="legs">Legs</button>
                  <button id="abs">Abs</button>
               </div>
               <div class="car-selector">
                  <div id="btn2"></div>
                  <button id="fast">Fast-paced</button>
                  <button id="slow">Slow-paced</button>
               </div>
               <div class="header">
                  <div id="btn"></div>
                  <button id="str-btn">
                     <img src="../icons/workoutimg.png">
                     <span>Strenght</span>
                  </button>
                  <button id="flex-btn">
                     <img src="../icons/stretch-athlete-exercise-standing-icon-600nw-273904820.png">
                     <span>Flexibility</span>
                  </button>
                  <button id="car-btn">
                     <img src="../icons/simple-abstract-minimalistic-logo-sports-600nw-1157506159.png">
                     <span>Cardio</span>
                  </button>
               </div>
               <div class="exercise-space">
                  
               </div>
            </div>
         </div>
      </div>
      <script type="module" src="workoutpage.js"></script>
   </body>
</html>
