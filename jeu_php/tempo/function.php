<?php



$mysqli = NULL;

function join_database() {
    global $mysqli;

    $mysqli = new mysqli("localhost", "root", "","jeu_ROK");
    if ($mysqli->connect_error) {
        die("<br>Connection failed: " . $mysqli->connect_error);
    }
    return $mysqli;
}

function insert_fields($table, $fields) {
    global $mysqli;
    $tab = array_keys($fields); //ici fields doit etre égale à un tableau ( dans notre cas : le message , l'id et quand le message à été posté)
    $keys = implode(",",$tab);
    $value = implode("','",$fields);

    if(preg_match('/[a-zA-Z_0-9,@!.?] */',$value) == 0){
        print " Mauvaise orthographe ";
        return null;
    }
    $mysqli->query("INSERT INTO $table ($keys) VALUES ('$value')") or die($mysqli->error);

    return 0;
}
?>
