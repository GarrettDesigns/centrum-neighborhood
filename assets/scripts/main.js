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

        navMenuIcon.on('click', function(event) {
      		navItems.addClass('show-nav');
          pageHeader.addClass('show-nav');
          body.addClass('show-nav');
      	});

      	navCloseIcon.on('click', function() {
      		navItems.removeClass('show-nav');
          pageHeader.removeClass('show-nav');
          body.removeClass('show-nav');
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

        $('.availability-table').stacktable({myClass: 'stacked-table', headIndex: 4 });

        $('.gallery-button').on('click', function(e) {
          e.preventDefault();
          $('.gallery-slider').owlCarousel({
            animateOut: 'fadeOut',
            items:1,
            margin: 30,
            smartSpeed:450,
            nav: true,
            dots: false,
            responsiveRefreshRate: 0,
            responsiveBaseElement: '.gallery-slider',
            loop: true,
            navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>']
          });
          galleryModal.removeClass('open');
          $(this).parents('li').find('.gallery-modal').addClass('open').fadeIn('slow');
        });

        $('.gallery-close-button').on('click', function() {
          $('.gallery-modal').fadeOut('slow');
        });

        $('.close-map').on('click', function() {
          $('.neighborhood-map-modal').fadeOut('slow');
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

        $('.load-next-gallery').on('click', function(e) {
          var thisItem = $(this);
          var parentListItems = thisItem.parents('li');

          e.preventDefault();
          galleryModal.removeClass('open');
          parentListItems.next().find('.gallery-modal').addClass('open').fadeIn('slow');
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

        $('.map-modal-button').on('click', function(e) {
          e.preventDefault();
          $('.neighborhood-hero').find('.neighborhood-map-modal').fadeIn('slow');
          initMap();
          console.log(lakeviewLocations);
        });

        var lakeviewLocations = {
          dining: map_locations.lakeview_dining_markers,
          grocery: map_locations.lakeview_grocery_markers,
          fitness: map_locations.lakeview_fitness_markers,
          salon: map_locations.lakeview_salons_markers,
          coffee: map_locations.lakeview_coffee_markers,
          education: map_locations.lakeview_education_markers,
          retail: map_locations.lakeview_retail_markers
        };

        var categories = {
          dining: {
            path: google.maps.SymbolPath.CIRCLE,
            fillColor: '#1a6ad6',
            fillOpacity: 0.8,
            scale: 7,
            strokeColor: '#1a6ad6',
            strokeWeight: 1,
            zIndex: 1
          },
          grocery: {
            path: google.maps.SymbolPath.CIRCLE,
            fillColor: '#e56829',
            fillOpacity: 0.8,
            scale: 7,
            strokeColor: '#e56829',
            strokeWeight: 1,
            zIndex: 1
          },
          fitness: {
            path: google.maps.SymbolPath.CIRCLE,
            fillColor: '#edc729',
            fillOpacity: 0.8,
            scale: 7,
            strokeColor: '#edc729',
            strokeWeight: 1,
            zIndex: 1
          },
          salon: {
            path: google.maps.SymbolPath.CIRCLE,
            fillColor: '#00a5b9',
            fillOpacity: 0.8,
            scale: 7,
            strokeColor: '#00a5b9',
            strokeWeight: 1,
            zIndex: 1
          },
          coffee: {
            path: google.maps.SymbolPath.CIRCLE,
            fillColor: '#af3c9b',
            fillOpacity: 0.8,
            scale: 7,
            strokeColor: '#af3c9b',
            strokeWeight: 1,
            zIndex: 1
          },
          education: {
            path: google.maps.SymbolPath.CIRCLE,
            fillColor: '#647dd6',
            fillOpacity: 0.8,
            scale: 7,
            strokeColor: '#647dd6',
            strokeWeight: 1,
            zIndex: 1
          },
          retail: {
            path: google.maps.SymbolPath.CIRCLE,
            fillColor: '#c84a81',
            fillOpacity: 0.8,
            scale: 7,
            strokeColor: '#c84a81',
            strokeWeight: 1,
            zIndex: 1
          },
          centrum: {
            path: 'M16,0.33A15.67,15.67,0,0,0,.33,16c0,8.65,13.33,26,16.33,30,4.33-5.67,15-21.35,15-30A15.67,15.67,0,0,0,16,.33Zm0.71,20.33a4.23,4.23,0,0,0,2.68-1,0.4,0.4,0,0,1,.52,0l1.56,1.66a0.4,0.4,0,0,1,0,.54,6.86,6.86,0,0,1-4.86,1.94,7.2,7.2,0,1,1,0-14.4,6.72,6.72,0,0,1,4.84,1.86,0.37,0.37,0,0,1,0,.56L19.89,13.5a0.35,0.35,0,0,1-.5,0,4.09,4.09,0,0,0-2.7-1,4,4,0,0,0-3.92,4.12A4,4,0,0,0,16.71,20.67Z',
            fillColor: '#173e73',
            fillOpacity: 1,
            scale: 1.15,
            strokeColor: '#173e73',
            strokeWeight: 1,
            zIndex: 3
          }
        };

        // Basic options for a simple Google Map
        // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
        var mapOptions = {
            // How zoomed in you want the map to start at (always required)
            zoom: 16,

            mapTypeControl: false,

            scrollwheel: false,

            // The latitude and longitude to center the map (always required)
            center: new google.maps.LatLng(41.9436346, -87.6717325), // Lakeview

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
        var infoBubble;

        function initMap() {
          map = new google.maps.Map(mapElement, mapOptions);

          var marker = new google.maps.Marker({
            map: map,
            icon: categories.centrum,
            title: 'Centrum Lakeview',
            zIndex: 999,
            position: {lat: 41.9436346, lng: -87.6717325}
          });
          for (var categoryName in categories) {
            // Adds markers to the map.
            setMarkers(map, categories[categoryName], lakeviewLocations[categoryName], categoryName);
          }

          if($('.neighborhood-map-modal.mobile')) {
            map.setOptions({draggable: false});
          }

          map.addListener('click', function() {
            infoBubble.close();
          });
        }



        var markers = [];

        function setMarkers(map, icon, propertyLocation, category) {

          var locationInfo = {};

          for (var locationMarkers in propertyLocation) {
            var locationMarker = propertyLocation[locationMarkers];
            var marker = new google.maps.Marker({
              position: {
                lat: parseFloat(locationMarker.location_latitude),
                lng: parseFloat(locationMarker.location_longitude)
              },
              map: map,
              icon: icon,
              category: category
            });

            locationInfo.locationDetails = '<div class="location-info">' +
            '<h2 class="location-title">' + locationMarker.location_name + '</h2>' +
            '<a class="location-url" href="' + locationMarker.location_link + '">More Info</a>' +
            '</div>';

            setMarkerContent(marker, locationInfo.locationDetails);
            markers.push(marker);
          }

          function setMarkerContent(marker, content) {
            infoBubble = new InfoBubble({
              backgroundColor: '#173e73',
              borderColor: '#173e73',
              borderRadius: 0,
              borderWidth: 0,
              shadowStyle: 0,
              arrowPosition: 25,
              arrowStyle: 2,
              hideCloseButton: true
            });
            marker.addListener('click', function() {
              infoBubble.setContent(content);
              infoBubble.open(map, marker);
            });
          }
        }

        // $('.map-legend--list-item').removeClass('selected');

        // if markers are hidden and another category is clicked
          // remove the selected class from currently selected category
          // and add it to this one
          // if non matching markers are already hidden show them

        // When map-legend category is clicked
        $('.map-legend--list-item').on('click', function() {
          console.log($(this));
          if($(this).hasClass('selected')) {
            console.log('if');
            $(this).removeClass('selected');
            for(var i=0; i < markers.length; i++) {
                markers[i].setVisible(true);
            }
          }
          else {
            console.log('else');
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
        $('.show-contact').on('click', function() {
          $('.request-info-modal').slideToggle('slow');
        });

      	var infoModal = $('.request-info-modal');
      	var calMth = $('.calendar-month');
      	var bedroomOpt = $('.bedroom-option');

      	var currentDate = new Date().toDateString();
      	var dateVals = currentDate.split(' ');
      	var month = dateVals[1];

      	var calYear = $('.calendar-year').find('input');
      	var currentYear = parseInt(dateVals[3]);

      	calYear.val(currentYear.toString());
      	bedroomOpt.first().attr('checked', 'checked').addClass('selectedOpt');

      	calMth.find('label').each(function() {
      		var parentListItem = $(this).parent('li');

      		if($(this).html() === month.toLowerCase()) {
      			parentListItem.addClass('selectedMth');
      			parentListItem.find('input[type=radio]').attr('checked', 'checked');
      		}
      	});

      	calMth.on('click', function() {
      		calMth.removeClass('selectedMth');
      		$(this).addClass('selectedMth');
      	});

      	bedroomOpt.on('click', function() {
      		bedroomOpt.removeClass('selectedOpt');
      		$(this).addClass('selectedOpt');
      	});

      	$('.previous-year').on('click', function() {
      		currentYear -= 1;
      		calYear.val(currentYear.toString());
      	});

      	$('.next-year').on('click', function() {
      		currentYear += 1;
      		calYear.val(currentYear);
      	});

      	$('.subcription-form').on('submit', function() {
      		$('input[type=text]').val("");
      		calYear.val(currentYear.toString());
          $('.request-info-modal').slideToggle('slow');
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
