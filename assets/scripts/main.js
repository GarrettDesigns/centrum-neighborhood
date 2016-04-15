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
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
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

        $('.gallery-slider').owlCarousel({
          animateOut: 'fadeOut',
          items:1,
          margin: 30,
          smartSpeed:450,
          nav: true,
          dots: false,
          responsiveRefreshRate: 0,
          loop: true,
          navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>']
        });

        $('.gallery-button').on('click', function(e) {
          e.preventDefault();
          $(this).parents('li').find('.gallery-modal').fadeIn('slow');
        });

        $('.gallery-close-button').on('click', function() {
          $('.gallery-modal').fadeOut('slow');
        });

        // $('.map-modal-button').on('click', function(e) {
        //   e.preventDefault();
        //   $('.neighborhood-hero').find('.neighborhood-map-modal').fadeIn('slow');
        //   initMap();
        // });

        $('.close-map').on('click', function() {
          $('.neighborhood-map-modal').fadeOut('slow');
        });

        $('.amenities-main--list-item').on('click', 'img', function() {

          var thisItem = $(this);
          var parentListItems = thisItem.parents('li');
          var siblingListItems = parentListItems.siblings();

          $('.amenities-main--heading').find('.inner-heading').fadeOut('slow');

          thisItem.addClass('detail-view')
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
          thisItem.parent().hide();
          parentListItems.next().find('.gallery-modal').show();
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
        });

        var lakeviewDiningLocations = map_locations.lakeview_dining_markers;
        var lakeviewGroceryLocations = map_locations.lakeview_grocery_markers;
        var lakeviewFitnessLocations = map_locations.lakeview_fitness_markers;
        var lakeviewSalonsLocations = map_locations.lakeview_salons_markers;
        var lakeviewCoffeeLocations = map_locations.lakeview_coffee_markers;
        var lakeviewEducationLocations = map_locations.lakeview_education_markers;
        var lakeviewRetailLocations = map_locations.lakeview_retail_markers;

        // Basic options for a simple Google Map
        // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
        var mapOptions = {
            // How zoomed in you want the map to start at (always required)
            zoom: 17,

            mapTypeControl: false,

            scrollwheel: false,

            // The latitude and longitude to center the map (always required)
            center: new google.maps.LatLng(41.9432695, -87.6713262), // Lakeview

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

        var categories = {
          dining: {
            path: google.maps.SymbolPath.CIRCLE,
            fillColor: '#1a6ad6',
            fillOpacity: 0.8,
            scale: 7,
            strokeColor: '#1a6ad6',
            strokeWeight: 1
          },
          grocery: {
            path: google.maps.SymbolPath.CIRCLE,
            fillColor: '#e56829',
            fillOpacity: 0.8,
            scale: 7,
            strokeColor: '#e56829',
            strokeWeight: 1
          },
          fitness: {
            path: google.maps.SymbolPath.CIRCLE,
            fillColor: '#edc729',
            fillOpacity: 0.8,
            scale: 7,
            strokeColor: '#edc729',
            strokeWeight: 1
          },
          salons: {
            path: google.maps.SymbolPath.CIRCLE,
            fillColor: '#00a5b9',
            fillOpacity: 0.8,
            scale: 7,
            strokeColor: '#00a5b9',
            strokeWeight: 1
          },
          coffee: {
            path: google.maps.SymbolPath.CIRCLE,
            fillColor: '#af3c9b',
            fillOpacity: 0.8,
            scale: 7,
            strokeColor: '#af3c9b',
            strokeWeight: 1
          },
          education: {
            path: google.maps.SymbolPath.CIRCLE,
            fillColor: '#647dd6',
            fillOpacity: 0.8,
            scale: 7,
            strokeColor: '#647dd6',
            strokeWeight: 1
          },
          retail: {
            path: google.maps.SymbolPath.CIRCLE,
            fillColor: '#c84a81',
            fillOpacity: 0.8,
            scale: 7,
            strokeColor: '#c84a81',
            strokeWeight: 1
          },
          centrum: {
            path: google.maps.SymbolPath.CIRCLE,
            fillColor: '#173e73',
            fillOpacity: 0.8,
            scale: 12,
            strokeColor: '#173e73',
            strokeWeight: 1
          }
        };

        function initMap() {
            map = new google.maps.Map(mapElement, mapOptions);

            var marker = new google.maps.Marker({
              map: map,
              icon: categories.centrum,
              title: 'Centrum Lakeview',
              label: 'C',
              position: {lat: 41.9432695, lng: -87.6713262}
            });

            setMarkers(map, categories.dining, lakeviewDiningLocations);
            setMarkers(map, categories.grocery, lakeviewGroceryLocations);
            setMarkers(map, categories.fitness, lakeviewFitnessLocations);
            setMarkers(map, categories.salons, lakeviewSalonsLocations);
            setMarkers(map, categories.coffee, lakeviewCoffeeLocations);
            setMarkers(map, categories.education, lakeviewEducationLocations);
            setMarkers(map, categories.retail, lakeviewRetailLocations);
        }

        function setMarkers(map, icon, propertyLocation) {
          // Adds markers to the map.
          var property;
          var locationInfo = [];

          for (var i = 0; i < propertyLocation.length; i++) {
            property = propertyLocation[i];

            locationInfo[i] = '<div class="location-info">' +
            '<h2 class="location-title">' + property.location_name + '</h2>' +
            '<a class="location-url" href="' + property.location_link + '">More Info</a>' +
            '</div>';

            var marker = new google.maps.Marker({
              position: {lat: parseFloat(property.location_latitude), lng: parseFloat(property.location_longitude)},
              map: map,
              icon: icon
            });
            setMarkerContent(marker, locationInfo[i]);
            // console.log("Iteration " + i + ":");
            // console.log(infoBubble[i]);
        }

        function setMarkerContent(marker, content) {
          infoBubble = new InfoBubble({
            backgroundColor: '#173e73',
            hideCloseButton: true
          });
          marker.addListener('click', function() {
            infoBubble.setContent(content);
            infoBubble.open(map, marker);
          });
        }
        map.addListener('click', function() {
          infoBubble.close();
        });
      }

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
