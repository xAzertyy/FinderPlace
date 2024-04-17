let map;

async function initMap() {
  const { Map } = await google.maps.importLibrary("maps");

  map = new Map(document.getElementById("map"), {
    center: { lat: 37.30787477294991, lng: 13.656473895880646},
    
    zoom: 21,
  });
}

initMap();


function f() {
    var a = document.getElementById("customRange1").value;
    document.getElementById("valoreDinamico").innerHTML = a + "km";
}
document.getElementById('customRange1').addEventListener('input', f);
