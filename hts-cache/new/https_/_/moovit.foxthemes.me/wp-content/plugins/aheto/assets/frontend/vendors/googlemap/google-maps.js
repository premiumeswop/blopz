/* ============================ */
/* GOOGLE MAPS */
/* ============================ */
;(function($) {
	"use strict";

	function init_map() {

		if ($('.aheto-map').length) {
			var maps = $('.aheto-map');
			maps.each(function (index) {
				var mapZoom   = parseInt($(this).attr('data-zoom'));
				var json      = $.parseJSON($(this).attr('data-style'));
				// default center
				var mapCenter = {
					lat: -34.397,
					lng: 150.644
				};

				// INITIALIZE THIS MAP
				initialize($('.aheto-map')[index], json, mapZoom, mapCenter);
			});
		}

		function initialize(map, json, zoom, center) {
			var markers            = [];
			var mapCenter          = [];
			var mapMarkerImg       = $(map).attr('data-marker-img');
			var mapMarkerActiveImg = $(map).attr('data-active-marker-img');
			var address            = $(map).attr('data-address').split("|");
			var allMarkers         = $(map).attr('data-markers') !== undefined ? $(map).attr('data-markers').split("|") : '';
			var icon               = mapMarkerImg;
			var myOptions          = {
				zoom: zoom,
				scrollwheel: false,
				mapTypeControl: false,
				fullscreenControl: false,
				center: center,
				styles: json,
				zoomControl: true,
				disableDefaultUI: true,
			};

			map = new google.maps.Map(map, myOptions);

			// map center
			var geocoder = new google.maps.Geocoder();

			if (address[0] !== "") {
				if (geocoder) {
					geocoder.geocode({
						'address': String(address[0])
					}, function (results, status) {
						if (status == google.maps.GeocoderStatus.OK) {
							if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {
								mapCenter = {
									lat: results[0].geometry.location.lat(),
									lng: results[0].geometry.location.lng()
								};
								map.setCenter(mapCenter);
							} else {
								console.log("No results found");
							}
						} else {
							console.log("Geocode was not successful for the following reason: " + status);
						}
					});
				}
			}

			// map markers
			address.forEach(function (item, i) {
				if (item !== "") {
					//get location from address
					if (geocoder) {
						geocoder.geocode({
							'address': String(item)
						}, function (results, status) {
							if (status == google.maps.GeocoderStatus.OK) {
								if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {
									icon       = allMarkers[i];
									markers[i] = new google.maps.Marker({
										position: new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng()),
										map: map,
										icon: icon,
										animation: google.maps.Animation.DROP
									});
								} else {
									console.log("No results found");
								}
							} else {
								console.log("Geocode was not successful for the following reason: " + status);
							}
						});
					}
				}
			});

			// Marker Hover
			markersHover(map, markers, mapMarkerImg, mapMarkerActiveImg, zoom, allMarkers);

			// Custom Overlay
			map.overlayMapTypes.insertAt(0, new CoordMapType(new google.maps.Size(256, 256)));

		}

		// Convert Function
		const mapOverlay = $('.aheto-map').attr('data-overlay');

		function isOverlayRgba(overlay) {
			return overlay.includes('#');
		}

		function rgba2hex(orig) {
			let a,
				rgb = orig.replace(/\s/g, '').match(/^rgba?\((\d+),(\d+),(\d+),?([^,\s)]+)?/i),
				alpha = (rgb && rgb[4] || "").trim(),
				hex = rgb ?
					(rgb[1] | 1 << 8).toString(16).slice(1) +
					(rgb[2] | 1 << 8).toString(16).slice(1) +
					(rgb[3] | 1 << 8).toString(16).slice(1) : orig;

			if (alpha !== "") {
				a = alpha;
			} else {
				a = 1;
			}
			a = ((a * 255) | 1 << 8).toString(16).slice(1);
			hex = hex + a;

			return '#' + hex;
		}


		// Custom Overlay Function

		function CoordMapType(tileSize) {
			this.tileSize = tileSize;
		}

		CoordMapType.prototype.getTile = function(coord, zoom, ownerDocument) {
			let div = ownerDocument.createElement('div');
			div.style.width = this.tileSize.width + 'px';
			div.style.height = this.tileSize.height + 'px';
			div.style.backgroundColor = isOverlayRgba(mapOverlay) ? mapOverlay: rgba2hex(mapOverlay);
			return div;
		};

		function markersHover(map, markers, markerImg, markerActiveImg, zoom, allMarkers) {
			$('.google-marker').each(function (index) {
				$(this).attr('data-marker-number', index);

				$(this).on('click', function () {
					var latLng = markers[$(this).attr('data-marker-number')].getPosition();
					map.setCenter(latLng);
					map.setZoom(zoom);
					markers.forEach(function (item, i) {
						item.setIcon(allMarkers[i]);
					});
					markers[$(this).attr('data-marker-number')].setIcon(allMarkers[$(this).attr('data-marker-number')]);

					$(this).addClass('active').siblings().removeClass('active').closest('.js-wrap').find('.js-tab-item').removeClass('active');
					$(this).closest('.js-wrap').find('.js-tab-item:nth-child(' + (index + 1) + ')').addClass('active');
				});
			});
		}


	}

	init_map();

	$(window).on('elementor/frontend/init', function () {
		if ( ( window.location.href.indexOf("elementor-preview") > -1 )  ) {
			elementorFrontend.hooks.addAction( 'frontend/element_ready/widget', function( $scope ) {

				if(typeof $scope.context !== 'undefined'){
					var  widget_name = $scope.context.dataset.widget_type;

					if ( widget_name.indexOf('google-map') > -1  ) {
						init_map();
					}

				}

			} );
		}
	});

})(jQuery);
