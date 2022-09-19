<?php
$yourName=$_POST['yourName'];
$yourIndex=$_POST['yourIndex'];
$yourContactNumber=$_POST['yourContactNumber'];
$email=$_POST['email'];
$date=$_POST['date'];

//Database connection
$conn = new mysqli('localhost','root','','pickmeditime');
if($conn->connect_error){
	die('Connection Failed :'.$conn->connect_error');
}else{
	$stmt = $conn->prepare("insert into appoinment(yourName,yourIndex,yourContactNumber,email,date)
		values(?,?,?,?,?)");
	$stmt->bind_param("ssssi",$yourName,$yourIndex,$yourContactNumber,$email,$date);
	$stmt->execute();
	echo "registration successfully...";
	$stmt->close();
	$conn->close();	
}
?>