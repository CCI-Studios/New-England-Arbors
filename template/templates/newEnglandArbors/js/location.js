window.addEvent('domready', function() {
	var select = $('location-select'),
		locations = $$('.locations-blog .items-leading > div'),
		state = '';

	if (!select)
		return;

	select.addEvent('change', function() {
		state = select.value;

		locations.removeClass('hidden');

		if (state == '') 
			return;

		locations.each(function(location) {
			if (!location.getElement('div[data-state="' + state + '"]')) {
				location.addClass('hidden');
			}
		});
	});
});