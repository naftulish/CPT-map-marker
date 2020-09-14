var map = document.getElementById('cptmm_map');

if(map){

    map.style.width = map.dataset.width;
    map.style.height = map.dataset.height;
    var cptmm_lat = map.dataset.lat;
    var cptmm_lng = map.dataset.lng;

var mymap = L.map('cptmm_map', {
    center: [cptmm_lat, cptmm_lng],
    zoom: 13
});

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Icons made by <a href="https://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a>'
}).addTo(mymap);

cptmm_script_map.forEach(e => {

    var myIcon = L.icon({
        iconUrl: e.icon,
        iconSize: [40, 45],
        iconAnchor: [0, 45],
        popupAnchor: [15, -45],
    });

    var default_icon = L.icon({
        iconUrl: e.default_icon,
        iconSize: [40, 45],
        iconAnchor: [0, 40],
        popupAnchor: [15, -40],
    });

    var marker;

    //if is custom icon
    if(e.icon){
        marker = L.marker([e.Latitude, e.Longitude], {icon: myIcon}).addTo(mymap);
    }else{
        marker = L.marker([e.Latitude, e.Longitude], {icon: default_icon}).addTo(mymap);
    }

    //if is text for popup
    if(e.popUp){

        var cptmm_link_to_post = '';

        if(e.link){
            cptmm_link_to_post = "<br><a target='_blank' class='ctpmm_link_to_post' href='"+ e.link +"'>"+ e.textLink +"</a>"
        }

        var cptmm_popup_text = "<span class='cptmm_popup_text'>"+ e.popUp +"</span>";

        marker.bindPopup(cptmm_popup_text + cptmm_link_to_post);
    }
      
});

if(cptmm_script_map_settings.geo){
    //checks if is user location allowd
    getLocation();
}

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(setMapLocation);
    }
}


//if location allowd - set view of map to user location
function setMapLocation(position){
    
    //set the coordinates to map
    mymap.setView([position.coords.latitude, position.coords.longitude],12);
    
    //add marker for user position
    var marker = L.marker([position.coords.latitude, position.coords.longitude]).addTo(mymap);
    
    //open popUp for users position
    marker.bindPopup('you are here').openPopup();
}

}
