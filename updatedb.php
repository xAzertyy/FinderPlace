<?php
session_start();
require_once "com.php";

if(!isset($_SESSION['password'])){

    header("Location: login.php");
}

$conn = getdb();

$selectTipo = "SELECT * FROM tipologia ORDER BY tipo";
$resultTipo = mysqli_query($conn, $selectTipo);
?>


<body>
    <h1 align="center">Aggiungi i dati-marker al Database</h1>
    <table align="center">
        <tr>
            <td>
            <div class="shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                <form id="agg" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">


                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping">Nome attività</span>
                        <input type="text" name="Nome" class="form-control" placeholder="inserisci nome..."
                            aria-describedby="addon-wrapping"><br>
                    </div>

                    <div class="input-group">
                        <span class="input-group-text">Latitudine</span>
                        <input type="text" name="lat" class="form-control" placeholder="inserisci latitudine..."
                            aria-describedby="addon-wrapping"><br>
                        <span class="input-group-text">Longitudine</span>
                        <input type="text" name="lon" class="form-control" placeholder="inserisci longitudine..."
                            aria-describedby="addon-wrapping"><br>


                    </div>
                    <div class="input-group">
                        <span class="input-group-text">Descrizione</span>
                        <textarea class="form-control" id="desc" name="descrizione" rows="1"></textarea>
                    </div>



                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping">Tipologia</span>

                        <select name="tipologia" class="form-select" aria-label="Default select example">
                            <option selected>Choose a place</option>
                            <?php while ($row = mysqli_fetch_assoc($resultTipo)) {

                                echo "<option value='" . htmlspecialchars($row["tipo"]) . "'>" . htmlspecialchars($row["tipo"]) . "</option>";
                            } ?>
                        </select>



                    </div>
                    <br>

                    <div id="pre_btt">

                        <input class="btn btn-primary" type="submit" name="submit" value="Invia">
                        <a href="index.php"><button type="button"
                                class="btn btn-outline-secondary">Indietro</button></a>
                    </div>

                </form>
            </td>
        </tr>
    </table>
    </div>
    <?php


    if (isset($_POST['submit'])) {
        $Nome = $_POST['Nome'];
        $lat = (double)$_POST['lat'];
        $lon = (double)$_POST['lon'];
        $desc = $_POST['descrizione'];
        $tipologia = $_POST['tipologia'];

        if ($Nome && $tipologia) {
            $stmt = $conn->prepare("SELECT id FROM tipologia WHERE tipo = ?");

            // Bind the parameter
            $stmt->bind_param("s", $tipologia);
            
            // Execute the statement
            $stmt->execute();
            $id_tipo = $stmt->get_result();
            $stmt->close();


            $insertDati = "INSERT INTO locations (nome, lat, lon, tipo) VALUES (?, ?, ?, (SELECT id FROM tipologia WHERE tipo = ?));";
            $stmt = $conn->prepare($insertDati);
            $stmt->bind_param("sdds", $Nome, $lat, $lon, $tipologia);

            $stmt->execute();  // No need to convert the result to a float

            if ($stmt->affected_rows > 0) {

                ?>
                <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
                    <symbol id="check-circle-fill" viewBox="0 0 16 16">
                        <path
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </symbol>

                    <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
                        <path
                            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </symbol>
                </svg>

                <div class="alert alert-success d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:">
                        <use xlink:href="#check-circle-fill" />
                    </svg>
                    <div>
                        Aggiornamenti riuscito!
                        <?php
                        echo "<p align='center'><strong>L'attività $Nome alla latitudine: $lat e longitudine: $lon e di tipologia $tipologia è stata aggiunta</strong></p>"; ?>
                    </div>
                </div><?php
            } else {
                echo "<p align='center'>Errore nella prenotazione: " . $conn->error . "</p>";
            }
        } else {
            echo "<p align='center'><strong>Compila tutti i campi correttamente!</strong></p>";
        }
    }
    ?>
</body>

</html>