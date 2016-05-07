<?php
/**
 * @author madars.bitenieks
 * @copyright 2011
 */

get_header(); 


global $post;

$mt_layout = get_post_meta($post->ID, "layout_positions", true);

$mt_float_layout = "";

if ($mt_layout == "left") {

	$mt_float_layout = "floatright";
	$mt_float_sidebar = "floatleft";
}

?>

<div class="row">

	<div class="span<?php if ($mt_layout != "full") { echo "8 "; } else {  echo "12 "; } echo $mt_float_layout; ?> ">
	
		<?php while ( have_posts() ) : the_post(); ?>
		
					<?php get_template_part( 'content', get_post_format() ); ?>
	
					<nav class="nav-single">
						<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentytwelve' ) . '</span> %title' ); ?></span>
						<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentytwelve' ) . '</span>' ); ?></span>
					</nav><!-- .nav-single -->
	
					<?php if ( comments_open() || '0' != get_comments_number() ) comments_template( '', true ); ?>
			
		<?php endwhile; ?>	
	
	</div>
	
	<?php if ($mt_layout != "full") { ?>
		
		<div class="span4 <?php echo $mt_float_sidebar; ?> "><?php get_sidebar(); ?></div>
	
	<?php } ?>
			
</div>

<?php get_footer(); ?>