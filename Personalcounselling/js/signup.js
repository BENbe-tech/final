 const inputs = document.querySelectorAll(".input");

function validateForm() {


var password = document.getElementById("password").value;
var cpassword = document.getElementById("cpassword").value;

	 if(password == null || password == "" ){
 	alert("pasword must be filled");
		return false;
 }


 if(password.length < 6){
	alert("atleast 6 characters required");
	return false;
}


	if(cpassword == null || cpassword == "" ){
		alert("confirm pasword must be filled");
		return false;
	}


	if ( password != cpassword) {
        alert("The password isn't a match");
		return false;
		}
		else{
			return true;
		}


	}


function addcl(){
	let parent = this.parentNode.parentNode;
	parent.classList.add("focus");
}

function remcl(){
	let parent = this.parentNode.parentNode;
	if(this.value == ""){
		parent.classList.remove("focus");
	}
}


inputs.forEach(input => {
	input.addEventListener("focus", addcl);
	input.addEventListener("blur", remcl);
})

// function onlyOne(checkbox) {
//     var checkboxes = document.getElementsByName('checkclient');
//     checkboxes.forEach((item) => {
//         if (item !== checkbox) item.checked = false
//     })
// }



const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#cpassword');

togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});



const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#password');

togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});