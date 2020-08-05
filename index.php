<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Churn</title>
    <meta name="author" content="Thomas A Davis (tad8tt) Adi Sapre (ads4dv)">
    <meta name="description" content="Primary landing page for Churn, featuring search and the user's credit cards">
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
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php" class="nav">Home</a> <!--links to index-->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost:4200" class="nav" style="cursor: pointer">Add a Card</a> <!--adds a card on this page-->
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

    <section id="searchBar" style="padding: 50px 200px 40px 200px"><!--spacing for search bar-->
        <div class="row">
            <input class="form-control" type="text" placeholder="Find optimal card by Category, Store, etc." id="Search"><!--setting defaults for search bar-->
            <a class="btn btn-default" href="searchResults.php" style="background-color:#0066ff; color:white; width:100%;">Search</a><!--search button-->
        </div>
    </section>
<div class="row">
    <span class="col-5"></span>
    <h1 class="col-2" style="text-align: center"><?php echo $_SESSION['user'] ?>'s Cards</h1>
    <span class="col-4"></span>
</div>




</body>
<?php
    $connect=mysqli_connect("localhost","class","123456","churn"); //connect to the database

    $cardtable = mysqli_query(mysqli_connect("localhost","class","123456","churn"),"SELECT * FROM cardtable"); //get to the card table in the database

     echo "<table id='cardTable' class='table'>
                <thead>
                     <tr>
                         <th>Name</th> <!--names of the columns-->
                         <th>Point Multipliers</th>
                         <th>Balance </th>
                     </tr>
                 </thead>"; //set up table for better viewing

    while($row = mysqli_fetch_array($cardtable)) { //output data row by row, checking for the user each time
        if($row['user'] == $_SESSION['user']) {
            echo "<tr><td>" . $row['cardmodel'] . "</td><td>" . $row['cardrewards'] . "</td><td>" . $row['cardbalance'] . " / " . $row['cardlimit'] . "</td></tr>"; //columns of table
            echo "<br />";//line break at end of row
        }
    }

      echo "</table>"; //end the table

    mysqli_close($connect);//end connection to database
?>

<?php
}
else{
    header('Location: login.html');
}
?>

</html>