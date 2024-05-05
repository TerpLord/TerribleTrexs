<!DOCTYPE html>

<html>
<head>
    <title>Color Table</title>
    <meta charset="UTF-8">
    <meta name="author" content="">
	<meta name="description" content="">
	<meta name="keywords" content="">
    <link rel="stylesheet" href="../CSSfiles/table.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
    <body>
        <header>
	    <h1 id="h1_header"><strong>Color Table</strong></h1>	
	        <div class="dropdown">
  			    <button class="dropbtn"></button>
  				    <div class="dropdown-content">
    				    <a href="../index.php">Main Page</a>
    				    <a href="about.php">About Page</a>
    				    <a href="colorTable.php">Table</a>
  				</div>
		    </div>
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

            let colorRows = [];

            // checking to see if the color has been selected before or not
            function checkSelection(dropdown) {
            let selectedColor = dropdown.value;
            let dropdownId = dropdown.id;
            let lastNumber = dropdownId.match(/\d+$/)[0];
            let previousColor = dropdown.dataset.previousColor; // Get the previous value
                console.log(dropdownId);
                console.log(lastNumber);
            let duplicates = false;
            document.querySelectorAll("select").forEach((select) => {
                if (select.id !== dropdownId && select.value === selectedColor) {
                    duplicates = true;
                }
            });

            if (duplicates) {
                // Revert to the previous value
                dropdown.value = previousColor;
            } else {
                // Update the previous value
                dropdown.dataset.previousColor = selectedColor;
            }
            if (!previousColor) {
                dropdown.value = dropdown.options[lastNumber].value;
                dropdown.dataset.previousColor = dropdown.options[lastNumber].value;
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

                colorTable += "<table id=\"colorSelectors\">\n";
                colorTable += tableHeader;
                var column = 0;
                var row = 1;
                let colorNames = Array.from(colorMap.keys()); 
                for (var i = 0; i < colorSize; i++) {
                    let colorName = colorNames[i]; 
                    let color = colorMap.get(colorName); 
                    colorTable += "<tr>";
                    colorRows.push([]);
                    for (var j = 0; j < 2; j++) {
                        if (j == 0) {
                        colorTable += "<td>";

                        colorTable += "<select id='colorDropdown_" + i + "' onchange='checkSelection(this)'>";
                        
                        // Adding options to the dropdown
                        for (let [name, color] of colorMap) {
                            colorTable += "<option value='" + color + "'" + (name === colorName ? " selected" : "") + ">" + name + "</option>";
                        }
                        colorTable += "</input>";
                        colorTable += "<input type='radio' name='color' value=" + i;
                        if (i == 0)
                        {
                            colorTable += " checked";
                        }
                        colorTable += "></td>";
                        } else {
                            colorTable += "<td>" + colorRows[i] +" </td>";
                        }
                    }
                    colorTable += "</tr>";
                }
                colorTable += "</tr>\n</table>";
                tableCode += "<table id=\"squareTable\">\n";
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
                                tableCode += " id=cell|" + String.fromCharCode(64+j) + (i+1)  
                                tableCode += "></td>"
                            }
                            
                        }
                    
                    tableCode += "</tr>";
                    row++;
                }
                    tableCode += "</tr>\n</table>";
                    //document.getElementById(squareTable).style.display = inline-block;
                }
                else if (!(colorSize > 0 && colorSize <= 10))
                {
                    colorTable += "<p>Invalid size for colors, you entered: \"";
                    colorTable += colorInput;
                    colorTable += "\" please enter a number between 1 and 10</p>";
                }
                else if (!(tableSize > 0 && tableSize <= 26))
                {
                    colorTable += "<p>Invalid size for table size, you entered: \"";
                    colorTable += tableInput;
                    colorTable += "\" please enter a number between 1 and 26</p>";
                }
                document.getElementById('colorTable').innerHTML = colorTable;
                document.getElementById('squareTable').innerHTML = tableCode;

                 $("#squareTable").on('click', 'td', function() {
                    var cellId = $(this).attr("id");
                    var [cell, id] = cellId.split('|');
                                      
                    
                    const selectedRow = $('input[name="color"]:checked').val()
                    var selectedValue = $("#colorDropdown_" + selectedRow).val(); 
                    for (var i = 0; i < colorRows.length; i++)
                    {
                        let index = colorRows[i].indexOf(id);
                        if (index !== -1)
                        {
                            colorRows[i].splice(index, 1);
                        }
                    }
                    
                    var rgbValue = $(this).css("background-color");
                    var rgbArray = rgbValue.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
                    var hexCode = "#";
                    for (var i = 1; i <= 3; i++) 
                    {
                        var current = parseInt(rgbArray[i]);
                        var hexComponent = current.toString(16);
                        hexCode += (hexComponent.length === 1 ? "0" + hexComponent : hexComponent);
                    }        
                    if (hexCode == (selectedValue.toLowerCase()))
                    {
                        
                        $(this).css("background-color", "");
                    }
                    else
                    {
                        $(this).css("background-color", selectedValue);
                        colorRows[selectedRow].push(id);
                        colorRows[selectedRow].sort();
                    }
                    for (var i = 0; i < colorRows.length; i++) 
                    {
                        $("#colorSelectors").find("tr:eq(" + i + ") td:eq(1)").text(colorRows[i].join(", "));
                    }
                });

              
            }
            function openPrintPage() 
            {
                window.open('printpage.php', '_blank');
            }

            </script>

            <p>Enter the number of colors options you would like (1-10)</p>
            <input name = "numColors" type = "text" value = "" id="colorInput"/>
            <p>Enter the number or rows and columns you would like to see (1-26)</p>
            <input name = "tableSize" type = "text" value = "" id="tableSizeInput"/>
            <br>
            <br>
            <input name = "generateTable" type = "button" value = "Generate tables" onclick = "drawTable();"/>
            <br>
            <div id="colorTable"> </div>
            <br>
            <div id="squareTable"> </div>

            <button id="printButton" onclick="openPrintPage()">Print</button>

    </body>
</html>