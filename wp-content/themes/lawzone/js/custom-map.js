(function($) {
	//https://hpneo.github.io/gmaps/examples.html
	
	"use strict";

	var mapthmcolor = [
	    {
	        "featureType": "administrative",
	        "elementType": "labels.text.fill",
	        "stylers": [
	            {
	                "color": "#444444"
	            }
	        ]
	    },
	    {
	        "featureType": "landscape",
	        "elementType": "all",
	        "stylers": [
	            {
	                "color": "#f2f2f2"
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
	            }
	        ]
	    },
	    {
	        "featureType": "road.highway",
	        "elementType": "all",
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
	                "color": "#6aaf08"
	            },
	            {
	                "visibility": "on"
	            }
	        ]
	    }
	];

	var googlemapcolor = [
	    {
	        "featureType": "administrative",
	        "elementType": "labels.text.fill",
	        "stylers": [
	            {
	                "color": "#444444"
	            }
	        ]
	    },
	    {
	        "featureType": "landscape",
	        "elementType": "all",
	        "stylers": [
	            {
	                "color": "#f2f2f2"
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
	            }
	        ]
	    },
	    {
	        "featureType": "road.highway",
	        "elementType": "all",
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
	                "color": "#f7b12b"
	            },
	            {
	                "visibility": "on"
	            }
	        ]
	    }
	];
	
	// Google Map Style Default
	if($('#map-default').length){
		var map;
		 map = new GMaps({
			el: '#map-default',
			zoom: 14,
			scrollwheel:false,
			//Set Latitude and Longitude Here
			lat: -37.817085,
			lng: 144.955631,
			styles: googlemapcolor
		  });
		  
		  //Add map Marker
		  map.addMarker({
			lat: -37.817085,
			lng: 144.955631,
			infoWindow: {
			  content: '<p style="text-align:center;"><strong>Envato</strong><br>Melbourne VIC 3000, Australia</p>'
			}
		 
		});
	}
	
	// Google Map Style ThemeColor
	if($('#map-view').length){
		var map;
		 map = new GMaps({
			el: '#map-view',
			zoom: 14,
			scrollwheel:false,
			//Set Latitude and Longitude Here
			lat: -37.817085,
			lng: 144.955631,
			styles: mapthmcolor
		  });
		  
		  //Add map Marker
		  map.addMarker({
			lat: -37.817085,
			lng: 144.955631,
			icon: "images/icons/marker-thm.png",
			infoWindow: {
			  content: '<p style="text-align:center;"><strong>Envato</strong><br>Melbourne VIC 3000, Australia</p>'
			}
		 
		});
	}
	
	// Google Map Style ThemeColor
	if($('#map-markers').length){
	 var map;
	 map = new GMaps({
		el: '#map-markers',
		zoom: 14,
		scrollwheel:true,
		//Set Latitude and Longitude Here
		lat: -37.817085,
		lng: 144.955631,
		styles: mapthmcolor
	  });
	  
	  //Add map Marker
	  map.addMarker({
        lat: -37.82,
		lng: 144.96,
		icon: "images/icons/marker-default.png",
        title: 'VIC 3000, Melbourne',
        infoWindow: {
          content: '<p style="text-align:center;"><strong>Envato Brunch Office</strong><br>Melbourne VIC 3000, Australia</p>'
        }
      });
	  
	  //Add map Marker Two
      map.addMarker({
        lat: -37.817085,
		lng: 144.955631,
		icon: "images/icons/marker-default.png",
        title: 'Melbourne, Australia',
        infoWindow: {
          content: '<p style="text-align:center;"><strong>Envato Office</strong><br>Melbourne VIC 3000, Australia</p>'
        }
      });

	}
	
	// Google Map Style ThemeColor
	if($('#map-control').length){
	 var map;
	 map = new GMaps({
		el: '#map-control',
		zoom: 15,
		scrollwheel:false,
		//Set Latitude and Longitude Here
		lat: -37.817085,
		lng: 144.955631,
		styles: mapthmcolor
	  });
	  
	  //Add map Marker Two
      map.addMarker({
        lat: -37.817085,
		lng: 144.955631,
		icon: "images/icons/marker-thm.png",
        title: 'Melbourne, Australia',
        infoWindow: {
          content: '<p style="text-align:center;"><strong>Envato</strong><br>Melbourne VIC 3000, Australia</p>'
        }
      });

	  map.addControl({
		  position: 'top_right',
		  content: '<p style="text-align:center;"><strong>Envato</strong><br>Melbourne VIC 3000, Australia</p>',
		  style: {
		    margin: '5px',
		    padding: '1px 6px',
		    border: 'solid 1px #f7f7f7',
		    background: '#fff'
		  },
		  events: {
		    click: function(){
		      console.log(this);
		    }
		  }
	  });
	  
	}
	

})(window.jQuery);