
/*$(function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        document.getElementById("mapholder").innerHTML = "Geolocation is not supported by this browser.";
    }
});
function showPosition(position) {
    var lat = -36.8482494;
    var lon = 174.77262819999999;
    var latlon = new google.maps.LatLng(lat, lon);
    var mapholder = document.getElementById("mapholder");
    mapholder.style.height = "350px";
    mapholder.style.width = "100%";

    var myOptions = {
        center: latlon,
        zoom: 14,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        mapTypeControl: false,
        navigationControlOptions: {
            style: google.maps.NavigationControlStyle.SMALL
        }
    }
    var map = new google.maps.Map(document.getElementById("mapholder"), myOptions);
    var marker = new google.maps.Marker({
        position: latlon,
        map: map,
        title: "I'm here!"
    });
}*/
$(function(){
	  var yourStartLatLng = new google.maps.LatLng(40.74843, -73.985655);
      $('#mapholder').gmap({
		'center': yourStartLatLng,
		'zoom': 13, 
		'disableDefaultUI': false, 
		'scrollwheel': false, 
		'callback': function() {
		var self = this;
						self.addMarker({
						'position': this.get('map').getCenter()
					});
         }
	});
});

