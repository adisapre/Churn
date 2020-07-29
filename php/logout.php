<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Thomas A Davis(tad8tt) Adi Sapre (ads4dv)">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />

    <title>PHP form handling</title>
</head>
<body>

<?php session_start(); // make sessions available ?>

<div class="container">
    <br>Thank you for using Churn, <?php if (isset($_SESSION['user'])) echo $_SESSION['user']; ?>. You Have Successfully logged out. <br>
    You will be redirected to the login page shortly!</h1>
</div>
<?php
if (count($_SESSION) > 0)
{
    foreach ($_SESSION as $key => $value)
    {
        unset($_SESSION[$key]);
    }
    session_destroy();
    header('refresh:5; url=../login.html');
}

?>