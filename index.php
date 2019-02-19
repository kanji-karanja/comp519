<?php
/**
 * Created by PhpStorm.
 * User: Karim K. Kanji
 * Date: 07/02/2019
 * Time: 07:01
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../cdn/bootstrap/4.2.1/css/bootstrap.min.css">
    <script src="../cdn/jquery/jquery.min.js"></script>
    <script src="../cdn/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <title>Student Registration</title>
</head>
<body onload="getThenumber()">
<div class="container-fluid">
<div class="row">
    <div class="card col-8 offset-2">
        <div class="card-body">
        <h1 class="text-danger">COMP207 - Register here for a practical slot</h1>
        <h4>Register only if you know what you are doing.</h4>
        <ul>
            <li>Please enter <b>all</b> information and select your desired day. Please enter a correct 'SID' number!</li>
            <li>Please check the number of available seats before submitting.</li>
            <li>Register only to one slot</li>
            <li>Any problems? Write a message to <span class="text-danger">weberb@csc.liv.ac.uk</span></li>
        </ul>
            <div id="checkiffull"></div>

        <form action="" method="post" onsubmit="return checkSlots('deny')">
            <div id="response"></div>
            <div class="row">
            <div class="col-3">
                <label>Name</label><br/>
                <input class="form-control" type="text" id="name" required placeholder="Full name">
            </div>
            <div class="col-3">
                <label>Firstname</label>
                <input class="form-control" type="text" id="fname" required placeholder="First Name">
            </div>
            <div class="col-3">
                <label>SID</label>
                <input class="form-control" type="text" id="sid" required placeholder="Student ID">
            </div>
            <div class="col-3">
                <label>Email Address</label>
                <input class="form-control" type="text" id="email" required placeholder="Email Address">
            </div>
            </div>
            <br/>
            <b>Select the practical slot:</b>
            <select class="form-control" id="optionsHere" required>
            </select>
            <hr/>
            <input class="btn btn-outline-success" type="submit" value="Register">
            <input class="btn btn-outline-primary" type="reset" value="Clear">
        </form>
    </div>
    </div>
</div>
</div>
<script>
    function checkiffull() {
        let xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById('checkiffull').innerHTML = this.response;
            }
        };
        xmlhttp.open("POST", "checkiffull.php", true);
        xmlhttp.send();
    }
    function getThenumber() {
        checkiffull();
        let chosen = document.getElementById('optionsHere').value;
        let xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById('optionsHere').innerHTML = this.response;
                if(chosen!=='') {
                    document.getElementById('optionsHere').value = chosen;
                }
            }
        };
        xmlhttp.open("POST", "check.php", true);
        xmlhttp.send();
    }
    function checkSlots(mode) {
        let sid = document.getElementById('sid').value;
        let name = document.getElementById('name').value;
        let fname = document.getElementById('fname').value;
        let email = document.getElementById('email').value;
        let slot = document.getElementById('optionsHere').value;
        let xmlhttp2 = new XMLHttpRequest();
        xmlhttp2.open("POST", "student.add.php", true);
        xmlhttp2.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById('response').innerHTML = this.response;
                getThenumber();
            }
        };
            xmlhttp2.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
            xmlhttp2.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            if (mode === 'allow') {
                xmlhttp2.send('name=' + name + '&fname=' + fname + '&sid=' + sid + '&email=' + email + '&slot=' + slot + '&mode=allow');
            } else if (mode === 'deny') {
                xmlhttp2.send('name=' + name + '&fname=' + fname + '&sid=' + sid + '&email=' + email + '&slot=' + slot + '&mode=deny');
            }
            return false;
    }
</script>
</body>
</html>
