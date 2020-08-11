<?php
    include('mysqli_oop_connect.php');
    //print_r($mysqli);

    $sql = "SELECT * FROM messages";
    $result = $mysqli->query($sql);
?>    

<!-- <table border="1">
    <tr>
        <th>Username</th>
        <th>Message</th>
    </tr> -->

<?php

    // if ($result->num_rows > 0) {
    //     while($row = $result->fetch_assoc()) {
    //         echo "<tr><td>".$row["user"]."</td><td>".$row["message"]."</td></tr>";
    //         // echo "username:" . $row["user"]. "::" ."message:". $row["message"]. "<br>";
    //     }
    //   } else {
    //     echo "0 results";
    //   }
    //   $mysqli->close();

?>

<?php

    $myresultArrayMessages = array();
    $myresultArrayUsers = array();

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            // echo "<tr><td>".$row["user"]."</td><td>".$row["message"]."</td></tr>";
            // echo "username:" . $row["user"]. "::" ."message:". $row["message"]. "<br>";
            array_push($myresultArrayMessages,$row["message"]);
            array_push($myresultArrayUsers,$row["user"]);
        }
      } else {
        echo "0 results";
      }
      $mysqli->close();

?>

<!-- </table> -->








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
