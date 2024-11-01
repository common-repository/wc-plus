// Produt Slider
document.addEventListener( 'DOMContentLoaded', function() {
	if(jQuery("#wcPlus-sliders").hasClass("splide")){ //alert("fdfdfdf");
	  var isMobile = window.innerWidth < 768;
      var perPage = isMobile ? 2 : 3;
	  var splide = new Splide( '.splide', {
	  type    : 'loop',
	  autoplay: false,
	  perPage : perPage,
	  perMove: 1,
	} );
	  splide.mount();
	}
  	
} );

