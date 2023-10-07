<!DOCTYPE html>
<html>
<head>
    <title>Arizona With Honey</title>
    <link href="https://fonts.googleapis.com/css?family=Antic+Slab" rel="stylesheet">

</head>
<body style="background-color: brown" >

<?php
session_start();
include "function.php";
join_database();
global $mysqli;

if (isset($_POST["submit"]) and $_POST["submit"] != "") {
    setcookie("pseudo", $_POST["username_u"], time() + 3600);
    $result_can = $mysqli->query("SELECT * FROM joueur WHERE pseudo = '{$_POST["username_u"]}'")->fetch_assoc();
    if ($result_can == Null){
        insert_fields("joueur",["pseudo" => $_POST["username_u"], "x" => rand(1, 99) * 10, "y" => rand(1, 99) * 10]);
        $result_can = $mysqli->query("SELECT * FROM joueur WHERE pseudo = '{$_POST["username_u"]}'")->fetch_assoc();
        echo "<h2>Bienvenue seigneur ".$_POST["username_u"]."</h2>";
    }
    else{
        echo "<h2>Bonjour seigneur ".$_POST["username_u"]."</h2>";
    }
}
else{
    echo "vous êtes pas connecté";
}

echo $result_can['id'];

?>


<br><br><br>

<canvas id="AWH" width="1200" height="1000"></canvas>
<canvas id="canvas"  height="1000">
    <button id="button1">Creer un barbare</button>
    <button id="button2">Augmenter energie max</button>
    <button id="button3">Augmenter energie/sec</button>
    <button id="button4">Augmenter ressource/sec</button>
    <button id="button5">Augmenter pdv max</button>
    <button id="button6">Augmenter pdv/sec</button>
    <button id="button7">Attaquer</button>
    <button id="button8">Augmenter ressource max</button>
</canvas>

<style>
    #AWH {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>

</body>

