<!DOCTYPE html>

<html>
<head>
    <title>Color Table</title>
    <meta charset="UTF-8">
    <meta name="author" content="">
	<meta name="description" content="">
	<meta name="keywords" content="">
    <link rel="stylesheet" href = "../CSSfiles/table.css"> 

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
                var tableCode = "";
                var colorTable = "";
                let colorInput = document.getElementById('colorInput').value;
                let tableInput = document.getElementById('tableSizeInput').value;
                let colorSize = Number(colorInput);
                let tableSize = Number(tableInput);
                
                if (colorSize > 0 && colorSize <= 10 && tableSize > 0 && tableSize <= 26)
                {
                var tableHeader = "<thead> </thead>";
                let dropdown = 1; 

                colorTable += "<table border = 1>\n";
                colorTable += tableHeader;
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
                colorTable += "</tr>\n</table>";
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
                }
                else if (!(colorSize > 0 && colorSize <= 10))
                {
                    colorTable += "Invalid size for colors, you entered: \"";
                    colorTable += colorInput;
                    colorTable += "\" please enter a number between 1 and 10";
                }
                else if (!(tableSize > 0 && tableSize <= 26))
                {
                    colorTable += "Invalid size for table size, you entered: \"";
                    colorTable += tableInput;
                    colorTable += "\" please enter a number between 1 and 26";
                }
                document.getElementById('colorTable').innerHTML = colorTable;
                document.getElementById('squareTable').innerHTML = tableCode;
            }
            function openPrintPage() 
            {
                window.open('printpage.php', '_blank');
            }
            </script>

            <p>Enter the number of colors you would like to see (1-10)</p>
            <input name = "numColors" type = "text" value = "" id="colorInput"/>
            <p>Enter the number or rows and columns you would like to see (1-26)</p>
            <input name = "tableSize" type = "text" value = "" id="tableSizeInput"/>
            <br>
            <br>
            <input name = "generateTable" type = "button" value = "Generate tables" onclick = "drawTable();"/>
            <div id="colorTable"> </div>
            <div id="squareTable"> </div>

            <button id="printButton" onclick="openPrintPage()">Print</button>


        </main>
    </body>
</html>