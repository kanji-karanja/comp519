<?php
/**
 * Created by PhpStorm.
 * User: Karim K. Kanji
 * Date: 08/02/2019
 * Time: 00:41
 */
session_start();
function error_handler($errno, $errstr)
{

}

set_error_handler("error_handler");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://localhost/cdn/bootstrap/4.2.1/css/bootstrap.min.css">
    <script src="https://localhost/cdn/jquery/jquery.min.js"></script>
    <script src="https://localhost/cdn/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <title>Check Enrolled Students | Lecturer</title>
</head>
<body onload="getThenumber()">
<div class="container-fluid">
    <div class="row">
        <div class="card col-8 offset-2">
            <div class="card-body">
                <?php
                if ($_SESSION['username'] == null) {
                    echo '
<div id="message_submit"></div>
<h4 class="text-danger">Login to view students registered</h4>
<form method="post" action="">
<label>Username:</label>
<input placeholder="Username" class="form-control" type="text" required name="uname">
<label>Password:</label>
<input placeholder="Password" class="form-control" type="password" required name="sec">
<hr>
<button type="submit" name="login" class="btn btn-success btn-block">Log in</button>
</form>
<br/>
Don\'t have an account? <a href="#create" data-toggle="collapse" data-target="#sign_up">Create one.</a>
<div id="sign_up" class="collapse">
<br/>
<form method="post" action="" onsubmit="return validate()">
<label>Username:</label>
<input placeholder="Username" class="form-control" type="text" required name="sign_user" id="sign_user">
<label>Password:</label>
<input placeholder="Password" class="form-control" type="password" required name="sign_pass" id="sign_pass" >
<label>Repeat Password:</label>
<input placeholder="Repeat Password" class="form-control" type="password" required name="sign_passconf" id="sign_passconf">
<hr>
<hr>
<button type="submit" name="signup" class="btn btn-success btn-block">Sign up</button>
</form>
</div>
';
                }
                else {
                    echo '<h1 class="text-danger">COMP 207: View Slots<form class="float-right" action="" method="post"><button class="btn btn-outline-danger" type="submit" name="logout">Logout</button></form></h1>
                <form action="" method="post">
                    <b>Select the practical slot to view:</b>
                    <select class="form-control" id="optionsHere" onchange="generateList()">
                    </select>
                        <div id="Generated"></div>';
                }
                if (isset($_POST['login'])) {
                    $username = $_POST['uname'];
                    $secret = $_POST['sec'];
                    $secret =md5($secret);
                    $conn = new mysqli("localhost", "root", "", "comp519");
                    $sql = "SELECT username,password FROM admins WHERE username='$username' AND password ='$secret'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "
                        <script>
                        document.getElementById('message_submit').innerHTML='<div class=\"alert alert-success\">' +
                         '<b>Success!</b> You are being logged in! </div>';
                        </script>
                        ";
                            $_SESSION['username'] = $row["username"];
                            header("location: ./");
                        }
                    } else {
                        echo "
                        <script>
                        document.getElementById('message_submit').innerHTML='<div class=\"alert alert-danger\">' +
                         'Unable to login. There is no such an account or check your details! </div>';
                        </script>
                        ";
                    }
                }
                if(isset($_POST['logout'])){
                    session_destroy();
                    header('location: ./');
                }
                if(isset($_POST['signup'])){
                    $username =$_POST['sign_user'];
                    $password =$_POST['sign_passconf'];
                    $password=md5($password);
                    $conn = new mysqli("localhost", "root", "", "comp519");
                    $sql = "INSERT INTO admins(username, password) VALUES ('$username','$password')";
                    if($conn->query($sql)===true){
                        echo "
                        <script>
                        document.getElementById('message_submit').innerHTML='<div class=\"alert alert-success\">' +
                         'Successfully created your account. <b>You can now log in</b> </div>';
                        </script>
                        ";
                    }
                    else{
                        echo "
                        <script>
                        document.getElementById('message_submit').innerHTML='<div class=\"alert alert-danger\">' +
                         'Unable to create your account. An error has occurred! </div>';
                        </script>
                        ";
                    }
                }
                ?>

            </div>
        </div>
    </div>
</div>
<script>
    function getThenumber() {
        let xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById('optionsHere').innerHTML = this.response;
            }
        };
        xmlhttp.open("POST", "../check-admin.php", true);
        xmlhttp.send();
    }

    function generateList() {
        let slot = document.getElementById('optionsHere').value;
        let xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById('Generated').innerHTML = this.response;
            }
        };
        xmlhttp.open("GET", "generate.php?id=" + slot, true);
        xmlhttp.send();
    }
    function validate() {
        let pass = document.getElementById('sign_pass').value,confpass = document.getElementById('sign_passconf').value
        if(pass!==confpass){
            document.getElementById('message_submit').innerHTML="<div class='alert alert-danger'>Passwords Don't match!</div>";
            return false;
        }
        else{
            document.getElementById('message_submit').innerHTML="";
            return true;
        }

    }
</script>
</body>
</html>
