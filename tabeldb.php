<?php 
session_start();
require_once "com.php"; 
if(!isset($_SESSION['password'])){
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Markers</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @media (max-width: 810px) {
            .table thead {
                display: none;
            }
            .table, .table tbody, .table tr, .table td {
                display: block;
                width: 100%;
            }
            .table tr {
                margin-bottom: 1rem;
                border-bottom: 1px solid #dee2e6;
            }
            .table td {
                text-align: right;
                 padding-left: 39%; 
                position: relative;
            }
            .table td::before {
                content: attr(data-label);
                position: absolute;
                left: 0;
                width: 50%;
                padding-left: 1rem;
                font-weight: bold;
                text-align: left;
            }
        }
    </style>
</head>
<body>
    <h2>List of markers</h2>
    <div id="tab_div" class="table-responsive">
        <table id="tab" class="table table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Type</th>
                    <th scope="col">Description</th>
                    <th scope="col">Latitude</th>
                    <th scope="col">Longitude</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $conn = getdb();
                $sql = "SELECT locations.id, nome, tipologia.tipo, descrizione, lat, lon FROM locations LEFT JOIN tipologia ON locations.tipo = tipologia.id";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                        <td data-label='ID'>" . $row["id"] . "</td>
                        <td data-label='Name'>" . $row["nome"] . "</td>
                        <td data-label='Type'>" . $row["tipo"] . "</td>
                        <td data-label='Description'>" . $row["descrizione"] . "</td>
                        <td data-label='Latitude'>" . $row["lat"] . "</td>
                        <td data-label='Longitude'>" . $row["lon"] . "</td>
                        <td data-label='Actions'>
                            <a href='update_crud.php?id=" . $row["id"] . "' class='btn btn-primary'>Update</a>
                            <a href=\"#\" class='btn btn-danger' onclick='mod(" . $row["id"] . "); return false;'>Delete</a>
                        </td>
                      </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No data found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Do you want to delete this shop?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="confirmDelete()">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script>
        var currentId = 0; // Variable to store the current ID

        function mod(id) {
            currentId = id; // Set the current ID to be used in the confirmDelete function
            var myModal = new bootstrap.Modal(document.getElementById('modal'));
            myModal.show();
        }

        function confirmDelete() {
            window.location.href = 'delete.php?id=' + currentId; // Redirect to delete PHP script with the current ID
        }
    </script>
</body>
</html>
