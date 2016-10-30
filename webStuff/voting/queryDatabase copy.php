<?php
	require_once 'loginInfo.php'; #getting info to connect to the database

  #new connection
	$conn = new mysqli($hostAddress, $uname, $pword, $database); 
	if($conn->connect_error) die($conn->connect_error);

  #query data base with sql
  $query = "select * FROM userTable";
  $result = $conn ->query($query);
  if(!$result) die ($conn->error);


  $rows = $result->num_rows;

  #going through all the username's
  for ($i=0; $i < $rows; $i++) { 
    $result->data_seek($i);
    echo 'age: '.$result->fetch_assoc()['age'].'<br>';
    $result->data_seek($i);
    echo 'gender: '.$result->fetch_assoc()['gender'].'<br>';
    $result->data_seek($i);
    echo 'ethnicity: '.$result->fetch_assoc()['ethnicity'].'<br>';
    $result->data_seek($i);
    
    echo '----------------------------------------------------<br><br>';
  }

  $result->close();
  $conn->close();



?>