<script>
    const board_border = 'black';
    const board_background = "blue";

    resizeTo(300, 300);

    // allié

    let energie = <?=$result_can['energie'];?>;
    let energie_max = <?=$result_can['energie_max'];?>;
    let energie_sec = <?=$result_can['energie_sec'];?>;

    let ressource = <?=$result_can['ressource'];?>;
    let ressource_max = <?=$result_can['ressource_max'];?>;
    let ressource_sec = <?=$result_can['ressource_sec'];?>;

    let pdv = <?=$result_can['vitalite'];?>;
    let pdv_max = <?=$result_can['vitalite_max'];?>;
    let pdv_reg = <?=$result_can['vitalite_sec'];?>;



    //gamerule
    let temp = 0;
    let incx = 0;
    let incy = 0;

    let pas = 10;
    let acceleration = 10;
    let acceleration_sleep = 200;


    function rand_10(min, max){
        return Math.round((Math.random()*(max-min)+min)/10)*10;
    }

    function rand(min, max){
        return Math.round((Math.random()*(max-min)+min));
    }


    // stat advseraire bot 1vs1
    let coax = <?php echo $result_can["x"] ?> ;//rand_10(10,990);
    let coay = <?php echo $result_can["y"] ?>;
    let adcx = rand_10(10,990);
    let adcy = rand_10(10,990);

    let adr = rand(0,50);   // r : ressour
    let ade = rand(0,50);   // e : energie
    let adv = 10;           // v : vitalite
    let adt = rand(0,30);   // t : troupe

    //////



    /// pour les cbts
    let bool1 = 0;

    // Get the canvas element
    const initial = document.getElementById("AWH");
    // Return a two dimensional drawing context
    const carte = initial.getContext("2d");
    // Start game
    main();

    // main function called repeatedly to keep the game running
    function main() {

        setTimeout(function onTick() {
            // reload la map
            clear_board();


            let troupe = <?=$result_can['troupe'];?>;

            // dessiner carre player soit emme
            carte.fillRect(coax, coay, 10, 10);
            carte.strokeRect(coax, coay, 10, 10);


            // dessiner carre adversaire 1vs1 bot
            carte.fillRect(adcx, adcy, 10, 10);
            carte.strokeRect(adcx, adcy, 10, 10);
            //-----------------------------------------


            // carre affichage stats
            // x : y --> placer le carre  //  x : y --> faire le carre
            carte.fillRect(1000, 0, 200, 1000);
            carte.font = "20px Calibri";
            carte.fillStyle = "white";
            carte.strokeRect(1000, 0, 200, 1000);


            //affichage des stats
            carte.strokeText("Vitalité :"+pdv+"/"+pdv_max, 1000, 50);
            carte.strokeText("Energie :"+energie+"/"+energie_max, 1000, 70);
            carte.strokeText("Ressource :"+ressource+"/"+ressource_max, 1000, 90);
            carte.strokeText("Troupe :"+troupe, 1000, 110);
            carte.fillText("Vitalité :"+pdv+"/"+pdv_max, 1000, 50);
            carte.fillText("Energie :"+energie+"/"+energie_max, 1000, 70);
            carte.fillText("Ressource :"+ressource+"/"+ressource_max, 1000, 90);
            carte.fillText("Troupe :"+troupe, 1000, 110);

            carte.strokeText("Energie/sec :"+energie_sec, 1000, 210);
            carte.strokeText("Ressource/sec :"+ressource_sec, 1000, 230);
            carte.strokeText("Vitalité/sec :"+pdv_reg, 1000, 250);
            carte.fillText("Energie/sec :"+energie_sec, 1000, 210);
            carte.fillText("Ressource/sec :"+ressource_sec, 1000, 230);
            carte.fillText("Vitalité/sec :"+pdv_reg, 1000, 250);


            carte.fillText("coax :"+coax, 1000, 290);
            carte.fillText("coay :"+coay, 1000, 310);
            carte.fillText("adcx :"+adcx, 1000, 330);
            carte.fillText("adcy :"+adcy, 1000, 350);

            carte.fillText("troupe x :"+(coax+incx), 1000, 390);
            carte.fillText("troupe y :"+(coay+incy), 1000, 410);

            // calcul satt
            if(energie < energie_max){
                energie+=energie_sec;
            }
            if(energie>2 && ressource < ressource_max){
                ressource+=ressource_sec;
                energie-=2;
            }
            if(ressource>2 && pdv < pdv_max){
                pdv+=pdv_reg;
                ressource-=2;
            }


            const xhr = new XMLHttpRequest();
            const url = 'http://localhost/jeu_php/db.php';

            xhr.open("POST", url, true);
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    JSON.parse(xhr.responseText);
                }
            };
            const data = JSON.stringify({id:'<?=$result_can['id']?>',
                res: ressource, ene:energie, vit:pdv,
                resmax: ressource_max, enemax:energie_max, vitmax:pdv_max,
                ressec: ressource_sec, enesec:energie_sec, vitsec:pdv_reg,
                tro : troupe});
            xhr.send(data);

            if(temp === 1){
                carte.fillRect(coax+incx, coay+incy, 10, 10);
                // Draw a border around the snake part
                carte.strokeRect(coax+incx, coay+incy, 10, 10);

                if(coax+incx>adcx){
                    incx-=pas;
                }
                if(coax+incx<adcx){
                    incx+=pas;
                }
                if(coay+incy>adcy){
                    incy-=pas;
                }
                if(coay+incy<adcy){
                    incy+=pas;
                }
                if(coax+incx === adcx && coay+incy === adcy){
                    temp=2;
                    incx=0;
                    incy=0;
                    if(troupe > adt){

                        bool1 = 1;
                        troupe -= adt;
                        pas = 5;
                    }
                    else{
                        troupe -= adt;
                        if(troupe<0){
                            troupe*=0;
                        }
                        temp =0;
                    }

                }
            }
            if(temp === 2){
                carte.fillRect(adcx+incx, adcy+incy, 10, 10);
                // Draw a border around the snake part
                carte.strokeRect(adcx+incx, adcy+incy, 10, 10);

                if(adcx+incx>coax){
                    incx-=pas;
                }
                if(adcx+incx<coax){
                    incx+=pas;
                }
                if(adcy+incy>coay){
                    incy-=pas;
                }
                if(adcy+incy<coay){
                    incy+=pas;
                }
                if (bool1 === 1) {
                    carte.fillText("troupe adver battue :" + adt, 1000, 450);
                }
                else{
                    carte.fillText("troupe adversaire :" + adt, 1000, 450);
                }
                if(adcx+incx === coax && adcy+incy === coay){
                    temp=0;
                    incx=0;
                    incy=0
                    if(bool1 === 1) {
                        ressource += adr;
                        energie += ade;
                        adcx = rand_10(10,990);
                        adcy = rand_10(10,990);
                        adr = rand_10(10,40);
                        ade = rand_10(10,40);
                        bool1 = 0;
                    }
                }

            }

            <!--            ,vitalite,ressource,energie-->

            // console.log(ressource);
            main();
        }, 100)
    }

    // draw a border around the canvas
    function clear_board() {
        //  Select the colour to fill the drawing
        carte.fillStyle = board_background;
        //  Select the colour for the border of the canvas
        carte.strokestyle = board_border;
        // Draw a "filled" rectangle to cover the entire canvas
        carte.fillRect(0, 0, initial.width, initial.height);
        // Draw a "border" around the entire canvas
        carte.strokeRect(0, 0, initial.width, initial.height);
    }

</script>


