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





    <div class="left"><br>

        <select class="form-select">
            <option selected>Choose a place</option>
            <?php while ($row = mysqli_fetch_assoc($resultTipo)) {
                echo "<option value='" . htmlspecialchars($row["tipo"]) . "'>" . htmlspecialchars($row["tipo"]) . "</option>";
            } ?>
        </select>

        <label style="position: relative;" class="form-label">Select a range: </label>
        <input style="width: 15rem;" value="5" type="range" class="form-range" min="1" max="15" step="1"
            id="customRange1"><br>
        Range: <p style="display: inline;" id="valoreDinamico">5km</p>
    </div>

    <div id="map"></div>

    <!-- prettier-ignore -->
    <script>(g => { var h, a, k, p = "The Google Maps JavaScript API", c = "google", l = "importLibrary", q = "__ib__", m = document, b = window; b = b[c] || (b[c] = {}); var d = b.maps || (b.maps = {}), r = new Set, e = new URLSearchParams, u = () => h || (h = new Promise(async (f, n) => { await (a = m.createElement("script")); e.set("libraries", [...r] + ""); for (k in g) e.set(k.replace(/[A-Z]/g, t => "_" + t[0].toLowerCase()), g[k]); e.set("callback", c + ".maps." + q); a.src = `https://maps.${c}apis.com/maps/api/js?` + e; d[q] = f; a.onerror = () => h = n(Error(p + " could not load.")); a.nonce = m.querySelector("script[nonce]")?.nonce || ""; m.head.append(a) })); d[l] ? console.warn(p + " only loads once. Ignoring:", g) : d[l] = (f, ...n) => r.add(f) && u().then(() => d[l](f, ...n)) })
            ({ key: "AIzaSyCz5IMpbFzjKdjQIvsjwILT6KLggb7NLK8", v: "weekly" });</script>


    
</body>
<?php
    include_once "script.php";
?>
</html>