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


// Create marker 
var marker = new google.maps.Marker({
  position: location,
  map: map,
  title: 'Hello World!' // Optional: add a tooltip text.
});


// Add circle overlay and bind to marker
var circle = new google.maps.Circle({
  map: map,
  radius: 1000,    // 10 miles in metres
  fillColor: '#AA0000'
});
circle.bindTo('center', marker, 'position');




