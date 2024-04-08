<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Print Page</title>
<link rel="stylesheet" href="../CSSfiles/print.css">
</head>

<body>
<header>

<div id="company-info">
    <h1> Terrible Trexs</h1>
<img src = "../images/greyscale_logo.jpg" width = 100 >
</div>

</header>

<div id = "colorContainer"></div>
<br>
<div id = "tableContainer"></div>

<script>
window.onload = function() {

    var tableHTML = window.opener.document.querySelector('#squareTable').outerHTML;
    var colorHTML = window.opener.document.querySelector('#colorSelectors').outerHTML;

    document.getElementById('tableContainer').innerHTML = tableHTML;
    document.getElementById('colorContainer').innerHTML = colorHTML;


};
</script>
</body>
</html>
