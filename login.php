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
                    <form id="login" action="checklogin.php" method="post">

                        <div class="input-group flex-nowrap">
                            <span class="input-group-text" id="addon-wrapping">Username</span>
                            <input type="text" class="form-control" placeholder="Inserisci qui l'username"
                                aria-label="Username" name="username" aria-describedby="addon-wrapping">
                        </div>

                        <div class="input-group flex-nowrap">
                            <span class="input-group-text" id="addon-wrapping">Password</span>
                            <input type="password" class="form-control" placeholder="Inserisci la password"
                                aria-label="Password" name="password" aria-describedby="addon-wrapping">
                        </div>
                        <br>

                        <br>
                        <input class="btn btn-primary" type="submit" value="Accedi">
                        <a href="index.php"><button type="button" class="btn btn-outline-secondary">Indietro</button></a>

                    </form>
                </td>
            </tr>
        </table>




    <?php } ?>
</body>

</html>