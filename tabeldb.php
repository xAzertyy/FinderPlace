<?php require_once "com.php"; ?>


 <h2>List of markers</h2>

<table class="table table-striped">
    <thead class="table-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Type</th>
            <th scope="col">Latitude</th>
            <th scope="col">Longitude</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $conn = getdb();

        $sql = "SELECT ID_pos, Nome, Tipologia, lat, lon FROM locations";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <th scope='row'>" . $row["ID_pos"] . "</th>
                    <td>" . $row["Nome"] . "</td>
                    <td>" . $row["Tipologia"] . "</td>
                    <td>" . $row["lat"] . "</td>
                    <td>" . $row["lon"] . "</td>
                    <td>
                        <a href='update_form.php?id=" . $row["ID_pos"] . "' class='btn btn-primary'>Update</a>
                        <a href='delete.php?id=" . $row["ID_pos"] . "' class='btn btn-danger' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                    </td>
                  </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No data found</td></tr>";
        }
        ?>
    </tbody>
</table>