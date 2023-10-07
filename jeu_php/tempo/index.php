<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Arizona with honey</title>
    <link rel="stylesheet" href="../php-sockets/style.css">
</head>
<body>

<form autocomplete='off' class='form' method="post" action="index2.php#">
    <div class='control'>
        <h1>
            Sign In
        </h1>
    </div>
    <div class='control block-cube block-input'>
        <input name='username_u' placeholder='Utilisateur' id="message" type='text' style="color: #fff" autocomplete="off">
        <div class='bg-top'>
            <div class='bg-inner'></div>
        </div>
        <div class='bg-right'>
            <div class='bg-inner'></div>
        </div>
        <div class='bg'>
            <div class='bg-inner'></div>
        </div>
    </div>

    <button class='btn block-cube block-cube-hover' type="submit" name='submit' value='LOGIN' style="color: #fff">
        <div class='bg-top'>
            <div class='bg-inner'></div>
        </div>
        <div class='bg-right'>
            <div class='bg-inner'></div>
        </div>
        <div class='bg'>
            <div class='bg-inner'></div>
        </div>
        <div class='text'>
            Log In
        </div>
    </button>
</form>
</body>
<script>
    var socket  = new WebSocket('ws://localhost:8080');
    var worker = new SharedWorker("index2.php");
    var message = document.getElementById('message');

    function transmitMessage() {
        socket.send( message.value );
    }

    socket.onmessage = function(e) {
        alert( e.data );
    }
</script>
</html>
