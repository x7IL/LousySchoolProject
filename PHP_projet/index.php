<!--style="text-align: center;"-->
<body>
<?php
    require('join_db.php');
    $mysqli = join_database();
    if(isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
        $result_can = $mysqli->query("SELECT * FROM user WHERE email = '{$_COOKIE['email']}' AND password ='{$_COOKIE['password']}'");
        $result_can = $result_can->fetch_assoc();
    }
    else {
        $result_can = null;
        echo "Non connecté";
    }
?>


<?php
    //gestion des messages d'erreurs
    if(isset($_COOKIE)) {
        if (isset($_GET['erreur'])) {
            $err = $_GET['erreur'];
            if ($err == 1)
                echo "<h1>Utilisateur ou mot de passe incorrect</h1>";
            if ($err == 2)
                echo "<h1>le nom d'utilisateur existe deja</h1>";
            if ($err == 3)
                echo "<h1>les mots de passe ne correspondent pas</h1>";
        }
    }
?>

<?php
//    if(isset($_GET['recherche'])){
//        $result_can = mysqli_query($mysqli, "SELECT email FROM user WHERE email = '{$_GET['recherche']}'");
//    }
//?>
<?php
    //gestion de connexion, inscription et deconnetion
    if (isset($_GET['deconnexion'])) {
        if ($_GET['deconnexion'] == true) {
            session_unset();
            setcookie("password","");
            setcookie("email","");
            echo "Cookies Not Set";
            header("location: index.php");
        }
    }

if(isset($_GET['inscription']) || isset($_GET['connexion'])){
?>
<h1 style="position: relative;text-align: center"><a href="index.php">Accueil</a></h1><?php }?>
<h1 style="position: relative;text-align: center;">Bienvenu à vous</h1>

<?php
    if($result_can){
        echo"<h1>Connecté sous {$_COOKIE['username']}</h1>"; ?>
        <a style="position: relative;text-align: center" href="../index.php?profile=true"><span>profile</span></a>
        <a style="position: relative;text-align: center" href='../index.php?deconnexion=true'><span>Déconnexion</span></a>
        <?php
    }
    else{
        if(isset($_GET['inscription'])){
            include('log/inscription.php');
        }
        if(isset($_GET['connexion'])){
            include('log/login.php');
        }
?>

    <form method="GET" style="display: inline-block;">
        <?php

        if(!isset($_GET['connexion'])) {
            ?>
            <input type="submit" name="connexion" value='connexion' >
            <?php }
        if(!isset($_GET['inscription'])) {
            ?>
            <input type="submit" name="inscription" value="inscription" >
        <?php } ?>
    </form>

    <?php }
//print_r($_GET['connexion'].$_GET['inscription']);?>
<?php

if($result_can){
    if (isset($_GET['profile'])) {
        if ($_GET['profile'] == true) {
            include('profile.php');

        }
    }
}


mysqli_close($mysqli);
?>
<script>

    function myFunction(){
        document.write("PYAIBSOCJBIHSKJNLDJASJD");
        console.log("ajsbjdhfknskapfjokflaskp");
    }

</script>

<form name="test" method="GET">
    <label><b>Recherche d'utilisateur</b></label>
    <input type="text" placeholder="Search for names.." title="Type in a name">
    <input type="submit" value="myFunction()" hidden/>
    <br>
</form>



<p style="bottom:0;position: absolute;margin-left: 50%">Me Inc. 2022-2023</p>
</body>

