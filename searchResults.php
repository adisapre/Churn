<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Page Results</title>
    <!--- used bootstrap buttons and inputs on this page, as well as the nav bar CSS --->
    <link id="bootstrap-css" rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/index.css">
    <meta name="author" content="Adi Sapre (ads4dv) and Thomas Davis (tad8tt)">
</head>
<body>
<?php session_start();

?>
<?php
if (isset($_SESSION['user']))
{
?>
<!-- nav bar area-->
<header>
    <nav class="navbar sticky-top navbar-expand-lg navbar-light" style="background-color: #e51e17">
        <a class="navbar-brand" href="#">
            <img src="img/churn.jpeg" width="40" height="40" alt="churn_logo">
            Churn
        </a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php" class="nav">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost:4200" class="nav" style="cursor: pointer">Add a Card</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="help.html" class="nav">Help</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="php/logout.php" class="nav">Log Out</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!--- search results declaration-->
<div class="row">
    <span class="col-5"></span>
    <h1 style="padding: 20px" class="col-2">Search Results</h1>
    <span class="col-4"></span>
</div>
<div class="row">
    <span class="col-4"></span>
    <h3 style="padding: 5px" class="col-6">Search for: "Dummy Search" returned 4 products</h3>
    <span class="col-4"></span>
</div>

<section id="searchBar" style="padding: 50px 200px 40px 200px">
    <input class="form-control" type="text" placeholder="Previous Search to be displayed here" id="Search">
    <a class="btn btn-default" href="searchResults.php" style="background-color:#0066ff; color:white; width:100%;">Search</a><!--search button-->
    <div id="user-msg" class="feedback" style="color:red"></div>
</section>

<!--- results table--->
<table id="searchTable" class="table" >
    <thead>
    <tr class="centerer item">
        <th>Name</th>
        <th>Point Multipliers</th>
        <th>Other Benefits</th>
        <th>Balance </th>
    </tr>
    <tr class="centerer item">
        <td>Dummy Card</td>
        <td>5% Cashback</td>
        <td>Useless</td>
        <td>0 / 0</td>
    </tr>
    <tr class="centerer item">
        <td>Amazing Card</td>
        <td>32% Cashback</td>
        <td>Free Money</td>
        <td>0 / 0</td>
    </tr>
    <tr class="centerer item">
        <td>Not Great Card</td>
        <td>0% Cashback</td>
        <td>Extra Fees</td>
        <td>0 / 0</td>
    </tr>
    <tr class="centerer item">
        <td>The Ideal Card</td>
        <td>3% Cashback</td>
        <td>Free Lunch</td>
        <td>0 / 0</td>
    </tr>

    </tr>
    </thead>
</table>
<!--- event listener for mouseover, highlights box--->
<script>
    var x = document.querySelectorAll(".item");
    x.forEach(function (row) {
            row.addEventListener("mouseover", function () {mOverRow(row)})
            row.addEventListener("mouseout", function () {mOutRow(row)})
        }
    )
    function mOverRow(row) {
        row.style.backgroundColor="lightgoldenrodyellow"

    };
    function mOutRow(row) {
        row.style.backgroundColor="white"
    };
    console.log(x)
</script>

</body>
<?php
}
else{
    header('Location: login.html');
}
?>
</html>