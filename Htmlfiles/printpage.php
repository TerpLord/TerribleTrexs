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
    var selectedColorCode = selectElement.value;

    var colorName = colorMap[selectedColorCode];

    var textNode = document.createTextNode(colorName);

    var parentElement = selectElement.parentNode;
    parentElement.insertBefore(textNode, selectElement); 
    parentElement.removeChild(selectElement); 
    });


};
</script>

</body>
</html>
