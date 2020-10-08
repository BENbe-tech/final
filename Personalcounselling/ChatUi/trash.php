onclick="window.location.href = 'index2.php';"

<!-- <button type="button" name="Send"
    style="background-color: #448AFF;
      border: none;
      color: white;
      margin-left: 150px;
      margin-top: 10px;
      padding: 16px 32px;
      text-decoration: none;
      cursor: pointer;">Send</button> -->



      // $fetch = $result->fetch_assoc();
        // $fetch = $result->fetch_all(MYSQLI_NUM);
    //    $fetch =  $result->fetch_array(MYSQLI_ASSOC);
          
//     while(  $fetch =  $result->fetch_array(MYSQLI_ASSOC)){
      
        
//   }
//   $result -> free_result();
onclick="setActive()";
//display:none

    <!-- <li style="text-align:center;font-family: 'Poppins', sans-serif"><a href="#users" onclick="setActive()" >Prof Otonde Robert</a></li> -->
        <!-- <li style="text-align:center;font-family: 'Poppins', sans-serif"><a href="#users" onclick="setActive()" >Prof Otonde Robert</a></li> -->

<!-- 
        <div class="container">
  <p>Sweet! So, what do you wanna do today?</p>
  <span class="time-right">11:02</span>
</div>

<div class="container darker">
  <p>Nah, I dunno. Play soccer.. or learn more coding perhaps?</p>
  <span class="time-left">11:05</span>
</div> -->



<!-- client -->
<!-- message zilizotumwa na client -->

 <!-- <?php 

 

$sq = "SELECT message,time FROM advisormessage WHERE regnumber='$regnumber' ";
$data = $conn->query($sq);
if($data->num_rows > 0){
while($output = $data->fetch_array(MYSQLI_ASSOC)){ 
?>
<div class="container darker">
 <p><?php  echo $output["message"];?></p>
 <span class="time-left"><?php echo $output["time"]; ?></span>
</div>

<?php
}}
?> -->

</div>

  <!-- <div>

  <?php while($fetch = $data->fetch_array(MYSQLI_ASSOC)){?>

  <?php echo $fetch["message"];} ?> 
  </div> -->




  // while($fetch = $data->fetch_array(MYSQLI_ASSOC)){ 
        
        //     echo $fetch["message"] . ":" .$fetch["time"] .  "<br>";
        // }
        // $data -> free_result();  


        <!-- <form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> -->



        else{?>
 <h3><?php echo "no message available"; }?></h3>


 <?php
}

  else{?> 
 <h3><?php echo "no message available"; }?></h3>



 <!-- <div style="margin-left:280px;margin-right:20px;margin-top:80px;margin-bottom:200px;">

  
<!-- code to loop through message by the advisor -->
 <?php
 if(!empty($_GET['user'])){
  $user = $_GET['user'];
  
//2- all message from advisor
$sortadvisor= 2; 

  $sq = "SELECT message,time FROM messages WHERE regnumberclient='$regnumber' AND regnumberadvisor='$user' AND sort='$sortadvisor' ";
  $data = $conn->query($sq);
  if($data->num_rows > 0){
 
while($fetch = $data->fetch_array(MYSQLI_ASSOC)){ 
  ?>

<div class="container">
<p><?php  echo $fetch["message"];?></p>
<span class="time-right"><?php echo $fetch["time"]; ?></span>
</div>

<?php
}}

  else{?> 
 <h3><?php echo "no message available"; }}?></h3>



 
  </div> -->


 // $data = htmlspecialchars($data,ENT_QUOTES);
 //date_default_timezone_set('Africa/Dar_es_Salaam'); 

if(date("Y/m/d") > date("Y/m/d", strtotime("yesterday"))){ ?>
  
<!-- <h4 style="text-align:center;"><?php echo date("Y/m/d"); }?></h4>
<?php -->

action = "client.php?user=<?php echo $regnumberadvisor;?>"


// const togglePassword = document.querySelector('#togglePassword');
// const password = document.querySelector('#npassword');

// togglePassword.addEventListener('click', function (e) {
//     // toggle the type attribute
//     const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
//     password.setAttribute('type', type);
//     // toggle the eye slash icon
//     this.classList.toggle('fa-eye-slash');
// });


// const togglePassword = document.querySelector('#togglePassword');
// const password = document.querySelector('#password');

// togglePassword.addEventListener('click', function (e) {
//     // toggle the type attribute
//     const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
//     password.setAttribute('type', type);
//     // toggle the eye slash icon
//     this.classList.toggle('fa-eye-slash');
// });

// const togglePassword = document.querySelector('#togglePassword');
// const password = document.querySelector('#cpassword');

// togglePassword.addEventListener('click', function (e) {
//     // toggle the type attribute
//     const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
//     password.setAttribute('type', type);
//     // toggle the eye slash icon
//     this.classList.toggle('fa-eye-slash');
// });



// const togglePassword = document.querySelector('#togglePassword');
// const password = document.querySelector('#password');

// togglePassword.addEventListener('click', function (e) {
//     // toggle the type attribute
//     const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
//     password.setAttribute('type', type);
//     // toggle the eye slash icon
//     this.classList.toggle('fa-eye-slash');
// });

// function onlyOne(checkbox) {
//     var checkboxes = document.getElementsByName('checkclient');
//     checkboxes.forEach((item) => {
//         if (item !== checkbox) item.checked = false
//     })
// }



// 