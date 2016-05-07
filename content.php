<?php

/* The default template for displaying content. Used for both single and index/archive/search.
/*-----------------------------------------------------------------------------------*/



global $more, $post;    // Declare global $more (before the loop).
$more = 0;       // Set (inside the loop) to display content above the more tag.

$mt_layout = get_post_meta($post->ID, "layout_positions", true);

$mt_image_width = "960";

if($mt_layout != "full" ) { $mt_image_width = "620"; }


if(is_single()) { $more = 1; }
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
				<div class="featured-post">
					<i class="icon-pushpin"></i>
				</div>
		<?php endif; ?>
		
			<header class="entry-header">
			<div class="post-format-image"> </div>
			<?php if ( is_single() ) : ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php else : ?>
			<h1 class="entry-title">
				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'madza_translate' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h1>
			<?php endif; // is_single() ?>
				
			<?php if(ot_get_option("blog_meta_on")!="off") {  twentytwelve_entry_meta(); } ?>
			
		</header><!-- .entry-header -->

			<?php if ( has_post_thumbnail() ) : ?>
			<div class="entry-page-image">
				<div class="flexslider mt<?php echo $post->ID; ?>"> 
					<ul class="slides">
    	
							<?php 
							global $post; 
							if ( get_post_meta($post->ID, "mt_portfolio_slider_heightstan", true)!="") { $height = get_post_meta($post->ID, "mt_portfolio_slider_heightstan", true); } else { $height = "auto"; }  	
								
							?>
							<li><a href="<?php the_permalink(); ?>"><span class="dark-background-2"></span><?php 
							
							$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full', false, '' );
							echo get_the_post_thumbnail( $post->ID, array($mt_image_width, $height, 'bfi_thumb' => true)); ?>
							
							 </a></li>
																			            
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
			<?php endif; ?>	
			
		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
		
			<?php the_excerpt(); ?>
			
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
		
			<?php 
			
			if(!is_single()) { 
				
				if(ot_get_option("blog_content_type")=="full_content") { the_content( __( '', 'madza_translate' ) ); } else { the_excerpt(); }
				
			} else { 
			
				the_content( __( '', 'madza_translate' ) ); 
				
			} 
			
			?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'madza_translate' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<?php endif; ?>
		
		<footer class="entry-meta"><?php  
		
			if(!is_single()) { echo "<a href='".get_permalink()."' class='more-link'><span>"; _e( 'Read more', 'twentytwelve' );  echo "</span></a>"; }
			
							
				
				
			?><div class="clear"></div>
			
			
			<?php if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries. ?>
				<div class="author-info">
					<div class="author-avatar">
						<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentytwelve_author_bio_avatar_size', 68 ) ); ?>
					</div><!-- .author-avatar -->
					<div class="author-description">
						<h2><?php printf( __( 'About %s', 'twentytwelve' ), get_the_author() ); ?></h2>
						<p><?php the_author_meta( 'description' ); ?></p>
						<div class="author-link">
							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
								<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'twentytwelve' ), get_the_author() ); ?>
							</a>
						</div><!-- .author-link	-->
					</div><!-- .author-description -->
				</div><!-- .author-info -->
			<?php endif; ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
