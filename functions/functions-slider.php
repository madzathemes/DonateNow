<?php

/*-----------------------------------------------------------------------------------*/
/* Theme Name: 1Design
/* Theme URI: http://themeforest.net/user/madza
/* Description: Business & Portfolio Theme
/* Author: Madars Bitenieks
/* Author URI: http://themeforest.net/user/madza
/* License: GNU General Public License version 3.0
/* License URI: http://www.gnu.org/licenses/gpl-3.0.html
/* Author Madars Bitenieks for http://themeforest.net/user/madza
/* All files, unless otherwise stated, are released under the GNU General Public License
/* version 3.0 (http://www.gnu.org/licenses/gpl-3.0.html)
/*-----------------------------------------------------------------------------------*/



/* --------------------------------------------------------------------------------------- Slider 3D Function */

function function_slider_3d(){ ?>
<div id="mt_3d_slider">
	<div id="viewport-shadow">
	<a href="#" id="prev" title="go to the next slide"></a>
	<a href="#" id="next" title="go to the next slide"></a>
		<div id="viewport">
			<div id="box">
			
			<?php global $post; $object_x = get_post_meta($post->ID, "mt_page_slider", true);
			
			  /* get the slider array */
				  if ( ! empty( $object_x )) {
				  	
				    $mt_slider_height = get_post_meta($post->ID, "mt_page_slider_height", true);
				    foreach( $object_x as $slide ) {
				    
				    	if ($slide['image']!="") {
					    	
					    	echo '<figure class="slide"><img src="'. aq_resize_url( $slide['image'], '960', $mt_slider_height, 'false', 'true')  .'"  width="960" height="'. $mt_slider_height .'"></figure>';
				    	
					    	
					    }
				    }
				  } else {
				  
					  $object_x = ot_get_option('mt_homepage_slider_image');
					  $mt_slider_height = ot_get_option('mt_homepage_slider_height');
					  if ( ! empty( $object_x ) and is_front_page()) {
					    foreach( $object_x as $slide ) {
					    	if ($slide['image']!="") {
						    	
						    	echo '<figure class="slide"><img src="'. aq_resize_url( $slide['image'], '960', $mt_slider_height, 'false', 'true')  .'"  width="960" height="'. $mt_slider_height .'"></figure>';
					    	
						    	
						    }
					    }
					  }
				  }
			 ?>
			
			</div>
		</div>
	<div id="time-indicator"></div>
	</div>
</div>
  	 
<script>window.jQuery || document.write('<script src="//code.jquery.com/jquery-1.8.2.min.js"><\/script>')</script>
<script src="<?php echo get_template_directory_uri(); ?>/functions/plugins/3d_slider/js/box-slider-all.jquery.min.js"></script>
	<script type="text/javascript">

	jQuery(function () {

        var $box = jQuery('#box')
          , $indicators = jQuery('.goto-slide')
          , $effects = jQuery('.effect')
          , $timeIndicator = jQuery('#time-indicator')
          , slideInterval = 5000;

        var switchIndicator = function ($c, $n, currIndex, nextIndex) {
          $timeIndicator.stop().css('width', 0);
          $indicators.removeClass('current').eq(nextIndex).addClass('current');
        };

        var startTimeIndicator = function () {
          $timeIndicator.animate({width: '960px'}, slideInterval);
        };

        // initialize the plugin with the desired settings
        $box.boxSlider({
            speed: 1000
          , autoScroll: true
          , timeout: slideInterval
          , next: '#next'
          , prev: '#prev'
          , pause: '#pause'
          , effect: 'scrollVert3d'
          , blindCount: 15
          , onbefore: switchIndicator
          , onafter: startTimeIndicator
        });

        startTimeIndicator();

        // pagination isn't built in simply because it's easy to
        // roll your own with the plugin API methods
        jQuery('#controls').on('click', '.goto-slide', function (ev) {
          $box.boxSlider('showSlide', jQuery(this).data('slideindex'));
          ev.preventDefault();
        });

        jQuery('#effect-list').on('click', '.effect', function (ev) {
          var $effect = jQuery(this);

          $box.boxSlider('option', 'effect', $effect.data('fx'));
          $effects.removeClass('current');
          $effect.addClass('current');

          switchIndicator(null, null, 0, 0);
          ev.preventDefault();
        });

		  });
	</script>

<?php 

}

