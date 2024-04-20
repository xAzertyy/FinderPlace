

function f() {
    var a = document.getElementById("customRange1").value;
    document.getElementById("valoreDinamico").innerHTML = a + "km";
}
document.getElementById('customRange1').addEventListener('input', f);


async function initMap() {
  // Request needed libraries.
  const { Map } = await google.maps.importLibrary("maps");
  const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");
  const center = { lat: 37.30788820405282, lng: 13.656478544595746 };
  const map = new Map(document.getElementById("map"), {
    zoom: 18,
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


const properties = [
  {
    address: "215 Emily St, MountainView, CA",
    description: "Single family house with modern design",
    price: "Ristorante",
    type: "utensils",
    bed: 5,
    bath: 4.5,
    size: 300,
    position: {
      lat: 37.30830848313282,
      lng: 13.656475862341866,
    },
  },
  {
    address: "108 Squirrel Ln &#128063;, Menlo Park, CA",
    description: "Townhouse with friendly neighbors",
    price: "Bisseria",
    type: "pizza-slice",
    bed: 4,
    bath: 4,
    size: 800,
    position: {
      lat: 37.308103677377154,
      lng: 13.656832596137313,
    },
  },
  {
    address: "100 Chris St, Portola Valley, CA",
    description: "Spacious warehouse great for small business",
    price: "Bread",
    type: "bread-slice",
    bed: 4,
    bath: 4,
    size: 800,
    position: {
      lat: 37.30778366726766,
      lng: 13.656913062402745,
    },
  },
  {
    address: "98 Aleh Ave, Palo Alto, CA",
    description: "A lovely store on busy road",
    price: "Cotti due volte",
    type: "cookie",
    bed: 2,
    bath: 1,
    size: 210,
    position: {
      lat: 37.307580993493396,
      lng: 13.656738718841567,
    },
  },
  {
    address: "2117 Su St, MountainView, CA",
    description: "Single family house near golf club",
    price: "Droga legale",
    type: "mug-hot",
    bed: 4,
    bath: 3,
    size: 200,
    position: {
      lat: 37.30763432875002,
      lng: 13.656127175253452,
    },
  },
  {
    address: "197 Alicia Dr, Santa Clara, CA",
    description: "Multifloor large warehouse",
    price: "Cocoa Favara",
    type: "burger",
    bed: 5,
    bath: 4,
    size: 700,
    position: {
      lat: 37.307860469817754,
      lng: 13.656052073409295,
    },
  },
  {
  address: "197 Alicia Dr, Santa Clara, CA",
  description: "Multifloor large warehouse",
  price: "Ceres hub",
  type: "beer-mug-empty",
  bed: 5,
  bath: 4,
  size: 700,
  position: {
    lat: 37.30808447680866,
    lng: 13.656191548262726,
  },
},
];

initMap();
