<div id="gauche" >
    <h1>Site web</h1>
    <div class="header">
        <ul>
            <li><a href="../index.php" >Accueil</a></li>
            <li><a href="../index.php?pages=accueil.php">autre page</a></li>
        </ul>
    </div>
    <?php
    for ($i=0; $i<10; $i++) {
        echo "Je suis dans la boucle $i <br>";
    }
    ?>
    <p>Les fichiers du directoire courant:</p>
    <?php
    $a = scandir(".",1);
    for ($i = 0; $i < count($a); $i++) {   //foreach($array as $k => $v)
        $f = basename($a[$i], ".php");
        if (".php" == strrchr($a[$i], '.') and ($f != "menu") and ($f !="index")){?>
<!--             <form action="index.php" method="GET">-->

<!--                 <input type="submit" onclick="index.php" value="--><?php //echo $a[$i] ?><!--" />-->
                <?php $_POST['e'] = $a[$i]; ?>
                 <a id="e" href="../index.php?name=<?php echo $a[$i]?>"><?php echo $a[$i] ?></a>
<!--             <button type="submit" n" value="--><?php //echo $a[$i] ?><!--">--><?php //echo $a[$i] ?><!--</button>-->
<!--            </form>-->
<!--            --><?php //echo "<a href='$a[$i]'> $a[$i]<br> </a>" ?>

        <?php }
    }
    ?>
    <br>
    <p>Les fichiers du dossier 'pages' :</p>
    <?php
    $a = scandir("./pages",1);
    for ($i = 0; $i < count($a); $i++) {   //foreach($array as $k => $v)
        $f = basename($a[$i], ".php");
        if (".php" == strrchr($a[$i], '.') and ($f != "menu") and ($f !="index")){?>
            <!--             <form action="index.php" method="GET">-->
            <!--                 <input type="submit" onclick="index.php" value="--><?php //echo $a[$i] ?><!--" />-->
            <a id="e" href="../index.php?name=<?php echo $a[$i]?>"><?php echo $a[$i] ?></a>
            <!--             <button type="submit" n" value="--><?php //echo $a[$i] ?><!--">--><?php //echo $a[$i] ?><!--</button>-->
            <!--            </form>-->
            <!--            --><?php //echo "<a href='$a[$i]'> $a[$i]<br> </a>" ?>

        <?php }
    }
    ?>
    <p style="bottom:0;position: fixed;">Me Inc. 2022-2023</p>
</div>