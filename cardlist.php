<!DOCTYPE html>
<link rel="stylesheet" href="styles.css">

<section>
    <h3>Card List</h3>
<?php 

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (preg_match_all("([x]+\d)", $_POST['decklist'], $matches)) {
            $quantityArray = $matches[0];
        }

        $deckFilter = ["/(Main Deck:)/","/(Extra Deck:)/","/(Side Deck:)/"];
        $input = preg_replace($deckFilter, "",$_POST['decklist']);

        $deckListArray = preg_split("([x]+\d)", $input);
        
        for($i = 0; $i < count($quantityArray); $i++) {
            $result[] = strrev($quantityArray[$i]). ' ' . $deckListArray[$i];
        }

        foreach($result as $card) {
            echo("<div class='card'>".$card) ."</div>";
            
        }
    }

?>
</section>