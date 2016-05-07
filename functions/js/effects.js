jQuery.noConflict();


jQuery(document).ready(
    function() {
        jQuery( ".select-menu" ).change(
            function() { 
                window.location = jQuery(this).find("option:selected").val();
            }
        );
    }
    
    
);

jQuery(document).ready(function(){
	// Cache the Window object
	$window = jQuery(window);
                
   jQuery('section[data-type="background"]').each(function(){
     var $bgobj = jQuery(this); // assigning the object
                    
      jQuery(window).scroll(function() {
                    
		// Scroll the background at var speed
		// the yPos is a negative value because we're scrolling it UP!								
		var yPos = -($window.scrollTop() / $bgobj.data('speed')); 
		
		// Put together our final background position
		var coords = '50% '+ yPos + 'px';

		// Move the background
		$bgobj.css({ backgroundPosition: coords });
		
}); // window scroll Ends

 });	

}); 


        
jQuery(document).ready(function() { jQuery("ul.last-new-shortcode li:nth-child(even)").addClass("second-style"); });

jQuery("iframe").each(function(){
      var ifr_source = jQuery(this).attr('src');
      var wmode = "wmode=transparent";
      if(ifr_source.indexOf('?') != -1) $(this).attr('src',ifr_source+'&'+wmode);
      else jQuery(this).attr('src',ifr_source+'?'+wmode);
});


jQuery(function() {
	jQuery(".header-social").hover(function () {
	
		jQuery(this).stop().animate({ opacity: 1 }, "fast"); },
		
		function () { jQuery(this).stop().animate({ opacity: 1}, "fast");
	});
});




jQuery(window).load(function() {    

        var theWindow        = jQuery(window),
            $bg              = jQuery("#background"),
            aspectRatio      = $bg.width() / $bg.height();

        function resizeBg() {

                if ( (theWindow.width() / theWindow.height()) < aspectRatio ) {
                    $bg
                        .removeClass()
                        .addClass('bgheight');
                } else {
                    $bg
                        .removeClass()
                        .addClass('bgwidth');
                }

        }

        theWindow.resize(function() {
                resizeBg();
        }).trigger("resize");

});
 
jQuery(document).ready(function() {
    
            jQuery('.portfolio_hover').fadeOut(); 
            
            jQuery('.bee-blog-full-image').children("a").hover(

                function() { jQuery(this).children('.portfolio_hover').fadeIn(); 
                    
                },
            
                function() { jQuery(this).children('.portfolio_hover').fadeOut(); 
                    
                }
            
            );
});

jQuery(document).ready(function() {
	jQuery('ul#filterm a').click(function() {
		jQuery(this).css('outline','none');
		jQuery('ul#filterm .current').removeClass('current');
		jQuery(this).parent().addClass('current');  
		
	});
});


jQuery(document).ready(function() {
    
            jQuery('.portfolio_hover').fadeOut(); 
            jQuery('ul#applications .sorting').children("a").hover(


                function() {  
                
                	jQuery(this).children('.portfolio_hover').fadeIn(); 
                },
            
                function() { jQuery(this).children('.portfolio_hover').fadeOut(); 
                    
                }
            
            );
});

 
 jQuery(document).ready(function() {
 
    
    jQuery('.viewport1column, .viewport2column, .viewport3column, .viewport4column, .viewport5column, .viewport6column, .slides li, .entry-page-image-cause').mouseenter(function(e) {
        jQuery(this).children('a').children('span').fadeIn(200);
    }).mouseleave(function(e) {
        jQuery(this).children('a').children('span').fadeOut(200);
        
    });
    
   
});

 jQuery(document).ready(function() {
 
    
    jQuery('.mt_search_in').mouseenter(function(e) {
        jQuery(this).children('.mt_menu_search').fadeIn(100);
    }).mouseleave(function(e) {
        jQuery(this).children('.mt_menu_search').fadeOut(100);
    });
    
   
});

