$(document).ready(function () {

	navigator.geolocation.getCurrentPosition(function(position){ 
		console.log("Found your location nLat : "+position.coords.latitude+" nLang :"+ position.coords.longitude);
	
	
	// Markers Map
	var markerMap = new GMaps({
		el: '#marker-map',
		lat: position.coords.latitude,
		lng: position.coords.longitude
	});
	markerMap.addMarker({
		lat: position.coords.latitude,
		lng: position.coords.longitude,
		title: 'Location',
		click: function (e) {
			$.niftyNoty({
				type: "info",
				icon: "fa fa-info",
				message: "You clicked in the marker",
				container: 'floating',
				timer: 3500
			});
		},
		infoWindow: {
			content: '<div>HTML Content</div>'
		}
	});



});


});



 