/* ---------------------------------------------------------------------- */
/*	Template Settings													  */
/* ---------------------------------------------------------------------- */

	var fixed_menu = 1;

	var CONFIG = (function ($, window) {
		
		return {

			/* ---------------------------------------------------- */
			/*	Main Settings										*/
			/* ---------------------------------------------------- */

			objTemplate: {
				animatedElem: true, 				// Boolean:  (true/false)
				stickyHeader: (fixed_menu=='0') ? false : true,	// Boolean:  (true/false)
				repairWidthMegaMenu: 90
                                
			},
			
			/* ---------------------------------------------------- */
			/*	Portfolio Mixitup									*/
			/* ---------------------------------------------------- */
			
			objMixitup: {
				animation: {
					enable: true,
					duration: 400,
					effects: 'fade translateX(50%) scale(0.75) translateY(20%) stagger(96ms)',
					easing: 'cubic-bezier(0.55, 0.585, 0.68, 0.53)'
				},
				controls: {
					enable: true,
					live: false,
					toggleFilterButtons: false,
					toggleLogic: 'or',
					activeClass: 'active'
				},
				layout: {
					display: 'inline-block',
					containerClass: '',
					containerClassFail: 'fail'
				},
				load: {
					filter: 'all'
				},
				selectors: {
					target: '.mix',
					filter: '.filter'
				}
			},
			
			/* ---------------------------------------------------- */
			/*	Tweets												*/
			/* ---------------------------------------------------- */

			/* Sidebar Tweet */

			objSidebarTweet: {
				username: "ThemeMakers", // Username Twitter
				count: 2,
				page: 1,
				loading_text: 'loading ...'
			},		
			
			
			/* ---------------------------------------------------- */
			/*	Image Slider										*/
			/* ---------------------------------------------------- */

			objImageSlider: {
				autoPlay : 5000,
				stopOnHover : true,					
				navigation: true,
				slideSpeed: 300,
				paginationSpeed: 400,
				singleItem: true,
				theme : "owl-theme",
				transitionStyle : "scaleToFade"
			},

			/* ---------------------------------------------------- */
			/*	Clients Items										*/
			/* ---------------------------------------------------- */

			objClientsItems: {
				autoPlay : 5000,
				stopOnHover : true,					
				navigation: false,
				slideSpeed: 300,
				paginationSpeed: 400,
				singleItem: true,
				theme : "owl-theme",
				transitionStyle : "scaleToFade"
			},

			/* ---------------------------------------------------- */
			/*	Quotes												*/
			/* ---------------------------------------------------- */

			objQuotes: {
				autoPlay : 5000,
				stopOnHover : true,
				navigation: false,
				slideSpeed: 300,
				singleItem: true,
				transitionStyle : "backSlide"
			},

			/* ---------------------------------------------------- */
			/*	Cycle Rotator										*/
			/* ---------------------------------------------------- */

			objCycleRotator: {
				autoPlay : 3000,
				stopOnHover : true,
				navigation: false,
				pagination: true,
				slideSpeed: 300,
				singleItem: true,
				transitionStyle : "verticalSlide"
			},			

			/* ---------------------------------------------------- */
			/*	Textislide											*/
			/* ---------------------------------------------------- */

			objSloganGroup: {
				pagination: true,
				autoStart: true,
				autoPlay: 5000,
				autoHeight: true,
				headlinesSettings: {
					0: {
						from: { delay: 400 },
						to: { sync: true }
					},
					1: {
						from: { delay: 1500, sync: true },
						to: { sync: true }
					}
				}
			},

			/* ---------------------------------------------------- */
			/*	Tooltipster											*/
			/* ---------------------------------------------------- */

			objTooltipster : {
				animation: 'grow'	// Choose fade, grow, swing, slide, fall
			}

		}

	}(jQuery, window));
	
/* ---------------------------------------------------------------------- */
/*	end Template Settings												  */
/* ---------------------------------------------------------------------- */			
		