(function($) {

jQuery.fn.pngFix = function(settings) {

	// Settings
	settings = jQuery.extend({
		blankgif: 'blank.gif'
	}, settings);

	var ie55 = (navigator.appName == "Microsoft Internet Explorer" && parseInt(navigator.appVersion) == 4 && navigator.appVersion.indexOf("MSIE 5.5") != -1);
	var ie6 = (navigator.appName == "Microsoft Internet Explorer" && parseInt(navigator.appVersion) == 4 && navigator.appVersion.indexOf("MSIE 6.0") != -1);

	if (jQuery.browser.msie && (ie55 || ie6)) {

		//fix images with png-source
		jQuery(this).find("img[src$=.png]").each(function() {

			jQuery(this).attr('width',jQuery(this).width());
			jQuery(this).attr('height',jQuery(this).height());

			var prevStyle = '';
			var strNewHTML = '';
			var imgId = (jQuery(this).attr('id')) ? 'id="' + jQuery(this).attr('id') + '" ' : '';
			var imgClass = (jQuery(this).attr('class')) ? 'class="' + jQuery(this).attr('class') + '" ' : '';
			var imgTitle = (jQuery(this).attr('title')) ? 'title="' + jQuery(this).attr('title') + '" ' : '';
			var imgAlt = (jQuery(this).attr('alt')) ? 'alt="' + jQuery(this).attr('alt') + '" ' : '';
			var imgAlign = (jQuery(this).attr('align')) ? 'float:' + jQuery(this).attr('align') + ';' : '';
			var imgHand = (jQuery(this).parent().attr('href')) ? 'cursor:hand;' : '';
			if (this.style.border) {
				prevStyle += 'border:'+this.style.border+';';
				this.style.border = '';
			}
			if (this.style.padding) {
				prevStyle += 'padding:'+this.style.padding+';';
				this.style.padding = '';
			}
			if (this.style.margin) {
				prevStyle += 'margin:'+this.style.margin+';';
				this.style.margin = '';
			}
			var imgStyle = (this.style.cssText);

			strNewHTML += '<span '+imgId+imgClass+imgTitle+imgAlt;
			strNewHTML += 'style="position:relative;white-space:pre-line;display:inline-block;background:transparent;'+imgAlign+imgHand;
			strNewHTML += 'width:' + jQuery(this).width() + 'px;' + 'height:' + jQuery(this).height() + 'px;';
			strNewHTML += 'filter:progid:DXImageTransform.Microsoft.AlphaImageLoader' + '(src=\'' + jQuery(this).attr('src') + '\', sizingMethod=\'scale\');';
			strNewHTML += imgStyle+'"></span>';
			if (prevStyle != ''){
				strNewHTML = '<span style="position:relative;display:inline-block;'+prevStyle+imgHand+'width:' + jQuery(this).width() + 'px;' + 'height:' + jQuery(this).height() + 'px;'+'">' + strNewHTML + '</span>';
			}

			jQuery(this).hide();
			jQuery(this).after(strNewHTML);

		});

		// fix css background pngs
		jQuery(this).find("*").each(function(){
			var bgIMG = jQuery(this).css('background-image');
			if(bgIMG.indexOf(".png")!=-1){
				var iebg = bgIMG.split('url("')[1].split('")')[0];
				jQuery(this).css('background-image', 'none');
				jQuery(this).get(0).runtimeStyle.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='" + iebg + "',sizingMethod='scale')";
			}
		});
		
		//fix input with png-source
		jQuery(this).find("input[src$=.png]").each(function() {
			var bgIMG = jQuery(this).attr('src');
			jQuery(this).get(0).runtimeStyle.filter = 'progid:DXImageTransform.Microsoft.AlphaImageLoader' + '(src=\'' + bgIMG + '\', sizingMethod=\'scale\');';
   		jQuery(this).attr('src', settings.blankgif)
		});
	
	}
	
	return jQuery;

};


})(jQuery);