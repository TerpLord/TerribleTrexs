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

  #squareTable {
    margin: auto;
    height: auto;
    width: 90%;
    border-collapse: collapse;
    aspect-ratio: 1 / 1;
    table-layout: fixed;
  }

   th, td {
    border: 2px solid #000; /* Add a solid black border around each cell */
    text-align:center;
    padding: 0;
  }


  #colorSelectors {
    margin: auto;
    border: 1px solid;
    width: 80%;
    background-color: white;
    
  }

  #colorSelectors tr td:nth-child(1) {
    width: 20%;
    background-color: #000040;
    
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
