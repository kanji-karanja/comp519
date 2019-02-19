<?php
/**
 * Created by PhpStorm.
 * User: Karim K. Kanji
 * Date: 07/02/2019
 * Time: 23:11
 */
$sid= $_POST['sid'];
$fname=$_POST['fname'];
$name= $_POST['name'];
$email= $_POST['email'];
$slot=$_POST['slot'];
$mode=$_POST['mode'];
$conn=new mysqli("localhost","root","","comp519");

function unableToConnect($errno, $errstr) {
    echo "<div class='alert alert-danger'><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>An error occured: ".$errno." - ".$errstr."</div>";

}
//set error handler
set_error_handler("unableToConnect");
    if($mode==='allow'){
        $checkifexistsu = "SELECT * FROM student_course where sid ='$sid'";
        $result = $conn->query($checkifexistsu);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $oldsid = $row["slot_id"];
            }
            $sqlu = "UPDATE `student_course` SET `slot_id`='$slot' WHERE `sid` = '$sid'";
            $sqlu1 = "UPDATE `slots` SET count=count+1 WHERE `id` = '$slot'";
            $sqlu2 = "UPDATE `slots` SET count=count-1 WHERE `id` = '$oldsid'";
            if ($conn->query($sqlu) === TRUE && $conn->query($sqlu1) === TRUE && $conn->query($sqlu2) === TRUE) {
                echo "<div class='alert alert-success'><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>Hi, " . $fname . " , you have successfully <b>changed your</b> slot</div>";
            }
       }
        }
    else {
        $checkifexists = "SELECT * FROM student_course where sid ='$sid'";
        if ($conn->query($checkifexists)->num_rows > 0) {
            echo "<div class='alert alert-danger'><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>You are already registered! <a href='#change' onclick='checkSlots(\"allow\")'>Do you want to change it?</a></div>";

        } else {
            $sql = "INSERT INTO student_course (name, firstname, sid, email, slot_id) VALUES ('$name', '$fname','$sid', '$email', '$slot')";
            $sql2 = "UPDATE slots SET count=count+1 WHERE id='$slot'";

            if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
                echo "<div class='alert alert-success'><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>Hi, " . $fname . ", you have successfully selected a slot</div>";
            } else {
                echo "<div class='alert alert-danger'><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>An error occurred:" . $conn->error . "</div>";
            }
        }
    }
$conn->close();