add_action('function_slider_3d', 'function_slider_3d');



/* --------------------------------------------------------------------------------------- Image From Url Function */

function function_img_from_url(){ 

global $post;
$url="madza_header_url";
$image = get_post_meta($post->ID, $url, true);
if ($image!=""){
?>

	<img id="img-from-url" src="<?php echo  $image;?>" />

<?php
}
}

add_action('function_img_from_url', 'function_img_from_url'); 


/* --------------------------------------------------------------------------------------- Image From Url Function */

function function_featured_image(){ 

if ( has_post_thumbnail() ) {  

	the_post_thumbnail(); 
	
} 

}
add_action('function_featured_image', 'function_featured_image'); 


/* --------------------------------------------------------------------------------------- Slider Nivo Function */

function function_slider_nivo(){ ?>

	<div id="slider-nivo"> 
    
    	<div class="slider-ul circle-up" id="slider_image">
    	
    	
    	<?php global $post; $object_x = get_post_meta($post->ID, "mt_page_slider", true);
			
			  /* get the slider array */
				  if ( ! empty( $object_x )) {
				  	
				    $mt_slider_height = get_post_meta($post->ID, "mt_page_slider_height", true);
				    foreach( $object_x as $slide ) {
				    
				    	if ($slide['image']!="") {
					    	
					    	?>
	                		
	                			<img title="#htmlcaption<?php echo str_replace (" ", "", $slide['title']);  ?>" src="<?php echo aq_resize_url( $slide['image'], '960', $mt_slider_height, 'false', 'true'); ?>" height="<?php echo $mt_slider_height; ?>" ><?php
	                		   
					    }
				    }
				  } else {
				  
					  $object_x = ot_get_option('mt_homepage_slider_image');
					  $mt_slider_height = ot_get_option('mt_homepage_slider_height');
					  if ( ! empty( $object_x ) and is_front_page()) {
					    foreach( $object_x as $slide ) {
				    
				    	if ($slide['image']!="") {
					    	 ?>
						    	
	                		
	                			<img title="#htmlcaption<?php echo str_replace (" ", "", $slide['title']);  ?>" src="<?php echo aq_resize_url( $slide['image'], '960', $mt_slider_height, 'false', 'true'); ?>" height="<?php echo $mt_slider_height; ?>" >	<?php
	                		   
					    }
				    }
					  }
				  }
			 ?>
    	
	    </div>
</div>

<?php 


global $post; $object_x = get_post_meta($post->ID, "mt_page_slider", true);
$mt_slider_height = get_post_meta($post->ID, "mt_page_slider_height", true);
if ( ! empty( $object_x )) {
    foreach( $object_x as $slide ) {

	if ($slide['image']!="") {
    	
    	if( $slide['description']!=""){ ?>
	    	
	    		<div id="htmlcaption<?php  echo str_replace (" ", "", $slide['title']); ?>" class="nivo-html-caption">
		    		<div class="nivo-caption-bg">
		    			<div class="nivo-caption-bg-black"></div>
			    			<h2><?php echo $slide['title']; ?></h2>
			            	<p><?php echo $slide['description']; ?></p>
			            	<div class="clear"></div>
			       	 	
			        	<?php if ($slide['link']!=""){ ?>
			        		<a class="button-shortcode  gray" href="<?php echo $slide['link']; ?>"><span><?php  echo "Read More";  ?></span></a>
			        	<?php } ?>
			        </div>	
			    </div> 
			    
    		<?php 
    		
		} 	
    }
}
}
$object_x = ot_get_option('mt_homepage_slider_image');
$mt_slider_height = ot_get_option('mt_homepage_slider_height');
if ( ! empty( $object_x ) and is_front_page()) {
    foreach( $object_x as $slide ) {

	if ($slide['image']!="") {
    	
    	if( $slide['description']!=""){ ?>
	    	
	    		<div id="htmlcaption<?php echo str_replace (" ", "", $slide['title']);  ?>" class="nivo-html-caption">
		    		<div class="nivo-caption-bg">
		    			<div class="nivo-caption-bg-black"></div>
			    			<h2><?php echo $slide['title']; ?></h2>
			            	<p><?php echo $slide['description']; ?></p>
			            	<div class="clear"></div>
			       	 	
			        	<?php if ($slide['link']!=""){ ?>
			        		<a class="button-shortcode  gray" href="<?php echo $slide['link']; ?>"><span><?php  echo "Read More";  ?></span></a>
			        	<?php } ?>
			        </div>	
			    </div> 
			    
    		<?php 
    		
		} 	
    }
}
}
?> 

	<script type="text/javascript">

	jQuery(window).load(function() {

    	jQuery('#slider_image').nivoSlider({
    
        	pauseOnHover:<?php if(of_get_option("nivo_slider_hover") == "1" ) { echo of_get_option("nivo_slider_hover"); } else { echo "true"; } ?>,
        	controlNav:<?php if(of_get_option("nivo_slider_control") == "1" ) { echo of_get_option("nivo_slider_control"); } else { echo "true"; } ?>,
        	directionNav:<?php if(of_get_option("nivo_slider_nav") == "1" ) { echo of_get_option("nivo_slider_nav"); } else { echo "true"; } ?>,
        	effect:'<?php if(of_get_option("nivo_slider_effect")) { echo of_get_option("nivo_slider_effect"); } else { echo "random"; } ?>',
        	animSpeed:<?php if(of_get_option("nivo_slider_speed")) { echo of_get_option("nivo_slider_speed"); } else { echo "1000"; } ?>, 
        	pauseTime:<?php if(of_get_option("nivo_slider_pause")) { echo of_get_option("nivo_slider_pause"); } else { echo "3000"; } ?>,
        	slices:<?php if(of_get_option("nivo_slider_slices")) { echo of_get_option("nivo_slider_slices"); } else { echo "20"; } ?>,
        	
        	<?php if(of_get_option("font_type")=='Cufon fonts') { ?> 
	        customChange: function(){
	                Cufon.replace('.nivo-caption-bg p');
	        },
	        <?php } ?>
        	captionOpacity: 1,
        	directionNavHide:false,
        	
  		});
  	
  	});

	</script>

<?php 

}

