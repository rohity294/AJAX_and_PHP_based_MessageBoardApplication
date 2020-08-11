<?php
session_start();
?>

<html>
<head>
	<!-- <meta http-equiv="refresh" content="<?php echo 9?>;URL='<?php echo $_SERVER['PHP_SELF']?>'"> -->
</head>
<body>
    <h1>The Message Board Application</h1>
	<div id="display"></div>

	<p>Message:<input id="message" type="text" name="message"></p>
 	<p>User:<input id="user" type="text" name="user"></p>
 	<p>
 	<!-- <button type="button" onclick="postData2()">Send Message</button> -->
 	<button type="button" onclick="postData()">Send Message</button>
	<form method="post">
		<input type="submit" id="GetMessage" name="GetMessage" value="Get Message"></input>
	</form>
	</p>
	<h3>You need to click the "Get Message" button only once! Once you have clicked it,
		you do not need to click it again, even if the button appears here. After 9 seconds, the updated dynamic data
		will automatically appear here. So just sit back and watch the magic unfold!

		If you want to update data to the message board, you have 9 seconds to enter data in fields:
		message and user, and click "Send Message" button.

		And as described above, wait 9 seconds for your updated data to reflect on it's own, without you needing
		to click the "Send Message" button. Remember 9 seconds is waiting time to see refreshed/updated data,
		and also the time you have to enter new values.
	</h3>

	<script>

    function myRepeater()
	{
		var getMessageButton = document.getElementById("GetMessage");
		getMessageButton.click(); 
	}

	var mystr;
	function getMessage() {
		
		//document.write("printed from JS");
		var mystr = document.getElementById("myhidden").value;
		console.log(mystr);//works

		document.getElementById("display").innerHTML = mystr;

		//below using SetInterval
		setInterval(myRepeater, 9000);
		

        
		

		//header("Location: messages.php");// remember it's a php function and not of javascript
		//window.location.href = "messages.php";
		//printMessage();
		//var myStringBuilder;

		// for(x=0; x<$myresultArray.length; x++)
		// {
		//    myStringBuilder = myStringBuilder + myresultArray[x];
		// }

		// document.getElementById("display").innerHTML = mystringBuilder;
		
	}
	</script>

	<?php
		
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{

		  if($_POST['GetMessage'] == "Get Message")
		  {
			  //echo "Printed from PHP";

			  resultsFetcher();
		  }

		}

		function resultsFetcher()
		{
			include('messages.php'); //the select * query from messages.php runs everytime this page is loaded
		    // below two arrays store data fetched from database
		    // $myresultArrayMessages
			// $myresultArrayUsers
			
			$myStringBuilder="";
			for($x=0; $x<count($myresultArrayMessages); $x++)
			{
				//echo "$myresultArrayMessages[$x]".":"."$myresultArrayUsers[$x]"."<br>";
				$myStringBuilder = $myStringBuilder. "$myresultArrayMessages[$x]".":"."$myresultArrayUsers[$x]"."<br>";
			}

			echo "<br><input type=\"hidden\" name=\"myhidden\" id=\"myhidden\" value=\"$myStringBuilder\">";

			//echo "<script>getMessage(\"hi\");</script>";//works
			echo "<script>
			           getMessage();
				 </script>";
				 
			// echo "<script>
			// 		setInterval(getMessage, 9000);
			// 	</script>";

            //resultsFetcher();
			   
		}

		

	?>

	
 

 
 
 </body>

<script>  


function postData() {
	//document.getElementById("message").value

	var xhttp = new XMLHttpRequest();
	var formdata = new FormData();
    formdata.append("message", document.getElementById("message").value);
	formdata.append("user", document.getElementById("user").value);
	
	xhttp.onreadystatechange = function() {
	  if (this.readyState == 4 && this.status == 200) {
		console.log(this.responseText);	 
		document.getElementById("display").innerHTML = "Message sent successfully";
	  }
	};
	xhttp.open("POST", "input.php", true);
	xhttp.send(formdata);
	
}
// function postData2() {	
// 	document.getElementById("display").innerHTML = document.getElementById("message").value;	
// }
//getMessage();
</script>
</html>


<!-- 1.	Create a database called message_board
2.	Create a table called messages, with two columns:  user and message
3.	Create a file called messages.php
4.	Inside this file, select * from messages and run the query using object oriented php
5.	Output each result in an echo statement which displays the user and the message
6.	Create a file called input.php
7.	Inside this file, check if the posted user and message are NOT empty, if they aren’t, insert them into the database
8.	Open the index.html file inside the starter files
9.	Inside the getMessage() function, use AJAX to “GET” messages.php HINT: Use the Fetch API or XMLHttpRequest
10.	Display the text response inside the div with id “display”. HINT: You can get the element by id, and set the innerHTML
11.	Inside the postData() function, create a FormData object
12.	Append to the FormData with a key of “message” and the value of the “message” input. HINT: document.getElementById("message").value
13.	Append to the FormData with a key of “user” and the value of the “user” input 
14.	POST the FormData object to input.php using the Fetch API or XMLHttpRequest
15.	Create a timer with the setInterval function which calls the “getMessage()” function every second -->



<!-- function XMLTest() {
	var xhttp = new XMLHttpRequest();
	var formdata = new FormData();
	formdata.append("info", "XMLHttpRequest");
	
	xhttp.onreadystatechange = function() {
	  if (this.readyState == 4 && this.status == 200) {
		console.log(this.responseText);	  
	  }
	};
	xhttp.open("POST", "form.php", true);
	xhttp.send(formdata);
  } -->

<!-- function Fetch() {
	var formdata = new FormData();
	formdata.append("info", "FETCH");
	
	fetch('form.php', {
	  method: 'POST',
	  body: formdata
	  })
	  .then(response => response.text())
	  .then(response => console.log(response))
	  .catch(error => console.error('Error:', error));
  } -->