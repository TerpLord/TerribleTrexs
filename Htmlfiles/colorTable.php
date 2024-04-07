<!DOCTYPE html>

<html>
<head>
    <title>Color Table</title>
    <meta charset="UTF-8">
    <meta name="author" content="">
	<meta name="description" content="">
	<meta name="keywords" content="">
    <link rel="stylesheet" href = "../CSSFiles/table.css"> 
</head>
    <body>
    <main>
        <header>
            <h1>Color table</h1>
        </header>

            <script> 
            let red = "#FF0000";
            let orange = "#FFA500";
            let yellow = "#FFFF00";
            let green = "#008000";
            let blue = "#0000FF";
            let purple = "#800080";
            let grey = "#808080";
            let brown = "#A52A2A";
            let black = "#000000";
            let teal = "#008080";
            const colorMap = new Map([
                ["red", "#FF0000"],
                ["orange", "#FFA500"],
                ["yellow", "#FFFF00"],
                ["green", "#008000"],
                ["blue", "#0000FF"],
                ["purple", "#800080"],
                ["grey", "#808080"],
                ["brown", "#A52A2A"],
                ["black", "#000000"],
                ["teal", "#008080"]
            ]);

// checking to see if the color has been slected before or not
            function checkSelection(dropdown) {
                let selectedColor = dropdown.value;
                let dropdownId = dropdown.id;

                
                let duplicates = false;
                document.querySelectorAll("select").forEach((select) => {
                 if (select.id !== dropdownId && select.value === selectedColor) {
                    duplicates = true;
                    }
                });

                if (duplicates) {
                dropdown.value = ""; // Reset the selection to empty might want to change this most recent color selected
                // Inform the user of the error this is not working as of now
                document.getElementById('error').innerText = "Error: Two of the same colors cannot be selected.";
                } else {
                 document.getElementById('error').innerText = ""; // Clear any previous error messages
                }
            }

            function updateColor(dropdown, rowIndex, columnIndex) {
                let selectedColor = dropdown.value;
                let cellId = "colorCell_" + rowIndex + "_" + columnIndex;
                document.getElementById(cellId).style.backgroundColor = selectedColor;
             }


            function drawTable()
            {
                var tableCode;
                var colorTable;
                let dropdown = 1; 

                let colorSize = document.getElementById('colorInput').value;
                let tableSize = document.getElementById('tableSizeInput').value;
                console.log(colorSize);
                console.log(tableSize);

                colorTable += "<table border = 1>\n";
                var column = 0;
                var row = 1;
                let colorNames = Array.from(colorMap.keys()); 
                for (var i = 0; i < colorSize; i++) {
                    let colorName = colorNames[i]; 
                    let color = colorMap.get(colorName); 
                    colorTable += "<tr>";
                    for (var j = 0; j < 2; j++) {
                        if (j == 0) {
                        colorTable += "<td>";

                        colorTable += "<select id='colorDropdown_" + i + "' onchange='checkSelection(this)'>";
                        // Adding options to the dropdown
                        for (let [name, color] of colorMap) {
                            colorTable += "<option value='" + color + "'" + (name === colorName ? " selected" : "") + ">" + name + "</option>";
                        }
                        colorTable += "</select>";
                        colorTable += "</td>";
                        } else {
                            colorTable += "<td style='background-color:" + color + "'></td>";
                        }
                    }
                    colorTable += "</tr>";
                }
                colorTable += "</table>";


                tableCode += "<table border = 1>\n";
                var column = 0;
                var row = 1;
                for (var i = 0; i < tableSize; i++)
                {
                    if (i == 0)
                    {
                        tableCode += "<tr>";
                        for (var k = 0; k <= tableSize; k++)
                        {
                            tableCode += "<td>"   
                            if (column > 0)
                            {
                                tableCode += String.fromCharCode(64+column); 
                                column++;
                            }
                            else
                            {
                                column++;
                            }
                            tableCode += "</td>"
                        }
                        tableCode += "</tr>";
                    }
                    tableCode += "<tr>";
                        for (var j = 0; j <= tableSize; j++) 
                        {
                            if (j == 0)
                            {
                                tableCode += "<td>"
                                tableCode += (row);
                                tableCode += "</td>"
                            }
                            else
                            {
                                tableCode += "<td "
                                tableCode += "></td>"
                            }
                            
                        }
                    
                    tableCode += "</tr>";
                    row++;
                }
                tableCode += "</tr>\n</table>";
                document.getElementById('colorTable').innerHTML = colorTable;
                document.getElementById('squareTable').innerHTML = tableCode;
            }
            
            
            </script>
            <input name = "numColors" type = "text" value = "Enter the number of colors (1-10)" id="colorInput"/>
            <br>
            <br>
            <input name = "tableSize" type = "text" value = "Enter the table size (1-26)" id="tableSizeInput"/>
            <br>
            <br>
            <input name = "generateTable" type = "button" value = "Generate tables" onclick = "drawTable();"/>
            <div id="colorTable"></div>
            <div id="squareTable"></div>
        </main>
        


    </body>
</html>