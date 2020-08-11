<?php

	$message = $_POST['message'];
	$user = $_POST['user'];
	
	if(!empty($message) && !empty($user))
	{
       populateDB($message, $user);
	}
	else
	{
		if(empty($message))
		{
          echo "Message field cannot be empty";
		}
		else
		{
		  echo "User field cannot be empty";
		}
	}
	
?>

<?php
	function populateDB($message, $user)
	{
	  require_once('mysqli_oop_connect.php');
	  $sql = "INSERT INTO messages VALUES('$message','$user');";
	  
	  if ($mysqli->query($sql) === TRUE) {
		echo "<br><br><br><br><br><br><br><br>Message sent successfully";
	  } else {
		echo "Error: " . $sql . "<br>" . $mysqli->error;
	  }
	  
	  $mysqli->close();
	}
?>