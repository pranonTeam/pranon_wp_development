(function(jQuery) {
	"use strict";

	// ------------------------------------- Waiting for the entire site to load
	// ------------------------------------------------//

	jQuery(window).load(function() {
		jQuery("#loaderInner").fadeOut();
		jQuery("#loader").delay(400).fadeOut("slow");
	});

	jQuery(document)
			.ready(
					function() {

						var header = jQuery('.mainHeader'), pos = header
								.offset();

						header.css({
							display : 'none'
						});

						jQuery(window)
								.scroll(
										function() {
											if (jQuery(this).scrollTop() > pos.top + 20
													&& header
															.hasClass('default')) {
												header
														.fadeOut(
																'fast',
																function() {
																	jQuery(this)
																			.removeClass(
																					'default')
																			.addClass(
																					'switchedHeader')
																			.slideDown(
																					200);
																});
											} else if (jQuery(this).scrollTop() <= pos.top + 20
													&& header
															.hasClass('switchedHeader')) {
												header
														.slideUp(
																200,
																function() {
																	jQuery(this)
																			.removeClass(
																					'switchedHeader')
																			.addClass(
																					'default')
																			.slideUp(
																					200);
																});
											}
										});

						// ------------------------------------- Navigation
						// setup
						// ------------------------------------------------//

						jQuery('a.scroll').smoothScroll({
							speed : 800,
							offset : -85
						});

						jQuery('.mainNav li').on(
								'mouseover',
								function() {

									jQuery(this).children('ul.dropDown').stop(
											true, true).fadeIn(200);
									jQuery(this).children('ul.dropDown').css(
											"display", "block");

								}).on(
								'mouseleave',
								function() {
									jQuery(this).children('ul.dropDown').stop(
											true, true).fadeOut(200);
								});

						// ------------------------------------- End navigation
						// setup
						// ------------------------------------------------//

						// ---------------------------------- Main slider
						// setup-----------------------------------------//

						jQuery('.mainSlider').flexslider({
							animation : "fade",
							slideshow : true,
							directionNav : false,
							controlNav : true
						});

						if (!(/android|blackberry|windows phone|iphone|ipad|ipod/i)
								.test(navigator.userAgent.toLowerCase())) {

							jQuery(window)
									.scroll(
											function() {
												var scrolling = jQuery(window)
														.scrollTop();
												if (jQuery(window).scrollTop() < jQuery(
														'.mainSlider')
														.outerHeight()) {
													jQuery(
															'.mainSlider .slidesInner')
															.css(
																	'opacity',
																	(1 - (scrolling / 300)));
													jQuery('.mainSlider')
															.css(
																	{
																		transform : "translate3d(0, "
																				+ scrolling
																				/ 2
																				+ "px, 0)"
																	});

												}
											});

						}

						// ---------------------------------- End main slider
						// setup-----------------------------------------//

						// ---------------------------------- Single page
						// header-----------------------------------------//

						if (!(/android|blackberry|windows phone|iphone|ipad|ipod/i)
								.test(navigator.userAgent.toLowerCase())) {

							jQuery('.hSingleHeight').css('height', 420);
							jQuery('.headerSingle').next().css('margin-top',
									420);

						}

						// ---------------------------------- End single page
						// header-----------------------------------------//

						// ----------------------------------
						// Parallax-----------------------------------------//

						jQuery(".clients,  .process").parallax("100%", 0.3);
						jQuery(".facts").parallax("100%", 0.3);
						jQuery(".testimonials").parallax("100%", 0.3);
						jQuery(".socials").parallax("100%", 0.3);

						// ---------------------------------- End parallax
						// -----------------------------------------//

						// ---------------------------------- Site
						// slider-----------------------------------------//

						jQuery('.slider').flexslider({
							animation : "slide",
							slideshow : true,
							directionNav : false,
							controlNav : true
						});

						jQuery('.clientSlider').flexslider({
							animation : "slide",
							slideshow : true,
							directionNav : false,
							itemWidth : 53,
							itemMargin : 0,
							minItems : 2,
							maxItems : 6,
							controlNav : false
						});

						// ---------------------------------- End site
						// slider-----------------------------------------//

						// ---------------------------------- Facts
						// animation-----------------------------------------//

						jQuery('.facts').appear(function() {
							jQuery(".count").each(function() {
								var counter = jQuery(this).html();
								jQuery(this).countTo({
									from : 0,
									to : counter,
									speed : 2000,
									refreshInterval : 10,
								});
							});
						});

						// ---------------------------------- End facts
						// animations
						// -----------------------------------------//

						// --------------------------------- Tabs and accordion
						// --------------------------------//

						jQuery("#tabs").tabs();
						jQuery("#accordion").accordion();
						var selectedEffect = jQuery("#effectTypes").val();
						var link = jQuery("#button")
						var options = {};

						if (selectedEffect === "slide") {
							options = {
								percent : 0
							};
						} else if (selectedEffect === "size") {
							options = {
								to : {
									width : 200,
									height : 60
								}
							};
						}

						jQuery("#effect").toggle(selectedEffect, options, 500);

						// --------------------------------- End tabs and
						// accordion --------------------------------//

						// ---------------------------------- Zoom images hover
						// animation-----------------------------------------//

						jQuery('.servBtn a, a.smore').mouseenter(
								function() {
									jQuery(this).closest('#about').find(
											'.servImg').css('transform',
											'scale(1.3)');
								}).mouseleave(
								function() {
									jQuery(this).closest('#about').find(
											'.servImg').css('transform',
											'scale(1.1)');
								});

						jQuery(' .workBtn a, a.pmore').mouseenter(
								function() {
									jQuery(this).closest('#about').find(
											'.workImg').css('transform',
											'scale(1.3)');
								}).mouseleave(
								function() {
									jQuery(this).closest('#about').find(
											'.workImg').css('transform',
											'scale(1.1)');
								});

						jQuery('a.amore').mouseenter(
								function() {
									jQuery(this).closest('.heroBottom').find(
											'.heroBImg').css('transform',
											'scale(1.3)');
								}).mouseleave(
								function() {
									jQuery(this).closest('.heroBottom').find(
											'.heroBImg').css('transform',
											'scale(1.1)');
								});

						jQuery('a.emore').mouseenter(
								function() {
									jQuery(this).closest('.errHolder').find(
											'.errImg').css('transform',
											'scale(1.3)');
								}).mouseleave(
								function() {
									jQuery(this).closest('.errHolder').find(
											'.errImg').css('transform',
											'scale(1.1)');
								});

						jQuery('a.wmore').mouseenter(
								function() {
									jQuery(this).closest('.widget').find(
											'.bannerImg ').css('transform',
											'scale(1.3)');
								}).mouseleave(
								function() {
									jQuery(this).closest('.widget').find(
											'.bannerImg ').css('transform',
											'scale(1.1)');
								});

						jQuery('ul.ftPost li a, ul.catRecents li a')
								.mouseenter(
										function() {
											jQuery(this).find('span').css(
													'marginLeft', 7);
										}).mouseleave(
										function() {
											jQuery(this).find('span').css(
													'marginLeft', 0);
										});

						// ---------------------------------- End zoom hover
						// images animation
						// -----------------------------------------//

						// ---------------------------------- Portfolio
						// -----------------------------------------//

						jQuery(".itemDesc, .projLink, .prodDesc").css({
							opacity : 0
						});

						// --------------------------------- Hover animation for
						// the elements of the portfolio
						// --------------------------------//

						jQuery('.itemDesc, .projLink, .prodDesc').hover(
								function() {
									jQuery(this).stop().animate({
										opacity : 1
									}, 'slow');
								}, function() {
									jQuery(this).stop().animate({
										opacity : 0
									}, 'slow');
								});

						jQuery('.itemDesc, .projLink, .prodDesc')
								.hover(
										function() {
											var projDesc = jQuery(this)
													.find(
															'.itemDesc, .latestDesc, .projLink, .prodDesc');
											var offset = (jQuery(this).height() / 2)
													- (projDesc.height() / 2);
											jQuery(this).find('.itemDescInner')
													.css('padding-top',
															offset - 50);
											jQuery(this).find('.projLinkInner')
													.css('padding-top',
															offset - 20);
											jQuery(this).find('.prodDescInner')
													.css('padding-top',
															offset - 78);
										});

						// --------------------------------- End hover animation
						// for the elements of the portfolio
						// --------------------------------//

						// -----------------------------------Initilaizing
						// magnificPopup for the
						// portfolio-------------------------------------------------//
						jQuery('.folio').magnificPopup({
							type : 'image'
						});

						jQuery('.popup-youtube, .popup-vimeo').magnificPopup({
							disableOn : 700,
							type : 'iframe',
							mainClass : 'mfp-fade',
							removalDelay : 160,
							preloader : false,

							fixedContentPos : false
						});

						// -----------------------------------End initilaizing
						// fancybox for the
						// portfolio-------------------------------------------------//

						// --------------------------------- Sorting portfolio
						// elements with quicksand plugin
						// --------------------------------//

						var jQueryportfolioClone = jQuery('.portfolio').clone();

						jQuery('.filter a')
								.click(
										function(e) {
											e.preventDefault();
											jQuery('.filter li').removeClass(
													'current');
											var jQueryfilterClass = jQuery(this)
													.parent().attr('class');
											if (jQueryfilterClass == 'all') {
												var jQueryfilteredPortfolio = jQueryportfolioClone
														.find('li');
											} else {
												var jQueryfilteredPortfolio = jQueryportfolioClone
														.find('li[data-type~='
																+ jQueryfilterClass
																+ ']');
											}
											jQuery('.portfolio')
													.quicksand(
															jQueryfilteredPortfolio,
															{
																duration : 800,
																easing : 'easeInOutQuad'
															},
															function() {
																jQuery(
																		'.itemDesc')
																		.hover(
																				function() {
																					jQuery(
																							this)
																							.stop()
																							.animate(
																									{
																										opacity : 1
																									},
																									'slow');
																				},
																				function() {
																					jQuery(
																							this)
																							.stop()
																							.animate(
																									{
																										opacity : 0
																									},
																									'slow');
																				});

																jQuery(
																		'.itemDesc')
																		.hover(
																				function() {
																					var projDesc = jQuery(
																							this)
																							.find(
																									'.itemDesc');
																					var offset = (jQuery(
																							this)
																							.height() / 2)
																							- (projDesc
																									.height() / 2);
																					jQuery(
																							this)
																							.find(
																									'.itemDescInner')
																							.css(
																									'padding-top',
																									offset - 50);
																				});

																// ------------------------------
																// Reinitilaizing
																// fancybox for
																// the new
																// cloned
																// elements of
																// the
																// portfolio----------------------------//

																jQuery('.folio')
																		.magnificPopup(
																				{
																					type : 'image'
																				});

																jQuery(
																		'.popup-youtube, .popup-vimeo')
																		.magnificPopup(
																				{
																					disableOn : 700,
																					type : 'iframe',
																					mainClass : 'mfp-fade',
																					removalDelay : 160,
																					preloader : false,

																					fixedContentPos : false
																				});

																// --------------------------
																// End
																// reinitilaizing
																// fancybox for
																// the new
																// cloned
																// elements of
																// the portfolio
																// ----------------------------//

															});

											jQuery(this).parent().addClass(
													'current');
											e.preventDefault();
										});

						// --------------------------------- End sorting
						// portfolio elements with quicksand
						// plugin--------------------------------//

						// ---------------------------------- End
						// portfolio-----------------------------------------//

						// ---------------------------------- Form
						// validation-----------------------------------------//

						/*
						 * jQuery('#submit').click(function(){
						 * 
						 * jQuery('input#name').removeClass("errorForm");
						 * jQuery('textarea#message').removeClass("errorForm");
						 * jQuery('input#email').removeClass("errorForm");
						 * 
						 * var error = false; var name =
						 * jQuery('input#name').val(); if(name == "" || name == " ") {
						 * error = true;
						 * jQuery('input#name').addClass("errorForm"); }
						 * 
						 * 
						 * var msg = jQuery('textarea#message').val(); if(msg == "" ||
						 * msg == " ") { error = true;
						 * jQuery('textarea#message').addClass("errorForm"); }
						 * 
						 * var email_compare =
						 * /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}jQuery/i;
						 * var email = jQuery('input#email').val(); if (email == "" ||
						 * email == " ") {
						 * jQuery('input#email').addClass("errorForm"); error =
						 * true; }else if (!email_compare.test(email)) {
						 * jQuery('input#email').addClass("errorForm"); error =
						 * true; }
						 * 
						 * if(error == true) { return false; }
						 * 
						 * var data_string = jQuery('.contactForm form,
						 * .replyForm form').serialize();
						 * 
						 * 
						 * jQuery.ajax({ type: "POST", url: jQuery('.contactForm
						 * form, .replyForm form').attr('action'), data:
						 * data_string,
						 * 
						 * success: function(message) { if(message ==
						 * 'SENDING'){ jQuery('#success').fadeIn('slow'); }
						 * else{ jQuery('#error').fadeIn('slow'); } }
						 * 
						 * });
						 * 
						 * return false; });
						 */

						// ---------------------------------- End form
						// validation-----------------------------------------//
						// --------------------------------- Mobile menu
						// --------------------------------//
						var mobileBtn = jQuery('.mobileBtn');
						var nav = jQuery('.mainNav');
						var navHeight = nav.height();

						jQuery(mobileBtn).click(function(e) {
							e.preventDefault();
							nav.slideToggle();

						});

						jQuery(window).resize(function() {
							var w = jQuery(window).width();
							if (w > 320 && nav.is(':hidden')) {
								nav.removeAttr('style');
							}

						});

						// --------------------------------- End mobile menu
						// --------------------------------//

						// --------------------------------- Twitter feed
						// --------------------------------//

						if (typeof (tweet_obj) != "undefined"
								&& tweet_obj != null) {
							jQuery(".tweets").tweet({
								join_text : false,
								username : tweet_obj.username,
								modpath : tweet_obj.url,
								avatar_size : false,
								count : tweet_obj.number_tweet,
								auto_join_text_default : ' we said, ',
								auto_join_text_ed : ' we ',
								auto_join_text_ing : ' we were ',
								auto_join_text_reply : ' we replied to ',
								auto_join_text_url : ' we were checking out ',
								loading_text : 'Loading tweets...'

							});
						}

						// --------------------------------- End twitter feed
						// --------------------------------//

						// --------------------------------- Random
						// images-------------------------------//

						jQuery(function() {
							var randomImg = [ 'r1.jpg', 'r2.jpg', 'r3.jpg' ];
							// jQuery('.headerSingle').css({'background-image':
							// 'url(images/teaserImages/' +
							// randomImg[Math.floor(Math.random() *
							// randomImg.length)] + ')'});
						});

						// --------------------------------- End random
						// images--------------------------------//

						// ---------------------------------- Instagram feed
						// -----------------------------------------//
						
						if (typeof (instagram_obj) != "undefined"
								&& instagram_obj != null) {
							jQuery.fn.spectragram.accessData = {
								accessToken : instagram_obj.accessToken,
								clientID : instagram_obj.clientID
							}

							jQuery('.instaFeed').spectragram('getUserFeed', {
								query : 'insideenvato', // Change the instagram
								// feed
								// user to display the feed
								// that you want.
								size : 'large'
							});
						}
						// ---------------------------------- End instagram feed
						// -----------------------------------------//

						// ---------------------------------
						// Counter--------------------------------//
						var myDate = new Date();
						myDate = new Date(myDate.getFullYear() + 1, 12 - 11, 10);
						jQuery('.counter').countdown({
							until : myDate
						});
						// --------------------------------- End
						// counter--------------------------------//

						// ---------------------------------- Text animation
						// -----------------------------------------//

						jQuery(".rotate, .rotateP").textrotator({
							animation : "fade",
							separator : ",",
							speed : 3000
						});

						// ---------------------------------- End text animation
						// -----------------------------------------//

						jQuery('.woocommerce a.login').click(function(e) {
							e.preventDefault();
							jQuery('.woocommerce form.login').slideToggle();
						});

						jQuery('.woocommerce a.coupon').click(
								function(e) {
									e.preventDefault();
									jQuery('.woocommerce form.checkout_coupon')
											.slideToggle();
								});

						jQuery('.woocommerce-billing-fields #createaccount')
								.click(
										function() {
											if (jQuery(this).is(':checked')) {
												jQuery(
														'.woocommerce-billing-fields .create-account')
														.slideDown();
											} else {
												jQuery(
														'.woocommerce-billing-fields .create-account')
														.slideUp();
											}
										});

						jQuery(' #ship-to-different-address-checkbox')
								.click(
										function() {
											if (jQuery(this).is(':checked')) {
												jQuery('.shipping_address')
														.slideDown();
											} else {
												jQuery('.shipping_address')
														.slideUp();
											}
										});

					});

	jQuery('.payment_methods  li input[type=radio]').each(function() {
		if (jQuery(this).is(':checked')) {
			jQuery(this).parent().find('div.desc').show();
		}
	}).on('click', function() {
		jQuery('.payment_methods  div.desc').slideUp();
		if (jQuery(this).is(':checked')) {
			jQuery(this).parent().find('div.desc').slideDown();
		}
	});

	/* =========== css tweak for visual composer ============ */

	/*jQuery('.what_we_do_column').parent().parent().parent().removeClass('vc_row wpb_row vc_row-fluid')
			.addClass('container clearfix margLBottom');
	jQuery('.what_we_do_column_2').parent().parent().css({'padding':'0px'}).addClass('changeBg');
	
	
	jQuery('div.ftWidget ul').addClass('ftPost');
	jQuery('div.ftWidget ul.ftPost').find('a').append(' <span>&rarr;</span>');
	jQuery('.pranon_team').parent().parent().parent().removeClass('vc_row wpb_row vc_row-fluid').addClass('container clearfix');
	jQuery('.pixel_skill_exprties').parent().parent().parent().removeClass('vc_row wpb_row vc_row-fluid').addClass('container clearfix margMBottom expo_pixel');
	jQuery('.pixel_skill_exprties').parent().parent().css({
		'padding-left' : '0px',
		'padding-right' : '0px'
	});
	jQuery('.pixel_fun_fact').parent().parent().css({
		'padding-left' : '10px',
		'padding-right' : '10px'
	}).wrapAll('<div class="facts overlay tCenter ofsTopL ofsBottomL"><div class="container clearfix"> </div></div>');
	
	jQuery('.pixel_price_table').parent().parent().css({
		'padding-left' : '10px',
		'padding-right' : '10px'
	}).wrapAll('<div class="pricingHolder  ofsTop ofsBottom"><div class="container clearfix"> </div></div>');

	jQuery('.vc_tta-panels-container').parents('.wpb_column').wrapAll('<div class="container clearfix"> </div>');
	jQuery('.vc_tta-panels-container').parents('.wpb_column').css({
		'padding-left' : '10px',
		'padding-right' : '10px'
	});
	jQuery('.additional_services').parents('.wpb_column').wrapAll('<div class="container clearfix"> </div>');
	jQuery('.additional_services').parents('.wpb_column').css({
		'padding-left' : '10px',
		'padding-right' : '10px'
	});*/
	
	
	jQuery('div.ftWidget ul').addClass('ftPost');
	jQuery('div.ftWidget ul.ftPost').find('a').append(' <span>&rarr;</span>');
	jQuery('div.credentials').parent().parent().css({
		'padding-left' : '0px',
		'padding-right' : '0px'
	});
	jQuery('.aboutIntroContent a').parent('p').css({
		"margin" : "0 auto"
	});
	jQuery('.what_we_do_column_2').parent().parent().css({'padding':'0px'}).addClass('changeBg');
	
	jQuery(".vc_parallax").each(function(){
			var $height = jQuery(this).height();
			jQuery(this).css({'height':$height});
	    });
	jQuery('div.tagsSingle ul').addClass('tagsListSingle');
	jQuery('.infoHolder').parents('div.vc_row').addClass('ofsInTop ofsInBottom bgYellow');
})(jQuery);
