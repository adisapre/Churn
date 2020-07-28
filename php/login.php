<?php
require("connect_db.php");

$name = $_POST['username'];

$password = md5($_POST['password']);
//check for duplicate usernames
$checker = "SELECT * FROM userinfo WHERE `username` = '$name' && `password` = '$password' ";
$statement = $db->prepare($checker);
$statement->execute();
$result = $statement->fetchAll();
$num = count($result);

if ($num == 1){
    echo "<script type='text/javascript'>window.location.href ='../index.html';</script>";

}
else{
    echo "<script type='text/javascript'>alert('Username or Password is incorrect/not found');window.location.href ='../login.html';</script>";
}

?>
