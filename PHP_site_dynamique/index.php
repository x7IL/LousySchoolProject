<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <title>Title</title>
<body >
    <?php include 'unused/menu.php';?>

    <div id="droite">

        <?php
//        if (isset($_GET["p"])) {
//            echo "vous venez d'entrer :".$_GET['p'];
//        }
        function get_all_files(){
            return scandir(".",1);
        }

        if (isset($_GET["name"])) {
            $a = get_all_files()?>
            <a href="<?php echo $_GET['name'];?>"><?php echo $_GET['name']; ?></a>
            <?php print_r($_GET['name'],"\n")?>
            <?php if (basename($_GET['name'])!="index.php"){
                $f = 0;
                for ($i = 0; $i < count($a); $i++){
                    print_r($_GET['name'] , $a[$i]);
                    if ($_GET['name'] == $a[$i]){
                        include $_GET['name'];
                        $f = 1;
                        break;
                    }
                }
                if ($f != 1) {
                    include "pages/".$_GET['name'];
                }
            }
        }
        else {?>
            <?php require("unused/indexdroite.php");
         }
        ?>
        <div>Ceci est le contenu de la page</div>
    </div>

</body>