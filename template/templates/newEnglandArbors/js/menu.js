window.addEvent('domready', function() {
	var displayers = $$('.show-menu')
		menu = $$('.moduletable_hmenu.primary')[0],
		wrapper = $('wrapper');
		
	displayers.addEvent('click', function() {
		wrapper.toggleClass('menu-open');
	});
});