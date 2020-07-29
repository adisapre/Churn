<?php session_start();

?>
<?php
if (isset($_SESSION['user']))
{
?>
require("connect_db.php");

$cardmodel = $_POST['cardModel'];

$cardrewards = $_POST['cardRewards'];

$cardbalance = $_GET['cardBalance'];

$cardlimit = $_GET['cardLimit'];

$username = $_SESSION['user'];
//check for duplicate cards
$checker = "SELECT * FROM cardtable WHERE `cardmodel` = '$cardmodel'";
$statement = $db->prepare($checker);
$statement->execute();
$result = $statement->fetchAll();
$num = count($result);
echo $num;
exit();


if ($num == 1){
    echo "<script type='text/javascript'>alert('Silly goose, you already have that card!');window.location.href ='../addCard.php';</script>";

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
<?php
}
else{
    header('Location: login.html');
}

?>