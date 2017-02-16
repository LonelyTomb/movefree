<div class="selectDriver overview">
    <div class="bars row profile">
        <div class="col m10 l6">
            <div class="card-panel center">
                <img src="images/avatar.png" alt="" class="circle responsive-img profile-pic">
                <p class="flow-text driverName">John Doe</p>
                <p class="flow-text driverType">cab Driver</p>
            </div>
        </div>
    </div>
    <div class="bars price row">
        <div class="col m10 l6">
            <div class="card-panel center">
                <p class="time right-align">Est. 10m</p>
                <p class="price left-align">&#8358;100/hr</p>
                <p class="review right-align"></p>
            </div>
        </div>
    </div>
    <div class="bars row map">
        <div class="col m10 l6">
            <div class="card-panel right-align">
                <div class="mapCont" id="map"> </div>
                <a class="btn-floating btn-large waves-effect waves-light green"><i class="material-icons">done</i></a>
            </div>
        </div>
    </div>
</div>
</main>
<script>
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function map() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var lat = position.coords.latitude;
                var lng = position.coords.longitude;
                var options = {
                        center: {
                            lat: lat,
                            lng: lng
                        },
                        zoom: 20
                    },
                    element = document.getElementById('map');
                map = new google.maps.Map(element, options);
                var marker = new google.maps.Marker({
                    position: options.center,
                    map: map,
                    title: 'Current Location'
                });
                marker.setMap(map);
            });
        }

    }
</script>
<script src="//maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyB71p3N_AnXTmxPzcoeP4s2Fz3txYS9d0Q&callback=map&region=NG" async defer></script>