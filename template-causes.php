<?php
/*
Template Name: Causes
*/ 

global $post;  ?>

<?php get_header(); 
	
$mt_layout = get_post_meta($post->ID, "layout_positions", true);
$count = get_post_meta($post->ID, "mt_template_item_pp", true); 

$mt_float_layout = "";
$mt_float_sidebar = "";

if ($mt_layout == "left") {

	$mt_float_layout = "floatright";
	$mt_float_sidebar = "floatleft";
}

$mt_image_width = "960";

if($mt_layout != "full" ) { $mt_image_width = "620"; }	
	
?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	
	<div class="row">	
			
		<div class="span12">
	    
	    		<?php the_content( __( '<div class="reed_more">Reed More &raquo;</div><div></div>', 'madza_translate' ) ); ?>
			   
	           <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'madza_translate' ), 'after' => '</div>' ) ); ?>
				
	           <div class="clear"></div>
		
	    </div><!--END POST -->
		    
	</div>
			    
<?php endwhile; wp_reset_query();  ?>

<div class="row">

	<div class="span<?php if ($mt_layout != "full") { echo "8 "; } else {  echo "12 "; } echo $mt_float_layout; ?> ">

		
	
	    <?php query_posts(array( 'post_type'=> 'causes', 'posts_per_page' => $count)); ?>
	    <?php global $more; $more = 0; while ( have_posts() ) : the_post();  $mt_portfolio_slider_height = get_post_meta($post->ID, "mt_portfolio_slider_heigh", true); ?>
	                        
			<header class="entry-header">
				<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'madza_translate' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
				<?php if ( has_post_thumbnail() ) : ?>		  
					<div class="entry-page-image entry-page-image-cause">
						<a href="<?php the_permalink(); ?>"><span class="dark-background-2"></span>
						
						<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 999,999 ), false, '' ); 
						 	echo get_the_post_thumbnail( $post->ID, array($mt_image_width, $mt_portfolio_slider_height, 'bfi_thumb' => true, 'class' => 'cause-img'), $src[0] );
						 ?>
						 	
						</a>
					</div>
				<?php endif; ?>	
			</header>
			<div class="entry-content"><?php  the_content( __( '', 'madza_translate' ) ); ?></div>	
			
			<footer class="entry-meta">
			
				<a href='<?php echo get_post_meta($post->ID, 'mt_causes_button_url', TRUE); ?>' class='more-link mt-donate-link'><span><?php echo get_post_meta($post->ID, 'mt_causes_button_name', TRUE); ?></span></a>
				<a href='<?php echo get_permalink(); ?>' class='more-link'><span><?php _e( 'Read more', 'twentytwelve' );  ?></span></a>
				<div class="clear"></div>
			</footer>
		
		<?php endwhile; ?>
		<?php wp_reset_query(); ?>
		
	
	
	</div>
	
	<?php if ($mt_layout != "full") { ?>
		
		<div class="span4 <?php echo $mt_float_sidebar; ?> "><?php get_sidebar(); ?></div>
	
	<?php } ?>
			
</div>

<?php get_footer(); ?>

