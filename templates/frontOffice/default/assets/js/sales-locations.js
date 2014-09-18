var map;
var init_map;
var mapSL;
init_map = function(){
  
    mapSL = {
        "map": null,
        "infowindow": null,
        "geocoder": null,
        "listMarker": [],
        "position": null,
        "icon": icon,
        "locations": []
    };
    
    if (mapSL.map === null) {
        var latLng = new google.maps.LatLng(46.52863469527167,2.43896484375);
        var mapOptions = {
          zoom      : 5,
          center    : latLng,
          mapTypeId : google.maps.MapTypeId.TERRAIN,
          maxZoom   : 20
        };

        mapSL.map = new google.maps.Map(document.getElementById('sales-localisations-map'), mapOptions);
        mapSL.geocoder = new google.maps.Geocoder();
        $.each(locations, function( index, value ) {
            var b = [];
            b['address'] = value.address + ' '+value.zipcode + ' ' + value.city;
            if (value.lat && value.lng) {
                mapSL.listMarker[index] = new google.maps.Marker({
                    position: new google.maps.LatLng(value.lat, value.lng),
                    map: mapSL.map,
                    icon: mapSL.icon
                });
                attachMarker(index, value);
            } else {
                mapSL.geocoder.geocode(b, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        mapSL.listMarker[index] = new google.maps.Marker({
                            position: new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng()),
                            map: mapSL.map,
                            icon: mapSL.icon
                        });
                        attachMarker(index, value);
                    } else {
                        console.log("Actual address can't be geolocated");
                    }
                });
            }
        });
    }  
  
};

function attachMarker(index, data) {
    var marker = mapSL.listMarker[index];
    google.maps.event.addListener(marker, 'click', function() {
        mapSL.infowindow = new google.maps.InfoWindow({
            content: '<div style="line-height:1.35;overflow:hidden;white-space:nowrap;"><strong>' + data.name + '</strong>' +
            '<address style="margin: 0">' + data.address + '<br>' + data.zipcode + ' ' + data.city + '</address></div>'
        });
        mapSL.infowindow.open(mapSL.map, marker);
    });
}
 
google.maps.event.addDomListener(window, 'load', init_map);