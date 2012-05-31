window.addEvent('domready', function() {
	var large = $('product-large-image'),
		thumbs = $$('.productThumbs img');
		
	if (!large) {
		return;
	}
		
	thumbs.addEvent('click', function () {
		large.set('src', this.get('data-large'));
	});
});