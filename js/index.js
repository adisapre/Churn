var rownumber = 0;

function addRow()
{
    if (rownumber = 2) {
        var name= "Discover IT Student";
        var rewards= ["5% Cashback Restaurants", "2% Cashback Grocery Stores", "1% Cashback Everywhere"];
        var benefits= rownumber++;
        var balance= 407;
        var limit= 1000;
    } else if (rownumber = 1) {
        var name= "Amazon Prime Rewards Card";
        var rewards= ["5% Cashback Amazon", "3% Cashback Gas Stations", "4% Cashback Home Improvement", "1% Cashback Everywhere"];
        var benefits= "Interest-free Amazon payments";
        var balance= 3970;
        var limit= 4000;
    } else {
        var name= "Dummy Card";
        var rewards= ["5% Cashback", "3% Cashback", "4% Cashback", "1% Cashback"]
        var benefits= "Useless";
        var balance= 0;
        var limit= 0;
    }

    var delCard="<input type=button value=' X ' onClick='delRow()'>";

    var usage= balance + " / " + limit;

    var rowdata = [name, rewards, benefits, usage, delCard];

    var tableRef = document.getElementById("cardTable");

    var newRow = tableRef.insertRow(tableRef.rows.length);

    newRow.onmouseover = function() {
        tableRef.clickedRowIndex = this.rowIndex;
    };

    var newCell = "";
    var i = 0;
    while (i < 5)
    {
        newCell = newRow.insertCell(i);            // specify which column
        newCell.innerHTML = rowdata[i];            // assign what content
        newCell.onmouseover = this.rowIndex;       // attach row index to the row
        i++;
    }
}

function checkSearch() {
    var msg = document.getElementById("usr-msg");
    if (this.value.length == "a"){}
    msg.textContent = "Search cannot be blank.";
    alert("ayy");
}
var searchInput = document.getElementById("Search");
searchInput.addEventListener('blur', checkSearch, false);

delRow = () =>
{
    if (confirm("Press OK to delete. This action is unrecoverable.") == true)
        document.getElementById("cardTable").deleteRow(document.getElementById("cardTable").clickedRowIndex);
}