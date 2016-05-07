<?php

 global $post;
 
?>

<article id="post-<?php the_ID(); ?>" <?php post_class();  ?>>
	<header class="entry-header">
		<div class="post-format-image-link"></div>
		<h1 class="entry-title">
			<a href="<?php echo get_post_meta($post->ID, "mt_portfolio_format_link_url", true); ?>"><?php the_title(); ?></a>
		</h1>
	</header>
	<?php if (is_single()) { ?>
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'madza_translate' ) ); ?>
	</div><!-- .entry-content -->
	<?php } ?>
	<footer class="entry-meta">
		<a class="mt_format_link" href="<?php echo get_post_meta($post->ID, "mt_portfolio_format_link_url", true); ?>">
			<?php echo get_post_meta($post->ID, "mt_portfolio_format_link_url", true); ?>
		</a>
		<?php edit_post_link( __( 'Edit', 'madza_translate' ), ' l <span class="edit-link">', '</span>' ); ?>		
	</footer><!-- .entry-meta -->
</article><!-- #post -->
