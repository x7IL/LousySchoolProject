


<form action="verification_inscription.php" method="POST">
    <h2>Inscription</h2>

    <label><b>Nom d'utilisateur</b></label>
    <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>
    <br>

    <label><b>Adresse e-mail</b></label>
    <input type="email" placeholder="Entrer votre adresse nail" name="email" required>
    <br>

    <label><b>Mot de passe</b></label>
    <input type="password" placeholder="Entrer le mot de passe" name="password" required>
    <br>

    <label><b>Verification de mot de passe</b></label>
    <input type="password" placeholder="Re entrer le mot de passe" name="repassword" required>
    <br>

    <label><b>Genre</b></label>
    <input type="radio" name="genre" value="Homme" checked>
    <label for="H">Homme</label>
    <input type="radio" name="genre" value="Femme">
    <label for="F">Female</label>
    <input type="radio" name="genre"  value="Gay">
    <label for="tout">gay</label>
    <br>

    <label><b>Age</b></label>
    <input type="number" placeholder="Entrer votre age" name="age" min="18" max="100" required>
    <br>

    <input type="submit" id='submit' value='valider' >
    <br>


<!--    <button onclick ="window.location='index.php?name=login.php'">Se connecter</button>-->

</form>
