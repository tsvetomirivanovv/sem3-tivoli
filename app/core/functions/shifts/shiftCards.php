<?php

// GET DB CONNECTION
require '../../database/connect.php';
$conn = getConnection();
// CHECK IF THERE IS ERROR
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// BUILD QUERY
$query = "SELECT * FROM shifts";

// EXECUTES QUERY
$result = $conn->query($query);


// WHILE THERE ARE ROWS IN THE TABLE, FETCH THEM AND ECHO BACK HTML ELEMENTS
while ($data = mysqli_fetch_row($result))
{

    // VARIABLE CONTAINING THE HTML ELEMENTS + DATA FROM THE DATABASE
    $shiftCard =
        <<<HTML
    <li style="list-style-type: none">
    <div style="border: groove" >
        
        <div>
            <img src="../../../../assets/images/logo.png" style="float:left;width:210px;height:150px; border-style:groove ">
        </div>
        
        <div>
            <a href="">Title: $data[1] </a><br>
            <label>Start date: $data[2]</label><br>
            <label>Closing date: $data[4]</label><br>
            <label>Manager: $data[5]</label><br>
            <label>Category: $data[6]</label><br>
        </div>
 
        <div style="clear:both"></div>
        
</div><br>
</li>
HTML;

    // ECHO BACK THE VARIABLE TO THE JAVASCRIPT
    echo $shiftCard;
}
