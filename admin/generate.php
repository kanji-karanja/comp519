<?php
/**
 * Created by PhpStorm.
 * User: Karim K. Kanji
 * Date: 08/02/2019
 * Time: 00:48
 */
$id = $_GET['id'];
$conn=new mysqli("localhost","root","","comp519");

function unableToConnect($errno, $errstr) {
    echo "<option>No slot available: can't fetch</option>";

}
//set error handler
set_error_handler("unableToConnect");

$sql = "SELECT name, firstname, sid, email FROM student_course WHERE slot_id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo "<br/><table class=\"table table-bordered\">
    <thead>
      <tr>
        <th>Name</th>
        <th>First name</th>
        <th>SID</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>";
    while($row = $result->fetch_assoc()){
        echo "
        <tr>
        <td>".$row['name']."</td>
        <td>".$row['firstname']."</td>
        <td>".$row['sid']."</td>
        <td>".$row['email']."</td>
      </tr>";
    }
    echo "</tbody></table>";
} else {
    echo "<div class='alert alert-danger'>No students have selected that slot</div>";
}
$conn->close();