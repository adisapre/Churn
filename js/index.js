var rowNumber = 1; //keep track of number of rows for rendering
function addRow()
{
    switch (rowNumber) { //dummy values. Actual implementation to come later
        case 1:
            var name= "Discover IT Student";
            var rewards= ["5% Cashback Restaurants", " 2% Cashback Grocery Stores", " 1% Cashback Everywhere"];
            var benefits= "";
            var balance= 407;
            var limit= 1000;
            break;
        case 2:
            var name= "Amazon Prime Rewards Card";
            var rewards= ["5% Cashback Amazon", " 3% Cashback Gas Stations", " 4% Cashback Home Improvement", " 1% Cashback Everywhere"];
            var benefits= "Interest-free Amazon payments";
            var balance= 3970;
            var limit= 4000;
            break;
        default:
            var name= "Dummy Card";
            var rewards= ["5% Cashback", " 3% Cashback", " 4% Cashback", " 1% Cashback"]
            var benefits= "Useless";
            var balance= 0;
            var limit= 0;
    }

    var delCard="<input type=button value=' X ' onclick='delRow()'>"; //last item is a button that deletes the card

    var usage= balance + " / " + limit; //usage is balance/limit. This is an easier way for the user to see

    var rowdata = [name, rewards, benefits, usage, delCard]; //setting up array which represents a row in the table

    var tableRef = document.getElementById("cardTable"); //table that holds cards

    var newRow = tableRef.insertRow(tableRef.rows.length); //makes a new row

    newRow.onmouseover = function() {
        tableRef.clickedRowIndex = this.rowIndex;
    };

    var newCell = "";
    var i = 0;
    while (i < 5)
    {
        newCell = newRow.insertCell(i);            // find column
        newCell.innerHTML = rowdata[i];            // fill column
        newCell.onmouseover = this.rowIndex;       // attach row index to the row
        i++;
    }
    rowNumber++;
}

function delRow()
{
    if (confirm("Are you sure you want to delete that card?") == true) //check if user really wants to delete card
        document.getElementById("cardTable").deleteRow(document.getElementById("cardTable").clickedRowIndex); //remove row from table
}