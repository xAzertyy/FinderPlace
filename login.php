<!DOCTYPE html>
<html>

<head>
    <title>Accesso</title>

</head>

<body id="log">
    <?php
    session_start();

    require_once ("com.php");


    if (isset($_SESSION['password'])) {

        header("Location: http://localhost/prenotazioni/alredylogged.php");

        

    }

 
    

    if (!isset($_SESSION['$password'])) { ?>

        <h2>Accesso area riservata</h2>


        <table align="center">
            <tr>
                <td>
                    <form style="padding:2vh;" id="login" action="checklogin.php" method="post">

                        <div id="userdiv" class="input-group flex-nowrap">
                            <span id="userspan" class="input-group-text" id="addon-wrapping">Username</span>
                            <input type="text" class="form-control" placeholder="Inserisci qui l'username"
                                aria-label="Username" name="username" aria-describedby="addon-wrapping">
                        </div>

                        <div id="passdiv" class="input-group flex-nowrap">
                            <span id="passspan" class="input-group-text" id="addon-wrapping">Password</span>
                            <input type="password" class="form-control" placeholder="Inserisci la password"
                                aria-label="Password" name="password" aria-describedby="addon-wrapping">
                        </div>
                        <br>

                        <br>
                        <div style="padding-left: 0.6vw;">
                            <input class="btn btn-primary" type="submit" value="Accedi">
                            <a href="index.php"><button type="button" class="btn btn-outline-secondary">Indietro</button></a>
                        </div>
                    </form>
                </td>
            </tr>
        </table>


        <?php
        if (isset($_SESSION['error'])) {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
        }
         ?>

    <?php } ?>
</body>

</html>