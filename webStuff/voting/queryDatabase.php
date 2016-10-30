<?php
	require_once 'loginInfo.php'; #getting info to connect to the database

  #new connection
	$conn = new mysqli($hostAddress, $uname, $pword, $database); 
	if($conn->connect_error) die($conn->connect_error);

  #query data base with sql
  $query = "select * FROM pictures";
  $result = $conn ->query($query);
  if(!$result) die ($conn->error);


  $rows = $result->num_rows;

  $varNames = array
            (
            array("numberOfLoses,numberOfWins","eloRating","totalOpp"),
            array("numberOfLosesFemale","eloRatingFemale","totalOppFemale"),
            array("numberOfLosesMale","eloRatingMale","totalOppMale"),
            array("numberOfLosesWhite","eloRatingWhite","totalOppWhite"),
            array("numberOfLosesBlack","eloRatingBlack","totalOppBlack"),
            array("numberOfLosesOther","eloRatingOther","totalOppOther"),
            array("numberOfLosesAsian","eloRatingAsian","totalAsian"),
            array("numberOfLosesAgeGroupOne","eloRatingAgeGroupOne","totalOppAgeGroupOne"),
            array("numberOfLosesAgeGroupTwo","eloRatingAgeGroupTwo","totalOppAgeGroupTwo"),
            array("numberOfLosesAgeGroupThree","eloRatingAgeGroupThree","totalOppAgeGroupThree")
            );

  #going through all the username's
  for ($i=0; $i < $rows; $i++) { 
    $temp = 'idName';
    $result->data_seek($i);
    echo '------------------idName'.$result->fetch_assoc()[$temp].'-------------<br>';
    $result->data_seek($i);
    echo 'eloRating: '.$result->fetch_assoc()['eloRating'].'<br>';
    $result->data_seek($i);
    echo 'numberOfWins: '.$result->fetch_assoc()['numberOfWins'].'<br>';
    $result->data_seek($i);
    echo 'numberOfLoses: '.$result->fetch_assoc()['numberOfLoses'].'<br>';
   #
    echo "-----------Females ------------<br>";
    $result->data_seek($i);
    echo 'eloRating: '.$result->fetch_assoc()['eloRatingFemale'].'<br>';
    $result->data_seek($i);
    echo 'numberOfWins: '.$result->fetch_assoc()['numberOfWinsFemale'].'<br>';
    $result->data_seek($i);
    echo 'numberOfLoses: '.$result->fetch_assoc()['numberOfLosesFemale'].'<br>';
    $result->data_seek($i);
    echo "-----------Males ------------<br>";
    $result->data_seek($i);
    echo 'eloRating: '.$result->fetch_assoc()['eloRatingMale'].'<br>';
    $result->data_seek($i);
    echo 'numberOfWins: '.$result->fetch_assoc()['numberOfWinsMale'].'<br>';
    $result->data_seek($i);
    echo 'numberOfLoses: '.$result->fetch_assoc()['numberOfLosesMale'].'<br>';

    echo "-----------White ------------<br>";
    $result->data_seek($i);
    echo 'eloRating: '.$result->fetch_assoc()['eloRatingWhite'].'<br>';
    $result->data_seek($i);
    echo 'numberOfWins: '.$result->fetch_assoc()['numberOfWinsWhite'].'<br>';
    $result->data_seek($i);
    echo 'numberOfLoses: '.$result->fetch_assoc()['numberOfLosesWhite'].'<br>';
  
    echo "-----------Black ------------<br>";
    $result->data_seek($i);
    echo 'eloRating: '.$result->fetch_assoc()['eloRatingBlack'].'<br>';
    $result->data_seek($i);
    echo 'numberOfWins: '.$result->fetch_assoc()['numberOfWinsBlack'].'<br>';
    $result->data_seek($i);
    echo 'numberOfLoses: '.$result->fetch_assoc()['numberOfLosesBlack'].'<br>';
    $result->data_seek($i);
    echo "-----------Asian ------------<br>";
    echo 'eloRating: '.$result->fetch_assoc()['eloRatingAsian'].'<br>';
    $result->data_seek($i);
    echo 'numberOfWins: '.$result->fetch_assoc()['numberOfWinsAsian'].'<br>';
    $result->data_seek($i);
    echo 'numberOfLoses: '.$result->fetch_assoc()['numberOfLosesAsian'].'<br>';
    $result->data_seek($i);
    echo "-----------Age Group One ------------<br>";
    echo 'eloRating: '.$result->fetch_assoc()['eloRatingAgeGroupOne'].'<br>';
    $result->data_seek($i);
    echo 'numberOfWins: '.$result->fetch_assoc()['numberOfWinsAgeGroupOne'].'<br>';
    $result->data_seek($i);
    echo 'numberOfLoses: '.$result->fetch_assoc()['numberOfLosesAgeGroupOne'].'<br>';
    $result->data_seek($i);
    echo "-----------Age Group Two ------------<br>";
    echo 'eloRating: '.$result->fetch_assoc()['eloRatingAgeGroupTwo'].'<br>';
    $result->data_seek($i);
    echo 'numberOfWins: '.$result->fetch_assoc()['numberOfWinsAgeGroupTwo'].'<br>';
    $result->data_seek($i);
    echo 'numberOfLoses: '.$result->fetch_assoc()['numberOfLosesAgeGroupTwo'].'<br>';
    $result->data_seek($i);
    echo "-----------Age Group Three ------------<br>";
    echo 'eloRating: '.$result->fetch_assoc()['eloRatingAgeGroupThree'].'<br>';
    $result->data_seek($i);
    echo 'numberOfWins: '.$result->fetch_assoc()['numberOfWinsAgeGroupThree'].'<br>';
    $result->data_seek($i);
    echo 'numberOfLoses: '.$result->fetch_assoc()['numberOfLosesAgeGroupthree'].'<br>';
    $result->data_seek($i);
    echo "-----------Age Group Other ------------<br>";
    echo 'eloRating: '.$result->fetch_assoc()['eloRatingOther'].'<br>';
    $result->data_seek($i);
    echo 'numberOfWins: '.$result->fetch_assoc()['numberOfWinsOther'].'<br>';
    $result->data_seek($i);
    echo 'numberOfLoses: '.$result->fetch_assoc()['numberOfLosesOther'].'<br>';
    $result->data_seek($i);
    

    
    echo '--------------------END-------------------------------------<br><br>';
  }



  $result->close();
  $conn->close();



?>