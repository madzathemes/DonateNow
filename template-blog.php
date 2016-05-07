<?php
/*
Template Name: Blog
*/ 

global $more, $post; $more = 0;

$mt_layout = get_post_meta($post->ID, "layout_positions", true);
$count = get_post_meta($post->ID, "mt_template_item_pp", true); 
$category = get_post_meta($post->ID, "mt_blog_category", true); 

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
			    
<?php endwhile; wp_reset_query(); ?>

<div class="row">

	<div class="span<?php if ($mt_layout != "full") { echo "8 "; } else {  echo "12 "; } echo $mt_float_layout; ?> ">

	
		     <?php
		    
		    if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
			elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
			else { $paged = 1; }
		    
		       
		     $wp_query= null; 
		     $wp_query = new WP_Query(); 
		 
		     
		    if( ! empty($category)) { 
	    			$wp_query = new WP_Query(array(
		        	'post_type'=> 'post',
		        	'tax_query' => array( array( 'taxonomy' => 'category', 'field' => 'id', 'terms' => $category )),
		            'posts_per_page' => $count,
		            'paged' => $paged
		            )); 
		    } else {
		            $wp_query = new WP_Query(array(
		        	'post_type'=> 'post',
		            'posts_per_page' => $count, 
		            'paged' => $paged
		            ));
	        }
		            
		    
		    
		    
		    
		 
		    		
			 while ($wp_query->have_posts()) : $wp_query->the_post();
	
						 get_template_part( 'content', get_post_format() ); 
						
			 endwhile; 

			 mt_paging_nav();  wp_reset_query();
			 
			 ?>
		
	</div>
	
	<?php if ($mt_layout != "full") { ?>
		
		<div class="span4 <?php echo $mt_float_sidebar; ?> "><?php get_sidebar(); ?></div>
	
	<?php } ?>
			
</div>

<?php get_footer(); ?>