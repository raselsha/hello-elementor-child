/*
Theme Name: Schema Lite
https://mythemeshop.com/themes/schema-lite/
*/

/*----------------------------------------------------
/* Responsive Navigation
/*--------------------------------------------------*/
jQuery(document).ready(function($){

	$('.toggle-mobile-menu').click(function(e) {
		e.preventDefault();
		e.stopPropagation();
		$('body').toggleClass('mobile-menu-active');
		if ( $('body').hasClass('mobile-menu-active') ) {
			$('#navigation').slideDown();
		} 
		else {
			$('#navigation').slideUp();
		}
	});
});

/*----------------------------------------------------
/*  Dropdown menu
/* ------------------------------------------------- */
jQuery(document).ready(function($) {
	
	function mtsDropdownMenu() {
		var wWidth = $(window).width();
		if(wWidth > 865) {
			$('#navigation ul.sub-menu, #navigation ul.children').hide();
			var timer;
			var delay = 100;
			$('#navigation li').hover( 
			  function() {
				var $this = $(this);
				timer = setTimeout(function() {
					$this.children('ul.sub-menu, ul.children').slideDown('fast');
				}, delay);
				
			  },
			  function() {
				$(this).children('ul.sub-menu, ul.children').hide();
				clearTimeout(timer);
			  }
			);
		} else {
			$('#navigation li').unbind('hover');
			$('#navigation li.active > ul.sub-menu, #navigation li.active > ul.children').show();
		}
	}

	mtsDropdownMenu();

	$(window).resize(function() {
		mtsDropdownMenu();
	});
});

/*---------------------------------------------------
/*  Vertical menus toggles
/* -------------------------------------------------*/
jQuery(document).ready(function($) {

	$('.widget_nav_menu, #navigation .menu').addClass('toggle-menu');
	$('.toggle-menu ul.sub-menu, .toggle-menu ul.children').addClass('toggle-submenu');
	$('.toggle-menu ul.sub-menu').parent().addClass('toggle-menu-item-parent');

	$('.toggle-menu .toggle-menu-item-parent').append('<span class="toggle-caret"><i class="schema-lite-icon icon-plus"></i></span>');

	$('.toggle-caret').click(function(e) {
		e.preventDefault();
		$(this).parent().toggleClass('active').children('.toggle-submenu').slideToggle('fast');
	});
});

/*----------------------------------------------------
/* Back to top smooth scrolling
/*--------------------------------------------------*/
jQuery(document).ready(function($) {
	jQuery('a[href=#top]').click(function(){
		jQuery('html, body').animate({scrollTop:0}, 'slow');
		return false;
	});
});
/*----------------------------------------------------
/* onscroll navbar fixed
/*--------------------------------------------------*/
window.onscroll = function () {
  myFunction();
};
function myFunction() {
  if (document.body.scrollTop > 0 || document.documentElement.scrollTop > 0) {
    document.getElementById("site-header").classList.add("fixed-header");
  } else {
    document.getElementById("site-header").classList.remove("fixed-header");
  }
}
//========= home toggle switcher=====
function modeSwitcher(mode) {
		var logo = document.getElementsByClassName("logo-img");
	if (mode == 'day') {
		document.body.classList.remove("dark-mode");
		logo[0].src = logo[0].src.replace("logo-white.svg", "logo-black.svg");
		logo[1].src = logo[1].src.replace("logo-white.svg", "logo-black.svg");
	} 
	if(mode=='night'){
		document.body.classList.add("dark-mode");
		logo[0].src = logo[0].src.replace("logo-black.svg", "logo-white.svg");
		logo[1].src = logo[1].src.replace("logo-black.svg", "logo-white.svg");
	}	
		
}
// =============subscriber form view===============
jQuery("#cmx-newsletter").hide();
jQuery("#cmx-subscribe-btn").on("click", function (e) {
	e.preventDefault();
	jQuery(this).hide();
	jQuery("#cmx-newsletter").show();
});

// ===========On scroll animation library init==========
AOS.init();

