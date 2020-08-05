<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token, Accept-Encoding');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT');

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);


//author: Thomas A Davis (tad8tt) Adi Sapre (ads4dv)
require("connect_db.php");

$cardmodel = $request->cardModel ; //pull data for a card from the form

$cardrewards = $request->cardRewards;

$cardbalance = $request->cardBalance;

$cardlimit = $request->cardLimit;

$username = $request->username; //store the username in the table for better display on the landing page
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
