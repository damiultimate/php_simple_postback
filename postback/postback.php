<?php 

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "localhost_users";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$campaign_id=$_GET['campaign_id'];
$campaign_name=$_GET['campaign_name'];
$sid=$_GET['sid'];
$sid2=$_GET['sid2'];
$sid3=$_GET['sid3'];
$status=intval($_GET['status']);
$commission=$_GET['commission'];
$commission=floatval($commission);
$commission=$commission-$commission*0.3;
$commission=round($commission, 2);

$ip=$_GET['ip'];
$reversal_reason=$_GET['reversal_reason'];
$test=$_GET['test'];
$vc_value=$_GET['vc_value'];
$leadID=$_GET['leadID'];
$country=$_GET['country'];



// $sql = "INSERT INTO `postback` (`campaign_id`, `campaign_name`, `sid`, `sid2`, `sid3`, `status`, `commission`, `ip`, `reversal_reason`,`test`, `vc_value`, `leadID`, `country`) VALUES ('$campaign_id','$campaign_name','$sid','$sid2','$sid3','$status','$commission','$ip','$reversal_reason','$test','$vc_value','$leadID','$country')";

//UPDATE Users SET pending_withdrawal=current_balance, current_balance=current_balance-pending_withdrawal

//UPDATE Users SET total_withdrawal=total_withdrawal+pending_withdrawal, pending_withdrawal=0



if($status != 2){
$sql = "UPDATE Users SET current_balance=current_balance+$commission WHERE pub_id='$sid'";


if ($conn->query($sql) === TRUE) {

// echo 'True <br><br>';

}
else{

	 // echo "Error: " . $sql . "<br>" . $conn->error.'<br><br>';
}

}

$conn->close();

 ?>