<?php

    /*
        CARD array
         { [0]=> array(16) 
            { 
                ["layout"]=> string(6) "normal" 
                ["supertypes"]=> array(1) { 
                    [0]=> string(5) "Basic" 
                } 
                ["type"]=> string(22) "Creature â€” Elemental" 
                ["types"]=> array(1) { 
                    [0]=> string(8) "Creature" 
                } 
                ["subtypes"]=> array(1) { 
                    [0]=> string(9) "Elemental" 
                }
                ["colors"]=> array(1) { 
                    [0]=> string(4) "Blue" 
                } 
                ["multiverseid"]=> int(94) 
                ["name"]=> string(13) "Air Elemental"  
                ["cmc"]=> int(5) 
                ["rarity"]=> string(8) "Uncommon" 
                ["artist"]=> string(14) "Richard Thomas" 
                ["power"]=> string(1) "4" 
                ["toughness"]=> string(1) "4" 
                ["manaCost"]=> string(9) "{3}{U}{U}" 
                ["text"]=> string(6) "Flying" 
                ["flavor"]=> string(183) "These spirits of the air are winsome and wild and cannot be truly contained. Only marginally intelligent, they often substitute whimsy for strategy, delighting in mischief and mayhem." 
                ["imageName"]=> string(13) "air elemental" 
            }
        }
    */

    $db = new PDO('mysql:host=localhost;dbname=magic;charset=utf8', 'root', '');
    
    try {
        //TODO test actually passign file name.  Add base path var to hold '/home/kevin/develop/magic/'
        //$fileName = $base_path.strtoupper($_Post["file"]);
        $fileName = '/home/kevin/develop/magic/AllSets.json';
    } catch (Exception $e) {
        echo 'File name not sent';
        echo $e->message;
    }

    try {
        $fileStr = file_get_contents($fileName);
    } catch (Exception $e) {
        echo 'File not found';
        echo $e->message;
    }    

    try {
        $sets = json_decode($fileStr, true);
    } catch (Exception $e) {
        echo 'File improperly formatted';
        echo $e->message;
    }

    foreach($sets as $set) {
        insertSet($db, $set);

        foreach($set['cards'] as $card) {
            insertCard($card);
        }

    }

    /*
     *  TODO - needs to check existence of set and update ather than insert
    */
    function insertSet($db, $set) {
        $sql = 'INSERT INTO sets (
            border, code, gatherer_code, release_date, type
        ) VALUES (
            :border, :code, :gatherer_code, :release_date, :type
        )';
        $stmt = $db->prepare($sql);
        $stmt-> execute(array(
           ':border'        => $set['border'], 
           ':code'          => $set['code'], 
           ':gatherer_code' => $set['gathererCode'], 
           ':release_date'  => $set['releaseDate'], 
           ':type'          => $set['type'] 
        ));
    }

    /*
     *  TODO - implement update/insert
     *  TODO - implode array elements so they are saved as comma delimited string http://php.net/manual/en/function.implode.php
     *  TODO - check existence of card array elements before accessing - it looks like some are not always there
    */
    function insertCard($card) {
        echo '<br>';
        var_dump($card);
        echo '<br>';
    }

?>