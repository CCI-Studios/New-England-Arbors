var CCI = CCI || {};
CCI.Slideshow = new Class({
	Implements: [Options],

	options: {
		duration: 300,
		delay: 5000
	},

	container: null,
	tallestSlide: null,
	slides: [],
	thumbs: [],
	current: null,
	playing: false,
	timer: null,

	initialize: function(container, options) {
		this.setOptions(options);
		this.container = $(container);

		this.slides = this.container.getElements('.slide');
		this.thumbs = this.container.getElements('.thumb');

		this.current = 0;

		this.slides.each(function(slide, index) {
			if (!this.tallestSlide ||
				this.tallestSlide.getSize().y < slide.getSize().y) {
				this.tallestSlide = slide;
			}

			if (index == this.current) {
				slide.setStyle('opacity', 1);
			} else {
				slide.setStyle('opacity', 0);
			}
		}.bind(this));

		this.thumbs.each(function(thumb, index) {
			thumb.addEvent('click', function() {
				this.moveTo(index);
			}.bind(this));
		}.bind(this));

		this.resizeHeight();
		window.addEvent('resize', function() {
			this.resizeHeight();
		}.bind(this));
	},

	resizeHeight: function() {
		var height = 0;
		if (this.slides[this.current] != this.tallestSlide) {
			this.tallestSlide.setStyles({
				opacity: 1,
				display: 'block'
			});
			height = this.tallestSlide.getSize().y;
			this.tallestSlide.setStyles({
				opacity: 0,
				display: ''
			});
		} else {
			height = this.tallestSlide.getSize().y;
		}

		this.slides.each(function(slide, index) {
			if (slide != this.tallestSlide) {
				slide.setStyle('height', height);
			}
		}.bind(this));
	},

	play: function() {
		this.running = true;
		this.timer = this.transition.bind(this).delay(this.options.delay);
	},

	stop: function() {
		this.running = false;
		clearTimeout(this.timer);
	},

	moveTo: function(index) {
		clearTimeout(this.timer);
		this.transition(index);	
	},

	transition: function(nextIndex) {
		if (nextIndex === undefined) {
			nextIndex = this.getNextIndex();
		}

		var nextSlide = this.slides[nextIndex],
			nextThumb = this.thumbs[nextIndex];

		this.slides.removeClass('active');
		this.slides[this.current].tween('opacity', 0);
		nextSlide.addClass('active');
		nextSlide.tween('opacity', 1);

		this.thumbs.removeClass('active');
		nextThumb.addClass('active');
		this.current = nextIndex;

		if (this.running) {
			this.timer = this.transition.bind(this).delay(this.options.delay);
		}
	},

	getNextIndex: function() {
		return (this.current + 1) % this.slides.length;
	}

});