add_action('function_slider_nivo', 'function_slider_nivo');


/* --------------------------------------------------------------------------------------- Slider beeCodeSlider Function */

function function_slider_beecodeslider(){ 

	global $post;

	$portfolio_shortcode = '';

	$myposts = get_posts('post_type=slides_options&order=ASC&posts_per_page=999');

	foreach($myposts as $post){

		setup_postdata($post);

		$ignore[] = $post->ID;

		$portfolio_title = $post->post_title;

		$permalink = get_permalink(); 

		$title = get_the_title();  
		
		$image_id = get_post_thumbnail_id();  

		$image_url = wp_get_attachment_image_src($image_id,'large');  

		$image_url = $image_url[0];  

		$portfolio_slug = basename(get_permalink());

		$conents = get_post_custom($post->ID);

		$show_contents = $conents["_slide_title"][0]; 

		$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'beecodes-slider-big');

		$portfolio_image = get_the_post_thumbnail($post->ID, 'beecodes-slider-small');

		$url = get_post_custom($post->ID);

		$link = $url["_slide_link"][0]; 

      	if (!(empty($portfolio_image))) { 

        	$_slide_photo .= ''. 

        	$portfolio_image .''; 

        	$_portfolio_title .= '';

    	} 

     	$_slider_title .= '<div class="beeCodes-title">';
    
    	if($link!=""){
                        
        	$_slider_title .= '<a class="link-hide" alt="'.$slide['title'].'" title="'.$slide['caption'].'" href="'. $link .'"></a>';
                        
  		}
    
		if($show_contents!="No"){

        	$_slider_title .= '<h1>'.$title.'</h1>';

        	if(get_the_content()!=""){

            	$_slider_title .= '<div class="beeCodes-content">'.get_the_content().'</div>';

        	}

    	}

   	 	$_slider_title .= '</div>';

    	$_slider_image .= '<img src="'. $thumbnail[0] .'" width="'. $thumbnail[1] .'" height="'. $thumbnail[2] .'">';

	}

	wp_reset_query();
	
	?>

	<script type="text/javascript">

		$(document).ready(function() {
    
            $('.beeCodes-frame-hover-1').click(function() { 

                $('.beeCodes-slide-1, .beeCodes-slide-3, .beeCodes-slider, .beeCodes-content-scroll').cycle('prev'); 
                
                return false; 
            });

            $('.beeCodes-frame-hover-3').click(function() { 
				
				$('.beeCodes-slide-1, .beeCodes-slide-3, .beeCodes-slider, .beeCodes-content-scroll').cycle('next'); 
				
				return false; 
			
			});
		});

		$(document).ready(function() {

            $('.beeCodes-general-frame').hover(function() { 
				
				$('.beeCodes-hover-2,.beeCodes-content-scroll').fadeIn(); 

           	}, function() { 
				
				$('.beeCodes-hover-2,.beeCodes-content-scroll').fadeOut(); 
			
			});
		});

		$(document).ready(function() {

            $('.beeCodes-frame-hover-1').hover(	
            
            	function() { $('.beeCodes-hover-1').fadeIn(); },

            	function() { $('.beeCodes-hover-1').fadeOut(); }

            );
		});

		$(document).ready(function() {

            $('.beeCodes-frame-hover-3').hover(

				function() { $('.beeCodes-hover-3').fadeIn(); },

            	function() { $('.beeCodes-hover-3').fadeOut(); }

            );
		});

		$(document).ready(function() {

        	$('.beeCodes-content-scroll').cycle({

        		fx: 'scrollVert', 
				delay: 1, 
				startingSlide: 2,
				fastOnEvent: 1000,
				timeout: 4000,
				speed: 4000,
				pause: false,
				backwards:  true

        	});
		});

		$(document).ready(function() {

        	$('.beeCodes-slide-1').cycle({

        		fx: 'scrollHorz', 
				delay: 1, 
				startingSlide: 1,
				fastOnEvent:   1000,
				timeout: 4000,
				speed: 4000,
				pause: false,
				backwards:  true

        	});
		});

		$(document).ready(function() {

        	$('.beeCodes-slider').cycle({

        		fx: 'scrollHorz', 
				delay: 1, 
				startingSlide: 2,
				fastOnEvent: 1000,
				timeout: 4000,
				speed: 4000,
				pause: false,
				backwards:  true

        	}); 
		});

		$(document).ready(function() {

        	$('.beeCodes-slide-3').cycle({

        		fx: 'scrollHorz',
				fxFn:  null, 
				delay: 1, 
				startingSlide: 3,
				fastOnEvent:   1000,
				timeout: 4000,
				speed: 4000,
				pause: false,
				backwards:  true

        	});
		});

	</script>

	<div class="beeCodes-general-frame">
		
		<div class="beeCodes-slider"><?php echo $_slider_image; ?></div>
		
		<div class="beeCodes-hover-2">
			
			<div class="beeCodes-content-scroll"><?php echo $_slider_title; ?></div>

		</div>

    </div>	

	<div class="beeCodes-slider-frame">

    	<div class="beeCodes-slider-item">

        	<div class="beeCodes-slider-frame-position-1">

           	 	<div class="beeCodes-slider-frame-in">

                	<div class="beeCodes-left-frame">

                    	<div class="beeCodes-frame-hover-1">

                        	<div class="beeCodes-slide-1"><?php echo $_slide_photo ?></div>

                        	<div class="beeCodes-hover-1"></div>

                    	</div>        

                	</div>

            	</div>

        	</div><!-- END LEFT SLIDER IMAGES -->

        	<!-- RIGHT SLIDER IMAGES -->                

        	<div class="beeCodes-slider-frame-position-3">

            	<div class="beeCodes-slider-frame-in">

                	<div class="beeCodes-right-frame">

                    	<div class="beeCodes-frame-hover-3">

                        	<div class="beeCodes-slide-3"><?php echo $_slide_photo ?></div>

                        	<div class="beeCodes-hover-3"></div>

                    	</div>   

                	</div>

            	</div>

        	</div><!-- END RIGHT SLIDER IMAGES -->

        	<div class="clear"></div>

    	</div>

	</div>

