<?php #learning php,mysql + javascript was heavily used


	session_start();
	require_once 'loginInfo.php'; #getting info to connect to the database

  	#new connection
	$conn = new mysqli($hostAddress, $uname, $pword, $database); 
	if($conn->connect_error) die($conn->connect_error);




	   	$quantity = get_post($conn, 'quantity');
	   	$gender = get_post($conn, 'gender');
	   	$ethnicity = get_post($conn, 'ethnicity');
	   
	   $_SESSION["quantity"] = $quantity;
	   $_SESSION["gender"] = $gender;
	   $_SESSION["ethnicity"] = $ethnicity;
	 

	  	
	   	#query data base with sql
		$query = "select * FROM userTable";
		$result = $conn ->query($query);
		if(!$result) die ($conn->error);


		$rows = $result->num_rows;
		
		

		echo $gender;
			
				$query = "INSERT INTO userTable values".
	   	 		"('$quantity', '$gender', '$ethnicity')";
	   	 		echo $quantity;
	   	 		$result = $conn->query($query);
	   	 		if(!$result) 
	   	 		echo "failed!";
			

	   			

		   


	   
	   
	  
echo <<<_END
			<html>
<head>
	<meta charset="utf-8">
	<title>Sign Up | Challenge Channel</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
<script>
//window.location = "http://wilfredwallis.com/faceSmash/voting.php";
</script>
	
</body>
</html>
_END;


		function get_post($conn, $var)
		{
			return $conn->real_escape_string($_POST[$var]);
		}
		

		
			$conn->close();
?>

	
