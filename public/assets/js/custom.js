(function ($) {
  $(document).ready(function () {
    $(".testimonial-slider").slick({
      dots: false,
      infinite: true,
      speed: 300,
      slidesToShow: 1,
      adaptiveHeight: false,
    });

    // jQuery(document)
    // .on("mouseenter", ".tab-slider-two-tile .slider-item", function () {
    //   // Hover-in
    //   jQuery(".tab-slider-two-tile .slider-item").removeClass("active");
    //   jQuery(this).css("width", "75%");
    //   jQuery(this).siblings(".tab-slider-two-tile .slider-item").not(this).css("width", "25%");
    // })
    // .on("mouseleave", ".tab-slider-two-tile .slider-item", function () {
    //   // Hover-out
    //   jQuery(".tab-slider-two-tile .slider-item").css("width", "50%");
    //   // jQuery(".tab-slider-two-tile .slider-item:first-child").css("width", "50%");
    // });
    // jQuery(".hamburger").click(function () {
    //   jQuery(".hamburger-wrapper").toggleClass("is-active");
    //   window.setTimeout(function () {
    //     jQuery("body").toggleClass("no-scroll");
    //   }, 500); //<-- Delay in milliseconds
    // });

    // jQuery(".location-flag, .we-can-help-tab-left-item, .hire-resource-tab, .our-tech-expertise-tab-button").on(
    //   "click",
    //   function () {
    //     jQuery(this).siblings().removeClass("active");
    //     jQuery(this)
    //       .parent()
    //       .siblings()
    //       .children()
    //       .filter(".active")
    //       .removeClass("active");

    //     var locationId = jQuery(this).attr("id");
    //     jQuery(
    //       "#" + locationId + ", .location-address #" + locationId
    //     ).addClass("active");
    //     jQuery(
    //       "#" + locationId + ", .we-can-help-tab-right #" + locationId
    //     ).addClass("active");
    //     jQuery(
    //       "#" + locationId + ", .our-tech-expertise-tab-content-wrapper #" + locationId
    //     ).addClass("active");
    //     jQuery(
    //       "#" +
    //         locationId +
    //         ", .hire-resource-content-tab-wrapper #" +
    //         locationId
    //     ).addClass("active");
    //   }
    // );

    // jQuery(".mega-menu .mega-menu-item:first").addClass("active");
    // jQuery(".left_data_wrapper .left_data_wrapper_inner:first").addClass("active");

    // jQuery(".mega-menu .mega-menu-item").hover(function() {
    //   console.log(jQuery(this)
    //   .parent()
    //   .parent()
    //   .parent()
    //   .siblings()
    //   .children(), "hey theree");
    //     jQuery(this).siblings().removeClass("active");
    //     jQuery(this)
    //       .parent()
    //       .parent()
    //       .parent()
    //       .siblings()
    //       .children()
    //       .filter(".active")
    //       .removeClass("active");

    //     var locationId = jQuery(this).attr("id");
    //     jQuery(
    //       "#" + locationId + ", .left_data_wrapper #" + locationId
    //     ).addClass("active");
    // });

    // Get all the elements with the class 'section-half' and 'creole-culture-gallery-single'
    // var $elements = $('.section-half, .creole-culture-gallery-single');
  
    // Function to shuffle the active class within each 'section-half' and 'creole-culture-gallery-single' div
    // function shuffleActiveClass() {
    //   // Iterate over each 'section-half' and 'creole-culture-gallery-single' div
    //   $elements.each(function() {
    //     var $images = $(this).find('.img-cover'); // Get all images within the current div
    //     $images.removeClass('active'); // Remove the 'active' class from all images
    //     var randomIndex = Math.floor(Math.random() * $images.length); // Generate a random index
    //     $images.eq(randomIndex).addClass('active'); // Add the 'active' class to a random image
    //   });
    // }
    // Call shuffleActiveClass immediately to set the initial active images
    // Set interval to shuffle the active class within each 'section-half' and 'creole-culture-gallery-single' div every 2 seconds (adjust as needed)
    // shuffleActiveClass();
    // setInterval(shuffleActiveClass, 2000);

    if (jQuery(window).width() > 991) {
      jQuery(document)
      .on("mouseenter", ".our-services-home .slider-item", function () {
        // Hover-in
        jQuery(".our-services-home .slider-item").removeClass("active");
        jQuery(this).css("width", "50%");
        jQuery(this).siblings(".our-services-home .slider-item").not(this).css("width", "25%");
      })
      .on("mouseleave", ".our-services-home .slider-item", function () {
        // Hover-out
        jQuery(".slider-item").css("width", "25%");
        jQuery(".slider-item:first-child").css("width", "50%");
      });

      jQuery(document).on("mouseleave", ".item-slider", function () {
        jQuery(".our-services-home .slider-item:first-child").addClass("active");
      });
    }

    var path = window.location.href; 
    // because the 'href' property of the DOM element is the absolute path
    jQuery('ul a').each(function() {
      if (this.href === path) {
        jQuery(this).addClass('active');
      }
    });

    // if (jQuery(window).width() < 767) {
    //   jQuery(
    //     ".creole-values-tile-wrapper:first p"
    //   ).css("display", "block");
    //   jQuery(
    //     ".creole-values-tile-wrapper:first h5"
    //   ).addClass("active");

    //   jQuery(
    //     ".creole-values-tile h5"
    //   ).click(function () {
    //     var isActive = jQuery(this).hasClass("active");
    //     jQuery(this).removeClass("active");
    //     if (!isActive) {
    //       jQuery(this).addClass("active");
    //     }
    //     var content = jQuery(this).parent().find("p");
    //     content.slideToggle(500);
    //     jQuery(this)
    //       .closest(".slideDrop")
    //       .find("p")
    //       .not(content)
    //       .slideUp(500);
    //   });
    //   jQuery(".meet-team-list-wrapper, .we-can-help-grid-section, .industry-expertise-tile-wrapper").slick({
    //     dots: false,
    //     infinite: true,
    //     speed: 300,
    //     slidesToShow: 1,
    //     adaptiveHeight: true,
    //   });
    // }

    // jQuery(".faq-content:first").css("display", "block");
    // jQuery(
    //   ".faq-title, .hire-resource-how-it-works-content-block .hire-resource-how-it-works-content-block-top"
    // ).click(function () {
    //   var isActive = jQuery(this).hasClass("active");
    //   jQuery(this).closest(".slideDrop").find(".active").removeClass("active");
    //   if (!isActive) {
    //     jQuery(this).addClass("active");
    //   }
    //   var content = jQuery(this).parent().find(".slideDropHide");
    //   content.slideToggle(500);
    //   jQuery(this)
    //     .closest(".slideDrop")
    //     .find(".slideDropHide")
    //     .not(content)
    //     .slideUp(500);
    // });

    // function slickify() {
    //   jQuery(".item-slider").slick({
    //     autoplay: false,
    //     speed: 300,
    //     slidesToShow: 1,
    //     slidesToScroll: 1,
    //     adaptiveHeight: true,
    //   });

    //   jQuery(".left_data_wrapper").appendTo(".right_data_wrapper");
    // }

    // if (jQuery(window).width() < 1200) {
    //   slickify();
    // }

    // jQuery(".instagram-post-sldier").slick({
    //   dots: false,
    //   infinite: true,
    //   speed: 300,
    //   slidesToShow: 4,
    //   centerMode: true,
    //   adaptiveHeight: false,
    //   vertical: false,
    //   centerPadding: '100px',
    //   autoplaySpeed: 1000,
    //   autoplay: true,
    //   responsive: [
    //     {
    //       breakpoint: 1600,
    //       settings: {
    //         centerPadding: '45px',
    //       }
    //     },
    //     {
    //       breakpoint: 767,
    //       settings: {
    //         slidesToShow: 1,
    //         centerPadding: '0',
    //       }
    //     },
    //     {
    //       breakpoint: 250,
    //       settings: {
    //         slidesToShow: 1,
    //         centerPadding: '0',
    //       }
    //     },
    //   ]
    // });


    // Slick slider.
    // jQuery(".we-can-help-tab-mobile-paragraph, .we-can-help-tab-right-mobile").slick({
    //   slidesToShow: 1,
    //   slidesToScroll: 1,
    //   arrows: false,
    //   fade: true,
    //   asNavFor: ".we-can-help-tab-mobile-buttons",
    // });

    // jQuery(".we-can-help-tab-mobile-buttons").slick({
    //   slidesToShow: 2,
    //   slidesToScroll: 1,
    //   asNavFor: ".we-can-help-tab-mobile-paragraph, .we-can-help-tab-right-mobile",
    //   dots: false,
    //   focusOnSelect: true,
    // });

    // jQuery(".our-ebook-slider-wrapper").slick({
    //   speed: 300,
    //   // slidesToShow: 1,
    //   // slidesToScroll: 1,
    //   autoplaySpeed: 1000,
    //   autoplay: true,
    //   arrows: false,
    //   mobileFirst:true,
    //   responsive: [
    //     {
    //       breakpoint: 1200,
    //       settings: {
    //         slidesToShow: 4,
    //         slidesToScroll: 1,
    //       },
    //     },
    //     {
    //       breakpoint: 1025,
    //       settings: {
    //         slidesToShow: 3,
    //         slidesToScroll: 1,
    //       },
    //     },
    //     {
    //       breakpoint: 991,
    //       settings: {
    //         slidesToShow: 2,
    //         slidesToScroll: 1,
    //       },
    //     },
    //     {
    //       breakpoint: 300,
    //       settings: {
    //         slidesToShow: 1,
    //         slidesToScroll: 1,
    //       },
    //     },
    //   ]
    // });

    // jQuery(".creolers-speak-slider-wrapper").slick({
    //   rows: 2,
    //   dots: false,
    //   arrows: false,
    //   infinite: true,
    //   speed: 300,
    //   slidesToShow: 2,
    //   slidesToScroll: 1,
    //   autoplaySpeed: 2000,
    //   autoplay: true,
    //   responsive: [
    //     {
    //       breakpoint: 1000,
    //     },
    //     {
    //       breakpoint: 767,
    //       settings: {
    //         rows: "1",
    //         slidesToShow: 1,
    //       }
    //     },
    //     {
    //       breakpoint: 250,
    //       settings: {
    //         rows: "1",
    //         slidesToShow: 1,
    //       }
    //     },
    //   ]
    // });

    // jQuery(
    //   ".mega-menu-item-has-children > div span, .mega-menu-item-has-sub-children > div span"
    // ).on("click", function () {
    //   jQuery(this)
    //     .parent()
    //     .parent()
    //     .children(".mega-sub-menu")
    //     .css({ "padding-left": "30px", "padding-top": "20px" })
    //     .slideToggle(500);
    //   jQuery(this).parent().parent().toggleClass("active-menu");
    // });

    // function progressBarScroll() {
    //   // Get the distance of the top of the content section from the top of the viewport
    //   let contentTop = document.querySelector('.blog-detail-wrapper').getBoundingClientRect().top - 10;
    //   // Get the height of the content section
    //   let contentHeight = document.querySelector('.blog-detail-wrapper').offsetHeight - 150;
    
    //   // Check if the top of the content section is within the viewport
    //   if (contentTop <= 0) {
    //     // Calculate the progress based on how much of the content section is visible
    //     let progress = Math.min((Math.abs(contentTop) / contentHeight) * 100, 100);
    //     // Update the progress bar width
    //     document.getElementById("progressBar").style.width = progress + "%";
    //   } else {
    //     // If the content section is not yet in view, set the progress to 0
    //     document.getElementById("progressBar").style.width = "0%";
    //   }
    // }

    // changing word animation for banner section
    // (function () {
    //   var wordContainer = $("#changingword");
    //   var imageContainer = $("#wordImage");
    //   if (wordContainer.length > 0) {
    //     var wordsData = wordContainer.data("words").split(",");
    //     var imagesData = wordContainer.data("images").split(",");
    //     var i = 0;

    //     function changeWord() {
    //       wordContainer.fadeOut(function () {
    //         var currentWord = wordsData[(i = (i + 1) % wordsData.length)];
    //         wordContainer.html(currentWord).fadeIn();
    //         updateImage(currentWord);
    //       });
    //     }

    //     function updateImage(word) {
    //       var imageUrl = getImageUrlForWord(word);
    //       imageContainer.attr("src", imageUrl);
    //     }

    //     function getImageUrlForWord(word) {
    //       // Assuming the order of words and images is the same
    //       var index = wordsData.indexOf(word);
    //       return index !== -1 ? imagesData[index] : "";
    //     }

    //     // Initial setup
    //     wordContainer.html(wordsData[0]);
    //     updateImage(wordsData[0]);

    //     setInterval(changeWord, 2500);
    //   }
    // })();

    // var prev = 0;
    // var shrinkHeader = 300;
    // var $window = jQuery(window);
    // var nav = jQuery('header');
    // var contentScroll = jQuery(".blog-progressbar");
    // var hireresourceScroll = jQuery(".hire-resource-how-it-works");

    // $window.on('scroll', function(){
    //   if (document.querySelector('.blog-detail-wrapper')) {
    //     progressBarScroll();
    //   }

    //   var currentScrollPos = window.pageYOffset;
    //   if (currentScrollPos > 20) {
    //     var scrollTop = $window.scrollTop();
    //     nav.toggleClass('hidden', scrollTop > prev);
    //     contentScroll.toggleClass('touchtoTop', scrollTop > prev);
    //     hireresourceScroll.toggleClass('touchtoTop', scrollTop > prev);
    //     prev = scrollTop;
    //   }

    //   if ( currentScrollPos >= shrinkHeader ) {
    //     jQuery('header').addClass('shrink');
    //   }
    //   else {
    //     jQuery('header').removeClass('shrink');
    //   }
    // });
  });
})(jQuery);

document.addEventListener("DOMContentLoaded", function() {
  // Trigger the animation after a short delay to ensure Safari renders the elements
  setTimeout(function() {
    var sliderLines = document.querySelectorAll('.marquee-slider-left-rotation-line');
    sliderLines.forEach(function(sliderLine) {
      sliderLine.classList.add('start-animation');
    });
    var sliderLineRight = document.querySelectorAll('.marquee-slider-right-rotation-line');
    sliderLineRight.forEach(function(sliderLine) {
      sliderLine.classList.add('start-animation');
    });
  }, 250);
});
