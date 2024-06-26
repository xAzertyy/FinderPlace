<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finder Place</title>
    <link rel="stylesheet" href="style.css">
</head>

<body
    class="<?php echo (preg_match('/Mobile|Android|iPhone|iPad/', $_SERVER['HTTP_USER_AGENT']) ? 'mobile' : 'desktop'); ?>">
    <?php include_once "com.php";
include_once "navbar.php";
    $conn = getdb();

    $selectTipo = "SELECT tipo FROM tipologia GROUP BY tipo";
    $resultTipo = mysqli_query($conn, $selectTipo);
    ?>

    <div><br>
        <div id="chooseness">
            <div class="left shadow-lg p-3 mb-5 bg-body-tertiary rounded"><br>
                <form action="locationFilter">
                    <select class="form-select" id="filter">
                        <option selected>All</option>
                        <?php while ($row = mysqli_fetch_assoc($resultTipo)) {
                            echo "<option value='" . htmlspecialchars($row["tipo"]) . "'>" . htmlspecialchars($row["tipo"]) . "</option>";
                        } ?>
                    </select>
                </form>
                <div id="selectedTipo">All <i class="fa fa-infinity"></i></div>
            </div>

            <div class="centered">
                <button class="btn btn-secondary" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">Visualizza lista</button>
            </div>



            <div class="right shadow-lg p-3 mb-5 bg-body-tertiary rounded" style="padding: 0rem !important;">

                <!-- <input disabled type="text" id="valoreDinamico" value="10" >km -->
                <div style="display: inline;" id="valoreDinamico">10</div>km 


                <div class="controls">
                    <button id="decrease" style="float: left;">-</button>
                    <input style="width: 30vh;" value="10.0" type="range" class="form-range" min="0.5" max="25.0"
                        step="0.5" id="customRange1">
                    <button id="increase" style="float: right;">+</button>
                </div>
            </div>

        </div>
    </div>



    <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
        id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Lista marker visualizzati</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <p id="sidebar">Try scrolling the rest of the page to see this option in action.</p>
        </div>
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
        });
    </script>
</body>
<?php include_once "script.php"; ?>

</html>