let currentWeight=document.querySelector('.add-weightkg-text');
let updateWeightButton=document.querySelector('.add-weight-btn');
let updateWeightPopup=document.querySelector('.main');
let toGoWeight=document.querySelector('.togokg');
let toGoCals=document.querySelector('.togocals')
let caloriesOfToday=Number(JSON.parse(localStorage.getItem('caloriesOfToday')));
let proOfToday=Number(JSON.parse(localStorage.getItem('proOfToday')));
let carbOfToday=Number(JSON.parse(localStorage.getItem('carbOfToday')));
let fatOfToday=Number(JSON.parse(localStorage.getItem('fatOfToday')));
let caloriesBurnedTd=Number(JSON.parse(localStorage.getItem('caloriesBurnedTd')));
let setsTd=Number(JSON.parse(localStorage.getItem('setsTd')));
let minsTd=Number(JSON.parse(localStorage.getItem('minsTd')));
let burnedContainer=document.getElementById('burned-cals');
let setContainer=document.getElementById('nrsets');
let minContainer=document.getElementById('nrmins');
let calsIateTd=document.querySelector('.consumed-cals');
const GoalWeight=80;
const StartWeight=65;
updateWeightButton.addEventListener('click',()=>{
   updateWeightPopup.innerHTML+=`
            <div class="popup popupid">
               <div class="popup-interface">
                  <input type="number" placeholder="Enter Weight" class="input-popup">
                  <button class="popup-button">Update</button>
                  <button class="close-btn">x</button>
               </div>
               
            </div>`;
   let updateWeightButtonPop=document.querySelector('.popup-button');
   let inputPopup=document.querySelector('.input-popup');
   let closeBtn=document.querySelector('.close-btn');
   updateWeightButtonPop.addEventListener('click',()=>{
      const weightvalue=inputPopup.value;
      localStorage.setItem('currentWeight',weightvalue);
      location.reload();
   })
   closeBtn.addEventListener('click',()=>{
      location.reload();
   })
})

const weightCurrent=Number(localStorage.getItem('currentWeight'));

function setWeight(wgh){
   currentWeight.innerHTML=wgh+"kg";
   toGoWeight.innerHTML=`${(Math.round((GoalWeight-wgh)*10000))/10000} more kg to go!`
}
setWeight(weightCurrent);

function setCals(cal){
   toGoCals.innerHTML=`${Math.round((2500-cal)*10000)/10000} more calories to go!`
}

setCals(caloriesOfToday);


let numbercal=document.getElementById('calories-number');
let percentcal=document.querySelector('.circlecal');

function ShowPercentCal(perc){
   var style=getComputedStyle(percentcal);
   percentcal.style.strokeDashoffset=280-280*(perc/100);
   numbercal.innerHTML=Math.round(Number(perc))+"%";
}
var percc=100*caloriesOfToday/2500;

ShowPercentCal(percc);

let probar=document.querySelector('.probar');
let fatbar=document.querySelector('.fatbar');
let carbbar=document.querySelector('.carbbar');
let programs=document.querySelector('.programs');
let fatgrams=document.querySelector('.fatgrams');
let carbgrams=document.querySelector('.carbgrams');
function ShowNumberMacro(){
   let percpro=100*proOfToday/200;
   let percfat=100*fatOfToday/100;
   let perccarb=100*carbOfToday/200;
   if(percpro>100)
      probar.style.backgroundColor="red"
   else
      probar.style.width=`${percpro}%`;
   if(percfat>100)
      fatbar.style.backgroundColor="red";
   else
      fatbar.style.width=`${percfat}%`;
   if(perccarb>100)
      carbbar.style.backgroundColor="red";
   else
      carbbar.style.width=`${perccarb}%`;
   programs.innerHTML=`${Math.round(proOfToday*100)/100}g / 200g`;
   fatgrams.innerHTML=`${Math.round(fatOfToday*100)/100}g / 100g`;
   carbgrams.innerHTML=`${Math.round(carbOfToday*100)/100}g / 200g`;
   calsIateTd.innerHTML=`${caloriesOfToday}`;
}

ShowNumberMacro();

