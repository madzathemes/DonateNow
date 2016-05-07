<?php

global $post;

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="post-format-image-quote"></div>
		<div  class="entry-title"><?php if(!is_single()) { 
				
				if(ot_get_option("blog_content_type")=="full_content") { the_content( __( '', 'madza_translate' ) ); } else { the_excerpt(); }
				
			} else { 
			
				the_content( __( '', 'madza_translate' ) ); 
				
			}  ?></div>
		
	</header>
	<footer class="entry-meta">
		<a class="mt_format_link" href="<?php echo get_post_meta($post->ID, "mt_portfolio_format_quo_url", true); ?>">
		<?php echo the_title(); ?></a><?php edit_post_link( __( 'Edit', 'madza_translate' ), ' l <span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post -->