(function () {

	'use strict'


	AOS.init({
		duration: 800,
		easing: 'slide',
		once: true
	});

	var preloader = function() {

		var loader = document.querySelector('.loader');
		var overlay = document.getElementById('overlayer');

		function fadeOut(el) {
			el.style.opacity = 1;
			(function fade() {
				if ((el.style.opacity -= .1) < 0) {
					el.style.display = "none";
				} else {
					requestAnimationFrame(fade);
				}
			})();
		};

		setTimeout(function() {
			fadeOut(loader);
			fadeOut(overlay);
		}, 200);
	};
	preloader();
	

	var tinySdlier = function() {

		var heroSlider = document.querySelectorAll('.hero-slide');
		var propertySlider = document.querySelectorAll('.property-slider');
		var imgPropertySlider = document.querySelectorAll('.img-property-slide');
		var testimonialSlider = document.querySelectorAll('.testimonial-slider');
		

		if ( heroSlider.length > 0 ) {
			var tnsHeroSlider = tns({
				container: '.hero-slide',
				mode: 'carousel',
				speed: 700,
				autoplay: true,
				controls: false,
				nav: false,
				autoplayButtonOutput: false,
				controlsContainer: '#hero-nav',
			});
		}


		if ( imgPropertySlider.length > 0 ) {
			var tnsPropertyImageSlider = tns({
				container: '.img-property-slide',
				mode: 'carousel',
				speed: 700,
				items: 1,
				gutter: 30,
				autoplay: true,
				controls: false,
				nav: true,
				autoplayButtonOutput: false
			});
		}

		if ( propertySlider.length> 0 ) {
			var tnsSlider = tns({
				container: '.property-slider',
				mode: 'carousel',
				speed: 700,
				gutter: 30,
				items: 3,
				autoplay: true,
				autoplayButtonOutput: false,
				controlsContainer: '#property-nav',
				responsive: {
					0: {
						items: 1
					},
					700: {
						items: 2
					},
					900: {
						items: 3
					}
				}
			});
		}


		if ( testimonialSlider.length> 0 ) {
			var tnsSlider = tns({
				container: '.testimonial-slider',
				mode: 'carousel',
				speed: 700,
				items: 3,
				gutter: 50,
				autoplay: true,
				autoplayButtonOutput: false,
				controlsContainer: '#testimonial-nav',
				responsive: {
					0: {
						items: 1
					},
					700: {
						items: 2
					},
					900: {
						items: 3
					}
				}
			});
		}
	}
	tinySdlier();

	var dreamTeam = function() {
		var userType = document.querySelectorAll('#userType input');
		if (userType.length > 0 ) {
			for (var i = 0; i < userType.length; i++) {
				userType[i].onchange = function()
				{
					userTypeSection(userType);
				}
			  }
		}

		function userTypeSection(userType) {
			if (userType.length > 0 ) {
				var agencyField = document.querySelector('#agencyField');
				if(document.querySelector('#propm-sole:checked') || document.querySelector('#propm-agency:checked'))
					agencyField.className = "d-block";
				else
					agencyField.className  = "d-none";
			}	
		};

		// var pswChangeLink = $('#passwordChangeLink');
		// if (pswChangeLink) {
		// 	pswChangeLink.click(function(e) {
		// 		e.preventDefault();
		// 		passwordChange();
		// 	  });
		// }	
			  

		function passwordChange() {
			var pswChangeDiv = $('#passwordChange');
			var pswChangeLinkDiv = $('#passwordChangeLink');
			if(pswChangeDiv.hasClass("d-none")){
				pswChangeDiv.attr("class","d-block"); 
				pswChangeLinkDiv.attr("class","d-none"); 
			}
			else {
				pswChangeDiv.attr("class","d-none"); 
				pswChangeLinkDiv.attr("class","d-block"); 
			}
		};
	}
	dreamTeam();
})()