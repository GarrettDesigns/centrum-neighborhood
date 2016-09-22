/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages

        var body = $('body');

        var navMenuIcon = $('.menu-icon');
        var navCloseIcon = $('.main-menu-close');
        var navItems = $('.nav-items-group');
        var pageHeader = $('.page-header');
    		var galleryModal = $('.gallery-modal');
        var mainSiteContainer = $('.main-site-container');
        var mainNavLink = $('.main-menu');

        navMenuIcon.on('click', function(event) {
          navItems.addClass('show-nav');
          mainSiteContainer.addClass('show-nav');
          pageHeader.addClass('show-nav');
          body.addClass('show-nav');
      	});

      	navCloseIcon.on('click', function() {
      	  navItems.removeClass('show-nav');
          mainSiteContainer.removeClass('show-nav');
          pageHeader.removeClass('show-nav');
          body.removeClass('show-nav');
      	});

        mainNavLink.find('li a').on('click', function () {
          mainSiteContainer.removeClass('show-nav');
        });

        $(function() {
          $('a[href*="#"]:not([href="#"])').click(function() {
            navItems.removeClass('show-nav');
            pageHeader.removeClass('show-nav');
            body.removeClass('show-nav');
            if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {
              var target = $(this.hash);
              target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
              if (target.length) {
                $('html, body').animate({
                  scrollTop: target.offset().top
                }, 1000);
                return false;
              }
            }
          });
        });

        $('.gallery-button').on('click', function(e) {
          e.preventDefault();
          $('.gallery-slider').owlCarousel({
            animateOut: 'fadeOut',
            items:1,
            margin: 30,
            smartSpeed:450,
            nav: true,
            dots: false,
            responsiveRefreshRate: 200,
            autoHeight: true,
            responsiveBaseElement: '.gallery-slider',
            loop: true,
            navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>']
          });
          galleryModal.removeClass('open');
          $(this).parents('li').find('.gallery-modal').addClass('open').fadeIn('slow');
          $(this).parents('ul').addClass('modal-open');
          $(this).parents('li').siblings().hide();
          $(this).parents('li').addClass('modal-open');
              console.log(parentList.index('.modal-open'));
        });

        $('.gallery-close-button').on('click', function() {
          $('.gallery-modal').fadeOut('slow');
          $(this).parents('ul').removeClass('modal-open');
          $('.neighborhood-main--lifestyle-list-item').removeClass('modal-open');
          $('.neighborhood-main--lifestyle-list-item').show();
        });

        $('.close-map').on('click', function() {
          $('.neighborhood-map-modal').fadeOut('slow');
					$('.amenities').removeClass('map-active');
        });

        $('.amenities-main--list-item').on('click', 'img', function() {

          var thisItem = $(this);
          var parentListItems = thisItem.parents('li');
          var siblingListItems = parentListItems.siblings();

          $('.amenities-main--heading').find('.inner-heading').fadeOut('slow');

          thisItem.addClass('detail-view');
          siblingListItems.removeClass('fade-in');
          siblingListItems.addClass('fade-out');
          thisItem.parent().find('.amenity-description').addClass('animate-in');
        });


        $('.amenity-close-button').on('click', function() {
          var thisItem = $(this);
          var parentListItems = thisItem.parents('li');
          var siblingListItems = parentListItems.siblings();

          $('.amenities-main--heading').find('.inner-heading').fadeIn('slow');

          parentListItems.find('img').removeClass('detail-view');
          siblingListItems.removeClass('fade-out');
          siblingListItems.addClass('fade-in');
          thisItem.parent('article').removeClass('animate-in');
        });

          var lastListItem = $('.neighborhood-main--lifestyle-list-item').last();

          lastListItem.find('.load-next-gallery').hide();

        $('.load-next-gallery').on('click', function(e) {
          var thisItem = $(this);
          var parentListItems = thisItem.parents('li');

          e.preventDefault();
          galleryModal.fadeOut().removeClass('open');
          parentListItems.hide().removeClass('modal-open');
          parentListItems.next().addClass('modal-open').show().find('.gallery-modal').addClass('open').fadeIn();
        });



      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {

        // JavaScript to be fired on the home page

        var apiData = api_data;

        var currentSelection = '';
        var lastSelection;
        var optionValue;

         $('.unit-option').on('click', function() {
             $('.unit-option').removeClass('selected');
             $(this).addClass('selected');


             $('.unit-filter').removeClass(lastSelection).addClass(currentSelection);

             var classString = $(this).attr('class').split(' ');
             currentSelection = classString[1];
             lastSelection = currentSelection;

            $('.model-option').hide();
            $('.' + currentSelection + '.model-option').show();
            $('.' + currentSelection + '.model-option').first().click();


        });

        $('.model-option').on('click', function() {
            optionValue = $(this).attr('name');

            $('.floor-plan-viewer').slick('slickUnfilter').slick('slickFilter', '.' + optionValue.toLowerCase());
            $('.slider-slide').resize();

            $('.model-option').removeClass('selected');
            $(this).addClass('selected');

            $('.bedrooms, .bathrooms, .rent, .sqft, .unit, .unit-list').html('');

            for(var i = 0; i < model_data[optionValue].length; i++) {
                $('.unit-list').append('<li id="' + i  + '" class="' + model_data[optionValue][i].unit_number + ' unit-list-option">' + model_data[optionValue][i].unit_number + '</li>');
            }

            $('.unit-list').find('li').first().click();

        });

          $('.unit-list').on('click', 'li', function() {

            $('.unit-list').find('li').removeClass('selected');
            $(this).addClass('selected');

            $('.bedrooms, .bathrooms, .rent, .sqft, .unit').html('');

            $('.unit').append( model_data[optionValue][$(this).attr('id')].unit_number );
            $('.bedrooms').append( model_data[optionValue][$(this).attr('id')].unit_details.bedrooms );
            $('.bathrooms').append( model_data[optionValue][$(this).attr('id')].unit_details.bathrooms );
            $('.rent').append( '$' + Math.floor(model_data[optionValue][$(this).attr('id')].unit_details.rent));
            $('.sqft').append( model_data[optionValue][$(this).attr('id')].unit_details.sqft );
            // $('.apply-now').attr('href', 'http://property.onesite.realpage.com/ol2/(S(5rahzua04wyvgg45stjrnq55))/sites/esignature_rms/details.aspx?unitId=' + model_data[optionValue][$(this).attr('id')].unit_details.unitID  + '&siteID=3916349');
            $('.apply-now').attr('href', 'http://property.onesite.realpage.com/ol2/default.aspx?template=esignature_rms&SiteID=3916349&unitId=' + model_data[optionValue][$(this).attr('id')].unit_details.unitID);
          });

        var optionClasses = $('.unit-option').attr('class').split();

        $('.show-availability-modal').on('click', function(e) {
            e.preventDefault();
            $('.availability-modal').addClass('open');
            var unitType = $(this).attr('class').split(' ');
            $('.slider-slide').resize();
            $('.unit-option.' + unitType[3]).click();
            $('.interior-view-two--trap-article.right').addClass('modal-open');
        });

          $('.floor-plan-viewer').slick({
            prevArrow: '<i class="fa fa-angle-left"></i>',
            nextArrow: '<i class="fa fa-angle-right"></i>'
          });

        $('.map-modal-button').on('click', function(e) {
          e.preventDefault();
          $('.neighborhood-hero').find('.neighborhood-map-modal').fadeIn('slow');
          initMap();
          $('.amenities').addClass('map-active');
        });

        $('.close-availability').on('click', function () {
          $('.availability-modal').removeClass('open');
          $('.interior-view-two--trap-article.right').removeClass('modal-open');
        });


        var categoryIcons = {
          restaurant: {
            path: google.maps.SymbolPath.CIRCLE,
            fillColor: '#1a6ad6',
            fillOpacity: 0.8,
            scale: 7,
            strokeColor: '#1a6ad6',
            strokeWeight: 1,
            zIndex: 1
          },
          grocery_or_supermarket: {
            path: google.maps.SymbolPath.CIRCLE,
            fillColor: '#e56829',
            fillOpacity: 0.8,
            scale: 7,
            strokeColor: '#e56829',
            strokeWeight: 1,
            zIndex: 1
          },
          gym: {
            path: google.maps.SymbolPath.CIRCLE,
            fillColor: '#edc729',
            fillOpacity: 0.8,
            scale: 7,
            strokeColor: '#edc729',
            strokeWeight: 1,
            zIndex: 1
          },
          spa: {
            path: google.maps.SymbolPath.CIRCLE,
            fillColor: '#00a5b9',
            fillOpacity: 0.8,
            scale: 7,
            strokeColor: '#00a5b9',
            strokeWeight: 1,
            zIndex: 1
          },
          cafe: {
            path: google.maps.SymbolPath.CIRCLE,
            fillColor: '#af3c9b',
            fillOpacity: 0.8,
            scale: 7,
            strokeColor: '#af3c9b',
            strokeWeight: 1,
            zIndex: 1
          },
          school: {
            path: google.maps.SymbolPath.CIRCLE,
            fillColor: '#647dd6',
            fillOpacity: 0.8,
            scale: 7,
            strokeColor: '#647dd6',
            strokeWeight: 1,
            zIndex: 1
          },
          store: {
            path: google.maps.SymbolPath.CIRCLE,
            fillColor: '#c84a81',
            fillOpacity: 0.8,
            scale: 7,
            strokeColor: '#c84a81',
            strokeWeight: 1,
            zIndex: 1
          }
        };

        var centrum = {
            path: 'M16,0.33A15.67,15.67,0,0,0,.33,16c0,8.65,13.33,26,16.33,30,4.33-5.67,15-21.35,15-30A15.67,15.67,0,0,0,16,.33Zm0.71,20.33a4.23,4.23,0,0,0,2.68-1,0.4,0.4,0,0,1,.52,0l1.56,1.66a0.4,0.4,0,0,1,0,.54,6.86,6.86,0,0,1-4.86,1.94,7.2,7.2,0,1,1,0-14.4,6.72,6.72,0,0,1,4.84,1.86,0.37,0.37,0,0,1,0,.56L19.89,13.5a0.35,0.35,0,0,1-.5,0,4.09,4.09,0,0,0-2.7-1,4,4,0,0,0-3.92,4.12A4,4,0,0,0,16.71,20.67Z',
            fillColor: '#173e73',
            fillOpacity: 1,
            scale: 1.15,
            strokeColor: '#173e73',
            strokeWeight: 1,
            zIndex: 3
        };

        // Basic options for a simple Google Map
        // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
        var mapOptions = {
            // How zoomed in you want the map to start at (always required)
            zoom: 16,

            mapTypeControl: false,

            scrollwheel: false,

            // The latitude and longitude to center the map (always required)
            center: new google.maps.LatLng(41.903368, -87.669301),

            // How you would like to style the map.
            // This is where you would paste any style found on Snazzy Maps.
            styles: [
                {
                    "featureType": "administrative",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "administrative",
                    "elementType": "labels.text",
                    "stylers": [
                        {
                            "visibility": "on"
                        },
                        {
                            "color": "#8e8e8e"
                        }
                    ]
                },
                {
                    "featureType": "administrative",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#7f7f7f"
                        }
                    ]
                },
                {
                    "featureType": "administrative",
                    "elementType": "labels.text.stroke",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "administrative.country",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        {
                            "color": "#bebebe"
                        }
                    ]
                },
                {
                    "featureType": "administrative.province",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        {
                            "visibility": "on"
                        },
                        {
                            "color": "#cbcbcb"
                        },
                        {
                            "weight": "0.69"
                        }
                    ]
                },
                {
                    "featureType": "administrative.locality",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "visibility": "simplified"
                        }
                    ]
                },
                {
                    "featureType": "landscape",
                    "elementType": "all",
                    "stylers": [
                        {
                            "color": "#e4e4e4"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "all",
                    "stylers": [
                        {
                            "saturation": -100
                        },
                        {
                            "lightness": 45
                        },
                        {
                            "visibility": "simplified"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "labels",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "simplified"
                        },
                        {
                            "color": "#dadada"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "labels",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "labels.text",
                    "stylers": [
                        {
                            "visibility": "simplified"
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "on"
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "labels.text",
                    "stylers": [
                        {
                            "visibility": "simplified"
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "road.local",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "simplified"
                        }
                    ]
                },
                {
                    "featureType": "road.local",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#eeeeee"
                        }
                    ]
                },
                {
                    "featureType": "road.local",
                    "elementType": "labels.text",
                    "stylers": [
                        {
                            "visibility": "simplified"
                        }
                    ]
                },
                {
                    "featureType": "transit",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "transit.station.rail",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "on"
                        }
                    ]
                },
                {
                   "featureType": "transit.line",
                   "elementType": "all",
                   "stylers": [
                       {
                           "visibility": "on"
                       }
                    ]
                },
                {
                    "featureType": "transit.line",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "weight": "3.00"
                        },
                        {
                            "saturation": "48"
                        },
                        {
                            "color": "#888888"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "all",
                    "stylers": [
                        {
                            "color": "#cbcbcb"
                        },
                        {
                            "visibility": "on"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#d9d9d9"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "labels.text",
                    "stylers": [
                        {
                            "visibility": "simplified"
                        }
                    ]
                }
            ]
        };

        // Get the HTML DOM element that will contain your map
        // We are using a div with id="map" seen below in the <body>
        var mapElement = document.getElementById('map');

        // Create the Google Map using our element and options defined above
        var map;
		var service;
        var infoBubble;
        var requests = {};
        var markers = [];
        var categories = ['cafe', 'gym', 'school', 'grocery_or_supermarket', 'spa', 'restaurant', 'store'];

        function initMap() {
          map = new google.maps.Map(mapElement, mapOptions);

          var marker = new google.maps.Marker({
            map: map,
            icon: centrum,
            title: 'Centrum Lakeview',
            zIndex: 999,
            position: {lat: 41.903368, lng: -87.669301}
          });

        infoBubble = new InfoBubble({
            backgroundColor: '#0e0f0b',
            borderColor: '#0e0f0b',
            borderRadius: 0,
            borderWidth: 0,
            shadowStyle: 0,
            minWidth: 200,
            padding: 20,
            arrowPosition: 25,
            arrowStyle: 2,
            hideCloseButton: true
        });
      service = new google.maps.places.PlacesService(map);

      // The idle event is a debounced event, so we can query & listen without
      // throwing too many requests at the server.
        map.addListener('idle', performSearch);

          if($('.neighborhood-map-modal.mobile')) {
            map.setOptions({draggable: false});
          }

          map.addListener('click', function() {
	            infoBubble.close();
	          });
	        }

				function performSearch() {
					for(var i = 0; i < categories.length; i++) {
						var request = {
							bounds: map.getBounds(),
							type: categories[i]
						};
						requests["request" + i] = request;
					}
					for(var request in requests) {
						service.nearbySearch(requests[request], callback);
					}
				}

				function callback(results, status) {
				  if (status !== google.maps.places.PlacesServiceStatus.OK) {
				    console.error(status);
				    return;
				  }
				  for (var i = 0, result; result = results[i]; i++) {
				    addMarker(result);
				  }
				}

				function addMarker(place) {
				  var marker = new google.maps.Marker({
				    map: map,
				    position: place.geometry.location,
				    icon: categoryIcons[$(place.types).filter(categories)[0]],
						category: $(place.types).filter(categories)[0]
				  });
					markers.push(marker);

					google.maps.event.addListener(marker, 'click', function() {
						service.getDetails(place, function(result, status) {
							if (status !== google.maps.places.PlacesServiceStatus.OK) {
								console.error(status);
								return;
							}
							infoBubble.setContent(result.name);
							infoBubble.open(map, marker);
						});
					});
				}

        // When map-legend category is clicked
        $('.map-legend--list-item').on('click', function() {
          if($(this).hasClass('selected')) {
            $(this).removeClass('selected');

            for(var i=0; i < markers.length; i++) {
                markers[i].setVisible(true);
            }
          }
          else {
            $('.map-legend--list-item').removeClass('selected');
            $(this).addClass('selected');

            for(var i=0; i < markers.length; i++) {
              if(markers[i].category !== $(this).data('category') && markers[i].getVisible() === true) {
                markers[i].setVisible(false);
              } else if (markers[i].getVisible() === false  && markers[i].category === $(this).data('category')) {
                markers[i].setVisible(true);
              }
            }
          }
        });

      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
