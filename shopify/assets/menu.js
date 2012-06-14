window.addEvent('domready', function() {
	var displayers = $$('.show-menu'),
		menu = $('mobile-menu'),
		wrapper = $('wrapper'),
		body = $$('body'),
		visible = false;

	displayers.addEvent('click', function(event) {
		event = new Event(event);
		event.stop();
		body.toggleClass('menu-open');
		visible = !visible;
	});

	wrapper.addEvent('click', function (event) {
		if (visible) {
			event = new Event(event);
			event.preventDefault();

			visible = false;
			body.removeClass('menu-open');
		}
	});
});