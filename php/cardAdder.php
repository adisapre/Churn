<?php session_start();

?>
<?php
if (isset($_SESSION['user']))
{
?> <?php
//author: Thomas A Davis (tad8tt) Adi Sapre (ads4dv)
require("connect_db.php");

$cardmodel = $_GET['cardModel']; //pull data for a card from the form

$cardrewards = $_GET['cardRewards'];

$cardbalance = $_GET['cardBalance'];

$cardlimit = $_GET['cardLimit'];

$username = $_SESSION['user']; //store the username in the table for better display on the landing page
//check for duplicate cards
$checker = "SELECT * FROM cardtable WHERE `cardmodel` = '$cardmodel'";
$statement = $db->prepare($checker);
$statement->execute();
$result = $statement->fetchAll();
$num = count($result); //checks for duplicates in card table


if ($num == 1){//updates card in table with new info if the user inputs a card with the same model.
    $delete = "DELETE FROM cardtable WHERE `cardmodel`= '$cardmodel'";
    $statement = $db->prepare($delete);
    $statement->execute();
    $query = "INSERT INTO cardtable (cardmodel, cardrewards, cardbalance, cardlimit, user) VALUES ('$cardmodel', '$cardrewards','$cardbalance', '$cardlimit', '$username')";
            $statement = $db->prepare($query);
            //run query
            $statement->execute();
            //release cursor
            $statement->closeCursor();
            header("location: ../index.php");

}
else{//inserts date from form into table
    $query = "INSERT INTO cardtable (cardmodel, cardrewards, cardbalance, cardlimit, user) VALUES ('$cardmodel', '$cardrewards','$cardbalance', '$cardlimit', '$username')";
        $statement = $db->prepare($query);
        //run query
        $statement->execute();
        //release cursor
        $statement->closeCursor();
        header("location: ../index.php");
}

?>
<?php
}
else{
    header('Location: login.html');
}

?>