<?php
$yourName = $_POST['yourName'];
$yourIndex = $_POST['yourIndex'];
$yourContactNumber = $_POST['yourContactNumber'];
$email = $_POST['email'];
$date = $_POST['date'];

//Database connection
if(!empty($yourName)|| !empty($yourIndex)|| !empty($yourContactNumber)|| !empty($email)|| !empty($date)){
	$host = "localhost";
	$dbUserName = "root";
	$dbPassword = "";
	$dbname = "youtube";

	//create connection
	$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

	if(mysqli_connect_error()){
		die('Connect Error('.mysqli_connect_errno().')'. mysqli_connect_error());

	}else{
		$SELECT = "SELECT email From bookappoinment Where email = ?Limit 1";
		$INSERT = "INSERT Into bookappoinment(yourName, yourIndex, yourContactNumber, email, date) values(?, ?, ?, ?, ?)";

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
