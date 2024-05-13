<?php session_start(); ?>
<html>

<head>

    <title>Finder place</title>

</head>

<body>
    <?php include_once "com.php";

    $conn = getdb();

    $selectTipo = "SELECT tipo FROM tipologia group by tipo";
    $resultTipo = mysqli_query($conn, $selectTipo);
    ?>

    <div class="left shadow-lg p-3 mb-5 bg-body-tertiary rounded"><br>
        <form action="locationFilter">
            <select class="form-select">
                <option selected>Choose a place</option>
                <?php while ($row = mysqli_fetch_assoc($resultTipo)) {
                    echo "<option value='" . htmlspecialchars($row["tipo"]) . "'>" . htmlspecialchars($row["tipo"]) . "</option>";
                } ?>
            </select>
        </form>
    </div>


    <div class="right shadow-lg p-3 mb-5 bg-body-tertiary rounded">

        <p  style="display: inline;" id="valoreDinamico">20</p>km
        <div>
            
            <label style="position: relative;" class="form-label">Select a range: </label>
            <input style="width: 15rem;" value="20" type="range" class="form-range" min="1" max="50" step="1" id="customRange1"><br>
        </div>
    </div>



    <div class="right ">
        <button class="btn btn-primary" id="sendbtn">Invia</button>
    </div>

    <div id="map"></div>

    <script>
        (g => {
            var h, a, k, p = "The Google Maps JavaScript API",
                c = "google",
                l = "importLibrary",
                q = "__ib__",
                m = document,
                b = window;
            b = b[c] || (b[c] = {});
            var d = b.maps || (b.maps = {}),
                r = new Set,
                e = new URLSearchParams,
                u = () => h || (h = new Promise(async (f, n) => {
                    await (a = m.createElement("script"));
                    e.set("libraries", [...r] + "");
                    for (k in g) e.set(k.replace(/[A-Z]/g, t => "_" + t[0].toLowerCase()), g[k]);
                    e.set("callback", c + ".maps." + q);
                    a.src = `https://maps.${c}apis.com/maps/api/js?` + e;
                    d[q] = f;
                    a.onerror = () => h = n(Error(p + " could not load."));
                    a.nonce = m.querySelector("script[nonce]")?.nonce || "";
                    m.head.append(a)
                }));
            d[l] ? console.warn(p + " only loads once. Ignoring:", g) : d[l] = (f, ...n) => r.add(f) && u().then(() => d[l](f, ...n))
        })({
            key: "AIzaSyCz5IMpbFzjKdjQIvsjwILT6KLggb7NLK8",
            v: "weekly",
            // Use the 'v' parameter to indicate the version to use (weekly, beta, alpha, etc.).
            // Add other bootstrap parameters as needed, using camel case.
        });
    </script>


</body>
<?php
include_once "script.php";
?>


</html>