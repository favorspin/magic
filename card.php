<?php

    $db = new PDO('mysql:host=localhost;dbname=magic;charset=utf8', 'root', 'root');
    $setCode = strtoupper($_GET["set"]);
    $cardNum = $_GET["card"];

?>

<html>
<body>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="styles/base.css">
        <link rel="stylesheet" type="text/css" href="styles/layout.css">
        <link rel="stylesheet" type="text/css" href="styles/skeleton.css">
        <link rel="stylesheet" type="text/css" href="styles/style.css">
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
        <title id="title"></title>
    </head>
    <nav>
        <!-- Navigation will go here -->
    </nav>
    <main>
        <table class="cardInfo">
            <tr>
                <th>Image</th>
                <th>Details</th>
            </tr>
            <tr>
                <td id="image"></td>
                <td>
                    <table class="cardDetail">
                        <tr>
                            <td>Card Name:</td>
                            <td id="cardName"></td>
                        </tr>
                        <tr>
                            <td>Mana Cost:</td>
                            <td id="manaCost"></td>
                        </tr>
                        <tr>
                            <td>Type:</td>
                            <td id="type"></td>
                        </tr>
                        <tr>
                            <td>Rarity:</td>
                            <td id="rarity"></td>
                        </tr>
                        <tr>
                            <td>Text:</td>
                            <td id="text"></td>
                        </tr>
                        <tr>
                            <td>Flavor Text:</td>
                            <td id="flavor"></td>
                        </tr>
                        <tr>
                            <td>Set:</td>
                            <td id="setName"></td>
                        </tr>
                        <tr>
                            <td>Artist:</td>
                            <td id="artist"></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </main>

    <script>
  $.getJSON('AllSets.json', function(data) {

        document.getElementById("image").innerHTML= "<img src=http://api.mtgdb.info/content/card_images/" +
        data.<?php echo $setCode; ?>.cards[<?php echo $cardNum; ?>].multiverseid + ".jpeg />";

        document.getElementById("cardName").innerHTML= data.<?php echo $setCode; ?>.cards[<?php echo $cardNum; ?>].name;

        document.getElementById("manaCost").innerHTML= data.<?php echo $setCode; ?>.cards[<?php echo $cardNum; ?>].manaCost;

        document.getElementById("type").innerHTML= data.<?php echo $setCode; ?>.cards[<?php echo $cardNum; ?>].type;

        document.getElementById("rarity").innerHTML= data.<?php echo $setCode; ?>.cards[<?php echo $cardNum; ?>].rarity;

        document.getElementById("text").innerHTML= data.<?php echo $setCode; ?>.cards[<?php echo $cardNum; ?>].text;

        document.getElementById("flavor").innerHTML= data.<?php echo $setCode; ?>.cards[<?php echo $cardNum; ?>].flavor;

        document.getElementById("setName").innerHTML= data.<?php echo $setCode; ?>.name;

        document.getElementById("artist").innerHTML= data.<?php echo $setCode; ?>.cards[<?php echo $cardNum; ?>].artist;

        document.getElementById("title").innerHTML= data.<?php echo $setCode; ?>.cards[<?php echo $cardNum; ?>].name;

  });
    </script>
</body>
</html>