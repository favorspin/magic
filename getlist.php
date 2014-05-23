<?php

    $db = new PDO('mysql:host=localhost;dbname=magic;charset=utf8', 'root', 'root');

    $setCode = strtoupper($_GET["set"]);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>List Generator</title>
</head>
<body>
    <div id="placeholder"></div>
    <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script>
    $.getJSON('json/sets/<?php echo $setCode; ?>.json', function(data) {
        var output = "<ol start='0'>";
        for (var i in data.cards) {
            output += "<li>" + data.cards[i].name + "</li>";
        }

        output += "</ol>";
        document.getElementById("placeholder").innerHTML = output;
    });
    </script>
</body>
</html>