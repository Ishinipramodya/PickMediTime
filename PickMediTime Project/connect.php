<?php

$yourName = $_POST['yourName'];
$yourIndex = $_POST['yourIndex'];
$yourContactNumber = $_POST['yourContactNumber'];
$email = $_POST['email'];
$date = $_POST['date'];



//Database connection
if(!(empty($yourName))|| !(empty($yourIndex))|| !(empty($yourContactNumber))|| !(empty($email))|| !(empty($date)) ){
	$host = "localhost";
	$dbUserName = "root";
	$dbPassword = "";
	$dbname = "pick_medi_time";

	//create connection
	$conn = new mysqli($host, $dbUserName, $dbPassword, $dbname);


	if($conn->connect_errno){
		die('Connect Error('.mysqli_connect_errno().')'. mysqli_connect_error());

	}else{

		$SELECT = 'SELECT email From book_appoinment WHERE email =? LIMIT 1';
		$INSERT = "INSERT INTO book_appoinment (your_name, your_index, your_contact_number, email, date) values(?, ?, ?, ?, ?)";

		//Prepare statement
		$stmt = $conn->prepare($SELECT);
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$stmt->bind_result($email);
		$stmt->store_result();
		$rnum = $stmt->num_rows;


		if($rnum==0){
			$stmt->close();

			$stmt = $conn->prepare($INSERT);
			$stmt->bind_param("ssssi", $yourName, $yourIndex, $yourContactNumber, $email, $date);
			$stmt->execute();
			echo "New record inserted successfully";
		}else{
			echo "Someone already registered using this email";
		}
		$stmt->close();
		$conn->close();
	}

}else{
	echo "All field are required";
	die();
}
?>