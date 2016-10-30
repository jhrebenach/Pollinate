<?php #learning php,mysql + javascript was heavily used
	require_once 'loginInfo.php'; #getting info to connect to the database

  	#new connection
	$conn = new mysqli($hostAddress, $uname, $pword, $database); 
	if($conn->connect_error) die($conn->connect_error);

	if(isset($_POST['idName']) &&
	   isset($_POST['eloRating']) &&
	   isset($_POST['numberOfWins']) &&
	   isset($_POST['numberOfLoses']) &&
	   isset($_POST['totalOpp']))
	   
	   {
	   	$idName = get_post($conn, 'idName');
	   	$eloRating = get_post($conn, 'eloRating');
	   	$numberOfWins = get_post($conn, 'numberOfWins');
	   	$numberOfLoses = get_post($conn, 'numberOfLoses');
	   	$totalOpp = get_post($conn, 'totalOpp');
	 

	  	
	   	#query data base with sql
		$query = "select * FROM pictures";
		$result = $conn ->query($query);
		if(!$result) die ($conn->error);


		$rows = $result->num_rows;
		
		


			for ($i=0; $i < 15 ; $i++) { 
				$query = "INSERT INTO pictures values".
	   	 		"('$i','800','0','0','0', '800', '0', '0', '0', '800', '0', '0','0','800','0', '0', '0', '800', '0', '0', '0', '800','0','0','0', '800', '0', '0', '0', '800', '0','0','0','800','0', '0', '0', '800', '0', '0', '0')";

	   	 		
	   	 		if(!$result) 
	   	 		echo "failed!";

	   	 		if ($conn->query($query) === TRUE) {
    					#printf("Table myCity successfully created.\n");
						}else{
							 echo "Error: " . $sql . "<br>" . $conn->error;
						}


			}

	   			

		   


	   
	   
	  }
echo <<<_END
			<html>
<head>
	<meta charset="utf-8">
	<title>Sign Up | Challenge Channel</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body id="signup">
	<div class="box">
		<h1>Challenge Channel</h1>
		<h2 class="center">Get started</h2>

		<!-- html form --> 
			<p id='message'> </p>
	   		<form action="adding.php" method="post" <pre>
	   		idName <input type="text" name="idName"><br>
	   		eloRating <input type="text" name="eloRating"><br>
	   		numberOfWins <input type="text" name="numberOfWins"><br>
	   		numberOfLoses <input type="text" name="numberOfLoses"><br>
	   		totalOpp <input type="text" name="totalOpp"><br>
	   		
	   		<input type="submit" value="ADD RECORD">
	   		</pre></form>
	   		</div>
</body>
</html>
_END;


		function get_post($conn, $var)
		{
			return $conn->real_escape_string($_POST[$var]);
		}
		

			$result->close();
			$conn->close();
?>

	