function ShowNumberBurned(){
   burnedContainer.innerHTML=`${caloriesBurnedTd} kcal`;
   setContainer.innerHTML=`${setsTd} sets`;
   minContainer.innerHTML=`${minsTd} minutes`;
}

ShowNumberBurned();


let numberwei=document.getElementById('weight-number');
let percentwei=document.querySelector('.circlewei');

function ShowPercentWei(perc){
   var style=getComputedStyle(percentcal);
   if(perc>100)
      percentwei.style.strokeDashoffset=0;
   else
      percentwei.style.strokeDashoffset=280-280*(perc/100);
   numberwei.innerHTML=Math.round(Number(perc))+"%";
}
const weightDifference=Math.abs(GoalWeight-StartWeight);
const weightDifferenceCurrent=Math.abs(StartWeight-weightCurrent);
const percentOfGoalWeight=weightDifferenceCurrent*100/weightDifference;
ShowPercentWei(percentOfGoalWeight);


let RecentProgressDataWeek=JSON.parse(localStorage.getItem('recentProgressDataWeek'));
if(localStorage.getItem('recentProgressDataWeek')===null){
   RecentProgressDataWeek=[{
      calperc:0,
      weiperc:0
   },{
      calperc:0,
      weiperc:0
   },{
      calperc:0,
      weiperc:0
   },{
      calperc:0,
      weiperc:0
   },{
      calperc:0,
      weiperc:0
   },{
      calperc:0,
      weiperc:0
   },{
      calperc:0,
      weiperc:0
   }];
   localStorage.setItem('recentProgressDataWeek',JSON.stringify(RecentProgressDataWeek));
}

const date= new Date();
var today=date.getDay();
if(today===0)
   today=6;
else today--;
updateData();
var savedDay=Number(JSON.parse(localStorage.getItem('savedDay')));


function updateData(){
   
   const date= new Date();
   var today=date.getDay()+1;
   if(savedDay===0)
      savedDay=today;
   else{
      if(savedDay!==today){
         savedDay=today;
       /*  caloriesOfToday=0;
         fatOfToday=0;
         carbOfToday=0;
         proOfToday=0;
         localStorage.setItem('caloriesOfToday',JSON.stringify(caloriesOfToday));
         localStorage.setItem('proOfToday',JSON.stringify(proOfToday));
         localStorage.setItem('fatOfToday',JSON.stringify(fatOfToday));
         localStorage.setItem('carbOfToday',JSON.stringify(carbOfToday)); 
         localStorage.removeItem('todayFood'); */
         localStorage.setItem('savedDay',JSON.stringify(savedDay));
      }
   } 
}

function UpdateProgressWeek(){
   
   for(let i=today+1 ; i<7 ; i++){
      console.log(i);
      RecentProgressDataWeek[Number(i)].calperc=0;
      RecentProgressDataWeek[Number(i)].weiperc=0;
   }
   RecentProgressDataWeek[today].calperc=100*caloriesOfToday/2500;
   RecentProgressDataWeek[today].weiperc=percentOfGoalWeight;
   
   RecentProgressDataWeek.forEach((element,index)=>{
      const calbar=document.querySelector(`.cal${index}`);
      const weibar=document.querySelector(`.wei${index}`);
      if(element.calperc>100){
         calbar.style.backgroundColor="red";
         calbar.style.height=`100%`;
      }
      else
         calbar.style.height=`${element.calperc}%`;
      weibar.style.height=`${element.weiperc}%`;
   })
   localStorage.setItem('recentProgressDataWeek',JSON.stringify(RecentProgressDataWeek));
}

//console.log(today);
if(today===0){
   RecentProgressDataWeek=[{
      calperc:0,
      weiperc:0
   },{
      calperc:0,
      weiperc:0
   },{
      calperc:0,
      weiperc:0
   },{
      calperc:0,
      weiperc:0
   },{
      calperc:0,
      weiperc:0
   },{
      calperc:0,
      weiperc:0
   },{
      calperc:0,
      weiperc:0
   }];
   localStorage.setItem('recentProgressDataWeek',JSON.stringify(RecentProgressDataWeek));
}
const s=localStorage.getItem('recentProgressDataWeek');
RecentProgressDataWeek=JSON.parse(s);

UpdateProgressWeek();
//updateData();








