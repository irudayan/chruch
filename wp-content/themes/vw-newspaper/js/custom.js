function vw_newspaper_menu_open_nav() {
	window.vw_newspaper_responsiveMenu=true;
	jQuery(".sidenav").addClass('show');
}
function vw_newspaper_menu_close_nav() {
	window.vw_newspaper_responsiveMenu=false;
 	jQuery(".sidenav").removeClass('show');
}

jQuery(function($){
 	"use strict";
   	jQuery('.main-menu > ul').superfish({
		delay:       500,
		animation:   {opacity:'show',height:'show'},  
		speed:       'fast'
   });
});

jQuery(document).ready(function () {
	window.vw_newspaper_currentfocus=null;
  	vw_newspaper_checkfocusdElement();
	var vw_newspaper_body = document.querySelector('body');
	vw_newspaper_body.addEventListener('keyup', vw_newspaper_check_tab_press);
	var vw_newspaper_gotoHome = false;
	var vw_newspaper_gotoClose = false;
	window.vw_newspaper_responsiveMenu=false;
 	function vw_newspaper_checkfocusdElement(){
	 	if(window.vw_newspaper_currentfocus=document.activeElement.className){
		 	window.vw_newspaper_currentfocus=document.activeElement.className;
	 	}
 	}
 	function vw_newspaper_check_tab_press(e) {
		"use strict";
		e = e || event;
		var activeElement;

		if(window.innerWidth < 999){
		if (e.keyCode == 9) {
			if(window.vw_newspaper_responsiveMenu){
			if (!e.shiftKey) {
				if(vw_newspaper_gotoHome) {
					jQuery( ".main-menu ul:first li:first a:first-child" ).focus();
				}
			}
			if (jQuery("a.closebtn.mobile-menu").is(":focus")) {
				vw_newspaper_gotoHome = true;
			} else {
				vw_newspaper_gotoHome = false;
			}

		}else{

			if(window.vw_newspaper_currentfocus=="responsivetoggle"){
				jQuery( "" ).focus();
			}}}
		}
		if (e.shiftKey && e.keyCode == 9) {
		if(window.innerWidth < 999){
			if(window.vw_newspaper_currentfocus=="header-search"){
				jQuery(".responsivetoggle").focus();
			}else{
				if(window.vw_newspaper_responsiveMenu){
				if(vw_newspaper_gotoClose){
					jQuery("a.closebtn.mobile-menu").focus();
				}
				if (jQuery( ".main-menu ul:first li:first a:first-child" ).is(":focus")) {
					vw_newspaper_gotoClose = true;
				} else {
					vw_newspaper_gotoClose = false;
				}
			
			}else{

			if(window.vw_newspaper_responsiveMenu){
			}}}}
		}
	 	vw_newspaper_checkfocusdElement();
	}
});

(function( $ ) {

	jQuery('document').ready(function($){
	    setTimeout(function () {
    		jQuery("#preloader").fadeOut("slow");
	    },1000);
	});

	$(window).scroll(function(){
		var sticky = $('.header-sticky'),
		scroll = $(window).scrollTop();

		if (scroll >= 100) sticky.addClass('header-fixed');
		else sticky.removeClass('header-fixed');
	});

	jQuery(document).ready(function() {
		var owl = jQuery('.owl-carousel');
			owl.owlCarousel({
				margin: 0,
				nav: true,
				autoplay:true,
				autoplayTimeout:2000,
				autoplayHoverPause:true,
				loop: true,
				navText : ['<i class="fa fa-lg fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-lg fa-chevron-right" aria-hidden="true"></i>'],
				responsive: {
				  0: {
				    items: 1
				  },
				  600: {
				    items: 3
				  },
				  1000: {
				    items: 3
				}
			}
		})
	})
	
	$(document).ready(function () {
		$(window).scroll(function () {
		    if ($(this).scrollTop() > 100) {
		        $('.scrollup i').fadeIn();
		    } else {
		        $('.scrollup i').fadeOut();
		    }
		});

		$('.scrollup i').click(function () {
		    $("html, body").animate({
		        scrollTop: 0
		    }, 600);
		    return false;
		});
	});

})( jQuery );

jQuery(document).ready(function () {
  	function vw_newspaper_search_loop_focus(element) {
	  var vw_newspaper_focus = element.find('select, input, textarea, button, a[href]');
	  var vw_newspaper_firstFocus = vw_newspaper_focus[0];  
	  var vw_newspaper_lastFocus = vw_newspaper_focus[vw_newspaper_focus.length - 1];
	  var KEYCODE_TAB = 9;

	  element.on('keydown', function vw_newspaper_search_loop_focus(e) {
	    var isTabPressed = (e.key === 'Tab' || e.keyCode === KEYCODE_TAB);

	    if (!isTabPressed) { 
	      return; 
	    }

	    if ( e.shiftKey ) /* shift + tab */ {
	      if (document.activeElement === vw_newspaper_firstFocus) {
	        vw_newspaper_lastFocus.focus();
	          e.preventDefault();
	        }
	      } else /* tab */ {
	      if (document.activeElement === vw_newspaper_lastFocus) {
	        vw_newspaper_firstFocus.focus();
	          e.preventDefault();
	        }
	      }
	  });
	}
	jQuery('.search-box span a').click(function(){
        jQuery(".serach_outer").slideDown(1000);
    	vw_newspaper_search_loop_focus(jQuery('.serach_outer'));
    });

    jQuery('.closepop a').click(function(){
        jQuery(".serach_outer").slideUp(1000);
    });
});