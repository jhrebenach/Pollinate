<?php #learning php,mysql + javascript was heavily used
	session_start();
	require_once 'loginInfo.php'; #getting info to connect to the database

  	#new connection
	$conn = new mysqli($hostAddress, $uname, $pword, $database); 
	if($conn->connect_error) die($conn->connect_error);

	 #query data base with sql
	  $query = "select * FROM pictures";
	  $result = $conn ->query($query);
	  if(!$result) die ($conn->error);

	 $quantity =  $_SESSION["quantity"];
	 $gender =  $_SESSION["gender"];
	 $ethnicity = $_SESSION["ethnicity"];

	 	$outPut = "";
  		if(isset($_POST["action"])){
  			$outPut = $_POST["action"];
  		}
		#GET FUNCTION TO DO STUFF BELWP
		if(!$outPut == ""){
			
			

    	

			
	   $_SESSION["quantity"] = $quantity;
	   $_SESSION["gender"] = $gender;
	   $_SESSION["ethnicity"] = $ethnicity;
	   //just do if statements with stuff inside then you are done!
	   $namesArray = array("male", "female", "other", "otherTwo", "ageGroupOne", "ageGroupTwo", "ageGroupThree", "black", "white", "asian");

	   $varNames = array
					  (
					  array('numberOfLoses','numberOfWins','eloRating','totalOpp'),
					  array('numberOfLosesFemale','numberOfWinsFemale','eloRatingFemale','totalOppFemale'),
					  array('numberOfLosesMale','numberOfWinsMale','eloRatingMale','totalOppMale'),
					  array('numberOfLosesWhite','numberOfWinsWhite','eloRatingWhite','totalOppWhite'),
					  array('numberOfLosesBlack','numberOfWinsBlack','eloRatingBlack','totalOppBlack'),
					  array('numberOfLosesOther','numberOfWinsOther','eloRatingOther','totalOppOther'),
					  array('numberOfLosesAsian','numberOfWinsAsian','eloRatingAsian','totalOppAsian'),
					  array('numberOfLosesAgeGroupOne','numberOfWinsAgeGroupOne','eloRatingAgeGroupOne','totalOppAgeGroupOne'),
					  array('numberOfLosesAgeGroupTwo','numberOfWinsAgeGroupTwo','eloRatingAgeGroupTwo','totalOppAgeGroupTwo'),
					  array('numberOfLosesAgeGroupthree','numberOfWinsAgeGroupThree','eloRatingAgeGroupThree','totalOppAgeGroupthree')
					  );

		if($quantity < 18){
			$ageValue = "ageGroupOne"; 
		} else if($quantity < 22) {
			$ageValue = "ageGroupTwo";
		}else if($quantity < 26) {
			$ageValue = "ageGroupThree";
		} else {
			$ageValue = "ageGroupThree";
		}

		if ($conn->connect_errno) {
   		 printf("Connect failed: %s\n", $conn->connect_error);
    			exit();
}

	   
    		for ($i=0; $i < 11; $i++) { 
    			for ($j=0; $j < 5; $j++) { 
    				if($namesArray[$i] == $ethnicity || $namesArray[$i] == $gender || $namesArray[$i] == $ageValue  ){

    					$winnerLoser = explode("|", $outPut);
							$result->data_seek($winnerLoser[0]);
							
							$temp  =$varNames[$i][1];
				    		$numWin = ($result->fetch_assoc()[$temp]);
				    		#echo $temp."=".$numWin;
				  

				    		$temp = $varNames[$i][0];
				    		$result->data_seek($winnerLoser[0]);
				    		$numLose = ($result->fetch_assoc()[$temp]);

				    		$temp = $varNames[$i][3];
				    		$result->data_seek($winnerLoser[0]);
				    		$oppScore = ($result->fetch_assoc()[$temp]);

				    		$temp = $varNames[$i][2];
				    		$result->data_seek($winnerLoser[0]);
				    		$eloRate = ($result->fetch_assoc()[$temp]);

				    		#loser below

				    		$temp = $varNames[$i][1];
				    		$result->data_seek($winnerLoser[1]);
				    		$numWinL = ($result->fetch_assoc()[$temp]);

				    		$temp = $varNames[$i][0];
				    		$result->data_seek($winnerLoser[1]);
				    		$numLoseL = ($result->fetch_assoc()[$temp]);

				    		$temp = $varNames[$i][3];
				    		$result->data_seek($winnerLoser[1]);
				    		$oppScoreL = ($result->fetch_assoc()[$temp]);
				    		
				    		$temp = $varNames[$i][2];
				    		$result->data_seek($winnerLoser[1]);
				    		$eloRateL = ($result->fetch_assoc()[$temp]);


				    		$loseElo = eloCal($numWinL, ($numLoseL + 1), $eloRateL, ($oppScoreL + $eloRate) ); #new elo for loser
				    		$winElo = eloCal(($numWin + 1), $numLose, $eloRate, ($oppScore + $eloRateL) ); #new elo for winner

				    		$numWin = $numWin + 1;
				    		$oppScore = $oppScore + $eloRateL;

				    		$numLoseL = $numLoseL +1;
				    		$oppScoreL = $oppScoreL + $eloRate;

    				#changing winners first
			    		#updating wins

						$temp = $varNames[$i][1];
			 
						$sql = "UPDATE pictures SET $temp='$numWin' WHERE idName='$winnerLoser[0]';";
			    		if ($conn->query($sql) === TRUE) {
    					#printf("Table myCity successfully created.\n");
						}else{
							 echo "Error: " . $sql . "<br>" . $conn->error;
						}
			    		
			    		
						
						#updating elo
						$temp = $varNames[$i][2];
						$sql = "UPDATE pictures SET $temp='$winElo' WHERE idName='$winnerLoser[0]';";
							if ($conn->query($sql) === TRUE) {
    					#printf("Table myCity successfully created.\n");
						}else{
							 echo "Error: " . $sql . "<br>" . $conn->error;
						}
			    		
						#updating total opp elo
						$temp = $varNames[$i][3];
						$sql = "UPDATE pictures SET $temp='$oppScore' WHERE idName='$winnerLoser[0]';";
							if ($conn->query($sql) === TRUE) {
    					#printf("Table myCity successfully created.\n");
						}else{
							 echo "Error: " . $sql . "<br>" . $conn->error;
						}
			    		

					#chaning the losers
						#updating loses for losers
						$temp = $varNames[$i][0];
			    		$sql = "UPDATE pictures SET $temp='$numLoseL' WHERE idName='$winnerLoser[1]';";
							if ($conn->query($sql) === TRUE) {
    					#printf("Table myCity successfully created.\n");
						}else{
							 echo "Error: " . $sql . "<br>" . $conn->error;
						}
			    		
						#updating elo
						$temp = $varNames[$i][2];
						$sql = "UPDATE pictures SET $temp='$loseElo' WHERE idName='$winnerLoser[1]';";
							if ($conn->query($sql) === TRUE) {
    					#printf("Table myCity successfully created.\n");
						}else{
							 echo "Error: " . $sql . "<br>" . $conn->error;
						}
			    		
						$temp = $varNames[$i][3];
						$sql = "UPDATE pictures SET $temp='$oppScoreL' WHERE idName='$winnerLoser[1]';";
							if ($conn->query($sql) === TRUE) {
    						
						}else{
							 echo "Error: " . $sql . "<br>" . $conn->error;
						}
			    		
    				}		
    			}
		}
	
	 
	$randomNumberOne = rand(0, 14);
  	$randomNumberTwo = rand(0, 14);

  	#making sure they did not pick the same var
  	while($randomNumberOne == $randomNumberTwo ) {
	  	$randomNumberOne = rand(0, 14);
	  	$randomNumberTwo = rand(0, 14);
	  	echo "redoing Var's";
  	}  			

}
$randomNumberTwo = rand(0, 14); 
$randomNumberOne = rand(0, 14);
while($randomNumberTwo == $randomNumberOne){
$randomNumberTwo = rand(0, 14); 
$randomNumberOne = rand(0, 14);
} 

  
	  
echo <<<_END

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Pollinate</title>
  <meta name="author" content="Wilfred Wallis">

   <!-- CSS -->
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

	<h1>Click which item you like better </h1>
	<hr>
	<form action="voting.php" method="post" <pre>
	<div class="firstHalf">
		<button id="buttonOne" type="submit" value="$randomNumberOne|$randomNumberTwo"  name="action"><img src="images/$randomNumberOne.jpg" id="imageOne"> </button>
	
	</div>	
	<div class="secondHalf">
		<button id="buttonTwo" type="submit" value="$randomNumberTwo|$randomNumberOne"  name="action"><img src="images/$randomNumberTwo.jpg" id="imageTwo" > </button>
	</div>
	</pre></form>


<script type="text/javascript" src="js/main.js"></script>

</body>
</html>

_END;

 		function eloCal($numWins, $numLoses, $elo, $eloOpp) {
            return ($eloOpp + 400 * ($numWins - $numLoses)) / ($numLoses + $numWins);
         }
?>


