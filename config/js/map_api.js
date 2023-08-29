var platform = new H.service.Platform({
    'apikey': 'hpSPdwU1DaymxCsxbBkwD7eV0MtmFvNWhn_FY4aRlFc'
});

// Obtain the default map types from the platform object:
var defaultLayers = platform.createDefaultLayers();

// let loadingP = document.getElementById("loading");
// loadingP.remove();

// Instantiate (and display) a map object:
var map = new H.Map(document.getElementById('ride_map'),
    defaultLayers.vector.normal.map, {
        zoom: 15
    });

// map.addLayer(defaultLayers.vector.normal.traffic);


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
var clickeddriversvg = '<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#009dff}</style><path d="M135.2 117.4L109.1 192H402.9l-26.1-74.6C372.3 104.6 360.2 96 346.6 96H165.4c-13.6 0-25.7 8.6-30.2 21.4zM39.6 196.8L74.8 96.3C88.3 57.8 124.6 32 165.4 32H346.6c40.8 0 77.1 25.8 90.6 64.3l35.2 100.5c23.2 9.6 39.6 32.5 39.6 59.2V400v48c0 17.7-14.3 32-32 32H448c-17.7 0-32-14.3-32-32V400H96v48c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32V400 256c0-26.7 16.4-49.6 39.6-59.2zM128 288a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm288 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64z"/></svg>';
var drivericon =  new H.map.Icon(driversvg);
var clickeddrivericon =  new H.map.Icon(clickeddriversvg);

let rideInfo_div = document.getElementById("rideInfo");

if(navigator.geolocation) {
    let html_driver_details;
    let ride_detail_info;
    navigator.geolocation.getCurrentPosition(position => {
        let customer_pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
        };
        var customer_marker = new H.map.Marker(customer_pos,{icon: customericon});
        map.addObject(customer_marker);
        map.setCenter(customer_pos);
        // console.log("customer pos: ");
        // console.log(customer_pos);

        fetch('../api/getAllDriver.php').then(response => response.json()).then(data => {
            //  console.log(data.content);
            let drivers = data.content;
            let driver_marker;
            drivers.forEach(driver => {
                let driver_pos = {
                    lat: driver.latitude,
                    lng: driver.longitude
                };
                
                //distance = Math.sqrt(Math.pow((customer_pos.lat - driver_pos.lat),2) + Math.pow((customer_pos.lng - driver_pos.lng),2));
                distance = haversineDistance(customer_pos.lat, customer_pos.lng, driver_pos.lat, driver_pos.lng)
                
                if(distance <= 2){
                    console.log("drv dist from user: ",distance);
                    driver_marker = new H.map.Marker(driver_pos,{icon: drivericon});
                    map.addObject(driver_marker);
                    // console.log("driver pos: ");
                    // console.log(driver_pos);

                    //show driver and vehicle info(like car model name and image, distance from user in km, estamated time to reach the customer, driver name, image and contact number? ) when clicked on driver marker
                    // Track the clicked state
                    // let isClicked = false;
                    driver_marker.addEventListener('tap', function() {
                        // if(isClicked){
                        //     this.setIcon(drivericon);
                        //     isClicked = false;
                        // }
                        // else{
                        //     this.setIcon(clickeddrivericon);
                        //     isClicked = true;
                        // }
                        const driver_loc = this.getGeometry();
                        console.log("driver pos: ", driver_loc.lat, driver_loc.lng);
                        fetch('../api/getRideInfo.php',{
                            method: 'POST',
                            headers: {
                                'Content-type': 'application/json'
                            },
                            body: JSON.stringify({
                                lat: driver_loc.lat,
                                lng: driver_loc.lng
                            })
                        }).then(response => {
                            if(response.ok){
                                return response.json();
                            }else{
                                throw new Error(`Network response was not ok (status ${response.status})`);
                            }
                        }).then(data => {
                            //  console.log(data.content[0].name);

                            //create a html elements to show driver and vehicle info
                            let carReqMsg_p = document.getElementById("carReqMsg");
                            if(carReqMsg_p != null){
                                 carReqMsg_p.remove();
                            }

                            
                            if(rideInfo_div != null){
                                rideInfo_div.innerHTML = ``;
                            }
                            // console.log(data.content[0].hasAC);
                            if(data.content[0].hasAC === "1"){
                                data.content[0].hasAC = "✅";
                            }
                            else{
                                data.content[0].hasAC = "❌";
                            }
                            html_driver_details = `
                            <p id="estTime">Estimated time: <b>10 min</b></p>
                            <img src="../admin/uploads/${data.content[0].image}" alt="car image" id="rideCarImg">
                            <h4 id="carName">${data.content[0].model}</h4>
                            <div class="car_type">
                                <p>Passenger: ${data.content[0].passenger}</p>
                                <p>type: ${data.content[0].v_type}</p>
                                <p>A/C: ${data.content[0].hasAC}</p>
                            </div>
                            <div class="driver_details">
                                <h5>Driver</h5>
                                <p id="driverName"><b>Name: </b>${data.content[0].name}</p>
                                <p id="driverMobile"><b>Mobile: </b>${data.content[0].mobile}</p>
                            </div>
                            <button class="bookBtn" onclick="showBookOpt(${customer_pos.lat}, ${customer_pos.lng})">Proceed to book</button>`;
                            rideInfo_div.innerHTML = html_driver_details;

                        }).catch(error => {
                            console.error('There has been a problem with your fetch operation:', error);
                        });

                    });
                }
            });
            

        });

    });
    function showBookOpt(customer_pos_lat, customer_pos_lng){
        //change the rideInfo div to show booking options
        // console.log(customer_pos_lat, customer_pos_lng);
        fetch('https://revgeocode.search.hereapi.com/v1/revgeocode?at='+customer_pos_lat+','+customer_pos_lng+'&limit=1&lang=en-US &apiKey=hpSPdwU1DaymxCsxbBkwD7eV0MtmFvNWhn_FY4aRlFc').then(response => {
            if(response.ok){
                return response.json();
            }else{
                throw new Error(`Network response was not ok (status ${response.status})`);
            }
        }).then(data => {
            console.log(data.items[0].address.label);
            // let address = data.items[0].address;
            // let address_str = address.label;
            // console.log(address_str);
            rideInfo_div.innerHTML = "";
            ride_detail_info = `
                    <button id="backBtn" onclick="btnClicked()">
                        <i class="fa-solid fa-arrow-left"></i>
                    </button>
                    <div class="ride_details">
                        <div class="loc_bar">
                        <h5>Pickup location</h5>
                        <input type="text" value="${data.items[0].address.label}"><button><i class="fa-solid fa-location-dot"></i></button>
                        </div>
                        <div class="loc_bar">
                        <h5>Dropoff location</h5>
                        <input type="text" id="dest_loc_input"><button onclick="chooseLocFromMap()"><i class="fa-solid fa-location-dot"></i></button>
                        </div>
                        
                        <div class="ride_price">
                            <span>Ride fee:</span>
                            <b>250 BDT</b>
                        </div>

                        <button class="bookBtn" >Request to book</button>
                    </div>
            `;
            rideInfo_div.innerHTML = ride_detail_info;
        }).catch(error => {
            console.error('There has been a problem with your fetch operation:', error);
        });
        
    }

    function goBackPage(){
        // let rideInfo_div = document.getElementById("rideInfo");
        rideInfo_div.innerHTML = ``;
        rideInfo_div.innerHTML = html_driver_details;
    }
}else{
    alert("Geolocation is not supported by this browser.");
}

