var platform = new H.service.Platform({
    'apikey': 'p1DNUo6FmhaQ0hfzf1itSDbhe-_uJpjZc4LQKwgMu4U'
});

// Obtain the default map types from the platform object:
var defaultLayers = platform.createDefaultLayers();

// let loadingP = document.getElementById("loading");
// loadingP.remove();

// Instantiate (and display) a map object:
var map = new H.Map(document.getElementById('ride_map'),
    defaultLayers.vector.normal.map, {
        zoom: 10
    });

// Create the default UI:
var ui = H.ui.UI.createDefault(map, defaultLayers);

const zoomControl = ui.getControl('zoom');
zoomControl.setVisibility(true);

// Enable the event system on the map instance:
var mapEvents = new H.mapevents.MapEvents(map);

// Instantiate the default behavior, providing the mapEvents object:
var behavior = new H.mapevents.Behavior(mapEvents);

const zoomRectangle = new H.ui.ZoomRectangle({
    // Position the control on the map's viewport
    alignment: H.ui.LayoutAlignment.RIGHT_BOTTOM
  });
ui.addControl('rectangle', zoomRectangle);


//marker icon for Customer
var customersvg = '<svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" ' +
  'width="24px" height="24px" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve">' +
  '<g><path fill="#F76D57" d="M32,52.789l-12-18C18.5,32,16,28.031,16,24c0-8.836,7.164-16,16-16s16,7.164,16,16 c0,4.031-2.055,8-4,10.789L32,52.789z"/><g>' +
  '<path fill="#394240" d="M32,0C18.746,0,8,10.746,8,24c0,5.219,1.711,10.008,4.555,13.93c0.051,0.094,0.059,0.199,0.117,0.289' +
  'l16,24C29.414,63.332,30.664,64,32,64s2.586-0.668,3.328-1.781l16-24c0.059-0.09,0.066-0.195,0.117-0.289' +
  'C54.289,34.008,56,29.219,56,24C56,10.746,45.254,0,32,0z M44,34.789l-12,18l-12-18C18.5,32,16,28.031,16,24' +
  'c0-8.836,7.164-16,16-16s16,7.164,16,16C48,28.031,45.945,32,44,34.789z"/>' +
  '<circle fill="#394240" cx="32" cy="24" r="8"/></g></g></svg>';
var customericon =  new H.map.Icon(customersvg);

//marker icon for Driver
var driversvg = '<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M135.2 117.4L109.1 192H402.9l-26.1-74.6C372.3 104.6 360.2 96 346.6 96H165.4c-13.6 0-25.7 8.6-30.2 21.4zM39.6 196.8L74.8 96.3C88.3 57.8 124.6 32 165.4 32H346.6c40.8 0 77.1 25.8 90.6 64.3l35.2 100.5c23.2 9.6 39.6 32.5 39.6 59.2V400v48c0 17.7-14.3 32-32 32H448c-17.7 0-32-14.3-32-32V400H96v48c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32V400 256c0-26.7 16.4-49.6 39.6-59.2zM128 288a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm288 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64z"/></svg>';
var drivericon =  new H.map.Icon(driversvg);

if(navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(position => {
        let customer_pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
        };
        var customer_marker = new H.map.Marker(customer_pos,{icon: customericon});
        map.addObject(customer_marker);
        map.setCenter(customer_pos);
        console.log("customer pos: ");
        console.log(customer_pos);

        fetch('../api/getAllDriver.php').then(response => response.json()).then(data => {
            //  console.log(data.content);
            let drivers = data.content;
            drivers.forEach(driver => {
                let driver_pos = {
                    lat: driver.latitude,
                    lng: driver.longitude
                };
                
                distance = Math.sqrt(Math.pow((customer_pos.lat - driver_pos.lat),2) + Math.pow((customer_pos.lng - driver_pos.lng),2));
                
                if(distance <= 100){
                    // console.log(distance);
                    var driver_marker = new H.map.Marker(driver_pos,{icon: drivericon});
                    map.addObject(driver_marker);
                    console.log("driver pos: ");
                    console.log(driver_pos);
                }
            });
        });

    });
}else{
    alert("Geolocation is not supported by this browser.");
}
