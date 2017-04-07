/*------------------------------------------------------------------
[Table of contents]

- Author:  Andrey Sokoltsov
- Profile:	http://themeforest.net/user/andreysokoltsov
--*/

(function() {

	"use strict";
    
    
    	$('.business-services-header').click(function () {
			$(this).addClass("business-services-hider");
		});

	var Core = {

		initialized: false,

		initialize: function() {

			if (this.initialized) return;
			this.initialized = true;

			this.build();

		},

		build: function() {

			//Placeholder for IE
			$('input, textarea').placeholder();
			
			// Dropdown menu
			this.dropdownhover();
			
			//Mobile Menu
			this.mobileMenuSwitch();
			
			// Page preloader
			this.initPagePreloader();

			// Main Slider
			this.initMainSlider();
			
			// Images gallery
			this.initImagesGallery();

			// Slider
			this.initSlider();
			
			//Setup WOW.js
			this.initScrollAnimations();

			// Go to top
			this.initGoToTop();
			
			// Filter Switcher
			this.initFilterSwitcher();		

			//Google Map
			this.initGoogleMap();

			//Custom Select
			this.initChosen();
			
		},

		dropdownhover: function(options) {
			if ($(window).width() > 1024) {
				$('.navbar-main').on('mouseenter', '.dropdown', function() {
					"use strict";
					$(this).addClass('open');
				}).on('mouseleave', '.dropdown', function() {
					"use strict";
					$(this).removeClass('open');
				});
			}
		},

		mobileMenuSwitch: function(options){
			$('#header').on('click', '.mobileMenuSwitcher', function(e){
				$('body').toggleClass('openMenu');
			});
		},

		initPagePreloader: function(options) {
			var $preloader = $('#page-preloader'),
			$spinner = $preloader.find('.spinner-loader');
			$( window ).on('load', function() {
				$spinner.fadeOut();
				$preloader.delay(500).fadeOut('slow');
				window.scrollTo( 0, 0 );
			});
		},

		initMainSlider: function(options) {
			var $mainSlider = $( '.full-width-slider' );
			if($mainSlider && $mainSlider.length){
				$mainSlider.each(function(i) {
					var $proSlider = $(this);

					var widthData = $proSlider.data('width');
					var heightData = $proSlider.data('height');
					var fadeData = $proSlider.data('fade');
					var buttonsData = $proSlider.data('buttons');
					var waitForLayersData = $proSlider.data('wait-for-layers');
					var thumbnailPointerData = $proSlider.data('thumbnail-pointer');
					var touchSwipeData = $proSlider.data('touch-swipe');
					var autoplayData = $proSlider.data('autoplay');
					var autoScaleLayersData = $proSlider.data('auto-scale-layers');
					var visibleSizeData = $proSlider.data('visible-size');
					var forceSizeData = $proSlider.data('force-size');
					var autoplayDelayData = $proSlider.data('autoplay-delay');

					$proSlider.sliderPro({
						width: widthData,
						height: heightData,
						fade: fadeData,
						buttons: buttonsData,
						waitForLayers: waitForLayersData,
						thumbnailPointer: thumbnailPointerData,
						touchSwipe: touchSwipeData,
						autoplay: autoplayData,
						autoScaleLayers: autoScaleLayersData,
						visibleSize: visibleSizeData,
						forceSize: forceSizeData,
						autoplayDelay: autoplayDelayData,
					});
				});
			}
		},

		initImagesGallery: function(options) {
			var $imagesGallery = $( '.images-gallery-slider' );
			if($imagesGallery && $imagesGallery.length){
				$imagesGallery.each(function(i) {
					var $gallery = $(this);

					var widthData = $gallery.data('width');
					var heightData = $gallery.data('height');
					var fadeData = $gallery.data('fade');
					var arrowsData = $gallery.data('arrows');
					var buttonsData = $gallery.data('buttons');
					var fullScreenData = $gallery.data('full-screen');
					var shuffleData = $gallery.data('shuffle');
					var smallSizeData = $gallery.data('small-size');
					var mediumSizeData = $gallery.data('medium-size');
					var largeSizeData = $gallery.data('large-size');
					var thumbnailArrowsData = $gallery.data('thumbnail-arrows');
					var autoplayData = $gallery.data('autoplay');

					$gallery.sliderPro({
						width: widthData,
						height: heightData,
						fade: fadeData,
						arrows: arrowsData,
						buttons: buttonsData,
						fullScreen: fullScreenData,
						shuffle: shuffleData,
						smallSize: smallSizeData,
						mediumSize: mediumSizeData,
						largeSize: largeSizeData,
						thumbnailArrows: thumbnailArrowsData,
						autoplay: autoplayData,
					});
				});
			}
		},

		initSlider: function(options){
			var $jqSlider = $( '.count-slider' );
			if($jqSlider && $jqSlider.length){
				$jqSlider.each(function(i) {
					var $countSlider = $(this);
					
					var valContainer = $countSlider.data('value-container');
					
					$countSlider.slider({});
					$countSlider.on("slide", function(slideEvt){
						$(valContainer).text(slideEvt.value);
					});
					
				});
			}
		},

		initScrollAnimations: function(options) {
			var scrollingAnimations = true; // Set true for turn on animation
			if(scrollingAnimations){
				new WOW().init();
			}
		},

		initGoToTop: function(options) {
			// Show/Hide Button on Window Scroll event.
			$(window).on('scroll', function(){
				var fromTop = $(this).scrollTop();
				var display = 'none';
				if(fromTop > 650){
					display = 'block';
				}
				$('#to-top').css({'display': display});
			});
			$("#to-top").smoothScroll();
		},
		
		initFilterSwitcher: function(options) {
			$(document).on("click", "div.open-close-filter", function (event) {
				event.preventDefault();
				$( "div.additional-filter" ).slideToggle('slow');
			});
		},

		initGoogleMap: function(options) {
			var $googleMap = $( '#map-canvas' );
			if($googleMap && $googleMap.length){
				var map;
				var mapCoordinates = new google.maps.LatLng(38.8709504, -77.0555159);
				var markers = [];
				var image = new google.maps.MarkerImage( 'img/map-marker.png',
					new google.maps.Size(37,59),
					new google.maps.Point(0,0),
					new google.maps.Point(42,56)
				);


				google.maps.event.addDomListener(window, 'load', initialize);
			}
			function addMarker(){
				markers.push(new google.maps.Marker({
					position: mapCoordinates,
					raiseOnDrag: false,
					icon: image,
					map: map,
					draggable: false
				}));
			}
			function initialize(){
				var mapOptions = {
					zoom: 16,
					draggable: false,
					center: mapCoordinates,
					mapTypeId: google.maps.MapTypeId.ROADMAP,
				};
				map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
				addMarker();
			}
		},

		initChosen: function(options) {
			$('.chosen-select').chosen({
				disable_search_threshold: 10,
				width:"100%",
			});
		},
		

	};

	Core.initialize();

})();


// 2. This code loads the IFrame Player API code asynchronously.
var tag = document.createElement('script');

tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

// 3. This function creates an <iframe> (and YouTube player)
//    after the API code downloads.
var player;
function onYouTubeIframeAPIReady() {
	player = new YT.Player('player', {
		height: '390',
		width: '100%',
		videoId: 'eHgeb_PQY2Q',
	});
}