function haversineDistance(lat1, lon1, lat2, lon2) {
    const R = 6371; // Earth's radius in kilometers
    
    const dLat = (lat2 - lat1) * (Math.PI / 180); // Convert to radians
    const dLon = (lon2 - lon1) * (Math.PI / 180); // Convert to radians
    
    const a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
              Math.cos(lat1 * (Math.PI / 180)) * Math.cos(lat2 * (Math.PI / 180)) *
              Math.sin(dLon / 2) * Math.sin(dLon / 2);
    
    const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
    
    const distance = R * c; // Distance in kilometers
    
    return distance;
}

// let backBtn = document.getElementById("backBtn");
// if(backBtn){
//     backBtn.addEventListener('click', ()=>{
//         console.log("back btn clicked");
//         // goBackPage(html_driver_details);
//     });
// }
// else{
//     console.log("back btn not found");
// }

function btnClicked(){
    console.log("back btn clicked");
    goBackPage();
}

function chooseLocFromMap(){
    console.log("choose loc clciked");
    map.addEventListener('tap', (event) => {
        // Getting the position of the click
        console.log("map clicked");
        const clickedCoords = map.screenToGeo(event.currentPointer.viewportX, event.currentPointer.viewportY);
        // Getting the address of the clicked position
        fetch('https://revgeocode.search.hereapi.com/v1/revgeocode?at=' + clickedCoords.lat + ',' + clickedCoords.lng + '&apiKey=hpSPdwU1DaymxCsxbBkwD7eV0MtmFvNWhn_FY4aRlFc')
          .then(response => response.json())
          .then(data => {
            // Getting the address
            //var address = data['items'][0]['address'];
            console.log(data.items[0].address.label);
            // Setting the address in the text box
            document.getElementById('dest_loc_input').value = data.items[0].address.label;
          })
    });

    map.removeEventListener('tap');
}

