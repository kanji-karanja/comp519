<?php
/**
 * Created by PhpStorm.
 * User: Karim K. Kanji
 * Date: 08/02/2019
 * Time: 00:41
 */
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
                <h1 class="text-danger">COMP 519: View Slots</h1>
                <form action="" method="post">
                    <b>Select the practical slot to view:</b>
                    <select class="form-control" id="optionsHere" onchange="generateList()">
                    </select>
                    <form>
                        <div id="Generated"></div>
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
        xmlhttp.open("POST", "../check.php", true);
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
        xmlhttp.open("GET", "generate.php?id="+slot, true);
        xmlhttp.send();
    }
</script>
</body>
</html>
