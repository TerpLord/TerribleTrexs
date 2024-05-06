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
    var colorHTML = window.opener.document.querySelector('#colorSelectors').outerHTML;
    var tableHTML = window.opener.document.querySelector('#squareTable').outerHTML;

    
    colorHTML = colorHTML.replace(/<select.*?select>/g, function(match) {
        var selectedColorName = match.match(/<option.*?selected.*?>(.*?)<\/option>/)[1];
        var hexCode = match.match(/<option.*?selected.*?value="(.*?)".*?>/)[1];
        return `<span>${selectedColorName} (${hexCode})</span>`;
    });

   
    colorHTML = colorHTML.replace(/<input.*?radio.*?>/g, '');


    colorHTML = colorHTML.replace(/<td.*?>/g, '<td>'); 
    tableHTML = tableHTML.replace(/<td.*?>/g, '<td>'); 

   
    document.getElementById('colorContainer').innerHTML = colorHTML;
    document.getElementById('tableContainer').innerHTML = tableHTML;

    
    var cells = document.querySelectorAll('#colorContainer td, #tableContainer td');
    cells.forEach(function(td) {
        td.style.backgroundColor = 'white'; 
    });
};
</script>
</body>
</html>
