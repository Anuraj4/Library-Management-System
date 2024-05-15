
<?php
	
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$number = $_POST['number'];
	$username = $password = $confirm_password = "";
    $username_err = $password_err = $confirm_password_err = "";


	

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	define('MYSITE',true);
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName, lastName, gender, email, password,number) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $firstName, $lastName, $gender, $email, $password, $number);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		echo "<script>alert('Resitration Successfull')</script>";
		echo "<script> window.location.assign('best.php'); </script>";
		$stmt->close();
		$conn->close();
		
	}
?>


