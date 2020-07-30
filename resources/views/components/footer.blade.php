<script>
    // Initialize and add the map
    function initMap() {
    // The location of Uluru
    var uluru = {lat: 28.3949, lng: 84.1240};
    // The map, centered at Uluru
    var map = new google.maps.Map(
        document.getElementById('map'), {zoom: 4, center: uluru});
    // The marker, positioned at Uluru
    var marker = new google.maps.Marker({position: uluru, map: map});
    }
</script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYT7C66OBVM_hfO0zmWr6wPbR9ithZsiY&callback=initMap">
</script>
</body>
</html>
 