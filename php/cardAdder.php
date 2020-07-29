<?php session_start();

?>
<?php
if (isset($_SESSION['user']))
{
?> <?php
require("connect_db.php");

$cardmodel = $_GET['cardModel'];

$cardrewards = $_GET['cardRewards'];

$cardbalance = $_GET['cardBalance'];

$cardlimit = $_GET['cardLimit'];

$username = $_SESSION['user'];
//check for duplicate cards
$checker = "SELECT * FROM cardtable WHERE `cardmodel` = '$cardmodel'";
$statement = $db->prepare($checker);
$statement->execute();
$result = $statement->fetchAll();
$num = count($result);


if ($num == 1){
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
else{
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