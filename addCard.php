<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add a Card</title>
    <meta name="author" content="Thomas A Davis (tad8tt) Adi Sapre (ads4dv)">
    <meta name="description" content="Page to add credit cards to an account.">
    <!--- used bootstrap buttons and inputs on this page, as well as the nav bar CSS --->
    <link id="bootstrap-css" rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src ="js/index.js"></script>
    <link rel="stylesheet" href="styles/index.css">

</head>
<body>
<?php session_start();

?>
<?php
if (isset($_SESSION['user']))
{
?>
<header>
    <!--top navigation bar. Customized template from bootstrap-->
    <nav class="navbar sticky-top navbar-expand-lg navbar-light" style="background-color: #e51e17"> <!--red background-->
        <a class="navbar-brand" href="#"> <!--implementation of logo-->
            <img src="img/churn.jpeg" width="40" height="40" alt="churn_logo">
            Churn
        </a>
        <div class="collapse navbar-collapse"> <!--navigation menu in the top bar-->
            <ul class="navbar-nav"> <!--list of navigation items-->
                <li class="nav-item">
                    <a class="nav-link" href="index.php" class="nav">Home</a> <!--links to index-->
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="addCard.php" class="nav" style="cursor: pointer">Add a Card</a> <!--adds a card on this page-->
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="help.html" class="nav">Help</a> <!--links to help page-->
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="php/logout.php" class="nav">Log Out</a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<form class="centerer">
    <div class="form-group col-md-6" style="padding: 25px 100px 20px 100px position: absolute; left: 25%;">
        <label for="cardModel">Credit Card Model</label>
        <select id="cardModel" class="custom-select" data-live-search="true" required>
            <option value="">Choose...</option>
            <option>Discover IT</option>
            <option>Amazon Prime Rewards Visa Signature</option>
            <option>Chase Freedom Unlimited</option>
            <option>Chase Freedom</option>
            <option>Chase Sapphire Preferred</option>
            <option>Chase Sapphire Reserve</option>
        </select>
    </div>
    <div class="form-group col-md-6" style="padding: 25px 100px 20px 100px position: absolute; left: 25%;">
            <label for="cardRewards">Credit Card Rewards</label>
            <select id="cardRewards" class="custom-select" data-live-search="true" required>
                <option value="">Choose...</option>
                <option>5% cashback Restaurants, 3% cashback Grocery Stores, 1% cashback elsewehere</option>
                <option>5% cashback Amazon, 2% cashback Restaurants, 1% cashback elsewhere</option>
                <option>1.5% cashback everywhere</option>
                <option>5% cashback Restaurants Jan-Jun, 5% cashback Gas Stations Jul-Dec</option>
                <option>4X points Dining, 3X points travel, 2X points elsewhere</option>
                <option>1X points everywhere</option>
            </select>
        </div>
    <div class="form-group col-md-6" style="padding: 25px 100px 20px 100px position: absolute; left: 25%;">
        <label for="cardBalance">Credit Card Balance</label>
        <input type="text" id="cardBalance" class="form-control" placeholder="Current balance on card..." required>
        </input>
    </div>
    <div class="form-group col-md-6" style="padding: 25px 100px 20px 100px position: absolute; left: 25%;">
        <label for="cardLimit">Credit Card Limit</label>
        <input type="text" id="cardLimit" class="form-control" placeholder="Maximum chargeable amount to card..." required>
        </input>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>


</body>
<?php
}
else{
    header('Location: login.html');
}
?>

</html>