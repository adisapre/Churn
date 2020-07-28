<?php
require("connect_db.php");

$name = $_POST['usernamereg'];

$email = $_POST['email'];

$password = md5($_POST['passwordreg']);
//check for duplicate usernames
$checker = "SELECT * FROM userinfo WHERE `username` = '$name'  ";
$statement = $db->prepare($checker);
$statement->execute();
$result = $statement->fetchAll();
$num = count($result);

if ($num == 1){
    echo "<script type='text/javascript'>alert('Username is taken, please try again');window.location.href ='../login.html';</script>";
}
else{
    $query = "INSERT INTO userinfo (username, email, password) VALUES ('$name', '$email','$password')";
    $statement = $db->prepare($query);
    //run query
    $statement->execute();
    //release cursor
    $statement->closeCursor();
    header('location: ../index.php');
}

?>
