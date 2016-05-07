<?php
/*
Template Name: Causes Columns
*/ 

global $post; 

$mt_layout = get_post_meta($post->ID, "layout_positions", true);
$count = get_post_meta($post->ID, "mt_template_item_pp", true); 

$mt_float_layout = "";
$mt_float_sidebar = "";

if ($mt_layout == "left") {

	$mt_float_layout = "floatright";
	$mt_float_sidebar = "floatleft";
}

?>

<?php get_header(); ?>

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

		<div class="row da-thumbs mt-masonry">
	
	    <?php query_posts(array( 'post_type'=> 'causes', 'posts_per_page' => $count)); ?>
	    <?php global $more; $more = 0; while ( have_posts() ) : the_post(); ?>
	        <div class="span4 mt_thumbli">                
			<header class="entry-header">
				
				<?php if ( has_post_thumbnail() ) : ?>		  
					<div class="entry-page-image">
						 <a href="<?php the_permalink(); ?>">
						 	<?php 
						 	$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 999,999 ), false, '' );
							echo get_the_post_thumbnail( $post->ID, array(300, 200, 'bfi_thumb' => true, 'class' => ' cause-img'));
							?>
							<article  class="da-animate da-slideFromLeft" style="display: block; ">
								<i class="icon-link" style="color:white; margin-top:20px; margin-left:20px; display:block;"></i>
							</article>	
						 </a>
					</div>
				<?php endif; ?>	
			
			</header>
			
			<h2><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'madza_translate' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<p><?php $portfolio_caption = get_the_excerpt(); echo substr($portfolio_caption, 0, 120);  ?>...</p>
			
			<footer class="entry-meta">
			
				<a href='<?php echo get_post_meta($post->ID, 'mt_causes_button_url', TRUE); ?>' class='more-link mt-donate-link'><span><?php echo get_post_meta($post->ID, 'mt_causes_button_name', TRUE); ?></span></a>
				<div class="clear"></div>
			</footer>
	        </div>
		<?php endwhile; ?>
		<?php wp_reset_query(); ?>
		
		</div>
	
	</div>
	<script type="text/javascript">
	//Image Hover
	jQuery(document).ready(function(){
	jQuery(function() {
	    jQuery('.da-thumbs > .mt_thumbli').hoverdir();
	});
	
	});
	
	jQuery( document ).ready( function( $ ) {
    $( '.mt-masonry2' ).masonry();
    } );

	</script>
	<?php if ($mt_layout != "full") { ?>
		
		<div class="span4 <?php echo $mt_float_sidebar; ?> "><?php get_sidebar(); ?></div>
	
	<?php } ?>
			
</div>

<?php get_footer(); ?>

