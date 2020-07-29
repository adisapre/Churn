<?php
require("connect_db.php");

$cardmodel = $_POST['cardModel'];

$cardrewards = $_POST['cardRewards'];
//check for duplicate usernames
$checker = "SELECT * FROM cardtable WHERE `cardmodel` = '$cardmodel'";
$statement = $db->prepare($checker);
$statement->execute();
$result = $statement->fetchAll();
$num = count($result);

if ($num == 1){
    echo "<script type='text/javascript'>alert('Silly goose, you already have that card!');window.location.href ='../addCard.html';</script>";

}
else{
    $query = "INSERT INTO cardtable (cardmodel, cardrewards, cardbalance, cardlimit, user) VALUES ('$cardmodel', '$cardrewards','$cardbalance', '$cardlimit', '$username')";
        $statement = $db->prepare($query);
        //run query
        $statement->execute();
        //release cursor
        $statement->closeCursor();
        session_start();
        $_SESSION['user'] = $name;
        $_SESSION['password'] = $password;
        header("location: ../index.php");
}

?>