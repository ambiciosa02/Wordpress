/* ===============================================
	OWL CAROUSEL SLIDER
=============================================== */

jQuery('document').ready(function(){
  var owl = jQuery('.slider .owl-carousel');
    owl.owlCarousel({
    margin:20,
    nav: false,
    autoplay : true,
    lazyLoad: true,
    autoplayTimeout: 3000,
    loop: false,
    dots: true,
    navText : ['<i class="fas fa-chevron-up"></i>','<i class="fas fa-chevron-down"></i>'],
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 1
      },
      1000: {
        items: 1
      }
    },
    autoplayHoverPause : true,
    mouseDrag: true
  });
});

/* ===============================================
  OPEN CLOSE MENU
============================================= */

function interior_decor_consultation_open_menu() {
  jQuery('button.toggle-menu').addClass('close-panal');
  setTimeout(function(){
    jQuery('.main-menu').show();
  }, 100);

  return false;
}

jQuery( "button.toggle-menu").on("click", interior_decor_consultation_open_menu);

function interior_decor_consultation_close_menu() {
  jQuery('button.close-menu').removeClass('close-panal');
  jQuery('.main-menu').hide();
}

jQuery( "button.close-menu").on("click", interior_decor_consultation_close_menu);

/* ===============================================
  TRAP TAB FOCUS ON MODAL MENU
============================================= */

jQuery('button.close-menu').on('keydown', function (e) {
  if (jQuery("this:focus") && (e.which === 9)) {
    e.preventDefault();
    jQuery(this).blur();
    jQuery('button.toggle-menu').focus();
  }
});

/* ===============================================
  SCROLL TOP
============================================= */

jQuery(window).scroll(function () {
  if (jQuery(this).scrollTop() > 100) {
    jQuery('.scroll-up').fadeIn();
  } else {
    jQuery('.scroll-up').fadeOut();
  }
});

jQuery('a[href="#tobottom"]').click(function () {
  jQuery('html, body').animate({scrollTop: 0}, 'slow');
  return false;
});

/*===============================================
 PRELOADER
=============================================== */

jQuery('document').ready(function($){
  setTimeout(function () {
  jQuery(".cssloader").fadeOut("fast");
},2000);
});


/* ===============================================
  STICKY-HEADER
============================================= */

jQuery(window).scroll(function () {
  var sticky = jQuery('.sticky-header'),
  scroll = jQuery(window).scrollTop();

  if (scroll >= 100) sticky.addClass('fixed-header');
  else sticky.removeClass('fixed-header');
});

/* ===============================================
  WORD CHANGE SLIDER
============================================= */

jQuery(document).ready(function() {
  jQuery(".slider_content h4").each(function() {
    var t = jQuery(this).text();
    var splitT = t.split(" ");
    var newText = "";    
    for(var i = 0; i < splitT.length; i++) {
      if(i == 0) {  // Change this condition to target the first word (index 0)
        newText += "<span class='color_change'>";
        newText += splitT[i] + " ";
        newText += "</span>";
      } else {
        newText += splitT[i] + " ";
      }      
    }    
    jQuery(this).html(newText.trim());  // Trim to remove any trailing space
  });
});

/* ===============================================
  TABS
=============================================== */

jQuery(document).ready(function () {
  jQuery( ".tablinks" ).first().addClass( "active" );
  jQuery( ".tabcontent" ).first().addClass( "active" );
});

function interior_decor_consultation_projects_tab(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  jQuery('#'+ cityName).show()
  evt.currentTarget.className += " active";
}