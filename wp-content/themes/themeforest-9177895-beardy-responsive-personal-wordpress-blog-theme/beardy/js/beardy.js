jQuery(document).ready(function($) {

	"use strict";
	

	//   B X S L I D E R   B X S L I D E R   B X S L I D E R   B X S L I D E R

	$('.bxslider').bxSlider({
	  adaptiveHeight: true,
	  mode: 'horizontal',
	  pager: false,
	  auto: true,
	  autoHover: true
	});
	

	//   O W L  C A R O U S E L   O W L  C A R O U S E L   O W L  C A R O U S E L

	$(".reviews-carousel").owlCarousel({
		nav : false,
		items : 3,
		margin: 20,
		autoplay : true,
		autoplayHoverPause : true,
		loop:true,
		autoplayTimeout:10000,
		responsive:{
	        0:{
	            items:1,
	        },
	        460:{
	            items:2,
	        },
	        768:{
	            items:1,
	        },
	        960:{
	            items:2,
	        },
	        1100:{
	            items:3,
	        }
	    }
	});


	//   P A R A L L A X   P A R A L L A X   P A R A L L A X   P A R A L L A X

	$('.reviews').parallax("50%", 0.3);
	$('.big-logo').parallax("50%", 0.4);


	//   S I T E  S E A R C H   S I T E  S E A R C H   S I T E  S E A R C H
	
	$('.site-search a').on('click', function ( e ) {
		e.preventDefault();
    	$('.search-toogle').fadeToggle('fast');
    });
    
	//   R E S P O N S I V E  N A V I G A T I O N   R E S P O N S I V E  N A V I G A T I O N

	$('.menu-toggle').on('click', function ( e ) {
		e.preventDefault();
    	$('.mobile-navigation').slideToggle('fast');
    });


	//   G M A P S   G M A P S   G M A P S   G M A P S   G M A P S   G M A P S

    /*var map;
    $(document).ready(function(){
		map = new GMaps({
			el: '#map',
			lat: -28.0176506,
			lng: 153.427515,
			width: '100%',
			height: '400px',
			disableDefaultUI: true
		});
		map.addMarker({
			icon  : 'http://reythemes.com/description/beardy-pin.png',
			lat: -28.019718,
			lng: 153.420582,
			title: 'Marker with InfoWindow',
			infoWindow: {
			  content: 'Beardy Headquarters'
			}
		});
		map.addMarker({
			icon  : 'http://reythemes.com/description/beardy-pin.png',
			lat: -28.013315,
			lng: 153.434358,
			title: 'Marker with InfoWindow',
			infoWindow: {
			  content: 'Our Surfspot'
			}
		});
    });*/

	
});
