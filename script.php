<script>



    function f() {
        var a = document.getElementById("customRange1").value;
        document.getElementById("valoreDinamico").innerHTML = a + "km";
    }
    document.getElementById('customRange1').addEventListener('input', f);


    async function initMap() {
        let properties = markers();
        // Request needed libraries.
        const { Map } = await google.maps.importLibrary("maps");
        const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");
        const center = { lat: 37.30797717620742, lng: 13.656473896658605 };
        const map = new Map(document.getElementById("map"), {
            zoom: 19,
            center,
            mapId: "4504f8b37365c3d0",
        });

        for (const property of properties) {
            const AdvancedMarkerElement = new google.maps.marker.AdvancedMarkerElement({
                map,
                content: buildContent(property),
                position: property.position,
                title: property.description,
            });

            AdvancedMarkerElement.addListener("click", () => {
                toggleHighlight(AdvancedMarkerElement, property);
            });
        }
    }

    function toggleHighlight(markerView, property) {
        if (markerView.content.classList.contains("highlight")) {
            markerView.content.classList.remove("highlight");
            markerView.zIndex = null;
        } else {
            markerView.content.classList.add("highlight");
            markerView.zIndex = 1;
        }
    }

    function buildContent(property) {
        const content = document.createElement("div");

        content.classList.add("property");
        content.innerHTML = `
    <div class="icon">
        <i aria-hidden="true" class="fa fa-icon fa-${property.type}" title="${property.type}"></i>
        <span class="fa-sr-only">${property.type}</span>
    </div>
    <div class="details">
        <div class="price">${property.price}</div>
        <div class="address">${property.address}</div>
        <div class="features">
        <div>
            <i aria-hidden="true" class="fa fa-bed fa-lg bed" title="bedroom"></i>
            <span class="fa-sr-only">bedroom</span>
            <span>${property.bed}</span>
        </div>
        <div>
            <i aria-hidden="true" class="fa fa-bath fa-lg bath" title="bathroom"></i>
            <span class="fa-sr-only">bathroom</span>
            <span>${property.bath}</span>
        </div>
        <div>
            <i aria-hidden="true" class="fa fa-ruler fa-lg size" title="size"></i>
            <span class="fa-sr-only">size</span>
            <span>${property.size} ft<sup>2</sup></span>
        </div>
        </div>
    </div>
    `;
        return content;
    }



    initMap();


    <?php
    function checkType($tipologia)
    {


        switch ($tipologia) {
            case "pizzeria":
                return "pizza-slice";
            case "cafe":
                return "mug-hot";
            case "restaurant":
                return "utensils";
            case "bakery":
                return "bread-slice";
            case "pastry shop":
                return "cookie";
            case "fastfood":
                return "burger";
            case "pub":
                return "beer-mug-empty";
            default:
                return "question";

        }
    }



    ?>
    function markers() {
        <?php
        $conn = getdb();
        $query = "SELECT * FROM locations";
        $result = mysqli_query($conn, $query);

        echo "properties = [";

        while ($row = mysqli_fetch_assoc($result)) {
            $tipoAttuale = $row['tipologia'];
            $typeString = checkType($tipoAttuale);

            echo "{";
            echo "address: '" . $row['descrizione'] . "',";
            echo "description: 'descriptionPlaceholder',";
            echo "price: '" . $row['nome'] . "',";
            echo "type: '" . $typeString . "',";
            echo "bed: 0,";
            echo "bath: 4,";
            echo "size: 1000,";
            echo "position: {";
            echo "lat: " . $row['lat'] . ",";
            echo "lng: " . $row['lon'];
            echo "},";
            echo "},";
        }

        echo "];";

        ?>
        return properties;

    }



</script>

<script>

    function mod() {


        $('#modal').modal('show');
        <?php
        

        echo "
        <div class=\"modal fade\" id=\"modal\" tabindex=\"-1\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
            <div class=\"modal-dialog\">
                <div class=\"modal-content\">
                    <div class=\"modal-header\">
                        <h1 class=\"modal-title fs-5\" id=\"exampleModalLabel\">Are you sure</h1>
                        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
                    </div>
                    <div class=\"modal-body\">
                        You want delete this shop?
                    </div>
                    <div class=\"modal-footer\">
                        <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Close</button>
                        <button type=\"button\" class=\"btn btn-primary\">Delete</button>
                    </div>
                </div>
            </div>
        </div>
        
        "


            ?>

    }

</script>