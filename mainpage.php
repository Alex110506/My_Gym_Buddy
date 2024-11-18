<?php 
   session_start();
   ob_start();
?>
<!DOCTYPE html>
<html>
   <head>
      <link href="mainpage.css" rel="stylesheet">
   </head>
   <body>
    
      <div class="backg">
         <div class="fund"></div>
      </div>
         <div class="main">
            <div class="sidebar">
               <div class="logo"><img src="../icons/logopic.png" id="logo"></div>
               <div class="options">
                  <button id="home"><img src="../icons/home.png"></button>
                  <a href="http://localhost/atestat/workoutpage/workoutpage.php"><button id="workout-plan"><img src="../icons/workout.png"></button></a>
                  <a href="http://localhost/atestat/dietpage/addmeals.php" id="diet-link"><button id="diet-plan"><img src="../icons/meals.png"></button></a>
                  <a href="http://localhost/atestat/settingspage/settings.php" id="diet-link"><button id="settings"><img src="../icons/settings.png"></button></a>
               </div>
            </div>
            <div class="home-page" id="home-page">
               <div class="interface">
                  <div class="header">
                     <div class="greetings">
                        <div class="welcome-small">Great day to train, buddy!</div>
                        <div class="welcome">
                           <span>Welcome back, </span>
                           <span>
                           <?php
                              echo $_SESSION["username"]."!";
                           ?></span>
                        </div>
                     </div>
                     <div class="user">
                     <div class="urprf">
                        <div class="dropdown">
                           <button class="dropbtn">My Profile</button>
                           <form class="dropdown-content" action="mainpage.php" method="POST">
                              <input type="submit" name="viewprof" value="View Profile">
                              <input type="submit" name="logout" value="Log Out">
                              
                              
                           </form>
                        </div>
                     </div>
                        <button class="profilepic-btn">
                           <img src="../icons/user.png" class="profilepic">
                        </button>
                        
                     </div>
                  </div>
                  <div class="activity">
                     <div class="upper">
                        <div class="quote-container">
                           <div class="quote">
                              <div class="quote-text">
                                 "Strength does not come from the physical capacity. It comes from an indomitable will."
                              </div>
                              <div class="generate">
                                 <button class="generate-btn">
                                    Motivate me!
                                 </button>
                              </div>
                           </div>
                           <div class="quote-image-container">
                              <img id="im3" src="../icons/quote3.png">
                           </div>
                        </div>
                        <div class="progress-bars">
                           <div class="intake-container">
                              <div class="cal-image-cnt">
                                 <img src="../icons/calories.png" class="caloimg">
                              </div>
                              <div class="intake-text">
                                 <div>Calories</div>
                                 <div class="togocals"></div>
                              </div>
                              <div class="intake-circle">
                                 <div class="outer">
                                    <div class="inner">
                                       <div id="calories-number"></div>
                                    </div>
                                 </div>
                                 <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="120px" height="120px" class="circlecal">
                                    <circle cx="55" cy="55" r="45" stroke-linecap="round" />
                                 </svg>
                                 
                              </div>
                           </div>
                           <div class="burned-container">
                              <div class="weightsc-cnt">
                                 <img class="weightsc" src="../icons/weighing-scale.png">
                              </div>
                              <div class="weight-text">
                                 <div>Weight</div>
                                 <div class="togokg">Weight</div>
                              </div>
                              <div class="weight-circle">
                                 <div class="outer">
                                    <div class="inner">
                                       <div id="weight-number"></div>
                                    </div>
                                 </div>
                                 <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="120px" height="120px" class="circlewei">
                                    <circle cx="55" cy="55" r="45" stroke-linecap="round" />
                                 </svg>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="names">
                        <div class="todact">Today's Activity</div>
                        <div class="progrec">Recent Progress</div>
                     </div>
                     <div class="wrk-container">
                        <div class="today-activity">
                           <div class="add-workout">
                              <div class="visualworkout">
                                 <button>
                                    <img src="../icons/workoutimg.png" id="work">
                                 </button>
                                 
                                 <div class="work-container">
                                    <p>Today I burned</p>
                                    <p id="burned-cals">
                                       
                                    </p>
                                    <p>out of</p>
                                    <p id="goal-burned-cals">
                                       500 kcal
                                    </p>
                                 </div>
                              </div>
                              <div class="exercises">
                                 <div class="weight-train">
                                    <img src="../icons/plate.png">
                                    <p>Weightlifting</p>
                                    <span id="nrsets"></span>
                                 </div>
                                 <div class="cardio">
                                    <img src="../icons/rope.png">
                                    <p>Cardio</p>
                                    <span id="nrmins"></span>
                                 </div>
                              </div>
                           </div>
                           <div class="add-meal">
                              <div class="visualmeal">
                                 <button>
                                    <img src="../icons/meal.png" id="meal">
                                 </button>
                                 
                                 <div class="consumed-container">
                                    <p>Today I consumed</p>
                                    <p class="consumed-cals">
                                       2000 kcal
                                    </p>
                                    <p>out of</p>
                                    <p class="goal-cals">
                                       2500 kcal
                                    </p>
                                 </div>
                              </div>
                              <div class="macros">
                                 <div class="pro">
                                    <span>Protein: </span>
                                    <span class="grams programs"></span>
                                    <div class="probar"></div>
                                 </div>
                                 <div class="carb">
                                    <span>Carbs: </span>
                                    <span class="grams carbgrams"></span>
                                    <div class="carbbar"></div>
                                 </div>
                                 <div class="fat">
                                    <span>Fats: </span>
                                    <span class="grams fatgrams"></span>
                                    <div class="fatbar"></div>
                                 </div>
                              </div>
                           </div>
                           <div class="add-weight">
                              <div class="add-weight-img">
                                 <img src="../icons/update-weight.png">
                              </div>
                              <div class="add-weight-text">
                                 Today I weigh
                              </div>
                              <div class="add-weightkg-text">
                              </div>
                              <button class="add-weight-btn">
                                 Update Bodyweight
                              </button>
                           </div>
                        </div>
                        <div class="recent-progress">
                           <div class="bars-days">
                              <div class="0" id="bar">
                                 <div class="cal0 cal"></div>
                                 <div class="wei0 wei"></div>
                              </div>
                              <span class="bar-text">Mon</span>
                           </div>
                           <div class="bars-days">
                              <div class="1" id="bar">
                                 <div class="cal1 cal"></div>
                                 <div class="wei1 wei"></div>
                              </div>
                              <span class="bar-text">Tue</span>
                           </div>
                           <div class="bars-days">
                              <div class="2" id="bar">
                                 <div class="cal2 cal"></div>
                                 <div class="wei2 wei"></div>
                              </div>
                              <span class="bar-text">Wed</span>
                           </div>
                           <div class="bars-days">
                              <div class="3" id="bar">
                                 <div class="cal3 cal"></div>
                                 <div class="wei3 wei"></div>
                              </div>
                              <span class="bar-text">Thu</span>
                           </div>
                           <div class="bars-days">
                              <div class="4" id="bar">
                                 <div class="cal4 cal"></div>
                                 <div class="wei4 wei"></div>
                              </div>
                              <span class="bar-text">Fri</span>
                           </div>
                           <div class="bars-days">
                              <div class="5" id="bar">
                                 <div class="cal5 cal"></div>
                                 <div class="wei5 wei"></div>
                              </div>
                              <span class="bar-text">Sat</span>
                           </div>
                           <div class="bars-days">
                              <div class="6" id="bar">
                                 <div class="cal6 cal"></div>
                                 <div class="wei6 wei"></div>
                              </div>
                              <span class="bar-text">Sun</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="chatbot">
                  <div class="header-chat">
                     <img src="../icons/bot.png">
                     <span id="askk"> Ask My Gym Buddy</span>
                  </div>
                  <div id="message-space">
                     
                  </div>
                  <div class="input-space">
                     <input type="text" id="user-input" placeholder="Ask a question!">
                     <button id="send-button" onclick="runPythonFunction()">
                        <img src="../icons/send.png">
                     </button>
                  </div>
               </div>
            </div>
            
         </div>
      <script>
         function runPythonFunction() {
            const number=document.getElementById('user-input').value;
            document.getElementById('message-space').innerHTML+=
               `
                  <div id="user-message">
                     ${number}
                  </div>
               `;
            document.getElementById('user-input').value='';
            fetch('http://localhost:5000/run-function', {
               method: 'POST',
               headers: {
                  'Content-Type': 'application/json'
               },
               body: JSON.stringify({number:number})
            })
            .then(response => response.json())
            .then(data => {
               document.getElementById('message-space').innerHTML+=
               `
                  <div id="message">
                     ${data.message}
                  </div>
               `
               console.log(data.message);
            })
            .catch(error => {
               console.error('Error:', error);
               document.getElementById('message').innerHTML="error";
            });
         }
      </script>
      <script src="quote.js"></script>
      
      <script type="module" src="add-weight.js"></script>
   </body>
</html>

<?php
   
   if($_SERVER["REQUEST_METHOD"]=="POST"){
      if(isset($_POST["logout"])){
         session_destroy() ;
         header("Location: ../loginpage/login.php");
      }
   }
   
?>