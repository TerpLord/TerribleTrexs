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
    }
</style>
<body>

<header>
<div id="company-info">
    <h1> Terrible Trexs</h1>
<img src = "../images/greyscale_logo.jpg" width = 100 >
</div>
</header>
<div id="tableContainer"></div>

<script>
window.onload = function() {

    var tableHTML = window.opener.document.querySelector('#squareTable').outerHTML;
    // Display the table on the print page
    document.getElementById('tableContainer').innerHTML = tableHTML;

};
</script>

</body>
</html>
