<!DOCTYPE html>

<html>
<head>
    <title>Color Table</title>
    <meta charset="UTF-8">
    <meta name="author" content="">
	<meta name="description" content="">
	<meta name="keywords" content="">
    <!-- <link rel="stylesheet" href = "style.css"> -->
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
            const colorMap = new Map();
            colorMap.set(1, "#FF0000");
            colorMap.set(2, "#FFA500");
            colorMap.set(3, "#FFFF00");
            colorMap.set(4, "#008000");
            colorMap.set(5, "#0000FF");
            colorMap.set(6, "#800080");
            colorMap.set(7, "#808080");
            colorMap.set(8, "#A52A2A");
            colorMap.set(9, "#000000");
            colorMap.set(10, "#008080");



            function drawTable()
            {
                var tableCode;
                var colorTable;
                var colorSize = 10;
                let dropdown = 1; 



                colorTable += "<table border = 1>\n";
                var column = 0;
                var row = 1;
                for (var i = 0; i < colorSize; i++)
                {
                  
                    colorTable += "<tr>";
                        for (var j = 0; j < 2; j++) 
                        {
                            if (j == 0)
                            {
                                colorTable += "<td>"
                                //dropdowns
                                colorTable += "</td>"
                            }
                            else
                            {
                                colorTable += "<td"
                                colorTable += "></td>"
                            }
                            
                        }
                    
                    colorTable += "</tr>";
                    row++;
                }
                colorTable += "</tr>\n</table>";


                var size = 10;
                tableCode += "<table border = 1>\n";
                var column = 0;
                var row = 1;
                for (var i = 0; i < size; i++)
                {
                    if (i == 0)
                    {
                        tableCode += "<tr>";
                        for (var k = 0; k <= size; k++)
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
                        for (var j = 0; j <= size; j++) 
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
                console.log(colorTable);
                document.getElementById('colorTable').innerHTML = colorTable;
                document.getElementById('squareTable').innerHTML = tableCode;
            }
            
            
            </script>

            <input name = "test" type = "button" value = "test" onclick = "drawTable();"/>
            <div id="colorTable"></div>
            <div id="squareTable"></div>
        </main>
        


    </body>
</html>