<?php 
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname' ];
$email = $_POST['email'];
$password =$_POST['password'];
$enterpassword = $_POST['enterpassword'];
$gender = $_POST['gender'];
$year = $_POST['year' ];
$month = $_POST['month'];
$date = $_POST['date'];

if (!empty($firstname) || !empty ($lastname) || !empty ($email) || !empty ($password) || !empty ($enterpassword) || ! empty ($gender) || !empty ($year) || !empty ($month) || !empty ($date) {
	$host(localhost);
	$dbusername(root);
	$dbpassword("");
	$dbname = ();
	$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
	if (mysqli_connect_error()) {
		die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
	} else {
		$SELECT = "SELECT email From register Where email=? Limit=1" ;
		$INSERT = "INSERT Into register (firstname, Lastname, password, email, password, re-enterpassword, gender, year, month, date) values(?,?,?,?,?,?,?,?,?)" ;
		
		//prepare statement
		$stmt = $conn->prepare($SELECT);
		$stmt -> bind_parem('s', $email);
		$stmt -> execute();
		$stmt -> bind_result($email);
		$stmt -> store_result();
		$rnum = $stmt -> num_row;

		if (rnum==0) {
			$stmt ->close();

			$stmt = $conn -> prepare($INSERT);
			$stmt -> bind_parem('sssssssii', ($firstname, $lastname, $email, $password, $enterpassword, $gender, $year, $month, $date);
			$stmt-> execute();

			echo ('new record inserted sucessfully';)
		} else {
			echo ('someone registerd using this email';)
		}
		$stmt ->close();
		conn ->close();
	} 
} else {
echo('all fields required');
die();
}
?>