<?php

 global $more, $post;    // Declare global $more (before the loop).
$more = 0;       // Set (inside the loop) to display content above the more tag.

if(is_single()) { $more = 1; } ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<header class="entry-header">
				<div class="post-format-image-video"></div>
				<h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			<?php if(ot_get_option("blog_meta_on")!="off") {  twentytwelve_entry_meta(); } ?>
		</header>						
				<div class="entry-page-image">
				<div class="flexslider mt<?php echo $post->ID; ?>"> 
					<ul class="slides">
    	
							<?php global $post;  
							$height = get_post_meta($post->ID, "slider_height_post3", true);
							$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 999,999 ), false, '' ); 							
							$slidei = $src[0];	

							if(get_post_meta($post->ID, "slider_embed_post", true)!=""){	
							?>
								<li><div  class="video-container"><?php echo get_post_meta($post->ID, "slider_embed_post", true); ?></div></li>							<?php
							} else {
							?>		
								<li>
								
					               <!-- Begin VideoJS -->
					              <div class="video-js-box">
					                
					                <video class="video-js vjs-default-skin" controls
									  preload="auto" width="640" height="<?php echo $height; ?>" poster="<?php echo $slidei; ?>"
									  data-setup="{}">
									  <source src="<?php echo get_post_meta($post->ID, 'slider_m4v_post', true); ?>" type='video/mp4'>
									  <source src="<?php echo get_post_meta($post->ID, 'slider_webm_post', true); ?>" type='video/webm'>
									  <source src="<?php echo get_post_meta($post->ID, 'slider_ogv_post', true); ?>" type='video/ogg'>									</video>					              
								  </div>
	
								</li>						<?php
							} 
							?>													            
					</ul>
				</div>
		
				<script type="text/javascript">
					jQuery(window).load(function() {
			              jQuery('.mt<?php echo $post->ID; ?>').flexslider({
			                animation: "slide"
			              });
			            });
				</script>
			</div>
				<div class="entry-content">
					<?php if(!is_single()) { 
						
						if(ot_get_option("blog_content_type")=="full_content") { the_content( __( '', 'madza_translate' ) ); } else { the_excerpt(); }
						
					} else { 
					
						the_content( __( '', 'madza_translate' ) ); 
						
					}  ?>
				</div><!-- .entry-content -->
				

				
		<footer class="entry-meta">
			<?php  			
			if(!is_single()) { echo "<a href='".get_permalink()."' class='more-link'><span>"; _e( 'Read more', 'twentytwelve' );  echo "</span></a><div class='clear'></div>"; }
			
			 ?>			
			 	
		</footer><!-- .entry-meta -->
	
</article><!-- #post -->
