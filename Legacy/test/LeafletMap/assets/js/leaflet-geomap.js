
const map = L.map('leafMap')

let marker, circle, zoomed;


navigator.geolocation.watchPosition(mapsuccess, maperror);

function mapsuccess(pos) {

    const lat = pos.coords.latitude;
    const lng = pos.coords.longitude;
    const accuracy = pos.coords.accuracy;
    
    map.setView([lat, lng], 13); // Set the map view to the current location

   
    if(marker){
        map.removeLayer(marker);
        map.removeLayer(circle);
    }



    marker = L.marker([lat, lng]).addTo(map).bindPopup('Your Approximate Location <br /> Lat: '+ lat + ' <br /> Long: ' +lng);

    circle = L.circle([lat, lng], { radius: accuracy }).addTo(map);

    if(!zoomed){
        zoomed = map.fitBounds(circle.getBounds());
    }

    map.setView([lat, lng]); // Set the map view to the current location
    
    
    
}

function maperror(err) {

    if( err.code === 1) {
        alert('Please Allow geolocation Access')
    }else{
        alert('Cannot get current location access')
        //map.setView([51.505, -0.09]);
    }

   
}



//  var map = L.map('leafMap').setView([51.505, -0.09], 13);

map.setView([28.25255, 83.97669], 8);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);



L.Control.geocoder().addTo(map);
