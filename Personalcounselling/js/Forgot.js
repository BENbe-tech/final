const inputs = document.querySelectorAll(".input");

function validateForm() {



var npassword = document.getElementById("npassword").value;




if(npassword == null || npassword == "" ){
    alert("new pasword must be filled");
    return false;
}


if(npassword.length < 6){
	alert("atleast 6 characters required");
	return false;
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

