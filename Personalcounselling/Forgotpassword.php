<?php

require('config.php');

$regnoError = "";
$checkError = "";

if(!empty($_POST['reset'])){

  //validating regnumber
  if (empty($_POST["regno"])) {
    $regnoError = "registration number is required";
    
  }
  else {
    $regnumber = test_input($_POST['regno']);

  }

  
  //$checkbox validation
if(empty($_POST['checkclient']) && empty($_POST['checkadvisor']) ){
	$checkError = "tick one box";
	}
	
	
	if(!empty($_POST['checkclient']) && !empty($_POST['checkadvisor']) ){
		$checkError = "tick one box";
		} 

  $newpass =$_POST['npassword'];
  $newpassword = password_hash($newpass,PASSWORD_DEFAULT);

  if($regnoError=="" && $checkError=="" && !empty($_POST['checkclient']) ){
	  $query1 = "UPDATE client SET password = '$newpassword' WHERE idnumber = '$regnumber'";
  $reset =  $conn->query($query1);
  
  if($reset===true){
    header("Location: login.php");
	}

  }  

  if($regnoError=="" && $checkError=="" && !empty($_POST['checkadvisor']) ){

	$query2 = "UPDATE advisor SET password = '$newpassword' WHERE idnumber = '$regnumber'";
  $reset =    $conn->query($query2);
  
  if($reset===true){
    header("Location: login.php");
	}
	
}
  $conn ->close();
}

//testing the inputs entered by the user

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data,ENT_QUOTES);
  return $data; 
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Forgot Password</title>
	<link rel="stylesheet" type="text/css" href="css/Forgotpassword.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
	.error{
		color:blue;
	}	

	.l{
	padding: 1px;
	display: inline-block;
	margin-left: 40px;
}
.l_advisor{
	padding: 1px;
	display: inline-block;
	margin-left: -50px;
}

.checkbox{
	margin-top: 10px;
	font-weight: 10px;
	
}
h4{
	color: #3366ff;
	display: block;
	text-align: left;
	text-decoration: none;

}

.pointer{
	cursor: pointer;
}
/* .field-icon {
	float: right;
	margin-left: -25px;
	margin-top: -25px;
	position: relative;
	z-index: 2;
  } */
	</style>	
</head>

<body>
    <img class="forgot_password" src="img/forgot_password.svg">
    <div class="container">
		<div></div>
		<div class="content">
			<form action="Forgotpassword.php" autocomplete = "on" method="post" onsubmit = "return validateForm()">
                <h2 class="title">Forgot Password</h2>
              
           		<div class="input-div one">
           		   <div class="i">
					  <i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
                        <h5>ID_Number </h5>
						<input type="tel" class="input" name="regno">
					  </div>
				   </div>
				   <span class = "error"><?php echo $regnoError;?></span>

				   
				   <div class="input-div one">
           		   <div class="i">
					  <i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
						<h5>NEW PASSWORD </h5>
					
							  <input type="password" class="input" name="npassword" id="npassword" autocomplete="off">
							  <!-- <i class="far fa-eye pointer" id="togglePassword"></i> -->
							</div>
				   </div>
				   
				   <h4>You are: </h4>
                 <div class="checkbox">
                    <div class="l_advisor">
                        <input type="checkbox" name= "checkadvisor" >
                        <label><b>Advisor</b></label>
                    </div>
                    <div class="l">
                        <input type="checkbox"  name="checkclient" >
                        <label><b>Client</b></label>
                    </div>
                </div>
                <span class = "error"><?php echo $checkError;?></span>

             
            	<input type="submit" class="btn" value="Reset" name="reset">
            </form>
        </div>
    </div>
	<script type="text/javascript" src="js/Forgot.js"></script>
</body>
</html>
