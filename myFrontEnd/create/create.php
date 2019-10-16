<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <title>Create Student</title>

</head>
<body>
<a href="index.php">Home</a>
<br/><br/>
<form action="" method="post" name="form1">
    <table width="25%" border="0">
        <tr>
            <td>Student Number</td>
            <td><input type="text" name="studentId"></td>
        </tr>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <td>Surname</td>
            <td><input type="text" name="surname"></td>
        </tr>
        <tr>
            <td>Phone Number</td>
            <td><input type="text" name="phoneNr"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="Submit" value="Create"></td>
        </tr>
    </table>
</form>


<?php

$curl = curl_init();
$studentId="";
$name="";
$surname="";
$phoneNr="";
$email="";

if(isset($_POST['studentId'])){
    $studentId=$_POST["studentId"];
}
if(isset($_POST['name'])){
    $name=$_POST["name"];
}
if(isset($_POST['surname'])){
    $surname=$_POST["surname"];
}
if(isset($_POST['phoneNr'])){
    $phoneNr=$_POST["phoneNr"];
}
if(isset($_POST['email'])){
    $email=$_POST["email"];
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $studentId=$_POST[$studentId];
    $name=$_POST[$name];
    $surname=$_POST[$surname];
    $phoneNr=$_POST[$phoneNr];
    $email=$_POST[$email];
}
if(isset($_POST['submit'])) {
    curl_setopt_array($curl, array(
        CURLOPT_PORT => "8080",
        CURLOPT_URL => "http://localhost:8080/attendance/student/create",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{\n\t\"studentID\": \$studentID,\n\t\"name\": $name,\n\t\"surname\": $surname,\n\t\"phoneNr\": $phoneNr,\n\t\"email\": $email}",
        CURLOPT_HTTPHEADER => array(
            "Accept: */*",
            "Accept-Encoding: gzip, deflate",
            "Authorization: Basic YWRtaW46Y3B1dFBUYWRtaW4=",
            "Cache-Control: no-cache",
            "Connection: keep-alive",
            "Content-Length: 33",
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        echo $response;
    }
    ?>


    <?php
    function pre_r($array)
    {
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }
}

?>
</body>
</html>