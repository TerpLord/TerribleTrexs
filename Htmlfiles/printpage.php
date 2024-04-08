<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Print Page</title>
</head>

<style>
    header{
        display: block;
        text-align: center;
    }
    table {
        margin: 0 auto;
        filter: grayscale(100%);
    }


</style>
<body>

<header>
<div id="company-info">
    <h1> Terrible Trexs</h1>
<img src = "../images/greyscale_logo.jpg" width = 100 >
</div>
</header>
<div id = "colorContainer"></div>
<div id = "tableContainer"></div>


<script>
window.onload = function() {



    var tableHTML = window.opener.document.querySelector('#squareTable').outerHTML;
    var colorHTML = window.opener.document.querySelector('#colorTable').outerHTML;


    document.getElementById('tableContainer').innerHTML = tableHTML;
    document.getElementById('colorContainer').innerHTML = colorHTML;


    var selectElements = document.querySelectorAll('#colorTable select');

    selectElements.forEach(function(selectElement) {
    // Get the selected color code
    var selectedColorCode = selectElement.value;

    // Access the color name corresponding to the selected color code from the color map
    var colorName = colorMap[selectedColorCode];

    // Create a text node with the color name
    var textNode = document.createTextNode(colorName);

    // Replace the select element with the text node
    var parentElement = selectElement.parentNode;
    parentElement.insertBefore(textNode, selectElement); // Insert text node before the select element
    parentElement.removeChild(selectElement); // Remove the select element
    });


};
</script>

</body>
</html>
