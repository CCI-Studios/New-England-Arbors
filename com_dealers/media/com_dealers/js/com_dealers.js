window.addEvent('domready', function() {
	var canvas = $('map-canvas'),
		markers = [],
		map = new google.maps.Map(canvas, {
			zoom: 3,
			center: new google.maps.LatLng(41.640078,-95.392578),
			mapTypeId: google.maps.MapTypeId.ROADMAP
		}),
		infoWindow = new google.maps.InfoWindow(),
		geocoder = new google.maps.Geocoder(),
		request = new Request.JSON({
			url: '/index.php?option=com_dealers&view=dealers&format=json&limit=1000',
			onSuccess: function (data) {
				var geoLookup;

				data.items.each(function(item) {
					var marker, full;

					item.mergedAddress = item.address1 +', '+ item.city +', '+ item.state +', '+ item.country +', '+ item.zip;
					item.fullAddress = '<h2>'+ item.title +'</h2><p>'+ item.address1 +'<br/>'+ 
						item.state +', '+ item.country +'<br/>'+
						item.zip +'</p>' +
						'<p><a href="'+ 
						'https://maps.google.com/maps?q='+ item.mergedAddress +'&hl=en&t=m&z=16'
						+'" target="_blank">Directions</a></p>';
				
					marker = new google.maps.Marker({
						position: new google.maps.LatLng(item.lat, item.lon),
						map: map
					});

					google.maps.event.addListener(marker, 'click', (function(marker) {
						return function() {
  							infoWindow.setContent(item.fullAddress);
  							infoWindow.open(map, marker);
						}
					})(marker));
				});
			}
		}).get();
});
