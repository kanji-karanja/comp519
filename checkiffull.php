<?php
/**
 * Created by PhpStorm.
 * User: Karim K. Kanji
 * Date: 13/02/2019
 * Time: 09:41
 */
            $conn=new mysqli("localhost","root","","comp519");
            $sql = "SELECT * FROM slots where count=8";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row=$result->fetch_assoc()){
                    echo "<div class='alert alert-warning'>The slot <b>".$row['day']." ".$row['time']."</b> is full.</div>";
                }
            }
            ?>