<?php
/**
 * @author madars.bitenieks
 * @copyright 2013
 */

get_header(); 

global $post;

$mt_comment=get_post_meta($post->ID, "madza_comment", true); 
$mt_layout = get_post_meta($post->ID, "layout_positions", true);

$mt_float_layout = "";
$mt_float_sidebar = "";

if ($mt_layout == "left") {

	$mt_float_layout = "floatright";
	$mt_float_sidebar = "floatleft";
}
if(function_exists( 'tribe_is_event' ) ) {  
	if (tribe_is_event() && !tribe_is_day() && !is_single()) {  
		$mt_layout = "full"; 
	}
}
$more = 0;

if ($mt_layout == "full" or $mt_layout == "") {
?>
	
</div>
		    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				
				    
				    		<?php the_content( __( '<div class="reed_more">Reed More &raquo;</div><div></div>', 'madza_translate' ) ); ?>
						   
				           <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'madza_translate' ), 'after' => '</div>' ) ); ?>
							
				
			    
				    <?php if($mt_comment=='Yes'){ comments_template( '', true );  }?>
			    
			    <?php endwhile; wp_reset_query();  ?>

			
<div>

<?php } else { ?>

<div class="row">

	<div class="span<?php if ($mt_layout != "full") { echo "8 "; } else {  echo "12 "; } echo $mt_float_layout; ?> ">

		    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				    
				    		<?php the_content( __( '<div class="reed_more">Reed More &raquo;</div><div></div>', 'madza_translate' ) ); ?>
						   
				           <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'madza_translate' ), 'after' => '</div>' ) ); ?>
							
				           <div class="clear"></div>
					
				    </div><!--END POST -->
			    
				    <?php if($mt_comment=='Yes'){ comments_template( '', true );  }?>
			    
			    <?php endwhile; wp_reset_query();  ?>
		
	</div>
	
	<?php if ($mt_layout != "full") { ?>
		
		<div class="span4 <?php echo $mt_float_sidebar; ?> "><?php get_sidebar(); ?></div>
	
	<?php } ?>
			
</div>

<?php 

}

get_footer(); ?>