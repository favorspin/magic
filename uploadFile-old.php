<?php

    $db = new PDO('mysql:host=localhost;dbname=magic;charset=utf8', 'root', '');
    ini_set("memory_limit","1000M");

    try {
        //TODO test actually passign file name.  Add base path var to hold '/home/kevin/develop/magic/'
        //$fileName = $base_path.strtoupper($_Post["file"]);
        $fileName = 'AllSets.json';
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
        $set_id = saveSet($db, $set);

        foreach($set['cards'] as $card) {
            saveCard($db, $set_id, $card);
        }

    }

    /*
     *  TODO - needs to check existence of set and update ather than insert
    */
    function saveSet($db, $set)
    {
        $insert_sql = 'INSERT INTO sets (
            set_name, set_border, set_code, set_gatherer_code, set_release_date, set_type, set_block
        ) VALUES (
            :name, :border, :code, :gathererCode, :releaseDate, :type, :block
        )';

        $update_sql = 'UPDATE sets SET
            set_name = :name,
            set_border = :border,
            set_gatherer_code = :gathererCode,
            set_release_date = :releaseDate,
            set_type = :type,
            set_block = :block
        WHERE set_code = :code';

        $find_sql = 'SELECT * FROM sets WHERE set_code = ?';

        $select = $db->prepare($find_sql);
        $select->execute(array($set['code']));
        $current_set = $select->fetch();

        if ($current_set) {
            echo "updating set coded ", $current_set['set_code'], PHP_EOL;
            $sql = $update_sql;
            $update_id = $current_set['set_id'];
        } else {
            echo "<b>inserting set coded ", $set['code'], "<br /></b>";
            $sql = $insert_sql;
            $update_id = false;
        }

        $stmt = $db->prepare($sql);

        bindArray($stmt, 'name', 'name', $set, 'set_name', $current_set);
        bindArray($stmt, 'border', 'border', $set, 'set_border', $current_set);
        bindArray($stmt, 'code', 'code', $set, 'set_code', $current_set);
        bindArray($stmt, 'gathererCode', 'gathererCode', $set, 'set_gatherer_code', $current_set);
        bindArray($stmt, 'releaseDate', 'releaseDate', $set, 'set_release_date', $current_set);
        bindArray($stmt, 'type', 'type', $set, 'set_type', $current_set);
        bindArray($stmt, 'block', 'block', $set, 'set_block', $current_set);

        $stmt->execute();

        //if it was an insert, return new id, otherwise return given set_id
        if ($update_id) {
            return $update_id;
        } else {
            return $db->lastInsertId();
        }
    }

    function saveCard($db, $set_id, $card)
    {

        $insert_sql = 'INSERT INTO cards (
            card_multiverse_id, card_name, card_mana_cost, card_cmc, card_colors,
            card_type, card_supertypes, card_types, card_subtypes,  card_rarity,
            card_text, card_flavor, card_artist, card_number, card_power,
            card_toughness, card_loyalty, card_layout, card_variations, card_image_name,
            card_watermark, card_border, card_hand, card_life, card_rulings,
            card_foreign_names, card_printings, card_original_text, card_original_type, card_legalities,
            set_id
        ) VALUES (
            :multiverseid, :name, :manaCost, :cmc, :colors,
            :type,  :supertypes, :types, :subtypes, :rarity,
            :cardtext, :flavor, :artist, :cardnumber, :power,
            :toughness, :loyalty, :layout, :variations, :imageName,
            :watermark, :border, :hand, :life, :rulings,
            :foreignNames, :printings, :originalText, :originalType, :legalities,
            :set_id
        )';

        $update_sql = 'UPDATE cards SET
            card_name = :name,
            card_layout = :layout,
            card_supertypes = :supertypes,
            card_type = :type,
            card_types = :types,
            card_subtypes = :subtypes,
            card_colors = :colors,
            card_multiverse_id = :multiverseid,
            card_cmc = :cmc,
            card_rarity = :rarity,
            card_artist :artist,
            card_number = :cardnumber,
            card_power :power,
            card_toughness :toughness,
            card_manaCost = :manaCost,
            card_text = :cardtext,
            card_flavor = :flavor,
            card_image_name = :imageName,
            card_loyalty = :loyalty,
            card_variations = :variations,
            card_watermark = :watermark,
            card_border = :border,
            card_hand = :hand,
            card_life = :life,
            card_rulings = :rulings,
            card_foreign_names = :foreignNames,
            card_printings = :printings,
            card_original_text = :originalText,
            card_original_type = :originalType,
            card_legalities = :legalities,
            set_id = :set_id
        WHERE card_multiverse_id = :multiverseid';

        $current_card = false;
        if(isset($card['multiverseid'])) {
            $find_sql = 'SELECT * FROM cards WHERE card_multiverse_id = ?';
            $select = $db->prepare($find_sql);
            $select->execute(array($card['multiverseid']));
            $current_card = $select->fetch();
        }

        if ($current_card) {
            echo "updating card id ", $current_card['card_multiverse_id'], PHP_EOL;
            $sql = $update_sql;
        } else {
            if (isset($card['multiverseid'])) {
                echo "inserting card ", $card['name'], " mutliverseid ", $card['multiverseid'], "<br />";
            } else {
                echo "inserting card ", $card['name'], " with no multiverseid ", "<br />";
            }
            $sql = $insert_sql;
        }

        $stmt = $db->prepare($sql);

        $stmt->bindValue(":set_id", $set_id, PDO::PARAM_INT);

        bindArray($stmt, 'name', 'name', $card, 'card_name', $current_card);
        bindArray($stmt, 'layout','layout', $card, 'card_layout', $current_card);
        bindArray($stmt, 'supertypes', 'supertypes', $card, 'card_supertypes', $current_card);
        bindArray($stmt, 'type', 'type', $card, 'card_type', $current_card);
        bindArray($stmt, 'types', 'types', $card, 'card_types', $current_card);
        bindArray($stmt, 'subtypes', 'subtypes', $card, 'card_subtypes', $current_card);
        bindArray($stmt, 'colors', 'colors', $card, 'card_colors', $current_card);
        bindArray($stmt, 'multiverseid', 'multiverseid', $card, 'card_multiverse_id', $current_card);
        bindArray($stmt, 'cmc', 'cmc', $card, 'card_cmc', $current_card);
        bindArray($stmt, 'rarity', 'rarity', $card, 'card_rarity', $current_card);
        bindArray($stmt, 'artist', 'artist', $card, 'card_artist', $current_card);
        bindArray($stmt, 'cardnumber', 'number', $card, 'card_number', $current_card);
        bindArray($stmt, 'power', 'power', $card, 'card_power', $current_card);
        bindArray($stmt, 'toughness', 'toughness', $card, 'card_toughness', $current_card);
        bindArray($stmt, 'manaCost', 'manaCost', $card, 'card_mana_cost', $current_card);
        bindArray($stmt, 'cardtext', 'text', $card, 'card_text', $current_card);
        bindArray($stmt, 'flavor', 'flavor', $card, 'card_flavor', $current_card);
        bindArray($stmt, 'imageName', 'imageName', $card, 'card_image_name', $current_card);
        bindArray($stmt, 'loyalty', 'loyalty', $card, 'card_loyalty', $current_card);
        bindArray($stmt, 'variations', 'variations', $card, 'card_variations', $current_card);
        bindArray($stmt, 'watermark', 'watermark', $card, 'card_watermark', $current_card);
        bindArray($stmt, 'border', 'border', $card, 'card_border', $current_card);
        bindArray($stmt, 'hand', 'hand', $card, 'card_hand', $current_card);
        bindArray($stmt, 'life', 'life', $card, 'card_life', $current_card);
        bindArray($stmt, 'rulings', 'rulings', $card, 'card_rulings', $current_card);
        bindArray($stmt, 'foreignNames', 'foreignNames', $card, 'card_foreign_names', $current_card);
        bindArray($stmt, 'printings', 'printings', $card, 'card_printings', $current_card);
        bindArray($stmt, 'originalText', 'originalText', $card, 'card_original_text', $current_card);
        bindArray($stmt, 'originalType', 'originalType', $card, 'card_original_type', $current_card);
        bindArray($stmt, 'legalities', 'legalities', $card, 'card_legalities', $current_card);

        $stmt->execute();
    }

    function bindArray($stmt, $paramater, $in_key, $in_array, $row_key, $row_array)
    {
        $value = false;
        if (!isset($in_array[$in_key])) {
            if (isset($row_array)) {
                $value = $row_array[$row_key];
            }
        }  else {
            $value = $in_array[$in_key];
        }

        if (is_array($value)) {
            $value = implode(',', $value);
        }

        if ($value) {
            $stmt->bindParam(":$paramater", $value, PDO::PARAM_STR);
        } else {
            $stmt->bindValue(":$paramater", null, PDO::PARAM_INT);
        }
    }

?>



