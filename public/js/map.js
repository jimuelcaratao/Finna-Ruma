function initMap() {
    var infoWindow = "",
        addressEl = document.querySelector("#location"),
        latEl = document.querySelector("#latitude"),
        longEl = document.querySelector("#longitude");

    // map options
    var options = {
        zoom: 12,
        center: { lat: 14.5683226, lng: 121.0355904 },
    };
    if ($("#latitude").val() != '' && $("#longitude").val() != '') {
        var options = {
            zoom: 12,
            center: { lat: Number($("#latitude").val()), lng: Number($("#longitude").val()) },
        };
    }
    // create map
    var map = new google.maps.Map(document.getElementById("map"), options);
    // add marker
    marker = new google.maps.Marker({
        position: options.center,
        map: map,
        draggable: true,
    });
    // create searchbox
    searchBox = new google.maps.places.SearchBox(addressEl);
    // when address/searchbox changed
    google.maps.event.addListener(searchBox, "places_changed", function () {
        var places = searchBox.getPlaces(),
            bounds = new google.maps.LatLngBounds(),
            i,
            place,
            lat,
            long,
            resultArray,
            addresss = places[0].formatted_address;

        for (i = 0; (place = places[i]); i++) {
            bounds.extend(place.geometry.location);
            marker.setPosition(place.geometry.location); // Set marker position new.
        }

        map.fitBounds(bounds); // Fit to the bound
        map.setZoom(15); // This function sets the zoom to 15, meaning zooms to level 15.

        lat = marker.getPosition().lat();
        long = marker.getPosition().lng();
        latEl.value = lat;
        longEl.value = long;

        resultArray = places[0].address_components;

        // Closes the previous info window if it already exists
        if (infoWindow) {
            infoWindow.close();
        }
        /**
         * Creates the info Window at the top of the marker
         */
        infoWindow = new google.maps.InfoWindow({
            content: addresss,
        });

        infoWindow.open(map, marker);
    });
    // when marker changed
    google.maps.event.addListener(marker, "dragend", function (event) {
        var lat, long, address, resultArray, citi;

        lat = marker.getPosition().lat();
        long = marker.getPosition().lng();

        var geocoder = new google.maps.Geocoder();
        geocoder.geocode(
            { latLng: marker.getPosition() },
            function (result, status) {
                if ("OK" === status) {
                    address = result[0].formatted_address;
                    resultArray = result[0].address_components;

                    // Get the city and set the city input value to the one selected
                    for (var i = 0; i < resultArray.length; i++) {
                        if (
                            resultArray[i].types[0] &&
                            "administrative_area_level_2" ===
                                resultArray[i].types[0]
                        ) {
                            citi = resultArray[i].long_name;
                        }
                    }
                    addressEl.value = address;
                    latEl.value = lat;
                    longEl.value = long;
                } else {
                    alert(
                        "Geocode was not successful for the following reason: " +
                            status
                    );
                }

                // Closes the previous info window if it already exists
                if (infoWindow) {
                    infoWindow.close();
                }

                /**
                 * Creates the info Window at the top of the marker
                 */
                infoWindow = new google.maps.InfoWindow({
                    content: address,
                });

                infoWindow.open(map, marker);
            }
        );
    });
}
