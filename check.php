<?php
/**
 * Created by PhpStorm.
 * User: Karim K. Kanji
 * Date: 07/02/2019
 * Time: 07:25
 */
$conn=new mysqli("localhost","root","","comp519");

function unableToConnect($errno, $errstr) {
    echo "<option>No slot available: can't fetch</option>";

}
//set error handler
set_error_handler("unableToConnect");

$sql = "SELECT * FROM slots";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo "<option>Select one</option>";
    while($row = $result->fetch_assoc()){
        $remaining = 8-$row['count'];
        if($remaining===0){
            $error = "disabled class='text-danger'";
        }
        else{
            $error="";
        }
        echo "<option $error value=".$row['id'].">".$row['day']."&nbsp;".$row['time']."&nbsp;".$remaining." spaces remaining</option>";
    }
} else {
    echo 2;
}
$conn->close();