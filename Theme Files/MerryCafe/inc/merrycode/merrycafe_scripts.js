
    jQuery(window).load(function() {

        "use strict";

        jQuery('.flexslider').flexslider({
          animation: "slide",
          start: function(slider)
          {
            jQuery('.slider-loading').hide();
          }
        });
        jQuery('.menu-images').flexslider({
          animation: "slide",
          start: function(slider)
          {
            jQuery('.menu-slider-loading').hide();
          }
        });
        jQuery('.menu-listing').flexslider({
          animation: "slide",
          slideshow: false
        });
        
        
    });
    jQuery(document).ready(function () {
        "use strict";
      jQuery('nav').meanmenu();
    });

    (function($){ //create closure so we can safely use $ as alias for jQuery

      $(document).ready(function(){

        "use strict";

        // initialise plugin
        var merrymenu = $('#merry-menu').superfish({
          //add options here if required
        });

        // buttons to demonstrate Superfish's public methods
        $('.destroy').on('click', function(){
          merrymenu.superfish('destroy');
        });

        $('.init').on('click', function(){
          merrymenu.superfish();
        });

        $('.open').on('click', function(){
          merrymenu.children('li:first').superfish('show');
        });

        $('.close').on('click', function(){
          merrymenu.children('li:first').superfish('hide');
        });
      });

    })(jQuery);