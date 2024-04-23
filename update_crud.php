<?php
session_start();
require_once "com.php";


$conn = getdb();

function updateRecord($conn)
{
    if (isset($_POST['id_pos'], $_POST['nome'], $_POST['lat'], $_POST['lon'], $_POST['tipologia'])) {
        $id = $_POST['id_pos'];
        $Nome = $_POST['nome'];
        $lat = $_POST['lat'];
        $lon = $_POST['lon'];
        $Tipologia = $_POST['tipologia']; // Ensure this matches case in SQL query

        $sql = "UPDATE locations SET nome = ?, lat = ?, lon = ?, tipologia = ? WHERE id_pos = ?";
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            die('MySQL prepare error: ' . $conn->error);
        }
        $stmt->bind_param("sddsi", $Nome, $lat, $lon, $Tipologia, $id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            header("Location: tabeldb.php");
        } else {
            echo "Error updating record: " . $conn->error;
        }
        $stmt->close();
    }
}


function displayForm($conn, $id)
{
    $sql = "SELECT * FROM locations WHERE id_pos = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die('MySQL prepare error: ' . $conn->error);
    }
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $sqlTipo = "SELECT DISTINCT tipo FROM tipologia";
    $resultTipo = mysqli_query($conn, $sqlTipo);

    if ($row) {
        echo
            "<table align=\"center\">
        <tr>
            <td>
        <form id=\"upt\" action='' method='post'>
            <input type='hidden' name='id_pos' value='" . htmlspecialchars($row['id_pos']) . "'>

            <div class=\"input-group flex-nowrap\">
            <span class=\"input-group-text\" id=\"addon-wrapping\">Nome attività</span>
            <input type=\"text\" name=\"nome\" class=\"form-control\" aria-describedby=\"addon-wrapping\"  value='" . htmlspecialchars($row['nome']) . "'><br>
        </div>


            <div class='input-group'>
                <span class='input-group-text'>Latitudine</span>
                <input type='text' name='lat' class='form-control' aria-describedby='addon-wrapping'  value='" . htmlspecialchars($row['lat']) . "'><br>
                <span class='input-group-text'>Longitudine</span>
                <input type='text' name='lon' class='form-control' aria-describedby='addon-wrapping'  value='" . htmlspecialchars($row['lon']) . "'><br>
            </div>

            <div class='input-group flex-nowrap'>
                <span class='input-group-text' id='addon-wrapping'>Tipologia</span>
                <select name='tipologia' class='form-select' aria-label='Default select example'>";
        while ($TipoRow = mysqli_fetch_assoc($resultTipo)) {
            echo "<option value='" . htmlspecialchars($TipoRow["tipo"]) . "'>" . htmlspecialchars($TipoRow["tipo"]) . "</option>";
        }
        echo "</select>
            </div>
            <div id=\"pre_btt\">

            <input class=\"btn btn-primary\" type=\"submit\" name=\"submit\" value=\"Aggiorna\">
            <a href=\"index.php\"><button type=\"button\"
                    class=\"btn btn-outline-secondary\">Indietro</button></a>
        </div>
          </form>
          </td>
          </tr>
      </table>";
    } else {
        echo "No record found.";
    }
    $stmt->close();
}


// Check if form is submitted or a specific record needs to be edited
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    updateRecord($conn);
} else if (isset($_GET['id'])) {
    displayForm($conn, $_GET['id']);
}

$conn->close();
?>