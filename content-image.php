
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
				
			<div class="entry-page-image">
				<div class="flexslider mt<?php global $post;  echo $post->ID; ?>"> 
					<ul class="slides">
    	
							<?php  
							if ( get_post_meta($post->ID, "mt_portfolio_slider_height3", true)!="") { $height = get_post_meta($post->ID, "mt_portfolio_slider_height3", true); } else { $height = "auto"; }  
							
							if(get_post_meta($post->ID, "mt_portfolio_format_image_url", true)=="" or get_post_meta($post->ID, "mt_portfolio_format_image_url", true)=="http://"){	
							?>
								<li><a href="<?php the_permalink(); ?>"><img  src="<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 999,999 )); echo aq_resize_url( $src[0], '960', $height, 'false', 'true'); ?>" ></a></li>
							<?php
							} else {
							?>		
								<li><a href="<?php echo get_post_meta($post->ID, "mt_portfolio_format_image_url", true); ?>"><img  src="<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 999,999 ) ); echo aq_resize_url( $src[0], '640', $height, 'false', 'true'); ?>" ></a></li>						<?php
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
					
			<header class="entry-header">
			<?php global $post; if(get_post_meta($post->ID, "postm_title_on", true)=="on"){	?>		
				<div class="post-format-image-image"></div><h1 class="entry-title"><a href="<?php if(get_post_meta($post->ID, "mt_portfolio_format_image_url", true)=="" or get_post_meta($post->ID, "mt_portfolio_format_image_url", true)=="http://"){ the_permalink(); } else { echo get_post_meta($post->ID, "mt_portfolio_format_image_url", true); }?>"><?php the_title(); ?></a></h1>
			<?php } 
			 ?>
		</header>					
				<?php if (is_single()) { ?>
				<div class="entry-content">
					<?php if(!is_single()) { 
				
				if(ot_get_option("blog_content_type")=="full_content") { the_content( __( '', 'madza_translate' ) ); } else { the_excerpt(); }
				
			} else { 
			
				the_content( __( '', 'madza_translate' ) ); 
				
			} ?>
				</div><!-- .entry-content -->
				<?php } ?>

		<?php global $post; if(get_post_meta($post->ID, "postm_border_on", true)=="on"){	?>
		
		<footer class="entry-meta">
			<?php if(ot_get_option("blog_meta_on")!="off") {  twentytwelve_entry_meta(); } ?>
		</footer><!-- .entry-meta -->
		
		<?php } ?>	
		
	</article><!-- #post -->