<?php

}

add_action('function_slider_beecodeslider', 'function_slider_beecodeslider');


/* --------------------------------------------------------------------------------------- Slider Flex Function */

function function_slider_flex(){ ?>
<div class="responsive_size">
<div class="flexslider flexslider_full_free"> 
    
    <ul class="slides">
    	
    	
    	<?php global $post; $object_x = get_post_meta($post->ID, "mt_page_slider", true);
			
			  /* get the slider array */
				  if ( ! empty( $object_x )) {
				  	
				    $mt_slider_height = get_post_meta($post->ID, "mt_page_slider_height", true);
				    foreach( $object_x as $slide ) {
				    
				    	if ($slide['image']!="") {
					    	
					    	if( $slide['description']!=""){ ?>
						    	<li>
			                		<div class="flex-caption-bg">
						    			<div class="flex-caption-bg-black"></div>
							    			<h2><?php echo $slide['title']; ?></h2>
							            	<p><?php echo $slide['description']; ?></p>
							            <div class="clear"></div>
							       	 	<?php if ($slide['link']!=""){ ?>
							        		<a class="button-shortcode  gray" href="<?php echo $slide['link']; ?>"><span><?php echo "Read More"; ?></span></a>
							        	<?php } ?>
							        </div>	
						            <img title="#htmlcaption<?php echo $id; ?>" src="<?php echo aq_resize_url( $slide['image'], '980', $mt_slider_height, 'false', 'true'); ?>"  alt="" >		
		                		</li><?php 
		                		
	                		} else { ?>
	                		
	                			<li><img  src="<?php echo aq_resize_url( $slide['image'], '980', $mt_slider_height, 'false', 'true');   ?>" alt="" /></li><?php
	                		}   
					    }
				    }
				  } else {
				  
					  $object_x = ot_get_option('mt_homepage_slider_image');
					  $mt_slider_height = ot_get_option('mt_homepage_slider_height');
					  if ( ! empty( $object_x ) and is_front_page()) {
					    foreach( $object_x as $slide ) {
				    
				    	if ($slide['image']!="") {
					    	
					    	if( $slide['description']!=""){ ?>
						    	<li>
			                		<div class="flex-caption-bg">
						    			<div class="flex-caption-bg-black"></div>
							    			<h2><?php echo $slide['title']; ?></h2>
							            	<p><?php echo $slide['description']; ?></p>
							            <div class="clear"></div>
							       	 	<?php if ($slide['link']!=""){ ?>
							        		<a class="button-shortcode  gray" href="<?php echo $slide['link']; ?>"><span><?php echo "Read More"; ?></span></a>
							        	<?php } ?>
							        </div>	
						            <img 	title="#htmlcaption<?php echo $id; ?>" 
						            		src="<?php echo aq_resize_url( $slide['image'], '620', '', 'false', 'false'); ?>"
						            		data-src479="<?php echo aq_resize_url( $slide['image'], '840', '', 'false', 'false'); ?>"
											data-src767="<?php echo aq_resize_url( $slide['image'], '768', '', 'false', 'false'); ?>"
											data-src979="<?php echo aq_resize_url( $slide['image'], '980', '', 'false', 'false'); ?>"
											data-src1239="<?php echo aq_resize_url( $slide['image'], '1240', '', 'false', 'false'); ?>"
											data-src1499="<?php echo aq_resize_url( $slide['image'], '1440', '', 'false', 'false'); ?>"   
											alt="" >		
		                		</li><?php 
		                		
	                		} else { ?>
	                		
	                			<li><img 	src="<?php echo aq_resize_url( $slide['image'], '640', '', 'false', 'false'); ?>"
	                						data-src479="<?php echo aq_resize_url( $slide['image'], '840', '', 'false', 'false'); ?>"
											data-src767="<?php echo aq_resize_url( $slide['image'], '768', '', 'false', 'false'); ?>"
											data-src979="<?php echo aq_resize_url( $slide['image'], '980', '', 'false', 'false'); ?>"
											data-src1239="<?php echo aq_resize_url( $slide['image'], '1240', '', 'false', 'false'); ?>"
											data-src1499="<?php echo aq_resize_url( $slide['image'], '1440', '', 'false', 'false'); ?>" 
											alt="" /></li><?php
	                		}   
					    }
				    }
					  }
				  }
			 ?>
			 
			 
    	
      </ul>
</div>
<script type="text/javascript">

	jQuery(window).load(function() {
              jQuery('.flexslider').flexslider({
                animation: "slide",
               smoothHeight: <?php if(is_front_page() and ot_get_option('mt_homepage_slider_height') == "" or is_page() and get_post_meta($post->ID, "mt_page_slider_height", true) ==""){ echo "true"; } else { echo "false"; } ?>
                 		
                               });
            });
</script>
</div>


	

<?php 

}

add_action('function_slider_flex', 'function_slider_flex');

?>