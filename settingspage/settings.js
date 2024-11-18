let showPass=document.querySelector('.show-pass');
let passInput=document.querySelector('.password-input');
showPass.addEventListener('click',()=>{
   if(passInput.type=="password"){
      passInput.type="text";
   }
   else{
      passInput.type="password";
   }
})