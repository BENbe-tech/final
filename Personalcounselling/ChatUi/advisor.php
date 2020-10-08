<?php
session_start();

require('../config.php');

$messageError = "";
//validating inputs

$regnumber = $_SESSION['registrationnumbera'];

 if($regnumber != ""){
      $sq = "SELECT regnumberclient FROM relational WHERE regnumberadvisor='$regnumber' ";
    $result = $conn->query($sq);
  
  //   if($result->num_rows > 0){
    
     
  // }

  $sql = "SELECT firstname FROM advisor WHERE idnumber = '$regnumber' ";
  $output = $conn->query($sql);

   if($output->num_rows>0){
     $output1 =  $output->fetch_assoc();
  
 }
  
 }

if(!empty($_POST['send'])){

  if(!empty($_GET['user'])){
    $user = $_GET['user'];}


//validating message
if (empty($_POST["message"])) {
  $messageError = "please write a message";
  } 
  else {

  $message1 = test_input($_POST['message']);
  $cipher_method = 'aes-128-ctr';
  $enc_key = openssl_digest(php_uname(), 'SHA256', TRUE);
  $enc_iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher_method));
  $message = openssl_encrypt($message1, $cipher_method, $enc_key, 0, $enc_iv) . "::" . bin2hex($enc_iv);
  
}


if($messageError ==""){
  //2 - all message from advisor
  $sortadvisor = 2;
  $sql = "INSERT INTO messages(regnumberclient,regnumberadvisor, message,sort) VALUES('$user','$regnumber','$message','$sortadvisor')";

  $connect =   $conn->query($sql);
}


// $conn ->close();
}

//testing the inputs entered by the user

function test_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  
return $data; 
}

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script>
      function setActive(){
        var input = document.getElementsByClassName('inputDiv');
        input[0].style.display = "block";
        return true;

      }

      function logout(){
var r = confirm("are you sure you want to logout");
  if(r==true){
        return true;
      }

else{
  return false;
}
      }
    </script>
    <style>
    body{
      margin: 0;
      background-color: #E0E0E0;
    }

    ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      width: 20%;
      background-color: #f1f1f1;
       position: fixed;
      height: 100%;
      overflow: auto;
    }

    li a {
       display: block; 
      color: #000;
      float: left;
      padding: 8px 16px;
      text-decoration: none;
    }

    li a.active {
      background-color: #448AFF;
      color: white;
    }

    li a:hover:not(.active) {
      background-color: #555;
      color: white;
    }

    
.container img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}

.message-row{
    margin-bottom: 20px;
    display:grid;
    grid-template-columns: 70%;

}

.message-content{
    display:grid;
}
.you-message{
    justify-content: end;
    justify-items: end;
}

.you-message .message-content{
    justify-items: end;
}

.other-message{
    justify-items: start;

}
.other-message .message-content{
    grid-template-columns: 48px 1fr;
    grid-column-gap: 15px;

}

.message-text{
    padding:9px 14px;
    font-size:1rem;
    margin-bottom: 5px;
    font-family: "Poppins",sans-serif;
}

.you-message .message-text{
    background:rgb(13, 13, 231);
    color:rgb(245, 234, 234);
    border-radius: 20px 20px 0 20px;
}

.other-message .message-text{
    background:rgb(245, 234, 234);
    color:#111;
    border-radius: 20px 20px 20px 0;
}
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
  </head>

  <body>
    <ul>
    <li style="text-align:center;font-family: 'Poppins', sans-serif"><img src="https://img.icons8.com/cute-clipart/48/000000/chat.png"/><h3>My Clients</h3></li>
  
    <?php

if($result->num_rows > 0){
    
     

         while(  $fetch =  $result->fetch_array(MYSQLI_ASSOC)){?>
      
    <li style="text-align:center;font-family: 'Poppins', sans-serif"><a href="advisor.php?user=<?php echo $fetch["regnumberclient"];
   if(!empty($_GET['user'])){
    $reg = $_GET['user'];}
    ?>" ><?php echo    substr($fetch["regnumberclient"],5) . rand(10,100);   }} ?></a></li><br>
        

    <li style="text-align:center;font-family: 'Poppins', sans-serif;margin-top:150%" onclick = "return logout()"><a href = "../logout.php?outa=<?php echo $_SESSION['registrationnumbera'];?>">Log Out</a></li>
  </ul>

 
  <div style="margin-left:280px;margin-right:20px;margin-bottom:200px;">

  <p style="text-align:center;font-family: 'Poppins', sans-serif;color:white;background-color:black;padding:30px">Welcome <?php echo $output1["firstname"];?></p>

<!--code to loop through message sent by the client-->
 <?php

 if(!empty($_GET['user'])){
   $user = $_GET['user'];

  //1- all message from client
  //2 - all message from advisor
  //advisor light 
  //client darker
  $sortclient= 1; 
  $sortadvisor= 2;

  $sq = "SELECT message,time,sort FROM messages WHERE regnumberclient='$user' AND regnumberadvisor='$regnumber'";
  $data = $conn->query($sq);
  if($data->num_rows > 0){

while($fetch = $data->fetch_array(MYSQLI_ASSOC)){


  if($fetch["sort"]==$sortadvisor){
    list($fetch["message"], $enc_iv) = explode("::", $fetch["message"]);;
    $cipher_method = 'aes-128-ctr';
    $enc_key = openssl_digest(php_uname(), 'SHA256', TRUE);
    $token = openssl_decrypt($fetch["message"], $cipher_method, $enc_key, 0, hex2bin($enc_iv));

    ?>

<div class="message-content">
              <div class="message-row you-message">
                  <div class="message-text">
                
  <!-- <p><?php  echo $fetch["message"];?></p> -->
  <p><?php  echo $token; ?></p>

  <span class="time-right"><?php echo $fetch["time"]; ?></span>
                  </div>
              </div>
          </div>
          <?php }
    elseif($fetch["sort"]==$sortclient){ 
      list($fetch["message"], $enc_iv) = explode("::", $fetch["message"]);;
      $cipher_method = 'aes-128-ctr';
      $enc_key = openssl_digest(php_uname(), 'SHA256', TRUE);
      $token = openssl_decrypt($fetch["message"], $cipher_method, $enc_key, 0, hex2bin($enc_iv));

      ?>
          <div class="message-content">
            <div class="message-row other-message">
              <div class="message-text">
              
    <!-- <p><?php echo $fetch["message"]; ?></p> -->
    <p><?php  echo $token; ?></p>
   
  <span class="time-left"><?php echo $fetch["time"]; ?></span>
              </div>
            </div>
          </div>
  
 
  
  

<?php
}}}
else{?>


<h3><?php echo "no message available";} }?></h3>

</div>
 
  <div
  style="position:fixed;left:0;bottom:0;width:100%;background:black;color:white;
  margin-left:272px"
  class="inputDiv"
  >
  <form method = "post" action = "advisor.php?user=<?php echo $reg;?>">
    <input type="text" name="message"  autocomplete="off"   placeholder="Enter Message"
    style="width: 60%;
  padding: 12px 20px;
  margin-top: 20px;
  margin-bottom:10px;
  margin-left:20px;
  border: 3px solid #555;
  color: black;"
    >
    
      <input type = "submit" name = "send" value = "send"   style="background-color: #448AFF;
      border: none;
      color: white;
      margin-left: 40px;
      margin-top: 10px;
      padding:20px;
      text-decoration: none;
      cursor: pointer;">
 </form>
  </div>
  

  </body>
</html>
