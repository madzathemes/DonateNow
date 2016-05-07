<?php
/*
Template Name: Full Width
*/
$comment=get_post_meta($post->ID, "madza_comment", true); 
?>

<?php get_header(); ?>

<!-- FULL PAGE -->
<div class="clear"></div>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
           <?php the_content( __( 'Reed More &raquo;', 'madza_translate' ) ); ?>
		   
           <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'madza_translate' ), 'after' => '</div>' ) ); ?>
			
           <div class="clear"></div>
	
    </div><!--END post -->

	<?php if($comment=='Yes'){ comments_template( '', true );  }?>

<?php endwhile; ?>

</div><!--END FULL PAGE -->

<?php get_footer(); ?>

