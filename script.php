<script>



    initMap();

    let map, infoWindow;
    let markersList = [];



    async function initMap() {

        // Request needed libraries.

        const {
            Map, InfoWindow
        } = await google.maps.importLibrary("maps");
        const {
            AdvancedMarkerElement
        } = await google.maps.importLibrary("marker");
        const center = {
            lat: 37.30797717620742,
            lng: 13.656473896658605
        };
        map = new Map(document.getElementById("map"), {
            zoom: 19,
            center,
            mapId: "4504f8b37365c3d0",
        });


        infoWindow = new google.maps.InfoWindow();

        try {
            await getLocation();
        } catch (error) {
            console.error("Error getting location:", error);
        }

        deleteMarkers();
        printMarkers();


    }

    function printMarkers() {

        markersList = [];

        let properties = markers();

        for (const property of properties) {
            //console.log(property.position)
            if (distanza(property.position.lat, property.position.lng) < get_rad()) {
                const ame = new google.maps.marker.AdvancedMarkerElement({
                    map,
                    content: buildContent(property),
                    position: property.position,
                    title: property.description,
                });

                ame.addListener("click", () => {
                    toggleHighlight(ame, property);
                });
                markersList.push(ame);
            }
        }
    }

    function deleteMarkers(){
        for (const mk of markersList) {
            mk.setMap(null);
        }
        markersList = []; // Reset the array
    }



    function getLocation() {
        return new Promise((resolve, reject) => {
            navigator.geolocation.getCurrentPosition(
                (position) => {
                    const pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude,
                    };


                    map.setCenter(pos); // Assuming you have a map object defined

                    draggableMarker = new google.maps.Marker({
                        map: map,
                        position: pos,
                        title: "name",
                        draggable: true
                    });




                    draggableMarker.addListener("dragend", (event) => {
                        const position = draggableMarker.position;
                        infoWindow.close();
                        infoWindow.setContent(`Pin dropped at: ${draggableMarker.position.lat()}, ${draggableMarker.position.lng()}`);
                        <?php $myLat = "</script><script>document.write(draggableMarker.position.lat())</script><script>"; ?>
                        infoWindow.open(draggableMarker.map, draggableMarker);
                    });



                    // Call resolve to indicate successful location retrieval
                    resolve({ lat: window.myLat, lng: window.myLng });
                },
                (error) => {
                    // Call reject if there's an error
                    reject(error);
                }
            );
        });
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
        // Assuming you have a function getdb() that establishes a database connection
        $conn = getdb();
        $query = "SELECT * FROM locations";
        $result = mysqli_query($conn, $query);

        // Create an empty array to store marker properties
        $properties = array();

        // Loop through the result set and fetch each row
        while ($row = mysqli_fetch_assoc($result)) {
            // Push marker properties for each row into the properties array
            $properties[] = array(
                'address' => $row['descrizione'],
                'description' => 'description',
                'price' => $row['nome'],
                'type' => checkType($row['tipologia']),
                'bed' => 1,
                'bath' => 1,
                'size' => 1,
                'position' => array(
                    'lat' => (float) $row['lat'],
                    'lng' => (float) $row['lon']
                )
            );
        }
        ?>
        // Initialize an empty array to store marker properties
    var properties = <?php echo json_encode($properties); ?>;
        
    // Return the array of marker properties
    return properties;
}



         function distanza(lat, lng)
        { 
    
        


        myLat = draggableMarker.position.lat();
        myLng = draggableMarker.position.lng();


        var earthRadiusMeter = 6378137; // Earth’s mean radius in meter
        var distanceLat = rad(myLat - lat);
        var distanceLng = rad(myLng - lng);
        var a = Math.sin(distanceLat / 2) * Math.sin(distanceLat / 2) + Math.cos(rad(lat)) * Math.cos(rad(myLat)) * Math.sin(distanceLng / 2) * Math.sin(distanceLng / 2);
        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
        var d = earthRadiusMeter * c;
        return d; // returns the distance in meter


      
    } 

    var rad = function (x) {
        return x * Math.PI / 180;
    };


    document.getElementById('customRange1').addEventListener('input', f);
    function f() {
        var a = document.getElementById("customRange1").value;
        document.getElementById("valoreDinamico").innerHTML = a + "km";
    }

        var circle;
        // Add circle overlay and bind to marker

        $('#sendbtn').click(function () {
            console.log("button clicked");
            var rad = get_rad();
            if (!circle || !circle.setRadius) {
                circle = new google.maps.Circle({
                    map: map,
                    radius: rad,
                    fillColor: '#555',
                    strokeColor: '#ffffff',
                    strokeWeight: 3,
                    strokeOpacity: 0.1
                });
                circle.bindTo('center', draggableMarker, 'position');
            } else circle.setRadius(rad);
            deleteMarkers();
            printMarkers();
        });


function get_rad() {
    return document.getElementById("customRange1").value * 1000;
}




</script>

<script>
    function mod() {

        <?php
        echo "<div class=\"modal fade\" id=\"modal\" tabindex=\"-1\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
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
        </div>"
            ?>

    }





</script>