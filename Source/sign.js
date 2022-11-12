	 const form=document.getElementById('form');
	 const password=document.getElementById('password');
	 const cpassword=document.getElementById('cpassword');
	
	 form.addEventListener('submit',e => {
	 e.preventDefault();
	 checkinputs();
	 });
function checkinputs(){
const passwordValue=password.value.trim();
const cpasswordValue=cpassword.value.trim();

 
	 if(passwordValue===''){
	 setErrorFor(password,'Password required');
	 }else{
	 setSuccessFor(password);
	 }
	 if(cpasswordValue===''){
	 setErrorFor(cpassword,'Password required');
	 }else if(passwordValue !== cpasswordValue){
	 setErrorFor(cpassword,'Passwords does not match');
	 }else{
		document.getElementById("php_form").submit();
		document.forms["php_form"].submit();
	 setSuccessFor(cpassword);
	 }
}
function setErrorFor(input,message){
const formArea=input.parentElement;
const small=formArea.querySelector('small');
formArea.className='form-area error';
small.innerText=message;
}
function setSuccessFor(input){
const formArea=input.parentElement;
formArea.className='form-area success';
}
function isEmail(email) {
return 
/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email);}

