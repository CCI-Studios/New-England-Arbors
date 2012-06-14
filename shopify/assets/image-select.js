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

(function (window, document) {
	window.addEvent('load', function () {
		if (Modernizr.input.placeholder) {
			return;
		}

		$$('input[placeholder]').each(function (input) {
			var placeholder = input.getProperty('placeholder');
			if (input.value === '') {
				input.value = placeholder;
			}

			input.addEvents({
				focus: function () {
					if (input.value === placeholder) {
						input.value = '';
					}
				},
				blur: function () {
					if (input.value === '') {
						input.value = placeholder;
					}
				}
			});
		});
	});
}(this, this.document));
