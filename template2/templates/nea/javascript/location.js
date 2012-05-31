window.addEvent('domready', function() {
	var select = $('location-select'),
		locations = $$('.com_dealers .dealer'),
		state = '';

	if (!select)
		return;

	select.addEvent('change', function() {
		state = select.value;

		locations.removeClass('hidden');

		if (state == '') 
			return;

		locations.each(function(location) {
			if (location.get('data-state') !==  state) {
				location.addClass('hidden');
			}
		});
	});
});