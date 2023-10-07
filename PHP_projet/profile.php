<?php

$query = "SELECT * FROM profile WHERE id_user = '{$result_can['id']}'";
$result = $mysqli->query($query);

if ($result) {
    // output data of each row
    echo '<br><br><br>Biographie:';
    while ($row = $result->fetch_assoc()) {
        echo "<h1>{$row['biographie']}</h1>";
    }

    if (isset($_POST['modifier']) && isset($_POST['id'])) {

        $sql = "UPDATE profile SET biographie='{$_POST['modifier']}' WHERE id_user ='{$result_can['id']}'";
        if ($mysqli->query($sql) === TRUE) {
            header("Refresh:0");
        } else {
            echo "Error updating record: " . $mysqli->error;
        }
    }
    ?>
    <form action="" method="POST">
        <input type="text" name="modifier" placeholder="Inserer le message a remplacer"/>
        <input type="hidden" name="id"  value="<?php echo $row['ID']?>" />
        <input type="submit" value="modifier le emssage">
    </form>
<?php
}
?>