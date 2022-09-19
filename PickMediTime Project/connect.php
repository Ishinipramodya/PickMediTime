<?php
$yourName=$_POST['yourName'];
$yourIndex=$_POST['yourIndex'];
$yourContactNumber=$_POST['yourContactNumber'];
$email=$_POST['email'];
$date=$_POST['date'];

$server_name = "localhost";
$user_name = "root";
$password = "";
$database = "pickmeditime";

$connection = new mysqli($server_name , $user_name , $password , $database);

if($connection->connect_error){
	die('Connection erroe : '.$conn->connect_error);
}else{
	$stml= $conn->prepare("insert into registration(yourName,yourIndex,yourContactNumber,email,date)
		values(?,?,?,?,?)");
	$stml->bind_param("ssssi",$yourName,$yourIndex,$yourContactNumber,$email,$date);
	$stml->execute();
	echo"submitted";
	$stml->close();
	$stml->close();

}
?>