<script>
    const canvas = document.getElementById('canvas');
    const ctx = canvas.getContext('2d');
    const button1 = document.getElementById('button1');
    const button2 = document.getElementById('button2');
    const button3 = document.getElementById('button3');
    const button4 = document.getElementById('button4');
    const button5 = document.getElementById('button5');
    const button6 = document.getElementById('button6');
    const button7 = document.getElementById('button7');
    const button8 = document.getElementById('button8');

    document.addEventListener('focus', redraw, true);
    document.addEventListener('blur', redraw, true);
    canvas.addEventListener('click', handleClick, false);
    redraw();

    function redraw() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        drawButton(button1, 20, 20);
        drawButton(button2, 20, 80);
        drawButton(button3, 20, 140);
        drawButton(button4, 20, 200);
        drawButton(button5, 20, 260);
        drawButton(button6, 20, 320);
        drawButton(button7, 20, 380);
        drawButton(button8, 20, 440);
    }

    function handleClick(e) {
        // Calculate click coordinates
        const x = e.clientX - canvas.offsetLeft;
        const y = e.clientY - canvas.offsetTop;

        // Focus button1, if appropriate
        drawButton(button1, 20, 20);
        if (ctx.isPointInPath(x, y)) {
            button1.focus();
            if(ressource>10) {
                ressource -= 10;
                troupe +=1;
            }
        }

        drawButton(button2, 20, 80);
        if (ctx.isPointInPath(x, y)) {
            button2.focus();
            if(ressource>20 && energie>19) {
                ressource -= 20;
                energie -=20;
                energie_max+=10;
            }
        }

        drawButton(button3, 20, 140);
        if (ctx.isPointInPath(x, y)) {
            button3.focus();
            if(ressource>39 && energie>39) {
                energie_sec +=1;
                ressource-=40;
                energie-=40;
            }
        }

        drawButton(button4, 20, 200);
        if (ctx.isPointInPath(x, y)) {
            button4.focus();
            if(ressource>39 && energie>39) {
                ressource_sec +=1;
                ressource-=40;
                energie-=40;
            }
        }

        drawButton(button5, 20, 260);
        if (ctx.isPointInPath(x, y)) {
            button5.focus();
            if(ressource>39 && energie>39) {
                pdv_max += 50;
                ressource-=40;
                energie-=40;
            }
        }

        drawButton(button6, 20, 320);
        if (ctx.isPointInPath(x, y)) {
            button6.focus();
            if(ressource>39 && energie>39) {
                pdv_reg +=1;
                ressource-=40;
                energie-=40;
            }
        }

        drawButton(button7, 20, 380);
        if (ctx.isPointInPath(x, y)) {
            button7.focus();
            if(troupe>0 && temp!== 1 && temp !== 2 ) {
                temp = 1;
            }

        }

        drawButton(button8, 20, 440);
        if (ctx.isPointInPath(x, y)) {
            button8.focus();
            if(ressource>20 && energie>19) {
                ressource -= 20;
                energie -=20;
                ressource_max+=10;
            }

        }


    }

    function drawButton(el, x, y) {
        const active = document.activeElement === el;
        const width = 150;
        const height = 40;

        // Button background
        ctx.fillStyle = active ? 'pink' : 'lightgray';
        ctx.fillRect(x, y, width, height);

        // Button text
        ctx.font = '15px sans-serif';
        ctx.textAlign = 'center';
        ctx.textBaseline = 'middle';
        ctx.fillStyle = active ? 'blue' : 'black';
        ctx.fillText(el.textContent, x + width / 2, y + height / 2);

        // Define clickable area
        ctx.beginPath();
        ctx.rect(x, y, width, height);

        // Draw focus ring, if appropriate
        ctx.drawFocusIfNeeded(el);
    }
</script>

<a href="deco.php"><button id="deconnexion" onclick="">Déconnexion</button></a>

</html>




<?php
//$ressource2 = "<script>document.write(ressource)</script>";
//$energie2 = "<script>document.write(energie)</script>";
//$vitalite2 = "<script>document.write(pdv)</script>";
//$ressource_max2 = "<script>document.write(ressource_max)</script>";
//$energie_max2 = "<script>document.write(energie_max)</script>";
//$vitalite_max2 = "<script>document.write(pdv_max)</script>";
//$ressource_sec2 = "<script>document.write(ressource_sec)</script>";
//$energie_sec2 = "<script>document.write(energie_sec)</script>";
//$vitalite_sec2 = "<script>document.write(pdv_reg)</script>";
//$troupe2 = "<script>document.write(troupe)</script>";
//
//$sql = "UPDATE joueur SET
//                  ressource = '$ressource2',
//                  energie = '$energie2',
//                  vitalite = '$vitalite2',
//                  ressource_max = '$ressource_max2',
//                  energie_max = '$energie_max2',
//                  vitalite_max = '$vitalite_max2',
//                  ressource_sec = '$ressource_sec2',
//                  energie_sec = '$energie_sec2',
//                  vitalite_sec = '$vitalite_sec2',
//                  troupe = '$troupe2'
//              WHERE id = '{$result_can['id']}'";
//$mysqli->query($sql);
//
//?>