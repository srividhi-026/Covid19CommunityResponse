require('./bootstrap');

// Auto Init allows you to initialize all of the Materialize Components with a single function call.
M.AutoInit();

function getLocation() {
    if (navigator.geolocation) {
        let position = navigator.geolocation.getCurrentPosition(showPosition);

        let lat = position.coords.latitude;
        let lng = position.coords.longitude;

        alert('lat:' + lat + '    ' + 'lng:' + lng )
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}
